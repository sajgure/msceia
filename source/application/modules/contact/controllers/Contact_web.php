<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_web extends Base_Controller {

  
 /*
  -------------------------------------------------------------
  Author  : Mohammad Shafi        Date: 11 apr 20
  -------------------------------------------------------------
  */

  public function __construct()
  {
      parent::__construct(); 
     
      $this->load->model('common_model');
      $this->load->library('email_sent');
      $this->load->helper('sms_helper');
  
  }
  public function contacts_list()
  {
    $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
    $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
    $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
  	$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
  	$this->load->view('contacts_list',$data);
  }
  public function reply_contact()
  {
    $contact_id=$this->input->post('id');
    $data['contact_data']=$this->common_model->selectDetailsWhr('tbl_contact','contact_id',$contact_id);
    $view=$this->load->view('reply_contact',$data,TRUE);
    $this->json->jsonReturn(array(
      'valid'=>true,
      'view'=>$view
    ));
  }
  public function sent_message()
  {
    $contact_id=$this->input->post("id");
    $mobile_number=$this->input->post("mobile_number");
    $email=$this->input->post("email");
    $message=$this->input->post("message");
    $data=array('status'=>'Solved','reply'=>$message);
    $result=$this->common_model->updateDetails('tbl_contact','contact_id',$contact_id,$data);
    if($result)
    {
      $datavalue["message"]=$message;
      $subject = 'Query Solution of your Problem';
      $msg_body = '<html><body>';
      $msg_body ='<h3>Hello,<h3>';
      $msg_body .= '<span><b>Email is: </b>'.$email.'</span><br>';
      $msg_body .= '<span><b>Message is: </b>'.$message.'.</span>';
      $msg_body .= '</html></body>';
      $alt_msg = 'Email Successfully Send ';
      $data1=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg);      
      $email_id[]=array('email_id'=>$email);
      $mail_result=$this->email_sent->mail_sent_by_gmail_webmail($data1,$email_id);      
      unset($email_id);
      sendSms($mobile_number,$message);
      if($mail_result)
      {        
        $this->json->jsonReturn(array(
            'state'=>true,
            'msg'=>'Email Send Successfully!',
            'redirect'=>'contact-list'
        ));                
      }
      else
      {

        $this->json->jsonReturn(array(
          'state'=>false,
          'msg'=>'Error While Sending Email!'
        ));
      }
    }
  }
}