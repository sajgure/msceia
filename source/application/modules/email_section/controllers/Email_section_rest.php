<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Email_section_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('email_section/email_section_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/

	public function email_section_get()
	{
		$details = $this->get();
		$response = $this->email_section_api->_get_email_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function email_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->email_section_api->_set_email_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_email_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->email_section_api->_hide_email_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_email_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->email_section_api->_restore_email_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_email_section_delete()
    {
		$details['email_section_id']= $this->uri->segment(2);
		$response = $this->email_section_api->_delete_email_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}