<!DOCTYPE html>
<html>
    <head>
        <title>Hallticket</title>
        <style>
            body {
                font-family: freeserif;
                font-size: 12px;
            }
            .english {
                font-family: "Times New Roman", Times, serif;
            }
            table {
                width: 100% !important;
                margin: 1px !important;
            }
            table,
            th,
            td {
                border: 1px solid #8994a5;
                border-collapse: collapse;
            }
            th,
            td {
                border: 1px solid #8994a5;
                border-collapse: collapse;
            }
            th,
            td {
                padding: 2px;
                font-size: 12px;
            }
            table {
                table-layout: fixed;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="4" style="text-align: center;">
                    <img style="width: 400px; height: 80px;" src="./images/logo.png" />
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center; font-size: 14px;" class="english">
                    <b>June 2025</b>
                </td>
            </tr>
            <tr style="text-align: left !important;" class="">
                <th style="width: 16.5%; text-align: justify !important;" class="english">Student Details</th>
                <td colspan="2" style="width: 68%; text-align: left !important;" class="english">
                    <b>Name of Candidate : </b><span style="text-transform: capitalize;"><?php echo (isset($student_data->stud_full_name) && !empty($student_data->stud_full_name))?$student_data->stud_full_name:'';?>&nbsp;&nbsp;&nbsp;</span>
                    <br />
                    <b>Seat No&nbsp;&nbsp;&nbsp; : </b>&nbsp;
                    <span style="font-size: 10px;"><?php echo (isset($student_data->seat_no) && !empty($student_data->seat_no))?$student_data->seat_no:'';?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Password : </b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->exam_password) && !empty($student_data->exam_password))?$student_data->exam_password:'';?></span><br />
                    <b>Handicap : </b><span style="font-size: 10px;"><?php echo (isset($student_data->handicapped) && !empty($student_data->handicapped))?ucwords($student_data->handicapped):'';?></span>
                </td>
                <td rowspan="3" style="text-align: center;">
                    <center><img style="width: 125px; height: 170px;" src="<?php echo base_url();?>uploads/student_photos/<?php echo (isset($student_data->photo_sign) && !empty($student_data->photo_sign))?$student_data->photo_sign:'default.png';?>" /></center>
                </td>
            </tr>
            <tr>
                <th style="width: 16.5%; text-align: justify !important;" class="english">Institute Details</th>
                <td colspan="2" style="width: 68%; text-align: left !important;" class="english">
                    <b>Institute Name : </b><span style="font-size: 10px;"><?php echo (isset($student_data->institute_name) && !empty($student_data->institute_name))?$student_data->institute_name:'';?></span><br />
                    <b>Institute Code :</b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->institute_code) && !empty($student_data->institute_code))?$student_data->institute_code:'';?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile No : </b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->institute_contact) && !empty($student_data->institute_contact))?$student_data->institute_contact:'';?></span><br />
                    <b style="text-align: left !important;">Address : </b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->institute_address) && !empty($student_data->institute_address))?$student_data->institute_address:'';?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <th style="width: 16.5%; text-align: justify !important;" class="english">Center Details</th>
                <td colspan="2" style="width: 68%; text-align: left !important;" class="english">
                    <b>Center Name : </b><span style="font-size: 10px;"><?php echo (isset($student_data->institute_name) && !empty($student_data->institute_name))?$student_data->institute_name:'-';?></span><br />
                    <b>Center Code : </b>
                    <span style="font-size: 10px;"> <?php echo (isset($student_data->institute_code) && !empty($student_data->institute_code))?$student_data->institute_code:'-';?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile No : </b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->institute_contact) && !empty($student_data->institute_contact))?$student_data->institute_contact:'-';?></span><br />
                    <b>Address : </b>
                    <span style="font-size: 10px;"><?php echo (isset($student_data->institute_address) && !empty($student_data->institute_address))?$student_data->institute_address:'-';?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <th class="english">Exam Subject</th>
                <th class="english">Exam Date</th>
                <th class="english">Exam Time</th>
                <th class="english">Exam Coordinator</th>
            </tr>
            <tr>
                <td class="english" rowspan="2">
                    <center><?php echo (isset($student_data->course_name) && !empty($student_data->course_name))?$student_data->course_name:'-';?></center>
                </td>
                <td fixed class="english">
                    <center>28-05-2025 To 07-06-2025</center>
                </td>
                <td class="english">
                    <center><?php echo "9.30 AM To 6.30 PM" ?></center>
                </td>
                <td class="english" rowspan="2"></td>
            </tr>
            <tr>
                <td fixed class="english" style="height:20px;">
                    
                </td>
                <td class="english">
                    
                </td>
            </tr>
            <tr style="border-bottom: none;">
                <td colspan="4">
                    <!-- <img style="width:550px; height: 150px;" src="./images/exam2.png"> -->
                    <div>
                        <center><h2>विद्यार्थ्यांना सुचना</h2></center>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <!-- <img style="width:550px; height: 150px;" src="./images/exam2.png"> -->
                    <div>
                        १. सदर परिक्षा राज्य संघटने तर्फे सराव परीक्षा म्हणून घेण्यात येते.<br />
                        २. राज्य संघटने तर्फे सराव परीक्षेत पास झालेल्या विद्यार्थ्यांना परीक्षेचे प्रमाणपत्र देण्यात येईल.<br />
                        ३. शासनाच्या परिक्षेच्या नियमानुसारच सराव परीक्षा घेण्यात येईल.<br />
                        ४. सराव परीक्षेत काही अडचणी असल्यास <span class="english">Exam Coordinator</span> शी संपर्क साधावा.<br />
                        ५. विद्यार्थ्यांनी परीक्षेच्या वेळेच्या अगोदर ३० मिनीटे परीक्षा केंद्रावर उपस्थीत रहावे.<br />
                        ६. विद्यार्थ्यांनी परीक्षेला येताना ओळखपत्र (<span class="english">ID</span> कार्ड) सोबत आणावे.<br />
                        ७. परीक्षेचा कालावधी ९० मिनिटांचा राहील.<br />
                        ८. <span class="english">MSCEIA</span> कडून विद्यार्थ्यांना परीक्षेच्या हार्दिक शुभेच्या.
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
