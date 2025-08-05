<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Voter_master_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('voter_master/voter_master_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function voter_master_get()
	{
		$details = $this->get();
		$response = $this->voter_master_api->_get_voter_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function voter_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->voter_master_api->_set_voter_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_voter_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->voter_master_api->_hide_voter_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_voter_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->voter_master_api->_restore_voter_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_voter_master_delete()
    {	
		$details['voter_master_id']= $this->uri->segment(2);
		$response = $this->voter_master_api->_delete_voter_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}










