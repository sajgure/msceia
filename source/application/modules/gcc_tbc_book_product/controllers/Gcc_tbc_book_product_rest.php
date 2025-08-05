<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Gcc_tbc_book_product_rest extends Rest_Controller 
{
	/*
    -------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 24-01-2022
	-------------------------------------------------------------
    */
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('gcc_tbc_book_product/gcc_tbc_book_product_api');  
    }

	public function Gcc_tbc_book_product_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_product_api->_setGcc_tbc_book_product($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function hideGcc_tbc_book_product_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_product_api->_hideGcc_tbc_book_product($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoreGcc_tbc_book_product_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_product_api->_restoreGcc_tbc_book_product($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deleteGcc_tbc_book_product_delete()
	{
		$details['product_id']=$this->uri->segment(2);
		$response = $this->gcc_tbc_book_product_api->_deleteGcc_tbc_book_product($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function Gcc_tbc_book_product_get()
	{
		$details = $this->get();
		$response = $this->gcc_tbc_book_product_api->_getGcc_tbc_book_product($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	
}