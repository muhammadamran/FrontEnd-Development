<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('absensi/users'); ?>">Users </a></li>

  </ol>

  <h1 class="page-header"> DATA THL IPDN</h1>
  <div class="row">
    <div class="col-xl-12">

      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'kepegawaian'){?>
              <span> <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addthl"><i class="fa fa-plus-square"></i></a></span>
            <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <?php if($this->session->flashdata('users') != NULL){ ?>
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Notif!</strong> <?php echo $this->session->flashdata('users') ?>
          </div>
        <?php } ?>


        <!-- <div class="table-responsive"> -->
          <div class="panel-body">
            <?php if($this->session->userdata('role') == 'Admin'){?>
              <div class="alert alert-warning fade show">
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
                <span> <p>Silahkan input <b>Data User</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p></span>
              </div>
            <?php } ?>
            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NIK</th>
                  <th>NAMA</th>
                  <th>NO TELP</th>
                  <th>EMAIL</th>
                  <th>USERNAME</th>
                  <th>PENUGASAN</th>
                  <th>LEVEL</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach (json_decode($data, true) as $x): ?>
                  <tr >
                    <td ><?php echo $no++; ?></td>
                    <td ><?= $x['nik']; ?></td>
                    <td ><?= $x['nama']; ?></td>
                    <td ><?= $x['telp']; ?></td>
                    <td ><?= $x['email']; ?></td>
                    <td ><?= $x['username']; ?></td>
                    <td ><?= $x['penugasan']; ?></td>
                    <td ><?= $x['level']; ?></td>
                  <?php endforeach; ?>
                </tr>
                
              </tbody>
            </table>
          </div>
        <!-- </div> -->

      </div>
    </div>
  </div>


  <!-- Modal ADD USER -->
  <div class="modal fade" id="addthl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data THL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="absensi/tambah_users" method="POST">
            <div class="form-group">
              <label for="nik" class="col-form-label">NIK:</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik.." required>
            </div>
            <div class="form-group">
              <label for="nama" class="col-form-label">Nama Lengkap:</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap.." required>
            </div>
            <div class="form-group">
              <label for="telp" class="col-form-label">No Telp:</label>
              <input type="number" class="form-control" id="telp" name="telp" placeholder="No Telp.." required>
            </div>
            <div class="form-group">
              <label for="email" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email.." required>
            </div>

            <div class="form-group">
              <label for="tgl" class="col-form-label">Tanggal:</label>
              <input type="date" class="form-control" id="tgl" name="tgl"  required>
            </div>

            <div class="form-group">
              <label for="penugasan" class="col-form-label">Penugasan:</label>
              <select class="form-control" name="penugasan" id="penugasan" required>
                <option disabled selected> Pilih Penugasan </option>
                <?php
                foreach($penugasan as $row){
                  ?>
                  <option value="<?php echo $row->penugasan ?>"><?php echo $row->penugasan ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
           
            <div class="form-group">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password.." required>
            </div>
            <div class="form-group">
              <label for="level" class="col-form-label">Level:</label>
              <select class="form-control" name="level" id="level" required>
                <option disabled selected> Pilih Level </option>
                <?php
                foreach($level as $row){
                  ?>
                  <option value="<?php echo $row->level ?>"><?php echo $row->level ?></option>
                  <?php
                }
                ?>
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

