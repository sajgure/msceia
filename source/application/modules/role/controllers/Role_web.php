<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_web extends Base_Controller 
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
	    $this->load->model('role_model');
        $this->load->library('Encryptdecryptstring');


	}
	public function role_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$data['role_data']=$this->common_model->fetchDataAsc('tbl_role','role_id');
		$this->load->view('role_list',$data);
	}
	public function add_role($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);
		 
		if($id)
		{
			$data['role_data']=$this->common_model->selectDetailsWhr('tbl_role','role_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add_role',$data);
	}
	public function role_management()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['role_data']=$this->common_model->fetchDataAsc('tbl_role','role_id');
		$this->load->view('role_management',$data);
	}
	public function fetch_role_config()
	{
		$role_id=$this->input->post('id');
		$data['menu_data']=$this->role_model->menu_list1($role_id);
		$view=$this->load->view('prev_table',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
	}
	public function save_role_config()
    {
        $role_id=$this->input->post('name_of_employee');
        $submenu=$this->input->post('submenu');
        $result = $this->role_model->save_role_config($role_id,$submenu);
        
        if($result)
        {
            $this->json->jsonReturn(array(
                'state'=>TRUE,
                'msg'=>'Well Done! Role configuration saved successfully.'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'state'=>False,
                'msg'=>'Error! While saving role configuration details.'
            ));
        } 
    }
}