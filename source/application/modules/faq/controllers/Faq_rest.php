<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Faq_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('faq/faq_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/

	public function faq_get()
	{
		$details = $this->get();
		$response = $this->faq_api->_get_faq($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function faq_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_api->_set_faq($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_faq_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_api->_hide_faq($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_faq_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_api->_restore_faq($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_faq_delete()
    {	
		$details['faq_id']= $this->uri->segment(2);
		$response = $this->faq_api->_delete_faq($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}