<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_client_web extends Base_Controller {

	/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 10-03-2021
    -------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }
    public function client_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('client-list',$data);
    }

    public function add_client($id=NULL)
    { 
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        if($id)
        {
            $data['client_data']=$this->common_model->selectDetailsWhr('tbl_our_client','our_client_id',$id);
        }
        $this->load->view('add-client',$data);
    }

    public function upload_client_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/client_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/client_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}

