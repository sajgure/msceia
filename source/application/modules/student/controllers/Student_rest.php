<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Student_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('student/student_api');
    }
    /*
	=================================================================================
	Author:Bismilla Sanade                       Date:26/03/2020
	=================================================================================
	*/

	public function reset_mac_id_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_reset_mac_id($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:29/02/2020
	=================================================================================
	*/

	public function Student_post()
    {	
  		$details = $this->post();
		$response = $this->student_api->_set_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:29/02/2020
	=================================================================================
	*/
	public function student_get($details=false)
	{
		$details = $this->get();
		$response = $this->student_api->_get_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:29/02/2020
	=================================================================================
	*/
	public function hide_student_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_hide_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:29/02/2020
	=================================================================================
	*/
	public function restore_student_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_restore_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:29/02/2020
	=================================================================================
	*/
	public function permanent_delete_student_delete()
	{
		$details['student_id'] = $this->uri->segment(2);
		$response = $this->student_api->_permanent_delete_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
    /*
	=================================================================================
	Author:Nikhil Swami                        Date:29/02/2020
	=================================================================================
	*/
	public function block_student_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_block_student_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 /*
	=================================================================================
	Author:Nikhil Swami                        Date:29/02/2020
	=================================================================================
	*/
	public function active_student_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_active_student_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function active_download_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_active_download_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		 /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function deactive_download_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_deactive_download_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*
	=================================================================================
		Author:Mrudul Thite                         Date:06/04/2020
	=================================================================================
	*/
	public function smsSend_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_smsSend($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
    Author: Apurva Bandelwar                      Date:26/03/2021
    =================================================================================
    */
	public function upload_post($details=false)
	{
		$details = $this->post();
		$response = $this->student_api->_upload_file($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF 