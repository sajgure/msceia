<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatable extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 16 apr 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
    }

    public function student_table()
    {
        $institute_id = $this->session->userdata('institute_id');
    	$current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        
       	$query = "SELECT ts.*,CONCAT(ts.surname,' ', ts.first_name, ' ',ts.father_name) AS stud_full_name,ts.course_name,ts.batch_name,ts.payment_type FROM view_student ts WHERE ts.display='Y' AND ts.in_use = 'Y' AND ts.batch_id IN ($current_batch_id,$upcoming_batch_id) AND ts.institute_id=$institute_id ";
       	$search = array('ts.student_id','stud_full_name','ts.course_name','ts.mobile_no','ts.batch_name','ts.payment_type','ts.student_status','ts.student_id','ts.student_id');
		$clause=''; $order = "ts.student_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		
		if(isset($result) && !empty($result))
		{
			$p_cnt=0;
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$id = $this->encryptdecryptstring->encrypt_string($key->student_id);
				if($key->student_status=='not_appear') { $status = 'Not Appeared'; } elseif ($key->student_status=='appear') { $status = 'Not Appeared'; } elseif ($key->student_status=='payment') { $status = 'Payment Received'; }
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$path = (isset($key->photo_sign) && !empty($key->photo_sign))?$key->photo_sign:'default.png';
				$row[] = '<div class="row"><div class="col-md-2"><center><img class="img1" src="'.base_url().'uploads/student_photos/'.$path.'" style="width:40px;height: 40px;border-radius: 50% !important;"> </center></div>'.'<div class="col-md-10"><p class="stud_name">'.((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'').'</p></div></div>';
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = ((isset($key->mobile_no) && !empty($key->mobile_no)) ? $key->mobile_no:'');
				$row[] = '<b>'.((isset($key->batch_name) && !empty($key->batch_name)) ? $key->batch_name:'').'</b>';
				$row[] = ((isset($key->payment_type) && !empty($key->payment_type)) ? $key->payment_type:'');
				//$row[] = ((isset($status) && !empty($status)) ? $status:'');
				if(isset($key->student_status) && !empty($key->student_status) && ($key->student_status=='not_appear'))
                { 
                    $row[] = '<center><input type="checkbox" rel="'.((isset($key->payment_type) && !empty($key->payment_type)) ? $key->payment_type:'').'" class="appearing form-control tooltips" title="Not Appeared" name="checkbox[]" value="'.$key->student_id.'"></center>';
              	}
                else if(isset($key->student_status) && !empty($key->student_status) && ($key->student_status=='appear'))
                {
                    $p_cnt++;
					$row[] = '<center><input type="checkbox" checked rel="'.((isset($key->payment_type) && !empty($key->payment_type)) ? $key->payment_type:'').'" class="appearing form-control tooltips" title="Not Appeared" name="checkbox[]" value="'.$key->student_id.'"></center>';
                    //$row[] = '<center rel="'.((isset($key->payment_type) && !empty($key->payment_type)) ? $key->payment_type:'').'" class="appear"><a href=""><i style="color: #ff0000" class="fa fa-check tooltips" title="Payment Pending"></i></a></center>';
                }
                else
                {
                    $row[] = '<center><a href=""><i style="color: #26a69a" class="fa fa-check tooltips" title="Payment Received"></a></i></center>';
                }
                
                if(($key->batch_id==$current_batch_id || $key->batch_id==$upcoming_batch_id) && $key->exam_status != 'Upload')
                // if($key->batch_id==$upcoming_batch_id)
                {
					$row[] = '<center><a href="'.base_url().'edit-student/'.$id.'" class="tooltips" title="Edit Record"><i class="icon-pencil"></i></a>&nbsp;&nbsp;'.'<a rev="'.'permanent-delete-student/'.$key->student_id.'" class="tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span></center>';
				}
				else
				{
					$row[] = '<center><a class="tooltips" title="Student cannot edit/delete after the exam is over"><i class="icon-info"></i></a></center>';
				}
				// $row[] = '<center><a href="'.base_url().'edit-student/'.$id.'" class="tooltips" title="Edit Record"><i class="icon-pencil"></i></a>&nbsp;&nbsp;'.'<a rev="'.'permanent-delete-student/'.$key->student_id.'" class="tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a></center></span></center>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }

    public function appeared_student_table()
    {
        $institute_id = $this->session->userdata('institute_id');
    	$current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
    	$query="SELECT stud_full_name,course_name,mobile_no,batch_name,seat_no,student_password FROM view_student WHERE student_status='payment' AND batch_id IN ($current_batch_id,$upcoming_batch_id) AND institute_id = $institute_id AND in_use = 'Y' AND display = 'Y' ";
		$search = array('stud_full_name','course_name','mobile_no','batch_name','seat_no','student_password');
		$clause=''; $order = "student_id DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		if(isset($result) && !empty($result))
		{
			$p_cnt=0;
			$no = $_POST['start'];
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = ((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'');
				$row[] = ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:'');
				$row[] = ((isset($key->mobile_no) && !empty($key->mobile_no)) ? $key->mobile_no:'');
				$row[] = '<b>'.((isset($key->batch_name) && !empty($key->batch_name)) ? $key->batch_name:'').'</b>';
				$row[] = '<b>'.((isset($key->seat_no) && !empty($key->seat_no)) ? $key->seat_no:'').'</b>';
				$row[] = ((isset($key->student_password) && !empty($key->student_password)) ? $key->student_password:'');
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
	}
	
	public function institute_payment_history()
    {
    	$institute_id = $this->session->userdata('institute_id');
       	$query = "SELECT tfd.payment_id,tfd.total_student,tfd.total_amount,tfd.payment_id,tfd.deposite_date,tfd.status FROM tbl_payment AS tfd LEFT JOIN view_student vs ON vs.payment_id = tfd.payment_id WHERE tfd.display='Y' AND tfd.institute_id= $institute_id GROUP BY vs.payment_id ";
		$search = array('tfd.deposite_date','tfd.total_amount','tfd.total_student','tfd.payment_id','tfd.utr_image');
		$clause=''; 
		$order = "tfd.deposite_date DESC";
		$result = $this->lib_datatables->datatable($query,$search,$order,$clause);
		$data =array();
		
		if(isset($result) && !empty($result))
		{
			$no = $_POST['start'];
			$statusFlag = '';
			
			foreach ($result as $key)
			{
				$no++;
				$row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = '<center>'.((isset($key->total_student) && !empty($key->total_student))?$key->total_student:'').'</center>';
				$row[] = '<center>'.((isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:'').'</center>';
				$row[] = '<center><b>'.((isset($key->payment_id) && !empty($key->payment_id))?$key->payment_id:'').'</b></center>';
				$row[] = '<center>'.((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('d-m-Y',strtotime($key->deposite_date)):'').'</center>';
				$row[] = '<center>'.((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('h:i A',strtotime($key->deposite_date)):'').'</center>';
				$status = (isset($key->status) && !empty($key->status))?$key->status:'';
				if($status=='success'){
					$statusFlag ='<span style="color:green">Success</span>';
				}else{
					$statusFlag ='<span style="color:red">Failed</span>';
				}
				$row[] =  '<center>'.$statusFlag.'</center>';
				$pay_id = $this->encryptdecryptstring->encrypt_string($key->payment_id);
				if($status=='success'){
					$printButton ='<center><a href="'.base_url().'print_payment_history/'.$pay_id.'" class="tooltips btn btn-sm green" target="_new" data-original-title="Print Payment Receipt" data-placement="top"><i class="fa fa-print "></i></a></center>';
				}else{
					$printButton ='';
				}
				$row[]=  $printButton;
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
}