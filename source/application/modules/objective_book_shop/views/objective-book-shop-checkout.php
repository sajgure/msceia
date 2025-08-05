<?php $cart = $this->cart->contents(); 
if (empty($cart)) { redirect('objective-shop'); }?>
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
    <title>Checkout | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
    </title>
    <base href="<?php echo base_url(); ?>">
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
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
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
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<!-- Body BEGIN -->

<body class="ecommerce">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('objective_book_shop/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>objective-shop">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <form action="save_order" enctype="multipart/form-data" id="book_order"  method="post" class="horizontal-form">
                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN CHECKOUT PAGE -->
                            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                                <!-- BEGIN CHECKOUT -->
                                <div id="checkout" class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                                Step 1: Confirm Order
                                            </a>
                                        </h2> 
                                    </div>
                                    <div id="checkout-content" class="panel-collapse collapse in">
                                        <div class="panel-body row">
                                            <div class="col-md-12 col-sm-12">
                                                <legend>Shipping Address</legend>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p><b>Name :- </b><?php echo (isset($user_data->institute_name) && !empty($user_data->institute_name))?$user_data->institute_name:'';?></p>
                                                        <input type="hidden" name="user_name" value="<?php echo (isset($user_data->institute_name) && !empty($user_data->institute_name))?$user_data->institute_name:'';?>">
                                                        <p><b>Mobile :- </b><?php echo (isset($user_data->institute_contact) && !empty($user_data->institute_contact))?$user_data->institute_contact:'';?></p>
                                                        <input type="hidden" name="user_mobile" value="<?php echo (isset($user_data->institute_contact) && !empty($user_data->institute_contact))?$user_data->institute_contact:'';?>">
                                                        <p><b>Email :- </b><?php echo (isset($user_data->institute_mail) && !empty($user_data->institute_mail))?$user_data->institute_mail:'';?></p>
                                                        <input type="hidden" name="user_email" value="<?php echo (isset($user_data->institute_mail) && !empty($user_data->institute_mail))?$user_data->institute_mail:'';?>">
                                                        <p><b>Address :- </b><?php echo (isset($user_data->institute_address) && !empty($user_data->institute_address))?$user_data->institute_address:'';?></p>
                                                        <input type="hidden" name="address" value="<?php echo (isset($user_data->institute_address) && !empty($user_data->institute_address))?$user_data->institute_address:'';?>">
                                                        <p style="float: right; color: red;">NOTE :- If your address is wrong then change address using <b><a href="<?php echo base_url();?>edit-profile"> Edit Profile</a></b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END CHECKOUT -->
                                <!-- BEGIN CONFIRM -->
                                <div id="confirm" class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                                Step 2: Order Summery
                                            </a>
                                        </h2> 
                                    </div>
                                    <div id="confirm-content" class="panel-collapse">
                                        <div class="panel-body row">
                                            <div class="col-md-12 clearfix">
                                                <div class="table-wrapper-responsive">
                                                    <?php $cart = $this->cart->contents();
                                                    $sub_total=0;
                                                    $shipping=0; ?>
                                                    <table>
                                                        <tr>
                                                            <th class="goods-page-image">Image</th>
                                                            <th class="goods-page-description">Description</th>
                                                            <th class="goods-page-price">Unit price</th>
                                                            <th class="goods-page-quantity">Quantity</th>
                                                            <th class="goods-page-total" colspan="2">Total</th>
                                                        </tr>
                                                        <?php $total_qty = 0; 
                                                        foreach($cart as $items) 
                                                        {
                                                            if($items['options']['type'] == 'objective_books')
                                                            { 
                                                                if($items['id']!=6){$total_qty = $total_qty+$items['qty'];}
                                                                $sub_total=$sub_total+$items['subtotal']; ?>
                                                            <tr>
                                                                <td class="checkout-image"> <a href="javascript:;"><img src="<?php echo base_url();?>uploads/objective_product_photos/<?php echo $items['product_image']?>" alt="Berry Lace Dress"></a> </td>
                                                                <td class="checkout-description">
                                                                    <h3><a href="javascript:;"><?php echo $items['name']; ?></a></h3> <em><?php echo $items['desc']; ?></em> </td>
                                                                <td class="goods-page-price"> 
                                                                    <strong><span class="fa fa-inr"></span><?php echo $items['price']; ?></strong> 
                                                                </td>
                                                                <td class="goods-page-quantity">
                                                                    <div class="product-quantity">
                                                                         <input id="product-quantity" readonly type="text" name="qty" rel="update_cart/<?php echo $items['rowid']?>" value="<?php echo $items['qty']?>" class="form-control input-sm btn_qty">
                                                                    </div>
                                                                </td>
                                                                <td class="goods-page-total"> 
                                                                    <strong><span class="fa fa-inr"></span></span> <?php echo ($items['subtotal']); ?></strong> 
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                                <div class="checkout-total-block">
                                                    <?php if(isset($total_qty) && ($total_qty<25))
                                                    {
                                                      $shipping= 50;
                                                    } 
                                                    else{
                                                      $shipping= 0;
                                                    }?>
                                                    <ul>
                                                        <li> <em>Shipping & Handling cost</em> <strong class="price"><span class="fa fa-inr"></span><?php echo $shipping; ?></strong> </li>
                                                        <li class="checkout-total-price"> <em>Total</em> <strong class="price"><span class="fa fa-inr"></span> <?php echo ($sub_total + $shipping); ?></strong> </li>
                                                        <input type="hidden" name="order_price" value="<?php echo ($sub_total + $shipping); ?>">
                                                        <input type="hidden" name="sub_total" value="<?php echo $sub_total; ?>">
                                                        <input type="hidden" name="shipping_total" value="<?php echo $shipping; ?>">
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                                <br> <a><span><strong style="color: #E02222;">GCC-TBC Objective Book HelpLine No: +919869380948</strong></span></a>
                                                <span><strong style="color:red;margin-left: 3%;">दिलेली ऑर्डर येण्याकरिता ५ ते ६ working days लागतील.</strong> </span>
                                                <?php if(isset($total_qty) && ($total_qty>=10))
                                                {?>
                                                    <button class="btn btn-primary pull-right pay_objective_shop_order" type="submit" id="button-confirm">PAY ONLINE</button>
                                                <?php }
                                                else { ?>
                                                    <span style="float: right;"><strong style="color:red;">Note :- कमीतकमी १० पुस्तकांची ऑर्डर द्यावी.</strong> </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END CONFIRM -->
                            </div>
                            <!-- END CHECKOUT PAGE -->
                        </div>
                    </form>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
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
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>