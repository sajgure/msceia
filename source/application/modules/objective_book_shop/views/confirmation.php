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
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
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
    <div class="main">
      <div class="container">
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            
            <div class="goods-page">
              <div class="goods-data clearfix">                
                <div class="table-wrapper-responsive">
                  <center><img src="<?php echo base_url(); ?>images/success.png" style="width:15%;"></center>
                <h1><center>
                  Thank You. Your payment was Successful.<br>
                  Transction ID:-  <b><?php echo isset($personal_data->transaction_id) && !empty($personal_data->transaction_id)?$personal_data->transaction_id:'' ; ?>
                </center></h1>
                <hr>
                  <table summary="Shopping cart">
                    <tr>
                      <th class="goods-page-image">Image</th>
                      <th class="goods-page-description">Description</th>
                      <th class="goods-page-price">Unit price</th>
                      <th class="goods-page-quantity">Quantity</th>
                      <th class="goods-page-total">Total</th>
                    </tr>
                    <?php $sub_total=0;
                      $shipping=0;
                    foreach($order_data as $items) { 
                      //$sub_total=$sub_total+$items['subtotal']; ?>
                      <tr>
                        <td class="goods-page-image">
                          <img src="<?php echo base_url();?>uploads/objective_product_photos/<?php echo isset($items->product_image) && !empty($items->product_image)?$items->product_image:''; ?>">
                        </td>
                        <td class="goods-page-description" style="width: 60%;">
                          <h3>
                            <a href="javascript:void(0);"><?php echo isset($items->product_name) && !empty($items->product_name)?$items->product_name:''; ?></a></h3>
                            <em><?php echo isset($items->desc) && !empty($items->desc)?$items->desc:''; ?></em>
                        </td>
                        <td class="goods-page-price">
                          <strong><span class="fa fa-inr" ></span> <?php echo isset($items->product_price) && !empty($items->product_price)?$items->product_price:''; ?></strong>
                        </td>
                        <td class="goods-page-total">
                          <strong><?php echo isset($items->product_qty) && !empty($items->product_qty)?$items->product_qty:''; ?></strong>
                        </td>
                        <td class="goods-page-total">
                          <strong><span class="fa fa-inr" ></span> <?php echo ($items->product_qty*$items->product_price); ?></strong>
                        </td>                        
                      </tr>
                    <?php } ?>
                  </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <?php /*<li>
                      <em>Sub total</em>
                      <strong class="price"><span class="fa fa-inr" ></span><?php echo $sub_total; ?></strong>
                    </li> */?>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span class="fa fa-inr" ></span><?php echo (isset($personal_data->order_price) && !empty($personal_data->order_price))?$personal_data->order_price:'0' ?></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <a href="<?php echo base_url();?>objective-shop"><button class="btn btn-default" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></button></a>
              <a href="<?php echo base_url()?>my-profile"><button class="btn btn-primary" type="submit">Back to MSCEIA</button></a>
            </div>
          </div>
        </div>
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
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
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