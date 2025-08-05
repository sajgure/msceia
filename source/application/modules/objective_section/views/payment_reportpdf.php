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
            td{font-size: 11pt;}
            #page{position:relative;top:50px;}
        </style>  
    </head>
    <body> 
    	<center><h5> District Wise Report</h5></center>
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
						Institute Name
					</th>
					<th>
						Institute Code
					</th>
					<th>
						Order Date
					</th>
					<th>
						Order Amount
					</th>
					<th>
						Status
					</th>
					<th>
						Payment Status
					</th>
				</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach($payment_data as $key)
					{ 	?>
						<tr>
							<td  style="text-align: center;">
								<?php echo $i++; ?>
							</td>
							<td>AP<?php echo str_pad($key->order_id, 6,'0',STR_PAD_LEFT);?></td>
							<td><?php echo (isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:''; ?></td>
							<td><?php echo (isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''; ?></td>
							<td><?php echo (isset($key->inserted_on) && !empty($key->inserted_on))?date('d-m-Y', strtotime($key->inserted_on)):''; ?></td>
							<td><i class="fa fa-inr"></i> <?php echo (isset($key->order_price) && !empty($key->order_price))?$key->order_price:''; ?></td>
							<td><?php echo (isset($key->order_status) && !empty($key->order_status))?$key->order_status:''; ?></td>
							<td><?php echo (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:''; ?></td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</body>
	</head>
</html>