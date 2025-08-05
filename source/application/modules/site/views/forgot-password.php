<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Forgot Password | Msceia</title>
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

  <link rel="shortcut icon" href="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/favicon.png">

  <!-- Fonts START -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
  <style type="text/css">
    @media only screen and (max-width: 600px) 
    {
      .header-img { 
        width: 256px !important;;
      }
    }
  </style>
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    
    <!-- BEGIN TOP BAR -->
    <?php $this->load->view('site/header'); ?>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>">होम </a></li>
            <li class="active">नवीन पासवर्ड </li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h3>तुमचा पासवर्ड विसरलात ?</h3>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-12">
                  <form action="javascript:(0);?>" method="POST" class="horizontal-form" id="" novalidate="novalidate"> 
                    <div class="form-group">
                        <div class="input-group"> 
                          <span class="input-group-addon input-sm">
                            <i class="fa fa-envelope"></i>
                          </span>
                          <input type="text" class="form-control" name="email" id="email" placeholder="Registered Email">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12  padding-top-5">
                        <button type="submit" class="btn btn-sm green common_save pull-right">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2> महत्वाची माहिती </h2>
                    <p>संस्था नोंदणी करताना दिलेला ई-मेल वर तुम्हाला तुमचा नवीन पासवर्ड मिळेल</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>