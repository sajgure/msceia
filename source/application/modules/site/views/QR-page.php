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
    <title>QR Code | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url(); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Maharashtra State Commerce Educational Institutes Association." name="description">
    <meta content="msceia,msceia.in,typing,Student List" name="keywords">
    <meta content="msceia" name="author">
    <meta property="og:msceia.in" content="-CUSTOMER VALUE-">
    <meta property="og:Student List" content="-CUSTOMER VALUE-">
    <meta property="og:Maharashtra State Commerce Educational Institutes Association." content="-CUSTOMER VALUE-">
    <meta property="og:webstt" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <!-- link to image for socio -->
    <meta property="og:msceia.in/Student List" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <style type="text/css">
        .custom_span{
            font-weight: 700; 
            font-size: 16px;
        }
    </style>
</head>

<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <?php $this->load->view('site/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">QR Code </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 text-center">
                        <h4 style="color: red;font-size: 16px;font-weight: 600;line-height: 2.1;">Note: काही तांत्रीक कारणामुळे पेमेंट लींक बंद आहे. कृपया QR कोड चा किंवा अकाऊंट नंबर चा वापर करुन पेमेंट करावे. व पेमेंटचा स्क्रीनशॉट 7028685505 
                        या व्हाट्सॅप नंबरला सेंड करावा. मॅसेज मध्ये Institute Code टाकावा.</h4>
                       <div class="col-md-4">
                            <img class="img-thumbnail" src="<?php echo base_url(); ?>/images/QR_CODE1.png" style="width:90%; margin-top:20px;">
                        </div>
                        <div class="col-md-8" style="padding: 0px;margin-left: -15px;    margin-top: 18px;">
                            <div class="portlet-body" style="background: rgba(244,244,244,0.5);padding: 20px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12" style="margin-bottom:20px;text-align: left;">
                                            <span class="custom_span" style="font-size:20px;">Account Details</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span">Account Name</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span"> : Prajakta Enterprises</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span">Account Number</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span"> : 510101004596799</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span">IFSC Code</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span"> : UBIN0910112</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span">Bank Name</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span"> : Union Bank </span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span">Branch</span>
                                        </div>
                                        <div class="col-md-6" style="text-align: left;">
                                            <span class="custom_span"> : Ahmednagar Branch </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init();
            Layout.init();
            Layout.initFixHeaderWithPreHeader();
            $('select').select2();
        });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>