<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class menu_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('menu/menu_api');  
    }

	public function menu_post()
	{
		$details = $this->post();
		$response = $this->menu_api->_setmenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidemenu_post()
	{
		$details = $this->post();
		$response = $this->menu_api->_hidemenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoremenu_post()
	{
		$details = $this->post();
		$response = $this->menu_api->_restoremenu($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletemenu_delete()
	{
		$details['menu_id']=$this->uri->segment(2);
		$response = $this->menu_api->_deletemenu($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function menu_get()
	{
		$details = $this->get();
		$response = $this->menu_api->_getmenu($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}