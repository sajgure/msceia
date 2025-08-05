<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Media_model extends CI_model
{
	public function get_media_details($media_id)
	{
		$query = $this->db->SELECT('user_file_name,system_file_name,extension')
				 ->WHERE('media_id',$media_id)
				 ->get('tbl_media');
		if($query->num_rows()>0)
        {
            return $query->row();
        }
	}
	public function fetch_filename($media_id)
	{
		$query = $this->db->SELECT('system_file_name,file_path')
				 ->WHERE('media_id',$media_id)
				 ->get('tbl_media');
		if($query->num_rows()>0)
        {
            return $query->row();
        }
        else
        {
        	return FALSE;
        }
	}
	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:22-11-2017
		Description:
	--------------------------------------------------------------------------------------------------------------
	*/
	public function fetch_file_details($media_id,$file_setting)
	{
		if(isset($media_id) && !empty($media_id) && $file_setting)
		{
			$this->db->SELECT('temp.'.$file_setting['key'].' as id,md.*');
			$this->db->FROM('tbl_media as md');
			$this->db->join($file_setting['tablename']." as temp","md.media_id = temp.media_id");
			$this->db->WHERE('md.media_id',$media_id);
			$query =$this->db->get();
			if($query->num_rows()>0)
	        {
	            return $query->row_array();
	        }
	        else
	        {
	        	return FALSE;
	        }
	     }else{return FALSE;}
	}

	/*
	--------------------------------------------------------------------------------------------------------------
		AUTHOR :Mahadev Mandole											Date:13-11-2017
		Description:
	--------------------------------------------------------------------------------------------------------------
	*/
	public function fetchMediaDetails($media_id,$file_setting)
	{
		if(isset($media_id) && !empty($media_id) && $file_setting)
		{
			$this->db->SELECT('temp.'.$file_setting['key'].' as id,atm.file_const,md.*');
			$this->db->FROM('tbl_media as md');
			$this->db->join($file_setting['tablename']." as temp","md.media_id = temp.media_id");
			$this->db->join("tbl_attachment_master as atm","temp.attachment_id = atm.attachment_id","LEFT");
			$this->db->WHERE('md.media_id',$media_id);
			$query=$this->db->get();
			if($query && $query->num_rows()>0)
	        {
	            return $query->row_array();
	        } 
	        else {return FALSE; }
	    }
	    else{return FALSE;}
	}
	/*--------------------------------------------------------------------------------------------------------------
		AUTHOR :Rupali B										Date:30-12-2017
	--------------------------------------------------------------------------------------------------------------*/
	public function fetch_file_details_payment($media_id)
	{
		if(isset($media_id) && !empty($media_id))
		{
			$this->db->SELECT('md.*');
			$this->db->FROM('tbl_media as md');
			$this->db->WHERE('md.media_id',$media_id);
			$query =$this->db->get();
			if($query->num_rows()>0)
	        	{return $query->row_array(); } 
	    	else 
	    		{return FALSE; }
	     }else{return FALSE;}
	}
	/*--------------------------------------------------------------------------------------------------------------
		AUTHOR :Rupali B										Date:16-04-2018
	--------------------------------------------------------------------------------------------------------------*/
	public function fetch_file_details_daily_stock($media_id,$dbObj=false)
	{
		if($dbObj)
		{
			$this->db = $dbObj;
		}
		if(isset($media_id) && !empty($media_id))
		{
			$this->db->SELECT('md.*');
			$this->db->FROM('tbl_media as md');
			$this->db->WHERE('md.media_id',$media_id);
			$query =$this->db->get();
			if($query->num_rows()>0)
	        	{return $query->row_array(); } 
	    	else {return FALSE; }
	     }else{return FALSE;}
	}
}