<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 09 apr 20
	-------------------------------------------------------------
	*/
	public function __construct()
	{
		parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
        
	}
    
    public function batch_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
    	$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
    	$this->load->view('batch_list',$data);
    }
    public function add_batch($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);

    	if($id)
    	{
    		$data['batch_data']=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$id);
    	}
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
    	$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
    	$this->load->view('add_batch',$data);
    }

    
}

