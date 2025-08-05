<style type="text/css">
    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
        z-index: 2;
        color: #E02222 !important;
        background-color: #f9f9f9 !important;
        border-color: #337ab7;
    }
    .sidebar .list-group-item {
      font-weight: 600 !important;
    }
</style>
<div class="main">
    <div class="container">
        <div class="row margin-bottom-40 ">
            <?php $active = $this->uri->segment(1); ?>
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix <?php echo ($active=='my-profile')?'active':''; ?>">
                        <a href="<?php echo base_url();?>my-profile"><i class="fa fa-angle-right"></i> माझे खाते</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='change-password')?'active':''; ?>">
                        <a href="<?php echo base_url();?>change-password"><i class="fa fa-angle-right"></i> पासवर्ड बदला</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='')?'active':''; ?>">
                        <a href="<?php echo base_url();?>objective-shop"><i class="fa fa-angle-right"></i> GCC TBC Objective Books 30 / 40</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='')?'active':''; ?>">
                        <a href="<?php echo base_url();?>gcc-tbc-shop"><i class="fa fa-angle-right"></i> GCC TBC Theory Books 30 / 40 </a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='student-registration')?'active':''; ?>">
                        <a href="<?php echo base_url();?>student-registration"><i class="fa fa-angle-right"></i> विद्यार्थी नोंदणी  </a>
                    </li>
                    <!--<li class="list-group-item clearfix <?php echo ($active=='student-registration-using-excel')?'active':''; ?>">-->
                    <!--    <a href="<?php echo base_url();?>student-registration-using-excel"><i class="fa fa-angle-right"></i> विद्यार्थी नोंदणी एक्सेल वापरुन </a>-->
                    <!--</li>-->
                    <li class="list-group-item clearfix <?php echo ($active=='institute-stud-list')?'active':''; ?>">
                        <a href="<?php echo base_url();?>institute-stud-list"><i class="fa fa-angle-right"></i>विद्यार्थी यादी  </a>
                    </li>
                    <!--<li class="list-group-item clearfix <?php echo ($active=='hallticket')?'active':''; ?>">-->
                    <!--    <a href="<?php echo base_url();?>hallticket"><i class="fa fa-angle-right"></i> हॉलतिकीट </a>-->
                    <!--</li>-->
                    <li class="list-group-item clearfix <?php echo ($active=='pariksharthi')?'active':''; ?>">
                        <a href="<?php echo base_url();?>pariksharthi"><i class="fa fa-angle-right"></i> परिक्षार्थी </a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='download-link')?'active':''; ?>">
                        <a href="<?php echo base_url();?>download-link"><i class="fa fa-angle-right"></i>डाउनलोड</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='old-student-list')?'active':''; ?>">
                        <a href="<?php echo base_url();?>old-student-list"><i class="fa fa-angle-right"></i> जुने विद्यार्थी </a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='fees')?'active':''; ?>">
                        <a href="<?php echo base_url();?>fees"><i class="fa fa-angle-right"></i>फी नोंदणी</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='renewal-form')?'active':''; ?>">
                        <a href="<?php echo base_url();?>renewal-form"><i class="fa fa-angle-right"></i>रिन्यूअल फॉर्म</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='msceia-bonafide')?'active':''; ?>">
                        <a href="<?php echo base_url();?>msceia-bonafide"><i class="fa fa-angle-right"></i> MSCEIA बोनाफाइड  </a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='new-renewal-form')?'active':''; ?>">
                        <a href="<?php echo base_url();?>new-renewal-form"><i class="fa fa-angle-right"></i> वाढीव संगणक सेटअप फॉर्म </a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='student-result')?'active':''; ?>">
                        <a href="<?php echo base_url();?>student-result"><i class="fa fa-angle-right"></i>निकाल</a>
                    </li>
                    <li class="list-group-item clearfix <?php echo ($active=='certificates')?'active':''; ?>">
                        <a href="<?php echo base_url();?>certificates"><i class="fa fa-angle-right"></i>Certificate</a>
                    </li>
                    <!-- <li class="list-group-item clearfix <?php echo ($active=='track-courier')?'active':''; ?>">
                        <a href="<?php echo base_url();?>track-courier"><i class="fa fa-angle-right"></i>ट्रॅक कुरिअर</a>
                    </li> -->
                     <li class="list-group-item clearfix <?php echo ($active=='payment-history')?'active':''; ?>">
                        <a href="<?php echo base_url();?>payment-history"><i class="fa fa-angle-right"></i>Payment History</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE LEVEL JAVASCRIPTS -->