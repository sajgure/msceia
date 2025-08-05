<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			table {
				border-collapse: collapse;
				table-layout: fixed;
				font-size: 11px;
				margin-left: auto;
				margin-right: auto;
				width: 90%;
			}

			table, th, td {
			  	border: 1px solid black;	
			}
			th {
				color: #3598dc !important;
			}
		</style>
	</head>
	<body>
		<center> <h2 style="text-align: center;">Institute List</h2> </center>
		<table>
			<thead>
				<tr>
					<th style="text-align: center;">Sr. No.</th>
					<th style="text-align: center;">Owner Photo</th>
					<th style="text-align: center;">Institute Details</th>
					<th style="text-align: center;">Contact Details</th>
					<th style="text-align: center;">Address</th>
					<th style="text-align: center;">Paid Student</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($table_data) && !empty($table_data))
				{  $i=1; 
					foreach ($table_data as $key){  ?>
						<tr>
							<td>
								<center>
									<?php echo $i++;?>
								</center>
							</td>
							<td>
								<center>
									<?php 
									$path='./uploads/inst_owner_photos/'.((isset($key->institute_owner_photo) && !empty($key->institute_owner_photo))?$key->institute_owner_photo:'default.png');
	                                if (file_exists($path)) 
	                                { ?>
	                                    <img src="<?php echo base_url();?>uploads/inst_owner_photos/<?php echo ((isset($key->institute_owner_photo) && !empty($key->institute_owner_photo))?$key->institute_owner_photo:'default.png'); ?>" style="width:70px; padding: 5px;"> 
	                                <?php }
	                                else
	                                { ?>
	                                    <img src="<?php echo base_url();?>uploads/inst_owner_photos/default.png" style="width:70px; padding: 5px;"> 
	                                <?php }?>
								</center>
							</td>
							<td>
								<span>
									<?php echo((isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:" "); ?> <b>(<?php echo((isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:" "); ?>)</b>
								</span>
							</td>
							<td style="word-wrap: break-word;">
								<span>
									<b>Mobile No :</b> <?php echo((isset($key->institute_contact) && !empty($key->institute_contact))?$key->institute_contact:" "); ?><br>
									<b>Email Id :</b> <br><?php echo((isset($key->institute_mail) && !empty($key->institute_mail))?$key->institute_mail:" "); ?>
								</span>
							</td>
							<td>
								<span style="word-wrap: break-word;">
									<?php echo((isset($key->institute_address) && !empty($key->institute_address))?$key->institute_address:" "); ?>
									<br><b>District :</b> <?php echo((isset($key->district_name) && !empty($key->district_name))?$key->district_name:" "); ?>
									<br><b>Taluka :</b> <?php echo((isset($key->institute_taluka) && !empty($key->institute_taluka))?$key->institute_taluka:" "); ?>
								</span>
							</td>
							<td>
								<center>
									<?php echo((isset($key->paid_student) && !empty($key->paid_student))?$key->paid_student:"0"); ?>
								</center>
							</td>
						</tr>
					<?php } 
				} ?>
			</tbody>
		</table>	
	</body>
</html>