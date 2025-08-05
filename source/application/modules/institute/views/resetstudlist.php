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
      <meta charset="utf-8"/>
      <title>Institute List | <?php echo(isset($appname) && !empty($appname))?$appname:'MSCEIA'; ?> </title>
      <base href="<?php echo base_url(); ?>">
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
      <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
      
      <link rel="shortcut icon" href="<?php echo(isset($favicon) && !empty($favicon))?$favicon:''; ?>"/>
      <style type="text/css">
          input[type="checkbox"]{
            width: 15px; /*Desired width*/
            height: 15px; /*Desired height*/
          }
          
      </style>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">Institute List</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                  <div class="row">
                                    <input type="hidden" id="paid_stud" value="<?php //echo $inst_data->paid_student+$p_cnt; ?>">
                                      <div class="col-md-12 col-sm-12">
                                            <div class="portlet box ">
                                              <div class="portlet-body form" >
                                                  <form method="POST" id="edit_stud_payment" action="edit_stud_payment" data-redirect="institute-list">
                                                      <div class="form-body">
                                                      
                                                          <table class="table table-striped table-bordered table-hover " id="example">
                                                              <thead>
                                                                <tr class="">
                                                                    <th class="font-blue-madison bold"  style="text-align: center;">Sr. No</th>
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
                                                                  foreach($stud_data as $key)
                                                                  { 
                                                                      if($key->student_status=='not_appear') { $status = 'Not Appeared'; } elseif ($key->student_status=='appear') { $status = 'Appeared'; } elseif ($key->student_status=='payment') { $status = 'Payment Received'; }
                                                                  ?>
                                                                 
                                                                   <tr >
                                                                      <td><?= $i;?></td>
                                                                      <td><?= ((isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:''); ?></td>
                                                                      <td><?= ((isset($key->course_name) && !empty($key->course_name)) ? $key->course_name:''); ?></td>
                                                                      <td><?= ((isset($key->mobile_no) && !empty($key->mobile_no)) ? $key->mobile_no:'');?></td>
                                                                      <td><?= ((isset($key->district_name) && !empty($key->district_name)) ? $key->district_name:''); ?></td>
                                                                      <td><?= ((isset($status) && !empty($status)) ? $status:'');?></td>
                                                                      <?php 
                                                                      if(isset($key->student_status) && !empty($key->student_status) && ($key->student_status=='not_appear'))
                                                                              { 
                                                                              //    echo '';
                                                                                echo  '<td><center><input type="hidden" name="checkboxf" id="checkbox" value="'.$key->student_id.'"><input type="checkbox" class="spam form-control" name="checkbox[]" value="'.$key->student_id.'"></center></td>';
                                                                            	}
                                                                              else if(isset($key->student_status) && !empty($key->student_status) && ($key->student_status=='appear'))
                                                                              {
                                                                                  $p_cnt++;
                                                                              //    echo '<td><center><i style="color: #ff0000" class="fa fa-check"></i></center></td>';
                                                                              echo  '<td><center><input type="hidden" name="checkboxf" id="checkbox" value="'.$key->student_id.'"><input type="checkbox" class="spam form-control" name="checkbox[]" value="'.$key->student_id.'" checked></center></td>';
                                                                                 
                                                                              }
                                                                              else if(isset($key->student_status) && !empty($key->student_status) && ($key->student_status=='payment'))
                                                                              {
                                                                                  
                                                                                  
                                                                                  // echo '';
                                                                                  // echo '<td><center><i style="color: #26a69a" class="fa fa-check"></i></center></td>';
                                                                              echo  '<td><center><input type="hidden" name="checkboxs" id="checkboxs"  value="'.$key->student_id.'"><input type="checkbox" class="spam form-control" name="checkboxs[]" value="'.$key->student_id.'" checked></center></td>';
                                                                              }
                                                                      ?>
                                                                      
                                                                      
                                                                  </tr>
                                                                  <?php
                                                                  $i++;
                                                                }?>
                                                              </tbody>
                                                          </table>
                                                          <input type="hidden" id="paid_stud" value="13">
                                                          <input type="submit" name="submit"  class="btn blue pull-right update_status" value="Submit">
                                                        </div>
                                                  </form>
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
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
    
    <script>
      jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
      });

      $(document).ready(function() {
        $('#example').DataTable(
          {     
          "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 10
          });
        });
    </script>
  </body>
</html>