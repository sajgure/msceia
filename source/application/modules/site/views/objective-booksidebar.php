<style type="text/css">
    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
        z-index: 2;
        color: #E02222 !important;
        background-color: #f9f9f9 !important;
        border-color: #337ab7;
    }
</style>
<div class="main">
    <div class="container">
        <div class="row margin-bottom-40 ">
          <!--  <?php $active = $this->uri->segment(1); ?> -->
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix active">
                        <a href="<?php echo base_url();?>my-profile"><i class="fa fa-angle-right"></i> HOME</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='change-password')?'active':''; ?>">
                        <a href="<?php echo base_url();?>change-password"><i class="fa fa-angle-right"></i> MY OREDERS</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='')?'active':''; ?>">
                        <a href="<?php echo base_url();?>"><i class="fa fa-angle-right"></i> BACK TO MSCEIA</a>
                    </li>
                   
                  
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE LEVEL JAVASCRIPTS -->