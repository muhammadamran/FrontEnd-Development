<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('dosen_dikti');?>">Dosen</a></li>
    </ol>
    <h1 class="page-header">Data Dosen</h1>

    
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">BELUM NIDN</div>
                    <div class="stats-number"><?php echo $belum[0]->nidn;?> DOSEN</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: <?php echo $persentase_nidn;?>%;"></div>
                    </div>
                    <div class="stats-desc">Persentase NIDN (<?php echo $persentase_nidn;?>%)</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-users fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">BELUM SERDOS</div>
                    <div class="stats-number"><?php echo $belum[0]->serdos;?> DOSEN</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: <?php echo $persentase_serdos;?>%;"></div>
                    </div>
                    <div class="stats-desc">Persentase SERDOS (<?php echo $persentase_serdos;?>%)</div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL -->
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Akademik'){?>
                        <span><a href="" class="btn btn-sm btn-white" data-toggle="modal" data-target="#adddosen-dikti">TAMBAH DOSEN</a></span>
                    <?php } ?>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <?php if($this->session->flashdata('dosen-dikti') != NULL){ ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Notif!</strong> <?php echo $this->session->flashdata('dosen-dikti') ?>
                </div>
                <?php } ?>
                <div class="table-responsive">
                    <div class="panel-body">
                        <table id="tbl-scdb-dosen-dikti" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap" width="30%">AKSI</th>
                                    <th class="text-nowrap">NAMA</th>
                                    <th class="text-nowrap">TEMPAT LAHIR</th>
                                    <th class="text-nowrap">JENIS KELAMIN</th>
                                    <th class="text-nowrap">TANGGAL LAHIR</th>
                                    <th class="text-nowrap">AGAMA</th>
                                    <th class="text-nowrap">NAMA IBU</th>
                                    <th class="text-nowrap">STATUS AKTIF</th>
                                    <th class="text-nowrap">NIDN/NUP/NIDK</th>
                                    <th class="text-nowrap">NIK</th>
                                    <th class="text-nowrap">NIP</th>
                                    <th class="text-nowrap">NPWP</th>
                                    <th class="text-nowrap">IKATAN KERJA</th>
                                    <th class="text-nowrap">STATUS PEGAWAI</th>
                                    <th class="text-nowrap">JENIS PEGAWAI</th>
                                    <th class="text-nowrap">NO SK CPNS</th>
                                    <th class="text-nowrap">TANGGAL SK CPNS</th>
                                    <th class="text-nowrap">NO SK PENGANGKATAN</th>
                                    <th class="text-nowrap">TANGGAL SK PENGANGKATAN</th>
                                    <th class="text-nowrap">LEMBAGA PENGANGKATAN</th>
                                    <th class="text-nowrap">PANGKAT GOLONGAN</th>
                                    <th class="text-nowrap">SUMBER GAJI</th>
                                    <th class="text-nowrap">ALAMAT</th>
                                    <th class="text-nowrap">DUSUN</th>
                                    <th class="text-nowrap">RT</th>
                                    <th class="text-nowrap">RW</th>
                                    <th class="text-nowrap">KELURAHAN</th>
                                    <th class="text-nowrap">KODEPOS</th>
                                    <th class="text-nowrap">KECAMATAN</th>
                                    <th class="text-nowrap">TELEPON</th>
                                    <th class="text-nowrap">HP</th>
                                    <th class="text-nowrap">EMAIL</th>
                                    <th class="text-nowrap">STATUS PERNIKAHAN</th>
                                    <th class="text-nowrap">NAMA SUAMI/ISTRI</th>
                                    <th class="text-nowrap">NIP SUAMI/ISTRI</th>
                                    <th class="text-nowrap">TMT PNS</th>
                                    <th class="text-nowrap">PEKERJAAN</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE KEBUTUHAN KHUSUS</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE BRAILE</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE BAHASA ISYARAT</th>
                                    <th class="text-nowrap">SERTIFIKASI DOSEN</th>
                                    <th class="text-nowrap">BIDANG ILMU</th>
                                    <th class="text-nowrap">JABATAN</th>
                                    <th class="text-nowrap">SK JABATAN</th>
                                    <th class="text-nowrap">TMT JABATAN</th>
                                    <th class="text-nowrap">TAHUN AJARAN</th>
                                    <th class="text-nowrap">PERGURUAN TINGGI</th>
                                    <th class="text-nowrap">PROGRAM STUDI</th>
                                    <th class="text-nowrap">NO SURAT TUGAS</th>
                                    <th class="text-nowrap">TANGGAL SURAT TUGAS</th>
                                    <th class="text-nowrap">TMT SURAT TUGAS</th>
                                    <th class="text-nowrap">JUDUL PENELITIAN</th>
                                    <th class="text-nowrap">LEMBAGA</th>
                                    <th class="text-nowrap">TAHUN PENELITIAN</th>
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
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="adddosen-dikti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="dosen_dikti/tambah_dosen_dikti" method="POST">
                    <center><img src="https://media2.giphy.com/media/j5zp4pe5GkGTbCpGw3/giphy.gif" width="40%" ></center>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="L">LAKI-LAKI</option>
                                    <option value="P">PEREMPUAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Agama:</label>
                                <select name="agama" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Tidak diisi">Tidak diisi</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="KRISTEN">KRISTEN</option>
                                    <option value="KATHOLIK">KATHOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Ibu:</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Status Aktif:</label>
                                <select name="status_aktif" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIDN/NUP/NIDK:</label>
                                <input type="number" class="form-control" id="nidn_nup_nidk" name="nidn_nup_nidk" placeholder="NIDN/NUP/NIDK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIK:</label>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NPWP:</label>
                                <input type="number" class="form-control" id="npwp" name="npwp" placeholder="NPWP.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Ikatan Kerja:</label>
                                <input type="text" class="form-control" id="ikatan_kerja" name="ikatan_kerja" placeholder="Ikatan Kerja.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Status Pegawai:</label>
                                <select id="status_pegawai" name="status_pegawai" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="24">IJIN BELAJAR</option>
                                    <option value="1">AKTIF</option>
                                    <option value="2">TIDAK AKTIF</option>
                                    <option value="20">CUTI</option>
                                    <option value="21">KELUAR</option>
                                    <option value="22">ALMARHUM</option>
                                    <option value="23">PENSIUN</option>
                                    <option value="24">IJIN BELAJAR</option>
                                    <option value="25">TUGAS DI INSTANSI LAIN</option>
                                    <option value="26">GANTI NIDN</option>
                                    <option value="27">TUGAS BELAJAR</option>
                                    <option value="28">HAPUS NIDN</option>
                                    <option value="99">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Pegawai:</label>
                                <input type="text" class="form-control" id="jenis_pegawai" name="jenis_pegawai" placeholder="Jenis Pegawai.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">NO SK CPNS:</label>
                                <input type="number" class="form-control" id="no_sk_cpns" name="no_sk_cpns" placeholder="No SK CPNS.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">TANGGAL SK CPNS:</label>
                                <input type="date" class="form-control" id="tanggal_sk_cpns" name="tanggal_sk_cpns" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NO SK PENGANGKATAN:</label>
                                <input type="number" class="form-control" id="no_sk_pengangkatan" name="no_sk_pengangkatan" placeholder="NO SK PENGANGKATAN.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">TANGGAL SK PENGANGKATAN:</label>
                                <input type="date" class="form-control" id="tanggal_sk_pengangkatan" name="tanggal_sk_pengangkatan" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Lembaga Pengangkatan:</label>
                                <input type="text" class="form-control" id="lembaga_pengangkatan" name="lembaga_pengangkatan" placeholder="Lembaga Pengangkatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Pangkat/Golongan:</label>
                                <input type="text" class="form-control" id="pangkat_golongan" name="pangkat_golongan" placeholder="Pangkat/Golongan.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Sumber Gaji:</label>
                                <input type="text" class="form-control" id="sumber_gaji" name="sumber_gaji" placeholder="Sumber Gaji.." required>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="form-group">
                                <label class="col-form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4" cols="50" placeholder="Alamat.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Dusun:</label>
                                <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">RT:</label>
                                <input type="number" class="form-control" id="rt" name="rt" placeholder="RT.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">RW:</label>
                                <input type="number" class="form-control" id="rw" name="rw" placeholder="RW.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Kelurahan:</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Kecamatan:</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Kodepos:</label>
                                <input type="number" class="form-control" id="kodepos" name="kodepos" placeholder="Kodepos.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Telepon:</label>
                                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Handphone:</label>
                                <input type="number" class="form-control" id="hp" name="hp" placeholder="Handphone.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Status Pernikahan:</label>
                                <select name="status_pernikahan" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Kebutuhan Khusus:</label>
                                <select name="mampu_menghandle_kebutuhan_khusus" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Braile:</label>
                                <select name="mampu_menghandle_braile" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Bahasa Isyarat:</label>
                                <select name="mampu_menghandle_bahasa_isyarat" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Sertifikasi Dosen:</label>
                                <textarea class="form-control" id="sertifikasi_dosen" name="sertifikasi_dosen" rows="4" cols="50" placeholder="Sertifikasi Dosen.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Bidang Ilmu:</label>
                                <textarea class="form-control" id="bidang_ilmu" name="bidang_ilmu" rows="4" cols="50" placeholder="Bidang Ilmu.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Jabatan:</label>
                                <select name="jabatan" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Guru Besar">Guru Besar</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">SK Jabatan:</label>
                                <input type="text" class="form-control" id="sk_jabatan" name="sk_jabatan" placeholder="SK Jabatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">TMT Jabatan:</label>
                                <input type="text" class="form-control" id="tmt_jabatan" name="tmt_jabatan" placeholder="TMT Jabatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Tahun Ajaran:</label>
                                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Perguruan Tinggi:</label>
                                <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Perguruan Tinggi.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Program Studi:</label>
                                <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="Program Studi.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">No Surat Tugas:</label>
                                <input type="number" class="form-control" id="no_surat_tugas" name="no_surat_tugas" placeholder="No Surat Tugas.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">TMT Surat Tugas:</label>
                                <input type="text" class="form-control" id="tmt_surat_tugas" name="tmt_surat_tugas" placeholder="TMT Surat Tugas.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Surat Tugas:</label>
                                <input type="date" class="form-control" id="tanggal_surat_tugas" name="tanggal_surat_tugas" required>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Judul Penelitian:</label>
                                <textarea class="form-control" id="judul_penelitian" name="judul_penelitian" placeholder="Judul Penelitian.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Lembaga:</label>
                                <input type="text" class="form-control" id="lembaga" name="lembaga" placeholder="Lembaga.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Tahun Penelitian:</label>
                                <input type="text" class="form-control" id="tahun_penelitian" name="tahun_penelitian" placeholder="Tahun Penelitian.." required>
                            </div>
                        </div>
                    </div>
                    <p><b>DATA SUAMI/ISTRI</b></p>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Nama Suami/Istri *:</label>
                                <input type="text" class="form-control" id="nama_suami_istri" name="nama_suami_istri" placeholder="Nama Suami/Istri.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Nip Suami/Istri *:</label>
                                <input type="text" class="form-control" id="nip_suami_istri" name="nip_suami_istri" placeholder="Nip Suami/Istri.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">TMT PNS *:</label>
                                <input type="text" class="form-control" id="tmt_pns" name="tmt_pns" placeholder="TMT PNS.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">PEKERJAAN *:</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="PEKERJAAN.." required>
                            </div>
                        </div>
                    </div>
                    <p>Note :</p>
                    <p>* Jika tidak ada, cukup diisi "-"</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Cek">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="editdosen-dikti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="dosen_dikti/update_dosen_dikti" method="POST">
                    <center><img src="https://media2.giphy.com/media/j5zp4pe5GkGTbCpGw3/giphy.gif" width="40%" ></center>
                    <div class="row">
                        <input type="hidden" id="idx" name="id">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="namax" name="nama" placeholder="Nama.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="tempat_lahirx" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahirx" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" id="jenis_kelaminx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="L">LAKI-LAKI</option>
                                    <option value="P">PEREMPUAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Agama:</label>
                                <select name="agama" id="agamax" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Tidak diisi">Tidak diisi</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="KRISTEN">KRISTEN</option>
                                    <option value="KATHOLIK">KATHOLIK</option>
                                    <option value="HINDU">HINDU</option>
                                    <option value="BUDHA">BUDHA</option>
                                    <option value="KONGHUCU">KONGHUCU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Ibu:</label>
                                <input type="text" class="form-control" id="nama_ibux" name="nama_ibu" placeholder="Nama Ibu.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Status Aktif:</label>
                                <select name="status_aktif" id="status_aktifx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIDN/NUP/NIDK:</label>
                                <input type="number" class="form-control" id="nidn_nup_nidkx" name="nidn_nup_nidk" placeholder="NIDN/NUP/NIDK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIK:</label>
                                <input type="number" class="form-control" id="nikx" name="nik" placeholder="NIK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NPWP:</label>
                                <input type="number" class="form-control" id="npwpx" name="npwp" placeholder="NPWP.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Ikatan Kerja:</label>
                                <input type="text" class="form-control" id="ikatan_kerjax" name="ikatan_kerja" placeholder="Ikatan Kerja.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Status Pegawai:</label>
                                <select id="status_pegawaix" name="status_pegawai" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="24">IJIN BELAJAR</option>
                                    <option value="1">AKTIF</option>
                                    <option value="2">TIDAK AKTIF</option>
                                    <option value="20">CUTI</option>
                                    <option value="21">KELUAR</option>
                                    <option value="22">ALMARHUM</option>
                                    <option value="23">PENSIUN</option>
                                    <option value="24">IJIN BELAJAR</option>
                                    <option value="25">TUGAS DI INSTANSI LAIN</option>
                                    <option value="26">GANTI NIDN</option>
                                    <option value="27">TUGAS BELAJAR</option>
                                    <option value="28">HAPUS NIDN</option>
                                    <option value="99">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Pegawai:</label>
                                <input type="text" class="form-control" id="jenis_pegawaix" name="jenis_pegawai" placeholder="Jenis Pegawai.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">NO SK CPNS:</label>
                                <input type="number" class="form-control" id="no_sk_cpnsx" name="no_sk_cpns" placeholder="No SK CPNS.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">TANGGAL SK CPNS:</label>
                                <input type="date" class="form-control" id="tanggal_sk_cpnsx" name="tanggal_sk_cpns" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NO SK PENGANGKATAN:</label>
                                <input type="number" class="form-control" id="no_sk_pengangkatanx" name="no_sk_pengangkatan" placeholder="NO SK PENGANGKATAN.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">TANGGAL SK PENGANGKATAN:</label>
                                <input type="date" class="form-control" id="tanggal_sk_pengangkatanx" name="tanggal_sk_pengangkatan" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Lembaga Pengangkatan:</label>
                                <input type="text" class="form-control" id="lembaga_pengangkatanx" name="lembaga_pengangkatan" placeholder="Lembaga Pengangkatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Pangkat/Golongan:</label>
                                <input type="text" class="form-control" id="pangkat_golonganx" name="pangkat_golongan" placeholder="Pangkat/Golongan.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Sumber Gaji:</label>
                                <input type="text" class="form-control" id="sumber_gajix" name="sumber_gaji" placeholder="Sumber Gaji.." required>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="form-group">
                                <label class="col-form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamatx" rows="4" cols="50" placeholder="Alamat.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Dusun:</label>
                                <input type="text" class="form-control" id="dusunx" name="dusun" placeholder="Dusun.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">RT:</label>
                                <input type="number" class="form-control" id="rtx" name="rt" placeholder="RT.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">RW:</label>
                                <input type="number" class="form-control" id="rwx" name="rw" placeholder="RW.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Kelurahan:</label>
                                <input type="text" class="form-control" id="kelurahanx" name="kelurahan" placeholder="Kelurahan.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Kecamatan:</label>
                                <input type="text" class="form-control" id="kecamatanx" name="kecamatan" placeholder="Kecamatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Kodepos:</label>
                                <input type="number" class="form-control" id="kodeposx" name="kodepos" placeholder="Kodepos.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Telepon:</label>
                                <input type="number" class="form-control" id="teleponx" name="telepon" placeholder="Telepon.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Handphone:</label>
                                <input type="number" class="form-control" id="hpx" name="hp" placeholder="Handphone.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="emailx" name="email" placeholder="Email.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Status Pernikahan:</label>
                                <select name="status_pernikahan" id="status_pernikahanx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Kebutuhan Khusus:</label>
                                <select name="mampu_menghandle_kebutuhan_khusus" id="mampu_menghandle_kebutuhan_khususx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Braile:</label>
                                <select name="mampu_menghandle_braile" id="mampu_menghandle_brailex" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Mampu Menghandle Bahasa Isyarat:</label>
                                <select name="mampu_menghandle_bahasa_isyarat" id="mampu_menghandle_bahasa_isyaratx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Sertifikasi Dosen:</label>
                                <textarea class="form-control" id="sertifikasi_dosenx" name="sertifikasi_dosen" rows="4" cols="50" placeholder="Sertifikasi Dosen.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Bidang Ilmu:</label>
                                <textarea class="form-control" id="bidang_ilmux" name="bidang_ilmu" rows="4" cols="50" placeholder="Bidang Ilmu.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Jabatan:</label>
                                <select name="jabatan" id="jabatanx" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Guru Besar">Guru Besar</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">SK Jabatan:</label>
                                <input type="text" class="form-control" id="sk_jabatanx" name="sk_jabatan" placeholder="SK Jabatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">TMT Jabatan:</label>
                                <input type="text" class="form-control" id="tmt_jabatanx" name="tmt_jabatan" placeholder="TMT Jabatan.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Tahun Ajaran:</label>
                                <input type="text" class="form-control" id="tahun_ajaranx" name="tahun_ajaran" placeholder="Tahun Ajaran.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Perguruan Tinggi:</label>
                                <input type="text" class="form-control" id="perguruan_tinggix" name="perguruan_tinggi" placeholder="Perguruan Tinggi.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Program Studi:</label>
                                <input type="text" class="form-control" id="program_studix" name="program_studi" placeholder="Program Studi.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">No Surat Tugas:</label>
                                <input type="number" class="form-control" id="no_surat_tugasx" name="no_surat_tugas" placeholder="No Surat Tugas.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">TMT Surat Tugas:</label>
                                <input type="text" class="form-control" id="tmt_surat_tugasx" name="tmt_surat_tugas" placeholder="TMT Surat Tugas.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Surat Tugas:</label>
                                <input type="date" class="form-control" id="tanggal_surat_tugasx" name="tanggal_surat_tugas" required>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Judul Penelitian:</label>
                                <textarea class="form-control" id="judul_penelitianx" name="judul_penelitian" placeholder="Judul Penelitian.." required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Lembaga:</label>
                                <input type="text" class="form-control" id="lembagax" name="lembaga" placeholder="Lembaga.." required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Tahun Penelitian:</label>
                                <input type="text" class="form-control" id="tahun_penelitianx" name="tahun_penelitian" placeholder="Tahun Penelitian.." required>
                            </div>
                        </div>
                    </div>
                    <p><b>DATA SUAMI/ISTRI</b></p>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Nama Suami/Istri *:</label>
                                <input type="text" class="form-control" id="nama_suami_istrix" name="nama_suami_istri" placeholder="Nama Suami/Istri.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Nip Suami/Istri *:</label>
                                <input type="text" class="form-control" id="nip_suami_istrix" name="nip_suami_istri" placeholder="Nip Suami/Istri.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">TMT PNS *:</label>
                                <input type="text" class="form-control" id="tmt_pnsx" name="tmt_pns" placeholder="TMT PNS.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">PEKERJAAN *:</label>
                                <input type="text" class="form-control" id="pekerjaanx" name="pekerjaan" placeholder="PEKERJAAN.." required>
                            </div>
                        </div>
                    </div>
                    <p>Note :</p>
                    <p>* Jika tidak ada, cukup diisi "-"</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Cek">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal HAPUS -->
<div class="modal fade" id="hapusdosen-dikti" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="hapus">Hapus Data DOSEN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="dosen_dikti/hapus_dosen_dikti">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus Data DOSEN <input type="text" id="namaxx" disabled></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="idxx" name="id">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js');?>"></script>