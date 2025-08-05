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
    <title>Order Details & Track | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
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
    <link href="<?php echo base_url();?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/timeline.css" rel="stylesheet">
    <style type="text/css">
        .label.label-sm {
            font-size: 12px;
            padding: 2px 5px 2px 5px;
            font-weight: 600;
        }
    </style>
    </head>
    
    <body class="ecommerce">
        <?php $this->load->view('gcc_tbc_book_shop/header'); ?>
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>gcc-tbc-shop">Home</a></li>
                    <li class="active">Order Details & Track</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-12 col-sm-12">
                        <div class="content-page">
                            <div class="order">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Order Details
                                                </div>
                                            </div>
                                            <div class="portlet-body" style="height: 185px;">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                        Order #:  
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        AP<?php echo str_pad($order_data->order_id, 6,'0',STR_PAD_LEFT);?>
                                                    </div>
                                                </div>

                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Order Date & Time:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <?php echo (isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime($order_data->inserted_on)):''; ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Order Status:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                       <?php 
                                                        if($order_data->order_status=='PENDING')
                                                        { ?>
                                                            <span class="label label-sm label-pending">
                                                                PENDING
                                                            </span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='ACCEPTED') 
                                                        { ?>
                                                            <span class="label label-sm label-accepted"> ACCEPTED </span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='PACKED') 
                                                        { ?>
                                                            <span class="label label-sm label-packed"> PACKED</span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='DISPATCHED') 
                                                        { ?>
                                                            <span class="label label-sm label-dispatch"> DISPATCHED </span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='DELIVERED') 
                                                        { ?>
                                                            <span class="label label-sm label-DELIVERED"> DELIVERED  </span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='CANCELLED') 
                                                        { ?>
                                                            <span class="label label-sm label-cancelled"> CANCELLED  </span>
                                                        <?php } 
                                                        elseif($order_data->order_status=='COMPLETE') 
                                                        { ?>
                                                            <span class="label label-sm label-complete"> COMPLETE  </span>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Grand Total:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <i class="fa fa-inr"></i>
                                                        <?php echo (isset($order_data->order_price) && !empty($order_data->order_price))?$order_data->order_price:''; ?>
                                                    </div>
                                                </div>
                                          
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                        Payment Information:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <?php echo (isset($order_data->customer_payment_mode) && !empty($order_data->customer_payment_mode))?$order_data->customer_payment_mode:''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Customer Information
                                                </div>
                                            </div>
                                            <div class="portlet-body" style="height: 185px;">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Customer Name:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?>
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Email:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <?php echo (isset($order_data->customer_email) && !empty($order_data->customer_email))?$order_data->customer_email:''; ?>
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                         Mobile Number:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                         <?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="row static-info">
                                                    <div class="col-md-5 name">
                                                        Shipping Address:
                                                    </div>
                                                    <div class="col-md-7 value">
                                                        <?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Order Product
                                                </div>
                                            </div>
                                            <?php if(isset($order_detail )&& !empty($order_detail )){ $total_amt = 0; ?>
                                                <div class="portlet-body" style="min-height: 480px; max-height: 480px;">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <center>Product Image</center>
                                                                    </th>
                                                                    <th>
                                                                        Product Name
                                                                    </th>
                                                                    
                                                                    <th>
                                                                        Price (<i class="fa fa-inr"></i>)
                                                                    </th>
                                                                    <th style="text-align: center;">
                                                                        Total Price (<i class="fa fa-inr"></i>)
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($order_detail as $key)
                                                                { $total_amt=($key->product_price * $key->product_qty);?>
                                                                    <tr>
                                                                        <td style="width:20%;">
                                                                            <center><img style="width: 35%;" src="<?php echo base_url(); ?>uploads/gcc_tbc_product_photos/<?php echo (isset($key->product_image) && !empty($key->product_image))?$key->product_image:''; ?>"></center>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price:''; ?> X <?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; ?>
                                                                        </td>                                               
                                                                        <td>
                                                                            <center><?php echo (isset($total_amt) && !empty($total_amt))?$total_amt:''; ?></center>
                                                                        </td>   
                                                                    </tr>   
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>  
                                                        <hr style="margin-top: 5px;"> 
                                                    </div>

                                                    <?php if($order_data->order_status=='DELIVERED') { ?>
                                                        <a href="<?php echo base_url(); ?>gcc-tbc-book-print-invoice/<?php echo (isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''; ?>" class="btn purple pull-right" style="margin-top: 32.5%;" >Download Invoice
                                                        </a> 
                                                    <?php } ?>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Order Tracking
                                                </div>
                                            </div>
                                            <?php if(isset($order_data )&& !empty($order_data )){ ?>
                                                <div class="portlet-body" style="min-height: 480px; max-height: 480px;">
                                                    <?php if($order_data->order_status=='PENDING') { ?>
                                                        <div  style="min-height: 380px; max-height: 380px;">
                                                            <ul class="timeline">
                                                                <li>
                                                                    <div class="direction-r">
                                                                        <div class="flag-wrapper">
                                                                            <span class="flag">Ordered</span>
                                                                            <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime($order_data->inserted_on)):''?></span></span>
                                                                        </div>
                                                                        <div class="desc">
                                                                            Your order is received.
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div  style="min-height: 380px; max-height: 380px;">
                                                            <ul class="timeline">
                                                                <li>
                                                                    <div class="direction-r">
                                                                        <div class="flag-wrapper">
                                                                            <span class="flag">Ordered</span>
                                                                            <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime($order_data->inserted_on)):''?></span></span>
                                                                        </div>
                                                                        <div class="desc">
                                                                            Your order has been placed.
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php if($order_data->order_status=='ACCEPTED' || $order_data->order_status=='PACKED' || $order_data->order_status=='DISPATHED'|| $order_data->order_status=='IN TRANSIT' || $order_data->order_status=='DELIVERED') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">Accepted</span>
                                                                                <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime("+3 hours", strtotime($order_data->inserted_on))):''?></span></span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Seller has processed your order.
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if($order_data->order_status=='PACKED' || $order_data->order_status=='DISPATHED' || $order_data->order_status=='DELIVERED') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">Packed</span>
                                                                                <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime("+1 day",strtotime($order_data->inserted_on))):''?></span></span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Your item has been picked up by courier partner.
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if($order_data->order_status=='DISPATHED' || $order_data->order_status=='DELIVERED') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">DISPATHED</span>
                                                                                <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime("+2 day", strtotime($order_data->inserted_on))):''?></span></span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Your order has been dispatched by 
                                                                                <?php if($order_data->send_by=='Other') { ?>
                                                                                    <?php echo(isset($order_data->courier_partner) && !empty($order_data->courier_partner))?$order_data->courier_partner:'NA'?>
                                                                                <?php } else { ?>
                                                                                    <?php echo(isset($order_data->send_by) && !empty($order_data->send_by))?$order_data->send_by:'NA'?>
                                                                                <?php } ?>
                                                                                <br>
                                                                                Your Tracking ID is <span style="color: red"><i><?php echo (isset($order_data->tracking_id) && !empty($order_data->tracking_id))?$order_data->tracking_id:'NA'; ?></i></span><br>
                                                                                <?php if($order_data->send_by=='Indian Post') { ?>
                                                                                    <a target="new" href="https://www.indiapost.gov.in/VAS/Pages/TrackConsignment.aspx">Click here for tracking</a>
                                                                                <?php } else if($order_data->send_by=='ST Bus Post') { ?>
                                                                                    <a target="new" href="https://gcpl111.com/ParcelTrack.aspx">Click here for tracking</a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if($order_data->order_status=='DELIVERED') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">DELIVERED</span>
                                                                                <span class="time-wrapper"><span class="time"><?php echo(isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y h:i A", strtotime("+5 day", strtotime($order_data->inserted_on))):''?></span></span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Your item has been DELIVERED.
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if($order_data->order_status=='COMPLETE') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">DELIVERED</span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Your item has been DELIVERED
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?> 
                                                                <?php if($order_data->order_status=='CANCELLED') { ?>
                                                                    <li>
                                                                        <div class="direction-r">
                                                                            <div class="flag-wrapper">
                                                                                <span class="flag">Cancelled</span>
                                                                                    <span class="time-wrapper"><span class="time">
                                                                                        <?php $date = strtotime("+3 day", strtotime($order_data->inserted_on)); echo date("d-M-Y", $date); ?> 12:00 PM
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                            <div class="desc">
                                                                                Your order has been cancelled
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?> 
                                                            </ul>
                                                        </div>
                                                    <?php } ?>
                                                    <div style="padding: 5px; background-color: #cecece; height: 80px;">
                                                        <span style="padding: 5px;"><i><?php echo (isset($order_data->order_comment) && !empty($order_data->order_comment))?$order_data->order_comment:'Comment'; ?></i></span>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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