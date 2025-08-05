<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends Base_Controller 
{

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 27 mar 20
	-------------------------------------------------------------
	*/
	public function __construct() 
    {
        parent::__construct();  
        $this->load->library('lib_datatables');
        $this->load->model('standard/standard_model');
    }
    public function institute_list_table()
    {
       	$query = "SELECT ti.*,td.district_name FROM tbl_institute AS ti LEFT JOIN tbl_district AS td ON ti.district_id = td.district_id WHERE ti.display='Y' ";
		$search = array('td.district_name','ti.institute_name','ti.institute_code','ti.institute_mail','ti.institute_contact','ti.institute_taluka','ti.institute_status');
		$clause=''; 
		$order = "institute_id Asc";
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
				$row[] = '<a target="_blank" href="'.base_url().'institute-details/'.$key->institute_id.'" ><span class="font-green-haze bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')'.'</a>';
				$row[] = '<strong>Email:- </strong>'. ((isset($key->institute_mail) && !empty($key->institute_mail)) ? $key->institute_mail:'').'<br>'.'<strong>Mobile:- </strong>'. ((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:'');
				$row[] = '<strong>Dist:- </strong>'. ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'').'<br>'.'<strong>taluka:- </strong>'. ((isset($key->institute_taluka) && !empty($key->institute_taluka))?$key->institute_taluka:'');
				$row[] = ((isset($key->institute_code) && !empty($key->institute_code)) ? $key->institute_code:'').'<br>'.'<span style="color: #F3565D;">'.((isset($key->institute_password) && !empty($key->institute_password))?$key->institute_password:'');
				$row[] = '<center><span class="label label-sm label-success">'.((isset($key->institute_status) && !empty($key->institute_status)) ? $key->institute_status:'').'</span></center>';
				$rowactive = ($key->institute_status =='Active') ? '
					<span style="cursor: pointer" class="tooltips update_record btn btn-sm btn-success tbl_action" data-html="true" title="UnBlocked Institute, Click hear to block" rev="block-institute-status" data-col="institute_id" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'" data-original-title="block Institute" data-placement="top">
					<i class="fa fa-unlock"  data-original-title="Block Institute"></i>
					</span>' : '<span style="cursor: pointer" data-col="institute_id" class="tooltips tbl_action update_record btn btn-sm btn-danger" data-html="true" title="Blocked Institute, Click hear to Unblock" rev="active-institute-status" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'" data-original-title="Unblock Institute" data-placement="top"><i class="fa fa-lock"  data-original-title="UnBlock Institute"></i></span>';
				$rowmac = ($key->mac_id !='NULL' && $key->mac_id !='' && $key->institute_status =='Active') ? '
					<span style="cursor: pointer" class="tooltips update_record btn btn-sm btn-primary tbl_action" data-html="true" title="Reset Mac Id, Click hear to Rest" rev="reset-mac-id" data-col="institute_id" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'" data-original-title="Reset Mac Id" data-placement="top">
					<i class="icon-action-undo"  data-original-title="Reset Mac Id"></i>
					</span>' : '';
				$rowstudent = '<a href="'.base_url().'reset-stud-list/'.$key->institute_id.'"class="tooltips btn btn-sm btn-danger" data-original-title="Print Bonafide" data-placement="top"> <i class="fa fa-undo"></i></a>';

				$rowstudentBatchPrefer = '<a href="'.base_url().'reset-batch-stud-list/'.$key->institute_id.'"class="tooltips btn btn-sm btn-warning" data-original-title="Batch preference" data-placement="top"> <i class="fa fa-user"></i></a>';
                
                $rowdeleteInst = '<a rev="'.'permanent-delete-institute/'.$key->institute_id.'" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a>';
				
				$row[]='<table style="align:center"><tr><td>'.$rowactive.'</td><td>'.$rowmac.'</td><td>'.$rowdeleteInst.'</td></tr></table>';

				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function active_download_link_table($batch_id)
    {  
    	if($batch_id == 1)
    	{
    		$query = "SELECT * FROM view_institute_aug21  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 2)
    	{
    		$query = "SELECT * FROM view_institute_jan22  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 3)
    	{
    		$query = "SELECT * FROM view_institute_aug22  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 4)
    	{
    		$query = "SELECT * FROM view_institute_jan23  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 5)
    	{
    		$query = "SELECT * FROM view_institute_jul23  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 6)
    	{
    		$query = "SELECT * FROM view_institute_oct23_1  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 7)
    	{
    		$query = "SELECT * FROM view_institute_apr24  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 8)
    	{
    		$query = "SELECT * FROM view_institute_dec24  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 9)
    	{
    		$query = "SELECT * FROM view_institute_2025_s1  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	elseif($batch_id == 10)
    	{
    		$query = "SELECT * FROM view_institute_2025_s2  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
    	else
    	{
    	//	$query = "SELECT * FROM view_institute_oct23_1  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    		$query = "SELECT * FROM view_institute_2025_s2  WHERE display='Y' AND institute_status='Active' AND paid_student>=1 AND batch_id = $batch_id";
    	}
		$search = array('district_name','institute_name','institute_code','institute_mail','institute_contact','download_status','installation_count','exam_mac_id','institute_password','db_status','institute_id','paid_student','upload_student');
		
		$clause=''; 
		$order = "paid_student DESC";
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
				$row[] ='<span style="text-transform: uppercase;">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'</span>'.'<br>'.'<span class="font-green-haze bold">Inst Code: '. ((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').'<br>'.'<span class="font-green-haze bold">Inst Pass: '. ((isset($key->institute_password) && !empty($key->institute_password))?$key->institute_password:'').'</span>';
				$row[] = ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'');
				$row[] = ((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:'');
				// $row[] = ((isset($key->paid_student) && !empty($key->paid_student)) ? $key->paid_student:'0');
				$row[] = ((isset($key->paid_student) && !empty($key->paid_student)) ? $key->paid_student:'0').'<br><br><span style="font-size: 10px">Paid By 140:-'.$key->paid_by140.'</span><br><span style="font-size: 10px">Paid By 100:-'.$key->paid_by100.'</span>';
				$row[] = ((isset($key->upload_student) && !empty($key->upload_student)) ? $key->upload_student:'0');
				$row[] = ((isset($key->installation_count) && !empty($key->installation_count)) ? $key->installation_count:'0');
				$row[] = ((isset($key->exam_mac_id) && !empty($key->exam_mac_id)) ? wordwrap(($key->exam_mac_id),33,"\n",TRUE):'');
				if($key->db_status=='pending')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-danger">'.('<b>'.(isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				elseif($key->db_status=='download')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-warning">'.'<b>'.((isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				elseif($key->db_status=='install')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-warning">'.'<b>'.((isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				elseif($key->db_status=='exam download')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-default">'.'<b>'.((isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				elseif($key->db_status=='exam install')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-primary">'.'<b>'.((isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				elseif($key->db_status=='upload')
				{
					$row[] = '<center><span style="text-transform: capitalize;" class="label label-sm label-success">'.'<b>'.((isset($key->db_status) && !empty($key->db_status)) ? $key->db_status:'').'</b>'.'</span></center>';
				}
				if($key->download_status=='Active')
				{				
					$row[] = '<center style="width: 120px;"> <span style="cursor: pointer;" class="tooltips update_record tbl_action" data-col="institute_id" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'"  rev="deactive-link" title=""> <a href="javascript:;" class="btn btn-xs green"><i class="fa icon-check"></i></a> </span>
						<a href="javascript:;" class="btn btn-xs blue update_record tbl_action" data-col="institute_id" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'" rev="reactive-link"><i class="fa icon-action-undo"></i></a> </center>';
				}
				else
				{
					$row[] ='<center style="width: 120px;"> <span style="cursor: pointer;" class="tooltips update_record tbl_action" data-col="institute_id" rel="'.((isset($key->institute_id) && !empty($key->institute_id)) ? $key->institute_id:'').'" data-status="Deactive" rev="active-link" title=""> <a href="javascript:;" class="btn btn-xs btn-danger"> Deactive </a> </span></center>';
				}
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function institute_birthday_table()
    {
        $date = date('Y-m-d');
		$query="SELECT ti.*, tc.district_name FROM tbl_institute AS ti LEFT JOIN tbl_district AS tc ON ti.district_id=tc.district_id WHERE DAY(ti.institute_owner_dob) = DAY('$date') AND MONTH(ti.institute_owner_dob) = MONTH('$date') AND ti.institute_status='Active' AND ti.display= 'Y' ";
		$search = array('tc.district_name','institute_name','institute_code','institute_mail','institute_contact','institute_taluka','institute_status','institute_owner_name');
		$clause=''; 
		$order = "institute_id Asc";
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
				$path = (isset($key->institute_owner_photo) && !empty($key->institute_owner_photo))?$key->institute_owner_photo:'default.png';
				if ((!empty($path)) && (file_exists($path))) {
					$row[] = '<div class="row"><div class="col-md-2"><center><img class="img1" src="'.base_url().'uploads/inst_owner_photos/'.$path.'" style="width:40px;height: 40px;border-radius: 50% !important;"></center></div>'.'<div class="col-md-10"><p style="text-transform: capitalize;margin: 3px 4px 10px !important;" class="font-green-haze bold">'.((isset($key->institute_owner_name) && !empty($key->institute_owner_name))?$key->institute_owner_name:'').'</p></div></div>';
				} else {
					$row[] = '<div class="row"><div class="col-md-2"><center><img class="img1" src="'.base_url().'/uploads/inst_owner_photos/default.png" style="width:40px;height: 40px;border-radius: 50% !important;"></center></div>'.'<div class="col-md-10"><p style="text-transform: capitalize;margin: 3px 4px 10px !important;" class="font-green-haze bold">'.((isset($key->institute_owner_name) && !empty($key->institute_owner_name))?$key->institute_owner_name:'').'</p></div></div>';
				}
				$row[] = '<span class="bold">'.((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'').'<br>'.'('.((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'').')';
				$row[] = '<strong>Email:- </strong>'. ((isset($key->institute_mail) && !empty($key->institute_mail)) ? $key->institute_mail:'').'<br>'.'<strong>Mobile:- </strong>'. ((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:'');
				$row[] = '<strong>Dist:- </strong>'. ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:'').'<br>'.'<strong>taluka:- </strong>'. ((isset($key->institute_taluka) && !empty($key->institute_taluka))?$key->institute_taluka:'');
				if($key->birthday_status=='Send'){
					$row[] = '<center><a class="btn btn-xs green" href="javascript:;">'.$key->birthday_status.'</a></center>';
				}
				else{
					$row[] = '<center><a class="btn btn-xs btn-warning" href="javascript:;">'.$key->birthday_status.'</a></center>';
				}
				
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }
    public function institute_record_table()
    {
		$query = "SELECT COUNT(*) AS total, SUM(student_status = 'payment')as paid,SUM(student_status = 'not_appear') + SUM(student_status = 'appear') AS unpaid,SUM(exam_status = 'Upload') AS result, batch_name,batch_id FROM `view_student` WHERE display='Y' AND batch_id != 0 GROUP BY batch_id";
		$search = array('total','paid','unpaid','result');
		$clause=''; 
		$order = "batch_id ASC";
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
				$row[] = '<span class="font-green-haze bold">'.((isset($key->batch_name) && !empty($key->batch_name)) ? $key->batch_name:'').'</span>';
				$row[] = ((isset($key->total) && !empty($key->total)) ? $key->total:'');
				$row[] = ((isset($key->paid) && !empty($key->paid)) ? $key->paid:'0');
				$row[] = ((isset($key->unpaid) && !empty($key->unpaid)) ? $key->unpaid:'0');
				$row[] = ((isset($key->result) && !empty($key->result)) ? $key->result:'0');
				$row[]=  '<center>
							<a href="'.base_url().'institute-excel-report/'.$key->batch_id.'" class="tooltips btn btn-sm green" title="Institute Excel Reprot" data-placement="top"><i class="fa fa-file-excel-o"></i></a>
							<a href="'.base_url().'institute-csv-report/'.$key->batch_id.'" class="tooltips btn btn-sm btn-primary" title="Institute CSV Reprot" data-placement="top"><i class="fa fa-download"></i></a>
					</center>';
				$data[] = $row;
			}
		}
		$output = $this->lib_datatables->output($query,$search,$order,$clause,$data);
		echo json_encode($output);
    }	
}