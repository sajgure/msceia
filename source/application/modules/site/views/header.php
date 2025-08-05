<style type="text/css">
.header-navigation ul > li.active > a,
.header-navigation ul > li > a:hover,
.header-navigation ul > li > a:focus,
.header-navigation ul > li.open > a,
.header-navigation ul > li.open > a:hover,
.header-navigation ul > li.open > a:focus {
    background: #fcfcfc;
    text-decoration: none;
}

.header-navigation > ul > li > a {
    color: #333;
    display: block;
    padding: 30px 12px 30px;
}

.page-header-fixed .header {
    /*height: 85px;*/
    border-bottom: 1px solid #eee;
    z-index: 99 !important;
}

.reduce-header .header-navigation > ul > li > a {
    padding: 20px 12px 23px;
}
.reduce-header .site-logo {
    padding-top: 7px !important;
}
.modal-dialog{
    margin-top: 100px !important;
    width: 34% !important;
}
.c-bgimage{
    padding: 39px; 
    background-image: url(<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png);
    background-repeat: no-repeat;
    margin-left: 60px;
    margin-top: 20px;
    width: 100%;
    background-size: 70%;
}
@media only screen and (max-width: 600px) {
  .modal-dialog{
    margin-top: 100px !important;
    width: 94% !important;
  }
  .c-bgimage{
    padding: 39px; 
    background-image: url(<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png);
    background-repeat: no-repeat;
    margin-left: 40px;
    margin-top: 30px;
    width: 100%;
    background-size: 70%;
}
}
</style>
<?php $institute_code = $this->session->userdata('institute_code');?>
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-whatsapp"></i><a href="https://web.whatsapp.com/" target="_new" style="text-decoration: none;"><span style="color: #333;font-weight: 501;">+91 7028685505</span></a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="mailto:msceiateam@gmail.com" style="text-decoration: none;"><span style="color: #333;font-weight: 501;">msceiateam@gmail.com</span></a></li>
                        <li><!--<i class="fa fa-phone"></i><a href="tel:080 6903 4000" style="text-decoration: none;"><span style="color: #333;font-weight: 501;">080 6903 4000</span></a>--></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline" style="float: right;">
                        <?php $id = $this->session->userdata('institute_code');
                        $inst_id = $this->session->userdata('institute_id');
                        if(isset($id) && !empty($id)) { ?>
                            <li> 
                                <a class="label label-warning" target="_blank" href="<?php echo base_url(); ?>upload_exam_status/<?php echo $id; ?>" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">View Exam Status</a>
                                <a class="label label-success" href="<?php echo base_url(); ?>my-profile" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">My Profile</a> 
                                <a class="label label-danger" href="<?php echo base_url(); ?>site_logout" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">Logout</a> 
                            </li>
                            <li> <span style="color: #333;font-weight: 501;">Welcome To <?php echo $id?></span> </li>
                        <?php } 
                        else { ?>
                            <li> 
                                <a class="label label-primary" data-toggle="modal" href="" data-target="#basic" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">Log In </a> 
                                <a href="<?php echo base_url();?>sign-up" class="label label-success" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;margin-left: 10px">Sign Up!</a>
                            </li>
                            <li> 
                                <span style="color: #333;font-weight: 501;">Welcome To MSCEIA</span> 
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade c-content-login-form in" id="basic" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div align="">
                <div class="modal-content c-square">
                    <div class=" logincenter" style="padding: 0px !important;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 23px;"> <span aria-hidden="true" style="line-height: 2;padding: 15px;">×</span></button>
                        <div class="c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold img-responsive" style=""> </div>
                    </div>
                    <div class="modal-body" style="padding: 0px 40px 30px 40px;">
                        <h3 style="text-align: center; font-weight: 600; margin-bottom: 22px;">Institute Login</h3>
                        <form action="chk_login" method="POST" id="chk_login">
                            <div class="alert alert-danger alert-wrong-user" style="display:none;"> <span>Please enter the appropriate fields.</span> </div>
                            <div class="alert alert-success" style="display:none;"> <span>Please wait, checking login...</span> </div>
                            <div class="form-group">
                                <label for="login-username" class="hide">Enter Your Username</label>
                                <input type="text" class="form-control input-lg c-square" name="username" placeholder="Enter Username" autofocus="" autocomplete="off"> </div>
                            <div class="form-group">
                                <label for="login-password" class="hide">Password</label>
                                <input type="password" class="form-control input-lg c-square" name="password" placeholder="Enter Password"> </div>
                            <input type="hidden" name="role_id" value="3">
                            <div class="form-group modal-footer">
                               <div>
                                 <button type="submit" class="btn blue btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login chk_login">Login</button>  
                                </div>
                                <div>
                                <!-- <a href="javascript:;" data-toggle="modal" data-target="#forgot-password" data-dismiss="modal" class="c-btn-forgot mt-1" style="float: right;">Forgot Password ?</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade c-content-login-form in" id="forgot-password" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px;width: 38%;">
            <div class="modal-content c-square" style="padding: 12px !important;">
                <div class=" logincenter" style="border-bottom: 1px solid #e5e5e5;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 23px;"> <span aria-hidden="true" style="line-height: 2;padding: 15px;">×</span></button>
                    <h4 class="modal-title bold" style="margin-bottom: 16px;margin-left: 10px;">तुमचा पासवर्ड विसरलात ?<br></h4>
                </div>
                <div class="modal-body" style="padding: 36px 0 70px 0;">
                    <form action="save_forgot_pass_site" id="save_forgot_pass_site"  data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="index" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control c-square" name="institute_mail" id="institute_mail" placeholder="Registered Email" autocomplete="off">
                            </div>
                            <div class="col-md-2" style="padding-left: 6px!important;">
                                <button type="submit" class="btn blue common_save" data-pk="institute_id">Send </button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container"> 
            <a class="site-logo" href="<?php echo base_url();?>" style="width: 26%;margin-right: 10px;padding-top: 12px;padding-bottom: 0px !important;"><img src="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png" alt="MSCEIA" style="width: 100%;" class="header-img"></a> <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <div class="header-navigation pull-right font-transform-inherit">
                <?php $active = $this->uri->segment(1); ?>
                    <ul>
                        <li class="<?php echo ($active=='')?'active':''; ?>">
                            <a href="<?php echo base_url();?>"> <i class="fa fa-home"></i> होम </a>
                        </li>
                        <li class="<?php echo ($active=='committee-members')?'active':''; ?>">
                            <a href="<?php echo base_url();?>committee-members"> <i class="fa fa-user"></i> राज्य-कार्यकारिणी </a>
                        </li>
                        <?php $id = $this->session->userdata('institute_code');  
                            if(isset($id) && !empty($id)) { ?>
                                <li class="dropdown <?php echo ($active=='sabhasad')?'active':''; ?>">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"> <i class="fa fa-users"></i> वेबसाईट वापर पात्रता </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url();?>sabhasad">वेबसाईट वापर पात्र संस्था</a></li>
                                        <li><a href="<?php echo base_url();?>uploads/gr/Membership_Form.pdf" target="_blank" download>Download MemberShip Form</a></li>
                                    </ul>
                                </li>
                            <?php }?>
                        <li class="<?php echo ($active=='gallery')?'active':''; ?>">
                            <a href="<?php echo base_url();?>gallery"> <i class="fa  fa-file-image-o"></i> छायाचित्र </a>
                        </li>
                        <li class="<?php echo ($active=='suchna')?'active':''; ?>">
                            <a href="<?php echo base_url();?>suchna"> <i class="fa  fa-file-text "></i> सूचना (GR) </a>
                        </li>
                        <li class="<?php echo ($active=='faq-que')?'active':''; ?>">
                            <a href="<?php echo base_url();?>faq-que"> <i class="fa  fa-tags"></i> प्रश्न(FAQ) </a>
                        </li>
                        <li class="<?php echo ($active=='contact-us')?'active':''; ?>">
                            <a href="<?php echo base_url();?>contact-us"> <i class="fa fa-phone"></i> संपर्क (मदत) </a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    <!-- Header END