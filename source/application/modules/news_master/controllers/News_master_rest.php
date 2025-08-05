<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class News_master_rest extends Rest_Controller 
{
	public function __construct()
  	{
	    parent::__construct(); 
		$this->load->module('news_master/news_master_api');
	
    }
	/*
	=================================================================================
		Author:Apurva Bandelwar                   Date: 12-03-2021
	=================================================================================
	*/

	public function news_master_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->news_master_api->_set_news_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
		Author:Apurva Bandelwar                    Date: 12-03-2021
	=================================================================================
	*/
	public function news_master_get($details=false)
	{
		$details = $this->get();
		$response = $this->news_master_api->_get_news_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 12-03-2021
	=================================================================================
	*/
	public function hide_news_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->news_master_api->_hide_news_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 12-03-2021
	=================================================================================
	*/
	public function restore_news_master_post($details=false)
	{
		$details = $this->post();
		$response = $this->news_master_api->_restore_news_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*
	=================================================================================
	Author:Apurva Bandelwar                       Date: 12-03-2021
	=================================================================================
	*/
	public function permanent_delete_news_master_delete()
	{
		$details['news_id'] = $this->uri->segment(2);
		$response = $this->news_master_api->_permanent_delete_news_master($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

} //EOF