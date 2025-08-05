<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Institute_model extends CI_Model
{ 
    public function __construct() 
    {
	   parent::__construct();	
	   $error = Array('code'=>'', 'message'=>'');
    } 
	/*
	================================================================================
	Author:Shubhangi Jagadale                        Date:22/04/2020
	=================================================================================
	*/
	public function active_link_data($details=FALSE,$var)
	{
        $sql = $this->db->WHERE('institute_id',$details['institute_id'])
        ->WHERE('download_status','Deactive')
        ->UPDATE('tbl_institute',array('download_status'=>'Active','installation_count'=>$var));
        if($sql)
        {
            if($this->db->affected_rows()>0)
            {
                return true;
            }
            else{
                $this->error = array('message' =>"No changes made.",'code'=>0);
                return false;
            }        
        }
        else
        {
            return false;
        }
    }
    /*
 	================================================================================
 	Author:Shubhangi Jagadale                        Date:22/04/2020
 	=================================================================================
 	*/
 	public function deactive_link_data($details=FALSE)
 	{
 	    $sql = $this->db->WHERE('institute_id',$details['institute_id'])
               ->UPDATE('tbl_institute',array('download_status'=>'Deactive'));
        if($sql)
        {            
            if($this->db->affected_rows()>0)
            {
                return true;
            }
            else
            {
                $this->error = array('message' =>"No changes made.",'code'=>0);
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    /*
 	================================================================================
 	Author:Shubhangi Jagadale                        Date:22/04/2020
 	=================================================================================
 	*/
 	public function reactive_link_data($details,$var)
 	{
        $sql = $this->db->WHERE('institute_id',$details['institute_id'])
                    ->UPDATE('tbl_institute',array('db_status'=>'download',
                                                'installation_count'=>$var));
        if($sql)
        {
            if($this->db->affected_rows()>0)
            {
                return true;
            }
            else
            {
                $this->error = array('message' =>"No changes made.",'code'=>0);
                return false;
            }        
        }
        else
        {
            return false;
        }
    } 
    /*
    ================================================================================
    Author:Mohammad Shafi                       Date:02/05/2020
    =================================================================================
    */
    public function active_link_count()
    {
        $query= $this->db->query("SELECT db_status AS status, count(db_status) as count from view_institute_jan23 WHERE paid_student>=1 group by db_status UNION  SELECT download_status AS status, count(download_status) as count from view_institute_jan23 WHERE paid_student>=1 group by download_status ");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    public function instituteExcel()
    {
        $query = $this->db->query("SELECT ti.*,td.district_name FROM tbl_institute ti LEFT JOIN tbl_district td ON ti.district_id=td.district_id  WHERE ti.display='Y'");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }

    /*
    ================================================================================
    Author:Rohini mali                      Date:20/09/2021
    =================================================================================
    */
    public function student_status_count($inst_id)
    {
        $query = $this->db->query("SELECT ts.*,ti.institute_status FROM tbl_student ts LEFT JOIN tbl_institute ti ON ts.institute_id=ti.institute_id WHERE ts.student_status='appear' AND ti.institute_id = ?",array($inst_id));
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_stud[]=$row;
            }
            return $tbl_stud;
        }
        else
        {
            return false;
        }
    }
    /*
    ================================================================================
    Author:Rohini mali                      Date:20/09/2021
    =================================================================================
    */
    public function student_tableabc($institute_id)
    {
      	$latest_batch_data=$this->custom_model->get_latest_batch();
        $batch_id = $latest_batch_data->batch_id;
        $this->db->select("tbl_student.*,CONCAT(tbl_student.surname,' ', tbl_student.first_name, ' ',tbl_student.father_name) AS stud_full_name,tbl_course_master.course_name,tbl_district.district_name ");
        $this->db->from('tbl_student');
        $this->db->join('tbl_course_master','tbl_course_master.course_master_id=tbl_student.course_master_id ', 'left');
        $this->db->join('tbl_district','tbl_district.district_id=tbl_student.district_id ', 'left');
        $this->db->where('tbl_student.in_use','Y'); 
        $this->db->where('tbl_student.batch_id',$batch_id);
        $this->db->where('tbl_student.institute_id',$institute_id);
        $query = $this->db->get();
        return $query->result();
    }

     /*
    ================================================================================
    Author:Tukaram Gavade                    Date:27/11/2021
    =================================================================================
    */

    public function get_all_institute_by_batch_id($batch_id)
    {
        if($batch_id == '1'){
            $view_institute = 'view_institute_aug21'; 
        }else if($batch_id == '2'){
            $view_institute = 'view_institute_jan22';
        }else if($batch_id == '3'){
            $view_institute = 'view_institute_aug22';
        }else if($batch_id == '4'){
            $view_institute = 'view_institute_jan23';
        }else{
            $view_institute = 'view_institute';
        }

        $query = $this->db->query("SELECT $view_institute.*
        FROM $view_institute 
        INNER JOIN tbl_payment ON $view_institute.institute_id = tbl_payment.institute_id 
        INNER JOIN tbl_student ON tbl_student.institute_id = tbl_payment.institute_id  WHERE tbl_student.batch_id = '$batch_id' GROUP BY tbl_payment.institute_id  ");
        if($query->num_rows() > 0)
        {           
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }

    public function get_all_institute_by_csv_report_batch_id($batch_id)
    {
       
        if($batch_id == '1'){
            $view_institute = 'view_institute_aug21'; 
        }else if($batch_id == '2'){
            $view_institute = 'view_institute_jan22';
        }else if($batch_id == '3'){
            $view_institute = 'view_institute_aug22';
        }else if($batch_id == '4'){
            $view_institute = 'view_institute_jan23';
        }else{
            $view_institute = 'view_institute';
        }
       
        $query = $this->db->query("SELECT $view_institute.institute_name,$view_institute.institute_code,$view_institute.institute_password,$view_institute.institute_password,$view_institute.institute_address,$view_institute.district_name,$view_institute.institute_taluka,$view_institute.institute_pincode,$view_institute.institute_contact,$view_institute.institute_alternate_contact,$view_institute.institute_mail,$view_institute.institute_owner_name,$view_institute.institute_owner_dob,$view_institute.institute_principal_name,$view_institute.institute_owner_qualification,$view_institute.institute_principal_qualification,$view_institute.institute_registration_date,$view_institute.institute_status,$view_institute.owner_age,$view_institute.principal_age,$view_institute.nominee_name,$view_institute.nominee_age,$view_institute.relation,$view_institute.installation_count,$view_institute.courier_no,$view_institute.sms_status,$view_institute.birthday_status,$view_institute.stud_not_appear,$view_institute.stud_appear,$view_institute.exam_status,$view_institute.total_student,$view_institute.paid_student,$view_institute.Pass_student,$view_institute.upload_student,$view_institute.batch_name         
        FROM $view_institute 
        INNER JOIN tbl_payment ON $view_institute.institute_id = tbl_payment.institute_id 
        INNER JOIN tbl_student ON tbl_student.institute_id = tbl_payment.institute_id  WHERE tbl_student.batch_id = '$batch_id' GROUP BY tbl_payment.institute_id  ");
        if($query->num_rows() > 0)
        {           
            // foreach ($query->result_array() as $row)
            // {
            //     $tbl_data[]=$row;
            // }
            // return $tbl_data;
            $response = $query->result_array();
            return $response;
        }
        else
        {
            return false;
        }
    }

    public function get_student_desending($tblname,$where1,$where2,$condition1,$condition2,$asc_by_col_name)
    {
        $this->db->where($where1,$condition1);
        $this->db->where($where2,$condition2);
        $this->db->where('display','Y');
        $this->db->order_by($asc_by_col_name, "DESC");
        $query = $this->db->get($tblname);

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function get_all_batches()
    {
        $query = $this->db->get('tbl_batch');
        if($query->num_rows()>0) 
        {
           return $query->result_array();
        } 
        else 
        {
            return false; 
        } 
    }

    public function get_all_student_by_current_and_previous_batch($batchesArray)
    {
        
        $current_batch_id = $batchesArray['current_batch_id'];
        $previous_batch_id = $batchesArray['previous_batch_id'];
        $institute_id = $batchesArray['institute_id'];
        
        $query = $this->db->query("SELECT concat(ts.first_name,' ',ts.father_name,' ',ts.surname) AS stud_full_name,ts.mobile_no,ts.status,ts.student_status,ts.batch_id,ts.student_id, td.district_name,tc.course_name  FROM tbl_student ts
                                    LEFT JOIN tbl_district td ON td.district_id = ts.district_id
                                    LEFT JOIN tbl_course_master tc ON tc.course_master_id = ts.course_master_id
                                    WHERE ts.batch_id IN ($current_batch_id,$previous_batch_id)  AND ts.institute_id = $institute_id AND ts.display = 'Y'");
                               
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }
    
    public function fetch_inst_data_union($inst_id)
    {
        // $query = $this->db->query("SELECT institute_id,institute_name,institute_code,institute_contact,institute_mail FROM ( SELECT * FROM `view_institute_jan22` WHERE institute_id = $inst_id UNION SELECT * FROM `view_institute_aug22` WHERE institute_id = $inst_id ) AS x GROUP BY institute_id"); 
        $query = $this->db->query("SELECT institute_id,institute_name,institute_code,institute_contact,institute_mail FROM `tbl_institute` WHERE institute_id = $inst_id"); 
        if($query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }
}


