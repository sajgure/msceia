<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Fees_exemption_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:19/11/2021
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('fees_exemption/fees_exemption_api');
    }
   	/*
	=================================================================================
	Author:Tukaram Gavade                           Date:19/11/2021
	=================================================================================
	*/

	public function fees_exemption_get()
	{
		$details = $this->get();
		$response = $this->fees_exemption_api->_get_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                           Date:19/11/2021
	=================================================================================
	*/
	public function fees_exemption_post($details=false)
    {	
		$details = $this->post();		
		$response = $this->fees_exemption_api->_set_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:19/11/2021
	=================================================================================
	*/
	public function hide_fees_exemption_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->fees_exemption_api->_hide_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:19/11/2021
	=================================================================================
	*/
	public function restore_fees_exemption_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->fees_exemption_api->_restore_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Tukaram Gavade                         Date:19/11/2021
	=================================================================================
	*/
	public function delete_fees_exemption_delete()
    {	
		$details['fees_exemption_id']= $this->uri->segment(2);
		$response = $this->fees_exemption_api->_delete_fees_exemption($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}