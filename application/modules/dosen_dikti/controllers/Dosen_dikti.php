<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dosen_dikti extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MDosen_dikti');
    }

    function index(){

        if($this->session->userdata('nip') != NULL){

            $belum = $this->MDosen_dikti->belum();
            $kurang_nidn = $belum[0]->total - $belum[0]->nidn;
            $kurang_serdos = $belum[0]->total - $belum[0]->serdos;

            $persentase_nidn = round($kurang_nidn  / $belum[0]->total * 100,2);
            $persentase_serdos = round($kurang_serdos / $belum[0]->total * 100,2);

            $x['belum'] = $belum;
            $x['persentase_nidn'] = $persentase_nidn;
            $x['persentase_serdos'] = $persentase_serdos;

            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('View_dosen', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        }else{
            redirect("user");
        }
    }

    function table_dosen_dikti() {
        $data = $this->MDosen_dikti->get_all_dosen()->result();

        $no = 1;
        $apa = array();

        foreach($data as $r) {
            $nama = $r->nama == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama;
            $tempat_lahir = $r->tempat_lahir == NULL ? "<i><font>Tidak ada data</font></i>": $r->tempat_lahir;
            $jenis_kelamin = $r->jenis_kelamin == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_kelamin;
            $tanggal_lahir = $r->tanggal_lahir == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_lahir;
            $agama = $r->agama == NULL ? "<i><font>Tidak ada data</font></i>": $r->agama;
            $nama_ibu = $r->nama_ibu == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_ibu;
            $status_aktif = $r->status_aktif == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_aktif;
            $nidn_nup_nidk = $r->nidn_nup_nidk == NULL ? "<i><font>Tidak ada data</font></i>": $r->nidn_nup_nidk;
            $nik = $r->nik == NULL ? "<i><font>Tidak ada data</font></i>": $r->nik;
            $nip = $r->nip == NULL ? "<i><font>Tidak ada data</font></i>": $r->nip;
            $npwp = $r->npwp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npwp;
            $ikatan_kerja = $r->ikatan_kerja == NULL ? "<i><font>Tidak ada data</font></i>": $r->ikatan_kerja;
            $status_pegawai = $r->status_pegawai == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_pegawai;
            $jenis_pegawai = $r->jenis_pegawai == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_pegawai;
            $no_sk_cpns = $r->no_sk_cpns == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_sk_cpns;
            $tanggal_sk_cpns = $r->tanggal_sk_cpns == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_sk_cpns;
            $no_sk_pengangkatan = $r->no_sk_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_sk_pengangkatan;
            $tanggal_sk_pengangkatan = $r->tanggal_sk_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_sk_pengangkatan;
            $lembaga_pengangkatan = $r->lembaga_pengangkatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->lembaga_pengangkatan;
            $pangkat_golongan = $r->pangkat_golongan == NULL ? "<i><font>Tidak ada data</font></i>": $r->pangkat_golongan;
            $sumber_gaji = $r->sumber_gaji == NULL ? "<i><font>Tidak ada data</font></i>": $r->sumber_gaji;
            $alamat = $r->alamat == NULL ? "<i><font>Tidak ada data</font></i>": $r->alamat;
            $dusun = $r->dusun == NULL ? "<i><font>Tidak ada data</font></i>": $r->dusun;
            $rt = $r->rt == NULL ? "<i><font>Tidak ada data</font></i>": $r->rt;
            $rw = $r->rw == NULL ? "<i><font>Tidak ada data</font></i>": $r->rw;
            $kelurahan = $r->kelurahan == NULL ? "<i><font>Tidak ada data</font></i>": $r->kelurahan;
            $kodepos = $r->kodepos == NULL ? "<i><font>Tidak ada data</font></i>": $r->kodepos;
            $kecamatan = $r->kecamatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->kecamatan;
            $telepon = $r->telepon == NULL ? "<i><font>Tidak ada data</font></i>": $r->telepon;
            $hp = $r->hp == NULL ? "<i><font>Tidak ada data</font></i>": $r->hp;
            $email = $r->email == NULL ? "<i><font>Tidak ada data</font></i>": $r->email;
            $status_pernikahan = $r->status_pernikahan == NULL ? "<i><font>Tidak ada data</font></i>": $r->status_pernikahan;
            $nama_suami_istri = $r->nama_suami_istri == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_suami_istri;
            $nip_suami_istri = $r->nip_suami_istri == NULL ? "<i><font>Tidak ada data</font></i>": $r->nip_suami_istri;
            $tmt_pns = $r->tmt_pns == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_pns;
            $pekerjaan = $r->pekerjaan == NULL ? "<i><font>Tidak ada data</font></i>": $r->pekerjaan;
            $mampu_menghandle_kebutuhan_khusus = $r->mampu_menghandle_kebutuhan_khusus == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_kebutuhan_khusus;
            $mampu_menghandle_braile = $r->mampu_menghandle_braile == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_braile;
            $mampu_menghandle_bahasa_isyarat = $r->mampu_menghandle_bahasa_isyarat == NULL ? "<i><font>Tidak ada data</font></i>": $r->mampu_menghandle_bahasa_isyarat;
            $sertifikasi_dosen = $r->sertifikasi_dosen == NULL ? "<i><font>Tidak ada data</font></i>": $r->sertifikasi_dosen;
            $bidang_ilmu = $r->bidang_ilmu == NULL ? "<i><font>Tidak ada data</font></i>": $r->bidang_ilmu;
            $jabatan = $r->jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->jabatan;
            $sk_jabatan = $r->sk_jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->sk_jabatan;
            $tmt_jabatan = $r->tmt_jabatan == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_jabatan;
            $tahun_ajaran = $r->tahun_ajaran == NULL ? "<i><font>Tidak ada data</font></i>": $r->tahun_ajaran;
            $perguruan_tinggi = $r->perguruan_tinggi == NULL ? "<i><font>Tidak ada data</font></i>": $r->perguruan_tinggi;
            $program_studi = $r->program_studi == NULL ? "<i><font>Tidak ada data</font></i>": $r->program_studi;
            $no_surat_tugas = $r->no_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_surat_tugas;
            $tanggal_surat_tugas = $r->tanggal_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_surat_tugas;
            $tmt_surat_tugas = $r->tmt_surat_tugas == NULL ? "<i><font>Tidak ada data</font></i>": $r->tmt_surat_tugas;
            $judul_penelitian = $r->judul_penelitian == NULL ? "<i><font>Tidak ada data</font></i>": $r->judul_penelitian;
            $lembaga = $r->lembaga == NULL ? "<i><font>Tidak ada data</font></i>": $r->lembaga;
            $tahun_penelitian = $r->tahun_penelitian == NULL ? "<i><font>Tidak ada data</font></i>": $r->tahun_penelitian;

            if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Akademik'){
                $aksi = " <a href='javascript:;'
                data-id='$r->id'
                data-nama='$r->nama'
                data-tempat_lahir='$r->tempat_lahir'
                data-jenis_kelamin='$r->jenis_kelamin'
                data-tanggal_lahir='$r->tanggal_lahir'
                data-agama='$r->agama'
                data-nama_ibu='$r->nama_ibu'
                data-status_aktif='$r->status_aktif'
                data-nidn_nup_nidk='$r->nidn_nup_nidk'
                data-nik='$r->nik'
                data-nip='$r->nip'
                data-npwp='$r->npwp'
                data-ikatan_kerja='$r->ikatan_kerja'
                data-status_pegawai='$r->status_pegawai'
                data-jenis_pegawai='$r->jenis_pegawai'
                data-no_sk_cpns='$r->no_sk_cpns'
                data-tanggal_sk_cpns='$r->tanggal_sk_cpns'
                data-no_sk_pengangkatan='$r->no_sk_pengangkatan'
                data-tanggal_sk_pengangkatan='$r->tanggal_sk_pengangkatan'
                data-lembaga_pengangkatan='$r->lembaga_pengangkatan'
                data-pangkat_golongan='$r->pangkat_golongan'
                data-sumber_gaji='$r->sumber_gaji'
                data-alamat='$r->alamat'
                data-dusun='$r->dusun'
                data-rt='$r->rt'
                data-rw='$r->rw'
                data-kelurahan='$r->kelurahan'
                data-kodepos='$r->kodepos'
                data-kecamatan='$r->kecamatan'
                data-telepon='$r->telepon'
                data-hp='$r->hp'
                data-email='$r->email'
                data-status_pernikahan='$r->status_pernikahan'
                data-nama_suami_istri='$r->nama_suami_istri'
                data-nip_suami_istri='$r->nip_suami_istri'
                data-tmt_pns='$r->tmt_pns'
                data-pekerjaan='$r->pekerjaan'
                data-mampu_menghandle_kebutuhan_khusus='$r->mampu_menghandle_kebutuhan_khusus'
                data-mampu_menghandle_braile='$r->mampu_menghandle_braile'
                data-mampu_menghandle_bahasa_isyarat='$r->mampu_menghandle_bahasa_isyarat'
                data-sertifikasi_dosen='$r->sertifikasi_dosen'
                data-bidang_ilmu='$r->bidang_ilmu'
                data-jabatan='$r->jabatan'
                data-sk_jabatan='$r->sk_jabatan'
                data-tmt_jabatan='$r->tmt_jabatan'
                data-tahun_ajaran='$r->tahun_ajaran'
                data-perguruan_tinggi='$r->perguruan_tinggi'
                data-program_studi='$r->program_studi'
                data-no_surat_tugas='$r->no_surat_tugas'
                data-tanggal_surat_tugas='$r->tanggal_surat_tugas'
                data-tmt_surat_tugas='$r->tmt_surat_tugas'
                data-judul_penelitian='$r->judul_penelitian'
                data-lembaga='$r->lembaga'
                data-tahun_penelitian='$r->tahun_penelitian' 
                data-toggle='modal' data-target='#editdosen-dikti' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id' 
                data-nama='$r->nama' 
                data-toggle='modal' data-target='#hapusdosen-dikti' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
            }else{
                $aksi = "Tidak ada Akses";
            }

            $apa[] = array(
                $no++,
                $aksi,
                $nama,
                $tempat_lahir,
                $jenis_kelamin,
                $tanggal_lahir,
                $agama,
                $nama_ibu,
                $status_aktif,
                $nidn_nup_nidk,
                $nik,
                $nip,
                $npwp,
                $ikatan_kerja,
                $status_pegawai,
                $jenis_pegawai,
                $no_sk_cpns,
                $tanggal_sk_cpns,
                $no_sk_pengangkatan,
                $tanggal_sk_pengangkatan,
                $lembaga_pengangkatan,
                $pangkat_golongan,
                $sumber_gaji,
                $alamat,
                $dusun,
                $rt,
                $rw,
                $kelurahan,
                $kodepos,
                $kecamatan,
                $telepon,
                $hp,
                $email,
                $status_pernikahan,
                $nama_suami_istri,
                $nip_suami_istri,
                $tmt_pns,
                $pekerjaan,
                $mampu_menghandle_kebutuhan_khusus,
                $mampu_menghandle_braile,
                $mampu_menghandle_bahasa_isyarat,
                $sertifikasi_dosen,
                $bidang_ilmu,
                $jabatan,
                $sk_jabatan,
                $tmt_jabatan,
                $tahun_ajaran,
                $perguruan_tinggi,
                $program_studi,
                $no_surat_tugas,
                $tanggal_surat_tugas,
                $tmt_surat_tugas,
                $judul_penelitian,
                $lembaga,
                $tahun_penelitian
            );
        }
        
        echo json_encode($apa);
    }

    public function tambah_dosen_dikti(){

        $datex = new DateTime();
        $date = $datex->format('Y-m-d H:i:s');

        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
        $input_data['jenis_kelamin'] = $this->input->post('jenis_kelamin', true);
        $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
        $input_data['agama'] = $this->input->post('agama', true);
        $input_data['nama_ibu'] = $this->input->post('nama_ibu', true);
        $input_data['status_aktif'] = $this->input->post('status_aktif', true);
        $input_data['nidn_nup_nidk'] = $this->input->post('nidn_nup_nidk', true);
        $input_data['nik'] = $this->input->post('nik', true);
        $input_data['nip'] = $this->input->post('nip', true);
        $input_data['npwp'] = $this->input->post('npwp', true);
        $input_data['ikatan_kerja'] = $this->input->post('ikatan_kerja', true);
        $input_data['status_pegawai'] = $this->input->post('status_pegawai', true);
        $input_data['jenis_pegawai'] = $this->input->post('jenis_pegawai', true);
        $input_data['no_sk_cpns'] = $this->input->post('no_sk_cpns', true);
        $input_data['tanggal_sk_cpns'] = $this->input->post('tanggal_sk_cpns', true);
        $input_data['no_sk_pengangkatan'] = $this->input->post('no_sk_pengangkatan', true);
        $input_data['tanggal_sk_pengangkatan'] = $this->input->post('tanggal_sk_pengangkatan', true);
        $input_data['lembaga_pengangkatan'] = $this->input->post('lembaga_pengangkatan', true);
        $input_data['pangkat_golongan'] = $this->input->post('pangkat_golongan', true);
        $input_data['sumber_gaji'] = $this->input->post('sumber_gaji', true);
        $input_data['alamat'] = $this->input->post('alamat', true);
        $input_data['dusun'] = $this->input->post('dusun', true);
        $input_data['rt'] = $this->input->post('rt', true);
        $input_data['rw'] = $this->input->post('rw', true);
        $input_data['kelurahan'] = $this->input->post('kelurahan', true);
        $input_data['kodepos'] = $this->input->post('kodepos', true);
        $input_data['kecamatan'] = $this->input->post('kecamatan', true);
        $input_data['telepon'] = $this->input->post('telepon', true);
        $input_data['hp'] = $this->input->post('hp', true);
        $input_data['email'] = $this->input->post('email', true);
        $input_data['status_pernikahan'] = $this->input->post('status_pernikahan', true);
        $input_data['nama_suami_istri'] = $this->input->post('nama_suami_istri', true);
        $input_data['nip_suami_istri'] = $this->input->post('nip_suami_istri', true);
        $input_data['tmt_pns'] = $this->input->post('tmt_pns', true);
        $input_data['pekerjaan'] = $this->input->post('pekerjaan', true);
        $input_data['mampu_menghandle_kebutuhan_khusus'] = $this->input->post('mampu_menghandle_kebutuhan_khusus', true);
        $input_data['mampu_menghandle_braile'] = $this->input->post('mampu_menghandle_braile', true);
        $input_data['mampu_menghandle_bahasa_isyarat'] = $this->input->post('mampu_menghandle_bahasa_isyarat', true);
        $input_data['sertifikasi_dosen'] = $this->input->post('sertifikasi_dosen', true);
        $input_data['bidang_ilmu'] = $this->input->post('bidang_ilmu', true);
        $input_data['jabatan'] = $this->input->post('jabatan', true);
        $input_data['sk_jabatan'] = $this->input->post('sk_jabatan', true);
        $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
        $input_data['tahun_ajaran'] = $this->input->post('tahun_ajaran', true);
        $input_data['perguruan_tinggi'] = $this->input->post('perguruan_tinggi', true);
        $input_data['program_studi'] = $this->input->post('program_studi', true);
        $input_data['no_surat_tugas'] = $this->input->post('no_surat_tugas', true);
        $input_data['tanggal_surat_tugas'] = $this->input->post('tanggal_surat_tugas', true);
        $input_data['tmt_surat_tugas'] = $this->input->post('tmt_surat_tugas', true);
        $input_data['judul_penelitian'] = $this->input->post('judul_penelitian', true);
        $input_data['lembaga'] = $this->input->post('lembaga', true);
        $input_data['tahun_penelitian'] = $this->input->post('tahun_penelitian', true);

        $input_data['updated_date'] = $date;

        $nama = $this->input->post('nama', true);

        $result = $this->MDosen_dikti->tambah_dosen_dikti($input_data);

        if (!$result) { 							
            $this->session->set_flashdata("dosen-dikti", "DATA DOSEN ($nama) GAGAL DITAMBAHKAN."); 				
            redirect('dosen_dikti'); 			
        } else {
            $isi = $input_data['nip'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Menambahkan dosen, Nip Dosen = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->MDosen_dikti->log($log);

            $this->session->set_flashdata("dosen-dikti", "DATA DOSEN ($nama) BERHASIL DITAMBAHKAN.");			
            redirect('dosen_dikti'); 			
        }
    }

    public function update_dosen_dikti(){

        $datex = new DateTime();
        $date = $datex->format('Y-m-d H:i:s');

        $input_data['id'] = $this->input->post('id', true);
        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
        $input_data['jenis_kelamin'] = $this->input->post('jenis_kelamin', true);
        $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
        $input_data['agama'] = $this->input->post('agama', true);
        $input_data['nama_ibu'] = $this->input->post('nama_ibu', true);
        $input_data['status_aktif'] = $this->input->post('status_aktif', true);
        $input_data['nidn_nup_nidk'] = $this->input->post('nidn_nup_nidk', true);
        $input_data['nik'] = $this->input->post('nik', true);
        $input_data['nip'] = $this->input->post('nip', true);
        $input_data['npwp'] = $this->input->post('npwp', true);
        $input_data['ikatan_kerja'] = $this->input->post('ikatan_kerja', true);
        $input_data['status_pegawai'] = $this->input->post('status_pegawai', true);
        $input_data['jenis_pegawai'] = $this->input->post('jenis_pegawai', true);
        $input_data['no_sk_cpns'] = $this->input->post('no_sk_cpns', true);
        $input_data['tanggal_sk_cpns'] = $this->input->post('tanggal_sk_cpns', true);
        $input_data['no_sk_pengangkatan'] = $this->input->post('no_sk_pengangkatan', true);
        $input_data['tanggal_sk_pengangkatan'] = $this->input->post('tanggal_sk_pengangkatan', true);
        $input_data['lembaga_pengangkatan'] = $this->input->post('lembaga_pengangkatan', true);
        $input_data['pangkat_golongan'] = $this->input->post('pangkat_golongan', true);
        $input_data['sumber_gaji'] = $this->input->post('sumber_gaji', true);
        $input_data['alamat'] = $this->input->post('alamat', true);
        $input_data['dusun'] = $this->input->post('dusun', true);
        $input_data['rt'] = $this->input->post('rt', true);
        $input_data['rw'] = $this->input->post('rw', true);
        $input_data['kelurahan'] = $this->input->post('kelurahan', true);
        $input_data['kodepos'] = $this->input->post('kodepos', true);
        $input_data['kecamatan'] = $this->input->post('kecamatan', true);
        $input_data['telepon'] = $this->input->post('telepon', true);
        $input_data['hp'] = $this->input->post('hp', true);
        $input_data['email'] = $this->input->post('email', true);
        $input_data['status_pernikahan'] = $this->input->post('status_pernikahan', true);
        $input_data['nama_suami_istri'] = $this->input->post('nama_suami_istri', true);
        $input_data['nip_suami_istri'] = $this->input->post('nip_suami_istri', true);
        $input_data['tmt_pns'] = $this->input->post('tmt_pns', true);
        $input_data['pekerjaan'] = $this->input->post('pekerjaan', true);
        $input_data['mampu_menghandle_kebutuhan_khusus'] = $this->input->post('mampu_menghandle_kebutuhan_khusus', true);
        $input_data['mampu_menghandle_braile'] = $this->input->post('mampu_menghandle_braile', true);
        $input_data['mampu_menghandle_bahasa_isyarat'] = $this->input->post('mampu_menghandle_bahasa_isyarat', true);
        $input_data['sertifikasi_dosen'] = $this->input->post('sertifikasi_dosen', true);
        $input_data['bidang_ilmu'] = $this->input->post('bidang_ilmu', true);
        $input_data['jabatan'] = $this->input->post('jabatan', true);
        $input_data['sk_jabatan'] = $this->input->post('sk_jabatan', true);
        $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
        $input_data['tahun_ajaran'] = $this->input->post('tahun_ajaran', true);
        $input_data['perguruan_tinggi'] = $this->input->post('perguruan_tinggi', true);
        $input_data['program_studi'] = $this->input->post('program_studi', true);
        $input_data['no_surat_tugas'] = $this->input->post('no_surat_tugas', true);
        $input_data['tanggal_surat_tugas'] = $this->input->post('tanggal_surat_tugas', true);
        $input_data['tmt_surat_tugas'] = $this->input->post('tmt_surat_tugas', true);
        $input_data['judul_penelitian'] = $this->input->post('judul_penelitian', true);
        $input_data['lembaga'] = $this->input->post('lembaga', true);
        $input_data['tahun_penelitian'] = $this->input->post('tahun_penelitian', true);

        $input_data['updated_date'] = $date;

        $nama = $this->input->post('nama', true);

        $result = $this->MDosen_dikti->update_dosen_dikti($input_data);

        if (!$result) { 							
            $this->session->set_flashdata("dosen-dikti", "DATA DOSEN ($nama) GAGAL DI UPDATE."); 				
            redirect('dosen_dikti'); 			
        } else { 		
            $isi = $input_data['nip'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Mengubah dosen, Nip Dosen = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->MDosen_dikti->log($log);

            $this->session->set_flashdata("dosen-dikti", "DATA DOSEN ($nama) BERHASIL Di UPDATE.");			
            redirect('dosen_dikti'); 			
        }
    }

    function hapus_dosen_dikti(){ 

        $id = $this->input->post('id');
        $result = $this->MDosen_dikti->hapus_dosen_dikti($id);

        if (!$result) { 							
            $this->session->set_flashdata('dosen-dikti', 'DATA DOSEN GAGAL DIHAPUS.'); 				
            redirect('dosen_dikti'); 			
        } else {
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Menghapus Dosen, Id Dosen = $id";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->MDosen_dikti->log($log);

            $this->session->set_flashdata('dosen-dikti', 'DATA DOSEN BERHASIL DIHAPUS.');			
            redirect('dosen_dikti'); 			
        }
    }


}