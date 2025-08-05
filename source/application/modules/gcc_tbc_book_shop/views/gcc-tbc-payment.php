
<?php  
$institute_code = $this->session->userdata('institute_code');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Theory Payment Details | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
    </title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
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
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet">
    <!-- metronic revo slider styles -->
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <!-- for slider-range -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <style type="text/css">
        .custom_span{
            font-weight: 700; 
            font-size: 14px;
        }
    </style>
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<!-- Body BEGIN -->

<body class="ecommerce">
    <?php $this->load->view('gcc_tbc_book_shop/header'); ?>
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>gcc-tbc-shop">Home</a></li>
                <li class="active">Theory Payment Details</li>
            </ul>
            <div class="row margin-bottom-40">
                <?php $this->load->view('gcc_tbc_book_shop/gcc-tbc-book-sidebar'); ?>
                <div class="col-md-9 col-sm-12">
                    <div class="portlet-body" style="background: #fff;padding: 20px;">
                         <div class="row">
                            <div class="col-md-12">
                                <h4 style="color: red;font-size: 16px;font-weight: 600;line-height: 2.1;text-align: center;">Note: बुक्ससाठी खाली दिलेलया अकाऊंट नंबर वर पेमेंट करा . पेमेंटच्या कनफॉर्मेशन साठी मनीषा फाऊंडेशनला संपर्क करा. <br> व पेमेंटचा स्क्रीनशॉट <strong>9975627481 </strong> या व्हाट्सॅप नंबरला सेंड करावा.</h4>
                                <div class="col-md-12" style="margin-bottom:20px;text-align: left;">
                                    <span class="custom_span" style="font-size:20px;">Account Details : RTGS / NEFT / IMPS</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">Account Name</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : Manisha Foundation</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">Bank Name</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : Bank  of India</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">Branch Name</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : Anand Dham , Ahmednagar</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">Account Number</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : 066610210000071</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">IFSC Code</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : BKID0000666</span>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <span class="custom_span">Contact Number</span>
                                </div>
                                <div class="col-md-7" style="text-align: left;">
                                    <span class="custom_span"> : 9975627481</span>
                                </div>
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
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
    <!-- pop up -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- slider for products -->
    <script src='<?php echo base_url();?>assets/site/assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script>
    <!-- product zoom -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
    <!-- Quantity -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
    <!-- for slider-range -->
    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <!-- BEGIN RevolutionSlider -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
    <!-- END RevolutionSlider -->
    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initTwitter();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initUniform();
    });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>