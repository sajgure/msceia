<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_notice_api extends Base_Controller {

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar        Date: 29-09-2022
    -------------------------------------------------------------
    */
    public function _get_objective_book_notice($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['objective_notice_id']))
        {
            $id=$details['objective_notice_id']; 
            $result = $this->standard_model->selectAllWhr('tbl_objective_book_notice','objective_notice_id',$id);
        }
        elseif (isset($details['all'])) 
        {
            $result= $this->standard_model->selectAll('tbl_objective_book_notice');
        }
        else
        {
            $result= $this->standard_model->selectAll('tbl_objective_book_notice','in_use','Y');
        }
        if($result)
        {
            return array(
                'msg'=>'Record Fetch Successfully!',
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
	Author  : Apurva Bandelwar        Date: 29-09-2022
	-------------------------------------------------------------
	*/
    public function _set_objective_book_notice($details=false)
    {
        $validation_error='';
        $details = $this->decryptArray($details);
        $user_id= $this->session->userdata('user_id'); 
        if(isset($details['objective_notice_id']) && !empty($details['objective_notice_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_objective_notice($details))
        {
            if(!isset($details['visibility']) && empty($details['visibility']))
            {
              $details['visibility']= "N";
            }
            if($details)
            {
                $objective_notice = array(
                    'objective_notice_name'=>$details['objective_notice_name'],
                    'objective_notice_desc'=>$details['objective_notice_desc'],
                    'visibility'=>$details['visibility'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'objective_notice_id'=>isset($details['objective_notice_id'])?$details['objective_notice_id']:''
                );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $objective_notice['inserted_by']=$user_id;
                    $objective_notice['inserted_on']=date('Y-m-d H:i:s');
                    $objective_notice['display']='Y';
                    $objective_notice['in_use']='Y';
                    $objective_notice_id= $this->standard_model->single_insert('tbl_objective_book_notice',$objective_notice);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Objective Notice!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $objective_notice['objective_notice_id']=$objective_notice_id;
                        $objective_notice= $this->encryptArray($objective_notice);
                        return array(
                            'state'=>true,
                            'msg'=>'Objective Notice Added Successfully!',
                            'details'=>$objective_notice
                        );
                    }
                }
                else
                {                                                   
                    $objective_notice_id= $this->standard_model->single_insert('tbl_objective_book_notice',$objective_notice);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Objective Notice!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $objective_notice['objective_notice_id']=$objective_notice_id;
                        $objective_notice= $this->encryptArray($objective_notice);                
                        return array(
                            'state'=>true,
                            'msg'=>'Objective Notice Updated Successfully!',
                            'details'=>$objective_notice
                        );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'Objective Notice Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            return array(
                'msg'=>$validation_error,
                'state'=>False,
                'details'=>'Validation is failed'
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar        Date: 29-09-2022
     -------------------------------------------------------------
    */
    public function _hide_objective_book_notice($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['objective_notice_id']))
        {
            $id=$details['objective_notice_id'];
            $records= array('in_use'=>'N');
            $result = $this->standard_model->updateRecord('tbl_objective_book_notice','objective_notice_id',$id,$records);
            if($result)
            { 
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Hide Successfully!',
                    'details'=>$result,
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide Objective Notice Master';
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
                'msg'=>'objective_notice_id Required!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar        Date: 29-09-2022
    -------------------------------------------------------------
    */
    public function _restore_objective_book_notice($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['objective_notice_id']))
        {
            $id=$details['objective_notice_id'];
            $records= array('in_use'=>'Y');
            $result = $this->standard_model->updateRecord('tbl_objective_book_notice','objective_notice_id',$id,$records);
            if($result)
            {
                $result= $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Restore Successfully!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to Restore Objective Notice Master';
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
                'msg'=>'objective_notice_id Required!',
                'details'=>false
            );
        }    
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar        Date: 29-09-2022
    -------------------------------------------------------------
    */
    public function _permanent_delete_objective_book_notice($details=false)
    {
        $details = $this->decryptArray($details);
        $id=$details['objective_notice_id'];
        $records=array('display'=>'N');
        $result=$this->standard_model->updateRecord('tbl_objective_book_notice','objective_notice_id',$id,$records);
        if($result)
        {
            $result = $this->encryptArray($details);
            return array(
                'state'=>true,
                'msg'=>'Record Delete Successfully!',
                'details'=>$result    
            );
        }
        else
        {
            return array(
                'state'=>false,
                'msg'=>'Record Failed to Delete!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar        Date: 29-09-2022
    -------------------------------------------------------------
    */
    public function validation_objective_notice($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
            'objective_notice_name'=>isset($details['objective_notice_name']) ? $details['objective_notice_name'] :'',
            'objective_notice_desc'=>isset($details['objective_notice_desc']) ? $details['objective_notice_desc'] :'',
            )
        );
        $this->form_validation->set_rules('objective_notice_name','objective_notice_name ',
        array('required'),
        array(
            'required'=>'Objective Notice Name is Required',
           
            )
        );
        $this->form_validation->set_rules('objective_notice_desc','objective_notice_desc',
        array('required','max_length[500]'),
        array(
              'required'=>'Objective Notice Descripation is Required',
              'max_length'=>'Objective Notice Descripation should not have more than 500 Number',
              )
        );
        if($this->form_validation->run()==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

