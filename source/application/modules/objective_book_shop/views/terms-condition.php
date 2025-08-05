<?php  
$institute_code = $this->session->userdata('institute_code');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Terms and Condition | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
        <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
        <base href="<?php echo base_url(); ?>">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="Metronic Shop UI description" name="description">
        <meta content="Metronic Shop UI keywords" name="keywords">
        <meta content="keenthemes" name="author">
        <meta property="og:site_name" content="-CUSTOMER VALUE-">
        <meta property="og:title" content="-CUSTOMER VALUE-">
        <meta property="og:description" content="-CUSTOMER VALUE-">
        <meta property="og:type" content="website">
        <meta property="og:image" content="-CUSTOMER VALUE-">
        <meta property="og:url" content="-CUSTOMER VALUE-">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/pages/css/gallery.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
        <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/terms-condition.css" rel="stylesheet">
    </head>
    <?php $this->load->view('site/header'); ?>
<!-- Head END -->

<!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">Terms and Condition</li>
                </ul>
               <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12">
                        <div class="content-page">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                     <h2><b>Overview</b></h2>
                                    <br>
                                <ul class="heading">
                                   
                                    <li class="subline">This website is operated by Aaral Publications, Thane. Throughout the site, the terms “we”, “us” and “our” refer to Aaral Publications, Thane . Aaral Publications, Thane. offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.
                                    </li>

                                    <li class="subline">Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.
                                    </li>
                                    
                                </ul>
                                <h3><b>Online Store Terms</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">
                                        By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.

                                    </li>
                                      <li class="subline">
                                        You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).You must not transmit any worms or viruses or any code of a destructive nature.A breach or violation of any of the Terms will result in an immediate termination of your Services.
                                    </li>

                                </ul>
                                <h3><b>General Conditions</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">We reserve the right to refuse service to anyone for any reason at any time.
                                    </li>
                                    <li class="subline">You understand that your content (not including credit card information), may be transferred unencrypted and involve<br>
                                    (a)Transmissions over various networks<br>
                                    (b)Changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</li>
                                   <li class="subline"> You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</li>
                                   <li  class="subline">
                                    The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.
                                   </li>
                                   
                                </ul>
                                <h3><b>Accuracy, Completeness And Timeliness Of Information</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk</li>
                                     <li class="subline">This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</li>
                                     
                                </ul>
                                <h3><b>Modifications To The Service And Prices</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Prices for our products are subject to change without notice.</li>
                                     <li class="subline">We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</li>
                                      <li class="subline">We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</li>
                                </ul>
                                <h3><b>Products Or Services</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.</li>
                                     <li class="subline">We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor's display of any color will be accurate.</li>
                                      <li class="subline">We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.</li>
                                       <li class="subline">We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected</li>
                                </ul>
                                <h3><b>Accuracy Of Billing And Account Information</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</li>
                                     <li class="subline">You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</li>
                                      <li class="subline">For more detail, please review our Returns Policy.</li>
                                </ul>
                                <h3><b>Optional Tools</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.</li>
                                    <li class="subline">You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.</li>
                                    <li class="subline">Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</li>
                                    <li class="subline">We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</li>
                                </ul>
                                <h3><b>Third-Party Links</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Certain content, products and services available via our Service may include materials from third-parties.</li>
                                    <li class="subline">Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.</li>
                                    <li class="subline">We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party's policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</li>

                                </ul>
                                <h3><b>User Comments, Feedback And Other Submissions</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, 'comments'), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation<br>
                                    (1) to maintain any comments in confidence.<br>
                                    (2) to pay compensation for any comments or<br>
                                    (3) to respond to any comments.</li>
                                    <li class="subline">We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.</li>
                                    <li class="subline">You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</li>

                                </ul>
                                <h3><b>Personal Information</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Your submission of personal information through the store is governed by our Privacy Policy.</li>
                                    

                                </ul>
                                <h3><b>Errors, Inaccuracies And Omissions</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).</li>
                                    <li class="subline">We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</li>
                                    

                                </ul>
                                <h3><b>Prohibited Uses</b><br>

                                </h3><br>
                                <ul class="heading">
                                <p><b>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content:</b></p>
                                    <li class="subline">for any unlawful purpose;</li>
                                    <li class="subline">to solicit others to perform or participate in any unlawful acts;</li>
                                    <li class="subline">to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances;</li>
                                    <li class="subline">to infringe upon or violate our intellectual property rights or the intellectual property rights of others;</li>
                                    <li class="subline">to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability;</li>
                                    <li class="subline">to submit false or misleading information;</li>
                                    <li class="subline">to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet;</li>
                                    <li class="subline">to collect or track the personal information of others;</li>
                                    <li class="subline">to spam, phish, pharm, pretext, spider, crawl, or scrape;</li>
                                    <li class="subline">for any obscene or immoral purpose; or</li>
                                    <li class="subline">to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</li>
                                </ul>
                                <h3><b>Disclaimer Of Warranties; Limitation Of Liability</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.</li>
                                    <li class="subline">We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.</li>
                                    <li class="subline">You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.</li>
                                    <li class="subline">You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided 'as is' and 'as available' for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.</li>
                                    <li class="subline">In no case shall Aaral Publications, Thane. , our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</li>

                                </ul>
                                <h3><b>Indenification</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">You agree to indemnify, defend and hold harmless Aaral Publications, Thane. and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</li>
                                    

                                </ul>
                                <h3><b>Severability</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</li>
                                    

                                </ul>
                                <h3><b>Termination</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.</li>
                                    <li class="subline">These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.</li>
                                    <li class="subline">If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</li>

                                </ul>
                                <h3><b>Entire Agreement</b></h3><br>
                                <ul class="heading">
                                    <li class="subline">The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.</li>
                                    <li class="subline">These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).</li>
                                    <li class="subline">Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</li>

                                </ul>
                                <h3><b>Governing Law</b></h3><br>
                                <ul class="heading">
                                    <p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of India and jurisdiction of Jaipur, Rajasthan</p>

                                </ul>
                                <h3><b>Changes To Terms Of Service</b>
                                </h3><br>
                                <ul class="heading">
                                <p>You can review the most current version of the Terms of Service at any time at this page.We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>
                                        <!-- <li class="subline"></li>
                                    <li class="subline"></li>
                                    <li class="subline"></li> -->

                                </ul>
                                <h3><b>Contact Information</b></h3><br>
                                <ul class="heading">
                                    <p>Questions about the Terms of Service should be sent to us at <b>aaral.publications@gmail.com.</b></p>

                                </ul>
                                <h2 style="text-decoration: underline;"><b>Refund Policy
                                </b></h2><h3><b>Returns
                                </b></h3><br>
                                <ul class="heading">
                                    <li class="subline">Our policy lasts 30 days. If 30 days have gone by since your purchase, unfortunately we can’t offer you a refund or exchange.</li>
                                    <li class="subline">To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging.</li>
                                    <li class="subline">Several types of goods are exempt from being returned. Perishable goods such as food, flowers, newspapers or magazines cannot be returned. We also do not accept products that are intimate or sanitary goods, hazardous materials, or flammable liquids or gases.Additional non-returnable items:<br>
                                       1. Gift cards<br>
                                       2.Downloadable software products<br>
                                       3.Some health and personal care items</li>
                                    <li class="subline">To complete your return, we require a receipt or proof of purchase.</li>
                                    <li class="subline">Please do not send your purchase back to the manufacturer.</li>
                                    <li class="subline">There are certain situations where only partial refunds are granted: (if applicable)Book with obvious signs of use CD, DVD, VHS tape, software, video game, cassette tape, or vinyl record that has been opened.</li>
                                    <li class="subline">Any item not in its original condition, is damaged or missing parts for reasons not due to our error.</li>
                                    <li class="subline">Any item that is returned more than 30 days after delivery.</li>
                                      </ul>
                                      <h3><b>Refunds (if applicable)</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">Once your return is received and inspected, we will send you an email to notify you that we have received your returned item. We will also notify you of the approval or rejection of your refund.</li>
                                    <li class="subline">If you are approved, then your refund will be processed, and a credit will automatically be applied to your credit card or original method of payment, within a certain amount of days.</li>
                                    
                                    </ul>
                                    <h3><b>Late or missing refunds (if applicable)</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">If you haven’t received a refund yet, first check your bank account again.Then contact your credit card company, it may take some time before your refund is officially posted.</li>
                                    <li class="subline">Next contact your bank. There is often some processing time before a refund is posted.If you’ve done all of this and you still have not received your refund yet, please contact us at aaral.publications@gmail.com</li>
                              

                                    </ul>
                                    <h3><b>Sale items (if applicable)</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">Only regular priced items may be refunded, unfortunately sale items cannot be refunded.</li>
                                    
                                    </ul>
                                    <h3><b>Exchanges (if applicable)</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">We only replace items if they are defective or damaged. If you need to exchange it for the same item, send us an email at aaral.publications@gmail.com and send your item to: Aaral Publications, 2 Neelkamal Dham, Opp Durga Temple, Majiwada, Thane (W) 400601.</li>
                                    

                                    </ul>
                                    <h3><b>Gifts</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">If the item was marked as a gift when purchased and shipped directly to you, you’ll receive a gift credit for the value of your return. Once the returned item is received, a gift certificate will be mailed to you.</li>
                                    <li class="subline">If the item wasn’t marked as a gift when purchased, or the gift giver had the order shipped to themselves to give to you later, we will send a refund to the gift giver and he will find out about your return.</li>
                                    

                                    </ul>
                                    <h3><b>Shipping</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">To return your product, you should mail your product to: Aaral Publications, 2 Neelkamal Dham, Opp Durga Temple, Majiwada, Thane (W) 400601.</li>
                                    <li class="subline">You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund</li>
                                    <li class="subline">Depending on where you live, the time it may take for your exchanged product to reach you, may vary.</li>

                                    </ul>
                                    <h2 style=" text-decoration: underline;"><b>Privacy Statement</b></h2><h3><b>What Do We Do With Your Information?</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system</li>
                                    <li class="subline">Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</li>
                                    

                                    </ul>
                                    <h3><b>Consent</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">How do you get my consent?
                                        When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.
                                        If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.</li>
                                    <li class="subline">How do I withdraw my consent?
                                        If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at aaral.publications@gmail.com or mailing us at: Aaral Publications, 2 Neelkamal Dham, Opp Durga Temple, Majiwada, Thane (W) 400601</li>
                                  
                                    </ul>
                                    <h3><b>Disclosure</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</li>
                                    

                                    </ul>
                                    <h3><b>Payment</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">We use Razorpay & Payumoney for processing payments. We/Razorpay/Payumoney do not store your card data on their servers. The data is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS) when processing payment. Your purchase transaction data is only used as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is not saved.</li>
                                    <li class="subline">Our payment gateway adheres to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover.</li>
                                    <li class="subline">PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.</li>
                                    <li class="subline">For more insight, you may also want to read terms and conditions of razorpay & Payumoney on<b> https://razorpay.com</b> and <b>https://payumoney.com</b></li>

                                    </ul>
                                    <h3><b>Third-Party Services</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.</li>
                                    <li class="subline">For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.</li>
                                    <li class="subline">In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.</li>
                                    <li class="subline">Links
                                        When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</li>

                                    </ul>
                                    <h3><b>Security</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.</li>
                                    

                                    </ul>
                                    <h3><b>Cookies</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">We use cookies to maintain session of your user. It is not used to personally identify you on other websites.</li>
                                    

                                    </ul>
                                    <h3><b>Age Of Consent</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</li>
                                    

                                    </ul>
                                    <h3><b>Changes To This Privacy Policy</b></h3><br>
                                    <ul class="heading">
                                    <li class="subline">We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</li>
                                    <li class="subline">If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</li>
                               

                                    </ul>
                                    <h3><b>Questions And Contact Information
                                    </b></h3><br>
                                    <ul class="heading">
                                        <li class="subline">If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at <b>aaral.publications@gmail.com </b>or by mail at
                                        <b>Aaral Publications, 2 Neelkamal Dham, Opp Durga Temple, Majiwada, Thane (W) 400601
                                        [Re: Privacy Compliance Officer]
                                        [Aaral Publications, 2 Neelkamal Dham, Opp Durga Temple, Majiwada, Thane (W) 400601]</b></li>
                                    </ul>


                                </div>
                       
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/respond.min.js"></script>
        <![endif]--> 
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();    
                Layout.initTwitter();
                Layout.initFixHeaderWithPreHeader();
            });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
<!-- END BODY -->
</html>