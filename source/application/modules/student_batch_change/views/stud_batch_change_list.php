<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Student Batch Change  | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
    <?php $this->load->view('template/header');?>
    <div class="clearfix">
    </div>
    <div class="page-container">
        <?php $this->load->view('template/sidebar');?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="portlet-body">
                   <div class="row" style="margin-top: -18px;">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                        <span class="caption-subject bold uppercase">  Student Batch Change </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- <form action="studentbatch" id="studentbatch" class="horizontal-form" data-apikey="<?php echo (isset($keydata->key) && !empty($keydata->key))?$keydata->key:''; ?>" data-redirect="stude-batch-change-list"  method="post" enctype="multipart/form-data"> -->
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">District Name <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="district_name" id="district_name" class="form-control" value="<?php echo (isset($district_data->district_name) && !empty($district_data->district_name))?$district_data->district_name:''?>" placeholder="District Name">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6">
                                                <label class="control-label">From Batch<span class="required">*</span></label>
                                                   
                                                    <!-- <input type="text" name="district_name" id="district_name" value="<?php //echo (isset($district_data->district_name) && !empty($district_data->district_name))?$district_data->district_name:''?>"> -->
                                                    <select onchange="getsessionsBybatch('<?php echo base_url().'batch-sessions-trainer'; ?>', this);" class="form-control select2me batch input-sm" name="district_name" id="batchtrainerid_attendance" autocomplete="off">
                                                            <option value="">Select </option>
                                                            <?php if(isset($batch_data) && !empty($batch_data))
                                                                {
                                                                    foreach ($batch_data as $key)
                                                                   {?>
                                                                        <option class="category" value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>" <?php echo (isset($user_data->batch_id) && !empty($user_data->batch_id) && $user_data->batch_id==$key->batch_id)?'selected':'';?>>
                                                                            <?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                        </option>
                                                                    <?php }
                                                                } ?>
                                                        </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                <div class="form-group">    
                                                    <label class="control-label">Change Batch <span class="required">*</span></label>
                                                    <select class="form-control select2me batch input-sm" name="batch_idstudents" id="batch_idstudents">
                                                            <option value="">Select </option>
                                                            <?php if(isset($batch_data) && !empty($batch_data))
                                                                {
                                                                    foreach ($batch_data as $key)
                                                                   {?>
                                                                        <option class="category" value="<?php echo (isset($key->batch_id) && !empty($key->batch_id))?$key->batch_id:'';?>" <?php echo (isset($user_data->batch_id) && !empty($user_data->batch_id) && $user_data->batch_id==$key->batch_id)?'selected':'';?>>
                                                                            <?php echo(isset($key->batch_name) && !empty($key->batch_name))?$key->batch_name:'';?>
                                                                        </option>
                                                                    <?php }
                                                                } ?>
                                                        </select>
                                                </div>
                                            </div>
                                                <input type="hidden" name="district_id" id="district_id" value="<?php //echo(isset($district_data->district_id) && !empty($district_data->district_id))?$district_data->district_id:'';?>">
                                                <input type="hidden" name="student_id" id="student_id" value="<?php //echo(isset($district_data->district_id) && !empty($district_data->district_id))?$district_data->district_id:'';?>">
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <a href="<?php echo base_url();?>dashboard" class="btn btn-primary"> <i class=" icon-arrow-left "></i> Back</a>
                                            <div class="pull-right">  
                                                <button type="button" class="btn btn-danger clearData"> <i class="icon-close"></i> Clear </button>
                                                <!-- <button type="submit" onclick="getsessionsBybatchdetails('<?php echo base_url().'studentbatch'; ?>');" class="btn btn-success common_save" data-pk="district_id" rel="<?php //echo(isset($district_data->district_id) && !empty($district_data->district_id))?$district_data->district_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($district_data->district_id) && !empty($district_data->district_id))?'Update':'Submit';?> </button> -->
                                                <button type="submit"  onclick="getinfo('<?php echo base_url('studentbatchs'); ?>');" id="submit" class="btn btn-success common_save" data-pk="district_id" rel="<?php echo(isset($district_data->district_id) && !empty($district_data->district_id))?$district_data->district_id:'';?>"> <i class="icon-check"></i> <?php echo(isset($district_data->district_id) && !empty($district_data->district_id))?'Update':'Submit';?> </button>
                                            </div>  
                                        </div>
                                    <!-- </form> -->
                                </div>
                                <div class="row">
                                       
                                       <table class="table table-striped table-bordered table-hover datatable" id="example">
                                                       <thead>
                                                           <tr>
                                                               <th class="font-blue-madison bold" >#</th>
                                                               <th class="font-blue-madison bold" > Student Name</th>
                                                               <th class="font-blue-madison bold"> Institute Name<br>Institute Code</th>
                                                               <th class="font-blue-madison bold"> Batch Name</th>
                                                               <th class="font-blue-madison bold" > Course Name</th>
                                                               <th class="font-blue-madison bold"> Seat No & Password</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody >
                                                          
                                                       <tr>
                                                               <td><input id="studentid" readonly style="border-style: none; background-color:#ececec1f"></input></td>
                                                               <td><input id="batchname" readonly style="border-style: none;background-color:#ececec1f"></input> </td>
                                                               <td><input  id="batch_description" readonly style="border-style: none;background-color:#ececec1f"></input><br><input  id="batch_code" readonly style="border-style: none;background-color:#ececec1f"></input></td>
                                                               <td><b><input id="seat_no_prefix" readonly style="border-style:none;background-color:#ececec1f"></input></b></td>
                                                               <td><input id="start_date" readonly style="border-style: none;background-color:#ececec1f"></input> </td>
                                                               <td> <b><input  id="end_date" readonly style="border-style: none;background-color:#ececec1f;font-weight:100px;"></input><br><input id="seat_no_password" readonly style="border-style:none;background-color:#ececec1f;color:red;"></input></b></td>
                                                           </tr>
                                                          
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
    <?php $this->load->view('template/footer');?>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
      
    // jQuery(document).ready(function() {
    //     Metronic.init(); // init metronic core components
    //     Layout.init(); 
    //     ComponentsPickers.init();
    //     TableAdvanced.init();
    // });
    $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 10
       } 
        );
} );
    function getsessionsBybatch(url, batchSelect) {
        // var s = $("#batch_idstudents").val();
        //  alert(s);
        var student_id=$("#student_id").val();
        $.ajax({
          url: url,
          method: 'POST',
         // dataType:'JSON',
          data: {'gettrainerbatch_id': batchSelect.value,'student_id':student_id},
          success: function(result) {
            // alert(result);
            
            var valvartrainerbatchsession = jQuery.parseJSON(result);
            var valvarsession = valvartrainerbatchsession.key1;
            
            $('#studentid').val(valvarsession.student_id);
            $('#student_id').val(valvarsession.student_id);
            var connamesi=valvarsession.institute_name;
             var connamefii=valvarsession.institute_code;
            //  var constudis=connamesi+' '+connamefii;
            //  alert(connamefii);
            //  $('#batch_description').val(constudis);
            $('#batch_description').val(valvarsession.institute_name);
            $('#batch_code').val(valvarsession.institute_code);
             $('#seat_no_prefix').val(valvarsession.batch_name);
             $('#start_date').val(valvarsession.course_name);
            //  $('#end_date').val(valvarsession.end_date);
            
            $('#district_id').val(valvarsession.batch_id);
             var connames=valvarsession.surname;
             var connamef=valvarsession.first_name;
             var connamefa=valvarsession.father_name;
             var constud=connames+' '+connamef+' '+connamefa;
            //  alert(connames);
             $('#batchname').val(constud);

             var connameseatno=valvarsession.seat_no;
             var connamepass=valvarsession.student_password;
            // var constudno=connameseatno+' '+connamepass;
             $('#end_date').val(connameseatno);
             $('#seat_no_password').val(connamepass);
            //--------days count start-----
          
          
            // var html = '';
            // var i;
            // for(i=1; i<=sess; i++){
            //     html += '<option value='+i+'>'+i+' Session</option>';
            // }
            // $('#sessionssid').html(html);
       
             //--------days count end-----
          }
        });
        // alert("fail");
      }
      


    


      function getinfo(urls)
      {
         var s = $("#batch_idstudents").val();
        console.log(s);
          var student_id=$("#student_id").val();
          console.log(student_id);
        $.ajax({
           url: urls,
          method: 'POST',
    //    dataType:'JSON',
       data: {'student_id': student_id,'batch_idstudents':s},
      success: function(result) {
      
      
         }
       });
       alert("Updated Successfully");
    //    $("#example").load(location.href + " #example");
        // alert("hi");
      }


      $("#submit").click(function () {
         var s = $("#batch_idstudents").val();
         var student_id=$("#student_id").val();
        //  alert(s);
        
        $.ajax({
          url: "<?php echo base_url().'batch-sessions-trainerupdate'; ?>",
          method: 'POST',
         // dataType:'JSON',
          data: {'gettrainerbatch_id': s,'student_id':student_id},
          success: function(result) {
            // alert(result);
            
            var valvartrainerbatchsession = jQuery.parseJSON(result);
            var valvarsession = valvartrainerbatchsession.key1;
            
            $('#studentid').val(valvarsession.student_id);
            $('#student_id').val(valvarsession.student_id);
            var connamesi=valvarsession.institute_name;
             var connamefii=valvarsession.institute_code;
            //  var constudis=connamesi+' '+connamefii;
            //  alert(connamefii);
            //  $('#batch_description').val(constudis);
            $('#batch_description').val(valvarsession.institute_name);
            $('#batch_code').val(valvarsession.institute_code);
             $('#seat_no_prefix').val(valvarsession.batch_name);
             $('#start_date').val(valvarsession.course_name);
            //  $('#end_date').val(valvarsession.end_date);
            
            $('#district_id').val(valvarsession.batch_id);
             var connames=valvarsession.surname;
             var connamef=valvarsession.first_name;
             var connamefa=valvarsession.father_name;
             var constud=connames+' '+connamef+' '+connamefa;
            //  alert(connames);
             $('#batchname').val(constud);

             var connameseatno=valvarsession.seat_no;
             var connamepass=valvarsession.student_password;
            // var constudno=connameseatno+' '+connamepass;
             $('#end_date').val(connameseatno);
             $('#seat_no_password').val(connamepass);
            
          }
        });
       
    });

    </script>
</body>
</html>