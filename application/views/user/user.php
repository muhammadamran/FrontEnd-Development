<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Data Pegawai</a></li>
  </ol>
  <h1 class="page-header">Data Pegawai</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href="index.php?m=user&s=user_add" target="_blank" class="btn btn-icon btn-sm btn-inverse"><i class="fa fa-plus-square"></i></a>
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
          <p>Silahkan input <b>Data Pegawai</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">NIDN</th>
                <th class="text-nowrap">Nama Lengkap</th>
                <th class="text-nowrap">Jabatan</th>
                <th class="text-nowrap">Golongan</th>
                <th class="text-nowrap">Pangkat</th>
                <th class="text-nowrap">Status Pegawai</th>
                <th class="text-nowrap">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $data = $db->query("SELECT * FROM tb_user ORDER BY id DESC", 0);
                while($row = $data->fetch_assoc()) {
            ?>
              <tr>
                <td><?= $row['NIDN'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['NIDN'] ?></td>
                <td><?= $row['nama_lengkap'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['nama_lengkap'] ?></td>
                <td><?= $row['jabatan'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['jabatan'] ?></td>
                <td><?= $row['golongan'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['golongan'] ?></td>
                <td><?= $row['pangkat'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['pangkat'] ?></td>
                <td><?= $row['status_pegawai'] == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row['status_pegawai'] ?></td>
                <td>
                    <a href="index.php?m=user&s=user_edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fas fa-edit"></i></a>
                    <a href="index.php?m=user&s=user_password&id=<?= $row['id'] ?>" class="btn btn-sm btn-secondary"><i class="fa fas fa-lock"></i></a>
                    <a onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer"><i class="fa fas fa-trash"></i></a>
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
</div>