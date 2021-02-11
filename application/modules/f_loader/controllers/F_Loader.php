<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_Loader extends CI_Controller {

    public function index()
	{
        $this->load->view("frontend/a-head");
        $this->load->view("frontend/a-top-header");
        $this->load->view('loader_utama');
        $this->load->view("frontend/a-footer");
    }
}
?>