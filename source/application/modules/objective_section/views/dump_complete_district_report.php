
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption"> <i class="fa fa-bars"></i>Complete District Report </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-resposive masterTable">
            <thead>
                <tr class="heading">
                    <th style="text-align:center;width: 40%;">Product Name</th>
                    <th style="text-align:center;width: 40%;">Quantity</th>
                    <th style="text-align:center;width: 20%;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($district_report_data) && !empty($district_report_data))
                {  $i=1;                     
                    foreach ($district_report_data as $key)
                    { ?>
                    <tr class="odd gradeX">   
                        <td style="text-align:center;">
                            <?php echo(isset($key->product_name) && !empty($key->product_name))?$key->product_name:''?>
                        </td>
                        <td style="text-align:center;">
                            <?php echo(isset($key->product_qty) && !empty($key->product_qty))?$key->product_qty:''?>
                        </td>
                        <td style="text-align:center;">
                            <?php echo(isset($key->product_price) && !empty($key->product_price))?$key->product_price:''?>
                        </td>
                    </tr>
                    <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>