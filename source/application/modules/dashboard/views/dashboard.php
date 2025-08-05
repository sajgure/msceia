<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Admin Dashboard | <?php echo (isset($appname) && !empty($appname))?$appname:'MSCEIA';?></title>
<base href="<?php echo base_url(); ?>" >
<link rel="shortcut icon" href="<?php echo (isset($favicon) && !empty($favicon))?$favicon:'assets/site/assets/frontend/layout/img/logos/favicon.png'; ?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<base href="<?php echo base_url();?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!----- PAGE CSS------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>

<!----- COMMON CSS------->
<link href="<?php echo base_url();?>/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/toast/jquery.toast.css" rel="stylesheet" type="text/css"/>

</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<?php $this->load->view('template/header'); ?>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('template/sidebar'); ?>	
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<div class="row" style="">
				<div class="col-md-6 col-sm-12">
					<div class="portlet light" style=" height:500px;">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Institute Activity</span>
								<span class="caption-helper hide">weekly stats...</span>
							</div>
						</div>
						<div class="portlet-body">
							<div id="inst_activity" style="width:100%; height:450px;"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="portlet light" style="height:500px;">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Today's Registration</span>
							</div>
						</div>
						<div id="today_reg" style="width: 100%; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="portlet light" style=" height:500px;">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Payment Status</span>
								<span class="caption-helper hide">weekly stats...</span>
							</div>
						</div>
						<div class="portlet-body">
						<div id="Payment_status" style="width:100%; height:400px;"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="portlet light" style="height:500px;">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">Student Activity</span>
							</div>
						</div>
						<div id="stud_activity" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
					</div>
				</div>
			</div>
			
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('template/footer'); ?>
<!-- END FOOTER -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/uniform/jquery.uniform.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" ></script>
<!-- PAGE LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/components-bootstrap-multiselect.js" type="text/javascript"></script>
	
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/amcharts/amcharts/funnel.js"></script>
<script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
   	Demo.init(); // init demo features
   	//Index.init(); // init index page
 	Tasks.initDashboardWidget(); // init tash dashboard widget  


    <?php $this->load->model('dashboard/dashboard_model'); 
	  $today_reg = $this->dashboard_model->today_reg();
	  $daily_payment=$this->dashboard_model->daily_payment();
	  $inst_activity=$this->dashboard_model->inst_activity();
	
	if(isset($inst_activity) && !empty($inst_activity))
	{ ?>
		var chart = AmCharts.makeChart("inst_activity",
		{
		  	"type": "pie",
		  	"theme": "light",
		  	"dataProvider": [ 
		  		<?php foreach($inst_activity AS $key)
				{ ?>
		        {
			      "district": "<?php echo (isset($key->district_name) && !empty($key->district_name))?$key->district_name:'NULL'; ?>",
			      "cnt": <?php echo (isset($key->cnt) && !empty($key->cnt))?$key->cnt:'0'; ?>
			    },
		    	<?php } ?>
	 		],
		  	"valueField": "cnt",
		  	"titleField": "district",
		  	"outlineAlpha": 0.5,
		  	"startDuration" : 1,
		  	"depth3D": 15,
		  	"radius":"30%",
		  	"startEffect" : "elastic",
		  	"innerRadius": "25%",
		  	"balloonText": "[[title]]<br><span style='font-size:10px'><b>[[value]]</b> ([[percents]]%)</span>",
		  	"angle": 10
		} );
	<?php } ?>

	<?php 
	if(isset($today_reg) && !empty($today_reg))
	{ 
		$color=array("#FF0F00",  "#FF9E01", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74");
		$i=0; ?>
		var chart = AmCharts.makeChart("today_reg", 
		{
		    "theme": "none",
		    "type": "serial",
			"startDuration": 2,
		    "dataProvider": [
			    <?php foreach ($today_reg as $key) 
			    { ?>
				    {
				        "reg_date": "<?php echo(isset($key->reg_date) && !empty($key->reg_date))?date('d M',strtotime($key->reg_date)):''?>",
				        "cnt": "<?php echo(isset($key->cnt) && !empty($key->cnt))?$key->cnt:''?>",
				        "color": "<?php echo $color[$i]; ?>"
				    },
				<?php $i++; } ?>
			],
		    "valueAxes": [{
		        "position": "left",
		        "axisAlpha":1 
		    }],
		    "graphs": [{
		        "balloonText": "[[category]]: <b>[[value]]</b>",
		        "colorField": "color",
		        "fillAlphas": 0.85,
		        "lineAlpha": 0.1,
		        "type": "column",
		        "topRadius":1,
		        "valueField": "cnt"
		    }],
		    "depth3D": 40,
			"angle": 30,
		    "chartCursor": {
		        "categoryBalloonEnabled": true,
		        "cursorAlpha": 0,
		        "zoomable": false
		    }, 
		    "abelsEnabled": false,  
		    "categoryField": "reg_date",
		    "categoryAxis": {
		        "gridPosition": "start",
		        "labelRotation": 20,
		        "axisAlpha":1
		    }
		},0);
	<?php } ?>
	<?php if(isset($daily_payment) && !empty($daily_payment))
	{ ?>
		var chart = AmCharts.makeChart("Payment_status", {
		    "type": "serial",
		    "theme": "light",
		    "legend": {
		        "useGraphSettings": true
		    },
		    "dataProvider": [
		    <?php foreach($daily_payment AS $key)
			{ ?>
		        {
			      "pay_date": "<?php echo (isset($key->pay_date) && !empty($key->pay_date))?date('d M',strtotime($key->pay_date)):''?>",
			      "online": "<?php echo (isset($key->online_total) && !empty($key->online_total))?$key->online_total:''; ?>",
			      "offline": "<?php echo (isset($key->offline_total) && !empty($key->offline_total))?$key->offline_total:''; ?>",
			      "total": "<?php echo $key->online_total+$key->offline_total; ?>"
			    },
		    <?php } ?>],
		    "valueAxes": [{
		        "axisAlpha": 0,
		        "dashLength": 5,
		        "gridCount": 10,
		        "position": "left",
		        "title": "Amount"
		    }],
		    "startDuration": 0.5,
		    "graphs": [{
		        "balloonText": "Online Payment Amount [[category]]: [[value]]",
		        "bullet": "round",
		        "title": "Online Payment Amount",
		        "valueField": "online",
				"fillAlphas": 0
		    }, {
		        "balloonText": "Offline Payment Amount [[category]]: [[value]]",
		        "bullet": "round",
		        "title": "Offline Payment Amount",
		        "valueField": "offline",
				"fillAlphas": 0
		    }, {
		        "balloonText": "Total Payment Amount [[category]]: [[value]]",
		        "bullet": "round",
		        "title": "Total Payment Amount",
		        "valueField": "total",
				"fillAlphas": 0
		    }],
		    "chartCursor": {
		        "cursorAlpha": 0,
		        "zoomable": false
		    },
		    "categoryField": "pay_date",
		    "categoryAxis": {
		        "gridPosition": "start",
		        "axisAlpha": 0,
		        "labelRotation": 20,
		        "fillAlpha": 0.05,
		        "fillColor": "#001000",
		        "gridAlpha": 0
		    }
		});
	<?php } ?>	

	<?php 
	$stud_count=$this->dashboard_model->stud_count();
	$paid = $stud_count->paid;
	$gold = $stud_count->Gold; 
	$silver = $stud_count->Silver; 
	$bronz = $stud_count->Bronz; ?>
	AmCharts.makeChart("stud_activity",
	{
		"type": "funnel",
		"balloonText": "[[title]]:<b>[[value]]</b>",
		"labelPosition": "right",
		"rotate": true,
		"colorField": "color",
		"marginLeft": 40,
		"marginRight": 150,
		"depth3D": 100,
	 	"angle": 40,
	 	"theme": "light",
		"titleField": "title",
		"valueField": "value",
		"allLabels": [],
		"balloon": {},
		"titles": [],
		"dataProvider": [
			{
				"title": "Result",
				"value": <?php echo (isset($stud_count->result) && !empty($stud_count->result))?$stud_count->result:'0'; ?>,
				"color" :"#04D215"
			},
			{
				"title": "Paid Student",
				"value": <?php echo (isset($stud_count->paid) && !empty($stud_count->paid))?$paid:'0'; ?>,
				"color" :"#F8FF01"
			},
			{
				"title": "Paid by 140/- <br>",
				"value": <?php echo (isset($stud_count->Gold) && !empty($stud_count->Gold))?$gold:'0'; ?>,
				"color" :"#2596be"
			},
			{
				"title": "Paid by 100/- <br>",
				"value": <?php echo (isset($stud_count->Silver) && !empty($stud_count->Silver))?$silver:'0'; ?>,
				"color" :"#abdbe3"
			},
			{
				"title": "Paid by 75/- <br>",
				"value": <?php echo (isset($stud_count->Bronz) && !empty($stud_count->Bronz))?$bronz:'0'; ?>,
				"color" :"#bfff00"
			},
			{
				"title": "UnPaid Student",
				"value": <?php echo (isset($stud_count->unpaid) && !empty($stud_count->unpaid))?$stud_count->unpaid:'0'; ?>,
				"color" :"#FF0F00"
			}
		]
	} );
});
</script>
</body>
<!-- END BODY -->
</html>