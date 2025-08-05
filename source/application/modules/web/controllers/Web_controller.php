<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_controller extends Base_Controller
{
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('common_model');          
        $this->load->model('web_model');    
        date_default_timezone_set("Asia/Kolkata");   
    } 
  
    public function fetchPinCodeWiseInst()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $inst_pin_code = $data['inst_pin_code'];
        $inst_data = $this->web_model->fetchPinCodeWiseInst($inst_pin_code);
        if(isset($inst_data) && !empty($inst_data))
        {
            $json=array('status'=>1,'inst_data'=>$inst_data);
        }
        else
        {
            $json=array('status'=>0,'inst_data'=>'No Record Found');
        }
        echo json_encode($json);
    }

    // public function check_user()
    // {
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $inst_code = $data['inst_code'];
    //     $password = $data['password'];
    //     $mack = $data['mack'];
    //     $type = (isset($data['type']) && !empty($data['type']))?$data['type']:'demo';

    //     $result = $this->web_model->get_inst_data($inst_code,$password);
    //     if(isset($result) && !empty($result))
    //     {
    //         $user_id=$result->inst_id;
    //         if($type=='exam')
    //         {
    //             $stud_data = $this->web_model->fetch_student($user_id);
    //             $data1 = array('db_status'=>'exam install');
    //             $this->common_model->updateDetails('tbl_institute','institute_id',$user_id,$data1);
    //             $json=array(
    //                 'status'=>1,
    //                 'stud_data'=>$stud_data,
    //                 'inst_data'=>$result,
    //                 'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
    //             );
    //         }
    //         else
    //         {
    //             if($result->db_status=='download')
    //             { 
    //                 if(isset($result->exam_mac_id) && !empty($result->exam_mac_id))
    //                 { 
    //                     $mac = explode(',', $result->exam_mac_id);
    //                     if(in_array($mack, $mac))
    //                     {
    //                         $mack_id=$result->exam_mac_id;
    //                     }
    //                     else
    //                     {
    //                         $mack_id=$result->exam_mac_id.','.$mack;
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $mack_id=$mack;
    //                 }
    //                 $data1 = array(
    //                     'db_status'=>'install',
    //                     'exam_mac_id'=>$mack_id
    //                 );
    //                 $this->common_model->updateDetails('tbl_institute','institute_id',$user_id,$data1);
    //                 $json=array(
    //                     'status'=>1,
    //                     'inst_data'=>$result,
    //                     'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
    //                 );
    //             }
    //             else
    //             {
    //                 $mac = explode(',', $result->exam_mac_id);
    //                 if(in_array($mack, $mac))
    //                 {
    //                     $json=array(
    //                         'status' => 1,
    //                         'db_status'=>'install',
    //                         'inst_data'=>$result,
    //                         'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
    //                     );
    //                 }
    //                 else
    //                 {
    //                     $json=array(
    //                         'status' => 0,
    //                         'msg'=>'<strong>Error!</strong> This Software Running On Another Computer , Please contact to MSCEIA Team...!'
    //                     );
    //                 }
    //             }
    //         }
    //     }
    //     else
    //     {           
    //         $json=array(
    //             'status' => 0,
    //             'msg'=>'<strong>Error!</strong> You Enter Wrong Username or Password!'
    //         );
    //     }
    //     echo json_encode($json);
    // }
    public function check_user()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $inst_code = $data['inst_code'];
        $password = $data['password'];
        $mack = $data['mack'];
        $type = (isset($data['type']) && !empty($data['type']))?$data['type']:'demo';

        $result = $this->web_model->get_inst_data($inst_code,$password);
        if(isset($result) && !empty($result))
        {
            $user_id=$result->inst_id;
            if($type=='exam')
            {
                $stud_data = $this->web_model->fetch_exam_student($user_id);
                //$stud_data = $this->web_model->fetch_exam_student_temp($user_id);
                $test = $this->db->last_query();
                $data1 = array('db_status'=>'exam install');
                $this->common_model->updateDetails('tbl_institute','institute_id',$user_id,$data1);
                $json=array(
                    'status'=>1,
                    'test'=>$test,
                    'stud_data'=>$stud_data,
                    'inst_data'=>$result,
                    'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
                );
            }
            else
            {
                if($result->db_status=='download')
                { 
                    if(isset($result->exam_mac_id) && !empty($result->exam_mac_id))
                    { 
                        $mac = explode(',', $result->exam_mac_id);
                        if(in_array($mack, $mac))
                        {
                            $mack_id=$result->exam_mac_id;
                        }
                        else
                        {
                            $mack_id=$result->exam_mac_id.','.$mack;
                        }
                    }
                    else
                    {
                        $mack_id=$mack;
                    }
                    $data1 = array(
                        'db_status'=>'install',
                        'exam_mac_id'=>$mack_id
                    );
                    $this->common_model->updateDetails('tbl_institute','institute_id',$user_id,$data1);
                    $json=array(
                        'status'=>1,
                        'inst_data'=>$result,
                        'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
                    );
                }
                else
                {
                    $mac = explode(',', $result->exam_mac_id);
                    if(in_array($mack, $mac))
                    {
                        $json=array(
                            'status' => 1,
                            'db_status'=>'install',
                            'inst_data'=>$result,
                            'msg'=>'<strong>Well Done!</strong>Software installed Successfully!'
                        );
                    }
                    else
                    {
                        $json=array(
                            'status' => 0,
                            'msg'=>'<strong>Error!</strong> This Software Running On Another Computer , Please contact to MSCEIA Team...!'
                        );
                    }
                }
            }
        }
        else
        {           
            $json=array(
                'status' => 0,
                'msg'=>'<strong>Error!</strong> You Enter Wrong Username or Password!'
            );
        }
        echo json_encode($json);
    }
  
    public function get_msceia_student()
    {    
        $data = json_decode(file_get_contents('php://input'),true);
        $id= $data['id'];
        $stud_data = $this->web_model->fetch_elearn_student($id);
        $dir = './download/exam_'.$id;
        if(file_exists($dir))
        {
            $link='./download/exam_'.$id.'/stud_photos';
            array_map('unlink', glob("$link/*.*"));
            rmdir($link);
            $link='./download/exam_'.$id;
            array_map('unlink', glob("$link/*.*"));
            rmdir($link);
        }
        $link='./download/exam_'.$id;
        mkdir($link);
        $link='./download/exam_'.$id.'/stud_photos';
        mkdir($link);
        $source1='./uploads/student_photos/user.png';
        $target1=$link.'/user.png';
        copy($source1,$target1);
        foreach ($stud_data as $key) 
        {
            if(isset($key->stud_photo) && !empty($key->stud_photo))
            {
                $path1 = './uploads/student_photos/'.$key->stud_photo;
                if(file_exists($path1))
                {
                    $source='./uploads/student_photos/'.$key->stud_photo;
                    $target=$link.'/'.$key->stud_photo;
                    copy($source,$target);
                }
            }
        } 
        $rootPath = realpath($dir);
        $archive = './download/exam_'.$id.'.zip';
        $zip = new ZipArchive();
        $zip->open($archive, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY );
        foreach ($files as $dir => $file)
        {
            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        $file = file_get_contents($archive);
        $base64 = base64_encode($file);
        if(isset($stud_data) && !empty($stud_data))
        {
            $link1='./download/exam_'.$id;
            opendir($link1);
            $link2='./download/exam_'.$id.'/stud_photos';
            opendir($link2);
            $source1='./download/exam_'.$id.'/stud_photos/user.png';
            @unlink($source1);
            foreach ($stud_data as $key) 
            {
                if(isset($key->stud_photo) && !empty($key->stud_photo))
                {
                    $path1 = './uploads/student_photos/'.$key->stud_photo;
                    if(file_exists($path1))
                    {
                        $source='./uploads/student_photos/'.$key->stud_photo;
                        $target=$link.'/'.$key->stud_photo;
                        @unlink($target);
                    }
                }
            } 
            rmdir($link2);
            rmdir($link1);
            @unlink('./download/exam_'.$id.'.zip');
            $json = array(
                "status" => 1,
                "stud_data" => $stud_data,
                "base64"=>$base64
            );
        }
        else
        {
            $json = array("status" => 0);
        }
        echo json_encode($json);
    }

    public function check_update()
    {    
        $data = json_decode(file_get_contents('php://input'),true);
        $version_data= $data['version_data']; 
        //$test= $data['test']; 
        $myfile = fopen("./uploads/update/version.txt", "r") or die("Unable to open file!");
        $version = fread($myfile,filesize("./uploads/update/version.txt"));
        fclose($myfile);
        if($version > $version_data)
        {
            $versionData = $this->common_model->selectDetailsWhr('tbl_version','version',$version);
            $whatsnewData = $this->web_model->whatsnewData($version);
            $whatsnew = array();
            if (count($whatsnewData) > 0) 
            {
              foreach ($whatsnewData as $rs) 
              {
                    $whatsnew[] = $rs;   
              }
            }
            $path='./uploads/update/'.$versionData->file_name;
            $file = file_get_contents($path);
            $base64 = base64_encode($file);
            $json = array(
                "status" => 1,
                "base64"=>$base64,
                "name"=>$versionData->file_name,
                "db"=>$versionData->database,
                "exam"=>$versionData->exam,
                'whatsnew'=>$whatsnew
            );
        }
        else
        {
            $json = array("status" => 0);
        }
        // if(!$test){
        // $json = array("status" => 0);
        // }
        echo json_encode($json);
    }

    public function app_login()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $username=$data['username'];
        $password=$data['password'];
        $mac_id=$data['mac_id'];
        $result = $this->web_model->stud_details($username,$password);
        if($result)
        {
            $json_data['stud_data']=$result;
            $json_data['question_data'] = $this->web_model->app_que();
            $json_data['previous_data'] = $this->web_model->previous_que();
            $json_data['section_data'] = $this->web_model->app_section_data();
            if(isset($result->mac_id) && !empty($result->mac_id))
            {
                if($mac_id==$result->mac_id)
                {
                    $json = array(
                        "status" => 1,
                        "msg"=>"login Successfully",
                        "json_data"=>$json_data
                    );
                }
                else
                {
                    $json = array(
                        "status" => 0,
                        "msg"=>"Same user run on another mobile"
                    );
                }
            } 
            else
            {
                $data1 = array('mac_id'=>$mac_id);
                if($result->type=='stud')
                {
                    $this->common_model->updateDetails('tbl_student','stud_seat_no',$username,$data1);
                }
                else
                {
                     $this->common_model->updateDetails('tbl_institute','inst_code',$username,$data1);
                }
                $json = array(
                    "status" => 1,
                    "msg"=>"login Successfully",
                    "json_data"=>$json_data,
                    "type"=>$result->type
                );
            }
        }
        else
        {
            $json = array(
                "status" => 0,
                "msg"=>"Invalid User"
            );
        }
        echo json_encode($json);
    }
      
    public function app_login1()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $username='msa1979435';//$data['username'];
        $password='988383';//$data['password'];
        $mac_id='123455';//$data['mac_id'];
        $result = $this->web_model->stud_details($username,$password);
        if($result)
        {
            $json_data['stud_data']=$result;
            $json_data['question_data'] = $this->web_model->app_que();
            $json_data['previous_data'] = $this->web_model->previous_que();
            $json_data['section_data'] = $this->web_model->app_section_data();
            //print_r($json_data['question_data']);
            if(isset($result->mac_id) && !empty($result->mac_id))
            {
                if($mac_id==$result->mac_id)
                {
                    $json = array(
                        "status" => 1,
                        "msg"=>"login Successfully",
                        "json_data"=>$json_data
                    );
                }
                else
                {
                    $json = array(
                        "status" => 0,
                        "msg"=>"Same user run on another mobile"
                    );
                }
            } 
            else
            {
                $data1 = array('mac_id'=>$mac_id);
                if($result->type=='stud')
                {
                    $this->common_model->updateDetails('tbl_student','stud_seat_no',$username,$data1);
                }
                else
                {
                    $this->common_model->updateDetails('tbl_institute','inst_code',$username,$data1);
                }
                $json = array(
                    "status" => 1,
                    "msg"=>"login Successfully",
                    "json_data"=>$json_data,
                    "type"=>$result->type
                ); 
            }
        }
        else
        {
          $json = array("status" => 0,"msg"=>"Invalid User");
        }
        //header('Content-Type: application/json; charset=utf-8');
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
      
    public function app_login2()
    {
        $data = json_decode(file_get_contents('php://input'),true);
       
        $username=$data['username'];
        $password=$data['password'];
        $mac_id=$data['mac_id'];
        //echo '----';
        //print_r($data); die;
        /*$username='msa1979435';//$data['username'];
        $password='988383';//$data['password'];
        $mac_id='123455';//$data['mac_id'];*/
        $result = $this->web_model->stud_details($username,$password);
        // echo $this->db->last_query(); die;
        if($result)
        {
            if(isset($result->mac_id) && !empty($result->mac_id))
            {
                if($mac_id==$result->mac_id)
                {
                    $json = array(
                        "status" => 1,
                        "msg"=>"login Successfully", 
                        "stud_data"=>$result
                    );
                }
                else
                {
                    $json = array("status" => 0,"msg"=>"Same user run on another mobile");
                }
            } 
            else
            {
                $data1 = array('mac_id'=>$mac_id);
                if($result->type=='stud')
                {
                    $this->common_model->updateDetails('tbl_student','seat_no',$username,$data1);
                }
                else
                {
                    $this->common_model->updateDetails('tbl_institute','institute_code',$username,$data1);
                }
                //$json = array("status" => 1,"msg"=>"login Successfully","type"=>$result->type);
                $json = array(
                    "status" => 1,
                    "msg"=>"login Successfully",
                    "stud_data"=>$result,
                    "type"=>$result->type
                );
            }
        }
        else
        {
            $json = array("status" => 0,"msg"=>"Invalid User");
        }
        echo json_encode($json);
    }
      
    public function allQuesData()
    {
        $ques_data = $this->web_model->app_que();
        echo json_encode($ques_data, JSON_UNESCAPED_UNICODE);
    }
        
    public function onlyQuesData()
    {
        $ques_data = $this->web_model->app_only_question();
        echo json_encode($ques_data, JSON_UNESCAPED_UNICODE);
    }
        
    public function onlyOptionData()
    {
        $option_data = $this->web_model->app_only_option();
        echo json_encode($option_data, JSON_UNESCAPED_UNICODE);
    }
      
    public function allPrevData()
    {
        $prev_data = $this->web_model->previous_que();
        echo json_encode($prev_data, JSON_UNESCAPED_UNICODE);
    }
      
    public function onlyPrevQuesData()
    {
        
        $ques_data = $this->web_model->app_only_prev_question();
        echo json_encode($ques_data, JSON_UNESCAPED_UNICODE);
    }
    
    public function testmsceia(){
        echo 'test';
    }
      
    public function onlyPrevOptionData()
    {
        $option_data = $this->web_model->app_only_prev_option();
        echo json_encode($option_data, JSON_UNESCAPED_UNICODE);
    }
      
    public function allSecData()
    {
        $ques_data = $this->web_model->app_section_data();
        echo json_encode($ques_data, JSON_UNESCAPED_UNICODE);
    }

    public function fetch_video()
    {
        $json_data['video']= $this->common_model->fetchDataASC('tbl_video','video_id');
        $json = array("json_data"=>$json_data);
        echo json_encode($json);
    }

    public function get_version()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $json_data= $this->common_model->fetchDataDESClimit('tbl_app_version','version_id', 1);
        $version = $json_data[0]->version_no;
        $json = array("version"=>$version);
        echo json_encode($json);
    }
      
    public function check_fek_user()
    { 
        $data = json_decode(file_get_contents('php://input'),true);
        $device_id=$data['device_id'];
        $student_id=$data['student_id'];
        $type=$data['type'];
        if($type=='stud')
        {
            $same_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$student_id);
            if($same_data->mac_id==$device_id)
            {
                $json = array("status"=>true);
            }
            else
            {
                $json = array("status"=>false);
            }
        }
        else
        { 
            $same_data = $this->common_model->selectDetailsWhr('tbl_institute','institute_id',$student_id);
            if($same_data->mac_id==$device_id)
            {
                $json = array("status"=>true);
            }
            else
            {
                $json = array("status"=>false);
            }
        }
        echo json_encode($json);
    }

    public function redirect_link()
    {
        redirect('https://play.google.com/store/apps/details?id=com.info.itwizz.msceiaexamapplication');
    }
    // public function upload_db()
    // {
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $stud_data= $data['stud_data'];
    //     parse_str($stud_data, $stud_output);
    //     $data1 = array('db_status'=>'Upload'); 
    //     $stud_id = array();
    //     $update_student = array();
    //     $insert_student_result = array();
    //     $insert_user_answer = array();
    //     $s_data = array();
    //     foreach ($stud_output as $key) 
    //     {
    //         $stud_data=$key['stud_data'];
    //         if(isset($key['ans_data']) && !empty($key['ans_data']))
    //         {
    //             $ans_data=$key['ans_data']; 
    //             $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',
    //                 $stud_data['stud_id']);
    //           if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
    //             {
                    
    //                 $s_data = array(
    //                     'student_id'=>$stud_data['stud_id'],
    //                     'exam_status'=>'Upload',
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_marks'=>$stud_data['mobile_marks']??'',
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );              
    //                 $r_data = array(
    //                     'student_id'=>$stud_data['stud_id'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_id'=>$stud_data['email_id']??'',
    //                     'to'=>$stud_data['to']??'',
    //                     'cc'=>$stud_data['cc']??'',
    //                     'bcc'=>$stud_data['bcc']??'',
    //                     'subject'=>$stud_data['subject']??'',
    //                     'message'=>$stud_data['message']??'',
    //                     'attachment_file'=>$stud_data['attachment_file']??'',
    //                     'attachment_file1'=>$stud_data['attachment_file1']??'',
    //                     'email_marks'=>$stud_data['email_marks']??'',
    //                     'speed_id'=>$stud_data['speed_id']??'',
    //                     'passage'=>$stud_data['passage']??'',
    //                     'speed_marks'=>$stud_data['speed_marks']??'',
    //                     'letter_id'=>$stud_data['letter_id']??'',
    //                     'letter_base64'=>$stud_data['letter_base64']??'',
    //                     'letter_text'=>$stud_data['letter_text']??'',
    //                     'letter_html'=>$stud_data['letter_html']??'',
    //                     'letter_marks'=>$stud_data['letter_marks']??'',
    //                     'statement_id'=>$stud_data['statement_id']??'',
    //                     'statement_text'=>$stud_data['statement_text']??'',
    //                     'statement_html'=>$stud_data['statement_html']??'',
    //                     'statement_base64'=>$stud_data['statement_base64']??'',
    //                     'statement_marks'=>$stud_data['statement_marks']??'',
    //                     'mobile_que'=>$stud_data['mobile_que']??'',
    //                     'mobile_ans'=>$stud_data['mobile_ans']??'',
    //                     'mobile_marks'=>$stud_data['mobile_marks']??'',
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );
    //                 $update_student[]=$s_data;
    //                 $insert_student_result[]=$r_data;
    //                 foreach ($ans_data as $row ) 
    //                 {
    //                     $data_ans = array( 
    //                         'student_id'=>$row['stud_id'],
    //                         'question_id'=>$row['question_id'],
    //                         'stud_option_id'=>$row['stud_option_id']??''
    //                     );
    //                     $insert_user_answer[] = $data_ans;
    //                 }
    //             }
    //             else
    //             {
    //                 if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
    //                 {
    //                     $s_data=array(
    //                         'student_id'=>$stud_data['stud_id'],
    //                         'exam_status'=>$stud_data['exam_status'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_marks'=>$stud_data['email_marks'],
    //                         'speed_marks'=>$stud_data['speed_marks'],
    //                         'letter_marks'=>$stud_data['letter_marks'],
    //                         'statement_marks'=>$stud_data['statement_marks'],
    //                         'mobile_marks'=>$stud_data['mobile_marks']??'',
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $r_data=array(
    //                         'student_id'=>$stud_data['stud_id'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_id'=>$stud_data['email_id']??'',
    //                         'to'=>$stud_data['to']??'',
    //                         'cc'=>$stud_data['cc']??'',
    //                         'bcc'=>$stud_data['bcc']??'',
    //                         'subject'=>$stud_data['subject']??'',
    //                         'message'=>$stud_data['message']??'',
    //                         'attachment_file'=>$stud_data['attachment_file']??'',
    //                         'attachment_file1'=>$stud_data['attachment_file1']??'',
    //                         'email_marks'=>$stud_data['email_marks']??'',
    //                         'speed_id'=>$stud_data['speed_id']??'',
    //                         'passage'=>$stud_data['passage']??'',
    //                         'speed_marks'=>$stud_data['speed_marks']??'',
    //                         'letter_id'=>$stud_data['letter_id']??'',
    //                         'letter_base64'=>$stud_data['letter_base64']??'',
    //                         'letter_text'=>$stud_data['letter_text']??'',
    //                         'letter_html'=>$stud_data['letter_html']??'',
    //                         'letter_marks'=>$stud_data['letter_marks']??'',
    //                         'statement_id'=>$stud_data['statement_id']??'',
    //                         'statement_text'=>$stud_data['statement_text']??'',
    //                         'statement_html'=>$stud_data['statement_html']??'',
    //                         'statement_base64'=>$stud_data['statement_base64']??'',
    //                         'statement_marks'=>$stud_data['statement_marks']??'',
    //                         'mobile_que'=>$stud_data['mobile_que']??'',
    //                         'mobile_ans'=>$stud_data['mobile_ans']??'',
    //                         'mobile_marks'=>$stud_data['mobile_marks']??'',
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $update_student[] = $s_data;
    //                     $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
    //                     $insert_student_result[] = $r_data;
    //                     $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
    //                     foreach ($ans_data as $row) 
    //                     {
    //                         $data_ans[] = array(
    //                             'student_id'=>$row['stud_id'],
    //                             'question_id'=>$row['question_id'],
    //                             'stud_option_id'=>$row['stud_option_id']??''
    //                         );
    //                         $insert_user_answer[] = $data_ans;
    //                     }
    //                 }
    //             }
    //             $stud_id[] = array(
    //                 'stud_id' => $stud_data['stud_id'] , 
    //                 'exam_status'=>'Upload'
    //             );
    //             $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
    //         }
    //     }
    //     $this->load->model('standard/standard_model'); 
    //     $stud_status = $this->standard_model->update_batch('tbl_student',$update_student,'student_id',true);
    //     log_message('debug',print_r($stud_status,true));
    //     $stud_result = $this->standard_model->insert_batch('tbl_student_result',$insert_student_result,true); 
    //     log_message('debug',print_r($insert_student_result,true));
    //     $stud_user_status = $this->standard_model->insert_batch('tbl_user_answer',$insert_user_answer,true);
    //     log_message('debug',print_r($insert_user_answer,true));
    //     if($stud_status && $stud_result && $stud_user_status)
    //     {
    //         log_message('debug',print_r($stud_id,true));
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     else
    //     {
    //         $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     echo json_encode($json);
    // }
    // public function upload_db_old()
    // {
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $stud_data= $data['stud_data'];
    //     parse_str($stud_data, $stud_output);
    //     $data1 = array('db_status'=>'Upload'); 
    //     $stud_id = array();
    //     foreach ($stud_output as $key) 
    //     {
    //         $this->db->trans_start();
    //         $stud_data=$key['stud_data']; 
    //         if(isset($key['ans_data']) && !empty($key['ans_data']))
    //         {
    //             $ans_data=$key['ans_data']; 
    //             $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
    //             // $test = $this->db->last_query();
    //             if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Complete'))
    //             {
    //                 $s_data = array(
    //                     'exam_status'=>'Upload'
    //                 );  
    //                 $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
    //             }
    //             elseif(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
    //             {
    //                 $s_data = array(
    //                     'exam_status'=>$stud_data['exam_status'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );              
    //                 $r_data = array(
    //                     'student_id'=>$stud_data['stud_id'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_id'=>$stud_data['email_id'],
    //                     'to'=>$stud_data['to'],
    //                     'cc'=>$stud_data['cc'],
    //                     'bcc'=>$stud_data['bcc'],
    //                     'subject'=>$stud_data['subject'],
    //                     'message'=>$stud_data['message'],
    //                     'attachment_file'=>$stud_data['attachment_file'],
    //                     'attachment_file1'=>$stud_data['attachment_file1'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_id'=>$stud_data['speed_id'],
    //                     'passage'=>$stud_data['passage'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_id'=>$stud_data['letter_id'],
    //                     'letter_base64'=>$stud_data['letter_base64'],
    //                     'letter_text'=>$stud_data['letter_text'],
    //                     'letter_html'=>$stud_data['letter_html'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_id'=>$stud_data['statement_id'],
    //                     'statement_text'=>$stud_data['statement_text'],
    //                     'statement_html'=>$stud_data['statement_html'],
    //                     'statement_base64'=>$stud_data['statement_base64'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_que'=>$stud_data['mobile_que'],
    //                     'mobile_ans'=>$stud_data['mobile_ans'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );
    //                 $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
    //                 $this->common_model->addData('tbl_student_result',$r_data);
    //                 foreach ($ans_data as $row ) 
    //                 {
    //                     $data_ans[] = array( 
    //                         'student_id'=>$row['stud_id'],
    //                         'question_id'=>$row['question_id'],
    //                         'stud_option_id'=>$row['stud_option_id']
    //                     );
    //                 }
    //                 $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
    //             }
    //             else
    //             {
    //                 if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
    //                 {
    //                     $s_data=array(
    //                         'exam_status'=>$stud_data['exam_status'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_marks'=>$stud_data['email_marks'],
    //                         'speed_marks'=>$stud_data['speed_marks'],
    //                         'letter_marks'=>$stud_data['letter_marks'],
    //                         'statement_marks'=>$stud_data['statement_marks'],
    //                         'mobile_marks'=>$stud_data['mobile_marks'],
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $r_data=array(
    //                         'student_id'=>$stud_data['stud_id'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_id'=>$stud_data['email_id'],
    //                         'to'=>$stud_data['to'],
    //                         'cc'=>$stud_data['cc'],
    //                         'bcc'=>$stud_data['bcc'],
    //                         'subject'=>$stud_data['subject'],
    //                         'message'=>$stud_data['message'],
    //                         'attachment_file'=>$stud_data['attachment_file'],
    //                         'attachment_file1'=>$stud_data['attachment_file1'],
    //                         'email_marks'=>$stud_data['email_marks'],
    //                         'speed_id'=>$stud_data['speed_id'],
    //                         'passage'=>$stud_data['passage'],
    //                         'speed_marks'=>$stud_data['speed_marks'],
    //                         'letter_id'=>$stud_data['letter_id'],
    //                         'letter_base64'=>$stud_data['letter_base64'],
    //                         'letter_text'=>$stud_data['letter_text'],
    //                         'letter_html'=>$stud_data['letter_html'],
    //                         'letter_marks'=>$stud_data['letter_marks'],
    //                         'statement_id'=>$stud_data['statement_id'],
    //                         'statement_text'=>$stud_data['statement_text'],
    //                         'statement_html'=>$stud_data['statement_html'],
    //                         'statement_base64'=>$stud_data['statement_base64'],
    //                         'statement_marks'=>$stud_data['statement_marks'],
    //                         'mobile_que'=>$stud_data['mobile_que'],
    //                         'mobile_ans'=>$stud_data['mobile_ans'],
    //                         'mobile_marks'=>$stud_data['mobile_marks'],
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
    //                     $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
    //                     $this->common_model->addData('tbl_student_result',$r_data);
    //                     $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
    //                     foreach ($ans_data as $row) 
    //                     {
    //                         $data_ans[] = array(
    //                             'student_id'=>$row['stud_id'],
    //                             'question_id'=>$row['question_id'],
    //                             'stud_option_id'=>$row['stud_option_id']
    //                         );
    //                     }
    //                     $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
    //                 }
    //             }
    //             $stud_id[] = array(
    //                 'stud_id' => $stud_data['stud_id'] , 
    //                 'exam_status'=>'Upload'
    //             );
    //             $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
    //         }
    //         $result=$this->db->trans_complete();
    //     }
                
    //     if(isset($result)&& !empty($result))
    //     {
    //         $json = array("status" => 1, "stud_id"=>$stud_id /*,"test" =>$test*/);
    //     }
    //     else
    //     {
    //         $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
    //         $json = array("status" => 1, "stud_id"=>$stud_id /*,"test" =>"hello"*/);
    //     }
    //     echo json_encode($json);
    // } 
    
    // public function upload_batch_db()
    // {
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $stud_data= $data['stud_data'];
    //     parse_str($stud_data, $stud_output);
    //     //log_message('error',print_r($stud_output,true));
    //     $data1 = array('db_status'=>'Upload'); 
    //     $stud_id = array();
    //     $update_student = array();
    //     $insert_student_result = array();
    //     $insert_user_answer = array();
    //     $delete_user_answer = array();
    //     $delete_student_result = array();
    //     foreach ($stud_output as $key) 
    //     {
    //         $stud_data=$key['stud_data'];
    //         if(isset($key['ans_data']) && !empty($key['ans_data']))
    //         {
    //             $ans_data=$key['ans_data']; 
    //             $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
    //             if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Complete'))
    //             {
    //                 $s_data = array(
    //                     'exam_status'=>'Upload'
    //                 );  
    //                 $update_student[]=$s_data;
    //             }
    //             elseif(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
    //             {
    //                 $s_data = array(
    //                     'exam_status'=>$stud_data['exam_status'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );              
    //                 $r_data = array(
    //                     'student_id'=>$stud_data['stud_id'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_id'=>$stud_data['email_id'],
    //                     'to'=>$stud_data['to'],
    //                     'cc'=>$stud_data['cc'],
    //                     'bcc'=>$stud_data['bcc'],
    //                     'subject'=>$stud_data['subject'],
    //                     'message'=>$stud_data['message'],
    //                     'attachment_file'=>$stud_data['attachment_file'],
    //                     'attachment_file1'=>$stud_data['attachment_file1'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_id'=>$stud_data['speed_id'],
    //                     'passage'=>$stud_data['passage'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_id'=>$stud_data['letter_id'],
    //                     'letter_base64'=>$stud_data['letter_base64'],
    //                     'letter_text'=>$stud_data['letter_text'],
    //                     'letter_html'=>$stud_data['letter_html'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_id'=>$stud_data['statement_id'],
    //                     'statement_text'=>$stud_data['statement_text'],
    //                     'statement_html'=>$stud_data['statement_html'],
    //                     'statement_base64'=>$stud_data['statement_base64'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_que'=>$stud_data['mobile_que'],
    //                     'mobile_ans'=>$stud_data['mobile_ans'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );
    //                 $update_student[]=$s_data;
    //                 $insert_student_result[]=$r_data;
    //                 foreach ($ans_data as $row ) 
    //                 {
    //                     $data_ans[] = array( 
    //                         'student_id'=>$row['stud_id'],
    //                         'question_id'=>$row['question_id'],
    //                         'stud_option_id'=>$row['stud_option_id']
    //                     );
    //                 }
    //                 $insert_user_answer[] = $data_ans;
    //             }
    //             else
    //             {
    //                 if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
    //                 {
    //                     $s_data=array(
    //                         'exam_status'=>$stud_data['exam_status'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_marks'=>$stud_data['email_marks'],
    //                         'speed_marks'=>$stud_data['speed_marks'],
    //                         'letter_marks'=>$stud_data['letter_marks'],
    //                         'statement_marks'=>$stud_data['statement_marks'],
    //                         'mobile_marks'=>$stud_data['mobile_marks'],
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $r_data=array(
    //                         'student_id'=>$stud_data['stud_id'],
    //                         'objective_marks'=>$stud_data['objective_marks'],
    //                         'email_id'=>$stud_data['email_id'],
    //                         'to'=>$stud_data['to'],
    //                         'cc'=>$stud_data['cc'],
    //                         'bcc'=>$stud_data['bcc'],
    //                         'subject'=>$stud_data['subject'],
    //                         'message'=>$stud_data['message'],
    //                         'attachment_file'=>$stud_data['attachment_file'],
    //                         'attachment_file1'=>$stud_data['attachment_file1'],
    //                         'email_marks'=>$stud_data['email_marks'],
    //                         'speed_id'=>$stud_data['speed_id'],
    //                         'passage'=>$stud_data['passage'],
    //                         'speed_marks'=>$stud_data['speed_marks'],
    //                         'letter_id'=>$stud_data['letter_id'],
    //                         'letter_base64'=>$stud_data['letter_base64'],
    //                         'letter_text'=>$stud_data['letter_text'],
    //                         'letter_html'=>$stud_data['letter_html'],
    //                         'letter_marks'=>$stud_data['letter_marks'],
    //                         'statement_id'=>$stud_data['statement_id'],
    //                         'statement_text'=>$stud_data['statement_text'],
    //                         'statement_html'=>$stud_data['statement_html'],
    //                         'statement_base64'=>$stud_data['statement_base64'],
    //                         'statement_marks'=>$stud_data['statement_marks'],
    //                         'mobile_que'=>$stud_data['mobile_que'],
    //                         'mobile_ans'=>$stud_data['mobile_ans'],
    //                         'mobile_marks'=>$stud_data['mobile_marks'],
    //                         'submit_on'=>$stud_data['submit_on'],
    //                         'grace'=>$stud_data['grace']
    //                     );
    //                     $st_id = array(
    //                         'student_id'=>$stud_data['stud_id'],
    //                     );
    //                     $update_student[] = $s_data;
    //                     $insert_student_result[] = $r_data;
    //                     $delete_student_result[] = $st_id;
    //                     $delete_user_answer[] = $st_id;
    //                     foreach ($ans_data as $row) 
    //                     {
    //                         $data_ans[] = array(
    //                             'student_id'=>$row['stud_id'],
    //                             'question_id'=>$row['question_id'],
    //                             'stud_option_id'=>$row['stud_option_id']
    //                         );
    //                     }
    //                     $insert_user_answer[] = $data_ans;
    //                 }
    //             }
    //             $stud_id[] = array(
    //                 'stud_id' => $stud_data['stud_id'] , 
    //                 'exam_status'=>'Upload'
    //             );
    //             $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
    //         }
    //     }
    //   // $this->db->trans_start();
    //     log_message('debug',print_r($update_student,true));
    //     //$this->common_model->UpdateMultiData('tbl_student',$update_student,'stud_id');
    //     log_message('debug',print_r($insert_student_result,true));
    //   // $this->common_model->SaveMultiData('tbl_student_result',$insert_student_result); 
    //     log_message('debug',print_r($insert_user_answer,true));
    //   // $this->common_model->SaveMultiData('tbl_user_answer',$insert_user_answer);
    //   // $this->db->where('student_id',$delete_student_result)->delete('tbl_student_result');
    //   // $this->db->where('student_id',$delete_user_answer)->delete('tbl_user_answer');
    //   // $result=$this->db->trans_complete();
    //   $result = true;
    //     if(isset($result)&& !empty($result))
    //     {
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     else
    //     {
    //         $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     echo json_encode($json);
    // }
    // public function upload_db()
    // {
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $stud_data= $data['stud_data'];
    //     parse_str($stud_data, $stud_output);
    //     $data1 = array('db_status'=>'Upload'); 
    //     $stud_id = array();
    //     foreach ($stud_output as $key) 
    //     {
    //         $this->db->trans_start();
    //         $stud_data=$key['stud_data'];
    //         if(isset($key['ans_data']) && !empty($key['ans_data']))
    //         {
    //             $ans_data=$key['ans_data']; 
    //             $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
    //             if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
    //             {
    //             $s_data = array(
    //                 'exam_status'=>$stud_data['exam_status'],
    //                 'objective_marks'=>$stud_data['objective_marks'],
    //                 'email_marks'=>$stud_data['email_marks'],
    //                 'speed_marks'=>$stud_data['speed_marks'],
    //                 'letter_marks'=>$stud_data['letter_marks'],
    //                 'statement_marks'=>$stud_data['statement_marks'],
    //                 'mobile_marks'=>$stud_data['mobile_marks'],
    //                 'submit_on'=>$stud_data['submit_on'],
    //                 'grace'=>$stud_data['grace']
    //             );              
    //             $r_data = array(
    //                 'student_id'=>$stud_data['stud_id'],
    //                 'objective_marks'=>$stud_data['objective_marks'],
    //                 'email_id'=>$stud_data['email_id'],
    //                 'to'=>$stud_data['to'],
    //                 'cc'=>$stud_data['cc'],
    //                 'bcc'=>$stud_data['bcc'],
    //                 'subject'=>$stud_data['subject'],
    //                 'message'=>$stud_data['message'],
    //                 'attachment_file'=>$stud_data['attachment_file'],
    //                 'attachment_file1'=>$stud_data['attachment_file1'],
    //                 'email_marks'=>$stud_data['email_marks'],
    //                 'speed_id'=>$stud_data['speed_id'],
    //                 'passage'=>$stud_data['passage'],
    //                 'speed_marks'=>$stud_data['speed_marks'],
    //                 'letter_id'=>$stud_data['letter_id'],
    //                 'letter_base64'=>$stud_data['letter_base64'],
    //                 'letter_text'=>$stud_data['letter_text'],
    //                 'letter_html'=>$stud_data['letter_html'],
    //                 'letter_marks'=>$stud_data['letter_marks'],
    //                 'statement_id'=>$stud_data['statement_id'],
    //                 'statement_text'=>$stud_data['statement_text'],
    //                 'statement_html'=>$stud_data['statement_html'],
    //                 'statement_base64'=>$stud_data['statement_base64'],
    //                 'statement_marks'=>$stud_data['statement_marks'],
    //                 'mobile_que'=>$stud_data['mobile_que'],
    //                 'mobile_ans'=>$stud_data['mobile_ans'],
    //                 'mobile_marks'=>$stud_data['mobile_marks'],
    //                 'submit_on'=>$stud_data['submit_on'],
    //                 'grace'=>$stud_data['grace']
    //             );
    //             $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
    //             $this->common_model->addData('tbl_student_result',$r_data);
    //             foreach ($ans_data as $row ) 
    //             {
    //                 $data_ans[] = array( 
    //                     'student_id'=>$row['stud_id'],
    //                     'question_id'=>$row['question_id'],
    //                     'stud_option_id'=>$row['stud_option_id']
    //                 );
    //             }
    //             $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
    //         }
    //         else
    //         {
    //             if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
    //             {
    //                 $s_data=array(
    //                     'exam_status'=>$stud_data['exam_status'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );
    //                 $r_data=array(
    //                     'student_id'=>$stud_data['stud_id'],
    //                     'objective_marks'=>$stud_data['objective_marks'],
    //                     'email_id'=>$stud_data['email_id'],
    //                     'to'=>$stud_data['to'],
    //                     'cc'=>$stud_data['cc'],
    //                     'bcc'=>$stud_data['bcc'],
    //                     'subject'=>$stud_data['subject'],
    //                     'message'=>$stud_data['message'],
    //                     'attachment_file'=>$stud_data['attachment_file'],
    //                     'attachment_file1'=>$stud_data['attachment_file1'],
    //                     'email_marks'=>$stud_data['email_marks'],
    //                     'speed_id'=>$stud_data['speed_id'],
    //                     'passage'=>$stud_data['passage'],
    //                     'speed_marks'=>$stud_data['speed_marks'],
    //                     'letter_id'=>$stud_data['letter_id'],
    //                     'letter_base64'=>$stud_data['letter_base64'],
    //                     'letter_text'=>$stud_data['letter_text'],
    //                     'letter_html'=>$stud_data['letter_html'],
    //                     'letter_marks'=>$stud_data['letter_marks'],
    //                     'statement_id'=>$stud_data['statement_id'],
    //                     'statement_text'=>$stud_data['statement_text'],
    //                     'statement_html'=>$stud_data['statement_html'],
    //                     'statement_base64'=>$stud_data['statement_base64'],
    //                     'statement_marks'=>$stud_data['statement_marks'],
    //                     'mobile_que'=>$stud_data['mobile_que'],
    //                     'mobile_ans'=>$stud_data['mobile_ans'],
    //                     'mobile_marks'=>$stud_data['mobile_marks'],
    //                     'submit_on'=>$stud_data['submit_on'],
    //                     'grace'=>$stud_data['grace']
    //                 );
    //                 $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
    //                 $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
    //                 $this->common_model->addData('tbl_student_result',$r_data);
    //                 $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
    //                 foreach ($ans_data as $row) 
    //                 {
    //                     $data_ans[] = array(
    //                         'student_id'=>$row['stud_id'],
    //                         'question_id'=>$row['question_id'],
    //                         'stud_option_id'=>$row['stud_option_id']
    //                     );
    //                 }
    //                 $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
    //             }
    //         }
    //         $stud_id[] = array(
    //             'stud_id' => $stud_data['stud_id'] , 
    //             'exam_status'=>'Upload'
    //         );
    //         $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
    //         }
    //         $result=$this->db->trans_complete();
    //     }
                
    //     if(isset($result)&& !empty($result))
    //     {
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     else
    //     {
    //         $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
    //         $json = array("status" => 1, "stud_id"=>$stud_id);
    //     }
    //     echo json_encode($json);
    // }
    
    
    // EXAM FUNCTIONS

    /* Old exam upload function  */
    public function upload_db_old()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $stud_data= $data['stud_data'];
        parse_str($stud_data, $stud_output);
        $data1 = array('db_status'=>'Upload'); 
        $stud_id = array();
        foreach ($stud_output as $key) 
        {
            $this->db->trans_start();
            $stud_data=$key['stud_data'];
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
                $ans_data=$key['ans_data']; 
                $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
                // $test = $this->db->last_query();
                if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Complete'))
                {
                    $s_data = array(
                        'exam_status'=>'Upload'
                    );  
                    $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
                }
                elseif(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
                {
                    $s_data = array(
                        'exam_status'=>$stud_data['exam_status'],
                        'objective_marks'=>$stud_data['objective_marks'],
                        'email_marks'=>$stud_data['email_marks'],
                        'speed_marks'=>$stud_data['speed_marks'],
                        'letter_marks'=>$stud_data['letter_marks'],
                        'statement_marks'=>$stud_data['statement_marks'],
                        'mobile_marks'=>$stud_data['mobile_marks'],
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );              
                    $r_data = array(
                        'student_id'=>$stud_data['stud_id'],
                        'objective_marks'=>$stud_data['objective_marks'],
                        'email_id'=>$stud_data['email_id'],
                        'to'=>$stud_data['to'],
                        'cc'=>$stud_data['cc'],
                        'bcc'=>$stud_data['bcc'],
                        'subject'=>$stud_data['subject'],
                        'message'=>$stud_data['message'],
                        'attachment_file'=>$stud_data['attachment_file'],
                        'attachment_file1'=>$stud_data['attachment_file1'],
                        'email_marks'=>$stud_data['email_marks'],
                        'speed_id'=>$stud_data['speed_id'],
                        'passage'=>$stud_data['passage'],
                        'speed_marks'=>$stud_data['speed_marks'],
                        'letter_id'=>$stud_data['letter_id'],
                        'letter_base64'=>$stud_data['letter_base64'],
                        'letter_text'=>$stud_data['letter_text'],
                        'letter_html'=>$stud_data['letter_html'],
                        'letter_marks'=>$stud_data['letter_marks'],
                        'statement_id'=>$stud_data['statement_id'],
                        'statement_text'=>$stud_data['statement_text'],
                        'statement_html'=>$stud_data['statement_html'],
                        'statement_base64'=>$stud_data['statement_base64'],
                        'statement_marks'=>$stud_data['statement_marks'],
                        'mobile_que'=>$stud_data['mobile_que'],
                        'mobile_ans'=>$stud_data['mobile_ans'],
                        'mobile_marks'=>$stud_data['mobile_marks'],
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );
                    $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
                    $this->common_model->addData('tbl_student_result',$r_data);
                    foreach ($ans_data as $row ) 
                    {
                        $data_ans[] = array( 
                            'student_id'=>$row['stud_id'],
                            'question_id'=>$row['question_id'],
                            'stud_option_id'=>$row['stud_option_id']
                        );
                    }
                    $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                }
                else
                {
                    if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
                    {
                        $s_data=array(
                            'exam_status'=>$stud_data['exam_status'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_marks'=>$stud_data['email_marks'],
                            'speed_marks'=>$stud_data['speed_marks'],
                            'letter_marks'=>$stud_data['letter_marks'],
                            'statement_marks'=>$stud_data['statement_marks'],
                            'mobile_marks'=>$stud_data['mobile_marks'],
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $r_data=array(
                            'student_id'=>$stud_data['stud_id'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_id'=>$stud_data['email_id'],
                            'to'=>$stud_data['to'],
                            'cc'=>$stud_data['cc'],
                            'bcc'=>$stud_data['bcc'],
                            'subject'=>$stud_data['subject'],
                            'message'=>$stud_data['message'],
                            'attachment_file'=>$stud_data['attachment_file'],
                            'attachment_file1'=>$stud_data['attachment_file1'],
                            'email_marks'=>$stud_data['email_marks'],
                            'speed_id'=>$stud_data['speed_id'],
                            'passage'=>$stud_data['passage'],
                            'speed_marks'=>$stud_data['speed_marks'],
                            'letter_id'=>$stud_data['letter_id'],
                            'letter_base64'=>$stud_data['letter_base64'],
                            'letter_text'=>$stud_data['letter_text'],
                            'letter_html'=>$stud_data['letter_html'],
                            'letter_marks'=>$stud_data['letter_marks'],
                            'statement_id'=>$stud_data['statement_id'],
                            'statement_text'=>$stud_data['statement_text'],
                            'statement_html'=>$stud_data['statement_html'],
                            'statement_base64'=>$stud_data['statement_base64'],
                            'statement_marks'=>$stud_data['statement_marks'],
                            'mobile_que'=>$stud_data['mobile_que'],
                            'mobile_ans'=>$stud_data['mobile_ans'],
                            'mobile_marks'=>$stud_data['mobile_marks'],
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                        $this->common_model->addData('tbl_student_result',$r_data);
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                        foreach ($ans_data as $row) 
                        {
                            $data_ans[] = array(
                                'student_id'=>$row['stud_id'],
                                'question_id'=>$row['question_id'],
                                'stud_option_id'=>$row['stud_option_id']
                            );
                        }
                        $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                    }
                }
                $stud_id[] = array(
                    'stud_id' => $stud_data['stud_id'] , 
                    'exam_status'=>'Upload'
                );
                $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
            }
            $result=$this->db->trans_complete();
        }
                
        if(isset($result)&& !empty($result))
        {
            $json = array("status" => 1, "stud_id"=>$stud_id /*,"test" =>$test*/);
        }
        else
        {
            $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
            $json = array("status" => 1, "stud_id"=>$stud_id /*,"test" =>"hello"*/);
        }
        echo json_encode($json);
    } 
    
    /* this function will update & insert data after process_json */
    private function upload_batch_db($stud_output)
    { 
        $stud_id = array();
        $update_student = array();
        $insert_student_result = array();
        $insert_user_answer = array();
        $s_data = array();
        foreach ($stud_output as $key) 
        {
            $stud_data=isset($key['stud_data'])?$key['stud_data']:array();
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
                $ans_data=$key['ans_data']; 
                $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',
                    $stud_data['stud_id']);
                if(isset($result_data))
                {
                    if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
                    {
                        $s_data = array(
                            'student_id'=>$stud_data['stud_id'],
                            'exam_status'=>'Upload',
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_marks'=>$stud_data['email_marks']??NULL,
                            'speed_marks'=>$stud_data['speed_marks']??NULL,
                            'letter_marks'=>$stud_data['letter_marks']??NULL,
                            'statement_marks'=>$stud_data['statement_marks']??NULL,
                            'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );              
                        $r_data = array(
                            'student_id'=>$stud_data['stud_id'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_id'=>$stud_data['email_id']??'',
                            'to'=>$stud_data['to']??'',
                            'cc'=>$stud_data['cc']??'',
                            'bcc'=>$stud_data['bcc']??'',
                            'subject'=>$stud_data['subject']??'',
                            'message'=>$stud_data['message']??'',
                            'attachment_file'=>$stud_data['attachment_file']??'',
                            'attachment_file1'=>$stud_data['attachment_file1']??'',
                            'email_marks'=>$stud_data['email_marks']??'',
                            'speed_id'=>$stud_data['speed_id']??'',
                            'passage'=>$stud_data['passage']??'',
                            'speed_marks'=>$stud_data['speed_marks']??'',
                            'letter_id'=>$stud_data['letter_id']??'',
                            'letter_base64'=>$stud_data['letter_base64']??'',
                            'letter_text'=>$stud_data['letter_text']??'',
                            'letter_html'=>$stud_data['letter_html']??'',
                            'letter_marks'=>$stud_data['letter_marks']??'',
                            'statement_id'=>$stud_data['statement_id']??'',
                            'statement_text'=>$stud_data['statement_text']??'',
                            'statement_html'=>$stud_data['statement_html']??'',
                            'statement_base64'=>$stud_data['statement_base64']??'',
                            'statement_marks'=>$stud_data['statement_marks']??'',
                            'mobile_que'=>$stud_data['mobile_que']??'',
                            'mobile_ans'=>$stud_data['mobile_ans']??'',
                            'mobile_marks'=>$stud_data['mobile_marks']??'',
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $update_student[]=$s_data;
                        $insert_student_result[]=$r_data;
                        foreach ($ans_data as $row ) 
                        {
                            $data_ans = array( 
                                'student_id'=>$row['stud_id'],
                                'question_id'=>$row['question_id'],
                                'stud_option_id'=>$row['stud_option_id']??''
                            );
                            $insert_user_answer[] = $data_ans;
                        }
                    }
                    else
                    {
                        if($result_data->objective_marks <= $stud_data['objective_marks'] OR 
                            $result_data->speed_marks <= $stud_data['speed_marks'])
                        {
                            $s_data=array(
                                'student_id'=>$stud_data['stud_id'],
                                'exam_status'=>'Upload',
                                'objective_marks'=>$stud_data['objective_marks'],
                                'email_marks'=>$stud_data['email_marks']??NULL,
                                'speed_marks'=>$stud_data['speed_marks']??NULL,
                                'letter_marks'=>$stud_data['letter_marks']??NULL,
                                'statement_marks'=>$stud_data['statement_marks']??NULL,
                                'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                                'submit_on'=>$stud_data['submit_on'],
                                'grace'=>$stud_data['grace']
                            );
                            $r_data=array(
                                'student_id'=>$stud_data['stud_id'],
                                'objective_marks'=>$stud_data['objective_marks'],
                                'email_id'=>$stud_data['email_id']??'',
                                'to'=>$stud_data['to']??'',
                                'cc'=>$stud_data['cc']??'',
                                'bcc'=>$stud_data['bcc']??'',
                                'subject'=>$stud_data['subject']??'',
                                'message'=>$stud_data['message']??'',
                                'attachment_file'=>$stud_data['attachment_file']??'',
                                'attachment_file1'=>$stud_data['attachment_file1']??'',
                                'email_marks'=>$stud_data['email_marks']??'',
                                'speed_id'=>$stud_data['speed_id']??'',
                                'passage'=>$stud_data['passage']??'',
                                'speed_marks'=>$stud_data['speed_marks']??'',
                                'letter_id'=>$stud_data['letter_id']??'',
                                'letter_base64'=>$stud_data['letter_base64']??'',
                                'letter_text'=>$stud_data['letter_text']??'',
                                'letter_html'=>$stud_data['letter_html']??'',
                                'letter_marks'=>$stud_data['letter_marks']??'',
                                'statement_id'=>$stud_data['statement_id']??'',
                                'statement_text'=>$stud_data['statement_text']??'',
                                'statement_html'=>$stud_data['statement_html']??'',
                                'statement_base64'=>$stud_data['statement_base64']??'',
                                'statement_marks'=>$stud_data['statement_marks']??'',
                                'mobile_que'=>$stud_data['mobile_que']??'',
                                'mobile_ans'=>$stud_data['mobile_ans']??'',
                                'mobile_marks'=>$stud_data['mobile_marks']??'',
                                'submit_on'=>$stud_data['submit_on'],
                                'grace'=>$stud_data['grace']
                            );
                            $update_student[] = $s_data;
                            $this->delete_existing_stud($stud_data['stud_id']);
                            $insert_student_result[] = $r_data;
                            foreach ($ans_data as $row) 
                            {
                                $data_ans = array(
                                    'student_id'=>$row['stud_id'],
                                    'question_id'=>$row['question_id'],
                                    'stud_option_id'=>$row['stud_option_id']??''
                                );
                                $insert_user_answer[] = $data_ans;
                            }
                        }
                    }
                }
            }
        }
        $this->load->model('standard/standard_model'); 
        $stud_status = $this->standard_model->update_batch('tbl_student',$update_student,'student_id',true);
        $stud_result = $this->standard_model->insert_batch('tbl_student_result',$insert_student_result,true); 
        $stud_user_status = $this->standard_model->insert_batch('tbl_user_answer',$insert_user_answer,true);
        if($stud_status && $stud_result && $stud_user_status)
        {
            $json = array("status" => true);
        }
        else
        {
            $json = array("status" => false);
        }
        return ($json);
    }
    
    /* this function will delete existing student data */
    public function delete_existing_stud($stud_id)
    {
        $this->load->model('standard/standard_model');
        $this->standard_model->permanant_delete_record('student_id',$stud_id,'tbl_student_result');
        $this->standard_model->delete_batch('tbl_user_answer','student_id',$stud_id);
    }
    
    public function upload_db()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $stud_data= $data['stud_data'];
        parse_str($stud_data, $stud_output);
        $data1 = array('db_status'=>'Upload'); 
        $stud_id = array();
        
        foreach ($stud_output as $key) 
        {
            $this->db->trans_start();
            $stud_data=$key['stud_data'];
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
              $ans_data=$key['ans_data']; 
              $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
              
              if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
              {
                  
                  $s_data=array('exam_status'=>'Upload','objective_marks'=>$stud_data['objective_marks'],'email_marks'=>$stud_data['email_marks'],'speed_marks'=>$stud_data['speed_marks'],'letter_marks'=>$stud_data['letter_marks'],'statement_marks'=>$stud_data['statement_marks'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);              
                  $r_data=array('student_id'=>$stud_data['stud_id'],'batch_id'=>$result_data->batch_id,'objective_marks'=>$stud_data['objective_marks'],'email_id'=>$stud_data['email_id'],'to'=>$stud_data['to'],'cc'=>$stud_data['cc'],'bcc'=>$stud_data['bcc'],'subject'=>$stud_data['subject'],'message'=>$stud_data['message'],'attachment_file'=>$stud_data['attachment_file'],'attachment_file1'=>$stud_data['attachment_file1'],'email_marks'=>$stud_data['email_marks'],'speed_id'=>$stud_data['speed_id'],'passage'=>$stud_data['passage'],'speed_marks'=>$stud_data['speed_marks'],'letter_id'=>$stud_data['letter_id'],'letter_base64'=>$stud_data['letter_base64'],'letter_text'=>$stud_data['letter_text'],'letter_html'=>$stud_data['letter_html'],'letter_marks'=>$stud_data['letter_marks'],'statement_id'=>$stud_data['statement_id'],'statement_text'=>$stud_data['statement_text'],'statement_html'=>$stud_data['statement_html'],'statement_base64'=>$stud_data['statement_base64'],'statement_marks'=>$stud_data['statement_marks'],'mobile_que'=>$stud_data['mobile_que'],'mobile_ans'=>$stud_data['mobile_ans'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
                  
                  $this->common_model->updateDetails('tbl_student','student_id',$result_data->student_id,$s_data);
                  $this->common_model->addData('tbl_student_result',$r_data);
                  foreach ($ans_data as $row ) 
                  {
                      $data_ans[] = array('student_id'=>$row['stud_id'],'batch_id'=>$result_data->batch_id,'question_id'=>$row['question_id'],'stud_option_id'=>$row['stud_option_id']);
                  }
                  $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
              }
              else
              {
                  if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
                  {
                      $s_data=array('exam_status'=>'Upload','objective_marks'=>$stud_data['objective_marks'],'email_marks'=>$stud_data['email_marks'],'speed_marks'=>$stud_data['speed_marks'],'letter_marks'=>$stud_data['letter_marks'],'statement_marks'=>$stud_data['statement_marks'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
    
                      $r_data=array('student_id'=>$stud_data['stud_id'],'batch_id'=>$result_data->batch_id,'objective_marks'=>$stud_data['objective_marks'],'email_id'=>$stud_data['email_id'],'to'=>$stud_data['to'],'cc'=>$stud_data['cc'],'bcc'=>$stud_data['bcc'],'subject'=>$stud_data['subject'],'message'=>$stud_data['message'],'attachment_file'=>$stud_data['attachment_file'],'attachment_file1'=>$stud_data['attachment_file1'],'email_marks'=>$stud_data['email_marks'],'speed_id'=>$stud_data['speed_id'],'passage'=>$stud_data['passage'],'speed_marks'=>$stud_data['speed_marks'],'letter_id'=>$stud_data['letter_id'],'letter_base64'=>$stud_data['letter_base64'],'letter_text'=>$stud_data['letter_text'],'letter_html'=>$stud_data['letter_html'],'letter_marks'=>$stud_data['letter_marks'],'statement_id'=>$stud_data['statement_id'],'statement_text'=>$stud_data['statement_text'],'statement_html'=>$stud_data['statement_html'],'statement_base64'=>$stud_data['statement_base64'],'statement_marks'=>$stud_data['statement_marks'],'mobile_que'=>$stud_data['mobile_que'],'mobile_ans'=>$stud_data['mobile_ans'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
    
                      $this->common_model->updateDetails('tbl_student','student_id',$result_data->student_id,$s_data);
                      $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                      $this->common_model->addData('tbl_student_result',$r_data);
                      $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                      foreach ($ans_data as $row) 
                      {
                          $data_ans[] = array('student_id'=>$row['stud_id'],'batch_id'=>$result_data->batch_id,'question_id'=>$row['question_id'],'stud_option_id'=>$row['stud_option_id']);
                      }
                      $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                  }
              }
              $stud_id[] = array('stud_id' => $stud_data['stud_id'] , 'exam_status'=>'Upload');
              $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
            }
            $result=$this->db->trans_complete();
        }
                
        if(isset($result) && !empty($result))
        {
            $json = array("status" => 1, "stud_id"=>$stud_id, "abc"=>"abc");
        }
        else
        {
            $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
            $json = array("status" => 1, "stud_id"=>$stud_id);
        }
        echo json_encode($json);
    }
    
    
    
    public function upload_db_test123()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $stud_data= $data['stud_data'];
        parse_str($stud_data, $stud_output);
        $data1 = array('db_status'=>'Upload'); 
        $stud_id = array();
        
        foreach ($stud_output as $key) 
        {
            $this->db->trans_start();
            $stud_data=$key['stud_data'];
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
              $ans_data=$key['ans_data']; 
              $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
              
              if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
              {
                  
                  $s_data=array('exam_status'=>'Upload','objective_marks'=>$stud_data['objective_marks'],'email_marks'=>$stud_data['email_marks'],'speed_marks'=>$stud_data['speed_marks'],'letter_marks'=>$stud_data['letter_marks'],'statement_marks'=>$stud_data['statement_marks'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);              
                  $r_data=array('student_id'=>$stud_data['stud_id'],'objective_marks'=>$stud_data['objective_marks'],'email_id'=>$stud_data['email_id'],'to'=>$stud_data['to'],'cc'=>$stud_data['cc'],'bcc'=>$stud_data['bcc'],'subject'=>$stud_data['subject'],'message'=>$stud_data['message'],'attachment_file'=>$stud_data['attachment_file'],'attachment_file1'=>$stud_data['attachment_file1'],'email_marks'=>$stud_data['email_marks'],'speed_id'=>$stud_data['speed_id'],'passage'=>$stud_data['passage'],'speed_marks'=>$stud_data['speed_marks'],'letter_id'=>$stud_data['letter_id'],'letter_base64'=>$stud_data['letter_base64'],'letter_text'=>$stud_data['letter_text'],'letter_html'=>$stud_data['letter_html'],'letter_marks'=>$stud_data['letter_marks'],'statement_id'=>$stud_data['statement_id'],'statement_text'=>$stud_data['statement_text'],'statement_html'=>$stud_data['statement_html'],'statement_base64'=>$stud_data['statement_base64'],'statement_marks'=>$stud_data['statement_marks'],'mobile_que'=>$stud_data['mobile_que'],'mobile_ans'=>$stud_data['mobile_ans'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
                  
                  $this->common_model->updateDetails('tbl_student','student_id',$result_data->student_id,$s_data);
                  $this->common_model->addData('tbl_student_result',$r_data);
                  foreach ($ans_data as $row ) 
                  {
                      $data_ans[] = array('student_id'=>$row['stud_id'],'question_id'=>$row['question_id'],'stud_option_id'=>$row['stud_option_id']);
                  }
                  $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
              }
              else
              {
                  if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
                  {
                      $s_data=array('exam_status'=>'Upload','objective_marks'=>$stud_data['objective_marks'],'email_marks'=>$stud_data['email_marks'],'speed_marks'=>$stud_data['speed_marks'],'letter_marks'=>$stud_data['letter_marks'],'statement_marks'=>$stud_data['statement_marks'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
    
                      $r_data=array('student_id'=>$stud_data['stud_id'],'objective_marks'=>$stud_data['objective_marks'],'email_id'=>$stud_data['email_id'],'to'=>$stud_data['to'],'cc'=>$stud_data['cc'],'bcc'=>$stud_data['bcc'],'subject'=>$stud_data['subject'],'message'=>$stud_data['message'],'attachment_file'=>$stud_data['attachment_file'],'attachment_file1'=>$stud_data['attachment_file1'],'email_marks'=>$stud_data['email_marks'],'speed_id'=>$stud_data['speed_id'],'passage'=>$stud_data['passage'],'speed_marks'=>$stud_data['speed_marks'],'letter_id'=>$stud_data['letter_id'],'letter_base64'=>$stud_data['letter_base64'],'letter_text'=>$stud_data['letter_text'],'letter_html'=>$stud_data['letter_html'],'letter_marks'=>$stud_data['letter_marks'],'statement_id'=>$stud_data['statement_id'],'statement_text'=>$stud_data['statement_text'],'statement_html'=>$stud_data['statement_html'],'statement_base64'=>$stud_data['statement_base64'],'statement_marks'=>$stud_data['statement_marks'],'mobile_que'=>$stud_data['mobile_que'],'mobile_ans'=>$stud_data['mobile_ans'],'mobile_marks'=>$stud_data['mobile_marks'],'submit_on'=>$stud_data['submit_on'],'grace'=>$stud_data['grace']);
    
                      $this->common_model->updateDetails('tbl_student','student_id',$result_data->student_id,$s_data);
                      $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                      $this->common_model->addData('tbl_student_result',$r_data);
                      $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                      foreach ($ans_data as $row) 
                      {
                          $data_ans[] = array('stud_id'=>$row['stud_id'],'question_id'=>$row['question_id'],'stud_option_id'=>$row['stud_option_id']);
                      }
                      $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                  }
              }
              $stud_id[] = array('stud_id' => $stud_data['stud_id'] , 'exam_status'=>'Upload');
              $this->common_model->updateDetails('tbl_institute','institute_id',$result_data->institute_id,$data1);
            }
            $result=$this->db->trans_complete();
        }
                
        if(isset($result)&& !empty($result))
        {
            $json = array("status" => 1, "stud_id"=>$stud_id, "abc"=>"abc");
        }
        else
        {
            $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
            $json = array("status" => 1, "stud_id"=>$stud_id);
        }
        echo json_encode($json);
    }
    
    
    
    
    /* this function get call from local once data get updated */
    /*public function upload_db()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $stud_data= $data['stud_data'];
        parse_str($stud_data, $stud_output);
        log_message('debug',print_r($stud_output,TRUE)); 
        if(isset($stud_output[0]['stud_data']['inst_id']))
        {
            $stud_id = array();
            $this->create_json($stud_output[0]['stud_data']['inst_id'],$stud_output);
            foreach ($stud_output as $row ) {
                $stud_id[] = array(
                    'stud_id' => $row['stud_data']['stud_id'] , 
                    'exam_status'=>'Upload'
                );
            }
            if(sizeof($stud_id) > 0)
            {
                $json = array("status" => 1, "stud_id"=>$stud_id);
            }
            else
            {
                $stud_id[] = array('stud_id' => 1 , 'exam_status'=>'Pending');
                $json = array("status" => 1, "stud_id"=>$stud_id);
            }
            echo json_encode($json);
        }
        else{
            return false;
        }
    }*/
    
    /* this function will create json file */
    public function create_json($id=1,$push_data=array('one'=>1,'two'=>2))
    {
        log_message('debug',print_r($id,true));
        if($id==false && sizeof($push_data)<0 ){
            return false;
        }
        $path_array = $this->getPath();
        $fname = $path_array['pending_dir'].DIRECTORY_SEPARATOR.$id.'-'.date('Y-m-d').'-'.rand().'.json';
        $json_data = json_encode($push_data);
        file_put_contents($fname, $json_data);
        return true;
    }
    
    /* this function returns dir path of pending, processing, complete */
    private function getPath()
    {
        $root = APPPATH.DIRECTORY_SEPARATOR.'../../exam_data';
        $pending_dir = $root.DIRECTORY_SEPARATOR.'pending';
        $processing_dir = $root.DIRECTORY_SEPARATOR.'processing';
        $complete_dir = $root.DIRECTORY_SEPARATOR.'complete';
        $failed_dir = $root.DIRECTORY_SEPARATOR.'failed';
        $empty_dir = $root.DIRECTORY_SEPARATOR.'empty';
        if(!file_exists($root)){
            @mkdir($root,0755,true);
        }
        if(!file_exists($pending_dir)){
            @mkdir($pending_dir,0755,true);
        }        
        if(!file_exists($processing_dir)){
            @mkdir($processing_dir,0755,true);
        }
        if(!file_exists($complete_dir)){
            @mkdir($complete_dir,0755,true);
        }
        if(!file_exists($failed_dir)){
            @mkdir($failed_dir,0755,true);
        }
        if(!file_exists($empty_dir)){
            @mkdir($empty_dir,0755,true);
        }
        return array(
            'root' => $root,
            'pending_dir' => $pending_dir,
            'processing_dir' => $processing_dir,
            'failed' => $failed_dir,
            'empty_files' => $empty_dir,
            'complete_dir' => $complete_dir,
        );
    }
    
    /* this function accepts file source and move to target director */
    private function moveFile($source, $target)
    {
        log_message('debug',print_r(__FILE__.'LINE:'.__LINE__.'source:target',true)); 
        log_message('debug',print_r($source,true)); 
        log_message('debug',print_r($target,true));
        $path_array = $this->getPath();
        echo is_cli()?"\n":'<span style="color:orange;font-weight:bold;">';
        echo ' File Moved => '.str_replace($path_array['root'].DIRECTORY_SEPARATOR,"", $target);
        echo is_cli()?"\n":'</span>';
        rename($source, $target);
    }
    
    private function pickFileForProcess()
    {
        $path_array = $this->getPath();
        $files = scandir ($path_array['pending_dir']);
        // print_r($files);
        $to_remove = array('.','..');
        $result = array_values(array_diff($files, $to_remove));
        // print_r($result);
        if($files && sizeof($files)>2){
            echo is_cli()?"\n":'<br><span style="color:green;font-weight:bold;">';
            echo " File Pick:".$files[2];
            echo is_cli()?"\n":'</span>';
            $firstFile = $path_array['pending_dir'].DIRECTORY_SEPARATOR . $result[0];
            $source = $firstFile;
            $target = $path_array['processing_dir'].DIRECTORY_SEPARATOR.$result[0];
            $this->moveFile($source, $target);
            return array(
                'state' => true,
                'file_path' => $target
            );
        }
        else{
            return array(
                'state' => false
            );
        }
    }
    
    /* this file returns json content to array */
    private function file2Array($path)
    {
        $path_array = $this->getPath();
        if(!$path){
            log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
            log_message('debug',print_r($path,true)); 
            echo is_cli()?"":'<br><span style="color:red;font-weight:bold;">';
            echo " File Not Valid";
            echo is_cli()?"":'</span>';
            return false;
        }
        $json = file_get_contents($path);
        $json_data = json_decode($json,true);
        if(sizeof($json_data)>0){
            log_message('debug',print_r($json_data,true)); 
            echo is_cli()?"":'<br><span style="color:green;font-weight:bold;">';
            echo " File Valid";
            echo is_cli()?"":'</span>';
            return $json_data;
        } else {
            echo is_cli()?"":'<br><span style="color:red;font-weight:bold;">';
            echo " File Invalid:";
            echo is_cli()?"":'</span>';
            return false;
        }
        
        return $json_data;
    }
    
    public function pickAny($max=5)
    {
        echo is_cli()?"":"<pre><br>";
        
        $path_array = $this->getPath();
        $files= array();
        for($i=1;$i<=$max;$i++){
            $file = $this->pickFileForProcess();
            if($file['state']){
                $files[] = $file;
            }
            else {
                echo is_cli()?"":"<br><b>Reached Empty Dir!</b><br>";
                break;
            }
        }
        if(sizeof($files)>0){
            $i=1;
            echo is_cli()?"\n":"<hr><b>";
            echo "Processing Files: Available: ".sizeof($files)." Requested: ".$max;
            echo " Date:". date('d-m-y h:i:s') ;
            echo is_cli()?"\n":"</b><hr>";
            foreach($files as $file) {
                echo is_cli()?"\n":"<br>";
                echo $i.") Processing file: ".str_replace($path_array['root'].DIRECTORY_SEPARATOR,"", $file['file_path']);
                echo " File Size:". $this->getFileSizeKB($file['file_path']).' KB' ;
                $this->process_json($file);
                echo is_cli()?"\n":"<hr>";
                $i++;
            }
        }
        else{
            echo is_cli()?"":"<br><b>Done Job!</b><br>";
        }
        echo is_cli()?"":"</pre>";
    }
    
    /* this function will process data & upload on server */
    public function process_json($file='')
    {
        
        $path_array = $this->getPath();
        if(!empty($file)){
            $pickFile = $file;
        }else{
            $pickFile = $this->pickFileForProcess();  
        }
        $target = '';
        if($pickFile['state']){
            $json = $this->file2Array($pickFile['file_path']);
            log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
            log_message('debug',print_r($json,true));
            if($json) {
                $status = $this->upload_batch_db($json);
                $file_name = basename($pickFile['file_path']);
                if($status['status'] == true){
                    $target = $path_array['complete_dir'].DIRECTORY_SEPARATOR.$file_name;
                    echo is_cli()?" ":'<br><span style="font-weight:bold;font-size:12px;">';
                    echo " Completed!";
                    echo is_cli()?"":"</span><br>";
                }
                else{
                    log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
                    log_message('debug',print_r('File not processed'.$pickFile['file_path'],true)); 
                    
                    echo is_cli()?" ":'<br><span style="font-weight:bold;font-size:12px;">';
                    echo " File not processed!";
                    echo is_cli()?"":'</span><br>';
                    
                    $file_name = basename($pickFile['file_path']);
                    $target = $path_array['failed'].DIRECTORY_SEPARATOR.$file_name;
                }
            } else {
                log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
                log_message('debug',print_r('File is empty:'.$pickFile['file_path'],true));
                
                echo is_cli()?"":'<br><span style="color:red;font-weight:bold;font-size:12px;">';
                echo ' File is empty (moved->empty_file)!';
                echo is_cli()?"":'</span>';
                
                $file_name = basename($pickFile['file_path']);
                $target = $path_array['empty_files'].DIRECTORY_SEPARATOR.$file_name;
            }
            $this->moveFile($pickFile['file_path'],$target);
        }
        else{
           echo is_cli()?"":'<br><span style="color:red;font-weight:bold;font-size:12px;"> Empty Folder pickFileForProcess End!</span>';
        }
    }
    
    protected function getFileSizeKB($file)
    {
        if(file_exists($file)) {
            $filesize = filesize($file); // bytes
            $filesize = round($filesize / 1024 , 1);
            return $filesize;
        }
        return false;
    }
    
    public function upload_batch_db_failed($stud_output)
    { 
        $stud_id = array();
        $update_student = array();
        $insert_student_result = array();
        $insert_user_answer = array();
        foreach ($stud_output as $key) 
        {
            $stud_data=$key['stud_data'];
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
                $ans_data=$key['ans_data']; 
                $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
                if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
                {
                    $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                    $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                    log_message('error',print_r('pending if',true));
                    $s_data = array(
                        'student_id'=>$stud_data['stud_id'],
                        'exam_status'=>'Upload',
                        'objective_marks'=>$stud_data['objective_marks']??NULL,
                        'email_marks'=>$stud_data['email_marks']??NULL,
                        'speed_marks'=>$stud_data['speed_marks']??NULL,
                        'letter_marks'=>$stud_data['letter_marks']??NULL,
                        'statement_marks'=>$stud_data['statement_marks']??NULL,
                        'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );              
                    $r_data=array(
                        'student_id'=>$stud_data['stud_id'],
                        'objective_marks'=>$stud_data['objective_marks'],
                        'email_id'=>$stud_data['email_id']??NULL,
                        'to'=>$stud_data['to']??NULL,
                        'cc'=>$stud_data['cc']??NULL,
                        'bcc'=>$stud_data['bcc']??NULL,
                        'subject'=>$stud_data['subject']??NULL,
                        'message'=>$stud_data['message']??'',
                        'attachment_file'=>$stud_data['attachment_file']??NULL,
                        'attachment_file1'=>$stud_data['attachment_file1']??NULL,
                        'email_marks'=>$stud_data['email_marks']??NULL,
                        'speed_id'=>$stud_data['speed_id'],
                        'passage'=>$stud_data['passage'],
                        'speed_marks'=>$stud_data['speed_marks'],
                        'letter_id'=>$stud_data['letter_id'],
                        'letter_base64'=>$stud_data['letter_base64'],
                        'letter_text'=>$stud_data['letter_text'],
                        'letter_html'=>$stud_data['letter_html'],
                        'letter_marks'=>$stud_data['letter_marks'],
                        'statement_id'=>$stud_data['statement_id'],
                        'statement_text'=>$stud_data['statement_text'],
                        'statement_html'=>$stud_data['statement_html'],
                        'statement_base64'=>$stud_data['statement_base64'],
                        'statement_marks'=>$stud_data['statement_marks'],
                        'mobile_que'=>$stud_data['mobile_que']??NULL,
                        'mobile_ans'=>$stud_data['mobile_ans']??NULL,
                        'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );
                    $update_student[]=$s_data;
                    
                    $insert_student_result[]=$r_data;
                    
                    foreach ($ans_data as $row ) 
                    {
                        $data_ans = array( 
                            'student_id'=>$row['stud_id'],
                            'question_id'=>$row['question_id'],
                            'stud_option_id'=>$row['stud_option_id']??NULL
                        );
                    }
                    $insert_user_answer[] = $data_ans;
                }
                else
                {
                    log_message('error',print_r('pending else',true));
                    if($result_data->objective_marks <= $stud_data['objective_marks'] OR $result_data->speed_marks <= $stud_data['speed_marks'])
                    {
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                        log_message('error',print_r('objective_marks if',true));
                        $s_data=array(
                            'student_id'=>$stud_data['stud_id'],
                            'exam_status'=>'Upload',
                            'objective_marks'=>$stud_data['objective_marks']??NULL,
                            'email_marks'=>$stud_data['email_marks']??NULL,
                            'speed_marks'=>$stud_data['speed_marks']??NULL,
                            'letter_marks'=>$stud_data['letter_marks']??NULL,
                            'statement_marks'=>$stud_data['statement_marks']??NULL,
                            'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $r_data=array(
                            'student_id'=>$stud_data['stud_id'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_id'=>$stud_data['email_id']??NULL,
                            'to'=>$stud_data['to']??NULL,
                            'cc'=>$stud_data['cc']??NULL,
                            'bcc'=>$stud_data['bcc']??NULL,
                            'subject'=>$stud_data['subject']??NULL,
                            'message'=>$stud_data['message']??'',
                            'attachment_file'=>$stud_data['attachment_file']??NULL,
                            'attachment_file1'=>$stud_data['attachment_file1']??NULL,
                            'email_marks'=>$stud_data['email_marks']??NULL,
                            'speed_id'=>$stud_data['speed_id'],
                            'passage'=>$stud_data['passage'],
                            'speed_marks'=>$stud_data['speed_marks'],
                            'letter_id'=>$stud_data['letter_id'],
                            'letter_base64'=>$stud_data['letter_base64'],
                            'letter_text'=>$stud_data['letter_text'],
                            'letter_html'=>$stud_data['letter_html'],
                            'letter_marks'=>$stud_data['letter_marks'],
                            'statement_id'=>$stud_data['statement_id'],
                            'statement_text'=>$stud_data['statement_text'],
                            'statement_html'=>$stud_data['statement_html'],
                            'statement_base64'=>$stud_data['statement_base64'],
                            'statement_marks'=>$stud_data['statement_marks'],
                            'mobile_que'=>$stud_data['mobile_que']??NULL,
                            'mobile_ans'=>$stud_data['mobile_ans']??NULL,
                            'mobile_marks'=>$stud_data['mobile_marks']??NULL,
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $update_student[] = $s_data;
                        $insert_student_result[] = $r_data;
                        foreach ($ans_data as $row) 
                        {
                            $data_ans = array(
                                'student_id'=>$row['stud_id'],
                                'question_id'=>$row['question_id'],
                                'stud_option_id'=>$row['stud_option_id']??NULL
                            );
                        }
                            $insert_user_answer[] = $data_ans;
                    }
                }
            }
        }
        $this->load->model('standard/standard_model'); 
        $stud_status = $this->standard_model->update_batch('tbl_student',$update_student,'student_id',true);
        $stud_result = $this->standard_model->insert_batch('tbl_student_result',$insert_student_result,true); 
        $stud_user_status = $this->standard_model->insert_batch('tbl_user_answer',$insert_user_answer,true);
        if($stud_status && $stud_result && $stud_user_status)
        {
            $json = array("status" => true);
        }
        else
        {
            $json = array("status" => false);
        }
        return ($json);
    }
    
    private function pickFileForProcessFromFailed()
    {
        $path_array = $this->getPath();
        $files = scandir ($path_array['failed']);
        $to_remove = array('.','..');
        $result = array_values(array_diff($files, $to_remove));
        if($files && sizeof($files)>2)
        {
            echo is_cli()?"\n":'<br><span style="color:green;font-weight:bold;">';
            echo " File Pick:".$files[2];
            echo is_cli()?"\n":'</span><br>';
            $firstFile = $path_array['failed'].DIRECTORY_SEPARATOR . $result[0];
            $source = $firstFile;
            $target = $path_array['processing_dir'].DIRECTORY_SEPARATOR.$result[0];
            $this->moveFile($source, $target);
            return array(
                'state' => true,
                'file_path' => $target
            );
        }
        else
        {
            return array(
                'state' => false
            );
        }
    }
    
    public function pickAny_fromFailed($max=5)
    {
        echo is_cli()?"\n":"<pre><br>";
        $path_array = $this->getPath();
        $files= array();
        for($i=1;$i<=$max;$i++)
        {
            $file = $this->pickFileForProcessFromFailed();
            if($file['state'])
            {
                $files[] = $file;
            }
            else 
            {
                echo is_cli()?"\n":"<br><b>";
                echo "Reached Empty Dir!";
                echo is_cli()?"\n":"</b><br>";
                break;
            }
        }
        if(sizeof($files)>0)
        {
            $i=1;
            echo is_cli()?"\n":"<hr><B>";
            echo "Processing No. Files: Available: ".sizeof($files)." Requested: ".$max;
            echo is_cli()?"\n":"</b><hr>";
            foreach($files as $file) 
            {
                echo is_cli()?"\n":"<br>";
                echo $i.") Processing file: ".str_replace($path_array['root'].DIRECTORY_SEPARATOR,"", $file['file_path']);
                echo " File Size:". $this->getFileSizeKB($file['file_path']).' KB' ;
                $this->process_json($file);
                echo is_cli()?"\n":"<hr>";
                $i++;
            }
        }
        else{
            echo is_cli()?"\n":"<br><b>";
            echo "Directory Empty! Done Job!";
            echo is_cli()?"\n":"</b><br>";
        }
        echo is_cli()?"\n":"</pre>";
    }
    
    public function process_json_forFailed($file='')
    {
        $path_array = $this->getPath();
        if(!empty($file)){
            $pickFile = $file;
        }else{
            $pickFile = $this->pickFileForProcessFromFailed();  
        }
        $target = '';
        if($pickFile['state'])
        {
            $json = $this->file2Array($pickFile['file_path']);
            log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
            log_message('debug',print_r($json,true));
            if($json) {
                $status = $this->upload_batch_db_failed($json);
                $file_name = basename($pickFile['file_path']);
                if($status['status'] == true)
                {
                    $target = $path_array['complete_dir'].DIRECTORY_SEPARATOR.$file_name;
                    echo is_cli()?"\n":'<br><span style="font-weight:bold;font-size:12px;">';
                    echo " <span style='font-size:16px;'>Completed!</span>";
                    echo is_cli()?"":"</span><br>";
                }
                else
                {
                    log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
                    log_message('debug',print_r('File not processed'.$pickFile['file_path'],true));

                    echo is_cli()?"\n":'<br><span style="font-weight:bold;font-size:12px;">';
                    echo " File not processed!";
                    echo is_cli()?"":'</span><br>';

                    $file_name = basename($pickFile['file_path']);
                    $target = $path_array['failed'].DIRECTORY_SEPARATOR.$file_name;
                }
            } 
            else 
            {
                log_message('debug',print_r(__FILE__.'LINE:'.__LINE__,true)); 
                log_message('debug',print_r('File is empty:'.$pickFile['file_path'],true));
                
                echo is_cli()?"\n":'<br><span style="color:red;font-weight:bold;font-size:12px;">';
                echo ' File is empty (moved->empty_file)!';
                echo is_cli()?"":'</span>';
                
                $file_name = basename($pickFile['file_path']);
                $target = $path_array['empty_files'].DIRECTORY_SEPARATOR.$file_name;
            }
            $this->moveFile($pickFile['file_path'],$target);
        }
        else
        {
           echo is_cli()?"\n":'<br><span style="color:red;font-weight:bold;font-size:12px;">';
           echo "Empty Folder pickFileForProcess End!";
           echo is_cli()?"":'</span>';
        }
    }
    
    public function upload_batch_db_failed_1($stud_output)
    { 
        $stud_id = array();
        foreach ($stud_output as $key) 
        {
            $this->db->trans_start();
            $stud_data=$key['stud_data'];
            if(isset($key['ans_data']) && !empty($key['ans_data']))
            {
                $ans_data=$key['ans_data']; 
                $result_data = $this->common_model->selectDetailsWhr('tbl_student','student_id',$stud_data['stud_id']);
                if(isset($result_data->exam_status) && !empty($result_data->exam_status) && ($result_data->exam_status=='Pending'))
                {
                    $s_data = array(
                        'exam_status'=>$stud_data['exam_status'],
                        'objective_marks'=>$stud_data['objective_marks'],
                        'email_marks'=>$stud_data['email_marks'],
                        'speed_marks'=>$stud_data['speed_marks'],
                        'letter_marks'=>$stud_data['letter_marks'],
                        'statement_marks'=>$stud_data['statement_marks'],
                        'mobile_marks'=>$stud_data['mobile_marks'],
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );              
                    $r_data = array(
                        'student_id'=>$stud_data['stud_id'],
                        'objective_marks'=>$stud_data['objective_marks'],
                        'email_id'=>$stud_data['email_id'],
                        'to'=>$stud_data['to'],
                        'cc'=>$stud_data['cc'],
                        'bcc'=>$stud_data['bcc'],
                        'subject'=>$stud_data['subject'],
                        'message'=>$stud_data['message'],
                        'attachment_file'=>$stud_data['attachment_file'],
                        'attachment_file1'=>$stud_data['attachment_file1'],
                        'email_marks'=>$stud_data['email_marks'],
                        'speed_id'=>$stud_data['speed_id'],
                        'passage'=>$stud_data['passage'],
                        'speed_marks'=>$stud_data['speed_marks'],
                        'letter_id'=>$stud_data['letter_id'],
                        'letter_base64'=>$stud_data['letter_base64'],
                        'letter_text'=>$stud_data['letter_text'],
                        'letter_html'=>$stud_data['letter_html'],
                        'letter_marks'=>$stud_data['letter_marks'],
                        'statement_id'=>$stud_data['statement_id'],
                        'statement_text'=>$stud_data['statement_text'],
                        'statement_html'=>$stud_data['statement_html'],
                        'statement_base64'=>$stud_data['statement_base64'],
                        'statement_marks'=>$stud_data['statement_marks'],
                        'mobile_que'=>$stud_data['mobile_que'],
                        'mobile_ans'=>$stud_data['mobile_ans'],
                        'mobile_marks'=>$stud_data['mobile_marks'],
                        'submit_on'=>$stud_data['submit_on'],
                        'grace'=>$stud_data['grace']
                    );
                    $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
                    $this->common_model->addData('tbl_student_result',$r_data);
                    foreach ($ans_data as $row ) 
                    {
                        $data_ans[] = array( 
                            'student_id'=>$row['stud_id'],
                            'question_id'=>$row['question_id'],
                            'stud_option_id'=>$row['stud_option_id']
                        );
                    }
                    $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                }
                else
                {
                    if($result_data->objective_marks < $stud_data['objective_marks'] OR $result_data->speed_marks < $stud_data['speed_marks'])
                    {
                        $s_data=array(
                            'exam_status'=>$stud_data['exam_status'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_marks'=>$stud_data['email_marks'],
                            'speed_marks'=>$stud_data['speed_marks'],
                            'letter_marks'=>$stud_data['letter_marks'],
                            'statement_marks'=>$stud_data['statement_marks'],
                            'mobile_marks'=>$stud_data['mobile_marks'],
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $r_data=array(
                            'student_id'=>$stud_data['stud_id'],
                            'objective_marks'=>$stud_data['objective_marks'],
                            'email_id'=>$stud_data['email_id'],
                            'to'=>$stud_data['to'],
                            'cc'=>$stud_data['cc'],
                            'bcc'=>$stud_data['bcc'],
                            'subject'=>$stud_data['subject'],
                            'message'=>$stud_data['message'],
                            'attachment_file'=>$stud_data['attachment_file'],
                            'attachment_file1'=>$stud_data['attachment_file1'],
                            'email_marks'=>$stud_data['email_marks'],
                            'speed_id'=>$stud_data['speed_id'],
                            'passage'=>$stud_data['passage'],
                            'speed_marks'=>$stud_data['speed_marks'],
                            'letter_id'=>$stud_data['letter_id'],
                            'letter_base64'=>$stud_data['letter_base64'],
                            'letter_text'=>$stud_data['letter_text'],
                            'letter_html'=>$stud_data['letter_html'],
                            'letter_marks'=>$stud_data['letter_marks'],
                            'statement_id'=>$stud_data['statement_id'],
                            'statement_text'=>$stud_data['statement_text'],
                            'statement_html'=>$stud_data['statement_html'],
                            'statement_base64'=>$stud_data['statement_base64'],
                            'statement_marks'=>$stud_data['statement_marks'],
                            'mobile_que'=>$stud_data['mobile_que'],
                            'mobile_ans'=>$stud_data['mobile_ans'],
                            'mobile_marks'=>$stud_data['mobile_marks'],
                            'submit_on'=>$stud_data['submit_on'],
                            'grace'=>$stud_data['grace']
                        );
                        $this->common_model->updateDetails('tbl_student','student_id',$stud_data['stud_id'],$s_data);
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_student_result');
                        $this->common_model->addData('tbl_student_result',$r_data);
                        $this->db->where('student_id',$stud_data['stud_id'])->delete('tbl_user_answer');
                        foreach ($ans_data as $row) 
                        {
                            $data_ans[] = array(
                                'student_id'=>$row['stud_id'],
                                'question_id'=>$row['question_id'],
                                'stud_option_id'=>$row['stud_option_id']
                            );
                        }
                        $this->common_model->SaveMultiData('tbl_user_answer',$data_ans);
                    }
                }
            }
            $result=$this->db->trans_complete();
        }
                
        if(isset($result)&& !empty($result))
        {
            $json = array("status" => true);
        }
        else
        {
            $json = array("status" => false);
        }
        return ($json);
    }
    // END
    public function update_result()
    {
        /* Query to set result of all course except special skills */
        // $stud_data=$this->web_model->set_result(); 
        /* Query to set result of special skills only */
        $stud_data=$this->web_model->set_result_ssd();
        
        // foreach ($stud_data as $key) 
        // {   
        //     if($key->course_master_id==7)
        //     {
        //         if($key->speed_marks ==40)   
        //         {   
        //             $letter_marks=15;
        //             $statement_marks=15;
        //         }
        //         else if($key->speed_marks > 35)   
        //         {   
        //             $letter_marks=rand(12,14);
        //             $statement_marks=rand(12,14);
        //         }
        //         else if($key->speed_marks > 30)   
        //         {   
        //             $letter_marks=rand(10,12);
        //             $statement_marks=rand(10,12);
        //         }
        //         else  
        //         {
        //             $letter_marks=rand(8,9);
        //             $statement_marks=rand(8,9);
        //         }
        //         $data=array(
        //             'letter_marks'=>$letter_marks,
        //             'statement_marks'=>$statement_marks,
        //             'flag'=>'1'
        //         );
                // if($key->objective_marks==14 && $key->speed_marks >= 9)
                // {
                //   $data['grace1']='*';
                //   $data['objective_marks']=16;
                // }
                // if($key->objective_marks >=14 && $key->speed_marks >= 9 && $key->speed_marks < 10 )
                // {
                //     $data['grace']='*';
                //     $data['speed_marks']=10;
                // }     
        //     }
        //     else
        //     {
        //         if($key->speed_marks == 20)   
        //         {   
        //             $letter_marks=15;
        //             $statement_marks=10;
        //         }
        //         else if($key->speed_marks > 15)   
        //         {   
        //             $letter_marks=rand(13,15);
        //             $statement_marks=rand(9,10);
        //         }
        //         else if($key->speed_marks > 10)   
        //         {   
        //             $letter_marks=rand(10,13);
        //             $statement_marks=rand(7,9);
        //         }
        //         else  
        //         {
        //             $letter_marks=rand(8,10);
        //             $statement_marks=rand(6,7);
        //         }
        //         $data=array(
        //             'letter_marks'=>$letter_marks,
        //             'statement_marks'=>$statement_marks,
        //             'flag'=>'1'
        //         );
        //         if($key->objective_marks==24 && $key->speed_marks >= 9)
        //         {
        //             $data['grace1']='*';
        //             $data['objective_marks']=26;
        //         }
        //         if($key->objective_marks >=24 && $key->speed_marks >= 9 && $key->speed_marks < 10 )
        //         {
        //             $data['grace']='*';
        //             $data['speed_marks']=10;
        //         }        
        //     }
        //     $this->db->trans_start(); 
        //     $this->common_model->updateDetails('tbl_student','student_id',$key->student_id,$data);
        //     $this->common_model->updateDetails('tbl_student_result','student_id',$key->student_id,$data);
        //     $result=$this->db->trans_complete();
        // }
        
        foreach ($stud_data as $key) 
        {   
            if($key->course_master_id==7)
            {
                if($key->speed_marks ==40)  
                {   
                    $letter_marks=15;
                    $statement_marks=15;
                }
                else if($key->speed_marks > 35)   
                {   
                    $letter_marks=rand(12,14);
                    $statement_marks=rand(12,14);
                }
                else if($key->speed_marks > 20)   
                {   
                    $letter_marks=rand(10,12);
                    $statement_marks=rand(10,12);
                }
                else  
                {
                    $letter_marks=rand(8,9);
                    $statement_marks=rand(8,9);
                }
                $data=array(
                    'letter_marks'=>$letter_marks,
                    'statement_marks'=>$statement_marks,
                    'flag'=>'1'
                );
                // if($key->objective_marks==9 && $key->speed_marks >= 15)
                // {
                //   $data['grace1']='*';
                //   $data['objective_marks']=10;
                // }
                // if($key->objective_marks >=14 && $key->speed_marks >= 9 && $key->speed_marks < 10 )
                // {
                //     $data['grace']='*';
                //     $data['speed_marks']=10;
                // }     
            }
            else
            {
                if($key->speed_marks == 40)   
                {   
                    $letter_marks=15;
                    $statement_marks=15;
                }
                else if($key->speed_marks > 35)   
                {   
                    $letter_marks=rand(13,15);
                    $statement_marks=rand(13,15);
                }
                else if($key->speed_marks > 25)   
                {   
                    $letter_marks=rand(12,14);
                    $statement_marks=rand(12,14);
                }
                else  
                {
                    $letter_marks=rand(8,11);
                    $statement_marks=rand(8,11);
                }
                $data=array(
                    'letter_marks'=>$letter_marks,
                    'statement_marks'=>$statement_marks,
                    'flag'=>'1'
                );
                // if($key->objective_marks==24 && $key->speed_marks >= 9)
                // {
                //     $data['grace1']='*';
                //     $data['objective_marks']=26;
                // }
                // if($key->objective_marks >=24 && $key->speed_marks >= 9 && $key->speed_marks < 10 )
                // {
                //     $data['grace']='*';
                //     $data['speed_marks']=10;
                // }        
            }
            $this->db->trans_start(); 
            $this->common_model->updateDetails('tbl_student','student_id',$key->student_id,$data);
            $this->common_model->updateDetails('tbl_student_result','student_id',$key->student_id,$data);
            $result=$this->db->trans_complete();
        }
        
        echo 'result update Successfully';
    }
      
    public function advertise_link()
    {
        $this->load->view('site/advertise_link');
    }

    public function update_speed_marks()
    {
        $data['speed_data']=$this->web_model->featch_100_data1();
        $this->load->view('test1',$data);
    }
    public function update_speed_mark_new()
    {
        $stud_id=$this->input->post('s_id');
        $marks=$this->input->post('t_marks');
        for ($i=0; $i < count($stud_id) ; $i++) 
        {             
            $stud[]=array(
                'student_id' =>$stud_id[$i],
                'speed_marks'=>$marks[$i],
                'speed_mark_set'=>'Y'
            );
            $stud1[]=array(
                'student_id' =>$stud_id[$i],
                'speed_marks'=>$marks[$i]
            );
        }
        $this->db->trans_start(); 
        $this->common_model->update_batch('tbl_student_result',$stud,'student_id');
        $this->common_model->update_batch('tbl_student',$stud1,'student_id');
        $result=$this->db->trans_complete();
        if($result)
        {
            $this->json->jsonReturn(array(  
                'state'=>TRUE,
                'msg'=>'Marks Details Saved Successfully!'
            ));
        }
    }   
      
    public function update_email_marks()
    {
        $data['email_data']=$this->web_model->featch_100_data();
        $this->load->view('test',$data);
    }
      
    public function update_email_mark_new()
    {
        $stud_id=$this->input->post('s_id');
        $marks=$this->input->post('t_marks');
        for ($i=0; $i < count($stud_id) ; $i++) 
        { 
            $stud[]=array(
                'student_id' =>$stud_id[$i],
                'email_marks'=>$marks[$i],
                'email_mark_set'=>'Y'
            );
            $stud1[]=array(
                'student_id' =>$stud_id[$i],
                'email_marks'=>$marks[$i]
            );
        }
        $this->db->trans_start(); 
        $this->common_model->update_batch('tbl_student_result',$stud,'student_id');
        $this->common_model->update_batch('tbl_student',$stud1,'student_id');
        $result=$this->db->trans_complete();
        if($result)
        {
            $this->json->jsonReturn(array(  
                'state'=>TRUE,
                'msg'=>'Marks Details Saved Successfully!'
            ));
        }
    }
}