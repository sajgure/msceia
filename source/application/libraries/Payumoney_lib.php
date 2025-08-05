<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payumoney_lib
{
	function onlinePayment($fname,$order_data)
    {
    	$CI = get_instance();
    	//echo 'hi';
    	// You may need to load the model if it hasn't been pre-loaded
	    // $CI->load->model('master_model');
	    // $msgData = $CI->master_model->fetchMessageDeatails();
	    //print_r($msgData);
	    //echo 'transaction Id = '.$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	    // Merchant key here as provided by Payu
        $MERCHANT_KEY = "f4Q43wrF";
		
		// Merchant Salt as provided by Payu
        // $SALT = "8BG9wBn7";
        $SALT = "dG1v6G373V";
        
		// End point - change to https://secure.payu.in for LIVE mode
		// $PAYU_BASE_URL = "https://test.payu.in";
		// $PAYU_BASE_URL = "https://sandboxsecure.payu.in";
		$PAYU_BASE_URL = "https://secure.payu.in";
		$action = '';

		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))
 		{
 			$txnId = $order_data['transaction_no'];			
 			$key = $MERCHANT_KEY;
 			$shipping_charge = 0;
 			$data_for = (isset($order_data['data_for']) && !empty($order_data['data_for']))?$order_data['data_for']:'';
 			if(isset($order_data['total_amount']) && !empty($order_data['total_amount']))
 			{
 				$amount = $order_data['total_amount'];
 			}
            if(isset($order_data['total_student']) && !empty($order_data['total_student']))
 			{
 				$student_amt = $order_data['total_student'] * 40;

 			}
 			
 			$productinfo = 'msceia';
 			$firstname = $fname; 			
 			$email = $order_data['email'];
 			$phone = $order_data['mobile'];
 			$service_provider = 'payu_paisa';
            if($amount==$student_amt)
 			{
 				$surl = base_url().'manual_order_success';
 				$furl = base_url().'manual_order_failure';
 			} 			
 			else
 			{
 				$surl = base_url().'order_success';
 				$furl = base_url().'order_failure';
 			}
 		}
 		else
 		{
 			//$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 		}

 		//$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";

		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 
		{
    		$formError = 1;
  		} 
  		else 
  		{
		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			//$hashVarsSeq = explode('|', $hashSequence);
		    //$hash_string = '';	
			/*foreach($hashVarsSeq as $hash_var) 
			{
		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		      $hash_string .= '|';
		    }*/

		    //$hash_string = $key.'|'.$txnId.'|'.$amount.'|'.$firstname.'|'.$email.'|'.$phone.'|'.$productinfo.'|'.$surl.'|'.$furl.'|'.$service_provider;

		    //echo $hash_string;
		    //$hash_string = "$MERCHANT_KEY|$txnId|$amount|$productinfo|$firstname|$email";
		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$order_data['payment_id'].'|'.$order_data['institute_id'].'|||||||||';
		    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		    
		    $hash_string .= $SALT;		    
		    
		    $hash = strtolower(hash('sha512', $hash_string));
		    $action = $PAYU_BASE_URL . '/_payment';

		    $payu_args = array(
						'key' => $MERCHANT_KEY,
						'txnid' => $txnId ,
						'amount' => $amount,
						'productinfo' => $productinfo,
						'firstname' => $firstname,
						'email' => $email,
						'phone' =>$phone,
						'surl' =>$surl,
						'furl' =>$furl,
						'hash' =>$hash,
						'udf1' => $order_data['payment_id'],
						'udf2' => $order_data['institute_id'],
						'service_provider' =>$service_provider
				);


		    //$this->submit_payu_post($PAYU_BASE_URL,$post_data);

		    /*$payu_args_array = array();
	        foreach($payu_args as $key => $value){
	          	$payu_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
	        }*/

	        //$data['post_data']=$payu_args;
	       //$this->load->view("pay_u",$data); onLoad=\"document.forms['payuForm'].submit();\"
	        echo "<!DOCTYPE html>\n";
	        echo "<html lang=\"en\">\n";
	        echo "<head><title>Processing Payment...</title></head>\n";
	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";
	        echo "<center><h2>Please wait, your order is being processed and you";
	        echo " will be redirected to the Online payment.</h2></center>\n";
	        echo "<form method=\"post\" name=\"payuForm\" ";
	        echo "action=\"".$action."\">\n";
	        
	        foreach ($payu_args as $name => $value) {
	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
	        }
	        echo "<center><br/><br/>If you are not automatically redirected to ";
	        echo "Online payment within 5 seconds...<br/><br/>\n";
	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
	       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';
	        echo "</form>\n";
	        echo "</body>\n";
	        echo "</html>\n";
	        /*echo '<html><head><title>Processing Payment...</title></head><body onload="submitPayuForm()"><form action="'.$action.'" method="post" id="payu_payment_form" name="payuForm">
            ' . implode('', $payu_args_array) . '
            <input type="submit" class="button-alt" id="submit_payu_payment_form" value="Submit"/>
            <script type="text/javascript">
				function submitPayuForm() {			      
			      	var payuForm = document.forms.payuForm;
			      	payuForm.submit();
			    }
			</script>
            </form></body></html>';*/
		    //print_r($fields);
		   //$fields_string = '';

			//url-ify the data for the POST
			/*foreach($fields as $key=>$value) 
			{ 
				$fields_string .= $key.'='.$value.'&'; 
			}*/
			/*rtrim($fields_string, '&');

			$options = array(
		        'http' => array(
		            'header'  => "Content-type: application/x-www-form-urlencoded",
		            'method'  => 'POST',
		            'content' => http_build_query($fields),
		        ),
		    );
		    $context  = stream_context_create($options);
		    file_get_contents($action, false, $context);*/

		    /*// is curl installed?
	    	if (!function_exists('curl_init')){ 
				echo('CURL is not installed!');
	        	die('CURL is not installed!');
	    	}	    	
	 
			// create a new curl resource
	    	$ch = curl_init();

	    	//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, $action);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);*/
	 
	     	/*// set URL to download
	    	curl_setopt($ch, CURLOPT_URL, $action);
	 
	    	// remove header? 0 = yes, 1 = no
	    	curl_setopt($ch, CURLOPT_HEADER, 0);
	 
	    	// should curl return or print the data? true = return, false = print
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    	// timeout in seconds
	    	curl_setopt($ch, CURLOPT_TIMEOUT, 10);*/
	 
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
	    	/*$output = curl_exec($ch);

	    	// close the curl resource, and free system resources
	    	curl_close($ch);

	    	// print output
	    	//echo($output);
	    	print_r($output);*/
	    	//return $output;
		}
    } 

    /*function onlinePaymentShop($fname,$order_data)
    {
    	$CI = get_instance();
    	//echo 'hi';
    	// You may need to load the model if it hasn't been pre-loaded
	    // $CI->load->model('master_model');
	    // $msgData = $CI->master_model->fetchMessageDeatails();
	    //print_r($msgData);
	    //echo 'transaction Id = '.$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	    // Merchant key here as provided by Payu
		//$MERCHANT_KEY = "JBZaLc";
		//$MERCHANT_KEY = "daKHh5X0";
        $MERCHANT_KEY = "f4Q43wrF";
        
		// Merchant Salt as provided by Payu
		//$SALT = "GQs7yium";
		//$SALT = "kQutChXjLZ";
		$SALT = "dG1v6G373V";

		// End point - change to https://secure.payu.in for LIVE mode
		//$PAYU_BASE_URL = "https://test.payu.in";
		$PAYU_BASE_URL = "https://sandboxsecure.payu.in";
		// $PAYU_BASE_URL = "https://secure.payu.in";
		$action = '';

		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))
 		{
 			$txnId = $order_data['transaction_id'];			
 			$key = $MERCHANT_KEY;
 			$shipping_charge = 0; 		
 			if(isset($order_data['order_price']) && !empty($order_data['order_price']))
 			{
 				$amount = $order_data['order_price'];
 			}
            
 			
 			$productinfo = 'msceia shop';
 			$firstname = $fname; 			
 			$email = $order_data['cust_email_address'];
 			$phone = $order_data['cust_phone_no'];
 			$service_provider = 'payu_paisa';            
 			$surl = base_url().'shop_order_success';
 			$furl = base_url().'shop_order_failure';
 			
 		}
 		else
 		{
 			//$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 		}

 		//$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";

		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 
		{
    		$formError = 1;
  		} 
  		else 
  		{
		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			//$hashVarsSeq = explode('|', $hashSequence);
		    //$hash_string = '';	
			// foreach($hashVarsSeq as $hash_var) 
			// {
		 //      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		 //      $hash_string .= '|';
		 //    }

		    //$hash_string = $key.'|'.$txnId.'|'.$amount.'|'.$firstname.'|'.$email.'|'.$phone.'|'.$productinfo.'|'.$surl.'|'.$furl.'|'.$service_provider;
			$udf1 = $order_data['order_id'];
		    //echo $hash_string;
		    //$hash_string = "$MERCHANT_KEY|$txnId|$amount|$productinfo|$firstname|$email";
		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'||||||||||';
		    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		    
		    $hash_string .= $SALT;		    
		    
		    $hash = strtolower(hash('sha512', $hash_string));
		    $action = $PAYU_BASE_URL . '/_payment';

		    $payu_args = array(
						'key' => $MERCHANT_KEY,
						'txnid' => $txnId ,
						'amount' => $amount,
						'productinfo' => $productinfo,
						'firstname' => $firstname,
						'email' => $email,
						'phone' =>$phone,
						'surl' =>$surl,
						'furl' =>$furl,
						'hash' =>$hash,
						'udf1' => $order_data['order_id'],
						'service_provider' =>$service_provider
				);


		    //$this->submit_payu_post($PAYU_BASE_URL,$post_data);

		    // $payu_args_array = array();
	     //    foreach($payu_args as $key => $value){
	     //      	$payu_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
	     //    }

	        //$data['post_data']=$payu_args;
	       //$this->load->view("pay_u",$data); onLoad=\"document.forms['payuForm'].submit();\"
	        echo "<!DOCTYPE html>\n";
	        echo "<html lang=\"en\">\n";
	        echo "<head><title>Processing Payment...</title></head>\n";
	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";
	        echo "<center><h2>Please wait, your order is being processed and you";
	        echo " will be redirected to the Online payment.</h2></center>\n";
	        echo "<form method=\"post\" name=\"payuForm\" ";
	        echo "action=\"".$action."\">\n";
	        
	        foreach ($payu_args as $name => $value) {
	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
	        }
	        echo "<center><br/><br/>If you are not automatically redirected to ";
	        echo "Online payment within 5 seconds...<br/><br/>\n";
	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
	       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';
	        echo "</form>\n";
	        echo "</body>\n";
	        echo "</html>\n";
	        
		}
    }*/

    function onlinePaymentobjectiveShop($fname,$order_data,$temp_order_id)
    {
    	$CI = get_instance();
    	//echo 'hi';
    	// You may need to load the model if it hasn't been pre-loaded
	    // $CI->load->model('master_model');
	    // $msgData = $CI->master_model->fetchMessageDeatails();
	    //print_r($msgData);
	    //echo 'transaction Id = '.$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	    // Merchant key here as provided by Payu
		//$MERCHANT_KEY = "JBZaLc";
		//$MERCHANT_KEY = "daKHh5X0";
        //$MERCHANT_KEY = "f4Q43wrF";
        $MERCHANT_KEY = "VlU91aZO";
        
		// Merchant Salt as provided by Payu
		//$SALT = "GQs7yium";
		//$SALT = "kQutChXjLZ";
		//$SALT = "dG1v6G373V";
        $SALT = "49dPT9dUss";
        
		// End point - change to https://secure.payu.in for LIVE mode
		//$PAYU_BASE_URL = "https://test.payu.in";
		$PAYU_BASE_URL = "https://secure.payu.in";
		$action = '';

		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))
 		{
 			$txnId = $order_data['transaction_id'];			
 			$key = $MERCHANT_KEY;
 			$shipping_charge = 0; 		
 			if(isset($order_data['order_price']) && !empty($order_data['order_price']))
 			{
 				$amount = $order_data['order_price'];
 			}
            
 			
 			$productinfo = 'Aaral publications';
 			$firstname = $fname; 			
 			$email = $order_data['customer_email'];
 			$phone = $order_data['customer_phone'];
 			$service_provider = 'payu_paisa';            
 			$surl = base_url().'objective_shop_order_success';
 			$furl = base_url().'objective_shop_order_failure';
 			
 		}
 		else
 		{
 			//$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 		}

 		//$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";

		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 
		{
    		$formError = 1;
  		} 
  		else 
  		{
		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			//$hashVarsSeq = explode('|', $hashSequence);
		    //$hash_string = '';	
			/*foreach($hashVarsSeq as $hash_var) 
			{
		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		      $hash_string .= '|';
		    }*/

		    //$hash_string = $key.'|'.$txnId.'|'.$amount.'|'.$firstname.'|'.$email.'|'.$phone.'|'.$productinfo.'|'.$surl.'|'.$furl.'|'.$service_provider;

		    //echo $hash_string;
		    //$hash_string = "$MERCHANT_KEY|$txnId|$amount|$productinfo|$firstname|$email";
		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$order_data['institute_id'].'|'.$temp_order_id.'|||||||||';
		    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		    
		    $hash_string .= $SALT;		    
		    
		    $hash = strtolower(hash('sha512', $hash_string));
		    $action = $PAYU_BASE_URL . '/_payment';

		    $payu_args = array(
						'key' => $MERCHANT_KEY,
						'txnid' => $txnId ,
						'amount' => $amount,
						'productinfo' => $productinfo,
						'firstname' => $firstname,
						'email' => $email,
						'phone' =>$phone,
						'surl' =>$surl,
						'furl' =>$furl,
						'hash' =>$hash,
						'udf1' => $order_data['institute_id'],
						'udf2' => $temp_order_id,
						'service_provider' =>$service_provider
				);


		    //$this->submit_payu_post($PAYU_BASE_URL,$post_data);

		    /*$payu_args_array = array();
	        foreach($payu_args as $key => $value){
	          	$payu_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
	        }*/

	        //$data['post_data']=$payu_args;
	       //$this->load->view("pay_u",$data); onLoad=\"document.forms['payuForm'].submit();\"
	        echo "<!DOCTYPE html>\n";
	        echo "<html lang=\"en\">\n";
	        echo "<head><title>Processing Payment...</title></head>\n";
	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";
	        echo "<center><h2>Please wait, your order is being processed and you";
	        echo " will be redirected to the Online payment.</h2></center>\n";
	        echo "<form method=\"post\" name=\"payuForm\" ";
	        echo "action=\"".$action."\">\n";
	        
	        foreach ($payu_args as $name => $value) {
	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
	        }
	        echo "<center><br/><br/>If you are not automatically redirected to ";
	        echo "Online payment within 5 seconds...<br/><br/>\n";
	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
	       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';
	        echo "</form>\n";
	        echo "</body>\n";
	        echo "</html>\n";
	        
		}
    }  
   
    function onlinePaymentGccTbcShop($fname,$order_data,$temp_order_id)
    {
    	$CI = get_instance();
        // Merchant key here as provided by Payu
        $MERCHANT_KEY = "f4Q43wrF";
		
		// Merchant Salt as provided by Payu
		// $SALT = "8BG9wBn7";
        $SALT = "dG1v6G373V";
        
		// End point - change to https://secure.payu.in for LIVE mode
		//$PAYU_BASE_URL = "https://test.payu.in";
		$PAYU_BASE_URL = "https://secure.payu.in";
		$action = '';

		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))
 		{
 			$txnId = $order_data['transaction_id'];			
 			$key = $MERCHANT_KEY;
 			$shipping_charge = 0; 		
 			if(isset($order_data['order_price']) && !empty($order_data['order_price']))
 			{
 				$amount = $order_data['order_price'];
 			}
 			$productinfo = 'Manisha Foundation';
 			$firstname = $fname; 			
 			$email = $order_data['customer_email'];
 			$phone = $order_data['customer_phone'];
 			$service_provider = 'payu_paisa';            
 			$surl = base_url().'gcc_tbc_shop_order_success';
 			$furl = base_url().'gcc_tbc_shop_order_failure';
 		}
 		else
 		{
 			//$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 		}
 		//$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";
		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 
		{
    		$formError = 1;
  		} 
  		else 
  		{
		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			//$hashVarsSeq = explode('|', $hashSequence);
		    //$hash_string = '';	
			/*foreach($hashVarsSeq as $hash_var) 
			{
		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		      $hash_string .= '|';
		    }*/

		    //$hash_string = $key.'|'.$txnId.'|'.$amount.'|'.$firstname.'|'.$email.'|'.$phone.'|'.$productinfo.'|'.$surl.'|'.$furl.'|'.$service_provider;

		    //echo $hash_string;
		    //$hash_string = "$MERCHANT_KEY|$txnId|$amount|$productinfo|$firstname|$email";
		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$order_data['institute_id'].'|'.$temp_order_id.'|||||||||';
		    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		    
		    $hash_string .= $SALT;		    
		    
		    $hash = strtolower(hash('sha512', $hash_string));
		    $action = $PAYU_BASE_URL . '/_payment';

		    $payu_args = array(
					'key' => $MERCHANT_KEY,
					'txnid' => $txnId ,
					'amount' => $amount,
					'productinfo' => $productinfo,
					'firstname' => $firstname,
					'email' => $email,
					'phone' =>$phone,
					'surl' =>$surl,
					'furl' =>$furl,
					'hash' =>$hash,
					'udf1' => $order_data['institute_id'],
					'udf2' => $temp_order_id,
					'service_provider' =>$service_provider
			);
		    //$this->submit_payu_post($PAYU_BASE_URL,$post_data);

		    /*$payu_args_array = array();
	        foreach($payu_args as $key => $value){
	          	$payu_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
	        }*/

	        //$data['post_data']=$payu_args;
	       	//$this->load->view("pay_u",$data); onLoad=\"document.forms['payuForm'].submit();\"
	        echo "<!DOCTYPE html>\n";
	        echo "<html lang=\"en\">\n";
	        echo "<head><title>Processing Payment...</title></head>\n";
	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";
	        echo "<center><h2>Please wait, your order is being processed and you";
	        echo " will be redirected to the Online payment.</h2></center>\n";
	        echo "<form method=\"post\" name=\"payuForm\" ";
	        echo "action=\"".$action."\">\n";
	        
	        foreach ($payu_args as $name => $value) {
	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
	        }
	        echo "<center><br/><br/>If you are not automatically redirected to ";
	        echo "Online payment within 5 seconds...<br/><br/>\n";
	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
	       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';
	        echo "</form>\n";
	        echo "</body>\n";
	        echo "</html>\n";
		}
    }
}