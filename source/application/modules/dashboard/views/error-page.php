<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Error | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?> </title>
<base href="<?php echo base_url(); ?>" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/zoom.css">
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>"/>
<style type="text/css">
	h1{
		position: absolute;
		top: 35%;
		left: 35%;
		color: white;
		font-family: initial;
	}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
	<div class="logo">
		<a href="javascript:;">
		<img class="logos" src="<?php echo base_url(); ?>assets/site/assets/frontend/layout/img/logos/1.png"  alt=""/>
		</a>
	</div>
	<h1>You have no permission to access.</h1>

	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	
	<script>
		jQuery(document).ready(function() {     
		  	Metronic.init();
	       	$.backstretch([
	        "<?php echo base_url(); ?>assets/admin/layout4/img/bg/1.jpg",
	        "<?php echo base_url(); ?>assets/admin/layout4/img/bg/2.jpg",
	        "<?php echo base_url(); ?>assets/admin/layout4/img/bg/3.jpg"
	        ], {
		          fade: 1000,
		          duration: 8000
		    });
		});	
	</script>
</body>
<!-- END BODY -->
</html>