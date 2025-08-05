<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gcc_order_model extends CI_Model 
{	
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 27-01-2022
    -------------------------------------------------------------
    */
    public function books_total_pending_amount()
    {
        $query= $this->db->query("SELECT SUM(sub_total) AS pending_amount FROM tbl_gcc_tbc_order WHERE payment_status='PENDING'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function books_pending_orders()
    {
        $query= $this->db->query("SELECT COUNT(order_id) AS total_pending_orders FROM tbl_gcc_tbc_order WHERE order_status='PENDING'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function books_complete_orders()
    {
        $query= $this->db->query("SELECT COUNT(order_id) AS total_orders FROM tbl_gcc_tbc_order WHERE order_status='COMPLETE'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function books_total_received_amount()
    {
        $query= $this->db->query("SELECT SUM(sub_total) AS total_amount FROM tbl_gcc_tbc_order WHERE payment_status='COMPLETE'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function books_order_data($id)
    {
        $query=$this->db->query("SELECT tor.*,ti.institute_code,ti.institute_pincode,ti.institute_taluka,td.district_name FROM tbl_gcc_tbc_order AS tor LEFT JOIN tbl_institute AS ti ON tor.institute_id = ti.institute_id LEFT JOIN tbl_district AS td ON ti.district_id = td.district_id WHERE tor.display = 'Y' AND tor.order_id = ?",array($id));
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
