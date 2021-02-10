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

    function index($link = NULL)
    {
        if ($this->session->userdata('nip') != NULL) {

            if ($link == NULL) {
                $data = $this->d_sas_modelbaru->get_all_kampus()->result();


                $x['data'] = json_encode($data);
            } elseif (strlen($link == 4)) {
                $biro = $this->d_sas_modelbaru->get_kegiatan()->result();

                $x['biro'] = json_encode($biro);
                var_dump($biro);
                exit;
            }

            // var_dump($data);
            // exit();

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
