<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Institute Count | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?></title>
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
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light append_div">
                                <div class="portlet-title row">
                                    <div class="caption font-blue col-md-6">
                                        <div class="col-md-6">
                                            <i class="fa fa-bars font-blue"></i>
                                            <span class="caption-subject bold uppercase">Institute Count</span>
                                        </div>
                                    </div>
                                    <div class="actions pull-right col-md-6" >
                                        <div class="col-md-4">
                                            <select class="form-control select2me input-sm id get_inst_list" data-url="get_table_inst_count" name="district_id" tabindex="1">
                                                <option value="0" class="caption-subject font-green-sharp bold uppercase">All District</option>
                                                <?php if(isset($district_data) && !empty($district_data))
                                                {
                                                    foreach ($district_data as $key) 
                                                    { ?>
                                                        <option value="<?php echo $key->district_id ?>" <?php echo (isset($key->district_id) && !empty($key->district_id) && ($key->district_id==$institute_id))?'selected="selected"':''?>><?php echo $key->district_name;?></option>
                                                    <?php }                                                         
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control select2me input-sm status get_inst_list" data-url="get_table_inst_count" >
                                                <option value="0">Paid Student</option>
                                                <option value="5" <?php echo (isset($status) && !empty($status) && ($status=='5'))?'selected="selected"':''?>>5</option>
                                                <option value="10" <?php echo (isset($status) && !empty($status) && ($status=='10'))?'selected="selected"':''?>>10</option>
                                                <option value="20" <?php echo (isset($status) && !empty($status) && ($status=='20'))?'selected="selected"':''?>>20</option>
                                                <option value="30" <?php echo (isset($status) && !empty($status) && ($status=='30'))?'selected="selected"':''?>>30</option>
                                                <option value="40" <?php echo (isset($status) && !empty($status) && ($status=='40'))?'selected="selected"':''?>>40</option>
                                                <option value="50" <?php echo (isset($status) && !empty($status) && ($status=='50'))?'selected="selected"':''?>>50</option>
                                                <option value="60" <?php echo (isset($status) && !empty($status) && ($status=='60'))?'selected="selected"':''?>>60</option>
                                                <option value="70" <?php echo (isset($status) && !empty($status) && ($status=='70'))?'selected="selected"':''?>>70</option>
                                                <option value="80" <?php echo (isset($status) && !empty($status) && ($status=='80'))?'selected="selected"':''?>>80</option>
                                                <option value="90" <?php echo (isset($status) && !empty($status) && ($status=='90'))?'selected="selected"':''?>>90</option>
                                                <option value="100" <?php echo (isset($status) && !empty($status) && ($status=='100'))?'selected="selected"':''?>>100</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="<?php echo base_url(); ?>institute_count_pdf/0/0" class="btn btn-sm red" title="Download PDF">PDF <i class="fa fa-file-pdf-o"></i> </a>
                                        </div>
                                        <div class="col-md-2" style="margin-left: -19px;">
                                            <a href="<?php echo base_url(); ?>institute_count_excel/0/0" class="btn btn-sm blue" title="Download Excel">Excel <i class="fa fa-file-excel-o"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet box">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover datatable" data-url="institute_count_table/0/0">
                                                        <thead>
                                                            <tr class="heading">
                                                                <th class="font-blue-madison bold" style="text-align: center;">#</th>
                                                                <th class="font-blue-madison bold">Owner Photo</th>
                                                                <th class="font-blue-madison bold">Institute Details</th>
                                                                <th class="font-blue-madison bold">Contact Details</th>
                                                                <th class="font-blue-madison bold">Address</th>
                                                                <th class="font-blue-madison bold">Paid Student</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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