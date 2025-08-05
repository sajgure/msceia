    <?php 
 	$role_id = $this->session->userdata('role_id');
 	$current_menu= $this->uri->segment(1); 
 	$submenu_data= $this->common_model->selectDetailsWhr('tbl_submenu','action',$current_menu);
	$menu_id = (isset($submenu_data->menu_id) && !empty($submenu_data->menu_id))?$submenu_data->menu_id:'0';
 	$this->load->model('role/role_model');
?>

<div class="page-sidebar-wrapper">
	<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
		<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="start ">
				<a href="<?php echo base_url(); ?>dashboard">
				<i class="icon-home"></i>
				<span class="title">Dashboard</span>
				</a>
			</li>
			<?php $menu_data=$this->role_model->menu_list($role_id);
			$i=0;
			if(isset($menu_data) && !empty($menu_data))
			{
				foreach ($menu_data as $key)
				{ $i++;
					$menu=$key['menu'];
					$submenu=$key['submenu']; 
					
					if (isset($submenu) && !empty($submenu)) {
						usort($submenu, function ($a, $b) {
							return strcmp($a->submenu_name, $b->submenu_name);
						});
					}
					
					?>
					<li class="<?php if($menu->menu_id==$menu_id) { echo 'active'; } ?>">
						<a href="javascript:;">
						<i class="<?php echo(isset($menu->icon) && !empty($menu->icon))?$menu->icon:''; ?>"></i>
						<span class="title"><?php echo(isset($menu->menu_name) && !empty($menu->menu_name))?$menu->menu_name:''; ?></span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<?php if(isset($submenu) && !empty($submenu))
							{ $k=0;
								foreach ($submenu as $row)
								{ $k++;?>
									<li class="<?php echo ($current_menu==$row->action)?'active':''; ?>">
										<a href="<?php echo base_url();?><?php echo(isset($row->action) && !empty($row->action))?$row->action:'';?>">
										<i class="<?php echo (isset($row->icon) && !empty($row->icon))?$row->icon:''; ?>"></i>
										<?php echo(isset($row->submenu_name) && !empty($row->submenu_name))?$row->submenu_name:''; ?></a>
									</li>
								<?php }
							}?>
						</ul>
					</li>
				<?php }
			}?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>