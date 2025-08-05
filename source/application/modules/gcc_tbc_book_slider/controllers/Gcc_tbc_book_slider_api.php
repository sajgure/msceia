<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_slider_api extends Base_Controller {

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */  
    //  function for fetch Gcc_tbc book slider data.
    public function _getGcc_tbc_book_slider($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_slider');
        }
        else if(isset($details['slider_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_slider','slider_id',$details['slider_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_slider','in_use','Y');
        }
        if($results)
        {
            $data=array();
            foreach ($results as $result)
            {
                $data[] = (array)$result;  
            }
            if(isset($data) && is_array($data))
            {
                $result = $this->encryptArray($data);
            }
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
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */
	public function _setGcc_tbc_book_slider($details=null) 
    {
        $details = $this->decryptArray($details);
        $validation_error='';
        $user_id= $this->session->userdata('user_id'); 
        if(isset($details['slider_id']) && !empty($details['slider_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_gcc_tbc_book_slider_details($details))
        { 
            if(!isset($details['visibility']) && empty($details['visibility']))
            {
              $details['visibility']= "N";
            }
            if($details)
            {
                $slider_data=array(
                    'slider_name'=>$details['slider_name'],
                    'slider_description'=>$details['slider_description'],
                    'visibility'=>$details['visibility'],
                    'image_upload'=>$details['image_upload'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'slider_id'=>isset($details['slider_id'])?$details['slider_id']:NULL
                );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $slider_data['inserted_by']=$user_id;
                    $slider_data['inserted_on']=date('Y-m-d H:i:s');
                    $slider_data['display']='Y';
                    $slider_data['in_use']='Y';
                    $slider_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_slider',$slider_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Slider!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $slider_data['slider_id']=$slider_id;
                        $slider_data= $this->encryptArray($slider_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Slider Added Successfully!',
                            'details'=>$slider_data
                        );
                    }
                }
                else
                {                                                   
                    $slider_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_slider',$slider_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Slider!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $slider_data['slider_id']=$slider_id;
                        $slider_data= $this->encryptArray($slider_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Slider Updated Successfully!',
                            'details'=>$slider_data
                            );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'Slider Failed to Saved!',
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
    }/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */  
    // function for validate committee data.
    public function validation_gcc_tbc_book_slider_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
              'slider_id'=>isset($details['slider_id']) ? $details['slider_id'] :'',
              'slider_name'=>isset($details['slider_name']) ? $details['slider_name'] :'',
              'slider_description'=>isset($details['slider_description']) ? $details['slider_description'] :'',
            )
        );
           
        $this->form_validation->set_rules('slider_name','slider name ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z 0-9 , ( ) _ @ # -]{1,30})$/]'),
            array(
                'required'=>'Slider name is Required',
                'max_length'=>'maximum length should be 30 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );

        $this->form_validation->set_rules('slider_description','slider description',
        array('regex_match[/^[a-zA-Z0-9 _ * @]+$/]'),
            array(
                
                'regex_match'=>'Only alphabets are allowed in description.'
            )
        );

        $this->form_validation->set_rules('slider_id','slider id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'Slider id should have at Least 1 Number',
                'max_length'=>'Slider id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in slider id.',
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
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */	
    // function for hide Gcc_tbc book slider data.
    public function _hideGcc_tbc_book_slider($details=null)
    { 
        $details = $this->decryptArray($details);
        if(isset($details['slider_id']))
        {
            $slider_id=$details['slider_id'];
            $slider_data=array( 'in_use'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_slider','slider_id',$slider_id,$slider_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_slider','slider_id',$details['slider_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $slider_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record Successfully!',
                   'state'=>true,
                   'details'=>$slider_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Gcc TBC Book Slider';
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
               'msg'=>'slider id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */  
    // function for restore Gcc_tbc book slider data.
    public function _restoreGcc_tbc_book_slider($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['slider_id']))
        {
            $slider_id=$details['slider_id'];
            $slider_data = array( 'in_use'=>'Y' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_slider','slider_id',$slider_id,$slider_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_slider','slider_id',$details['slider_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $slider_data = $this->encryptArray($res);
                return array(
                    'msg'=>'Restore Record Successfully!',
                    'state'=>true,
                    'details'=>$slider_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore slider master';
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
               'msg'=>'slider master id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */  
    // function for delete Gcc_tbc book slider data.
    public function _deleteGcc_tbc_book_slider($details=null)
    {
        if(isset($details['slider_id']))
        {
            $details = $this->decryptArray($details);
            $slider_id=$details['slider_id'];
            $slider_data = array( 'display'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_slider','slider_id',$slider_id,$slider_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                    'msg'=>'Slider Delete!',
                    'state'=>true,
                    'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete slider master';
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
               'msg'=>'slider master id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */  
    // function for validate committee data.
    public function validation_slider_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
              'slider_id'=>isset($details['slider_id']) ? $details['slider_id'] :'',
              'slider_name'=>isset($details['slider_name']) ? $details['slider_name'] :'',
              'slider_description'=>isset($details['slider_description']) ? $details['slider_description'] :'',
            )
        );
           
        $this->form_validation->set_rules('slider_name','slider name ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z 0-9 , ( ) _ @ # -]{1,30})$/]'),
            array(
                'required'=>'Slider name is Required',
                'max_length'=>'maximum length should be 30 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );

        $this->form_validation->set_rules('slider_description','slider description',
        array('regex_match[/^[a-zA-Z0-9 _ * @]+$/]'),
            array(
                
                'regex_match'=>'Only alphabets are allowed in description.'
            )
        );

        $this->form_validation->set_rules('slider_id','slider id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'Slider id should have at Least 1 Number',
                'max_length'=>'Slider id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed in slider id.',
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
