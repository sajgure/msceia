<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Batch_api extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('standard/standard_model');
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 03/03/2020
    -------------------------------------------------------------
    */
    public function _get_batch($details=false)
    {
        $details = $this->decryptArray($details);
        //$id=$details['batch_id'];
        //$result = $this->standard_model->selectAllWhr('tbl_batch','batch_id',$id);
        if(isset($details['batch_id']))
        {
            $id=$details['batch_id']; 
            $result = $this->standard_model->selectAllWhr('tbl_batch','batch_id',$id);
        }
        elseif (isset($details['all'])) {
            $result= $this->standard_model->selectAll('tbl_batch');
        }
        else
        {
            $result= $this->standard_model->selectAll('tbl_batch','in_use','Y');
        }

        if($result)
        {
            return array(
                  'msg'=>'Succesfully Fetch Record!',
                  'state'=>true,
                  'details'=>$result
            );
            $result= $this->encryptArray($result);
        }
        else
        {
            return array(
                'msg'=>'Unable Fetch Record!',
                'state'=>false,
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami              Date: 03/03/2020
    -------------------------------------------------------------
    */
    public function _set_batch($details=false)
    {
        $user_id= $this->session->userdata('user_id');

        $details = $this->decryptArray($details);
        if(isset($details['batch_id']) && !empty($details['batch_id']))
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        if($details)
        {
            $user_id= $this->session->userdata('user_id');
            $batch = array(
                'batch_name'=>$details['batch_name'],
                'batch_description'=>$details['batch_description'],
                'seat_no_prefix'=>$details['seat_no_prefix'],
                'modified_by'=>$user_id,
                'start_date' =>NULL,
                'end_date' =>NULL,
                'exam_time' =>$details['exam_time'],
                'batch_id'=>isset($details['batch_id'])?$details['batch_id']:NULL
            );
            if(isset($details['start_date']) && !empty($details['start_date']))
            {
                $start_date= date_create_from_format("d-m-Y",$details['start_date']);
                if(is_bool($start_date))
                {
                    return array(
                        'state'=>false,
                        'msg'=>'Invalid Start Date! Start Date should be in "dd-mm-YYYY" format',
                        'details'=>false
                    );
                }
                else
                {
                    $batch['start_date']=date_format($start_date,"Y-m-d");
                }
            }
            else
            {
                $batch['start_date']=NULL;
            }
            if(isset($details['end_date']) && !empty($details['end_date']))
            {
                $date= date_create_from_format("d-m-Y",$details['end_date']);
                if(is_bool($date))
                {
                    return array(
                        'state'=>false,
                        'msg'=>'Invalid End Date! End Date should be in "dd-mm-YYYY" format',
                        'details'=>false
                    );
                }
                else
                {
                    $batch['end_date']=date_format($date,"Y-m-d");
                }
            }
            else
            {
                $batch['end_date']=NULL;
            }
            if(isset($date)<isset($start_date))
            {
                return array(
                    'state'=>false,
                    'msg'=>'End Date can not be smaller than Start Date!',
                    'details'=>false
                );
            }
            if(!isset($details['batch_id']) && empty($details['batch_id']))
            {
                $batch['inserted_by']=$user_id;
                $batch['inserted_on']=date('Y-m-d H:i:s');
            }
            $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
            if($flag==0)
            {
                $batch['inserted_by']=$user_id;
                $batch['inserted_on']=date('Y-m-d H:i:s');
                $batch['display']='Y';
                $batch['in_use']='Y';
                $batch_id= $this->standard_model->single_insert('tbl_batch',$batch);
                //Add old student count data in new table if new batch is inserted 
                
                if($error_msg && !empty($error_msg) )
                {                                                       
                    return array(
                        'state'=>false,
                        'msg'=>'Unable To Add Batch!',
                        'details'=>$error_msg
                    );
                }
                else
                {
                    $batch['batch_id']=$batch_id;
                    $batch= $this->encryptArray($batch);
                    return array(
                        'state'=>true,
                        'msg'=>'Batch Added Successfully!',
                        'details'=>$batch
                    );
                }
            }
            else
            {                                                   
                $batch_id= $this->standard_model->single_insert('tbl_batch',$batch);
                if($error_msg && !empty($error_msg) )
                {                                                       
                    return array(
                        'state'=>false,
                        'msg'=>'Unable to Update Batch!',
                        'details'=>$error_msg
                    );
                }
                else
                {
                    $batch['batch_id']=$batch_id;
                    $batch= $this->encryptArray($batch);                
                    return array(
                        'state'=>true,
                        'msg'=>'Batch Updated Successfully!',
                        'details'=>$batch
                    );
                }
            }   
        }
        else
        {
            return array(
                'state'=>False,
                'msg'=>'Batch Failed To Saved!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 03/03/2020
    -------------------------------------------------------------
    */
    public function _hide_batch($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['batch_id']))
        {
            $id=$details['batch_id'];
            $records= array('in_use'=>'N');
            $result = $this->standard_model->updateRecord('tbl_batch','batch_id',$id,$records);
            if($result)
            { 
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Hide Succesfully!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide batch';
                return array(
                    'state'=>false,
                    'msg'=>$message,
                    'details'=>false
                );
            }
        } 
        else
        {
            return array(
                'state'=>false,
                'msg'=>'batch_id Required!',
                'details'=>false
            );
        }      
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 03/03/2020
    -------------------------------------------------------------
    */
    public function _restore_batch($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['batch_id']))
        {
            $id=$details['batch_id'];
            $records= array('in_use'=>'Y');
            $result = $this->standard_model->updateRecord('tbl_batch','batch_id',$id,$records);
            if($result)
            {
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Record Restore Succesfully!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to restore batch';
                return array(
                    'state'=>false,
                    'msg'=>$message,
                    'details'=>false
                ); 
            }
        } 
        else
        {
            return array(
                'state'=>false,
                'msg'=>'batch_id Required!',
                'details'=>false
            );
        }      
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 03/03/2020
    -------------------------------------------------------------
    */
    public function _permanent_delete_batch($details=false)
    {
        $details = $this->decryptArray($details);
        $id=$details['batch_id'];
        $records=array('display'=>'N');
        $result=$this->standard_model->updateRecord('tbl_batch','batch_id',$id,$records);
        if($result) 
        {
            return array(
                'state'=>true,
                'msg'=>'Record Delete Succesfully!',
                'details'=>$result    
            );
        }
        else
        {
            return array(
                'state'=>false,
                'msg'=>'batch Failed to delete!',
                'details'=>false
            );
        }
    }
}