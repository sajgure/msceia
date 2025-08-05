<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>GCC TBC Book Product | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
    <?php $this->load->view('template/header');?>
    <div class="clearfix">
    </div>
    <div class="page-container">
        <?php $this->load->view('template/sidebar');?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="portlet-body">
                 <div class="row" style="">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption font-blue">
                                    <i class="fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                    <span class="caption-subject bold uppercase"> GCC TBC Book Product </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="gcc-tbc-book-product" id="gcc-tbc-book-product" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="gcc-tbc-book-product-list" class="horizontal-form" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label ">Product Name<span class="required">*</span></label>
                                                    <div class="input-icon strikethrough right">
                                                        <i class="fa"></i>
                                                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="product Name" value="<?php echo (isset($gcc_tbc_book_data->product_name) && !empty($gcc_tbc_book_data->product_name))?$gcc_tbc_book_data->product_name:''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Topics<span class="required">*</span></label><br>
                                                    <div class="input-icon">
                                                        <select class="form-control select2me" name="category_id">
                                                            <option value="">Select Topics</option>
                                                            <?php if(isset($category_data) && !empty($category_data)) {
                                                                foreach ($category_data as $key)
                                                                { ?>
                                                                    <option value="<?php echo(isset($key->category_id) && !empty($key->category_id))?$key->category_id:'';?>" <?php echo(isset($gcc_tbc_book_data->category_id) && !empty($gcc_tbc_book_data->category_id) && ($gcc_tbc_book_data->category_id==$key->category_id))?'selected="selected"':'';?>><?php echo(isset($key->category_name) && !empty($key->category_name))?$key->category_name:'';?></option>
                                                                <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Short Description<span class="required" aria-required="true">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" value="<?php echo(isset($gcc_tbc_book_data->short_description) && !empty($gcc_tbc_book_data->short_description))?$gcc_tbc_book_data->short_description:''?>" name="short_description" class="form-control" placeholder="Short Description" maxlength="120">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Delivery Information</label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" value="<?php echo(isset($gcc_tbc_book_data->delivery_information) && !empty($gcc_tbc_book_data->delivery_information))?$gcc_tbc_book_data->delivery_information:''?>" name="delivery_information" class="form-control" placeholder="Delivery Information" maxlength="120">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label ">Product Price<span class="required" >*</span></label>
                                                    <div class="input-icon input-group right">
                                                        <i class="fa"></i>
                                                        <input type="text" id="product_price" name="product_price"  class="form-control discount" id="product_price" placeholder="product price " value="<?php echo (isset($gcc_tbc_book_data->product_price) && !empty($gcc_tbc_book_data->product_price))?$gcc_tbc_book_data->product_price:''; ?>">
                                                        <span class="input-group-addon">
                                                        <i class="fa "><b>Rs</b></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Discount (%)</label>
                                                    <div class="input-icon input-group right">    <i class="fa"></i>
                                                        <input type="text" value="<?php echo(isset($gcc_tbc_book_data->product_discount) && !empty($gcc_tbc_book_data->product_discount))?$gcc_tbc_book_data->product_discount:'0'?>" name="product_discount" class="form-control discount" id="discount" placeholder="Discount (%)">
                                                        <span class="input-group-addon">
                                                        <i class="fa "><b>%</b></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Selling Price<span class="required" >*</span></label>
                                                    <div class="input-icon input-group right">    <i class="fa"></i>
                                                        <input type="text" readonly value="<?php echo(isset($gcc_tbc_book_data->selling_prices) && !empty($gcc_tbc_book_data->selling_prices))?$gcc_tbc_book_data->selling_prices:''?>" name="selling_prices" class="form-control " id="selling_price" placeholder="Selling Prices">
                                                        <span class="input-group-addon">
                                                        <i class="fa "><b>Rs</b></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label">Product Description <span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <textarea type="text" name="product_description" rows="4" cols="50" id="product_description" class="form-control summernote SummernoteText" ><?php echo (isset($gcc_tbc_book_data->product_description) && !empty($gcc_tbc_book_data->product_description))?$gcc_tbc_book_data->product_description:''?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Upload Image </label><br>
                                                    <div class="uploaded_image" style="padding-bottom: 10px !important;">
                                                        <img src="<?php echo base_url(); ?>uploads/gcc_tbc_product_photos/<?php echo(isset($gcc_tbc_book_data->product_image) && !empty($gcc_tbc_book_data->product_image))?$gcc_tbc_book_data->product_image:'default.png';?>" style="height: 150px; width: 200px;" class="img-thumbnail"/>
                                                    </div>
                                                    <input type="file" name="file" id="file" class="upload_image" data-url="upload_gcc_tbc_book_image">
                                                    <label for="file" class="upload_button"/><?php echo(isset($gcc_tbc_book_data->product_image) && !empty($gcc_tbc_book_data->product_image))?'Change':'Select File';?></label>
                                                    <input type="hidden" name="product_image" class="file_name" value="<?php echo(isset($gcc_tbc_book_data->product_image) && !empty($gcc_tbc_book_data->product_image))?$gcc_tbc_book_data->product_image:'';?>">
                                                   <!--  <span class="process"></span> -->
                                                    <span class="img_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo(isset($gcc_tbc_book_data->product_id) && !empty($gcc_tbc_book_data->product_id))?$gcc_tbc_book_data->product_id:'';?>" name="product_id">
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo base_url();?>gcc-tbc-book-product-list" class="btn blue" style="float: left;">Back</a>
                                        <button type="button" class="btn btn-danger clearData1">Cancel</button>
                                        <button type="submit" class="btn green common_save" rel="<?php echo(isset($gcc_tbc_book_data->product_id) && !empty($gcc_tbc_book_data->product_id))?$gcc_tbc_book_data->product_id:''?>"><i class="fa fa-dot-circle-o"></i> <?php echo(isset($gcc_tbc_book_data->product_id) && !empty($gcc_tbc_book_data->product_id))?'Update':'Save';?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer');?>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/summernote/summernote.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/js/fileinput.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
     $('.summernote').summernote({
        shortcuts: false,
        height: 150
    });
    </script>
</body>
</html>