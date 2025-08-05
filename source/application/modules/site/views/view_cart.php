<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Objective Shop |<?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
  <base href="<?php echo base_url(); ?>">
  <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  
   <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <style type="text/css">
            @media only screen and (max-width: 600px) 
            {
                .header-img 
                { 
                    width: 256px !important;
                }
            }
            .slidercustom
            {
              height: 150px;
            }
        </style>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
     <?php $this->load->view('site/header_addtocart'); ?>
    
  

 

    <!-- BEGIN HEADER -->
    <div class="header">
      
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          
          <?php
                   
                  if(isset($cartitems) && !empty($cartitems)){
                   // print_r($book_data); ?>
         
          <div class="col-md-12 col-sm-12">
               <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                       <table summary="Shopping cart">
                             <tr>
                                <th class="goods-page-image">Image</th>
                                <th class="goods-page-description">Description</th>
                                <th class="goods-page-price">Unit price</th>
                                <th class="goods-page-quantity">Quantity</th>
                                <th class="goods-page-total" colspan="2">Total</th>
                              </tr>
                          
                              <tr>
                               <?php if($this->cart->total_items()>0)
                                       foreach ($cartitems as $key) {?>
                                <td class="goods-page-image">
                                  <a href="javascript:;"><img src="<?php echo base_url(); ?>uploads/objective_product_photos/<?php echo(isset($key->product_image) && !empty($key->product_image))?$key->product_image:'default.png';?>" alt="Berry Lace Dress" name="image"></a>
                                </td>
                                <td class="goods-page-description">
                                  <h3><a href="javascript:;" name="name"><?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:'';?></a></h3>
                                  <h3><a href="javascript:;" name="desc"><?php echo (isset($key->short_description) && !empty($key->short_description))?$key->short_description:'';?></a></h3>
                                <!--   <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                                  <em>More info is here</em> -->    
                                </td>
                                <!-- <td style="border-bottom: none;" class="goods-page-price">
                                  <strong style="text-decoration:line-through;"><span>Rs.</span> <?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price:'';?></strong>
                                </td> -->
                                <td style="border-bottom: none;" class="goods-page-price">
                                      <strong><span>Rs</span><?php echo (isset($key->selling_prices) && !empty($key->selling_prices))?$key->selling_prices:'';?></strong>
                                </td>
                                 <td class="goods-page-quantity">
                                <div class="product-quantity">
                                    <input id="product-quantity" type="text" value="0" readonly class="form-control input-sm">
                                </div>
                              </td>
                                <td style="border-bottom: none;" class="goods-page-total">
                                                                <strong><span>Rs.</span> <?php echo (isset($key->selling_prices) && !empty($key->selling_prices))?$key->selling_prices:'';?></strong>
                                </td>
                             
                    
                  </tr>
                
                  <?php
                        } ?>
                </table>
                                        <?php }else{ ?>
                 Sorry No User Data Available
                 <?php } ?> 
                </div>

                <div class="shopping-total">
                  <ul>
                    <li>
                      <em>Sub total</em>
                      <strong class="price"><span>$</span>47.00</strong>
                    </li>
                    
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span>$</span>50.00</strong>
                    </li>
                  </ul>
                </div>
              </div>
               <a ><span><strong>GCC-TBC Objective Book HelpLine No: +919869380948</strong></span></a>
                <a style="margin-left: 570px;" href="https://www.msceia.in/terms_conditions"><span ><strong>Terms & Conditions</strong></span></a>
              <button class="btn btn-primary" type="submit" "<?php echo base_url();?>addTocart>Checkout <i class="fa fa-check"></i></button>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
          <!-- BEGIN CONTENT -->
          
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
       
      </div>
    </div>
  
<!--------Footer start---------->
   <?php $this->load->view('site/footer'); ?>

  <!--------Footer end---------->  

    

  

   
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo base_url();?>assets/site/assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url();?>assets/site/assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
    <!-- END LayerSlider -->

   <!--  <script src="<?php echo base_url();?>assets/frontend/layout/scripts/layout.js" type="text/javascript"></script> -->
     <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>