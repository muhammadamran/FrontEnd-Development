<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url('frontend/K_Frontend/menu');?>">Menu</a></li>
	</ol>
	<h1 class="page-header">Data Menu</h1>
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#add-menu"><i class="fa fa-plus-square"></i></a>
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
					<p>Silahkan input <b>Data Menu</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
				</div>
				<?php if($this->session->flashdata('menu') != NULL){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Notif!</strong> <?= $this->session->flashdata('menu') ?>
					</div>
				<?php } ?>
				<div class="panel-body">
					<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr align="center">
								<th class="text-nowrap">No</th>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Title</th>
								<th class="text-nowrap">Link</th>
								<th class="text-nowrap">Icon</th>
								<th class="text-nowrap">Posisi Menu</th>
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
									<td><?= $row->title == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->title ?></td>
									<td><?= $row->link == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->link ?></td>
									<td><?= $row->icon == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->icon ?></td>
									<td><?= $row->is_main_menu == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->is_main_menu ?></td>
									<td>
										<?php if ($row->berkas == 0) { ?>
										<a href="<?= base_url('frontend/K_Frontend/show_m/'.$row->id);?>" class="btn btn-sm btn-success" style="color:#fff;cursor:pointer"><i class="fa fas fa-eye"></i> Show</a>
										
										<?php }elseif ($row->berkas == 1) { ?>
										
										<a href="<?= base_url('frontend/K_Frontend/hide_m/'.$row->id);?>" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer"><i class="fa fas fa-eye-slash"></i> Hide</a>
										
										<?php } ?>
									</td>
									<td>
										<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-menu<?= $row->id;?>"><i class="fa fas fa-edit"></i></a>
										<a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#del-menu<?= $row->id;?>"><i class="fa fas fa-trash"></i></a>
									</td>
								</tr>

								<!-- EDIT MENU -->
								<div class="modal fade" id="edit-menu<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Data Menu</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="edit_menu" method="POST">
													<div class="form-group">
														<label class="col-form-label">Menu Title</label>
														<input type="text" class="form-control" name="title" value="<?= $row->title;?>" placeholder="Menu Title ..." required>
														<input type="hidden" name="id" value="<?= $row->id;?>">
													</div>
													<div class="form-group">
														<label class="col-form-label">Link Menu</label>
														<input type="text" class="form-control" name="link" value="<?= $row->link;?>" placeholder="Link Menu ..." required>
													</div>
													<div class="form-group">
														<label class="col-form-label">Icon (Optional)</label>
														<input type="text" class="form-control" name="icon" value="<?= $row->icon;?>" placeholder="Icon ...">
													</div>
													<div class="form-group">
														<label class="col-form-label">Posisi Menu</label>
														<select class="form-control" name="is_main_menu" required>
															<option value="<?= $row->is_main_menu;?>">(<?= $row->is_main_menu;?>)</option>
															<option value=""> Pilih Posisi Menu </option>
															<option value="1">Menu Utama (1)</option>
															<option value="2">Menu SubUtama (2)</option>
															<option value="3">Menu SubSubUtama (3)</option>
														</select>
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

								<!-- DELETE MENU -->
								<div class="modal fade" id="del-menu<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Hapus Data Menu</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="form-horizontal" method="post" action="del_menu">
													<div class="modal-body">
														<p>Anda yakin mau menghapus Menu <b><?= $row->title;?></b>?</p>
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

	<!-- ADD MENU -->
	<div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="add_menu" method="POST">
						<div class="form-group">
							<label class="col-form-label">Menu Title</label>
							<input type="text" class="form-control" name="title" placeholder="Menu Title ..." required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Link Menu</label>
							<input type="text" class="form-control"  name="link" placeholder="Link Menu ..." required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Icon (Optional)</label>
							<input type="text" class="form-control" name="icon" placeholder="Icon ...">
						</div>
						<div class="form-group">
							<label class="col-form-label">Posisi Menu</label>
							<select class="form-control" name="is_main_menu" required="required">
								<option disabled> Pilih Posisi Menu </option>
								<option value="1">Menu Utama (1)</option>
								<option value="2">Menu SubUtama (2)</option>
								<option value="3">Menu SubSubUtama (3)</option>
							</select>
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
