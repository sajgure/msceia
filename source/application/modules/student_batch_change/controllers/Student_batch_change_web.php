<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi               Date: 08 apr 20
Modified By : Apurva Bandelwar         Date: 20 Nov 21
-------------------------------------------------------------
*/

class Student_batch_change_web extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
    }

    public function student_batch_change()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['batch_data'] = $this->common_model->fetchDataASC('tbl_batch','batch_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('student-batch-change',$data);
    }
    public function get_stud_batch_from()
    {
        $from_batch_id=$this->input->post("from_batch_id");
        $data['batch_data']=$this->common_model->fetchDataASC('tbl_batch','batch_id');
        $data['url']='student_batch_change_from/'.$from_batch_id;
        $view = $this->load->view('stud-batch-change-view',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
    }
    public function get_stud_batch_current()
    {
        $current_batch_id=$this->input->post("current_batch_id");
        $data['batch_data']=$this->common_model->fetchDataASC('tbl_batch','batch_id');
        $data['url']='student_batch_change_from/'.$current_batch_id;
        $view = $this->load->view('stud-batch-change-view',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
    }
}

