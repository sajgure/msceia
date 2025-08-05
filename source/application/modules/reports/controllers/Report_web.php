<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_web extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 02-Apr-2020
	-------------------------------------------------------------
	*/

	public function __construct()
  	{
	    parent::__construct();
        $this->load->model('reports/report_model'); 
	    $this->load->model('common_model'); 
        $this->load->library('Report_creation');
        //newly
        $this->load->library('pdf/pdf');
	    
    }
    public function fees_report()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['currentBatchInfo']=$this->common_model->alljoin2tbl('tbl_current_batch','tbl_batch','batch_id');
        $data['allBatches']=$this->common_model->fetchDataASC('tbl_batch','batch_id');
    	$data['fees_data'] = $this->report_model->fees_report();
    	$this->load->view('fees_report',$data);
    }
    public function get_fees_report(){
        
        $batch_id = $this->input->post('batch_id');
        $data['url']='fees_report_table/'.$batch_id;    
        $this->load->view('get-fees-report-view',$data);
    }
    public function print_fees_report()
    {
    	$this->load->library('excel');
    	$report=$this->report_model->fees_report();
    	$this->excel->generate_report($report);
    }
    public function institute_count()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id=$this->uri->segment(2);
        $status = $this->uri->segment(3); 
        $data['institute_id']=$institute_id;
        $data['status']=$status;
        $data['district_data']=$this->common_model->fetchDataASC('tbl_district','district_id');
        $this->load->view('institute_count',$data);
    }
    public function get_table_inst_count()
    {
        $district_id=$this->input->post("id");
        $status=$this->input->post("status"); 
        $data['institute_id']=$district_id;
        $data['status']=$status;
        $data['district_data']=$this->common_model->fetchDataASC('tbl_district','district_id');
        $data['url']='institute_count_table/'.$district_id.'/'.$status;
        $data['url1']='institute_count_pdf/'.$district_id.'/'.$status;
        $data['url2']='institute_count_excel/'.$district_id.'/'.$status;
        $this->load->view('inst_count_view',$data);
    }
    public function institute_count_pdf($district_id,$status)
    {
        $data['table_data']= $this->report_model->inst_count_data($district_id,$status);
        $pdfname='Institute_List';
        $html=$this->load->view('inst_count_pdf',$data,TRUE);
        //$this->report_creation->create_pdf($html,$pdfname);
        $config = array (
            'margin_top'=>10,
            'margin_right'=>10,
            'margin_bottom'=>10,
            'margin_left'=>10,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',  

        );
        return $this->pdf->write($html,$config); 
    }
    public function institute_count_excel($district_id,$status)
    {
        $this->load->library('excel');
        $institute_count_data=$this->report_model->inst_count_data($district_id,$status);
        $this->excel->institute_count_excel($institute_count_data);
    }
    public function certificate_print()
    {
        $this->load->view('certificate_print');
    }
    public function certificate($id)
    {
        //old batch result
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['inst_data_oct23']=$this->common_model->selectDetailsWhr('view_institute_dec24','institute_id',$id);
        // $data['inst_data_apr24']=$this->common_model->selectDetailsWhr('view_institute_dec24','institute_id',$id);
        $this->load->view('certificate',$data);
    }
    public function certificate_pdf($batch,$id,$limit)
    {
        $data['stud_result']=$this->report_model->passStudData($id,$limit,$batch,'backend');
        $data['batch'] = ($batch == 8) ? 'DEC-2024':'APR-2024';
        $pdfname=$data['stud_result'][0]->institute_name;
        $html=$this->load->view('certificate_pdf',$data,TRUE);
        $this->report_creation->create_pdf($html,$pdfname);
    }
    public function ssd_certificate_pdf($batch,$id,$limit)
    {
        $data['stud_result']=$this->report_model->ssd_passStudData($id,$limit,$batch,'backend');
        $data['batch'] = ($batch == 8) ? 'DEC-2024':'APR-2024';
        $pdfname=$data['stud_result'][0]->institute_name;
        $html=$this->load->view('ssd_certificate_pdf',$data,TRUE);
        $this->report_creation->create_pdf($html,$pdfname);
    }
    public function pass_student_list($batch,$id)
    {
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['ssd_stud_data'] =$this->report_model->ssd_pass_student_details($id,$batch);
        $data['stud_data'] =$this->report_model->pass_student_details($id,$batch);
        // $this->load->view('pass_student_list',$data);
        $html=$this->load->view('pass_student_list',$data,TRUE);
        $this->report_creation->create_pdf($html,'abc');
    }
    public function all_pass_student_list()
    {
        // $data['ssd_stud_data'] =$this->report_model->ssd_pass_student_details_all();
        $data['stud_data'] =$this->report_model->pass_student_details_all();
        // $this->load->view('pass_student_list',$data);
        $html=$this->load->view('all_pass_student_list',$data,TRUE);
        $this->report_creation->create_pdf($html,'abc');
    }
    public function payment_details($payment_id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $payment_id =  $this->uri->segment(2); 
        $this->session->set_userdata(array(
            'payment_id'  => $payment_id
        
        ));
        // $data['stud_data'] =$this->datatable->student_information_table($payment_id);
        $this->load->view('payment_details',$data);
    }
}