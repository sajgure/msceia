<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_fees_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 27 March 21
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function batch_fees_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('batch-fees-list',$data);
    }
    public function add_batch_fees($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        
        if($id)
        {
            $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_fees_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['batch_data'] = $this->common_model->fetchDataASC_In_use('tbl_batch','batch_id');
        $this->load->view('add-batch-fees',$data);
    }
    
}

