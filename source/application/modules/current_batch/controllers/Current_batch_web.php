<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Current_batch_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Tukaram Gavade				Date:20/11/2021
	-------------------------------------------------------------
	*/    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
	}

	public function get_all_rows()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);		
		$data['batchInfo']=$this->common_model->alljoin2tbl('tbl_current_batch','tbl_batch','batch_id');
		$this->load->view('current-batch-list',$data);
	}

	public function add_current_batch($id=NULL)
	{
        
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];	
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$data['allBatches']=$this->common_model->fetchDataDESC('tbl_batch','batch_id');
		$data['currentBatchInfo']=$this->common_model->alljoin2tbl('tbl_current_batch','tbl_batch','batch_id');
		$this->load->view('current-batch-form',$data);
	}
}