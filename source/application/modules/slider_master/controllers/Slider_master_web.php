<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_master_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 08 apr 20
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 

    }
    public function slider_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('slider-list',$data);
    }
    public function add_slider($id=NULL)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $id = $this->encryptdecryptstring->decrypt_string($id);
        if($id)
        {
            $data['slider_data']=$this->common_model->selectDetailsWhr('tbl_slider_master','slider_master_id',$id);
        }
        $this->load->view('add-slider',$data);
    }
    public function upload_slider_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/slider_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/slider_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}