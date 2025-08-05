<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student_api extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('standard/standard_model');
        $this->load->module('batch/batch_api');
        $this->load->library('excel');
    }
    /*
    -------------------------------------------------------------
    Author  : Bismilla Sanade       Date: 26/03/2020
    -------------------------------------------------------------
    */
    public function _reset_mac_id($details=false)
    {
        $id=$details['id'];
        $records= array('mac_id'=>NULL);
        $result = $this->standard_model->updateRecord('tbl_student','student_id',$id,$records);
        if($result)
        { 
            return array(
                'state'=>true,
                'msg'=>'mac_id reset!',
                'details'=>$records
            );
        }
        else
        {
            return array(
                'state'=>false,
                'msg'=>'mac_id failed to Reset!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function _get_student($details=false)
    {
        $details = $this->decryptArray($details);
        $id=$details['student_id'];
        $result = $this->standard_model->selectAllWhr('tbl_student','student_id',$id);
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
    Author  : Nikhil Swami              Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function _set_student($details=false)
    {
        $validation_error='';
        // $details = $this->decryptArray($details);
        if($this->validation_student($details))
        {         
            if($details)
            {
                if(isset($details['student_id']) && !empty($details['student_id']))
                {
                    $flag=1;
                }
                else
                {
                    $flag=0;
                }
                $user_id=$this->session->userdata('user_id');
               
                if(isset($details['date_of_birth']) && !empty($details['date_of_birth']))
                {
                    $date_of_birth=date('Y-m-d',strtotime($details['date_of_birth']));
                }
                if(isset($details['date_of_admission']) && !empty($details['date_of_admission']))
                {
                    $date_of_admission=date('Y-m-d',strtotime($details['date_of_admission']));
                }
                $error_msg=isset($this->standard_model->error)?$this->standard_model->error:"";
                if($flag==0)
                {
                    $cnt = count($details['course_master_id']);
                    for ($i=0; $i <$cnt ; $i++)
                    { 
                        $student = array(
                        'student_id'=>isset($details['student_id'])?$details['student_id']:'',
                        'institute_id'=>$details['institute_id'],
                        'batch_id'=>$details['batch_id'],
                        'district_id'=>$details['district_id'],
                        'surname'=>$details['surname'],
                        'first_name'=>$details['first_name'],
                        'father_name'=>$details['father_name'],
                        'mother_name'=>$details['mother_name'],
                        'gender'=>$details['gender'],
                        'handicapped'=>$details['handicapped'],
                        'mobile_no'=>$details['mobile_no'],
                        'telephone_no'=>$details['telephone_no'],
                        'email'=>$details['email'],
                        'permenant_address'=>$details['permenant_address'],
                        'residential_address'=>$details['residential_address'],
                        'school_college_name'=>$details['school_college_name'],
                        'qualification'=>$details['qualification'],
                        'photo_identity'=>isset($details['photo_identity'])?$details['photo_identity']:'',
                        'aadhar_card_no'=>isset($details['aadhar_card_no'])?$details['aadhar_card_no']:'',
                        'payment_type'=>$details['payment_type'],
                        'date_of_birth'=>$date_of_birth,
                        'date_of_admission'=>$date_of_admission,
                        'photo_sign'=>$details['photo_sign'],
                        'student_status'=>$details['student_status'],
                        'modified_by'=>1
                        );
                        $student['course_master_id']=$details['course_master_id'][$i];
                        $student['inserted_by']=1;
                        $student['inserted_on']=date('Y-m-d');
                        $latest_batch_data=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$details['batch_id']);
                        $prefix = $latest_batch_data->seat_no_prefix;
                        $stud=$latest_batch_data->batch_id;
                        $student['batch_id']=$latest_batch_data->batch_id;
                        $data = $this->common_model->selectDetailsWhr('tbl_last_student_id','batch_id',$stud);
                        if($data)
                        {
                            $id= $data->last_id;
                            $newid= $id+1;
                            $student['seat_no'] = $prefix.''.$newid; 
                            $details2=array('last_id'=>$newid); 
                            $this->standard_model->updateRecord('tbl_last_student_id','batch_id',$stud,$details2); 
                        }
                        else
                        {
                            $last_id=1;
                            $newid=1;
                            $last_id_data = array('last_id' =>$last_id ,'batch_id'=>$stud);
                            $student['seat_no'] = $prefix.''.$newid;
                            $this->standard_model->single_insert('tbl_last_student_id',$last_id_data);
                        }               
                        $student_password=rand('10000','99999');   
                        $student['student_password']=$student_password;
                        $exam_password=rand('10000','99999');
                        $student['exam_password']=$exam_password;
                        $student_id = $this->standard_model->single_insert('tbl_student',$student);
                        //$single_student_data = $this->common_model->selectDetailsWhr('view_student','student_id',$student_id);
                        //$mob_msg='Hi '.$single_student_data->stud_full_name.'! Congratulations! You successfully completed registration for '.$single_student_data->c_name.'. thanks, Regards msceia.in'; 
                        //sendSms($single_student_data->mobile_no,$mob_msg);
                    } 
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                      return array(
                            'state'=>false,
                            'msg'=>'Unable to Add Student!',
                            'details'=>$error_msg
                        ); 
                    }
                    else
                    {
                        $student['student_id']=$student_id;
                        $student= $this->encryptArray($student);
                        return array(
                            'msg'=>'Student Data Saved Successfully!',
                            'state'=>true,
                            'details'=>$student
                        );
                    }
                }
                else
                {    
                    $student = array(
                        'student_id'=>isset($details['student_id'])?$details['student_id']:'',
                        'institute_id'=>$details['institute_id'],
                        'batch_id'=>$details['batch_id'],
                        'district_id'=>$details['district_id'],
                        'surname'=>$details['surname'],
                        'first_name'=>$details['first_name'],
                        'father_name'=>$details['father_name'],
                        'mother_name'=>$details['mother_name'],
                        'gender'=>$details['gender'],
                        'handicapped'=>$details['handicapped'],
                        'mobile_no'=>$details['mobile_no'],
                        'telephone_no'=>$details['telephone_no'],
                        'email'=>$details['email'],
                        'permenant_address'=>$details['permenant_address'],
                        'residential_address'=>$details['residential_address'],
                        'school_college_name'=>$details['school_college_name'],
                        'qualification'=>$details['qualification'],
                        'photo_identity'=>isset($details['photo_identity'])?$details['photo_identity']:'',
                        'aadhar_card_no'=>isset($details['aadhar_card_no'])?$details['aadhar_card_no']:'',
                        'payment_type'=>$details['payment_type'],
                        'date_of_birth'=>$date_of_birth,
                        'date_of_admission'=>$date_of_admission,
                        'photo_sign'=>$details['photo_sign'],
                        'student_status'=>$details['student_status'],
                        'modified_by'=>1,
                        'course_master_id'=>$details['course_master_id'],
                    );
                    $student['modified_on']=date('Y-m-d');
                    $details = $this->decryptArray($details);
                    $id=$details['student_id'];                                            
                    $student_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$id);
                    $course_master_id=$student_data->course_master_id;
                    $c_batch_id=$student_data->batch_id;
                    if( $details['batch_id'] != $c_batch_id)
                    {
                        $latest_batch_data=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$details['batch_id']);
                        $prefix = $latest_batch_data->seat_no_prefix;
                        $stud=$latest_batch_data->batch_id;
                        $student['batch_id']=$latest_batch_data->batch_id;
                        $data = $this->common_model->selectDetailsWhr('tbl_last_student_id','batch_id',$stud);
                        if($data)
                        {
                            $id= $data->last_id;
                            $newid= $id+1;
                            $student['seat_no'] = $prefix.''.$newid; 
                            $details2=array('last_id'=>$newid); 
                            $this->standard_model->updateRecord('tbl_last_student_id','batch_id',$stud,$details2); 
                        }
                        else
                        {
                            $last_id=1;
                            $newid=1;
                            $last_id_data = array('last_id' =>$last_id ,'batch_id'=>$stud);
                            $student['seat_no'] = $prefix.''.$newid;
                            $this->standard_model->single_insert('tbl_last_student_id',$last_id_data);
                        }   
                    }            
                    // $student_password=rand('10000','99999');   
                    // $student['student_password']=$student_password;
                    // $exam_password=rand('10000','99999');
                    // $student['exam_password']=$exam_password;
                    $details = $this->decryptArray($details);
                    $student_id = $this->standard_model->single_insert('tbl_student',$student);
                    //$single_student_data = $this->common_model->selectDetailsWhr('view_student','student_id',$id);
                    //$mob_msg='Hi '.$single_student_data->stud_full_name.'! Congratulations! You successfully completed registration for '.$single_student_data->c_name.'. thanks, Regards msceia.in'; 
                    //sendSms($single_student_data->mobile_no,$mob_msg);
                    if($error_msg && !empty($error_msg) )
                    {                                                       
                        return array(
                            'state'=>false,
                            'msg'=>'No Change Made!',
                            'details'=>$error_msg
                        );
                    }
                    else
                    {
                        $student['student_id']=$student_id;
                        $student= $this->encryptArray($student);                
                        return array(
                            'state'=>true,
                            'msg'=>'Student Data Updated Successfully!',
                            'details'=>$student
                        );
                    }
                }  
            }
            else
            {
                return array(
                    'msg'=>'student records Failed to Saved!',
                    'state'=>False, 
                    'details'=>false
                );
            }
        }
        else
        {
            $validation_error = validation_errors();
            return array(
                'msg'=>$validation_error,
                'state'=>False,
                'details'=>'Validation is failed'
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function _hide_student($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['student_id']))
        {
            $id=$details['student_id'];
            $records= array('in_use'=>'N');
            $result = $this->standard_model->updateRecord('tbl_student','student_id',$id,$records);
            if($result)
            { 
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Student records Hidden!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to hide Student records';
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
                'msg'=>'student_id Required!',
                'details'=>false
            );
        }      
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function _restore_student($details=false)
    {
        $details = $this->decryptArray($details);
        if(isset($details['student_id']))
        {
            $id=$details['student_id'];
            $records= array('in_use'=>'Y');
            $result = $this->standard_model->updateRecord('tbl_student','student_id',$id,$records);
            if($result)
            {
                $result = $this->encryptArray($details);
                return array(
                    'state'=>true,
                    'msg'=>'Student records Restore!',
                    'details'=>$result
                );
            }
            else
            {
                $message = isset($this->standard_model->error )?$this->standard_model->error['message']:'Unable to Student records';
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
                'msg'=>'student_id Required!',
                'details'=>false
            );
        }      
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function _permanent_delete_student($details=false)
    {
        $id=$details['student_id'];
        $records=array('in_use'=>'N','display'=>'N');
        $result=$this->standard_model->updateRecord('tbl_student','student_id',$id,$records);
        if($result)
        {
            return array(
                'state'=>true,
                'msg'=>'Student Deleted!',
                'details'=>$result    
            );
        }
        else
        {
            return array(
                'state'=>false,
                'msg'=>'Student records Failed to delete!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Mrudul Thite        Date: 06/04/2020
    Modified  : Mohammad Shafi      Date: 10-03-2021
    -------------------------------------------------------------
    */
    public function _smsSend($details=false)
    {
        $result = $this->standard_model->fetch_student_birthdate($details);
        if(isset($result) && !empty($result))
        {
            foreach ($result as $key)
            {
                if(isset($key->mobile_no) && !empty($key->mobile_no))
                {
                    $mobile_no=$key->mobile_no;
                    $message = 'Happy Birthday from MSCEIA - '.$key->first_name ;
                    sendSms($mobile_no,$message);
                    $data= array('wish_status'=>'Sent');
                    $data1=$this->standard_model->updateRecord('tbl_student','student_id',$key->student_id,$data);
                }     
            }
            return array(
                'state'=>true,
                'msg'=>'Wishes Sent Successfully',
                'details'=>'Wishes Send Successfully'
            );    
        }
        else
        {
            return array(
                'state'=>false,
                'msg'=>'Records not found!',
                'details'=>false
            );
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Nikhil Swami        Date: 29/02/2020
    -------------------------------------------------------------
    */
    public function validation_student($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
            'surname'=>isset($details['surname']) ? $details['surname'] :'',
            'first_name'=>isset($details['first_name']) ? $details['first_name'] :'',
            'father_name'=>isset($details['father_name']) ? $details['father_name'] :'',
            'mother_name'=>isset($details['mother_name']) ? $details['mother_name'] :'',
            'permenant_address'=>isset($details['permenant_address']) ? $details['permenant_address'] :'',
            'residential_address'=>isset($details['residential_address']) ? $details['residential_address'] :'',
            'mobile_no'=>isset($details['mobile_no']) ? $details['mobile_no'] :'',
            'email'=>isset($details['email']) ? $details['email'] :'',
            'district_id'=>isset($details['district_id']) ? $details['district_id'] :'',
            'date_of_birth'=>isset($details['date_of_birth']) ? $details['date_of_birth'] :'',
            'aadhar_card_no'=>isset($details['aadhar_card_no']) ? $details['aadhar_card_no'] :'',
            )
        );
        $this->form_validation->set_rules('surname','surname',
        array('required','min_length[1]','max_length[50]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,50})$/]'),
        array(
            'required'=>'surname is Required',
            'min_length'=>'surname at Least 1 Number',
            'max_length'=>'surname should not have more than 50 Number',
            'regex_match'=>'surname should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
            )
        );
        $this->form_validation->set_rules('first_name','first name',
        array('required','min_length[1]','max_length[50]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,50})$/]'),
        array(
            'required'=>'first name is Required',
            'min_length'=>'first name at Least 1 Number',
            'max_length'=>'first name should not have more than 50 Number',
            'regex_match'=>'first name should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
            )
        );
        $this->form_validation->set_rules('father_name','father name',
        array(/*'required',*/'min_length[1]','max_length[50]'/*,'regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,50})$/]'*/),
        array(
            'required'=>'father name is Required',
            'min_length'=>'father name at Least 10 Number',
            'max_length'=>'father name should not have more than 500 Number',
            'regex_match'=>'father name should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
            )
        );
        $this->form_validation->set_rules('mother_name','mother name',
        array('required','min_length[1]','max_length[50]','regex_match[/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,50})$/]'),
        array(
            'required'=>'mother name is Required',
            'min_length'=>'mother name at Least 1 Number',
            'max_length'=>'mother name should not have more than 50 Number',
            'regex_match'=>'mother name should have alphnumeric and special character &,/,_,:,[],{} and space are allowed'
            )
        );
        $this->form_validation->set_rules('permenant_address','permenant address',
        array( 'required','max_length[200]'),
        array(
            'required'=>'permenant address is Required',
            'max_length'=>'Everything (alphabets/ numbers / special char) should be allowed.'
            )
        );
        $this->form_validation->set_rules('residential_address','residential address',
        array('required','max_length[200]'),
        array(
            'required'=>'residential_address is Required',
            'max_length'=>'Everything (alphabets/ numbers / special char) should be allowed.'
            )
        );
        $this->form_validation->set_rules('district_id','district_id',
        array( 'required','max_length[20]'),
        array(
            'required'=>'district is Required',
            'max_length'=>'Everything (alphabets/ numbers / special char) should be allowed.'
            )
        );
        $this->form_validation->set_rules('mobile_no','mobile_no',
        array('required','regex_match[/^[4-9][\d]{9}$/]'),
        array(
            'required'=>'mobile_no is Required',
            'regex_match'=>'Only numbers are allowed in Mobile Number.'
            )
        );
        $this->form_validation->set_rules('email','email',
        array('required','min_length[2]','max_length[45]','regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/]'),
        array(
            'required'=>'email is Required',
            'min_length'=>'email should have at Least2 Number',
            'max_length'=>'email should not have more than 45 Number',
            'regex_match'=>' Only alphanumeric chars and special char _ - . are allowed. '
            )
        );
        //$this->form_validation->set_rules('aadhar_card_no','aadhar_card_no',
        //array('required'),
        //array(
            //'required'=>'aadhar_card_no is Required',
            // 'regex_match'=>'Only numbers are allowed.'
          //)
        //);
        $this->form_validation->set_rules('date_of_birth','date_of_birth',
        array('required'),
        array(
            'required'=>'date_of_birth is Required',
            )
        );
        if($this->form_validation->run()==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /*
    -------------------------------------------------------------
    Author  : Apurva Bandelwar              Date: 26/03/2021
    -------------------------------------------------------------
    */
    public function _upload_file($details=false)
    {
        if($this->validation_student_excel($details))
        {  
            if (defined('APPPATH')) 
            {  
                $details['student_excel_file']=str_replace(' ', '',$details['student_excel_file']);
                $inputFileName ='uploads/stud_reg_excel/'.$details['student_excel_file'];
                if(file_exists($inputFileName))
                {
                    $institute_id=$this->session->userdata('institute_id');
                    $student_data=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$institute_id);
                    $institute_id=$student_data->institute_id;
                    $object = PHPExcel_IOFactory::load($inputFileName);
                    $Errosdata=array();
                    foreach($object->getWorksheetIterator() as $worksheet)
                    {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                        for($row=5; $row<$highestRow+1; $row++)
                        {
                            $student=array();
                            $surname= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $first_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $father_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $mother_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $gender = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $handicapped = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $telephone_no = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $mobile_no = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $email = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $permenant_address = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $residential_address = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $district = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $school_college_name = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $qualification = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $payment_type = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $aadhar_card_no = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                            $date_of_birth = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                            $date_of_admission = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                            $exam_course = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                            $course_data=$this->common_model->selectDetailsWhr('tbl_course_master','course_name',$exam_course);
                            $course_id = (isset($course_data->course_master_id) && !empty($course_data->course_master_id))?$course_data->course_master_id:''; 
                            $district_data=$this->common_model->selectDetailsWhr('tbl_district','district_name',$district);
                            if((isset($district_data) && !empty($district_data)))
                            {
                                $district_id = (isset($district_data->district_id) && !empty($district_data->district_id))?$district_data->district_id:'';
                            }
                            else
                            {
                                $inst_data=$this->common_model->selectDetailsWhr('tbl_institute','institute_id',$institute_id);
                                $district_id = (isset($inst_data->district_id) && !empty($inst_data->district_id))?$inst_data->district_id:''; 
                            }
                            $student = array(
                                'institute_id'=>$institute_id,
                                'course_master_id' => $course_id,
                                'district_id' => $district_id, 
                                'surname' => $surname,
                                'first_name' => $first_name,  
                                'father_name' => $father_name,
                                'mother_name' => $mother_name,
                                'gender' => $gender,
                                'handicapped' => $handicapped,
                                'telephone_no' => $telephone_no,
                                'mobile_no' => $mobile_no,
                                'email'  => $email,
                                'permenant_address' => $permenant_address,
                                'residential_address' => $residential_address,
                                'school_college_name' => $school_college_name,
                                'qualification' => $qualification,
                                'payment_type' => $payment_type,
                                'photo_identity'=>'Aadhar Card',
                                'aadhar_card_no' => $aadhar_card_no,
                                'date_of_birth' => date('Y-m-d',strtotime($date_of_birth)),
                                'date_of_admission' => date('Y-m-d',strtotime($date_of_admission)),
                                'inserted_on'=>date('Y-m-d H:i:s'),
                                'modified_on'=>date('Y-m-d H:i:s'),
                                'inserted_by'=>$institute_id,  
                                'modified_by'=>$institute_id, 
                                'in_use' =>'Y',
                                'display' =>'Y',
                            ); 
                            if($gender == 'male' || $gender == 'female')
                            {
                                $student['gender'] = (isset($gender) && !empty($gender))?$gender:'';
                            }
                            else
                            {
                                $gender1 = 'male'; 
                                $student['gender'] = $gender1;
                            }
                            if($handicapped == 'yes' || $handicapped == 'no')
                            {
                                $student['handicapped'] = (isset($handicapped) && !empty($handicapped))?$handicapped:'';
                            }
                            else
                            {
                                $handicapped1 = 'no'; 
                                $student['handicapped'] = $handicapped1;
                            }
                            $current_batch_data=$this->custom_model->get_current_batch();
                            $batch_id=$current_batch_data->batch_id;
                            $latest_batch_data=$this->common_model->selectDetailsWhr('tbl_batch','batch_id',$batch_id);
                            $stud=$latest_batch_data->batch_id;
                            // echo $this->db->last_query(); die; 
                            $prefix = $latest_batch_data->seat_no_prefix;
                            
                            $student['batch_id']=$latest_batch_data->batch_id;
                            $data = $this->common_model->selectDetailsWhr('tbl_last_student_id','batch_id',$stud);
                            if($data)
                            {
                                $id= $data->last_id;
                                $newid= $id+1;
                                $student['seat_no'] = $prefix.''.$newid; 
                                $details2=array('last_id'=>$newid); 
                                $this->standard_model->updateRecord('tbl_last_student_id','batch_id',$stud,$details2); 
                            }
                            else
                            {
                                $last_id=1;
                                $newid=1;
                                $last_id_data = array('last_id' =>$last_id ,'batch_id'=>$stud);
                                $student['seat_no'] = $prefix.''.$newid;
                                $this->standard_model->single_insert('tbl_last_student_id',$last_id_data);
                            }                
                            $student_password=rand('10000','99999');   
                            $student['student_password']=$student_password;
                            $exam_password=rand('10000','99999');
                            $student['exam_password']=$exam_password;
                            $student['student_status']='not_appear';
                            $student['exam_status']='Pending';
                            $student['inserted_by']=1;
                            $student['inserted_on']=date('Y-m-d');
                           
                            $student_id = $this->standard_model->single_insert('tbl_student',$student);
                        }
                        // echo 'uploads/stud_reg_excel/'.$details['student_excel_file']; die;
                        unlink('uploads/stud_reg_excel/'.$details['student_excel_file']);
                        return array(
                            'msg'=>'Student Data Imported Successfully!',
                            'state'=>true  
                        );
                    }
                }
                else
                {
                    return array(
                        'msg'=>'File Not Found',
                        'state'=>FALSE,
                        'details'=>FALSE
                    );
                }
            }
        }
        else
        {
            $validation_error = validation_errors();
            return array(
                'state'=>False,
                'msg'=>$validation_error,
                'details'=>'Validation is failed'
            );
        }
    }
    public function validation_student_excel($details)
    {
        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_data(
        array(
            'student_excel_file'=>isset($details['student_excel_file']) ? $details['student_excel_file'] :''
        ));
        $this->form_validation->set_rules('student_excel_file','student_excel_file',
        array('required'),
            array(
                'required'=>'Student Excel File is Required',
            )
        );
        if($this->form_validation->run()==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}