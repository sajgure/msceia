<form action="gcc_tbc_edit_status1" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
	<div class="form-body">
		<div class="row">
	        <input type="hidden" name="institute_id" value="<?php echo (isset($order_data->institute_id) && !empty($order_data->institute_id))?$order_data->institute_id:'';?>">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Status <span class="required">*</span></label>
					<select class="form-control order_status select2me" name="order_status" data-placeholder="Choose a Category" tabindex="1">
                        <option value="">Select</option> 
                        <option value="PENDING" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='PENDING')?'selected=selected':''?>>PENDING</option>
                        <option value="ACCEPTED" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='ACCEPTED')?'selected=selected':''?>>ACCEPTED</option>
                        <option value="PACKED" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='PACKED')?'selected=selected':''?>>PACKED</option>
                        <option value="DISPATCHED" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='DISPATCHED')?'selected=selected':''?>>DISPATCHED</option>
                        <option value="DELIVERED" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='DELIVERED')?'selected=selected':''?>>DELIVERED</option>
                        <option value="CANCELLED" <?php echo (isset($order_data->order_status) && !empty($order_data->order_status) && $order_data->order_status=='CANCELLED')?'selected=selected':''?>>CANCELLED</option>
                    </select>
				</div>
				<div class="courier" style="<?php if($order_data){ } else {echo "display: none;";} ?>">
					<div class="form-group">
						<label class="control-label">Send By <span class="required">*</span></label>
						<select class="form-control send_by select2me" name="send_by" data-placeholder="Choose a Category" tabindex="1">
	                        <option value="">Select</option> 
	                        <option value="Indian Post" <?php echo (isset($order_data->send_by) && !empty($order_data->send_by) && $order_data->send_by=='Indian Post')?'selected=selected':''?>>Indian Post</option>
	                        <option value="ST Bus Post" <?php echo (isset($order_data->send_by) && !empty($order_data->send_by) && $order_data->send_by=='ST Bus Post')?'selected=selected':''?>>ST Bus Post</option>
	                        <option value="Other" <?php echo (isset($order_data->send_by) && !empty($order_data->send_by) && $order_data->send_by=='Other')?'selected=selected':''?>>Other</option>
	                    </select>
					</div>
					<div class="form-group partner" style="display: none;">
						<label class="control-label">Courier Partner <span class="required" aria-required="true">*</span></label>
	                    <div class="input-icon right">
	                        <i class="fa"></i>
	                        <input type="text" class="form-control" name="courier_partner" id="courier_partner" value="<?php echo (isset($order_data->courier_partner) && !empty($order_data->courier_partner))?$order_data->courier_partner:'';?>" placeholder="Tracking ID"/>
	                    </div>
					</div>
					<div class="form-group">
	                    <label class="control-label">Tracking ID <span class="required" aria-required="true">*</span></label>
	                    <div class="input-icon right">
	                        <i class="fa"></i>
	                        <input type="text" class="form-control" name="tracking_id" id="tracking_id" value="<?php echo (isset($order_data->tracking_id) && !empty($order_data->tracking_id))?$order_data->tracking_id:'';?>" placeholder="Tracking ID"/>
	                    </div>
	                </div>
	            </div>
			</div>			
            <div class="col-md-6">                
                <div class="form-group">	
					<label class="control-label">Comment Releted To Order <span class="required">*</span></label>
					<textarea class="form-control" name="order_comment" placeholder="Order Comment" rows="8"><?php echo (isset($order_data->order_comment) && !empty($order_data->order_comment))?$order_data->order_comment:''; ?></textarea>
				</div>
            </div>
		</div>
	</div>
</form>

<script>
    $(document).on('change','.send_by',function(){
    	var send_by = $('.send_by').select2('val'); 
    	if (send_by=='Other') {
    		$('.partner').css('display','block');
    	}
    	else
    	{
    		$('.partner').css('display','none');
    	}
    });
    $(document).on('change','.order_status',function(){
    	var order_status = $('.order_status').select2('val'); 
    	if (order_status=='PACKED') {
    		$('.courier').css('display','none');
    	}
    	else
    	{
    		$('.courier').css('display','block');
    	}
    });
</script>