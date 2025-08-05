<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Gr_master_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('gr_master/gr_master_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function gr_master_get()
	{
		$details = $this->get();
		$response = $this->gr_master_api->_get_gr_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function gr_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gr_master_api->_set_gr_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_gr_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gr_master_api->_hide_gr_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_gr_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->gr_master_api->_restore_gr_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_gr_master_delete()
    {	
		$details['gr_master_id']= $this->uri->segment(2);
		$response = $this->gr_master_api->_delete_gr_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}










