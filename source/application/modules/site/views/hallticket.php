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
    <title>Hallticket | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    </style>
</head>
<?php $this->load->view('site/header'); ?>
    <!-- Body BEGIN -->
    <body class="corporate">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम</a></li>
                    <li class="active">हॉलतिकीट </li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="sidebar col-md-3 col-sm-3">
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php $this->load->view('my-profilesidebar');?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"> <i class="fa fa-gift"></i>हॉलतिकीट यादी </div>
                                <a class="btn default" target="_blank" href="<?php echo base_url();?>download-attendance" style="float: right;margin-top: 7px;padding: 4px 12px !important;"><span>Download Attendance List</span>
                                </a> 
                            </div>
                            <div class="portlet-body form" >
                                <form method="POST" id="add_stud_payment" action="add_stud_payment">
                                    <div class="form-body">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                              <tr class="heading">
                                                <th scope="col">Sr No</th>
                                                <th scope="col">Student Name</th>
                                                <th scope="col">Course Name</th>
                                                <th scope="col">Mobile No</th>
                                                <th scope="col">District</th>
                                                <th scope="col">Group Download</th>
                                                <th scope="col">Download</th>
                                              </tr>
                                            </thead>
                                            <tbody> 
                                              <?php
                                              if(isset($student_data) && !empty($student_data))
                                              { $j=20;
                                                $i=1;
                                                $k=0;
                                                $l=20;
                                                foreach ($student_data as $key)
                                                { ?>
                                                  <tr>
                                                    <td style="text-align:center;"><?php echo $i++; ?> </td>
                                                    <td style="text-transform: capitalize;"><?php echo(isset($key->stud_full_name) && !empty($key->stud_full_name))?$key->stud_full_name:''?></td>
                                                    <td><?php echo(isset($key->course_name) && !empty($key->course_name))?$key->course_name:''?> </td>
                                                    <td><?php echo(isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:''?></td>
                                                    <td><?php echo(isset($key->district_name) && !empty($key->district_name))?$key->district_name:''?></td>
                                                    <?php if(($j % 20)==0)
                                                    { $limit=$k.','.$l;
                                                      $k=$j;?>
                                                      <td style="text-align:center;" rowspan="20" align="8%">
                                                        <a style="color: #3e4d5c" class="btn btn-info btn-xs" href="<?php echo base_url();?>hallticket-all/<?php echo $limit ?>" class="tooltips "  data-original-title="Download Hallticket" data-placement="top" target="_blank">
                                                        20 hallticket</a>
                                                      </td> 
                                                    <?php } $j++; ?>
                                                    <td style="text-align:center;" align="8%">
                                                        <?php $id = $this->encryptdecryptstring->encrypt_string($key->student_id); ?>
                                                      <a style="color: #3e4d5c" target="_blank"  href="<?php echo base_url();?>hallticket_student/<?php echo $id ?>" class="tooltips "  data-original-title="Download Hallticket" data-placement="top">
                                                      <i class="fa fa-file-pdf-o "></i></a>
                                                    </td>         
                                                  </tr>
                                                <?php
                                                }
                                              }
                                              ?>
                                            </tbody>
                                          </table>
                                    </div>
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
    </body>
    <!-- END BODY -->

</html>