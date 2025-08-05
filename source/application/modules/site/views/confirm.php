<?php
$institute_code = $this->session->userdata('institute_code');
if (!isset($institute_code) && empty($institute_code)) {
    redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Confirmation | <?php echo (isset($appname) && !empty($appname)) ? $appname : 'MSCEIA'; ?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon)) ? $favicon : 'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
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
    <link href="<?php echo base_url(); ?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/site/assets/global/plugins/select2/select2.css" />
    <link href="<?php echo base_url(); ?>assets/site/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url(); ?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
</head>

<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <?php $this->load->view('site/header'); ?>
    <!-- Header END -->
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">होम</a></li>
                <li>फी नोंदणी </li>
                <li class="active">Payment Confirmation</li>
            </ul>
            <div class="row margin-bottom-40">
                <div class="sidebar col-md-3 col-sm-3">
                    <div class="content-page">
                        <div class="row margin-bottom-40">
                            <?php $this->load->view('my-profilesidebar'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="portlet box blue" style="border: 1px solid #60aee4;">
                        <div class="portlet-body form">
                            <div class="form-body" style="text-align:center;">
                                <img src="<?php echo base_url(); ?>images/success.png" style="width:20%;">
                                <h3 style="margin-bottom:20px;">Thank You. Your Payment Was Successful</h3>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table width="100%" style="font-size: 13px; padding: 20%; margin-bottom:20px;">
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Payment Mode :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b>Online</b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Total Numbeer of Student :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><?php echo isset($fees->total_student) && !empty($fees->total_student) ? $fees->total_student : ''; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Deposite Date :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><?php echo isset($fees->deposite_date) && !empty($fees->deposite_date) ? date('d-m-Y', strtotime($fees->deposite_date)) : ''; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Email :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><?php echo isset($fees->email) && !empty($fees->email) ? $fees->email : ''; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Mobile :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><?php echo isset($fees->mobile) && !empty($fees->mobile) ? $fees->mobile : ''; ?></b></td>
                                            </tr>
                                            <tr style="font-size: 16px; margin-bottom:7px;">
                                                <td style="text-align: left !important; padding:5px;">Total Amount :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><i class="fa fa-inr"></i> <?php echo isset($fees->total_amount) && !empty($fees->total_amount) ? $fees->total_amount : ''; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left !important; padding:5px;">Transction ID :-</td>
                                                <td style="text-align: right !important; padding:5px;"><b><?php echo isset($fees->transaction_no) && !empty($fees->transaction_no) ? $fees->transaction_no : ''; ?></b></td>
                                            </tr>
                                        </table>
                                        <?php $segment = $this->uri->segment(2); ?>
                                        <a class="btn blue btn-sm" style="border-radius: 5px !important;" target="_blank" href="<?php echo base_url(); ?>print-payment-receipt/<?php echo $segment; ?>">Print</a>
                                        <a class="btn btn-primary btn-sm" style="border-radius: 5px !important;" href="<?php echo base_url(); ?>fees">Make Another Payment</a>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('site/footer'); ?>
    <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url(); ?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/common.js" type="text/javascript"></script>
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