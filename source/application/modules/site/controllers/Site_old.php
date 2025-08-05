<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct();  
        // date_default_timezone_set("Asia/Kolkata"); 
        // ini_set('memory_limit', '1024M');
        // ini_set('max_execution_time', 2000);
        // $value = base_url();
        // setcookie("msceia",$value, time()+3600*24,'/');
        $this->load->model('common_model');
        $this->load->model('site_model');
        $this->load->model('student/student_model');
        $this->load->model('standard/standard_model');
        $this->load->library('cart');
        $this->load->library('pdf/pdf');
    }
    public function index()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['slider_data'] = $this->common_model->fetch_visible_data('tbl_slider_master','slider_master_id');
        $data['members_data'] = $this->common_model->fetchDataASC_In_use('tbl_home_page_commitee','sequence_no');
        $data['clients_data'] = $this->common_model->fetchDataASC_In_use('tbl_our_client','our_client_id');
        $data['gr_data'] = $this->common_model->fetchDataASClimit('tbl_gr_master','gr_master_id',10);
        $data['news_data']= $this->common_model->fetch_visible_data('tbl_news_master','news_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('index',$data);
    }

    public function committee()
    {   
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['committee_data']=$this->common_model->fetchDataASC('tbl_committee','committee_id');
        $this->load->view('committee-members',$data);
    }
    public function gallery()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['gallery_data']=$this->common_model->fetchDataDESC('tbl_gallery_master','gallery_master_id');
        $this->load->view('gallery',$data);
    }
    public function my_profile()
    { 
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_code = $this->session->userdata('institute_code');
        if(!isset($institute_code) && empty($institute_code))
        {
            redirect('');
        }
        $id = $this->session->userdata('institute_id');
        $data['user_data']=$this->site_model->institute_details($id);
        $this->load->view('my-profile',$data);
    }
    public function edit_profile()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['district_data'] = $this->common_model->fetchDataASC_In_use('tbl_district','district_id');
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $id = $this->session->userdata('institute_id');
        $data['user_data']=$this->site_model->institute_details($id);
        $this->load->view('edit-profile',$data);
    }
    public function my_profilesidebar($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('my-profilesidebar');
    }
    public function change_password()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('change-password',$data);
    }
    public function renewal_form($id=false)
    {
        $id = $this->session->userdata('institute_id');
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['insti_data'] = $this->common_model->selectDetailsWhr('tbl_renewal','institute_id',$id);
        $this->load->view('renewal-form',$data);
    }

    public function suchna()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['gr_data'] = $this->common_model->fetchDataDESC_In_use('tbl_gr_master','gr_master_id');
        $this->load->view('suchna',$data);
    }
    public function sign_up()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
         $data['district_data'] = $this->common_model->fetchDataASC_In_use('tbl_district','district_id');
        $this->load->view('sign-up',$data);
    }

    public function forgot_password()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('forgot-password',$data);
    }
    public function new_renewal_form($id=false)
    {
        $id = $this->session->userdata('institute_id');
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['insti_data'] = $this->common_model->selectDetailsWhr('tbl_inspection','institute_id',$id);
        $this->load->view('new-renewal-form',$data);
    }
    public function print_renewal_new_form()
    {
        $this->load->library('pdf/pdf');
        $id = $this->session->userdata('institute_id');
        $data['form_data'] = $this->common_model->selectDetailsWhr('tbl_inspection','institute_id',$id);
        $html = $this->load->view('site/print_renewal_new_pdf', $data, true); 
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);   
    }
    public function student_registration()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['district_data']=$this->common_model->fetchDataASC_In_use('tbl_district','district_id');
        $data['course_master_data']=$this->common_model->fetchDataASC('tbl_course_master','course_master_id');
        //$data['batch_data'] = $this->custom_model->fetch_current_batch();
        $data['batch_data'] = $this->custom_model->fetch_current_upcoming_batch();
        // echo $this->db->last_query(); die;
        $this->load->view('student-registration',$data);
    }

    public function edit_student($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);        
        $data['student_data'] = $this->common_model->selectDetailsWhr('tbl_student','student_id',$id);
        $data['district_data']=$this->common_model->fetchDataASC_In_use('tbl_district','district_id');
        $data['course_master_data']=$this->common_model->fetchDataASC('tbl_course_master','course_master_id');
        $data['batch_data'] = $this->custom_model->fetch_current_batch();
        $data['batch_data'] = $this->custom_model->fetch_current_upcoming_batch();
        $this->load->view('student-registration',$data);
    }
    public function faq()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['faq_topic_data']=$this->common_model->fetchDataASC_In_use('tbl_faq_topics','faq_topic_id');
        $this->load->view('faq-que',$data);
    }
    public function sabhasad()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['district_data']=$this->common_model->fetchDataDesc('tbl_district','district_id');
        $this->load->view('sabhasad',$data);
    }
    public function sabhasad_list($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['district_data_list'] =$this->common_model->selectMultiDataFor('tbl_institute','district_id','institute_status',$id,'Active');
        $data['district']=$this->common_model->selectDetailsWhr("tbl_district","district_id",$id); 
        $this->load->view('sabhasad-list',$data);
    }
    public function contact_us()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('contact-us',$data);
    }
    public function student_result()
    {   
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('student-result',$data);
    }

    public function fetch_result()
    {
       $seat_no = $this->input->post('seat_no');
       $exam_password = $this->input->post('exam_password');
       $data['resultData'] = $this->site_model->fetch_result($seat_no,$exam_password);
       $this->load->view('result_view',$data);
    }

    public function download_student_result($id)
    {
        $this->load->library('pdf/pdf');
        $data['student_data']=$this->common_model->selectDetailsWhr('view_student','student_id',$id);        
        $html=$this->load->view('download_result_pdf',$data,TRUE);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);        
    }

    public function view_student_result($user_id)
    {
        $data['stud_data'] = $this->common_model->selectDetailsWhr('view_student','student_id',$user_id);
        $data['stud_details'] = $this->student_model->selectDetailsStud('tbl_student_result','student_id',$user_id);
        $email_que = $data['stud_details']->email_id;
        $data['email_data'] = $this->common_model->selectDetailsWhr('tbl_email','email_id',$email_que);
        $speed_que = $data['stud_details']->speed_id;
        $data['speed_data'] = $this->common_model->selectDetailsWhr('tbl_speed','speed_id',$speed_que);
        $course_master_id = $data['stud_data']->course_master_id;
        $data['question_data'] = $this->student_model->fetch_objective($user_id,$course_master_id);
        $this->load->view("view-stud-result",$data);
    }

    public function print_all_student_result()
    {
        $this->load->library('pdf/pdf');
        $inst_id = $this->session->userdata('institute_id');
        $data['stud_data']=$this->site_model->print_student_result($inst_id);
        $data['stud_data_ssd']=$this->site_model->print_student_result_ssd($inst_id);        
        $html=$this->load->view('download_all_result_pdf1',$data,TRUE);
        $config = array (
                            'margin_top'=>10,
                            'margin_right'=>20,
                            'margin_bottom'=>10,
                            'margin_left'=>20,
                            'footer_margin'=>10,
                            'header_margin'=>10,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);
    }

    public function download_link()
    {   
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['download_data'] = $this->common_model->fetch_visible_data('tbl_download_link_master','download_link_master_id');
        $this->load->view('download-link',$data);
    }
    public function fees()
    {   
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id = $this->session->userdata('institute_id');
        $institute_code = $this->session->userdata('institute_code');
        // $data['latest_batch_data']=$this->custom_model->get_current_batch();
        // $batch_id = $data['latest_batch_data']->batch_id; 
        // $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_id',$batch_id);
        //$data['inst_data']=$this->common_model->selectDetailsWhr('view_institute_jan22','institute_id',$institute_id);
        $data['inst_data']=$this->site_model->get_batchwise_institute_data($institute_id);
        $data['current_batch_cnt']=$this->site_model->current_batch_cnt($institute_code);
        $data['upcoming_batch_cnt']=$this->site_model->upcoming_batch_cnt($institute_code);

        $data['stud_count'] =$this->custom_model->getappearstudentcount($institute_id);
        $data['payment_adjusted'] = $this->site_model->payment_adjusted_stud($institute_id);
        $this->load->view('fees',$data);
    }
    public function pariksharthi()
    {   
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('pariksharthi',$data);
    }
    public function institute_stud_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id = $this->session->userdata('institute_id');
        $latest_batch_data=$this->custom_model->get_current_batch();
        $batch_id = $latest_batch_data->batch_id;
        $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_id',$batch_id); 
        $data['student_data']=$this->site_model->fetch_student_data($institute_id);
        $p_cnt=0;
        if(isset($data['student_data']) && !empty($data['student_data']))
        {
            foreach ($data['student_data'] as $key) {
                if($key->student_status=='appear')
                {
                    $p_cnt = $p_cnt+1;
                }
            }
        }
        $data['p_cnt'] = $p_cnt;
        $data['inst_data']=$this->common_model->selectDetailsWhr('view_institute_jan23','institute_id',$institute_id);
        $this->load->view('institute-stud-list',$data);
    }
    public function track_courier()
    {
        $id = $this->session->userdata('institute_id');
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName']; 
        $data['last_id']= $this->site_model->batch_lastinsert();
        $last_id = $data['last_id']->batch_id - 1 ; 
        $data['batch_data']=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$last_id);
        $data['inst_data']=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$id);
        $this->load->view('track-courier',$data);
    }
    public function upload_institute_onwer_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/inst_owner_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/inst_owner_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 130px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
    public function site_logout()
    {
        $this->authentication->site_logout();
        redirect('');
    }
    public function news_details($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['news_data']=$this->common_model->selectDetailsWhr('tbl_news_master','news_id',$id);
        $this->load->view('news-details',$data);
    }
    public function suchna_details($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['gr_master_data']=$this->common_model->selectDetailsWhr('tbl_gr_master','gr_master_id',$id);
        $this->load->view('suchna-details',$data);
    }
    public function msceia_bonafide()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['batch_data'] = $this->common_model->fetchDataASC_In_use('tbl_batch','batch_id');
        $data['current_batch_data']=$this->common_model->selectDetailsWhr('tbl_current_batch','in_use','Y');
        $this->load->view('msceia-bonafide',$data);
    }
    public function dump_stud_data_batchwise()
    {      
        $batch_id=$this->input->post('id');
        $id = $this->session->userdata('institute_id');
        $data['stud_data'] = $this->site_model->student_data_batch_wise($id,$batch_id);
        $view = $this->load->view('batch-wise-stud-list',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
    }
    public function print_msceia_bonafide($id)
    {
        $this->load->library('pdf/pdf');
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['form_data']=$this->common_model->selectDetailsWhr('view_student','student_id',$id);
        $html=$this->load->view('site/print_msceia_bonafide', $data, true);
        $config = array (
                            'margin_top'=>10,
                            'margin_right'=>10,
                            'margin_bottom'=>10,
                            'margin_left'=>30,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);         
    }
    public function terms_condition()
    {
        $this->load->view('terms-condition');
    }
    public function print_renewal_form()
    {
        $this->load->library('pdf/pdf');
        $institute_id=$this->session->userdata('institute_id');
        $data['form_data']=$this->common_model->selectDetailsWhr('tbl_renewal','institute_id',$institute_id);
        $html=$this->load->view('site/renewal_pdf', $data, true);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>10,
                            'margin_bottom'=>20,
                            'margin_left'=>30,
                            'footer_margin'=>10,
                            'header_margin'=>10,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'one/two/three/four/five/six/2.pdf'                       
                  );
        return $this->pdf->write($html,$config);      
    }
    public function old_student_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['batch_data'] = $this->site_model->fetch_all_batch_not_current();
        $data['last_id']= $this->site_model->batch_lastinsert();
        $last_id = $data['last_id']->batch_id - 1 ; 
        $data['stud_data']=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$last_id);
        $this->load->view('old-student-list',$data);
    }
    public function dump_old_stud_data_batchwise()
    {      
        $batch_id=$this->input->post('id');
        $id = $this->session->userdata('institute_id');
        $data['stud_data'] = $this->site_model->student_data_batch_wise($id,$batch_id);
        $view = $this->load->view('batch-wise-old-stud-list',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
    }
    public function upload_student_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $n=27;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $randomString = ''; 
            for ($i = 0; $i < $n; $i++) { 
                $index = rand(0, strlen($characters) - 1); 
                $randomString .= $characters[$index]; 
            } 
            $name = $randomString . '.' . $extension;
            $location = './uploads/student_photos/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/student_photos/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
    public function add_stud_payment()
    {
        $institute_id=$this->session->userdata('institute_id');
        $id=$this->input->post('checkbox');
        $id_count= (isset($id) && !empty($id)) ? count($id) : 0;

        $this->db->trans_start();
            $data1=array('student_status'=>'not_appear');
            $this->site_model->updateDetailsWithConditions('tbl_student','institute_id',$institute_id,'student_status','appear',$data1);
            for($i=0;$i<$id_count;$i++)
            {
                $data[]=array('student_id'=>$id[$i],'student_status'=>'appear');
                $this->common_model->update_batch('tbl_student',$data,'student_id');
            }     
        $result=$this->db->trans_complete();

        $this->json->jsonReturn(array(
            'state'=>true,
            'msg'=>'Student Added for Payment!',
            'redirect'=>'fees'
        ));
    }
    public function save_online_pay()
    {    
        $institute_id=$this->session->userdata('institute_id');
        $mobile=$this->session->userdata('mobile');
        $email=$this->session->userdata('email');
        $inst_name=$this->input->post('inst_name');
        $inst_code=$this->input->post('inst_code');
        $cash_depositer_name=$this->input->post('cash_depositer_name');
        $stud_count=$this->input->post('stud_count');
        $paid_amount=$this->input->post('paid_amount');
        $payment_mode=$this->input->post('payment_mode');
        $transaction_id=$this->generateRandomString();

        //echo $email; die;
        $order_data = array('institute_id'=>$institute_id,'institute_name'=>$inst_name, 'institute_code'=>$inst_code,'mobile'=>$mobile,'email'=>$email,'depositer_name'=>$cash_depositer_name,'total_student'=>$stud_count,'total_amount'=>$paid_amount,'payment_mode'=>$payment_mode,'transaction_no'=>$transaction_id, 'status'=>"Pending", "display"=>"Y","modified_by" => $institute_id);
        $payment_id = $this->common_model->addData("tbl_payment", $order_data);
        $order_data['payment_id'] = $payment_id;
        
        $this->load->library('Easebuzz_lib');
        $this->easebuzz_lib->onlinePayment($order_data);
    }

    public function generateRandomString()
    {   
        $day=date ("d");
        $month=date ("m");
        $year=date ("Y");
        $time=time();
        $dmyt=$day+$month+$year+$time;    
        $random = rand(0,10000000);  
        $dmtran= $dmyt+$random;
        $unique=  uniqid();
        $dmtun = $dmtran.$unique;
        $mdun = strtoupper(md5($dmtran.$dmtun));
        $uniqueString = substr($mdun, 5, -15); // getting 12 character length code.
        return $uniqueString;
    }

    public function order_success()
    {
        if($_POST["status"] == "userCancelled") {
            redirect(base_url() . "fees");
        }

        $institute_id = $_POST['udf1'];
        $payment_id = $_POST['udf2'];

        $order_data = array(
            'bank_ref_num'=>$_POST['bank_ref_num'], 
            'easepayid'=>$_POST['easepayid'], 
            'status'=>$_POST['status'],
            'payment_status'=> ($_POST["status"] === "success")?"payment_success":"payment_unsuccess",
            'modified_on'=>date('Y-m-d H:i:s',strtotime($_POST["addedon"]))
        );
        
        $this->common_model->updateDetails('tbl_payment','payment_id',$payment_id,$order_data);

        if($_POST["status"] === "success") 
        {
            $current_batch_data=$this->custom_model->get_current_batch();
            $c_batch_id = $current_batch_data->batch_id;
            $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
            $u_batch_id = $upcoming_batch_data->batch_id;
            $stud_data = $this->custom_model->select_latest_batch_apper_student1($institute_id,$c_batch_id,$u_batch_id);

            $institute_data = $this->common_model->selectDetailsWhr("tbl_institute", "institute_id", $institute_id);
            $username = $institute_data->institute_code;
            $password = $institute_data->institute_password;
            $roleId = $institute_data->role_id;
            $this->authentication->login($username,$password,$roleId);


            foreach ($stud_data as $key) {
                $stud[] = array('student_id' => $key->student_id, 'student_status' => 'payment', 'payment_id'=>$payment_id,);
            }

            $this->common_model->UpdateMultiData('tbl_student',$stud,'student_id');

            $ins_data = array('download_status' => 'Active');

            $this->common_model->updateDetails('tbl_institute', 'institute_id', $institute_id, $ins_data);
            // $inst_data = $this->common_model->selectDetailsWhr('tbl_institute', 'institute_id', $institute_id);
            // $mob_msg = 'Demo Exam software link now activated, kindly download from msceia.in website. For any support call to MSCEIA team.';
            // sendSms($inst_data->institute_contact, $mob_msg);

            $id = $this->encryptdecryptstring->encrypt_string($payment_id);
            redirect(base_url() . "confirm/" . $id);        
        }
        else {
            //redirect(base_url() . "order_failure");
            $this->load->view('order_failure');
        }
    }

    public function order_failure()
    {
        $status = $_POST["status"];
        $firstname = $_POST["firstname"];
        $amount = $_POST["amount"];
        $txnid = $_POST["txnid"];
        $posted_hash = $_POST["hash"];
        $key = $_POST["key"];
        $productinfo = $_POST["productinfo"];
        $email = $_POST["email"];
        $udf1 = $_POST['udf1'];
        $udf2 = $_POST['udf2'];
        $institute_data = $this->common_model->selectDetailsWhr("tbl_institute", "institute_id", $udf2);
        $username = $institute_data->institute_code;
        $password = $institute_data->institute_password;
        $roleId = $institute_data->role_id;
        $this->authentication->login($username,$password,$roleId);
        // $salt = "kQutChXjLZ";
        $salt="dG1v6G373V";
        $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        $hash = hash("sha512", $retHashSeq);
        if ($hash != $posted_hash) {
            // echo "<center><br><br><br><br>";
            // echo "Invalid Transaction. Please try again";
            // echo "<br><br>";
            // echo "Invalid Transaction. Please try again";
            // echo "</center>";
            $this->load->view('order_failure');
        } else {
            $data['status'] = $status;
            $data['txnid'] = $txnid;
            $this->load->view('order_failure_with_hash',$data);
            // echo "<center><h3>Your order status is " . $status . ".</h3></center>";
            // echo "<center><h4>Your transaction id for this transaction is " . $txnid . ". You may try again by clicking <a href='" . base_url() . "fees'>here</a>.</h4></center>";
            // echo "<a></a>";
        }
    }

    public function confirm($payment_id)
    {
        $id = $this->encryptdecryptstring->decrypt_string($payment_id);
        $data['fees'] = $this->common_model->selectDetailsWhr('tbl_payment', 'payment_id', $id);
        $this->load->view('confirm',$data);
    }

    public function print_payment_receipt($payment_id)
    {
        $this->load->library('pdf/pdf');
        $id = $this->encryptdecryptstring->decrypt_string($payment_id);
        $data['payment_data'] = $this->common_model->selectDetailsWhr('tbl_payment', 'payment_id', $id);
        $data['student_data'] = $this->common_model->selectAllWhr('view_student','payment_id',$id);
        $pdfname='Appeared Student';
        $html=$this->load->view('site/print_payment_receipt', $data, TRUE);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            'output'=>'O',
                            'format'=>'A4'                     
                  );
        return $this->pdf->write($html,$config);
    }

    public function student_registration_excel()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $this->load->view('student-registration-using-excel',$data);
    }
    public function upload_stud_excel()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000000, 999999999) . '.' . $extension;
            $location = './uploads/stud_reg_excel/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $file_path = base_url().'uploads/stud_reg_excel/'.$name;
            echo $name;
        }
    }

    public function appeared_students()
    {
        $this->load->library('pdf/pdf');
        /*
        $inst_id = $this->session->userdata('institute_id');
        $data['stud_data']=$this->common_model->selectMultiDataFor('view_student','institute_id','student_status',$inst_id,'payment'); 
        */
        $institute_id = $this->session->userdata('institute_id');
        $latest_batch_data=$this->custom_model->get_current_batch();
        $batch_id = $latest_batch_data->batch_id;
        $data['stud_data']=$this->custom_model->getpaymentstudentcount($institute_id);    
        $html=$this->load->view('site/appeared_students', $data, TRUE);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);
        
    }

    public function check_password()
    {
        $user_id=$this->session->userdata('institute_id');
        $password=trim($this->input->post('password'));
        $download_id=$this->input->post('download_id');
        $download_data = $this->common_model->selectDetailsWhr('tbl_download_link_master','download_link_master_id',$download_id);
        // $download_details = $this->site_model->check_exam_download_details($user_id);
        $data['userData'] = $this->common_model->selectDetailsWhr('tbl_institute','institute_id',$user_id);
        $inst_password=$data['userData']->institute_password;
        $download_status=$data['userData']->download_status;
        $db_status=$data['userData']->db_status;
        if($inst_password==$password)
        {
            if($download_data->download_link_master_id==1)
            {
                if($download_status=='Active')
                {
                    if($download_data->download_link_master_id==1)
                    {
                        if($db_status=='pending')
                        {
                           $data = array('db_status' => 'download');
                           $result = $this->common_model->updateDetails('tbl_institute','institute_id', $user_id, $data);
                        }
                        $link=$download_data->download_link;
                    }
                    else
                    {
                        $link=$download_data->download_link;
                    }
                    $this->json->jsonReturn(array(
                        'valid' => TRUE,
                        'msg' => '<strong>Please Wait.. </strong>Software Downloaded Shortly..!',
                        'redirect'=>$link
                    ));
                }
                else
                {
                    $this->json->jsonReturn(array(
                        'valid'=>FALSE,
                        'msg'=>'<strong>Please Wait.. </strong> Elearn Practice Software Link Will Get Activate After Student Payment is Done !'
                    ));
                }
            }
            // elseif($download_data->download_link_master_id==2)
            // {
            //     if($download_status=='Active' && empty($download_details))
            //     {
            //         if($download_data->download_link_master_id==2)
            //         {
            //             if($db_status!='exam install' && $db_status!='upload')
            //             {
            //                $data = array('db_status' => 'exam download');
            //                $result = $this->common_model->updateDetails('tbl_institute','institute_id', $user_id, $data);
            //             }
            //             $link=$download_data->download_link;
            //         }
            //         else
            //         {
            //             $link=$download_data->download_link;
            //         }
            //         $this->json->jsonReturn(array(
            //             'valid' => TRUE,
            //             'msg' => '<strong>Please Wait.. </strong>Software Downloaded Shortly..!',
            //             'redirect'=>$link
            //         ));
            //     }
            //     else
            //     {
            //         $this->json->jsonReturn(array(
            //             'valid'=>FALSE,
            //             'msg'=>'<strong>Please Wait.. </strong> Pay Your Student Fees First...'
            //         ));
            //     }
            // }
            else
            {
                $link=$download_data->download_link;
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<strong>Please Wait.. </strong> Software Downloaded Shortly..!',
                    'redirect'=>$link
                ));
            }
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<strong>Error!</strong> You Enter Wrong Current Password!'
            ));         
        } 
    }

    public function hallticket()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_id = $this->session->userdata('institute_id');
        $latest_batch_data=$this->custom_model->get_current_batch();
        $batch_id = $latest_batch_data->batch_id;
        $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_id',$batch_id);
        $data['student_data']=$this->custom_model->get_hallticket_current_batch($institute_id); // Temporary data for fetch 2 batch students
        $this->load->view('hallticket',$data);
    }

    public function hallticket_all($limit)
    {
        $this->load->library('pdf/pdf');
        $limit=$this->uri->segment(2);
        $id=$this->session->userdata('institute_id');
        $ins_name=$this->session->userdata('institute_name');
        $data['student_data']=$this->custom_model->hallticket_all($id,$limit); // Original data to fetch students
        $html=$this->load->view('hallticket_pdf_all',$data,TRUE);
        $config = array (
                            'margin_top'=>10,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);
    }

    public function hallticket_student($id)
    { 
        $this->load->library('pdf/pdf');
        $id = $this->encryptdecryptstring->decrypt_string($id);
        $data['student_data']=$this->common_model->selectDetailsWhr('view_student','student_id',$id);
        $html=$this->load->view('hallticket_pdf',$data,TRUE);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);
    }

    public function download_attendance()
    {
        $this->load->library('pdf/pdf');
        $institute_id= $this->session->userdata('institute_id');
        // $data['attendance_data']=$this->common_model->selectMultiDataFor('view_student','institute_id','student_status',$id,'payment');
        $data['attendance_data']=$this->custom_model->get_hallticket_current_batch($institute_id); // Original data to fetch students
        $html=$this->load->view('attendance_pdf',$data,TRUE);
        $config = array (
                            'margin_top'=>20,
                            'margin_right'=>20,
                            'margin_bottom'=>20,
                            'margin_left'=>20,
                            'footer_margin'=>5,
                            'header_margin'=>5,
                            //'password'=>'s',                       
                            //'rights'=>array('print'),
                            //'backtoback'=>1,
                            'output'=>'O',
                            'format'=>'A4',
                            //'file'=>'uploads/bonafide.pdf'                       
                  );
        return $this->pdf->write($html,$config);
    }

    public function duplicate() 
    {
        $id=$this->input->post('id');
        $p_key=$this->input->post('p_key');
        $tbl=$this->input->post('tbl');
        $where=$this->input->post('where');     
        $value=$this->input->post('value');
        $result=$this->common_model->duplicate($id,$p_key,$tbl,$where,$value);
        if($result->numrows>0)
        {
            $this->json->jsonReturn(array(
                'valid'=>true,
                'msg'=>'<strong>"'. $value.'" </strong> Record Already Exist !'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>False
            ));
        }
    }

    public function save_forgot_pass_site()
    {
        $email=$this->input->post('institute_mail'); 
        $password=mt_rand(100000,999999);

        $userData = $this->common_model->selectDetailsWhr('tbl_institute','institute_mail',$email);
        print_r($userData);
        if(isset($userData) && !empty($userData))
        {   
            $institute_id=$userData->institute_id;
            $user_data=array('institute_password'=>$password);
            $result=$this->site_model->forgot_pass_site($user_data,$password,$institute_id,$email);
            //print_r($result); die();
            if($result)
            {
                $this->json->jsonReturn(array(
                  'state'=>TRUE,
                  'msg'=>'New Password Send To Your Register Email Id!'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                  'state'=>FALSE,
                  'msg'=>'Error! While Password Sending On Email id!'
                ));
            }
        }
        else
        {
            $this->json->jsonReturn(array(
              'state'=>FALSE,
              'msg'=>'Error! You Enter Wrong Register Email id!'
            ));     
        } 
    }

    public function upload_exam_status()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_code=$this->uri->segment(2);
        $data['upload_status']= $this->site_model->current_batch_cnt($institute_code);
        $this->load->view('upload_status',$data);
    }
    public function upload_status()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $institute_code=$this->uri->segment(2);
        $this->load->view('upload_exam_status',$data);
    }

    public function upload_student_pdf()
    {
        $id=$this->uri->segment(2);
        $data['inst_data']=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$id);
        //$data['stud_data']=$this->site_model->student_status_data_temp($id); // Temporary data to fetch students
        $data['stud_data']=$this->custom_model->get_hallticket_current_batch($id);
        $pdfname='Exam status';        
        $view=$this->load->view('exam_status',$data,TRUE);
              
        $config = array (
            'margin_top'=>10,
            'margin_right'=>10,
            'margin_bottom'=>10,
            'margin_left'=>15,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',  

        );
        return $this->pdf->write($view,$config); 
    }

    public function payment_history()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['batch_data'] = $this->common_model->fetchDataASC_In_use('tbl_batch','batch_id');       
        $result = $this->site_model->getCurrentBatch();
        $data['current_batch_id'] = $result['0']['batch_id'];
    	$this->load->view('payment_history',$data);
    }

    public function batch_wise_payment_history()
    {      
        $batch_id=$this->input->post('id');       
        $data['paymentHistory'] = $this->site_model->get_batchwise_payment_history_student($batch_id); 
        $view = $this->load->view('batch-wise-payment-history',$data,true);
        $this->json->jsonReturn(array(
            'valid'=>true,
            'view'=>$view
        ));
    }

    public function print_payment_history($id)
    {
        $id =$this->uri->segment(2);       
        $pay_id = $this->encryptdecryptstring->decrypt_string($id);        
        $data['payment_history']=$this->site_model->payment_history_details($pay_id);        
        $pdfname='Payment Receipt';
        $html=$this->load->view('print_payment_history',$data,TRUE); 

        $config = array (
            'margin_top'=>10,
            'margin_right'=>10,
            'margin_bottom'=>10,
            'margin_left'=>15,
            'footer_margin'=>5,
            'header_margin'=>5,
            'output'=>'O',
            'format'=>'A4',
        );
        return $this->pdf->write($html,$config); 
    }

    public function QR_page()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('QR-page',$data);
    }

    public function certificates()
    {
        $institute_id= $this->session->userdata('institute_id');
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['inst_data_jan23']=$this->common_model->selectDetailsWhr('view_institute_jan23','institute_id',$institute_id);

        $this->load->view('certificates',$data);
    }
}
