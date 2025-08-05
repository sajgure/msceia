<div class="portlet-title row">
    <div class="caption font-blue col-md-6">
        <div class="col-md-6">
            <i class="fa fa-bars font-blue"></i>
            <span class="caption-subject bold uppercase">Institute Count</span>
        </div>
    </div>
    <div class="actions pull-right col-md-6" >
        <div class="col-md-4">
            <select class="form-control select2me input-sm id get_inst_list" data-url="get_table_inst_count" name="district_id" tabindex="1">
                <option value="0" class="caption-subject font-green-sharp bold uppercase">All District</option>
                <?php if(isset($district_data) && !empty($district_data))
                {
                    foreach ($district_data as $key) 
                    { ?>
                        <option value="<?php echo $key->district_id ?>" <?php echo (isset($key->district_id) && !empty($key->district_id) && ($key->district_id==$institute_id))?'selected="selected"':''?>><?php echo $key->district_name;?></option>
                    <?php }                                                         
                } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control select2me input-sm status get_inst_list" data-url="get_table_inst_count" >
                <option value="0">Paid Student</option>
                <option value="5" <?php echo (isset($status) && !empty($status) && ($status=='5'))?'selected="selected"':''?>>5</option>
                <option value="10" <?php echo (isset($status) && !empty($status) && ($status=='10'))?'selected="selected"':''?>>10</option>
                <option value="20" <?php echo (isset($status) && !empty($status) && ($status=='20'))?'selected="selected"':''?>>20</option>
                <option value="30" <?php echo (isset($status) && !empty($status) && ($status=='30'))?'selected="selected"':''?>>30</option>
                <option value="40" <?php echo (isset($status) && !empty($status) && ($status=='40'))?'selected="selected"':''?>>40</option>
                <option value="50" <?php echo (isset($status) && !empty($status) && ($status=='50'))?'selected="selected"':''?>>50</option>
                <option value="60" <?php echo (isset($status) && !empty($status) && ($status=='60'))?'selected="selected"':''?>>60</option>
                <option value="70" <?php echo (isset($status) && !empty($status) && ($status=='70'))?'selected="selected"':''?>>70</option>
                <option value="80" <?php echo (isset($status) && !empty($status) && ($status=='80'))?'selected="selected"':''?>>80</option>
                <option value="90" <?php echo (isset($status) && !empty($status) && ($status=='90'))?'selected="selected"':''?>>90</option>
                <option value="100" <?php echo (isset($status) && !empty($status) && ($status=='100'))?'selected="selected"':''?>>100</option>
            </select>
        </div>
        <div class="col-md-2">
            <a href="<?php echo base_url(); ?><?php echo $url1; ?>" class="btn btn-sm red" target="_new" title="Download PDF">PDF <i class="fa fa-file-pdf-o"></i> </a>
        </div>
        <div class="col-md-2" style="margin-left: -19px;">
            <a href="<?php echo base_url(); ?><?php echo $url2; ?>" class="btn btn-sm blue" title="Download Excel">Excel <i class="fa fa-file-excel-o"></i> </a>
        </div>
    </div>
</div>
<div class="portlet-body form">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover datatable" data-url="<?php echo $url; ?>">
                        <thead>
                            <tr class="heading">
                                <th class="font-blue-madison bold" style="text-align: center;">#</th>
                                <th class="font-blue-madison bold">Owner Photo</th>
                                <th class="font-blue-madison bold">Institute Details</th>
                                <th class="font-blue-madison bold">Contact Details</th>
                                <th class="font-blue-madison bold">Address</th>
                                <th class="font-blue-madison bold">Paid Student</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>