<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Creative_gallery_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('Creative_gallery/Creative_gallery_api');  
    }

	public function creative_gallery_post()
	{
		$details = $this->post();
		$response = $this->creative_gallery_api->_setcreative_gallery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hidecreative_gallery_post()
	{
		$details = $this->post();
		$response = $this->creative_gallery_api->_hidecreative_gallery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restorecreative_gallery_post()
	{
		$details = $this->post();
		$response = $this->creative_gallery_api->_restorecreative_gallery($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deletecreative_gallery_delete()
	{
		
		$details['creative_gallery_id']=$this->uri->segment(2);
		$response = $this->creative_gallery_api->_deletecreative_gallery($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function creative_gallery_get()
	{

		$details = $this->get();
		$response = $this->creative_gallery_api->_getcreative_gallery($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}