<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>राज्य-कार्यकारिणी | MSCEIA</title>

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
  <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/gallery.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>
   <?php $this->load->view('site/header'); ?>

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>">होम </a></li>
            <!-- <li><a href="javascript:;">Pages</a></li> -->
            <li class="active">राज्य-कार्यकारिणी (२०१९-२०२३)</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <div class="col-md-12">
            <div class="content-page">
              <div class="row margin-bottom-40">
                  <?php if(isset($committee_data) && !empty($committee_data)){
                        foreach ($committee_data as $x_value) {?>
                  <div class="col-md-3 col-sm-4 gallery-item">
                      <?php $path = './uploads/committee_member_photos/'.$x_value["image"];
                      if(file_exists($path))
                      {?>
                        <img src=" <?php echo base_url();?>uploads/committee_member_photos/<?php echo (isset($x_value["image"]) && !empty($x_value["image"]))?$x_value["image"]:'';?>"  alt="User Image" >
                      <?php }
                      else
                      {
                        ?><img src=" <?php echo base_url();?>uploads/committee_member_photos/<?php echo (isset($x_value["image"]) && !empty($x_value["image"]))?$x_value["image"]:'';?>"  alt="User Image">
                        <?php
                      } ?>
                         <br>
                          <strong style="margin-left: 45px;"><?php echo (isset($x_value["committee_name"]) && !empty($x_value["committee_name"]))?$x_value["committee_name"]:'';?></strong><br>
                          <b style="margin-left: 45px;"><?php echo (isset($x_value["committee_"]) && !empty($x_value["committee_name"]))?$x_value["committee_name"]:'';?></b>
                  </div>
                  <?php
                   } 
                  }?>
              </div>
            </div>
          </div>
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