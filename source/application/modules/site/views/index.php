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
        <div class="page-slider margin-bottom-40">
            <div class="fullwidthbanner-container revolution-slider">
                <div class="fullwidthabnner">
                    <ul id="revolutionul">
                        <!-- THE NEW SLIDE -->
                        <?php if(isset($slider_data) && !empty($slider_data))
                        { 
                            foreach ($slider_data as $key)
                            { ?>
                                <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo base_url();?>uploads/slider_photos/<?php echo (isset($key->image) && !empty($key->image))?$key->image:'';?>">
                                  <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                                    <img src="<?php echo base_url();?>uploads/slider_photos/<?php echo (isset($key->image) && !empty($key->image))?$key->image:'';?>">
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
                <div class=" margin-bottom-20">
                    <marquee style="color: orangered;" scrollamount="6">
                        <?php if(isset($news_data) && !empty($news_data))
                        {
                            foreach ($news_data as $key)
                            { ?>
                                <b> <i style="font-size: 20px;"><?php echo(isset($key->news_name) && !empty($key->news_name))?$key->news_name:'';?></i></b>
                            <?php }
                        } ?>
                    </marquee>
                </div>
                <!-- BEGIN SERVICE BOX -->   
                <div class="row margin-bottom-20 margin-top-40">
                <!-- BEGIN CONTENT -->
                    <div class="col-md-9 col-sm-9">
                        <!-- BEGIN INFO BLOCK -->
                        <p style="font-size:16px; line-height:1.6em;text-align:justify;">महाराष्ट्र स्टेट कॉमर्स एजुकेशनल इन्स्टिटुट्स असोसिएशनची 50 वर्षात होणारी वाटचाल ही 21 व्या शतकात गतिमान करतानाच जगत होत असलेल्या संगणकीय युगात आपणच मागे का ? हा प्रश्न मनी बाळगून राज्य संघटनेदवारे www.msceia.in ही वेबसाइट निर्माण करून संस्था चालकांना संपर्काचे महत्वाचे साधन उपलब्ध करून दिले आहे.</p>
                        <p style="font-size:16px; line-height:1.6em;text-align:justify;">www.msceia.in वेबसाइटद्वारे संस्था चालकांना संघटनेचे कार्य, योजना, आजीव सभासदची परिपूर्ण माहिती ,शासन आदेश याचबरोबर इतरही महत्वपूर्ण घडामोडी क्षणात प्राप्त करून घेण्याची संधि निर्माण करून दिली आहे.संघटनेची वेबसाइट उघडून त्याचे सूक्ष्म निरीक्षण केल्यास आपण कोठे होतो आणि आज कोठे आहोत हे आम्हा कार्यकारिणीस सांगायची आवश्यकता राहिली नाही ही आमची कामाची पावती आहे. राज्य संघटनेचे कार्य, संस्थाचा राज्यातील वाढती संख्या, पोस्टाचा होणारा विलंब अथवा खर्च या सर्व बाबीचा संघटनेच्या हिताचा विचार करूनच www.msceia.in या वेबसाइटचा परिपूर्ण वापर करून गतिमान प्रशासन करण्याचा आमच्या प्रयत्नाचे आज अनेक संस्था चालकांनी कौतुकच केले आहे. </p>
                        <p style="font-size:16px; line-height:1.6em;text-align:justify;">संस्थाचालकाणी वेबसाईटचा वापर दैनंदिन करावा महाराष्ट्र राज्य परीक्षा परिषदेची वेबसाइट www.ms-ce.org पाहताना संघटनेची www.msceia.in ही पण वेबसाइट अवश्य पाहून दैनंदिन कामकाज करताना आवश्यक वाटणार्‍या बाबींची नोंद घ्यावी. संघटनेचे वेबसाइटवर शासन आदेश, परिपत्रक, तातडीचा पत्रव्यवहार , परीक्षा पद्धती संघटना कार्य, संस्थाच्या हिताच्या गोष्टी त्याचबरोबर राज्यातील शासनमान्य वाणिज्य संस्था राज्याचे शालेय शिक्षण विभागाचे अधिपत्याखाली टंकलेखन / लघुलेखनाचे प्रशिक्षण देवून महाराष्ट्र राज्य परीक्षा परिषदेमार्फत पत्रातधारक विद्यार्थी घडवित असताना व याकामी राज्याचे शिक्षण मंत्री ,शिक्षण खाते (माध्यमिक विभाग) अध्यक्ष व परीक्षा परिषद यांच्यात समन्वय दर्शिवणारी वेबसाइट उपलब्ध करताना मा. आयुक्त तथा अध्यक्ष महावीर माने साहेब, संघटनेचे पदाधिकारी, या क्षेत्रातील आमचे मित्र परिवार यांचे मार्गदर्शन व प्रेरणा मिळाल्यानेच हाती घेतलेले कार्य पूर्णत्वास नेताना अतिशय आनंद होत आहे .</p>
                    </div>
                    <div class="col-md-3 margin-bottom-30">
                        <div class="portlet box blue panel1">
                            <div class="portlet-title ">
                                <div class="caption">
                                    <i class="fa fa-newspaper-o"></i> News
                                </div>
                            </div>
                            <div class="portlet-body " style="height: 300px;">
                                <ul class="demo2 general-item-list" style="margin-left: -30px; height: 314px; overflow-y: hidden;">
                                    <?php if(isset($gr_data) && !empty($gr_data))
                                    { $i=0;
                                        foreach($gr_data as $row)
                                        { ?>
                                            <li class="news-item">
                                                <?php echo(isset($row->inserted_on) && !empty($row->inserted_on))?date('d-M-Y h:i A',strtotime($row->inserted_on)):'';?>
                                                <p class="font-green-haze bold" > <?php echo(isset($row->gr_master_title) && !empty($row->gr_master_title))? substr($row->gr_master_title, 0, 75): ''; ?> ...&nbsp;
                                                    <a class="item-name primary-link" href="<?php echo base_url();?>news-details/<?php echo $row->gr_master_id?>" target="new"><sub>Read More...</sub></a>
                                                 </p>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SERVICE BOX -->
                <div class="row margin-bottom-40">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-committe">
                            <?php if(isset($members_data) && !empty($members_data))
                            {
                                foreach ($members_data as $key)
                                {?>
                                    <div class="client-item" style="width: 155px !important;padding: 5px;border: solid 1px #b5b5b5;height: 228px;"> 
                                        <img src="<?php echo base_url();?>uploads/member_photos/<?php echo(isset($key->photo) && !empty($key->photo))?$key->photo:''; ?>" class="color-img img-responsive" style="height: 126px;width: 143px;"> <br>
                                        <span class="bold"><?php echo(isset($key->name) && !empty($key->name))?$key->name:''; ?> </span><br> 
                                        <small><?php echo(isset($key->designation) && !empty($key->designation))?$key->designation:''; ?></small>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div> 
                    <!-- <div class="col-md-3 margin-bottom-30 testimonials-v1">
                        <div style="position:relative;height:0;padding-bottom:56.21%"><iframe src="https://www.youtube.com/embed/G0Y_6_ssKrY?ecver=2" style="position:absolute;width:100%;height:140%;left:0" width="641" height="360" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                    </div> -->          
                </div>
                <!-- BEGIN CLIENTS -->
                <!-- <div class="row margin-bottom-40 our-clients">
                    <div class="col-md-3">
                        <h2><a href="javascript:;">Our Clients</a></h2>
                        <p>Our clients are at the core of our success.</p>
                    </div>
                    <div class="col-md-9">
                        <div class="owl-carousel owl-carousel6-brands">
                            <?php if(isset($clients_data) && !empty($clients_data))
                            {   
                                foreach ($clients_data as $key)
                                {?>
                                    <div class="client-item" style="margin-left: 4px;">
                                        <a href="<?php echo (isset($key->link) && !empty($key->link))?$key->link:'';?>" target="_new">
                                            <img src="<?php echo base_url();?>uploads/client_photos/<?php echo (isset($key->logo) && !empty($key->logo))?$key->logo:'';?>" class="img-responsive" alt="" style="padding: 8px;">
                                            <img src="<?php echo base_url();?>uploads/client_photos/<?php echo (isset($key->logo) && !empty($key->logo))?$key->logo:'';?>" class="color-img img-responsive" alt="" style="padding: 8px;">
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>          
                </div> -->
            <!-- END CLIENTS -->
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
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
        <!-- BEGIN RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url();?>assets/site/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
        <!-- END RevolutionSlider -->
        <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>assets/js/newsbox.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(function () {        
            $(".demo2").bootstrapNews({
                newsPerPage: 4,
                autoplay: true,
                pauseOnHover: true,
                direction: 'up',
                newsTickerInterval: 4000,
                onToDo: function () {
                    //console.log(this);
                }
            });
            $(".owl-committe").owlCarousel({
                pagination: false,
                navigation: true,
                autoPlay: 4000,
                items: 6,
                addClassActive: true
            });
          });
        </script>
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
        <script>
            jQuery(document).ready(function() {  
                Metronic.init(); 
                Layout.init(); 
                Demo.init(); 
                // $("#draggable").draggable({
                //     handle: ".modal-header"
                // });
            });
        </script>
    </body>
    <!-- END BODY -->
</html>