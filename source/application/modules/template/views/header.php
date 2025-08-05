<?php if($this->authentication->chk_login()==false){ redirect('superadmin'); } ?> 

<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url(); ?>dashboard" style="width: 80%;">
			<img src="<?php echo (isset($logo) && !empty($logo))?$logo:'assets/site/assets/frontend/layout/img/logos/1.png'; ?>" alt="MSCEIA LOGO" style='width: 100%; margin-top: 21px;' class="logo-default" >
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>

		<div class="col-md-1"></div>
		<div class="page-actions" style="width:350px;"> 
			<?php $this->load->model('template/template_model'); $subMenu = $this->template_model->submenu_link(); ?>           
            <select class="form-control select2me"onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select Menu</option>
                 <?php if(isset($subMenu) && !empty($subMenu)){
                 	foreach ($subMenu as $key) {
                  ?> 
                  	<a><option value="<?= $key->action ?>"><?= $key->submenu_name ?></option></a>
                 <?php } } ?>
            </select>         
        </div>

		<div class="page-top">
			
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<?php $this->load->model('template/template_model'); $header = $this->template_model->header_counters(); ?>
					
					<li class="dropdown " style="margin: 0px 5px;">
						<a href="javascript:void(0);" class="dropdown-toggle" >
						<i class="fa fa-graduation-cap "><h6 style="margin: 5px 0px 0px;"> Result </h6></i>
						<span class="badge badge-danger" style="margin: -64px 0 0 0;"><?php echo(isset($header->result) && !empty($header->result))?$header->result:'0';?></span>
						</a>
						<ul > </ul>
					</li>
					<li class="dropdown " style="margin: 0px 5px;">
						<a href="javascript:void(0);" class="dropdown-toggle" >
						<i class="icon-like"><h6 style="margin: 5px 0px 0px;"> Paid </h6></i>
						<span class="badge badge-danger" style="margin: -64px 0 0 0;"><?php echo(isset($header->paid) && !empty($header->paid))?$header->paid:'0';?></span>
						</a>
						<ul > </ul>
					</li>
					<li class="dropdown " style="margin: 0px 5px;">
						<a href="javascript:void(0);" class="dropdown-toggle" >
						<i class="icon-dislike"><h6 style="margin: 5px 0px 0px -4px;"> UnPaid </h6></i>
						<span class="badge badge-danger" style="margin: -64px 0 0 0;"><?php echo(isset($header->unpaid) && !empty($header->unpaid))?$header->unpaid:'0';?></span>
						</a>
						<ul > </ul>
					</li>
					<li class="dropdown " style="margin: 0px 5px;">
						<a href="javascript:void(0);" class="dropdown-toggle" >
						<i class="icon-user"><h6 style="margin: 5px 0px 0px;"> Total </h6></i>
						<span class="badge badge-danger" style="margin: -64px 0 0 0;"><?php echo(isset($header->total) && !empty($header->total))?$header->total:'0';?></span>
						</a>
						<ul> </ul>
					</li>
					<li class="dropdown " style="margin: 0px 5px;">
						<a href="javascript:void(0);" class="" >
						<ul>Rs. 140/- : <?php echo(isset($header->Gold) && !empty($header->Gold))?$header->Gold:'0';?></ul>
						<ul>Rs. 100/- : <?php echo(isset($header->Silver) && !empty($header->Silver))?$header->Silver:'0';?></ul>
						<ul>Rs. 75/-    : <?php echo(isset($header->Bronz) && !empty($header->Bronz))?$header->Bronz:'0';?></ul>
						</a>
					</li>
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						<?php
						$username=$this->session->userdata('username'); echo $username; ?> </span>
						<img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/admin/layout4/img/avatar9.jpg"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<!-- <li>
								<a href="<?php echo base_url();?>dashboard">
								<i class="icon-user"></i> My Profile </a>
							</li>
							<li class="divider">
							</li> -->
							<li>
								<a href="<?php echo base_url(); ?>logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
							<li>
								<a href="<?php echo base_url();?>db_backup">
								<i class="icon-user"></i> DB backup </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>