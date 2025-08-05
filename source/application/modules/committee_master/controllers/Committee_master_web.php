<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------------------------------
Author  : Mohammad Shafi          Date: 21 apr 20
-------------------------------------------------------------
*/

class Committee_master_web extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
        
    }

    public function committee_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('committee-list',$data);
    }

    public function add_committee($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['committee_master_data']=$this->common_model->selectDetailsWhr('tbl_committee','committee_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);  
        $this->load->view('add-committee',$data);
    }
    public function upload_committee_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/committee_member_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/committee_member_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}
