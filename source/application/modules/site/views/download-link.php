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
    <title>डाउनलोड | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
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
    <!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
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
                    <li class="active">डाउनलोड</li>
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
                       <!-- <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>डाउनलोड </div>
                            </div>
                            <div class="portlet-body"> -->
                                <div class="row">
                                    <?php if(isset($download_data) && !empty($download_data)){
                                        function random_color_part() {return str_pad( dechex( mt_rand( 0, 150 ) ), 2, '0', STR_PAD_LEFT); } function random_color() {return random_color_part() . random_color_part() . random_color_part(); }
                                        foreach ($download_data as $key) 
                                        { 
                                            $color = '#'.random_color(); ?>
                                            <div class="col-md-4 ">
                                                <div class="portlet box" style="background-color: <?php echo $color; ?>; border: 1px solid <?php echo $color; ?>;">
                                                    <div class="portlet-title">
                                                        <div class="caption"> <i class="fa fa-gift" style="color: white;"></i><?php echo (isset($key->download_link_name) && !empty($key->download_link_name))?$key->download_link_name:'';?> </div>
                                                    </div>
                                                    <?php if(isset($key->download_link_master_id) && !empty($key->download_link_master_id) && ($key->download_link_master_id=='1') || isset($key->download_link_master_id) && !empty($key->download_link_master_id) && ($key->download_link_master_id=='2'))
                                                    {?>
                                                        <div class="portlet-body ">
                                                            <p><?php echo (isset($key->download_link_description) && !empty($key->download_link_description))?$key->download_link_description:'';?> <a href="<?php echo base_url(); ?>uploads/download_master_file/<?php echo (isset($key->upload_user_guide) && !empty($key->upload_user_guide))?$key->upload_user_guide:'';?>" download><?php echo(isset($key->upload_user_guide) && !empty($key->upload_user_guide))?'User Guide':'';?></a></p>
                                                            <div class="text-center">
                                                                <?php $institute_code = $this->session->userdata('institute_code');?>
                                                                <a href="javascript:void(0);" data-url="<?php echo (isset($key->download_link_master_id) && !empty($key->download_link_master_id))?$key->download_link_master_id:'';?>" data-code="<?php echo $institute_code; ?>" class="btn m-icon <?php if(isset($key->download_link_master_id) && !empty($key->download_link_master_id) && ($key->download_link_master_id=='2')){
                                                                    echo 'download_exam';} else { echo 'verify-password'; } ?>" style="background-color: <?php echo $color; ?>; color: white;">Download <i class="m-icon-swapdown m-icon-white"></i> </a>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    else{ ?>
                                                        <div class="portlet-body ">
                                                            <p><?php echo (isset($key->download_link_description) && !empty($key->download_link_description))?$key->download_link_description:'';?> <a href="<?php echo base_url(); ?>uploads/download_master_file/<?php echo (isset($key->upload_user_guide) && !empty($key->upload_user_guide))?$key->upload_user_guide:'';?>" download><?php echo(isset($key->upload_user_guide) && !empty($key->upload_user_guide))?'User Guide':'';?></a></p>
                                                            <div class="text-center">
                                                                <a target="_new" href="<?php echo (isset($key->download_link) && !empty($key->download_link))?$key->download_link:'';?>" data-url="<?php echo (isset($key->download_link_master_id) && !empty($key->download_link_master_id))?$key->download_link_master_id:'';?>" class="btn m-icon" style="background-color: <?php echo $color; ?>; color: white;">Download <i class="m-icon-swapdown m-icon-white"></i> </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php }
                                    }?>
                                </div>
                            <!-- </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url(); ?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>