<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Renewal_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/    
	public function __construct()       
  	{  
	    parent::__construct();
	    $this->load->module('renewal/renewal_api');
    }
      
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function renewal_get($details=false)
	{
		$details = $this->get();
		$response = $this->renewal_api->_get_renewal($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function renewal_post($details=false)
	{
		$details = $this->post();
		$response = $this->renewal_api->_set_renewal($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_renewal_post($details=false)
	{
		$details = $this->post();
		$response = $this->renewal_api->_hide_renewal($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_renewal_post($details=false)
	{
		$details = $this->post();
		$response = $this->renewal_api->_restore_renewal($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function permanent_delete_renewal_delete()  
	  {	  
		
  		$details['renewal_id']= $this->uri->segment(2);
		$response = $this->renewal_api->_permanent_delete_renewal($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// public function delete_renewal_post($details=false)
 //    {	
 //  		$details = $this->post();
	// 	$response = $this->renewal_api->_delete_renewal($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }

} //EOF