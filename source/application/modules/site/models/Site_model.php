<?php
class Site_model extends CI_Model 
{
	public function institute_details($id)
    {
        $query= $this->db->query("SELECT tbl1.*,tbl2.district_name FROM tbl_institute AS tbl1 LEFT JOIN tbl_district AS tbl2 ON tbl1.district_id=tbl2.district_id WHERE tbl1.display='Y' AND tbl1.institute_id=$id");
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    public function getbookdata($product_id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_objective_book_product');
        $this->db->where('display','Y');
        if($product_id)
        { 
            $this->db->where('product_id',$product_id);
            $query=$this->db->get();
            echo $query;
            $result=$query->row_array();
            if($query->num_rows()>0) 
            {
                return $query->result();
            } 
            else 
            {
                return false; 
            } 
        }
        else
        {
            $this->db->order_by('product_name','asc');
            $query=$this->db->get();
            $result=$query->result_array();
            if($query->num_rows()>0) 
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
        return !empty($result)?$result:false;
    }
    public function lastinsert($table_name,$where)
    {
        $query=$this->db->query("SELECT $where FROM $table_name ORDER BY $where DESC LIMIT 1");
        if($query->num_rows()>0) 
        {
           foreach ($query->result() as $key) 
            {
                $data=$key; 
            } 
            return $data; 
        } 
        else 
        {
            return false; 
        } 
    }
    public function fetch_allproduct_data()
    { 
        $this->db->select('*')->from('tbl_objective_book_product')
        ->where('display', 'Y');
         $qry = $this->db->get(); 
         //echo $this->db->last_query();die;
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

    public function forgot_pass_site($user_data,$password,$institute_id,$email)
    {
        $this->load->library('email_sent');
        $this->db->trans_start();
        $this->db->where('institute_id', $institute_id);
        $query = $this->db->update('tbl_institute', $user_data);

        $datavalue["password"]=$password; 
        $subject = 'MSCEIA Forgot Password';
        $msg_body=$this->load->view("mailer/new_pass",$datavalue,true);
        $alt_msg = 'MSCEIA Forgot Password';
        $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg);
        $email_id[]=array('email_id'=>$email);
        $result=$this->email_sent->mail_sent_by_gmail_webmail($data,$email_id);
        $institute_id = $this->common_model->selectDetailsWhr('tbl_institute','institute_id',$institute_id);
        $mob_msg='Welcome to MSCEIA. Your Institute has been registered Successfully! Wait for your verification mail.';
        sendSms($institute_id->institute_contact,$mob_msg);
        if($result)
        {
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
        else
        {
            return false;
        }       
    }
    public function student_status_data($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM tbl_student as ts LEFT JOIN tbl_course_master as tc on ts.course_master_id=tc.course_master_id where ts.display='Y' And ts.student_status='Payment' And ts.institute_id = ? AND batch_id = $current_batch_id",array($institute_id));
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
    public function payment_adjusted_stud($institute_id)
    {
        // $query= $this->db->query("SELECT tp.*,SUM(tp.total_student) as student_count,vi.paid_student FROM tbl_payment tp LEFT JOIN view_institute_jan22 vi ON vi.institute_id = tp.institute_id WHERE tp.depositer_name = 'msceiateam' AND tp.display ='Y' AND vi.paid_student <= 20 AND vi.institute_id = ?",array($institute_id));
        $query= $this->db->query("SELECT tp.*,SUM(tp.total_student) as student_count,vi.paid_student FROM tbl_payment tp LEFT JOIN view_institute_jan23 vi ON vi.institute_id = tp.institute_id WHERE tp.depositer_name = 'msceiateam' AND tp.display ='Y' AND vi.paid_student <= 20 AND vi.institute_id = ?",array($institute_id));
        if($query->num_rows()>0) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }    

    public function updateDetailsWithConditions($tblname,$where,$condition,$where1,$condition1,$data) 
    {
        $this->db->where($where, $condition); 
        $this->db->where($where1, $condition1); 
        $query = $this->db->update($tblname, $data); 
        return $query; 
    }

    public function fetch_result($seat_no,$password)
    {
        $query=$this->db->query("SELECT * from view_student WHERE seat_no = ? AND exam_password = ? AND  exam_status = 'Upload' AND flag = '1' ",array($seat_no,$password));

        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }  
    }

    public function print_student_result($inst_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM view_student WHERE exam_status='Upload' AND flag= '1' AND course_master_id!=7 AND institute_id = ? AND batch_id = $current_batch_id",array($inst_id));
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
    
    public function print_student_result_ssd($inst_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM view_student WHERE exam_status='Upload' AND flag= '1' AND course_master_id=7 AND institute_id = ? AND batch_id = $current_batch_id",array($inst_id));
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

    public function check_exam_download_details($inst_id)
    {
        // SELECT tp.*,vi.paid_student FROM tbl_payment as tp LEFT JOIN view_institute as vi ON tp.institute_id = vi.institute_id WHERE tp.institute_id = ? AND tp.display = 'Y' AND tp.in_use = 'Y' AND tp.payment_status = 'payment_unsuccess' AND vi.paid_student <= 20 AND tp.depositer_name = 'msceiateam'
        $query= $this->db->query("SELECT tp.*,sum(vi.paid_student) as paid_stud FROM tbl_payment tp LEFT JOIN view_institute vi ON tp.institute_id = vi.institute_id WHERE tp.display = 'Y' AND tp.payment_status = 'payment_unsuccess' AND tp.institute_id = ? group by tp.institute_id having paid_stud <= 20",array($inst_id));
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

    public function payment_history_details($id)
    {
        
        $query= $this->db->query("SELECT vs.*,tp.total_student,tp.transaction_no,tp.total_amount,tp.deposite_date FROM view_student vs INNER JOIN tbl_payment tp ON vs.payment_id = tp.payment_id WHERE vs.in_use = 'Y' AND vs.payment_id = ? AND vs.display = 'Y' ",array($id));
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

    // public function student_data_batch_wise($inst_id,$batch_id)
    // {
    //     $query= $this->db->query("SELECT vs.student_id,tb.batch_name,vs.stud_full_name,vs.course_name,vs.seat_no,vs.student_status,vs.exam_status FROM view_student AS vs LEFT JOIN tbl_batch AS tb ON tb.batch_id = vs.batch_id WHERE vs.institute_id = ? AND vs.batch_id = ? AND vs.display = 'Y' AND vs.in_use='Y'",array($inst_id,$batch_id));
    //     if($query->num_rows() > 0)
    //     {
    //         foreach ($query->result() as $row)
    //         {
    //             $tbl_data[]=$row;
    //         }
    //         return $tbl_data;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    public function student_data_batch_wise($inst_id,$batch_id)
    {
        $query= $this->db->query("SELECT vs.student_id,tb.batch_name,tb.batch_id,vs.stud_full_name,vs.course_name,vs.seat_no,vs.student_status,vs.exam_status,vs.result FROM view_student AS vs LEFT JOIN tbl_batch AS tb ON tb.batch_id = vs.batch_id WHERE vs.institute_id = ? AND vs.batch_id = ? AND vs.display = 'Y' AND vs.in_use='Y'",array($inst_id,$batch_id));
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
    public function batch_lastinsert()
    {
        $query=$this->db->query("SELECT tc.*,tb.batch_id FROM tbl_current_batch AS tc LEFT JOIN tbl_batch AS tb ON tb.batch_id = tc.batch_id ORDER BY tb.batch_id DESC LIMIT 1 ");
        if($query->num_rows()>0) 
        {
           foreach ($query->result() as $key) 
            {
                $data=$key; 
            } 
            return $data; 
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetch_all_batch_not_current()
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $query = $this->db->query("SELECT * FROM `tbl_batch` WHERE `display` = 'Y' AND `in_use` = 'Y' AND `batch_id` NOT IN($current_batch_id)"); 
        if($query->num_rows()>0) 
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

    public function getCurrentBatch()
    {
        $query = $this->db->get('tbl_current_batch');
        if($query->num_rows()>0) 
        {
           return $query->result_array();
        } 
        else 
        {
            return false; 
        } 
    }

    public function get_batchwise_payment_history_student($batch_id)
    {
        
        $institute_id = $this->session->userdata('institute_id');
        $query=$this->db->query("SELECT tp.* FROM tbl_payment AS tp 
                INNER JOIN tbl_payment_details tpd ON tpd.payment_id = tp.payment_id WHERE tp.display='Y' AND tp.institute_id = '$institute_id' AND tpd.batch_id='$batch_id' GROUP BY tp.payment_id "); 
              
        if($query->num_rows()>0) 
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
    // public function get_batchwise_institute_paid_cnt($institute_id)
    // {
    //     $query=$this->db->query("SELECT SUM(paid_student)AS paid_stud,institute_id,institute_name,institute_code,institute_owner_name,batch_id,batch_name,minimum_student,maximum_student,minimum_fees,maximum_fees FROM (SELECT v1.institute_id,v1.institute_name,v1.institute_code,v1.institute_owner_name,v1.paid_student,v1.batch_id,v1.batch_name,tb.minimum_student,tb.maximum_student,tb.minimum_fees,tb.maximum_fees FROM `view_institute_jan22` as v1 left join tbl_batch_fees as tb ON v1.batch_id = tb.batch_id WHERE v1.institute_id = $institute_id UNION SELECT v2.institute_id,v2.institute_name,v2.institute_code,v2.institute_owner_name,v2.paid_student,v2.batch_id,v2.batch_name,tb.minimum_student,tb.maximum_student,tb.minimum_fees,tb.maximum_fees FROM `view_institute_aug22` as v2 left join tbl_batch_fees as tb ON v2.batch_id = tb.batch_id WHERE v2.institute_id = $institute_id) AS x");
    //     if($query->num_rows()== 1)
    //     {           
    //         return $query->row();
    //     }
    //     else
    //     {
    //         return false;
    //     }  
    // }
    public function get_batchwise_institute_data($institute_id)
    {
        $query=$this->db->query("SELECT institute_id,institute_name,institute_code,institute_owner_name FROM tbl_institute WHERE institute_id = $institute_id");
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }  
    }
    
    public function current_batch_cnt($institute_code )
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;

        $query=$this->db->query("SELECT institute_id,institute_name,institute_code, count(institute_id) total_student, sum(if(student_status='payment',1,0)) paid_student, sum(if(student_status='appear',1,0)) appear_student, sum(if(result='Pass',1,0)) AS Pass_student,sum(if(exam_status='Upload',1,0)) AS upload_student, sum(if((student_status='payment' && (payment_type = 140 || payment_type = 100)),1,0)) exam_appeared_student, batch_name FROM view_student WHERE institute_code  = $institute_code AND batch_id = $current_batch_id GROUP BY institute_id");
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }  
    } 
    
    public function upcoming_batch_cnt($institute_code )
    {
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;

        $query=$this->db->query("SELECT institute_id,institute_name,institute_code, count(institute_id) total_student, sum(if(student_status='payment',1,0)) paid_student, sum(if(student_status='appear',1,0)) appear_student, batch_name FROM view_student WHERE institute_code = $institute_code AND batch_id = $upcoming_batch_id GROUP BY institute_id");
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }  
    } 
    
    public function fetch_student_data($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM tbl_student WHERE institute_id = ? AND batch_id IN($current_batch_id,$upcoming_batch_id) AND display = 'Y' ",array($institute_id));
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

    //Temporary function for exam july 2022( Aug 2021 & jan 2022 )

    public function student_status_data_temp($institute_id)
    {
        $current_batch_data=$this->custom_model->get_current_batch();
        $current_batch_id=$current_batch_data->batch_id;
        $upcoming_batch_data=$this->custom_model->get_upcoming_batch();
        $upcoming_batch_id=$upcoming_batch_data->batch_id;
        $query= $this->db->query("SELECT * FROM tbl_student as ts LEFT JOIN tbl_course_master as tc on ts.course_master_id=tc.course_master_id where ts.display='Y' And ts.student_status='Payment' And ts.institute_id = ? AND batch_id IN (2,3)",array($institute_id));
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