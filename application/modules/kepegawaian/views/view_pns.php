<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Pegawai Negeri Sipil (PNS)</a></li>
  </ol>
  <h1 class="page-header">Data PNS</h1>

  <!-- TABEL -->
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin'){?>
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpns"><i class="fa fa-plus-square"></i></a>
          <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Kepegawaian'){?>
        <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Tambah <b>Data PNS</b> Click icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('pns') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('pns') ?>
        </div>
        <?php } ?>
        
        <div class="table-responsive">
          <div class="panel-body">
            <table id="tbl-scdb-pns" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th class="text-nowrap">No</th>
                  <th class="text-nowrap">NIP</th>
                  <th class="text-nowrap">Nama Lengkap</th>
                  <th class="text-nowrap">Bagian</th>
                  <th class="text-nowrap">Tempat, Tanggal Lahir</th>
                  <th class="text-nowrap">No Urut Pangkat</th>
                  <th class="text-nowrap">Pangkat (Gol Ruang)</th>
                  <th class="text-nowrap">TMT Pangkat</th>
                  <th class="text-nowrap">Jabatan</th>
                  <th class="text-nowrap">TMT Jabatan</th>
                  <th class="text-nowrap">Jurusan</th>
                  <th class="text-nowrap">Nama Perguruan Tinggi</th>
                  <th class="text-nowrap">Tahun Lulus</th>
                  <th class="text-nowrap">Tingkat Pendidikan</th>
                  <th class="text-nowrap">Usia</th>
                  <th class="text-nowrap">Masa Kerja</th>
                  <th class="text-nowrap">Catatan Mutasi</th>
                  <th class="text-nowrap">No Kapreg</th>
                  <th class="text-nowrap">Eselon</th>
                  <th class="text-nowrap">Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END TABEL -->

  <div class="modal fade" id="editpns" tabindex="-1" role="dialog" aria-labelledby="editpnss" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editpnss">Edit PNS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="kepegawaian/edit_pns" method="POST">
            <input type="hidden" class="form-control" id="nox" name="no">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="col-form-label">Nip:</label>
                  <input type="text" class="form-control" id="nipx" name="nip" placeholder="Nip.." required>
                </div>
                <div class="col-sm-8">
                  <label class="col-form-label">Nama Lengkap:</label>
                  <input type="text" class="form-control" id="nama_lengkapx" name="nama_lengkap" placeholder="Nama Lengkap.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label class="col-form-label">Bagian:</label>
                <input type="text" class="form-control" id="bagianx" name="bagian" placeholder="Bagian.." required>
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
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No Urut:</label>
                  <input type="text" class="form-control" id="no_urut_pangkatx" name="no_urut_pangkat" placeholder="No Urut Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Pangkat:</label>
                  <input type="text" class="form-control" id="pangkatx" name="pangkat" placeholder="Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Gol Ruang:</label>
                  <input type="text" class="form-control" id="gol_ruangx" name="gol_ruang" placeholder="Gol Ruang.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Pangkat:</label>
                  <input type="date" class="form-control" id="tmt_pangkatx" name="tmt_pangkat" placeholder="TMT Pangkat.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jabatan:</label>
                  <input type="text" class="form-control" id="jabatanx" name="jabatan" placeholder="Jabatan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Jabatan:</label>
                  <input type="date" class="form-control" id="tmt_jabatanx" name="tmt_jabatan" placeholder="TMT Jabatan.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jurusan:</label>
                  <input type="text" class="form-control" id="jurusanx" name="jurusan" placeholder="Jurusan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Nama Perguruan Tinggi:</label>
                  <input type="text" class="form-control" id="nama_ptx" name="nama_pt" placeholder="Perguruan Tinggi.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Tahun Lulus:</label>
                  <input type="text" class="form-control" id="tahun_lulusx" name="tahun_lulus" placeholder="Tahun Lulus.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Tingkat Pendidikan Terakhir:</label>
                  <select class="form-control" id="tingkat_pendidikanx" name="tingkat_pendidikan" required>
                    <option value=""></option>
                    <?php foreach($tp as $rows){ ?>
                      <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Masa Kerja:</label>
                  <input type="text" class="form-control" id="masa_kerjax" name="masa_kerja" placeholder="Masa Kerja.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Catatan Mutasi:</label>
              <input type="text" class="form-control" id="catatan_mutasix" name="catatan_mutasi" placeholder="Catatan Mutasi..">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No.Kapreg:</label>
                  <input type="text" class="form-control" id="no_kapregx" name="no_kapreg" placeholder="No.Karpeg.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Eselon:</label>
                  <input type="text" class="form-control" id="eselonx" name="eselon" placeholder="Eselon..">
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

  <div class="modal fade" id="hapuspns" tabindex="-1" role="dialog" aria-labelledby="hapuspnss" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="hapuspnss">Hapus Data PNS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="kepegawaian/hapus_pns">
            <div class="modal-body">
              <p>Anda yakin mau menghapus data <input type="text" id="nama_lengkapxx" disabled> ? </p>
            </div>
            <div class="modal-footer">
              <input type="hidden" id="nipxx" name="nip">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal ADD PNS -->
  <div class="modal fade" id="addpns" tabindex="-1" role="dialog" aria-labelledby="addpnss" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addpnss">Tambah PNS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="kepegawaian/tambah_pns" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="col-form-label">Nip:</label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip.." required>
                </div>
                <div class="col-sm-8">
                  <label class="col-form-label">Nama Lengkap:</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Bagian:</label>
              <input type="text" class="form-control" id="bagian" name="bagian" placeholder="Bagian.." required>
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
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No Urut:</label>
                  <input type="text" class="form-control" id="no_urut_pangkat" name="no_urut_pangkat" placeholder="No Urut Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Pangkat:</label>
                  <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Gol Ruang:</label>
                  <input type="text" class="form-control" id="gol_ruang" name="gol_ruang" placeholder="Gol Ruang.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Pangkat:</label>
                  <input type="date" class="form-control" id="tmt_pangkat" name="tmt_pangkat" placeholder="TMT Pangkat.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jabatan:</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Jabatan:</label>
                  <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" placeholder="TMT Jabatan.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jurusan:</label>
                  <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Nama Perguruan Tinggi:</label>
                  <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Perguruan Tinggi.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Tahun Lulus:</label>
                  <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Tingkat Pendidikan Terakhir:</label>
                  <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                      <option disabled selected> Pilih </option>
                      <?php foreach($tp as $rows){?>
                          <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                      <?php } ?>
                  </select>
                </div>
                <label class="col-form-label">Masa Kerja:</label>
                <div class="col-sm">
                  <div class="form-group">
                    <input type="number" class="form-control" id="thn" name="thn" placeholder="Tahun.." required>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="bln" name="bln" max="12" placeholder="Bulan.." required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Catatan Mutasi:</label>
              <input type="text" class="form-control" id="catatan_mutasi" name="catatan_mutasi" placeholder="Catatan Mutasi..">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No.Karpeg:</label>
                  <input type="text" class="form-control" id="no_kapreg" name="no_kapreg" placeholder="No.Karpeg.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Eselon:</label>
                  <input type="text" class="form-control" id="eselon" name="eselon" placeholder="Eselon..">
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
</div>

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js');?>"></script>