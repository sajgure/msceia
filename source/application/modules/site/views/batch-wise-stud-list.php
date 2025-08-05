<hr style="border-top: 2px solid #9d9a9a !important; padding: 10px !important;">
<table class="table table-striped table-bordered table-hover masterTable">
    <thead>
        <tr class="heading">
            <th style="text-align:center;width: 10%;">Sr. No</th>
            <th style="width: 20%;text-align: center;">Student Name</th>
            <th style="width: 20%;text-align: center;">Course</th>
            <th style="width: 20%;text-align: center;">Batch</th>
            <th style="width: 20%;text-align: center;">Seat Number</th>
            <th style="text-align:center;width: 10%;">Action</th>
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
                <?php echo(isset($key->course_name) && !empty($key->course_name))?$key->course_name:''?>
            </td>
            <td style="text-align: center;">
                <b><?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:''?></b>
            </td>
            <td style="text-align: center;">
                <?php echo(isset($key->seat_no) && !empty($key->seat_no))?$key->seat_no:''?>
            </td>
            <td style="text-align:center;">
                <?php $student_id = $this->encryptdecryptstring->encrypt_string($key->student_id); ?>
                <a target="_new" href="<?php echo base_url();?>print_msceia_bonafide/<?php echo $student_id; ?>" class="tooltips btn btn-sm green"  data-original-title="Print Bonafide" data-placement="top">
                <i class="fa fa-print "></i></a>
            </td>  
        </tr>
        <?php }
    } ?>
    </tbody>
</table>