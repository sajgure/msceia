<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up | Msceia </title>
    <base href="<?php echo base_url(); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Maharashtra State Commerce Educational Institutes Association." name="description">
    <meta content="msceia,msceia.in,typing,Student" name="keywords">
    <meta content="msceia" name="author">
    <meta property="og:msceia.in" content="-CUSTOMER VALUE-">
    <meta property="og:Student" content="-CUSTOMER VALUE-">
    <meta property="og:Maharashtra State Commerce Educational Institutes Association." content="-CUSTOMER VALUE-">
    <meta property="og:webstt" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <meta property="og:msceia.in/Student" content="-CUSTOMER VALUE-">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/favicon.png">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    @media only screen and (max-width: 600px) {
        .header-img {
            width: 256px !important;
            ;
        }
    }
    
    .textarea {
        resize: none;
    }
    </style>
</head>
<!-- Head END -->
<!-- Body BEGIN -->

<body class="corporate">
    <!-- BEGIN Header -->
    <?php $this->load->view('site/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">संस्था नोंदणी</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-20">
                    <div class="col-md-12 col-sm-12">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption"> <i class="fa fa-gift"></i>संस्था नोंदणी </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <form action="institute" id="institute" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="index" method="post" enctype="multipart/form-data">
                                                <div class="form-body row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label">Institute Owner Photo </label><br>
                                                            <div class="uploaded_image" style="padding-bottom: 10px !important;">
                                                                <img src="<?php echo base_url(); ?>uploads/inst_owner_photos/default.png" style="height: 130px; width: 200px;" class="img-thumbnail"/>
                                                            </div>
                                                            <input type="file" name="file" id="file" class="upload_image" data-url="upload_institute_onwer_image">
                                                            <label for="file" class="upload_button" />Select File</label>
                                                            <input type="hidden" name="institute_owner_photo" class="file_name" value="">
                                                            <span class="img_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Institute Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="institute_name" class="form-control" placeholder="Institute Name" value="<?php echo (isset($user_data->institute_name) && !empty($user_data->institute_name))?$user_data->institute_name:'';?>" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Institute Code<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right">
                                                                         <i class="fa"></i>
                                                                        <input type="text" name="institute_code" class="form-control duplicate" placeholder="Institute Code" value="<?php echo (isset($user_data->institute_code) && !empty($user_data->institute_code))?$user_data->institute_code:'';?>" data-tbl="tbl_institute" data-p_key="institute_id" data-where="institute_code" rel="0" required >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Owner Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="institute_owner_name" class="form-control" placeholder="Owner Name" value="<?php echo (isset($user_data->institute_owner_name) && !empty($user_data->institute_owner_name))?$user_data->institute_owner_name:'';?>" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Owner Qualification<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="institute_owner_qualification" class="form-control" placeholder="Owner Qualification" value="<?php echo (isset($user_data->institute_owner_qualification) && !empty($user_data->institute_owner_qualification))?$user_data->institute_owner_qualification:'';?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Owner Date Of Birth<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right"> <i class="fa"></i>
                                                                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="0d" data-date-viewmode="years">
                                                                                <input type="text" name="institute_owner_dob" class="form-control" readonly="" placeholder="Date Of Birth"> <span class="input-group-btn">
                                                                            <button class="btn default" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                            </span> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Owner Age</label>
                                                                    <input type="text" name="owner_age" class="form-control" placeholder="Owner Age" value="<?php echo (isset($user_data->owner_age) && !empty($user_data->owner_age))?$user_data->owner_age:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Principal Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <input type="text" name="institute_principal_name" class="form-control" placeholder="Principal Name" value="<?php echo (isset($user_data->institute_principal_name) && !empty($user_data->institute_principal_name))?$user_data->institute_principal_name:'';?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Principal Qualification<span class="require" aria-required="true" style="color:red">*</span></label>
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="institute_principal_qualification" class="form-control" placeholder="Principal Qualification" value="<?php echo (isset($user_data->institute_principal_qualification) && !empty($user_data->institute_principal_qualification))?$user_data->institute_principal_qualification:'';?>" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Principal Age</label>
                                                                    <input type="text" name="principal_age" class="form-control" placeholder="Principal Age" value="<?php echo (isset($user_data->principal_age) && !empty($user_data->principal_age))?$user_data->principal_age:'';?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Contact No.<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="institute_contact" class="form-control" placeholder="Contact No." value="<?php echo (isset($user_data->institute_contact) && !empty($user_data->institute_contact))?$user_data->institute_contact:'';?>" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Alternate Contact No.</label>
                                                            <input type="text" name="institute_alternate_contact" class="form-control" placeholder="Alternate Contact No." value="<?php echo (isset($user_data->institute_alternate_contact) && !empty($user_data->institute_alternate_contact))?$user_data->institute_alternate_contact:'';?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Email Address<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="institute_mail" class="form-control" placeholder="Email Address" value="<?php echo (isset($user_data->institute_mail) && !empty($user_data->institute_mail))?$user_data->institute_mail:'';?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Inst. Registration Date<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="0d" data-date-viewmode="years">
                                                                <input type="text" name="institute_registration_date" class="form-control" readonly="" value="<?php echo (isset($user_data->institute_registration_date) && !empty($user_data->institute_registration_date))?date('d-m-Y',strtotime($user_data->institute_registration_date)):'';?>" placeholder="Inst. Registration Date">
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="control-label">Institute Address<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <textarea name="institute_address" class="form-control" placeholder=" Institute Address" rows="1" required><?php echo (isset($user_data->institute_address) && !empty($user_data->institute_address))?$user_data->institute_address:'';?></textarea >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">District<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon">
                                                                <select class="form-control select2me category" name="district_id" id="district_id" required="">
                                                                    <option value="">Select </option>
                                                                    <?php if(isset($district_data) && !empty($district_data))
                                                                        {
                                                                            foreach ($district_data as $key)
                                                                            {?>
                                                                                <option class="category" value="<?php echo (isset($key->district_id) && !empty($key->district_id))?$key->district_id:'';?>" <?php echo (isset($user_data->district_id) && !empty($user_data->district_id) && $user_data->district_id==$key->district_id)?'selected':'';?>>
                                                                                    <?php echo(isset($key->district_name) && !empty($key->district_name))?$key->district_name:'';?>
                                                                                </option>
                                                                            <?php }
                                                                        } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Taluka<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="institute_taluka" class="form-control" placeholder="Taluka" value="<?php echo (isset($user_data->institute_taluka) && !empty($user_data->institute_taluka))?$user_data->institute_taluka:'';?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Pincode<span class="require" aria-required="true" style="color:red">*</span></label>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="institute_pincode" class="form-control" placeholder="Pincode" value="<?php echo (isset($user_data->institute_pincode) && !empty($user_data->institute_pincode))?$user_data->institute_pincode:'';?>" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Nominee Name</label>
                                                            <input type="text" name="nominee_name" class="form-control" placeholder="Nominee Name" value="<?php echo (isset($user_data->nominee_name) && !empty($user_data->nominee_name))?$user_data->nominee_name:'';?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Nominee Age</label>
                                                            <input type="text" name="nominee_age" class="form-control" placeholder=" Nominee Age" value="<?php echo (isset($user_data->nominee_age) && !empty($user_data->nominee_age))?$user_data->nominee_age:'';?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Relation</label>
                                                            <input type="text" name="relation" class="form-control" placeholder=" Relation" value="<?php echo (isset($user_data->relation) && !empty($user_data->relation))?$user_data->relation:'';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions right">
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn blue common_save" data-pk="institute_id">Submit </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
            </div>
        </div>
        <!-- BEGIN PRE-FOOTER -->
        <?php $this->load->view('site/footer'); ?>
        <!-- END FOOTER -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init(); // init global framework features
            Layout.init();
            Layout.initUniform();
            Layout.initTwitter();
            ComponentsPickers.init();
            $('select').select2();
        });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>