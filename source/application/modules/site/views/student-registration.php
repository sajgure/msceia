<?php  
$institute_code = $this->session->userdata('institute_code');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Registration |
        <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?>
    </title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>" />
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/admin/layout/css/img-upload.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <style type="text/css">
    @media only screen and (max-width: 600px) {
        .header-img {
            width: 256px !important;
        }
        .mobile {
            margin-top: 10px !important;
            ;
        }
    }
    
    .textarea {
        resize: none;
    }
    
    .input-icon.right > i {
        right: 8px;
        float: right;
        top: -5px;
    }
    </style>
</head>
<body class="corporate">
    <?php $this->load->view('site/header'); ?>
        <!-- Header END -->
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="active">विद्यार्थी नोंदणी</li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption"> <i class="fa fa-gift"></i>विद्यार्थी नोंदणी </div>
                                            <div class="tools"> <span><strong>Note:-</strong>'*' Indicates Mandatory Fields.</span> </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <form action="student" id="student" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="institute-stud-list" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row name">
                                                        <input type="hidden" name="student_id" value="<?php echo(isset($student_data->student_id) && !empty($student_data->student_id))?$student_data->student_id:''?>">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Surname<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm surname" placeholder="Surname" name="surname" value="<?php echo(isset($student_data->surname) && !empty($student_data->surname))?$student_data->surname:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm first_name" placeholder="First Name" name="first_name" value="<?php echo(isset($student_data->first_name) && !empty($student_data->first_name))?$student_data->first_name:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Father's/Husband's Name</label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm father_name" placeholder="Father's/Husband's Name" name="father_name" value="<?php echo(isset($student_data->father_name) && !empty($student_data->father_name))?$student_data->father_name:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-bottom: 8px;"> <span class="write_name" style="color: #E6400C"><b>On Certificate Name Should Print Like This:</b> <span class="c_name"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Mother Name<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm" placeholder="Mother Name" name="mother_name" value="<?php echo(isset($student_data->mother_name) && !empty($student_data->mother_name))?$student_data->mother_name:'';?>"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <div class="radio-list">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="male" <?php echo(isset($student_data->gender) && !empty($student_data->gender) && $student_data->gender=='male')?'checked':'checked';?>> Male </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="female" <?php echo(isset($student_data->gender) && !empty($student_data->gender) && $student_data->gender=='female')?'checked':'';?>> Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Handicapped</label>
                                                                <div class="radio-list">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="handicapped" value="no" <?php echo(isset($student_data->handicapped) && !empty($student_data->handicapped) && $student_data->handicapped == 'no')?'checked':'checked';?>> No </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="handicapped" value="yes" <?php echo(isset($student_data->handicapped) && !empty($student_data->handicapped)  && $student_data->handicapped == 'yes' )?'checked':'';?>> Yes </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Telephone No</label>
                                                                <input type="text" class="form-control input-sm" placeholder="Telephone No" name="telephone_no" value="<?php echo(isset($student_data->telephone_no) && !empty($student_data->telephone_no))?$student_data->telephone_no:'';?>"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile No<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm" placeholder="Mobile No" name="mobile_no" value="<?php echo(isset($student_data->mobile_no) && !empty($student_data->mobile_no))?$student_data->mobile_no:'';?>" maxlength="10"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Email Address<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm" placeholder="Email Address" name="email" value="<?php echo(isset($student_data->email) && !empty($student_data->email))?$student_data->email:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Upload Image </label>
                                                                <br>
                                                                <div class="uploaded_image" style="padding-bottom: 10px !important;"> 
                                                                    <img src="<?php echo base_url(); ?>uploads/student_photos/<?php echo(isset($student_data->photo_sign) && !empty($student_data->photo_sign))?$student_data->photo_sign:'default.png';?>" style="height: 150px; width: 200px;" class="img-thumbnail" /> 
                                                                </div>
                                                                <input type="file" name="file" id="file" class="upload_image" data-url="upload_student_image">
                                                                <label for="file" class="upload_button" />
                                                                <?php echo(isset($student_data->image_upload) && !empty($student_data->image_upload))?'Change':'Select File';?> </label>
                                                                <input type="hidden" name="photo_sign" class="file_name" value="<?php echo(isset($student_data->photo_sign) && !empty($student_data->photo_sign))?$student_data->photo_sign:'';?>">
                                                                <span class="img_error"></span> 
                                                            </div>
                                                            <input type="hidden" name="student_id" value="<?php echo(isset($student_data->student_id) && !empty($student_data->student_id))?$student_data->student_id:'';?>">
                                                            <input type="hidden" name="institute_id" value="<?php echo $this->session->userdata('institute_id');?>">
                                                            <input type="hidden" name="student_status" value="<?php echo(isset($student_data->student_status) && !empty($student_data->student_status))?$student_data->student_status:'not_appear';?>">
                                                        </div> 
                                                        <div class="col-md-8 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Permanent Address<span class="require"  style="color:red">*</span></label>
                                                                <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                                    <textarea  class="form-control textarea" rows="3" name="permenant_address" placeholder="Permanent Address"><?php echo(isset($student_data->permenant_address) && !empty($student_data->permenant_address))?$student_data->permenant_address:'';?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Residential Address<span class="require"  style="color:red">*</span></label>
                                                                <div class="input-icon right">
                                                                    <i class="fa"></i>
                                                                    <textarea  class="form-control textarea" rows="3" name="residential_address" placeholder="Residential Address"><?php echo(isset($student_data->residential_address) && !empty($student_data->residential_address))?$student_data->residential_address:'';?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">District<span class="required">*</span></label>
                                                                <select class="form-control input-sm" id="" name="district_id">
                                                                    <option value="">Select District</option>
                                                                    <?php if(isset($district_data) && !empty($district_data)) 
                                                                    {
                                                                        foreach ($district_data as $key) 
                                                                        { ?>
                                                                            <option value="<?php echo (isset($key->district_id) && !empty($key->district_id))?$key->district_id:''; ?>" <?php echo(isset($student_data->district_id) && !empty($student_data->district_id) && $student_data->district_id==$key->district_id)?'selected="selected"':'';?>>
                                                                            <?php echo (isset($key->district_name) && !empty($key->district_name))?$key->district_name:''; ?>
                                                                            </option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">School/College Name<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm" placeholder="School/College Name" name="school_college_name" value="<?php echo(isset($student_data->school_college_name) && !empty($student_data->school_college_name))?$student_data->school_college_name:'';?>"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 ">
                                                            <div class="form-group">
                                                                <label class="control-label">Education Qualification<span class="required">*</span></label>
                                                                <select class="form-control input-sm" id="" name="qualification">
                                                                    <option value="">Select</option>
                                                                    <option value="8th" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='8th'))?'selected="selected"':''?>>8th</option>
                                                                    <option value="9th" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='9th'))?'selected="selected"':''?>>9th</option>
                                                                    <option value="10th" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='10th'))?'selected="selected"':''?>>10th</option>
                                                                    <option value="11th" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='11th'))?'selected="selected"':''?>>11th</option>
                                                                    <option value="12th" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='12th'))?'selected="selected"':''?>>12th</option>
                                                                    <optgroup label="Graduation">
                                                                        <option value="BA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BA'))?'selected="selected"':''?>>BA</option>
                                                                        <option value="BA-BL" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BA-BL'))?'selected="selected"':''?>>BA-BL</option>
                                                                        <option value="BAMS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BAMS'))?'selected="selected"':''?>>BAMS</option>
                                                                        <option value="BCA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BCA'))?'selected="selected"':''?>>BCA</option>
                                                                        <option value="BSC" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BSC'))?'selected="selected"':''?>>BSC</option>
                                                                        <option value="BD" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BD'))?'selected="selected"':''?>>BD</option>
                                                                        <option value="BE" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BE'))?'selected="selected"':''?>>BE</option>
                                                                        <option value="BED" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BED'))?'selected="selected"':''?>>BED</option>
                                                                        <option value="BHMS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BHMS'))?'selected="selected"':''?>>BHMS</option>
                                                                        <option value="B-PHARMA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='B-PHARMA'))?'selected="selected"':''?>>B-PHARMA</option>
                                                                        <option value="BCS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BCS'))?'selected="selected"':''?>>BCS</option>
                                                                        <option value="BCMS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BCMS'))?'selected="selected"':''?>>BCMS</option>
                                                                        <option value="B-TECH" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='B-TECH'))?'selected="selected"':''?>>B-TECH</option>
                                                                        <option value="BBA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BBA'))?'selected="selected"':''?>>BBA</option>
                                                                        <option value="BBM" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BBM'))?'selected="selected"':''?>>BBM</option>
                                                                        <option value="BCOM" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BCOM'))?'selected="selected"':''?>>BCOM</option>
                                                                        <option value="BDS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BDS'))?'selected="selected"':''?>>BDS</option>
                                                                        <option value="BSW" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='BSW'))?'selected="selected"':''?>>BSW</option>
                                                                        <option value="MBBS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MBBS'))?'selected="selected"':''?>>MBBS</option>
                                                                        <option value="LLB" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='LLB'))?'selected="selected"':''?>>LLB</option>
                                                                    </optgroup>
                                                                    <optgroup label="Post-Graduation">
                                                                        <option value="MA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MA'))?'selected="selected"':''?>>MA</option>
                                                                        <option value="MSC" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MSC'))?'selected="selected"':''?>>MSC</option>
                                                                        <option value="MCOM" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MCOM'))?'selected="selected"':''?>>MCOM</option>
                                                                        <option value="ME" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='ME'))?'selected="selected"':''?>>ME</option>
                                                                        <option value="M-TECH" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='M-TECH'))?'selected="selected"':''?>>M-TECH</option>
                                                                        <option value="LLM" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='LLM'))?'selected="selected"':''?>>LLM</option>
                                                                        <option value="MCA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MCA'))?'selected="selected"':''?>>MCA</option>
                                                                        <option value="MBA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MBA'))?'selected="selected"':''?>>MBA</option>
                                                                        <option value="M-PHARMA" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='M-PHARMA'))?'selected="selected"':''?>>M-PHARMA</option>
                                                                        <option value="MDS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MDS'))?'selected="selected"':''?>>MDS</option>
                                                                        <option value="MHMS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MHMS'))?'selected="selected"':''?>>MHMS</option>
                                                                        <option value="MAMS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MAMS'))?'selected="selected"':''?>>MAMS</option>
                                                                        <option value="MD" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MD'))?'selected="selected"':''?>>MD</option>
                                                                        <option value="MED" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MED'))?'selected="selected"':''?>>MED</option>
                                                                        <option value="MCS" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='MCS'))?'selected="selected"':''?>>MCS</option>
                                                                    </optgroup>
                                                                    <optgroup label="Other">
                                                                        <option value="Other" <?php echo (isset($student_data->qualification) && !empty($student_data->qualification) && ($student_data->qualification=='Other'))?'selected="selected"':''?>>Other</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Payment Type<span class="required">*</span></label>
                                                                <select class="form-control input-sm" id="" name="payment_type" style="<?php echo (isset($student_data->student_status) && !empty($student_data->student_status) && ($student_data->student_status=='payment'))?'pointer-events: none;':''?>" >
                                                                    <option value="">Select Payment Type</option>
                                                                    <!--<option value="75" <?php echo (isset($student_data->payment_type) && !empty($student_data->payment_type) && ($student_data->payment_type=='75'))?'selected="selected"':''?>>सराव रु 75</option>-->
                                                                    <option value="100" <?php echo (isset($student_data->payment_type) && !empty($student_data->payment_type) && ($student_data->payment_type=='100'))?'selected="selected"':''?>>सराव व ऑनलाईन प्रमाणपत्र रु 100</option>
                                                                    <option value="140" <?php echo (isset($student_data->payment_type) && !empty($student_data->payment_type) && ($student_data->payment_type=='140'))?'selected="selected"':''?>>सराव व ऑफलाईन प्रमाणपत्र रु 140</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Photo Identity<span class="required">*</span></label>
                                                                <select class="form-control input-sm" id="" name="photo_identity">
                                                                    <option value="Aadhar Card">Aadhar Card</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Aadhar No<span class="required">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <input type="text" class="form-control input-sm" placeholder="Aadhar No" name="aadhar_card_no" value="<?php echo(isset($student_data->aadhar_card_no) && !empty($student_data->aadhar_card_no))?$student_data->aadhar_card_no:'';?>" maxlength="12"> 
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label"> Date of Birth<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> 
                                                                    <i class="fa"></i>
                                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="0d" data-date-viewmode="years">
                                                                        <input type="text" name="date_of_birth" class="form-control input-sm" placeholder="Date of Birth" value="<?php echo(isset($student_data->date_of_birth) && !empty($student_data->date_of_birth))?date('d-m-Y',strtotime($student_data->date_of_birth)):'';?>"> 
                                                                            <span class="input-group-btn">
                                                                            <button class="btn default input-sm" type="button">
                                                                              <i class="fa fa-calendar"></i>
                                                                          </button>
                                                                        </span> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label"> Admission Date<span class="require" style="color:red">*</span></label>
                                                                <div class="input-icon right"> <i class="fa"></i>
                                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="0d" data-date-viewmode="years">
                                                                        <input type="text" name="date_of_admission" class="form-control  input-sm" placeholder="Admission Date" value="<?php echo(isset($student_data->date_of_admission) && !empty($student_data->date_of_admission))?date('d-m-Y',strtotime($student_data->date_of_admission)):'';?>"> 
                                                                        <span class="input-group-btn">
                                                                            <button class="btn default  input-sm" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                        </span> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Select Batch<span class="require" style="color:red">*</span></label>
                                                                <select class="form-control input-sm" name="batch_id" style="<?php echo (isset($student_data->student_status) && !empty($student_data->student_status))?'':''?>" >
                                                                    <option value="">Select Batch</option>
                                                                    <?php if(isset($batch_data) && !empty($batch_data)) 
                                                                    
                                                                    {
                                                                        foreach ($batch_data as $key) 
                                                                        { ?>
                                                                            <option value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:''; ?>" <?php echo(isset($student_data->batch_id) && !empty($student_data->batch_id) && $student_data->batch_id==$key->batch_id)?'selected="selected"':'';?>>
                                                                            <?php echo (isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:''; ?>
                                                                            </option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Exam Course<span class="required">*</span></label>
                                                                <?php if(isset($student_data->student_id) && !empty($student_data->student_id))
                                                                { ?>
                                                                <select class="form-control" id="course_master_id" name="course_master_id">
                                                                    <?php } 
                                                                    else
                                                                    { ?>
                                                                    <select class="form-control" id="course_master_id" name="course_master_id[]" multiple>
                                                                        <?php }?>
                                                                        <?php if(isset($course_master_data) && !empty($course_master_data))
                                                                            {
                                                                                foreach ($course_master_data as $key) 
                                                                                {?>
                                                                                <option value="<?php echo $key->course_master_id?>" <?php echo (isset($student_data->course_master_id) && !empty($student_data->course_master_id) && ($student_data->course_master_id==$key->course_master_id))?'selected="selected"':''?>>
                                                                                <?php echo $key->course_name;?>
                                                                                </option>
                                                                                <?php }     
                                                                            }?>
                                                                        </select>
                                                                        <?php if(!isset($student_data->student_id) && empty($student_data->student_id))
                                                                    { ?> 
                                                                        <span class="help-block" style="color:#d44;">Note: You can select multiple course. </span>
                                                                    <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions right">
                                                    <button type="button" class="btn btn-danger clearData">Cancel</button>
                                                    <button type="submit" class="btn blue student_save" rel="<?php echo(isset($student_data->student_id) && !empty($student_data->student_id))?$student_data->student_id:''?>" data-pk="student_id">
                                                        <?php if(isset($student_data->student_id) && !empty($student_data->student_id)) {echo 'Update';} else { echo 'Save'; }?>
                                                    </button>
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
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init(); 
            Layout.init();
            Layout.initUniform();
            Layout.initTwitter();
            ComponentsPickers.init();
            $('select').select2();
            var slname = $('.surname').val();
            var sname = $('.first_name').val();
            var smname = $('.father_name').val();
            if(slname != "" || sname != "" || smname != "") {
                var full_name = slname + " " + sname + " " + smname;
                $('.c_name').html(full_name);
            }
            var full_name = slname + " " + sname + " " + smname;
            $('.c_name').html(full_name);
        });
        $(document).on('keyup', '.name', function(e) {
            var slname = $('.surname').val();
            var sname = $('.first_name').val();
            var smname = $('.father_name').val();
            var full_name = slname + " " + sname + " " + smname;
            $('.c_name').html(full_name);
        });
        </script>
</body>
</html>