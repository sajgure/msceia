<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Student_batch_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('student_batch_change/student_batch_api');  
    }

	public function district_post()
	{
		$details = $this->post();
		$response = $this->student_batch_api->_setdistrict($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidedistrict_post()
	{
		$details = $this->post();
		$response = $this->district_api->_hidedistrict($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoredistrict_post()
	{
		$details = $this->post();
		$response = $this->district_api->_restoredistrict($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletedistrict_delete()
	{
		$details['district_id']=$this->uri->segment(2);
		$response = $this->district_api->_deletedistrict($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function district_get()
	{
		$details = $this->get();
		$response = $this->district_api->_getdistrict($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}


	
}