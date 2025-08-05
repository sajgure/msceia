<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Voter Master | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
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
                                        <span class="caption-subject bold uppercase">  Voter </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="voter-master" id="voter-master" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>" data-redirect="voter-master-list" class="horizontal-form" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Voter Title <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="voter_master_title" id="voter_master_title" class="form-control" value="<?php echo (isset($voter_master_data->voter_master_title) && !empty($voter_master_data->voter_master_title))?$voter_master_data->voter_master_title:''?>" placeholder="Enter Voter Title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Upload File </label><br>
                                                        <input type="file" name="file" id="file" class="upload_file" data-url="upload_voter_master_file" required>
                                                        <label for="file" class="upload_button" /><?php echo(isset($voter_master_data->voter_master_file) && !empty($voter_master_data->voter_master_file))?'Change':'Select File';?></label>
                                                        <input type="hidden" name="voter_master_file" class="file_name" value="<?php echo(isset($voter_master_data->voter_master_file) && !empty($voter_master_data->voter_master_file))?$voter_master_data->voter_master_file:'';?>">
                                                        <span class="fileinput-filename" style="font-weight: bold; position: absolute; top: 29%; left: 16%;"><?php echo(isset($voter_master_data->voter_master_file) && !empty($voter_master_data->voter_master_file))?$voter_master_data->voter_master_file:'';?></span>
                                                        <span class="img_error"></span><br>
                                                        <label class="control-label font-red-haze bold">Note : Only PDF,txt,DOCX file supported.</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Voter Description <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <textarea type="text" name="voter_master_description" rows="20" cols="50" id="voter_master_description " class="form-control summernote SummernoteText" placeholder="Voter Description"><?php echo(isset($voter_master_data->voter_master_description) && !empty($voter_master_data->voter_master_description))?$voter_master_data->voter_master_description:'';?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="voter_master_id" value="<?php echo(isset($voter_master_data->voter_master_id) && !empty($voter_master_data->voter_master_id))?$voter_master_data->voter_master_id:'';?>">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="<?php echo base_url();?>voter-master-list"  class="btn btn-primary"> <i class=" icon-arrow-left "></i> Back</a>
                                            <div class="pull-right">  
                                                <button type="button" class="btn btn-danger clearData1"> <i class="icon-close"></i> Clear </button>
                                                <button type="submit" class="btn btn-success common_save" data-pk="voter_master_id" rel="<?php echo(isset($voter_master_data->voter_master_id) && !empty($voter_master_data->voter_master_id))?$voter_master_data->voter_master_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($voter_master_data->voter_master_id) && !empty($voter_master_data->voter_master_id))?'Update':'Submit';?> </button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
    <script src="<?php echo base_url(); ?>assets/js/summernote/summernote.js"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); 
            ComponentsPickers.init();
            TableAdvanced.init();
        });
         $('.summernote').summernote({
            shortcuts: false,
            height: 150
        });
    </script>
</body>
</html>