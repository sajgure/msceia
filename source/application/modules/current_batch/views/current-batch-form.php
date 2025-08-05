<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Current Batch Master | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
   
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
    <?php $this->load->view('template/header');?>
    <div class="clearfix">
    </div>
    <div class="page-container">
        <?php $this->load->view('template/sidebar');?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row" style="">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title" style="background-color: #fff">
                                <div class="caption font-blue">
                                    <i class="fa fa-pencil-square-o font-blue" aria-hidden="true"></i>
                                    <span class="caption-subject bold uppercase">Current Batch </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                            <!-- action="current-batch" cdata-redirect="current-batch-master"-->
                                <form action="current-batch"  id="current-batch" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>"  class="horizontal-form" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" style="padding: 17px;">
                                                <div class="col-md-1"></div>
                                               
                                                    <div class="control-label col-md-3" style="margin-right: -76px;margin-top: 6px !important;">
                                                        <span><b>Select Current Batch</b></span><span class="required">*</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="form-control select2me" name="batch_id" id="batch_id">
                                                            <option value="">Select Batch</option>
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
                                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                                        <input type="hidden" name="current_batch_id" id="current_batch_id" value="<?php echo(isset($currentBatchInfo['0']->current_batch_id) && !empty($currentBatchInfo['0']->current_batch_id))?$currentBatchInfo['0']->current_batch_id:'';?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-primary common_savebyAjax" data-pk="current_batch_id" rel="<?php echo(isset($currentBatchInfo['0']->current_batch_id) && !empty($currentBatchInfo['0']->current_batch_id))?$currentBatchInfo['0']->current_batch_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($currentBatchInfo['0']->current_batch_id) && !empty($currentBatchInfo['0']->current_batch_id))?'Update':'Submit';?> </button>
                                                    </div> 
                                                                                               
                                            </div>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>                           
                        </div>
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-md-12">
                        <div class="portlet-body">
                            <div class="row" style="">
                                <div class="col-md-12">
                                    <div class="portlet light">
                                        <div class="portlet-title">
                                            <div class="caption font-blue">
                                                <i class="fa fa-bars font-blue"></i>
                                                <span class="caption-subject bold uppercase">Current Batch List</span>
                                            </div>                                            
                                        </div>                                    
                                        <div class="portlet-body form">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet box">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover masterTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-blue-madison bold" style="text-align: center;"> # </th>
                                                                        <th class="font-blue-madison bold" > Batch ID </th>
                                                                        <th class="font-blue-madison bold" > Batch Name </th>
                                                                        <th class="font-blue-madison bold" style="text-align: center;"> Action </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(isset($currentBatchInfo) && !empty($currentBatchInfo))
                                                                    {$i=1;
                                                                        foreach ($currentBatchInfo as $key) 
                                                                        {  ?>
                                                                            <tr>
                                                                                <td style="text-align: center;vertical-align: middle;"> <?php echo $i++;?> </td>
                                                                                <?php $batch_id = $this->encryptdecryptstring->encrypt_string($key->batch_id); ?>

                                                                                <td>
                                                                                    <?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>
                                                                                </td>
                                                                                <td class="font-green-haze bold">
                                                                                    <?php echo (isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                                </td>
                                                                            
                                                                            
                                                                                <td style='text-align: center;' class="tbl_action" data-col="batch_id">
                                                                                    <?php if($key->in_use=='Y') { ?>
                                                                                        <a href="<?php echo base_url(); ?>current-batch-master/<?php echo(isset($batch_id) && !empty($batch_id))?$batch_id:'';?>" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>
                                                                                    <?php } ?>                                                     
                                                                                        
                                                                                </td>
                                                                            </tr>
                                                                        <?php }
                                                                    } ?>
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
        </div> 
        
        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Confirm Submit
                    </div>
                    <div class="modal-body">
                        Are you sure you want to change current Batch?              
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">Cancel</button>
                        <button  id="submit" class="btn btn-success success btn-submit" value="Submit">Submit</button>
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

    <script src="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.js" type="text/javascript" ></script>
    

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