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
    <title>फी नोंदणी | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
</head>

<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <?php $this->load->view('site/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">फी नोंदणी </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>फी नोंदणी </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="save_online_pay" method="POST" class="horizontal-form" id="save_online_pay" data-url='saveRowMaterial'>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label class="control-label">Institute Name<span class="required">*</span></label>
                                                    <input type="text" name="inst_name" class="form-control " value="<?php echo (isset($inst_data->institute_name) && !empty($inst_data->institute_name))?$inst_data->institute_name:''; ?>" readonly> 
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Institute Code<span class="required">*</span></label>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon"> <i class="fa fa-pencil"></i>
                                                        </span>
                                                        <input type="text" name="inst_code" class="form-control" value="<?php echo (isset($inst_data->institute_code) && !empty($inst_data->institute_code))?$inst_data->institute_code:''; ?>" readonly> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Cash Depositer person<span class="required">*</span></label>
                                                    <div class="input-icon right"> <i class="fa"></i>
                                                        <input type="text" name="cash_depositer_name" class="form-control" value="<?php echo (isset($inst_data->institute_owner_name) && !empty($inst_data->institute_owner_name))?$inst_data->institute_owner_name:''; ?>" placeholder="Cash Depositer person"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Student<span class="required">*</span></label>
                                                    <input type="text" name="stud_count" class="form-control" value="<?php echo (isset($stud_count->count) && !empty($stud_count->count))?$stud_count->count:'0'; ?>" placeholder="Total Student" readonly> 
                                                    <span class="help-block font-blue" style="font-size: 11px;">
                                                        <i>batch : <?php echo $current_batch_cnt->batch_name; ?> - <?php echo $current_batch_cnt->appear_student ?></i>
                                                        <br><i>batch : <?php echo $upcoming_batch_cnt->batch_name; ?> - <?php echo $upcoming_batch_cnt->appear_student ?></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php
                                                /*$maximum_student = (isset($inst_data->maximum_student) && !empty($inst_data->maximum_student))?$inst_data->maximum_student:'0';
                                                
                                                $minimum_fees = (isset($inst_data->minimum_fees) && !empty($inst_data->minimum_fees))?$inst_data->minimum_fees:'0';
                                                $maximum_fees = (isset($inst_data->maximum_fees) && !empty($inst_data->maximum_fees))?$inst_data->maximum_fees:'0';
                                                $amt=((isset($inst_data->paid_stud)+$stud_count) >= $maximum_student)?$minimum_fees:$maximum_fees;*/
                                                $minimum_student = (isset($inst_data->minimum_student) && !empty($inst_data->minimum_student))?$inst_data->minimum_student:'0';
                                                $amt = ($stud_count->count140 * 140) + ($stud_count->count100 * 100) + ($stud_count->count75 * 75);
                                            ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Paid Amount<span class="required">*</span></label>
                                                    <input type="text" name="paid_amount" class="form-control" id="amount" value="<?php echo $amt;?>" placeholder="Paid Amount" readonly> 
                                                    <span class="help-block font-blue" style="font-size: 11px;">
                                                        <i>Total fees : 140*<?php echo $stud_count->count140; ?> + 100*<?php echo $stud_count->count100; ?> </i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Deposite Date<span class="required">*</span></label>
                                                    <input type="text" name="deposite_date" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly> 
                                                </div>
                                            </div>
                                            <input type="hidden" id="pay_type" name="payment_mode" class="form-control" value="Online" placeholder="Payment Mode" readonly>
                                            <input type="hidden" name="payment_type" value="online_pay">
                                        </div> 
                                    </div>
                                    <div class="form-actions ">
                                         <!--<button type="submit" class="btn blue pay_save" title="Click To Save" rel=""><i class="fa fa-check"></i>Pay</button> -->
                                        <a href="<?php echo base_url();?>institute-stud-list" class="btn blue btn-left"><i class="fa fa-arrow-left"></i> Back To list</a>
                                        <?php 
                                        $current_batch_count = $current_batch_cnt->paid_student + $current_batch_cnt->appear_student;
                                        $upcoming_batch_count = $upcoming_batch_cnt->paid_student + $upcoming_batch_cnt->appear_student;
                                        if (($current_batch_count) < 5 && $current_batch_count != 0 && $current_batch_cnt->appear_student !=0)
                                        { ?>
                                            <span style="color: red;font-size: 14px;font-weight: 600; float:right; "><i>Note: Please select at least 5 stuends for <b><?php echo $current_batch_cnt->batch_name; ?></b> batch.</i></span>
                                        <?php }
                                        else if (($upcoming_batch_count) < 5 && $upcoming_batch_count != 0 && $upcoming_batch_cnt->appear_student !=0) 
                                        { ?>
                                            <span style="color: red;font-size: 14px;font-weight: 600; float:right;"><i>Note: Please select at least 5 stuends for <b><?php echo $upcoming_batch_cnt->batch_name; ?></b> batch.</i></span>
                                        <?php }
                                        else {?>
                                            <!--<a href="#" class="btn blue" title="Click To Save" rel="" style="float:right;"><i class="fa fa-check"></i> Pay</a>-->
                                            <a href="<?php echo base_url();?>QR-code" class="btn blue" title="Click To Save" rel=""  style="float:right;"><i class="fa fa-check"></i> Pay</a>
                                        <?php } ?>   -->                              
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <?php if(isset($payment_adjusted) && !empty($payment_adjusted))
                    {
                        if($payment_adjusted->paid_student <= 20)
                        { ?> 
                            <div class="col-md-9 col-sm-9">
                                <div class="portlet box red">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>परीक्षा फी नोंदणी </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form action="save_online_pay" method="POST" class="horizontal-form" id="save_online_pay" data-url='saveRowMaterial'>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label class="control-label">Institute Name<span class="required">*</span></label>
                                                            <input type="text" name="inst_name" class="form-control " value="<?php echo (isset($inst_data->institute_name) && !empty($inst_data->institute_name))?$inst_data->institute_name:''; ?>" readonly> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Institute Code<span class="required">*</span></label>
                                                            <div class="input-group"> 
                                                                <span class="input-group-addon"> <i class="fa fa-pencil"></i>
                                                                </span>
                                                                <input type="text" name="inst_code" class="form-control" value="<?php echo (isset($inst_data->institute_code) && !empty($inst_data->institute_code))?$inst_data->institute_code:''; ?>" readonly> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Cash Depositer person<span class="required">*</span></label>
                                                            <div class="input-icon right"> <i class="fa"></i>
                                                                <input type="text" name="cash_depositer_name" class="form-control" value="<?php echo (isset($inst_data->institute_owner_name) && !empty($inst_data->institute_owner_name))?$inst_data->institute_owner_name:''; ?>" placeholder="Cash Depositer person"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Total Student<span class="required">*</span></label>
                                                            <input type="text" name="stud_count" class="form-control" value="<?php echo (isset($payment_adjusted->student_count) && !empty($payment_adjusted->student_count))?$payment_adjusted->student_count:'0'; ?>" placeholder="Total Student" readonly> 
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $amt= 50;
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Paid Amount<span class="required">*</span></label>
                                                            <input type="text" name="paid_amount" class="form-control" id="amount" value="<?php echo $payment_adjusted->student_count * $amt;?>" placeholder="Paid Amount" readonly> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Deposite Date<span class="required">*</span></label>
                                                            <input type="text" name="deposite_date" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly> 
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="pay_type" name="payment_mode" class="form-control" value="Online" placeholder="Payment Mode" readonly>
                                                    <input type="hidden" name="payment_type" value="adjust_online_pay">
                                                    <div class="col-md-12">
                                                    <h5 style="color: red;font-size: 14px;font-weight: 600;"><i>Note: Pay student fees for exam.</i></h5>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-actions right">
                                                <button type="submit" class="btn blue pay_save" title="Click To Save" rel=""><i class="fa fa-check"></i>Pay</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }?>  -->
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