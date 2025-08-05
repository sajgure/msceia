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
    	<center><h5 style="text-align:center !important;margin-top:15px;"> <?php echo (isset($district_wise_data[0]->district_name) && !empty($district_wise_data[0]->district_name))?$district_wise_data[0]->district_name:''; ?> Report</h5></center>
	   	<div id="page">
			<table border="1" >
				<thead>
				<tr>
					<th>
						SrNo.
					</th>
					<th>
						Product Name 
					</th>
					<th>
						Quantity
					</th>
				</tr>
				</thead>
				<tbody>
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
	</body>
	</head>
</html>