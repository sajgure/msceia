<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu_api extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 04 March 20
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
        $this->load->model('standard/standard_model');
    }

    /*
        function for set Submenu data.
    */
	public function _setSubmenu($details=null) 
    {
        $details = $this->decryptArray($details);
        if(isset($details['submenu_id']) && !empty($details['submenu_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }

        $validation_error='';
       
        if($this->validation_Submenu_details($details))
        { 
            if($details)
            {
                $Submenu_data=array(
                    'Submenu_name'=>$details['submenu_name'],
                    'icon'=>$details['icon'],
                    'action'=>$details['action'],
                    'menu_id'=>$details['menu_id'],
                    'modified_by'=>1,
                    'modified_on'=>date('Y-m-d H:i:s'),
                    'submenu_id'=>isset($details['submenu_id'])?$details['submenu_id']:NULL

                );
                // $Submenu_data['inserted_by']=1;
                // $Submenu_data['inserted_on']=date('Y-m-d H:i:s');
                // $submenu_id = $this->standard_model->single_insert('tbl_submenu',$Submenu_data);
                // $Submenu_data['submenu_id']=$submenu_id;
                // $Submenu_data = $this->encryptArray($Submenu_data);
                // return array(
                //     'msg'=>'Submenu Saved!',
                //     'state'=>true,
                //     'details'=>$Submenu_data
                // );
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $Submenu_data['inserted_by']=1;
                    $Submenu_data['inserted_on']=date('Y-m-d H:i:s');
                    $Submenu_data['display']='Y';
                    $Submenu_data['in_use']='Y';
                    $submenu_id= $this->standard_model->single_insert('tbl_submenu',$Submenu_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Submenu!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $Submenu_data['submenu_id']=$submenu_id;
                        $Submenu_data= $this->encryptArray($Submenu_data);
                        return array(
                            'state'=>true,
                            'msg'=>'Submenu Added Successfully!',
                            'details'=>$Submenu_data
                        );
                    }
                }
                else
                {                                                   
                    $submenu_id= $this->standard_model->single_insert('tbl_submenu',$Submenu_data);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Submenu!',
                            'details'=>$error_msg
                            );
                    }
                    else
                    {
                        $Submenu_data['submenu_id']=$submenu_id;
                        $Submenu_data= $this->encryptArray($Submenu_data);                
                        return array(
                            'state'=>true,
                            'msg'=>'Submenu Updated Successfully!',
                            'details'=>$Submenu_data
                            );
                    }
                }   
            }
            else
            {
                return array(
                    'msg'=>'Submenu Failed to Saved!',
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
        function for hide Submenu data.
    */
    public function _hideSubmenu($details=null)
    {
        $details = $this->decryptArray($details);
        if(isset($details['submenu_id']))
        {

            $submenu_id=$details['submenu_id'];
            $Submenu_data=array(
                'in_use'=>'N'
            );
            $result=$this->standard_model->updateRecord('tbl_Submenu','submenu_id',$submenu_id,$Submenu_data);
            #echo $this->db->last_query();
            if($result)
            {
                $resdata = $this->standard_model->selectAllWhr('tbl_Submenu','submenu_id',$details['submenu_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $Submenu_data = $this->encryptArray($res);
                return array(
                   'msg'=>'Record Hide Successfully!',
                   'state'=>true,
                   'details'=>$Submenu_data
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Submenu';
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
               'msg'=>'Submenu id Required!',
               'details'=>false
            );
        }
        
    }
    /*
        function for restore Submenu data.
    */
    public function _restoreSubmenu($details=null)
    {
        $details = $this->decryptArray($details);
        
        if(isset($details['submenu_id']))
        {
            $submenu_id=$details['submenu_id'];

            $Submenu_data=array(
                'in_use'=>'Y'
            );
            $result=$this->standard_model->updateRecord('tbl_Submenu','submenu_id',$submenu_id,$Submenu_data);
            if($result)
            {
                
                $resdata = $this->standard_model->selectAllWhr('tbl_Submenu','submenu_id',$details['submenu_id']);
                foreach ($resdata as $res) {
                    # code...
                }
                $Submenu_data = $this->encryptArray($res);
                return array(
                      'msg'=>'Record Restore Succesfully!',
                      'state'=>true,
                      'details'=>$Submenu_data
                );
            }
            else
            {
                    $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore Submenu';
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
               'msg'=>'Submenu id Required!',
               'details'=>false
            );
        }

    }
     /*
        function for delete Submenu data.
    */
    public function _deleteSubmenu($details=null)
    {


        if(isset($details['submenu_id']))
        {
            $details = $this->decryptArray($details);
       
            $submenu_id=$details['submenu_id'];

            $Submenu_data=array(
                'display'=>'N',
            );
            $result=$this->standard_model->updateRecord('tbl_submenu','submenu_id',$submenu_id,$Submenu_data);
            if($result)
            {
                $details = $this->encryptArray($details);
                return array(
                      'msg'=>'Record Delete Succesfully!',
                      'state'=>true,
                      'details'=>$details
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to delete submenu id';
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
               'msg'=>'submenu id Required!',
               'details'=>false
            );
        }
       

    }

     /*
        function for fetch Submenu data.
    */
    public function _getSubmenu($details=false)
    {
        $details = $this->decryptArray($details);
       
        if(isset($details['all']))
        {
            $results = $this->standard_model->selectAll('tbl_submenu');
            
        }
        else if(isset($details['submenu_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_submenu','submenu_id',$details['submenu_id']);
            
        }
        else
        {
            $results = $this->standard_model->selectAll('tbl_submenu','in_use','Y');
            
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
        function for validate Submenu data.
    */

    public function validation_Submenu_details($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
            array(
              'submenu_id'=>isset($details['submenu_id']) ? $details['submenu_id'] :'',
              'menu_id'=>isset($details['menu_id']) ? $details['menu_id'] :'',
              'submenu_name'=>isset($details['submenu_name']) ? $details['submenu_name'] :'',
              'action'=>isset($details['action']) ? $details['action'] :'',
              'icon'=>isset($details['icon']) ? $details['icon'] :'',
            
            )
        );
           
        $this->form_validation->set_rules('action','submenu link ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z -]{1,30})$/]'),
            array(
                'required'=>'Submenu link is Required',
                'max_length'=>'maximum length should be 30 for link',
                'regex_match'=>'Invalid Submenu link.'
            )
        );

        $this->form_validation->set_rules('icon','Submenu icon ',
        array('required','max_length[30]','regex_match[/^([A-Za-z -][A-Za-z -]{1,30})$/]'),
            array(
                'required'=>'Submenu name is Required',
                'max_length'=>'maximum length should be 30 for icon',
                'regex_match'=>'Only alphabets are allowed for icon.'
            )
        );

        $this->form_validation->set_rules('submenu_name','submenu name ',
        array('required','max_length[30]','regex_match[/^([A-Za-z ][A-Za-z -]{1,30})$/]'),
            array(
                'required'=>'Submenu name is Required',
                'max_length'=>'maximum length should be 30 for name',
                'regex_match'=>'Only alphabets are allowed for name.'
            )
        );
        
        $this->form_validation->set_rules('submenu_id','submenu id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'Submenu id should have at Least 1 Number',
                'max_length'=>'Submenu id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed.',
            )
        );
        $this->form_validation->set_rules('menu_id','menu id',
        array('min_length[1]','max_length[5]','regex_match[/^([0-9][0-9]{0,4})$/]'),
            array(
                'min_length'=>'menu id should have at Least 1 Number',
                'max_length'=>'menu id should not have more than 5 Number',
                'regex_match'=>'Only numbers are allowed.',
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
