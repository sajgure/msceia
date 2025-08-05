<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi          Date: 10 apr 20
-------------------------------------------------------------
*/

class Faq_topics_web extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 

    }

    public function faq_topic_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('faq-topic-list',$data);
    }

    public function add_faq_topic($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        
        if($id)
        {
            $data['faq_topic_data']=$this->common_model->selectDetailsWhr('tbl_faq_topics','faq_topic_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('add-faq-topic',$data);
    }
}
