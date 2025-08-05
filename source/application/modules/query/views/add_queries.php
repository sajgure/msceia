<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Add Queries | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url(); ?>assets/js/rateit/rateit.css" rel="stylesheet" type="text/css">
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
                                        <span class="caption-subject bold uppercase"> Queires </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="query" id="query" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="queries-list" enctype="multipart/form-data" method="post">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Institute / Code<span class="required" aria-required="true">*</span></label>
                                                        <select class="form-control  select2me" name="institute_id">
                                                            <option  class="caption-subject font-green-sharp bold uppercase" value="">Select Institute / Code</option>
                                                            <?php if(isset($institute_data) && !empty($institute_data))
                                                            {
                                                                foreach ($institute_data as $key)
                                                                {?>
                                                                    <option value="<?php echo(isset($key->institute_id) && !empty($key->institute_id))?$key->institute_id:'';?>" <?php echo (isset($edit_query->institute_id) && !empty($edit_query->institute_id) && $edit_query->institute_id==$key->institute_id)?'selected':'';?> > <?php echo(isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:'';?> / <?php echo(isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:'';?> </option>
                                                                <?php }
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">                                                
                                                    <div class="form-group">
                                                        <label class="control-label">Issue/Query<span class="required" aria-required="true">*</span></label>
                                                        <select class="form-control  select2me" name="query">
                                                            <option class="caption-subject font-green-sharp bold uppercase" value="">Select Query</option>
                                                            <?php 
                                                            if(isset($query_list_data) && !empty($query_list_data))
                                                            {
                                                                foreach ($query_list_data as $key)
                                                                {?>
                                                                    <option value="<?php echo(isset($key->query_name) && !empty($key->query_name))?$key->query_name:'';?>" <?php echo (isset($edit_query->query) && !empty($edit_query->query) && $edit_query->query==$key->query_name)?'selected':'';?> ><?php echo(isset($key->query_name) && !empty($key->query_name))?$key->query_name:'';?></option>
                                                                <?php } 
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">                                                
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea class="form-control" name="message" rows="3"><?php echo(isset($edit_query->message) && !empty($edit_query->message))?$edit_query->message:'';?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">                                                
                                                    <div class="review ">
                                                        <input type="range" min="0" max="3" value="<?php echo(isset($edit_query->query_status) && !empty($edit_query->query_status))?$edit_query->query_status:'0'; ?>" step="1" name="query_status" id="query_status" class="query_status_val">
                                                        <div class="rateit query_status" data-rateit-backingfld="#query_status" data-rateit-resetable="false" data-rateit-mode="font"></div>        
                                                    </div>
                                                </div>
                                                <input type="hidden" name="query_id" value="<?php echo(isset($edit_query->query_id) && !empty($edit_query->query_id))?$edit_query->query_id:'';?>">
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <a href="<?php echo base_url();?>queries-list" data-pk="query_id" class="btn blue" style="float: left;">Back</a>
                                            <button type="button" class="btn btn-danger clearData">Cancel</button>
                                            <button type="submit" class="btn green common_save" rel="<?php echo(isset($edit_query->query_id) && !empty($edit_query->query_id))?$edit_query->query_id:''?>"><i class="fa fa-dot-circle-o"></i> <?php echo(isset($edit_query->query_id) && !empty($edit_query->query_id))?'Update':'Save';?></button>
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
    <script src="<?php echo base_url();?>assets/js/rateit/jquery.rateit.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
        $('.rateit').each(function()
        {
            var value= $(this).attr('data-rateit-value');
            if(value==1){
                $(this).find(".rateit-selected").css("color", "red");
            }
            else if(value==2){
                $(this).find(".rateit-selected").css("color", "orange");
            }
            else{
                $(this).find(".rateit-selected").css("color", "green");
            }
        });
    });
    </script>
</body>
</html>