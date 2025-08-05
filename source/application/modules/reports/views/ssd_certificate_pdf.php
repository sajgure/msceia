<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
</head>
<body>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="row form">
				<div class="portlet box blue-hoki">
					<div class="portlet-body">
						<div class="row">
						<?php if(isset($stud_result) && !empty($stud_result))
						    foreach ($stud_result as $key) 
                        	{ if($key->objective_marks>=20 && (($key->speed_marks)+($key->letter_marks)+($key->statement_marks)+($key->mobile_marks)>=35)) { ?>
								<div class="col-md-12">
									<img style="position: absolute; top: 21.4%; left: 43.4%; height: 125px; width: 100px; border:1px solid #000; filter: contrast(210%);"  src="<?php echo base_url();?>/uploads/student_photos/<?php echo (isset($key->photo_sign) && !empty($key->photo_sign))?$key->photo_sign:'default.png';?>" onerror="this.src='<?php echo base_url();?>/uploads/student_photos/default.png';">
									<div style="position: absolute; top: 22%; right: 0.3%;"><b><?php echo $batch; ?></b> </div>
									
									<div style=" position: absolute; top: 52%; left: 26.5%; font-size: 18px; color: #031228;"><b><?php echo(isset($key->stud_full_name) && !empty($key->stud_full_name))?strtoupper($key->stud_full_name):''?> </b> </div>
									<div style=" position: absolute; top: 57.3%; left: 50.8%; color: #031228;"><b><?php echo(isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:''?> </b> </div>
									<div style=" position: absolute; top: 62.3%; left: 23.5%; color: #031228;"><b><?php echo(isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:''?>  </b></div>
									<div style=" position: absolute; top: 62.3%; left: 90%; color: #031228;"><b><?php echo(isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''?></b>  </div>
									<div style=" position: absolute; top: 67.5%; left: 30.5%; color: #031228;"><b><?php echo(isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:''?> </b> </div>
									
									<div style=" position: absolute; top: 80.2%; left: 35.6%; color: #031228;"><b><?php echo(isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0'?><?php if($key->grace1=='*') { echo "<sup>*</sup>";} ?> </b> </div>
									<div style=" position: absolute; top: 80.2%; left: 62.5%; color: #031228;"><b><?php echo ($key->speed_marks)+($key->letter_marks)+($key->statement_marks)+($key->mobile_marks); ?> </b> </div>
									<div style=" position: absolute; top: 80.2%; left: 92.5%; color: #031228;"><b><?php echo ($key->objective_marks)+($key->speed_marks)+($key->letter_marks)+($key->statement_marks)+($key->mobile_marks);?> </b> </div>
								</div>	
								<div style="page-break-before: always;"></div>
							<?php } }  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>