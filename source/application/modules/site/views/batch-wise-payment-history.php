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
</style>
<hr style="border-top: 2px solid #9d9a9a !important; padding: 10px !important;">
<table class="table table-striped table-bordered table-hover masterTable">
    <thead>
        <tr class="heading">
            <th style="text-align:center;width: 9%;">Sr. No</th>
            <th style="width: 11%;">Total Student</th>
            <th style="width: 11%;">Total Amount</th>
            <th style="width: 13%;">Payment Id</th>
            <th style="width: 15%;">Payment Date</th>
            <th style="width: 15%;">Payment Time</th>
            <th style="width: 15%;">Payment Status</th>
            <th style="width: 11%;text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody> 
    <?php if(isset($paymentHistory) && !empty($paymentHistory))
    {  $i=1;                     
        foreach ($paymentHistory as $key)
        { ?>
        <tr>                              
            <td  style="text-align:center;">
                <?php echo $i++ ?>
            </td>
            <td>
                <?php echo(isset($key->total_student) && !empty($key->total_student))?$key->total_student:'';?>
            </td>
            <td>
                <?php echo(isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:''?>
            </td>
            <td>
                <?php echo(isset($key->payment_id) && !empty($key->payment_id))?$key->payment_id:''?>
            </td>
            <td>
                <b><?= ((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('d-m-Y',strtotime($key->deposite_date)):'') ?></b>
            </td>
            <td>
                <b><?= ((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('h:i A',strtotime($key->deposite_date)):'')  ?></b>
            </td>
            <td>
            	<?php $status = (isset($key->status) && !empty($key->status))?$key->status:''?>
            	<?php if($status=='success') 
            	{ ?>
            		 <span class="green">Success</span> 
            	<?php }  
            	else 
        		{ ?>
        			 <span class="red">Failed</span> 
        		<?php }  ?>
        		
            </td>
            <td>
                <?php $pay_id = $this->encryptdecryptstring->encrypt_string($key->payment_id);
                    if($status=='success'){                
                        echo '<center><a href="'.base_url().'print_payment_history/'.$pay_id.'" class="tooltips btn btn-sm green" target="_new" data-original-title="Print Payment Receipt" data-placement="top"><i class="fa fa-print "></i></a></center>';
                 } ?>
            </td>
        </tr>
        <?php }
    } ?>
    </tbody>
</table>