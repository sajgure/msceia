<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {

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
	   // $this->output->cache(5);
	   error_reporting(E_ALL);
ini_set('display_errors', 'On');
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('dashboard',$data);
	}

	public function error_page()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $allowed_access = $this->config->load('app-config', TRUE)['allowed_access'];
    	$user_ip = $_SERVER['REMOTE_ADDR'];
        if(in_array($user_ip, $allowed_access))
		{
		    $this->load->view('dashboard',$data);
		}
    	else
		{
    	    $this->load->view('error-page',$data);
    	}
    }
}
