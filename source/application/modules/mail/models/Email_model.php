<?php
 Class Email_model extends CI_Model
 {
	/* 
	------------------------------------------------------------
	Author :Mahadev Mandole                  Date : 17/06/2016
	------------------------------------------------------------
	*/
	public function insert_email_details($insertdata)
	{
		$this->db->insert('tbl_email',$insertdata);
		if($this->db->affected_rows()>0)
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	
	}
	/* 
	------------------------------------------------------------
	Author :Mahadev Mandole                  Date : 17/06/2016
	------------------------------------------------------------
	*/
	public function fetch_email_details($tablename)
	{
		$q=$this->db->where(array('display'=>'Y'))
					->order_by('e_id','desc')
					->get($tablename);

		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
		/*
		--------------------------------------------------------------------------------------------------------------
			AUTHOR :Mahadev Mandole											Date:22-07-2016
		--------------------------------------------------------------------------------------------------------------*/
	public function fetch_email_track()
	{
		
		$query = $this->db->get('tbl_email_setting');
		if($query->result())
		{
			return $query->row()->keep_track;
		}
	}
		/*
		--------------------------------------------------------------------------------------------------------------
			AUTHOR :Mahadev Mandole											Date:22-07-2016
		--------------------------------------------------------------------------------------------------------------
		*/
			
	public function insertUpdate_email_track($insertdata)
    {
        $query = $this->db->get('tbl_email_setting');
        if($query->result())
        {
            $result= $this->db->WHERE('track_id',1)
                              ->UPDATE('tbl_email_setting',$insertdata);
            if($result){return TRUE; }
            else {return FALSE; }
        }
        else
        {
            return $this->db->insert('tbl_email_setting',$insertdata); 
        }
    }
		
			
	public function fetch_single_email_detail($id)
	{
		$q=$this->db->get_where('tbl_email',array('e_id'=>$id));
		if($q->num_rows()>0)
		{
			return $q->row();
		}
	}
	/* 
	------------------------------------------------------------
	Author :Mahadev Mandole                  Date : 17/06/2016
	------------------------------------------------------------
	*/
	public function update_email_status($insert_id)
	{
		$this->db->WHERE('e_id',$insert_id)->UPDATE('tbl_email',array('status'=>'T'));
	}
}