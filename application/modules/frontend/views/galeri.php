<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url('frontend/K_Frontend/Galeri');?>">Galeri</a></li>
	</ol>
	<h1 class="page-header">Data Galeri</h1>
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#add-galeri"><i class="fa fa-plus-square"></i></a>
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="alert alert-warning fade show">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<p>Silahkan input <b>Data Galeri</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
				</div>
				<?php if($this->session->flashdata('galeri') != NULL){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Notif!</strong> <?= $this->session->flashdata('galeri') ?>
					</div>
				<?php } ?>
				<div class="panel-body">
					<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr align="center">
								<th class="text-nowrap">No</th>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Foto</th>
								<th class="text-nowrap">Judul</th>
								<th class="text-nowrap">Keterangan</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Show/Hide</th>
								<th class="text-nowrap">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach($data as $row){
								$no++;
								?>
								<tr align="center">
									<td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?>.</td>
									<td><?= $row->id == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->id ?></td>
									<td>
										<img src="<?= base_url().'assets/img/galeri/'.$row->foto ?>" class="foto-style">
									</td>
									<td><?= $row->judul == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->judul ?></td>
									<td><?= $row->keterangan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->keterangan ?></td>
									<td><?= $row->status == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->status ?></td>
									<td>
										<?php if ($row->berkas == 0) { ?>
										<a href="<?= base_url('frontend/K_Frontend/show_g/'.$row->id);?>" class="btn btn-sm btn-success" style="color:#fff;cursor:pointer"><i class="fa fas fa-eye"></i> Show</a>
										
										<?php }elseif ($row->berkas == 1) { ?>
										
										<a href="<?= base_url('frontend/K_Frontend/hide_g/'.$row->id);?>" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer"><i class="fa fas fa-eye-slash"></i> Hide</a>
										
										<?php } ?>
									</td>
									<td>
										<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-galeri<?= $row->id;?>"><i class="fa fas fa-edit"></i></a>
										<a href="#" class="btn btn-sm btn-warning" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#up-galeri<?= $row->id;?>"><i class="fa fas fa-picture-o"></i></a>
										<a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#del-galeri<?= $row->id;?>"><i class="fa fas fa-trash"></i></a>
									</td>
								</tr>

								<!-- EDIT GALERI -->
								<div class="modal fade" id="edit-galeri<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Data Galeri</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="edit_Galeri" method="POST">
													<div class="form-group">
														<label class="col-form-label">Galeri Title</label>
														<input type="text" class="form-control" name="judul" value="<?= $row->judul;?>" placeholder="Galeri Title ..." required>
														<input type="hidden" name="id" value="<?= $row->id;?>">
													</div>
													<div class="form-group">
														<label class="col-form-label">Keterangan Galeri (Optional)</label>
														<textarea type="text" class="form-control"  name="keterangan" placeholder="Keterangan Galeri ..."><?= $row->keterangan;?></textarea>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" value="Cek">Update</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- UPDATE FOTO GALERI -->
								<div class="modal fade" id="up-galeri<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Foto Galeri</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="edit_fgaleri/<?= $row->id;?>" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<center>
															<img src="<?= base_url().'assets/img/galeri/'.$row->foto ?>" class="foto-style">
														</center>
													</div>
													<div class="form-group">
														<label class="col-form-label">Foto</label>
														<input type="file" class="form-control" name="foto" value="<?= $row->foto;?>"required>
														<input type="hidden" name="id" value="<?= $row->id;?>">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" value="Cek">Update Foto</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- DELETE GALERI -->
								<div class="modal fade" id="del-galeri<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Hapus Data Galeri</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="form-horizontal" method="post" action="del_Galeri">
													<div class="modal-body">
														<p>Anda yakin mau menghapus Galeri <b><?= $row->judul;?></b>?</p>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id" value="<?= $row->id;?>">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
														<button class="btn btn-danger">Hapus</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- ADD GALERI -->
	<div class="modal fade" id="add-galeri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Galeri</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="add_galeri" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-form-label">Foto</label>
							<input type="file" class="form-control" name="foto" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Galeri Title</label>
							<input type="text" class="form-control" name="judul" placeholder="Galeri Title ..." required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Keterangan Galeri (Optional)</label>
							<textarea type="text" class="form-control"  name="keterangan" placeholder="Keterangan Galeri ..."></textarea>
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
</div>
