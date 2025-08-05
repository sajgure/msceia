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
    <title>Payment History | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
        .red
        {
            font-weight: 600;
            color: red;
        }
        .green
        {
            font-weight: 600;
            color: green;
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
                    <li class="active">Payment History </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>Payment History</div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover datatable" data-url="institute_payment_history">
                                    <thead>
                                        <tr class="heading">
                                            <th style="text-align:center;width: 9%;">Sr. No</th>
                                            <th style="width: 10%;">Total Student</th>
                                            <th style="width: 11%;">Total Amount</th>
                                            <th style="width: 13%;">Payment Id</th>
                                            <th style="width: 15%;">Payment Date</th>
                                            <th style="width: 15%;">Payment Time</th>
                                            <th style="width: 15%;">Payment Status</th>
                                            <th style="width: 12%;text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php if(isset($paymentHistory) && !empty($paymentHistory))
                                    {  $i=1;                     
                                        foreach ($paymentHistory as $key)
                                        { ?>
                                        <tr>                              
                                            <td  style="text-align:center;">
                                                <?php echo $i++ ?>
                                            </td>
                                            <td>
                                                <?php echo(isset($key->total_student) && !empty($key->total_student))?$key->total_student:'';?>
                                            </td>
                                            <td>
                                                <?php echo(isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:''?>
                                            </td>
                                            <td>
                                                <?php echo(isset($key->payment_id) && !empty($key->payment_id))?$key->payment_id:''?>
                                            </td>
                                            <td>
                                                <b><?= ((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('d-m-Y',strtotime($key->deposite_date)):'') ?></b>
                                            </td>
                                            <td>
                                                <b><?= ((isset($key->deposite_date) && !empty($key->deposite_date)) ?date('h:i A',strtotime($key->deposite_date)):'')  ?></b>
                                            </td>
                                            <td>
                                                <?php $status = (isset($key->status) && !empty($key->status))?$key->status:''?>
                                                <?php if($status=='success') 
                                                { ?>
                                                     <span class="green">Success</span> 
                                                <?php }  
                                                else 
                                                { ?>
                                                     <span class="red">Failed</span> 
                                                <?php }  ?>
                                                
                                            </td>
                                            <td>
                                                <?php $pay_id = $this->encryptdecryptstring->encrypt_string($key->payment_id);
                                                    if($status=='success'){                
                                                        echo '<center><a href="'.base_url().'print_payment_history/'.$pay_id.'" class="tooltips btn btn-sm green" target="_new" data-original-title="Print Payment Receipt" data-placement="top"><i class="fa fa-print "></i></a></center>';
                                                 } ?>
                                            </td>
                                        </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                                <!-- <form>
                                    <div class="form-body">
                                        <div class="row">
                                           <div class="col-md-12 mt-2">
                                                <label class="control-label col-md-2" style="margin-top: 5px;">Select Batch<span class="require" aria-required="true" style="color:red">*</span></label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me batch_id" name="batch_id" id="batch_id" required="">
                                                        <option value="">Select Batch</option>
                                                        <?php if(isset($batch_data) && !empty($batch_data))
                                                        {
                                                            foreach ($batch_data as $key)
                                                            {?>
                                                                <option value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>" <?php echo (isset($key->batch_id) && !empty($key->batch_id) && $key->batch_id==$current_batch_id)?'selected':'';?>>
                                                                    <?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                </option>
                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                   <button type="button" class="btn blue selected_batch_id" data-msg="Please Select Batch." data-url="batch_wise_payment_history"> Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="append_div" style="padding: 20px;padding-top: 0px;"></div> -->
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
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init();
            Layout.init();
            Layout.initFixHeaderWithPreHeader();
            TableAdvanced.init();
        });

        // $(document).ready(function(){
        //     var id = $('.batch_id').select2('val');   
        //     var url= 'batch_wise_payment_history';   
       
        //     Metronic.startPageLoading({animate: true});
        //     if(id)
        //     { 
        //         $.ajax({
        //             type:'POST',
        //             url:completeURL(url),
        //             data:{id:id},
        //             dataType:'json',
        //             success:function(data)
        //             {      
        //                 $('.append_div').html(data.view);
        //             },
        //             complete:function()
        //             {
        //                 Metronic.stopPageLoading();
        //                 $('select').select2();
        //                 TableAdvanced.init();
        //             }
        //         }); 
        //     }
        //     else
        //     {
        //         var msg = $(this).data('msg');
        //         $.toast({ text: msg, icon: 'info' });
        //     }
        //     Metronic.stopPageLoading();
        //     });
        </script>
            <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>