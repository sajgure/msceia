<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Upcoming_batch_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Apurva Bandelwar                         Date:14/12/2021
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('upcoming_batch/upcoming_batch_api');
    }
   	/*
	=================================================================================
	Author:Apurva Bandelwar                           Dat1420211/2021
	=================================================================================
	*/

	public function upcoming_batch_get()
	{
		$details = $this->get();
		$response = $this->upcoming_batch_api->_get_upcoming_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Apurva Bandelwar                           Dat1420211/2021
	=================================================================================
	*/
	public function upcoming_batch_post($details=false)
    {	
		$details = $this->post();		
		$response = $this->upcoming_batch_api->_set_upcoming_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}