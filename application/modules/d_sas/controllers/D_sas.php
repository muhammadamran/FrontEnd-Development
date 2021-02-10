<?php
defined('BASEPATH') or exit('No direct script access allowed');
class D_sas extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //load chart_model from model
    $this->load->model('d_sas_model');
    $this->load->model('d_sas_modelbaru');
  }

  function index($link = NULL)
  {
    if ($this->session->userdata('nip') != NULL) {

      if ($link == NULL) {
        // list semua kampus
        // $x['title'] = "test";
        $data = $this->d_sas_model->get_all_kampus()->result();
        $x['data'] = json_encode($data);
      } else {
        $x['url'] = $link;
        // bukan halaman awal
        // dibagi berdasarkan panjang link
        // 3 : show output
        // 4 : show bagian/unit (jtngr)
        // 6 : show bagian/unit (regional)
        // 6 : show biro (jtngr)
        $data = array();
        switch (strlen($link)) {
          case 15:
            $data = $this->d_sas_model->get_all_output($link)->result();
            // output, link ada 3 bagian
            // 1: kampus
            // 2: biro
            // 3: bagian/unit
            $temp = explode(".", $link);
            $kampus = $temp[0];
            $biro = $temp[1];
            $q = $this->d_sas_model->get_nama_kampus($kampus);
            $x['kampus'] = $q['alias'];
            $x['klink'] = $q['kode_satker'];
            $q = $this->d_sas_model->get_nama_biro($biro);
            if (isset($q)) {
              $x['biro'] = $q['alias'];
              $x['blink'] = $x['klink'] . "." . $q['kode_satker_biro'];
            }
            $q = $this->d_sas_model->get_nama_unit($link);
            $x['unit'] = $q['ket'];
            $x['ulink'] = $link;
            break;
          case 11:
            // pasti dari jatinangor
            // $page = $this->d_sas_model->get_biro($link)->result();
            $data = $this->d_sas_model->get_all_unit($link)->result();
            // bagian/unit, link ada 2 bagian
            // 1: kampus
            // 2: biro
            $temp = explode(".", $link);
            $kampus = $temp[0];
            $biro = $temp[1];
            $q = $this->d_sas_model->get_nama_kampus($kampus);
            $x['kampus'] = $q['alias'];
            $x['klink'] = $q['kode_satker'];
            $q = $this->d_sas_model->get_nama_biro($biro);
            $x['biro'] = $q['alias'];
            $x['blink'] = $link;
            break;
          case 6:
            // kalo jatinangor, show biro
            // kalo regional, show unit/bagian
            $q = $this->d_sas_model->get_nama_kampus($link);
            $x['kampus'] = $q['alias'];
            $x['klink'] = $q['kode_satker'];
            if ($link != 448302) {
              // regional ke unit
              $data = $this->d_sas_model->get_all_unit_satker($link)->result();
              $x['bag'] = "unit";
            } else {
              // masuk ke biro jatinangor
              $data = $this->d_sas_model->get_all_biro($link)->result();
            }
            break;
        }
        $x['data'] = json_encode($data);
      }

      // } elseif (strlen($link) == 6) {
      //   // link dari kode_satker
      //   $x['title'] = "biro";
      //   if( $link != 448302){
      //     // list bagian/unit kampus regional
      //     $data = $this->d_sas_model->get_all_unit_satker($link)->result();
      //   }else{
      //     // list biro kampus jatinangor
      //     $data = $this->d_sas_model->get_all_biro($link)->result();
      //   }
      //   $page = $this->d_sas_model->get_kampus($link)->result();
      //   $x['link'] = $link;
      //   $x['page'] = $page[0]->alias;
      //   $x['data'] = json_encode($data);
      // } elseif (strlen($link) == 4) {
      //   // list bagian/unit dari kampus jatinangor
      //   $x['title'] = "unit";
      //   $page = $this->d_sas_model->get_biro($link)->result();
      //   $data = $this->d_sas_model->get_all_unit($link)->result();
      //   $x['link'] = $link;
      //   $x['page'] = $page[0]->nama;
      //   $x['data'] = json_encode($data);
      // } elseif (strlen($link) == 3) {
      //   // list output
      //   $x['title'] = "output";
      //   $data = $this->d_sas_model->get_all_output($link)->result();
      //   $x['link'] = $link;
      //   $x['data'] = json_encode($data);
      // }else{
      //   $x['data'] = json_encode($data);
      // }

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      if ($link == 'coba') {
        $nyoba = $this->d_sas_modelbaru->get_all_kampus()->result();
        $a['nyoba'] = json_encode($nyoba);
        $this->load->view("view_sas_nangor", $a);
      } else {

        $this->load->view("view_sas", $x);
      }
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }
}
