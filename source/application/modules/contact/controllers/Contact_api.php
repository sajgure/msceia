<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact_api extends Base_Controller {

  public function __construct()
  {
      parent::__construct(); 
     
      $this->load->model('standard/standard_model');
  
  }
 /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 17/03/2020
  -------------------------------------------------------------
  */
  public function _get_contact($details=false)
 {
        $details = $this->decryptArray($details);
        if(isset($details['contact_id']))
        {
        $results = $this->standard_model->selectAllWhr('tbl_contact','contact_id',$details['contact_id']);
        }
        else if(isset($details['all']))
        {
        $results= $this->standard_model->selectAll('tbl_contact');
        }
        else
        {
        $results= $this->standard_model->selectAll('tbl_contact','in_use','Y');
        }
        
        if($results)
        {
            $data=array();
                foreach ($results as $result)
                {
                  $data[] = (array)$result;  
                }
                if(isset($data) && is_array($data)){
                $result = $this->encryptArray($data);
                 }
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
            'details'=>$details['contact_id']
        );
        }
 }
	/*
	-------------------------------------------------------------
	Author 	: Nikhil Swami				Date: 17/03/2020
	-------------------------------------------------------------
	*/
  public function _set_contact($details=false)
  {
       $validation_error='';
       $details = $this->decryptArray($details);
       if($this->validation_contact($details))
      { 
        if($details)
            {
              $contact = array(
                               'name'=>$details['name'],
                               'email'=>$details['email'],
                               'mobile_number'=>$details['mobile_number'],
                               'message'=>$details['message'],
                               'reply'=>$details['reply'],
                               'status'=>$details['status'],
                               'modified_by'=>1,
                               'contact_id'=>isset($details['contact_id'])?$details['contact_id']:NULL
                              );
                   if(!isset($details['contact_id']) && empty($details['contact_id']))
                   {
                     $contact['inserted_by']=1;
                     $contact['inserted_on']=date('Y-m-d');
                   }
              $contact_id = $this->standard_model->single_insert('tbl_contact',$contact);
              $contact['contact_id']=$contact_id;
              $contact= $this->encryptArray($contact);
              return array(
                    'msg'=>'Contact Saved!',
                    'state'=>true,
                    'details'=>$contact
                  );
            }
            else
            {
                return array(
                    'msg'=>'contact Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                  );
            }

        }else
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
  Author  : Nikhil Swami        Date: 17/03/2020
  -------------------------------------------------------------
  */
  public function _hide_contact($details=false)
  {
        $details = $this->decryptArray($details);
        if(isset($details['contact_id']))
        {
            $id=$details['contact_id'];
            $contact=array(
            'in_use'=>'N',
            );
            $results = $this->standard_model->updateRecord('tbl_contact','contact_id',$id,$contact);
            if($results)
            {
                $results = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Contact Hidden!',
                    'details'=>$results
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Contact';
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
            'msg'=>'contact_id Required!',
            );
        }
    }


  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 17/03/2020
  -------------------------------------------------------------
  */
  public function _restore_contact($details=false)
  {
        $details = $this->decryptArray($details);
        if(isset($details['contact_id']))
        {
            $id=$details['contact_id'];
            $contact=array(
            'in_use'=>'Y',
            );
            $results = $this->standard_model->updateRecord('tbl_contact','contact_id',$id,$contact);
            if($results)
            {
                $results = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Contact Restore!',
                    'details'=>$results
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore contact';
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
            'msg'=>'contact_id Required!',
            );
        }
    }
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 17/03/2020
  -------------------------------------------------------------
  */
  public function _permanent_delete_contact($details=false)
  {
        if(isset($details['contact_id']))
        {     $details = $this->decryptArray($details);
            $id=$details['contact_id'];
           
            $contact=array(
                    'display'=>'N',
                );
            $results = $this->standard_model->updateRecord('tbl_contact','contact_id',$id,$contact);
            if($results)
            {
                
                 $results = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Contact Delete!',
                    'details'=>$results
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete contact';
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
            'msg'=>'contact_id Required!',
            );
        }
    } 
  /*
  -------------------------------------------------------------
  Author  : Nikhil Swami        Date: 17/03/2020
  -------------------------------------------------------------
  */
  public function validation_contact($details)
  {
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
    array(
        'name'=>isset($details['name']) ? $details['name'] :'',
        'email'=>isset($details['email']) ? $details['email'] :'',
        'mobile_number'=>isset($details['mobile_number']) ? $details['mobile_number'] :'',
        )
    );
    $this->form_validation->set_rules('name','name ',
    array('required'),
    array(
        'required'=>'name is Required',
       
        )
    );
     $this->form_validation->set_rules('email','email',
    array('required','min_length[2]','max_length[45]','regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/]'),
    array(
         'required'=>'email is Required',
         'min_length'=>'email should have at Least2 Number',
         'max_length'=>'email should not have more than 45 Number',
         'regex_match'=>' Only alphanumeric chars and special char _ - . are allowed. '
          )
    );
     $this->form_validation->set_rules('mobile_number','mobile_number',
    array('required','regex_match[/^[4-9][\d]{9}$/]'),
    array(
        'required'=>'mobile_number is Required',
        'regex_match'=>'Only numbers are allowed.'
      )
    );
    if($this->form_validation->run()==true)
      {
        return true;
      }else{
        return false;
      }
  }
}
