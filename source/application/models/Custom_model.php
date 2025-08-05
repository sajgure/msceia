<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Custom_model extends CI_Model {	

    public function get_latest_batch()
    {
        $query= $this->db->query("SELECT * FROM `tbl_batch` WHERE in_use='Y' ORDER BY batch_id DESC LIMIT 1");
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        } 
    }
    public function get_current_batch()
    {
        $query= $this->db->query("SELECT * FROM tbl_current_batch WHERE in_use='Y' AND display = 'Y' LIMIT 1");
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        } 
    }
    public function get_upcoming_batch()
    {
        $query= $this->db->query("SELECT * FROM tbl_upcoming_batch WHERE in_use='Y' AND display = 'Y' LIMIT 1");
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        } 
    }
    public function getappearstudentcount($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT COUNT(if(batch_id=$current_batch_id,1,null)) AS 'cur', COUNT(if(batch_id=$upcoming_batch_id,1,null)) AS 'upc', COUNT(if(payment_type=140,1,null)) AS count140, COUNT(if(payment_type=100,1,null)) AS count100, COUNT(if(payment_type=75,1,null)) AS count75, COUNT(*) AS count  FROM `tbl_student` WHERE `institute_id` = ? AND batch_id IN ($current_batch_id,$upcoming_batch_id) AND `student_status` = 'appear' AND `in_use` = 'Y'",array($institute_id));
        //echo $this->db->last_query();
        //$query= $this->db->query("SELECT * FROM `tbl_student` WHERE `institute_id` = ? AND batch_id IN ($current_batch_id,$upcoming_batch_id) AND `student_status` = 'appear' AND `in_use` = 'Y'",array($institute_id));
        // $query= $this->db->query("SELECT * FROM `tbl_student` WHERE `institute_id` = ? AND batch_id=? AND `student_status` = 'appear' AND `in_use` = 'Y'",array($institute_id,$batch_id));
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }   
    }
    public function getpaymentstudentcount($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM `view_student` WHERE `institute_id` = ? AND `batch_id` IN ($current_batch_id,$upcoming_batch_id) AND `student_status` = 'payment' AND `in_use` = 'Y'",array($institute_id));
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function get_hallticket_current_batch($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM `view_student` WHERE `institute_id` = ? AND `batch_id` = $current_batch_id AND `student_status` = 'payment' AND `in_use` = 'Y' AND (payment_type=140 OR payment_type=100)",array($institute_id));
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function hallticket_all($id,$limit)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM view_student WHERE in_use='Y' AND student_status='payment' AND institute_id= ? AND batch_id = $current_batch_id AND (payment_type=140 OR payment_type=100) LIMIT $limit",array($id));
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

    public function select_latest_batch_apper_student1($institute_id,$c_batch_id,$u_batch_id)
    {
        $query= $this->db->query("SELECT * FROM `tbl_student` WHERE `institute_id` =? AND `student_status` = 'appear' AND `in_use` = 'Y' AND batch_id IN ($c_batch_id,$u_batch_id)",array($institute_id));
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
    public function select_latest_batch_apper_student($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM `tbl_student` WHERE `institute_id` = ? AND `student_status` = 'appear' AND `in_use` = 'Y' AND batch_id = $current_batch_id",array($institute_id));
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
    // public function fetch_current_upcoming_batch()
    // {
    //     $current_batch_data=$this->custom_model->get_current_batch();
    //     $current_batch_id=$current_batch_data->batch_id;
    //     $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
    //     $upcoming_batch_id=$upcoming_batch_data->batch_id;
    //     $query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id IN ($upcoming_batch_id) ORDER BY tb.batch_id DESC");
    //     // $query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id IN ($current_batch_id,$upcoming_batch_id) ORDER BY tb.batch_id DESC");
    // //   echo $this->db->last_query();
    //     //$query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id = 4 ORDER BY tb.batch_id DESC");
    //     if($query->num_rows() > 0)
    //     {
    //         return $query->result();
    //     }
    //     else
    //     {
    //         return false;
    //     }  
    // }
    
    public function fetch_current_upcoming_batch()
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id IN ($current_batch_id,$upcoming_batch_id) ORDER BY tb.batch_id DESC");
        //$query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id = 4 ORDER BY tb.batch_id DESC");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }  
    }
    
    
    public function fetch_current_batch()
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id = $current_batch_id ORDER BY tb.batch_id DESC");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }  
    }
    
    public function fetch_upcoming_batch()
    {
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT tb.*,tcb.batch_id AS current_batch,tub.batch_id AS upcoming_batch FROM tbl_batch AS tb LEFT JOIN tbl_current_batch AS tcb ON tcb.batch_id = tb.batch_id LEFT JOIN tbl_upcoming_batch AS tub ON tub.batch_id = tb.batch_id WHERE tb.display = 'Y' AND tb.batch_id = $upcoming_batch_id ORDER BY tb.batch_id DESC");
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