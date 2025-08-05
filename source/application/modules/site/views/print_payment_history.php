<!DOCTYPE html>
<html>
<head>
	<style>
    table{
      width: 100% !important;
      margin: 1px !important;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;

    }
    th, td {
        border: 1px solid black;
        border-collapse: collapse;
        
    }
    th, td {
       padding:3px;
       font-size: 14px;
        
    }
     table{
      table-layout:fixed;
    }
  </style>
</head>
<body>
    <table style="width:100%;margin:1px;">
      <tr>
        <td width="100%" style="text-align:center;">
          <img style="width: 350px; height: 70px;" src="<?php echo base_url();?>images/logo.png">
        </td> 
      </tr>
    </table>
    <br>
    <table>
        <tr style="text-align:left;">
           	<th style="text-align: center;">Sr.No.</th>
            <th style="text-align: center;">Student Name</th>
            <th style="text-align: center;">Course Name</th>
            <th style="text-align: center;">Payment Amount</th>
            <th style="text-align: center;">Payment Date</th>
        </tr>
        <?php if(isset($payment_history) && !empty($payment_history))
    	{?>
	        <?php $i=1; foreach ($payment_history as $key)
	        { ?>
	        <tr style="text-align:left;">
	          <td width="8%" style="text-align: center;"><?php echo $i; ?> </td>
	          <td width="30%" style="text-align: center;text-transform: capitalize;"><?php echo $key->stud_full_name; ?></td>
            <td width="20%" style="text-align: center;"><?php echo $key->course_name;?></td>
	          <td width="17%" style="text-align: center;"><?php echo $key->payment_type; ?></td>
	          <td width="25%" style="text-align: center;"><?php echo date('d-m-Y - h:i A',strtotime($key->deposite_date));?></td>
	        </tr>
	        <?php $i++; } ?>
    	<?php } ?>
      </table>
</body>
</html>
