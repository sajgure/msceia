<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_batch_change_api extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 22/11/2021
    -------------------------------------------------------------
    */
    public function _set_change_batch($details=false)
    {
        $details = $this->decryptArray($details);
        if($details)
        {
            $change_batch = $details['current_batch_id'];
            $current_batch_id=$details['batch_id'];
            $data = $this->common_model->selectMultiDataFor('tbl_student','batch_id','exam_status',$details['batch_id'],'Pending');
            $id_count=count($data);
            foreach($data as $key)
            {
                $stud=$key->student_id;  
                $batch_data=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$change_batch);
                $prefix = $batch_data->seat_no_prefix;
                $new_batch_id=$batch_data->batch_id;
                $last_student_data=$this->common_model->selectDetailsWhr('tbl_last_student_id','batch_id',$change_batch);
                if(isset($last_student_data) && !empty($last_student_data))
                {
                    $id= $last_student_data->last_id;
                    $newid= $id+1; 
                    $details1=array('last_id'=>$newid); 
                    $this->standard_model->updateRecord('tbl_last_student_id','batch_id',$change_batch,$details1); 
                }
                else
                {
                    $last_id=1;
                    $newid=1;
                    $last_id_data = array('last_id' =>$last_id ,'batch_id'=>$change_batch);
                    $this->standard_model->single_insert('tbl_last_student_id',$last_id_data);
                }
                $student_password=rand('10000','99999');   
                $exam_password=rand('10000','99999');
                $details2 = array(
                                'batch_id'=>$change_batch,
                                'seat_no'=>$prefix.''.$newid,
                                'student_password'=>$student_password,
                                'exam_password'=>$exam_password
                            );  
                $this->standard_model->updateRecord('tbl_student','student_id',$stud,$details2);
            }
            return array(
                'msg'=>'Student Batch Changed Successfully!',
                'state'=>true,
                'details'=>$details2
            );
        }
        else
        {
            return array(
                'state'=>False,
                'msg'=>'Failed To Change Batch!',
                'details'=>false
            );
        }
    }
}