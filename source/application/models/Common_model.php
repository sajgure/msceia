<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {	

    public function selectAllWhr($tblname,$where,$condition)
    {
        $this->db->where($where,$condition);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }       
    }

    public function updateDetails($tblname,$where,$condition,$data) 
    {
        $this->db->where($where, $condition); 
        $query = $this->db->update($tblname, $data); 
        return $query; 
    }

    public function addData($tablename,$data) 
    {
        $query=$this->db->insert($tablename,$data); 
        $user_id= $this->db->insert_id(); 
        if($query) {
            return $user_id; 
        } 
        else {
            return false; 
        } 
    }

    public function fetchDataASC($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "asc"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) 
        {
            return $qry->result();
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetchDataDESC($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "DESC");
        $qry = $this->db->get();
        if($qry->num_rows()>0) 
        {
            foreach ($qry->result() as $row) 
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
    
    public function selectMultiDataFor($tblname,$where1,$where2,$condition1,$condition2)
    {
        $this->db->where($where1,$condition1);
        $this->db->where($where2,$condition2);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function selectMultiDatawithcondition($tblname,$where1,$where2,$condition1,$condition2)
    {
        $this->db->where($where1,$condition1);
        $this->db->where($where2,$condition2);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);

        if($query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function selectDetailsWhr($tblname,$where,$condition) 
    {
        $this->db->where('display', 'Y')->where($where,$condition); 
        $query = $this->db->get($tblname); 
        if($query && $query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function singlejoin2tbl($tbl1,$tbl2,$where,$condition,$id)
    {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where AND tbl2.display='Y' where tbl1.$condition=$id AND tbl1.display='Y' ");
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function alljoin2tbl($tbl1,$tbl2,$where)
    {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where  tbl1.display='Y' AND tbl2.display='Y'");
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

    public function SaveMultiData($tablename,$data)
    {
        $query=$this->db->insert_batch($tablename,$data);
        $lsq = $this->db->last_query();
        $ip = getenv('HTTP_CLIENT_IP')?:
        getenv('HTTP_X_FORWARDED_FOR')?:
        getenv('HTTP_X_FORWARDED')?:
        getenv('HTTP_FORWARDED_FOR')?:
        getenv('HTTP_FORWARDED')?:
        getenv('REMOTE_ADDR');
        if($ip=='103.213.214.82'){
        log_message('error',print_r($lsq,true));
        }
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }           
    }

    public function duplicate($id,$p_key,$tbl,$where,$value) 
    {
        if (empty($value)) 
        {
            return FALSE; 
        } 
        $query=$this->db->query("SELECT COUNT(*) AS numrows FROM $tbl WHERE $where = ? AND $p_key != ? AND display='Y'",array($value,$id)); 
        if($query->num_rows()==1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }
    
    public function UpdateMultiData($tblname,$data,$condition)
    {
        $result=$this->db->update_batch($tblname,$data,$condition);
        $lsq = $this->db->last_query();
                $ip = getenv('HTTP_CLIENT_IP')?:
        getenv('HTTP_X_FORWARDED_FOR')?:
        getenv('HTTP_X_FORWARDED')?:
        getenv('HTTP_FORWARDED_FOR')?:
        getenv('HTTP_FORWARDED')?:
        getenv('REMOTE_ADDR');
        if($ip=='103.213.214.82'){
        log_message('error',print_r($lsq,true));
        }
        if($result) 
        {
            return true; 
        } 
        else 
        {
            return false; 
        }
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
    public function selectAllWhrDsc($tblname,$where,$condition,$dsc)
    {
        $this->db->where($where,$condition)->where('display','Y' && 'visibility','Active')->order_by($dsc,"DESC");
        $query = $this->db->get($tblname);
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

    public function alumni_contribution()
    {
        $query= $this->db->query("SELECT DISTINCT activity,contribution,year FROM tbl_alumni_contribution where display='Y'");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function getAppearStudCount($inst_id)
    {
        // $query= $this->db->query("SELECT institute_id, SUM(if(student_status='Payment',1,0)) AS paid_count, SUM(if(student_status='appear',1,0)) AS appeared_count FROM view_student WHERE institute_id=? AND display = 'Y' AND in_use = 'Y' GROUP BY institute_id",array($inst_id));
        $query= $this->db->query("SELECT institute_id, SUM(if(student_status='Payment',1,0)) AS paid_count, SUM(if(student_status='appear',1,0)) AS appeared_count FROM view_student WHERE institute_id= ? AND display = 'Y' AND in_use = 'Y' AND batch_id = 4 GROUP BY institute_id",array($inst_id));
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        } 
    }
    public function fetchDataASC_In_use($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->where('in_use', 'Y')->order_by($asc_by_col_name, "asc"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) 
        {
            return $qry->result();
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetchDataDESC_In_use($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->where('in_use', 'Y')->order_by($asc_by_col_name, "DESC"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) 
        {
            return $qry->result();
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetch_visible_data($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->where('in_use', 'Y')->where('visibility', 'Y')->order_by($asc_by_col_name, "asc"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) 
        {
            return $qry->result();
        } 
        else 
        {
            return false; 
        } 
    }

    public function update_batch($tablename,$data,$id)
    {
        $query=$this->db->update_batch($tablename,$data,$id);
        if($query)
        {
            return true;
        } 
        else
        {
            return false; 
        }
    }
    public function fetchDataASClimit($table_name, $asc_by_col_name, $limit)
    {       
        $this->db->select('*')->from($table_name)->where('display', 'Y')->where('in_use', 'Y')->order_by($asc_by_col_name, "ASC")->limit($limit);
        $qry = $this->db->get();
        if($qry->num_rows()>0)
        {
            foreach ($qry->result() as $row)
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
    public function fetchDataDESClimit($table_name, $dsc_by_col_name, $limit)
	{		
		$this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($dsc_by_col_name, "DESC")->limit($limit);
		$qry = $this->db->get();

		if($qry->num_rows()>0)
		{
			foreach ($qry->result() as $row)
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
}
