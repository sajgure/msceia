<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objective_section_web extends Base_Controller 
{
    /*
    -------------------------------------------------------------
    Author       : Mohammad Shafi                Date: 16 apr 20
    Modified By  : Apurva Bandelwar              Date: 07/03/2022
    -------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('objective_section_model');
        $this->load->library('excel/excel');
        $this->load->library('report_creation');
        // newly added
        $this->load->library('pdf/pdf');
    }

    public function objective_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('objective_list',$data);
    }
    public function add_objective_section($id=NULL)
    {
        if($id)
        {
            $data['objective_section_data']=$this->common_model->selectDetailsWhr('tbl_question','question_id',$id);
        }
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['section_data']=$this->common_model->fetchDataAsc('tbl_section','section_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['option_data']=$this->common_model->selectAllwhr('tbl_option','question_id',$id);
        $this->load->view('add_objective_section',$data);
    }
    public function objective_payment_report()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('objective_payment_report',$data);
    }
    
    public function dateWisePaymentExcel($fdate,$tdate)
    {
        $payment_data=$this->objective_section_model->payment_data($fdate,$tdate);
        $this->excel->print_payment_excel($payment_data);
    }

    public function dateWisePaymentPDF($fdate,$tdate)
    {
        $data['payment_data']=$this->objective_section_model->payment_data($fdate,$tdate);
        $pdfname = 'Payment Report';
        $view = $this->load->view('objective_section/payment_reportpdf',$data,TRUE);
        //$this->report_creation->create_pdf1($view,$pdfname);
        $config = array (
            'margin_top'=>20,
            'margin_right'=>20,
            'margin_bottom'=>20,
            'margin_left'=>20,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',  

        );
        return $this->pdf->write($view,$config); 
    }
    public function district_wise_report()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('objective_district_wise_report',$data);
    }
    public function district_view_excel($district,$fdate,$tdate)
    {
        $district_wise_data= $this->objective_section_model->district_data($district,$fdate,$tdate);
        $this->excel->district_view_excel($district_wise_data);
    }
    public function district_wise_pdf($district,$fdate,$tdate)
    {
        $data['district_wise_data']= $this->objective_section_model->district_data($district,$fdate,$tdate);
        $pdfname='District_wise_report';
        $view = $this->load->view('district_wise_pdf',$data,TRUE);      
        //$this->report_creation->create_pdf($view,$pdfname);
        $config = array (
            'margin_top'=>20,
            'margin_right'=>20,
            'margin_bottom'=>20,
            'margin_left'=>20,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',
        );
        return $this->pdf->write($view,$config);
    }
    public function district_details_report()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('district_details_report',$data);
    }

    public function complete_district_report()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['district_data'] = $this->common_model->fetchDataASC('tbl_district','district_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('complete-district-report',$data);
    }
    public function district_details_report_excel($district,$fdate,$tdate)
    {
        $district_details_data= $this->objective_section_model->district_details_report($district,$fdate,$tdate);
        $this->excel->district_details_report_ex($district_details_data);
    }
    public function district_details_report_pdf($district,$fdate,$tdate)
    {
        $data['district_details_data']= $this->objective_section_model->district_details_report($district,$fdate,$tdate);
        $pdfname='District_wise_report';
        $view = $this->load->view('district_details_report_pdf',$data,TRUE);
        //$this->report_creation->create_pdf($view,$pdfname);
        $config = array (
            'margin_top'=>20,
            'margin_right'=>10,
            'margin_bottom'=>20,
            'margin_left'=>10,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',
        );
        return $this->pdf->write($view,$config);
    }
    public function upload_objective_questions()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['exam_type_data']=$this->objective_section_model->fetch_objective_exam_type();
        $this->load->view('upload-objective-questions',$data);
    }
    public function upload_objective_excel()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000000, 999999999) . '.' . $extension;
            $location = './uploads/objective_excel/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $file_path = base_url().'uploads/objective_excel/'.$name;
            echo $name;
        }
    }
    public function objective_questions_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['exam_type_data']=$this->objective_section_model->fetch_objective_exam_type();
        $data['course_data']=$this->objective_section_model->fetch_objective_course();
        $this->load->view('objective-questions-list',$data);
    }
    public function fetch_objective_questions_whr()
    {
        $exam_type=$this->input->post("exam_type");
        $course=$this->input->post("course"); 
        $data['url']='objective_questions_table/'.$exam_type.'/'.$course;
        
        // print_r($data['url']); die;
        $this->load->view('objective-questions-dump-view',$data);
    }
}