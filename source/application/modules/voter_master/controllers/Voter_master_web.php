<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi              Date: 08 apr 20
-------------------------------------------------------------
*/

class Voter_master_web extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 


    }

    public function voter_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('voter-list',$data);
    }

    public function add_voter($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['voter_master_data']=$this->common_model->selectDetailsWhr('tbl_voter_master','voter_master_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('add-voter',$data);
    }
    public function upload_voter_master_file()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000000, 999999999) . '.' . $extension;
            $location = './uploads/voter_uploads/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $file_path = base_url().'uploads/voter_uploads/'.$name;
            echo $name;
        }
    }
}
