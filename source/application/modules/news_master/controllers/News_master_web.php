<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_master_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 12-03-2021
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }
    public function news_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('news-list',$data);
    }
    public function add_news($id=NULL)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['news_data']=$this->common_model->selectDetailsWhr('tbl_news_master','news_id',$id);
        }
        $this->load->view('add-news',$data);
    }
    
}

