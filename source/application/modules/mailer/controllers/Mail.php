<?php  if( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| --------------------------------------------------------------------
| Mail 	Author: Sumit Darbeshwar 					Date: 17-June-2016
| --------------------------------------------------------------------
| This file will be used for the sending and tracking email from the system.
|
| In order to keep tack of all sent emails. 
| email config also required  for setting email
| Host, Port, Username, Password
| -------------------------------------------------------------------
| Parameters 
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. to: to whom email is being sent its an array of email
| 2. subject: Subject of email
| 3. template: template file name, it must be exist in view folder of 
| 4. attachments: array of attachments files with valid real path
| 5. data: data required to render template to message 
*/
require APPPATH.'third_party/mail/PHPMailerAutoload.php';

class Mail extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mail/email_model');
		$this->load->module('template');
	}
	/*
	-------------------------------------------------------------------------------------------------------------------
	Author 	: Sumit Darbeshwar																			Date: 17 Jun 16
	-------------------------------------------------------------------------------------------------------------------
	*/
	public function send($options)
	{
		$msg=false;
		$this->config->load('mail/email', TRUE);
		$email_setting=$this->config->item('email');
		$live=$email_setting['mode'];
		$prevent=$email_setting['prevent'];
		if($prevent)
		{
			return TRUE;
		}

		if(isset($options['message'])){
			$msg=$options['message'];
		}else{
			$msg=$this->load->view($options['template'],$options['data'],TRUE);
		}
		if($live==TRUE)
		{$email_config = $email_setting['live'];}
		else
		{
			$email_config = $email_setting['development'];
		}

		if(isset($options['to'])&&isset($options['subject'])&& (isset($msg)&& $msg==TRUE))
		{
			$insertdata=array(	'email_id'=>isset($options['to'])?$options['to']:'',
								'subject'=>isset($options['subject'])?$options['subject']:'',
					  			'inserted_on'=>date('Y-m-d H:i:s')
						  	);
			date_default_timezone_set('Etc/UTC');
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPDebug  	= 2;                    
			$mail->Debugoutput	= 'html';
			$mail->Host         = $email_config['Host'];      
			$mail->Port         = $email_config['Port'];                   
			$mail->SMTPSecure   = $email_config['SMTPSecure'];                 
			$mail->SMTPAuth     = $email_config['SMTPAuth'];                  
			$mail->Username     = $email_config['Username']; 
			$mail->Password     = $email_config['Password'];
			$mail->SetFrom($email_config['from_email'], $email_config['from_name']);
			$mail->AddReplyTo($email_config['reply_to'],$email_config['reply_name']);
			$mail->Subject    	= $options['subject'];
			$mail->AltBody    	= "";

			$mail->MsgHTML($msg);
			$mail->addAddress($options['to']);
			if(isset($options['attach']) && $options['attach'])
			{
				for($j=0;$j<count($options['attach']);$j++)
				{
				   $mail->addAttachment($options['attach'][$j]);
				}
			}
			if(!$mail->Send())
			{
				/*Add Line to track the email sent */
				$insertdata['status']='F';
				$insert_id=$this->email_model->insert_email_details($insertdata);
				return false;
			} 
			else
			{
				/*Add Line to track the  email sent*/
				$insertdata['status']='T';
				$insert_id=$this->email_model->insert_email_details($insertdata);
				return true;
			}
		}
		else{return false;} 
	}
	/*
	------------------------------------------------------------
	Author :Mahadev Mandole                  Date : 21/06/2016
	------------------------------------------------------------
	*/
	public function single_emaildetails()
	{
		if($this->input->is_ajax_request())
		{
			$id=trim($this->input->post('id'));
			$email_details = $this->email_model->fetch_single_email_detail($id);
			$email_details->email_data=unserialize($email_details->email_data);
			$data['email_details']=$email_details;
			$this->load->view($email_details->template,$data);
		}else { redirect(base_url()); }

	}
	/* 
	------------------------------------------------------------
	Author :Mahadev Mandole                  Date : 17/06/2016
	------------------------------------------------------------
	*/
	public function email_history()
	{
		$data = array();
		$tablename='tbl_email';	
		$data['email_list']=$this->email_model->fetch_email_details($tablename);
		$data['content']='mail/sent_email_status';
		$this->template->load_admin($data);
	}
	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:22-07-2016
	--------------------------------------------------------------------------------------------------------------
	*/
	public function email_track()
	{
		$data['content']='mail/email_track';
		$data['email_track']=$this->email_model->fetch_email_track();
		$this->template->load_admin($data);
	}
	public function update_email_track()
	{
		$track=$this->input->post('email_track');
		if ($track)
		{
			$track='Y';
		}
		else
		{
			$track='N';
		}
		$insertdata=array('keep_track'=>$track);
		$result=$this->email_model->insertUpdate_email_track($insertdata);
		if($result)
		{
			$this->json->jsonReturn(array("valid"=>true, "msg"=>'Your request has been submitted !'));
		} 
		else
		{
			$this->json->jsonReturn(array("valid"=>false,"msg"=>'Error while updatig track details'));
		}
					
	}
			


}