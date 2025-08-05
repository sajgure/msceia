<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creative_gallery_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 27 Feb 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set creative gallery data.
    */
	public function _setcreative_gallery($details=null) 
    {
        $user_id= $this->session->userdata('user_id');

        $details = $this->decryptArray($details);
        $validation_error='';
        //$details = $this->decryptArray($details);
        if(isset($details['creative_gallery_id']) && !empty($details['creative_gallery_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_creative_gallery_details($details,$flag))
        { 
            if($details)
            {
                $creative_gallery_data=array(
                    'album_name'=>$details['album_name'],
                    'image_name'=>$details['image_name'],
                    'image_upload'=>$details['image_upload'],
                  //  'visibility'=>$details['visibility'],
                    'creative_gallery_id'=>isset($details['creative_gallery_id'])?$details['creative_gallery_id']:NULL

                );
                // $creative_gallery_data['inserted_by']=1;
                // $creative_gallery_data['modified_by']='1';
                // $creative_gallery_data['inserted_on']=date('Y-m-d H:i:s');
                    
                // $creative_gallery_id = $this->standard_model->single_insert('tbl_creative_gallery',$creative_gallery_data);
                // $creative_gallery_data['creative_gallery_id']=$creative_gallery_id;
                // $creative_gallery_data= $this->encryptArray($creative_gallery_data);
                // return array(
                //       'msg'=>'Creative Gallery Saved!',
                //       'state'=>true,
                //       'details'=>$creative_gallery_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $creative_gallery_data['inserted_by']=$user_id;
                    $creative_gallery_data['inserted_on']=date('Y-m-d H:i:s');
                    $creative_gallery_data['display']='Y';
                    $creative_gallery_data['in_use']='Y';
                    $creative_gallery_id= $this->standard_model->single_insert('tbl_creative_gallery',$creative_gallery_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Creative Gallery!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $creative_gallery_data['creative_gallery_id']=$creative_gallery_id;
                        $creative_gallery_data= $this->encryptArray($creative_gallery_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Creative Gallery Added Successfully!',
                            'details'=>$creative_gallery_data
                        );
                    }
                }
                else
                {                                                   
                    $creative_gallery_id= $this->standard_model->single_insert('tbl_creative_gallery',$creative_gallery_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Creative Gallery!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $creative_gallery_data['creative_gallery_id']=$creative_gallery_id;
                        $creative_gallery_data= $this->encryptArray($creative_gallery_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Creative Gallery Updated Successfully!',
                            'details'=>$creative_gallery_data
                            );
                    }
                }       
            }
            else
            {
                return array(
                    'msg'=>'Creative Gallery Failed to Save!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            if(""==$validation_error)
            {
                $validation_error = "Duplicate Entry For Album Name";
            }
            return array(
                  'msg'=>$validation_error,
                  'state'=>False,
                  'details'=>'Validation is failed'
            );
        }
         

    }	
    /*
        function for hide creative gallery data.
    */
    public function _hidecreative_gallery($details=null)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['creative_gallery_id']))
        {
            $creative_gallery_id=$details['creative_gallery_id'];

            $creative_gallery_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_creative_gallery','creative_gallery_id',$creative_gallery_id,$creative_gallery_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_creative_gallery','creative_gallery_id',$details['creative_gallery_id']);
                 foreach($resdata as $res) {
                    # code...
                }
                $resdata=$this->encryptArray($res);
                return array(
                    'msg'=>'Record Hide Successfully!',
                    'state'=>true,
                    'details'=>$resdata
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to hide creative gallery';
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
               'msg'=>'creative gallery Failed to Hide!',
               'details'=>false
            );
            
        }
        

    }
    /*
        function for restore creative gallery data.
    */
    public function _restorecreative_gallery($details=null)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['creative_gallery_id']))
        {
            $creative_gallery_id=$details['creative_gallery_id'];

            $creative_gallery_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_creative_gallery','creative_gallery_id',$creative_gallery_id,$creative_gallery_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_creative_gallery','creative_gallery_id',$details['creative_gallery_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $creative_gallery_data= $this->encryptArray($res);
                return array(
                      'msg'=>'Record Restore Successfully!',
                      'state'=>true,
                      'details'=>$creative_gallery_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore creative gallery';
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
               'msg'=>'creative gallery Failed to restore!',
               'details'=>false
            );
        }
        

    }
    
    /*
        function for delete creative gallery data.
    */
    public function _deletecreative_gallery($details=null)
    {

        $details = $this->decryptArray($details);

       
        if(isset($details['creative_gallery_id']))
        {
            $creative_gallery_id=$details['creative_gallery_id'];

            $creative_gallery_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_creative_gallery','creative_gallery_id',$creative_gallery_id,$creative_gallery_data);
            if($result)
            {
                $creative_gallery_id = $this->encryptArray($details);
                return array(
                      'msg'=>'Record Delete Succesfully!',
                      'state'=>true,
                      'details'=>$creative_gallery_id
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete creative gallery';
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
               'msg'=>'creative gallery Failed to delete!',
               'details'=>false
            );
        }
        
    }
    /*
        function for fetch creative gallery data.
    */
    public function _getcreative_gallery($details=false)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_creative_gallery');
        }
        else if(isset($details['creative_gallery_id']))
        {

            $results = $this->standard_model->selectAllWhr('tbl_creative_gallery','creative_gallery_id',$details['creative_gallery_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_creative_gallery','in_use','Y');
        }


     //  $result= $this->encryptArray($result);
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
        function for validate creative gallery data.
    */

    public function validation_creative_gallery_details($details,$flag)
    {
        
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
                  'creative_gallery_id'=>isset($details['creative_gallery_id']) ? $details['creative_gallery_id'] :'',
                  'album_name'=>isset($details['album_name']) ? $details['album_name'] :'',
                  'image_name'=>isset($details['image_name']) ? $details['image_name'] :'',
                  
                )
        );

        if($flag==0)
        {
            $this->form_validation->set_rules('album_name','album name',
            array('required','max_length[30]','regex_match[/^([A-Za-z 0-9 () , @ . _ - &][A-Za-z 0-9 () , @ . _ - &]{1,30})$/]'),
                array(
                        'required'=>'album name is Required',
                        'max_length'=>'maximum length should be 30 for album name',
                        'regex_match'=>'Only alphabets are allowed for album name.'                  
                )
            );

            $album_name = $details['album_name'];
            $flag1 = $this->standard_model->check_is_unique('tbl_creative_gallery','album_name',$album_name);
        }
        else
        {
            $this->form_validation->set_rules('album_name','album name',
            array('required','max_length[30]','regex_match[/^([A-Za-z 0-9 () , @ . _ - &][A-Za-z 0-9 () , @ . _ - &]{1,30})$/]'),
                array(
                        'required'=>'album name is Required',
                        'max_length'=>'maximum length should be 30 for album name',
                        'regex_match'=>'Only alphabets are allowed for album name.'
                )
            );
        }

       
       
        $this->form_validation->set_rules('image_name','image name',
        array('required','max_length[80]','regex_match[/^([A-Za-z 0-9 () , @ . _ - &][A-Za-z 0-9 () , @ . _ - &]{1,500})$/]'),
            array(
                    'required'=>'image name is Required',
                    'max_length'=>'maximum length should be 80 for image name.',
                    'regex_match'=>'Only alphabets are allowed for image name.'
            )
        );
        $this->form_validation->set_rules('creative_gallery_id','creative_gallery_id id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                    'min_length'=>'creative gallery id should have at Least 1 Number',
                    'max_length'=>'creative gallery id should not have more than 5 Number',
                    'regex_match'=>'Only numbers are allowed for creative gallery id.',
            )
        );
             
        if($this->form_validation->run()==true)
        {
            if(true==$flag1)
            {
              return true;
            }   
              else
            {
              return false;
            }
        }
        else
        {
            return false;
        }
    }
    
}
