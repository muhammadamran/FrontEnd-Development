<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<style>
    .cst-icon {
        width: 90px;
        background-color: rgba(0, 0, 0, 0.12);
    }
</style>
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('ortala'); ?>">Ortala</a></li>
        <li class="breadcrumb-item">Peraturan Rektor</li>
	</ol>
    <h1 class="page-header">Peraturan Rektor</h1>
    <div class="row my-3">
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
            <div class="card bg-warning mb-3">
                <div class="row no-gutters mx-0">
                    <div class="cst-icon">
                        <div class="m-20">
                            <i class="fas fa-check fa-4x text-white"></i>
                        </div>
                    </div>
                    <div class="cst-text text-white">
                        <div class="card-body">
                            <h4 class="card-title">Open</h4>
                            <h5 class="card-text"><?php echo $open_pr ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
            <div class="card bg-success mb-3">
                <div class="row no-gutters mx-0">
                    <div class="cst-icon">
                        <div class="m-20">
                            <i class="fas fa-sync-alt fa-4x text-white"></i>
                        </div>
                    </div>
                    <div class="text-white">
                        <div class="card-body">
                            <h4 class="card-title">Done</h4>
                            <h5 class="card-text"><?php echo $done_pr ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

  	<div class="row">
    	<div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span>
                        <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'ortala'){?>
                            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add_PR">TAMBAH PERATURAN REKTOR</a>
                            <?php } ?>
                        </span>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php if ($this->session->flashdata('prokum') != NULL) { ?>
                        <div class="alert alert-<?php echo $this->session->flashdata('prokum') [0] ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('prokum') [1] ?>
                        </div>
                    <?php } ?> 
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
            </div>
        </div>
    </div>
</div>

    <!-- Modal ADD -->
    <div class="modal fade" id="add_PR" tabindex="-1" role="dialog" aria-labelledby="add_PR" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduuu">Tambah Peraturan Rektor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-xl">
                    <form action="<?php echo base_url('ortala/add_prokum'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id_kat" value="4">
							<input type="hidden" name="nama_kat" value="Peraturan Rektor">
                            <input type="hidden" name="url" value="pr">
                            
                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" name="nomor" placeholder="Nomor" required>

                            <label class="col-form-label">Tanggal:</label>
							<input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>

                            <label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" name="tahun" placeholder="Tahun" required>
                         
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <!-- <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" name="link" placeholder="Link" required>
                             -->
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="status_add" required>
                                <option value="" selected disabled >Pilih Status</option>  
                                <option value="Open">Open</option>
                                <option value="Done">Done</option>
                            </select>

                            <div id="div-add-show" class="hide">
                                <label class="col-form-label">File:</label>
                                <input type="file" class="form-control" name="file" id="file_add" accept="application/pdf">
                            </div>
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

    <!-- Modal EDIT -->
    <div class="modal fade" id="editprokum" tabindex="-1" role="dialog" aria-labelledby="editprokum" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title">Edit Peraturan Rektor</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form id="form_edit" action="<?php echo base_url('ortala/edit_prokum'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_prokum" name="id_prokum">
                        <input type="hidden" name="url" value="pr">

                        <div class="form-group">                              
                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" required>

                            <label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>

                            <label class="col-form-label">Tanggal:</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                            
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <!-- <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link" required> -->
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="status" required>
                                <option value="Open">Open</option>
                                <option value="Done">Done</option>
                            </select>

                            <div id="div-edit-show" class="hide">
                                <label class="col-form-label">File:</label>
                                <div id="nama_pdf" class="my-1"></div>
                                <input type="file" id="file_edit" class="form-control" name="file" accept="application/pdf">
                                <p class="mt-1 text-danger" id="pdf_info"></p>
                            </div>

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

    <!-- Modal HAPUS -->
    <div class="modal fade" id="delprokum" tabindex="-1" role="dialog" aria-labelledby="delprokumm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title" id="delprokumm">Hapus Peraturan Rektor</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('ortala/del_prokum'); ?>">
                        <div class="modal-body" id="del-info"></div>
                        <div class="modal-footer">
                            <input type="hidden" id="del_id_prokum" name="del_id_prokum">
                            <input type="hidden" name="url" value="pr">
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
    var url = '<?php echo base_url('ortala/get_pr');?>';
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
				"targets": [7, 6]
			}
  		]
    });
    
    // add
    $('#add_PR').on('show.bs.modal', function () {
		var modal = $(this);
        var status_add_opt =  modal.find("#status_add");
        
        $(status_add_opt).change(function() {
            var status_add_val = $(this).val();
            if(status_add_val === "Done") {
                $("#div-add-show").removeClass("hide");
                $("#file_add").prop('required', true);
            }
            else {
                $("#div-add-show").addClass("hide");
                $("#file_add").prop('required', false);
            }
        });
    });
	
	// edit
	$('#editprokum').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget);
		var modal = $(this);
        var status_edit = div.data('status');
        var status_edit_opt =  modal.find("#status");
        var nama_pdf = div.data('file');

		modal.find('#id_prokum').attr("value", div.data('prokum'));
		modal.find('#nomor').attr("value", div.data('nomor'));
        modal.find('#tanggal').attr("value", div.data('tanggal'));
		modal.find('#tahun').attr("value", div.data('tahun'));
		modal.find('#tentang').text(div.data('tentang'));
        // modal.find('#link').attr("value", div.data('link'));

        if(nama_pdf) {
            modal.find('#nama_pdf').text(nama_pdf);
            modal.find('#pdf_info').text("*Abaikan field ini jika tidak ingin mengubah file");
        }

        $("#status").val(status_edit);
        var status_edit_val = $(status_edit_opt).val();
        if(status_edit_val === "Done") {
            $("#div-edit-show").removeClass("hide");
        }
        else {
            $("#div-edit-show").addClass("hide");
        }
        
        $(status_edit_opt).change(function() {
            var status_edit_val = $(this).val();
            if(status_edit_val === "Done") {
                $("#div-edit-show").removeClass("hide");
                if(!nama_pdf) {
                    $("#file_edit").prop('required', true);
                }
            }
            else {
                $("#div-edit-show").addClass("hide");
                $("#file_edit").prop('required', false);
            }
        });
    });
    
    $('#editprokum').on('hidden.bs.modal', function(){
        var modal = $(this);
        modal.find('#nama_pdf').text('');
        modal.find('#pdf_info').text('');
    });

	// delete
	$('#delprokum').on('show.bs.modal', function (event) {
		var del = $(event.relatedTarget) ;
		var modal = $(this);

		var tahun_del = del.data('tahun');
		var nomor_del = del.data('nomor');
		var tentang_del = del.data('tentang');
		modal.find('#del_id_prokum').attr("value", del.data('id_prokum'));
		modal.find('#del-info').text(`Anda yakin akan menghapus Peraturan Rektor nomor ${nomor_del} tahun ${tahun_del} tentang ${tentang_del}?`);
	});
});
</script>