<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<style>
		@page {
			margin: 0;
		}		
		.certificate{
			background-image: url('<?php echo base_url(); ?>images/certificate_ssd.jpg'); 
		}
	</style>
</head>
<body class="certificate">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="row form">
				<div class="portlet box blue-hoki">
					<div class="portlet-body">
						<div class="row">
						<?php if(isset($stud_result) && !empty($stud_result))
						    foreach ($stud_result as $key) 
                        	{ ?>								
								<div class="col-md-12" >
									<img style="position: absolute; top: 28.5%; left: 43.8%; height: 122px; width: 100px; border:1px solid #aaa; filter: contrast(210%);" src="<?php echo base_url(); ?>uploads/student_photos/<?php echo ((isset($key->photo_sign) && !empty($key->photo_sign))?$key->photo_sign:'default.png'); ?>">
									<div style=" position: absolute; top: 29%; right: 8%;"><b><?php echo 'July-2023'; ?></b> </div>
									<div style=" position: absolute; top: 55.2%; left: 29%; font-size: 18px; color: #031228;"><b><?php echo(isset($key->stud_full_name) && !empty($key->stud_full_name))?strtoupper($key->stud_full_name):''?> </b> </div>
									<div style=" position: absolute; top: 59.5%; left: 51.3%; color: #031228;"><b><?php echo(isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:''?> </b> </div>
									<div style=" position: absolute; top: 64%; left: 27%; color: #031228;"><b><?php echo(isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:''?>  </b></div>
									<div style=" position: absolute; top: 64%; left: 86%; color: #031228;"><b><?php echo(isset($key->institute_code) && !empty($key->institute_code))?$key->institute_code:''?></b>  </div>
									<div style=" position: absolute; top: 68.8%; left: 33%; color: #031228;"><b><?php echo(isset($key->institute_name) && !empty($key->institute_name))?$key->institute_name:''?> </b> </div>
									
									<div style=" position: absolute; top: 79.8%; left: 38%; color: #031228;"><b><?php echo(isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0'?><?php if($key->grace1=='*') { echo "<sup>*</sup>";} ?> </b> </div>
									<div style=" position: absolute; top: 79.8%; left: 57%; color: #031228;"><b><?php echo(isset($key->group_marks) && !empty($key->group_marks))?$key->group_marks:'0'?> </b> </div>
									<div style=" position: absolute; top: 79.8%; left: 86%; color: #031228;"><b><?php echo(isset($key->total_marks) && !empty($key->total_marks))?$key->total_marks:'0'?> </b> </div>
									
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