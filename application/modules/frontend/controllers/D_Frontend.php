<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class D_Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
        // $this->load->model('user_model');
	}

	public function index()
	{
		if($this->session->userdata('nip') != NULL){

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('frontend');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}
}
?>