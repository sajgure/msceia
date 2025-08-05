<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_api extends Base_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
    $this->load->module('user/user_api');
    $this->load->model('standard/standard_model');
    
    }
    /*  
    =================================================================================
    Author:Bismilla Sanade                      Date:27/03/2020
    =================================================================================
    Purpose: change user password
    parameter:current password,new password
    */
    public function _change_user_password($details=false)
    {
        
        $current_pass=$details['current_password'];
        //$user_id=$this->session->userdata('user_id');
        $user_id=1;
     
        $result = $this->standard_model->selectAllWhr('tbl_user','user_id',$user_id);
        $data=array(
          'password'=>$details['new_password'],
        );
        if($result)
        {
              if($result->password == $current_pass)
              {

                 $resultsnew = $this->standard_model->updateRecord('tbl_user','user_id',$user_id,$data);
                 if($resultsnew)
                 {
                        return array(
                        'msg'=>'Password change succesfully.',
                        'state'=>true,
                      
                       );
                 }
                 else
                 {
                     return array(
                        'msg'=>'Unable to change password.',
                        'state'=>false,
                      
                       );
                 }

        
              }
              else
              {
                  return array(
               'msg'=>'password not match',
               'state'=>false,
              // 'details'=>$result
               );
        
              }
        }
        else
        {
             return array(
                'msg'=>'Unable to Find User!',
                'state'=>false,
                'details'=>false
            );
        }

    }
    /*  
    =================================================================================
    Author:Shubhangi Jagadale                        Date:24/03/2020
    =================================================================================
    Purpose: Get list for user 
    parameter:none,all,user_id 
	  */
    public function _get_user($details=false)
   {
     $details = $this->decryptArray($details);
     if(isset($details['user_id']))
		{
		 $results = $this->standard_model->alljoin2tbl_whr('tbl_user','tbl_role','role_id','user_id',$details['user_id']);
		}
		else if(isset($details['all'])){
		 $results= $this->standard_model->selectAllJoin('tbl_user','tbl_role','role_id');
		}
		else {
		   $results= $this->standard_model->selectAllJoin('tbl_user','tbl_role','role_id','in_use','Y');
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
  Author:Shubhangi Jagadale                        Date:24/03/2020
  =================================================================================
  Purpose: Save user 
  parameter:fullname,user_desc,user_id
	response:
	 return array(
      'state'=>TRUE,
      'msg'=>'New user added!',
      'details'=>$details
    );
  */
  public function _set_user($details=false)
  {
    $validation_error='';
    $details = $this->decryptArray($details);
    $rol_id=$details['role_id'];
		$role_id=$this->standard_model->selectAllWhr('tbl_role','role_id',$rol_id);
		if(isset($role_id) && !empty($role_id))
    {
      if($this->validationUserDetails($details))
      {
        if($details)
        {
            $user_id1= $this->session->userdata('user_id');
            $user = array(
                         'user_id'=>isset($details['user_id'])?$details['user_id']:NULL,
                        'role_id'=>$rol_id,
                        'fullname' =>$details['fullname'],
                        'email'=>$details['email'],
                        'mobile'=>$details['mobile'],
                        'username'=>$details['username'],
                        'password'=>$details['password'],
                        'city'=>$details['city'],
                        'address'=>$details['address'],
                        'pincode'=>$details['pincode'],
                        'user_image'=>$details['user_image'],
                        'modified_by'=>1,
                        'modified_on'=>date('Y-m-d H:i:s')
                    );
            if(!isset($details['user_id']) && empty($details['user_id']))
            {
                $user['inserted_by']=1;
                $user['inserted_on']=date('Y-m-d H:i:s');
            }
            $user_id = $this->standard_model->single_insert('tbl_user',$user);
            $user['user_id']=$user_id;
            $user= $this->encryptArray($user);
            if(isset($details['user_id']) && !empty($details['user_id']))
            {
            return array(
                        'state'=>true,
                        'msg'=>'User Records Updated Succesfully!',
                        'details'=>$user
                        );
            }
            else{
              return array(
                'state'=>true,
                'msg'=>'User Registered succesfully!',
                'details'=>$user
                );
            }
        }
        else
        {
            return array(
            'state'=>False,
            'msg'=>'user Failed to Saved!',
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
    else{ 
      return array(
      'state'=>false,
      'msg'=>'foreign key constraint fails',
      'details'=>false
      );}
  }
  /*
  =================================================================================
  Author:Shubhangi Jagadale                        Date:24/03/2020
  =================================================================================
  validation in user
  */
	function validationUserDetails($details)
  {
    $var1="'";
	 	$var2='"';
    $this->form_validation->set_error_delimiters('','');
    $this->form_validation->set_data(
      array(
          'user_id'=>isset($details['user_id']) ? $details['user_id'] :'',
          'fullname'=>isset($details['fullname']) ? $details['fullname'] :'',
          'email'=>isset($details['email']) ? $details['email'] :'',
          'mobile'=>isset($details['mobile']) ? $details['mobile'] :'',
          'username'=>isset($details['username']) ? $details['username'] :'',
          'password'=>isset($details['password']) ? $details['password'] :'',
          'city'=>isset($details['city']) ? $details['city'] :'',
          'pincode'=>isset($details['pincode']) ? $details['pincode'] :'',
          'address'=>isset($details['address']) ? $details['address'] :'',
          'role_id'=>isset($details['role_id']) ? $details['role_id'] :'',
          )
        );
    $this->form_validation->set_rules('user_id', 'user_id',array('min_length[1]','max_length[11]','regex_match[/^([0-9][0-9]{0,10})$/]'),
    array(
      'min_length'=>'user_id Min 1 Number required. ',
      'max_length'=>'user_id Max 11 Number allowed. ',
      'regex_match'=>'user_id Only numbers are allowed.'
    ));
    $this->form_validation->set_rules('role_id', 'role_id',array('required','min_length[1]','max_length[11]','regex_match[/^([0-9][0-9]{0,10})$/]'),
    array(
      'required'=>'role_id  Required',
      'min_length'=>'role_id Min 1 Number required. ',
      'max_length'=>'role_id Max 11 Number allowed. ',
      'regex_match'=>'role_id Only numbers are allowed.'
    ));
    $this->form_validation->set_rules('mobile', 'mobile',array('required','min_length[10]','max_length[10]','regex_match[/^([0-9][0-9]{0,10})$/]'),
    array(
      'required'=>'mobile  Required',
      'min_length'=>'mobile Min 10 Number required. ',
      'max_length'=>'mobile Max  10 Number allowed. ',
      'regex_match'=>'mobile Only numbers are allowed.'
    ));
    $this->form_validation->set_rules('pincode', 'pincode',array('required','min_length[1]','max_length[6]','regex_match[/^([0-9][0-9]{0,5})$/]'),
    array(
      'required'=>'pincode Required',
      'min_length'=>'pincode Min 1 Number required. ',
      'max_length'=>'pincode Max 6 Number allowed. ',
      'regex_match'=>'pincode Only numbers are allowed.'
    ));
    $this->form_validation->set_rules('fullname', 'fullname',array('required','min_length[2]','max_length[255]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[\]\"\:\;\s]{1,245})$/]'),
    array(
            'required'=>'Fullname is Required',
            'min_length'=>'Fullname Min 2 Number required. ',
            'max_length'=>'Fullname Max 8 Number allowed. ',
            'regex_match'=>'Fullname Only alphanumeric chars and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.'
    ));
    $this->form_validation->set_rules('username', 'username',array('required','min_length[2]','max_length[255]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[;\s]{1,245})$/]'),
		array(
      'required'=>'username is Required', 
      'min_length'=>'username Min 2 Number required. ',
			'max_length'=>'username Min 255 char required',
			'regex_match'=>'username Only alphanumeric chars and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.'
    ));
    $this->form_validation->set_rules('city', 'city',array('required','min_length[2]','max_length[255]','regex_match[/^([A-Z0-9a-z][A-Z0-9a-z\(\)\&\-\.\,\_\'\/\[;\s]{1,245})$/]'),
		array(
      'required'=>'city is Required', 
      'min_length'=>'city Min 2 Number required. ',
			'max_length'=>'city Min 255 char required',
			'regex_match'=>'city Only alphanumeric chars and special char & ( ) / . ,  - _ | [ ] " : ; space are allowed.'
    ));
    $this->form_validation->set_rules('email', 'email',array('required','regex_match[/^(\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+)$/]'),
		array(
			'required'=>'email is Required', 
			'regex_match'=>'email should be Email Format.'
		));
    $this->form_validation->set_rules('address', 'address',array('min_length[2]','max_length[500]',"regex_match[/^([A-Za-z0-9][A-Za-z0-9\,\(\)\-\_\/\[\]\'\"\:\;\&\|\s]{1,499})$/]"),
		array(
			'min_length'=>'address Min 2 Character Required.',
			'max_length'=>'address Max 500 Character Allowed.',
		  'regex_match'=>'address Should Have  Only Alphanumeric charcter and Special Character ,'.$var1.'( )'.$var2.' - _ /[]  & : ; | & Space are Allowed.'
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
  Author:Shubhangi Jagadale                        Date:24/03/2020
  =================================================================================
  Purpose:- To hide user data.
	parameter:user_id
  response:
   return array(
      'state'=>TRUE,
      'msg'=>'user hidden!',
      'details'=>$details
    );
  */
  public function _hide_user($details=false)
  {
     $details = $this->decryptArray($details);
    if(isset($details['user_id']))
		{
			$id=$details['user_id'];
		
			$user=array(
				'in_use'=>'N',
			);
			$results = $this->standard_model->updateRecord('tbl_user','user_id',$id,$user);
			if($results)
			{
			  $fetchdata = $this->standard_model->selectAllWhr('tbl_user','user_id',$details['user_id']);
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
            'msg'=>'Record Hide Succesfully!',
            'state'=>true,
            'details'=>$result
            );
          }
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Hide user';
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
			'msg'=>'user_id Required!',
			);
		}
  }
  /*
  =================================================================================
  Author:Shubhangi Jagadale                        Date:24/03/2020
  =================================================================================
  Purpose:- To restore user.
  parameter:user_id
  response: return array(
      'state'=>TRUE,
      'msg'=>'user restored!',
      'details'=>$details
    );
  */
  public function _restore_user($details=false)
  {
    if(isset($details['user_id']))
		{
      $details = $this->decryptArray($details);
	  	$id=$details['user_id'];
	  	$user=array(
				'in_use'=>'Y',
			);
			$results = $this->standard_model->updateRecord('tbl_user','user_id',$id,$user);
			if($results)
				{
          $fetchdata = $this->standard_model->selectAllWhr('tbl_user','user_id',$details['user_id']);
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
            'msg'=>'Record Restore Succesfully!',
            'state'=>true,
            'details'=>$result
            );
          }
		  	}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to restore user';
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
			'msg'=>'user_id Required!',
			);
		}
   
  }
    /*
  =================================================================================
  Author:Shubhangi Jagadale                        Date:24/03/2020
  =================================================================================
  Purpose:- To Permanent delete user 
	parameter:user_id
	response:
	return array(
      'state'=>TRUE,
      'msg'=>'user deleted!',
      'details'=>$details
    );
  */
	public function _permanent_delete_user($details=null)
	{
    $details = $this->decryptArray($details);  
		if(isset($details['user_id']))
		{    
			$id=$details['user_id'];
	  	$user=array(
					'display'=>'N',
				);
			$results = $this->standard_model->updateRecord('tbl_user','user_id',$id,$user);
			if($results)
			{
        $results = $this->encryptArray($details);
				return array(
					'state'=>true,
					'msg'=>'Record Delete Succesfully!',
					'details'=>$results
				);
			}
			else
			{
				$message=isset($this->standard_model->error )? $this->standard_model->error['message']:'Unable to Delete user';
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
			'msg'=>'user_id Required!',
			);
		}
	}
}   












