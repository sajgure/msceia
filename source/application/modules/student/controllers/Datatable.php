<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 27 mar 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }
   
   	public function student_list_table($inst_id,$status,$batch_id)
    {
        $status = str_replace('%20', ' ', $status);
    	$whr=' ';
    	if($inst_id)$whr=$whr.'institute_id="'.$inst_id.'" AND ';
    	if($status)$whr=$whr.'student_status="'.$status.'" AND ';
    	if($batch_id)$whr=$whr.'batch_id="'.$batch_id.'" AND ';
       	$query = "SELECT student_id,stud_full_name,institute_name,institute_code,email,mobile_no,course_name,course_master_id,district_name,district_id,seat_no,student_status,mac_id,batch_id,student_password FROM view_student WHERE $whr display = 'Y'";
		$search = array('student_id','stud_full_name','institute_name','institute_code','email','mobile_no','course_name','district_name','seat_no','student_status','mac_id');
		$clause=''; 
		$order = "student_id Asc";
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
				$row[] = ((isset($key->stud_full_name) && !empty($key->stud_full_name)) ? $key->stud_full_name:'');
				$row[] = '<span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<strong>Email:- </strong>'. ((isset($key->email) && !empty($key->email)) ? $key->email:'').'<br>'.'<strong>Mobile:- </strong>'. ((isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:'');
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'');
				$row[] = ((isset($key->seat_no) && !empty($key->seat_no)) ? $key->seat_no:'').'<br>'.'<span style="color: #F3565D;">'.((isset($key->student_password) && !empty($key->student_password))?$key->student_password:'');
				if($key->student_status=='payment')
				{
					$stud_status='<center><span class="label label-sm label-success"><b> Payment Done </b></span></center>';
				}
				elseif($key->student_status=='not_appear')
				{
					$stud_status='<center><span class="label label-sm label-danger"><b> Not Appear </b></span></center>';
				}
				elseif($key->student_status=='appear')
				{
					$stud_status='<center><span class="label label-sm label-warning"><b> Appear </b></span></center>';
				}
				if($key->mac_id)
				{
					$stud_mac ='<center><span style="cursor: pointer" class="tooltips macstatus btn btn-sm blue" data-html="true" title="Reset Student Mac." rev="reset-stud-mac-id" rel="'.$key->student_id.'" data-original-title="block Institute" data-placement="top"><i class="fa fa-undo"  data-original-title="Block Institute"></i></span></center>';
				}
				else
				{
					$stud_mac ='';
				}
				$row[] = $stud_status;
				$row[] = $stud_mac;
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }

    public function student_birthday_table()
    {
    	$date=date('Y-m-d');
       	$query = "SELECT * FROM view_student  WHERE DAY(date_of_birth)=DAY('$date') AND MONTH(date_of_birth)=MONTH('$date') AND display='Y' GROUP BY  stud_full_name ";
		$search = array('stud_full_name','institute_name','institute_code','email','mobile_no','course_name','district_name','institute_taluka');
		$clause=''; 
		$order = "student_id Asc";
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
				$row[] = '<span style="text-transform: capitalize;" class="font-green-haze bold">'.((isset($key->stud_full_name) && !empty($key->stud_full_name)) ? $key->stud_full_name:'').'</span>';
				$row[] = '<span style="font-weight: bold;">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<strong>Email:- </strong>'. ((isset($key->email) && !empty($key->email)) ? $key->email:'').'<br>'.'<strong>Mobile:- </strong>'. ((isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:'');
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = '<strong>Dist:- </strong>'. ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'').'<br><span><strong>Taluka:- </strong>'.((isset($key->institute_taluka) && !empty($key->institute_taluka)) ? $key->institute_taluka:'');
				if($key->wish_status=='Send'){
					$row[] = '<center><a class="btn btn-xs green" href="javascript:;">'.$key->wish_status.'</a></center>';
				}
				else{
					$row[] = '<center><a class="btn btn-xs btn-success" href="javascript:;">'.$key->wish_status.'</a></center>';
				}
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    
    public function student_result_table($inst_id)
    {
    	$current_batch_data=$this->custom_model->get_current_batch();
        // $current_batch_id=$current_batch_data->batch_id;
         $current_batch_id="9";
    	$whr='';
    	if($inst_id)$whr=$whr.'institute_id="'.$inst_id.'" AND ';
       	$query = "SELECT student_id,institute_id,first_name,surname,father_name,institute_name,institute_code,seat_no,exam_password,course_name,objective_marks,speed_marks,email_marks,letter_marks,statement_marks,mobile_marks,total_marks,result,student_status FROM view_student WHERE $whr display = 'Y' AND  batch_id = $current_batch_id AND exam_status = 'Upload'";
		$search = array('student_id','first_name','surname','father_name','objective_marks','letter_marks','speed_marks','statement_marks','email_marks','mobile_marks','total_marks','result','institute_name','institute_code','email','mobile_no','course_name','seat_no','student_password');
		$clause=''; 
		$order = "student_id Asc";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = ((isset($key->surname) && !empty($key->surname)) ? $key->surname:'').'<br>'.((isset($key->first_name) && !empty($key->first_name)) ? $key->first_name:'').'</br>'.((isset($key->father_name) && !empty($key->father_name)) ? $key->father_name:'');
				$row[] = ((isset($key->seat_no) && !empty($key->seat_no)) ? $key->seat_no:'').'<br><b>'.((isset($key->exam_password) && !empty($key->exam_password))?$key->exam_password:'').'<b>';
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = ((isset($key->objective_marks) && !empty($key->objective_marks)) ? $key->objective_marks:'0');
				$row[] = ((isset($key->email_marks) && !empty($key->email_marks)) ? $key->email_marks:'0');
				$row[] = ((isset($key->letter_marks) && !empty($key->letter_marks)) ? $key->letter_marks:'0');
				$row[] = ((isset($key->statement_marks) && !empty($key->statement_marks)) ? $key->statement_marks:'0');
				$row[] = ((isset($key->speed_marks) && !empty($key->speed_marks)) ? $key->speed_marks:'0');
				$row[] = ((isset($key->mobile_marks) && !empty($key->mobile_marks)) ? $key->mobile_marks:'0');
				$row[] = ((isset($key->total_marks) && !empty($key->total_marks)) ? $key->total_marks:'');
				if($key->result=='Pass'){
					$row[] = '<center><a class="btn btn-xs btn-success" href="javascript:;">PASS</a></center>';
				}
				else{
					$row[] = '<center><a class="btn btn-xs btn-danger" href="javascript:;">FAIL</a></center>';
				}
				$row[] = '<center><a class="btn btn-success btn-sm" target="_new" href="'.base_url().'view-result/'.$key->student_id.'"><i class="fa fa-search-plus" aria-hidden="true"></i><a></center>  ';
				
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }

    public function today_registered_students_table()
    {
    	$date=date('Y-m-d');
       	$query = "SELECT student_id,stud_full_name,institute_name,institute_code,email,mobile_no,course_name,course_master_id,district_name,district_id,seat_no,student_status,batch_id,student_password,inserted_on FROM view_student WHERE display = 'Y' AND inserted_on = '$date'";
		$search = array('student_id','stud_full_name','institute_name','institute_code','email','mobile_no','course_name','district_name','seat_no','student_status');
		$clause=''; 
		$order = "student_id Asc";
// 		print_r($query);
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
				$row[] = ((isset($key->stud_full_name) && !empty($key->stud_full_name)) ? $key->stud_full_name:'');
				$row[] = '<span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<strong>Email:- </strong>'. ((isset($key->email) && !empty($key->email)) ? $key->email:'').'<br>'.'<strong>Mobile:- </strong>'. ((isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:'');
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'');
				$row[] = ((isset($key->seat_no) && !empty($key->seat_no)) ? $key->seat_no:'').'<br>'.'<span style="color: #F3565D;">'.((isset($key->student_password) && !empty($key->student_password))?$key->student_password:'');
				if($key->student_status=='payment')
				{
					$stud_status='<center><span class="label label-sm label-success"><b> Payment Done </b></span></center>';
				}
				elseif($key->student_status=='not_appear')
				{
					$stud_status='<center><span class="label label-sm label-danger"><b> Not Appear </b></span></center>';
				}
				elseif($key->student_status=='appear')
				{
					$stud_status='<center><span class="label label-sm label-warning"><b> Appear </b></span></center>';
				}
				$row[] = $stud_status;
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    
}