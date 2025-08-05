<?php  
$institute_code = $this->session->userdata('institute_code');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exam Result | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url(); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Metronic Shop UI passage" name="passage">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">
    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:passage" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <style type="text/css">
        ins{
            color:red;
            background:#FFE6E6;
        }

        del{
            color:green;
            background:#E6FFE6;
        }
        .cust_font{
            font-weight: 500;
            margin: 0 0 7px;
        }
        .portlet.box > .portlet-body {
            background-color: #fff;
            padding: 25px;
        }
        .section_cap{
            color: #e6400c;
        }
    </style>
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <div class="row margin-bottom-40">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> 
                                    <h4 class="cust_font">Student Name : <?php echo $stud_data->stud_full_name; ?></h4> 
                                </div>
                                <div class="caption" style="float: right;"> 
                                    <h4 class="cust_font">Course Name : <?php echo $stud_data->course_full_name; ?></h4> 
                                </div>

                                <!-- <span style="font-size: 15px;margin-top: 8px;">
                                  <i class="fa fa-user" ></i> <b>Student Name :</b> <?php echo $stud_data->stud_full_name; ?> 
                                </span> 
                                <span style="float:right; font-size: 15px;margin-top: 8px;">
                                  <i class="fa fa-book"></i> <b>Course Name :</b> <?php echo $stud_data->course_full_name; ?>
                                </span>        -->    
                            </div>
                            <div class="portlet-body">                            
                                <!----- objective  -->
                                <?php if(isset($question_data) && !empty($question_data))
                                { $i=1; ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="caption-subject section_cap bold uppercase"> <h4><b>Section 1 -  Objective </b></h4> </span>
                                            <hr/>
                                            <?php foreach ($question_data as $key)
                                            {
                                                $obj_option_data=$this->common_model->selectAllWhr('tbl_option','question_id',$key->question_id); ?>
                                                <div class="inline-display" > 
                                                    <b>(<?php echo $i++; ?>) <?php echo isset($key->question_english) && !empty($key->question_english)?$key->question_english:''; ?> </b>
                                                </div>
                                                <br>
                                                <div class="radio-list">
                                                    <?php  $j=1; if(isset($obj_option_data) && !empty($obj_option_data)){
                                                        foreach ($obj_option_data as $row) 
                                                        { ?>
                                                            <label style="<?php if($key->option_id==$row->option_id){ echo 'color:green;';}else if($key->stud_option_id==$row->option_id){ echo 'color:red;';} ?>">
                                                                [<?php echo $j; ?>]
                                                                <?php echo $row->option;?>
                                                            </label>
                                                        <?php $j++; }
                                                    } ?>
                                                </div><br>
                                                <?php if($key->option_id==$key->stud_option_id){?>                                  
                                                    <div class="alert alert-success"> <strong style="color:green;">Correct! </strong>You made correct Selection. </div><hr style="margin: 5px;">
                                                <?php }else if($key->stud_option_id==null) { ?>
                                                    <div class="alert alert-warning" style="color:brown;"> You didn't attempted this question. </div><hr style="margin: 5px;">
                                                <?php }else{ ?>
                                                    <div class="alert alert-danger"> <strong style="color:red;">Incorrect!</strong> You made wrong selection. </div><hr style="margin: 5px;">
                                                <?php } 
                                            } ?>
                                        </div>
                                    </div>
                                <?php $i++; } ?>
                                <br>
                                <!----- email  -->
                                <?php if($stud_data->course_master_id!=7)
                                { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="caption-subject section_cap bold uppercase"> <h4><b>Section 2 - Email</b></h4> </span>
                                            <hr >
                                        </div>
                                        <div class="col-md-6">
                                            <div class="portlet light" >
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-green-sharp bold uppercase">Question:</span>      
                                                    </div>                  
                                                </div>
                                                <div class="portlet-body ">
                                                    <?php if(isset($email_data) && !empty($email_data)) 
                                                    { ?>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">To:</span> &nbsp; <?php echo (isset($email_data->to) && !empty($email_data->to))?$email_data->to:''; ?></p>
                                                        <?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
                                                        { ?>
                                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Cc:</span> &nbsp; <?php echo (isset($email_data->cc) && !empty($email_data->cc))?$email_data->cc:''; ?></p>
                                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Bcc:</span> &nbsp; <?php echo (isset($email_data->bcc) && !empty($email_data->bcc))?$email_data->bcc:''; ?></p>
                                                        <?php }?>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Subject:</span>&nbsp; <?php echo (isset($email_data->subject) && !empty($email_data->subject))?$email_data->subject:''; ?></p>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Message:</span>&nbsp; <br> <p style="text-align:justify; font-size: 14px;"><?php echo (isset($email_data->message) && !empty($email_data->message))?$email_data->message:''; ?></p></p>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&nbsp; <?php echo (isset($email_data->attachment_file) && !empty($email_data->attachment_file))?$email_data->attachment_file:''; ?></p>
                                                        <?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
                                                        { ?>
                                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&nbsp; <?php echo (isset($email_data->attachment_file1) && !empty($email_data->attachment_file1))?$email_data->attachment_file1:''; ?></p>
                                                        <?php }
                                                    }?>                     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="portlet light" >
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-green-sharp bold uppercase">Answer:</span>      
                                                    </div>                  
                                                </div>
                                                <div class="portlet-body main_div">
                                                    <?php if(isset($stud_details) && !empty($stud_details)) 
                                                    {  
                                                        $que_to = trim($email_data->to);
                                                        $ans_to = trim($stud_details->to);
                                                        if($que_to==$ans_to) {$to_ans=$ans_to; } else {$to_ans='<ins>'.$ans_to.'</ins>'; }

                                                        $que_cc = trim($email_data->cc);
                                                        $ans_cc = trim($stud_details->cc);
                                                        if ($que_cc==$ans_cc) {$cc_ans=$ans_cc; } else {$cc_ans='<ins>'.$ans_cc.'</ins>'; }

                                                        $que_bcc = trim($email_data->bcc);
                                                        $ans_bcc = trim($stud_details->bcc);
                                                        if ($que_bcc==$ans_bcc) {$bcc_ans=$ans_bcc; } else {$bcc_ans='<ins>'.$ans_bcc.'</ins>'; }

                                                        $que_sub = trim($email_data->subject);
                                                        $ans_sub = trim($stud_details->subject);
                                                        if ($que_sub==$ans_sub) {$sub_ans=$ans_sub; } else {$sub_ans='<ins>'.$ans_sub.'</ins>'; }

                                                        $que_attachment = trim($email_data->attachment_file);
                                                        $ans_attachment = trim($stud_details->attachment_file);
                                                        if( $que_attachment==$ans_attachment) {$attachment_ans=$ans_attachment; } else {$attachment_ans='<ins>'.$ans_attachment.'</ins>'; }
                                                       
                                                        $que_attachment_file = trim($email_data->attachment_file1);
                                                        $ans_attachment_file = trim($stud_details->attachment_file1);
                                                        if( $que_attachment_file==$ans_attachment_file) {$attachment_ans1=$ans_attachment_file; } else {$attachment_ans1='<ins>'.$ans_attachment_file.'</ins>'; }
                                                    } ?>
                                                    <p style="white-space: pre-wrap; font-size: 14px; display:none;" class="que" ><?php echo $email_data->message; ?></p>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">To:</span> &nbsp; <?php echo (isset($to_ans) && !empty($to_ans))?$to_ans:''; ?></p>
                                                    <?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
                                                    { ?>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Cc:</span> &nbsp; <?php echo (isset($cc_ans) && !empty($cc_ans))?$cc_ans:''; ?></p>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Bcc:</span> &nbsp; <?php echo (isset($bcc_ans) && !empty($bcc_ans))?$bcc_ans:''; ?></p>
                                                    <?php }?>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Subject:</span>&nbsp; <?php echo (isset($sub_ans) && !empty($sub_ans))?$sub_ans:''; ?></p>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Message:</span>&nbsp; <br><p class="ans"  style="text-align:justify; font-size: 14px;"><?php echo (isset($stud_details->message) && !empty($stud_details->message))?$stud_details->message:''; ?></p></p>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&nbsp; <?php echo (isset($attachment_ans) && !empty($attachment_ans))?$attachment_ans:''; ?></p>
                                                    <?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
                                                    { ?>
                                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&nbsp; <?php echo (isset($attachment_ans1) && !empty($attachment_ans1))?$attachment_ans1:''; ?></p>
                                                    <?php }?>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <!----- Speed  -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="caption-subject section_cap bold uppercase">
                                          <?php if($stud_data->course_master_id!=7){ ?>
                                            <h4><b>Section 3 - Speed Passage</b></h4>
                                          <?php } else { ?>
                                            <h4><b>Section 2 - Speed Passage</b></h4>
                                          <?php } ?>
                                        </span>
                                        <hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="portlet light" >
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject font-green-sharp bold uppercase">Question:</span>      
                                                </div>                  
                                            </div>
                                            <div class="portlet-body">
                                                <p style="text-align: justify; white-space: pre-wrap; font-size: 14px;"><?php echo (isset($speed_data->passage) && !empty($speed_data->passage))?$speed_data->passage:''; ?></p>      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="portlet light" >
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject font-green-sharp bold uppercase">Answer:</span>      
                                                </div>                  
                                            </div>
                                            <div class="portlet-body main_div">
                                                <p style="text-align: justify; white-space: pre-wrap; font-size: 14px; display: none;" class="que"><?php echo (isset($speed_data->passage) && !empty($speed_data->passage))?$speed_data->passage:''; ?></p>
                                                <p class="ans" style="text-align: justify; white-space: pre-wrap; font-size: 14px;"><?php echo (isset($stud_details->passage) && !empty($stud_details->passage))?$stud_details->passage:''; ?></p>       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($stud_data->course_master_id!=7){ ?>
                                    
                                  <?php } else { ?>
                                    <hr>
                                  <?php } ?>
                                <!----- Mobile   -->
                                <div class="row">
                                    <?php if($stud_data->course_master_id==7)
                                    { $x = 1;?>
                                        <div class="col-md-12">
                                            <span class="caption-subject section_cap bold uppercase"><h4><b>Section 3 - Mobile Computing</b></h4></span>
                                            <hr>
                                        </div>
                                        <?php $que_data=explode(',', $stud_details->mobile_que);
                                         $ans_data=explode(',', $stud_details->mobile_ans);
                                         // print_r($que_data);
                                         // print_r($ans_data);
                                        for ($i=0; $i <5; $i++) 
                                        { 
                                            $ans=$ans_data[$i];
                                            $que=$que_data[$i];?>
                                            <div class="col-md-6" style="padding: 10px;">
                                                <?php $mobile_data=$this->student_model->selectDetailsStud('tbl_mobile_computing','mobile_id',$que); 
                                                // echo $this->db->last_query(); die;
                                                ?>
                                                <p style="font-size: 15px; font-weight: bold; height: 28px;">Que <?php echo $x++; ?>. <?php echo (isset($mobile_data->quesion) && !empty($mobile_data->quesion))?$mobile_data->quesion:'';?></p>
                                                <br>
                                                <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" ></center>
                                            </div>
                                            <div class="col-md-6" style="padding: 10px;">
                                                <center>
                                                    <?php if($mobile_data->ans_steps==$ans) { ?>
                                                        <div class="alert alert-success" style=" padding: 9px; font-size: 13px;"><strong>Well done,</strong> Your Answer Is Correct...!</div>
                                                        <img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" >
                                                    <?php } 
                                                    else 
                                                    { 
                                                        if($ans==0 || $ans==1)
                                                        {
                                                            if($ans==0)
                                                            {
                                                                $ans='ans';
                                                            }
                                                            else
                                                            {
                                                                $ans='ans1';
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $ans1=$ans-1;
                                                            $ans=''.$mobile_data->folder_name.'/'.$ans1;
                                                        } ?>
                                                        <div class="alert alert-danger" style=" padding: 9px; font-size: 13px;"><strong>Oops,</strong> Your Answer Is Wrong...!</div>
                                                        <img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo $ans; ?>.png" style="height: 519px; width: 300px; border: 1px solid #eee;" >
                                                    <?php } ?>
                                                </center>
                                            </div>
                                        <?php } 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/gmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
        });
        </script>
        <script>
          $(".que").each(function(){
              var que = $(this).html();
              var ans = $(this).parents('.main_div').find('.ans').html();
              var data = changed(que,ans,0);
              $(this).parents('.main_div').find('.ans').html(data[1]);
          }); 
        </script>
    </body>
</html>