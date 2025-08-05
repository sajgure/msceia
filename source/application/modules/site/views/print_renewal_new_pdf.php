<!DOCTYPE html>
<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                font-family: freeserif;
                font-weight: 100;
                font-size: 14px;
            }
            .marathi {
                font-family: Helvetica, Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <div style="text-align: center;">
            
                <span style="font-size: 14px; font-weight: bold;">
                    शासनमान्य वाणिज्य संस्थांमधील संगणक टंकलेखन अभ्यासक्रमाबाबत<br> वाढीव संगणक सेटअप बाबत तपासणी अहवाल 
                </span>
            
            <br>
            <hr>
            <div style="text-align: left;">वाचा:</div>
            <div style="padding-left: 20px; text-align: left;">
                १) महाराष्ट्र शासन शालेय शिक्षण व क्रिडा विभाग शासन निर्णय क्र. – एसपीई - १०१२/(१०८/१२) / साशि-१, दि. ३१ ऑक्टोबर २०१३.
            </div> 
            <div style="padding-left: 20px; text-align: left;">
                २) महाराष्ट्र वाणिज्य विभाग शिक्षण संस्था (टंकलेखन, लघुलेखन, पदविका आणि संगणक टायपिंग अभ्यासक्रम) मान्यता आणि संचालन नियम १९९२ सुधारित नियमावली २०१४.
            </div> 
            </div>
            <hr style="border: 1px solid black;">
            <table width="100%">
                <tr>
                    <td width="5%">१.</td>
                    <td width="50%">शासनमान् यटंकलेखन / लघुलेखन संस्थेचे नांव</td>
                    <td>:</td>
                    <td>
                        <b><?php echo(isset($form_data->inst_name) && !empty($form_data->inst_name))?$form_data->inst_name:'-'?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">२.</td>
                    <td style="vertical-align: top;" width="50%">संस्थेचा संपुर्ण पत्ता</td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        <b><?php echo(isset($form_data->inst_address) && !empty($form_data->inst_address))?$form_data->inst_address:'-'?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">३.</td>
                    <td style="vertical-align: top;" width="50%">टंकलेखन संस्थेस प्रथम शासनमान्यता मिळालेचा दिनांक व संदर्भियपत्र क्र. </td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        जा.क्र. :<b><?php echo(isset($form_data->inst_reg_no) && !empty($form_data->inst_reg_no))?$form_data->inst_reg_no:'-'?></b>
                        &nbsp;&nbsp;दिनांक :&nbsp;<b><?php echo(isset($form_data->inst_no_and_date) && !empty($form_data->inst_no_and_date))?date('d-m-Y',strtotime($form_data->inst_no_and_date)):''?></b>&nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">४.</td>
                    <td style="vertical-align: top;" width="50%">संगणक टायपिंग अभ्यासक्रमास प्रथम शासनमान्यता मिळालेचा दिनांक व संदर्भियपत्र क्र</td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        जा.क्र. :<b><?php echo(isset($form_data->first_reg_no) && !empty($form_data->first_reg_no))?$form_data->first_reg_no:'-'?></b>
                        &nbsp;&nbsp;दिनांक :&nbsp;<b><?php echo(isset($form_data->first_reg_date) && !empty($form_data->first_reg_date))?date('d-m-Y',strtotime($form_data->first_reg_date)):''?></b>,&nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">५.</td>
                    <td style="vertical-align: top;" width="50%">संगणक अभ्यासक्रमातील कोणत्या विषयांना मान्यता मिळालेली आहे? बेसिक कोर्स इन‍कम्प्युटर टायपिंग (कालावधी ६ महीने) </td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        <?php if(isset($form_data->mar_30) && !empty($form_data->mar_30)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> मराठी ३० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> मराठी ३० शप्रमी
                        <?php } ?>&nbsp;&nbsp;&nbsp;
                        <?php if(isset($form_data->mar_40) && !empty($form_data->mar_40)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> मराठी ४० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> मराठी ४० शप्रमी
                        <?php } ?><br>
                        <?php if(isset($form_data->hin_30) && !empty($form_data->hin_30)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> हिंदी ३० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> हिंदी ३० शप्रमी
                        <?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if(isset($form_data->hin_40) && !empty($form_data->hin_40)) { ?>
                           <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> हिंदी ४० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> हिंदी ४० शप्रमी
                        <?php } ?><br>
                        <?php if(isset($form_data->eng_30) && !empty($form_data->eng_30)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> इंग्रजी ३० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> इंग्रजी ३० शप्रमी
                        <?php } ?>&nbsp;&nbsp;&nbsp;
                        <?php if(isset($form_data->eng_40) && !empty($form_data->eng_40)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> इंग्रजी ४० शप्रमी
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> इंग्रजी ४० शप्रमी
                        <?php } ?><br>
                        <?php if(isset($form_data->s_skill) && !empty($form_data->s_skill)) { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/checked.png"> स्पेशल स्किल इन कम्प्युटर टामयपिंग फॉर इंस्ट्रक्टर्स (कालावधी ३ महीने)
                        <?php } else { ?>
                            <img style="width: 13px;" src="<?php echo base_url()?>images/unchecked.png"> स्पेशल स्किल इन कम्प्युटर टामयपिंग फॉर इंस्ट्रक्टर्स (कालावधी ३ महीने)
                        <?php } ?> 
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">६.</td>
                    <td style="vertical-align: top;" width="50%">परिषदेचा संस्था नोंदणी क्रमांक व संस्था नोंदणी क्र. मिळालेचा दिनांक व संदर्भियपत्र क्र</td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        दिनांक:- <b><?php echo(isset($form_data->reg_date) && !empty($form_data->reg_date))?date('d-m-Y',strtotime($form_data->reg_date)):'-'?></b>&nbsp;&nbsp;&nbsp; संस्था नोंदणी क्र:-<b><?php echo(isset($form_data->reg_no) && !empty($form_data->reg_no))?$form_data->reg_no:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; संस्था नोंदणी क्र:-<b><?php echo(isset($form_data->reg_no2) && !empty($form_data->reg_no2))?$form_data->reg_no2:'-'?></b>
                    </td>
                </tr>
                <tr>
                    <td width="5%">७.</td>
                    <td width="50%">प्राचार्यांचे नांव </td>
                    <td>:</td>
                    <td>
                        <b><?php echo(isset($form_data->owner_name) && !empty($form_data->owner_name))?$form_data->owner_name:'-'?></b>
                    </td>
                </tr>
                <tr>
                    <td width="5%">८.</td>
                    <td width="50%">तपासणी अधिका-याचे नांव व पदनाम </td>
                    <td>:</td>
                    <td>
                        <b><?php echo(isset($form_data->officer_desc) && !empty($form_data->officer_desc))?$form_data->officer_desc:'-'?></b>
                    </td>
                </tr>
                <tr>
                    <td>९.</td>
                    <td>तपासणी / भेट दिनांक व वेळ</td>
                    <td>:</td>
                    <td>
                        दिनांक :&nbsp;&nbsp;<b><?php echo(isset($form_data->visite_date) && !empty($form_data->visite_date))?date('d-m-Y',strtotime($form_data->visite_date)):''?></b>
                        &nbsp;&nbsp;&nbsp;वेळ :&nbsp;&nbsp;
                        <!--<?php echo(isset($form_data->visite_time) && !empty($form_data->visite_time))?$form_data->visite_time:''?>-->
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">१०.</td>
                    <td>आवश्यक भौतिक व अन्य सुविधेचा तपशील (तक्त्यात संख्या लिहा) </td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
            <table width="100%" border="1" style="margin-top: 10px; margin-left: 10px; border-collapse: collapse;">
                <tr>
                    <td style="text-align: center; font-weight: bold;">अ.क्र.</td>
                    <td style="text-align: center; font-weight: bold;">सामग्री / सुविधा</td>
                    <td style="text-align: center; font-weight: bold;">यापूर्वीची उपलब्ध सामग्री / सुवीधा</td>
                    <td style="text-align: center; font-weight: bold;">वाढीव सामग्री / सुवीधा</td>
                    <td style="text-align: center; font-weight: bold;">शेरा (पुरेसे आहेत किंवा नाहीत)</td>
                </tr>
                <tr>
                    <td style="text-align: center;">१.</td>
                    <td> संगणक संच (सर्व्हर)</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->server_before) && !empty($form_data->server_before))?$form_data->server_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->server_after) && !empty($form_data->server_after))?$form_data->server_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->server_remark) && !empty($form_data->server_remark))?$form_data->server_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">२.</td>
                    <td>संगणक संच (क्लायंट)</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->client_before) && !empty($form_data->client_before))?$form_data->client_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->client_after) && !empty($form_data->client_after))?$form_data->client_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->client_remark) && !empty($form_data->client_remark))?$form_data->client_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">३.</td>
                    <td>स्कॅनर</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->scanner_bofore) && !empty($form_data->scanner_bofore))?$form_data->scanner_bofore:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->scanner_after) && !empty($form_data->scanner_after))?$form_data->scanner_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->scanner_remark) && !empty($form_data->scanner_remark))?$form_data->scanner_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">४.</td>
                    <td>लेजर / इंकजेट प्रिंटर</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->printer_before) && !empty($form_data->printer_before))?$form_data->printer_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->printer_after) && !empty($form_data->printer_after))?$form_data->printer_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->printer_remark) && !empty($form_data->printer_remark))?$form_data->printer_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">५.</td>
                    <td>खुर्च्या</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->chair_before) && !empty($form_data->chair_before))?$form_data->chair_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->chair_after) && !empty($form_data->chair_after))?$form_data->chair_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->chair_remark) && !empty($form_data->chair_remark))?$form_data->chair_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">६.</td>
                    <td>टेबल</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->table_before) && !empty($form_data->table_before))?$form_data->table_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->table_after) && !empty($form_data->table_after))?$form_data->table_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->table_remark) && !empty($form_data->table_remark))?$form_data->table_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">७.</td>
                    <td>स्टुल्स</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->stool_before) && !empty($form_data->stool_before))?$form_data->stool_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->stool_after) && !empty($form_data->stool_after))?$form_data->stool_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->stool_remark) && !empty($form_data->stool_remark))?$form_data->stool_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">८.</td>
                    <td>कपाटे</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->cabinet_before) && !empty($form_data->cabinet_before))?$form_data->cabinet_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->cabinet_after) && !empty($form_data->cabinet_after))?$form_data->cabinet_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->cabinet_remark) && !empty($form_data->cabinet_remark))?$form_data->cabinet_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">९.</td>
                    <td>रॅक्स</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->rack_before) && !empty($form_data->rack_before))?$form_data->rack_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->rack_after) && !empty($form_data->rack_after))?$form_data->rack_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->rack_remark) && !empty($form_data->rack_remark))?$form_data->rack_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">१०.</td>
                    <td>इतर साहीत्य</td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->other_before) && !empty($form_data->other_before))?$form_data->other_before:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->other_after) && !empty($form_data->other_after))?$form_data->other_after:'0'?></b>
                    </td>
                    <td style="text-align: center;">
                        <b><?php echo(isset($form_data->other_remark) && !empty($form_data->other_remark))?$form_data->other_remark:''?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 5px;">अ.क्र. ६ मध्ये आवश्यक टेबल नसल्यास त्या टेबलांऐवजी संगणकास आवश्यक जागेएवढा डायस उपलब्ध आहे काय ? ते तपासावे. </td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
            <table width="100%" style="margin: 20px;">
                <tr>
                    <td width="5%">अ.</td>
                    <td width="50%">वाढीव संगणक सामग्री खरेदीच्या पावत्या आहेत का </td>
                    <td>:</td>
                    <td>
                        <b><?php if($form_data->agreement=='Y') { ?>
                            होय
                        <?php } else { ?>
                            नाही
                        <?php } ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">ब.</td>
                    <td style="vertical-align: top;" width="50%">पावती क्रमांक व दिनांक नमुद करा </td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        <b><?php if (isset($form_data->receipt1) && !empty($form_data->receipt1)) {
                            echo '1)&nbsp;दिनांक&nbsp;:&nbsp;&nbsp;'.date('d-m-Y',strtotime($form_data->receipt1_date)).'';
                            echo '&nbsp;&nbsp;&nbsp;क्र :&nbsp;&nbsp;'.$form_data->receipt1.'<br>';
                        } ?>
                        <?php if (isset($form_data->receipt2) && !empty($form_data->receipt2)) {
                            echo '2)&nbsp;दिनांक&nbsp;:&nbsp;&nbsp;'.date('d-m-Y',strtotime($form_data->receipt2_date)).'';
                            echo '&nbsp;&nbsp;&nbsp;क्र :&nbsp;&nbsp;'.$form_data->receipt2.'<br>';
                        } ?>
                        <?php if (isset($form_data->receipt3) && !empty($form_data->receipt3)) {
                            echo '3)&nbsp;दिनांक&nbsp;:&nbsp;&nbsp;'.date('d-m-Y',strtotime($form_data->receipt3_date)).'';
                            echo '&nbsp;&nbsp;&nbsp;क्र :&nbsp;&nbsp;'.$form_data->receipt3.'<br>';
                        } ?></b>
                    </td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
            <table width="100%">
                <tr>
                    <td style="vertical-align: top;" width="5%">११.</td>
                    <td style="vertical-align: top;" width="50%">वाढीव सेटअप नुसार ब्रॉड बॅण्ड इंटरनेट कनेक्शन स्पीड आहे का ? </td>
                    <td>:</td>
                    <td>
                        <!-- <?php echo(isset($form_data->internet) && !empty($form_data->internet))?$form_data->internet:'-'?> -->
                        <b><?php if($form_data->internet=='Y') { ?>
                            होय
                        <?php } else { ?>
                            नाही
                        <?php } ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">१२.</td>
                    <td style="vertical-align: top;" width="50%">विज पुरवठा नसलेल्या वेळी पर्यायी सुविधा वाढवलेली आहे काय ? </td>
                    <td>:</td>
                    <td>
                        <!-- <?php echo(isset($form_data->inverter) && !empty($form_data->inverter))?$form_data->inverter:'-'?> -->
                        <b><?php if($form_data->inverter=='Y') { ?>
                            होय
                        <?php } else { ?>
                            नाही
                        <?php } ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">१३.</td>
                    <td style="vertical-align: top;" width="50%">वाढीव सेटअप नुसार संस्थेस जागा उपलब्ध आहे काय? </td>
                    <td>:</td>
                    <td>
                        <!-- <?php echo(isset($form_data->area) && !empty($form_data->area))?$form_data->area:'-'?> -->
                        <b><?php if($form_data->area=='Y' ) { ?>
                            होय
                        <?php } else { ?>
                            नाही
                        <?php } ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">१४.</td>
                    <td style="vertical-align: top;" width="50%">वाढीव सेटअप नुसार संस्थेने निदेशक वाढविले आहेत का ? <br>(एका सेटअप मागे एक निदेशक आवश्यक आहे.) </td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        <!-- <?php echo(isset($form_data->instructor) && !empty($form_data->instructor))?$form_data->instructor:'-'?> -->
                        <b><?php if($form_data->instructor=='Y') { ?>
                            होय
                        <?php } else { ?>
                            नाही
                        <?php } ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" width="5%">१५.</td>
                    <td style="vertical-align: top;" width="50%">नवीन / वाढीव निदेशकांची नांवे व त्यांची शैक्षणिक / व्यावसायिक पात्रता</td>
                    <td style="vertical-align: top;">:</td>
                    <td>
                        <b><?php if (isset($form_data->instructor_qual1) && !empty($form_data->instructor_qual1)) {
                            echo '1)&nbsp;'.$form_data->instructor_qual1.'<br>';
                        } ?></b>
                        <b><?php if (isset($form_data->instructor_qual2) && !empty($form_data->instructor_qual2)) {
                            echo '2)&nbsp;'.$form_data->instructor_qual2.'<br>';
                        } ?></b>
                        <b><?php if (isset($form_data->instructor_qual) && !empty($form_data->instructor_qual)) {
                            echo '3)&nbsp;'.$form_data->instructor_qual;
                        } ?></b>
                    </td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
            <table width="100%">
                <tr>
                    <td width="5%">१६.</td>
                    <td colspan="2">तपासणी अधिका-याचे अभिप्राय :<br><br></td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="padding-top: 20px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर संस्थे ची मी / आम्ही समक्ष भेट देवून पाहणी केली आहे. सदर संस्थेस सध्या 
                    &nbsp;<u><b><?php echo(isset($form_data->setup_allow) && !empty($form_data->setup_allow))?$form_data->setup_allow:'0'?></b></u>
                    &nbsp;सेटअप ची मान्यता आहे. या संस्थेने वाढीव
                    &nbsp;<u><b><?php echo(isset($form_data->setup_done) && !empty($form_data->setup_done))?$form_data->setup_done:'0'?></b></u>
                    &nbsp;सेटअप केलेले आहेत. संस्थेत एकूण दोन्ही मिळून
                    &nbsp;<u><b><?php echo(isset($form_data->total_setup) && !empty($form_data->total_setup))?$form_data->total_setup:''?></b></u>
                    &nbsp;सेटअप आहेत. सर्वतांत्रिक व भौतिक सुविधांची पूर्तता होत आहे.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर संस्थेची मी श्री / श्रीमती  &nbsp;&nbsp;&nbsp;
                    <u><b><?php echo(isset($form_data->inst_owner) && !empty($form_data->inst_owner))?$form_data->inst_owner:''?></b></u>&nbsp;&nbsp;&nbsp;&nbsp;पदनाम &nbsp;&nbsp;&nbsp;
                    <u><b><?php echo(isset($form_data->inst_owner_pos) && !empty($form_data->inst_owner_pos))?$form_data->inst_owner_pos:''?></b></u>&nbsp;&nbsp;
                    प्रत्यक्ष भेट देवून संस्थेतील कागदपत्रांची साधन सामुग्रीची पडताळणी केली आहे व दप्तरे / रजिस्टरमधील नोंदी तपासून पाहिल्या आहेत.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ही माहिती खोटी आढळल्यास मी व्यक्तिश: जबाबदार आहे.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;त्यामुळे सदर संस्थेच्या वाढीव सेटअप साठी मान्यता देण्यास स्पष्ट शिफारस आहे.<br>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="padding-top: 20px;">दिनांक :
                    <u><b><?php echo(isset($form_data->form_date) && !empty($form_data->form_date))?date('d-m-Y',strtotime($form_data->form_date)):''?></b></u><br>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>स्थळ :   
                    <u><b><?php echo(isset($form_data->place) && !empty($form_data->place))?$form_data->place:'-'?></b></u>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="5%">&nbsp;</td>
                    <td style="padding-top: 10px;">
                        तांत्रिक सहाय्यक / डेटा एन्ट्री ऑपरेटर स्वाक्षरी :
                    </td>
                    <td style="padding-top: 10px;">
                        तपासणी अधिकारी यांची स्वाक्षरी :
                    </td>
                </tr>
                <tr>
                    <td width="5%">&nbsp;</td>
                    <td> 
                        संपूर्ण नाव :&nbsp;&nbsp;<u><b><?php echo(isset($form_data->officer_name2) && !empty($form_data->officer_name2))?$form_data->officer_name2:'-'?></b></u>
                    </td>
                    <td>
                        संपूर्ण नाव :&nbsp;&nbsp;<u><b><?php echo(isset($form_data->officer_name) && !empty($form_data->officer_name))?$form_data->officer_name:'-'?></b></u>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        मोबाईल क्रमांक :&nbsp;&nbsp;<u><b><?php echo(isset($form_data->mobile1) && !empty($form_data->mobile1))?$form_data->mobile1:'-'?></b></u>
                    </td>
                    <td>
                        पदनाम व शिक्का :&nbsp;&nbsp;<u><b><?php echo(isset($form_data->officer_position) && !empty($form_data->officer_position))?$form_data->officer_position:'-'?></b></u>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    </td>
                    <td>
                        मोबाईल क्रमांक :&nbsp;&nbsp;<u><b><?php echo(isset($form_data->mobile2) && !empty($form_data->mobile2))?$form_data->mobile2:'-'?></b></u>
                    </td>
                </tr>
                <!-- <tr>
                    <td>&nbsp;</td>
                    <td> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;संपूर्ण नाव :
                    <?php echo(isset($form_data->officer_name) && !empty($form_data->officer_name))?$form_data->officer_name:'-'?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>संपूर्ण नाव : 
                    <?php echo(isset($form_data->officer_name2) && !empty($form_data->officer_name2))?$form_data->officer_name2:'-'?> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    पदनाम व शिक्का :
                    <?php echo(isset($form_data->officer_position) && !empty($form_data->officer_position))?$form_data->officer_position:'-'?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>मोबाईल क्रमांक : 
                    <?php echo(isset($form_data->mobile1) && !empty($form_data->mobile1))?$form_data->mobile1:'-'?> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    मोबाईल क्रमांक :
                    <?php echo(isset($form_data->mobile2) && !empty($form_data->mobile2))?$form_data->mobile2:'-'?> </td>
                </tr> -->
            </table>
            <hr style="border: 1px solid #3E4D5C;">
            सूचना: 
            <div style="padding-left: 20px;">
                १) तपासणी अहवालाच्या चार प्रती तयार कराव्यात. एक स्थळप्रत तपासणी अधिका-याने स्वत:कडे ठेवावी, दुसरी प्रत संस्थेस द्यावी. तर तिसरी प्रत शिक्षणाधिकारी (माध्य.) जि.प. / शिक्षण निरीक्षक, मुबई (उ/द/प) यांचेकडे पाठवावी.
            </div>
            <div style="padding-left: 20px;">
                २) तपासणी अहवालाच्या सर्व क्रमवार पृष्ठांची एकत्रित पी.डी.एफ <span class="marathi">(pdf)</span> फाईल तयार करून संबंधित संस्थेच्या <span class="marathi">LOGIN</span> द्वारे परीक्षा परिषदेच्या संकेतस्थळावर विहित मुदतीत अपलोड करावी.
            </div>
            <div style="padding-left: 20px;">
                ३) तपासणी अधिका-याने संस्थेच्या लॅब मध्ये उपस्थित राहून लॅबमधील साधनसामग्री, संस्थाचालक / प्राचार्य आणि संगणक तंत्रज्ञासह फोटो (सेल्फी) काढावा. फोटोमध्ये चार पेक्षा अधिक व्यक्ति नसाव्यात आणि तो फोटोही संस्थेच्या लॉगिन <span class="marathi">(Login)</span> द्वारे अपलोड करावा.
            </div>
            <div style="padding-left: 20px;">
                ४) पुढील काळात परीक्षा परिषदेकडून राज्यातील संस्थांची अचानक तपासणी केली जाईल. तपासणीत त्रुटी / अपूर्णता आढळणा-या संस्थांचा परीक्षा परिषदेने दिलेला संगणक अभ्यासक्रमाचा सांकेतांक (ई-प्रमाणपत्र) रद्द करण्यात येईल. तसेच अशा प्रकरणी मान्यतेच्या नुतनीकरणास शिफारस करणा-या अधिका-यांविरूध्द शिस्तभंगाची कारवाई प्रस्तावित केली जाईल.
            </div>
        </div>
    </body>
</html>