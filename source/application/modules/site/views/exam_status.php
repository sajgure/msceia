<html>
    <head>
        <style>
            body{width:100%;  margin:0;padding: 0; font-family: 'BookmanOld'}
            table{width: 100%;border-collapse: collapse;}
            #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 150px; text-align: center; }
     		#footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 150px; }
            th{background-color: #ccc;border:1px solid black; color: #000; font-weight: bold;} 
            td{font-size: 12px;}
            #page{position:relative;top:50px;}
        </style>  
    </head>
    <body>
	   	<div id="page">
	   	    <table style="width:100%;margin:1px;">
              <tr>
                <td width="100%" style="text-align:center;">
                  <img style="width: 300px; height: 50px;" src="<?php echo base_url();?>images/logo.png">
                </td> 
              </tr>
            </table>
			<hr><br>
			<table width="100%" style=" width:100%; " class="table table-bordered" border="1">
				<tr>
					<th style="font-size:13px;" width="10%;">Sr No.</th>
					<th style="font-size:13px;" width="20%;">Seat No.</th>
					<th style="font-size:13px;" width="10%;">Password</th>
					<th style="font-size:13px;" width="25%;">Student Name</th>
					<th style="font-size:13px;" width="18%;">Course Name</th>
					<th style="font-size:13px;" width="17%;">Exam Status</th>
				</tr>
				<?php if(isset($stud_data) && !empty($stud_data))
		        { $i=1;
		            foreach($stud_data as $row)
		            { ?>
			        	<tr>
			        		<td style="text-align: center;"><?php echo $i++; ?></td>
							<td><?php echo (isset($row->seat_no) && !empty($row->seat_no))?$row->seat_no:'';?> </td>
							<td><?php echo (isset($row->exam_password) && !empty($row->exam_password))?$row->exam_password:'';?> </td>
							<td><?php echo (isset($row->first_name) && !empty($row->first_name))?$row->first_name:'';?> <?php echo (isset($row->father_name) && !empty($row->father_name))?$row->father_name:'';?> <?php echo (isset($row->surname) && !empty($row->surname))?$row->surname:'';?></td>
							<td><?php echo (isset($row->course_name) && !empty($row->course_name))? $row->course_name :'';?></td>
							<td style="text-align: center;"><?php echo (isset($row->exam_status) && !empty($row->exam_status))?$row->exam_status:'';?></td>
						</tr>
					<?php }
  				} ?>
			</table>
		</div>
	</body>
	</head>
</html>