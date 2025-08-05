<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Objective_section_rest extends Rest_Controller 
{
	/*
	=================================================================================
	Author:Shubhangi Jagadale                         Date:28/02/2020
	=================================================================================
	*/
	public function __construct()
  	{
	    parent::__construct();
	    $this->load->module('objective_section/objective_section_api');
    }
   	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/

	public function objective_section_get()
	{
		$details = $this->get();
		$response = $this->objective_section_api->_get_objective_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function objective_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->objective_section_api->_set_objective_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function hide_objective_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->objective_section_api->_hide_objective_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function restore_objective_section_post($details=false)
    {	
  		$details = $this->post();
		$response = $this->objective_section_api->_restore_objective_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Shubhangi Jagadale                        Date:28/02/2020
	=================================================================================
	*/
	public function delete_objective_section_delete()
    {	
		$details['question_id']= $this->uri->segment(2);
		$response = $this->objective_section_api->_delete_objective_section($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:30/03/2021
	=================================================================================
	*/
	public function search_payment_post()
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_search_payment($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	*/
	public function save_sa_payment_post($details=false)
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_save_sa_payment($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	*/
	public function search_district_wise_post($details=false)
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_search_district_wise($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author:Mohammad Shafi                        Date:02/04/2021
	=================================================================================
	*/
	public function search_district_details_post($details=false)
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_search_district_details($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*
	=================================================================================
	Author:Apurva Bandelwar                        Date:04-03-2021
	=================================================================================
	*/
	public function search_complete_district_report_post($details=false)
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_search_complete_district_report($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author : Apurva Bandelwar                        Date:07-03-2022
	=================================================================================
	*/
	public function save_objective_questions_post($details=false)
    {	
		$details = $this->post();
		$response = $this->objective_section_api->_save_objective_questions($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*
	=================================================================================
	Author : Apurva Bandelwar                        Date:07-03-2022
	=================================================================================
	*/
	public function delete_objective_question_delete()
    {	
		$details['question_id']= $this->uri->segment(2);
		$response = $this->objective_section_api->_delete_objective_question($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}