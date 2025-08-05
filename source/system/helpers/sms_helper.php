<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('sendSms'))
{    
    function sendSms($mobile='8983045984', $message='Welcome To MSCEIA')
    {
    	$CI = get_instance();

    	// You may need to load the model if it hasn't been pre-loaded
	    // $CI->load->model('master_model');
	    // $msgData = $CI->master_model->fetchMessageDeatails();
	    //print_r($msgData);

	 	/*$username = 'pushpaklb';//$msgData->msg_username; // Username of the account
		$password = 'industry1';//$msgData->msg_password; //  Password of the account 
		//$mobile = '91'.$mobileNumber; // Destination mobile no.
		$mobile = $mobile;
		$message = urlencode($message) ; // Message to be sent
		$sendername = 'MSCEIA';//$msgData->msg_senderid; // Sender Id/From clause in the SMS message//CHINAV
		
		//$Url="http://nimbusit.co.in/api/swsendSingle.asp?username=".$username."&password=".$password."&sender=".$sendername."&sendto=".$mobile."&message=".$message;
		
		
		$Url="http://sms.rmtechnology.in/api/smsapi.aspx?username=".$username."&password=".$password."&to=".$mobile."&from=".$sendername."&message=".$message;*/
		
		$username = 'ITWizz';
		$key = '13D60D39-C72C-446A-A517-F011F81DE4F0';
		$mobile = $mobile;
		$message = urlencode($message);
		$Url ="http://sms.prith-v.com/SecureApi.aspx?usr=".$username."&key=".$key."&smstype=TextSMS&to=".$mobile."&msg=".$message."&rout=Transactional&from=MSCEIA";
		
		// is curl installed?
    	if (!function_exists('curl_init')){ 
			echo('CURL is not installed!');
        	die('CURL is not installed!');
    	}
 
		// create a new curl resource
    	$ch = curl_init($Url);
 
     	// set URL to download
    	curl_setopt($ch, CURLOPT_URL, $Url);
    	//curl_setopt($ch, CURLOPT_URL, urlencode($Url));
    	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	//echo $Url;
 
    	// remove header? 0 = yes, 1 = no
    	curl_setopt($ch, CURLOPT_HEADER, 0);
 
    	// should curl return or print the data? true = return, false = print
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    	// timeout in seconds
    	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
		// if using proxy
		/*if($useproxy)
		{
			// set proxy server and port
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1); 
			curl_setopt($ch, CURLOPT_PROXY, $server.":".$port); 

			// set proxy credential
			if($proxyUsername != '')
			{
				curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyUsername.":".$proxyPassword); 
			}
		}*/

    	// download the given URL, and return output
    	$output = curl_exec($ch);

    	// close the curl resource, and free system resources
    	curl_close($ch);

    	//print $output;
    	//echo($output);
    	return $output;
    }   
}