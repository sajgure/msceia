<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Institute_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('institute/institute_api');
	
    }
    /*  
	=================================================================================
		Author:Bismilla Sanade                       Date:26/03/2020
	=================================================================================
	*/


    public function get_appear_stud_list_post()
    {
    	$details = $this->post();
		$response = $this->institute_api->_get_appear_stud_list($details);
		$this->response($response, REST_Controller::HTTP_OK);
    }
    /*  
	=================================================================================
		Author:Bismilla Sanade                       Date:26/03/2020
	=================================================================================
	*/


    public function get_appear_stud_count_post()
    {
    	$details = $this->post();
		$response = $this->institute_api->_get_appear_stud_count($details);
		$this->response($response, REST_Controller::HTTP_OK);
    }
    
    /*  
	=================================================================================
		Author:Bismilla Sanade                       Date:26/03/2020
	=================================================================================
	*/


    public function set_adjust_fee_post()
    {
    	$details = $this->post();
		$response = $this->institute_api->_set_adjust_fee($details);
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*  
	=================================================================================
		Author:Nikhil Swami                         Date:28/02/2020
	=================================================================================
	*/

	public function institute_post()
    {	
  		$details = $this->post();
		$response = $this->institute_api->_set_institute($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Nikhil Swami                         Date:28/02/2020
	=================================================================================
	*/
	public function institute_get($details=false)
	{
		$details = $this->get();
		$response = $this->institute_api->_get_institute($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_institute_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_hide_institute($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_institute_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_restore_institute($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function permanent_delete_institute_delete()
	{
		$details['institute_id'] = $this->uri->segment(2);
		$response = $this->institute_api->_permanent_delete_institute($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
    /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function block_institute_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_block_institute_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function active_institute_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_active_institute_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function active_download_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_active_download_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		 /*
	=================================================================================
	Author:Nikhil Swami                        Date:28/02/2020
	=================================================================================
	*/
	public function deactive_download_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_deactive_download_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/
	public function pending_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_pending_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/

	public function download_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_download_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/


	public function install_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_install_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/

	public function examDownload_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_examDownload_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/

	public function examInstall_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_examInstall_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/

	public function upload_db_status_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_upload_db_status($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mrudul Thite                        Date:24/03/2020
	=================================================================================
	*/

	public function reset_mac_id_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_reset_mac_id($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Rohini Mali                        Date:17/09/2021
	=================================================================================
	*/

	public function reset_appear_student_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_reset_appear_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*
	=================================================================================
		Author:Mrudul Thite                         Date:24/03/2020
	=================================================================================
	*/
	public function get_student_get($details=false)
	{
		$details = $this->get();
		$response = $this->institute_api->_get_student($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

    /*
	=================================================================================
		Author:Mrudul Thite                         Date:06/04/2020
	=================================================================================
	*/
	public function smsSend_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_smsSend($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
    /*
	=================================================================================
	Author:Shubhangi jagadale                         Date:22/04/2020
	=================================================================================
	*/
	public function active_link_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_active_link($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi jagadale                         Date:22/04/2020
	=================================================================================
	*/
	public function deactive_link_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_deactive_link($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi jagadale                         Date:22/04/2020
	=================================================================================
	*/
	public function reactive_link_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_api->_reactive_link($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*
	=================================================================================
    Author:Mrudul Thite                       Date:27-03-2021
    =================================================================================
	*/
	public function change_institute_password_post($details=false)
	{
		// echo 'dffdf';die();
		$details = $this->post();
		$response = $this->institute_api->_change_institute_password($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}
} 