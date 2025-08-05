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
    <title>विद्यार्थी यादी | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <base href="<?php echo base_url(); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Maharashtra State Commerce Educational Institutes Association." name="description">
    <meta content="msceia,msceia.in,typing,Student List" name="keywords">
    <meta content="msceia" name="author">
    <meta property="og:msceia.in" content="-CUSTOMER VALUE-">
    <meta property="og:Student List" content="-CUSTOMER VALUE-">
    <meta property="og:Maharashtra State Commerce Educational Institutes Association." content="-CUSTOMER VALUE-">
    <meta property="og:webstt" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <!-- link to image for socio -->
    <meta property="og:msceia.in/Student List" content="-CUSTOMER VALUE-">
    <!-- Fonts START -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.css" />
    <link href="<?php echo base_url();?>assets/site/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <style type="text/css">
        input[type="checkbox"]{
          width: 15px; /*Desired width*/
          height: 15px; /*Desired height*/
        }
        .stud_name{
            margin: 4px 6px 10px 0px !important;
            position: absolute !important;
            font-weight: 600 !important;
            word-break: break-all !important;
        }
        @media screen and (min-width: 768px) and (max-width: 1024px) {
            .img1{
                width: 30px !important ;
                height: 30px !important;
                border-radius: 50% !important;
                float: left !important ;
            }
            .col-md-10 {
                width: 114% !important;
            }
            .stud_name{
                margin: -7px 35px 10px !important;
                position: absolute !important;
                font-weight: 600 !important;
                word-break: break-word !important;
                font-size: 11px;
            }
        }
    </style>
</head>
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">विद्यार्थी यादी </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <?php $paid = (isset($inst_data->paid_student) && !empty($inst_data->paid_student))?$inst_data->paid_student:'0';?>
                    <input type="hidden" id="paid_stud" value="<?php echo $paid+$p_cnt; ?>">
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>विद्यार्थी यादी </div>
                                <div class="caption pull-right" style="font-size: 16px;"> Payable Amount : <span class="total_pay"><i class="fa fa-inr"></i> 00 </span></div>
                            </div>
                            <div class="portlet-body form" >
                                <form method="POST" id="add_stud_payment" action="add_stud_payment" data-redirect="fees">
                                    <div class="form-body">
                                    
                                        <table class="table table-striped table-bordered table-hover datatable" data-url="student_table" id="table1">
                                            <thead>
                                                <tr class="heading" style="width: 100%;vertical-align: middle;">
                                                    <th style="width: 5%;">Sr.<br>No</th>
                                                    <th style="width: 50%;text-align: center;">Student Name</th>
                                                    <th style="width: 13%;">Course<br>Name</th>
                                                    <th style="width: 10%;">Mobile<br>No</th>
                                                    <th style="width: 15%;">Batch</th>
                                                    <th style="width: 5%;">Payment <br>Type</th>
                                                    <th style="width: 8%;">Select</th>
                                                    <th style="width: 4%;">Action</th>
                                                </tr>
                                                
                                            </thead>
                                            <thead>
                                                <tr style="background-color:#eee !important">
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>                                                    
                                                    <th><center><input type="checkbox" name="businessType" onclick="toggle(this);" value="1"></center></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <input type="hidden" id="paid_stud" value="13">
                                    </div>
                                    <?php if(isset($student_data) && !empty($student_data))
                                    { ?>
                                        <div class="form-actions">
                                            <span style="margin-top: 20px;font-weight: 600; text-align: left;"><i>Note: <i style="color: #ff0000" class="fa fa-check"></i>: Means Pending for Payment, <i style="color: #26a69a" class="fa fa-check"></i>: Means Student Payment received.</i></span>
                                            <button type="submit" class="btn blue pull-right common_save"> Proceed To Pay </button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-actions">
                                            <span style="margin-top: 20px;font-weight: 600; text-align: left;"><i>Note: <i style="color: #ff0000" class="fa fa-check"></i>: Means Pending for Payment, <i style="color: #26a69a" class="fa fa-check"></i>: Means Student Payment received.</i></span>
                                            <button type="submit" class="btn blue pull-right" disabled> Proceed To Pay </button>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('site/footer'); ?>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="<?php echo base_url();?>assets/site/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/site/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init();
            Layout.init();
            Layout.initFixHeaderWithPreHeader();
            TableAdvanced.init();
        });
        </script>
        <input type="hidden" class="minimum_student" value="<?php echo (isset($batch_fees_data->minimum_student) && !empty($batch_fees_data->minimum_student))?$batch_fees_data->minimum_student:'';?>">
        <input type="hidden" class="maximum_student" value="<?php echo (isset($batch_fees_data->maximum_student) && !empty($batch_fees_data->maximum_student))?$batch_fees_data->maximum_student:'';?>">
        <input type="hidden" class="minimum_fees" value="<?php echo (isset($batch_fees_data->minimum_fees) && !empty($batch_fees_data->minimum_fees))?$batch_fees_data->minimum_fees:'';?>">
        <input type="hidden" class="maximum_fees" value="<?php echo (isset($batch_fees_data->maximum_fees) && !empty($batch_fees_data->maximum_fees))?$batch_fees_data->maximum_fees:'';?>">
        <script type="text/javascript">

            $(document).on('click', '.appearing', function() { 
                calc_payment();
            });

            function calc_payment() {
                var total_pay = 0;
                $(".appearing:checked").each(function() {                    
                    total_pay = total_pay + $(this).attr('rel')*1;
                });  
                $(".appear").each(function() {                    
                    total_pay = total_pay + $(this).attr('rel')*1;
                });    
                $('.total_pay').html('<i class="fa fa-inr"></i> '+total_pay);
            }

            function toggle(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) 
                {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;  

                    calc_payment();   
                }
            }
            /*$(function ()
            {
                var paid_stud=$("#paid_stud").val()*1;
                var minimum_student=$(".minimum_student").val()*1;
                var maximum_student=$(".maximum_student").val()*1;
                var minimum_fees=$(".minimum_fees").val()*1;
                var maximum_fees=$(".maximum_fees").val()*1;
                // alert(paid_stud);
                $(document).on('click', '.spam', function() {
                    var t_stud=$(".spam:checked").length*1;
                    var amt=0;
                    if((paid_stud+t_stud) >= maximum_student)
                    {
                        amt=minimum_fees;
                    }
                    else
                    {
                        amt=maximum_fees;
                    }
                    $('spam').html('<i class="fa fa-inr"></i> '+t_stud*amt);
                });
            });

            function toggle(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) 
                {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;     

                    var paid_stud=$("#paid_stud").val()*1;
                    var minimum_student=$(".minimum_student").val()*1;
                    var maximum_student=$(".maximum_student").val()*1;
                    var minimum_fees=$(".minimum_fees").val()*1;
                    var maximum_fees=$(".maximum_fees").val()*1;
                    // alert(paid_stud);
                    // $(document).on('click', '.spam', function() {
                    var t_stud=$(".spam:checked").length*1;
                    var amt=0;
                    if((paid_stud+t_stud) >= maximum_student)
                    {
                        amt=minimum_fees;
                    }
                    else
                    {
                        amt=maximum_fees;
                    }
                    $('spam').html('<i class="fa fa-inr"></i> '+t_stud*amt);
                    // });
                }
            }*/
        </script>
            <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>