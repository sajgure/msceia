<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Objective_section_model extends CI_Model
{ 
	
    public function __construct() 
    {
	  parent::__construct();	
	   $error = Array('code'=>'', 'message'=>'');
    } 
	/*
	================================================================================
	Author:Shubhangi Jagadale                        Date:16-04-20
	=================================================================================
    */
    public function update_objective($data,$opt_data,$option_id,$id,$ans_option)
    {
        $query = $this->db->where('question_id',$id)
                         ->update('tbl_question',$data);

        for($i=0;$i<count($opt_data);$i++)
        {
            if(!empty($option_id[$i]))
            {
                $opt_data[$i]['question_id']=$id;
                $this->db->where('option_id',$option_id[$i])
                                 ->update('tbl_option',$opt_data[$i]);
                if($ans_option==$i+1)
                {
                    $this->db->where('question_id',$id);
                    $this->db->update('tbl_question',array('option_id'=>$option_id[$i]));
                }
            }    
            else 
            {
                $opt_data[$i]['question_id']=$id;
                $this->db->insert('tbl_option',$opt_data[$i]);
                if($ans_option==$i+1)
                {
                    $option_id=$this->db->insert_id();
                    $this->db->where('question_id',$id);
                    $this->db->update('tbl_question',array('option_id'=>$option_id));
                }
            }
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
    /*
	================================================================================
	Author:Shubhangi Jagadale                        Date:16-04-20
	=================================================================================
    */
    public function save_objective($data,$opt_data,$ans_option)
    {
     $query= $this->db->insert('tbl_question',$data);
      // echo $this->db->last_query();
      //                    die();
      $question_id= $this->db->insert_id();
       if(isset($opt_data) && !empty($opt_data))
      {
        $opt_cnt=count($opt_data);
        for($i=0;$i<$opt_cnt;$i++)
        {
            $opt_data[$i]['question_id']=$question_id;
            $this->db->insert('tbl_option',$opt_data[$i]);
            $option_id=$this->db->insert_id();
            $query=$this->db->select("*")
                            ->from("tbl_question")
                            ->where('question_id',$question_id)
                            ->GET();

            if($ans_option==$i+1)
            {
                $this->db->where('question_id',$question_id);
                $this->db->update('tbl_question',array('option_id'=>$option_id));
            }
        }
        if($query){
            return $question_id;
        }
        else
        {
            return false;
        } 
      }
    }

    /*
    ================================================================================
    Author:Mohammad Shafi                        Date:30-03-21
    =================================================================================
    */
    public function payment_data($from_date,$to_date)
    {
        $query=$this->db->query("SELECT * FROM `view_obj_order` WHERE DATE_FORMAT(inserted_on,'%Y-%m-%d')>=? and DATE_FORMAT(inserted_on,'%Y-%m-%d')<=? and display='Y'",array($from_date,$to_date));

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
    public function fetch_option($details=array(),$option_id)
    {
                  
        $query=$this->db->select("option ")
                         ->from("tbl_option")
                        ->where('option_id',$option_id)
                         ->GET();
                      //   echo $this->db->last_query();
                         //die;
        if($query && $query->num_rows()>0)
        { 
            $result =  $query->result_array();
            return $result;
           // print_r($result);
        }
        else
        {
            $this->error=array('message' =>"Record Does not Exist.",'code'=>0);
            return false;
        }
    }
    public function set_ans_option($question_id,$question)
    {
          
       
       $query = $this->db->WHERE('question_id',$question_id)
                        ->UPDATE('tbl_question',$question);
                        // echo $this->db->last_query();
                        // die();
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     public function update_ans_option($id,$question)
    {
          
       
       $query = $this->db->WHERE('question_id',$id)
                        ->UPDATE('tbl_question',$question);
                        // echo $this->db->last_query();
                        // die();
       if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /*
    ================================================================================
    Author:Mohammad Shafi                        Date:30-03-21
    =================================================================================
    */
    public function district_data($district,$from_date,$to_date)
    {
        $query=$this->db->query("SELECT vi.district_name,ood.product_desc,sum(ood.product_qty) as qty FROM view_obj_order AS voo LEFT JOIN view_institute AS vi ON vi.institute_id=voo.institute_id LEFT JOIN tbl_order_details AS ood ON ood.order_id=voo.order_id WHERE vi.district_id=? and DATE_FORMAT(voo.inserted_on,'%Y-%m-%d')>=? and DATE_FORMAT(voo.inserted_on,'%Y-%m-%d')<=? and voo.display='Y' group by ood.product_id ",array($district,$from_date,$to_date));

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
    public function district_details_report($district,$from_date,$to_date)
    {
        $query = $this->db->query("SELECT vi.district_name,voo.*,ood.product_name,ood.product_qty,ood.product_id,ood.product_desc,ood.product_price FROM view_obj_order AS voo LEFT JOIN view_institute AS vi ON vi.institute_id=voo.institute_id LEFT JOIN tbl_order_details AS ood ON ood.order_id=voo.order_id WHERE vi.district_id=? and DATE_FORMAT(voo.inserted_on,'%Y-%m-%d')>=? and DATE_FORMAT(voo.inserted_on,'%Y-%m-%d')<=? and voo.display='Y' group by voo.order_id",array($district,$from_date,$to_date));
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

    /*
    ================================================================================
    Author:Apurva Bandelwar                        Date:304-03-2021
    =================================================================================
    */

    public function search_complete_district_data($district_id,$fdate,$tdate)
    {
        $query=$this->db->query("SELECT voo.*,tod.product_name,tod.product_price,tod.product_qty FROM view_obj_order as voo LEFT JOIN view_institute as vi ON vi.institute_id = voo.institute_id LEFT JOIN tbl_order_details as tod ON tod.order_id = voo.order_id WHERE vi.district_id = $district_id AND voo.inserted_on BETWEEN '$fdate 00:00:01' AND '$tdate 23:59:59'");
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $key) 
            {
                $data[]=$key; 
            } 
            return $data; 
        } 
        else 
        {
            return false; 
        } 
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 07/03/2022
    -------------------------------------------------------------
    */
    public function fetch_objective_exam_type()
    {
        $query= $this->db->query("SELECT question_id,exam_type,course,batch FROM `tbl_que` GROUP BY exam_type");
        if($query->num_rows()>0)
        {            
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 07/03/2022
    -------------------------------------------------------------
    */
    public function fetch_objective_course()
    {
        $query= $this->db->query("SELECT question_id,exam_type,course,batch FROM `tbl_que` GROUP BY course");
        if($query->num_rows()>0)
        {            
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}