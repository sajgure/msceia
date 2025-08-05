<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Committee Master | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
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
                                    <i class="fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                    <span class="caption-subject bold uppercase"> Committee Member </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="committee" id="committee" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="committee-master-list" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label">Member Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo (isset($committee_master_data->member_name) && !empty($committee_master_data->member_name))?$committee_master_data->member_name:''?>" maxlength="50" minlength="5" placeholder="Enter Member Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Member Designation<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" name="member_description" id="member_description" class="form-control" value="<?php echo (isset($committee_master_data->member_description) && !empty($committee_master_data->member_description))?$committee_master_data->member_description:''?>" maxlength="50" minlength="5" placeholder="Enter Member Designation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Upload Image </label><br>
                                                    <div class="uploaded_image" style="padding-bottom: 10px !important;">
                                                        <img src="<?php echo base_url(); ?>uploads/committee_member_photos/<?php echo(isset($committee_master_data->member_image) && !empty($committee_master_data->member_image))?$committee_master_data->member_image:'default.png';?>" style="height: 150px; width: 200px;" class="img-thumbnail"/>
                                                    </div>
                                                    <input type="file" name="file" id="file" class="upload_image" data-url="upload_committee_image">
                                                    <label for="file" class="upload_button" /><?php echo(isset($committee_master_data->member_image) && !empty($committee_master_data->member_image))?'Change':'Select File';?></label>
                                                    <input type="hidden" name="member_image" class="file_name" value="<?php echo(isset($committee_master_data->member_image) && !empty($committee_master_data->member_image))?$committee_master_data->member_image:'';?>">
                                                    <!--  <span class="process"></span> -->
                                                    <span class="img_error"></span>
                                                </div>
                                                <input type="hidden" name="committee_id" value="<?php echo(isset($committee_master_data->committee_id) && !empty($committee_master_data->committee_id))?$committee_master_data->committee_id:'';?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <a href="<?php echo base_url();?>committee-master-list"class="btn btn-primary" type="button"> <i class=" icon-arrow-left "></i> Back</a>
                                        <div class="pull-right">  
                                            <button type="button" class="btn btn-danger clearData"> <i class="icon-close"></i> Clear </button>
                                            <button type="submit" class="btn btn-success common_save" data-pk="committee_id" rel="<?php echo(isset($committee_master_data->committee_id) && !empty($committee_master_data->committee_id))?$committee_master_data->committee_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($committee_master_data->committee_id) && !empty($committee_master_data->committee_id))?'Update':'Submit';?> </button>
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
    <!-- </div> -->
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