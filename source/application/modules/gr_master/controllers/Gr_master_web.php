<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi              Date: 08 apr 20
-------------------------------------------------------------
*/

class Gr_master_web extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 


    }

    public function gr_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('gr-list',$data);
    }

    public function add_gr($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['gr_master_data']=$this->common_model->selectDetailsWhr('tbl_gr_master','gr_master_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('add-gr',$data);
    }
    public function upload_gr_master_file()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000000, 999999999) . '.' . $extension;
            $location = './uploads/gr_uploads/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $file_path = base_url().'uploads/gr_uploads/'.$name;
            echo $name;
        }
    }
}
