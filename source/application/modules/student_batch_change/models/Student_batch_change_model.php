<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Student_batch_change_model extends CI_Model
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
    
//     public function getstateWiseDistrict($data)
//    {
//    		//$user_id= $this->session->userdata('user_id');
//    		//$user_id=2;
//         $this->db->where('state_id',$data['state_id']);
//         $this->db->where('district_name',$data['district_name']);
//         $this->db->where('code',$data['code']);
//         $query = $this->db->get('tbl_district');
//         if($query->num_rows() > 0)
//         {
//             /*foreach ($query->result() as $row)
//             {
//                 $tbl_data[]=$row;
//             }*/
//             return true;
//         }
//         else
//         {
//             return false;
//         }     

//     }
//     public function insertdemo($data)
//     {
//  return $this->db->insert('tbl_demo',$data);
//     }

    public function getsessionsBybatch() {
        $val_id=$_POST['gettrainerbatch_id'];
        // $this->db->select('sessions_id');
        // $query = $this->db->get_where('batches', array('id' => $val_id));
        // return $query->row_array();
        $this->db->select('tbl_batch.batch_name,tbl_batch.batch_id,tbl_batch.batch_description,tbl_batch.seat_no_prefix,tbl_batch.start_date,tbl_batch.end_date,tbl_student.surname,tbl_student.student_id,tbl_student.first_name,tbl_student.father_name,tbl_student.seat_no,tbl_student.student_password,tbl_institute.institute_name,tbl_institute.institute_code,tbl_course_master.course_name'); 
        $this->db->from('tbl_batch');
        $this->db->join('tbl_student', 'tbl_batch.batch_id = tbl_student.batch_id');
        $this->db->join('tbl_institute', 'tbl_student.institute_id = tbl_institute.institute_id');
        $this->db->join('tbl_course_master', 'tbl_student.course_master_id = tbl_course_master.course_master_id');
        $this->db->where(array('tbl_batch.batch_id'=>$val_id));
        $query = $this->db->get();
        return $query->row_array();
	  }
      public function getsessionsBybatchupdate() {
        $val_id=$_POST['gettrainerbatch_id'];
        $val_ids=$_POST['student_id'];
        // $this->db->select('sessions_id');
        // $query = $this->db->get_where('batches', array('id' => $val_id));
        // return $query->row_array();
        $this->db->select('tbl_batch.batch_name,tbl_batch.batch_id,tbl_batch.batch_description,tbl_batch.seat_no_prefix,tbl_batch.start_date,tbl_batch.end_date,tbl_student.surname,tbl_student.student_id,tbl_student.first_name,tbl_student.father_name,tbl_student.seat_no,tbl_student.student_password,tbl_institute.institute_name,tbl_institute.institute_code,tbl_course_master.course_name'); 
        $this->db->from('tbl_batch');
        $this->db->join('tbl_student', 'tbl_batch.batch_id = tbl_student.batch_id');
        $this->db->join('tbl_institute', 'tbl_student.institute_id = tbl_institute.institute_id');
        $this->db->join('tbl_course_master', 'tbl_student.course_master_id = tbl_course_master.course_master_id');
        $this->db->where(array('tbl_student.student_id'=>$val_ids));
        $query = $this->db->get();
        return $query->row_array();
	  }
      public function getsessionsBybatchstudent() {
        $val_id=$_POST['gettrainerbatch_id'];
        $val_idstudent=$_POST['gettrainerbatchstudent_id'];
        
        // $this->db->select('sessions_id');
        // $query = $this->db->get_where('batches', array('id' => $val_id));
        // return $query->row_array();
       /* $this->db->select('tbl_batch.batch_name,tbl_batch.batch_description,tbl_batch.seat_no_prefix,tbl_batch.start_date,tbl_batch.end_date,tbl_student.surname,tbl_student.student_id,tbl_student.first_name,tbl_student.father_name,tbl_student.seat_no,tbl_student.student_password,tbl_institute.institute_name,tbl_institute.institute_code,tbl_course_master.course_name'); 
        $this->db->from('tbl_batch');
        $this->db->join('tbl_student', 'tbl_batch.batch_id = tbl_student.batch_id');
        $this->db->join('tbl_institute', 'tbl_student.institute_id = tbl_institute.institute_id');
        $this->db->join('tbl_course_master', 'tbl_student.course_master_id = tbl_course_master.course_master_id');
        $this->db->where(array('tbl_batch.batch_id'=>$val_id));*/


        $this->db->select('tbl_batch.batch_name,tbl_batch.batch_description,tbl_batch.seat_no_prefix,tbl_batch.start_date,tbl_batch.end_date,tbl_student.surname,tbl_student.student_id,tbl_student.first_name,tbl_student.father_name,tbl_student.seat_no,tbl_student.student_password,tbl_institute.institute_name,tbl_institute.institute_code,tbl_course_master.course_name'); 
        $this->db->from('tbl_student');
        $this->db->join('tbl_batch', 'tbl_student.batch_id = tbl_batch.batch_id');
        $this->db->join('tbl_institute', 'tbl_student.institute_id = tbl_institute.institute_id');
        $this->db->join('tbl_course_master', 'tbl_student.course_master_id = tbl_course_master.course_master_id');
        $this->db->where(array('tbl_batch.batch_id'=>$val_id));
        // $this->db->where('tbl_batch.batch_id >=', $val_id);
        // $this->db->where('tbl_batch.batch_id <=', $val_idstudent);
        $query = $this->db->get();
        return $query->result_array();
	  }

      public function updateView(){
        $val_id=$this->input->post('student_id');
        $val_ids=$this->input->post('batch_idstudents');
        
        $this->db->set('batch_id', $val_ids);
        $this->db->where('student_id', $val_id);
        $query = $this->db->update("tbl_student");
        // $query = $this->db->get();
        return $query->result_array();
    }
}