<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Student_batch_change_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('student_batch_change/student_batch_change_api');
	
    }
	/*
	=================================================================================
	Author: Apurva Bandelwar                             Date:22/11/2021
	=================================================================================
	*/

	public function batch_change_post()
    {	
  		$details = $this->post();
		$response = $this->student_batch_change_api->_set_change_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF 