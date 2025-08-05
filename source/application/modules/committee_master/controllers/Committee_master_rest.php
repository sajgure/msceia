<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Committee_master_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('committee_master/committee_master_api');  
    }

	public function committee_master_post()
	{
		$details = $this->post();
		$response = $this->committee_master_api->_setsetcommittee_master($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidecommittee_master_post()
	{
		$details = $this->post();
		$response = $this->committee_master_api->_hidecommittee($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restorecommittee_master_post()
	{
		$details = $this->post();
		$response = $this->committee_master_api->_restorecommittee($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletecommittee_master_delete()
	{
		#$details = $this->post();
		$details['committee_id'] = $this->uri->segment(2);
		$response = $this->committee_master_api->_deletecommittee($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function committee_master_get()
	{
		$details = $this->get();
		$response = $this->committee_master_api->_getcommittee($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}