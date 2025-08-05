<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>GCC TBC Accept Order | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
    <?php $this->load->view('template/header'); ?>
    <div class="clearfix"></div>
    <div class="page-container">
    	<?php $this->load->view('template/sidebar'); ?>	
    	<div class="page-content-wrapper">
    		<div class="page-content" style="">
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-shopping-cart"></i>
    						<span class="caption-subject bold uppercase">Pending Orders for Approved</span>
    					</div>
    				</div>
    				<div class="portlet-body">
    					<form action="books-order-approved" enctype="multipart/form-data" id="books-order-approved" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" method="post" class="horizontal-form">
    						<table width="100%" class="table table-striped table-bordered table-hover masterTable">
    							<thead>
    								<tr>
    									<th width="6%">Sr.No.</th>
    									<th width="10%">Order id</th>
    									<th width="10%">Order Date </th>
    									<th width="14%">Total Amount </th>
    									<th width="20%">Customer</th>
    									<th width="30%">Address </th>
    									<th width="10%" style="text-align: center;">Action<br> <input type="checkbox" id="checkAll"> </th>
    								</tr>
    							</thead>
                                <tbody>
        							<?php if(isset($pending) && !empty($pending))
                                    {  $i=1;  
                                        foreach($pending as $key)
                                        { ?>
                                            <tr>
                                                <td align="center"><?php echo $i++; ?></td>
                                                <td><b>MS<?php echo str_pad($key->order_id, 6,'0',STR_PAD_LEFT);?></b></td>
                                                <td style="text-align: center;"><?php echo (isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y', strtotime($key->inserted_on)):''; ?></td>
                                                <td><i class="fa fa-inr"></i> <?php echo (isset($key->order_price) && !empty($key->order_price))?$key->order_price:''; ?></td>
                                                <td><b><?php echo (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:''; ?></b><br>
                                                    <?php echo (isset($key->customer_email) && !empty($key->customer_email))?$key->customer_email:''; ?><br>
                                                    <?php echo (isset($key->customer_phone) && !empty($key->customer_phone))?$key->customer_phone:''; ?></td>
                                                <td><?php echo (isset($key->address) && !empty($key->address))?$key->address:''; ?></td>
                                                <td align="center" class="tbl_action" data-col="order_id">
                                                    <input class="checkBoxClass"  type="checkbox" name="order_id[]" value="<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">&nbsp;&nbsp;<span style="cursor: pointer;" class="tooltips update_record" title="Cancel Order" rel="<?php echo(isset($key->order_id) && !empty($key->order_id))?$key->order_id:'';?>" rev="order-cancel"><i class="fa fa-times-circle" style="font-size: 17px; color: red;"></i></span>
                                                </td>
                                            </tr>
                                        <?php } 
                                    } ?>
                                </tbody>
    						</table>
    						<center>
                                <button type="submit" class="btn green common_save"><i class="fa fa-check"></i> Accept Order</button>
                            </center>
    					</form>
    				</div>
    			</div>
    			<!-- END PAGE CONTENT INNER -->
    		</div>
    	</div>
    	<!-- END CONTENT -->
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

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
    <script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
    $("#checkAll").click(function () {
        if ($(this).is(':checked')) {
            $('.checkBoxClass').prop('checked',true);
        }
        else
        {
            $('.checkBoxClass').prop('checked',false);
        }
        $.uniform.update();
    });
    </script>


</body>
<!-- END BODY -->
</html>