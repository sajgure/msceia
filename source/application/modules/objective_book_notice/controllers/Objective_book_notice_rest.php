<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Objective_book_notice_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('objective_book_notice/objective_book_notice_api');
	
    }
	/*
	=================================================================================
		Author:Apurva Bandelwar                   Date: 29-09-2022
	=================================================================================
	*/

	public function objective_book_notice_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->objective_book_notice_api->_set_objective_book_notice($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Apurva Bandelwar                    Date: 29-09-2022
	=================================================================================
	*/
	public function objective_book_notice_get($details=false)
	{
		$details = $this->get();
		$response = $this->objective_book_notice_api->_get_objective_book_notice($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 29-09-2022
	=================================================================================
	*/
	public function hide_objective_book_notice_post($details=false)
	{
		$details = $this->post();
		$response = $this->objective_book_notice_api->_hide_objective_book_notice($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 29-09-2022
	=================================================================================
	*/
	public function restore_objective_book_notice_post($details=false)
	{
		$details = $this->post();
		$response = $this->objective_book_notice_api->_restore_objective_book_notice($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 29-09-2022
	=================================================================================
	*/
	public function permanent_delete_objective_book_notice_delete()
	{
		$details['objective_notice_id'] = $this->uri->segment(2);
		$response = $this->objective_book_notice_api->_permanent_delete_objective_book_notice($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF