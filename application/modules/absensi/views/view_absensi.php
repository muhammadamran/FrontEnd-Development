<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('absensi'); ?>">Rekap Presensi </a></li>

  </ol>

  <h1 class="page-header"> ABSENSI</h1>
  <div class="row">
    <div class="col-xl-12">

      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <div class="table-responsive">
          <div class="panel-body">

            <form method='post' action='absensi'>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-2">
                    <label class="col-form-label">Penugasan :</label>
                    <select class="form-control" name="penugasan" id="penugasan">
                      <option  disabled selected>No Selected</option>
                      <option value="all">All Penugasan</option>
                      <?php foreach ($penugasan as $x) { ?>
                        <option value="<?php echo $x->penugasan;?>"><?php echo $x->penugasan;?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-sm-2">
                    <label class="col-form-label">Start Date:</label>
                    <input type="date" class="form-control" id="fromDate" name="fromDate" value="<?php echo $fromDate ?>" required/>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label">End Date:</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endDate ?>" required/>
                  </div>
                  <div class="col-sm-0.5">
                    <label class="col-form-label">&nbsp;</label>
                    <button type="submit" class="form-control btn btn-primary btn-sm" name="but_search" value="Search"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>

            <?php if($data != 'Tidak') {?>
              <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                  <tr>

                    <!-- id_user,tgl,nama, masuk,penugasan, -->
                    <th>#</th>
                    <!-- <th>ID USER</th> -->
                    <th>Nama</th>
                    <th>TANGGAL</th>
                    <th>MASUK</th>
                    <th>PULANG</th>
                    <th>PENUGASAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach($data as $row){
                    $no++;
                    ?>
                    <tr class="gradeA">
                      <td width="1%"><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                      <!-- <td width="1%"><?= $row->id_user == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->id_user ?></td> -->
                      <td width="1%"><?= $row->nama == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama ?></td>
                      <td width="1%"><?= $row->tgl == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tgl ?></td>
                      <td width="1%"><?= $row->masuk == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->masuk ?></td>
                      <td width="1%"><?= $row->keluar == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->keluar ?></td>
                      <td width="1%"><?= $row->penugasan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->penugasan ?></td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php }else{ ?>
              Silahkan pilih tanggal
            <?php } ?>

          </div>
        </div>

      </div>
    </div>
  </div>