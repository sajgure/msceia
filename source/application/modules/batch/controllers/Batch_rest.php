<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Batch_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('batch/batch_api');
	
    }
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:03/03/2020
	=================================================================================
	*/

	public function batch_post()
    {	
  		$details = $this->post();
		$response = $this->batch_api->_set_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:03/03/2020
	=================================================================================
	*/
	public function batch_get($details=false)
	{
		$details = $this->get();
		$response = $this->batch_api->_get_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:03/03/2020
	=================================================================================
	*/
	public function hide_batch_post($details=false)
	{
		$details = $this->post();
		$response = $this->batch_api->_hide_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:03/03/2020
	=================================================================================
	*/
	public function restore_batch_post($details=false)
	{
		$details = $this->post();
		$response = $this->batch_api->_restore_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:03/03/2020
	=================================================================================
	*/
	public function permanent_delete_batch_delete()
	{
		$details['batch_id'] = $this->uri->segment(2);
		$response = $this->batch_api->_permanent_delete_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
    
} //EOF