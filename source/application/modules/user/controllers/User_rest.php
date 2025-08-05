<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class User_rest extends Rest_Controller 
{
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/  
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('user/user_api');
    }  
    /*
	=================================================================================
    Author:Bismilla Sanade                       Date:27-03-2020
    =================================================================================
	*/
	public function change_user_password_post($details=false)
	{
		//echo 'dffdf';
		$details = $this->post();
		$response = $this->user_api->_change_user_password($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/
	public function user_get($details=false)
	{
		$details = $this->get();
		$response = $this->user_api->_get_user($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/
	public function user_post($details=false)
	{
		$details = $this->post();
		$response = $this->user_api->_set_user($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/
	public function hide_user_post($details=false)
	{
		$details = $this->post();
		$response = $this->user_api->_hide_user($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/
	public function restore_user_post($details=false)
	{
	$details = $this->post();
		$response = $this->user_api->_restore_user($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
	/*
	=================================================================================
    Author:Shubhangi Jagadale                        Date:24-03-2020
    =================================================================================
	*/
	public function permanent_delete_user_delete()
	{
		$details['user_id']= $this->uri->segment(2);
		$response = $this->user_api->_permanent_delete_user($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
}
