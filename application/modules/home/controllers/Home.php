<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('home_model');
    $this->load->helper('text');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index()
  {
    if($this->session->userdata('nip') != NULL)
    {
      // KEPEGAWAIAN
      $peg = $this->home_model->jumlah_peg();
      $total_peg = $peg[0]->pns + $peg[0]->thl;
      $eselon = $this->home_model->jum_eselon();

      // HUKUM DAN ORTALA
      $prokum = $this->home_model->jumlah_prokum();
      // $x['prokum'] =  json_encode($prokum);
      // var_dump(json_encode($prokum));exit;
      $perek = $this->home_model->peraturan_rektor();
      $keprek = $this->home_model->keputusan_rektor();
      $srt = $this->home_model->surat_edaran();

      // $last_ortx = $this->home_model->update_last_ort();
      // if($last_ortx[0]->updated_date != NULL){
      //   $date = date('d F Y', strtotime($last_ortx[0]->updated_date));
      // }else{
      //   $date = '';
      // }
      // $last_updated = $date;
      // $eselon = $this->home_model->jum_eselon();

      // AKADEMIK
      $dosen = $this->home_model->dosen();
      $last_dosenx = $this->home_model->update_last_dosen();
      if($last_dosenx[0]->updated_date != NULL){
        $date = date('d F Y', strtotime($last_dosenx[0]->updated_date));
      }else{
        $date = '';
      }
      $last_dosen = $date;

      // SPAN JATINANGOR
      $persentase_jatinangor = $this->home_model->get_span_jatinangor();

      // POK
      $persen_pok = $this->home_model->get_all_pok_biro();
      $persentase_pok = round($persen_pok[0]->persen,2);
      $ceksas = $this->home_model->ceksas();

      // SAS
      $persen_sas= $this->home_model->get_all_sas();
      $persentase_sas = round($persen_sas[0]->persen,2);
      $cekpok = $this->home_model->cekpok();

      // BIRO
      $biro = $this->home_model->get_all_span_biro();

      // STATUS PRAJA
      $status = $this->home_model->status_praja();

      // HUKUMAN PRAJA
      $hukuman = $this->home_model->hukuman();

      // ANGKATAN PRAJA
      $angkatan = $this->home_model->angkatan_praja();

      // ANGKATAN 31
      $angkatan31 = $this->home_model->angkatan_31();
      // ANGKATAN 30
      $angkatan30 = $this->home_model->angkatan_30();
      // ANGKATAN 29
      $angkatan29 = $this->home_model->angkatan_29();
      // ANGKATAN 28
      $angkatan28 = $this->home_model->angkatan_28();
	    
      //prajajk
      $jkpraja = $this->home_model->get_jk_praja();
	    
      // PRAJA
      $praja = $this->home_model->jumlah_praja();
      $total_praja = $praja[0]->praja;

      // SPAN
      $span = $this->home_model->get_span()->result();
      $hitung_span= $span[0]->realisasi/$span[0]->pagu*100;
      // $persentase_span = round($hitung_span,2);
      $persentase_span = $this->home_model->get_span_ipdn_sementara()['persentase_span'];

      // App
      $perpustakaan = $this->home_model->app_perpus();
      $akademik = $this->home_model->app_akademik();
      $keuangan = $this->home_model->app_keuangan();
      $riset = $this->home_model->app_riset();
      $tp = $this->home_model->app_tp();
      $keprajaan = $this->home_model->app_keprajaan();
      $pascasarjana = $this->home_model->app_pascasarjana();
      $pddikti = $this->home_model->app_pddikti();
      $kepegawaian = $this->home_model->app_kepegawaian();
      $kerjasama = $this->home_model->app_kerjasama();
      $pengasuhan = $this->home_model->app_pengasuhan();

      $apps = $this->home_model->apps();
      
      $berita = $this->home_model->listing();
      $eksternal = $this->home_model->get_data()->result();
        
      $x['eksternal'] = $eksternal;
      $x['berita'] = $berita;
      $x['perpustakaan'] = $perpustakaan;
      $x['akademik'] = $akademik;
      $x['keuangan'] = $keuangan;
      $x['akademik'] = $akademik;
      $x['riset'] = $riset;
      $x['tp'] = $tp;
      $x['keprajaan'] = $keprajaan;
      $x['pascasarjana'] = $pascasarjana;
      $x['pddikti'] = $pddikti;
      $x['kepegawaian'] = $kepegawaian;
      $x['kerjasama'] = $kerjasama;
      $x['pengasuhan'] = $pengasuhan;

      $x['apps'] = $apps;

      $x['biro'] = $biro;
      $x['eselon'] = $eselon;
      
      $x['peg'] = $peg;
      $x['total_peg'] = $total_peg;

      $x['prokum'] = $prokum;
      // var_dump($prokum);exit;
      // $x['total_prok'] = $total_prok;
      // $x['last_updated'] = $last_updated;
      $x['perek'] = $perek;
      $x['keprek'] = $keprek;
      $x['srt'] = $srt;
  

      $x['dosen'] = $dosen;
      $x['last_dosen'] = $last_dosen;
      
      $x['angkatan'] = $angkatan;
      $x['status'] = $status;
      $x['hukuman'] = $hukuman;
      $x['total_praja'] = $total_praja;
      $x['persentase_span'] = $persentase_span;
      $x['persentase_sas'] = $persentase_sas;
      $x['persentase_jatinangor'] = $persentase_jatinangor;
      $x['persentase_pok'] = $persentase_pok;
      $x['angkatan31'] = $angkatan31;
      $x['angkatan30'] = $angkatan30;
      $x['angkatan29'] = $angkatan29;
      $x['angkatan28'] = $angkatan28;
      $x['jkpraja'] = $jkpraja;
      $x['praja'] = $praja;

      $x['ceksas'] = $ceksas;
      $x['cekpok'] = $cekpok;


      $x['tanggal_rank'] = $this->home_model->get_rank_ipdn()['created_at'];

      $x['rank_kemendagri_persen'] = $this->home_model->get_rank_persen()['persen'];
      $x['rank_kemendagri_ipdn'] = $this->home_model->get_rank_ipdn()['rank'];

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view('home', $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");         

    }else{
        //jika session belum terdaftar, maka redirect ke halaman login
        redirect("user");
    }
	
  }

  // // Read berita
	// public function read($slug_berita)
	// {
	// 	helper('text');
	// 	$berita = $this->home_model->read($slug_berita);

  //   $x['berita'] = $berita;
            
  //   $this->load->view("include/head");
  //   $this->load->view("include/top-header");
  //   $this->load->view('read', $x);
  //   $this->load->view("include/sidebar");
  //   $this->load->view("include/panel");
  //   $this->load->view("include/footer");
    
	// }
}
?>
