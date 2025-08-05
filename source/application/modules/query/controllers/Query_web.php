<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi          Date: 05 May 20
-------------------------------------------------------------
*/

class Query_web extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function queries_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('queries_list',$data);
    }

    public function add_queries($id=NULL)
    {
        if($id)
        {
            $data['edit_query']=$this->common_model->selectDetailsWhr('tbl_query','query_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['query_list_data']=$this->common_model->fetchDataAsc('tbl_institute_query','institute_query_id');
        $data['institute_data']=$this->common_model->fetchDataAsc('tbl_institute','institute_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('add_queries',$data);
    }
}
