<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8"/>
	<title>GCC TBC Order Details | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <style type="text/css">
    	.label-complete {
    		background-color: #26c281;
		}
		.label-packed {
		    background-color: #8877a9;
		}
		.label-in-transit {
		    background-color: #ff5722;
		}
		.label-delivered {
		    background-color: #3598DC;
		}
		.label-dispatch {
		    background-color: #e87e04;
		}
		.label-pending {
		    background-color: #ed6b75;
		}
		.label-cancelled {
		    background-color: #d91e18;
		}
		.label-accepted {
		    background-color: #1ba39c;
		}
		.label.label-sm {
		    font-size: 12px;
		    padding: 2px 5px 2px 5px;
		    font-weight: 600;
		}
    </style>
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
	<?php $this->load->view('template/header'); ?>
	<div class="clearfix"></div>
	<div class="page-container">
		<?php $this->load->view('template/sidebar'); ?>	
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
											Order # MS<?php echo str_pad($order_data->order_id, 6,'0',STR_PAD_LEFT);?></td>
										</span>
									</div>	
									<div class="caption" style="float:right;">
										<span class="caption-subject font-green-sharp bold uppercase " >Status : 
											<?php if($order_data->order_status=='PENDING')
		                                    { ?>
		                                        <span class="label label-sm label-pending">
		                                        	PENDING
		                                    	</span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='ACCEPTED') 
		                                    { ?>
		                                        <span class="label label-sm label-accepted"> ACCEPTED </span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='PACKED') 
		                                    { ?>
		                                        <span class="label label-sm label-packed"> PACKED</span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='DISPATCHED') 
		                                    { ?>
		                                        <span class="label label-sm label-dispatch"> DISPATCHED </span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='DELIVERED') 
		                                    { ?>
		                                        <span class="label label-sm label-delivered"> DELIVERED  </span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='CANCELLED') 
		                                    { ?>
		                                    	<span class="label label-sm label-cancelled"> CANCELLED  </span>
		                                    <?php } 
		                                    elseif($order_data->order_status=='COMPLETE') 
		                                    { ?>
		                                    	<span class="label label-sm label-complete"> COMPLETE  </span>
		                                    <?php } ?>
										</span>
									</div>
								</div>
								<div class="portlet-body">
									<div class="tabbable">
										<div class="row">
											<div class="col-md-12">
												<div style="float: right;">
													<?php 
														$id=$this->uri->segment(2); 
														$next = $id+1; 
														$previous = $id-1; 
													?>
													<a class="btn-warning btn-sm" style="background-color: #E87E04 !important;" href="<?php echo base_url();?>gcc-tbc-order-details/<?php echo $previous; ?>">Previous</a>
													<a class="btn-success btn-sm " style="background-color: #2C3E50 !important;"  href="<?php echo base_url();?>gcc-tbc-order-details/<?php echo $next; ?>">Next</a>
													<a class="btn-info btn-sm" style="background-color:#4B77BE !important;" href="<?php echo base_url();?>gcc-tbc-orders" >Back</a>
													<a href="javascript:void(0);" class="btn-success btn-sm popup_save" style="background-color: #1BA39C!important;" title="Update Status" rel="<?php echo(isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''?>" data-title="Update Status" rev="gcc_tbc_edit_status">Update Status</a>
												</div>
												<ul class="nav nav-tabs nav-tabs-lg">
													<li class="active">
														<a href="#tab_1" data-toggle="tab">
														Details </a>
													</li>
													<li class="">
														<a href="#tab_2" data-toggle="tab">
														Invoices 
														</a>
													</li>
													<li class="">
														<a href="#tab_3" data-toggle="tab">
														Packaging slip
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1">
												<br>
												<div class="note note-info note-bordered">
													<h5>Comment Releted To Order.</h5>
													<p> 
														<b style="font-size: 18px;"><?php echo (isset($order_data->order_comment) && !empty($order_data->order_comment))?$order_data->order_comment:''; ?> </b> 
													</p>
												</div>
												<div class="row">
													<div class="col-md-6 col-sm-12">
					                                  	<div class="portlet blue box">
					                                    	<div class="portlet-title">
					                                      		<div class="caption">
					                                        		<i class="fa fa-cogs"></i>Order Details
					                                      		</div>
					                                    	</div>
					                                    	<div class="portlet-body" style="height: 185px;">
					                                      		<div class="row static-info">
					                                      			<div class="col-md-5 name">
																 		Order #:  
																	</div>
																	<div class="col-md-7 value">
																		MS<?php echo str_pad($order_data->order_id, 6,'0',STR_PAD_LEFT);?>
																	</div>
																</div>
																<div class="row static-info">
																	<div class="col-md-5 name">
																		Order Date & Time:
																	</div>
																	<div class="col-md-7 value">
																		<?php echo (isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date("d-M-Y H:i A", strtotime($order_data->inserted_on)):''; ?>
																	</div>
																</div>
																<div class="row static-info">
																	<div class="col-md-5 name">
																		Order Status:
																	</div>
																	<div class="col-md-7 value">
																		<?php if($order_data->order_status=='PENDING')
									                                    { ?>
									                                        <span class="label label-sm label-pending">
									                                        	PENDING
									                                    	</span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='ACCEPTED') 
									                                    { ?>
									                                        <span class="label label-sm label-accepted"> ACCEPTED </span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='PACKED') 
									                                    { ?>
									                                        <span class="label label-sm label-packed"> PACKED</span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='DISPATCHED') 
									                                    { ?>
									                                        <span class="label label-sm label-dispatch"> DISPATCHED </span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='DELIVERED') 
									                                    { ?>
									                                        <span class="label label-sm label-delivered"> DELIVERED  </span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='CANCELLED') 
									                                    { ?>
									                                    	<span class="label label-sm label-cancelled"> CANCELLED  </span>
									                                    <?php } 
									                                    elseif($order_data->order_status=='COMPLETE') 
									                                    { ?>
									                                    	<span class="label label-sm label-complete"> COMPLETE  </span>
									                                    <?php } ?>
																	</div>
																</div>
						                                      	<div class="row static-info">
																	<div class="col-md-5 name">
																		Grand Total:
																	</div>
																	<div class="col-md-7 value">
																		<i class="fa fa-inr"></i>
																		<?php echo (isset($order_data->order_price) && !empty($order_data->order_price))?$order_data->order_price:''; ?>
																	</div>
																</div>
					                                      		<div class="row static-info">
					                                        		<div class="col-md-5 name">
					                                           			Payment Information:
					                                        		</div>
					                                        		<div class="col-md-7 value">
					                                          			<?php echo (isset($order_data->customer_payment_mode) && !empty($order_data->customer_payment_mode))?$order_data->customer_payment_mode:''; ?>
					                                        		</div>
					                                      		</div>
					                                    	</div>
					                                  	</div>
					                                </div>
													<div class="col-md-6 col-sm-12">
														<div class="portlet blue box">
															<div class="portlet-title">
																<div class="caption">
																	<i class="fa fa-cogs"></i>Customer Information
																</div>
															</div>
															<div class="portlet-body" style="height: 185px;">
																<div class="row static-info">
																	<div class="col-md-4 name">
																		Customer Name:
																	</div>
																	<div class="col-md-8 value">
																		<?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?> (<?php echo (isset($order_data->institute_code) && !empty($order_data->institute_code))?$order_data->institute_code:''; ?>)
																	</div>
																</div>
																<div class="row static-info">
																	<div class="col-md-4 name">
																		Email:
																	</div>
																	<div class="col-md-8 value">
																		<?php echo (isset($order_data->customer_email) && !empty($order_data->customer_email))?$order_data->customer_email:''; ?>
																	</div>
																</div>
																<div class="row static-info">
																	<div class="col-md-4 name">
																		Mobile Number:
																	</div>
																	<div class="col-md-8 value">
																		<?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?>
																	</div>
																</div>
																<div class="row static-info">
																	<div class="col-md-4 name">
																		Shipping Address:
																	</div>
																	<div class="col-md-8 value">
																		<?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> 
																		<?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?> - <?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="portlet blue box">
															<div class="portlet-title">
																<div class="caption">
																	<i class="fa fa-cogs"></i>Order Product
																</div>
															</div>
															<?php if(isset($order_detail)&& !empty($order_detail))
															{ $total_amt = 0; ?>
																<div class="portlet-body">
																	<div class="table-responsive">
																		<table class="table table-hover table-striped">
																			<thead>
																				<tr>
																					<th>
																						<center>Product Image</center>
																					</th>
																					<th>
																						Product Name
																					</th>
																					<th>
																						Price (<i class="fa fa-inr"></i>)
																					</th>
																					<th style="text-align: center;">
																						Total Price (<i class="fa fa-inr"></i>)
																					</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach($order_detail as $key)
																				{ $total_amt=($key->product_price * $key->product_qty);?>
																					<tr>
																						<td style="width:20%;">
																							<center><img style="width: 35%;" src="<?php echo base_url(); ?>uploads/gcc_tbc_product_photos/<?php echo (isset($key->product_image) && !empty($key->product_image))?$key->product_image:''; ?>"></center>
																						</td>
																						<td>
																							<?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
																						</td>
																						<td>
											                                                <?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price:''; ?> X <?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; ?>
											                                            </td>												
																						<td>
																							<center><?php echo (isset($total_amt) && !empty($total_amt))?$total_amt:''; ?></center>
																						</td>	
																					</tr>	
																				<?php } ?>
																			</tbody>
																		</table>	
																	</div>
																</div>
															<?php }?>
														</div>
													</div>
												</div>			
											</div>
											<div class="tab-pane" id="tab_2">
												<div class="invoice">
													<div class="row invoice-logo">
														<div class="col-xs-6 invoice-logo-space">
															<img alt=""  class="img-responsive" src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/img/logos/1.png" style="height: 50px; width: 54%;margin-top: 10px;">
														</div>
														<div class="col-xs-6 caption-subject font-green-sharp uppercase">
															<p style="float:right;font-size: 18px;font-weight: 600;margin-top: 20px;">
																ORDER # MS<?php echo str_pad($order_data->order_id, 6,'0',STR_PAD_LEFT);?>
															</p>
														</div>
													</div>
													<hr>
													<div class="row" style="margin-bottom: 5%;">
														<div class="col-xs-6 invoice-payment">	
															<h3>Shipping Address :</h3>
															<span style="font-size: 14px;"><b><?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?></b><br>
																<?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> <br>
																<b><?php echo (isset($order_data->institute_taluka) && !empty($order_data->institute_taluka))?$order_data->institute_taluka:''; ?>
																<?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?> - 
																<?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?></b>
																<br><b><?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?></b>
																<br><?php if(isset($order_data->customer_email) && !empty($order_data->customer_email)) echo $order_data->customer_email;?></span>
														</div>
														<div class="col-xs-6 invoice-payment">
															<ul class="list-unstyled" style="float:right">
																<h3>Company Address:</h3>
																<span style="font-size: 14px;"><b>MSCEIA</b><br>
																C-208,Wisteriaa Fortune, Bhumkar <br>
																Das Gugre Rd, Bhumkar Nagar,<br>
																Opp-Silver spoon hotel, Pimpri-<br>
																Chinchwad, Maharashtra 411057.
																</span> 
															</ul>
														</div> 
													</div>
													<?php if(isset($order_detail)&& !empty($order_detail))
													{ $total_amt=0;?>
														<div class="row">
															<div class="col-xs-12">
																<table class="table table-striped table-hover table-bordered">
																	<thead>
																		<tr>
																			<th style="text-align: center;">
																				Product Image
																			</th>
																			<th style="text-align: center;">
																				Product Name 
																			</th>
																			<th style="text-align: center;">
																				Price (Rs)
																			</th>
																			<th style="text-align: center;">
																				Total Price (Rs)
																			</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach($order_detail as $key)
																		{ $total_amt=($key->product_price * $key->product_qty)?>
																			<tr>
																				<td style="width:20%; text-align: center;">
																					<img style="width: 35%;" src="<?php echo base_url(); ?>uploads/gcc_tbc_product_photos/<?php echo (isset($key->product_image) && !empty($key->product_image))?$key->product_image:''; ?>">
																				</td>
																				<td>
																					<?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
																				</td>
																				<td style="text-align: center;">
									                                                <?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price:''; ?> X <?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; ?>
									                                            </td>
																				<td style="text-align: center;">
																					<?php echo (isset($total_amt) && !empty($total_amt))?$total_amt:''; ?>
																				</td>
																			</tr>
																		<?php } ?>
																		<tr>
																			<td colspan="2"></td>
																			<td style="text-align:center;font-size: 14px; font-weight: 800;"><p>Grand Total:</p></td>
																			<td style="text-align:center;font-size: 14px; font-weight: 800;"><p><?php echo (isset($order_data->order_price) && !empty($order_data->order_price))?$order_data->order_price:''; ?></p></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													<?php } ?>
													<div class="row">
														<center>
															<a class="btn btn-lg blue hidden-print margin-bottom-5" href="<?php echo base_url(); ?>gcc-tbc-print-invoice/<?php echo (isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''; ?>">Print <i class="fa fa-print"></i> </a>
														</center>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab_3">				
												<div class="invoice">
													<div class="row">
														<div class="col-xs-12">
															<h4 class="font-blue-soft bold text-center" style="font-size: 21px;">
																<u>Printed Book</u>
															</h4>
														</div>
													</div>
													<div class="row">	
														<div class="col-xs-6 invoice-payment">
															<h3>Shipping Address :</h3>
															<span style="font-size: 14px;">
																<b><?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?></b><br>
																<?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> <br>
																<b><?php echo (isset($order_data->institute_taluka) && !empty($order_data->institute_taluka))?$order_data->institute_taluka:''; ?>
																<?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?> - 
																<?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?></b>
																<br><b><?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?></b>
																<br><?php if(isset($order_data->customer_email) && !empty($order_data->customer_email)) echo $order_data->customer_email;?>
															</span>
														</div>
														<div class="col-xs-6 invoice-payment">	
															<h3 class="font-green-sharp uppercase bold" style="float:right;font-size: 18px;margin-top: 14% !important">
																ORDER No: # MS<?php echo str_pad($order_data->order_id, 6,'0',STR_PAD_LEFT);?></td> 
															</h3>
														</div> 
													</div><br><br>
													<div class="row">
														<div class="col-xs-12">
															<table class="table table-striped table-hover table-bordered">
																<thead>
																	<tr >
																		<th style="text-align: center;">
																			Sr. No.
																		</th>
																		<th style="text-align: center;" >
																			Product Name 
																		</th>
																		<th style="text-align: center;">
																			Quantity
																		</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $i=1; $total_book=0; foreach($order_detail as $key)
																	{?>
																		<tr>
																			<td style="width:20%;">
																				<center><?php echo $i; ?></center>
																			</td>
																			<td>
																				<center><?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?></center>
																			</td>
																			<td>
								                                                <center><?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; $total_book=$total_book+$key->product_qty; ?></center>
								                                            </td>
																		</tr>
																	<?php $i++; } ?>
																	<tr>
																		<td></td>
																		<td><center><b>Total</b></center></td>
																		<td><center><?php echo $total_book; ?></center></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="row"> 
														<center>
															<a class="btn btn-lg blue hidden-print margin-bottom-5" href="<?php echo base_url(); ?>gcc-tbc-print-slip/<?php echo (isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''; ?>">Print <i class="fa fa-print"></i> </a>
														</center>
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
    </script>


</body>
<!-- END BODY -->
</html>