<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Query_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('query/query_api');  
    }

	public function query_post()
	{
		$details = $this->post();
		$response = $this->query_api->_setquery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidequery_post()
	{
		$details = $this->post();
		$response = $this->query_api->_hidequery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restorequery_post()
	{
		$details = $this->post();
		$response = $this->query_api->_restorequery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletequery_delete()
	{
		$details['query_id']=$this->uri->segment(2);
		$response = $this->query_api->_deletequery($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function query_get()
	{
		$details = $this->get();
		$response = $this->query_api->_getquery($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}