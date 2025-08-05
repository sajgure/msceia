<html>
    <head>
        <style>
            table{width: 100%;border-collapse: collapse;}
            th{background-color: #ccc; border:1px solid black; font-size: 13px; font-weight: bold;} 
            td{font-size: 11px; padding:5px;}
        </style>  
    </head>
     <body>
        <div >
            <table>
                <thead>
                    <tr>
                        <td colspan="3"> <img style="width: 150px;" src="assets/site/assets/frontend/layout/img/logos/1.png"> </td>
                        <td style="text-align: right;"><b>Order No. # MS<?php echo str_pad($order_data->order_id , 6, '0', STR_PAD_LEFT);?></b><br>Date: <i><?php echo (isset($order_data->inserted_on) && !empty($order_data->inserted_on))?date('d-m-Y',strtotime($order_data->inserted_on)):'';?></i> </td>
                    </tr>
                </thead>
            </table>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td width="60%" style="vertical-align: top;">
                            <h4 style="margin:5px 0px;">Shipping Address:</h4>
                            <b><?php echo (isset($order_data->customer_name) && !empty($order_data->customer_name))?$order_data->customer_name:''; ?></b> <br>           
                            <?php echo (isset($order_data->address) && !empty($order_data->address))?$order_data->address:''; ?> 
                            <?php echo (isset($order_data->institute_taluka) && !empty($order_data->institute_taluka))?$order_data->institute_taluka:''; ?> <br>
                            <?php echo (isset($order_data->district_name) && !empty($order_data->district_name))?$order_data->district_name:''; ?>
                            <?php echo (isset($order_data->institute_pincode) && !empty($order_data->institute_pincode))?$order_data->institute_pincode:''; ?>                        
                            <?php if(isset($order_data->customer_email) && !empty($order_data->customer_email)) echo $order_data->customer_email;?><br>
                            <?php echo (isset($order_data->customer_phone) && !empty($order_data->customer_phone))?$order_data->customer_phone:''; ?>
                        </td>

                        <td width="40%" style="text-align: right; vertical-align: top;">
                            <h4 style="margin:5px 0px;">Company Address:</h4>
                            <b>MSCEIA</b><br>
                            C-208,Wisteriaa Fortune, Bhumkar <br>
                            Das Gugre Rd, Bhumkar Nagar,<br>
                            Opp-Silver spoon hotel, Pimpri-<br>
                            Chinchwad, Maharashtra 411057.
                        </td>
                    </tr> 
                </tbody>
            </table><br><hr><br>
            <table border="1" >

                <thead>
                    <tr>
                        <th> Sr.No </th>
                        <th> Product Name </th>
                        <th> Price (Rs) </th>
                        <th> Total Price (Rs)</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($order_detail) && !empty($order_detail)) {  $i=1; //$total_amt=0; $shipping_charges=0;
                    foreach($order_detail as $key) { ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i++; ?></td>
                        <td>
                            <?php echo (isset($key->product_name) && !empty($key->product_name))?$key->product_name:''; ?>
                        </td>
                        <td>
                            <center><?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price:''; ?> X <?php echo (isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''; ?></center>
                        </td>                   
                        <td style="text-align: right;">
                            Rs.&nbsp;<?php echo (isset($key->product_price) && !empty($key->product_price))?$key->product_price*$key->product_qty:'0'; ?>
                        </td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table><br>
            <table>
                <thead id="footer">
                    <tr>
                        <td width="80%" style="text-align: right;">
                            <b>SubTotal:</b><br>
                            <b>Shipping Charges:</b><br>
                            <b><h3>Grand Total:</h3></b>
                        </td>
                        <td style="text-align: right;">
                            Rs.&nbsp;<?php echo (isset($order_data->sub_total) && !empty($order_data->sub_total))?$order_data->sub_total:'0'; ?><br>
                            Rs.&nbsp;<?php echo (isset($order_data->shipping_total) && !empty($order_data->shipping_total))?$order_data->shipping_total:'0'; ?><br>
                            <h3>Rs.&nbsp;<?php echo (isset($order_data->order_price) && !empty($order_data->order_price))?$order_data->order_price:'0'; ?></h3>
                        </td>
                    </tr>
                </thead>
            </table><hr><br>
            <table>
                <thead id="footer">
                    <tr>
                        <td colspan="2"><i>Thank you for shopping with MSCEIA...!</i></th>
                        <td colspan="2" style="text-align: right;">Visit us on <i>www.msceia.in</i> </td>
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</head>
</html>