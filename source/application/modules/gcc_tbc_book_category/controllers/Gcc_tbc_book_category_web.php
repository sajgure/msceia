<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_tbc_book_category_web extends Base_Controller {

	/*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 24-01-2022
    -------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }
    public function gcc_tbc_book_category_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('gcc-tbc-book-category-list',$data);
    }
    public function add_gcc_tbc_book_category($id=NULL)
    {
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        if($id)
        {
            $data['book_category_data']=$this->common_model->selectDetailsWhr('tbl_gcc_tbc_book_category','category_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('add-gcc-tbc-book-category',$data);
    }
    public function upload_gcc_tbc_book_category_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/gcc_tbc_category_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/gcc_tbc_category_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}

