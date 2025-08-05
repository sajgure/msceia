<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speed_passage_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 15 apr 20
	-------------------------------------------------------------
	*/
    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('common_model');
        $this->load->library('Encryptdecryptstring');
	    

	}
	public function speed_passage_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('speed_passage_list',$data);
	}
	public function add_speed_passage($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);

		if($id)
		{
			$data['speed_passage_data']=$this->common_model->selectDetailsWhr('tbl_speed_passage','speed_passage_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['course_data']=$this->common_model->fetchDataDesc('tbl_course_master','course_master_id');
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add_speed_passage',$data);
	}
}
