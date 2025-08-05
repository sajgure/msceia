<div class="panel-group accordion scrollable prvlege" id="accordion3" >
	<?php if(isset($menu_data) && !empty($menu_data))
	{
		$k=0;
		foreach ($menu_data as $key ) {
			$menu=$key['menu'];
			$submenu=$key['submenu'];
			$k++;?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_<?php echo $k;?>">
					<?php echo (isset($menu->menu_name) && !empty($menu->menu_name))?$menu->menu_name:''; ?> </a>
					</h4>
				</div>
				<div id="collapse_<?php echo $k;?>" class="panel-collapse in">
					<div class="panel-body">
						 <div class="portlet-body">
							<div class="task-content">
								<div style="height: 100px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
									<?php if(isset($submenu) && !empty($submenu)){ 
										$i=0;
										foreach ($submenu as $row)
										{ 
											if($i%4==0){?> 
												<div class="task-checkbox col-md-12">
													<?php }
													$i++; ?>
														<div class="col-md-3">
															<input type="checkbox" <?php echo (isset($row->prev) && !empty($row->prev) && $row->prev=='Y' )?'checked="checked"':''; ?> class="liChild" value="<?php echo (isset($row->submenu_id) && !empty($row->submenu_id))?$row->submenu_id:''; ?>" name="submenu[]"/>
															<span class="task-title-sp"><?php echo (isset($row->submenu_name) && !empty($row->submenu_name))?$row->submenu_name:''; ?> </span>
														</div>	
													<?php if($i%4==0){?>
												</div>
											<?php } ?>
										<?php }
										if(count($submenu)%4 != 0)
										{
											echo "</div>";
										}
									} ?>
									<div class="task-title col-md-12">
										<hr/>
										<span style="float:left;">
											<input type="checkbox" class="category_select_all"> Select All
										</span>
										<span style="float:right;">
											<button class="btn btn-xs green common_save" type="submit">Save</button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php }
	} ?>
</div>