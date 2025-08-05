<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authentication
{
 
	function _construct() 
	{
	    $CI =& get_instance();
	    $CI->load->database('database');
		$CI->load->library("session");
	}
	
	function chk_login()
	{
		$CI =& get_instance();
		$user = $CI->session->userdata('user_id');
		return ($user) ? $user : false;
	}

	function login($username,$password,$roleId)
	{
		$CI =& get_instance();
		if(isset($roleId) && !empty($roleId) && ($roleId==3))
		{
			$condition = array('institute_code' => $username, 'institute_password' => $password, 'institute_status'=>'Active', 'display'=>'Y');
			$CI->db->where($condition);
	    	$query = $CI->db->get_where("tbl_institute");
		}
		else
		{
			$condition1 = array('username'=>$username, 'password'=>$password, 'display'=>'Y');
			$CI->db->where($condition1);
			$query = $CI->db->get_where("tbl_user");
		}			

		if($query->num_rows()!=1)
		{
			return false;
		}
		else     
		{
			if(isset($roleId) && !empty($roleId) && ($roleId==3))
			{
				$CI->session->set_userdata("user_id",$query->row()->institute_id);
				$CI->session->set_userdata("role_id",$query->row()->role_id);
				$CI->session->set_userdata("institute_id",$query->row()->institute_id);
				$CI->session->set_userdata("institute_code",$query->row()->institute_code);
				$CI->session->set_userdata("institute_name",$query->row()->institute_name);
				$CI->session->set_userdata("email",$query->row()->institute_mail);
				$CI->session->set_userdata("mobile", $query->row()->institute_contact);	
				$CI->session->set_userdata("institute_owner_photo",$query->row()->institute_owner_photo);	
				$CI->session->set_userdata("ISlogin", true);         
				$CI->session->sess_expire_on_close = TRUE;
			}
			else
			{
				$CI->session->set_userdata("user_id",$query->row()->user_id);
				$CI->session->set_userdata("role_id",$query->row()->role_id);
				$CI->session->set_userdata("username",$query->row()->username);
				$CI->session->set_userdata("mobile",$query->row()->mobile);
				$CI->session->set_userdata("email",$query->row()->email);	
				$CI->session->set_userdata("ISlogin", true);         
				$CI->session->sess_expire_on_close = TRUE;
			}
			
		} 
		return true;        

	}
	
	
	function logout() 
	{	     
		$CI =& get_instance();
		$CI->session->unset_userdata("user_id");
		$CI->session->unset_userdata("institute_id");
		$CI->session->unset_userdata("role_id");
		$CI->session->unset_userdata("institute_code");
		$CI->session->unset_userdata("username");
		$CI->session->unset_userdata("fullname");
		$CI->session->unset_userdata("mobile");
		$CI->session->unset_userdata("email");
		$CI->session->unset_userdata("ISlogin");
	}


	function site_logout() 
	{	     
		$CI =& get_instance();
		$CI->session->unset_userdata("institute_id");
		$CI->session->unset_userdata("institute_name ");
		$CI->session->unset_userdata("institute_code");
		$CI->session->unset_userdata("role_id");
		$CI->session->unset_userdata("institute_contact");
		$CI->session->unset_userdata("institute_owner_photo");
		$CI->session->unset_userdata("ISlogin");
	}
	
} ?>
