<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Inspection_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/    
	public function __construct()       
  	{
	    parent::__construct();
	    $this->load->module('inspection/inspection_api');
    }
      
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function inspection_get($details=false)
	{
		$details = $this->get();
		$response = $this->inspection_api->_get_inspection($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/ 
	public function inspection_post($details=false)
	{
		$details = $this->post();
		$response = $this->inspection_api->_set_inspection($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_inspection_post($details=false)
	{
		$details = $this->post();
		$response = $this->inspection_api->_hide_inspection($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_inspection_post($details=false)
	{
		$details = $this->post();
		$response = $this->inspection_api->_restore_inspection($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function permanent_delete_inspection_delete()  
	  {	  
		
  		$details['inspection_id']= $this->uri->segment(2);
		$response = $this->inspection_api->_permanent_delete_inspection($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// public function delete_inspection_post($details=false)
 //    {	
 //  		$details = $this->post();
	// 	$response = $this->inspection_api->_delete_inspection($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }
} //EOF