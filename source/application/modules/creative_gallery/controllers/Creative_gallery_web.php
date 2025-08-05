<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creative_gallery_web extends Base_Controller {

	/*
    -------------------------------------------------------------
    Author  : Mohammad Shafi                Date: 09 apr 20
    -------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
        
    }
    public function creative_gallery_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('creative-gallery-list',$data);
    }
    public function add_creative_gallery($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);

        if($id)
        {
            $data['creative_gallery_data']= $this->common_model->selectDetailsWhr('tbl_creative_gallery','creative_gallery_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('add-creative-gallery',$data);
    }
    public function upload_creative_gallery_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/creative_gallery_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/creative_gallery_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
    
}

