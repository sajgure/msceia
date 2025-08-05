<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class submenu_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('submenu/submenu_api');  
    }

	public function submenu_post()
	{
		$details = $this->post();
		$response = $this->submenu_api->_setsubmenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidesubmenu_post()
	{
		$details = $this->post();
		$response = $this->submenu_api->_hidesubmenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoresubmenu_post()
	{
		$details = $this->post();
		$response = $this->submenu_api->_restoresubmenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletesubmenu_delete()
	{
		$details['submenu_id']=$this->uri->segment(2);
		$response = $this->submenu_api->_deletesubmenu($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function submenu_get()
	{
		$details = $this->get();
		$response = $this->submenu_api->_getsubmenu($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}