<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_activity_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Archana Patil				Date: 18-11-2021
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model');

        $this->load->library('Encryptdecryptstring');        
    }

    /*  
    =================================================================================
        Author:Archana Patil                      Date:18-11-2021
    =================================================================================
    */

    public function institute_activity_list()
    {
        //echo "inside function";
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];      
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['user_data']=$this->common_model->fetchDataAsc('tbl_institute_activity',' institute_activity_id');        
        $this->load->view('institute_activity_list',$data);
    }

    /*  
    =================================================================================
        Author:Archana Patil                      Date:18-11-2021
    =================================================================================
    */

    public function add_institute_activity($id=NULL)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);

        if($id)
        {
            $data['user_data']=$this->common_model->selectDetailsWhr('tbl_institute_activity',' institute_activity_id',$id);            
        }

        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];      
        $data['keydata']=$this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);     
        $this->load->view('add_institute_activity',$data);
    }
   
}

