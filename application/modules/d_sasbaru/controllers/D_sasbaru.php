<?php
defined('BASEPATH') or exit('No direct script access allowed');
class D_sasbaru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load chart_model from model
        $this->load->model('d_sas_modelbaru');
    }

    function index()
    {
        $link = $this->input->get('biro');
        // strlen($link == 6)
        if ($this->session->userdata('nip') != NULL) {
            if ($link == NULL) {
                $data = $this->d_sas_modelbaru->get_all_kampus()->result();
                $x['data'] = json_encode($data);
            } elseif(strlen($link) == 6) {
               $data = $this->d_sas_modelbaru->get_kegiatan($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }elseif(strlen($link) == 4) {
               $data = $this->d_sas_modelbaru->get_output($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }elseif(strlen($link) == 8) {
               $data = $this->d_sas_modelbaru->get_suboutput($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }elseif(strlen($link) == 12) {
               $data = $this->d_sas_modelbaru->get_komponen($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }elseif(strlen($link) == 11) {
               $data = $this->d_sas_modelbaru->get_subkomponen($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }elseif(strlen($link) == 14) {
               $data = $this->d_sas_modelbaru->get_akun($link)->result();
               $x['data'] = json_encode($data);
             // var_dump($data);exit();
           }
           $this->load->view("include/head");
           $this->load->view("include/top-header");
           $this->load->view('view_sas_baru', $x);
           $this->load->view("include/sidebar");
           $this->load->view("include/panel");
           $this->load->view("include/footer");
       } else {
        redirect("user");
    }
}
}
