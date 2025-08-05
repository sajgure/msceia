<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Slider_master_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('slider_master/slider_master_api');
	
    }
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:27/02/2020
	=================================================================================
	*/

	public function slider_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->slider_master_api->_set_slider_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:27/02/2020
	=================================================================================
	*/
	public function slider_master_get($details=false)
	{
		$details = $this->get();
		$response = $this->slider_master_api->_get_slider_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:27/02/2020
	=================================================================================
	*/
	public function hide_slider_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->slider_master_api->_hide_slider_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:27/02/2020
	=================================================================================
	*/
	public function restore_slider_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->slider_master_api->_restore_slider_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
	Author:Nikhil Swami                        Date:27/02/2020
	=================================================================================
	*/
	public function permanent_delete_slider_master_delete()
	{
		$details['slider_master_id'] = $this->uri->segment(2);
		$response = $this->slider_master_api->_permanent_delete_slider_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF