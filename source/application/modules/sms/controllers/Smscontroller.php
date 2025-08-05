<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Smscontroller extends Base_Controller
{
	public function send($options)
	{
		if(isset($options['mobile_no']) && isset($options['message']))
		{

	    	$this->load->config('sms_config', TRUE);
	    	$setting_config = $this->config->item('sms_config');
	    	$sendsms = $setting_config['send_sms_flag'];
	        if($sendsms == true)
	        {

				$api_key=$setting_config['api_key'];
				$msg=urlencode($options['message']);
				$senderid=$setting_config['senderid'];
				$url="http://login.smsgatewayhub.com/api/mt/SendSMS?APIKey=".$setting_config['api_key'].
							"&senderid=".$setting_config['senderid'].
							"&channel=2&DCS=0&flashsms=0&number=".$options['mobile_no'].
							"&text=".$msg.
							"&route=1";
				if (!function_exists('curl_init'))
				{	
					return false;
				}
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$output = curl_exec($ch);
				if(curl_errno($ch))
				{
				    return false;
				}
				curl_close($ch);

				if($output!='')
				{
					$result_array = json_decode($output);
					/*echo "<pre>";
					echo $options['mobile_no'];
					print_r($output);
					print_r ("\n");
					echo "</pre>";*/


					$responce= urlencode(serialize($result_array));
					$filldata = array('mobile_no'=>$options['mobile_no'],
										'response'=>$result_array->ErrorCode,
										'sms_text'=>$msg,
										'inserted_on'=>date('Y-m-d H:i:s'));
					$this->load->model('standard/standard_model');
					$this->standard_model->save_record('tbl_sms',$filldata);
							
				}
		    	return $output;
		    }
		    else
	    	{
	    		return false;
	    	}
		}
	}
	public function sendOtp($options)
	{
		if(!isset($options['otp']) || empty($options['otp']))
		{
			$options['otp'] = $this->_generateOtp();
		}
		if(isset($options['otp']) && !empty($options['otp']))
		{
			$options['message']=$this->load->view('otp',$options,TRUE);
			$this->send($options);
			if(isset($options))
			{
				return $options['otp'];
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
		
	}
	public function _generateOtp()
	{
		$digits_needed=6;
		$random_number='';  
		$count=0;
		while ( $count < $digits_needed ) {
		    $random_digit = mt_rand(0, 9);
		    $random_number .= $random_digit;
		    $count++;
		}
		if(!empty($random_number))
		{
			return $random_number;
		}
		else
		{
			return FALSE;
		}
	}

}