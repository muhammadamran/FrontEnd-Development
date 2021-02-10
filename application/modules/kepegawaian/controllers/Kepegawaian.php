<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kepegawaian extends CI_Controller{
     function __construct(){
          parent::__construct();
          $this->load->model('kepegawaian_model');
     }

     // PNS
     function table_pns() {
          $data = $this->kepegawaian_model->get_all_pns()->result();

          $apa = array();

          $no = 1;

          foreach($data as $r) {
               $nip = $r->nip == NULL ? "<i><font style='color:red;'>Nip tidak ada</font></i>" : $r->nip;
               $nama = $r->nama_lengkap == NULL ? "<i><font style='color:red;'>Nama tidak ada</font></i>" : $r->nama_lengkap;
               $bagian = $r->bagian == NULL ? "<i><font style='color:red;'>Bagian Tidak ada</font></i>" : $r->bagian; 
               $ttl = $r->tempat_lahir.", ". date('d/m/Y', strtotime($r->tanggal_lahir));
               $no_urut_pangkat = $r->no_urut_pangkat == NULL ? "<i><font style='color:red;'>No Urut Pangkat tidak ada</font></i>" : $r->no_urut_pangkat;
               $pangkat_gol = $r->pangkat." ($r->gol_ruang)";
               $tmt_pangkat = $r->tmt_pangkat == NULL ? "<i><font style='color:red;'>TMT Pangkat tidak ada</font></i>" : date('d/m/Y', strtotime($r->tmt_pangkat));
               $jabatan = $r->jabatan == NULL ? "<i><font style='color:red;'>Jabatan tidak ada</font></i>" : $r->jabatan;
               $tmt_jabatan = $r->tmt_jabatan == NULL ? "<i><font style='color:red;'>TMT Jabatan tidak ada</font></i>" : date('d/m/Y', strtotime($r->tmt_jabatan));
               $jurusan = $r->jurusan == NULL ? "<i><font style='color:red;'>Jurusan tidak ada</font></i>" : $r->jurusan;
               $nama_pt = $r->nama_pt == NULL ? "<i><font style='color:red;'>Perguruan Tinggi tidak ada</font></i>" : $r->nama_pt;
               $tahun_lulus = $r->tahun_lulus == NULL ? "<i><font style='color:red;'>Tahun Lulus tidak ada</font></i>" : $r->tahun_lulus;
               $tingkat_pendidikan = $r->tingkat_pendidikan == NULL ? "<i><font style='color:red;'>Tingkat Pendidikan tidak ada</font></i>" : $r->tingkat_pendidikan;
               $usia = $r->usia == NULL ? "<i><font style='color:red;'>Usia tidak ada</font></i>" : $r->usia;
               $masa_kerja = $r->masa_kerja == NULL ? "<i><font style='color:red;'>Masa Kerja tidak ada</font></i>" : $r->masa_kerja;
               $catatan = $r->catatan_mutasi == NULL ? "<i><font style='color:red;'>Catatan Mutasi tidak ada</font></i>" : $r->catatan_mutasi;
               $no_kapreg = $r->no_kapreg == NULL ? "<i><font style='color:red;'>No Kapreg tidak ada</font></i>" : $r->no_kapreg;
               $eselon = $r->eselon == NULL ? "<i><font style='color:red;'>Eselon tidak ada</font></i>" : $r->eselon;
                            
               if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){
                    $aksi = "<a href='javascript:;' data-no='$r->no' data-nip='$r->nip' data-nama_lengkap='$r->nama_lengkap' data-bagian='$r->bagian' data-tempat_lahir='$r->tempat_lahir' data-tanggal_lahir='$r->tanggal_lahir' data-no_urut_pangkat='$r->no_urut_pangkat' data-pangkat='$r->pangkat' data-gol_ruang='$r->gol_ruang' data-tmt_pangkat='$r->tmt_pangkat' data-jabatan='$r->jabatan' data-tmt_jabatan='$r->tmt_jabatan' data-jurusan='$r->jurusan' data-nama_pt='$r->nama_pt' data-tahun_lulus='$r->tahun_lulus' data-tingkat_pendidikan='$r->tingkat_pendidikan' data-usia='$r->usia' data-masa_kerja='$r->masa_kerja' data-catatan_mutasi='$r->catatan_mutasi' data-no_kapreg='$r->no_kapreg' data-eselon='$r->eselon' data-toggle='modal' data-target='#editpns' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> <a href='javascript:;' data-nip='$r->nip' data-nama_lengkap='$r->nama_lengkap' data-toggle='modal' data-target='#hapuspns' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
               }else{
                    $aksi = "Tidak ada Akses";
               }

               $apa[] = array(
                    $no++,
                    $nip,
                    $nama,
                    $bagian,
                    $ttl,
                    $no_urut_pangkat,
                    $pangkat_gol,
                    $tmt_pangkat,
                    $jabatan,
                    $tmt_jabatan,
                    $jurusan,
                    $nama_pt,
                    $tahun_lulus,
                    $tingkat_pendidikan,
                    $usia,
                    $masa_kerja,
                    $catatan,
                    $no_kapreg,
                    $eselon,
                    $aksi
               );
          }
          
          echo json_encode($apa);
     }

     function index()
     {
          if($this->session->userdata('nip') != NULL)
          {
               $data = $this->kepegawaian_model->get_all_pns()->result();
               $tp = $this->kepegawaian_model->get_pendidikan();

               $x['data'] = $data;
               $x['tp'] = $tp;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_pns', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_pns()
	{		
          // USIA
          $tanggal = new DateTime($this->input->post('tanggal_lahir', true));
          $today = new DateTime('today');
          $y = $today->diff($tanggal)->y;
          $m = $today->diff($tanggal)->m;
          $usia = $y . " Thn " . $m . " Bln";
          //END USIA

          $thn = $this->input->post('thn', true);
          $bln = $this->input->post('bln', true);
          $masa_kerja = $thn . " Thn " . $bln . " Bln";

          $nip = str_replace(' ', '', $this->input->post('nip', true));

          $input_data['nip'] = $nip;
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['bagian'] = $this->input->post('bagian', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['no_urut_pangkat'] = $this->input->post('no_urut_pangkat', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['gol_ruang'] = $this->input->post('gol_ruang', true);
          $input_data['tmt_pangkat'] = $this->input->post('tmt_pangkat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
          $input_data['jurusan'] = $this->input->post('jurusan', true);
          $input_data['nama_pt'] = $this->input->post('nama_pt', true);
          $input_data['tahun_lulus'] = $this->input->post('tahun_lulus', true);
          $input_data['tingkat_pendidikan'] = $this->input->post('tingkat_pendidikan', true);
          $input_data['usia'] = $usia;
          $input_data['masa_kerja'] = $masa_kerja;
          $input_data['catatan_mutasi'] = $this->input->post('catatan_mutasi', true);
          $input_data['no_kapreg'] = $this->input->post('no_kapreg', true);
          $input_data['eselon'] = $this->input->post('eselon', true);

          $cek_peg = $this->kepegawaian_model->cek_pegawai($input_data['nip']);
        
          if(!$cek_peg){
               $result = $this->kepegawaian_model->tambah_pns($input_data);
          }else{
               $this->session->set_flashdata('pns', 'NIP PEGAWAI SUDAH TERDAFTAR.');
               $x['alert'] = 'ada';			
               redirect('kepegawaian',$x);
          }


          if (!$result) { 							
               $this->session->set_flashdata('pns', 'DATA PNS GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian'); 			
          } else { 								
               $this->session->set_flashdata('pns', 'DATA PNS BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian'); 			
          }
    }

     public function edit_pns()
     {
          // USIA
          $tanggal = new DateTime($this->input->post('tanggal_lahir', true));
          $today = new DateTime('today');
          $y = $today->diff($tanggal)->y;
          $m = $today->diff($tanggal)->m;
          $usia = $y . " Thn " . $m . " Bln";
          //END USIA

          $nip = str_replace(' ', '', $this->input->post('nip', true));

          $input_data['no'] = $this->input->post('no', true);
          $input_data['nip'] = $nip;
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['bagian'] = $this->input->post('bagian', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['no_urut_pangkat'] = $this->input->post('no_urut_pangkat', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['gol_ruang'] = $this->input->post('gol_ruang', true);
          $input_data['tmt_pangkat'] = $this->input->post('tmt_pangkat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
          $input_data['jurusan'] = $this->input->post('jurusan', true);
          $input_data['nama_pt'] = $this->input->post('nama_pt', true);
          $input_data['tahun_lulus'] = $this->input->post('tahun_lulus', true);
          $input_data['tingkat_pendidikan'] = $this->input->post('tingkat_pendidikan', true);
          $input_data['usia'] = $usia;
          $input_data['masa_kerja'] = $this->input->post('masa_kerja', true);
          $input_data['catatan_mutasi'] = $this->input->post('catatan_mutasi', true);
          $input_data['no_kapreg'] = $this->input->post('no_kapreg', true);
          $input_data['eselon'] = $this->input->post('eselon', true);

          $result = $this->kepegawaian_model->edit_pns($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('pns', 'DATA PNS GAGAL DIUBAH.');		
               redirect('kepegawaian'); 			
          } else { 								
               $this->session->set_flashdata('pns', 'DATA PNS BERHASIL DIUBAH.');			
               redirect('kepegawaian'); 			
          }
     }

     function hapus_pns()
     {
          $nip = $this->input->get('nip');
          $this->kepegawaian_model->hapus_pns($nip);
          redirect('kepegawaian');
     }
     //END PNS

     // DOSEN
     function table_dosen() {
          $data = $this->kepegawaian_model->get_all_dosen()->result();

          $no = 1;
          $apa = array();

          foreach($data as $r) {

               $nama = $r->nama == NULL ? "<i><font style='color:red;'>Nama tidak ada</font></i>" : $r->nama;
               $nip = $r->nip == 0 ? "<i><font style='color:red;'>Nip tidak ada</font></i>" : $r->nip;
               $nidn = $r->nidn == 0 ? "<i><font style='color:red;'>NIDN tidak ada</font></i>" : $r->nidn;
               $serdos = $r->serdos == NULL ? "<i><font style='color:red;'>Data tidak ada</font></i>" : $r->serdos;
               $bidang_ilmu = $r->bidang_ilmu == NULL ? "<i><font style='color:red;'>Bidang Ilmu tidak ada</font></i>" : $r->bidang_ilmu;
               $nik = $r->nik == 0 ? "<i><font style='color:red;'>NIK tidak ada</font></i>" : $r->nik;
               $alamat = $r->alamat == NULL ? "<i><font style='color:red;'>Alamat tidak ada</font></i>" : $r->alamat;
               $jabatan = $r->jabatan == NULL ? "<i><font style='color:red;'>Jabata tidak ada</font></i>" : $r->jabatan;
               $pangkat = $r->pangkat == NULL ? "<i><font style='color:red;'>Pangkat(Gol) tidak ada</font></i>" : $r->pangkat;
               $updated_date = $r->updated_date == NULL ? "-" : date('d/m/Y', strtotime($r->updated_date));
                            
               if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Akademik'){
                    $aksi = " <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-nip='$r->nip' data-nidn='$r->nidn' data-serdos='$r->serdos' data-bidang_ilmu='$r->bidang_ilmu' data-nik='$r->nik' data-alamat='$r->alamat' data-jabatan='$r->jabatan' data-pangkat='$r->pangkat' data-toggle='modal' data-target='#editdosen' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-toggle='modal' data-target='#hapusdosen' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
               }else{
                    $aksi = "Tidak ada Akses";
               }

               $apa[] = array(
                    $no++,
                    $nama,
                    $nip,
                    $nidn,
                    $serdos,
                    $bidang_ilmu,
                    $nik,
                    $alamat,
                    $jabatan,
                    $pangkat,
                    $updated_date,
                    $aksi
               );
          }
          
          echo json_encode($apa);
     }

     function table_belum_nidn() {
          $data = $this->kepegawaian_model->get_not_nidn()->result();

          $no = 1;
          $apa = array();

          foreach($data as $r) {

               $nama = $r->nama == NULL ? "<i><font style='color:red;'>Nama tidak ada</font></i>" : $r->nama;
               $nip = $r->nip == 0 ? "<i><font style='color:red;'>Nip tidak ada</font></i>" : $r->nip;
               $nidn = $r->nidn == 0 ? "<i><font style='color:red;'>NIDN tidak ada</font></i>" : $r->nidn;
               $serdos = $r->serdos == NULL ? "<i><font style='color:red;'>Data tidak ada</font></i>" : $r->serdos;
               $bidang_ilmu = $r->bidang_ilmu == NULL ? "<i><font style='color:red;'>Bidang Ilmu tidak ada</font></i>" : $r->bidang_ilmu;
               $nik = $r->nik == 0 ? "<i><font style='color:red;'>NIK tidak ada</font></i>" : $r->nik;
               $alamat = $r->alamat == NULL ? "<i><font style='color:red;'>Alamat tidak ada</font></i>" : $r->alamat;
               $jabatan = $r->jabatan == NULL ? "<i><font style='color:red;'>Jabata tidak ada</font></i>" : $r->jabatan;
               $pangkat = $r->pangkat == NULL ? "<i><font style='color:red;'>Pangkat(Gol) tidak ada</font></i>" : $r->pangkat;
               $updated_date = $r->updated_date == NULL ? "-" : date('d/m/Y', strtotime($r->updated_date));
                            
               if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Akademik'){
                    $aksi = " <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-nip='$r->nip' data-nidn='$r->nidn' data-serdos='$r->serdos' data-bidang_ilmu='$r->bidang_ilmu' data-nik='$r->nik' data-alamat='$r->alamat' data-jabatan='$r->jabatan' data-pangkat='$r->pangkat' data-toggle='modal' data-target='#editdosen' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-toggle='modal' data-target='#hapusdosen' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
               }else{
                    $aksi = "Tidak ada Akses";
               }

               $apa[] = array(
                    $no++,
                    $nama,
                    $nip,
                    $nidn,
                    $serdos,
                    $bidang_ilmu,
                    $nik,
                    $alamat,
                    $jabatan,
                    $pangkat,
                    $updated_date,
                    $aksi
               );
          }
          
          echo json_encode($apa);
     }

     function table_belum_serdos() {
          $data = $this->kepegawaian_model->get_not_serdos()->result();

          $no = 1;
          $apa = array();

          foreach($data as $r) {

               $nama = $r->nama == NULL ? "<i><font style='color:red;'>Nama tidak ada</font></i>" : $r->nama;
               $nip = $r->nip == 0 ? "<i><font style='color:red;'>Nip tidak ada</font></i>" : $r->nip;
               $nidn = $r->nidn == 0 ? "<i><font style='color:red;'>NIDN tidak ada</font></i>" : $r->nidn;
               $serdos = $r->serdos == NULL ? "<i><font style='color:red;'>Data tidak ada</font></i>" : $r->serdos;
               $bidang_ilmu = $r->bidang_ilmu == NULL ? "<i><font style='color:red;'>Bidang Ilmu tidak ada</font></i>" : $r->bidang_ilmu;
               $nik = $r->nik == 0 ? "<i><font style='color:red;'>NIK tidak ada</font></i>" : $r->nik;
               $alamat = $r->alamat == NULL ? "<i><font style='color:red;'>Alamat tidak ada</font></i>" : $r->alamat;
               $jabatan = $r->jabatan == NULL ? "<i><font style='color:red;'>Jabata tidak ada</font></i>" : $r->jabatan;
               $pangkat = $r->pangkat == NULL ? "<i><font style='color:red;'>Pangkat(Gol) tidak ada</font></i>" : $r->pangkat;
               $updated_date = $r->updated_date == NULL ? "-" : date('d/m/Y', strtotime($r->updated_date));
                            
               if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Akademik'){
                    $aksi = " <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-nip='$r->nip' data-nidn='$r->nidn' data-serdos='$r->serdos' data-bidang_ilmu='$r->bidang_ilmu' data-nik='$r->nik' data-alamat='$r->alamat' data-jabatan='$r->jabatan' data-pangkat='$r->pangkat' data-toggle='modal' data-target='#editdosen' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> <a href='javascript:;' data-id_dosen='$r->id_dosen' data-nama='$r->nama' data-toggle='modal' data-target='#hapusdosen' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
               }else{
                    $aksi = "Tidak ada Akses";
               }

               $apa[] = array(
                    $no++,
                    $nama,
                    $nip,
                    $nidn,
                    $serdos,
                    $bidang_ilmu,
                    $nik,
                    $alamat,
                    $jabatan,
                    $pangkat,
                    $updated_date,
                    $aksi
               );
          }
          
          echo json_encode($apa);
     }
     
     function dosen($id = NULL)
     {
          if($this->session->userdata('nip') != NULL)
          {
               if($id == NULL){
                    $x['title'] = "DATA DOSEN";
               }else if($id == 'belum_nidn'){
                    $x['title'] = 'TIDAK ADA DATA NIDN';
               }else if($id == 'belum_serdos'){
                    $x['title'] = 'TIDAK ADA DATA SERTIFIKASI DOSEN';
               }else{
                    redirect("kepegawaian/dosen");
               }
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_dosen', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_dosen()
	{
          $datex = new DateTime();
          $date = $datex->format('Y-m-d');

          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['nip'] = $this->input->post('nip', true);
          $input_data['nidn'] = $this->input->post('nidn', true);
          $input_data['serdos'] = $this->input->post('serdos', true);
          $input_data['bidang_ilmu'] = $this->input->post('bidang_ilmu', true);
          $input_data['nik'] = $this->input->post('nik', true);
          $input_data['alamat'] = $this->input->post('alamat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['created_date'] = $date;
          $input_data['updated_date'] = $date;

          $nama = $this->input->post('nama', true);

          $result = $this->kepegawaian_model->tambah_dosen($input_data);

          if (!$result) { 							
               $this->session->set_flashdata("dosen", "DATA DOSEN ($nama) GAGAL DITAMBAHKAN."); 				
               redirect('kepegawaian/dosen'); 			
          } else { 								
               $this->session->set_flashdata("dosen", "DATA DOSEN ($nama) BERHASIL DITAMBAHKAN.");			
               redirect('kepegawaian/dosen'); 			
          }
    }

     public function edit_dosen()
	{
          $datex = new DateTime();
          $date = $datex->format('Y-m-d');
          
          $input_data['id_dosen'] = $this->input->post('id_dosen', true);
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['nip'] = $this->input->post('nip', true);
          $input_data['nidn'] = $this->input->post('nidn', true);
          $input_data['serdos'] = $this->input->post('serdos', true);
          $input_data['bidang_ilmu'] = $this->input->post('bidang_ilmu', true);
          $input_data['nik'] = $this->input->post('nik', true);
          $input_data['alamat'] = $this->input->post('alamat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['updated_date'] = $date;

          $nama = $this->input->post('nama', true);

          $result = $this->kepegawaian_model->edit_dosen($input_data);

          if (!$result) { 							
               $this->session->set_flashdata("dosen", "DATA DOSEN ($nama) GAGAL DIUBAH."); 				
               redirect('kepegawaian/dosen'); 			
          } else { 								
               $this->session->set_flashdata("dosen", "DATA DOSEN ($nama) BERHASIL DIUBAH.");			
               redirect('kepegawaian/dosen'); 			
          }
    }

     function hapus_dosen()
     {
          $id = $this->input->post('id_dosen');
          $result = $this->kepegawaian_model->hapus_dosen($id);

          if (!$result) { 							
               $this->session->set_flashdata('dosen', 'DATA DOSEN GAGAL DIHAPUS.'); 				
               redirect('kepegawaian/dosen'); 			
          } else { 								
               $this->session->set_flashdata('dosen', 'DATA DOSEN BERHASIL DIHAPUS.');			
               redirect('kepegawaian/dosen'); 			
          }
     }
     //END DOSEN

     // THL
     function table_thl() {
          $data = $this->kepegawaian_model->get_all_thl()->result();

          $no = 1;
          $apa = array();

          foreach($data as $r) {

               $nama = $r->nama == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->nama;
               $ttl = $r->tempat_lahir.', '.date('d/m/Y', strtotime($r->tanggal_lahir));
               $dik = $r->dik == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->dik;
               $penugasan = $r->penugasan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->penugasan;
               $nama_satker = $r->nama_satker == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->nama_satker;
                            
               if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){
                    $aksi = " <a href='javascript:;' data-id_thl='$r->id_thl' data-nama='$r->nama' data-tempat_lahir='$r->tempat_lahir' data-tanggal_lahir='$r->tanggal_lahir' data-dik='$r->dik' data-penugasan='$r->penugasan' data-nama_satker='$r->nama_satker' data-toggle='modal' data-target='#editthl' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> <a href='javascript:;' data-id_thl='$r->id_thl' data-nama='$r->nama' data-toggle='modal' data-target='#hapusthl' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";
               }else{
                    $aksi = "Tidak ada Akses";
               }

               $apa[] = array(
                    $no++,
                    $nama,
                    $ttl,
                    $dik,
                    $penugasan,
                    $nama_satker,
                    $aksi
               );
          }
          
          echo json_encode($apa);
     }

     function thl()
     {
          if($this->session->userdata('nip') != NULL)
          {
               $data = $this->kepegawaian_model->get_all_thl()->result();
               $tp = $this->kepegawaian_model->get_pendidikan();
               $ns = $this->kepegawaian_model->get_namasatker();

               $x['data'] = $data;
               $x['tp'] = $tp;
               $x['ns'] = $ns;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_thl', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_thl()
	{		
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);
          $input_data['nama_satker'] = $this->input->post('nama_satker', true);

          $result = $this->kepegawaian_model->tambah_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian/thl'); 			
          }
    }

     public function edit_thl()
     {
          $input_data['id_thl'] = $this->input->post('id_thl', true);
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);
          $input_data['nama_satker'] = $this->input->post('nama_satker', true);

          $result = $this->kepegawaian_model->edit_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DIUBAH.');		
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DIUBAH.');			
               redirect('kepegawaian/thl'); 			
          }
     }

     function hapus_thl()
     {
          $id_thl = $this->input->post('id_thl');
          $result = $this->kepegawaian_model->hapus_thl($id_thl);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DIHAPUS.'); 				
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DIHAPUS.');			
               redirect('kepegawaian/thl'); 			
          }
     }
     // END THL

     // TA
     function ta()
     {
          if($this->session->userdata('nip') != NULL)
          {
               $data = $this->kepegawaian_model->get_all_ta()->result();
               $tp = $this->kepegawaian_model->get_pendidikan();

               $x['data'] = $data;
               $x['tp'] = $tp;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_ta', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_ta()
	{		
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['nik'] = $this->input->post('nik', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);

          $result = $this->kepegawaian_model->tambah_ta($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('ta', 'DATA TA GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian/ta'); 			
          } else { 								
               $this->session->set_flashdata('ta', 'DATA TA BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian/ta'); 			
          }
    }

     public function edit_ta()
     {
          $input_data['nik'] = $this->input->post('nik', true);
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);
          $result = $this->kepegawaian_model->edit_ta($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('ta', 'DATA TA GAGAL DIUBAH.');		
               redirect('kepegawaian/ta'); 			
          } else { 								
               $this->session->set_flashdata('ta', 'DATA TA BERHASIL DIUBAH.');			
               redirect('kepegawaian/ta'); 			
          }
     }

     function hapus_ta()
     {
          $nik = $this->input->post('nik');
          $this->kepegawaian_model->hapus_ta($nik);
          redirect('kepegawaian/ta');
     }
}