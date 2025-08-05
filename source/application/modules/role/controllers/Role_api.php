<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Role_api extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->module('role/role_api');
        $this->load->model('standard/standard_model');
    }
    /*  
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    Purpose: Get list for role 
    parameter:none,all,user_id 
    response:return array(
            'state'=>TRUE,
            'msg'=>'Records Found!',
            'details'=>array(
                array(
                    'role_id'=>'1',
                    'role_name'=>'Security guard',
                    'role_desc'=> 'role desc'
                ),
                array(
                    'role_id'=>'2',
                    'role_name'=>'Security guard',
                    'role_desc'=> 'role desc'
                )
            )
        );
    */
    public function _get_role($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['role_id']))
        {
            $results = $this->standard_model->selectAllWhr('tbl_role','role_id',$details['role_id']);
        }
        else if(isset($details['all']))
        {
            $results= $this->standard_model->selectAll('tbl_role');
        }
        else 
        {
            $results= $this->standard_model->selectAll('tbl_role','in_use','Y');
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
                'msg'=>'Record Found!',
                'state'=>true,
                'details'=>$result
            );
            $result= $this->encryptArray($result);
        }
        else
        {
            return array(
            'msg'=>'Record not Found!',
            'state'=>false,
            'details'=>false
            );
        }
    }
    /*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    Purpose: Save role 
    parameter:role_name,role_desc,role_id
    response:
        return array(
            'state'=>TRUE,
            'msg'=>'New role added!',
            'details'=>$details
        );
    */
    public function _set_role($details=false)
    { 
        $validation_error='';
        $details = $this->decryptArray($details);
        if(isset($details['role_id']) && !empty($details['role_id'])){
            $flag=1;
        }
        else{
            $flag=0;
        }
        if($this->validationroledetails($details))
        {
            if($details)
            {
                $user_id= $this->session->userdata('user_id');
                $role = array(
                    'role_id'=>isset($details['role_id'])?$details['role_id']:NULL,
                    'role_name' =>$details['role_name'],
                    'role_desc' =>$details['role_desc'],
                    'modified_by'=>1,
                    'modified_on'=>date('Y-m-d H:i:s')
                );
                if(!isset($details['role_id']) && empty($details['role_id']))
                {
                    $role['inserted_by']=1;
                    $role['inserted_on']=date('Y-m-d H:i:s');
                }
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $role['inserted_by']=1;
                    $role['inserted_on']=date('Y-m-d H:i:s');
                    $role['display']='Y';
                    $role['in_use']='Y';
                    $role_id= $this->standard_model->single_insert('tbl_role',$role);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Role!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $role['role_id']=$role_id;
                        $role= $this->encryptArray($role);
                        return array(
                            'state'=>true,
                            'msg'=>'Role Added Successfully!',
                            'details'=>$role
                        );
                    }
                }
                else
                {                                                   
                    $role_id= $this->standard_model->single_insert('tbl_role',$role);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'Unable to Update Role!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $role['role_id']=$role_id;
                        $role= $this->encryptArray($role);                
                        return array(
                            'state'=>true,
                            'msg'=>'Role Updated Successfully!',
                            'details'=>$role
                        );
                    }
                }   
            }
            else
            {
                return array(
                    'state'=>False,
                    'msg'=>'role Failed to Saved!',
                    'details'=>false
                );
            }
        }
        else
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
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    validation in role
    */
    function validationroledetails($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
                'role_id'=>isset($details['role_id']) ? $details['role_id'] :'',
                'role_name'=>isset($details['role_name']) ? $details['role_name'] :'',
                'role_desc'=>isset($details['role_desc']) ? $details['role_desc'] :''
            )
        );
        $this->form_validation->set_rules('role_id', 'role_id',array('min_length[1]','max_length[11]','regex_match[/^([0-9][0-9]{0,10})$/]'),
        array(
            'min_length'=>'Min 1 Number required. ',
            'max_length'=>'Max 11 Number allowed. ',
            'regex_match'=>'role_id Only numbers are allowed.'
        ));
        $this->form_validation->set_rules('role_name', 'role_name',array('required','max_length[255]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{1,254})$/]'),
        array(
            'required'=>'Role Name  Required',
            'max_length'=>'Role Name Max 255 char allowed.',
            'regex_match'=>'Role Name Only Alphanumric Character and special character & ( ) / . ,  - _ | [ ] " : ; space are allowed.'
        ));
        $this->form_validation->set_rules('role_desc', 'role_desc',array('min_length[2]','max_length[500]'),
        array(
            'min_length'=>'Description Min 2 Character Required.',
            'max_length'=>'Description Max 500 Character Allowed.',
        ));
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
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    Purpose:- To hide role data.
    parameter:role_id
    response:
    return array(
        'state'=>TRUE,
        'msg'=>'Role hidden!',
        'details'=>$details
    );
    */
    public function _hide_role($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['role_id']))
        {
            $id=$details['role_id'];
        
            $role=array(
                'in_use'=>'N',
            );
            $results = $this->standard_model->updateRecord('tbl_role','role_id',$id,$role);
            if($results)
            {
                $fetchdata = $this->standard_model->selectAllWhr('tbl_role','role_id',$details['role_id']);
                if($fetchdata)
                {
                    $data=array();
                    foreach ($fetchdata as $result)
                    {
                        $data[] = (array)$result;  
                    }
                    if(isset($data) && is_array($data))
                    {
                       $result = $this->encryptArray($data);
                    }
                    return array(
                        'msg'=>'Record Hide Successfully!',
                        'state'=>true,
                        'details'=>$result
                    );
                }
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide Role!';
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
            'msg'=>'role_id Required!',
            );
        }
    }
    /*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    Purpose:- To restore role.
    parameter:role_id
    response: return array(
        'state'=>TRUE,
        'msg'=>'Role restored!',
        'details'=>$details
    );
    */
    public function _restore_role($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['role_id']))
        {
            $id=$details['role_id'];
            $role=array(
                'in_use'=>'Y',
            );
            $results = $this->standard_model->updateRecord('tbl_role','role_id',$id,$role);
            if($results)
            {
                $fetchdata = $this->standard_model->selectAllWhr('tbl_role','role_id',$details['role_id']);
                if($fetchdata)
                {
                   $data=array();
                    foreach ($fetchdata as $result)
                    {
                        $data[] = (array)$result;  
                    }
                    if(isset($data) && is_array($data)){
                        $result = $this->encryptArray($data);
                    }
                    return array(
                        'msg'=>'Record Restore Successfully!',
                        'state'=>true,
                        'details'=>$result
                    );
                } 
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Restore Role!';
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
            'msg'=>'role_id Required!',
            );
        }
    }
    /*
    =================================================================================
    Author:Shubhangi Jagadale                        Date:23/03/2020
    =================================================================================
    Purpose:- To Permanent delete role 
    parameter:role_id
    response:
    return array(
        'state'=>TRUE,
        'msg'=>'Role deleted!',
        'details'=>$details
    );
    
    */
    public function _permanent_delete_role($details=null)
    {  
        $details = $this->decryptArray($details);
        if(isset($details['role_id']))
        {    
            $id=$details['role_id'];
            $role=array(
                    'display'=>'N',
                );
            $results = $this->standard_model->updateRecord('tbl_role','role_id',$id,$role);
            if($results)
            {
                $results = $this->encryptArray($details);
                    return array(
                    'state'=>true,
                    'msg'=>'Record Delete Successfully!',
                    'details'=>$results
                );
            }
            else
            {
                $message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete Role';
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
            'msg'=>'role_id Required!',
            );
        }
    }
}