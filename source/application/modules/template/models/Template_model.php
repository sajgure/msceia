<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Template_model extends CI_Model 
{
	// public function header_counters()
	// {
	// 	$query= $this->db->query("SELECT SUM(total_student) AS total, SUM(paid_student)as paid,(SUM(total_student)-SUM(paid_student)) AS unpaid, SUM(upload_student)as result FROM `view_institute` WHERE display='y' ");
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->row();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	public function header_counters()
	{
		$result = $this->db->get('tbl_current_batch');
		$currentInfo = $result->result();
		if($currentInfo){
			$currentBatchId = $currentInfo[0]->batch_id;
		}else{
			$currentBatchId = false;
		}	
		
		$query= $this->db->query("SELECT COUNT(*) AS total, SUM(student_status = 'payment')as paid,SUM(student_status = 'not_appear') + SUM(student_status = 'appear') AS unpaid,SUM(exam_status = 'Upload') AS result, SUM(payment_type = '140' AND student_status = 'payment') AS Gold, SUM(payment_type = '100' AND student_status = 'payment') AS Silver, SUM(payment_type = '75' AND student_status = 'payment') AS Bronz FROM `view_student` WHERE display='y' AND batch_id = '$currentBatchId' ");
		
		//$query= $this->db->query("SELECT COUNT(*) AS total, SUM(student_status = 'payment')as paid,SUM(student_status = 'not_appear') + SUM(student_status = 'appear') AS unpaid,SUM(exam_status = 'Upload') AS result FROM `view_student` WHERE display='y' AND batch_id = '$currentBatchId' ");
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function submenu_link()
	{
	    $this->db->cache_on();
		$query = $this->db->get_where('tbl_submenu', array('display' => 'Y','in_use'=>'Y'));
		$this->db->cache_off();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}	