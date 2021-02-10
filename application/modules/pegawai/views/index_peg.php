<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('pegawai');?>">User</a></li>
  </ol>
  <h1 class="page-header">Data User</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a>
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
          <p>Silahkan input <b>Data User</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php if($this->session->flashdata('pegawai') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('pegawai') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">No</th>
                <th class="text-nowrap">NIP</th>
                <th class="text-nowrap">Nama Lengkap</th>
                <th class="text-nowrap">Role</th>
                <th class="text-nowrap">Aksi</th>
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
                <td><?= $row->nip == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nip ?></td>
                <td><?= $row->nama_user == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_user ?></td>
                <td><?= $row->role == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->role ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpeg<?php echo $row->id_user;?>"><i class="fa fas fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapuspeg<?php echo $row->id_user;?>"><i class="fa fas fa-trash"></i></a>
                    <!-- <a href="#" class="btn btn-sm btn-secondary"><i class="fa fas fa-lock"></i></a> -->
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->
  </div>
  
  <!-- Modal ADD USER -->
  <div class="modal fade" id="addpeg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="pegawai/tambah_pegawai" method="POST">
            <div class="form-group">
              <label for="nip" class="col-form-label">Nip:</label>
              <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip User.." required>
            </div>
            <div class="form-group">
              <label for="nama_user" class="col-form-label">Nama Lengkap:</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Lengkap.." required>
            </div>
            <div class="form-group">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="****" required>
            </div>
            <div class="form-group">
              <label for="konfirmasi_password" class="col-form-label">Konfirmasi Password:</label>
              <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="****" required>
            </div>
            <div class="form-group">
              <label for="role" class="col-form-label">Akses:</label>
                <select class="form-control" name="role" id="role" required>
                  <option disabled selected> Pilih Akses </option>
                  <?php
                  foreach($role as $row){
                  ?>
                    <option value="<?php echo $row->role_name ?>"><?php echo $row->role_name ?></option>
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

  <?php
    foreach($data as $row){
  ?>
  <!-- Modal EDIT USER -->
  <div class="modal fade" id="editpeg<?php echo $row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="pegawai/edit_pegawai" method="POST">
            <input type="hidden" class="form-control" id="nip" name="nip" placeholder="Nama Lengkap.." value="<?php echo $row->nip;?>">
            <div class="form-group">
              <label for="role" class="col-form-label">Akses:</label>
                <select class="form-control" name="role" id="role" required>
                  <option disabled selected> Pilih Akses </option>
                  <?php
                  foreach($role as $rows){
                  ?>
                    <?php if($row->role == $rows->role_name){?>
                      <option value="<?php echo $rows->role_name ?>" selected><?php echo $rows->role_name ?></option>
                    <?php }else{ ?>
                      <option value="<?php echo $rows->role_name ?>"><?php echo $rows->role_name ?></option>
                    <?php } ?>
                  <?php
                  }
                  ?>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php
    foreach($data as $row){
  ?>
  <!-- Modal HAPUS USER -->
  <div class="modal fade" id="hapuspeg<?php echo $row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="pegawai/hapus_pegawai">
            <div class="modal-body">
              <p>Anda yakin mau menghapus User <b><?php echo $row->nama_user;?></b></p>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_user" value="<?php echo $row->id_user;?>">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</div>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password").onchange = validatePassword;
        document.getElementById("konfirmasi_password").onchange = validatePassword;
    }

    function validatePassword(){
      var pass2=document.getElementById("konfirmasi_password").value;
      var pass1=document.getElementById("password").value;
      console.log(pass2);
      console.log(pass1);
      console.log(pass1!=pass2);
      
      if(pass1.length >= 6)
        document.getElementById("password").setCustomValidity('');
      else
        document.getElementById("password").setCustomValidity("Password Kurang dari 6 character");
      

      if(pass1!=pass2)
          document.getElementById("konfirmasi_password").setCustomValidity("Password Tidak Sama, Coba Lagi");
      else
          document.getElementById("konfirmasi_password").setCustomValidity('');
    }
</script>