
<?php $active = $this->uri->segment(1); ?>
<div class="sidebar col-md-3 col-sm-5">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        <li class="list-group-item clearfix <?php echo ($active=='objective-shop')?'active':''; ?>">
            <a href="<?php echo base_url();?>objective-shop"><i class="fa fa-angle-right"></i> Home</a>
        </li>
        <li class="list-group-item clearfix <?php echo ($active=='my-orders')?'active':''; ?>">
            <a href="<?php echo base_url();?>my-orders"><i class="fa fa-angle-right"></i> My Orders</a>
        </li>
        <li class="list-group-item clearfix <?php echo ($active=='my-profile')?'active':''; ?>">
            <a href="<?php echo base_url();?>my-profile"><i class="fa fa-angle-right"></i> Back To MSCEIA</a>
        </li>
    </ul>
</div>