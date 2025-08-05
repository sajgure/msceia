<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Faq_topics_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('faq_topics/faq_topics_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function faq_topics_get()
	{
		$details = $this->get();
		$response = $this->faq_topics_api->_get_faq_topics($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function faq_topics_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_topics_api->_set_faq_topics($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_faq_topics_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_topics_api->_hide_faq_topics($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_faq_topics_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->faq_topics_api->_restore_faq_topics($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_faq_topics_delete()
    {	
		$details['faq_topic_id']= $this->uri->segment(2);
		$response = $this->faq_topics_api->_delete_faq_topics($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}