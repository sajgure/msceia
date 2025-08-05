<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_page_commitee_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Apurva Bandelwar				Date: 10-03-2021
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function home_page_committee_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('home-page-committee-list',$data);
    }

    public function add_home_page_committee($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        if($id)
        {
            $data['home_page_committee_data']=$this->common_model->selectDetailsWhr('tbl_home_page_commitee','home_page_commitee_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('add-home-page-committee',$data);
    }
    
    public function upload_home_committee_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/member_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/member_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}