<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Batch_fees_rest extends Rest_Controller 
{
	/*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/
	public function __construct()  
  	{
	    parent::__construct();
	    $this->load->module('batch_fees/batch_fees_api');
    }

    /*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/   	
	public function batch_fees_get($details=array())
	{
		$details = $this->get();
		$response = $this->batch_fees_api->_get_batch_fees($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/
	public function batch_fees_post($details=array())
	{
		$details=$this->post();
		$response=$this->batch_fees_api->_set_batch_fees($details);
		$this->response($response,REST_Controller::HTTP_OK);	
	}

	/*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/
	public function hide_batch_fees_post($details=array())
	{
		$details=$this->post();
		$response=$this->batch_fees_api->_hide_batch_fees($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/
	public function restore_batch_fees_post($details=array())
	{
		$details=$this->post();
		$response=$this->batch_fees_api->_restore_batch_fees($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/*    
	=================================================================================
	Author: SNEHAL KULKARNI                         Date:26/03/2021
	=================================================================================
	*/
	public function delete_batch_fees_delete()
	{
		$details=array('batch_fees_id'=>$this->uri->segment(2));
		$response = $this->batch_fees_api->_delete_batch_fees($details);
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
}