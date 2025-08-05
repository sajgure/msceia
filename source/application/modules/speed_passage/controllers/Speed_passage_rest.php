<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Speed_passage_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('speed_passage/speed_passage_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/

	public function speed_passage_get()
	{
		$details = $this->get();
		$response = $this->speed_passage_api->_get_speed_passage($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function speed_passage_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->speed_passage_api->_set_speed_passage($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_speed_passage_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->speed_passage_api->_hide_speed_passage($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_speed_passage_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->speed_passage_api->_restore_speed_passage($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_speed_passage_delete()
    {	
		$details['speed_passage_id']= $this->uri->segment(2);
		$response = $this->speed_passage_api->_delete_speed_passage($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}