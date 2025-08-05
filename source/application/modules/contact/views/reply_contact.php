<form action="sent_message" enctype="multipart/form-data" id="popup_save"  method="post" class="horizontal-form">
    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Email Id<span class="required" aria-required="true" >*</span></label>
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" data-target="#testdata" data-url="get_roll_Data" class="form-control input-sm" name="email" value="<?php echo(isset($contact_data->email) && !empty($contact_data->email))?$contact_data->email:''?>" placeholder="Enter Barcode">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Contact Number<span class="required" aria-required="true" >*</span></label>
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" data-target="#testdata" data-url="get_roll_Data" class="form-control input-sm " name="mobile_number" value="<?php echo(isset($contact_data->mobile_number) && !empty($contact_data->mobile_number))?$contact_data->mobile_number:''?>" placeholder="Enter Barcode">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Message<span class="required" aria-required="true" >*</span></label>
                    <textarea class="form-control" rows="3" name="message" maxlength="120"><?php echo(isset($contact_data->message) && !empty($contact_data->message))?$contact_data->message:''?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Replay<span class="required" aria-required="true" >*</span></label>
                    <textarea class="form-control" rows="3" name="reply" maxlength="120"><?php echo(isset($contact_data->reply) && !empty($contact_data->reply))?$contact_data->reply:''?></textarea>
                </div>
            </div>
        </div>
    </div>
</form>