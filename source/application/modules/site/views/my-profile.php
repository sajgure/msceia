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
        <title>माझे खाते | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet"> 
        <style type="text/css">
            .custom_span{
                font-weight: 700; font-size: 14px;
            }
        </style>
    </head>
    <!-- Head END -->
    <?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <marquee style="color: orangered;font-size: 20px;" scrollamount="4">
                विद्यार्थ्यांचे Exam Status बघण्यासाठी View Exam Status या बटन ला क्लिक करा.  
            </marquee>
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">माझे खाते</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet-body" style="background: rgba(244,244,244,0.5);padding: 20px;">
                            <div class="row">
                                <div class="col-md-3" style="text-align: center;">
                                    <img src="<?php echo base_url();?>uploads/inst_owner_photos/<?php echo (isset($user_data->institute_owner_photo) && !empty($user_data->institute_owner_photo))?$user_data->institute_owner_photo:'default.png'?>" onerror="this.src='<?php echo base_url(); ?>uploads/my_profile_photos/default.png';"  width="120px" height="120px" class="img-rounded" style="border-radius: 50% !important;">
                                </div>
                                <div class="col-md-9 mt-1">
                                    <div class="col-md-12">
                                        <h4><strong><?php echo (isset($user_data->institute_name) && !empty($user_data->institute_name))?$user_data->institute_name:'';?> (<?php echo (isset($user_data->institute_code) && !empty($user_data->institute_code))?$user_data->institute_code:'';?>) </strong></h4>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="custom_span"><strong><?php echo (isset($user_data->institute_owner_name) && !empty($user_data->institute_owner_name))?$user_data->institute_owner_name:'';?></strong></span>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <span class="custom_span"><i class="fa fa-envelope-o"></i> <?php echo (isset($user_data->institute_mail) && !empty($user_data->institute_mail))?$user_data->institute_mail:'';?></span>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <span class="custom_span"><i class="fa fa-phone"></i> <?php echo (isset($user_data->institute_contact) && !empty($user_data->institute_contact))?$user_data->institute_contact:'';?></span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="col-md-3">
                                        <span class="custom_span">Principal Name</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_principal_name) && !empty($user_data->institute_principal_name))?$user_data->institute_principal_name:'';?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="custom_span">Principal Qualification</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_principal_qualification) && !empty($user_data->institute_principal_qualification))?$user_data->institute_principal_qualification:'';?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <span class="custom_span">Owner Qualification</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_owner_qualification) && !empty($user_data->institute_owner_qualification))?$user_data->institute_owner_qualification:'';?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="custom_span">Alternate Contact No.</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_alternate_contact) && !empty($user_data->institute_alternate_contact))?$user_data->institute_alternate_contact:'';?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <span class="custom_span">Institute Reg. Date</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_registration_date) && !empty($user_data->institute_registration_date))?date('d-m-Y',strtotime($user_data->institute_registration_date)):'';?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="custom_span">District</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->district_name) && !empty($user_data->district_name))?$user_data->district_name:'';?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <span class="custom_span">Taluka</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p style="text-transform: capitalize;">: <?php echo (isset($user_data->institute_taluka) && !empty($user_data->institute_taluka))?$user_data->institute_taluka:'';?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="custom_span">Pincode</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p>: <?php echo (isset($user_data->institute_pincode) && !empty($user_data->institute_pincode))?$user_data->institute_pincode:'';?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <span class="custom_span">Institute Address</span>
                                    </div>
                                    <div class="col-md-9">
                                        <p>: <?php echo (isset($user_data->institute_address) && !empty($user_data->institute_address))?$user_data->institute_address:'';?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-1 font-red-mint text-right"><i> Note: If you find any mistake in your profile details, <a href="<?php echo base_url();?>edit-profile"><u>please click here to update your profile details</u></a></i></h4>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/respond.min.js"></script>
      <![endif]-->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
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