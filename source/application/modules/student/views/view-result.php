<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>View Result | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?> </title>
		<base href="<?php echo base_url(); ?>">
		<link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
		.font-blue-steel {
			color: #4B77BE !important;
			font-weight: 500 !important;
		} 
		.marathi 
		{
            font-family: Helvetica, Arial, sans-serif;
        }
		ins{
            color:red;
            background:#FFE6E6;
        }

        del{
            color:green;
            background:#E6FFE6;
        }
        .green_span{
		    color: green;
		    font-weight:600;
		}
		.red_span{
			color: red;
			font-weight:600;
		}
		</style>
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo ">
		<?php $this->load->view('template/header');?>
			<div class="clearfix"> </div>
			<div class="page-container">
				<div class="page-content-wrapper">
					<div class="portlet light">
						<div class="portlet-title ">
							<div class="caption font-blue"> <i class="fa fa-bars font-blue"></i> <span class="caption-subject bold uppercase">Exam Result</span> </div>
							<div class="actions tools"> <a href="<?php echo base_url();?>result" class="btn blue" style="height: 32px;padding: 8px 20px !important; font-size: 15px !important; line-height: 1 !important; font-weight: 600 !important;">Back</a> </div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12">
									<div class="note note-info note-shadow">
										<center>
											<p>Dear
												<?php echo (isset($stud_data->first_name) && !empty($stud_data->first_name))?$stud_data->first_name:'';?>
												<?php echo (isset($stud_data->father_name) && !empty($stud_data->father_name))?$stud_data->father_name:'';?>
												<?php echo (isset($stud_data->surname) && !empty($stud_data->surname))?$stud_data->surname:'';?>(
												<?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))?$stud_data->course_name:'';?> )
											</p>
										</center>
										<br>
										<?php $flag=0; ?>
											<table width="70%" style="margin-left:50px; width:91%; " class="table table-bordered">
											<tr>
												<th style="text-align:center;">प्रश्न</th>
												<th style="text-align:center;">एकूण गुण </th>
												<th style="text-align:center;">प्राप्त गुण  </th>
												<th style="text-align:center;"> Result  </th>
											</tr>
											<tr>
												<td style="text-align:center;">Objective </td>
												<?php if($stud_data->course_master_id==7) { ?>
													<td style="text-align:center;">40</td>
													<?php } else { ?>
													<td style="text-align:center;">25</td>
												<?php	} ?>
												<td style="text-align:center;"><?php echo round((isset($stud_data->objective_marks) && !empty($stud_data->objective_marks))?$stud_data->objective_marks:'0',2);?></td>
												<td style="text-align:center;"><?php if($stud_data->objective_marks<10){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
											</tr>
											<?php if($stud_data->course_master_id!=7) { ?>
												<tr>
													<td style="text-align:center;">Email / Email </td>
													<td style="text-align:center;">05</td>
													<td style="text-align:center;"><?php echo round((isset($stud_data->email_marks) && !empty($stud_data->email_marks))?$stud_data->email_marks:'0',2);?></td>
													<td style="text-align:center;"><?php if($stud_data->email_marks<2.5){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
												</tr>
											<?php } ?>
											<tr>
												<td style="text-align:center;"> पत्र / Letter   </td>
												<td style="text-align:center;">15</td>
												<td style="text-align:center;"><?php echo round((isset($stud_data->letter_marks) && !empty($stud_data->letter_marks))?$stud_data->letter_marks:'0',2);?></td>
												<td style="text-align:center;"><?php if($stud_data->letter_marks<8){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
											</tr>
											<tr>
												<td style="text-align:center;">तक्ता / Statement </td>
												<td style="text-align:center;">15</td>
												<td style="text-align:center;"><?php echo round((isset($stud_data->statement_marks) && !empty($stud_data->statement_marks))?$stud_data->statement_marks:'0',2);?></td>
												<td style="text-align:center;"><?php if($stud_data->statement_marks<5){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
											</tr>
											<tr>
												<td style="text-align:center;">गती उतारा / Speed Passage </td>
												<td style="text-align:center;">40</td>
												<td style="text-align:center;"><?php echo round((isset($stud_data->speed_marks) && !empty($stud_data->speed_marks))?$stud_data->speed_marks:'0',2);?></td>
												<td style="text-align:center;"><?php if($stud_data->speed_marks<16){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
											</tr>
											<?php if($stud_data->course_master_id==7) { ?>
												<tr>
													<td style="text-align:center;">Mobile Computing </td>
													<td style="text-align:center;">5</td>
													<td style="text-align:center;"><?php echo round((isset($stud_data->mobile_marks) && !empty($stud_data->mobile_marks))?$stud_data->mobile_marks:'0',2);?></td>
													<td style="text-align:center;"><?php if($stud_data->mobile_marks<2.5){ echo '<span class="red_span">FAIL</span>'; $flag=1;}else{ echo '<span class="green_span">PASS</span>';} ?></td>
												</tr>
											<?php } ?>										
											<tr>
												<td style="text-align:center;"><b>एकूण</b> </td>
												<td style="text-align:center;">100</td>
												<td style="text-align:center;"><?php echo round((isset($stud_data->total_marks) && !empty($stud_data->total_marks))?$stud_data->total_marks:'0',2);?></td>
												<td style="text-align:center;">
													<?php if(isset($stud_data->result) && !empty($stud_data->result) == 'Fail'){ echo '<span class="red_span">FAIL</span>'; }else{ echo '<span class="green_span">PASS</span>';} ?>
												</td>
											</tr>
										</table>
									</div>
									<?php if(isset($question_data) && !empty($question_data))
									{  $i = 1; ?> 
										<span class="caption-subject font-blue-steel font-lg sbold uppercase">
											Section 1 -  Objective 
										</span>
										<hr>
										<div class="col-md-12">
											<?php foreach ($question_data as $key)
											{ 
												$obj_option_data=$this->common_model->selectAllWhr('tbl_option','question_id',$key->question_id); ?>
												<div class="inline-display"> 
												    <b>
												        (<?php echo $i++; ?>) <?php echo isset($key->question_english) && !empty($key->question_english)?$key->question_english:''; ?> 
												    </b>
												</div><br>
												<div class="radio-list">
													<?php $j=1; 
													if(isset($obj_option_data) && !empty($obj_option_data))
													{
														foreach ($obj_option_data as $row) 
														{ ?>
															<label style="<?php if($key->option_id==$row->option_id){ echo 'color:green;';}else if($key->stud_option_id==$row->option_id){ echo 'color:red;';} ?>"> [
																<?php echo $j; ?> ]
																<?php echo $row->option;?>
															</label>
														<?php $j++; }
													} ?>
												</div>
												<?php if($key->option_id==$key->stud_option_id)
												{?>
													<div class="alert alert-success"> 
														<strong style="color:green;">Correct! </strong>You made correct Selection. 
													</div>
													<hr>
												<?php }
												else if($key->stud_option_id==null) 
												{ ?>
													<div class="alert alert-warning" style="color:brown;"> You didn't attempted this question. </div>
														<hr>
													<?php }
												else { ?>
													<div class="alert alert-danger"> <strong style="color:red;">Incorrect!</strong> You made wrong selection. 
													</div>
													<hr>
												<?php }
											} ?>
										</div>
									<?php } ?>
									<hr>
									<?php if($stud_data->course_master_id!=7) 
									{ ?> 
										<span class="caption-subject font-blue-steel font-lg sbold uppercase">
											Section 2 - Email
										</span>
										<hr>
										<div class="row main_div">
											<div class="col-md-6">
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Question:</span> </div>
													</div>
													<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
														<div class="" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
															<?php if(isset($email_data) && !empty($email_data)) 
															{ ?>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">To:</span> &ensp;
																	<?php echo (isset($email_data->to) && !empty($email_data->to))?$email_data->to:''; ?>
																</p>
																<?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
																{ ?>
																	<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Cc:</span> &ensp;
																		<?php echo (isset($email_data->cc) && !empty($email_data->cc))?$email_data->cc:''; ?>
																	</p>
																	<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Bcc:</span> &ensp;
																		<?php echo (isset($email_data->bcc) && !empty($email_data->bcc))?$email_data->bcc:''; ?>
																	</p>
																<?php }?>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Subject:</span>&ensp;
																	<?php echo (isset($email_data->subject) && !empty($email_data->subject))?$email_data->subject:''; ?>
																</p>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Message:</span>&ensp;
																	<br>
																	<?php echo (isset($email_data->message) && !empty($email_data->message))?$email_data->message:''; ?>
																</p>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&ensp;
																	<?php echo (isset($email_data->attachment_file) && !empty($email_data->attachment_file))?$email_data->attachment_file:''; ?>
																</p>
																<?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
																{ ?>
																	<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&ensp;
																		<?php echo (isset($email_data->attachment2) && !empty($email_data->attachment2))?$email_data->attachment2:''; ?>
																	</p>
																<?php }?>
															<?php }?>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Answer:</span> </div>
													</div>
													<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
														<div class="" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
															<?php if(isset($stud_details) && !empty($stud_details)) 
															{ 

																$que_to = $email_data->to;
												                $ans_to = $stud_details->to;
												                if($que_to==$ans_to) {$to_ans=$ans_to; } else {$to_ans='<span style="color:red; background:#FFE6E6;">'.$ans_to.'</span>'; }

												                $que_cc = $email_data->cc;
												                $ans_cc = $stud_details->cc;
												                if ($que_cc==$ans_cc) {$cc_ans=$ans_cc; } else {$cc_ans='<span style="color:red; background:#FFE6E6;">'.$ans_cc.'</span>'; }

												                $que_bcc = $email_data->bcc;
												                $ans_bcc = $stud_details->bcc;
												                if ($que_bcc==$ans_bcc) {$bcc_ans=$ans_bcc; } else {$bcc_ans='<span style="color:red; background:#FFE6E6;">'.$ans_bcc.'</span>'; }

												                $que_sub = $email_data->subject;
												                $ans_sub = $stud_details->subject;
												                if ($que_sub==$ans_sub) {$sub_ans=$ans_sub; } else {$sub_ans='<span style="color:red; background:#FFE6E6;">'.$ans_sub.'</span>'; }

												                $que_attachment = $email_data->attachment_file;
												                $ans_attachment = trim($stud_details->attachment_file);
												                if($que_attachment==$ans_attachment) {$attachment_ans=$ans_attachment; } else {$attachment_ans='<span style="color:red; background:#FFE6E6;">'.$ans_attachment.'</span>'; }
												               
												                $que_attachment1 = $email_data->attachment_file1;
												                $ans_attachment1 = trim($stud_details->attachment_file1);
																if( $que_attachment1==$ans_attachment1) {$attachment_ans1=$ans_attachment1; } else {$attachment_ans1='<span style="color:red; background:#FFE6E6;">'.$ans_attachment1.'</span>'; }
												            }?> 
												            <span class="que" style="display:none;"><?php echo trim($email_data->message); ?>
												            </span>
															<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">To:</span> &ensp;
																<?php echo (isset($to_ans) && !empty($to_ans))?$to_ans:''; ?>
															</p>
															<?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
															{ ?>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Cc:</span> &ensp;
																	<?php echo (isset($cc_ans) && !empty($cc_ans))?$cc_ans:''; ?>
																</p>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Bcc:</span> &ensp;
																	<?php echo (isset($bcc_ans) && !empty($bcc_ans))?$bcc_ans:''; ?>
																</p>
															<?php }?>
															<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Subject:</span>&ensp;
																<?php echo (isset($sub_ans) && !empty($sub_ans))?$sub_ans:''; ?>
															</p>
															<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Message:</span>&ensp;
																<br><span class="ans"><?php echo (isset($stud_details->message) && !empty($stud_details->message))?$stud_details->message:''; ?></span></p>
															<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&ensp;
																<?php echo (isset($attachment_ans) && !empty($attachment_ans))?$attachment_ans:''; ?>
															</p>
															<?php if($stud_data->course_master_id == 4 || $stud_data->course_master_id == 5 || $stud_data->course_master_id == 6) 
															{ ?>
																<p style="text-align:justify;"><span class="caption-subject font-green-sharp uppercase">Attachment:</span>&ensp;
																	<?php echo (isset($attachment_ans1) && !empty($attachment_ans1))?$attachment_ans1:''; ?>
																</p>
															<?php }?>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
									<hr>
									<span class="caption-subject font-blue-steel font-lg sbold uppercase">
										Section 3 - Speed Passage
									</span>
									<hr>
									<div class="row main_div">
										<div class="col-md-6">
											<div class="portlet light">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Question:</span> </div>
												</div>
												<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
													<p class="que marathi" style="text-align: justify; white-space: pre-wrap; font-size: 14px;"><?php echo (isset($speed_data->passage) && !empty($speed_data->passage))?$speed_data->passage:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="portlet light">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Answer:</span> </div>
												</div>
												<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
													<p class="ans marathi" style="text-align: justify; white-space: pre-wrap; font-size: 14px;"><?php echo (isset($stud_details->passage) && !empty($stud_details->passage))?$stud_details->passage:''; ?></p>
												</div>
											</div>
										</div>
									</div> 
									<hr>
									<span class="caption-subject font-blue-steel font-lg sbold uppercase">
										Section 4 - Letter Writting
									</span>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="portlet light" style="padding: 0px;">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Question :</span>
														<a class="tooltips" href="<?php echo base_url();?>download/word_que/<?php echo $stud_details->letter_id; ?>/<?php echo $stud_details->student_id; ?>" data-original-title="Edit Record"> <i class="fa fa-download "></i> </a>
													</div>
												</div>
												<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
													<?php $letter_que_data=$this->common_model->selectDetailsWhr('tbl_letter','letter_id',$stud_details->letter_id); ?>
													<div style="height: 850px; width: 100%">
														<object type="application/x-silverlight-2" height="100%" width="100%;">
															<param name="source" value="<?php echo base_url(); ?>uploads/sw/word.xap" />
															<param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $letter_que_data->letter_base64;?>"> 
														</object>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="portlet light" style="padding: 0px;">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Answer:</span>
														<a class="tooltips" href="<?php echo base_url();?>download/word_ans/<?php echo $stud_details->letter_id; ?>/<?php echo $stud_details->student_id; ?>" data-original-title="Edit Record"> <i class="fa fa-download "></i> 
														</a>
													</div>
												</div>
												<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
													<div style="height: 850px; width: 100%">
														<object type="application/x-silverlight-2" height="100%" width="100%;">
															<param name="source" value="<?php echo base_url(); ?>uploads/sw/word.xap" />
															<param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $stud_details->letter_base64;?>"> 
														</object>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<hr>
									<span class="caption-subject font-blue-steel font-lg sbold uppercase">
										Section 5 - Statement Writting
									</span>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="portlet light" style="padding: 0px;">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Question :</span>
														<a class="tooltips" href="<?php echo base_url();?>download/excel_que/<?php echo $stud_details->statement_id; ?>/<?php echo $stud_details->student_id; ?>" data-original-title="Edit Record"> <i class="fa fa-download "></i> </a>
													</div>
												</div>
												<?php $statement_que_data=$this->common_model->selectDetailsWhr('tbl_statement','statement_id',$stud_details->statement_id);  ?>
												<div class="portlet-body portlet-section" style="min-height:800px;" id="portlet-section">
													<div style="height: 650px; width: 100%">
														<object type="application/x-silverlight-2" height="100%" width="100%;">
															<param name="source" value="<?php echo base_url(); ?>uploads/sw/excel.xap" />
															<param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $statement_que_data->statement_base64;?>"> 
														</object>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="portlet light" style="padding: 0px;">
												<div class="portlet-title">
													<div class="caption"> <span class="caption-subject font-green-sharp bold uppercase">Answer :</span>
														<a class="tooltips" href="<?php echo base_url();?>download/excel_ans/<?php echo $stud_details->statement_id; ?>/<?php echo $stud_details->student_id; ?>" data-original-title="Edit Record"> <i class="fa fa-download"></i> </a>
													</div>
												</div>
												<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
													<div style="height: 650px; width: 100%">
														<object type="application/x-silverlight-2" height="100%" width="100%;">
															<param name="source" value="<?php echo base_url(); ?>uploads/sw/excel.xap" />
															<param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $stud_details->statement_base64;?>"> 
														</object>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php if($stud_data->course_master_id==7)
									{ ?> 
										<span class="caption-subject font-blue-steel font-lg sbold uppercase">
			                    			Section 3 - Mobile Computing
			                			</span>
										<hr>
										<div class="row main_div">
											<?php $que_data=explode(',', $stud_details->mobile_que);
		                        				$ans_data=explode(',', $stud_details->mobile_ans);
		                        				for ($i=0; $i <5; $i++) 
		                        				{ 
							                        $ans=$ans_data[$i];
							                        $que=$que_data[$i];?>
													<div class="col-md-6" style="padding: 10px;">
														<?php $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que); ?>
														<p style="font-size: 15px; font-weight: bold; height: 28px;">Que.
															<?php echo (isset($mobile_data->quesion) && !empty($mobile_data->quesion))?$mobile_data->quesion:'';?>
														</p> <br>
														<center>
															<img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;">
														</center>
													</div>
													<div class="col-md-6" style="padding: 10px;">
														<center>
															<?php if($mobile_data->ans_steps==$ans) 
															{ ?>
																<div class="alert alert-success" style=" padding: 9px; font-size: 13px;"><strong>Well done,</strong> Your Answer Is Correct...!
																</div> 
																<img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;">
															<?php } 
								                            else 
								                            { 
								                                if($ans==0 || $ans==1)
								                                {
								                                    if($ans==0)
								                                    {
								                                        $ans='ans';
								                                    }
								                                    else
								                                    {
								                                        $ans='ans1';
								                                    }
								                                }
			                                  					else
			                                  					{
							                                      	$ans1=$ans-1;
							                                      	$ans=''.$mobile_data->folder_name.'/'.$ans1;
						                                  		} ?>
																<div class="alert alert-danger" style=" padding: 9px; font-size: 13px;">
																	<strong>Oops,</strong> Your Answer Is Wrong...!
																</div> 
																<img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo $ans; ?>.png" style="height: 519px; width: 300px; border: 1px solid #eee;">
															<?php } ?>
														</center>
													</div>
												<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php $this->load->view('template/footer');?>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/gmap.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
		<script>
		jQuery(document).ready(function() {
			Metronic.init(); // init metronic core components
			Layout.init();
			ComponentsPickers.init();
			TableAdvanced.init();
		});
		</script>
		<script>
            $(".que").each(function(){
              var que = $(this).html();
              var ans = $(this).parents('.main_div').find('.ans').html();
              var data = changed(que,ans,0);
              $(this).parents('.main_div').find('.ans').html(data[1]);
            }); 
        </script>
	</body>
</html>