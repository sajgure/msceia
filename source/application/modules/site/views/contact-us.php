<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>संपर्क | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?> </title>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
    @media only screen and (max-width: 600px) {
        .header-img {
            width: 256px !important;
            ;
        }
    }
    </style>
</head>
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">संपर्क</li>
                </ul>
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-8 col-sm-9">
                                    <p>संघटनेच्या साईट (msceia.in)  वर संस्था नोंदणी, विद्यार्थी नोंदणी याबाबत कुठल्याही माहितीसाठी दिलेल्या क्रमांकावर संपर्क करावा किंवा खाली दिलेल्या फॉर्म मध्ये तुमची समस्या नोंदवावी</p>
                                    <p style="color: red;">Note: Not for New Government Typing Center registration.</p>
                                    <form action="contact" id="contact" role="form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" method="post" data-redirect="contact-us">
                                        <div class="form-body row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="contacts-name">Full Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                       <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="contacts-email">Email<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="contacts-email">Mobile Number<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                         <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" required>
                                                        <input type="hidden" class="form-control" name="status" id="status">
                                                        <input type="hidden" class="form-control" name="reply" id="reply">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                     <label for="contacts-message">Message<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <textarea class="form-control" rows="5" name="message" id="message" placeholder="Enter Message" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-action">
                                            <button type="submit" class="btn green common_save" rel="" data-pk="contact_id">Submit</button>
                                        <button type="button" class="btn btn-danger resetData">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-sm-3 sidebar2">
                                    <?php $id = $this->session->userdata('institute_code');  
                                        if(isset($id) && !empty($id)) 
                                    { ?>
                                    <h2>संपर्क</h2>
                                    <div class="well"> 
                                        <address style="padding-bottom: 14px;">
                                            <strong>मोबाइल नंबर</strong><br>
                                            <?php /*<i class="fa fa-phone"></i> <a href="tel: 020-68281401" style="text-decoration: none;font-weight: 700;color: #3e4d5c;font-size:16px;">020-68281401 </a><br> */ ?>
                                            <?php $contact = array("+91 9130805343","+91 7249843390","+91 7767939555"); 
                                            shuffle($contact);
                                            foreach($contact as $cont) { ?>
                                                <div class="col-md-6" style="padding-left: 0px !important;">
                                                    <i class="fa fa-phone"></i> <a href="tel:<?php echo $cont; ?>" style="text-decoration: none;font-weight: 500;color: #3e4d5c;font-size:14px;"><?php echo $cont; ?> </a>
                                                </div>
                                            <?php } ?>
                                        </address><br><br> 
                                        <address>
                                            <strong>Whatsapp Number </strong><br>
                                            <i class="fa fa-whatsapp f_left color_dark"></i> <a href="https://web.whatsapp.com/" target="_new" style="text-decoration: none;font-weight: 500;color: #3e4d5c;">+91 7028 6855 05 </a><br>
                                        </address> 
                                        <address>
                                            <strong>ई-मेल </strong><br>
                                            <i class="fa fa-envelope-o f_left color_dark"></i> <a href="mailto:msceiateam@gmail.com" target="_new" style="text-decoration: none;font-weight: 500;color: #3e4d5c;">msceiateam@gmail.com </a><br>
                                        </address> 
                                    </div>
                                    <?php }?>
                                    <h2 class="padding-top-20">MSCEIA</h2>
                                    <p style="text-align: justify;">महाराष्ट्र स्टेट कॉमर्स एजुकेशनल इन्स्टिटुट्स असोसिएशनची 50 वर्षात होणारी वाटचाल ही 21 व्या शतकात गतिमान करतानाच जगत होत असलेल्या संगणकीय युगात आपणच मागे का ? हा प्रश्न मणी बाळगून राज्य संघटनेदवारे www.msceia.in ही वेबसाइट निर्माण करून संस्था चालकांना संपर्काचे महत्वाचे साधन उपलब्ध करून दिले आहे.</p>
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
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
        <script type="text/javascript">
            $(document).on('click','.resetData', function(){
                var formId = '#'+$(this).parents('form').attr('id');
                $('#email').val('');
                $(formId).find('input:text, input:password, input:file, select,textarea').val('');
                $(formId).find('button:submit').removeAttr('disabled');
                $(formId).find('input:checkbox').removeAttr('checked').removeAttr('selected');
                $(formId).find('.select2-container').select2('val','0');
                $('html, body').animate({scrollTop:0});
            });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>