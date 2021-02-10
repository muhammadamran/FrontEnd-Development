<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_pok extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load chart_model from model
      $this->load->model('d_pok_model');
    }

    function index($id = NULL)
    {
      if($this->session->userdata('nip') != NULL)
      {
        if ($id == NULL) {
          $x['title'] = 'Parent';
          $data = $this->d_pok_model->get_biro_data()->result();
          // var_dump($data);
          // exit();
          // $keuangan = $this->d_pok_model->jumlah_pagu()->result();

          // $hitung= $keuangan[0]->realisasi/$keuangan[0]->pagu*100;
          // $persentase = round($hitung,2);

          // $tanggal = $this->d_pok_model->get_tanggal()->result();
          // $hasil_tgl = date('d F Y', strtotime($tanggal[0]->created_date));
        } else {
          $x['title'] = $id;
          $x['page'] = $id;
          if (strlen($id) == 3) {
            $data = $this->d_pok_model->get_out_data($id)->result();
            $q = (array) $this->d_pok_model->get_unit_name($id)->result()[0];
            // print("<pre>".print_r($q,true)."</pre>");exit;
            $x['biro'] = $q['alias'];
            $x['blink'] = $q['kode_satker_biro'];
            $x['unit'] = $q['nama'];
            $x['ulink'] = $q['id'];
          } else {
            $data = $this->d_pok_model->get_unit_data($id)->result();
            $q = $this->d_pok_model->get_biro_name($id);
            // print("<pre>".print_r($q,true)."</pre>");exit;
            $x['biro'] = $q['alias'];
            $x['blink'] = $q['kode_satker_biro'];
          }
        }

        // if($hasil_tgl == '01 January 1970'){
        //     $hasil_tanggal = '--------';
        // }else{
        //     $hasil_tanggal = $hasil_tgl;
        // }

        $x['data'] = json_encode($data);
        $y['pok'] = "pok";
        // $x['pagu'] = number_format($keuangan[0]->pagu);
        // $x['realisasi'] = number_format($keuangan[0]->realisasi);
        // $x['pengembalian'] = number_format($keuangan[0]->pengembalian);
        // $x['sisa_pagu'] = number_format($keuangan[0]->sisa_pagu);
        // $x['persentase'] = $persentase;
        // $x['tanggal'] = $hasil_tanggal;
      
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view("view_pok",$x);
        // $this->load->view("include/sidebar",$y);
        $this->load->view("include/sidebar");
        // $this->load->view("include/panel");
        $this->load->view("include/footer");
      
    }else{
      redirect("user");
    }
  }
}