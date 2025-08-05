<div class="row">
	 <?php $keydata = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1); ?>
	<form action="save-sa-payment" enctype="multipart/form-data" id="save-sa-payment" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>" method="post" class="horizontal-form">
		<div class="col-md-12">
			<div class="portlet light">
                <div class="portlet-title"> 
                    <div class="caption font-blue">
                        <i class="fa fa-list font-blue" style="font-size: 20px; margin-top: 6px;"></i>
                        <span class="caption-subject bold uppercase"> Payment List </span>
                        <span><a class="btn btn-sm blue" style="margin-left: 744px;" href="dateWisePaymentExcel/<?php echo (isset($fdate) && !empty($fdate))?$fdate:''; ?>/<?php echo (isset($tdate) && !empty($tdate))?$tdate:''; ?>"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</a><a class="btn btn-sm red" href="dateWisePaymentPDF/<?php echo (isset($fdate) && !empty($fdate))?$fdate:''; ?>/<?php echo (isset($tdate) && !empty($tdate))?$tdate:''; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> pdf</a></span>
                    </div>
                </div>
                <div class="portlet-body form">                     
                     <table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr class="heading">
								<th scope="col" style="text-align:center;">Sr.No.</th>
								<th scope="col" style="text-align:center;">Order ID</th>
								<th scope="col" style="text-align:center;">Institute Name</th>
								<th scope="col" style="text-align:center;">Institute Code</th>
								<th scope="col" style="text-align:center;">Order Date</th>
								<th scope="col" style="text-align:center;">Order Amount</th>
								<th scope="col" style="text-align:center;">Status</th>
								<th style="text-align:center;">Payment Status </th>
							</tr>
						</thead>
						<tbody>
						</tbody>
							<?php if(isset($payment_data) && !empty($payment_data))
							{ $i=1;
								foreach ($payment_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i; ?></td>
										<td>AP<?php echo str_pad($key->order_id, 6,'0',STR_PAD_LEFT);?></td>
										<td><b><?php echo (isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:''; ?></b></td>
										<td style="text-align: center;"><?php echo (isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''; ?></td>
										<td style="text-align: center;"><?php echo (isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y', strtotime($key->inserted_on)):''; ?></td>
										<td style="text-align: right;"><i class="fa fa-inr"></i> <?php echo (isset($key->order_price) && !empty($key->order_price))?$key->order_price:''; ?></td>
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
	                                        <?php } ?>
										</td>
										<td align="center">
											<?php if($key->payment_status=='PENDING')
	                                        { ?>
	                                            <span class="label label-sm label-danger"><?php echo (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:''; ?>  </span>
	                                        <?php } else if($key->payment_status=='COMPLETE') { ?>
	                                        	<span class="label label-sm label-success"><?php echo (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:''; ?>  </span>
	                                        <?php } ?>
	                                    </td>
	                                    <input type="hidden" name="order_id[]" value="<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">
									</tr>
								<?php $i++; }
							} ?>
						</tbody>
					</table>
					<center><button type="submit" class="btn green common_save"><i class="fa fa-check"></i> Pay Payment </button></center>               
                </div>
            </div>
		</div>
	</form>
</div>