<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_span extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('d_span_model');
    }

    function index()
    {
          if($this->session->userdata('nip') != NULL)
          {
               // $data = $this->d_span_model->get_all_dashboard()->result();

               // $tanggal = $this->d_span_model->get_tanggal()->result();
               // $hasil_tgl = date('d F Y', strtotime($tanggal[0]->created_date));

               // if($hasil_tgl == '01 January 1970'){
               //      $hasil_tanggal = '--------';
               // }else{
               //      $hasil_tanggal = $hasil_tgl;
               // }

               // $x['data'] = $data;
               // $x['chart'] = json_encode($data);
               // $x['tanggal'] = $hasil_tanggal;
          
               // $this->load->view("include/head");
               // $this->load->view("include/top-header");
               // $this->load->view('view_span', $x);
               // $this->load->view("include/sidebar");
               // $this->load->view("include/panel");
               // $this->load->view("include/footer");
               redirect("d_spanint");
          }else{
               redirect("user");
          }
    }

    function biro()
    {
          if($this->session->userdata('nip') != NULL)
          {
               // $data = $this->d_span_model->get_all_dashboard_biro()->result();

               // $x['data'] = $data;
               // $x['chart'] = json_encode($data);
          
               // $this->load->view("include/head");
               // $this->load->view("include/top-header");
               // $this->load->view('view_span_biro', $x);
               // $this->load->view("include/sidebar");
               // $this->load->view("include/panel");
               // $this->load->view("include/footer");
               redirect("d_spanint");
          }else{
               redirect("user");
          }
    }

//     function serapan()
//     {
//       if($_SESSION['nip']) {

//      //    $tgl = $this->d_peringkat_model->get_date();
//      //    $x['uDate'] = strtoupper( date("d F Y", strtotime($tgl['created_at'])) );
//         $data = $this->d_span_model->get_peringkat()->result();
//         $x['data'] = json_encode($data);
     
//         $this->load->view("include/head");
//         $this->load->view("include/top-header");
//         $this->load->view("view_peringkat",$x);
//         $this->load->view("include/sidebar");
//         $this->load->view("include/footer");
      
//     }else{
//       redirect("user");
//     }
//   }
    
}