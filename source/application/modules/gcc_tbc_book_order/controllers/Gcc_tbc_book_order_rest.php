<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Gcc_tbc_book_order_rest extends Rest_Controller 
{
	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 27-01-2022
	-------------------------------------------------------------
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('gcc_tbc_book_order/gcc_tbc_book_order_api');  
    }
    /* 
    -------------------------------------------------------------
    Purpose : Accept GCC TBC Book Order.
    ------------------------------------------------------------- 
    */
    public function books_order_approved_post($details=FALSE)
    {
    	$details= $this->post();
    	$response = $this->gcc_tbc_book_order_api->_booksOrderApproved($details);
    	$this->response($response, REST_Controller::HTTP_OK);
    }
	/* 
    -------------------------------------------------------------
    Purpose : Cancel GCC TBC Book Order.
    ------------------------------------------------------------- 
    */
    public function books_order_cancelled_post($details=FALSE)
    {
    	$details= $this->post();
    	$response = $this->gcc_tbc_book_order_api->_booksOrderCancel($details);
    	$this->response($response, REST_Controller::HTTP_OK);
    }
}