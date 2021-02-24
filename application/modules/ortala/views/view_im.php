<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="<?php echo base_url('ortala'); ?>">Intruksi Menteri</a></li>
	</ol>
  	<h1 class="page-header">Intruksi Menteri</h1>
  	<div class="row">
    	<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
					<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'ortala'){?>
						<span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#adduu">TAMBAH INTRUKSI MENTERI</a></span>
						<?php } ?>
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
					<?php if ($this->session->flashdata('prokum') != NULL) { ?>
						<div class="alert alert-<?php echo $this->session->flashdata('prokum') [0] ?> alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('prokum') [1] ?>
						</div>
					<?php } ?> 
			
					<!-- <a href="<?php //echo base_url('uu/export'); ?>">Export Data</a> -->

					<div class="panel-body">
						<table id="data-uu" class="table table-striped table-bordered table-td-valign-middle" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>KATEGORI</th>
									<th>NOMOR</th>
									<th>TANGGAL</th>
									<th>TAHUN</th>
									<th>TENTANG</th>
									<!-- <th>LINK</th> -->
									<th>STATUS</th>
									<th>FILE</th>
									<th>AKSI</th>
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
	</div>
</div>

    <!-- Modal ADD prokum -->
    <div class="modal fade" id="adduu" tabindex="-1" role="dialog" aria-labelledby="adduu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduuu">Tambah Instruksi Menteri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-xl">
                    <form action="<?php echo base_url('ortala/add_prokum'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
							<input type="hidden" name="id_kat" value="8">
							<input type="hidden" name="nama_kat" value="Intruksi Menteri">
							<input type="hidden" name="url" value="im">

                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" name="nomor" placeholder="Nomor" required>

							<label class="col-form-label">Tanggal:</label>
							<input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>

                            <label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" name="tahun" placeholder="Tahun" required>
                         
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <!-- <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" name="link" placeholder="Link" required> -->
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="Status" required>
                                <option value="" disabled selected> Pilih Status</option>  
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
							</select>
							
							<label class="col-form-label">File:</label>
                            <input type="file" class="form-control" name="file" accept="application/pdf">
						</div>
						                        
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" value="Cek">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal EDIT prokum -->
    <div class="modal fade" id="editprokum" tabindex="-1" role="dialog" aria-labelledby="editprokum" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title">Edit Instruksi Menteri</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('ortala/edit_prokum'); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id_prokum" name="id_prokum">
						<input type="hidden" name="url" value="im">
						
                        <div class="form-group">                              
                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" required>

							<label class="col-form-label">Tanggal:</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
							
							<label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                            
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <!-- <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link" required>
                             -->
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="status" required>
                                <option value="Tidak Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
							</select>
							
							<label class="col-form-label">File:</label>
							<div id="nama_pdf" class="my-1"></div>
							<input type="file" id="file_edit" class="form-control" name="file" accept="application/pdf">
							<p class="mt-1 text-danger" id="pdf_info"></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HAPUS prokum -->
    <div class="modal fade" id="delprokum" tabindex="-1" role="dialog" aria-labelledby="delprokumm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title" id="delprokumm">Hapus Instruksi Menteri</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('ortala/del_prokum'); ?>">
                        <div class="modal-body" id="del-info"></div>
                        <div class="modal-footer">
							<input type="hidden" id="del_id_prokum" name="del_id_prokum">
							<input type="hidden" name="url" value="im">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
	
<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script>
$(document).ready(function() {
    var url = '<?php echo base_url('ortala/get_im');?>';
    $('#data-uu').dataTable({
        buttons: [
        	'copy', 'excel', 'print'
        ],
        responsive: true,
		"ajax": {
			"url": url,
			"dataSrc": ""
		},
		"columnDefs": [
			{ 
				"orderable": false, 
				"targets": 7 
			}
  		]
	});
	
	// Edit
	$('#editprokum').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
		var modal = $(this);
		var status_edit = div.data('status');
		var nama_pdf = div.data('file');

		// Isi nilai pada field
		modal.find('#id_prokum').attr("value", div.data('prokum'));
		modal.find('#nomor').attr("value", div.data('nomor'));
		modal.find('#tahun').attr("value", div.data('tahun'));
		modal.find('#tanggal').attr("value", div.data('tanggal'));
		modal.find('#tentang').text(div.data('tentang'));
		modal.find('#link').attr("value", div.data('link'));
		modal.find(`#status option[value="${status_edit}"]`).attr("selected","selected");

		if(nama_pdf) {
            modal.find('#nama_pdf').text(nama_pdf);
            modal.find('#pdf_info').text("*Abaikan field ini jika tidak ingin mengubah file");
        }
	});
		  
	// Hapus
	$('#delprokum').on('show.bs.modal', function (event) {
		var del = $(event.relatedTarget) // Tombol dimana modal di tampilkan
		var modal = $(this)

		var tahun_del = del.data('tahun');
		var nomor_del = del.data('nomor');
		var tentang_del = del.data('tentang');
		modal.find('#del_id_prokum').attr("value", del.data('id_prokum'));
		modal.find('#del-info').text(`Anda yakin akan menghapus Intruksi Menteri nomor ${nomor_del} tahun ${tahun_del} tentang ${tentang_del}?`);
	});
});
</script>