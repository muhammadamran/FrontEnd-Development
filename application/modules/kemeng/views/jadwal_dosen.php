<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">JADWAL DOSEN</a></li>
    </ol>
    <div class="row">
        <div class="col-12">
            <form method='post' action='jadwal_dosen'>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label class="col-form-label">Semester:</label>
                            <select  class="form-control" name="semester">
                                <option value="">Pilih</option>
                                <?php $date = date('Y');?>
                                <option value="GANJIL <?php echo $date?>/<?php echo $date+1?>">GANJIL <?php echo $date?>/<?php echo $date+1?></option>
                                <option value="GENAP <?php echo $date?>/<?php echo $date+1?>">GENAP <?php echo $date?>/<?php echo $date+1?></option>
                                <option value="GANJIL <?php echo $date-1?>/<?php echo $date?>">GANJIL <?php echo $date-1?>/<?php echo $date?></option>
                                <option value="GENAP <?php echo $date-1?>/<?php echo $date?>">GENAP <?php echo $date-1?>/<?php echo $date?></option>
                            </select>
                        </div>
                        <div class="col-0.5">
                            <label class="col-form-label">&nbsp;</label>
                            <button type="submit" class="form-control btn btn-primary btn-sm" name="but_search" value="Search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-default" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
                    <h4 class="panel-title">DOSEN <?php echo $this->session->userdata('nama')?></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <?php if($this->session->flashdata('alert') != NULL){ ?>
                    <div class="note note-warning note-with-right-icon">
                        <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
                        <div class="note-content text-right">
                            <h4><b><?php echo $this->session->flashdata('alert') ?></b></h4>
                            <p>...</p>
                        </div>
                    </div>
                <?php } ?>
                <div class="panel-body panel-form">
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>HARI</th>
                                        <th>NIP</th>
                                        <Th>NAMA</Th>
                                        <th>FAKULTAS</th>
                                        <th>MATAKULIAH</th>
                                        <th>TANGGAL</th>
                                        <th>JAM</th>
                                        <th>KELAS</th>
                                        <th>SEMESTER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $daftar_hari = array(
                                        'Sunday' => 'MINGGU',
                                        'Monday' => 'SENIN',
                                        'Tuesday' => 'SELASA',
                                        'Wednesday' => 'RABU',
                                        'Thursday' => 'KAMIS',
                                        'Friday' => 'JUMAT',
                                        'Saturday' => 'SABTU'
                                    );
                                ?>
                                <?php $no = 1; ?>
                                <?php foreach (json_decode($data, true) as $x): ?>
                                    <?php
                                        $z = $x['tanggal'];
                                        $hari= "$z";
                                        $namahari = date('l', strtotime($hari));
                                    ?>
									<tr class="gradeA">
                                        <td><?= $no; ?></td>
										<td><?= $daftar_hari[$namahari]; ?></td>
                                        <td><?= $x['nip']; ?></td>
                                        <td><?= $x['nama']; ?></td>
                                        <td><?= $x['nama_fakultas']; ?></td>
                                        <td><?= $x['nama_matkul']; ?></td>
                                        <td><?= $x['tanggal']; ?></td>
                                        <td><?= $x['jam']; ?></td>
                                        <td><?= $x['kelas']; ?></td>
                                        <td><?= $x['semester']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>