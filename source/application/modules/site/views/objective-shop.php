<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>होम | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
        <base href="<?php echo base_url(); ?>">
        <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
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
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
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
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
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
        <div class="page-slider margin-bottom-40">
            <div class="fullwidthbanner-container revolution-slider" style="width: 100%; 
                     height:280px; margin: 0 auto;">
                <div class="fullwidthabnner">
                    <ul id="revolutionul"> 
                        <!-- THE NEW SLIDE -->
                        <?php if(isset($slider_data1) && !empty($slider_data1))
                        { 
                          // print_r($slider_data1);
                            foreach ($slider_data1 as $key)
                            { ?>
                                <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo base_url();?>uploads/objective_slider_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>">
                                  <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                                    <img src="<?php echo base_url();?>uploads/objective_slider_photos/<?php echo (isset($key->image_upload) && !empty($key->image_upload))?$key->image_upload:'';?>">
                                </li>  
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div> 
        <!-- END SLIDER -->
        <div class="main">
            <div class="container">
                <!--  <?php if(isset($notice_data) && !empty($notice_data))
                {  ?>
                    <div class=" margin-bottom-10"><marquee style="color: orangered;" scrollamount="6"><b> <i style="font-size: 20px;"><?php echo(isset($notice_data['name']) && !empty($notice_data['name']))?$notice_data['name']:'';?></i></b></marquee></div>
                <?php } ?> -->
                <!-- BEGIN SERVICE BOX -->    
                <div class="row margin-bottom-20 margin-top-40">
                <!-- BEGIN CONTENT -->
                   <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('objective-booksidebar');?>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-9 col-sm-9">
                        <div class="portlet-body" style="background: rgba(244,244,244,0.5);padding: 20px;">
                            <div class="row">
                                <div class="goods-page">
                                    <div class="goods-data clearfix">
                                            <div class="table-wrapper-responsive">
                                                  <table summary="Shopping cart">
                                                    <?php 
                                                        if(isset($book_allproduct_data) && !empty($book_allproduct_data)){?>
                                                    <tr>
                                                        <th class="goods-page-image">Image</th>
                                                        <th class="goods-page-description">Description</th>
                                                        <th class="goods-page-quantity">Quantity</th>
                                                        <th class="goods-page-price">Unit price</th>
                                                        <th class="goods-page-total" colspan="2">Total</th>
                                                    </tr>
                                                    <?php $i=1;
                                                        foreach ($book_allproduct_data as $key) {
                                                          //print_r($key);
                                                        ?>
                                                    <tr>
                                                    <td class="goods-page-image">
                                                      <a href="javascript:;"><img src="./assets/frontend/pages/img/products/model3.jpg" alt="Berry Lace Dress"></a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                      <h3><a href="javascript:;">
                                                       <?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:'';?></a></h3>
                                                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                                                      <em>More info is here</em>
                                                    </td>
                                                    <td class="goods-page-quantity">
                                                      <div class="product-quantity">
                                                          <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                                                      </div>
                                                    </td>
                                                    <td class="goods-page-price">
                                                      <strong><span>$</span>47.00</strong>
                                                    </td>
                                                    <td class="goods-page-total">
                                                      <strong><span>$</span>47.00</strong>
                                                    </td>
                                                    <td class="del-goods-col">
                                                      <a class="del-goods" href="javascript:;">&nbsp;</a>
                                                    </td>
                                                  </tr>
                                                    <?php } ?>
                                                  </table>
                                                  <?php } ?>
                                            </div>
                                    </div>
                                </div>
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
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
        <!-- BEGIN RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
         <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
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
                //LayersliderInit.initLayerSlider();
                RevosliderInit.initRevoSlider();
                Layout.initTwitter();
                Layout.initTouchspin();
                Layout.initUniform(); 
                Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
                Layout.initNavScrolling();
            });
        </script>
        <script>
            jQuery(document).ready(function() {  
                Metronic.init(); 
                Layout.init(); 
                Demo.init(); 
                $("#draggable").draggable({
                    handle: ".modal-header"
                });
            });
        </script>
    </body>
    <!-- END BODY -->
</html>