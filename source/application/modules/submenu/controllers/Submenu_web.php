<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 02 may 20
	-------------------------------------------------------------
	*/
    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 
	    

	}
	public function sub_menu_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('sub_menu_list',$data);
	}
	public function add_sub_menu($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);

		if($id)
		{
			$data['submenu_data']=$this->common_model->selectDetailsWhr('tbl_submenu','submenu_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['menu_data']=$this->common_model->fetchDataASC_In_use('tbl_menu','menu_id');
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add_sub_menu',$data);
	}
}