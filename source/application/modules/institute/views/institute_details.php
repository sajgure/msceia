<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Institute List | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?> </title>
    <base href="<?php echo base_url(); ?>">
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
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    
    <link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>"/>
    

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
                    <div class="row ">
                            <div class="col-md-3">
                            <div class="profile-sidebar" style="width: 250px;">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <?php $path='./uploads/inst_owner_photos/'.((isset($single_instutute->institute_owner_photo) && !empty($single_instutute->institute_owner_photo))?$single_instutute->institute_owner_photo:'user.png');
                                        if (file_exists($path)) 
                                        { ?>
                                            <img src="<?php echo base_url(); ?>uploads/inst_owner_photos/<?php echo $single_instutute->institute_owner_photo; ?> " class="img-responsive" alt="" style="width: 100%;border-radius: 10%;">
                                        <?php }
                                        else
                                        { ?>
                                            <img src="<?php echo base_url(); ?>uploads/inst_owner_photos/default.png" class="img-responsive" alt="" style="width: 100%;border-radius: 10%;">
                                        <?php }?>  
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle" style="margin-top: 10px;">
                                        <div class="profile-usertitle-name" style="color: #5a7391; text-transform: uppercase; text-align: center;">
                                            <b> <?php echo (isset($single_instutute->institute_name) && !empty($single_instutute->institute_name))?$single_instutute->institute_name:'';?></b>
                                        </div>
                                        <div class="margin-top-10 profile-desc-link" style="text-align: center;" >
                                            <i class="fa fa-phone" style="font-size: 18px;"></i>
                                           <b> &nbsp;&nbsp;<a href="#"><?php echo (isset($single_instutute->institute_contact) && !empty($single_instutute->institute_contact))?$single_instutute->institute_contact:'';?></a></b>
                                        </div>
                                        <div class="margin-top-10 profile-desc-link" style="text-align: center;">
                                            <i class="fa fa-envelope "></i>
                                            <b><a href="#" style="word-break: break-all;"><?php echo (isset($single_instutute->institute_mail) && !empty($single_instutute->institute_mail))?$single_instutute->institute_mail:'';?></a></b>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="col-md-9">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <span class="caption-subject font-blue-madison bold uppercase"> <i class="icon-user theme-font "></i> Institute Details</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <label>Institute Name</label>
                                                  </div>
                                                  <?php //print_r($single_instutute);?>
                                                  <div class="col-md-3" style="font-weight:bold;" >
                                                    <?php echo (isset($single_instutute->institute_name) && !empty($single_instutute->institute_name))?$single_instutute->institute_name:'';?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <label>Institute Code</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_code) && !empty($single_instutute->institute_code))?$single_instutute->institute_code:'';?>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <label>Owner Name</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_owner_name) && !empty($single_instutute->institute_owner_name))?$single_instutute->institute_owner_name:'';?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <label>Owner Qualification</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_owner_qualification) && !empty($single_instutute->institute_owner_qualification))?$single_instutute->institute_owner_qualification:''?>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <label>Principle Name</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_principal_name) && !empty($single_instutute->institute_principal_name))?$single_instutute->institute_principal_name:''?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <label>Principle Qualification</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_principal_qualification) && !empty($single_instutute->institute_principal_qualification))?$single_instutute->institute_principal_qualification:''?>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <label>Contact No.</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_contact) && !empty($single_instutute->institute_contact))?$single_instutute->institute_contact:''?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <label>Alternate Contact No.</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_alternate_contact) && !empty($single_instutute->institute_alternate_contact))?$single_instutute->institute_alternate_contact:''?>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <label>Email ID.</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;word-break: break-all;">
                                                    <?php echo (isset($single_instutute->institute_mail) && !empty($single_instutute->institute_mail))?$single_instutute->institute_mail:''?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <label>Institute Address</label>
                                                  </div>
                                                  <div class="col-md-3" style="font-weight:bold;">
                                                    <?php echo (isset($single_instutute->institute_address) && !empty($single_instutute->institute_address))?$single_instutute->institute_address:''?>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                              <div class="col-md-3">
                                                <label>District</label>
                                              </div>
                                              <div class="col-md-3" style="font-weight:bold;">
                                                <?php echo (isset($single_instutute->district_name) && !empty($single_instutute->district_name))?$single_instutute->district_name:''?>
                                              </div>
                                              <div class="col-md-3">
                                                <label>Taluka</label>
                                              </div>
                                              <div class="col-md-3" style="font-weight:bold;">
                                                <?php echo (isset($single_instutute->institute_taluka) && !empty($single_instutute->institute_taluka))?$single_instutute->institute_taluka:''?>
                                              </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                              <div class="col-md-3">
                                                <label>Pincode</label>
                                              </div>
                                              <div class="col-md-3" style="font-weight:bold;">
                                                <?php echo (isset($single_instutute->institute_pincode) && !empty($single_instutute->institute_pincode))?$single_instutute->institute_pincode:''?>
                                              </div>
                                              <div class="col-md-3">
                                                <label>Institute Reg. Date</label>
                                              </div>
                                              <div class="col-md-3" style="font-weight:bold;">
                                                <?php echo (isset($single_instutute->institute_registration_date) && !empty($single_instutute->institute_registration_date))?date('d-m-Y',strtotime($single_instutute->institute_registration_date)):''?>
                                              </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
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

    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>

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