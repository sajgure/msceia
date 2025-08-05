<style type="text/css">
.page-header-fixed .header {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99 !important;
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
<div class="header">
    <div class="container"> 
        <a class="site-logo" href="<?php echo base_url();?>objective-shop" style="width: 26%;margin-right: 10px;padding-top: 12px;padding-bottom: 13px !important;">
            <img src="<?php echo base_url();?>assets/site/assets/frontend/layout/img/logos/1.png" alt="MSCEIA" style="width: 100%;" class="header-img">
        </a> 
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <div class="top-cart-block" style="margin-top: 26px !important;">
            <div class="top-cart-info">
                <span class="top-cart-info-count">
                    <?php echo count($this->cart->contents()); ?> items
                </span>
                <span class="top-cart-info-value">
                    <roshan class="currency_div">
                        <span class="fa fa-inr"></span>
                    </roshan> 
                    <roshan class="currency_amt_div">
                        <?php echo $this->cart->total()?>
                    </roshan>
                </span>
            </div> <i class="fa fa-shopping-cart"></i>
            <div class="top-cart-content-wrapper">
                <div class="top-cart-content">
                    <ul class="scroller" style="height: 150px;">
                        <?php $cart = $this->cart->contents(); 
                        if(isset($cart) && !empty($cart)) 
                        { $i=1;
                            foreach($cart as $items) 
                            { 
                                if($items['options']['type'] == 'objective_books')
                                { ?>
                                    <li>
                                        <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/objective_product_photos/<?php echo $items['product_image']?>" alt="Rolex Classic Watch" height="12%" width="8%" style="margin-top: 8px;"></a>
                                        <span class="javascript:void(0);"> x <?php echo $items['qty']; ?></span> 
                                        <strong style="width: 150px;"><a href="javascript:void(0);"><?php echo $items['name']; ?></a></strong>
                                        <em style="width: 70px;"><i class="fa fa-inr"></i><roshan class="currency_amt_div"><?php echo ($items['price']*$items['qty']); ?></roshan></em>
                                        <a href="JavaScript:void(0);" class="del-goods delete_cart_item" rel="<?php echo(isset($items['rowid']) && !empty($items['rowid']))?$items['rowid']:''?>" rev="objective_remove_cart">&nbsp;</a>
                                    </li> 
                                <?php }
                                elseif($items['options']['type'] == 'gcc_tbc_books')
                                { ?>
                                    <li>
                                        <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/gcc_tbc_product_photos/<?php echo $items['product_image']?>" alt="Rolex Classic Watch" height="12%" width="8%" style="margin-top: 8px;"></a>
                                        <span class="javascript:void(0);"> x <?php echo $items['qty']; ?></span> 
                                        <strong style="width: 150px;"><a href="javascript:void(0);"><?php echo $items['name']; ?></a></strong>
                                        <em style="width: 70px;"><i class="fa fa-inr"></i><roshan class="currency_amt_div"><?php echo ($items['price']*$items['qty']); ?></roshan></em>
                                        <a href="JavaScript:void(0);" class="del-goods delete_cart_item" rel="<?php echo(isset($items['rowid']) && !empty($items['rowid']))?$items['rowid']:''?>" rev="objective_remove_cart">&nbsp;</a>
                                    </li> 
                                <?php } ?>
                            <?php  }
                        } 
                        else 
                        {?>
                            <li>
                            <center>Your Cart is Empty</center>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php $cart = $this->cart->contents(); 
                    if(isset($cart) && !empty($cart)) 
                    {?>
                        <div class="text-right">
                            <a href="<?php echo base_url();?>gcc-tbc-book-shop-view-cart" class="btn blue">View Cart</a>
                            <a href="<?php echo base_url();?>gcc-tbc-book-shop-checkout" class="btn btn-primary">Checkout</a>
                        </div>
                    <?php } ?>
                </div>
            </div>             
        </div>
    </div>
</div>