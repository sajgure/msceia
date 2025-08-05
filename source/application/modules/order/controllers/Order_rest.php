<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Order_rest extends Rest_Controller 
{
	/*
	=================================================================================
		Author:Bismilla Sanade                        Date:27/2/2020
	=================================================================================
	*/
	public function __construct()
  	{
		parent::__construct();
		$this->load->module('order/order_api');  
    }
    /*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 25 April 20
	Purpose :add cart

	-------------------------------------------------------------
	*/

        public function add_cart_post()
   	{
   		$details = $this->post();
   		$response = $this->order_api->_addcart($details);
   		$this->response($response, REST_Controller::HTTP_OK);
   	}

	public function remove_cart_post()
	{
		$details = $this->post();
		$response = $this->order_api->_removecart($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function get_cart_post()
	{
		$response = $this->order_api->_getcart();
		$this->response($response, REST_Controller::HTTP_OK);

	}
	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 25 April 20
	Purpose :add order

	-------------------------------------------------------------
	*/

	public function order_post()
	{
		$details = $this->post();
		$response = $this->order_api->_setorder($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	
	public function hideorder_post()
	{
		$details = $this->post();
		$response = $this->order_api->_hideorder($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function restoreorder_post()
	{
		$details = $this->post();
		$response = $this->order_api->_restoreorder($details);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function deleteorder_delete()
	{
		$details['order_id']=$this->uri->segment(2);
		$response = $this->order_api->_deleteorder($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	public function order_get()
	{
		$details = $this->get();
		$response = $this->order_api->_getorder($details);
		$this->response($response,REST_Controller::HTTP_OK);
	}
	/*
	-------------------------------------------------------------
	Author 	: Bismilla Sanade				Date: 28 April 20
	Purpose :add manual order

	-------------------------------------------------------------
	*/


    public function manual_order_post()
    {
    	$details = $this->post();
   		$response = $this->order_api->_manualOrder($details);
   		$this->response($response, REST_Controller::HTTP_OK);

    }


    public function manual_order_get()
    {
    	$details = $this->get();
   		$response = $this->order_api->_getorder($details);
   		$this->response($response, REST_Controller::HTTP_OK);

    }

    /* -------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 17 March 21
	Purpose : Order Accept
	------------------------------------------------------------- */

    public function order_approved_post($details=FALSE)
    {
    	$details= $this->post();
    	$response = $this->order_api->_orderApproved($details);
    	$this->response($response, REST_Controller::HTTP_OK);
    }
	/* -------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 17 March 21
	Purpose : Order Cancel
	------------------------------------------------------------- */

    public function order_cancelled_post($details=FALSE)
    {
    	$details= $this->post();
    	$response = $this->order_api->_orderCancelled($details);
    	$this->response($response, REST_Controller::HTTP_OK);
    }
}