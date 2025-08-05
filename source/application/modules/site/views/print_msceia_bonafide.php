<!DOCTYPE html>
<html>
    <head>
        <title><?php echo(isset($form_data->stud_full_name) && !empty($form_data->stud_full_name))?$form_data->stud_full_name:'-'?></title>
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
        body {            
            font-family: freeserif;
            font-size: 14px;
        }
        
        .english {
            font-family: Bookman Old Style, Arial, sans-serif;
        }
        </style>
    </head>
    <body>
        <br><br><br><br><br>
        <div>
            प्रति,<br>
            मा. आयुक्त,<br>
            महाराष्ट्र राज्य परीक्षा परिषद,<br>
            पुणे – १. <br>
        </div>
        <h4 style="text-align: center;">विषय: संस्थेत प्रविष्ठ विद्यार्थी संस्थेच्या पटावरील नियमित<br>विद्यार्थी असणेबाबत दाखला / प्रमाणपत्र</h4>
        <p style="text-align: justify; ">महोदय, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;असे प्रमाणित करण्यात येते की, श्री/श्रीमती/कु. <u><b class="english"><?php echo(isset($form_data->stud_full_name) && !empty($form_data->stud_full_name))?ucwords($form_data->stud_full_name):'-'?></b></u> आमच्या संस्थेतील नियमित व नियमानुसार प्रविष्ठ विद्यार्थी असून त्यांच्या आधार कार्ड वरील पत्त्यानुसार ते <b class="english"><?php echo(isset($form_data->residential_address) && !empty($form_data->residential_address))?ucwords($form_data->residential_address):'-';?></b> येथील मूळ रहिवासी आहेत.</p>
        <p style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;श्री/श्रीमती/कु. <u><b class="english"><?php echo(isset($form_data->stud_full_name) && !empty($form_data->stud_full_name))?ucwords($form_data->stud_full_name):'-'?></b></u> नोकरी निमित्त / शिक्षणा निमित्त / इतर कारणास्तव स्थलांतरित झाल्यामुळे <b class="english"><?php echo(isset($form_data->district_name) && !empty($form_data->district_name))?ucwords($form_data->district_name):'-'; ?></b> शहरात/ जिल्ह्यात / नजीकच्या परिसरात राहावयास आले आहेत / रोज येत आहेत. याबाबतचा योग्य तो पुरावा संस्थेच्या दप्तरी नोंद केलेला असून त्याबाबतच्या झेरॉक्स / स्कॅन प्रती संस्थेकडे घेतल्या आहेत.</p>
        <br>
        <table width="100%">
            <tr>
                <td style="text-align: center;">
                    <u> विद्यार्थ्याचे घोषणापत्र</u>                    
                </td>
                <td rowspan="2"  style="text-align: justify; padding: 20px;"><p>वरील माहिती चुकीची आढळून आल्यास सदर विद्यार्थाचा प्रवेश रद्द करण्यास  माझी कोणतीही हरकत नसेल, तसेच होणाऱ्या कारवाईस सदर विद्यार्थ्यासह संस्था जबाबदार राहील.</p> </td>
            </tr>
            <tr>
                <td  style="text-align: justify; padding: 20px;"><p>वरील माहिती खरी असून त्याबाबतचे पुरावे संस्थेत दाखल आहेत. यात तफावत आढळल्यास माझा प्रवेश रद्द करण्यास माझी कोणतीही हरकत नसेल व होणाऱ्या कारवाईससामोरे जाण्याची माझी तयारी आहे.</p></td>
            </tr>
            <tr>
                <td  style="text-align: center;">
                    <br><br><br><br><br><br>
                    विद्यार्थ्याचे नाव व सही
                </td>
                <td  style="text-align: center;">
                    <br><br><br><br><br><br><br>
                    संस्थाचालक/ प्राचार्य सही व शिक्का
                </td>
            </tr>
        </table>
            <hr style="border: 1px solid #3E4D5C;">        
    </body>
</html>