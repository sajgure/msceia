<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model 
{	
    /*
    -------------------------------------------------------------
    Author  : Bismilla Sanade               Date: 22 April 20
    -------------------------------------------------------------
    */



    

    public function set_order($order_data,$order_details_data)
    {
        //echo '1';
        
        $query = $this->db->insert('tbl_order', $order_data);
        if($query)
        {
            $order_id = $this->db->insert_id();
          
            foreach ($order_details_data as $order_detail)
            {

                $order_detail['order_id']=$order_id;
                $querynew = $this->db->insert('tbl_order_details', $order_detail);
                if($querynew)
                {
                    $order_details_id = $this->db->insert_id();
                  
                    //return $order_details_id;
                }
                else
                {
                    $this->error = $this->db->error();
                    return FALSE;
                }

              //  print_r($order_detail);
            }
            return $order_details_id;

        }
        else
        {
            $this->error = $this->db->error();
            return FALSE;
        }

       
      
    }

    public function total_pending_amount()
    {
        $query= $this->db->query("SELECT SUM(sub_total) pending_amount FROM tbl_order WHERE payment_status='PENDING'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }

    public function Pending_orders()
    {
        $query= $this->db->query("SELECT COUNT(order_id) total_pending_orders FROM tbl_order WHERE order_status='PENDING'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function total_received_amount()
    {
        $query= $this->db->query("SELECT SUM(sub_total) total_amount FROM tbl_order WHERE payment_status='COMPLETE'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function complete_orders()
    {
        $query= $this->db->query("SELECT COUNT(order_id) total_orders FROM tbl_order WHERE order_status='COMPLETE'");
        if($query->num_rows() > 0)
        {
            return $query->row(); 
        }
        else
        {
            return false;
        }   
    }
    public function order_data($id)
    {
        $query=$this->db->query("SELECT tor.*, ti.institute_code,ti.institute_pincode,ti.institute_taluka,td.district_name,ti.institute_address from tbl_order as tor left join tbl_institute AS ti ON tor.institute_id=ti.institute_id Left join tbl_district td ON ti.district_id=td.district_id where tor.display='Y' AND tor.order_id=?",array($id));
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
