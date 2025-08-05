<?php 
	if (isset($event_single_record)&&!empty($event_single_record))
	{ ?>
	<div class="row">
    		<div class="col-md-12">
				<h3 class="heading">Images And Videos</h3>
				<div id="large_grid" class="wmk_grid">
			        <ul>
			        <?php 
        				for ($i=0; $i < sizeof($event_single_record['event_images']); $i++)
        			{ ?>
			           <li class="thumbnail">
			                <a href="<?php echo base_url().'uploads/'.$event_single_record['event_images'][$i]->system_file_name?>" title="<?php echo $event_single_record['event_images'][$i]->user_file_name?>">
								<img src="<?php echo base_url().'uploads/thumbnail/255_255/'.$event_single_record['event_images'][$i]->system_file_name?>" alt="">
							</a>
							<p>
			                    <a class="unlink_image " data-id="<?php echo $event_single_record['event_images'][$i]->media_id?>" data-hint="Remove"  href="<?php echo isset($ADMIN_URL_PREFIX)?$ADMIN_URL_PREFIX:''; ?>unlink_image"><span class="glyphicon glyphicon-trash"></span></a> 
			                    <span><?php echo $event_single_record['event_images'][$i]->user_file_name?></span>
			                </p>
			            </li>
		            <?php 
		            	}
		            ?>
					</ul>
			    </div>
    		</div>
		</div>
	<?php 
	}  
?>
