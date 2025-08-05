<style type="text/css">
.blink {
    animation: blink 2s steps(1, end) infinite;
}

@keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>MSCEIA</h2>
                <p style="text-align: justify;">महाराष्ट्र स्टेट कॉमर्स एजुकेशनल इन्स्टिटुट्स असोसिएशनची 50 वर्षात होणारी वाटचाल ही 21 व्या शतकात गतिमान करतानाच जगत होत असलेल्या संगणकीय युगात आपणच मागे का ? हा प्रश्न मणी बाळगून राज्य संघटनेदवारे www.msceia.in ही वेबसाइट निर्माण करून संस्था चालकांना संपर्काचे महत्वाचे साधन उपलब्ध करून दिले आहे.</p>
                <p><a target="_blank" href="https://www.youtube.com/watch?v=G0Y_6_ssKrY"><i style="font-size: 25px; color: rgb(234,67,53); " class="fa fa-youtube-play"> </i> Prof. Prakash Karale On Zee 24 Taas </a></p>
                <p><a target="_blank" href="https://youtu.be/hFMoeGA_aT8"><i style="font-size: 25px; color: rgb(234,67,53); " class="fa fa-youtube-play"> </i> msceia GCC-TBC introduction </a></p>
                <p><a target="_blank" href="https://youtu.be/BZyH9mej-AM"><i style="font-size: 25px; color: rgb(234,67,53); " class="fa fa-youtube-play"> </i> MOBILE APP INFORMATION </a></p>
                <?php $id = $this->session->userdata('institute_code');  
                if(isset($id) && !empty($id)) 
                { ?>
                    <h4 class="margin-bottom-10">Download Softwares</h4>
                    <ul class="social-footer download_link list-unstyled list-inline ">
                        <!-- <li><a href="https://dl.tvcdn.de/download/TeamViewer_Setup.exe"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/teamviewer.jpg"></a></li> -->
                        <li><a href="https://download.anydesk.com/AnyDesk.exe"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/anydesk.png"></a></li>
                        <li><a href="uploads/sw/msceia-installer.exe" download=""><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>images/favicon.png"></a></li>
                        <li><a href="http://go.microsoft.com/fwlink/?linkid=149156"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/silverlight.jpg"></a></li>
                        <li><a href="<?php echo base_url();?>uploads/sw/Wamp_Setup.zip"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/WampServer.png"></a></li>
                        <li><a href="http://www.mediafire.com/download/fwqag6s9kmqdezp/ISM_6.2_Software_Licences_from_CDAC.zip"><img style="height: 20px; width: 30px;" src="<?php echo base_url();?>/images/ism.png"></a></li>
                        <li><a href="https://ftp.mozilla.org/pub/firefox/releases/43.0/win32/en-US/Firefox%20Setup%2043.0.exe"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/firefox.png"></a></li>
                        <li><a href="https://drive.google.com/uc?id=1QAl_waKJj_WqebMD9AFlxjpG-bKejQxx&amp;export=download"><img style="height: 20px; width: 20px;" src="<?php echo base_url();?>/images/compare.ico"></a></li>
                    </ul>
                <?php }?>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-2 col-sm-6 pre-footer-col">
                <h2>Our Links</h2>
                <ul class="">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li><a href="<?php echo base_url();?>committee-members"> राज्य-कार्यकारिणी </a></li>
                    <li><a href="<?php echo base_url();?>sabhasad">सभासद संस्था</a></li>
                    <li><a href="<?php echo base_url();?>gallery"> छायाचित्र</a></li>
                    <li><a href="<?php echo base_url();?>suchna">सूचना</a></li>
                    <li><a href="<?php echo base_url();?>faq-que">प्रश्न(FAQ)</a></li>
                    <li><a href="<?php echo base_url();?>contact-us">संपर्क</a></li>
                    <li><a href="<?php echo base_url();?>privacy-policy">Privacy Policy</a></li>
                    <!-- <li><a href="http://mcadc.in" target="new" class="closewin">Visit MCADC</a></li> -->
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 pre-footer-col">
            <?php $id = $this->session->userdata('institute_code');  
            if(isset($id) && !empty($id)) 
            { ?>
                <h2>Our Contacts</h2> <address class="margin-bottom-40">
                <?php /* <span><i class="fa fa-phone f_left color_dark" style="font-size:20px; color:yellow;"></i> <a href="tel:020-71969223" style="font-size:20px; color:yellow;"> 020-71969223  </a></span><br> */ ?>
                <?php /*<span><i class="fa fa-phone f_left color_dark" style="font-size:20px; color:yellow;"></i> <a href="tel:020-71969223" style="font-size:20px; color:yellow;"> 020-68281401  </a></span><br> */ ?>
            <?php 
                $contact = array("+91 9130805343","+91 7249843390","+91 9607795343" );
                shuffle($contact);
                foreach($contact as $cont) { ?>
                <i class="fa fa-phone f_left color_dark"></i> <a href="tel:<?php echo $cont; ?>"> <?php echo $cont; ?>  </a></span><br> 
                <?php } ?> 
                <br>
                <i class="fa fa-whatsapp f_left color_dark"></i> <a href="https://web.whatsapp.com/" target="_new"> +91 7028685505  </a><br> 
                <i class="fa fa-envelope f_left color_dark"></i> <a href="mailto:msceiateam@gmail.com" target="_blank">msceiateam@gmail.com</a>
                <?php $id = $this->session->userdata('institute_code');  
                if(isset($id) && !empty($id)) 
                { ?>
                    <img src="<?php echo base_url();?>images/app_qr_20241.png" style="width:90%; margin-top:20px;">
                    <!--<p style="font-size:14px;margin-top: 5px;">QR code for MSCEIA mobile app</p>-->
                <?php }?>
            </address>
            <?php }?>
                <!-- <img src="<?php echo base_url();?>/images/app_qr.png" style="width:40%; margin-top:-25px;"> --></div>
            <!-- END BOTTOM CONTACTS -->
            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h3>Contact Us</h3>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="contact" id="contact" role="form" data-apikey="5681648d-91d6-4371-a911-1497734d0016" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="input-icon right"> <i class="fa"></i>
                                    <input type="text" value="" name="name" class="form-control input-sm" placeholder="Enter Full Name" required> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon right"> <i class="fa"></i>
                                    <input type="text" value="" name="email" class="form-control input-sm" placeholder="Enter Email" required> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon right"> <i class="fa"></i>
                                    <input type="text" value="" name="mobile_number" class="form-control input-sm" placeholder="Enter Mobile Number" required>
                                    <input type="hidden" class="form-control" name="status" id="status">
                                    <input type="hidden" class="form-control" name="reply" id="reply"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon right"> <i class="fa"></i>
                                    <textarea rows="4" name="message" class="form-control input-sm" placeholder="Type Your Message..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-right:13px">
                            <button type="submit" class="btn btn-sm green common_save" style="border:1px solid #FFF;" data-pk="contact_id"><i class="fa fa-check"></i> Submit </button>
                            <button type="reset" class="btn btn-default clearData input-sm" style="border:1px solid #FFF;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END TWITTER BLOCK -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->