<html >
    <head>
    <title>Result</title>
        <style type="text/css">
        body{
            font-size: 12px;
            text-align: center;
        }
        td,th{ padding: 3px; }
        </style>
    </head>
    <body style="width:95%; margin:auto;">
        <?php if(isset($student_data) && !empty($student_data))
        { ?>
           	<center>
                <img style="width: 450px; height: 76px;" src="<?php echo base_url(); ?>images/logo.png"><br>
                <hr/>&nbsp;</p>
                <table width="100%" border="1" style="border-collapse:collapse">
                    <tr>
                    <th width="25%" style="text-align: left;"><div align="left">CANDIDATES NAME</div> </th>
                  <td width="35%"><?php echo $student_data->stud_full_name;?></td  >
                    <th width="20%" style="text-align: left;"><div align="left">SEAT NO.</div> </th>
                  <td width="20%"><?php echo (isset($student_data->seat_no) && !empty($student_data->seat_no))?$student_data->seat_no:'';?></td>
                    </tr>
                    <tr>
                    <th style="text-align: left;"><div align="left">NAME OF THE EXAM</div></th>
                  <td><?php echo (isset($student_data->course_full_name) && !empty($student_data->course_full_name))?$student_data->course_full_name:'';?> </td>
                    <th style="text-align: left;"><div align="left">MONTH-YEAR</div></th>
                    <td>DEC-2024 </td>
                    </tr>
                    <tr>
                    <th style="text-align: left;"><div align="left">EXAMINATION HELD IN</div></th>
                    <td><?php echo (isset($student_data->institute_name) && !empty($student_data->institute_name))?$student_data->institute_name:'';?></td>
                    <th style="text-align: left;"><div align="left">INSTITUTE CODE</div></th>
                    <td><?php echo (isset($student_data->institute_code) && !empty($student_data->institute_code))?$student_data->institute_code:'';?></td>
                    </tr>            
                </table>
                <p>&nbsp;</p>
                <?php if($student_data->course_master_id!=7) { ?>
                    <table width="100%" border="1" style="border-collapse:collapse; margin-bottom:10px; ">
                        <tr>
                            <th ><div align="center"></div></th>
                            <th ><div align="center">Objective</div> </th>
                            <th><div align="center">Email</div>   </th>
                            <th><div align="center">Letter</div>   </th>
                            <th><div align="center">Statement </div>   </th>
                            <th ><div align="center">Speed </div></th>
                            <th ><div align="center">Total marks </div></th>
                        </tr>
                        <tr>
                            <th style="text-align: left;"><div align="center">Total Marks</div></th>
                            <td style="text-align: center;"><div align="center">25</div></td>
                            <td colspan="3" style="border-left:0px; text-align: center;"><div align="center">35</div></td>
                            <td style="text-align: center;"><div align="center">40</div></td>
                            <td style="text-align: center;"><div align="center">100</div></td>
                        </tr>
                        <tr>
                            <th style="text-align: left;"><div align="center">Passing Marks </div></th>
                            <td style="text-align: center;"><div align="center">10</div></td>
                            <td colspan="3" style="text-align: center;"><div align="center">14</div></td>
                            <td style="text-align: center;"><div align="center">16</div></td>
                            <td style="text-align: center;"><div align="center">40</div></td>
                        </tr>
                        <tr>
                            <th style="text-align: left;"><div align="center">Obtained Marks</div></th>
                            <td style="text-align: center;"><div align="center"><?php echo (isset($student_data->objective_marks) && !empty($student_data->objective_marks))?$student_data->objective_marks:'0' ?><sup><?php echo (isset($student_data->grace1) && !empty($student_data->grace1))?$student_data->grace1:''; ?></sup></div></td>
                            <td colspan="3" style="border-left:0px; text-align: center;"><div align="center"><?php echo (isset($student_data->group_marks) && !empty($student_data->group_marks))?$student_data->group_marks:'0' ?> </div></td>
                            <td style="text-align: center;"><div align="center"><?php echo (isset($student_data->speed_marks) && !empty($student_data->speed_marks))?$student_data->speed_marks:'0' ?><sup><?php echo (isset($student_data->grace) && !empty($student_data->grace))?$student_data->grace:''; ?><sup></div></td>
                            <td style="text-align: center;"><div align="center"><?php echo (isset($student_data->total_marks) && !empty($student_data->total_marks))?$student_data->total_marks:'0' ?></div></td>
                        </tr>
                        </table>
                        <table width="100%" border="1" style="border-collapse:collapse">
                        <tr>
                            <th style="width: 25%;"><div align="center">Result </div></th>
                            <th style="width: 25%;"><div align="center"><?php echo (isset($student_data->result) && !empty($student_data->result))?$student_data->result:'-' ?></div> </th>
                            <th style="width: 25%;"><div align="center">Grade </div></th>
                          <th style="width: 25%;"><div align="center"><?php if(($student_data->total_marks)>=74.50){echo 'A';}else if(($student_data->total_marks)>=59.50){echo 'B';} else if(($student_data->total_marks)>=50){echo 'C';}else{ echo 'Fail';}?></div> </th>
                        </tr>
                    </table>
                <?php } else { ?>
                    <table width="100%" border="1" style="border-collapse:collapse; margin-bottom:10px; ">
                        <tr>
                            <th ><div align="center"></div></th>
                            <th ><div align="center">Objective</div> </th>
                            <th><div align="center">Letter</div>   </th>
                            <th><div align="center">Balance Sheet</div>   </th>
                            <th><div align="center">Speed </div>   </th>
                            <th ><div align="center">Mobile Computing </div></th>
                            <th ><div align="center">Total Marks </div></th>
                        </tr>
                        <tr>
                            <th ><div align="center">Total Marks</div></th>
                            <th><div align="center">40</div></th>
                            <th colspan="4" style="border-left:0px;"><div align="center">60</div></th>
                            <th><div align="center">100</div></th>
                        </tr>
                        <tr>
                            <th><div align="center">Passing Marks </div></th>
                            <th><div align="center">15</div></th>
                            <th colspan="4"><div align="center">35</div></th>
                            <th><div align="center">50</div></th>
                        </tr>
                        <tr>
                            <th><div align="center">Obtained Marks</div></th>
                            <th><div align="center"><?php echo (isset($student_data->objective_marks) && !empty($student_data->objective_marks))?$student_data->objective_marks:'0' ?><sup><?php echo (isset($student_data->grace1) && !empty($student_data->grace1))?$student_data->grace1:''; ?></sup></div></th>
                            <th colspan="4" style="border-left:0px; "><div align="center"><?php echo (isset($student_data->group_marks) && !empty($student_data->group_marks))?$student_data->group_marks:'0' ?></div></th>
                            <th><div align="center"><?php echo (isset($student_data->total_marks) && !empty($student_data->total_marks))?$student_data->total_marks:'0' ?></div></th>
                        </tr>
                        </table>
                        <table width="100%" border="1" style="border-collapse:collapse">
                        <tr>
                            <th style="width: 25%;"><div align="center">Result </div></th>
                            <th style="width: 25%;">
                                <div align="center">
                                <?php echo (isset($student_data->result) && !empty($student_data->result))?$student_data->result:'-' ?> 
                                </div> 
                            </th>
                            <th style="width: 25%;"><div align="center">Grade </div></th>
                          <th style="width: 25%;"><div align="center" ><?php if(($student_data->total_marks)>=74.50){echo 'A';}else if(($student_data->total_marks)>=59.50){echo 'B';} else if(($student_data->total_marks)>=50){echo 'C';}else{ echo 'Fail';}?></div> </th>
                        </tr>
                    </table>
                <?php } ?>
                <p>&nbsp;</p>
                <table border="0" width="100%" style="border-collapse:collapse">
                    <tr>
                    <td><b>Note:</b></td>
                    </tr>
                </table>
                <table width="100%" border="1" style="border-collapse:collapse">
                    <tr>
                    <td> 
                        <ul>
                        <li><b>(*)</b> Indicate Grace.</li>
                        <?php if($student_data->course_master_id!=7) { ?>
                            <li>Total Markas = Objective + (Email + Letter + Statement) + Speed.</li>
                            <li>26 + 15 + 10 =51/100.</li>
                        <?php } else { ?>
                            <li>Total Markas = Objective + (Letter + Balance Sheet + Speed + Mobile Computing).</li>
                            <li>15 + 35 =50/100.</li>
                        <?php } ?>                            
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <ul>
                        <li><b>A Grade : </b>74.50 & Above. </li>
                        <li><b>B Grade : </b>59.50 To 74.49</li>
                        <li><b>C Grade : </b>50.00 To 59.49</li>
                        <li><b>Fail Grade : </b>Below than 50.00</li>
                        </ul>
                    </td>
                    </tr>
                </table>
                <p align="left">&nbsp;</p>
            </center>
            <!-- <div style="page-break-before: always;"></div> -->
        <?php } ?>
    </body>
</html>
