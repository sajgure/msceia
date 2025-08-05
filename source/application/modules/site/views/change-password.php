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
    <title>पासवर्ड बदला | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url();?>">
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
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
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
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">पासवर्ड बदला</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>पासवर्ड बदला </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="change-institute-password" id="change-institute-password" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="change-password" method="post" enctype="multipart/form-data">
                                   <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Old Password</label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" name="current_password" class="form-control" placeholder="Old Password" required> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">New Password</label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" name="new_password" id="user_pass" class="form-control" placeholder="New Password" required> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Confirm Password</label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm Password" required> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $institute_id=$this->session->userdata('institute_id'); ?>
                                            <input type="hidden"  name="institute_id" class="form-control" value="<?php echo $institute_id; ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn blue common_save" data-pk="institute_id" >Change</button>
                                    </div>
                                </form>
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
            Metronic.init(); // init global framework features
            Layout.init();
            Layout.initUniform();
            Layout.initTwitter();
            ComponentsPickers.init();
            Layout.initFixHeaderWithPreHeader();
            $('select').select2();
        });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>