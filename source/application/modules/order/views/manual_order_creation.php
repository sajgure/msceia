<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Manual Order Creation | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
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
                                    <i class="fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                    <span class="caption-subject bold uppercase"> Manual Order Creation </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="manual-order" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="manual-order-creation" enctype="multipart/form-data" id="manual-order"  method="post" class="horizontal-form">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Institute<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class=" ">                                                 
                                                        <select class="form-control select2me institute" name="institute_id" id="institute_id">
                                                            <option value="">Select Institute</option>
                                                            <?php if(isset($institute_data) && !empty($institute_data))
                                                            {
                                                                foreach ($institute_data as $key) 
                                                                { ?>
                                                                    <option value="<?php echo $key->institute_id?>" <?php echo (isset($manual_order_data->institute_id) && !empty($manual_order_data->institute_id) && ($manual_order_data->institute_id==$key->institute_id))?'selected="selected"':'';?>><?php echo $key->institute_name;?> (<?php echo $key->institute_code;?>)</option>
                                                                <?php }                                                         
                                                            } ?>                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Customer Name<span class="required">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control " name="customer_name" value="<?php echo(isset($manual_order_data->institute_name) && !empty($manual_order_data->institute_name))?$manual_order_data->institute_name:''?>" placeholder="Customer Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                               
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Customer Number<span class="required">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control " name="customer_phone" value="<?php echo(isset($manual_order_data->institute_contact) && !empty($manual_order_data->institute_contact))?$manual_order_data->institute_contact:''?>" placeholder="Customer Number" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address<span class="required">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control " name="customer_email" value="<?php echo(isset($manual_order_data->institute_mail) && !empty($manual_order_data->institute_mail))?$manual_order_data->institute_mail:''?>" placeholder="Email Address" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address<span class="required">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control " name="address" value="<?php echo(isset($manual_order_data->institute_address) && !empty($manual_order_data->institute_address))?$manual_order_data->institute_address:''?>" placeholder="Address" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Transaction Id<span class="required">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control " name="transaction_id" value="<?php echo(isset($manual_order_data->transaction_id) && !empty($manual_order_data->transaction_id))?$manual_order_data->transaction_id:''?>" placeholder="Transaction Id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Payment Mode<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class=" ">                                                 
                                                        <select class="form-control select2me" name="customer_payment_mode">
                                                            <option value="">Select Payment</option>            
                                                            <option value="scanner">Scanner</option>            
                                                            <option value="online">Online</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="portlet">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">
                                                 Select Product
                                            </th>
                                            <th style="text-align: center;">
                                                 Qty
                                            </th>
                                            <th style="text-align: center;">
                                                Price
                                            </th>
                                            <th style="text-align: center;">
                                                price*qty
                                            </th>
                                            <th style="text-align: center;">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="appendDynaRow">                                   
                                        <tr>
                                            <td style="width: 30%;">
                                                <div class="form-group">
                                                    <div class="input-icon "> 
                                                        <select class="form-control select2me product product1" id="product_id" name="product_id[]" >
                                                            <option value="" >select Product</option>
                                                            <?php if(isset($product_data) && !empty($product_data))
                                                            {
                                                                foreach ($product_data as $key)
                                                                { ?>
                                                                    <option  value="<?php echo(isset($key->product_id) && !empty($key->product_id))?$key->product_id:'';?>" <?php echo(isset($manual_creation_data->product_id) && !empty($manual_creation_data->product_id) && ($manual_creation_data->product_id==$key->product_id))?'seleted="selected"':''; ?>><?php echo(isset($key->product_name) && !empty($key->product_name))?$key->product_name:'';?></option>
                                                                    
                                                                <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="width: 20%;">
                                                <div class="form-group">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control reset qty"  name="product_qty[]" value="" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control reset price"  name="selling_price[]" value="" placeholder="">
                                                        <input type="hidden" class="form-control reset name"  name="product_name[]" value="" placeholder="">
                                                        <input type="hidden" class="form-control reset desc"  name="product_desc[]" value="" placeholder="">
                                                        <input type="hidden" class="form-control reset img"  name="product_image[]" value="" placeholder="">
                                                        <input type="hidden" class="form-control reset pp"  name="product_price[]" value="" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control reset ppsub_total" readonly  value="" placeholder="" name="sub_total">
                                                        <input class="pfinal_total" type="hidden" name="order_price" value="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;" width="10%">
                                                <div class="addDeleteButton">
                                                    <span class="tooltips addDynaRow" data-placement="top" data-original-title="Add" style="cursor: pointer;">
                                                        <i class="fa fa-plus"></i> 
                                                    </span>  
                                                    <?php $i=1;if($i>2)
                                                    { ?> 
                                                        <span class="tooltips deleteParticularRow " style="cursor: pointer;">
                                                            <i class="fa fa-trash-o"></i>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table borderless" >
                                    <tr >
                                        <th style="width: 88%;">
                                            <strong style="float: right;">SubTotal : </strong>
                                        </th>
                                        <th class="pfinal_total" > </th>
                                    </tr>
                                    <tr >
                                        <th style="width: 88%;">
                                            <strong style="float: right;">Shipping : </strong>
                                        </th>
                                        <th> 0 </th>
                                    </tr>
                                    <tr >
                                        <th style="width: 88%;">
                                            <strong style="float: right;">Total : </strong>
                                        </th>
                                        <th class=" pfinal_total "></th>
                                    </tr>
                                </table>
                                        </div>
                                    </div>
               
                                    <div class="form-actions right">
                                        <button type="reset" class="btn btn-danger clearData" title="Click To Cancel"> Cancel</button>                            
                                        <button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($manual_order_data->order_id) && !empty($manual_order_data->order_id))?$manual_order_data->order_id:''?>"><i class="fa fa-check"></i><?php if(isset($manual_order_data->order_id) && !empty($manual_order_data->order_id)) {echo 'Update';} else { echo 'Save'; }?></button></div>
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
<script src="<?php echo base_url(); ?>assets/js/summernote/summernote.js"></script>
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