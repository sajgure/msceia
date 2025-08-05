<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class District_model extends CI_Model
{
	public function __construct() 
    {
        parent::__construct();
        
    }
     /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Bismilla Sanade                                   Date:11/04/2020
    --------------------------------------------------------------------------------------------------------------
    */
    
    public function getstateWiseDistrict($data)
   {
   		//$user_id= $this->session->userdata('user_id');
   		//$user_id=2;
        $this->db->where('state_id',$data['state_id']);
        $this->db->where('district_name',$data['district_name']);
        $this->db->where('code',$data['code']);
        $query = $this->db->get('tbl_district');
        if($query->num_rows() > 0)
        {
            /*foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }*/
            return true;
        }
        else
        {
            return false;
        }     

    }

}