<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class contact_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('contact/contact_api');
	
    }
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:06/04/2020
	=================================================================================
	*/

	public function contact_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->contact_api->_set_contact($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:06/04/2020
	=================================================================================
	*/
	public function contact_get($details=false)
	{
		$details = $this->get();
		$response = $this->contact_api->_get_contact($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:06/04/2020
	=================================================================================
	*/
	public function hide_contact_post($details=false)
	{
		$details = $this->post();
		$response = $this->contact_api->_hide_contact($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:06/04/2020
	=================================================================================
	*/
	public function restore_contact_post($details=false)
	{
		$details = $this->post();
		$response = $this->contact_api->_restore_contact($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
	Author:Nikhil Swami                        Date:06/04/2020
	=================================================================================
	*/
	public function permanent_delete_contact_delete()
	{
		$details['contact_id'] = $this->uri->segment(2);
		$response = $this->contact_api->_permanent_delete_contact($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF