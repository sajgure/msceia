<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 27 mar 20
	-------------------------------------------------------------
	*/
    
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('student_model');

	}

	public function student_list()
	{ 
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['current_batch_data']=$this->common_model->selectDetailsWhr('tbl_current_batch','in_use','Y');
        $data['institute_data']=$this->common_model->fetchDataDESC('tbl_institute','institute_id');
        $data['batch_data']=$this->common_model->fetchDataDESC('tbl_batch','batch_id');
	    $this->load->view('student-list',$data);
	}
	public function student_birthday()
	{ 
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
		$this->load->view('student_birthday',$data);
	}
	public function get_stud_list()
	{
		$inst_id =$this->input->post('id');
        $status = $this->input->post('status'); 
		$batch_id = $this->input->post('batch_id');
		$data['url']='student_list_table/'.$inst_id.'/'.$status.'/'.$batch_id;
		$this->load->view('student_view',$data);
	}
    public function student_result()
    {
    	$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['institute_data']=$this->common_model->fetchDataDESC('tbl_institute','institute_id');
    	$this->load->view('student_result',$data);
    }
    public function get_result_list()
	{
		$inst_id =$this->input->post('id');
		$data['url']='student_result_table/'.$inst_id;
		$this->load->view('student_result_view',$data);
	}

	public function view_result($user_id)
	{
		$data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
	    $data['stud_data']=$this->common_model->selectDetailsWhr('view_student','student_id',$user_id);
	    $data['stud_details']=$this->student_model->selectDetailsStud('tbl_student_result','student_id',$user_id);
	    $data['email_data']=$this->common_model->selectDetailsWhr('tbl_email','email_id',$data['stud_details']->email_id);
	    //$data['email_data']=$this->common_model->selectDetailsWhr('tbl_email_section','email_section_id',$email_que);
	    $speed_que  = $data['stud_details']->speed_id;
	    $data['speed_data']=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$speed_que);
        $course_master_id = $data['stud_data']->course_master_id;
	    $data['question_data']=$this->student_model->fetch_objective($user_id,$course_master_id);
	    $this->load->view("view-result",$data);
	}
	
	public function download($type,$id,$student_id)
    {
        if($type=='word_que')
        {
            $data=$this->common_model->selectDetailsWhr('tbl_letter','letter_id',$id);
            $path='./uploads/letter_answer/que_'.$student_id.'.docx';
            $base64=$data->letter_base64; 
        }
        else if($type=='word_ans')
        {
            $data=$this->student_model->selectDetailsStud('tbl_student_result','student_id',$student_id);
            $path='./uploads/letter_answer/ans_'.$student_id.'.docx';
            $base64=$data->letter_base64;
        }
        else if($type=='excel_que')
        {
            $data=$this->common_model->selectDetailsWhr('tbl_statement','statement_id',$id);
            $path='./uploads/statement_answer/que_'.$student_id.'.xls';
            $base64=$data->statement_base64;
        }
        else if($type=='excel_ans')
        {
            $data=$this->student_model->selectDetailsStud('tbl_student_result','student_id',$student_id);
            $path='./uploads/statement_answer/ans_'.$student_id.'.xls';
            $base64=$data->statement_base64;
        }

        $decoded = base64_decode($base64);
        file_put_contents($path,$decoded);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($path) . "\""); 
        readfile($path);
    }

    public function today_registered_students()
    { 
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('today-registered-students',$data);
    }
}

