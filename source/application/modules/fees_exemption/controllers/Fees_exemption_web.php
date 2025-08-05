<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_exemption_web extends Base_Controller 
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
		$this->load->view('fess-exemption-list',$data);
	}

	public function add_fees_exemption_form($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);

		if($id)
		{
			$data['feesExemptionData']=$this->common_model->selectDetailsWhr('tbl_fees_exemption','fees_exemption_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];	
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add-fees-exemption-form',$data);
	}
}