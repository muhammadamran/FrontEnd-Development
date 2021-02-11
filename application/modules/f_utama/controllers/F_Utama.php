<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_Utama extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        // $this->load->model('f_utama_model');
    }

    public function index()
	{
        // $data = $this->f_utama_model->get_data();
        // $x['data'] = $data[0];

        $this->load->view("frontend/b-head");
        $this->load->view("frontend/b-top-header");
        $this->load->view('f_utama');
        // $this->load->view('utama', $x);
        $this->load->view("frontend/b-footer");
    }
}
?>