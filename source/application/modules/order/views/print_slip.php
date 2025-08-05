<!DOCTYPE html>
<html>
	<head> 
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111499919-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-111499919-1');
		</script>        
	    <style>
	        table{width: 100%;border-collapse: collapse;}
	        th{background-color: #ccc; border:1px solid black; font-size: 13px; font-weight: bold;} 
	        p{font-size: 11px;}
	        td{font-size: 11px; padding:5px;}
	    </style>       
    </head>
    <body>
	  	<div style="border:1px solid black;">
	  		<div style="padding: 10px;">
		        <table>
		            <thead>
		                <tr>
		                    <td width="10%" style="font-size: 25px;">
		                    	<span style="margin-left: 10px;"><b style="border: 1px solid black; padding: 5px;"><?php echo (isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''; ?></b></span>
		                    	
		                    </td>
		                    <td width="90%" style="font-size: 25px;"><b><u><center>Printed book</center></u></b> </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		        	<thead>
		                <tr>
		                   <td width="75%;">
			                   	<h4 style="text-align: left;">Registration No. ISBN 978-81-943568</h4>
			                </td>
			                <td width="25%;">
			                	<h4 style="text-align: right;">Order No. <b># AP<?php echo str_pad($order_data->order_id , 6, '0', STR_PAD_LEFT);?></b><br>Order Date. <b><?php echo (isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date('d-m-Y', strtotime($order_data->inserted_on)):''; ?></b></h4>
		                   </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		            <tbody>
		                <tr>
		                    <td width="60%" style="vertical-align: top;">
		                    	<h4 style="margin:5px 0px;">Shipping Address:</h4>
			                    <b style="font-size: 15px;"><?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?></b> <br>           
                            <p style="font-size: 14px;text-transform: uppercase;">
                            	<?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> 
	                            <?php echo (isset($order_data->institute_taluka) && !empty($order_data->institute_taluka))?$order_data->institute_taluka:''; ?> <br>
	                            <b><?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?> -
	                            <?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?></b><br>
	                            <?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?>
	                        </p>
							</td>
		                    <td width="40%" style="text-align: right; vertical-align: top;">
		                    </td>
		                </tr> 
		            </tbody>
		        </table>
		        <table border="1" >
		            <thead>
		            	<tr>
				            <th> Sr.No </th>
				            <!-- <th> Product Image </th> -->
				            <th> Product Name </th>
				            <th> Quantity </th>
		            	</tr>
		            </thead>
		            <tbody>
		            <?php if(isset($order_detail) && !empty($order_detail)) {  $i=1; $total_books=0; //$total_amt=0; $shipping_charges=0;
		                foreach($order_detail as $key) {
		                
						//$total_amt=($key->product_price * $key->product_qty);
						//$shipping_charges = $shipping_charges+$key->shipping_charges; ?>
		                <tr>
			                <td style="text-align: center;"><?php echo $i++; ?></td>
			                <td>
			                    <?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
			                </td>
			                <td>
		                        <center><?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; $total_books=$total_books+$key->product_qty; ?></center>
		                    </td>
		                </tr>
		            <?php } } ?>
		            <tr>
		            	<td></td>
		            	<td>Total Books</td>
		            	<td style="text-align: center;"><?php echo $total_books; ?></td>
		            </tr>
		            </tbody>
		        </table>
		        <table>
		            <thead id="footer">
		                <tr>
		                    <td width="80%" style="text-align: right;">
		                        <b>Sender:</b><br>
		                        <b>For MSCEIA</b><br>
		                        <b>Aaral Publications,Majiwada, Thane-</b>
		                        <b>400601</b><br>
		                        <b>Mo.: +91 98693 80948</b><br>
		                    </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		            <thead id="footer">
		                <tr>
		                    <td colspan="2"><i>Thank you for shopping with MSCEIA...!</i></th>
		                    <td colspan="2" style="text-align: right;">Visit us on <i>www.msceia.in</i> </td>
		                </tr>
		            </thead>
		        </table>
			</div>
    	</div>
    	<hr>
    	<div style="border:1px solid black;">
	  		<div style="padding: 10px;">
		        <table>
		            <thead>
		                <tr>
		                    <td width="10%" style="font-size: 25px;">
		                    	<span style="margin-left: 10px;"><b style="border: 1px solid black; padding: 5px;"><?php echo (isset($order_data->order_id) && !empty($order_data->order_id))?$order_data->order_id:''; ?></b></span>
		                    	
		                    </td>
		                    <td width="90%" style="font-size: 25px;"><b><u><center>Printed book</center></u></b> </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		        	<thead>
		                <tr>
		                   <td width="75%;">
			                   	<h4 style="text-align: left;">Registration No. ISBN 978-81-943568</h4>
			                </td>
			                <td width="25%;">
			                	<h4 style="text-align: right;">Order No. <b># AP<?php echo str_pad($order_data->order_id , 6, '0', STR_PAD_LEFT);?></b><br>Order Date. <b><?php echo (isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date('d-m-Y', strtotime($order_data->inserted_on)):''; ?></b></h4>
		                   </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		            <tbody>
		                <tr>
		                    <td width="60%" style="vertical-align: top;">
		                    	<h4 style="margin:5px 0px;">Shipping Address:</h4>
			                    <b style="font-size: 15px;"><?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?></b> <br>           
                            <p style="font-size: 14px;text-transform: uppercase;">
                            	<?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> 
	                            <?php echo (isset($order_data->institute_taluka) && !empty($order_data->institute_taluka))?$order_data->institute_taluka:''; ?> <br>
	                            <b><?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?> - 
	                            <?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?></b><br>
	                            <?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?>
	                        </p>
							</td>
		                    <td width="40%" style="text-align: right; vertical-align: top;">
		                    </td>
		                </tr>
		            </tbody>
		        </table>
		        <table border="1" >
		            <thead>
		            	<tr>
				            <th> Sr.No </th>
				            <!-- <th> Product Image </th> -->
				            <th> Product Name </th>
				            <th> Quantity </th>
		            	</tr>
		            </thead>
		            <tbody>
		            <?php if(isset($order_detail) && !empty($order_detail)) {  $i=1; $total_books=0; //$total_amt=0; $shipping_charges=0;
		                foreach($order_detail as $key) {
		                
						//$total_amt=($key->product_price * $key->product_qty);
						//$shipping_charges = $shipping_charges+$key->shipping_charges; ?>
		                <tr>
			                <td style="text-align: center;"><?php echo $i++; ?></td>
			                <td>
			                    <?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
			                </td>
			                <td>
		                        <center><?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; $total_books=$total_books+$key->product_qty; ?></center>
		                    </td>
		                </tr>
		            <?php } } ?>
		            <tr>
		            	<td></td>
		            	<td>Total Books</td>
		            	<td style="text-align: center;"><?php echo $total_books; ?></td>
		            </tr>
		            </tbody>
		        </table>
		        <table>
		            <thead id="footer">
		                <tr>
		                    <td width="80%" style="text-align: right;">
		                        <b>Sender:</b><br>
		                        <b>For MSCEIA</b><br>
		                        <b>Aaral Publications,Majiwada, Thane-</b>
		                        <b>400601</b><br>
		                        <b>Mo.: +91 98693 80948</b><br>
		                    </td>
		                </tr>
		            </thead>
		        </table>
		        <table>
		            <thead id="footer">
		                <tr>
		                    <td colspan="2"><i>Thank you for shopping with MSCEIA...!</i></th>
		                    <td colspan="2" style="text-align: right;">Visit us on <i>www.msceia.in</i> </td>
		                </tr>
		            </thead>
		        </table>
			</div>
    	</div>
	</body>
</html>