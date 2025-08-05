<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Download_link_master_rest extends Rest_Controller 
{
	
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/  
	public function __construct()
  	{
	    parent::__construct();  
	    $this->load->module('download_link_master/download_link_master_api');
    }
  
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/
	public function download_link_master_get($details=false)
	{
		$details = $this->get();
		$response = $this->download_link_master_api->_get_download_link_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/
	public function download_link_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->download_link_master_api->_set_download_link_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/
	public function hide_download_link_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->download_link_master_api->_hide_download_link_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/
	public function restore_download_link_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->download_link_master_api->_restore_download_link_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
    Author:Mrudul Thite                 Date:29/2/2020
    =================================================================================
	*/
	public function permanent_delete_download_link_master_delete()
	{
		$details['download_link_master_id']= $this->uri->segment(2);
		$response = $this->download_link_master_api->_permanent_delete_download_link_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF