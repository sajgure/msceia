<?php if(isset($resultData) && !empty($resultData))
{ ?>
    <div style="border: 5px solid #3598dc; padding: 30px;">
        <center>
            <h2 class="bold uppercase">MSCEIA Result </h2>
        </center>
        <hr>
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <p style='font-weight: 700;'>Candidate Name</p>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <p>: &nbsp;
                            <?php echo $resultData->stud_full_name;?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <p style='font-weight: 700;'>Seat No</p>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <p>: &nbsp; <?php echo (isset($resultData->seat_no) && !empty($resultData->seat_no))?$resultData->seat_no:'';?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <p style='font-weight: 700;'>Institute Name </p>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <p>: &nbsp; <?php echo (isset($resultData->institute_name) && !empty($resultData->institute_name))?$resultData->institute_name:'';?>
                            (<?php echo (isset($resultData->institute_code) && !empty($resultData->institute_code))?$resultData->institute_code:'';?>)
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <p style='font-weight: 700;'>Course Name</p>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <p>: &nbsp; <?php echo (isset($resultData->course_full_name) && !empty($resultData->course_full_name))?$resultData->course_full_name:'';?> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 sidebar2"> 
                <img style="width: 120px; height: 120px; border: 2px solid #ddd;" class="pull-right" src="<?php echo base_url();?>uploads/student_photos/<?php echo (isset($resultData->photo_sign) && !empty($resultData->photo_sign))?$resultData->photo_sign:'default.png';?>"> 
            </div>
        </div>
        <br>
        <?php if($resultData->course_master_id==7) { ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table border width="100%" style="margin-bottom: 25px !important;">
                        <tr>
                            <th width="16%" style="text-align: center;"></th>
                            <th width="14%" style="text-align: center;">Objective</th>
                            <th width="14%" style="text-align: center;">Letter</th>
                            <th width="14%" style="text-align: center;">Balance Sheet</th>
                            <th width="14%" style="text-align: center;">Speed</th>
                            <th width="14%" style="text-align: center;">Mobile Computing</th>
                            <th width="14%" style="text-align: center;">Total Marks</th>
                        </tr>
                        <tr>
                            <td width="14%" style="text-align: center;">Total Marks</td>
                            <td width="14%" style="text-align: center;">40</td>
                            <td colspan="4" width="14%" style="text-align: center;">60</td>
                            <td width="15%" style="text-align: center;">100</td>
                        </tr>
                        <tr>
                            <td width="14%" style="text-align: center;">Passing Marks</td>
                            <td width="14%" style="text-align: center;">15</td>
                            <td colspan="4" width="14%" style="text-align: center;">35</td>
                            <td width="15%" style="text-align: center;">50</td>
                        </tr>
                        <tr style="background: #ddd;">
                            <td width="14%" style="text-align: center;">Obtain Marks</td>
                            <td width="14%" style="text-align: center;">
                                <?php echo (isset($resultData->objective_marks) && !empty($resultData->objective_marks))?$resultData->objective_marks:'0' ?><sup><?php echo (isset($resultData->grace1) && !empty($resultData->grace1))?$resultData->grace1:''; ?></sup></td>
                            <td colspan="4" width="14%" style="text-align: center;">
                                <?php echo (isset($resultData->group_marks) && !empty($resultData->group_marks))?$resultData->group_marks:'0' ?>
                            </td>
                            <td width="15%" style="text-align: center;">
                                <?php echo (isset($resultData->total_marks) && !empty($resultData->total_marks))?$resultData->total_marks:'0' ?>
                            </td>
                        </tr>
                    </table>
                    <table border width="100%" style="margin-bottom: 25px !important;">
                        <tr>
                            <td width="25%" style="text-align: center;"><b>Result</b></td>
                            <td width="25%" style="text-align: center;">
                                <?php $res= (isset($resultData->result) && !empty($resultData->result))?$resultData->result:'-';
                                if($res == 'Pass'){
                                    echo '<span class="green_span">PASS</span>';
                                } 
                                else{
                                    echo '<span class="red_span">FAIL</span>';
                                }?>
                            </td>
                            <td width="25%" style="text-align: center;"><b>Grade</b></td>
                            <td width="25%" style="text-align: center;">
                                <?php if(($resultData->total_marks)>=74.50){echo '<b>A</b>';}else if(($resultData->total_marks)>=59.50){echo '<b>B</b>';} else if(($resultData->total_marks)>=50){echo '<b>C</b>';}else{ echo '<span class="red_span">FAIL</span>';}?>
                            </td>
                        </tr>
                    </table>
                    <div class="actions pull-right"> 
                        <a href="<?php echo base_url();?>download-student-result/<?php echo $resultData->student_id ?>" target="_blank" class="btn blue btn-sm"><i class="fa fa-print"></i> Print</a> 
                        <a href="<?php echo base_url();?>view-student-result/<?php echo $resultData->student_id ?>" target="_blank" class="btn blue btn-sm"><i class="fa fa-search-plus"></i> View
                        </a> 
                    </div>
                </div>
            </div>
        <?php } 
        else { ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table border width="100%" style="margin-bottom: 25px !important;">
                        <tr>
                            <th width="16%" style="text-align: center;"></th>
                            <th width="14%" style="text-align: center;">Objective</th>
                            <th width="14%" style="text-align: center;">Email</th>
                            <th width="14%" style="text-align: center;">Letter</th>
                            <th width="14%" style="text-align: center;">Statement</th>
                            <th width="14%" style="text-align: center;">Speed</th>
                            <th width="14%" style="text-align: center;">Total Marks</th>
                        </tr>
                        <tr>
                            <td width="14%" style="text-align: center;">Total Marks</td>
                            <td width="14%" style="text-align: center;">25</td>
                            <td colspan="3" width="14%" style="text-align: center;">35</td>
                            <td width="14%" style="text-align: center;">40</td>
                            <td width="15%" style="text-align: center;">100</td>
                        </tr>
                        <tr>
                            <td width="14%" style="text-align: center;">Passing Marks</td>
                            <td width="14%" style="text-align: center;">10</td>
                            <td colspan="3" width="14%" style="text-align: center;">14</td>
                            <td width="14%" style="text-align: center;">16</td>
                            <td width="15%" style="text-align: center;">40</td>
                        </tr>
                        <tr style="background: #ddd;">
                            <td width="14%" style="text-align: center;">Obtain Marks</td>
                            <td width="14%" style="text-align: center;">
                                <?php echo (isset($resultData->objective_marks) && !empty($resultData->objective_marks))?$resultData->objective_marks:'0' ?><sup><?php echo (isset($resultData->grace1) && !empty($resultData->grace1))?$resultData->grace1:''; ?></sup></td>
                            <td colspan="3" width="14%" style="text-align: center;">
                                <?php echo (isset($resultData->group_marks) && !empty($resultData->group_marks))?$resultData->group_marks:'0' ?>
                            </td>
                            <td width="14%" style="text-align: center;">
                                <?php echo (isset($resultData->speed_marks) && !empty($resultData->speed_marks))?$resultData->speed_marks:'0' ?><sup><?php echo (isset($resultData->grace) && !empty($resultData->grace))?$resultData->grace:''; ?></sup></td>
                            <td width="15%" style="text-align: center;">
                                <?php echo (isset($resultData->total_marks) && !empty($resultData->total_marks))?$resultData->total_marks:'0' ?>
                            </td>
                        </tr>
                    </table>
                    <table border width="100%" style="margin-bottom: 25px !important;">
                        <tr>
                            <td width="25%" style="text-align: center;"><b>Result</b></td>
                            <td width="25%" style="text-align: center;">
                                <?php $res= (isset($resultData->result) && !empty($resultData->result))?$resultData->result:'-';
                                if($res == 'Pass'){
                                    echo '<span class="green_span">PASS</span>';
                                } 
                                else{
                                    echo '<span class="red_span">FAIL</span>';
                                }?>
                            </td>
                            <td width="25%" style="text-align: center;"><b>Grade</b></td>
                            <td width="25%" style="text-align: center;">
                                <?php if(($resultData->total_marks)>=74.50){echo '<b>A</b>';}else if(($resultData->total_marks)>=59.50){echo '<b>B</b>';} else if(($resultData->total_marks)>=50){echo '<b>C</b>';}else{ echo '<span class="red_span">FAIL</span>';}?>
                            </td>
                        </tr>
                    </table>
                    <div class="actions pull-right"> 
                        <a href="<?php echo base_url();?>download-student-result/<?php echo $resultData->student_id ?>" target="_blank" class="btn blue btn-sm"><i class="fa fa-print"></i> Print
                        </a> 
                        <a href="<?php echo base_url();?>view-student-result/<?php echo $resultData->student_id ?>" target="_blank" class="btn blue btn-sm"><i class="fa fa-search-plus"></i> View
                        </a> 
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } 
else { ?>
    <div style="border: 5px solid #3598dc;; padding: 30px;">
        <center>
            <h4><b>No Result Found, Please Contact to MSCEIA</b></h4>
        </center>
    </div>
<?php } ?>