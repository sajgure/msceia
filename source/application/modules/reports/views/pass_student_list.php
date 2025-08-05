<!DOCTYPE html>
<html>
	<head>
		<title>Pass Student List - (<?php echo (isset($stud_data[0]->institute_code) && !empty($stud_data[0]->institute_code))?$stud_data[0]->institute_code:'' ?>)</title>
	</head>
	<body>
	<center>
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
		<?php if(isset($stud_data) && !empty($stud_data)) { ?>
		<h3>
			<?php echo (isset($stud_data[0]->institute_name) && !empty($stud_data[0]->institute_name))?$stud_data[0]->institute_name:'' ?> (<?php echo (isset($stud_data[0]->institute_code) && !empty($stud_data[0]->institute_code))?$stud_data[0]->institute_code:'' ?>)
		</h3>
		<h4><?php echo $stud_data[0]->batch_name; ?> Passed Student List (<?php echo count($stud_data) ?>)</h4>
		<table table width="100%" border="1" style="border-collapse:collapse">
			<tr> 
				<th align="center">Sr.no</th>
				<th >Student Name</th>
				<th >Seat No.</th>
				<th align="center">Sign</th>
			</tr>
			<?php $i = 1; foreach ($stud_data as $key) 
			{  ?>
				<tr style="width: 200px; "> 
					<td style="text-align: center;"><?php echo $i++;?></td>
					<td> <?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?ucwords(strtolower($key->stud_full_name)):'' ?></td>
					<td><?php echo (isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'' ?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			<?php  } ?>
		</table>
		<?php } ?>
	</center>
	<?php if(isset($ssd_stud_data) && !empty($ssd_stud_data)) { ?>
		<br><br>
		<center>
		<h4>Special Skill Passed Student List</h4>
			<table width="100%" border="1" style="border-collapse:collapse">
					<tr> 
						<th align="center">Sr.no</th>
						<th align="center">Student Name</th>
						<th align="center">Seat No.</th>
						<th align="center">Sign</th>
					</tr>
					<?php $i = 1; foreach ($ssd_stud_data as $key) { if($key->objective_marks>=20 && (($key->speed_marks)+($key->letter_marks)+($key->statement_marks)+($key->mobile_marks)>=35)) {   ?>
					<tr style="width: 200px; "> 
						<td style="text-align: center;"><?php echo $i++;?></td>
						<td> <?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?ucwords(strtolower($key->stud_full_name)):'' ?></td>
						<td><?php echo (isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'' ?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				<?php  } } ?>

			</table>
		</center>
	<?php } ?>
	</body>
</html>