<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model 
{   

    public function inst_activity()
    {
       
        $query= $this->db->query("SELECT district_name, count(district_name) cnt FROM view_institute WHERE display='Y' GROUP BY district_name ORDER BY cnt DESC ");

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function today_reg()
    {

        $query=$this->db->query("SELECT DATE(inserted_on) as reg_date, count(inserted_on) as cnt FROM view_student WHERE display='Y'  GROUP BY DATE(inserted_on) order by reg_date DESC  limit 10 ");

        if($query->num_rows()>0)
        {
           return $query->result();
        }else
        {
            return null;
        }
    }
    public function daily_payment()
    {

        //$query=$this->db->query("SELECT DATE(deposite_date) as pay_date, SUM(CASE WHEN payment_mode='Online' THEN total_amount ELSE 0 END) as 'online_total', SUM(CASE WHEN payment_mode='NEFT_RTGS' OR payment_mode='DD' THEN total_amount ELSE 0 END) as 'offline_total' FROM tbl_payment WHERE display='Y' GROUP BY DATE(deposite_date) order by pay_date desc  limit 10 ");
        $query=$this->db->query("SELECT DATE(deposite_date) as pay_date, SUM(CASE WHEN payment_mode='Online' THEN total_amount ELSE 0 END) as 'online_total', SUM(CASE WHEN payment_mode='NEFT_RTGS' OR payment_mode='DD' THEN total_amount ELSE 0 END) as 'offline_total' FROM tbl_payment WHERE display='Y' AND status = 'success' GROUP BY DATE(deposite_date) order by pay_date desc  limit 10");
        if($query->num_rows()>0)
        {
           return $query->result();
        }else
        {
            return null;
        }
    } 
    public function stud_count()
    {
        $data['latest_batch_data']=$this->custom_model->get_current_batch();
        $batch_id = $data['latest_batch_data']->batch_id;
        //$query= $this->db->query("SELECT COUNT(*) AS total, SUM(student_status = 'payment')as paid,SUM(student_status = 'not_appear') AS unpaid,SUM(exam_status = 'Complete') AS result FROM `view_student` WHERE display='y' AND batch_id = $batch_id");
        
        $query= $this->db->query("SELECT COUNT(*) AS total, SUM(student_status = 'payment')as paid, SUM(payment_type = '140' AND student_status = 'payment') AS Gold, SUM(payment_type = '100' AND student_status = 'payment') AS Silver, SUM(payment_type = '75' AND student_status = 'payment') AS Bronz,SUM(student_status = 'not_appear') AS unpaid,SUM(exam_status = 'Complete') AS result FROM `view_student` WHERE display='y' AND batch_id = $batch_id");
        
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}