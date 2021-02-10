<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kemeng'); ?>">Presensi</a></li>

  </ol>
  <h1 class="page-header">Presensi</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          <span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addpresensi">TAMBAH PRESENSI</a></span>
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

        <!-- <p><a href="export.php"><button>Export Data ke Excel</button></a></p> -->
        <div class="table-responsive">
		  	<?php if ($this->session->flashdata('absen') != NULL) { ?>
				<div class="alert alert-<?php echo $this->session->flashdata('absen') [0] ?> alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('absen') [1] ?>
				</div>
			<?php } ?> 
		 
          <!-- <a href="<?php echo base_url('d_praja/export'); ?>">Export Data</a> -->

          <div class="panel-body">
            <table id="data-presensi" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <TH>NAMA DOSEN </TH>
                  <th>NAMA MATKUL</th>
                  <th>NAMA FAKULTAS</th>
                  <th>NAMA PRODI</th>
				  <th>KELAS</th>
				  <th>TANGGAL</th>
				  <th>JAM</th>
                </tr>
              </thead>

            </table>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

<!--tambah-->
<div aria-hidden="true" aria-labelledby="myModalLabel" id="addpresensi" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
	   			<h4 class="modal-title">Tambah Presensi</h4>
	   			<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	   		</div>

			<form class="form-horizontal" action="<?php echo base_url('kemeng/tambah_presensi'); ?>" method="POST">
				<div class="modal-body">
         			<div class="form-group">
						<div class="row">
							<div class="col-xl">
								<label for="dosen">Nama Dosen:</label>
								<select id="dosen" name="nip_dosen" class="form-control" style="width: 100%" > 
									<option disabled selected>Nama Dosen..</option>
									<?php foreach ($nama_dosen as $dosen) { ?>
										<option value="<?php echo $dosen->nip; ?>"><?php echo $dosen->nama; ?></option>						
									<?php } ?>
								</select>
								<br>
								<label for="fakultas">Fakultas:</label>
								<select class="form-control" id="fakultas" name="fakultas" required>
									<option disabled selected> Pilih Fakultas </option>
								</select>
								<br>
								<label for="prodi">Prodi:</label>
								<select class="form-control" id="prodi" name="prodi" required>
									<option disabled selected> Pilih Program Studi </option>
								</select>
								<br>
								<label for="matkul">Mata Kuliah:</label>
								<select class="form-control" id="matkul" name="matkul" required>
									<option disabled selected> Pilih Mata Kuliah</option>
								</select>
								<br>
								<label for="kelas">Kelas:</label>
								<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
								<br>
								<!-- <input type="hidden" name="nama_dosen" id="nama_dosen">
								<input type="hidden" name="sks" id="sks"> -->
								<input type="hidden" name="indeks" id="indeks">
								<!-- <label for="tanggal">Tanggal:</label>
								<div class="input-group date" id="tanggal">
									<input type="text" class="form-control" name="tanggal" value ="<?php echo date('Y-m-d') ?>" placeholder="Tanggal" required>
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<br>
								<label for="jam">Jam:</label>
								<div class="input-group date" id="jam">
									<input type="text" class="form-control" name="jam" value ="<?php echo date('H:i') ?>" placeholder="Jam" required>
									<div class="input-group-addon">
										<i class="fa fa-clock"></i>
									</div>
								</div> -->
								</div>
							</div>
							<div class="panel-body">
								<div class="col-xl">
									<button type="submit" class="btn btn-blue" value="Cek">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>

  $(document).ready(function() {

    var url = '<?php echo base_url('kemeng/get_allp');?>';
    // alert(url);

        $('#data-presensi').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": ""
            }
          });
      });

    </script>