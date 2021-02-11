<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_Loader extends CI_Controller {

    public function index()
	{
        $this->load->view('loader_utama');
    }

    public function indexkeuangan()
	{
        $this->load->view('loader_keuangan');
    }

    public function indexdosen()
	{
        $this->load->view('loader_dosen');
    }

    public function indexpraja()
	{
        $this->load->view('loader_praja');
    }

    public function indexkepegawaian()
	{
        $this->load->view('loader_kepegawaian');
    }
}
?>