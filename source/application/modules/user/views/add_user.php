<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Add User | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url();?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
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
                <div class="row" style="">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption font-blue">
                                    <i class="font-blue" ></i>
                                    <i class="fa fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                    <span class="caption-subject bold uppercase"> User</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="user" id="user" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>" data-redirect="user-list" class="horizontal-form" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Role Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon">   
                                                        <select class="form-control select2" name="role_id">
                                                            <option value="">Select Role</option>
                                                            <?php if(isset($role_data) && !empty($role_data))
                                                            {
                                                                foreach ($role_data as $key)
                                                                { ?>
                                                                    <option value="<?php echo(isset($key->role_id) && !empty($key->role_id))?$key->role_id:'';?>" <?php echo(isset($user_data->role_id) && !empty($user_data->role_id) && ($user_data->role_id==$key->role_id))?'selected="selected"':'';?> ><?php echo(isset($key->role_name) && !empty($key->role_name))?$key->role_name:'';?></option>
                                                                <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Full Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right"><i class="fa"></i>
                                                        <input type="text" class="form-control " name="fullname" value="<?php echo(isset($user_data->fullname) && !empty($user_data->fullname))?$user_data->fullname:'';?>" placeholder="Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right"><i class="fa"></i>
                                                        <input type="text" class="form-control " name="email" value="<?php echo(isset($user_data->email) && !empty($user_data->email))?$user_data->email:'';?>"placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right"><i class="fa"></i>
                                                        <input type="text" class="form-control " name="mobile" value="<?php echo(isset($user_data->mobile) && !empty($user_data->mobile))?$user_data->mobile:'';?>"placeholder="Mobile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">UserName<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right"><i class="fa"></i>
                                                        <input type="text" class="form-control " name="username" value="<?php echo(isset($user_data->username) && !empty($user_data->username))?$user_data->username:'';?>"placeholder="UserName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right"><i class="fa"></i>
                                                        <input type="password" class="form-control " name="password" value="<?php echo(isset($user_data->password) && !empty($user_data->password))?$user_data->password:'';?>"placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                <div class="input-icon right"><i class="fa"></i>
                                                    <input type="text" class="form-control " name="city" value="<?php echo(isset($user_data->city) && !empty($user_data->city))?$user_data->city:'';?>"placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Address<span class="require" aria-required="true" style="color:red">*</span></label>
                                                <div class="input-icon right"><i class="fa"></i>
                                                    <input type="text" class="form-control " name="address" value="<?php echo(isset($user_data->address) && !empty($user_data->address))?$user_data->address:'';?>"placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Pincode<span class="require" aria-required="true" style="color:red">*</span></label>
                                                <div class="input-icon right"><i class="fa"></i>
                                                    <input type="text" class="form-control " name="pincode" value="<?php echo(isset($user_data->pincode) && !empty($user_data->pincode))?$user_data->pincode:'';?>"placeholder="Pincode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Upload Image </label><br>
                                                <div class="uploaded_image" style="padding-bottom: 10px !important;">
                                                    <img src="<?php echo base_url(); ?>uploads/user_photo/<?php echo(isset($user_data->user_image) && !empty($user_data->user_image))?$user_data->user_image:'default.png';?>" style="height: 150px; width: 200px;" class="img-thumbnail"/>
                                                </div>
                                                <input type="file" name="file" id="file" class="upload_image" data-url="upload_user_image">
                                                <label for="file" class="upload_button" /><?php echo(isset($user_data->user_image) && !empty($user_data->user_image))?'Change':'Select File';?></label>
                                                <input type="hidden" name="user_image" class="file_name" value="<?php echo(isset($user_data->user_image) && !empty($user_data->user_image))?$user_data->user_image:'';?>">
                                               <!--  <span class="process"></span> -->
                                                <span class="img_error"></span>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?php echo(isset($user_data->user_id) && !empty($user_data->user_id))?$user_data->user_id:'';?>">
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <a href="<?php echo base_url();?>user-list"class="btn btn-primary"type="button" 
                                        > <i class=" icon-arrow-left "></i> Back</a>
                                        <div class="pull-right">  
                                            <button type="button" class="btn btn-danger clearData"> <i class="icon-close"></i> Clear </button>
                                            <button type="submit" class="btn btn-success common_save" data-pk="user_id" rel="<?php echo(isset($user_data->user_id) && !empty($user_data->user_id))?$user_data->user_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($user_data->user_id) && !empty($user_data->user_id))?'Update':'Submit';?> </button>
                                        </div>
                                    </div>  
                                </form>
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
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
    </script>
</body>
</html>