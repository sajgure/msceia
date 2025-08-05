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
            .page-404-3{
                background-color: #353535 !important;
            }
            .page-404-3 span {
                color: black;
                font-size: 23px;
            }
            .portlet.light{
                width: 70% !important;
            }
            .cust_card{
                position: absolute;
                top: 20%;
                left: 14%;
            }
            .red{
                color: #e45000 !important;
            }
        </style>
    </head>
    <body class="page-404-3">
        <div class="container error-404">
            <div class="portlet light cust_card">
                <div class="portlet-body" style="padding: 5%;">
                    <center>
                        <span>विद्यार्थ्यांचा डेटा अपलोड झाला आहे, सर्वर ला डेटा कन्फर्म होण्यासाठी १ तास वेळ लागेल.  तरी अंतिम स्टेटस १ तासानंतर msceia.in  या  साईटला</span><span class="red"> Exam 
                        Status </span><span>या बटन ला क्लिक करून चेक करा.</span>
                        <br>
                        <br>
                        <br>
                        <a href="http://localhost:8080/exam" class="btn btn-large btn-primary">
                            &nbsp; Back to Login
                        </a>
                    </center>
                </div>
            </div>
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