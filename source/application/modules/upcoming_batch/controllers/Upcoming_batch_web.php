<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upcoming_batch_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date:14/12/2021
	-------------------------------------------------------------
	*/    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
	}

	public function add_upcoming_batch($id=NULL)
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];	
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$data['allBatches']=$this->common_model->fetchDataDESC('tbl_batch','batch_id');
		$data['upcoming_batch']=$this->common_model->alljoin2tbl('tbl_upcoming_batch','tbl_batch','batch_id');
		$this->load->view('upcoming-batch-master',$data);
	}
}