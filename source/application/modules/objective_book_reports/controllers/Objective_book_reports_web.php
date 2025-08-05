<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_book_reports_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 18 apr 20
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('objective_book_model');
    }
    public function objective_payment_report()
    {
    	$this->load->view('objective_payment_report');
    }
}