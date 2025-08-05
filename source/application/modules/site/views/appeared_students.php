<html >
<head>
<title>Appeared Students</title>
</head>
<style type="text/css">
  body{
    font-size: 14px;
    text-align: center;
  }
</style>
<body style="width:95%; margin:auto;">
  <center>
    <img style="width: 270px;" src="./images/logo.png">
  </center>

    <?php if(isset($stud_data) && !empty($stud_data))
    { $i=1;?>
        <center>
          <h3><?php echo $stud_data[0]->institute_name; ?> (<?php echo $stud_data[0]->institute_code; ?>)</h3>
          <table width="100%" border="1" style="border-collapse:collapse">
            <tr style="background-color: #9c8786;">
              <th style="width:9%;"><div align="center" style="padding: 4px; background-color: #9c8786;"> Sr No</div></th>
              <th style="width:40%;"><div align="center" style="padding: 4px; background-color: #9c8786;"> Candidate Name</div></th>
              <th style="width:25%;"><div align="center" style="padding: 4px; background-color: #9c8786;">Course Name</div></th>
              <th style="width:20%;"><div align="center" style="padding: 4px; background-color: #9c8786;">Seat Number</div></th>
              <th style="width:15%;"><div align="center" style="padding: 4px; background-color: #9c8786;">Password</div></th>
            </tr>
            <?php  foreach ($stud_data as $key ) 
            { ?>
              <tr>
                <td style="text-align:center;padding: 4px;width:9%;"><div align="center" style="padding: 4px;"><?php echo $i; ?> </div></td>
                <th style="text-align:left;padding: 4px;width:40%;"><span align="center" style="padding: 4px;"><?php echo (isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'';?></span></th>
                <td style="text-align:center;padding: 4px;width:25%;"><span align="center" style="padding: 4px;"><?php echo (isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:'';?> </span></td>
                <td style="text-align:left;padding: 4px;width:20%;"><span align="center" style="padding: 4px;"><?php echo (isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:'';?> </span></td>
                <td style="text-align:center;padding: 4px;width:15%;"><span align="center" style="padding: 4px;"><?php echo (isset($key->student_password) && !empty($key->student_password))?$key->student_password:'';?> </span></td>
              </tr>
            <?php $i++;} ?>
          </table>
          <center><p style="font-size: 15px;"><b>NOTE :- </b>Above Seat number and Password is only for the Elearn Practice Software, not for the Exam.</p></center>
        </center>
<?php } 
else
{
  echo '<center><h3>You have not paid exam fees of your registered student, Please do the payment and proceed further.</h3></center>';
}?>
</body>
</html>
