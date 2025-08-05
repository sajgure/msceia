<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('sendSms'))
{    
    function sendSms($to='9657726462', $message='Welcome To MSCEIA')
    {
		$username = 'ITWizz';
		$key = '13D60D39-C72C-446A-A517-F011F81DE4F0';
	 	$URL = 'http://180.151.98.11/api/sms/SendSMS.aspx?'; 
		$ch = curl_init($URL);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');		
		curl_setopt($ch, CURLOPT_POSTFIELDS, "usr=".$username."&key=".$key."&to=".$to."&msg=".$message."&rout=Transactional&smstype=TextSMS&from=MSCEIA");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		// print_r($output);
    	return $output;
    }   
}