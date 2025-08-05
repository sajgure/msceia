<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_api extends Base_Controller {

  public function __construct()
  {
      parent::__construct(); 
     
      $this->load->model('standard/standard_model');
      $this->load->model('standard/common_model');
      $this->load->model('common_model');
      $this->load->model('institute/institute_model');
      $this->load->library('email_sent');
      // $this->load->module('Student/student_api');

  
  }
  /*
  -------------------------------------------------------------
  Author  : Bismilla Sanade       Date: 26/03/2020
  -------------------------------------------------------------
  */

  public function _get_Appear_stud_list($details=false)
  {
     $id=$details['inst_id'];

     $result = $this->common_model->getAppearStudList('tbl_stud','inst_id',$id);

     if($result)
     {
        return array(
              'msg'=>'Succesfully Fetch Record!',
              'state'=>true,
              'details'=>$result
        );
     }
     else
     {
         return array(
              'msg'=>'Unable Fetch Record!',
              'state'=>false,
              'details'=>false
             );
     }
  }
  /*
  -------------------------------------------------------------
  Author    : Bismilla Sanade                Date: 26/03/2020
  Modified  : Apurva Bandelwar               Date: 15/04/2021
  -------------------------------------------------------------
  */

    public function _get_Appear_stud_count($details=false)
    {
        $inst_id=$details['inst_id'];
        $stud_data=$this->custom_model->getappearstudentcount($inst_id);
        //$stud_data=$this->common_model->getAppearStudCount($inst_id);    
        $single_institute_data = $this->institute_model->fetch_inst_data_union($inst_id);
        $current_batch_data=$this->custom_model->fetch_current_batch();
        $cur_bname = $current_batch_data[0]->batch_name;
    
        $upcoming_batch_data=$this->custom_model->fetch_upcoming_batch();
        if($upcoming_batch_data){
          $upc_bname = $upcoming_batch_data[0]->batch_name;
          $upc_stud_details = "$upc_bname = $stud_data->upc ";
        }else{
          $upc_stud_details = "";
        }
    
        // print_r($upcoming_batch_data[0]->batch_name); die;
        $rs = ($stud_data->count140 * 140)+($stud_data->count100 * 100)+($stud_data->count75 * 75);
        $pay_details =  "($stud_data->count140 * 140)+($stud_data->count100 * 100)+($stud_data->count75 * 75)";
        $stud_details =  "$cur_bname = $stud_data->cur";
        
        /*if($total_student>=10)
        {
          $rs = 140 * $stud_data->appeared_count;
        }
        else
        {
          $rs = 160 * $stud_data->appeared_count;
        }
        $count =0;
        if(isset($stud_data) && !empty($stud_data))
        {
          $count = count(array($stud_data));
        }*/
        return array(
          'valid'=>TRUE,
            'cnt'=>$stud_data->count,
            'rs'=>$rs,
            'stud_details'=>$stud_details,
            '$upc_stud_details' => $upc_stud_details ,
            'pay_details'=>$pay_details,
            'inst_id'=>$inst_id,
            'institute_name'=>$single_institute_data->institute_name,
            'institute_code'=>$single_institute_data->institute_code,
            'institute_contact'=>$single_institute_data->institute_contact,
            'institute_mail'=>$single_institute_data->institute_mail
        );
  }
  /*
  -------------------------------------------------------------
  Author    : Bismilla Sanade                Date: 26/03/2020
  Modified  : Apurva Bandelwar               Date: 15/04/2021
  -------------------------------------------------------------
  */
  
  public function _set_adjust_fee($details=null) 
  {
        $validation_error='';
        $inst_id=$details['institute_id'];
        $user_id= $this->session->userdata('user_id');
        if($this->validation_fees_details($details))
        {         
            $fees_data=array(
                'institute_id'=>$details['institute_id'],
                'institute_name'=>$details['institute_name'],
                'institute_code'=>$details['institute_code'],
                'mobile'=>$details['mobile'],
                'email'=>$details['email'],
                'depositer_name'=>'msceiateam',
                'total_student'=>$details['total_student'],
                'total_amount'=>$details['total_amount'],
                'deposite_date'=>$details['deposite_date'],
                'payment_mode'=>$details['payment_mode'],
                'transaction_no'=>$details['transaction_no'],
                'fees_exemption_id' =>$details['fees_exemption_id'],
                'remark' =>$details['remark'],                    
                'utr_image'=>$details['utr_image'],
                'status'=>$details['status'],
                'payment_status' =>'payment_unsuccess',
                //'modified_by' => $details['modified_by'],
                'modified_by' =>$user_id,
                'payment_id'=>isset($details['payment_id'])?$details['payment_id']:NULL
            );
            $this->db->trans_start();
            $payment_id = $this->standard_model->single_insert('tbl_payment',$fees_data);
            $fees_data['payment_id'] = $payment_id;
            $current_batch_data=$this->custom_model->get_current_batch();
            $c_batch_id = $current_batch_data->batch_id;
            $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
            $u_batch_id = $upcoming_batch_data->batch_id;
            $stud_data = $this->custom_model->select_latest_batch_apper_student1($inst_id,$c_batch_id,$u_batch_id);
            //$stud_data = $this->custom_model->select_latest_batch_apper_student($inst_id);
            // echo $this->db->last_query(); die;
            // print_r($payment_id); die;
            // foreach ($stud_data as $key) {
            //     $stud[] = array('student_id' => $key->student_id, 'student_status' => 'payment', 'payment_id'=>$payment_id);
            // }
            foreach ($stud_data as $key) {
                $stud = array('student_id' => $key->student_id,'student_status' => 'payment', 'payment_id'=>$payment_id);
                $this->common_model->updateDetails('tbl_student', 'student_id', $key->student_id, $stud);
                $stud = array();
            }
            // $cnt = count($stud);
            // for ($i = 0; $i < $cnt; $i++) {
            //     $this->common_model->updateDetails('tbl_student', 'student_id', $stud[$i]['student_id'], $stud);
            // }
            $ins_data = array('download_status'=>'Active');
            $single_institute_data = $this->common_model->selectDetailsWhr('view_institute_apr24','institute_id',$inst_id);
            $this->common_model->updateDetails('tbl_institute','institute_id',$inst_id,$ins_data);
            $result = $this->db->trans_complete();

            if($result)
            {
              return array(
                    'msg'=>'Fees Details Saved!',
                    'state'=>true,
                    'details'=>$fees_data
              );
            }
            else
            {
                return array(
                    'msg'=>'Fees Details Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            return array(
                  'msg'=>'Validation is failed',
                  'state'=>False,
                  'details'=>$validation_error
            );
        }
         

    } 

  /*
  -------------------------------------------------------------
  Author  : Bismilla Sanade       Date: 26/03/2020
  -------------------------------------------------------------
  */
  public function validation_fees_details($details)
  {
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
         array(  
          'institute_name'=>isset($details['institute_name']) ? $details['institute_name'] :'',
          'institute_code'=>isset($details['institute_code']) ? $details['institute_code'] :'',
          'mobile'=>isset($details['mobile']) ? $details['mobile'] :'',
          'email'=>isset($details['email']) ? $details['email'] :'',
          'total_student'=>isset($details['total_student']) ? $details['total_student'] :'',
          'total_amount'=>isset($details['total_amount']) ? $details['total_amount'] :'',
          'payment_mode'=>isset($details['payment_mode']) ? $details['payment_mode'] :'',
          'transaction_no'=>isset($details['transaction_no']) ? $details['transaction_no'] :'',
          'payment_id'=>isset($details['payment_id']) ? $details['payment_id'] :'',
          'deposite_date'=>isset($details['deposite_date']) ? $details['deposite_date'] :'',
          )
      );
     $this->form_validation->set_rules('institute_id','institute id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                    'min_length'=>'institute id should have at Least 1 Number',
                    'max_length'=>'institute id should not have more than 5 Number',
                    'regex_match'=>'Only numbers are allowed in fees id.',
            )
        );
    $this->form_validation->set_rules('payment_id','fees id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                    'min_length'=>'fees id should have at Least 1 Number',
                    'max_length'=>'fees id should not have more than 5 Number',
                    'regex_match'=>'Only numbers are allowed in fees id.',
            )
        );
    $this->form_validation->set_rules('transaction_no','transaction number',
        array('min_length[1]','max_length[100]'/*,'regex_match[/^([0-9][0-9]{0,100})$/]'*/),
            array(
                    'min_length'=>'transaction number should have at Least 1 Number',
                    'max_length'=>'transaction number should not have more than 100 Number',
                    /*'regex_match'=>'Only numbers are allowed in transaction no.',*/
            )
        );
    $this->form_validation->set_rules('total_amount', 'total_amount',array('min_length[1]','max_length[5]','regex_match[/^([+-]?([0-9]*[.])?[0-9]+)$/]'),
        array(                                                                                      
            'min_length'=>'Min 1 Number Required.',
            'max_length'=>'Max 5 Number allowed.',
            'regex_match'=>'total amount Should Have Only Numbers '
            )
        );
    $this->form_validation->set_rules('institute_name','institute name ',
    array('required','min_length[2]','max_length[200]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{2,200})$/]'),
    array(
        'required'=>'institute name is Required',
        'min_length'=>'institute name at Least 2 Number',
        'max_length'=>'institute name should not have more than 200 Number',
        'regex_match'=>'institute name should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
        )
    );
    
    $this->form_validation->set_rules('total_student','total student',
    array('required','min_length[0]','max_length[5]','regex_match[/^([0-9][0-9]{0,5})$/]'),
    array(
          'required'=>'total student is Required',
          'min_length'=>'total student should have at Least 0 Number',
          'max_length'=>'total student should not have more than 5 Number',
          'regex_match'=>'total student should Only numbers '
          )
    );
    $this->form_validation->set_rules('institute_code','institute code',
    array('required','min_length[0]','max_length[5]','regex_match[/^([0-9][0-9]{0,5})$/]'),
    array(
          'required'=>'institute code is Required',
          'min_length'=>'institute code should have at Least 0 Number',
          'max_length'=>'institute code should not have more than 5 Number',
          'regex_match'=>'institute code should Only numbers '
          )
    );
    /*$this->form_validation->set_rules('mobile','institute mobile',
    array('required','regex_match[/^[4-9][\d]{9}$/]'),
    array(
          'required'=>'institute mobile is Required',
          'regex_match'=>'Only numbers are allowed in mobile.'
        )
    );
    $this->form_validation->set_rules('email','email',
    array('required','min_length[2]','max_length[45]','regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/]'),
    array(
          'required'=>'institute_mail is Required',
          'min_length'=>'institute_mail should have at Least2 Number',
          'max_length'=>'institute_mail should not have more than 45 Number',
          'regex_match'=>' Only alphanumeric chars and special char _ - . are allowed. '
        )
    );*/
    $this->form_validation->set_rules('payment_mode','payment_mode',
    array('required','max_length[30]','regex_match[/^([A-Za-z][A-Za-z]{1,30})$/]'),
    array(
          'required'=>'payment_mode is Required',
          'max_length'=>'payment_mode should not have more than 30 Number',
          'regex_match'=>'Only alphabets are allowed in payment_mode.'
        )
    );
    $this->form_validation->set_rules('deposite_date','deposite_date',
    array('required'),
    array(
          'required'=>'deposite_date is Required',
        )
    );
    if($this->form_validation->run()==true)
      {
        return true;
      }else{
        return false;
      }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _get_institute($details=false)
  {
        // $details = $this->decryptArray($details);
        $id=$details['institute_id'];
        $result = $this->standard_model->selectAllWhr('tbl_institute','institute_id','stud_status',$id,'Appeared');
                                                        // $tblname,$where,$condition
        if($result)
        {
            return array(
                  'msg'=>'Succesfully Fetch Record!',
                  'state'=>true,
                  'details'=>$result
            );
            $result= $this->encryptArray($result);

        }
        else
        {
             return array(
                  'msg'=>'Unable Fetch Record!',
                  'state'=>false,
                  'details'=>false
                 );
        }
  }
  /*
	-------------------------------------------------------------
	Author 	: Nikhil Swami				            Date: 28/02/2020
  Modified By  : Apurva Bandelwar           Date: 19/03/2021
	-------------------------------------------------------------
	*/
  public function _set_institute($details=false)
  {
      // print_r($details);die;
      $validation_error='';
      $details = $this->decryptArray($details);
      if($this->validation_institute($details))
      { 
        if($details)
        {
          $user_id=$this->session->userdata('user_id');
          if(isset($details['institute_owner_dob']) && !empty($details['institute_owner_dob']))
          {
              $institute_owner_dob=date('Y-m-d',strtotime($details['institute_owner_dob']));
          }
          if(isset($details['institute_registration_date']) && !empty($details['institute_registration_date']))
          {
              $institute_registration_date=date('Y-m-d',strtotime($details['institute_registration_date']));
          }
          
          if(!isset($details['institute_status']) && empty($details['institute_status']))
          {
            $details['institute_status']= "Block";
          }
          if(!isset($details['db_status']) && empty($details['db_status']))
          {
            $details['db_status']= "pending";
          }
          if(!isset($details['download_status']) && empty($details['download_status']))
          {
            $details['download_status']= "Deactive";
          }
          if(!isset($details['sms_status']) && empty($details['sms_status']))
          {
            $details['sms_status']= "Not Send";
          }
          if(!isset($details['birthday_status']) && empty($details['birthday_status']))
          {
            $details['birthday_status']= "Not Send";
          }
          if(!isset($details['installation_count']) && empty($details['installation_count']))
          {
            $details['installation_count']= "1";
          }
          if(!isset($details['mac_id']) && empty($details['mac_id']))
          {
            $details['mac_id']= NULL;
          }
          if(!isset($details['exam_mac_id']) && empty($details['exam_mac_id']))
          {
            $details['exam_mac_id']= NULL;
          }
          if(!isset($details['courier_no']) && empty($details['courier_no']))
          {
            $details['courier_no']= NULL;
          }
          $institute = array(
                           'role_id'=>3,
                           'institute_name'=>$details['institute_name'],
                           'institute_code'=>$details['institute_code'],
                           // 'institute_password'=>$details['institute_password'],
                           'institute_address'=>$details['institute_address'],
                           'district_id'=>$details['district_id'],
                           'institute_taluka'=>$details['institute_taluka'],
                           'institute_pincode'=>$details['institute_pincode'],
                           'institute_contact'=>$details['institute_contact'],
                           'institute_alternate_contact'=>$details['institute_alternate_contact'],
                           'institute_mail'=>$details['institute_mail'],
                           'institute_owner_name'=>$details['institute_owner_name'],
                           'institute_owner_dob'=>$institute_owner_dob,
                           'owner_age'=>$details['owner_age'],
                           'institute_principal_name'=>$details['institute_principal_name'],
                           'institute_owner_qualification'=>$details['institute_owner_qualification'],
                           'institute_principal_qualification'=>$details['institute_principal_qualification'],
                           'principal_age'=>$details['principal_age'],
                           'nominee_name'=>$details['nominee_name'],
                           'nominee_age'=>$details['nominee_age'],
                           'relation'=>$details['relation'],
                           'institute_owner_photo'=>$details['institute_owner_photo'],
                           'institute_registration_date'=>$institute_registration_date,
                           'institute_status'=>$details['institute_status'],
                           'db_status'=>$details['db_status'],
                           'download_status'=>$details['download_status'],
                           'installation_count'=>$details['installation_count'],
                           'courier_no'=>$details['courier_no'],
                           'sms_status'=>$details['sms_status'],
                           'birthday_status'=>$details['birthday_status'],
                           'mac_id'=>$details['mac_id'],
                           'exam_mac_id'=>$details['exam_mac_id'],
                           'modified_by'=>$user_id,
                           'institute_id'=>isset($details['institute_id'])?$details['institute_id']:NULL
                          );
          if(!isset($details['institute_id']) && empty($details['institute_id']))
          {
              $institute_password=rand('10000','99999');
              $institute['inserted_by']=$user_id;
              $institute['inserted_on']=date('Y-m-d');
              $institute['institute_password']=$institute_password;
              $institute_id = $this->standard_model->single_insert('tbl_institute',$institute);
              $institute['institute_id']=$institute_id;
              // $institute= $this->encryptArray($institute);
              $id = $institute['institute_id']; 
              $data=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$id);
              // echo $this->db->last_query(); die;
              if($data)
              {
                $email=$data->institute_mail;
                $mobile=$data->institute_contact;
                $password=$data->institute_password;

                $sms = "Welcome to MSCEIA. Your Institute has been registered Successfully! Wait for your verification mail.";

                $datavalue['institute_name'] = $data->institute_name;
                $datavalue['institute_code'] = $data->institute_code;
                $datavalue['institute_password'] =  $data->institute_password;
                $subject = 'Welcome to MSCEIA!';
                $msg_body=$this->load->view("mailer/reg",$datavalue,true);
                $alt_msg = 'Welcome to MSCEIA!';                  
                $data1=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg);             
                // print_r($data1); die;
                $email_id1[]=array('email_id'=>$data->institute_mail); 
                $message = 'Welcome to MSCEIA!';
                $mail_result=$this->email_sent->mail_sent_by_gmail_webmail($data1,$email_id1); 
                unset($email_id); 
                sendSms($mobile,$sms);
              }

              return array(
                'msg'=>'Institute Registered Succesfully!',
                'state'=>true,
                'details'=>$institute
              );
          }
          else{

              $institute_id = $this->standard_model->single_insert('tbl_institute',$institute);
              return array(
                'msg'=>'Institute Information Updated Succesfully!',
                'state'=>true,
                'details'=>$institute
              );
          }
        }
        else
        {
          return array(
                'state'=>False, 
                'msg'=>'Institute Failed to Saved!',
                'details'=>false
              );
        }
    }else
      {
        $validation_error = validation_errors();
        return array(
          'state'=>False,
          'msg'=>$validation_error,
          'details'=>'Validation is failed'
        );
      }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  modified_by: Mrudul Thite     Date: 04/07/2020
  Hide method edited with whole record return.
  -------------------------------------------------------------
  */
  public function _hide_institute($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['institute_id']))
    {
      $id=$details['institute_id'];
      $records= array('in_use'=>'N');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      $resdata = $this->standard_model->selectAllWhr('tbl_institute','institute_id',$details['institute_id']);
      if($resdata)
         {
          $data=array();
                  foreach ($resdata as $result)
                    {
                      $data[] = (array)$result;  
                    }
                    if(isset($data) && is_array($data)){
                    $result = $this->encryptArray($data);
                     }
                  return array(
                      'state'=>true,
                      'msg'=>'Institute Hidden!',
                      'details'=>$result
                );
      }
      else
      {
          $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide institute';
          return array(
                       'state'=>false,
                       'msg'=>$message,
                       'details'=>false
                      ); 
      }
    } 
    else
      {
          return array(
                      'state'=>false,
                      'msg'=>'institute_id Required!',
                      'details'=>false
                     );
      }        
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _restore_institute($details=false)
  {
    $details = $this->decryptArray($details);
    if(isset($details['institute_id']))
    {
      $id=$details['institute_id'];
      $records= array('in_use'=>'Y');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      $resdata = $this->standard_model->selectAllWhr('tbl_institute','institute_id',$details['institute_id']);
      if($resdata)
         {
          $data=array();
                  foreach ($resdata as $result)
                    {
                      $data[] = (array)$result;  
                    }
                    if(isset($data) && is_array($data)){
                    $result = $this->encryptArray($data);
                     }
                  return array(
                      'state'=>true,
                      'msg'=>'Institute Restore!',
                      'details'=>$result
                );
      }
      else
      {
         $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to restore institute';
          return array(
                       'state'=>false,
                       'msg'=>$message,
                       'details'=>false
                      ); 
      }
    } 
    else
      {
          return array(
                      'state'=>false,
                      'msg'=>'institute_id Required!',
                      'details'=>false
                     );
      }         
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _permanent_delete_institute($details=false)
  {
    $id=$details['institute_id'];
    $records=array('display'=>'N');
    $result=$this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
    if($result)
    {
         return array(
                      'state'=>true,
                      'msg'=>'Institute delete!',
                      'details'=>$result    
                    );
    }
    else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Institute Failed to delete!',
                      'details'=>false
                    );  
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _block_institute_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('institute_status'=>'Block');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'Institute Block!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Institute Failed to Block!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _active_institute_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('institute_status'=>'active');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
      { 
        $data=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$id);
        if($data)
        {
          $email=$data->institute_mail;
          $mobile=$data->institute_contact;
          $password=$data->institute_password;

          $sms = "Welcome to MSCEIA. Your Institute has been registered Successfully! Wait for your verification mail.";

          $datavalue['institute_name'] = $data->institute_name;
          $datavalue['institute_code'] = $data->institute_code;
          $datavalue['institute_password'] = $data->institute_password;
          $datavalue['username'] = $data->institute_code;
          $subject = 'Institute username & Password';
          $msg_body=$this->load->view("mailer/emailregistration",$datavalue,true);
          $alt_msg = 'Welcome to MSCEIA!';                  
          $data1=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg);             
          // print_r($data1); die;
          $email_id1[]=array('email_id'=>$data->institute_mail); 
          $message = 'Institute username & Password';
          $mail_result=$this->email_sent->mail_sent_by_gmail_webmail($data1,$email_id1); 
          unset($email_id); 
          sendSms($mobile,$sms);
        }

          return array(
                      'state'=>true,
                      'msg'=>'Institute Active!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Institute Failed to Active!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _active_download_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('download_status'=>'active');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'Download status Active!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Download status failed to Active!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _deactive_download_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('download_status'=>'deactive');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'Download status Deactive!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Download status failed to Deactive!',
                      'details'=>false
                    );
        }
  }

  /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _pending_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'pending');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Pending!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Pending!',
                      'details'=>false
                    );
        }
  }

  /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _download_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'download');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Download!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Download!',
                      'details'=>false
                    );
        }
  }
  /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _install_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'install');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Install!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Install!',
                      'details'=>false
                    );
        }
  }

   /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _examDownload_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'exam download');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Exam download!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Exam download!',
                      'details'=>false
                    );
        }
  }

  /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _examInstall_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'exam install');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Exam install!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Exam install!',
                      'details'=>false
                    );
        }
  }

  /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function _upload_db_status($details=false)
  {
      $id=$details['institute_id'];
      $records= array('db_status'=>'upload');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'DB status Upload!',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'DB status failed to Upload!',
                      'details'=>false
                    );
        }
  }
   /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 28/02/2020
  Modified  : Rohini Mali               Date: 16/09/2021
  -------------------------------------------------------------
  */
  public function _reset_mac_id($details=false)
  {
      $id=$details['institute_id'];
      $records= array('mac_id'=>'');
      $result = $this->standard_model->updateRecord('tbl_institute','institute_id',$id,$records);
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'Mac Id Reset Successfully !',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Mac Id Failed to Reset Properly!',
                      'details'=>false
                    );
        }
  }

  /*
  -------------------------------------------------------------
  Author  : Rohini Mali        Date: 17/09/2021
  -------------------------------------------------------------
  */
  public function _reset_appear_student($details=false)
  {
      $id=$details['institute_id'];
      $records= array('student_status'=>'not_appear');
      $this->db->where(array('student_status!='=>'payment'));
      $result = $this->standard_model->updateRecord('tbl_student','institute_id',$id,$records);
                                                     
      if($result)
        { 
          return array(
                      'state'=>true,
                      'msg'=>'Student Status Reset Successfully !',
                      'details'=>$records
                    );
        }
        else
       {
          return array(
                      'state'=>false,
                      'msg'=>'Student Status Failed to Reset Properly !',
                      'details'=>false
                    );
        }
  }

   /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 24/03/2020
  -------------------------------------------------------------
  */
  public function _get_student($details=false)
  {
        // $id=$details['institute_id'];
        // $result = $this->standard_model->alljoin2tbl_whr('tbl_institute','tbl_student',$id,$id);
    if(isset($details['institute_id']))
        {
        $result = $this->standard_model->alljoin2tbl_whr('tbl_student','tbl_institute','institute_id','institute_id',$details['institute_id']);
        }
        if($result)
        {
            return array(
                  'msg'=>'Succesfully Fetch Record!',
                  'state'=>true,
                  'details'=>$result
            );
        }
        else
        {
             return array(
                  'msg'=>'Unable Fetch Record!',
                  'state'=>false,
                  'details'=>false
                 );
        }
  }

   /*
  -------------------------------------------------------------
  Author  : Mrudul Thite        Date: 24/03/2020
  modified : Mohammad Shafi     Date: 12/03/2021
  -------------------------------------------------------------
  */
  public function _smsSend($details=false)
  {
     
    $result = $this->standard_model->fetch_instiste_owner_birthdate($details);
   
     
    if(isset($result) && !empty($result))
    {
      foreach ($result as $key)
      {
          if(isset($key['institute_contact']) && !empty($key['institute_contact']))
          {

            $mobile_no=$key['institute_contact'];
           
            $subject=' Institute Owner Happy birthday to you from the MSCEIA team! I hope your day will be filled with lots of love and laughter! may all your birthday wishes come true.';

            sendSms($key['institute_contact'],$subject);

            $data= array('birthday_status'=>'Send');
            $this->standard_model->updateRecord('tbl_institute ','institute_id',$key['institute_id'],$data);
          }     
      }
      return array(
          'state'=>true,
          'msg'=>'Successfully',
          'details'=>'Wishes Send Successfully'
        );    
    }
        
    else
    {
            return array(
                        'state'=>false,
                        'msg'=>'Records not found!',
                        'details'=>false
            );
    }
  }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 28/02/2020
  -------------------------------------------------------------
  */
  public function validation_institute($details)
  {
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
    array(
        'institute_name'=>isset($details['institute_name']) ? $details['institute_name'] :'',
        'institute_code'=>isset($details['institute_code']) ? $details['institute_code'] :'',
        'institute_address'=>isset($details['institute_address']) ? $details['institute_address'] :'',
        'institute_pincode'=>isset($details['institute_pincode']) ? $details['institute_pincode'] :'',
        'institute_contact'=>isset($details['institute_contact']) ? $details['institute_contact'] :'',
        'institute_mail'=>isset($details['institute_mail']) ? $details['institute_mail'] :'',
        'institute_owner_name'=>isset($details['institute_owner_name']) ? $details['institute_owner_name'] :'',
        'institute_principal_name'=>isset($details['institute_principal_name']) ? $details['institute_principal_name'] :'',
        'institute_owner_dob'=>isset($details['institute_owner_dob']) ? $details['institute_owner_dob'] :'',
        'institute_registration_date'=>isset($details['institute_registration_date']) ? $details['institute_registration_date'] :'',
        )
    );
    $this->form_validation->set_rules('institute_name','institute name ',
    array('required','min_length[10]','max_length[200]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{10,200})$/]'),
    array(
        'required'=>'institute name is Required',
        'min_length'=>'institute name at Least 10 Number',
        'max_length'=>'institute name should not have more than 200 Number',
        'regex_match'=>'institute name should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
        )
    );
    $this->form_validation->set_rules('institute_code','institute code',
    array('required','min_length[0]','max_length[5]','regex_match[/^([0-9][0-9]{0,5})$/]'),
    array(
          'required'=>'institute code is Required',
          'min_length'=>'institute code should have at Least 0 Number',
          'max_length'=>'institute code should not have more than 5 Number',
          'regex_match'=>'institute code should Only numbers '
          )
    );
    $this->form_validation->set_rules('institute_address','institute address',
    array( 'required','max_length[200]'),
    array(
          'required'=>'institute address is Required',
          'max_length'=>'Everything (alphabets/ numbers / special char) should be allowed.'
        )
    );
    $this->form_validation->set_rules('institute_pincode','institute pincode',
    array('required','min_length[6]','max_length[6]','regex_match[/^([0-9]{1,6})$/]'),
    array(
          'required'=>'institute pincode is Required',
          'min_length'=>'institute pincode should have at Least 6 Number',
          'max_length'=>'institute pincode should not have more than 6 Number',
          'regex_match'=>'Only numbers allowed in Pincode.'
      )
    );
    $this->form_validation->set_rules('institute_contact','institute contact',
    array('required','regex_match[/^[4-9][\d]{9}$/]'),
    array(
          'required'=>'institute contact is Required',
          'regex_match'=>'Only numbers are allowed in Contact Number.'
        )
    );
    $this->form_validation->set_rules('institute_mail','institute_mail',
    array('required','min_length[2]','max_length[45]','regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
    array(
          'required'=>'institute_mail is Required',
          'min_length'=>'institute_mail should have at Least2 Number',
          'max_length'=>'institute_mail should not have more than 45 Number',
          'regex_match'=>' Only alphanumeric chars and special char _ - . are allowed in Email id. '
        )
    );
    $this->form_validation->set_rules('institute_owner_name','institute_owner_name',
    array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
    array(
          'required'=>'institute_owner_name is Required',
          'max_length'=>'institute_owner_name should not have more than 30 Number',
          'regex_match'=>'Only alphabets are allowed institute owner name.'
        )
    );
    $this->form_validation->set_rules('institute_principal_name','institute_principal_name',
    array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
    array(
          'required'=>'institute_principal_name is Required',
          'max_length'=>'institute_principal_name should not have more than 30 Number',
          'regex_match'=>'Only alphabets are allowed institute principal name.'
        )
    );
    $this->form_validation->set_rules('institute_owner_dob','institute_owner_dob',
    array('required'),
    array(
          'required'=>'institute_owner_dob is Required',
        )
    );
    $this->form_validation->set_rules('institute_registration_date','institute_registration_date',
    array('required'),
    array(
          'required'=>'institute_registration_date is Required',
        )
    );
    if($this->form_validation->run()==true)
      {
        return true;
      }else{
        return false;
      }
  }
   /*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:22/04/2020
    Modified: Mohammad Shafi                         Date:31/03/2021
	=================================================================================
	*/
	public function _active_link($details=false)
	{
    $details = $this->decryptArray($details);
		$institute_id=$details['institute_id'];
		if(isset($institute_id) && !empty($institute_id))
	  	{ 
        $user_id=$this->session->userdata('user_id');
		  	$result=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$institute_id);
        $var=$result->installation_count;
        if($var==0)
        {
          $var=$var+1;
          $results = $this->institute_model->active_link_data($details ,$var);
          if($results)
          {
              $results = $this->encryptArray($details);
              return array(
                'state'=>true,
                'msg'=>'Status Updated Successfully!',
                'details'=>$results
              ); 
          }
         else
          {
            return array(
              'state'=>False,
              'msg'=>'Oops! Something Went Wrong.',
              'details'=>False
            ); 
          }
        }
        else if($var)
        {
          $var=$var+1;
          $results = $this->institute_model->active_link_data($details ,$var);
          if($results)
          {
              $results = $this->encryptArray($details);
              return array(
                'state'=>true,
                'msg'=>'Status Updated Successfully!',
                'details'=>$results
              ); 
          }
         else
          {
            return array(
              'state'=>False,
              'msg'=>'Oops! Something Went Wrong.',
              'details'=>False
            ); 
          }
        }
        else
        {
          return array(
          'state'=>false,
          'msg'=>'Installation Count Not Found!',
          'details'=>false
        );
        }
      }
    else
    {
    		return array(
          'state'=>false,
          'msg'=>'institute_id Required!',
          'details'=>false
        );
    }
  }

  /*
	=================================================================================
  Author:Shubhangi Jagadale                        Date:22/04/2020
	=================================================================================
	*/
	public function _deactive_link($details=false)
	{
		$details = $this->decryptArray($details);
		if(isset($details['institute_id']))
		{
			$result = $this->institute_model->deactive_link_data($details);
			if($result)
			{
				$result = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Status Updated Successfully!',
					'details'=>$result
				); 
			}
			else{
				return array(
					'state'=>False,
					'msg'=>'Oops! Something Went Wrong.',
					'details'=>False
				); 
			}
		}
	}
  /*
	=================================================================================
  Author:Shubhangi Jagadale                        Date:22/04/2020
	=================================================================================
	*/
	public function _reactive_link($details=false)
	{
    $details = $this->decryptArray($details);
		$institute_id=$details['institute_id'];
		if(isset($institute_id) && !empty($institute_id))
		{ 
        $user_id=$this->session->userdata('user_id');
		  	$result=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$institute_id);
        $var=$result->installation_count;
        if($var)
        {
          $var=$var+1;
          $results = $this->institute_model->reactive_link_data($details,$var);
          if($results)
           {
               $results = $this->encryptArray($details);
               return array(
                 'state'=>true,
                 'msg'=>'Status Updated Successfully!',
                 'details'=>$results
               ); 
           }
          else
           {
             return array(
               'state'=>False,
               'msg'=>'Oops! Something Went Wrong.',
               'details'=>False
             ); 
           }
         }
         else{
           return array(
           'state'=>false,
           'msg'=>'Installation Count Not Found!',
           'details'=>false
         );
      }
    }
     else
     {
     		return array(
           'state'=>false,
           'msg'=>'institute_id Required!',
           'details'=>false
         );
    }
  }

  public function _change_institute_password($details=false)
    {
        // print_r($details);die();
        $current_pass=$details['current_password'];
        $confirm_password=$details['confirm_pass'];
        $new_password=$details['new_password'];
        $institute_id=$details['institute_id'];
     
        $result = $this->standard_model->selectAllWhr('tbl_institute','institute_id',$institute_id);
        // print_r($result);die();
        $data=array(
          'institute_password'=>$new_password,
        );
        
        // print_r($institute_password);die();
        if($result)
        {
          foreach ($result as $key) 
          {
          $institute_password=$key->institute_password;
          }
            if($institute_password == $current_pass)
            {
              if($new_password==$confirm_password)
              {

                $resultsnew = $this->standard_model->updateRecord('tbl_institute','institute_id',$institute_id,$data);
                if($resultsnew)
                {
                        return array(
                        'msg'=>'Password Changed Succesfully!',
                        'state'=>true,
                      
                       );
                }
                else
                {
                     return array(
                        'msg'=>'Unable To Change Password!',
                        'state'=>false,
                      
                       );
                }
              }else
              {
                return 
                array(
                 'msg'=>'New Password And Confirm Password Not Matching!',
                 'state'=>false,
                 'details'=>'New Password And Confirm Password Not Matching!'
                    );
              }
            }
            else
            {
              return array(
             'msg'=>'Password Not Match With Current Password!',
             'state'=>false,
              // 'details'=>$result
              );
            }
        }
        else
        {
            return array(
                'msg'=>'Unable To Find Institute!',
                'state'=>false,
                'details'=>false
            );
        }

    }

  public function _edit_stud_payment($details=false)
    {
        $id=$this->input->post('checkbox');
          foreach($id as $key)
          {
            // print_r($key);die();
            // $student_id=$value;
            // print_r($student_id);die();
          //    $data[]=array('student_id'=>$student_id,'student_status'=>'payment');

                // // $result=$this->common_model->update_batch('tbl_student',$data,'student_id');
                // $result=$this->standard_model->updateRecord('tbl_student','student_id',$student_id,$data);
                // echo $this->db->last_query();die();

                $stud = array('student_status' => 'payment', 'student_id'=>$key);
        $this->common_model->updateDetails('tbl_student', 'student_id', $key, $stud);
        $stud = array();
          }
          if($stud)
                {
                        return array(
                        'msg'=>'Status Changed Succesfully!',
                        'state'=>true,
                      
                       );
                }
                else
                {
                     return array(
                        'msg'=>'Unable To Status!',
                        'state'=>false,
                      
                       );
                }
    }
}

