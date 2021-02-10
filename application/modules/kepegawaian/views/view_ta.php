<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/ta');?>">Tenaga Ahli</a></li>
  </ol>
  <h1 class="page-header">Data TA</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){?>
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addta"><i class="fa fa-plus-square"></i></a>
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
          <p>Tambah <b>Data TA</b> Click icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('ta') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('ta') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
            <div class ="table-responsive">
                <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Dik</th>
                        <th>Penugasan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach($data as $row){
                        $no++;
                        ?>

                        <tr>
                            <td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                            <td><?= $row->nama_lengkap == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_lengkap ?></td>
                            <td><?= $row->tempat_lahir == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tempat_lahir ?></td>
                            <td><?= date('d/m/Y', strtotime($row->tanggal_lahir)) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : date('d/m/Y', strtotime($row->tanggal_lahir)) ?></td>
                            <td><?= $row->dik == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->dik ?></td>
                            <td><?= $row->penugasan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->penugasan ?></td>
                            <?php if($this->session->userdata('role') == 'Admin'){?>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editta<?php echo $row->nik;?>"><i class="fa fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapusta<?php echo $row->nik;?>"><i class="fa fas fa-trash"></i></a>
                            </td>
                            <?php }else{?>
                                <td>-</td>
                            <?php } ?>
                        </tr>
                        <!-- Modal EDIT TA -->
                        <div class="modal fade" id="editta<?php echo $row->nik;?>" tabindex="-1" role="dialog" aria-labelledby="edittaa" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="edittaa">Edit TA <?php echo $row->nama_lengkap;?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="edit_ta" method="POST">
                                            <input type="hidden" class="form-control" id="nik" name="nik" value="<?php echo $row->nik;?>">
                                            <div class="form-group">
                                                <label class="col-form-label">Nama:</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row->nama_lengkap;?>" placeholder="Nama Lengkap.." required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <label class="col-form-label">Tempat Lahir:</label>
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir;?>" placeholder="Tempat Lahir.." required>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label class="col-form-label">Tanggal Lahir:</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir;?>" required>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label class="col-form-label">DIK:</label>
                                                        <select class="form-control" id="dik" name="dik" required>
                                                            <option disabled selected> Pilih </option>
                                                            <?php foreach($tp as $rows){ ?>
                                                                <?php if($rows->tingkat_pendidikan == $row->dik){?>
                                                                <option value="<?php echo $rows->tingkat_pendidikan ?>" selected><?php echo $rows->tingkat_pendidikan ?></option>
                                                                <?php }else{ ?>
                                                                <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Penugasan:</label>
                                                <input type="text" class="form-control" id="penugasan" name="penugasan" value="<?php echo $row->penugasan;?>" placeholder="Penugasan.." required>
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

                        <!-- Modal HAPUS TA -->
                        <div class="modal fade" id="hapusta<?php echo $row->nik;?>" tabindex="-1" role="dialog" aria-labelledby="hapustaa" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="hapustaa">Hapus Data TA</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="hapus_ta">
                                            <div class="modal-body">
                                                <p>Anda yakin mau menghapus Data TA <b><?php echo $row->nama_lengkap;?></b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="nik" value="<?php echo $row->nik;?>">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                        <!-- END FOREACH -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

    <!-- Modal ADD TA -->
    <div class="modal fade" id="addta" tabindex="-1" role="dialog" aria-labelledby="addtaa" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addtaa">Tambah TA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="tambah_ta" method="POST">
                    <div class="form-group">
                            <label class="col-form-label">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap.." required>
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
                                    <label class="col-form-label">DIK:</label>
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