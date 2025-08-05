<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 28 mar 20
	-------------------------------------------------------------
	*/
    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
	    

	}

	public function user_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['user_data']=$this->common_model->alljoin2tbl('tbl_role','tbl_user','role_id');
	    $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
	    $this->load->view('user_list',$data);
	}
	public function add_user($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);
		
		if($id)
		{
			$data['user_data']=$this->common_model->selectDetailsWhr('tbl_user','user_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
	    $data['role_data']=$this->common_model->fetchDataASC_In_use('tbl_role','role_id');
	    $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
	    $this->load->view('add_user',$data);
	}
	public function upload_user_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/user_photo/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/user_photo/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
}

