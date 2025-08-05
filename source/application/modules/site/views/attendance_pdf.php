<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100% !important;
                margin: 1px !important;
            }
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th,
            td {
                padding: 3px;
                font-size: 15px;
            }
            table {
                table-layout: fixed;
            }
        </style>
    </head>
    <body>
        <table style="width: 100%; margin: 1px;">
            <tr>
                <td width="100%" style="text-align: center;">
                    <img style="width: 600px; height: 80px;" src="<?php echo base_url();?>images/attendance_list25.png" />
                </td>
            </tr>
        </table>
        <br />
        <?php if(isset($attendance_data) && !empty($attendance_data))
        {?>
            <table>
                <tr style="text-align: left;">
                    <th width="10%" style="background-color: #9c8786;">Sr. No</th>
                    <th width="33%" style="background-color: #9c8786;">Student Name</th>
                    <th width="20%" style="background-color: #9c8786;">Course</th>
                    <th width="20%" style="background-color: #9c8786;">Seat No</th>
                    <th width="15%" style="background-color: #9c8786;">Password</th>
                    <th width="10%" style="background-color: #9c8786;">Sign</th>
                </tr>
                <?php $i=1; foreach ($attendance_data as $key)
                { ?>
                    <tr style="text-align: left;">
                        <td width="8%" style="text-align: center;"><?php echo $i; ?></td>
                        <td width="30%" style="text-transform: capitalize;"><?php echo $key->stud_full_name; ?></td>
                        <td width="20%"><?php echo $key->course_name; ?></td>
                        <td width="20%"><?php echo $key->seat_no;?></td>
                        <td width="5%" style="text-align: center;"><?php echo $key->exam_password;?></td>
                        <td width="25%"></td>
                    </tr>
                <?php $i++; } ?>
            </table>
        <?php } ?>
    </body>
</html>
