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
	<title>वाढीव संगणक सेटअप फॉर्म  | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url();?>">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="Metronic Shop UI description" name="description">
	<meta content="Metronic Shop UI keywords" name="keywords">
	<meta content="keenthemes" name="author">
	<meta property="og:site_name" content="-CUSTOMER VALUE-">
	<meta property="og:title" content="-CUSTOMER VALUE-">
	<meta property="og:description" content="-CUSTOMER VALUE-">
	<meta property="og:type" content="website">
	<meta property="og:image" content="-CUSTOMER VALUE-">
	<!-- link to image for socio -->
	<meta property="og:url" content="-CUSTOMER VALUE-">
	<!-- Fonts START -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles END -->
	<!-- Page level plugin styles START -->
	<link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
	<!-- Page level plugin styles END -->
	<!-- Theme styles START -->
	<link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
	<!-- Theme styles END -->
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
	<!-- Body BEGIN -->
	<body class="corporate">
		<div class="main">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url();?>">होम </a></li>
					<li class="active">वाढीव संगणक सेटअप फॉर्म </li>
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
						<a href="javascript:;" style="text-align: right; color: red;font-style: italic;">
							<h4 style="font-weight: 500;font-size: 16px;">टीप : सादर फॉर्म हा फक्त मराठी मधेच भरावा. </h4>
						</a>
						<div class="row">
							<div class="portlet box blue">
	                            <div class="portlet-title">
	                                <div class="caption"> <i class="fa fa-gift"></i>वाढीव संगणक सेटअप फॉर्म </div>
	                            </div>
	                            <div class="portlet-body form">
	                            	<form action="inspectionss" id="inspectionss" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>"  method="post" enctype="multipart/form-data">
	                            		<div class="form-body">
			                                <center>
		                                        <h5 style="font-weight: bold;">वाढीव संगणक सेटअपबाबत तपासणी अहवालाचा नमुना</h5>
		                                    </center>
		                                    <hr style="border: 1px solid #3E4D5C; margin-top: 2px; margin-bottom: 10px;"> <span style="font-weight: bold;"><div style="margin-bottom: -9px;">वाचा :  १) महाराष्ट्र शासन शालेय व क्रिडा विभाग शासन निर्णय क्र . –एसपीई – १०१२/ (१०८/१२) साशि-१, दि. ३१ ऑक्टोबर २०१३.</div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; २) महाराष्ट्र वाणिज्य विभाग शिक्षण संस्था (टंकलेखन, लघुलेखन, पदविका आणि संगणक टायपिंग अभ्यासक्रम) मान्यता आणि संचालन नियम १९९१<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; सुधारित नियमावली २०१४.</span>
		                                    <hr style="border: 1px solid #3E4D5C; margin-top: 2px; margin-bottom: 10px;">
		                                    <table width="100%">
		                                        <tbody>
		                                            <tr>
		                                                <td>१.</td>
		                                                <td width="40%;">शासनमान्य टंकलेखन/ लघुलेखन संस्थेचे नाव </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="inst_name" id="form_control_1" type="text" style="height: 30px; padding-left: 10px;" value="<?php echo(isset($insti_data->inst_name)&& !empty($insti_data->inst_name))?$insti_data->inst_name:'';?>"> </div>
		                                                        <input type="hidden" name="institute_id" value="<?php $id=$this->session->userdata('institute_id'); echo $id;?>">
		                                                        <input type="hidden" name="inspection_id" value="<?php echo(isset($insti_data->inspection_id)&& !empty($insti_data->inspection_id))?$insti_data->inspection_id:'';?>">
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">२.</td>
		                                                <td style="vertical-align: top;" width="40%;">संस्थेचा संपुर्ण पत्ता </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <textarea style="padding: 10px;" class="form-control input-sm" rows="2" name="inst_address"><?php echo(isset($insti_data->inst_address)&& !empty($insti_data->inst_address))?$insti_data->inst_address:'';?> </textarea>
		                                                    </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">३.</td>
		                                                <td style="vertical-align: top;" width="40%;">टंकलेखन संस्थेस प्रथम शासनमान्यता मिळालेचा दिनांक व संदर्भिय पत्र क्र </td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;जा.क्र. : &nbsp;&nbsp;
		                                                        <input class="form-control input-sm" name="inst_reg_no" id="form_control_1" type="text" style="height: 30px; width: 100px;" value="<?php echo(isset($insti_data->inst_reg_no)&& !empty($insti_data->inst_reg_no))?$insti_data->inst_reg_no:'';?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक :&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" name="inst_reg_date" id="form_control_1" type="text" placeholder="dd-mm-yyyy" style="height: 30px;  width: 80px;" value="<?php echo(isset($insti_data->inst_reg_date)&& !empty($insti_data->inst_reg_date))? date('d-m-Y', strtotime($insti_data->inst_reg_date)):'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">४.</td>
		                                                <td style="vertical-align: top;" width="40%;">संगणक टायपिंग अभ्यासक्रमास प्रथम शासन मान्यता मिळालेचा दिनांक व संदर्भिय पत्र क्र </td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;जा.क्र. : &nbsp;&nbsp;
		                                                        <input class="form-control input-sm" name="first_reg_no" id="form_control_1" type="text" style="height: 30px; width: 100px;" value="<?php echo(isset($insti_data->first_reg_no)&& !empty($insti_data->first_reg_no))?$insti_data->first_reg_no:'';?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक :&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" name="first_reg_date" id="form_control_1" type="text" placeholder="dd-mm-yyyy" style="height: 30px; width: 80px;" value="<?php echo(isset($insti_data->first_reg_date)&& !empty($insti_data->first_reg_date))? date('d-m-Y', strtotime($insti_data->first_reg_date)):'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">५.</td>
		                                                <td style="vertical-align: top;" width="40%;">संगणक अभ्यासक्रमातील कोणत्या विषयांना मान्यता मिळालेली आहे </td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; width: 100%;">
		                                                        <div class="rows">
		                                                            <div class="col-md-4">
		                                                                <input type="checkbox" name="mar_30" value="Y"  <?php echo (isset($insti_data->mar_30) && !empty($insti_data->mar_30) && ($insti_data->mar_30=='Y'))?'checked="checked"':''?>> &nbsp;&nbsp;मराठी ३० शप्रमी
		                                                                <br>
		                                                                <input type="checkbox" name="mar_40" value="Y"  <?php echo (isset($insti_data->mar_40) && !empty($insti_data->mar_40) && ($insti_data->mar_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;मराठी ४० शप्रमी
		                                                                <br> </div>
		                                                            <div class="col-md-4">
		                                                                <input type="checkbox" name="hin_30" value="Y"  <?php echo (isset($insti_data->hin_30) && !empty($insti_data->hin_30) && ($insti_data->hin_30=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;हिंदी ३० शप्रमी
		                                                                <br>
		                                                                <input type="checkbox" name="hin_40" value="Y"  <?php echo (isset($insti_data->hin_40) && !empty($insti_data->hin_40) && ($insti_data->hin_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;हिंदी ४० शप्रमी
		                                                                <br> </div>
		                                                            <div class="col-md-4">
		                                                                <input type="checkbox" name="eng_30" value="Y"  <?php echo (isset($insti_data->eng_30) && !empty($insti_data->eng_30) && ($insti_data->eng_30=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;इंग्रजी ३० शप्रमी
		                                                                <br>
		                                                                <input type="checkbox" name="eng_40" value="Y"  <?php echo (isset($insti_data->eng_40) && !empty($insti_data->eng_40) && ($insti_data->eng_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;इंग्रजी ४० शप्रमी
		                                                                <br> </div>
		                                                            <div class="col-md-12">
		                                                                <input type="checkbox" name="s_skill" value="Y"  <?php echo (isset($insti_data->s_skill) && !empty($insti_data->s_skill) && ($insti_data->s_skill=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;स्पेशल स्किल इन कम्प्युटर टामयपिंग फॉर इंस्ट्रक्टर्स (कालावधी ३ महीने) </div>
		                                                        </div>
		                                                    </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">६.</td>
		                                                <td style="vertical-align: top;" width="40%;">परिषदेचा संस्था नोदंणी क्रमांक व संस्था नोदंणी क्र. मिळालेचा दिनांक व संदर्भिय पत्र क्र </td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;दिनांक&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" name="reg_date" id="form_control_1" type="text" placeholder="dd-mm-yyyy" style="height: 30px; width: 80px;" value="<?php echo(isset($insti_data->reg_date)&& !empty($insti_data->reg_date))? date('d-m-Y', strtotime($insti_data->reg_date)):'';?>">&nbsp;&nbsp; संस्था नोंदणी क्र
		                                                        <input class="form-control input-sm" name="reg_no" id="form_control_1" type="text" style="height: 30px; width: 70px; text-align: center;" value="<?php echo(isset($insti_data->reg_no)&& !empty($insti_data->reg_no))?$insti_data->reg_no:'';?>">&nbsp;&nbsp; संदर्भिय पत्र क्र
		                                                        <input class="form-control input-sm" name="reg_no2" id="form_control_1" type="text" style="height: 30px; width: 70px; text-align: center;" value="<?php echo(isset($insti_data->reg_no2)&& !empty($insti_data->reg_no2))?$insti_data->reg_no2:'';?>"> .</div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>७.</td>
		                                                <td width="40%;">प्राचार्यांचे नाव </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="owner_name" id="form_control_1" type="text" style="height: 30px; padding-left: 10px;" value="<?php echo(isset($insti_data->owner_name)&& !empty($insti_data->owner_name))?$insti_data->owner_name:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>८.</td>
		                                                <td width="40%;">तपासणी अधिकाऱ्याचे नाव व पदनाम </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="officer_desc" id="form_control_1" type="text" style="height: 30px; padding-left: 10px;" value="<?php echo(isset($insti_data->officer_desc)&& !empty($insti_data->officer_desc))?$insti_data->officer_desc:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>९.</td>
		                                                <td width="40%;">तपासणी / भेट दिनांक व वेळ </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;दिनांक :&nbsp;&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" placeholder="dd-mm-yyyy" name="visite_date" id="form_control_1" type="text" style="height: 30px; width: 100px;" value="<?php echo(isset($insti_data->visite_date)&& !empty($insti_data->visite_date))? date('d-m-Y', strtotime($insti_data->visite_date)):'';?>"> &nbsp;&nbsp;वेळ :&nbsp;&nbsp;
		                                                        <!--<input type="text" class="form-control c-square c-theme timepicker timepicker-24" name="visite_time" style="width: 80px;" readonly>-->
		                                                    </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>१०.</td>
		                                                <td colspan="2">आवश्यक भौतिक व अन्य सुविधेचा तपशील (तक्त्यात संख्या लिहा) </td>
		                                                <td>:</td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                    <table width="100%" border="1" style="margin-top: 9px;">
		                                        <tbody>
		                                            <tr>
		                                                <td style="text-align: center; font-weight: bold; padding: 2px;">अ.क्र.</td>
		                                                <td style="text-align: center; font-weight: bold; padding: 2px;">सामग्री / सुविधा</td>
		                                                <td style="text-align: center; font-weight: bold; padding: 2px;">यापूर्वीची उपलब्ध सामग्री / सुवीधा</td>
		                                                <td style="text-align: center; font-weight: bold; padding: 2px;">वाढीव सामग्री / सुवीधा</td>
		                                                <td style="text-align: center; font-weight: bold; padding: 2px;">शेरा (पुरेसे आहेत किंवा नाहीत ) </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">१.</td>
		                                                <td style="padding-left: 5px;"> संगणक संच (सर्व्हर)</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="server_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->server_before)&& !empty($insti_data->server_before))?$insti_data->server_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="server_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->server_after)&& !empty($insti_data->server_after))?$insti_data->server_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="server_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->server_remark)&& !empty($insti_data->server_remark))?$insti_data->server_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">२.</td>
		                                                <td style="padding-left: 5px;"> संगणक संच (क्लायंट)</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="client_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->client_before)&& !empty($insti_data->client_before))?$insti_data->client_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="client_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->client_after)&& !empty($insti_data->client_after))?$insti_data->client_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="client_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->client_remark)&& !empty($insti_data->client_remark))?$insti_data->client_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;vertical-align: top;">३.</td>
		                                                <td style="padding-left: 5px;vertical-align: top;"> स्कॅनर</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="scanner_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->scanner_before)&& !empty($insti_data->scanner_before))?$insti_data->scanner_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="scanner_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->scanner_after)&& !empty($insti_data->scanner_after))?$insti_data->scanner_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="scanner_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->scanner_remark)&& !empty($insti_data->scanner_remark))?$insti_data->scanner_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">४.</td>
		                                                <td style="padding-left: 5px;"> लेजर / इंकजेट प्रिंटर</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="printer_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->printer_before)&& !empty($insti_data->printer_before))?$insti_data->printer_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="printer_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->printer_after)&& !empty($insti_data->printer_after))?$insti_data->printer_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="printer_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->printer_remark)&& !empty($insti_data->printer_remark))?$insti_data->printer_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">५.</td>
		                                                <td style="padding-left: 5px;"> खुर्च्या</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="chair_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->chair_before)&& !empty($insti_data->chair_before))?$insti_data->chair_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="chair_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->chair_after)&& !empty($insti_data->chair_after))?$insti_data->chair_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="chair_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->chair_remark)&& !empty($insti_data->chair_remark))?$insti_data->chair_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">६.</td>
		                                                <td style="padding-left: 5px;"> टेबल</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="table_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->table_before)&& !empty($insti_data->table_before))?$insti_data->table_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="table_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->table_after)&& !empty($insti_data->table_after))?$insti_data->table_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="table_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->table_remark)&& !empty($insti_data->table_remark))?$insti_data->table_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">७.</td>
		                                                <td style="padding-left: 5px;"> स्टुल्स</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="stool_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->stool_before)&& !empty($insti_data->stool_before))?$insti_data->stool_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="stool_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->stool_after)&& !empty($insti_data->stool_after))?$insti_data->stool_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="stool_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->stool_remark)&& !empty($insti_data->stool_remark))?$insti_data->stool_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">८.</td>
		                                                <td style="padding-left: 5px;"> कपाटे</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="cabinet_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->cabinet_before)&& !empty($insti_data->cabinet_before))?$insti_data->cabinet_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="cabinet_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->cabinet_after)&& !empty($insti_data->cabinet_after))?$insti_data->cabinet_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="cabinet_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->cabinet_remark)&& !empty($insti_data->cabinet_remark))?$insti_data->cabinet_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">९.</td>
		                                                <td style="padding-left: 5px;"> रॅक्स</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="rack_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->rack_before)&& !empty($insti_data->rack_before))?$insti_data->rack_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="rack_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->rack_after)&& !empty($insti_data->rack_after))?$insti_data->rack_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="rack_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->rack_remark)&& !empty($insti_data->rack_remark))?$insti_data->rack_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="text-align: center;">१०.</td>
		                                                <td style="padding-left: 5px;"> इतर साहीत्य</td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="other_before" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->other_before)&& !empty($insti_data->other_before))?$insti_data->other_before:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="other_after" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->other_after)&& !empty($insti_data->other_after))?$insti_data->other_after:'';?>"> </div>
		                                                </td>
		                                                <td style="padding-left: 5px;">
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input class="form-control input-sm" name="other_remark" id="form_control_1" type="text" style="height: 30px; text-align: center;" value="<?php echo(isset($insti_data->other_remark)&& !empty($insti_data->other_remark))?$insti_data->other_remark:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td colspan="5" style="text-align: center;padding: 5px;">अ.क्र. ६ मध्ये आवश्यक टेबल नसल्यास त्या टेबलांऐवजी संगणकास आवश्यक जागेएवढा डायस उपलब्ध आहे काय ? ते तपासावे. </td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                    <table style="margin-left: 40px; margin-top: 10px;" width="90%">
		                                        <tbody>
		                                            <tr>
		                                                <td>अ.</td>
		                                                <td width="45%;"> वाढीव संगणक सामग्री खरेदीच्या पावत्या आहेत का :</td>
		                                                <td>:</td>
		                                                <td> &nbsp;&nbsp;
		                                                    <!-- <input type="radio" name="agreement" value="Y" checked="" <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;होय&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
		                                                    <input type="radio" name="agreement" value="N" checked="" <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;नाही&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  -->
		                                                    <label class="radio-inline">
								                                <input type="radio" name="agreement" id="Y" value="Y" <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='Y'))?'checked="checked"':''?> > होय 
								                            </label>
								                            <label class="radio-inline">
								                                <input type="radio" name="agreement" id="N" value="N" <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='N'))?'checked="checked"':''?>> नाही
								                            </label>
		                                                </td>

		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">ब.</td>
		                                                <td style="vertical-align: top;" width="40%;"> पावती क्रमांक व दिनांक नमुद करा :</td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;१)&nbsp;क्रमांक :
		                                                        <input class="form-control input-sm" name="receipt1" id="form_control_1" type="text" style="height: 30px; padding-left:20px; width: 120px;" value="<?php echo(isset($insti_data->receipt1)&& !empty($insti_data->receipt1))?$insti_data->receipt1:'';?>"> &nbsp;&nbsp;दिनांक :&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" placeholder="dd-mm-yyyy" name="receipt1_date" id="form_control_1" type="text" style="height: 30px; width: 120px;" value="<?php echo(isset($insti_data->receipt1_date)&& !empty($insti_data->receipt1_date))?date('d-m-Y',strtotime($insti_data->receipt1_date)):'';?>"> </div>
		                                                    <br>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;२)&nbsp;क्रमांक :
		                                                        <input class="form-control input-sm" name="receipt2" id="form_control_1" type="text" style="height: 30px; padding-left:20px; width: 120px;" value="<?php echo(isset($insti_data->receipt2)&& !empty($insti_data->receipt2))?$insti_data->receipt2:'';?>"> &nbsp;&nbsp;दिनांक :&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" placeholder="dd-mm-yyyy" name="receipt2_date" id="form_control_1" type="text" style="height: 30px; width: 120px;" value="<?php echo(isset($insti_data->receipt2_date)&& !empty($insti_data->receipt2_date))?date('d-m-Y',strtotime($insti_data->receipt2_date)):'';?>"> </div>
		                                                    <br>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> &nbsp;&nbsp;३)&nbsp;क्रमांक :
		                                                        <input class="form-control input-sm" name="receipt3" id="form_control_1" type="text" style="height: 30px; padding-left:20px; width: 120px;" value="<?php echo(isset($insti_data->receipt3)&& !empty($insti_data->receipt3))?$insti_data->receipt3:'';?>"> &nbsp;&nbsp;दिनांक :&nbsp;&nbsp;
		                                                        <input class="form-control input-sm date_mask" placeholder="dd-mm-yyyy" name="receipt3_date" id="form_control_1" type="text" style="height: 30px; width: 120px;" value="<?php echo(isset($insti_data->receipt3_date)&& !empty($insti_data->receipt3_date))?date('d-m-Y',strtotime($insti_data->receipt3_date)):'';?>"> </div>
		                                                    <br> </td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                    <br>
		                                    <table width="100%">
		                                        <tbody>
		                                            <tr>
		                                                <td>११.</td>
		                                                <td>वाढीव सेटअप नुसार ब्रॉड बॅण्ड इंटरनेट कनेक्शन स्पीड आहे का ? :</td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input type="radio" name="internet" value="Y" <?php echo (isset($insti_data->internet) && !empty($insti_data->internet) && ($insti_data->internet=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;होय&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                                        <input type="radio" name="internet" value="N" <?php echo (isset($insti_data->internet) && !empty($insti_data->internet) && ($insti_data->internet=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;नाही&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>१२.</td>
		                                                <td>विज पुरवठा नसलेल्या वेळी पर्यायी सुविधा वाढवलेली आहे काय ? :</td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input type="radio" name="inverter" value="Y" <?php echo (isset($insti_data->inverter) && !empty($insti_data->inverter) && ($insti_data->inverter=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;होय&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                                        <input type="radio" name="inverter" value="N" <?php echo (isset($insti_data->inverter) && !empty($insti_data->inverter) && ($insti_data->inverter=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;नाही&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>१३.</td>
		                                                <td>वाढीव सेटअप नुसार संस्थेस जागा उपलब्ध आहे काय? :</td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input type="radio" name="area" value="Y" <?php echo (isset($insti_data->area) && !empty($insti_data->area) && ($insti_data->area=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;होय&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                                        <input type="radio" name="area" value="N" <?php echo (isset($insti_data->area) && !empty($insti_data->area) && ($insti_data->area=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;नाही&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>१४.</td>
		                                                <td> वाढीव सेटअप नुसार संस्थेने निदेशक वाढविले आहेत का ? :
		                                                    <br> (एका सेटअप मागे एक निदेशक आवश्यक आहे.) </td>
		                                                <td>:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
		                                                        <input type="radio" name="instructor" value="Y" <?php echo (isset($insti_data->instructor) && !empty($insti_data->instructor) && ($insti_data->instructor=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;होय&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                                        <input type="radio" name="instructor" value="N" <?php echo (isset($insti_data->instructor) && !empty($insti_data->instructor) && ($insti_data->instructor=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;नाही&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td style="vertical-align: top;">१५.</td>
		                                                <td style="vertical-align: top;" width="40%;"> नवीन / वाढीव निदेशकांची नांवे व त्यांची शैक्षणिक / व्यावसायिक पात्रता :</td>
		                                                <td style="vertical-align: top;">:</td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> १)&nbsp;
		                                                        <input class="form-control input-sm" name="instructor_qual1" id="form_control_1" type="text" style="height: 30px; padding-left:10px;" value="<?php echo(isset($insti_data->instructor_qual1)&& !empty($insti_data->instructor_qual1))?$insti_data->instructor_qual1:'';?>"> </div>
		                                                    <br>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> २)&nbsp;
		                                                        <input class="form-control input-sm" name="instructor_qual2" id="form_control_1" type="text" style="height: 30px; padding-left:10px;" value="<?php echo(isset($insti_data->instructor_qual2)&& !empty($insti_data->instructor_qual2))?$insti_data->instructor_qual2:'';?>"> </div>
		                                                    <br>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> ३)&nbsp;
		                                                        <input class="form-control input-sm" name="instructor_qual" id="form_control_1" type="text" style="height: 30px; padding-left:10px;" value="<?php echo(isset($insti_data->instructor_qual)&& !empty($insti_data->instructor_qual))?$insti_data->instructor_qual:'';?>"> </div>
		                                                    <br> </td>
		                                            </tr>
		                                            <tr>
		                                                <td>१६.</td>
		                                                <td> <b>तपासणी अधिका-याचे अभिप्राय : </b></td>
		                                                <td>:</td>
		                                                <td></td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                    <br>
		                                    <div class="form-group form-md-line-input">
		                                        <p style="margin: 10px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; सदर संस्थे ची मी / आम्ही समक्ष भेट देवून पाहणी केली आहे. सदर संस्थेस सध्या
		                                            <input class="form-control input-sm" name="setup_allow" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 50px; text-align: center;" value="<?php echo(isset($insti_data->setup_allow)&& !empty($insti_data->setup_allow))?$insti_data->setup_allow:'';?>"> सेटअप ची मान्यता आहे. या संस्थेने वाढीव
		                                            <input class="form-control input-sm" name="setup_done" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 50px; text-align: center;" value="<?php echo(isset($insti_data->setup_done)&& !empty($insti_data->setup_done))?$insti_data->setup_done:'';?>"> सेटअप केलेले आहेत. संस्थेत एकूण दोन्ही मिळून
		                                            <input class="form-control input-sm" name="total_setup" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 50px; text-align: center;" value="<?php echo(isset($insti_data->total_setup)&& !empty($insti_data->total_setup))?$insti_data->total_setup:'';?>"> सेटअप आहेत. सर्वतांत्रिक व भौतिक सुविधांची पूर्तता होत आहे. </p>
		                                        <p style="margin: 10px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; सदर संस्थेची मी श्री / श्रीमती
		                                            <input class="form-control input-sm" name="inst_owner" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 350px; text-align: center;" value="<?php echo(isset($insti_data->inst_owner)&& !empty($insti_data->inst_owner))?$insti_data->inst_owner:'';?>"> पदनाम
		                                            <input class="form-control input-sm" name="inst_owner_pos" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 170px; text-align: center;" value="<?php echo(isset($insti_data->inst_owner_pos)&& !empty($insti_data->inst_owner_pos))?$insti_data->inst_owner_pos:'';?>"> प्रत्यक्ष भेट देवून संस्थेतील कागदपत्रांची साधन सामुग्रीची पडताळणी केली आहे व दप्तरे / रजिस्टरमधील नोंदी तपासून पाहिल्या आहेत. </p>
		                                        <p style="margin: 10px;"> ही माहिती खोटी आढळल्यास मी व्यक्तिश: जबाबदार आहे. </p>
		                                        <p style="margin: 10px;"> त्यामुळे सदर संस्थेच्या वाढीव सेटअप साठी मान्यता देण्यास स्पष्ट शिफारस आहे. </p>
		                                        <p style="margin: 10px"> </p>
		                                        <div class="form-group form-md-line-input"> दिनांक :&nbsp;&nbsp;&nbsp;
		                                            <input class="form-control input-sm date_mask" name="form_date" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="display: inline-flex; height: 30px; width: 80px; text-align: center;" value="<?php echo(isset($insti_data->form_date)&& !empty($insti_data->form_date))?date('d-m-Y',strtotime($insti_data->form_date)):'';?>">
		                                            <br> स्थळ :&nbsp;&nbsp;&nbsp;
		                                            <input class="form-control input-sm" name="place" id="form_control_1" type="text" style="display: inline-flex; height: 30px; width: 150px; padding-left:10px;" value="<?php echo(isset($insti_data->place)&& !empty($insti_data->place))?$insti_data->place:'';?>"> </div>
		                                        <p></p>
		                                    </div>
		                                    <br>
		                                    <table width="100%">
		                                        <tbody>
		                                            <tr>
		                                                <td colspan="2">तांत्रिक सहाय्यक / डेटा एन्ट्री ऑपरेटर स्वाक्षरी </td>
		                                                <td colspan="2">तपासणी अधिकारी यांची स्वाक्षरी</td>
		                                            </tr>
		                                            <tr>
		                                                <td></td>
		                                                <td></td>
		                                                <td>संपूर्ण नांव </td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> :&nbsp;
		                                                        <input class="form-control input-sm" name="officer_name" id="form_control_1" type="text" style="height: 30px; padding-le : :10px;" value="<?php echo(isset($insti_data->officer_name)&& !empty($insti_data->officer_name))?$insti_data->officer_name:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>संपूर्ण नांव </td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> :&nbsp;
		                                                        <input class="form-control input-sm" name="officer_name2" id="form_control_1" type="text" style="height: 30px; padding-le : :10px;" value="<?php echo(isset($insti_data->officer_name2)&& !empty($insti_data->officer_name2))?$insti_data->officer_name2:'';?>"> </div>
		                                                </td>
		                                                <td>पदनाम व शिक्का </td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> :&nbsp;
		                                                        <input class="form-control input-sm" name="officer_position" id="form_control_1" type="text" style="height: 30px; padding-le : :10px;" value="<?php echo(isset($insti_data->officer_position)&& !empty($insti_data->officer_position))?$insti_data->officer_position:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                            <tr>
		                                                <td>मोबाइल क्रमांक </td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> :&nbsp;
		                                                        <input class="form-control input-sm" name="mobile1" id="form_control_1" type="text" style="height: 30px; padding-le : :10px;" value="<?php echo(isset($insti_data->mobile1)&& !empty($insti_data->mobile1))?$insti_data->mobile1:'';?>"> </div>
		                                                </td>
		                                                <td>मोबाइल क्रमांक </td>
		                                                <td>
		                                                    <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;"> :&nbsp;
		                                                        <input class="form-control input-sm" name="mobile2" id="form_control_1" type="text" style="height: 30px; padding-le : :10px;" value="<?php echo(isset($insti_data->mobile2)&& !empty($insti_data->mobile2))?$insti_data->mobile2:'';?>"> </div>
		                                                </td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                    <br>
		                                    <hr>
		                                    <div class="form-group form-md-line-input">
		                                        <p style="margin: 10px;text-align: justify;"> <b>सुचना-</b> </p>
		                                        <p style="margin: 10px;text-align: justify;"> १) तपासणी अहवालाच्या चार प्रती तयार कराव्यात. एक स्थळप्रत तपासणी अधिका-याने स्वत:कडे ठेवावी, दुसरी प्रत संस्थेस द्यावी. तर तिसरी प्रत शिक्षणाधिकारी (माध्य.) जि.प. / शिक्षण निरीक्षक, मुबई (उ/द/प) यांचेकडे पाठवावी. </p>
		                                        <p style="margin: 10px;text-align: justify;"> २) तपासणी अहवालाच्या सर्व क्रमवार पृष्ठांची एकत्रित पी.डी.एफ (pdf) फाईल तयार करून संबंधित संस्थेच्या LOGIN द्वारे परीक्षा परिषदेच्या संकेतस्थळावर विहित मुदतीत अपलोड करावी. </p>
		                                        <p style="margin: 10px;text-align: justify;"> ३) तपासणी अधिका-याने संस्थेच्या लॅब मध्ये उपस्थित राहून लॅबमधील साधनसामग्री, संस्थाचालक / प्राचार्य आणि संगणक तंत्रज्ञासह फोटो (सेल्फी) काढावा. फोटोमध्ये चार पेक्षा अधिक व्यक्ति नसाव्यात आणि तो फोटोही संस्थेच्या लॉगिन (Login) द्वारे अपलोड करावा. </p>
		                                        <p style="margin: 10px;text-align: justify;"> ४) पुढील काळात परीक्षा परिषदेकडून राज्यातील संस्थांची अचानक तपासणी केली जाईल. तपासणीत त्रुटी / अपूर्णता आढळणा-या संस्थांचा परीक्षा परिषदेने दिलेला संगणक अभ्यासक्रमाचा सांकेतांक (ई-प्रमाणपत्र) रद्द करण्यात येईल. तसेच अशा प्रकरणी मान्यतेच्या नुतनीकरणास शिफारस करणा-या अधिका-यांविरूध्द शिस्तभंगाची कारवाई प्रस्तावित केली जाईल. </p>
		                                    </div>
		                                </div>
	                                    <div class="form-actions right">
	                                        <button type="submit" class="btn blue common_save" title="Click To Save" rel="1" data-pk="inspection_id"><i class="fa fa-check"></i> <?php echo(isset($insti_data->inspection_id) && !empty($insti_data->inspection_id))?'Update':'Submit';?></button> 
	                                        <?php if(isset($insti_data) && !empty($insti_data)) { ?>
	                                        	<a href="print_renewal_new_form" class="btn green" title="Click To Print" target="_blank"><i class="fa fa-file"></i> Print</a> 
	                                        <?php } ?>
	                                    </div>
	                                </form>
	                            </div>
	                        </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('site/footer'); ?>
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
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader();
        });
        </script>
			<!-- END PAGE LEVEL JAVASCRIPTS -->
	</body>
	<!-- END BODY -->

</html>