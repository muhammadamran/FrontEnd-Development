<link href="<?php echo base_url().'assets/plugins/bootstrap-daterangepicker/daterangepicker.css'?>" rel="stylesheet" />
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('honor');?>">Honor</a></li>
	</ol>
	<div class="d-sm-flex align-items-center mb-3">
		<a href="#" class="btn btn-inverse mr-2 text-truncate" id="date-filter">
			<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i> 
			<span><?= $uDate; ?></span>
			<b class="caret"></b>
		</a>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					</div>
				</div>
				<div class ="table-responsive">
					<div class="panel-body">
						<h4 class="text-center">HONOR MENGAJAR</h4><br>
						<div id="tbl-honor" class ="table-responsive"></div>
					</div>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/moment/moment.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<script>
	// alert('test');
	$('#date-filter').daterangepicker({
		startDate: "<?= $seDate; ?>",
		singleDatePicker: true,
		showDropdowns: true,
		maxDate: moment(),
		minYear: 2019,
		maxYear: parseInt(moment().format('YYYY'),10)
		},
		function(start, end, label) {
			// start = start.format('01 MMMM YYYY');
			$('#date-filter span').html(start.format('MMMM YYYY'));
			update(start.format('MM-YYYY'));
			// alert(start.format('MM-YYYY'));
			// $('#date-filter span').html(start.format('DD MMMM YYYY'));
			// $('#date-filter span').html(moment().format('MM[/01/]YYYY'));
			// $(location).attr('href', "<?= base_url('d_peringkat');?>"+ "/" + start.format('YYYY-MM-DD'));
			// alert(start.format('YYYY-MM-DD'));
		}
	);

	function update(date) {
		var uri = "<?= base_url().'kemeng/honor_table/'; ?>" + date;
		$.ajax({
			url: uri,
			success: function(data){
				// alert(data);
				// var obj = JSON.parse(data);
				// alert(data);
				$('#tbl-honor').html(data);
			}
		});
	}
</script>