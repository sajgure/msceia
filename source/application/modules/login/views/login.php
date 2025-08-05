<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Admin | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?></title>
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
	@media only screen and (max-width: 600px) {
  .logos{
    width: 230px !important;
  }
}
.logos{
	width: 29%;
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
	<div class="content">
		<form class="login-form" action="chk_login" id="login" method="post">
			<h3 class="form-title">Login to Account </h3>
			<div class="alert alert-danger alert-wrong-user" style="display:none;">
              	<span>Please enter the appropriate fields.</span>
	        </div> 

	        <div class="alert alert-success" style="display:none;">
	          	<span>Please wait, checking login...</span>
	        </div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<input type="text" placeholder="Username" name="username" autofocus="" class="form-control placeholder-no-fix"  />
					<input type="hidden" name="role_id" value="1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input type="password" placeholder="Password" name="password"  class="form-control placeholder-no-fix" autocomplete="off" />
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> Remember me </label>
				<button type="submit" class="btn blue pull-right chk_login">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
		</form>
	</div>
	<div class="copyright" style="color: #fff;">
		2020 &copy; MSCEIA
	</div>

	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/common.js" type="text/javascript"></script>
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