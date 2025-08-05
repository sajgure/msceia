<div class="row">
	 <?php $keydata = $this->common_model->selectDetailsWhr('tbl_rest_keys','id',1); ?>
	<form action="" enctype="multipart/form-data" id="" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>"  method="post" class="horizontal-form">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-list"></i>
						<span class="caption-subject">District wise Report</span>
						<span class="caption-helper"></span>
					</div>
					<div class="actions pull-right">
		           	 	<a href="district_view_excel/<?php echo(isset($district) && !empty($district))?$district:'';?>/<?php echo(isset($fdate) && !empty($fdate))?$fdate:'';?>/<?php echo(isset($tdate) && !empty($tdate))?$tdate:'';?>" class="btn btn-primary btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</a><a target="_blank" href="district_wise_pdf/<?php echo(isset($district) && !empty($district))?$district:'';?>/<?php echo(isset($fdate) && !empty($fdate))?$fdate:'';?>/<?php echo(isset($tdate) && !empty($tdate))?$tdate:'';?>" class="btn btn-primary btn-xs" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> pdf</a>
		        	</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<center><h3><?php echo (isset($district_wise_data[0]->district_name) && !empty($district_wise_data[0]->district_name))?$district_wise_data[0]->district_name:''; ?></h3></center>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-resposive" >
						<thead>
							<tr class="heading">
								<th scope="col" style="text-align:center;">Sr.No.</th>
								<th scope="col" style="text-align:center;">Product Name</th>
								<th scope="col" style="text-align:center;">Quantity</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
							<?php if(isset($district_wise_data) && !empty($district_wise_data))
							{ $i=1; $total_books = 0;
								foreach ($district_wise_data as $key) { ?>
									<tr class="odd gradeX">
										<td style="text-align: center;"><?php echo $i; ?></td>
										
										<td style="text-align:center;"><b><?php echo (isset($key->product_desc) && !empty($key->product_desc))?$key->product_desc:''; ?></b></td>
										<td style="text-align: right;"><b><?php echo (isset($key->qty) && !empty($key->qty))?$key->qty:''; $total_books =$total_books+$key->qty; ?></b></td>

	                                    <input type="hidden" name="order_id[]" value="<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">
									</tr>
								<?php $i++;  }?>
								<tr>
									<td></td>
									<td style="text-align: center;">Total</td>
									<td style="text-align: right;"><?php echo $total_books; ?></td>
								</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>