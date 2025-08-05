<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Institute_label_queue_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 

	    $this->load->module('institute_label_queue/institute_label_queue_api');
	}

   /*
	=================================================================================
		Author:Mrudul Thite                         Date:03/12/2021
	=================================================================================
	*/
	public function add_institute_label_queue_post($details=false)
	{
		$details = $this->post();
		// print_r($details);
		$response = $this->institute_label_queue_api->_add_institute_label_queue($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

    
} // class close