<?php  
$institute_code = $this->session->userdata('institute_code');
$institute_id = $this->session->userdata('institute_id');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>रिन्यूअल फॉर्म | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url(); ?>">
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
                    <li><a href="<?php echo base_url(); ?>">होम </a></li>
                    <li class="active">रिन्यूअल फॉर्म </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="col-md-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>रिन्यूअल फॉर्म </div>
                            </div>
                            <div class="portlet-body form" >
                                <form action="renewal" id="renewal" class="horizontal-form" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="renewal-form" method="post" enctype="multipart/form-data">
                                    <div class="form-body" style="padding: 15px 20px !important;">
                                        <div style=" margin-top: -21px;">
                                            <p> </p>
                                            <center><i><span style="font-size: 14px; font-weight: bold;">शासनमान्य वाणिज्य संस्थांमधील संगणक टंकलेखन अभ्यासक्रमाबाबत मान्यतेचे नुतनीकरण<br>तपासणी अहवालाचा नमुना</span></i>
                                                <br>
                                                <br> नुतनीकरण किती वर्षाकरिता :
                                                <input type="radio" name="years" value="3" <?php echo (isset($insti_data->years) && !empty($insti_data->years) && ($insti_data->years=='3'))?'checked="checked"':''?>>&nbsp;३ वर्षे &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="years" value="5" <?php echo (isset($insti_data->years) && !empty($insti_data->years) && ($insti_data->years=='5'))?'checked="checked"':''?>>&nbsp;५ वर्षे &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="years" value="10" <?php echo (isset($insti_data->years) && !empty($insti_data->years) && ($insti_data->years=='10'))?'checked="checked"':''?>>&nbsp;१० वर्षे &nbsp;&nbsp;&nbsp;&nbsp;
                                                <br> ( योग्य ठिकाणी <i class="fa fa-check"></i> अशी खूण करा ) </center>
                                                <input type="hidden" name="institute_id" value="<?php echo $institute_id;?>">
                                            <hr style="border: 1px solid #3E4D5C;">
                                            <p></p>
                                            <div style="margin-bottom: 10px;"> विभागाचे नाव :
                                                <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                    <input class="form-control input-sm" name="area_name" id="form_control_1" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->area_name)&& !empty($insti_data->area_name))?$insti_data->area_name:'';?>"> </div> जिल्हा :
                                                <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                    <input class="form-control  input-sm" name="district" id="form_control_1" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->district)&& !empty($insti_data->district))?$insti_data->district:'';?>"> </div> परिक्षा परिषद संलग्नता कोड क्रमांक :
                                                <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                    <input class="form-control input-sm" name="msceia_code" id="form_control_1" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->msceia_code)&& !empty($insti_data->msceia_code))?$insti_data->msceia_code:'';?>"> </div>
                                                <br> </div>
                                            <div style="margin-bottom: 10px;"> परिक्षा परिषद संलग्नता कोड क्रमांक :
                                                <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                    <input class="form-control input-sm" name="pp_code" id="form_control_1" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->pp_code)&& !empty($insti_data->pp_code))?$insti_data->pp_code:'';?>"> </div> <span style="float: right; margin-right: 30px;"> ( मॅन्युअल टायपींग व लघुलेखन ) </span> </div>
                                            <div style="margin-bottom: 10px;"> ( संगणक टकलेखन ) </div>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td>१.</td>
                                                        <td>संस्थेचे नाव व पुर्ण पत्ता :</td>
                                                        <td>
                                                            <div class="form-group form-md-line-input" style="padding: 0px;">
                                                                <textarea class="form-control input-sm" rows="2" name="inst_name_addr"><?php echo(isset($insti_data->inst_name_addr)&& !empty($insti_data->inst_name_addr))?$insti_data->inst_name_addr:'';?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>२.</td>
                                                        <td>प्राचार्याचे संपुर्ण नाव :</td>
                                                        <td>
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
                                                                <input class="form-control input-sm" name="principal_name" id="form_control_1" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->principal_name)&& !empty($insti_data->principal_name))?$insti_data->principal_name:'';?>"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">३.</td>
                                                        <td style="padding-top: 8px;">तपासणी अधिकारी यांची भेट दिनांक वेळ :</td>
                                                        <td style="padding-top: 8px;">दि : _____________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;वेळ :_____________</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">४.</td>
                                                        <td style="padding-top: 8px; width: 40%;">टकलेखन संस्थेस विभागीय शिक्षण उपसंचालक कार्यालयाकडुन मिळालेल्या मान्यतेचा दिनांक व जावक क्र. :</td>
                                                        <td style="padding-top: 8px;">
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
                                                                <input class="form-control input-sm date_mask" name="typing_approval_no" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->typing_approval_no)&& !empty($insti_data->typing_approval_no))? date('d-m-Y', strtotime($insti_data->typing_approval_no)):'';?>"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">५.</td>
                                                        <td style="padding-top: 8px; width: 40%;">संगणक टायपींग अभ्यासक्रमास विभागीय शिक्षण उपसंचालक कार्यालयाकडुन मिळालेल्या मान्यतेचा दिनांक व जंवक क्र.:</td>
                                                        <td style="padding-top: 8px;">
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 100%;">
                                                                <input class="form-control input-sm date_mask" name="computer_approval_no" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->computer_approval_no)&& !empty($insti_data->computer_approval_no))? date('d-m-Y', strtotime($insti_data->computer_approval_no)):'';?>"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">६.</td>
                                                        <td colspan="2" style="padding-top: 8px;">पुढीलपैकी कोणत्या विषयाची मान्यता आहे.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding-top: 8px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( बेसिक कोर्स इन कॉम्प्युटर टायपींग कालावधी ६ महीने )</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" border="1" style="margin-top: 10px; margin-left: 10px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">इंग्रजी</td>
                                                        <td style="text-align: center;">मराठी</td>
                                                        <td style="text-align: center;">हिंदी</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;"> ३० शप्रमि
                                                            <input type="checkbox" name="eng_30" value="Y" <?php echo (isset($insti_data->eng_30) && !empty($insti_data->eng_30) && ($insti_data->eng_30=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ४० शप्रमि
                                                            <input type="checkbox" name="eng_40" value="Y" <?php echo (isset($insti_data->eng_40) && !empty($insti_data->eng_40) && ($insti_data->eng_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td style="text-align: center;"> ३० शप्रमि
                                                            <input type="checkbox" name="mar_30" value="Y"  <?php echo (isset($insti_data->mar_30) && !empty($insti_data->mar_30) && ($insti_data->mar_30=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ४० शप्रमि
                                                            <input type="checkbox" name="mar_40" value="Y"  <?php echo (isset($insti_data->mar_40) && !empty($insti_data->mar_40) && ($insti_data->mar_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td style="text-align: center;"> ३० शप्रमि
                                                            <input type="checkbox" name="hindi_30" value="Y" <?php echo (isset($insti_data->hindi_30) && !empty($insti_data->hindi_30) && ($insti_data->hindi_30=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ४० शप्रमि
                                                            <input type="checkbox" name="hindi_40" value="Y" <?php echo (isset($insti_data->hindi_40) && !empty($insti_data->hindi_40) && ($insti_data->hindi_40=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" style="padding-top: 8px; padding-left: 18px;">स्पेशल स्किल इन कॉम्प्युटर टायपींग फॉर इन्स्ट्रक्टर्स ( कालावधी ३ महीने )</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">७.</td>
                                                        <td style="padding-top: 8px; width: 40%;">संस्थेच्या कामकाजाची वेळ :</td>
                                                        <td style="padding-top: 8px;"> सकाळी
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                                <input class="form-control input-sm" name="m_from" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->m_from)&& !empty($insti_data->m_from))?$insti_data->m_from:'';?>"> </div> ते
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                                <input class="form-control input-sm" name="m_to" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->m_to)&& !empty($insti_data->m_to))?$insti_data->m_to:'';?>"> </div> पर्यंत
                                                            <br> दुपारी&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                                <input class="form-control input-sm" name="a_from" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->a_from)&& !empty($insti_data->a_from))?$insti_data->a_from:'';?>"> </div> ते
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                                <input class="form-control input-sm" name="a_to" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->a_to)&& !empty($insti_data->a_to))?$insti_data->a_to:'';?>"> </div> पर्यंत </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">प्रत्येक तासिका किती मिनिटाची आहे :</td>
                                                        <td style="padding-top: 8px;"> मिनिटे&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex;">
                                                                <input class="form-control input-sm" name="time" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->time)&& !empty($insti_data->time))?$insti_data->time:'';?>"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">८.</td>
                                                        <td style="padding-top: 8px;">संस्थेची मालकी :</td>
                                                        <td style="padding-top: 8px;"> प्रोप्रायटर
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 10%;">
                                                                <input type="radio" name="property" value="Proprietor" <?php echo (isset($insti_data->property) && !empty($insti_data->property) && ($insti_data->property=='Proprietor'))?'checked="checked"':''?>> </div> भागीदार
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 10%;">
                                                                <input type="radio" name="property" value="Partner" <?php echo (isset($insti_data->property) && !empty($insti_data->property) && ($insti_data->property=='Partner'))?'checked="checked"':''?>> </div> ट्रस्ट
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 10%;">
                                                                <input type="radio" name="property" value="Trust" <?php echo (isset($insti_data->property) && !empty($insti_data->property) && ($insti_data->property=='Trust'))?'checked="checked"':''?>> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">९.</td>
                                                        <td style="padding-top: 8px;">संस्थेची जागा :</td>
                                                        <td style="padding-top: 8px;">स्वमालकाची
                                                            <input type="radio" name="place_authority" value="Owner" <?php echo (isset($insti_data->place_authority) && !empty($insti_data->place_authority) && ($insti_data->place_authority=='Owner'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; भाड्याची
                                                            <input type="radio" name="place_authority" value="Rentals" <?php echo (isset($insti_data->place_authority) && !empty($insti_data->place_authority) && ($insti_data->place_authority=='Rentals'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">स्वमालकाची असल्यास ७/१२ , ८ अ वर नोंद आहे का ? </td>
                                                        <td style="padding-top: 8px;">होय
                                                            <input type="radio" name="place_agree" value="Y" <?php echo (isset($insti_data->place_agree) && !empty($insti_data->place_agree) && ($insti_data->place_agree=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="place_agree" value="N" <?php echo (isset($insti_data->place_agree) && !empty($insti_data->place_agree) && ($insti_data->place_agree=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">भाड्याची असल्यास भाडे करार आहे का ? </td>
                                                        <td style="padding-top: 8px;">होय
                                                            <input type="radio" name="agreement" value="Y"  <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="agreement" value="N" <?php echo (isset($insti_data->agreement) && !empty($insti_data->agreement) && ($insti_data->agreement=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">इमारतीचा तपशील :</td>
                                                        <td style="padding-top: 8px;"> खोल्यांची संख्या
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="rooms" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->rooms)&& !empty($insti_data->rooms))?$insti_data->rooms:'';?>"> </div> एकूण आकारमान (चौ. फुट )
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="area_sqft" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->area_sqft)&& !empty($insti_data->area_sqft))?$insti_data->area_sqft:'';?>"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">जागा :</td>
                                                        <td style="padding-top: 8px;"> पुरेशी आहे &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 10%;">
                                                                <input type="radio" name="area_enough" value="Enough" <?php echo (isset($insti_data->area_enough) && !empty($insti_data->area_enough) && ($insti_data->area_enough=='Enough'))?'checked="checked"':''?>> </div> अपुरी आहे
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 10%;">
                                                                <input type="radio" name="area_enough" value="Insufficient" <?php echo (isset($insti_data->area_enough) && !empty($insti_data->area_enough) && ($insti_data->area_enough=='Insufficient'))?'checked="checked"':''?>> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">प्रकाश व्यवस्था :</td>
                                                        <td style="padding-top: 8px;">चागली/ हवेशीर &nbsp;&nbsp; आहे
                                                            <input type="radio" name="light" value="Y" <?php echo (isset($insti_data->light) && !empty($insti_data->light) && ($insti_data->light=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="light" value="N" <?php echo (isset($insti_data->light) && !empty($insti_data->light) && ($insti_data->light=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;">महीला व पुरुषांसाठी स्वतंत्र स्वच्छताग्रह : </td>
                                                        <td style="padding-top: 8px;">आहे
                                                            <input type="radio" name="wr" value="Y" <?php echo (isset($insti_data->wr) && !empty($insti_data->wr) && ($insti_data->wr=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="wr" value="N" <?php echo (isset($insti_data->wr) && !empty($insti_data->wr) && ($insti_data->wr=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">१०.</td>
                                                        <td style="padding-top: 8px;" colspan="2">संगणक टायपींग शुल्क (किती आकारले जाते ? अभिलेख पाहुन नोंदी करा.)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>बेसिक कोर्स इन कॉम्प्युटर टायपींग (कालावधी ६ महीने )</i></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रवेश शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="b_entry_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->b_entry_fee)&& !empty($insti_data->b_entry_fee))?$insti_data->b_entry_fee:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मासिक शुल्क (रूपये)&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="b_monthly_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->b_monthly_fee)&& !empty($insti_data->b_monthly_fee))?$insti_data->b_monthly_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;परीक्षा शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="b_exam_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->b_exam_fee)&& !empty($insti_data->b_exam_fee))?$insti_data->b_exam_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सामग्री शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="b_lab_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->b_lab_fee)&& !empty($insti_data->b_lab_fee))?$insti_data->b_lab_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;एकूण शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="b_total_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->b_total_fee)&& !empty($insti_data->b_total_fee))?$insti_data->b_total_fee:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>स्पेशल स्किाल इन कॉम्युटर टायपींग फॉर इन्स्ट्रक्टर्स (कालावधी ३ महीने )</i></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रवेश शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_entry_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_entry_fee)&& !empty($insti_data->s_entry_fee))?$insti_data->s_entry_fee:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मासिक शुल्क (रूपये)&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_monthly_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_monthly_fee)&& !empty($insti_data->s_monthly_fee))?$insti_data->s_monthly_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;परीक्षा शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_exam_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_exam_fee)&& !empty($insti_data->s_exam_fee))?$insti_data->s_exam_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सामग्री शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_lab_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_lab_fee)&& !empty($insti_data->s_lab_fee))?$insti_data->s_lab_fee:'';?>"> </div>
                                                        </td>
                                                        <td>प्रतीमाह प्रत्येक विषयास</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;एकूण शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_total_fee" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_total_fee)&& !empty($insti_data->s_total_fee))?$insti_data->s_total_fee:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> ११.</td>
                                                        <td colspan="2" style="padding-top: 8px;">चालू स्थितीतील उपलब्ध संगणक सामग्री तपशील (आवश्यक तेथे संख्या लिहा )</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. सर्व्हर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="server" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->server)&& !empty($insti_data->server))?$insti_data->server:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;क्लायंट&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="client" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->client)&& !empty($insti_data->client))?$insti_data->client:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. स्कॅनर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="scanner" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->scanner)&& !empty($insti_data->scanner))?$insti_data->scanner:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. इंकजेट प्रिटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="inkjet" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->inkjet)&& !empty($insti_data->inkjet))?$insti_data->inkjet:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;लेसर प्रिंटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="laser" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->laser)&& !empty($insti_data->laser))?$insti_data->laser:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दोन्हीही &nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="both_printers" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->both_printers)&& !empty($insti_data->both_printers))?$insti_data->both_printers:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. युपीएस &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="ups" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->ups)&& !empty($insti_data->ups))?$insti_data->ups:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;इर्न्व्हटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="inverter" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->inverter)&& !empty($insti_data->inverter))?$insti_data->inverter:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दोन्हीही &nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="both_ups" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->both_ups)&& !empty($insti_data->both_ups))?$insti_data->both_ups:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. हेडफोन &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="headphone" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->headphone)&& !empty($insti_data->headphone))?$insti_data->headphone:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>उपरोक्त १ ते ५ मधील साधनसामग्री खरेदीच्या पावत्या : </i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; आहे
                                                            <input type="radio" name="purchase" value="Y"  <?php echo (isset($insti_data->purchase) && !empty($insti_data->purchase) && ($insti_data->purchase=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="purchase" value="N" <?php echo (isset($insti_data->purchase) && !empty($insti_data->purchase) && ($insti_data->purchase=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. सर्व संगणक जोडलेले (लॅन केलेले ): &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; आहे
                                                            <input type="radio" name="lan" value="Y" <?php echo (isset($insti_data->lan) && !empty($insti_data->lan) && ($insti_data->lan=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="lan" value="N" <?php echo (isset($insti_data->lan) && !empty($insti_data->lan) && ($insti_data->lan=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. इंटरनेट सुविधा उपलब्ध : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; आहे
                                                            <input type="radio" name="internet" value="Y" <?php echo (isset($insti_data->internet) && !empty($insti_data->internet) && ($insti_data->internet=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="internet" value="N" <?php echo (isset($insti_data->internet) && !empty($insti_data->internet) && ($insti_data->internet=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;८. ब्रॉडबँड स्पीड : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="internet_speed" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->internet_speed)&& !empty($insti_data->internet_speed))?$insti_data->internet_speed:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;केबीपीएस/ एमबीपीएस &nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;९. मागील महीन्याचे इंटरनेट शूल्क भरले आहे : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; होय
                                                            <input type="radio" name="net_payment" value="Y" <?php echo (isset($insti_data->net_payment) && !empty($insti_data->net_payment) && ($insti_data->net_payment=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="net_payment" value="N" <?php echo (isset($insti_data->net_payment) && !empty($insti_data->net_payment) && ($insti_data->net_payment=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;रक्कम: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="net_pmt_amount" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->net_pmt_amount)&& !empty($insti_data->net_pmt_amount))?$insti_data->net_pmt_amount:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 25%;">
                                                                <input class="form-control input-sm date_mask" name="net_pmt_date" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->net_pmt_date)&& !empty($insti_data->net_pmt_date))?date('d-m-Y', strtotime($insti_data->net_pmt_date)):'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१०. मागील महीन्यातील वीजबील देयक भरले आहे काय? </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; होय
                                                            <input type="radio" name="net_pmt_paid" value="Y" <?php echo (isset($insti_data->net_pmt_paid) && !empty($insti_data->net_pmt_paid) && ($insti_data->net_pmt_paid=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="net_pmt_paid" value="N" <?php echo (isset($insti_data->net_pmt_paid) && !empty($insti_data->net_pmt_paid) && ($insti_data->net_pmt_paid=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;रक्कम: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="net_paid_amount" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->net_paid_amount)&& !empty($insti_data->net_paid_amount))?$insti_data->net_paid_amount:'';?>"> </div>
                                                        </td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दिनांक: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 25%;">
                                                                <input class="form-control input-sm date_mask" name="net_paid_date" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->net_paid_date)&& !empty($insti_data->net_paid_date))?date('d-m-Y', strtotime($insti_data->net_paid_date)):'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>संगणक यंत्रासंबंधीचा अभिप्राय :</i></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; समाधानकारक
                                                            <input type="radio" name="satisfactory" value="Satisfactory" <?php echo (isset($insti_data->satisfactory) && !empty($insti_data->satisfactory) && ($insti_data->satisfactory=='Satisfactory'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; असमाधानकारक
                                                            <input type="radio" name="satisfactory" value="Unsatisfactory" <?php echo (isset($insti_data->satisfactory) && !empty($insti_data->satisfactory) && ($insti_data->satisfactory=='Unsatisfactory'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>मान्यता आदेशाप्रमाने संगणक सेटअप आहे काय : </i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;होय
                                                            <input type="radio" name="inst_setup" value="Y" <?php echo (isset($insti_data->inst_setup) && !empty($insti_data->inst_setup) && ($insti_data->inst_setup=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="inst_setup" value="N" <?php echo (isset($insti_data->inst_setup) && !empty($insti_data->inst_setup) && ($insti_data->inst_setup=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १२.</td>
                                                        <td colspan="2" style="padding-top: 8px;">निर्देशकाची माहिती :</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" border="1" style="margin-top: 10px; margin-left: 10px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">अ. क्र.</td>
                                                        <td style="text-align: center;">निर्देशकाचे नाव</td>
                                                        <td style="text-align: center;">शैक्षणिक अहर्ता</td>
                                                        <td style="text-align: center;">व्यावसायिक अहर्ता</td>
                                                        <td style="text-align: center;">मोबाईल क्रमांक</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">१</td>
                                                        <td>
                                                            <input class="form-control input-sm" name="director_1" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->director_1)&& !empty($insti_data->director_1))?$insti_data->director_1:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="quali_1" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->quali_1)&& !empty($insti_data->quali_1))?$insti_data->quali_1:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="busi_1" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->busi_1)&& !empty($insti_data->busi_1))?$insti_data->busi_1:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="mob_1" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->mob_1)&& !empty($insti_data->mob_1))?$insti_data->mob_1:'';?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">२</td>
                                                        <td>
                                                            <input class="form-control input-sm" name="director_2" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->director_2)&& !empty($insti_data->director_2))?$insti_data->director_2:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="quali_2" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->quali_2)&& !empty($insti_data->quali_2))?$insti_data->quali_2:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="busi_2" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->busi_2)&& !empty($insti_data->busi_2))?$insti_data->busi_2:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="mob_2" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->mob_2)&& !empty($insti_data->mob_2))?$insti_data->mob_2:'';?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">३</td>
                                                        <td>
                                                            <input class="form-control input-sm" name="director_3" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->director_3)&& !empty($insti_data->director_3))?$insti_data->director_3:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="quali_3" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->quali_3)&& !empty($insti_data->quali_3))?$insti_data->quali_3:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="busi_3" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->busi_3)&& !empty($insti_data->busi_3))?$insti_data->busi_3:'';?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-control input-sm" name="mob_3" id="form_control_1" placeholder="" type="text" style="height: 20px;text-align:center;" value="<?php echo(isset($insti_data->mob_3)&& !empty($insti_data->mob_3))?$insti_data->mob_3:'';?>">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १३.</td>
                                                        <td colspan="2" style="padding-top: 8px;">फर्निचर तपशील (संख्&zwnj;या लिहा):</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. खुर्च्या &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="chairs" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->chairs)&& !empty($insti_data->chairs))?$insti_data->chairs:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. टेबल &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="tables" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->tables)&& !empty($insti_data->tables))?$insti_data->tables:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. स्टुल्स&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="stools" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->stools)&& !empty($insti_data->stools))?$insti_data->stools:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. कपाटे&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="cupboards" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->cupboards)&& !empty($insti_data->cupboards))?$insti_data->cupboards:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. रॅकस &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="sheleves" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->sheleves)&& !empty($insti_data->sheleves))?$insti_data->sheleves:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. नोटीस बोर्डे &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="noticeboards" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->noticeboards)&& !empty($insti_data->noticeboards))?$insti_data->noticeboards:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. इतर साहित्य &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="item_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->item_1)&& !empty($insti_data->item_1))?$insti_data->item_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="count_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->count_1)&& !empty($insti_data->count_1))?$insti_data->count_1:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="item_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->item_2)&& !empty($insti_data->item_2))?$insti_data->item_2:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="count_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->count_2)&& !empty($insti_data->count_2))?$insti_data->count_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="item_3" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->item_3)&& !empty($insti_data->item_3))?$insti_data->item_3:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="count_3" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->count_3)&& !empty($insti_data->count_3))?$insti_data->count_3:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १४.</td>
                                                        <td colspan="2" style="padding-top: 8px;">संगणक अभ्यासकाची पुस्तके (संख्या): </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i. इग्रजी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="book_eng" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->book_eng)&& !empty($insti_data->book_eng))?$insti_data->book_eng:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii. मराठी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="book_mar" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->book_mar)&& !empty($insti_data->book_mar))?$insti_data->book_mar:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii. हिंदी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="book_hin" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->book_hin)&& !empty($insti_data->book_hin))?$insti_data->book_hin:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १५.</td>
                                                        <td colspan="2" style="padding-top: 8px;"> संस्थेतील दप्तर व नोंदीची स्थिती: </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;अ. विद्यार्थी विषयक &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. संगणक अभ्यासक्रमाचे स्वतंत्र जनरल रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="gen_registration" value="Y" <?php echo (isset($insti_data->gen_registration) && !empty($insti_data->gen_registration) && ($insti_data->gen_registration=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="gen_registration" value="N" <?php echo (isset($insti_data->gen_registration) && !empty($insti_data->gen_registration) && ($insti_data->gen_registration=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. संगणक अभ्यासक्रमाची विद्यार्थी हजेरीपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="stud_attendence" value="Y" <?php echo (isset($insti_data->stud_attendence) && !empty($insti_data->stud_attendence) && ($insti_data->stud_attendence=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="stud_attendence" value="N" <?php echo (isset($insti_data->stud_attendence) && !empty($insti_data->stud_attendence) && ($insti_data->stud_attendence=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. विद्यार्थ्याचे प्रवेश अर्ज :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="stud_application" value="Y" <?php echo (isset($insti_data->stud_application) && !empty($insti_data->stud_application) && ($insti_data->stud_application=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="stud_application" value="N" <?php echo (isset($insti_data->stud_application) && !empty($insti_data->stud_application) && ($insti_data->stud_application=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. चाचण्या व संस्थाअंतर्गत परीक्षांच्या नोंदी :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="ex_ent" value="Y" <?php echo (isset($insti_data->ex_ent) && !empty($insti_data->ex_ent) && ($insti_data->ex_ent=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="ex_ent" value="N" <?php echo (isset($insti_data->ex_ent) && !empty($insti_data->ex_ent) && ($insti_data->ex_ent=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. परीक्षाबाबतची नोंद/रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="ex_reg" value="Y" <?php echo (isset($insti_data->ex_reg) && !empty($insti_data->ex_reg) && ($insti_data->ex_reg=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="ex_reg" value="N" <?php echo (isset($insti_data->ex_reg) && !empty($insti_data->ex_reg) && ($insti_data->ex_reg=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. संस्थेच्या प्रमाणपत्राचे रेकॉर्ड :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="cert_record" value="Y" <?php echo (isset($insti_data->cert_record) && !empty($insti_data->cert_record) && ($insti_data->cert_record=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="cert_record" value="N" <?php echo (isset($insti_data->cert_record) && !empty($insti_data->cert_record) && ($insti_data->cert_record=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. विद्यार्थ्यांची दैनंदीन सराव फाईल :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="d_practice" value="Y" <?php echo (isset($insti_data->d_practice) && !empty($insti_data->d_practice) && ($insti_data->d_practice=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="d_practice" value="N" <?php echo (isset($insti_data->d_practice) && !empty($insti_data->d_practice) && ($insti_data->d_practice=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;८. जनरल रजिस्टर व हजेरीपत्रकांशिवाय विद्यार्थ्यांची माहीती व हजेरीची नोंद संस्थेच्या संगणकात केली आहे काय:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="comp_atd" value="Y" <?php echo (isset($insti_data->comp_atd) && !empty($insti_data->comp_atd) && ($insti_data->comp_atd=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="comp_atd" value="N" <?php echo (isset($insti_data->comp_atd) && !empty($insti_data->comp_atd) && ($insti_data->comp_atd=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;ब. निदेशक व सेवक यांचेबाबत &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. हजेरीपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="att_book" value="Y" <?php echo (isset($insti_data->att_book) && !empty($insti_data->att_book) && ($insti_data->att_book=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="att_book" value="N" <?php echo (isset($insti_data->att_book) && !empty($insti_data->att_book) && ($insti_data->att_book=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. वेतन नांदपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="salary_slip" value="Y" <?php echo (isset($insti_data->salary_slip) && !empty($insti_data->salary_slip) && ($insti_data->salary_slip=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="salary_slip" value="N" <?php echo (isset($insti_data->salary_slip) && !empty($insti_data->salary_slip) && ($insti_data->salary_slip=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. निदेशक / सेवक माहिती रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="servent_info" value="Y" <?php echo (isset($insti_data->servent_info) && !empty($insti_data->servent_info) && ($insti_data->servent_info=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="servent_info" value="N" <?php echo (isset($insti_data->servent_info) && !empty($insti_data->servent_info) && ($insti_data->servent_info=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;क. संस्थेशी संबंधित &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. फी जमा पुस्तके:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="fee_book" value="Y" <?php echo (isset($insti_data->fee_book) && !empty($insti_data->fee_book) && ($insti_data->fee_book=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="fee_book" value="N" <?php echo (isset($insti_data->fee_book) && !empty($insti_data->fee_book) && ($insti_data->fee_book=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. फी रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="fee_reg" value="Y" <?php echo (isset($insti_data->fee_reg) && !empty($insti_data->fee_reg) && ($insti_data->fee_reg=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="fee_reg" value="N" <?php echo (isset($insti_data->fee_reg) && !empty($insti_data->fee_reg) && ($insti_data->fee_reg=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. जडसंग्रह नोंदवही :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="hvy_dut_book" value="Y" <?php echo (isset($insti_data->hvy_dut_book) && !empty($insti_data->hvy_dut_book) && ($insti_data->hvy_dut_book=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="hvy_dut_book" value="N" <?php echo (isset($insti_data->hvy_dut_book) && !empty($insti_data->hvy_dut_book) && ($insti_data->hvy_dut_book=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. खात्याशी केलेल्या पत्र व्यवहाराची फाईल :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="letter_file" value="Y" <?php echo (isset($insti_data->letter_file) && !empty($insti_data->letter_file) && ($insti_data->letter_file=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="letter_file" value="N" <?php echo (isset($insti_data->letter_file) && !empty($insti_data->letter_file) && ($insti_data->letter_file=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. अधिकाऱ्यांचे भेट रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td> आहे
                                                            <input type="radio" name="visit_reg" value="Y" <?php echo (isset($insti_data->visit_reg) && !empty($insti_data->visit_reg) && ($insti_data->visit_reg=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="visit_reg" value="N" <?php echo (isset($insti_data->visit_reg) && !empty($insti_data->visit_reg) && ($insti_data->visit_reg=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १६. </td>
                                                        <td colspan="2" style="padding-top: 8px;"> मागील दोन संगणक टायपिंग परीक्षांच्या निकालांची टक्केवारीबेसिक कोर्स इन कॉम्पुटर टायपिंग: </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(कालावधी ६ महिने) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="res_mon_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->res_mon_1)&& !empty($insti_data->res_mon_1))?$insti_data->res_mon_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="res_mon_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->res_mon_2)&& !empty($insti_data->res_mon_2))?$insti_data->res_mon_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(परीक्षांचा नेमका महिना व वर्ष लिहा)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="res_yr_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->res_yr_1)&& !empty($insti_data->res_yr_1))?$insti_data->res_yr_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="res_yr_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->res_yr_2)&& !empty($insti_data->res_yr_2))?$insti_data->res_yr_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. इंग्रजी संगणक टायपिंग ३०: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="eng_30_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->eng_30_1)&& !empty($insti_data->eng_30_1))?$insti_data->eng_30_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="eng_30_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->eng_30_2)&& !empty($insti_data->eng_30_2))?$insti_data->eng_30_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. इंग्रजी संगणक टायपिंग ४०: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="eng_40_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->eng_40_1)&& !empty($insti_data->eng_40_1))?$insti_data->eng_40_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="eng_40_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->eng_40_2)&& !empty($insti_data->eng_40_2))?$insti_data->eng_40_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. मराठी संगणक टायपिंग ३० : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="mar_30_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->mar_30_1)&& !empty($insti_data->mar_30_1))?$insti_data->mar_30_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="mar_30_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->mar_30_2)&& !empty($insti_data->mar_30_2))?$insti_data->mar_30_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. मराठी संगणक टायपिंग ४० : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="mar_40_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->mar_40_1)&& !empty($insti_data->mar_40_1))?$insti_data->mar_40_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="mar_40_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->mar_40_2)&& !empty($insti_data->mar_40_2))?$insti_data->mar_40_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. हिंदी संगणक टायपिंग ३०: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="hin_30_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->hin_30_1)&& !empty($insti_data->hin_30_1))?$insti_data->hin_30_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="hin_30_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->hin_30_2)&& !empty($insti_data->hin_30_2))?$insti_data->hin_30_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. हिंदी संगणक टायपिंग ४० : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="hin_40_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->hin_40_1)&& !empty($insti_data->hin_40_1))?$insti_data->hin_40_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="hin_40_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->hin_40_2)&& !empty($insti_data->hin_40_2))?$insti_data->hin_40_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;">&nbsp;</td>
                                                        <td style="padding-top: 8px;" colspan="2"><b><i>स्पेशल स्किल इन कॉम्पुटर टायपिंग फॉर इन्स्ट्रक्टर्स</i></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(कालावधी ३ महिने)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_res_yr_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_res_yr_1)&& !empty($insti_data->s_res_yr_1))?$insti_data->s_res_yr_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_res_yr_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_res_yr_2)&& !empty($insti_data->s_res_yr_2))?$insti_data->s_res_yr_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_res_per_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_res_per_1)&& !empty($insti_data->s_res_per_1))?$insti_data->s_res_per_1:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="s_res_per_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->s_res_per_2)&& !empty($insti_data->s_res_per_2))?$insti_data->s_res_per_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १७.</td>
                                                        <td colspan="2" style="padding-top: 8px;">यापूर्वीच्या तपासणी अहवालातील सुचनांची / पुर्तता :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; आहे
                                                            <input type="radio" name="invst_info" value="Y" <?php echo (isset($insti_data->invst_info) && !empty($insti_data->invst_info) && ($insti_data->invst_info=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="invst_info" value="N" <?php echo (isset($insti_data->invst_info) && !empty($insti_data->invst_info) && ($insti_data->invst_info=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;केली आहे काय.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;तपशील द्यावा.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 40%;">
                                                                <input class="form-control input-sm" name="invst_info_detail" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->invst_info_detail)&& !empty($insti_data->invst_info_detail))?$insti_data->invst_info_detail:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १८. </td>
                                                        <td colspan="2" style="padding-top: 8px;"> चालू वर्षात संगणक अभ्यासक्रमासाठी प्रवेश दिलेल्या विद्यार्थ्यांची एकूण संख्या / व पटावरील संख्या :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="stud_in_yr" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->stud_in_yr)&& !empty($insti_data->stud_in_yr))?$insti_data->stud_in_yr:'';?>"> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> १९.</td>
                                                        <td colspan="2" style="padding-top: 8px;"> शासनमान्य क्षमतेपेक्षा जास्त विद्यार्थी प्रविष्ट केले आहेत काय? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; होय
                                                            <input type="radio" name="extra_stud" value="Y" <?php echo (isset($insti_data->extra_stud) && !empty($insti_data->extra_stud) && ($insti_data->extra_stud=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="extra_stud" value="N" <?php echo (isset($insti_data->extra_stud) && !empty($insti_data->extra_stud) && ($insti_data->extra_stud=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr style="border: 1px solid #3E4D5C;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top: 8px;"> २०.</td>
                                                        <td colspan="2" style="padding-top: 8px;">तपासणी अधिकाऱ्याचे अभिप्राय / सुचना / शिफारशी</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर संस्थेची मी श्री / श्रीमती &nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="officer_name" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->officer_name)&& !empty($insti_data->officer_name))?$insti_data->officer_name:'';?>"> </div> पदनाम &nbsp;&nbsp;&nbsp;
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="officer_desig" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->officer_desig)&& !empty($insti_data->officer_desig))?$insti_data->officer_desig:'';?>"> </div>&nbsp;&nbsp; प्रत्यक्ष भेट देवून संस्थेतील कागदपत्रांची साधनसामग्रीची पडताळणी केली आहे व दप्तरे / रजिस्टरमधील नोंदी तपासून पाहिल्या आहेत. </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ही माहिती खोटी आढळल्यास मी / आम्ही व्यक्तिश: जबाबदार आहे / आहोत.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर पुढील नुतनीकरण मान्यता देण्यास शिफारस &nbsp;आहे
                                                            <input type="radio" name="officer_appro" value="Y" <?php echo (isset($insti_data->officer_appro) && !empty($insti_data->officer_appro) && ($insti_data->officer_appro=='Y'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही
                                                            <input type="radio" name="officer_appro" value="N" <?php echo (isset($insti_data->officer_appro) && !empty($insti_data->officer_appro) && ($insti_data->officer_appro=='N'))?'checked="checked"':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td style="padding-top: 30px;">दिनांक :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm date_mask" name="submission_date" id="form_control_1" placeholder="dd-mm-yyyy" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->submission_date)&& !empty($insti_data->submission_date))?date('d-m-Y', strtotime($insti_data->submission_date)):'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td style="padding-top: 10px;">स्थळ :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="submission_place" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->submission_place)&& !empty($insti_data->submission_place))?$insti_data->submission_place:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td style="padding-top: 50px;">तांत्रिक सहायक/डेटा एन्ट्री ऑपरेटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;तपासणी अधिकारी यांची स्वाक्षरी:</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>स्वाक्षरी : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;संपूर्ण नाव :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="officer_name_1" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->officer_name_1)&& !empty($insti_data->officer_name_1))?$insti_data->officer_name_1:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>संपूर्ण नाव :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="de_name" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->de_name)&& !empty($insti_data->de_name))?$insti_data->de_name:'';?>"> </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;पदनाम व शिक्का :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="officer_desig_2" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->officer_desig_2)&& !empty($insti_data->officer_desig_2))?$insti_data->officer_desig_2:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>मोबाईल क्रमांक :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="de_mob" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->de_mob)&& !empty($insti_data->de_mob))?$insti_data->de_mob:'';?>"> </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मोबाईल क्रमांक :
                                                            <div class="form-group form-md-line-input" style="margin: 0px; padding: 0px; display: inline-flex; width: 20%;">
                                                                <input class="form-control input-sm" name="officer_mob" id="form_control_1" placeholder="" type="text" style="height: 30px;" value="<?php echo(isset($insti_data->officer_mob)&& !empty($insti_data->officer_mob))?$insti_data->officer_mob:'';?>"> </div>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr style="border: 1px solid #3E4D5C;">
                                            <div> सूचना:
                                                <div style="padding-left: 20px;"> १. तपासणी अहवालाच्या चार प्रती तयार कराव्यात. एक स्थळप्रत तपासणी अधिकाऱ्याने स्वत:कडे ठेवावी, दुसरी प्रत संस्थेस द्यावी. तर तिसरी प्रत शिक्षणाधिकारी ( माध्य ) जि.प. / शिक्षण निरीक्षक, मुंबई (उ/द/प) यांचेकडे पाठवावी. </div>
                                                <div style="padding-left: 20px;"> २. तपासणी अहवालाच्या सर्व क्रमवार पृष्ठांची एकत्रित पी.डी.एफ फाइल तयार करून संबंधित संस्थेच्या LOGIN द्वारे परीक्षा परिषदेच्या संकेतस्थळावर विहित मुदतीत अपलोड करावी. </div>
                                                <div style="padding-left: 20px;"> ३. तपासणी अधिकाऱ्याने संस्थेच्या लॅब मध्ये उपस्थीत राहून लॅबमधील साधनसामग्री, संस्थाचालक / प्राचार्य आणि संगणक तंत्रासह फोटो काढावा. फोटोमध्ये चारपेक्षा अधिक व्यक्ती नसाव्यात आणि तो फोटोही संस्थेच्या लॉगिण द्वारे अपलोड करावा. </div>
                                                <div style="padding-left: 20px;"> ४. पुढील काळात परीक्षा परिषदेकडून राज्यातील संस्थांची अचानक तपासणी केली जाईल. तपासणी त्रुटी / अपूर्णता आढळणाऱ्या संस्थांचा परीक्षा परिषदेने दिलेला संगणक अभ्यासक्रमाचा सांकेतांक (ई-प्रमाणपत्र) रद्द करण्यात येईल. तसेच अशा प्रकरणी मान्यतेच्या नुतनीकरणास शिफारस करणाऱ्या अधिकाऱ्यांविरूद्ध शिस्तभंगाची कारवाई प्रस्तावित केली जाईल. </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="renewal_id" value="<?php echo(isset($insti_data->renewal_id)&& !empty($insti_data->renewal_id))?$insti_data->renewal_id:'';?>">
                                    </div>
                                    <div class="form-actions right">
                                        <button type="submit" class="btn blue common_save" data-pk="renewal_id"><i class="fa fa-check"></i> <?php echo(isset($insti_data->renewal_id) && !empty($insti_data->renewal_id))?'Update':'Submit';?></button>
                                        <?php if(isset($insti_data) && !empty($insti_data)) { ?>
                                        	<a href="print_renewal_form" class="btn green " title="Click To Print" target="_blank"><i class="fa fa-file"></i> Print</a>
                                        <?php } ?>
                                    </div>
                                </form>
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