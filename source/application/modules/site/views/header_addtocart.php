<style type="text/css">
  .header-navigation ul > li.active > a, .header-navigation ul > li > a:hover, .header-navigation ul > li > a:focus, .header-navigation ul > li.open > a, .header-navigation ul > li.open > a:hover, .header-navigation ul > li.open > a:focus {
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
}
.reduce-header .header-navigation > ul > li > a {
    padding: 32px 12px 17px;
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
                        <li><i class="fa fa-phone"></i><a href="tel:080 6903 4000" style="text-decoration: none;"><span style="color: #333;font-weight: 501;">080 6903 4000</span></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 additional-nav">
                  <ul class="list-unstyled list-inline" style="float: right;">
                      <?php $id = $this->session->userdata('institute_code');  
                      if(isset($id) && !empty($id)) { ?>
                        <li>
                          <a class="label label-success" href="<?php echo base_url(); ?>my-profile" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">My Profile</a>
                          <a class="label label-danger" href="<?php echo base_url(); ?>site_logout" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">Logout</a>
                        </li>
                        <li>
                          <span style="color: #333;font-weight: 501;">Welcome <?php echo $id?></span>
                        </li>
                      <?php } 
                      else { ?>
                        <li>
                          <a class="label label-primary" data-toggle="modal" href="" data-target="#basic" style="color: white;font-weight: 501;text-decoration: none;border-radius: 5px !important;">Log In </a>
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
    <div class="modal fade c-content-login-form in" id="basic" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" style="margin-top: 129px;">
        <div align="">
          <div class="modal-content c-square">
            <div class=" logincenter" style="padding: 0px !important;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 23px;">
                  <span aria-hidden="true" style="line-height: 2;padding: 15px;">×</span></button>
                  <div class="c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold img-responsive" style="padding: 59px; background-image: url(<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png);background-repeat: no-repeat;margin-left: 48px;margin-top: 20px;width: 100%;">
                  </div>
            </div>
            <div class="modal-body" style="padding: 10px 40px 30px 40px;">
                <h3 class="c-font-uppercase c-font-bold c-font-black c-font-18 c-font-slim" style="text-align: center;margin-top: -16px;"><b>Institute Login</b></h3>
                <form action="chk_login" method="POST" id="chk_login">
                  <div class="alert alert-danger alert-wrong-user" style="display:none;">
                    <span>Please enter the appropriate fields.</span>
                  </div>
                  <div class="alert alert-success" style="display:none;">
                    <span>Please wait, checking login...</span>
                  </div>
                  <div class="form-group">
                    <label for="login-username" class="hide">Enter Your Username</label>
                    <input type="text" class="form-control input-lg c-square" name="username" placeholder="Enter Username" autofocus="">
                  </div>
                  <div class="form-group">
                    <label for="login-password" class="hide">Password</label>
                    <input type="password" class="form-control input-lg c-square" name="password" placeholder="Enter Password">
                  </div>
                  <input type="hidden" name="roleId" value="3">
                  <div class="form-group">
                    <button type="submit" class="btn blue btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login chk_login">Login</button>
                    <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot" style="margin-left: 335px">Forgot Password ?</a>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <span class="c-text-account">Don't Have An Account Yet ?</span>
              <a href="<?php echo base_url();?>sign-up" class="btn blue c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Signup!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header">
      <div class="container">
        <a class="site-logo" href="<?php echo base_url();?>" style="width: 26%;margin-right: 10px;padding-top: 16px;padding-bottom: 0px !important;"><img src="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png" alt="MSCEIA" style="width: 100%;" class="header-img"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>       
        <div class="header-navigation pull-right font-transform-inherit">
             <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="<?php echo base_url('site/objective_shop'); ?>" class="top-cart-info-count"><span><?php echo count($this->cart->contents()); ?></span></a>
            <a href="javascript:void(0);" class="top-cart-info-value"><roshan class="currency_div"><!-- <span class="fa fa-inr"></span></roshan> <roshan class="currency_amt_div">0</roshan> --></a>
            <!--  -->
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 250px;">
               <!--  <li>
                  <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count" name="">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li> -->
               
              </ul>
              <div class="text-right">
                <a href="shop-shopping-cart.html" class="btn btn-default">View Cart</a>
                <a href="shop-checkout.html" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        </div>
      </div>
    </div>
    <!-- Header END