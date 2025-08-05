<html>
    <head>
        <title></title>
    </head>
    <style type="text/css">
        body {
            font-size: 12px;
            text-align: center;
        }        
    </style>
    <body style="width:95%; margin:auto;">
        <center><img style="width: 450px; height: 76px;" src="<?php echo base_url(); ?>images/logo.png"></center>
        <br> <hr />&nbsp;
        
        <?php if(isset($stud_data) && !empty($stud_data))
        { $i=1;?>
            <center>
                <h3 style="text-align: center"><?php echo $stud_data[0]->institute_name; ?> (Course : 30 WPM & 40 WPM )</h3>
                <br>          
                <table width="100%" border="1" style="border-collapse:collapse">
                    <tr>
                        <th>
                            <div align="center"> Sr No</div>
                        </th>
                        <th>
                            <div align="center"> Candidate Name</div>
                        </th>
                        <th>
                            <div align="center">Seat No</div>
                        </th>
                        <th>
                            <div align="center">Course Name</div>
                        </th>
                        <th>
                            <p align="center">Objective</p>
                        </th>
                        <th>
                            <div align="center">Email</div>
                        </th>
                        <th>
                            <div align="center">Letter</div>
                        </th>
                        <th>
                            <div align="center">Statement </div>
                        </th>
                        <th>
                            <div align="center">Speed </div>
                        </th>
                        <th>
                            <div align="center">Total marks </div>
                        </th>
                        <th>
                            <div align="center">Result </div>
                        </th>
                    </tr>
                    <?php  foreach ($stud_data as $key ) 
                    {
                        $objective=(isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0';
                        $mail=(isset($key->email_marks) && !empty($key->email_marks))?$key->email_marks:'0'; 
                        $world=(isset($key->letter_marks) && !empty($key->letter_marks))?$key->letter_marks:'0';
                        $excel=(isset($key->statement_marks) && !empty($key->statement_marks))?$key->statement_marks:'0';
                        $speed=(isset($key->speed_marks) && !empty($key->speed_marks))?$key->speed_marks:'0'; 
                        $mwe=$mail+$world+$excel; 
                        $grace=(isset($resultData->grace) && !empty($resultData->grace))?$resultData->grace:''; ?>
                        <tr>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $i; ?>
                                </div>
                            </td>
                            <td style="text-align: left">
                                <p align="left">
                                    <?php echo $key->first_name.' '.$key->father_name.' '.$key->surname;?>
                                </p>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $key->seat_no; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo (isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:'';?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $objective; ?>
                                </div>
                            </td>
                            <td colspan="3" style="border-left:0px; " style="text-align: center">
                                <div align="center">
                                    <?php echo $mwe; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $speed;?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $tmarks=$objective+$mwe+$speed.''.$grace; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php $result='pass';
                                        if(($objective < 10) || ($speed < 16 ) || ($mwe < 14))
                                        {
                                          $result='Fail';
                                        } 
                                        echo $result; ?>
                                </div>
                            </td>
                        </tr>
                    <?php $i++;} ?>
                </table>
            </center>
        <?php } ?>
        <br>
        <?php if(isset($stud_data_ssd) && !empty($stud_data_ssd))
        { $i=1;?>
            <center>
                <h3>Special Skill</h3>
                <table width="100%" border="1" style="border-collapse:collapse">
                    <tr>
                        <th>
                            <div align="center">Sr No</div>
                        </th>
                        <th>
                            <div align="center">Candidate Name</div>
                        </th>
                        <th>
                            <div align="center">Seat No</div>
                        </th>
                        <th>
                            <div align="center">Course Name</div>
                        </th>
                        <th>
                            <p align="center">Objective</p>
                        </th>
                        <th>
                            <div align="center">Letter</div>
                        </th>
                        <th>
                            <div align="center">Balance Sheet </div>
                        </th>
                        <th>
                            <div align="center">Speed </div>
                        </th>
                        <th>
                            <div align="center">Mobile Computing </div>
                        </th>
                        <th>
                            <div align="center">Total marks </div>
                        </th>
                        <th>
                            <div align="center">Result </div>
                        </th>
                    </tr>
                    <?php  foreach ($stud_data_ssd as $key ) 
                    {
                        $objective=(isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0';
                        $mobile=(isset($key->mobile_marks) && !empty($key->mobile_marks))?$key->mobile_marks:'0'; 
                        $world=(isset($key->letter_marks) && !empty($key->letter_marks))?$key->letter_marks:'0';
                        $excel=(isset($key->statement_marks) && !empty($key->statement_marks))?$key->statement_marks:'0';
                        $speed=(isset($key->speed_marks) && !empty($key->speed_marks))?$key->speed_marks:'0'; 
                        $mwe=$world+$excel+$mobile+$speed;              
                        $grace=(isset($resultData->grace) && !empty($resultData->grace))?$resultData->grace:''; ?>
                        <tr>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $i; ?>
                                </div>
                            </td>
                            <td style="text-align: left">
                                <p align="left">
                                    <?php echo $key->first_name.' '.$key->father_name.' '.$key->surname;?>
                                </p>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $key->seat_no; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo (isset($key->course_full_name) && !empty($key->course_full_name))?$key->course_full_name:'';?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $objective; ?>
                                </div>
                            </td>
                            <td colspan="4" style="border-left:0px; " style="text-align: center">
                                <div align="center">
                                    <?php echo $mwe; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php echo $tmarks=$objective+$mwe.''.$grace; ?>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <div align="center">
                                    <?php $result='pass';
                                        if(($objective < 15) || ($mwe < 35))
                                        {
                                          $result='Fail';
                                        } 
                                        echo $result; ?>
                                </div>
                            </td>
                        </tr>
                    <?php $i++;} ?>
                </table>
            </center>
        <?php }
        if(!$stud_data && !$stud_data_ssd)
        {
            echo '<center><h3>No Record Found Please Contact To MSCEIA</h3></center>';
        }?>
    </body>
</html>