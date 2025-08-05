<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model
{	
    public function __construct()
    {
        parent::__construct();
        $this->district_id = 369;
        
    }
	public function fees_report()
    {
        $query= $this->db->query("SELECT ti.institute_id, ti.institute_name, ti.institute_code, ti.district_id, td.district_name, tf.depositer_name, tf.deposite_date, tf.total_student, tf.total_amount, tf.payment_mode,tf.transaction_no,tf.utr_image,tf.status FROM tbl_payment tf LEFT JOIN tbl_institute ti ON ti.institute_id = tf.institute_id LEFT JOIN tbl_district td ON td.district_id = ti.district_id WHERE tf.display='Y' AND ti.display='Y' AND tf.status='success' ");
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
    public function inst_count_data($district_id,$paid_count)
    {
        $query= $this->db->query("SELECT * from view_institute_jan22 WHERE district_id = ? AND paid_student>= ? AND display='Y' AND institute_status='Active' ORDER BY paid_student desc",array($district_id,$paid_count));
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function passStudData($id,$limit,$batch)
    {
        $query =$this->db->query("SELECT * FROM view_student WHERE display='Y' AND result='pass' AND institute_id=? AND batch_id = $batch ORDER BY batch_id LIMIT $limit",array($id));
        //$query =$this->db->query("SELECT * FROM view_student WHERE display='Y' AND result='Pass' AND institute_id=? ORDER BY student_id ASC LIMIT $limit",array($id));
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
    public function ssd_passStudData($id,$limit,$batch)
    {
        $query= $this->db->query("SELECT * FROM view_student WHERE display='Y' AND course_master_id=7 AND result='Pass' AND institute_id=? AND batch_id = $batch  ORDER BY student_id ASC LIMIT $limit",array($id));
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

   public function pass_student_details($id, $batch)
    {
        $query= $this->db->query("SELECT * FROM view_student WHERE institute_id = $id AND result='Pass' AND course_master_id !=7 AND batch_id = $batch  ORDER BY batch_id");
        //$query= $this->db->query("SELECT * FROM view_student WHERE institute_id = $id AND result='Pass' AND course_master_id !=7");
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

    public function ssd_pass_student_details($id, $batch)
    {
        
        $query= $this->db->query("SELECT * FROM view_student WHERE display='Y' AND result = 'Pass' AND course_master_id = 7 AND institute_id=? AND batch_id = ? AND payment_type = 140  ORDER BY batch_id  ",array($id, $batch));
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

    public function pass_student_details_all()
    {
        $query= $this->db->query("SELECT * FROM view_student WHERE result='Pass' AND district_id = $this->district_id ORDER BY institute_id LIMIT 1500");
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

    public function getUsername($user_id)
    {
        $query= $this->db->query("select username from tbl_user WHERE user_id='$user_id'",array($user_name));
       
        if($query->num_rows()>0)
        {            
            return $query->row();
        }
        else
        {
            return false;
        } 
    }
    
    public function passStud_singleData($batch,$id,$student)
    {
        $query =$this->db->query("SELECT * FROM view_student WHERE display='Y'  AND institute_id=$id AND batch_id = $batch AND student_id = $student  LIMIT 1");
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
}