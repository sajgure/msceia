<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Batch_fees_model extends CI_Model
{
    private $returnarray;
    public $error;
    public $error_code;
    public function __construct() 
    {
      parent::__construct();
      $this->error=array();
      $error = Array('code'=>'', 'message'=>'');
    }
     /*
    =================================================================================
    Author:Snehal Kulkarni                                         Date:26/03/2021
    =================================================================================
    */
    public function fetch_batch_fees($details=array())
    {
        if($details && is_array($details) && isset($details['batch_fees_id']))
        {
            $this->db->WHERE('g.batch_fees_id',$details['batch_fees_id']);
        }
        else if(!isset($details['all']) && !isset($details['batch_fees_id'])){
             $this->db->where('g.in_use','Y');
        }
        if($details && is_array($details) && isset($details['recordsPerPage']))
        {
            $recordsPerPage=isset($details['recordsPerPage']) && !empty($details['recordsPerPage'])?$details['recordsPerPage']:1;
            $this->db->limit($recordsPerPage);
        }
        else
        {
               $this->db->limit(50);
        }
        $query=$this->db->select("g.batch_fees_id,g.batch_id,g.minimum_student,g.maximum_student,g.minimum_fees,g.maximum_fees,g.inserted_by,g.inserted_on,g.modified_by,g.modified_on,g.in_use,g.display")
                         ->from("tbl_batch_fees as g")
                         ->join("tbl_batch as c","g.batch_id=c.batch_id","left")
                         ->GET();
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
    /*
    =================================================================================
    Author:Snehal Kulkarni                                      Date:26/06/2020
    =================================================================================
    */
    public function getIdDetails($details=array(),$table_name,$primary_key)
    {
        if(isset($details))
        {
             $sql=$this->db->SELECT("*")
                            ->FROM($table_name)
                            ->WHERE($primary_key,$details[$primary_key])     
                            ->GET();     
            $error=$this->db->error();   
            if($sql && $sql->num_rows()>0)
            {
                return $sql->result_array();
            }
            else
            {
                $this->error=$error['message'];
                return false;
            }
        }
    }
    /*
    ============================================================
    Author:Snehal Kulkarni                 Date:26/06/2020
    ============================================================
    */
    public function selectAllWhr($tblname,$where,$condition)
    {
        $this->db->where($where,$condition);
        $this->db->where('display','Y');
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

    /*
    ============================================================
    Author:Snehal Kulkarni                 Date:03/07/2020
    ============================================================
    */

     public function selectMultiData($tblname,$where1,$where2,$condition1,$condition2)
    {
        $this->db->where($where1,$condition1);
        $this->db->where($where2,$condition2);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);
        
        if($query->num_rows()> 0) 
        {  
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;

            //return $query->rows();
        } 
        else 
        {
            return false; 
        } 
    }               
}//EOF