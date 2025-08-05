<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Objective_book_category_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('objective_book_category/objective_book_category_api');  
    }

	public function Objective_book_category_post()
	{
		$details = $this->post();
		$response = $this->objective_book_category_api->_setObjective_book_category($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hideObjective_book_category_post()
	{
		$details = $this->post();
		$response = $this->objective_book_category_api->_hideObjective_book_category($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoreObjective_book_category_post()
	{
		$details = $this->post();
		$response = $this->objective_book_category_api->_restoreObjective_book_category($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deleteObjective_book_category_delete()
	{
		$details['category_id']=$this->uri->segment(2);
		$response = $this->objective_book_category_api->_deleteObjective_book_category($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function Objective_book_category_get()
	{
		$details = $this->get();
		$response = $this->objective_book_category_api->_getObjective_book_category($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}