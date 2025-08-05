<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Encryptdecryptstring
{
	function _construct() 
	{
	    $CI =& get_instance();
	}

	public function encrypt_string($string)
    {
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121'; 
        $encryption_key = "ITWIZZ"; 
        $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
        return $encryption;
    }

    function decrypt_string($enc_string)
    {
        $ciphering = "AES-128-CTR"; 
        $decryption_iv = '1234567891011121';  
        $options = 0; 
        $decryption_key = "ITWIZZ"; 
        $decryption=openssl_decrypt ($enc_string, $ciphering, $decryption_key, $options, $decryption_iv);
        return $decryption;
    }
    
} ?>
