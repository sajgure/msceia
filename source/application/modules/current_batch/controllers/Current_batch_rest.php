<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Current_batch_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:20/11/2021
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('current_batch/current_batch_api');
    }
   	/*
	=================================================================================
	Author:Tukaram Gavade                           Date:20/11/2021
	=================================================================================
	*/

	public function current_batch_get()
	{
		$details = $this->get();
		$response = $this->current_batch_api->_get_current_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                           Date:20/11/2021
	=================================================================================
	*/
	public function current_batch_post($details=false)
    {	
		$details = $this->post();		
		$response = $this->current_batch_api->_set_current_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:20/11/2021
	=================================================================================
	*/
	public function hide_current_batch_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->current_batch_api->_hide_current_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:20/11/2021
	=================================================================================
	THIS METHOD IS USED ONLY IN THIS MODULE 
	*/
	public function restore_current_batch_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->current_batch_api->_restore_current_batch($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:20/11/2021
	=================================================================================
	*/
	public function delete_fees_exemption_delete()
    {	
		$details['fees_exemption_id']= $this->uri->segment(2);
		$response = $this->current_batch_api->_delete_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}