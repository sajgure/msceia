<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Common_model extends CI_Model
{
     /*
    --------------------------------------------------------------------------------------------------------------
        AUTHOR : Bismilla Sanade                                   Date:26/03/2020
    --------------------------------------------------------------------------------------------------------------
    */
    private $returnarray;
    public $dependancy_fields;

    public function __construct() 
    {
        parent::__construct();
        $this->error=false;
        $this->returnarray = array();
    }
   /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 26/03/2020
        Description : select table records with two where condition.
    -------------------------------------------------------------------------------------------------------*/
    
    public function getAppearStudList($tblname,$where,$condition)
    {
       # $this->db2 = $this->load->database('database2', TRUE);
        $this->db->where($where,$condition);
        $this->db->where('stud_status','appear');
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
    /*-------------------------------------------------------------------------------------------------------
        Author : Bismilla Sanade                           Date : 26/03/2020
        Description : select table records count with two where condition.
    -------------------------------------------------------------------------------------------------------*/

    public function getAppearStudCount($tblname,$where,$condition)
    {
      
        $this->db->where($where,$condition);
        $this->db->where('stud_status','appear');
        $query = $this->db->get($tblname);

        if($query->num_rows() > 0)
        {
            return $query->num_rows;
          
        }
        else
        {
            return false;
        }       
    }
    

}