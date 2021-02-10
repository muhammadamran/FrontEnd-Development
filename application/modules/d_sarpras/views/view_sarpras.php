<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_sarpras');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url(uri_string());?>"><?= $title; ?></a></li>
	</ol>
	<h1 class="page-header">Sarana dan Prasarana IPDN <?= $title; ?></h1>
	<div class="row">

		<div class="col-xl-12" id="tabs">
			<!-- begin nav-tabs -->
			<ul class="nav nav-tabs">

				<?php $cl = 1; ?>
				<?php foreach (json_decode($l_kat, true) as $y): ?>

					<li class="nav-item">
						<a href="#default-tab-<?= $cl; ?>" id="tab-<?= $cl; ?>" data-toggle="tab" class="nav-link <?php echo $cl==1?'active':''; ?>" data-url="<?= base_url(uri_string()).'/'.url_title($y['kategori']); ?>">
							<span class="d-sm-none">Tab <?= $cl++; ?></span>
							<span class="d-sm-block d-none"><?php echo ucwords(strtolower($y['kategori'])); ?></span>
						</a>
					</li>

				<?php endforeach; ?>

			</ul>
			<!-- end nav-tabs -->
			<!-- begin tab-content -->
			<div class="tab-content">

				<?php $cl = 1; ?>
				<?php foreach (json_decode($l_kat, true) as $y): ?>

					<div class="tab-pane fade <?php echo $cl==1?'active show':''; ?>" id="default-tab-<?= $cl; ?>">
						<h4 class="text-center">Belanja <?php echo ucwords(strtolower($y['kategori'])); ?> bedasarkan Tahun</h4>
						<canvas id="myCharts<?php echo $cl; ?>" height="150%" class="d-sm-none"></canvas>
						<canvas id="myChart<?php echo $cl; ?>" height="80%" class="d-sm-block d-none"></canvas>
						<table class="table table-striped table-bordered table-td-valign-middle" id="tbl-tab-<?php echo $cl++; ?>" width="100%">
							<thead>
								<tr align="center">
									<th>#</th>
									<th>Uraian</th>
									<th>Merk</th>
									<th>Tahun</th>
									<th>Asal Perolehan</th>
									<th>Jumlah/Luas</th>
									<th>Harga Satuan</th>
									<th>Harga Perolehan</th>
									<th>Harga Revaluasi</th>
									<th>Kondisi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tfoot>
								<tr align="center">
									<th colspan="7">TOTAL</th>
									<th><?= $y['total']; ?></th>
									<th><?= $y['perolehan']; ?></th>
									<th colspan="2"></th>
								</tr>
							</tfoot>
						</table>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php $attributes = ['class' => 'form-horizontal form-bordered']; ?>
				<?php echo form_open('d_sarpras/update/'.$this->uri->segment(2), $attributes); ?>
				<input type="hidden" id="editModalId" name="editModalId" value="">
				<div class="form-group row">
					<label for="editModalKode" class="col-sm-4 col-form-label">Kode</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="editModalKode" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="editModalMerk" class="col-sm-4 col-form-label">Merk</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="editModalMerk" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="editModalTahun" class="col-sm-4 col-form-label">Tahun</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="editModalTahun" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="editModalHP" class="col-sm-4 col-form-label">Harga Perolehan</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="editModalHP">
					</div>
				</div>
				<div class="form-group row">
					<label for="editModalHR" class="col-sm-4 col-form-label">Harga Revaluasi</label>
					<div class="col-sm-8">
						<input type="number" min="0" step="0.01" class="form-control" id="editModalHR" name="editModalHR">
					</div>
				</div>
				<div class="form-group row">
					<label for="editModalKondisi" class="col-sm-4 col-form-label">Kondisi</label>
					<div class="col-sm-8">
						<select name="editModalKondisi" class="form-control" id="editModalKondisi">
							<option>Baik</option>
							<option>Rusak Ringan</option>
							<option>Rusak Berat</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

