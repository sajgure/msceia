<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 10 apr 20
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function faq_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('faq-list',$data);
    }
    public function add_faq($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        if($id)
        {
            $data['faq_data']=$this->common_model->selectDetailsWhr('tbl_faq','faq_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['faq_topic_data']=$this->common_model->fetchDataASC_In_use('tbl_faq_topics','faq_topic_id');
        // echo $this->db->last_query(); die;
        $this->load->view('add-faq',$data);
    }
   
    
}

