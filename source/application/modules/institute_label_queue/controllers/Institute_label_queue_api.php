<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_label_queue_api extends Base_Controller 
{

  	public function __construct()
  	{
    	parent::__construct(); 

    	$this->load->model('standard/standard_model');      
  	}//construct close

  	/*
  	-------------------------------------------------------------
  	Author  : Mrudul Thite      Date: 03-12-2021
  	-------------------------------------------------------------
  	*/

  	public function _add_institute_label_queue($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['institute_label_queue_id']) && !empty($details['institute_label_queue_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($details)
        {
            $user_id= $this->session->userdata('user_id');
            // print_r($user_id);die();
            $institute_label_queue = array
              (
                'institute_label_queue_id'=>isset($details['institute_label_queue_id'])?$details['institute_label_queue_id']:NULL,
                'district_id'=>$details['district_id'],
                'status'=>isset($details['status'])?$details['status']:'0',
                'modified_by'=>$user_id
              );
            
            
            
            if(!isset($details['institute_label_queue_id']) && empty($details['institute_label_queue_id']))
            {
                $institute_label_queue['inserted_by']=$user_id;
                $institute_label_queue['inserted_on']=date('Y-m-d H:i:s');
            }
            $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
            if($flag==0)
            {
                
                $institute_label_queue_id= $this->standard_model->single_insert('tbl_institute_label_queue',$institute_label_queue);
                
                
                if($error_msg && !empty($error_msg) )
                {                                                       
                    return array(
                        'state'=>false,
                        'msg'=>'Unable To Add institute_label_queue!',
                        'details'=>$error_msg
                    );
                }
                else
                {
                    $institute_label_queue['institute_label_queue_id']=$institute_label_queue_id;
                    $institute_label_queue= $this->encryptArray($institute_label_queue);
                    return array(
                        'state'=>true,
                        'msg'=>'institute_label_queue Added Successfully!',
                        'details'=>$institute_label_queue
                    );
                }
            }
            else
            {                                                   
                $institute_label_queue_id= $this->standard_model->single_insert('tbl_institute_label_queue',$institute_label_queue);
                if($error_msg && !empty($error_msg) )
                {                                                       
                    return array(
                        'state'=>false,
                        'msg'=>'Unable to Update institute_label_queue!',
                        'details'=>$error_msg
                    );
                }
                else
                {
                    $institute_label_queue['institute_label_queue_id']=$institute_label_queue_id;
                    $institute_label_queue= $this->encryptArray($institute_label_queue);                
                    return array(
                        'state'=>true,
                        'msg'=>'institute_label_queue Updated Successfully!',
                        'details'=>$institute_label_queue
                    );
                }
            }   
        }
        else
        {
            return array(
                'state'=>False,
                'msg'=>'institute_label_queue Failed To Saved!',
                'details'=>false
            );
        }
    }  
}//class close

