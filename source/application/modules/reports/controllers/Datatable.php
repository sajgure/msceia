<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 02-Apr-2020
	Modified :Shubhnagi Todakar             Date: 17-Sept-2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring');
		$this->load->model('report_model'); 
    }
    public function fees_report_table($batch_id=NULL)
    {
    	// $whr='';
	    // if($batch_id)$whr=$whr.'batch_id="'.$batch_id.'" AND ';
    	// $query = "SELECT tp.*,td.batch_id,tu.username FROM tbl_payment AS tp LEFT JOIN tbl_payment_details AS td ON td.payment_id = tp.payment_id LEFT JOIN tbl_user AS tu ON tu.user_id = tp.modified_by WHERE tp.display = 'Y' AND tp.status = 'success' GROUP BY tp.institute_id";
    	$query = "SELECT tp.*,tu.username FROM tbl_payment AS tp LEFT JOIN tbl_user AS tu ON tu.user_id = tp.modified_by WHERE tp.display = 'Y' AND tp.status = 'success'";
		$search = array('tp.institute_id','tp.institute_name','tp.institute_code','tp.depositer_name','tp.deposite_date','tp.total_amount','tp.total_student','tp.payment_mode','tp.transaction_no','tp.remark','tp.utr_image','tp.modified_by');
		$clause=''; 
		$order = "tp.deposite_date DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'') .' '.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')'.'</span>';
				if($key->depositer_name=="msceiateam")
				{
					$row[] = ((isset($key->depositer_name) && !empty($key->depositer_name)) ? $key->depositer_name.'<br><span>('.$key->username:'').')</span>';
				}
				else
				{
					$row[] = ((isset($key->depositer_name) && !empty($key->depositer_name)) ? $key->depositer_name:'');
				}
				$row[] = ((isset($key->deposite_date) && !empty($key->deposite_date))?date('d-m-Y',strtotime($key->deposite_date)):'');
				$row[] = ((isset($key->total_student) && !empty($key->total_student)) ? $key->total_student:'');
				$row[] = ((isset($key->total_amount) && !empty($key->total_amount)) ? $key->total_amount:'');
				$row[] = ((isset($key->payment_mode) && !empty($key->payment_mode)) ? $key->payment_mode:'');
				// $row[] = ((isset($key->transaction_no) && !empty($key->transaction_no))?$key->transaction_no:'');
				$path = '/uploads/fees_photo/'.((isset($key->utr_image) && !empty($key->utr_image))?$key->utr_image:'default.png');
				$row[] ='<center><a class="openModel" data-id="'.$path.'">'. ((isset($key->transaction_no) && !empty($key->transaction_no)) ? $key->transaction_no:'') .'</a></center>';
				$row[] = ((isset($key->remark) && !empty($key->remark))?$key->remark:'');
				$row[] ='<center><a href="'.base_url().'payment-details/'.((isset($key->payment_id) && !empty($key->payment_id)) ? $key->payment_id:'').'" class="label bg-blue tooltips " title="Student Info"><i class="fa fa-info-circle"></i></a></center>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function institute_count_table($district_id,$status)
    {
    	$whr='';
	    if($district_id)$whr=$whr.'district_id="'.$district_id.'" AND ';
	    if($status)$whr=$whr.'paid_student >="'.$status.'" AND ';
        $query = "SELECT * FROM view_institute_jan22 WHERE $whr display='Y' AND institute_status='Active'";
		$search = array('institute_id','institute_owner_photo','institute_owner_name','institute_name','institute_code','institute_mail','institute_contact','district_name','institute_taluka','institute_address','paid_student');
		$clause=''; 
		$order = "paid_student desc";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			foreach ($result as $key) 
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$path='./uploads/inst_owner_photos/'.((isset($key->institute_owner_photo) && !empty($key->institute_owner_photo))?$key->institute_owner_photo:'default.png');
                if (file_exists($path))
                {
				    $row[] = '<center><img src="'.base_url().'uploads/inst_owner_photos/'.((isset($key->institute_owner_photo) && !empty($key->institute_owner_photo))?$key->institute_owner_photo:'default.png').'" style="width:70%; border-radius: 10px;" alt=""><br><b>'.((isset($key->institute_owner_name) && !empty($key->institute_owner_name))?$key->institute_owner_name:" ").'</b></center>';
                }
				else {
				    $row[] = '<center><img src="'.base_url().'uploads/inst_owner_photos/default.png" style="width:70%; border-radius: 10px;" alt=""><br><b>'.((isset($key->institute_owner_name) && !empty($key->institute_owner_name))?$key->institute_owner_name:" ").'</b></center>';
				}
				$row[] = '<span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<p class="word"><strong>Email:- </strong>'.((isset($key->institute_mail) && !empty($key->institute_mail)) ? $key->institute_mail:'').'</p>'.'<strong>Mobile:- </strong>'. ((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:'');
				$row[] = ((isset($key->institute_address) && !empty($key->institute_address))?$key->institute_address:'').'<br>'.'<strong>District:- </strong>'. ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'').'<br>'.'<strong>Taluka:- </strong>'. ((isset($key->institute_taluka) && !empty($key->institute_taluka))?$key->institute_taluka:'');
				$row[] = '<center>'.((isset($key->paid_student) && !empty($key->paid_student))?$key->paid_student:'0').'</center>';
				
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function certificate_list()
    {
        $query = "SELECT * FROM view_institute_oct23 WHERE paid_student > 0 AND upload_student > 0 AND Pass_student > 0 AND display='Y'";
		$search = array('institute_id','institute_name','institute_code','institute_password','district_name','institute_contact','paid_student','upload_student','Pass_student');
		$clause=''; 
		$order = "district_name ASC,institute_id ASC,Pass_student Desc";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
		    $inst = [];
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] ='<span class="font-green-haze bold" style="text-transform:uppercase;">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'</span>';
				$row[] ='<span class="bold"> Inst_code: </span>' .((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'') .'<br>'. '<span class="bold"> Password: </span>' .((isset($key->institute_password) && !empty($key->institute_password))?$key->institute_password:'');
				$row[] = ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'');
				$row[] = ((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:'');
				
				$row[] = ((isset($key->paid_student) && !empty($key->paid_student)) ? $key->paid_student:'');
				$row[] = ((isset($key->upload_student) && !empty($key->upload_student)) ? $key->upload_student:'');
				$row[] = ((isset($key->Pass_student) && !empty($key->Pass_student)) ? $key->Pass_student:'0');
				$institute_id = $this->encryptdecryptstring->encrypt_string($key->institute_id);
    			if (!in_array($key->institute_code, $inst)) {
			        $inst[]= $key->institute_code;
    				$row[] = '<center><a target="_blank" href="certificate/'.$institute_id.'" rel="'.$key->institute_id.'" class="btn btn-success btn-sm" title="View Certificate"><i class="fa fa-eye"></i> View</a></center>';
    			}
    			else{ $row[] =''; }
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
	}
	
	public function student_information_table()
    {
		$payment_id = $this->session->userdata('payment_id');
    	$query = "SELECT ts.student_id,concat(ts.first_name,'',ts.father_name,'',ts.surname) AS stud_full_name,tc.course_name AS course_name,tp.payment_id,tp.transaction_no,tp.deposite_date FROM tbl_student AS ts LEFT JOIN tbl_payment AS tp ON ts.payment_id = tp.payment_id LEFT JOIN tbl_course_master AS tc ON ts.course_master_id = tc.course_master_id WHERE ts.payment_id = $payment_id AND ts.display = 'Y'";
		$search = array('ts.stud_full_name','tc.course_name','tp.transaction_no','tp.deposite_date','ts.student_id');
		$clause=''; 
		$order = "ts.student_id ASC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result)) 
		{
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<span class="font-green-haze bold">'.((isset($key->stud_full_name) && !empty($key->stud_full_name)) ? $key->stud_full_name:'').'</span>';
				$row[] ='<center>'.((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'').'</center>';
				$row[] = '<center>'.((isset($key->transaction_no) && !empty($key->transaction_no))?$key->transaction_no:'').'</center>';
				$row[] = '<center>'.((isset($key->deposite_date) && !empty($key->deposite_date)) ? date('d-m-Y',strtotime($key->deposite_date)):'').'</center>';
				$row[] = '<center>'.((isset($key->deposite_date) && !empty($key->deposite_date)) ? date('h:i:s',strtotime($key->deposite_date)):'').'</center>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
        // $this->session->unset_userdata('payment_id');
	}

}