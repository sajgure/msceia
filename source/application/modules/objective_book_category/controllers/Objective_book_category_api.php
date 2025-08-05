<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_category_api extends Base_Controller {

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
        function for set objective book category data.
    */
	public function _setObjective_book_category($details=null) 
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
        if($this->validation_Objective_book_category_details($details,$flag))
        { 
        
            if($details)
            {
                $Objective_book_category_data=array(
                    'category_id'=>isset($details['category_id'])?$details['category_id']:NULL,
                    'category_name'=>$details['category_name'],
                    'category_description'=>$details['category_description'],
                    'category_image'=>$details['category_image'],
                    'modified_by'=>$user_id,
                    'modified_on'=>date('Y-m-d H:i:s')
                );
                // $Objective_book_category_data['inserted_by']=1;
                // $Objective_book_category_data['inserted_on']=date('Y-m-d H:i:s');
                // $category_id = $this->standard_model->single_insert('tbl_objective_book_category',$Objective_book_category_data);
                // $Objective_book_category_data['category_id']=$category_id;
                // $Objective_book_category_data= $this->encryptArray($Objective_book_category_data);
                // return array(
                //     'msg'=>'New Category Added!',
                //     'state'=>true,
                //     'details'=>$Objective_book_category_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $Objective_book_category_data['inserted_by']=$user_id;
                    $Objective_book_category_data['inserted_on']=date('Y-m-d H:i:s');
                    $Objective_book_category_data['display']='Y';
                    $Objective_book_category_data['in_use']='Y';
                    $category_id= $this->standard_model->single_insert('tbl_objective_book_category',$Objective_book_category_data);
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
                        $Objective_book_category_data['category_id']=$category_id;
                        $Objective_book_category_data= $this->encryptArray($Objective_book_category_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Category Added Successfully!',
                            'details'=>$Objective_book_category_data
                        );
                    }
                }
                else
                {                                                   
                    $category_id= $this->standard_model->single_insert('tbl_objective_book_category',$Objective_book_category_data);
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
                        $Objective_book_category_data['category_id']=$category_id;
                        $Objective_book_category_data= $this->encryptArray($Objective_book_category_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Category Updated!',
                            'details'=>$Objective_book_category_data
                            );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'category Failed to Saved!',
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
        function for hide objective book category data.
    */
    public function _hideObjective_book_category($details=null)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['category_id']))
        {

            $category_id=$details['category_id'];
            $Objective_book_category_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_category','category_id',$category_id,$Objective_book_category_data);
            if($result)
            {
                 $resdata = $this->standard_model->selectAllWhr('tbl_objective_book_category','category_id',$details['category_id']);
                 foreach ($resdata as $res) {
                    # code...
                }
                 $Objective_book_category_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Hide Record!',
                   'state'=>true,
                   'details'=>$Objective_book_category_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Objective Book category';
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
               'msg'=>'category id Required!',
               'details'=>false
            );
        }
       
    }
    /*
        function for restore objective book category data.
    */
    public function _restoreObjective_book_category($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['category_id']))
        {


            $category_id=$details['category_id'];

            $Objective_book_category_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_category','category_id',$category_id,$Objective_book_category_data);
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_objective_book_category','category_id',$details['category_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $Objective_book_category_data = $this->encryptArray($res);
                return array(
                      'msg'=>'Restore Record!',
                      'state'=>true,
                      'details'=>$Objective_book_category_data
                );
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore category master';
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
               'msg'=>'category master id Required!',
               'details'=>false
            );
        }
       

    }
     /*
        function for delete objective book category data.
    */
    public function _deleteObjective_book_category($details=null)
    {
       
        if(isset($details['category_id']))
        {

            $details = $this->decryptArray($details);
       
            $category_id=$details['category_id'];

            $Objective_book_category_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_objective_book_category','category_id',$category_id,$Objective_book_category_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                      'msg'=>'Category Delete!',
                      'state'=>true,
                      'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete category master';
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
               'msg'=>'category master id Required!',
               'details'=>false
            );
        }
       

    }

     /*
        function for fetch objective book category data.
    */
    public function _getObjective_book_category($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_objective_book_category');
        }
        else if(isset($details['category_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_objective_book_category','category_id',$details['category_id']);
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_objective_book_category','in_use','Y');
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

    public function validation_Objective_book_category_details($details,$flag)
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
                    'required'=>'category name is Required',
                    'max_length'=>'maximum length should be 30 for name',
                    'regex_match'=>'Only alphabets are allowed for name.'                    
                )
            );

            $category_name = $details['category_name'];
            $flag1 = $this->standard_model->check_is_unique('tbl_objective_book_category','category_name',$category_name);
        }   
        else
        {
            $this->form_validation->set_rules('category_name','category name ',
            array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z ]{1,30})$/]'),
                    array(
                        'required'=>'category name is Required',
                        'max_length'=>'maximum length should be 30 for name',
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
