<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Certificate Report | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
    <?php $this->load->view('template/header');?>
    <div class="clearfix">
    </div>
    <div class="page-container">
        <?php $this->load->view('template/sidebar');?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="portlet-body">
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">Certificate Report Oct 23</span>
                                    </div>
                                    <span class="caption-helper" style="float: right;">
                                        <a class="btn btn-primary default-sm" href="<?php echo base_url();?>certificate-print"><i class="icon-arrow-left"></i> Back</a>
                                        <?php $institute_id = $this->encryptdecryptstring->encrypt_string((isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:$inst_data_apr24->institute_id); ?>
                                        <a target="_blank" href="<?php echo base_url(); ?>pass-student-list/8/<?php echo $institute_id; ?>" class="btn btn-success tooltips" title="Pass Student List" >Pass Student List</a>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Institute Name :</b> <?php echo (isset($inst_data_oct23->institute_name) && !empty($inst_data_oct23->institute_name))?$inst_data_oct23->institute_name:$inst_data_apr24->institute_name; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Institute Code :</b> <?php echo (isset($inst_data_oct23->institute_code) && !empty($inst_data_oct23->institute_code))?$inst_data_oct23->institute_code:$inst_data_apr24->institute_code; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Paid Student :</b> <?php echo (isset($inst_data_oct23->paid_student) && !empty($inst_data_oct23->paid_student))?$inst_data_oct23->paid_student:'0'; ?>, <?php echo (isset($inst_data_apr24->paid_student) && !empty($inst_data_apr24->paid_student))?$inst_data_apr24->paid_student:'0'; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Upload :</b> <?php echo (isset($inst_data_oct23->upload_student) && !empty($inst_data_oct23->upload_student))?$inst_data_oct23->upload_student:'0'; ?>, <?php echo (isset($inst_data_apr24->upload_student) && !empty($inst_data_apr24->upload_student))?$inst_data_apr24->upload_student:'0'; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Pass Student :</b> <?php echo (isset($inst_data_oct23->Pass_student) && !empty($inst_data_oct23->Pass_student))?$inst_data_oct23->Pass_student:'0'; ?></span>
                                    </div>
                                </div>
                                <br>
                                <?php
                                    $pass_student_jan = (isset($inst_data_oct23->Pass_student) && !empty($inst_data_oct23->Pass_student))?$inst_data_oct23->Pass_student:'0';
                                    $pass_student_aug = (isset($inst_data_apr24->Pass_student) && !empty($inst_data_apr24->Pass_student))?$inst_data_apr24->Pass_student:'0';
                                    $block = ($pass_student_jan + $pass_student_aug)/100;
                                    $no_of_block =(int)$block+1;
                                ?>
                                <div class="row" >
                                    <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                            <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>certificate-pdf/8/<?php echo(isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:$inst_data_apr24->institute_id?>/<?php echo $j.',100'; ?>">
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
                            </div>
                        </div>
                    </div>
                    <?php $ssd_stud_result=$this->report_model->ssd_passStudData((isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:$inst_data_apr24->institute_id,100,4);
                    if($ssd_stud_result) 
                    { ?>
                        <div class="row" style="">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption font-blue">
                                            <i class="fa fa-bars font-blue"></i>
                                            <span class="caption-subject bold uppercase">SSD Certificate Report Oct 23</span>
                                        </div>
                                    </div>
                                    <?php

                                        $pass_student = count($ssd_stud_result);
                                        $block = $pass_student/100;
                                        $no_of_block =(int)$block+1;
                                    ?>
                                    <div class="row" >
                                        <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                                <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>ssd-certificate-pdf/8/<?php echo(isset($inst_data_oct23->institute_id) && !empty($inst_data_oct23->institute_id))?$inst_data_oct23->institute_id:$inst_data_apr24->institute_id?>/<?php echo $j.',100'; ?>">
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
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- old batch result -->
                <div class="portlet-body">
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">Certificate Report Apr 24</span>
                                    </div>
                                    <span class="caption-helper" style="float: right;">
                                        <a class="btn btn-primary default-sm" href="<?php echo base_url();?>certificate-print"><i class="icon-arrow-left"></i> Back</a>
                                        <?php $institute_id = $this->encryptdecryptstring->encrypt_string((isset($inst_data_apr24->institute_id) && !empty($inst_data_apr24->institute_id))?$inst_data_apr24->institute_id:$inst_data_apr24->institute_id); ?>
                                        <a target="_blank" href="<?php echo base_url(); ?>pass-student-list/8/<?php echo $institute_id; ?>" class="btn btn-success tooltips" title="Pass Student List" >Pass Student List</a>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Institute Name :</b> <?php echo (isset($inst_data_apr24->institute_name) && !empty($inst_data_apr24->institute_name))?$inst_data_apr24->institute_name:$inst_data_apr24->institute_name; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Institute Code :</b> <?php echo (isset($inst_data_apr24->institute_code) && !empty($inst_data_apr24->institute_code))?$inst_data_apr24->institute_code:$inst_data_apr24->institute_code; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Paid Student :</b> <?php echo (isset($inst_data_apr24->paid_student) && !empty($inst_data_apr24->paid_student))?$inst_data_apr24->paid_student:'0'; ?>, <?php echo (isset($inst_data_apr24->paid_student) && !empty($inst_data_apr24->paid_student))?$inst_data_apr24->paid_student:'0'; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Upload :</b> <?php echo (isset($inst_data_apr24->upload_student) && !empty($inst_data_apr24->upload_student))?$inst_data_apr24->upload_student:'0'; ?>, <?php echo (isset($inst_data_apr24->upload_student) && !empty($inst_data_apr24->upload_student))?$inst_data_apr24->upload_student:'0'; ?> </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span><b>Pass Student :</b> <?php echo (isset($inst_data_apr24->Pass_student) && !empty($inst_data_apr24->Pass_student))?$inst_data_apr24->Pass_student:'0'; ?> </span>
                                    </div>
                                </div>
                                <br>
                                <?php
                                    $pass_student_jan = (isset($inst_data_apr24->Pass_student) && !empty($inst_data_apr24->Pass_student))?$inst_data_apr24->Pass_student:'0';
                                    $pass_student_aug = (isset($inst_data_apr24->Pass_student) && !empty($inst_data_apr24->Pass_student))?$inst_data_apr24->Pass_student:'0';
                                    $block = ($pass_student_jan + $pass_student_aug)/100;
                                    $no_of_block =(int)$block+1;
                                ?>
                                <div class="row" >
                                    <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                            <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>certificate-pdf/8/<?php echo(isset($inst_data_apr24->institute_id) && !empty($inst_data_apr24->institute_id))?$inst_data_apr24->institute_id:$inst_data_apr24->institute_id?>/<?php echo $j.',100'; ?>">
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
                            </div>
                        </div>
                    </div>
                    <?php $ssd_stud_result1=$this->report_model->ssd_passStudData((isset($inst_data_apr24->institute_id) && !empty($inst_data_apr24->institute_id))?$inst_data_apr24->institute_id:$inst_data_apr24->institute_id,100,5);
                    if($ssd_stud_result1) 
                    { ?>
                        <div class="row" style="">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption font-blue">
                                            <i class="fa fa-bars font-blue"></i>
                                            <span class="caption-subject bold uppercase">SSD Certificate Report Apr 24</span>
                                        </div>
                                    </div>
                                    <?php

                                        $pass_student = count($ssd_stud_result1);
                                        $block = $pass_student/100;
                                        $no_of_block =(int)$block+1;
                                    ?>
                                    <div class="row" >
                                        <?php $j=0; for ($i=1; $i <= $no_of_block ; $i++) { ?>
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 margin-bottom-10">
                                                <a class="dashboard-stat dashboard-stat-light red-intense" target="_blank" href="<?php echo base_url();?>ssd-certificate-pdf/8/<?php echo(isset($inst_data_apr24->institute_id) && !empty($inst_data_apr24->institute_id))?$inst_data_apr24->institute_id:$inst_data_apr24->institute_id?>/<?php echo $j.',100'; ?>">
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
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer');?>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
</script>
</body>
</html>