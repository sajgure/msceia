<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_web extends Base_Controller {

	/*
	-------------------------------------------------------------
	Author 	: Mohammad Shafi				Date: 27 mar 20
	-------------------------------------------------------------
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('institute_model');
        $this->load->library('excel/excel');
        $this->load->model('standard/standard_model');
    }
    public function institute_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('institute-list',$data);
    }
    public function active_download_link()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['active_link_count']=$this->institute_model->active_link_count();
        $data['allBatches']=$this->common_model->fetchDataDESC('tbl_batch','batch_id');
		$data['currentBatchInfo']=$this->common_model->alljoin2tbl('tbl_current_batch','tbl_batch','batch_id');
    	$this->load->view('active_download_link',$data);
    }
    public function adjust_fees()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['keydata'] = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1);
        $data['institute_data']=$this->common_model->fetchDataAsc('tbl_institute','institute_id');    
        $data['fee_exemption_data']=$this->common_model->fetchDataASC_In_use('tbl_fees_exemption','fees_exemption_id');
        $this->load->view('adjust_fees',$data);
    }
    public function upload_fees_image()
    {
        if($_FILES['file']['name'] != '')
        {
            $test =explode(".", $_FILES['file']['name']);
            $extension = end($test);
            $name = rand(100000, 999999) . '.' . $extension;
            $location = './uploads/fees_photo/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $img_path = base_url().'uploads/fees_photo/'.$name;
            $img =  '<img src="'.$img_path.'" style="height: 150px; width: 200px;" class="img-thumbnail"/>';
            echo $img;
        }
    }
    public function institute_birthday()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('institute_birthday',$data);
    }
    public function institute_details($id)
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $data['single_instutute']= $this->common_model->singlejoin2tbl('tbl_institute','tbl_district','district_id','institute_id',$id);
        $this->load->view('institute_details',$data);
    }
    public function institute_excel()
    {
        $instCountData=$this->institute_model->instituteExcel();
        $this->excel->institute_excel($instCountData);
    }
    public function all_details_institute_excel()
    {
        $institute_details=$this->common_model->fetchDataAsc('view_institute','institute_id');
        $this->excel->all_details_institute_excel($institute_details);
    }
    public function reset_stud_list($institute_id)
    {
        $this->session->set_userdata(array(
            'inst_id'  => $institute_id
        
        ));
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $latest_batch_data=$this->custom_model->get_current_batch();
        $batch_id = $latest_batch_data->batch_id;
        $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_id',$batch_id); 
        $data['student_data']=$this->common_model->selectMultiDataFor('view_student','institute_id','batch_id',$institute_id,$batch_id);
        $data['student_data']=$this->institute_model->get_student_desending('view_student','institute_id','batch_id',$institute_id,$batch_id,'student_id');
        $p_cnt=0;
        if(isset($data['student_data']) && !empty($data['student_data']))
        {
            foreach ($data['student_data'] as $key) {
                if($key->student_status=='appear')
                {
                    $p_cnt = $p_cnt+1;
                }
            }
        } 
        $data['p_cnt'] = $p_cnt;
        $data['inst_data']=$this->common_model->selectDetailsWhr('view_institute','institute_id',$institute_id);
        $data['stud_data']=$this->institute_model->student_tableabc($institute_id); 
        $this->load->view('reset-student-list',$data);
    }
    public function institute_record_list()
    {
        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $this->load->view('institute-record-list',$data);
    }

    public function edit_stud_payment()
    {
        $id=$this->input->post('checkbox');
        $pid=$this->input->post('checkboxs');
        $uid=$this->input->post('checkboxu');
        $inst_id = $this->session->userdata('inst_id');
        if(is_array($uid) && is_array($pid)) 
        {
          $result = array_diff($uid, $pid);
          if(is_array($result) && !empty($result))
            {
                
                    foreach($result as $key)
                    {
                        $data[]=array('student_id'=>$key,'student_status'=>'not_appear');
                        $result=$this->common_model->update_batch('tbl_student',$data,'student_id');
                    }        
                    
               
                $this->json->jsonReturn(array(
                    'state'=>true,
                    'msg'=>'Student Status Changed!',
                    'redirect'=>'institute-list'
                ));
            } 
            else
            {
                $inst_id = $this->session->userdata('inst_id');
                $this->json->jsonReturn(array(
                        'state'=>false,
                        'msg'=>'Please Select Record!',
                        'redirect'=>'reset-stud-list/'.$inst_id
                ));
            }
        }
        if(isset($id) && !empty($id))
        {
            $id_count=count($id);
            for($i=0;$i<$id_count;$i++)
            {
                $data[]=array('student_id'=>$id[$i],'student_status'=>'payment');
                $result=$this->common_model->update_batch('tbl_student',$data,'student_id');
            }
            $this->json->jsonReturn(array(
                'state'=>true,
                'msg'=>'Student Status Changed!',
                'redirect'=>'institute-list'
            ));
        }
    }

    public function get_selected_bacth_data(){
        
        $batch_id = $this->input->post('batch_id');
        $data['url']='active_download_link_table/'.$batch_id;    
		$this->load->view('active-download-linktbl-view',$data);
    } 

    public function institute_excel_report($batch_id)
    {
       
        $info=$this->institute_model->get_all_institute_by_batch_id($batch_id);
        $this->excel->batch_wise_institute_report($info);
    }

     public function institute_csv_report($batch_id)
    {
       $filename = 'institute_'.date('Ymd').'.csv'; 
       header("Content-Description: File Transfer"); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/csv; ");
      
       $info=$this->institute_model->get_all_institute_by_csv_report_batch_id($batch_id);
        // file creation 
        $file = fopen('php://output', 'w');
        $header = array("Institute Name","Institute Code","Institute Password","Institute Address",'district_name','institute_taluka','institute_pincode','institute_contact','institute_alternate_contact','institute_mail','institute_owner_name','institute_owner_dob','institute_principal_name','institute_owner_qualification','institute_principal_qualification','institute_registration_date','institute_status','owner_age','principal_age','nominee_name','nominee_age','relation','installation_count','courier_no','sms_status','birthday_status','stud_not_appear','stud_appear','exam_status','total_student','paid_student','Pass_student','upload_student','batch_name');
        fputcsv($file,$header); 
        foreach ($info as $key=>$line){ 
           fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }

    public function reset_batch_stud_list($institute_id)
    {
        $this->session->set_userdata(array(
            'inst_id'  => $institute_id
        
        ));

        $data['logo'] = $this->config->load('app-config', TRUE)['AppLogo'];
        $data['favicon'] = $this->config->load('app-config', TRUE)['favicon'];
        $data['appname'] = $this->config->load('app-config', TRUE)['AppName'];
        $latest_batch_data=$this->custom_model->get_current_batch();
        
        $batch_id = $latest_batch_data->batch_id;
        $prevoius_batch_id = $latest_batch_data->batch_id-1;
        $batchesArray = array(
            'current_batch_id'=>$batch_id,
            'previous_batch_id'=>$prevoius_batch_id,
            'institute_id'=>$institute_id
        );
        $data['batch_fees_data']=$this->common_model->selectDetailsWhr('tbl_batch_fees','batch_id',$batch_id); 
        //$data['student_data']=$this->common_model->selectMultiDataFor('view_student','institute_id','batch_id',$institute_id,$batch_id);
        //$data['student_data']=$this->institute_model->get_student_desending('view_student','institute_id','batch_id',$institute_id,$batch_id,'student_id');
        $data['student_data']=$this->institute_model->get_all_student_by_current_and_previous_batch($batchesArray);
       
        $p_cnt=0;
        if(isset($data['student_data']) && !empty($data['student_data']))
        {
            foreach ($data['student_data'] as $key) {
                if($key->student_status=='appear')
                {
                    $p_cnt = $p_cnt+1;
                }
            }
        } 
        $data['p_cnt'] = $p_cnt; 
        $data['inst_data']=$this->common_model->selectDetailsWhr('view_institute','institute_id',$institute_id);
        $data['stud_data']=$this->institute_model->student_tableabc($institute_id);
        $data['current_batch_id'] =  $batch_id;
        $data['batchesInfo']=$this->institute_model->get_all_batches();
       
        $this->load->view('reset-batch-student-list',$data);
    }

    public function reset_batch_particular_student()
    {
       $chengeBatchId = $this->input->post('batch_id');
       $studentId = $this->input->post('student_id');
       
       $batch_data=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$chengeBatchId);      
       $prefix = $batch_data->seat_no_prefix;
       $new_batch_id=$batch_data->batch_id;
       $last_student_data=$this->common_model->selectDetailsWhr('tbl_last_student_id','batch_id',$chengeBatchId);
       if(isset($last_student_data) && !empty($last_student_data))
       {
           $id= $last_student_data->last_id;
           $newid= $id+1; 
           $details1=array('last_id'=>$newid); 
           $this->standard_model->updateRecord('tbl_last_student_id','batch_id',$chengeBatchId,$details1); 
       }
       else
       {
           $last_id=1;
           $newid=1;
           $last_id_data = array('last_id' =>$last_id ,'batch_id'=>$chengeBatchId);
           $this->standard_model->single_insert('tbl_last_student_id',$last_id_data);
       }

       $student_password=rand('10000','99999');   
       $exam_password=rand('10000','99999');
       $details2 = array(
                       'batch_id'=>$chengeBatchId,
                       'seat_no'=>$prefix.''.$newid,
                       'student_password'=>$student_password,
                       'exam_password'=>$exam_password
                   );  
       $response = $this->standard_model->updateRecord('tbl_student','student_id',$studentId,$details2);
      
       if(isset($response) && !empty($response))
       {
            $arr =  array(
                'msg'=>'Student Batch Changed Successfully!',
                'state'=>True,
                'details'=>$details2
            );
            echo json_encode($arr);
       }
       else
       {
        $arr =  array(
            'state'=>False,
            'msg'=>'Failed To Change Batch!',
            'details'=>false
        );
        echo json_encode($arr);
       }
    }
}

