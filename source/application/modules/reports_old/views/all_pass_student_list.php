<!DOCTYPE html>
<html>
	<head>
		<title>Pass Student List</title>
	</head>
	<body>
	<center>
			
		<?php $institute_list = array();
		foreach ($stud_data as $key) 
		{ 
			if(!in_array($key->institute_id, $institute_list))
			{ 
				$i = 1;
				$institute_list[] =$key->institute_id; ?>
				</table>
				<div style="page-break-after:always;"></div>
				<table style="border-collapse: collapse; text-align: left; width: 100%">
					<tr>
						<td>
							<center>
								<img style="height: 60px;" src="<?php echo base_url(); ?>/images/exam_all.png">
							</center>
						</td>
					</tr>
				</table>
				<hr>	
				<h3> <?php echo $key->institute_name; ?>(<?php echo $key->institute_code; ?>) </h3>
				<h4>Passed Student List (<?php echo array_count_values(array_column($stud_data,'institute_id'))[$key->institute_id]; ?>)</h4>

				<table width="100%" border="1" style="border-collapse:collapse;font-size:16px;">
					<tr> 
						<th>Sr.no</th>
						<th>Student Name</th>
						<th>Course</th>
						<th>Seat No.</th>
						<th>Sign</th>
					</tr>
					<tr style="width: 200px; "> 
						<td style="text-align: center;"><?php echo $i++;?></td>
						<td> <?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?ucwords(strtolower($key->stud_full_name)):'' ?></td>
						<td><?php echo (isset($key->course_name) && !empty($key->course_name))?$key->course_name:'' ?></td>
						<td><?php echo (isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'' ?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
			<?php }
			else
			{ ?>
			    <tr>
					<td style="text-align: center;"><?php echo $i++;?></td>
					<td> <?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?ucwords(strtolower($key->stud_full_name)):'' ?></td>
					<td><?php echo (isset($key->course_name) && !empty($key->course_name))?$key->course_name:'' ?></td>
					<td><?php echo (isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'' ?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			<?php } 
		} ?>		
	</center>
	</body>
</html>