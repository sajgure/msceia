<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Gcc_tbc_book_slider_rest extends Rest_Controller 
{
	/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22-01-2022
    -------------------------------------------------------------
    */
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('gcc_tbc_book_slider/gcc_tbc_book_slider_api');  
    }
	public function gcc_tbc_book_slider_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_slider_api->_setGcc_tbc_book_slider($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function hidegcc_tbc_book_slider_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_slider_api->_hideGcc_tbc_book_slider($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function restoregcc_tbc_book_slider_post()
	{
		$details = $this->post();
		$response = $this->gcc_tbc_book_slider_api->_restoreGcc_tbc_book_slider($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function deletegcc_tbc_book_slider_delete()
	{
		$details['slider_id']=$this->uri->segment(2);
		$response = $this->gcc_tbc_book_slider_api->_deleteGcc_tbc_book_slider($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function gcc_tbc_book_slider_get()
	{
		$details = $this->get();
		$response = $this->gcc_tbc_book_slider_api->_getGcc_tbc_book_slider($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
}