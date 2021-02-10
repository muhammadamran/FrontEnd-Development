<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/thl');?>">Tenaga Harian Lepas (thl)</a></li>
  </ol>
  <h1 class="page-header">Data THL</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){?>
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addthl"><i class="fa fa-plus-square"></i></a>
            <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <?php if($this->session->userdata('role') == 'Admin'){?>
        <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Tambah <b>Data THL</b> Click icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('thl') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('thl') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
            <div class ="table-responsive">
                <table id="tbl-scdb-thl" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pendidikan</th>
                        <th>Penugasan</th>
                        <th>Satuan Kerja</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

    <!-- Modal EDIT THL -->
    <div class="modal fade" id="editthl" tabindex="-1" role="dialog" aria-labelledby="editthll" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editthll">Edit THL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="edit_thl" method="POST">
                        <input type="hidden" class="form-control" id="id_thlx" name="id_thl">
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="namax" name="nama" placeholder="Nama Lengkap.." required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tempat_lahirx" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahirx" name="tanggal_lahir" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Pendidikan:</label>
                                    <select class="form-control" id="dikx" name="dik" required>
                                        <?php foreach($tp as $rows){ ?>
                                            <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Penugasan:</label>
                            <input type="text" class="form-control" id="penugasanx" name="penugasan" placeholder="Penugasan.." required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Satuan kerja:</label>
                            <select class="form-control" id="nama_satkerx" name="nama_satker" required>
                                <?php foreach($ns as $rows){ ?>
                                    <option value="<?php echo $rows->nama_satker ?>"><?php echo $rows->nama_satker ?></option>
                                <?php } ?>
                            </select>
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

    <!-- Modal HAPUS THL -->
    <div class="modal fade" id="hapusthl" tabindex="-1" role="dialog" aria-labelledby="hapusthll" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="hapusthll">Hapus Data THL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="hapus_thl">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus Data <input type="text" id="namaxx" disabled> ?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_thlxx" name="id_thl">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ADD THL -->
    <div class="modal fade" id="addthl" tabindex="-1" role="dialog" aria-labelledby="addthll" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addthll">Tambah THL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="tambah_thl" method="POST">
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap.." required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Pendidikan:</label>
                                    <select class="form-control" id="dik" name="dik" required>
                                        <option disabled selected> Pilih </option>
                                        <?php foreach($tp as $rows){?>
                                            <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Penugasan:</label>
                            <input type="text" class="form-control" id="penugasan" name="penugasan" placeholder="Penugasan.." required>
                        </div>
                        <!-- <div class="col-sm"> -->
                                <label class="col-form-label">Satuan Kerja:</label>
                                <select class="form-control" id="nama_satker" name="nama_satker" required>
                                    <option disabled selected> Pilih </option>
                                    <?php foreach($ns as $rows){?>
                                        <option value="<?php echo $rows->nama_satker ?>"><?php echo $rows->nama_satker ?></option>
                                    <?php } ?>
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

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js');?>"></script>