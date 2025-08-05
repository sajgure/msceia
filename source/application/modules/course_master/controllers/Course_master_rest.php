<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Course_master_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/    
	public function __construct()     
  	{
	    parent::__construct();
	    $this->load->module('course_master/course_master_api');
    }
     
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function course_master_get($details=false)
	{
		$details = $this->get();
		$response = $this->course_master_api->_get_course_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function course_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->course_master_api->_set_course_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_course_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->course_master_api->_hide_course_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_course_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->course_master_api->_restore_course_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function delete_course_master_delete()  
	  {	  
		
  		$details['course_master_id']= $this->uri->segment(2);
		$response = $this->course_master_api->_delete_course_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	// public function delete_course_master_post($details=false)
 //    {	
 //  		$details = $this->post();
	// 	$response = $this->course_master_api->_delete_course_master($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }

} //EOF  