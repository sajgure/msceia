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
    <title>सभासद संस्था | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?php echo base_url();?>assets/site/assets/frontend/layout/css/custom.css" rel="stylesheet">
</head>
<!-- Head END -->
<?php $this->load->view('site/header'); ?>
<!-- Body BEGIN -->
<body class="corporate">
    <div class="main">
        <div class="container">
            <?php if(isset($district_data_list) && !empty($district_data_list))
            { $i=1;?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li><a href="<?php echo base_url();?>sabhasad">सभासद संस्था</a></li>
                    <li class="active"><?php echo(isset($district->district_name) && !empty($district->district_name))?$district->district_name:''; ?></li>
                </ul>
                <div class="row margin-bottom-40">
                    <div class="portlet-body"> 
                        <?php ?>
                        <div class="col-md-12">    
                            <div class="row margin-bottom-20">
                            </div>
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>Institute Name</th>
                                        <th>Owner Name</th>
                                        <th>Contact No.</th>
                                        <th>Email Address</th>
                                        <th>Institute Address</th>
                                    </tr>
                                    <?php if(isset($district_data_list) && !empty($district_data_list))
                                    {$j=1;
                                        foreach ($district_data_list as $row) 
                                        {  ?>
                                            <tr>
                                                <td>
                                                    <?php echo (isset($row->institute_name) && !empty($row->institute_name))?$row->institute_name:'';?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($row->institute_owner_name) && !empty($row->institute_owner_name))?$row->institute_owner_name:'';?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($row->institute_contact) && !empty($row->institute_contact))?$row->institute_contact:'';?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($row->institute_mail) && !empty($row->institute_mail))?$row->institute_mail:'';?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($row->institute_address) && !empty($row->institute_address))?$row->institute_address:'';?>
                                                </td>
                                            </tr>
                                        <?php $j++; }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php ?>
                    </div>
                </div>
            <?php } 
            else { ?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">होम </a></li>
                    <li class="">सभासद संस्था</li>
                    <li class="active"><?php echo(isset($district_data_list->district_name) && !empty($district_data_list->district_name))?$district_data_list->district_name:'माहिती उपलब्ध नाही'; ?></li>
                </ul>
                <div style="margin-bottom: 100px;">
                    <h4><b>माहिती उपलब्ध नाही</b></h4>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $this->load->view('site/footer'); ?>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/site/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url();?>assets/site/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
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