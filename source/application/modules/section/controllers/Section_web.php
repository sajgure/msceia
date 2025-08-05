<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_web extends Base_Controller 
{

/*
-------------------------------------------------------------
Author  : Mohammad Shafi              Date: 16 apr 20
-------------------------------------------------------------
*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function section_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('section-list',$data);
    }
    public function add_section($id=NULL)
    {
        if($id)
        {
            $data['section_data']=$this->common_model->selectDetailsWhr('tbl_section','section_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('add_section',$data);
    }
}