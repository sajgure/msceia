<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_category_api extends Base_Controller {

	/*
    -------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 24-01-2022
	-------------------------------------------------------------
    */
	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
        function for fetch gcc tbc book category data.
    -------------------------------------------------------------
    */
    public function _getGcc_tbc_book_category($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_category');
        }
        else if(isset($details['category_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_category','category_id',$details['category_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_gcc_tbc_book_category','in_use','Y');
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
        function for validate gcc tbc category data.
    -------------------------------------------------------------
    */
    public function validation_Gcc_tbc_book_category_details($details,$flag)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
                'category_id'=>isset($details['category_id']) ? $details['category_id'] :'',
                'category_name'=>isset($details['category_name']) ? $details['category_name'] :'',
                'category_description'=>isset($details['category_description']) ? $details['category_description'] :'',
            )
        );  
        if($flag==0)
        {
            $this->form_validation->set_rules('category_name','category name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                    'required'=>'Category name is Required',
                    'max_length'=>'Maximum length should be 30 for name',
                    'regex_match'=>'Only alphabets are allowed for name.'                    
                )
            );
            $category_name = $details['category_name'];
            $flag = $this->standard_model->check_is_unique('tbl_gcc_tbc_book_category','category_name',$category_name);
        }   
        else
        {
            $this->form_validation->set_rules('category_name','category name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                array(
                    'required'=>'Category name is Required',
                    'max_length'=>'Maximum length should be 30 for name',
                    'regex_match'=>'Only alphabets are allowed for name.'
                )
            );
        } 
       
        $this->form_validation->set_rules('category_description','category description',
        array('regex_match[/^[a-zA-Z0-9 _ * @]+$/]'),
            array(
                
                'regex_match'=>'Only alphabets are allowed description.'
            )
        );

        $this->form_validation->set_rules('category_id','category id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'category id should have at Least 1 Number',
                'max_length'=>'category id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed.',
            )
        );
        
        if($this->form_validation->run()==true)
        {
            if(true==$flag)
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
    /*
    -------------------------------------------------------------
        function for set gcc tbc book category data.
    -------------------------------------------------------------
    */
	public function _setGcc_tbc_book_category($details=null) 
    {
        $details = $this->decryptArray($details);
        $validation_error='';
        $user_id= $this->session->userdata('user_id'); 
        if(isset($details['category_id']) && !empty($details['category_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($this->validation_Gcc_tbc_book_category_details($details,$flag))
        { 
            if($details)
            {
                $book_category_data=array(
                    'category_id'=>isset($details['category_id'])?$details['category_id']:NULL,
                    'category_name'=>$details['category_name'],
                    'category_description'=>$details['category_description'],
                    'category_image'=>$details['category_image'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s')
                );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $book_category_data['inserted_by']=$user_id;
                    $book_category_data['inserted_on']=date('Y-m-d H:i:s');
                    $book_category_data['display']='Y';
                    $book_category_data['in_use']='Y';
                    $category_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_category',$book_category_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Category!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $book_category_data['category_id']=$category_id;
                        $book_category_data= $this->encryptArray($book_category_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Category Added Successfully!',
                            'details'=>$book_category_data
                        );
                    }
                }
                else
                {                                                   
                    $category_id= $this->standard_model->single_insert('tbl_gcc_tbc_book_category',$book_category_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Category!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $book_category_data['category_id']=$category_id;
                        $book_category_data= $this->encryptArray($book_category_data); 
                        return array(
                            'state'=>true,
                            'msg'=>'Category Updated Successfully!',
                            'details'=>$book_category_data
                        );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'Category Failed to Saved!',
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
                $validation_error = "Duplicate Entry For Category Name.";
            }
            return array(
                  'msg'=>$validation_error,
                  'state'=>False,
                  'details'=>'Validation is failed'
            );
        }
    }	
     /*
    -------------------------------------------------------------
        function for hide gcc tbc book category data.
    -------------------------------------------------------------
    */
    public function _hideGcc_tbc_book_category($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['category_id']))
        {
            $category_id=$details['category_id'];
            $book_category_data=array( 'in_use'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_category','category_id',$category_id,$book_category_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_category','category_id',$details['category_id']);
                 foreach ($resdata as $res) {
                    # code...
                }
                $book_category_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record Successfully!',
                   'state'=>true,
                   'details'=>$book_category_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Category';
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
               'msg'=>'Category id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
        function for restore gcc tbc book category data.
    -------------------------------------------------------------
    */
    public function _restoreGcc_tbc_book_category($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['category_id']))
        {
            $category_id=$details['category_id'];
            $book_category_data = array( 'in_use'=>'Y' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_category','category_id',$category_id,$book_category_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_gcc_tbc_book_category','category_id',$details['category_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $book_category_data = $this->encryptArray($res);
                return array(
                    'msg'=>'Restore Record Successfully!',
                    'state'=>true,
                    'details'=>$book_category_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Category';
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
               'msg'=>'Category id Required!',
               'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
        function for delete gcc tbc book category data.
    -------------------------------------------------------------
    */
    public function _deleteGcc_tbc_book_category($details=null)
    {
        if(isset($details['category_id']))
        {
            $details = $this->decryptArray($details);
            $category_id=$details['category_id'];
            $book_category_data = array( 'display'=>'N' );
            $result=$this->standard_model->updateRecord('tbl_gcc_tbc_book_category','category_id',$category_id,$book_category_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                      'msg'=>'Category Delete Successfully!',
                      'state'=>true,
                      'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete Category';
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
               'msg'=>'Category id Required!',
               'details'=>false
            );
        }
    }
}
