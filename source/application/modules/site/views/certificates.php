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
    <title>certificate | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url(); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">
    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">certificate</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption font-blue">
                                    <i class="fa fa-bars font-blue"></i>
                                    <span class="caption-subject bold uppercase">Certificate Report</span>
                                </div>
                            </div>
                            <?php
                                $pass_student_oct = (isset($inst_data_oct23->Pass_student) && !empty($inst_data_oct23->Pass_student))?$inst_data_oct23->Pass_student:'0';
                                $no_of_block = ceil($pass_student_oct/50);
                            ?>
                            <div class="row" >
                                <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                        <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>certificates-pdf/<?php echo(isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:''?>/<?php echo $j.',50'; ?>">
                                            <div class="visual">
                                                <i class="fa fa-file fa-icon-medium"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <?php echo (isset($i) && !empty($i))?$i:'0'; ?> 
                                                </div>
                                                <div class="desc">
                                                    Certificate
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php $j =$j+50; } ?>
                            </div>
                        </div>
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption font-blue">
                                    <i class="fa fa-bars font-blue"></i>
                                    <span class="caption-subject bold uppercase">SSD Certificate Report</span>
                                </div>
                            </div>
                            <?php $this->load->model('reports/report_model');  
                            $ssd_stud_result=$this->report_model->ssd_passStudData($inst_data_oct23->institute_id,200,10);
                            if($ssd_stud_result) 
                            { 
                                $pass_student = count($ssd_stud_result);
                                $no_of_block = ceil($pass_student_oct/50);
                                ?>
                                <div class="row" >
                                    <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                            <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>ssd-certificates-pdf/<?php echo(isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:$inst_data_aug22->institute_id?>/<?php echo $j.',100'; ?>">
                                                <div class="visual">
                                                    <i class="fa fa-file fa-icon-medium"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <?php echo (isset($i) && !empty($i))?$i:'0'; ?> 
                                                    </div>
                                                    <div class="desc">
                                                        Certificate
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $j =$j+100; } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url(); ?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>