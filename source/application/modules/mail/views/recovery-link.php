<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<P> 
	Recovery Link:
	<a href="<?php echo base_url()?>password-recovery-link/<?php echo isset($hash)?$hash:'' ?>">
		<?php echo base_url()?>password-recovery-link/<?php echo isset($hash)?$hash:'' ?>	
	</a>
</P>
</body>
</html>