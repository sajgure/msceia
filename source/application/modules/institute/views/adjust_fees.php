<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Adjust Fees | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?> </title>
    <base href="<?php echo base_url();?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo ">
    <?php $this->load->view('template/header');?>
    <div class="clearfix">
    </div>
    <div class="page-container">
        <?php $this->load->view('template/sidebar');?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="portlet-body">
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                        <span class="caption-subject bold uppercase">Adjust Fees</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="set-adjust-fee" enctype="multipart/form-data" id="set-adjust-fee" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="adjust-fees"  method="post" class="horizontal-form">
                                        <div class="form-body">         
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Institute List <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon ">                               
                                                            <select class="form-control select2me input-sm id get_appeared_stud" data-url="get_inst_count" name="institute_id"  tabindex="1">
                                                                <option value="">Select</option>
                                                                <?php if(isset($institute_data) && !empty($institute_data))
                                                                {
                                                                    foreach ($institute_data as $key) 
                                                                    { ?>
                                                                        <option value="<?php echo $key->institute_id ?>"><?php echo $key->institute_name;?>-<?php echo $key->institute_code;?></option>
                                                                    <?php }                                                         
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Number of Students</label><br>students :
                                                        <span class="stud_count"><?php echo(isset($stud_data) && !empty($stud_data))?count($stud_data):'N/A'?></span> 
                                                        <span class="help-block font-blue paid_stud_details" ></span>
                                                         <span class="help-block font-blue upc_paid_stud_details" ></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Paid Amount</label><br>Rs.
                                                        <span class="paid_amount"><?php echo(isset($stud_data) && !empty($stud_data))?count($stud_data):'00'?></span> 
                                                        <span class="help-block font-blue paid_amount_details" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-3">                                              
                                                    <div class="form-group">
                                                        <label class="control-label">Receipt Image </label><br>
                                                        <div class="uploaded_image" style="padding-bottom: 10px !important;">
                                                            <img src="<?php echo base_url(); ?>uploads/fees_photo/<?php echo(isset($fees_data->utr_image) && !empty($fees_data->utr_image))?$fees_data->utr_image:'default.png';?>" style="height: 150px; width: 200px;" class="img-thumbnail"/>
                                                        </div>
                                                        <input type="file" name="file" id="file" class="upload_image" data-url="upload_fees_image">
                                                        <label for="file" class="upload_button" /><?php echo(isset($fees_data->utr_image) && !empty($fees_data->utr_image))?'Change':'Select File';?></label>
                                                        <input type="hidden" name="utr_image" class="file_name" value="<?php echo(isset($fees_data->utr_image) && !empty($fees_data->utr_image))?$fees_data->utr_image:'';?>">
                                                        <span class="img_error"></span>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Transaction Number<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="transaction_no" placeholder="Transaction Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Fees Exemption<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon">                                   
                                                            <select class="form-control select2me" name="fees_exemption_id" id="fees_exemption_id">
                                                                <option value="">Select Fees Exemption</option>                      
                                                                <?php 
                                                                if(isset($fee_exemption_data) && !empty($fee_exemption_data))
                                                                {
                                                                    foreach ($fee_exemption_data as $key) 
                                                                    { 
                                                                ?>
                                                                <option value="<?php echo $key->fees_exemption_id; ?>"><?php echo $key->title; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                      
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label">Remark</label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea class="form-control"  rows="3" cols="35" name="remark" placeholder="Remark" id="remark"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="hidden" name="total_amount" class="paid_amount_input" value="<?php echo(isset($stud_data) && !empty($stud_data))?count($stud_data):'00'?>">
                                                <input type="hidden" name="total_student" class="stud_count_input" value="<?php echo(isset($stud_data) && !empty($stud_data))?count($stud_data):'00'?>">
                                                <input type="hidden" name="institute_id" class="institute_id" value="<?php echo(isset($single_institute_data) && !empty($single_institute_data))?count($single_institute_data):'00'?>">
                                                <input type="hidden" name="institute_name" class="institute_name" value="<?php echo(isset($single_institute_data) && !empty($single_institute_data))?count($single_institute_data):'00'?>">
                                                <input type="hidden" name="institute_code" class="institute_code" value="<?php echo(isset($single_institute_data) && !empty($single_institute_data))?count($single_institute_data):'00'?>">
                                                <input type="hidden" name="mobile" class="mobile" value="<?php echo(isset($single_institute_data) && !empty($single_institute_data))?count($single_institute_data):'00'?>">
                                                <input type="hidden" name="email" class="email" value="<?php echo(isset($single_institute_data) && !empty($single_institute_data))?count($single_institute_data):'00'?>">
                                                <input type="hidden" name="payment_mode" value="Online">
                                                <input type="hidden" name="deposite_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                <input type="hidden" name="status" value="success">
                                                 <?php $user_id=$this->session->userdata('user_id') ?>
                                                <input type="hidden" class="username username-hide-on-mobile" name="modified_by" value="<?php echo $user_id; ?>"> 
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="<?php echo base_url();?>dashboard"class="btn btn-primary"type="button" 
                                        > <i class=" icon-arrow-left "></i> Back</a>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-danger clearData"> <i class="icon-close"></i> Clear </button> 
                                                <button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($single_user->payment_id) && !empty($single_user->payment_id))?$single_user->payment_id:''?>"><i class="fa fa-check"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer');?>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>

    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js?asd" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
</script>
</body>
</html>

