<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Our_client_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/    
	public function __construct()     
  	{
	    parent::__construct();
	    $this->load->module('our_client/our_client_api');
    }
     
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function our_client_get($details=false)
	{
		$details = $this->get();
		$response = $this->our_client_api->_get_our_client($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function our_client_post($details=false)
	{
		$details = $this->post();
		$response = $this->our_client_api->_set_our_client($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_our_client_post($details=false)
	{
		$details = $this->post();
		$response = $this->our_client_api->_hide_our_client($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_our_client_post($details=false)
	{
		$details = $this->post();
		$response = $this->our_client_api->_restore_our_client($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	// public function permanent_delete_our_client_delete()  
	//   {	  
		
  	// 	$details['our_client_id']= $this->uri->segment(2);
	// 	$response = $this->our_client_api->_permanent_delete_our_client($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }
	public function delete_our_client_delete()
    {	
  		$details['our_client_id']= $this->uri->segment(2);
		$response = $this->our_client_api->_permanent_delete_our_client($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
} //EOF