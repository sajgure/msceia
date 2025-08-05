<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>छायाचित्र | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
        <meta property="og:url" content="-CUSTOMER VALUE-">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/gallery.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php $this->load->view('site/header'); ?>
<!-- Head END -->

<!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">छायाचित्र</li>
                </ul>
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php if(isset($gallery_data) && !empty($gallery_data))
                                {
                                    foreach ($gallery_data as $key) 
                                    {?>
                                        <div class="col-md-3 col-sm-4 gallery-item">
                                            <a data-rel="fancybox-button" title="<?php echo (isset($key->image_description) && !empty($key->image_description))?$key->image_description:'';?>" href="<?php echo base_url(); ?>uploads/gallery_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>" class="fancybox-button" style="height: 200px; width: 250px;">
                                                <img alt="" src="<?php echo base_url(); ?>uploads/gallery_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>" style="height: 200px; width: 250px;">
                                                <div class="zoomix"><i class="fa fa-search"></i></div>
                                            </a> <br>
                                            <!-- <center><b ><?php echo (isset($key->image_description) && !empty($key->image_description))?$key->image_description:'';?></b> -->
                                        </div>
                                    <?php }
                                }?>
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
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

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