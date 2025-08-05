<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>प्रश्न(FAQ) | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?> </title>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">प्रश्न(FAQ)</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-12 col-sm-12">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <?php if(isset($faq_topic_data)&& !empty($faq_topic_data)) 
                                    {  ?>
                                        <ul class="tabbable faq-tabbable">
                                            <?php foreach ($faq_topic_data as $key) {?>
                                                <li class=""><a href="#tab_<?php echo $key->faq_topic_id ;?>" data-toggle="tab" style="font-weight: 600;"><?php echo $key->faq_topic_name; ?></a></li>
                                            <?php }?>
                                        </ul>
                                    <?php }?>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <div class="tab-content" style="padding:0; background: #fff;">
                                        <?php if(isset($faq_topic_data)&& !empty($faq_topic_data)) 
                                        {  $i=1; 
                                            foreach ($faq_topic_data as $key) 
                                            { ?>
                                                <div class="tab-pane active" id="tab_<?php echo $key->faq_topic_id ;?>">
                                                    <?php $faqs=$this->common_model->selectAllWhr('tbl_faq','faq_topic_id',$key->faq_topic_id);
                                                    if(isset($faqs)&& !empty($faqs)) 
                                                    { $j=1; ?>
                                                        <div class="panel-group" id="accordion<?php echo $i ;?>">
                                                            <?php foreach ($faqs as $row) {?>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                   <a href="#accordion<?php echo $i ;?>_<?php echo $row->faq_id;?>" data-parent="#accordion<?php echo $i ;?>" data-toggle="collapse" class="accordion-toggle" style="font-size: 15px; font-weight: 600;">
                                                                   <?php echo $row->question_name; ?> 
                                                                   </a>
                                                                </h4> </div>
                                                                    <div class="panel-collapse collapse <?php if($j==1)echo 'in'; ?>" id="accordion<?php echo $i ;?>_<?php echo $row->faq_id;?>">
                                                                        <div class="panel-body">
                                                                            <?php echo $row->answer; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php $j++;  } ?>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            <?php $i++; } 
                                        } ?>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?> assets/site/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-validation/lib/jquery.form.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/common.js"></script>
        <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init();
            Layout.init();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
            <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>