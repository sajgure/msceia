<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Batch Fees Master | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css"/>
    
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
                                        <span class="caption-subject bold uppercase">Batch Fees</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="batch-fees" id="batch-fees" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="batch-fees-list" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                         <div class="input-icon">
                                                            <label class="control-label">Batch<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <select class="form-control select2me batch_id" name="batch_id" id="batch_id" required="">
                                                                <option value="">Select </option>
                                                                <?php if(isset($batch_data) && !empty($batch_data))
                                                                {
                                                                    foreach ($batch_data as $key)
                                                                    {?>
                                                                        <option value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>" <?php echo (isset($batch_fees_data->batch_id) && !empty($batch_fees_data->batch_id) && $batch_fees_data->batch_id==$key->batch_id)?'selected':'';?>>
                                                                            <?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                        </option>
                                                                    <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Minimum Student<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="minimum_student" id="minimum_student" class="form-control" value="<?php echo (isset($batch_fees_data->minimum_student) && !empty($batch_fees_data->minimum_student))?$batch_fees_data->minimum_student:''?>" placeholder="Enter Minimum Student" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Maximum Student<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="maximum_student" id="maximum_student" class="form-control" value="<?php echo (isset($batch_fees_data->maximum_student) && !empty($batch_fees_data->maximum_student))?$batch_fees_data->maximum_student:''?>" placeholder="Enter Maximum Student" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Minimum Fees<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="minimum_fees" id="minimum_fees" class="form-control" value="<?php echo (isset($batch_fees_data->minimum_fees) && !empty($batch_fees_data->minimum_fees))?$batch_fees_data->minimum_fees:''?>" placeholder="Enter Minimum Fees" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Maximum Fees<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="maximum_fees" id="maximum_fees" class="form-control" value="<?php echo (isset($batch_fees_data->maximum_fees) && !empty($batch_fees_data->maximum_fees))?$batch_fees_data->maximum_fees:''?>" placeholder="Enter Maximum Fees" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="batch_fees_id" value="<?php echo(isset($batch_fees_data->batch_fees_id) && !empty($batch_fees_data->batch_fees_id))?$batch_fees_data->batch_fees_id:'';?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="<?php echo base_url();?>batch-fees-list" class="btn btn-primary"> <i class=" icon-arrow-left "></i> Back</a>
                                            <div class="pull-right">  
                                                <button type="button" class="btn btn-danger clearData"> <i class="icon-close"></i> Clear </button>
                                                <button type="submit" class="btn btn-success common_save" data-pk="batch_fees_id" rel="<?php echo(isset($batch_fees_data->batch_fees_id) && !empty($batch_fees_data->batch_fees_id))?$batch_fees_data->batch_fees_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($batch_fees_data->batch_fees_id) && !empty($batch_fees_data->batch_fees_id))?'Update':'Submit';?> </button>
                                            </div> 
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
    <script src="<?php echo base_url();?>assets/js/fileinput.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
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