<script>

	<?php $cc = 1; ?>
	

	$(document).ready(function() {
		<?php foreach ($chart as $x): ?>

				$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

					$($.fn.dataTable.tables(true)).DataTable()
					.columns.adjust()
					.responsive.recalc();
				});

			var uri = $("#tab-<?php echo $cc; ?>").attr("Data-url");
			// alert(uri);
			$('#tbl-tab-<?php echo $cc; ?>').DataTable({

				dom: 'Bfrtip',
				buttons: [
				'copy', 'excel', 'print'
				],
				"responsive": true,
				"ajax": {
					"url": uri,
					"dataSrc": ""
				},
				"columns": [
				{ "data": "no" },
				{ "data": "uraian" },
				{ "data": "merk" },
				{ "data": "tahun", className: "text-right" },
				{ "data": "asal" },
				{ "data": "jumlah", className: "text-right" },
				{ "data": "harga_beli", className: "text-right" },
				{ "data": "tb", className: "text-right" },
				{ "data": "tr", className: "text-right" },
				{ "data": "kondisi" },
				{ "data": "id",
				render: function (data) {
					return '<button data-id="' + data + '" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary btn-block"><i class="fa fas fa-edit"></button>';
				},
				className: "text-center"
			}
			]
		});

			$('#tbl-tab-<?= $cc; ?> tbody').on('click', 'button', function () {
				var uri = "<?= base_url().'d_sarpras/detail/'; ?>" + $(this).attr("data-id");
    	    // alert(uri);
    	    $.ajax({
    	    	url: uri,
    	    	success: function(data){
					// alert(data);
					var obj = JSON.parse(data);
					// alert(obj.uraian);
					$('#editModalTitle').text(obj.uraian);
					$('#editModalId').val(obj.id);
					$('#editModalKode').val(obj.kode);
					$('#editModalMerk').val(obj.merk);
					$('#editModalTahun').val(obj.tahun);
					$('#editModalHP').val(obj.harga_beli);
					$('#editModalHR').val(obj.harga_baru);
					$("#editModalKondisi").val(obj.kondisi);
					// alert(data);
				}
			});
    	});

		// {"id":"7925","kode_satker":"448302","kode":"8010101001","uraian":"Software Komputer","nup":"1","merk":"Software Windows","tahun":"2010","jumlah":"1","harga_beli":"4900000","harga_baru":"4900000","asal":"PPs.MAPD","kondisi":"Baik","luas":"0","kategori":"Aset Tak Berwujud","nama_satker":"IPDN KAMPUS JATINANGOR"}
		
		<?php $ch = json_encode($x) ?>

		var labels<?php echo $cc; ?> = <?php echo $ch;?>.map(function(e) {
			return e.tahun;
		});
		var data1_<?php echo $cc;?> = <?php echo $ch;?>.map(function(e) {
			return e.total;
		});

		var data2_<?php echo $cc;?> = <?php echo $ch;?>.map(function(e) {
			return e.perolehan;
		});

		var ctxs<?php echo $cc; ?> = document.getElementById("myCharts<?php echo $cc; ?>").getContext('2d');
		var ctx<?php echo $cc; ?> = document.getElementById("myChart<?php echo $cc; ?>").getContext('2d');

		var gradientFill1s = ctxs<?php echo $cc; ?>.createLinearGradient(0, 0, 0, 290);
		gradientFill1s.addColorStop(0, "rgba(153, 102, 255, 1)");
		gradientFill1s.addColorStop(1, "rgba(153, 102, 255, 0.1)");

		var gradientFill2s = ctxs<?php echo $cc; ?>.createLinearGradient(0, 0, 0, 290);
		gradientFill2s.addColorStop(0, "rgba(75, 192, 192, 1)");
		gradientFill2s.addColorStop(1, "rgba(75, 192, 192, 0.1)");

		var gradientFill1 = ctx<?php echo $cc; ?>.createLinearGradient(0, 0, 0, 290);
		gradientFill1.addColorStop(0, "rgba(153, 102, 255, 1)");
		gradientFill1.addColorStop(1, "rgba(153, 102, 255, 0.1)");

		var gradientFill2 = ctx<?php echo $cc; ?>.createLinearGradient(0, 0, 0, 290);
		gradientFill2.addColorStop(0, "rgba(75, 192, 192, 1)");
		gradientFill2.addColorStop(1, "rgba(75, 192, 192, 0.1)");

		var config = {
			type: 'line',
			data: {
				labels: labels<?php echo $cc;?>,
				datasets: [{
					label: 'Total Belanja',
					data: data1_<?php echo $cc;?>,
					pointBackgroundColor: 'white',
					pointBorderWidth: 1,
					backgroundColor: gradientFill1,
					borderColor: 'rgba(153, 102, 255, 1)'
				},
				{
					label: 'Total Revaluasi',
					data: data2_<?php echo $cc;?>,
					pointBackgroundColor: 'white',
					pointBorderWidth: 1,
					backgroundColor: gradientFill2,
					borderColor: 'rgba(75, 192, 192, 1)'
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
				responsive: true,
				chartArea: {
					backgroundColor: 'rgba(251, 85, 85, 0.4)'
				}
			}
		};

		var charts<?php echo $cc; ?> = new Chart(ctxs<?php echo $cc; ?>, config);
		var chart<?php echo $cc; ?> = new Chart(ctx<?php echo $cc++; ?>, config);

	<?php endforeach; ?>
});

</script>