<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('apps');?>">Aplikasi</a></li>
  </ol>
  <h1 class="page-header">Aplikasi</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addapps"><i class="fa fa-plus-square"></i></a>
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
          <p>Silahkan input <b>Aplikasi</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php if($this->session->flashdata('apps') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('apps') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">No</th>
                <th class="text-nowrap">Nama Aplikasi</th>
                <th class="text-nowrap">Link</th>
                <th class="text-nowrap">Unit</th>
                <th class="text-nowrap">Status</th>
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
                <td><?= $row->nama_apps == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_apps ?></td>
                <td><?= $row->link_apps == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->link_apps ?></td>
                <td><?= $row->nama_unit == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_unit ?></td>
                <td><?= $row->status == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->status ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editapps<?php echo $row->id_apps;?>"><i class="fa fas fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapusapps<?php echo $row->id_apps;?>"><i class="fa fas fa-trash"></i></a>
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

  <!-- Modal ADD Aplikasi -->
  <div class="modal fade" id="addapps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Aplikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="apps/tambah_apps" method="POST">
            <div class="form-group">
              <label for="link_apps" class="col-form-label">Link Apps:</label>
              <input type="text" class="form-control" id="link_apps" name="link_apps" placeholder="Link Apps.." required>
            </div>
            <div class="form-group">
              <label for="nama_apps" class="col-form-label">Nama Apps:</label>
              <input type="text" class="form-control" id="nama_apps" name="nama_apps" placeholder="Nama Apps.." required>
            </div>
            <div class="form-group">
              <label for="image_url" class="col-form-label">Image URL:</label>
              <input type="text" class="form-control" id="image_url" name="image_url" value="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" placeholder="Image URL.." required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label for="kategori_apps" class="col-form-label">Unit:</label>
                  <select class="form-control" name="kategori_apps" id="kategori_apps" required>
                    <option disabled selected> Pilih </option>
                    <?php
                    foreach($kategori as $row){
                    ?>
                      <option value="<?php echo $row->id_app ?>"><?php echo $row->nama_unit ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm">
                  <label for="status" class="col-form-label">Status:</label>
                  <select class="form-control" name="status" id="status" required>
                    <option disabled selected> Pilih </option>
                      <option value="1">Aktif, digunakan</option>
                      <option value="2">Aktif, tidak digunakan</option>
                      <option value="3">Tidak Aktif</option>
                  </select>
                </div>
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

  <?php
    foreach($data as $row){
  ?>
  <!-- Modal EDIT APPS -->
  <div class="modal fade" id="editapps<?php echo $row->id_apps;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Apps <?php echo $row->nama_apps;?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="apps/edit_apps" method="POST">
            <input type="hidden" name="id_apps" value="<?php echo $row->id_apps;?>">
            <div class="form-group">
              <label for="link_apps" class="col-form-label">Link Apps:</label>
              <input type="text" class="form-control" id="link_apps" name="link_apps" value="<?php echo $row->link_apps ?>" placeholder="Link Apps.." required>
            </div>
            <div class="form-group">
              <label for="nama_apps" class="col-form-label">Nama Apps:</label>
              <input type="text" class="form-control" id="nama_apps" name="nama_apps" value="<?php echo $row->nama_apps ?>" placeholder="Nama Apps.." required>
            </div>
            <div class="form-group">
              <label for="image_url" class="col-form-label">Image URL:</label>
              <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo $row->image_url ?>" placeholder="Image URL.." required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label for="kategori_apps" class="col-form-label">Unit:</label>
                  <select class="form-control" name="kategori_apps" id="kategori_apps" required>
                    <option disabled selected> Pilih </option>
                    <?php foreach($kategori as $rows){ ?>
                      <?php if($row->kategori_apps == $rows->id_app){?>
                      <option value="<?php echo $rows->id_app ?>" selected><?php echo $rows->nama_unit ?></option>
                      <?php }else{ ?>
                      <option value="<?php echo $rows->id_app ?>"><?php echo $rows->nama_unit ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-sm">
                  <label for="status" class="col-form-label">Status:</label>
                  <select class="form-control" name="status" id="status" required>
                      <option value="1">Aktif, digunakan</option>
                      <option value="2">Aktif, tidak digunakan</option>
                      <option value="3">Tidak Aktif</option>
                  </select>
                </div>
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
  <?php } ?>

  <?php
    foreach($data as $row){
  ?>
  <!-- Modal HAPUS Aplikasi -->
  <div class="modal fade" id="hapusapps<?php echo $row->id_apps;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Aplikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="apps/hapus_apps">
            <div class="modal-body">
              <p>Anda yakin mau menghapus Aplikasi <b><?php echo $row->nama_apps;?></b></p>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_apps" value="<?php echo $row->id_apps;?>">
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