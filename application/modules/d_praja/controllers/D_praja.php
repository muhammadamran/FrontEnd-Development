<?php
defined('BASEPATH') or exit('No direct script access allowed');


require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class D_praja extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //load chart_model from model
    $this->load->model('D_praja_model');
  }

  function index()
  {
    if ($this->session->userdata('nip') != NULL) {
      // $data = $this->D_praja_model->get_praja()->result();
      // $x['data'] = json_encode($data);
      // var_dump($data);exit();
      // $x['tingkat'] = $tingkat;

      $angkatan = $this->D_praja_model->get_angkatan()->result();
      $x['angkatan'] = json_encode($angkatan);


      $prov = $this->D_praja_model->get_provinsi()->result();
      $x['prov'] = $prov;

      $status = $this->D_praja_model->get_status()->result();
      $x['status'] = json_encode($status);

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_praja", $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }



  // function get_table_p($angkatan = NULL)
  // {

  //   if ($this->session->userdata('nip') != NULL) {
  //     $data = $this->D_praja_model->get_table_praja($angkatan)->result();
  //     echo json_encode($data);
  //   } else {
  //     redirect("user");
  //   }
  // }


  function cobain($angkatan = NULL){
    // $data = $this->D_praja_model->get_praja()->result();
    $data = $this->D_praja_model->get_table_praja($angkatan)->result();
    // $ex = $this->D_praja_model->exportdata($angkatan)->result();
    // var_dump($data);exit();
    $dataall = array();

    $no = 1;
    foreach($data as $r) {
      $id = $r->id;
      $npp = $r->npp;
      $nama = $r->nama;
      $jk = $r->jk;
      $nisn = $r->nisn;
      $no_spcp = $r->no_spcp;
      $npwp = $r->npwp;
      $nik_praja = $r->nik_praja;
      $tmpt_lahir = $r->tmpt_lahir;
      $tgl_lahir = $r->tgl_lahir;
      $agama = $r->agama;
      $alamat = $r->alamat;
      $rt = $r->rt;
      $rw = $r->rw;
      $nama_dusun = $r->nama_dusun;
      $kelurahan = $r->kelurahan;
      $kecamatan = $r->kecamatan;
      $kode_pos = $r->kode_pos;
      $kab_kota = $r->kab_kota;
      $provinsi = $r->provinsi;
      $jenis_tinggal = $r->jenis_tinggal;
      $alat_transport = $r->alat_transport;
      $tlp_rumah = $r->tlp_rumah;
      $tlp_pribadi = $r->tlp_pribadi;
      $email = $r->email;
      $kewarganegaraan = $r->kewarganegaraan;
      $penerima_pks = $r->penerima_pks;
      $no_pks = $r->no_pks;
      $prodi = $r->prodi;
      $jenis_pendaftaran = $r->jenis_pendaftaran;
      $tgl_masuk_kuliah = $r->tgl_masuk_kuliah;
      $tahun_masuk_kuliah = $r->tahun_masuk_kuliah;
      $pembiayaan = $r->pembiayaan;
      $jalur_masuk = $r->jalur_masuk;
      $tingkat = $r->tingkat;
      $angkatan = $r->angkatan;
      $status = $r->status;
      $fakultas = $r->fakultas;
      $id_ortu = $r->id_ortu;
      $nik_ayah = $r->nik_ayah;
      $nama_ayah = $r->nama_ayah;
      $tgllahir_ayah = $r->tgllahir_ayah;
      $pendidikan_ayah = $r->pendidikan_ayah;
      $pekerjaan_ayah = $r->pekerjaan_ayah;
      $penghasilan_ayah = $r->penghasilan_ayah;
      $tlp_ayah = $r->tlp_ayah;
      $nik_ibu = $r->nik_ibu;
      $nama_ibu = $r->nama_ibu;
      $tgllahir_ibu = $r->tgllahir_ibu;
      $pendidikan_ibu = $r->pendidikan_ibu;
      $pekerjaan_ibu = $r->pekerjaan_ibu;
      $penghasilan_ibu = $r->penghasilan_ibu;
      $tlp_ibu = $r->tlp_ibu;
      $id_wali = $r->id_wali;
      $nik_wali = $r->nik_wali;
      $nama_wali = $r->nama_wali;
      $tgllahir_wali = $r->tgllahir_wali;
      $pendidikan_wali = $r->pendidikan_wali;
      $pekerjaan_wali = $r->pekerjaan_wali;
      $penghasilan_wali = $r->penghasilan_wali;
      $tlp_wali = $r->tlp_wali;



      if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keprajaan'){


      $opsi = "<a 
       href='javascript:;' 
       data-id='$r->id' 
       data-nama='$r->nama' 
       data-npp='$r->npp' 
       data-jk='$r->jk' 
       data-nisn='$r->nisn' 
       data-no_spcp='$r->no_spcp' 
       data-npwp='$r->npwp' 
       data-nik_praja='$r->nik_praja' 
       data-tmpt_lahir='$r->tmpt_lahir' 
       data-tgl_lahir='$r->tgl_lahir' 
       data-agama='$r->agama' 
       data-alamat='$r->alamat'
       data-rt='$r->rt'
       data-rw='$r->rw'
       data-email='$r->email'
       data-nama_dusun='$r->nama_dusun'
       data-kelurahan='$r->kelurahan'
       data-alamat='$r->alamat'
       data-kecamatan='$r->kecamatan'
       data-kode_pos='$r->kode_pos'
       data-provinsi='$r->provinsi'
       data-jenis_tinggal='$r->jenis_tinggal'
       data-alat_transport='$r->alat_transport'
       data-tlp_rumah='$r->tlp_rumah'
       data-tlp_pribadi='$r->tlp_pribadi'
       data-kewarganegaraan='$r->kewarganegaraan'
       data-penerima_pks='$r->penerima_pks'
       data-no_pks='$r->no_pks'
       data-prodi='$r->prodi'
       data-jenis_pendaftaran='$r->jenis_pendaftaran'
       data-tgl_masuk_kuliah='$r->tgl_masuk_kuliah'
       data-tahun_masuk_kuliah='$r->tahun_masuk_kuliah'
       data-pembiayaan='$r->pembiayaan'
       data-jalur_masuk='$r->jalur_masuk'
       data-tingkat='$r->tingkat'
       data-angkatan='$r->angkatan'
       data-status='$r->status'
       data-fakultas='$r->fakultas'
       data-id_ortu='$r->id_ortu'
       data-nik_ayah='$r->nik_ayah'
       data-nama_ayah='$r->nama_ayah'
       data-tgllahir_ayah='$r->tgllahir_ayah'
       data-pendidikan_ayah='$r->pendidikan_ayah'
       data-pekerjaan_ayah='$r->pekerjaan_ayah'
       data-penghasilan_ayah='$r->penghasilan_ayah'
       data-tlp_ayah='$r->tlp_ayah'
       data-nik_ibu='$r->nik_ibu'
       data-nama_ibu='$r->nama_ibu'
       data-tgllahir_ibu='$r->tgllahir_ibu'
       data-pendidikan_ibu='$r->pendidikan_ibu'
       data-pekerjaan_ibu='$r->pekerjaan_ibu'
       data-penghasilan_ibu='$r->penghasilan_ibu'
       data-id_wali='$r->id_wali'
       data-nik_wali='$r->nik_wali'
       data-tgllahir_wali='$r->tgllahir_wali'
       data-pendidikan_wali='$r->pendidikan_wali'
       data-pekerjaan_wali='$r->pekerjaan_wali'
       data-penghasilan_wali='$r->penghasilan_wali'
       data-tlp_wali='$r->tlp_wali'

       data-toggle='modal' data-target='#show-data' class='btn btn-info'><i class='fa fas fa-eye'></i>
       </a> <a href='d_praja/edt/$r->npp' class='btn btn-sm btn-warning' btn-sm><i class='fa fa-edit'></i></a>  ";

       
        // $opsi = "<a href='d_praja/detail/$r->id' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>  <a href='d_praja/edt/$r->id' class='btn btn-sm btn-warning' btn-sm><i class='fa fa-edit'></i></a>  ";
        // <a href='#' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#editpraja$r->id'><i class='fa fas fa-edit'></i></a>
     }else{
      $opsi = "<a href='d_praja/detail/$r->id' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>";
    }

    $ex = "<a 
    href='javascript:;' 
    data-angkatan='$r->angkatan' 
    <a href='d_praja/export/$r->angkatan' class='btn btn-sm btn-warning' btn-sm><i class='fa fa-edit'></i></a>  ";


    // $eksel = "<a href='d_praja/export/$r->angkatan' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>";

    $dataall[] = array(
      $no++,
      $opsi,
      $npp ,
      $nama,
      $jk,
      $nisn ,
      $no_spcp ,
      $npwp ,
      $nik_praja ,
      $tmpt_lahir ,
      $tgl_lahir,
      $agama,
      $alamat ,
      $rt,
      $rw ,
      $nama_dusun ,
      $kelurahan ,
      $kecamatan,
      $kode_pos,
      $kab_kota ,
      $provinsi ,
      $jenis_tinggal ,
      $alat_transport ,
      $tlp_rumah ,
      $tlp_pribadi,
      $email ,
      $kewarganegaraan ,
      $penerima_pks ,
      $no_pks ,
      $prodi ,
      $jenis_pendaftaran ,
      $tgl_masuk_kuliah ,
      $tahun_masuk_kuliah,
      $pembiayaan ,
      $jalur_masuk,
      $tingkat ,
      $angkatan ,
      $status ,
      $fakultas ,
      $id_ortu ,
      $nik_ayah ,
      $nama_ayah ,
      $tgllahir_ayah ,
      $pendidikan_ayah ,
      $pekerjaan_ayah ,
      $penghasilan_ayah ,
      $tlp_ayah ,
      $nik_ibu,
      $nama_ibu ,
      $tgllahir_ibu ,
      $pendidikan_ibu ,
      $pekerjaan_ibu ,
      $penghasilan_ibu ,
      $id_wali ,
      $nik_wali ,
      $nama_wali,
      $tgllahir_wali ,
      $pendidikan_wali ,
      $pekerjaan_wali,
      $penghasilan_wali,
      $tlp_wali 
    );
  }
  echo json_encode($dataall);
}



function detail($id)
{
    // var_dump($id);exit();
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_detail($id)->result();
    echo json_encode($data);
    // $x['data'] = json_encode($data);

    // $this->load->view("include/head");
    // $this->load->view("include/top-header");
    // $this->load->view("view_detail", $x);
    // $this->load->view("include/sidebar");
    // $this->load->view("include/panel");
    // $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}

function edt($npp)
{
  if ($this->session->userdata('nip') != NULL) {

    $data = $this->D_praja_model->get_detail($npp)->result();

    $x['data'] = $data;

      // var_dump($data);
      // exit();

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view('view_edit', $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}


public function view_edit()
{
  if ($this->session->userdata('nip') != NULL) {
   $editnya['id'] = $this->input->post('id', true);
   $editnya['npp'] = $this->input->post('npp', true);
   $editnya['no_spcp'] = $this->input->post('no_spcp', true);
   $editnya['nama'] = $this->input->post('nama', true);
   $editnya['jk'] = $this->input->post('jk', true);
   $editnya['nisn'] = $this->input->post('nisn', true);
   $editnya['npwp'] = $this->input->post('npwp', true);
   $editnya['nik_praja'] = $this->input->post('nik_praja', true);
   $editnya['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
   $editnya['tgl_lahir'] = $this->input->post('tgl_lahir', true);
   $editnya['agama'] = $this->input->post('agama', true);
   $editnya['email'] = $this->input->post('email', true);
   // var_dump($this->input->post('email', true));exit();
   $editnya['alamat'] = $this->input->post('alamat', true);
   $editnya['rt'] = $this->input->post('rt', true);
   $editnya['rw'] = $this->input->post('rw', true);
   $editnya['nama_dusun'] = $this->input->post('nama_dusun', true);
   $editnya['kelurahan'] = $this->input->post('kelurahan', true);
   $editnya['kecamatan'] = $this->input->post('kecamatan', true);
   $editnya['kab_kota'] = $this->input->post('kab_kota', true);
   $editnya['kode_pos'] = $this->input->post('kode_pos', true);
   $editnya['provinsi'] = $this->input->post('provinsi', true);
   $editnya['jenis_tinggal'] = $this->input->post('jenis_tinggal', true);
   $editnya['alat_transport'] = $this->input->post('alat_transport', true);
   $editnya['tlp_rumah'] = $this->input->post('tlp_rumah', true);
   $editnya['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
   $editnya['kewarganegaraan'] = $this->input->post('kewarganegaraan', true);
   $editnya['penerima_pks'] = $this->input->post('penerima_pks', true);
   $editnya['no_pks'] = $this->input->post('no_pks', true);
   $editnya['prodi'] = $this->input->post('prodi', true);
   $editnya['jenis_pendaftaran'] = $this->input->post('jenis_pendaftaran', true);
   $editnya['tgl_masuk_kuliah'] = $this->input->post('tgl_masuk_kuliah', true);
   $editnya['tahun_masuk_kuliah'] = $this->input->post('tahun_masuk_kuliah', true);
   $editnya['pembiayaan'] = $this->input->post('pembiayaan', true);
   $editnya['jalur_masuk'] = $this->input->post('jalur_masuk', true);
   $editnya['status'] = $this->input->post('status', true);
   $editnya['tingkat'] = $this->input->post('tingkat', true);
   $editnya['angkatan'] = $this->input->post('angkatan', true);
   $editnya['fakultas'] = $this->input->post('fakultas', true);

   $editort['id_ortu'] = $this->input->post('id_ortu', true);
   $editort['npp'] = $this->input->post('npp', true);
   $editort['nama'] = $this->input->post('nama', true);
   $editort['nik_ayah'] = $this->input->post('nik_ayah', true);
   $editort['nama_ayah'] = $this->input->post('nama_ayah', true);
   $editort['tgllahir_ayah'] = $this->input->post('tgllahir_ayah', true);
   $editort['pendidikan_ayah'] = $this->input->post('pendidikan_ayah', true);
   $editort['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah', true);
   $editort['penghasilan_ayah'] = $this->input->post('penghasilan_ayah', true);
   $editort['tlp_ayah'] = $this->input->post('tlp_ayah', true);
   $editort['nik_ibu'] = $this->input->post('nik_ibu', true);
   $editort['nama_ibu'] = $this->input->post('nama_ibu', true);
   $editort['tgllahir_ibu'] = $this->input->post('tgllahir_ibu', true);
   $editort['pendidikan_ibu'] = $this->input->post('pendidikan_ibu', true);
   $editort['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu', true);
   $editort['penghasilan_ibu'] = $this->input->post('penghasilan_ibu', true);
   $editort['tlp_ibu'] = $this->input->post('tlp_ibu', true);

   $editwal['id_wali'] = $this->input->post('id_wali', true);
   $editwal['npp'] = $this->input->post('npp', true);
   $editwal['nama'] = $this->input->post('nama', true);
   $editwal['nik_wali'] = $this->input->post('nik_wali', true);
   $editwal['nama_wali'] = $this->input->post('nama_wali', true);
   $editwal['pendidikan_wali'] = $this->input->post('pendidikan_wali', true);
   $editwal['tgllahir_wali'] = $this->input->post('tgllahir_wali', true);
   $editwal['pekerjaan_wali'] = $this->input->post('pekerjaan_wali', true);
   $editwal['penghasilan_wali'] = $this->input->post('penghasilan_wali', true);
   $editwal['tlp_wali'] = $this->input->post('tlp_wali', true);


   $result = $this->D_praja_model->view_edit($editnya);
     // var_dump($result);exit();
   $ha = $this->D_praja_model->view_editortu($editort);
   $hi = $this->D_praja_model->view_editwali($editwal);
     // echo "$result";exit();

   if (!$result && !$ha && !$hi) {
    $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
    redirect('d_praja');
  } else {
    $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
    redirect('d_praja');
  }
} else {
  redirect("user");
}
}

function alumni()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_praja()->result();
      // $tingkat = $data[0]->tingkat-1;
      // echo $tingkat;
      // exit();
    $x['data'] = json_encode($data);
      // $x['tingkat'] = $tingkat;

    $prov = $this->D_praja_model->get_provinsi()->result();
    $x['prov'] = json_encode($prov);

    $status = $this->D_praja_model->get_status()->result();
    $x['status'] = json_encode($status);

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_praja", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}


function hukuman()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_statuspraja()->result();
    $x['data'] = json_encode($data);

    $pra = $this->D_praja_model->get_praja()->result();
    $x['pra'] = $pra;

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_status", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}


function editstatus()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_statuspraja()->result();
    $x['data'] = json_encode($data);

    $pra = $this->D_praja_model->get_praja()->result();
    $x['pra'] = $pra;

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_status", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}

function ubahstatus()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_npp()->result();
    $x['data'] = json_encode($data);

      // var_dump($x['data']);
      // exit();
    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_ubah", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}

function coba($npp = NULL)
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->getcoba($npp)->result();
    echo json_encode($data);

      // $html = "";
      // $html .= "<br>";
      // $html .= "<h4> Nama : $data[nama]</h4>";

  } else {
    redirect("user");
  }
}

function tambah_status()
{
  if ($this->session->userdata('nip') != NULL) {

    $data = $this->D_praja_model->getcoba($this->input->post('npp', true))->row_array();

    if ($this->input->post('status', true) == "turuntingkat" && $data['tingkat'] == 1) {
      $ting = $data['tingkat'];
      $ang = $data['angkatan'];
    }else if ($this->input->post('status', true) == "turuntingkat"){
      $ting = $data['tingkat']-1;
      $ang = $data['angkatan']+1;
    }else if($this->input->post('status', true) != "turuntingkat") {
     $ting = $data['tingkat'];
     $ang = $data['angkatan'];
   }

   $tingkatann = $this->input->post('status', true);
   $keterangann = $this->input->post('keterangan', true);
   $tgl = date('Y-m-d');

   $nya = array();
   $config['upload_path']          = './assets/uploads_skpraja/';
   $config['allowed_types']        = 'pdf|docx';
   $config['max_size']             = 2000000;
   $this->load->library('upload', $config);

   if ($this->upload->do_upload('fileToUpload')){

    // var_dump($tingkatann);exit;

    $nya = array(
      'npp'      => $data['npp'],
      'nama'      => $data['nama'],
      'status'      => $tingkatann,
      'tingkat'      => $ting,
      'angkatan' => $ang,
      'keterangan' => $keterangann,
      'tgl' => $tgl,
      'bukti'=> $this->upload->data("file_name")

    );
    // var_dump($nya);exit;
    $this->db->insert('hukuman', $nya);
  }
  
  
  // print("<pre>".print_r($nya,true)."</pre>");
  // exit();



   // if ($this->upload->do_upload('fileToUpload')){

   //  // var_dump($up);exit();
   // }



 //  if($this->input->post('status', true) != "turuntingkat"){
 //   $haha = $this->input->post('status', true);
 //       // echo "$haha";
 // }else{
 //   $haha = $data['status'];
 // }

  $uptudate = array();
  $uptudate = array(
   'npp'      => $data['npp'],
   'nama'      => $data['nama'],
   'status'      => $tingkatann,
   'tingkat'      => $ting,
   'angkatan' => $ang

 );
  // print("<pre>".print_r($uptudate,true)."</pre>");
  // exit();
  $nih = $this->db->where('npp',$data['npp']);
  $nih = $this->db->update('praja',$uptudate); 


   // $this->db->update_batch('praja', $uptudate, '$data[id]');
// exit();

  if ( !$nih) {
    $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
    redirect('d_praja/editstatus');
  } else {
    $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
    redirect('d_praja/editstatus');
  }

} else {
  redirect("user");
}
}





function export($angkatan=NULL)
{


 $semua_pengguna = $this->D_praja_model->exportdata($angkatan)->result();
 
 $spreadsheet = new Spreadsheet;

 $spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1','NO PESERTA SPCP')
 ->setCellValue('B1','NAMA')
 ->setCellValue('C1','L/P')
 ->setCellValue('D1','NISN')
 ->setCellValue('E1','NPWP')
 ->setCellValue('F1','NPP')
 ->setCellValue('G1','NIK')
 ->setCellValue('H1','TEMPAT LAHIR')
 ->setCellValue('I1','TGL LAHIR')
 ->setCellValue('J1','AGAMA')
 ->setCellValue('K1','Alamat Domisili')
 ->setCellValue('L1','RT')
 ->setCellValue('M1','RW')
 ->setCellValue('N1','Nama Dusun')
 ->setCellValue('O1','Kelurahan')
 ->setCellValue('P1','Kecamatan')
 ->setCellValue('Q1','Kode Pos')
 ->setCellValue('R1','KAB/KOTA')
 ->setCellValue('S1','PROVINSI')
 ->setCellValue('T1','Jenis Tinggal')
 ->setCellValue('U1','Alat Transport')
 ->setCellValue('V1','Nomor Telepon Rumah')
 ->setCellValue('W1','Nomor Handphone Pribadi')
 ->setCellValue('X1','EMAIL')
 ->setCellValue('Y1','NIK AYAH')
 ->setCellValue('Z1','Nama Ayah')
 ->setCellValue('AA1','TGL LAHIR AYAH')
 ->setCellValue('AB1','Pendidikan Ayah')
 ->setCellValue('AC1','PEKERJAAN AYAH')
 ->setCellValue('AD1','Penghasilan Ayah')
 ->setCellValue('AE1','No HP Ayah')
 ->setCellValue('AF1','NIK IBU')
 ->setCellValue('AG1','Nama Ibu')
 ->setCellValue('AH1','TGL LAHIR IBU')
 ->setCellValue('AI1','Pendidikan Ibu')
 ->setCellValue('AJ1','PEKERJAAN IBU')
 ->setCellValue('AK1','Penghasilan Ibu')
 ->setCellValue('AL1','No HP Ibu')
 ->setCellValue('AM1','Kewarganegaraan')
 ->setCellValue('AN1','Penerima KPS (Kartu Perlindungan Sosial)')
 ->setCellValue('AO1','No KPS')
 ->setCellValue('AP1','NIK Wali')
 ->setCellValue('AQ1','Nama Wali')
 ->setCellValue('AR1','Tanggal Lahir Wali')
 ->setCellValue('AS1','Pendidikan Wali')
 ->setCellValue('AT1','Pekerjaan Wali')
 ->setCellValue('AU1','Penghasilan Wali')
 ->setCellValue('AV1','No Hp Wali')
 ->setCellValue('AW1','Prodi')
 ->setCellValue('AX1','Fakultas')
 ->setCellValue('AY1','Jenis Pendaftaran')
 ->setCellValue('AZ1','Tanggal Masuk Kuliah')
 ->setCellValue('BA1','Tahun Masuk Kuliah')
 ->setCellValue('BB1','Pembiayaan')
 ->setCellValue('BC1','Jalur Masuk');


 $kolom = 2;
 $nomor = 1;


foreach($semua_pengguna as $pengguna) {
   // var_dump($pengguna);exit();

 $spreadsheet ->setActiveSheetIndex(0)
 ->setCellValue('A'. $kolom, $no_spcp = $pengguna->$no_spcp )
 ->setCellValue('B'. $kolom, $pengguna->$nama)
 ->setCellValue('C'. $kolom, $pengguna->$jk)
 ->setCellValue('D'. $kolom, $pengguna->$nisn )
 ->setCellValue('E'. $kolom, $pengguna->$npwp )
 ->setCellValue('F'. $kolom, $pengguna->$npp )
 ->setCellValue('G'. $kolom, $pengguna->$nik_praja )
 ->setCellValue('H'. $kolom, $pengguna->$tmpt_lahir )
 ->setCellValue('I'. $kolom, $pengguna->$tgl_lahir)
 ->setCellValue('J'. $kolom, $pengguna->$agama)
 ->setCellValue('K'. $kolom, $pengguna->$alamat )
 ->setCellValue('L'. $kolom, $pengguna->$rt)
 ->setCellValue('M'. $kolom, $pengguna->$rw )
 ->setCellValue('N'. $kolom, $pengguna->$nama_dusun )
 ->setCellValue('O'. $kolom, $pengguna->$kelurahan )
 ->setCellValue('P'. $kolom, $pengguna->$kecamatan)
 ->setCellValue('Q'. $kolom, $pengguna->$kode_pos)
 ->setCellValue('R'. $kolom, $pengguna->$kab_kota )
 ->setCellValue('S'. $kolom, $pengguna->$provinsi )
 ->setCellValue('T'. $kolom, $pengguna->$jenis_tinggal )
 ->setCellValue('U'. $kolom, $pengguna->$alat_transport )
 ->setCellValue('V'. $kolom, $pengguna->$tlp_rumah )
 ->setCellValue('W'. $kolom, $pengguna->$tlp_pribadi)
 ->setCellValue('X'. $kolom, $pengguna->$email )
 ->setCellValue('Y'. $kolom, $pengguna->$nik_ayah )
 ->setCellValue('Z'. $kolom, $pengguna->$nama_ayah )
 ->setCellValue('AA'. $kolom, $pengguna->$tgllahir_ayah )
 ->setCellValue('AB'. $kolom, $pengguna->$pendidikan_ayah )
 ->setCellValue('AC'. $kolom, $pengguna->$pekerjaan_ayah )
 ->setCellValue('AD'. $kolom, $pengguna->$penghasilan_ayah )
 ->setCellValue('AE'. $kolom, $pengguna->$tlp_ayah )
 ->setCellValue('AF'. $kolom, $pengguna->$nik_ibu)
 ->setCellValue('AG'. $kolom, $pengguna->$nama_ibu )
 ->setCellValue('AH'. $kolom, $pengguna->$tgllahir_ibu )
 ->setCellValue('AI'. $kolom, $pengguna->$pendidikan_ibu )
 ->setCellValue('AJ'. $kolom, $pengguna->$pekerjaan_ibu )
 ->setCellValue('AK'. $kolom, $pengguna->$penghasilan_ibu )
 ->setCellValue('AL'. $kolom, $pengguna->$tlp_ibu)
 ->setCellValue('AM'. $kolom, $pengguna->$kewarganegaraan )
 ->setCellValue('AN'. $kolom, $pengguna->$penerima_pks )
 ->setCellValue('AO'. $kolom, $pengguna->$no_pks )
 ->setCellValue('AP'. $kolom, $pengguna->$nik_wali )
 ->setCellValue('AQ'. $kolom, $pengguna->$nama_wali)
 ->setCellValue('AR'. $kolom, $pengguna->$tgllahir_wali )
 ->setCellValue('AS'. $kolom, $pengguna->$pendidikan_wali )
 ->setCellValue('AT'. $kolom, $pengguna->$pekerjaan_wali)
 ->setCellValue('AU'. $kolom, $pengguna->$penghasilan_wali)
 ->setCellValue('AV'. $kolom, $pengguna->$tlp_wali )
 ->setCellValue('AW'. $kolom, $pengguna->$prodi )
 ->setCellValue('AX'. $kolom, $pengguna->$fakultas )
 ->setCellValue('AY'. $kolom, $pengguna->$jenis_pendaftaran )
 ->setCellValue('AZ'. $kolom, $pengguna->$tgl_masuk_kuliah )
 ->setCellValue('BA'. $kolom, $pengguna->$tahun_masuk_kuliah)
 ->setCellValue('BB'. $kolom, $pengguna->$pembiayaan )
 ->setCellValue('BC'. $kolom, $pengguna->$jalur_masuk);


 $kolom++;
 $nomor++;
   // var_dump($pengguna->$no_spcp);exit();

}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Latihan.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
}





}
