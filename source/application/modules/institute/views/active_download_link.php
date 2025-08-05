<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Active Download Link |  <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?></title>
    <base href="<?php echo base_url(); ?>">
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
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>"/>

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
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">Active Download Link</span>
                                    </div>
                                    <div class="caption pull-right">
                                        <span class="caption-subject font-green-sharp" style="font-size: 13px;font-weight: 600;">
                                        <?php if(isset($active_link_count) && !empty($active_link_count))
                                        {
                                            foreach ($active_link_count as $key) {
                                                // echo $key->status.' : '.$key->count.' &nbsp;&nbsp;&nbsp;';
                                                if($key->status=='pending')
                                                {
                                                    echo 'Pending'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='download')
                                                {
                                                    echo 'Download'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='install')
                                                {
                                                    echo 'Install'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='exam download')
                                                {
                                                    echo 'Exam Download'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='exam install')
                                                {
                                                    echo 'Exam Install'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='upload')
                                                {
                                                    echo 'Upload'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='Active')
                                                {
                                                    echo 'Active'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                                elseif($key->status=='Deactive')
                                                {
                                                    echo 'Deactive'.' : '.$key->count.' &nbsp;&nbsp;';
                                                }
                                            }
                                        }?>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-title mt-5" style="border-bottom: 3px solid #eee;padding-top: 9px;">
                                    <div class="portlet-body form">
                                       
                                            <div class="form-body">
                                                <div class="row">                                            
                                                    <div class="col-md-12 mt-2">
                                                        <div class="col-md-1"></div>
                                                        <label class="control-label col-md-2" style="margin-right: -50px;">Select Batch<span class="required">*</span></label> 
                                                        <div class="col-md-6">            
                                                            <select class="form-control select2me" id="srchBatch" name="srchBatch" data-url="get-selected-bacth-data">
                                                                <option value="" class="caption-subject font-green-sharp bold uppercase">Select Batch</option>
                                                                
                                                                <?php if(isset($allBatches) && !empty($allBatches))
                                                                {
                                                                    foreach ($allBatches as $key) 
                                                                    {?>
                                                                        <option value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>" <?php if(!empty($currentBatchInfo['0']->batch_id) && $currentBatchInfo['0']->batch_id == $key->batch_id){ echo "selected";} ?> >
                                                                        <?php echo (isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                        </option>
                                                                    <?php } 
                                                                }?>                                                         
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <span class="input-group-btn" >
                                                                <button class="btn btn-primary getBatch" style="margin-left: 7px;border-radius: 4px;" data-url="get-selected-bacth-data"><i class="fa fa-search"> Search </i> </button>                                                               
                                                            </span>
                                                        </div>                                                       
                                                    </div>                                                
                                                </div>                                 
                                            </div>                                   
                                        
                                    </div><br>
                                </div>
                                <div class="portlet-body form append_div">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet box">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover datatable" data-url="active_download_link_table/0">
                                                        <thead>
                                                            <tr>
                                                                <th class="font-blue-madison bold"  style="text-align: center;">#</th>
                                                                <th class="font-blue-madison bold"> Institute Name</th>
                                                                <th class="font-blue-madison bold"> District</th>
                                                                <th class="font-blue-madison bold"> Contact</th>
                                                                <th class="font-blue-madison bold"> Paid Student</th>
                                                                <th class="font-blue-madison bold"> Upload</th>
                                                                <th class="font-blue-madison bold"> Inst Count</th>
                                                                <th class="font-blue-madison bold"> Mac Address</th>
                                                                <th class="font-blue-madison bold"> DB Status</th>
                                                                <th class="font-blue-madison bold"> Inst Status</th>
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
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>  
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();

    });
    
    $(document).ready(function(){
        var batch_id = $('#srchBatch').select2('val');
        var url = 'get-selected-bacth-data';
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{batch_id:batch_id},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
</script>
</body>
</html>