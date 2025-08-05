<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_model extends CI_Model {

    public function get_inst_data($inst_code,$password)
    {
        $query= $this->db->query("SELECT institute_id as inst_id, 1 as role_id, institute_name as inst_name, institute_code as inst_code, institute_password as inst_password, institute_address as inst_address, district_id as city_id , institute_taluka as inst_taluka, institute_pincode as inst_pincode, institute_contact as inst_contact, institute_alternate_contact as inst_alt_contact, institute_mail as inst_mail, institute_owner_name as inst_owner_name, institute_principal_name as inst_princ_name, institute_owner_qualification as inst_owner_qual, institute_principal_qualification as inst_princ_qual, institute_owner_photo as inst_owner_photo, institute_registration_date as inst_reg_date, institute_status as inst_status , db_status as db_status , download_status as download_status , inserted_by as created_by, inserted_on as created_on, modified_by as modified_by , modified_on as modified_on , display as display , installation_count as installation_count, 0 as exam_install_count, courier_no as courier_no, 'Not_Send' as greeting_status , 'Not_Send' as sms_status , mac_id as mac_id, exam_mac_id as exam_mac_id FROM `tbl_institute` WHERE institute_code=? AND institute_password=? ",array($inst_code,$password));
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
    public function fetchPinCodeWiseInst($inst_pin_code)
    {
        $query = $this->db->query("SELECT `inst_id`, `inst_name`, `inst_code`, `inst_address`, `inst_pincode`, `inst_contact`, `inst_mail` FROM `tbl_institute` WHERE inst_pincode=? AND inst_status='Active' AND display='Y'",array($inst_pin_code));

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    // public function fetch_student($id)
    // {
    //     $current_batch_data=$this->custom_model->get_current_batch();
    //     $current_batch_id=$current_batch_data->batch_id;
    //     $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
    //     $upcoming_batch_id=$upcoming_batch_data->batch_id;
    //     $query = $this->db->query("SELECT student_id as stud_id, institute_id as inst_id, seat_no as stud_seat_no, student_password as stud_password, exam_password as stud_exam_password, first_name as stud_name, father_name as stud_father_name, surname as stud_last_name, mother_name as stud_mother_name, course_master_id as stud_course, 'Payment Received' as stud_status, photo_sign as stud_photo, permenant_address as stud_permenant_address, residential_address as stud_residential_address, district_id as stud_district, photo_identity as stud_photo_identity, aadhar_card_no as stud_aadhar_no, date_of_birth as stud_dob, date_of_admission as stud_admission_date, gender as stud_gender, handicapped as stud_handicap, email as stud_mail, exam_status as exam_status, mobile_no as stud_contact, telephone_no as stud_telephone, qualification as stud_qualification, school_college_name as stud_school_clg FROM tbl_student WHERE display='Y' AND institute_id=? AND batch_id IN($current_batch_id,$upcoming_batch_id) AND student_status='payment'",array($id));

    //     if($query->num_rows() > 0)
    //     {
    //         return $query->result();
    //         /*foreach ($query->result() as $row)
    //         {
    //             $tbl_data[]=$row;
    //         }
    //         return $tbl_data;*/

    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    
    public function fetch_elearn_student($id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query = $this->db->query("SELECT student_id as stud_id, institute_id as inst_id, seat_no as stud_seat_no, student_password as stud_password, exam_password as stud_exam_password, first_name as stud_name, father_name as stud_father_name, surname as stud_last_name, mother_name as stud_mother_name, course_master_id as stud_course, 'Payment Received' as stud_status, photo_sign as stud_photo, permenant_address as stud_permenant_address, residential_address as stud_residential_address, district_id as stud_district, photo_identity as stud_photo_identity, aadhar_card_no as stud_aadhar_no, date_of_birth as stud_dob, date_of_admission as stud_admission_date, gender as stud_gender, handicapped as stud_handicap, email as stud_mail, exam_status as exam_status, mobile_no as stud_contact, telephone_no as stud_telephone, qualification as stud_qualification, school_college_name as stud_school_clg FROM tbl_student WHERE display='Y' AND institute_id=? AND batch_id IN($current_batch_id,$upcoming_batch_id) AND student_status='payment'",array($id));

        if($query->num_rows() > 0)
        {
            return $query->result();
            /*foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;*/

        }
        else
        {
            return false;
        }
    }
    
    /*public function fetch_elearn_student($id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query = $this->db->query("SELECT student_id as stud_id, institute_id as inst_id, seat_no as stud_seat_no, student_password as stud_password, exam_password as stud_exam_password, first_name as stud_name, father_name as stud_father_name, surname as stud_last_name, mother_name as stud_mother_name, course_master_id as stud_course, 'Payment Received' as stud_status, photo_sign as stud_photo, permenant_address as stud_permenant_address, residential_address as stud_residential_address, district_id as stud_district, photo_identity as stud_photo_identity, aadhar_card_no as stud_aadhar_no, date_of_birth as stud_dob, date_of_admission as stud_admission_date, gender as stud_gender, handicapped as stud_handicap, email as stud_mail, exam_status as exam_status, mobile_no as stud_contact, telephone_no as stud_telephone, qualification as stud_qualification, school_college_name as stud_school_clg FROM tbl_student WHERE display='Y' AND institute_id=? AND batch_id = $current_batch_id AND student_status='payment'",array($id));

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }*/
    
    public function fetch_exam_student($id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query = $this->db->query("SELECT student_id as stud_id, institute_id as inst_id, seat_no as stud_seat_no, student_password as stud_password, exam_password as stud_exam_password, first_name as stud_name, father_name as stud_father_name, surname as stud_last_name, mother_name as stud_mother_name, course_master_id as stud_course, 'Payment Received' as stud_status, photo_sign as stud_photo, permenant_address as stud_permenant_address, residential_address as stud_residential_address, district_id as stud_district, photo_identity as stud_photo_identity, aadhar_card_no as stud_aadhar_no, date_of_birth as stud_dob, date_of_admission as stud_admission_date, gender as stud_gender, handicapped as stud_handicap, email as stud_mail, exam_status as exam_status, mobile_no as stud_contact, telephone_no as stud_telephone, qualification as stud_qualification, school_college_name as stud_school_clg FROM tbl_student WHERE display='Y' AND institute_id= ? AND batch_id = $current_batch_id AND student_status='payment'",array($id));

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    //Temporary function for exam july 2022( Aug 2021 & jan 2022 )

    public function fetch_exam_student_temp($id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query = $this->db->query("SELECT student_id as stud_id, institute_id as inst_id, seat_no as stud_seat_no, student_password as stud_password, exam_password as stud_exam_password, first_name as stud_name, father_name as stud_father_name, surname as stud_last_name, mother_name as stud_mother_name, course_master_id as stud_course, 'Payment Received' as stud_status, photo_sign as stud_photo, permenant_address as stud_permenant_address, residential_address as stud_residential_address, district_id as stud_district, photo_identity as stud_photo_identity, aadhar_card_no as stud_aadhar_no, date_of_birth as stud_dob, date_of_admission as stud_admission_date, gender as stud_gender, handicapped as stud_handicap, email as stud_mail, exam_status as exam_status, mobile_no as stud_contact, telephone_no as stud_telephone, qualification as stud_qualification, school_college_name as stud_school_clg FROM tbl_student WHERE display='Y' AND institute_id= ? AND batch_id IN($current_batch_id,$upcoming_batch_id) AND student_status='payment'",array($id));

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function stud_details($username,$password)
    {
        /*$query= $this->db->query("SELECT inst_name AS inst_name, inst_code AS inst_code, stud_id  AS stud_id, inst_id AS inst_id, stud_name AS 
        stud_name,stud_father_name AS stud_father_name, stud_last_name AS stud_last_name, course_full_name AS course_full_name, stud_photo AS 
        stud_photo, stud_mail AS stud_mail, mac_id AS mac_id, 'stud' AS type FROM view_student  WHERE display='Y' AND stud_status='Payment Received' AND 
        stud_seat_no= ? AND stud_password = ? 
        UNION SELECT inst_name AS inst_name, inst_code AS inst_code, inst_id  AS stud_id, inst_id AS inst_id, inst_name AS stud_name, '' AS 
        stud_father_name, '' AS stud_last_name, inst_taluka AS course_full_name, '' AS stud_photo, inst_mail AS stud_mail, mac_id AS mac_id, 'inst' AS type FROM 
        tbl_institute  WHERE display='Y' AND inst_status='Active' AND inst_code=? AND inst_password=?", */
        $query= $this->db->query("SELECT institute_name AS inst_name, institute_code AS inst_code, student_id AS stud_id, institute_id AS inst_id, first_name AS stud_name,father_name AS stud_father_name, surname AS stud_last_name, course_full_name AS course_full_name, photo_sign AS stud_photo, email AS stud_mail, mac_id AS mac_id, 'stud' As type FROM view_student WHERE display='Y' AND student_status='Payment' AND seat_no= ? AND student_password = ? UNION SELECT institute_name AS inst_name, institute_code AS inst_code, institute_id AS stud_id, institute_id AS inst_id, institute_name AS stud_name, '' AS father_name, '' AS surname, institute_taluka AS course_full_name, '' AS stud_photo, institute_mail AS stud_mail, mac_id AS mac_id, 'inst' AS type FROM tbl_institute WHERE display='Y' AND institute_status='Active' AND institute_code= ? AND institute_password= ?",
        array($username,$password,$username,$password));
        if($query && $query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
    public function app_que()
    {
        $query = $this->db->query("SELECT question_id,section_id,question_english as question ,question_marathi as question_mar,option_id FROM tbl_question WHERE display='Y'");
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_option where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }
    
    public function app_only_question()
    {
        // $query = $this->db->query("SELECT question_id,section_id,question,question_mar,option_id FROM tbl_question WHERE display='Y'");
        $query = $this->db->query("SELECT question_id,section_id,question_english as question,question_marathi as question_mar,option_id FROM tbl_question WHERE display='Y'");
        if($query->num_rows() > 0)
        {
            return  $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function app_only_option()
    {
        $query = $this->db->query("SELECT * from tbl_option where display='Y'");
        
        if($query->num_rows() > 0)
        {
            return  $query->result();
        }
        else
        {
            return false;
        }
    }

    public function previous_que()
    {
        $query = $this->db->query("SELECT question_id,exam_type,batch,question,option_id FROM tbl_que WHERE display='Y'");
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_opt where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }
    
    public function app_only_prev_question()
    {
        $query = $this->db->query("SELECT question_id,exam_type,batch,question,option_id FROM tbl_que WHERE display='Y'");
        
        if($query->num_rows() > 0)
        {
            return  $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function app_only_prev_option()
    {
        $query = $this->db->query("SELECT * from tbl_opt1 where display='Y'");
        
        if($query->num_rows() > 0)
        {
            return  $query->result();
        }
        else
        {
            return false;
        }
    }

    public function app_section_data()
    {
        $query = $this->db->query("SELECT ts.section_id,ts.name as section_name,ts.section_img, COUNT(tq.section_id) AS section_count FROM tbl_section AS ts LEFT JOIN tbl_question AS tq ON tq.section_id=ts.section_id WHERE ts.display='Y' GROUP BY ts.section_id");

        if($query->num_rows() > 0)
        {
            return $query->result();
            /*foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;*/

        }
        else
        {
            return false;
        }
    }
    
    public function whatsnewData($next_version)
    {
        $query = $this->db->query("SELECT * FROM tbl_version WHERE version<=? AND display='Y' ORDER BY version_id  DESC",array($next_version));

        if($query->num_rows() > 0)
        {
            return $query->result();
            /*foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;*/

        }
        else
        {
            return false;
        }
    }

    public function set_result()
    {
        //$query= $this->db->query("SELECT tsr.stud_id,tsr.objective_marks,tsr.speed_marks,ts.stud_course FROM tbl_student_result tsr LEFT JOIN tbl_student ts ON tsr.stud_id=ts.stud_id WHERE ts.stud_course=7 AND  tsr.speed_mark_set='Y'  AND ts.flag='0' limit 1000");
        // $query= $this->db->query("SELECT tsr.stud_id,tsr.objective_marks,tsr.speed_marks,ts.stud_course FROM tbl_student_result tsr LEFT JOIN tbl_student ts ON tsr.stud_id=ts.stud_id WHERE tsr.email_mark_set='Y' AND  tsr.speed_mark_set='Y'  AND tsr.flag='0' limit 1000");
        $query= $this->db->query("SELECT tsr.student_id,tsr.objective_marks,tsr.speed_marks,ts.course_master_id FROM tbl_student_result tsr LEFT JOIN tbl_student ts ON tsr.student_id=ts.student_id WHERE tsr.email_mark_set='Y' AND tsr.speed_mark_set='Y' AND tsr.flag='0' AND tsr.batch_id='9' limit 1000");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function set_result_ssd()
    {
        $query= $this->db->query("SELECT tsr.student_id,tsr.objective_marks,tsr.speed_marks,ts.course_master_id FROM tbl_student_result tsr LEFT JOIN tbl_student ts ON tsr.student_id=ts.student_id WHERE ts.course_master_id= '7' AND tsr.speed_mark_set='Y' AND tsr.flag='0' limit 1000");
        
        // echo $this->db->last_query(); die;
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }   
    }
    public function featch_100_data()
    {
        /*$query=$this->db->query("SELECT tsr.*,ts.stud_course from tbl_student_result tsr left join tbl_student ts on tsr.stud_id=ts.stud_id where  tsr.email_mark_set='N' AND ts.stud_course !=7  LIMIT 0,1000");*/
        $query=$this->db->query("SELECT tsr.*,ts.course_master_id from tbl_student_result tsr left join tbl_student ts on tsr.student_id=ts.student_id where tsr.email_mark_set='N' AND tsr.batch_id='9' AND ts.course_master_id !=7 LIMIT 0,300");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        } 
    }
    
    public function featch_100_data1()
    {
        /*$query=$this->db->query("SELECT tsr.*,ts.stud_course from tbl_student_result tsr left join tbl_student ts on tsr.stud_id=ts.stud_id where  tsr.speed_mark_set='N' LIMIT 0,1000");*/
        $query=$this->db->query("SELECT tsr.*,ts.course_master_id from tbl_student_result tsr left join tbl_student ts on tsr.student_id=ts.student_id where  tsr.speed_mark_set='N'  AND tsr.batch_id='9' ORDER BY RAND() LIMIT 0,300");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        } 
    }

}