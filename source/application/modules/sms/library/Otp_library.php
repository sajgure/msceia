<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otp_library
{
	function _construct() 
	{
	    $CI =& get_instance();     
		$CI->load->database();     
		$CI->load->library("session");
	}

	function send_otp_mail($user_id,$resend_otp = 1)
	{
		$CI =& get_instance();   
		$CI->load->model('Laxmi_site_model');

		if(isset($user_id))
		{
			$data['user_details'] = $CI->Laxmi_site_model->fetch_user_details($user_id);
		}
		$otp_string = md5(sha1(md5(date('Y-m-d H:i:s'))));
		$otp_mail_string = substr($otp_string, 0,6);
		$splits_string = str_split($otp_mail_string);
		$newotp_mail_string = '';
		for($i=0;$i<count($splits_string);$i++)
		{
			if(is_numeric($splits_string[$i]))
			{
				$newotp_mail_string = $newotp_mail_string.$splits_string[$i];
			}
			else
			{
				$newotp_mail_string = $newotp_mail_string.$i;
			}
		}

		$attempt = 1;
		$currenttime = date("Y-m-d H:i:s"); 
		$string = $newotp_mail_string."+".$attempt."+".$currenttime."+".$resend_otp; 
		$encrypt_string = $CI->otp_library->encrypt_data($string);

		$filldata = array("user_id"=>$user_id,"trans_string"=>$encrypt_string,"inserted_on"=>$currenttime);
		if($CI->Laxmi_site_model->insert_access_transaction($filldata))
		{
			$CI->authentication->login_user($user_id);
			$data['otp_string'] = $newotp_mail_string;
			$data['email_array'] = array("otp_string"=>$newotp_mail_string,"valid_till"=>$currenttime);
			$CI->load->helper('sms_helper'); 
			$message = $CI->load->view('site/sms_template/sms_otp',$data,TRUE); 
			if(isset($data['user_details'][0]->mobile_number) && ($data['user_details'][0]->mobile_number != 0))
			{ 
				$sms_result = $CI->otp_library->_send_otp_sms($data['user_details'][0]->mobile_number,$message);
				return $sms_result;
			} else { return FALSE; }
		}
	}

	function _send_otp_sms($mobile_number,$data)
	{
		$CI =& get_instance();   
		$CI->load->helper('sms_helper'); 
		$message = $CI->load->view('site/sms_template/sms_otp',$data,TRUE); 
		$result = sendSms($mobile_number,$message); 
		return $result;
	}

	function encrypt_data($string)
	{
		$output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'Mahalaxmi-Sweets';
	    $secret_iv  = 'Sweets-Mahalaxmi';


	    $secret_key = '812a6b37ba32fc82728fe14e1b17c16a';/*md5(sha1(md5()))*/
	    $secret_iv = 'bf27ec52dbfb600d2ee22fceb1baa499';/*md5(sha1(md5()))*/
	 
	    $key = hash('sha256', $secret_key);
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	    $output = base64_encode($output);
	    

	    return $output;
	}

	function decrypt_data($string)
	{
		$output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'Mahalaxmi-Sweets';
	    $secret_iv  = 'Sweets-Mahalaxmi';


	    $secret_key = '812a6b37ba32fc82728fe14e1b17c16a';/*md5(sha1(md5()))*/
	    $secret_iv = 'bf27ec52dbfb600d2ee22fceb1baa499';/*md5(sha1(md5()))*/
	 
	    $key = hash('sha256', $secret_key);
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    

	    return $output;
	}

	function destroy_otp_session()
	{
		$CI =& get_instance();
		$CI->session->unset_userdata("check_otp_user");
	}

	function sitemode()
	{
		return "offline"; /* online/ offline */
	}


}