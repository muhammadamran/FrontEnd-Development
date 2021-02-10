<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_pok');?>">POK JATINANGOR</a></li>
		<?php if(isset($page)) { ?>
			<?php if(strlen($page) == 4) { ?>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'d_pok/'.$blink;?>"><?= $biro ?></a></li>
			<?php } else { ?>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'d_pok/'.$blink;?>"><?= $biro ?></a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'d_pok/'.$ulink;?>"><?= $unit ?></a></li>
			<?php } ?>
		<?php } ?>
	</ol>
	<h1 class="page-header">POK</h1>
	<div class="row">
		<div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="morris-chart-1">
				<div class="panel-heading">
					<h4 class="panel-title"></h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<h4 class="text-center">Laporan Progress Realisasi Anggaran IPDN <?php echo date("Y") ?> Berdasarkan POK</h4>
						<!-- <div id="graph" class="height-sm width-xl"></div> -->
						<canvas id="myCharts" height="170" class="d-sm-none"></canvas>
						<canvas id="myChart" height="70" class="d-sm-block d-none"></canvas>
					</div>
				</div>
			</div>
			<!-- end panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
						<!-- <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a> -->
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- <div class="alert alert-warning fade show">
					<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					</button>
					<p>Silahkan input <b>Data Pegawai</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
				</div> -->
				<div class ="table-responsive">
					<div class="panel-body">
						<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<?php if (isset($page)) { ?>
										<?php if (strlen($page) == 3) { ?>
										<th>Output</th>
										<?php } elseif (strlen($page) == 4) { ?>
										<th>Bagian/Unit/Lembaga</th>
										<?php } ?>
									<?php } else { ?>
									<th>Biro</th>
									<?php } ?>
									<th>Pagu</th>
									<th>Realisasi</th>
									<th>Sisa Pagu</th>
									<th>Persentase</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach (json_decode($data, true) as $x): ?>
									<tr class="gradeA">
										<td><?php echo $no++; ?></td>
										<td><?= $x['nama']; ?></td>
										<td><?= number_format($x['pagu'], 0, ',', '.'); ?></td>
										<td><?= number_format($x['realisasi'], 0, ',', '.'); ?></td>
										<td><?= number_format($x['pagu']-$x['realisasi'], 0, ',', '.'); ?></td>
										<td><?= $x['realisasi']>0?round((100/$x['pagu']*$x['realisasi']), 2)."%":"0%"; ?></td>
										<?php if (isset($x['idx'])){ ?>
											<td><a href='<?= base_url().'d_pok/'.$x['idx'] ?>' class='btn btn-primary mr-1' btn-sm><i class='fa fa-eye'></i></a></td>
										<?php } else { ?>
											<td>Tidak ada detail</td>
										<?php } ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
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
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

<script>
		// function barChart() {
			// Morris.Bar({
			// 	element: 'graph',
			// 	data: <?php echo $data;?>,
			// 	xkey: 'alias',
			// 	ykeys: ['pagu', 'realisasi'],
			// 	labels: ['Pagu', 'Realisasi'],
			// 		// xLabelAngle: 15,
			// 		lineWidth: '3px',
			// 		resize: true,
			// 		redraw: true
			// 	});
		// }

		// rgba(255, 99, 132, 0.2)
		// rgba(54, 162, 235, 0.2)
		// rgba(255, 206, 86, 0.2)
		// rgba(75, 192, 192, 0.2)
		// rgba(153, 102, 255, 0.2)
		// rgba(255, 159, 64, 0.2)

		var label = <?php echo $data;?>.map(function(e) {
			return e.alias;
		});
		var data1 = <?php echo $data;?>.map(function(e) {
			return e.pagu;
		});

		var data2 = <?php echo $data;?>.map(function(e) {
			return e.realisasi;
		});

		var ctxs = document.getElementById("myCharts").getContext('2d');
		var ctx = document.getElementById("myChart").getContext('2d');
		var config = {
			type: 'bar',
			data: {
				labels: label,
				datasets: [{
					label: 'Pagu',
					data: data1,
					borderWidth: 1,
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)'
				},
				{
					label: 'Realisasi',
					data: data2,
					borderWidth: 1,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)'
				}]
			},

			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							userCallback: function(value, index, values) {
								// Convert the number to a string and splite the string every 3 charaters from the end
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								// Convert the array to a string and format the output
								value = value.join('.');
								return value;
							}
						}
					}]
				},
				responsive: true
			}
		};

		var chart = new Chart(ctx, config);
		var charts = new Chart(ctxs, config);
	</script>