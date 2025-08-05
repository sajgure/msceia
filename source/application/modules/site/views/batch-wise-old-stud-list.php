<?php  
$institute_code = $this->session->userdata('institute_code');
$instituteid = $this->session->userdata('institute_id');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>

<style type="text/css">
    .red
    {
        font-weight: 600;
        color: red;
    }
    .green
    {
        font-weight: 600;
        color: green;
    }
    .green
    {
        font-weight: 600;
        color: green;
    }
    .orange
    {
        font-weight: 600;
        color: #ff5b0b;
    }
</style>
<hr style="border-top: 2px solid #9d9a9a !important; padding: 10px !important;">
<table class="table table-striped table-bordered table-hover masterTable">
    <thead>
        <tr class="heading">
            <th style="text-align:center;width: 9%;">Sr. No</th>
            <th style="width: 26%;">Student Name</th>
            <th style="width: 10%;">Seat No.</th>
            <th style="width: 15%;">Course</th>
            <th style="width: 15%;">Batch</th>
            <th style="width: 25%;">Status</th>
        </tr>
    </thead>
    <tbody> 
    <?php if(isset($stud_data) && !empty($stud_data))
    {  $i=1;                     
        foreach ($stud_data as $key)
        { ?>
        <tr>                              
            <td  style="text-align:center;">
                <?php echo $i++ ?>
            </td>
            <td>
                <?php echo(isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:'';?>
            </td>
            <td>
                <?php echo(isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:''?>
            </td>
            <td>
                <?php echo(isset($key->course_name) && !empty($key->course_name))?$key->course_name:''?>
            </td>
            <td>
                <b><?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:''?></b>
            </td>
            <td>
            	<?php $status = (isset($key->student_status) && !empty($key->student_status))?$key->student_status:''?>
            	<?php if($status=='not_appear') 
            	{ ?>
            		<b>Payment :</b> <span class="red">Not Appeared</span> 
            	<?php }  
            	elseif ($status=='appear') 
        		{ ?>
        			<b>Payment :</b> <span class="orange">Appeared</span> 
        		<?php } 
        		elseif ($status=='payment') 
            	{ ?>
            		<b>Payment :</b> <span class="green">Payment Received</span>
            	<?php } ?>
                <br>
                <?php $exam = (isset($key->exam_status) && !empty($key->exam_status))?$key->exam_status:''?>
                <?php if($exam=='Pending') 
                { ?>
                    <b>Exam :</b> <span class="red">Pending</span> 
                <?php }  
                elseif ($exam=='Upload') 
                { ?>
                    <b>Exam :</b> <span class="orange">Upload</span> 
                <?php } 
                elseif ($exam=='Complete') 
                { ?>
                    <b>Exam :</b> <span class="green">Complete</span>
                <?php } ?>
                
                 <div style="float: right">
                    <?php if($key->result == 'Pass'){ ?>
                        <a target="_blank" href="<?php echo base_url();?>certificates-pdf-batch/<?php echo $key->batch_id ?>/<?php  echo $instituteid; ?>/<?php echo $key->student_id; ?>" > <i class="fa fa-file-pdf-o" style="font-size: 40px" aria-hidden="true"></i></a>
                    <?php } ?>  
                </div> 
                
                
            </td>
        </tr>
        <?php }
    } ?>
    </tbody>
</table>