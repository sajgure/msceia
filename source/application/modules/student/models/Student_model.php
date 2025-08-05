<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {	

    public function selectDetailsStud($tblname,$where,$condition) 
    {
        $this->db->where('display', 'Y')->where($where,$condition); 
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

    public function fetch_objective($id,$course_master_id)
    {
        $limit = 25;
        if($course_master_id == '7')
        {
            $limit = 20;
        }
        $query=$this->db->query("SELECT * from tbl_user_answer tbl1 left join tbl_question tbl2 on tbl1.question_id=tbl2.question_id where tbl1.student_id=? AND tbl1.display='Y' AND tbl2.display='Y' order by tbl1.user_answer_id asc limit $limit",array($id));
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
    
}
