<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_slider_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 27 Feb 20
    modified: Mohammad Shafi                Date: 16 mar 21
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set objective book slider data.
    */
	public function _setObjective_book_slider($details=null) 
    {
        $details = $this->decryptArray($details);
        $validation_error='';
        if(isset($details['slider_id']) && !empty($details['slider_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_Objective_book_slider_details($details))
        { 
            if(!isset($details['visibility']) && empty($details['visibility']))
            {
              $details['visibility']= "N";
            }
            if($details)
            {
                $Objective_book_slider_data=array(
                    'slider_name'=>$details['slider_name'],
                    'slider_description'=>$details['slider_description'],
                    'visibility'=>$details['visibility'],
                    'image_upload'=>$details['image_upload'],
                    'modified_by'=>1,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'slider_id'=>isset($details['slider_id'])?$details['slider_id']:NULL

                );
                // $Objective_book_slider_data['inserted_by']=1;
                // $Objective_book_slider_data['inserted_on']=date('Y-m-d H:i:s');
                // $slider_id = $this->standard_model->single_insert('tbl_objective_book_slider',$Objective_book_slider_data);
                // $Objective_book_slider_data['slider_id']=$slider_id;
                // $Objective_book_slider_data = $this->encryptArray($Objective_book_slider_data);
                // return array(
                //     'msg'=>'Slider Saved!',
                //     'state'=>true,
                //     'details'=>$Objective_book_slider_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $Objective_book_slider_data['inserted_by']=1;
                    $Objective_book_slider_data['inserted_on']=date('Y-m-d H:i:s');
                    $Objective_book_slider_data['display']='Y';
                    $Objective_book_slider_data['in_use']='Y';
                    $slider_id= $this->standard_model->single_insert('tbl_objective_book_slider',$Objective_book_slider_data);
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
                        $Objective_book_slider_data['slider_id']=$slider_id;
                        $Objective_book_slider_data= $this->encryptArray($Objective_book_slider_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Slider Added Successfully!',
                            'details'=>$Objective_book_slider_data
                        );
                    }
                }
                else
                {                                                   
                    $slider_id= $this->standard_model->single_insert('tbl_objective_book_slider',$Objective_book_slider_data);
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
                        $Objective_book_slider_data['slider_id']=$slider_id;
                        $Objective_book_slider_data= $this->encryptArray($Objective_book_slider_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Slider Updated!',
                            'details'=>$Objective_book_slider_data
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
    }	
     /*
        function for hide objective book slider data.
    */
    public function _hideObjective_book_slider($details=null)
    { 
         $details = $this->decryptArray($details);
        if(isset($details['slider_id']))
        {

            $slider_id=$details['slider_id'];
            $Objective_book_slider_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_slider','slider_id',$slider_id,$Objective_book_slider_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_objective_book_slider','slider_id',$details['slider_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $Objective_book_slider_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record!',
                   'state'=>true,
                   'details'=>$Objective_book_slider_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Objective Book Slider';
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
        function for restore objective book slider data.
    */
    public function _restoreObjective_book_slider($details=null)
    {
         $details = $this->decryptArray($details);
        
        if(isset($details['slider_id']))
        {
            $slider_id=$details['slider_id'];

            $Objective_book_slider_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_slider','slider_id',$slider_id,$Objective_book_slider_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_objective_book_slider','slider_id',$details['slider_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $Objective_book_slider_data = $this->encryptArray($res);
                return array(
                      'msg'=>'Restore Record!',
                      'state'=>true,
                      'details'=>$Objective_book_slider_data
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
        function for delete objective book slider data.
    */
    public function _deleteObjective_book_slider($details=null)
    {
        if(isset($details['slider_id']))
        {
            $details = $this->decryptArray($details);
            $slider_id=$details['slider_id'];

            $Objective_book_slider_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_slider','slider_id',$slider_id,$Objective_book_slider_data);
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
        function for fetch objective book slider data.
    */
    public function _getObjective_book_slider($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_objective_book_product');
        }
        else if(isset($details['slider_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_objective_book_slider','slider_id',$details['slider_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_objective_book_slider','in_use','Y');
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
        function for validate committee data.
    */

    public function validation_Objective_book_slider_details($details)
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
                'required'=>'slider name is Required',
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
                'min_length'=>'slider id should have at Least 1 Number',
                'max_length'=>'slider id should not have more than 5 Number',
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
