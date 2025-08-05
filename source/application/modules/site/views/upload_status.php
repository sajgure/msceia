<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Upload | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
        <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/admin/layout/css/error.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
        <style type="text/css">
            table{
                font-size: 17px;
            }
            .page-404-3{
                background-color: #353535 !important;
            }
            .cust_img{
                position: absolute;
                top: 13%;
                left: 77%;
                width: 13%;
            }
        </style>
    </head>
    <body class="page-404-3">
        <div class="page-inner">
            <img style="" src="<?php echo base_url();?>images/msceia.png" class="img-responsive cust_img" alt="">
        </div>
        <div class="container error-404">
            <h1>Hi </h1>
            <h2><?php echo (isset($upload_status->institute_name) && !empty($upload_status->institute_name))?$upload_status->institute_name:''; ?>&nbsp;(<?php echo (isset($upload_status->institute_code) && !empty($upload_status->institute_code))?$upload_status->institute_code:''; ?>)</h2>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" >
                        <tr>
                            <td colspan = "2" style="text-align : center;font-size :18px;">
                                June 2025
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left; width:30%; ">
                                Total Student
                            </td>              
                            <td style="text-align:center; width:30%;">
                                <?php echo (isset($upload_status->total_student) && !empty($upload_status->total_student))?$upload_status->total_student:'0'; ?> 
                            </td>
                        </tr>           
                        <tr> 
                            <td style="text-align:left; width:30%;">
                                Paid Student 
                            </td>
                            <td style="text-align:center; width:30%;"> 
                                <?php echo (isset($upload_status->paid_student) && !empty($upload_status->paid_student))?$upload_status->paid_student:'0'; ?> 
                            </td>
                        </tr>
                        <tr> 
                            <td style="text-align:left; width:30%;">
                                Appeared for Exam  (Rs 100 & Rs 140)
                            </td>
                            <td style="text-align:center; width:30%;"> 
                                <?php echo (isset($upload_status->exam_appeared_student) && !empty($upload_status->exam_appeared_student))?$upload_status->exam_appeared_student:'0'; ?> 
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left; width:50%;">
                                Exam Completed Student 
                            </td>
                            <td style="text-align:center; width:30%;"> 
                                <?php echo (isset($upload_status->upload_student) && !empty($upload_status->upload_student))?$upload_status->upload_student:'0'; ?> 
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left; width:50%;">
                                Exam Pending Student 
                            </td>
                            <td style="text-align:center; width:30%;"> 
                                <?php echo $upload_status->exam_appeared_student-$upload_status->upload_student; ?> 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <a style="color: #5b9bd1 !important;" target="_blank" href="<?php echo base_url(); ?>upload_student_pdf/<?php echo (isset($upload_status->institute_id) && !empty($upload_status->institute_id))?$upload_status->institute_id:''; ?>">
            Click Here To Know More Details </a> <br>
        </div>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script>
          jQuery(document).ready(function() {    
            Metronic.init(); 
            Layout.init(); 
            Demo.init(); 
          });
        </script>
    </body>
</html>