<table style="width:100%;margin:1px;border: 1px solid black;">
  <tr>
    <td width="100%" style="text-align:center;">
      <img style="width: 350px; height: 70px;" src="<?php echo base_url();?>images/logo.png">
    </td> 
  </tr>
</table>	
<br>
<h3 style="text-align: center;">Payment Receipt</h3>
<br>
<table width="100%">
	<tr>
		<td><b>Payment Date :</b> <?php echo (isset($payment_data->deposite_date) && !empty($payment_data->deposite_date))?date('d/m/Y',strtotime($payment_data->deposite_date)):''; ?></td>
		<td style="text-align: right;"><b>Receipt Number :</b> <?php echo (isset($payment_data->payment_id) && !empty($payment_data->payment_id))?$payment_data->payment_id:''; ?></td>
	</tr>
	<tr>
		<td><b>Institute Name :</b> <?php echo (isset($payment_data->institute_name) && !empty($payment_data->institute_name))?$payment_data->institute_name:''; ?></td>
		<td style="text-align: right;"><b>Institute Code :</b> <?php echo (isset($payment_data->institute_code) && !empty($payment_data->institute_code))?$payment_data->institute_code:''; ?></td>
	</tr>
</table>
<br>
<?php
$amount_paid = (isset($payment_data->total_amount) && !empty($payment_data->total_amount))?$payment_data->total_amount:'0';
$student_count = (isset($payment_data->total_student) && !empty($payment_data->total_student))?$payment_data->total_student:'0';
//$perstudent_amount = $amount_paid/$student_count;
?>
<table width="100%" style="border-collapse: collapse;">
	<tr>
		<th style="border: 1px solid black; background-color: #9c8786;width:10%;">Sr. No</th>
		<th style="border: 1px solid black; background-color: #9c8786;width:40%;"> Student Name</th>
		<th style="border: 1px solid black; background-color: #9c8786;width:30%;"> Course Name</th>
		<th style="border: 1px solid black; background-color: #9c8786;width:20%;"> Amount</th>
	</tr>
	<?php if(isset($student_data) && !empty($student_data)) { $i=1;
		foreach ($student_data as $key) { ?>
			<tr>
				<td style="border: 1px solid black; text-align: center;"><?php echo $i; ?></td>
				<td style="border: 1px solid black; text-align: center;"> <?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:''; ?></td>
				<td style="border: 1px solid black; text-align: center;"> <?php echo (isset($key->course_name) && !empty($key->course_name))?$key->course_name:''; ?></td>
				<td style="border: 1px solid black; text-align: center;"> <?php echo (isset($key->payment_type) && !empty($key->payment_type))?$key->payment_type:'140'; ?> Rs.</td>
			</tr>
		<?php $i++; }
	} ?>
</table>
<br>
<p style="font-size: 18px; text-align: right;"><b>Total Amount :</b> <?php echo (isset($payment_data->total_amount) && !empty($payment_data->total_amount))?$payment_data->total_amount:''; ?> Rs.</p>