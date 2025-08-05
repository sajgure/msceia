<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Date_time_model extends CI_Model
{
	public function getDateFormat()
	{
		$query = $this->db->get('tbl_system_config');
		if($query->result())
		{
			return $query->row()->date_format;
		}
	}
	public function getTimeFormat()
	{
		$query = $this->db->get('tbl_system_config');
		if($query->result())
		{
			return $query->row()->time_format;
		}
	}
	public function getDateTimeFormat()
	{
		$query = $this->db->get('tbl_system_config');
		if($query->result())
		{
			return $query->row();
		}
	}
	public function InsertUpdateDateTime($insertdata)
    {
        $query = $this->db->get('tbl_system_config');
        if($query->result())
        {
            $result= $this->db->WHERE('system_config_id',1)
                              ->UPDATE('tbl_system_config',$insertdata);
            if($result){return TRUE; }
            else {return FALSE; }
        }
        else
        {
            return $this->db->insert('tbl_system_config', $insertdata); 
        }
    }
}
