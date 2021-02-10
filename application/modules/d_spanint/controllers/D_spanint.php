<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_spanint extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('d_spanint_model');
  }

  function index($satker = NULL)
  {
    if($this->session->userdata('nip') != NULL) {
      if ($satker == NULL) {
        $tgl = $this->d_spanint_model->get_date();
        $x['uDate'] = strtoupper( date("d F Y", strtotime($tgl['created_at'])) );
        $data = $this->d_spanint_model->get_spanint_kampus()->result();
        $x['data'] = json_encode($data);
        $x['title'] = "IPDN";
      } else {
        $tgl = $this->d_spanint_model->get_date();
        $x['uDate'] = strtoupper( date("d F Y", strtotime($tgl['created_at'])) );
        $data = $this->d_spanint_model->get_spanint_biro()->result();
        $x['data'] = json_encode($data);
        $x['title'] = "IPDN JATINANGOR";
      }
      
      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_spanint",$x);
      $this->load->view("include/sidebar");
      $this->load->view("include/footer");
      
    }else{
      redirect("user");
    }
  }
}