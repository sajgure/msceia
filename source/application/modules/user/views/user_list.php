<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>User List | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
    
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
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="fa fa-bars font-blue"></i>
                                        <span class="caption-subject bold uppercase">User List</span>
                                    </div>
                                    <div class="actions tools">
                                        <a href="<?php echo base_url();?>add-user" class="btn blue btn-sm" style="height:28px ;"><i class="fa fa-plus-circle "></i>&nbsp;New</a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet box">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover masterTable">
                                                        <thead>
                                                            <tr>
                                                                <th class="font-blue-madison bold" style=" text-align: center; width: 8%;"> # </th>
                                                                <th class="font-blue-madison bold" style="width: 20%;"> Full Name </th>
                                                                <th class="font-blue-madison bold" style="width: 15%;"> Email </th>
                                                                <th class="font-blue-madison bold" style="width: 15%;"> Mobile </th>
                                                                <th class="font-blue-madison bold" style="width: 15%;"> Address </th>
                                                                <th class="font-blue-madison bold" style="width: 15%;"> Role </th>
                                                                <th class="font-blue-madison bold" style="text-align: center;width: 12%;"> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if(isset($user_data) && !empty($user_data))
                                                            { $i = 1;
                                                                foreach ($user_data as $key)
                                                                {?>
                                                                    <tr>
                                                                        <td style="text-align: center; vertical-align: middle;"><?php echo $i++; ?></td>
                                                                        <td class="font-green-haze bold"><?php echo(isset($key->fullname) && !empty($key->fullname))?$key->fullname:'';?></td>
                                                                        <td><?php echo(isset($key->email) && !empty($key->email))?$key->email:'';?></td>
                                                                        <td><?php echo(isset($key->mobile) && !empty($key->mobile))?$key->mobile:'';?></td>
                                                                        <td><?php echo(isset($key->address) && !empty($key->address))?$key->address:'';?></td>
                                                                        <td><?php echo(isset($key->role_name) && !empty($key->role_name))?$key->role_name:'';?></td>
                                                                        <?php if($key->user_id ==1)
                                                                        { ?>
                                                                            <td><?php echo $key->role_name; ?></td>

                                                                        <?php }
                                                                        else
                                                                        { ?>
                                                                            <td style='text-align: center;' class="tbl_action" data-col="user_id">
                                                                                <?php 
                                                                                    $user_id = $this->encryptdecryptstring->encrypt_string($key->user_id);

                                                                                    if($key->in_use=='Y')
                                                                                    { ?>
                                                                                        <a rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:'';?>" rev="hide-user" href="javascript:void(0);" class="label bg-yellow-gold tooltips update_record" title="Hide Record"><i class="icon-ban"></i></a>
                                                                                    <?php }
                                                                                    else
                                                                                    {?>                                                     
                                                                                        <a rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:'';?>" rev="restore-user" href="javascript:void(0);" class="label bg-blue tooltips update_record" title="Restore Record"><i class="icon-reload"></i></a>
                                                                                    <?php } ?>
                                                                                <a href="<?php echo base_url(); ?>add-user/<?php echo(isset($user_id) && !empty($user_id))?$user_id:'';?>" class="label bg-green-jungle tooltips " title="Edit Record"><i class="icon-pencil"></i></a>
                                                                                <a rev="delete-user/<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:'';?>" href="javascript:void(0);" class="label bg-red-thunderbird tooltips delete_record" title="Delete Record"><i class="icon-trash"></i></a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php }
                                                            }?>
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
    <script src="<?php echo base_url(); ?>assets/global/plugins/toast/jquery.toast.js" type="text/javascript" ></script>

    <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); 
        ComponentsPickers.init();
        TableAdvanced.init();
    });
</script>
</body>
</html>