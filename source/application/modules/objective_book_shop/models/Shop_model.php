<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model {

    public function saveobjectiveOrdertempData($data,$order_data)
    {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('tbl_order_temp',$data);       
        $order_id=$this->db->insert_id(); 
    
        for($i=0;$i<count($order_data);$i++)
        {
            $order_data[$i]['order_id']=$order_id;
            $this->db->insert('tbl_order_temp_details',$order_data[$i]);         
        } 
        $result = $this->db->trans_complete();
        if($result)
        {
            return $order_id;
        }
        else
        {
            return false;
        }
    }

    public function deleteobjectiveOrdertempData($order_id)
    {
        $this->db->trans_start();

        $this->db->where('order_id', $order_id)
                ->delete('tbl_order_temp');

        $this->db->where('order_id', $order_id)
                ->delete('tbl_order_temp_details');

        $result = $this->db->trans_complete();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function saveobjectiveOrderData($data,$order_data)
    {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('tbl_order',$data);       
        $order_id=$this->db->insert_id(); 
    
        for($i=0;$i<count($order_data);$i++)
        {
            $order_data[$i]['order_id']=$order_id;
            $this->db->insert('tbl_order_details',$order_data[$i]);         
        } 
        $result = $this->db->trans_complete();
        if($result)
        {
            return $order_id;
        }
        else
        {
            return false;
        }
    }
}