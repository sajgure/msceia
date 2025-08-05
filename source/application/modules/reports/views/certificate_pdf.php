
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
                        	{ ?>
								<div class="col-md-12">
								    
										<img style="position: absolute; top: 21.3%; left: 43.5%; height: 130px; width: 105px; border:1px solid #aaa; filter: contrast(210%);" src="<?php echo base_url(); ?>uploads/student_photos/<?php echo ((isset($key->photo_sign) && !empty($key->photo_sign))?$key->photo_sign:'default.png'); ?>">
								
									<div style=" position: absolute; top: 21.8%; right: 0.3%;"><b><?php echo $batch; ?></b> </div>
									
									<div style=" position: absolute; top: 52%; left: 26.5%; font-size: 18px; color: #031228;"><b><?php echo(isset($key->stud_full_name) && !empty($key->stud_full_name))?strtoupper($key->stud_full_name):''?> </b> </div>
									<div style=" position: absolute; top: 57%; left: 51%; color: #031228;"><b><?php echo(isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:''?> </b> </div>
									<div style=" position: absolute; top: 62%; left: 23.7%; color: #031228;"><b><?php echo(isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:''?>  </b></div>
									<div style=" position: absolute; top: 62%; left: 90%; color: #031228;"><b><?php echo(isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''?></b>  </div>
									<div style=" position: absolute; top: 67.3%; left: 30.5%; color: #031228;"><b><?php echo(isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:''?> </b> </div>
									
									<div style=" position: absolute; top: 80.5%; left: 36.7%; color: #031228;"><b><?php echo(isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0'?><?php if($key->grace1=='*') { echo "<sup>*</sup>";} ?> </b> </div>
									<div style=" position: absolute; top: 80.5%; left: 58.7%; color: #031228;"><b><?php echo(isset($key->group_marks) && !empty($key->group_marks))?$key->group_marks:'0'?> </b> </div>
									<div style=" position: absolute; top: 80.5%; left: 80.2%; color: #031228;"><b><?php echo(isset($key->speed_marks) && !empty($key->speed_marks))?$key->speed_marks:'0'?><?php if($key->grace=='*') { echo "<sup>*</sup>";} ?> </b> </div>
									<div style=" position: absolute; top: 80.5%; left: 92.1%; color: #031228;"><b><?php echo(isset($key->total_marks) && !empty($key->total_marks))?$key->total_marks:'0'?> </b> </div>
								</div>	
								<div style="page-break-before: always;"></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


