<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class email_section_web extends Base_Controller 
{
    
	/*
    =================================================================================
    Author:Mohammad Shafi                        Date:15/04/2020
    =================================================================================
    */
    public function __construct()
  	{
		parent::__construct();
		$this->load->model('common_model');
        $this->load->library('Encryptdecryptstring'); 

	}
	public function email_list()
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('email_list',$data);
	}
	public function add_email($id=NULL)
	{
        $id = $this->encryptdecryptstring->decrypt_string($id);
		
		if($id)
		{
			$data['email_data']=$this->common_model->selectDetailsWhr('tbl_email_section','email_section_id',$id);
		}
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$data['course_data']=$this->common_model->fetchDataDesc('tbl_course_master','course_master_id');
		$data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
		$this->load->view('add_email',$data);
	}

	public function attachment()
    {
	    $view=$this->load->view("select_attachment",'',true);
	    $this->json->jsonReturn(array('view'=>$view));
    }
}