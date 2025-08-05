<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Objective Master | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
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
    <link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
    <link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>
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
                                    <i class="fa fa-plus-circle font-blue" style="font-size: 20px;"></i>
                                    <span class="caption-subject bold uppercase"> Objective </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="objective-section" id="objective-section" data-apikey="<?php echo(isset($keydata->key) && !empty($keydata->key))?$keydata->key:'';?>" data-redirect="objective-list" class="horizontal-form" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="control-label">Section<span class="required">*</span></label><br>
                                                        <div class="input-icon">                     
                                                            <select class="form-control select2me" name="section_id">
                                                                <option value="">Select </option>
                                                                <?php if(isset($section_data) && !empty($section_data))
                                                                {
                                                                    foreach ($section_data as $key)
                                                                    { ?>
                                                                        <option value="<?php echo(isset($key->section_id) && !empty($key->section_id))?$key->section_id:'';?>" <?php echo(isset($objective_section_data->section_id) && !empty($objective_section_data->section_id) && ($objective_section_data->section_id==$key->section_id))?'selected="selected"':'';?>><?php echo(isset($key->name) && !empty($key->name))?$key->name:'';?></option>
                                                                    <?php }
                                                                } ?>
                                                                
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Exam Type<span class="required">*</span></label>
                                                    <div class="input-icon">
                                                        <select class="form-control select2me" id="exam_type" name="exam_type">
                                                            <option value="">Select Exam Type</option>
                                                            <option value="main" <?php echo(isset($objective_section_data->exam_type) && !empty($objective_section_data->exam_type) && ($objective_section_data->exam_type=='main'))?'selected="selected"':''; ?>>Main</option>
                                                            <option value="demo" <?php echo(isset($objective_section_data->exam_type) && !empty($objective_section_data->exam_type) && ($objective_section_data->exam_type=='demo'))?'selected="selected"':''; ?>>Demo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Question in English<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <textarea name="question_english" id="question_english" class="form-control" placeholder="Member Designation"><?php echo (isset($objective_section_data->question_english) && !empty($objective_section_data->question_english))?$objective_section_data->question_english:''?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Question in Marathi<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <textarea  name="question_marathi" id="question_marathi" class="form-control"placeholder="Member Designation"><?php echo (isset($objective_section_data->question_marathi) && !empty($objective_section_data->question_marathi))?$objective_section_data->question_marathi:''?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Question in Hindi<span class="require" aria-required="true" style="color:red">*</span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <textarea name="question_hindi" id="question_hindi" class="form-control" placeholder="Member Designation"><?php echo (isset($objective_section_data->question_hindi) && !empty($objective_section_data->question_hindi))?$objective_section_data->question_hindi:''?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="form-section">Option Details</h3>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center;" width="50%">
                                                                    Option
                                                                </th>
                                                                <th style="text-align:center;" width="10%">
                                                                    Answer
                                                                </th>
                                                                <th style="text-align:center;" width="10%">
                                                                    Action
                                                                </th>                                                          
                                                            </tr>
                                                        </thead>                                                        
                                                        <tbody class="appendDynaRow">
                                                            <?php  if(isset($option_data) && !empty($option_data))
                                                            { $i=1;
                                                                foreach ($option_data as $key) 
                                                                { ?>
                                                                    <input type="hidden" value="<?php echo $i;?>" name="list_count">
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" value="<?php echo $key->option_id;?>" name="option_id[]">
                                                                            <input type="text" class="form-control" placeholder="Add Option" name="option[]" tabindex="" value="<?php echo (isset($key->option) && !empty($key->option))?htmlentities($key->option):'';?>">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <div class="form-group">
                                                                                <div class="radio-list">
                                                                                    <label><input type="radio" name="ans_option" value="<?php echo $i++; ?>"  <?php echo ($objective_section_data->option_id==$key->option_id)?'checked="checked"':''; ?> ></label>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="text-align: center; vertical-align: middle;" width="10%">
                                                                            <div class="addDeleteButton">
                                                                                <span class="tooltips addDynaRow" data-placement="top" data-original-title="Add" style="cursor: pointer;">
                                                                                    <i class="fa fa-plus"></i> 
                                                                                </span>
                                                                                <?php $j=1; if($j>1)
                                                                                { ?>          
                                                                                    <span class="tooltips deleteRow" style="cursor: pointer;" data-original-title="Remove" rev="delete_option" rel="<?php echo (isset($key->option_id) && !empty($key->option_id))?$key->option_id:'';?>" data-placement="top">
                                                                                        <i class="fa fa-trash-o"></i>
                                                                                    </span>
                                                                                <?php } $j++; ?> 
                                                                            </div>
                                                                        </td>
                                                                    </tr> 
                                                            <?php }
                                                            }
                                                            else
                                                            { ?>
                                                                <tr>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" class="form-control" placeholder="Add Option" name="option[]" tabindex="">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <div class="form-group">
                                                                            <div class="radio-list">
                                                                                <label><input type="radio" name="ans_option" value="1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center; vertical-align: middle;" width="10%">
                                                                        <div class="addDeleteButton">
                                                                            <span class="tooltips addDynaRow" data-placement="top" data-original-title="Add" style="cursor: pointer;">
                                                                                <i class="fa fa-plus"></i> 
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr> 
                                                      <?php }?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo(isset($objective_section_data->question_id) && !empty($objective_section_data->question_id))?$objective_section_data->question_id:'';?>" name="question_id">
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo base_url();?>objective-list" class="btn blue" style="float: left;">Back</a>
                                        <button type="button" class="btn btn-danger clearData">Cancel</button>
                                        <button type="submit" class="btn green common_save" rel="<?php echo(isset($objective_section_data->question_id) && !empty($objective_section_data->question_id))?$objective_section_data->question_id:''?>"><i class="fa fa-dot-circle-o"></i> <?php echo(isset($objective_section_data->question_id) && !empty($objective_section_data->question_id))?'Update':'Save';?></button>
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
<script src="<?php echo base_url();?>assets/js/fileinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
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