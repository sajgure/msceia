<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['mode']=TRUE; /* Set True for live and false for development */
$config['prevent']=false; /* Prevent == True to prevent email sending */

/*-------------------------
|Live Settings
|--------------------------
*/
$config['development']=array(
						'Host'=>'smtp.gmail.com', 
						'Port'=>'587', 
						'SMTPSecure'=>'tls', 
						'SMTPAuth'=>true, 
						'Username'=>'test4unicus@gmail.com',
						'Password'=>'unicus@009',
						'from_email'=>'test4unicus@gmail.com',
						'from_name'=>'Unicus',
						'reply_to'=>'test4unicus@gmail.com',
						'reply_name'=>'Unicus'
					);
/*-------------------------
|Test Settings
|--------------------------
*/
$config['live']=array(	
						'Host'=>'mail.sarswatitrust.org', 
						'Port'=>'465', 
						'SMTPSecure'=>'tls', 
						'SMTPAuth'=>true, 
						'Username'=>'info@sarswatitrust.org',
						'Password'=>'info@2019!',
						'from_email'=>'info@sarswatitrust.org',
						'from_name'=>'Sarswati Charitable Trust',
						'reply_to'=>'info@sarswatitrust.org',
						'reply_name'=>'Sarswati Charitable Trust'
					);
/**/
$config['monitor']=array(
		'ERROR'=>array('unicusweb@gmail.com','admin@unicusweb.com'),
		'INFO'=>array('unicusweb@gmail.com')
	);