<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_web extends Base_Controller 
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
	public function menu_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('menu_list',$data);
	}
	public function add_menu($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);
		if($id)
		{
			$data['menu_data']=$this->common_model->selectDetailsWhr('tbl_menu','menu_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add_menu',$data);
	}
}