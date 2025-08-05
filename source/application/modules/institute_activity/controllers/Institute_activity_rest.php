<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Institute_activity_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 

	    $this->load->module('institute_activity/institute_activity_api');
	}

    /*  
	=================================================================================
		Author:Archana Patil                      Date:19-11-2021
	=================================================================================
	*/

    public function institute_activity_get($details=false)
	{
		
		$details = $this->get();
		$response = $this->institute_activity_api->_getInstituteActivityData($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

    /*  
	=================================================================================
		Author:Archana Patil                      Date:19-11-2021
	=================================================================================
	*/

	public function institute_activity_post($details=false)
	{		
		$details = $this->post();				
		$response = $this->institute_activity_api->_setInstituteActivityData($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*  
	=================================================================================
		Author:Archana Patil                      Date:19-11-2021
	=================================================================================
	*/

	public function hide_institute_activity_post($details=false)
	{		
		$details = $this->post();						
		$response = $this->institute_activity_api->_hideInstituteActivity($details);
		$this->response($response, REST_Controller::HTTP_OK);	
	}

	/*  
	=================================================================================
		Author:Archana Patil                      Date:19-11-2021
	=================================================================================
	*/

	public function restore_institute_activity_post($details=false)
	{
		$details = $this->post();
		$response = $this->institute_activity_api->_retoreInstituteActivity($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*  
	=================================================================================
		Author:Archana Patil                      Date:19-11-2021
	=================================================================================
	*/

	public function permanent_delete_institute_activity_delete()
	{
		//echo "inside permanent_delete_institute_activity_delete function";
		$details['institute_activity_id']= $this->uri->segment(2);
		$response = $this->institute_activity_api->_permanentDeleteInstituteActivity($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

    
} // class close