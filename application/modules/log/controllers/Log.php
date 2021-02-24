<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Log extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('log_model');
    }

    function index(){

        if($this->session->userdata('nip') != NULL){
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('v_log');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        }else{
            redirect("user");
        }
    }

    function table_log() {
        $data = $this->log_model->get_log()->result();

        $no = 1;
        $apa = array();

        foreach($data as $r) {
            $user = $r->user == NULL ? "<i><font>Tidak ada data</font></i>": $r->user;
            $ket = $r->ket == NULL ? "<i><font>Tidak ada data</font></i>": $r->ket;
            $tanggal = $r->tanggal == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal;

            $apa[] = array(
                $no++,
                $user,
                $ket,
                $tanggal
            );
        }
        
        echo json_encode($apa);
    }
}