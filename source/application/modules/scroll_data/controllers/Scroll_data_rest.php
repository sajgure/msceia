<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Scroll_data_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
		
	=================================================================================
	*/      
	public function __construct()     
  	{
	    parent::__construct();
	    $this->load->module('scroll_data/scroll_data_api');
    }
     
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function scroll_data_get($details=false)
	{
		$details = $this->get();
		$response = $this->scroll_data_api->_get_scroll_data($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function scroll_data_post($details=false)
	{
		$details = $this->post();
		$response = $this->scroll_data_api->_set_scroll_data($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function hide_scroll_data_post($details=false)
	{
		$details = $this->post();
		$response = $this->scroll_data_api->_hide_scroll_data($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function restore_scroll_data_post($details=false)
	{
		$details = $this->post();
		$response = $this->scroll_data_api->_restore_scroll_data($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
		Author:Mrudul Thite                        Date:29/2/2020
	=================================================================================
	*/
	public function delete_scroll_data_delete()  
	  {	  
		
  		$details['scroll_data_id']= $this->uri->segment(2);
		$response = $this->scroll_data_api->_delete_scroll_data($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// public function delete_scroll_data_post($details=false)
 //    {	
 //  		$details = $this->post();
	// 	$response = $this->scroll_data_api->_delete_scroll_data($details);
	// 	$this->response($response, REST_Controller::HTTP_OK);
	// }

} //EOF