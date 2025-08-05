<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Upload Objective Questions | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
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
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .portlet.light > .portlet-title > .tools {
            padding: 2px 0 13px 0 !important;
            margin-top: 2px;
        }
    </style>
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
                                        <i class="fa fa-bars font-blue" ></i>
                                        <span class="caption-subject bold uppercase">Upload Objective Questions</span>
                                    </div>
                                    <div class="actions tools">
                                        <a href="<?php echo base_url();?>objective-questions-list" class="btn blue" style="height:28px;"><i class="fa fa-bars "></i>&nbsp;List</a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="save-upload-objective-questions" id="save-upload-objective-questions" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="objective-questions-list" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row" style="padding: 0px 21px !important;">
                                                <center>
                                                    <?php if(isset($exam_type_data) && !empty($exam_type_data))
                                                    { $i=1;
                                                        foreach ($exam_type_data as $key) 
                                                        { ?> 
                                                            <span style="font: 700 14px 'Open Sans', Arial, sans-serif;" class="font-green-sharp"> 
                                                                    <?php echo $i; ?>.  <?php echo $key-> exam_type; ?>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                            </span>
                                                        <?php $i++; }
                                                    } ?>
                                                </center>
                                            </div>
                                            <h3 style="font: 700 21px 'Open Sans', Arial, sans-serif;text-align: center;">Download Template</h3>
                                            <h3 style="font: 700 15px 'Open Sans', Arial, sans-serif;text-align: center;margin-top: 12px;">Click <a href="<?php echo base_url();?>uploads/objective_excel/template_objective_question_excel.xlsx" class="font-red-haze">Here</a> To Download Template</h3><br>
                                            <hr style="margin-top: 0px;">
                                            <h3 style="font: 700 20px 'Open Sans', Arial, sans-serif;text-align: center;margin-top: 20px;">Upload Your Excel Data</h3>
                                            <div class="form-group text-center">
                                                <input type="file" name="file" id="file" class="upload_objective_excel" data-url="upload_objective_excel" required>
                                                <label for="file" class="upload_button" style="border-radius: 5px !important;padding: 8px !important;">Select File</label>
                                                <input type="hidden" name="objective_excel_file" class="file_name" value="<?php echo(isset($objective_excel_data->objective_excel_file) && !empty($objective_excel_data->objective_excel_file))?$objective_excel_data->objective_excel_file:'';?>">
                                                <span class="fileinput-filename" style="font-weight: bold;position: absolute;top: 60.5%; left: 54%;"><?php echo(isset($objective_excel_data->objective_excel_file) && !empty($objective_excel_data->objective_excel_file))?$objective_excel_data->objective_excel_file:'';?></span>
                                                <span class="img_error"></span><br>
                                                <label class="control-label font-red-haze bold">Note : Only .xls & .xlsx file supported.</label>
                                            </div>
                                        </div>
                                        <div class="form-actions right" style="padding: 16px 0px 3px 0px !important;">
                                            <button type="submit" class="btn blue common_save" rel="" data-pk=""> <i class="icon-check"></i> Submit</button>
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
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
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