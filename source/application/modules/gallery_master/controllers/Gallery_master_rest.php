<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Gallery_master_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('gallery_master/gallery_master_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/

	public function gallery_master_get()
	{
		$details = $this->get();
		$response = $this->gallery_master_api->_get_gallery_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function gallery_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gallery_master_api->_set_gallery_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_gallery_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gallery_master_api->_hide_gallery_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_gallery_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gallery_master_api->_restore_gallery_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_gallery_master_delete()
    {	
		$details['gallery_master_id']= $this->uri->segment(2);
		$response = $this->gallery_master_api->_delete_gallery_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}