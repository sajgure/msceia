<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Home_page_commitee_rest extends Rest_Controller 
{  
	/*  
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/    
	public function __construct()     
  	{
	    parent::__construct();
	    $this->load->module('home_page_commitee/home_page_commitee_api');
    }
     
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function home_page_commitee_get($details=false)
	{
		$details = $this->get();
		$response = $this->home_page_commitee_api->_get_home_page_commitee($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function home_page_commitee_post($details=false)
	{
		$details = $this->post();
		$response = $this->home_page_commitee_api->_set_home_page_commitee($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_home_page_commitee_post($details=false)
	{
		$details = $this->post();
		$response = $this->home_page_commitee_api->_hide_home_page_commitee($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_home_page_commitee_post($details=false)
	{
		$details = $this->post();
		$response = $this->home_page_commitee_api->_restore_home_page_commitee($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function permanent_delete_home_page_commitee_delete()  
	  {	    
		
  		$details['home_page_commitee_id']= $this->uri->segment(2);
		$response = $this->home_page_commitee_api->_permanent_delete_home_page_commitee($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// public function delete_home_page_commitee_post($details=false)
 //    {	
 //  		$details = $this->post();
	// 	$response = $this->home_page_commitee_api->_delete_home_page_commitee($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }

} //EOF