<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Roshan Deshmukh				Date: 18 Dec 19
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct(); 
    }

	public function index()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        
        if($this->authentication->chk_login())
        {
            redirect('dashboard');
        }
        else
        {   
            $this->load->view('login',$data);
        }
    }

	public function chk_login() 
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $roleId = $this->input->post('role_id');
        // print_r( $roleId); die;

        $chklogin = false;
        if (!isset($username) or strlen($username) == 0)
        {
            $error = 'Please enter your username.';
        }
        elseif (!isset($password) or strlen($password) == 0)
        {
            $error = 'Please enter your password.';
        }
        else
        {
            $chklogin=$this->authentication->login($username,$password,$roleId);
            if(!$chklogin) $error = 'Wrong username / password, please try again.';
        }

        $ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
        if($chklogin && $ajax)
        //if($chklogin==true)        
        {
            $role_id = $this->session->userdata("role_id"); 
            if($role_id==3)
            {  
                $data=array(
                    'valid' => TRUE,
                    'redirect' => base_url().'my-profile'
                );
            }
            else
            {
                $data=array(
                    'valid' => TRUE,
                    'redirect' => base_url().'dashboard'
                );
            }
        }
        else{
              $data=array(
                'valid' => FALSE,
                'msg' => $error
            );
        }
        $this->json->jsonReturn($data);
    }	
    
   public function logout()
    {
        $this->authentication->logout();
        $role_id = $this->session->userdata("role_id"); 
        if($role_id==2)
        {
            $this->cart->destroy();
            redirect('index');
        }
        else
        {
            redirect('superadmin'); 
        }

    }
}
