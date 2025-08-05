<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_notice_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 29-09-2022
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }
    public function objective_book_notice_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('objective-book-notice-list',$data);
    }
    public function add_objective_book_notice($id=NULL)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['objective_notice_data']=$this->common_model->selectDetailsWhr('tbl_objective_book_notice','objective_notice_id',$id);
        }
        $this->load->view('add-objective-book-notice',$data);
    }
    
}

