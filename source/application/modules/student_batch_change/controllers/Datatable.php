<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author :Apurva Bandelwar              Date: 20-Nov-2021
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->library('Encryptdecryptstring');
    }
   
    public function student_batch_change_from($from_batch_id)
    {
        $query = "SELECT vs.student_id,vs.stud_full_name,vs.institute_name,vs.institute_code,vs.seat_no,vs.student_password,vs.course_name,tb.batch_name,vs.display,vs.in_use,tb.batch_id,vs.student_status,vs.exam_status FROM view_student AS vs LEFT JOIN tbl_batch AS tb ON tb.batch_id = vs.batch_id WHERE tb.batch_id = $from_batch_id AND vs.display = 'Y' AND vs.exam_status = 'Pending'";
		$search = array('stud_full_name','institute_name','institute_code','seat_no','student_password','course_name','batch_name');
		$clause=''; 
		$order = "vs.student_id ASC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'');
                $row[] = ((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<center><span class="bold">'.((isset($key->batch_name) && !empty($key->batch_name)) ? $key->batch_name:'').'</span><center>';
				$row[] = '<center>'.((isset($key->course_name) && !empty($key->course_name))?$key->course_name:'').'</center>';
				$row[] = '<span class="bold"><center>'.((isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'').'</span><br>'.'<span style="color:red;">'.((isset($key->student_password) && !empty($key->student_password))?$key->student_password:'').'</center></span>';
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
    public function student_batch_change_current($current_batch_id)
    {
        $query = "SELECT vs.student_id,vs.stud_full_name,vs.institute_name,vs.institute_code,vs.seat_no,vs.student_password,vs.course_name,tb.batch_name,vs.display,vs.in_use,tb.batch_id,vs.student_status,vs.exam_status FROM view_student AS vs LEFT JOIN tbl_batch AS tb ON tb.batch_id = vs.batch_id WHERE tb.batch_id = $current_batch_id AND vs.display = 'Y' AND vs.exam_status = 'Pending'";
        $search = array('stud_full_name','institute_name','institute_code','seat_no','student_password','course_name','batch_name');
		$clause=''; 
		$order = "vs.student_id ASC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'');
                $row[] = ((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<center><span class="bold">'.((isset($key->batch_name) && !empty($key->batch_name)) ? $key->batch_name:'').'</span><center>';
				$row[] = '<center>'.((isset($key->course_name) && !empty($key->course_name))?$key->course_name:'').'</center>';
				$row[] = '<span class="bold"><center>'.((isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'').'</span><br>'.'<span style="color:red;">'.((isset($key->student_password) && !empty($key->student_password))?$key->student_password:'').'</center></span>';
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