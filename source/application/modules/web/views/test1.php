<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>speed</title>
<base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
	ins{
		color:red;
		background:#FFE6E6;
	}

	del{
		color:green;
		background:#E6FFE6;
	}
</style>
</head>
<body>
<div class="page-container">
	<div class="container" >
	    <br><br>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<form action="update_speed_mark_new" id="update_email_mark" class="horizontal-form" method="post" enctype="multipart/form-data">
					<?php if(isset($speed_data) && !empty($speed_data))
					{ 
						foreach ($speed_data as $key) 
						{ ?>
							<div class="portlet box blue-hoki main_div">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-pencil"></i>Speed - <?php echo $key->speed_id; ?> (Student Id - <?php echo $key->student_id; ?>)
									</div>	
									<div class="caption" style="float:right;">
									 	Marks : <?php echo $key->speed_marks; ?>
									</div>						
								</div>
								<div class="portlet-body">
									<div class="row">
										<div class="col-md-6">
											<div class="" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
												<?php $que_data= $this->common_model->selectDetailsWhr('tbl_speed','speed_id',$key->speed_id);
												if(isset($que_data) && !empty($que_data)) 
												{ ?>
													<p style="white-space: pre-wrap; font-size: 14px;"> <?php echo (isset($que_data->passage) && !empty($que_data->passage))?$que_data->passage:''; ?></p>
												<?php } ?>						
											</div>
										</div>
										<div class="col-md-6">
											<div class="" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
												<p style="white-space: pre-wrap; font-size: 14px; display:none;" class="que" ><?php echo $que_data->passage; ?></p>
												<p class="ans" style="white-space: pre-wrap; font-size: 14px;"><?php echo (isset($key->passage) && !empty($key->passage))?$key->passage:''; ?></p>
												
											</div>	
											<input type="hidden" name="s_id[]" value="<?php echo $key->student_id; ?>">
											<input type="text" name="t_marks[]" class="t_marks">

										</div>
									</div>
								</div>
							</div>
						<?php }
					} ?>
					<button type="submit" class="btn green common_save"> Submit </button>
				</form>
			</div>
		</div>		
	</div>
</div>


<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/gmap.js"></script>
	<script src="<?php echo base_url();?>assets/js/common.js"></script>
	<script src="<?php echo base_url();?>assets/js/custom.js"></script>


<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //PluginPickers.init();
   TableAdvanced.init();
   //Demo.init(); // init demo(theme settings page)
   $(".que").each(function(){
	    var que = $(this).html();
	    var ans = $(this).parents('.main_div').find('.ans').html();
	    var data = changed(que,ans,40);
	    $(this).parents('.main_div').find('.ans').html(data[1]);
	    $(this).parents('.main_div').find('.t_marks').val(data[0]);
	}); 
	setTimeout(function(){
        $("html, body").animate({ scrollTop: $(document).height() }, 1000); 
        setTimeout(function(){
            $(".common_save").trigger("click");
        },1000)
    },5000)
});
</script>
</body>
<!-- END BODY -->
</html>