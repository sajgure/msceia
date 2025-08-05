<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>सूचना | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?> </title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
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
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/gallery.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <!-- Theme styles END -->
</head>

<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <?php $this->load->view('site/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">सूचना</li>
                </ul>
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12">
                        <div class="content-page">
                            <div class="row">
                                <!-- BEGIN LEFT SIDEBAR -->
                                <div class="col-md-12 col-sm-12 blog-posts">
                                    <div class="row">
                                        <?php if(isset($gr_data) && !empty($gr_data))
                                        {
                                            foreach($gr_data as $key)
                                            {?>
                                                <div class="col-md-6 col-sm-8">
                                                    <h3 style="font-weight: 600;line-height: 1.5em;height: 85px;"><a href="<?php echo base_url();?>suchna-details/<?php echo (isset($key->gr_master_id) && !empty($key->gr_master_id))?$key->gr_master_id:'';?>"><?php echo (isset($key->gr_master_title) && !empty($key->gr_master_title))?$key->gr_master_title:'';?></a></h3>
                                                    <ul class="blog-info">
                                                        <li><i class="fa fa-calendar"></i> <?php echo(isset($key->modified_on) && !empty($key->modified_on))?date('d-m-Y',strtotime($key->modified_on)):'';?></li>
                                                        <li><a href="<?php echo base_url();?>./uploads/gr_uploads/<?php echo (isset($key->gr_master_file) && !empty($key->gr_master_file))?$key->gr_master_file:'javascript:void(0);';?>" download><i class="fa fa-download"></i> <?php echo(isset($key->gr_master_file) && !empty($key->gr_master_file))?'Download':'File Not Found';?></a></li>
                                                    </ul>
                                                    <p><?php echo substr((isset($key->gr_master_description) && !empty($key->gr_master_description)) ? $key->gr_master_description : '', 0, 90); ?></p> 
                                                    <a href="<?php echo base_url();?>suchna-details/<?php echo (isset($key->gr_master_id) && !empty($key->gr_master_id))?$key->gr_master_id:'';?>" class="more">Read more <i class="fa fa-arrow-circle-o-right"></i></a>
                                                <hr class="blog-post-sep" style="margin: 30px 0;">
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <!-- END LEFT SIDEBAR -->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
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
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
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