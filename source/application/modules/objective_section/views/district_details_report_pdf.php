<html>
    <head>
        <style>
            body{width:100%;  margin:0;padding: 0; font-family: 'BookmanOld'}
            table{width: 100%;border-collapse: collapse;}
            #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 150px; text-align: center; }
     		#footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 150px; }
            th{background-color: #ccc;border:1px solid black; font-size: 10pt; color: #000; font-weight: bold;} 
            /*tr{border:1px solid black;} 
            th{border:1px solid black;} */
            td{font-size: 10pt;}
            #page{position:relative;top:50px;}
        </style>  
    </head>
    <body> 
    	<center><h5 style="text-align:center;"> District Details Report</h5></center>
	   	<div id="page">
			<table border="1" >
				<thead>
				<tr>
					<th>
						SrNo.
					</th>
					<th>
						Order Id 
					</th>
					<th>
						Order Date
					</th>
					<th>
						Customer
					</th>
					<th style="width: 250px;">
						Product
					</th>
					<th>
						Quantity
					</th>
					<th>
						Total Quantity
					</th>
					<th>
						Amount
					</th>
					<th>
						Status
					</th>
				</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach ($district_details_data as $key) { ?>
						<tr>
							<td style="text-align: center;"><?php echo $i; ?></td>
							<td>AP<?php echo str_pad($key->order_id, 6,'0',STR_PAD_LEFT);?></td>
							<td><?php echo (isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y', strtotime($key->inserted_on)):''; ?></td>
							<td style="text-align:center;" width="20%"><?php echo (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:''; ?></td>
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
							<td style="text-align:center;"><?php echo (isset($key->order_price) && !empty($key->order_price))?$key->order_price:''; ?></td>
							<td>
								<?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?>
							</td>
                            <input type="hidden" name="order_id[]" value="<?php echo (isset($key->order_id) && !empty($key->order_id))?$key->order_id:''; ?>">
						</tr>
					<?php $i++;  } ?>	
				</tbody>
			</table>
		</div>
	</body>
	</head>
</html>