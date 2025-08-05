<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News Details  | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?> </title>
        <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
        <base href="<?php echo base_url(); ?>">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="Maharashtra State Commerce Educational Institutes Association." name="description">
        <meta content="msceia,msceia.in,typing,Student" name="keywords">
        <meta content="msceia" name="author">
        <meta property="og:msceia.in" content="-CUSTOMER VALUE-">
        <meta property="og:Student" content="-CUSTOMER VALUE-">
        <meta property="og:Maharashtra State Commerce Educational Institutes Association." content="-CUSTOMER VALUE-">
        <meta property="og:webstt" content="website">
        <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
        <meta property="og:msceia.in/Student" content="-CUSTOMER VALUE-">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/favicon.png">
        <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
        <!-- Fonts START -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
        <!-- Fonts END -->
        <!-- Global styles START -->          
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <!-- Global styles END -->
        <!-- Page level plugin styles START -->
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
        <!-- Page level plugin styles END -->
        <!-- Theme styles START -->
        <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
        <!-- Theme styles END -->
        <style type="text/css">
            @media only screen and (max-width: 600px) 
            {
                .header-img 
                { 
                    width: 256px !important;
                }
            }
        </style>
    </head>
    <!-- Head END -->
    <!-- Body BEGIN -->
    <body class="corporate">
        <?php $this->load->view('site/header'); ?>
        <!-- BEGIN SLIDER -->
        <div class="main">
            <div class="container">
                <div class="col-md-12 col-sm-12 margin-bottom-40">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>">होम</a></li>
                        <!-- <li><a href="javascript:;">Pages</a></li> -->
                        <li class="active">बातमी तपशील</li>
                    </ul>
                    <h4 style="font-weight: 600;font-size: 20px;"> <?php echo(isset($news_data->news_name) && !empty($news_data->news_name))?$news_data->news_name:'';?></h4>   
                    <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> <?php echo(isset($news_data->modified_on) && !empty($news_data->modified_on))?date('d-M-Y h:i A',strtotime($news_data->modified_on)):'';?> </li>
                    </ul>
                    <p> <?php echo(isset($news_data->news_desc) && !empty($news_data->news_desc))?$news_data->news_desc:'';?></p>
                </div>
            </div>
        </div>

        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
        <!-- BEGIN RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url();?>assets/site/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
        <!-- END RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();    
                Layout.initOWL();
                RevosliderInit.initRevoSlider();
                Layout.initTwitter();
                Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
                Layout.initNavScrolling();
            });
        </script>
    </body>
    <!-- END BODY -->
</html>