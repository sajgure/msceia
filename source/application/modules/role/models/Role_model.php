<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Role_model extends CI_Model 
{

	 public function menu_list($role_id) 
    {
        $query=$this->db->query("SELECT * FROM tbl_menu where display='Y'"); 
        if($query->num_rows()>0) 
        {
            $data=array(); 
            foreach($query->result() as $key) 
            {
                $array_data['menu']=$key; 
                $menu_id=$key->menu_id; 
                $subquery=$this->db->query("SELECT s.*,if(isnull(p.role_id),'N','Y') prev FROM tbl_submenu s left join tbl_priviledges p on p.role_id=? and p.submenu_id=s.submenu_id where s.menu_id=? and s.display='Y' having prev='Y' ORDER BY s.submenu_id ASC",array($role_id,$menu_id)); 
                if($subquery->num_rows()>0) 
                {
                    $array_data['submenu']=$subquery->result(); 
                    $data[]=$array_data; 
                }
            } 
        }
        else 
        {
            return null; 
        } 
        return $data; 
    }
    		
 	public function menu_list1($role_id) 
    {
        $query=$this->db->query("SELECT * FROM tbl_menu where display='Y'"); 
        if($query->num_rows()>0) 
        {
            $data=array(); 
            foreach($query->result() as $key) 
            {
                $array_data['menu']=$key; 
                $menu_id=$key->menu_id; 
                $subquery=$this->db->query("SELECT s.*,if(isnull(p.role_id),'N','Y') prev FROM tbl_submenu s left join tbl_priviledges p on p.role_id=? and p.submenu_id=s.submenu_id where s.menu_id=? and s.display='Y'",array($role_id,$menu_id)); 
                if($subquery->num_rows()>0) 
                {
                    $array_data['submenu']=$subquery->result(); 
                    $data[]=$array_data; 
                }
                else 
                {
                    $array_data['submenu']=null; 
                }
            } 
        }
        else 
        {
            return null; 
        } 
        return $data; 
    } 



	public function save_role_config($role_id,$submenu) 
	{
		$this->db->trans_start(); 
		$this->db->where('role_id',$role_id); 
		$this->db->delete('tbl_priviledges'); 
		foreach ($submenu as $key) 
		{
			$this->db->insert('tbl_priviledges',array('submenu_id'=>$key,'role_id'=>$role_id)); 
		} 
		$query=$this->db->trans_complete(); 
		if($query) 
		{
			return true; 
		} 
		else 
		{
			return false; 
		} 
	} 

}