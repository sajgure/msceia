<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Fees Report | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?></title>
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
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">Fees Report</span>
                                    </div>
                                    <div class="actions pull-right">
                                        <a href="<?php echo base_url();?>print_fees_report" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- <div class="row" style="padding: 3%;">   
                                        <div class="col-md-12 mt-2">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 bold" style="margin-right: -50px;margin-top: 6px;">Select Batch<span class="required">*</span></label> 
                                            <div class="col-md-5">            
                                                <select class="form-control select2me batch_id" id="srchBatch" name="batch_id" data-url="get_fees_report">
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
                                                    <button class="btn btn-primary get_batch_change" style="margin-left: 7px;border-radius: 4px;" data-url="get_fees_report"><i class="fa fa-search"> Search </i> </button>                                                               
                                                </span>
                                            </div> 
                                            <div class="col-md-1"></div>                        
                                        </div>                                                
                                    </div> 
                                    <hr> -->
                                    <div class="row append_div">
                                        <div class="col-md-12">
                                            <div class="portlet box">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover datatable" data-url="fees_report_table/0" style="width: 100% !important;">
                                                        <thead>
                                                            <tr class="heading">
                                                                <th class="font-blue-madison bold" style="text-align: center;width: 5%;">#</th>
                                                                <th class="font-blue-madison bold" style="width: 12.5%;">Institute <br>Details</th>
                                                                <th class="font-blue-madison bold" style="width: 12.5%;">Depositer<br> Name</th>
                                                                <th class="font-blue-madison bold" style="width: 5%;">Deposite <br> Date</th>
                                                                <th class="font-blue-madison bold" style="width: 5%;">Total <br>Student</th>
                                                                <th class="font-blue-madison bold" style="width: 10%;">Total<br> Amount</th>
                                                                <th class="font-blue-madison bold" style="width: 10%;">Payment<br> Mode</th>
                                                                <th class="font-blue-madison bold" style="width: 10%;">Transaction <br>Number</th>
                                                                <th class="font-blue-madison bold" style="width: 12.5%;">Remark</th>
                                                                <th class="font-blue-madison bold" style="width: 10%;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="caption-subject font-green-sharp bold uppercase">Total Students: </span><span class="caption-helper"> 
                                        <?php
                                        if(isset($fees_data) && !empty($fees_data))
                                        {
                                            $t_stud=0; foreach ($fees_data as $key)
                                            {
                                               $t_stud+=$key->total_student;
                                            }
                                            echo $t_stud;
                                        }
                                         ?></span>
                                    </div>  
                                    <div>
                                        <span class="caption-subject font-green-sharp bold uppercase">Total Amount Rs. :</span><span class="caption-helper"> 
                                        <?php 
                                         if(isset($fees_data) && !empty($fees_data))
                                        {
                                            $t_amt=0; foreach($fees_data as $row) 
                                            { 
                                                $t_amt+=$row->total_amount;
                                            }
                                            echo $t_amt;
                                        } ?></span>
                                    </div>
                                   <!--  <div>
                                        <span class="caption-subject font-green-sharp bold uppercase">Amount Received By NEFT/RTGS: </span><span class="caption-helper"> 
                                        <?php
                                        if(isset($fees_data) && !empty($fees_data))
                                        {
                                            $t1_amt=0;
                                             foreach($fees_data as $item) 
                                            { 
                                                if($item->payment_mode=='NEFT_RTGS')
                                                {
                                                    $t1_amt+=$item->total_amount;
                                                }
                                            }
                                            echo $t1_amt;
                                        } ?></span>
                                    </div> -->
                                    <div>
                                        <span class="caption-subject font-green-sharp bold uppercase">Amount Received By Online: </span><span class="caption-helper"> 
                                        <?php
                                        if(isset($fees_data) && !empty($fees_data))
                                        {
                                            $t2_amt=0;
                                            foreach($fees_data as $value) 
                                            { 
                                                if($value->payment_mode=='Online')
                                                {
                                                    $t2_amt+=$value->total_amount;
                                                }
                                                
                                            }
                                            echo $t2_amt;
                                        } ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal fade" id="imgModel" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>                       
                    </div>
                    <div class="modal-body"> 
                        <img src="" class="img-responsive setImg" width="600" style="height: 351px;"  alt="">
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

    $(document).on('click','.openModel',function(event){
        event.preventDefault();       
        var base_url = '<?php echo base_url(); ?>'       
        var currentImg = $(this).attr("data-id"); 
        $('.setImg').prop('src',base_url+currentImg);        
        $("#imgModel").modal();
    });
    // $(document).ready(function(){
    //     var batch_id = $('#srchBatch').select2('val');
    //     var url = 'get_fees_report';
    //     Metronic.startPageLoading({animate: true});
    //     $.ajax({
    //         type:'POST',
    //         url:completeURL(url),
    //         data:{batch_id:batch_id},
    //         dataType:'html',
    //         success:function(data)
    //         {      
    //             $('.append_div').html(data);
    //         },
    //         complete:function()
    //         {
    //             Metronic.stopPageLoading();
    //             $('select').select2();
    //             TableAdvanced.init();
    //         }
    //     });
    // });

</script>
</body>
</html>