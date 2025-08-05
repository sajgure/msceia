
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
    <title>My Orders | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
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
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
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
                <li class="active">My Orders</li>
            </ul>
            <div class="row margin-bottom-40">
                <?php $this->load->view('gcc_tbc_book_shop/gcc-tbc-book-sidebar'); ?>
                <div class="col-md-9 col-sm-12">
                    <?php if(isset($order_data) && !empty($order_data))
                    {  $i=1; foreach($order_data as $key) { ?>
                        <div class="goods-page">
                            <div class="goods-data clearfix">
                                <div class="table-wrapper-responsive">
                                    <table summary="Shopping cart">
                                        <tr>
                                            <th class="goods-page-image" style="text-align: center;width: 15%;">Order ID</th>
                                            <th class="goods-page-description" style="text-align: center;width: 15%;">Payment Mode</th>
                                            <th class="goods-page-stock" style="text-align: center;width: 10%;">Status</th>
                                            <th class="goods-page-price" style="text-align: center;width: 10%;">Total Price</th>
                                            <th class="goods-page-stock" style="text-align: center;width: 25%;">Ordered Date</th>
                                            <th class="goods-page-stock" style="width: 15%;">
                                                <a style="float: right;" href="<?php echo base_url(); ?>order-details-track/<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">
                                                    <button class="btn btn-primary" type="submit"> More Details and Track </button>
                                                </a>
                                            </th>
                                        </tr>
                                        <?php 
                                            $order_id = $key->order_id;
                                            $order_details=$this->common_model->selectAllWhr('tbl_order','order_id',$order_id);
                                            if(isset($order_details) && !empty($order_details))
                                            {  $i=1; 
                                                foreach($order_details as $row)
                                                { ?>
                                                    <tr>
                                                        <td class="goods-page-image" style="text-align: center;">
                                                            <strong># MS<?php echo str_pad($key->order_id, 6,'0',STR_PAD_LEFT);?></strong>
                                                        </td>
                                                        <td class="goods-page-description" style="text-align: center;">
                                                            <h3>
                                                                <?php echo (isset($key->customer_payment_mode) && !empty($key->customer_payment_mode))?$key->customer_payment_mode:''; ?>
                                                            </h3>
                                                        </td>
                                                        <td class="goods-page-stock" style="text-align: center;">
                                                            <strong>
                                                                <?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>
                                                            </strong> </td>
                                                        <td class="goods-page-price" style="text-align: center;">
                                                            <strong>
                                                                <?php echo (isset($key->order_price) && !empty($key->order_price))?$key->order_price:''; ?>
                                                            </strong>
                                                        <td class="goods-page-price" style="text-align: center;">
                                                            <strong>
                                                                <?php echo(isset($key->inserted_on) && !empty($key->inserted_on))?date("d-M-Y H:i A", strtotime($key->inserted_on)):''?>
                                                            </strong>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                            <?php }
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php }
                    } else { ?>
                        <center><p style="font-size: 16px;">" No Order Found "</p></center>
                    <?php } ?>
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
    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
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
    });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>