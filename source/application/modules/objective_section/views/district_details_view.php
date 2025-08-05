<div class="row">
	<form action="" enctype="multipart/form-data" id=""  method="post" class="horizontal-form">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-list"></i>
						<span class="caption-subject">District Details Report</span>
						<span class="caption-helper"></span>
					</div>
					<div class="actions pull-right">
		           	 	<a href="district_details_report_excel/<?php echo(isset($district) && !empty($district))?$district:'';?>/<?php echo(isset($fdate) && !empty($fdate))?$fdate:'';?>/<?php echo(isset($tdate) && !empty($tdate))?$tdate:'';?>" class="btn btn-primary btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</a><a target="_blank" href="district_details_report_pdf/<?php echo(isset($district) && !empty($district))?$district:'';?>/<?php echo(isset($fdate) && !empty($fdate))?$fdate:'';?>/<?php echo(isset($tdate) && !empty($tdate))?$tdate:'';?>" class="btn btn-primary btn-xs" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> pdf</a>
		        	</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<center><h3><?php echo(isset($district_details_data->district_name[0])&& !empty($district_details_data->district_name[0]))?$district_details_data->district_name[0]:'';?></h3></center>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-resposive" >
						<thead>
							<tr class="heading">
								<th scope="col" style="text-align:center;">Sr.No.</th>
								<th scope="col" style="text-align:center;">Order_id</th>
								<th scope="col" style="text-align:center;">Order Date</th>
								<th scope="col" style="text-align:center;">Customer</th>
								<th scope="col" style="text-align:center;">Amount</th>
								<th scope="col" style="text-align:center;">Product</th>
								<th scope="col" style="text-align:center;">Quantity</th>
								<th scope="col" style="text-align:center;">Total Qty</th>
								<th scope="col" style="text-align:center;"> Status</th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($district_details_data) && !empty($district_details_data))
							{ $i=1;
								foreach ($district_details_data as $key)
								{ ?>
									<tr>
										<td>
											<?php echo $i++;?>
										</td>
										<td>
											<?php echo(isset($key->order_id) && !empty($key->order_id))?$key->order_id:'';?>
										</td>
										<td>
											<?php echo(isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y',strtotime($key->inserted_on)):'';?>
										</td>
										<td>
											<?php echo(isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:'';?>
										</td>
										<td>
											<?php echo(isset($key->order_price) && !empty($key->order_price))?$key->order_price:'';?>
										</td>
										<td>
											<?php $quantity_data=$this->common_model->selectAllWhr('tbl_order_details','order_id',$key->order_id); 
											if(isset($quantity_data) && !empty($quantity_data))
											{
												foreach ($quantity_data as $row)
												{ ?>
													<p><?php echo(isset($row->product_name) && !empty($row->product_name))?$row->product_name:'';?></p>
												<?php }
											} ?>
										</td>
										<td>
											<?php $quantity_data=$this->common_model->selectAllWhr('tbl_order_details','order_id',$key->order_id); 
											if(isset($quantity_data) && !empty($quantity_data))
											{ $t_book=0;
												foreach ($quantity_data as $row)
												{ ?>
													<p><?php $t_book=$t_book+$row->product_qty; echo(isset($row->product_qty) && !empty($row->product_qty))?$row->product_qty:'';?></p>
												<?php }
											} ?>
										</td>
										<td style="text-align:center;"><?php echo (isset($t_book) && !empty($t_book))?$t_book:''; ?></td>
										<td align="center">
											<?php if($key->order_status=='PENDING')
	                                        { ?>
	                                            <span class="label label-sm label-danger"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='ACCEPTED') { ?>
	                                            <span class="label label-sm label-warning"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='PACKED') { ?>
	                                            <span class="label label-sm" style="background-color: #7a518c;"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='DISPATHED') { ?>
	                                            <span class="label label-sm label-primary"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='DELIVERED') { ?>
	                                            <span class="label label-sm label-success"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='CANCELED') { ?>
	                                            <span class="label label-sm label-danger"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='COMPLETE') { ?>
	                                            <span class="label label-sm label-success"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } else if($key->order_status=='IN TRANSIT') { ?>
	                                            <span class="label label-sm label-primary"><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>  </span>
	                                        <?php } ?>
										</td>
	                                    <input type="hidden" name="order_id[]" value="<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">
									</tr>
									 
								<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>