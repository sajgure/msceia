<?php  
$institute_code = $this->session->userdata('role_id');
if(!isset($institute_code) && empty($institute_code))
{
  redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <title>Institute List |
        <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?>
    </title>
    <base href="<?php echo base_url(); ?>">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>" />
    <style type="text/css">
    input[type="checkbox"] {
        width: 15px;
        /*Desired width*/
        height: 15px;
        /*Desired height*/
    }
    </style>
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo ">
        <?php $this->load->view('template/header');?>
        <div class="clearfix"> </div>
        <div class="page-container">
            <?php $this->load->view('template/sidebar');?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption font-blue"> 
                                            <i class="fa fa-bars font-blue"></i> 
                                            <span class="caption-subject bold uppercase">
                                                Institute List</span> 
                                        </div>
                                    </div>
                                    <div class="portlet-body form row">
                                        <div class="col-md-12 col-sm-12">
                                                
                                                <div class="form-body">
                                                    <table class="table table-striped table-bordered table-hover" id="example">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="font-blue-madison bold" style="text-align: center;">Sr. No</th>
                                                                <th class="font-blue-madison bold">Student Name</th>
                                                                <th class="font-blue-madison bold">Course Name</th>
                                                                <th class="font-blue-madison bold">Mobile No</th>
                                                                <th class="font-blue-madison bold">District</th>
                                                                <th class="font-blue-madison bold">Payment Status</th>
                                                                <th class="font-blue-madison bold">Select</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $i=1;
                                                                foreach($student_data as $key)
                                                                {  
                                                                    if($key->student_status=='not_appear') 
                                                                    { 
                                                                        $status = 'Not Appeared'; 
                                                                    } 
                                                                    elseif ($key->student_status=='appear') 
                                                                    { 
                                                                        $status = 'Appeared'; 
                                                                    } 
                                                                    elseif ($key->student_status=='payment') 
                                                                    { 
                                                                        $status = 'Payment Received'; 
                                                                    } ?>
                                                                    <tr id="tbl_row_<?= $i ?>">
                                                                        <td style="text-align: center;">
                                                                            <?php echo $i;?>
                                                                        </td>
                                                                        <td class="font-green-haze bold">
                                                                            <?php echo((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:''); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:''); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo((isset($key->mobile_no) && !empty($key->mobile_no)) ? $key->mobile_no:'');?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:''); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo((isset($status) && !empty($status)) ? $status:'');?>
                                                                        </td>
                                                                        <td>
                                                                           <select name="ResetBatch" class="form-control resetBatch" id="tr_<?= $i ?>" data-id="<?= $i ?>">
                                                                            <?php if(isset($batchesInfo) && !empty($batchesInfo))
                                                                            {
                                                                                foreach ($batchesInfo as $row) 
                                                                                {?>
                                                                                    <option value="<?php echo $row['batch_id'].'/'.$key->student_id; ?>" <?php echo (isset($row['batch_id']) && !empty($row['batch_id']) && ($row['batch_id']==$key->batch_id))?'selected="selected"':''?>> <?php echo $row['batch_name'];?></option>
                                                                                <?php } 
                                                                            }?>                                                                           
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <?php 
                                                                $i++; } ?>
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/footer');?>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script> -->
        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init();
                ComponentsPickers.init();
                TableAdvanced.init();
            });
            $(document).ready(function() {
                $('#example').DataTable({
                    "aLengthMenu": [
                        [5, 10, 25, -1],
                        [5, 10, 25, "All"]
                    ],
                    "iDisplayLength": 10
                });
            });

        $(document).on('click', '.status_save', function(e) 
        {
        
            var form = '#'+$(this).parents('form').attr('id');
            var error = $('.alert-danger', form);
            console.log(error);
                var success = $('.alert-success', form);
            console.log(success);
                var id = $(this).attr('rel');
            console.log(id);
                var pk = $(this).data('pk');
            console.log(pk);    
            $(form).validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden", // validate all fields including form hidden input
                rules: {
                    
                           
                },     

                invalidHandler: function(event, validator) { //display error alert on form submit 
                console.log("inside error alert on form submit");             
                    success.hide();
                    error.show();
                    $('html,body').animate({ scrollTop: 0 });
                },

                errorPlacement: function(error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");
                    icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
                },

                highlight: function(element) { // hightlight error inputs
                    //alert($(element).attr('name'));
                    $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function(element) { // revert the change done by hightlight

                },
     
                success: function(label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                },

                submitHandler: function(form) {
                    $('.status_save').prop('disabled', true);
                    var url = $(form).attr('action');
                    var apikey = $(form).data('apikey');
                    var redirect = $(form).data('redirect');
                    var serialize_data = $(form).serialize();
                    serialize_data = {id:id};
                    console.log(serialize_data);
                    Metronic.startPageLoading({animate: true});
                    $(form).ajaxSubmit({
                        type: 'POST',
                        headers: {
                            "x-api-key": apikey
                        },
                        url: completeURL(url),
                        dataType: 'json',
                        data: serialize_data,
                        success: function(data) {
                        console.log(data);
                            if (data.state == true) 
                            {
                                 Metronic.stopPageLoading();
                                $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                                setTimeout(function()
                                {
                                    if(redirect)
                                    {
                                        window.location.href = window.completeURL(redirect);
                                    }
                                    else
                                    {
                                        window.location.href = window.location.href;
                                    }
                                }, 2000);
                            } else {
                                $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                                // Metronic.stopPageLoading();
                                // alert(redirect);
                                setTimeout(function()
                                {
                                    var redirect=data.redirect
                                    
                                    if(redirect)
                                    {
                                        window.location.href = window.completeURL(redirect);
                                    }
                                    else
                                    {
                                        window.location.href = window.location.href;
                                    }
                                }, 2000);
                                $('.status_save').prop('disabled', false);
                            }
                        }
                    });
                }       
            }); 
        });

        $('.resetBatch').on('change', function() {    
           let row_id = $(this).attr("data-id");
           let dropdownValue = $('#tr_'+row_id).val();
           const valArr = dropdownValue.split("/");
           let batch_id = valArr[0];
           let student_id = valArr[1];
           let base_url = '<?php echo base_url() ?>'+'reset-batch-student';
           $.ajax({
                url: base_url,
                data: {'batch_id': batch_id,'student_id':student_id},
                type: "post",
                dataType: 'json',                   
                success: function(data){
                    console.log(data);
                    if (data.state == true) {
                       // $('#tbl_row_'+row_id).remove();
                        $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                    }else{
                        $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                    }
                
                }
            });
        });
        </script>
    </body>
</html>