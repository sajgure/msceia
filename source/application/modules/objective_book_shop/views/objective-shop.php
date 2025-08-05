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
    <title>Objective Shop | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
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
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.css" type="text/javascript">
    <!-- for slider-range -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .fullwidthabnner {
            max-height: 350px !important;
            height: 350px !important;
        }
        .revslider-initialised  {
            max-height: 350px !important;
            height: 350px !important;
        }
        .tp-simpleresponsive {
            max-height: 350px !important;
            height: 350px !important;
        }
    </style>
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<!-- Body BEGIN -->

<body class="ecommerce">
    <!-- Header END -->
    <!-- BEGIN SLIDER -->
    <?php $this->load->view('objective_book_shop/header'); ?>
    <div class="page-slider margin-bottom-40">
        <div class="fullwidthbanner-container revolution-slider">
            <div class="fullwidthabnner">
                <ul id="revolutionul">
                    <!-- THE NEW SLIDE -->
                    <?php if(isset($slider_data1) && !empty($slider_data1))
                    { 
                      foreach ($slider_data1 as $key)
                        { ?>
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo base_url();?>uploads/objective_slider_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="<?php echo base_url();?>uploads/objective_slider_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>"> </li>
                        <?php }
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- END SLIDER -->
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <?php $this->load->view('objective_book_shop/objective-book-sidebar'); ?>
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-9 col-sm-7">
                        <marquee style="color: orangered;margin-bottom: 1%;" scrollamount="6">
                            <?php if(isset($objective_notice_data) && !empty($objective_notice_data))
                            {
                                foreach ($objective_notice_data as $key)
                                { ?>
                                    <b> <i style="font-size: 20px;"><?php echo(isset($key->objective_notice_desc) && !empty($key->objective_notice_desc))?$key->objective_notice_desc:'';?></i></b>
                                <?php }
                            } ?>
                        </marquee>
                        <form action="objective_add_to_cart" enctype="multipart/form-data" id="objective_add_to_cart" method="post" class="horizontal-form" data-redirect="objective-book-shop-view-cart">
                            <?php if(isset($book_shop_data) && !empty($book_shop_data))
                            {  ?>
                                <?php foreach ($book_shop_data as $key) { ?>
                                    <div class="goods-page">
                                        <div class="goods-data clearfix">
                                            <div class="table-wrapper-responsive">
                                                <table summary="Shopping cart" width="100%">
                                                    <tr>
                                                        <td style="border-bottom: none;" class="goods-page-image"> <img src="<?php echo base_url(); ?>uploads/objective_product_photos/<?php echo(isset($key->product_image) && !empty($key->product_image))?$key->product_image:''?>" alt="product Photo" class="img-responsive"> </td>
                                                        <td style="border-bottom: none;" class="goods-page-description">
                                                            <h3><a style="text-decoration: none;" href="javascript:;"><?php echo(isset($key->product_name) && !empty($key->product_name))?mb_substr($key->product_name, 0, 30):''?></a></h3>
                                                            <p>
                                                                <?php echo(isset($key->short_description) && !empty($key->short_description))?$key->short_description:''?>
                                                            </p>
                                                        </td>
                                                        <td style="border-bottom: none;" class="goods-page-price"> <strong style="text-decoration:line-through;"><span>Rs.</span> <?php echo(isset($key->product_price) && !empty($key->product_price))?$key->product_price:''?></strong> </td>
                                                        <td style="border-bottom: none;" class="goods-page-price"> <strong><?php echo(isset($key->product_discount) && !empty($key->product_discount))?$key->product_discount:''?> <span>%</span></strong> </td>
                                                        <td style="border-bottom: none;" class="goods-page-total"> <strong><span>Rs.</span> <?php echo(isset($key->selling_prices) && !empty($key->selling_prices))?$key->selling_prices:''?></strong> </td>
                                                        <td style="border-bottom: none;" class="goods-page-quantity">
                                                            <div class="product-quantity">
                                                                <input id="product-quantity" type="text" value="0" name="qty[]" min="0" max="500" class="form-control input-sm"> </div>
                                                            <input type="hidden" name="id[]" value="<?php echo(isset($key->product_id) && !empty($key->product_id))?$key->product_id:''?>"> </td>
                                                            <input type="hidden" name="type" value="objective_books">
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?> 
                            <a> <span> <strong>GCC-TBC Objective Book HelpLine No: +919869380948</strong></span></a>
                            <div style="margin-top: -17px;"> 
                                <a style="margin-left: 570px;" href="<?php echo base_url();?>terms-conditions">
                                    <span ><strong>Terms & Conditions</strong></span>
                                </a>
                                <button style="float: right; margin-right: 10px;" class="btn btn-primary common_save" type="submit">Checkout <i class="fa fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
    <?php $this->load->view('site/footer'); ?>
        <!-- END fast view of a product -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/respond.min.js"></script>  
    <![endif]-->
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
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <!-- for slider-range -->
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <!-- BEGIN RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
        <!-- END RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script><script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            Layout.initSliderRange();
            RevosliderInit.initRevoSlider();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
</body>
<!-- END BODY -->

</html>