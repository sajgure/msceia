<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_sent{

	function mail_sent_by_gmail($data,$email_id) 
    {
    	
		date_default_timezone_set('Etc/UTC');

		require 'email/gmail/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP(1);

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "itwizz2016@gmail.com";

		//Password to use for SMTP authentication
		$mail->Password = "itwizz@123";

		//Set who the message is to be sent from
		$mail->setFrom('itwizz2016@gmail.com', 'School Care');

		//Set an alternative reply-to address
		$mail->addReplyTo('itwizz2016@gmail.com', 'School Care');

		//Set who the message is to be sent to
		for($i=0;$i<count($email_id);$i++)
		{
			$mail->addAddress($email_id[$i]['email_id']);
		}
		//Set the subject line
		$mail->Subject = $data['subject'];

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		
		$mail->MsgHTML($data['msg_body']);
		
		//Replace the plain text body with one created manually
		$mail->AltBody = $data['alt_msg'];

		
		// $mail->addAttachment('./images/phpmailer_mini.png');
		// $mail->addAttachment('./images/freak-logo.png');
		
		//Attach an image file
		if(isset($data['attachement']) && !empty($data['attachement']))
		{
			$mail->addAttachment($data['attachement']);
		}
		// for($i=0;$i<count($attachement);$i++)
		// {
		// 	$mail->addAttachment($attachement[$i]['attachement_file']);
		// }
		print_r($mail);
		//send the message, check for errors
		if (!$mail->send()) 
		{
		    return 'false';
		} 
		else 
		{
		    return 'true';
		}
	}

	function mail_sent_by_webmail($data,$email_id) 
    {
    	
		date_default_timezone_set('Etc/UTC');

		require 'email/webmail/class.phpmailer.php';

		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isMail(1);

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'mail.schoolcareindia.com';

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 465;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'ssl';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "noreply@schoolcareindia.com";

		//Password to use for SMTP authentication
		$mail->Password = "noreply@2020";

		//Set who the message is to be sent from
		$mail->setFrom('noreply@schoolcareindia.com', 'School Care');

		//Set an alternative reply-to address
		$mail->addReplyTo('noreply@schoolcareindia.com', 'School Care');

		//Set who the message is to be sent to
		for($i=0;$i<count($email_id);$i++)
		{
			$mail->addAddress($email_id[$i]['email_id']);
		}
		//Set the subject line
		$mail->Subject = $data['subject'];

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		
		$mail->MsgHTML($data['msg_body']);
		
		//Replace the plain text body with one created manually
		$mail->AltBody = $data['alt_msg'];

		
		// $mail->addAttachment('./images/phpmailer_mini.png');
		// $mail->addAttachment('./images/freak-logo.png');
		
		//Attach an image file
		if(isset($data['attachement']) && !empty($data['attachement']))
		{
			$mail->addAttachment($data['attachement']);
		}
		// for($i=0;$i<count($attachement);$i++)
		// {
		// 	$mail->addAttachment($attachement[$i]['attachement_file']);
		// }

		//send the message, check for errors
		if (!$mail->send()) 
		{
		    return 'false';
		} 
		else 
		{
		    return 'true';
		}
	}

}
