<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absensi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    	//load chart_model from model
		$this->load->model('Absensi_model');
	}

	function index()
	{
		if ($this->session->userdata('nip') != NULL) {
			$penugasan = $this->Absensi_model->get_divisi()->result();
			$x['penugasan'] = $penugasan;
			// var_dump($penugasan);exit();

			$pen = $this->input->post('penugasan', true);
			// var_dump($pen);exit();
			$fromDate = $this->input->post('fromDate', true);
			$endDate = $this->input->post('endDate', true);
			

			if($pen != NULL && $fromDate != NULL && $endDate != NULL){
				$data = $this->Absensi_model->get_range_awalakhir($pen, $fromDate, $endDate)->result();
				// var_dump($data);exit();
				$x['fromDate'] = $fromDate;
				$x['penugasan'] = $penugasan;
				$x['endDate'] = $endDate;
				$x['data'] = $data;
			

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view('view_absensi', $x);
				$this->load->view("include/sidebar");
				$this->load->view("include/panel");
				$this->load->view("include/footer"); 
			}else{

				$x['data'] = "Tidak";
				$x['penugasan'] = $penugasan;
				$x['fromDate'] = $fromDate;
				$x['endDate'] = $endDate;

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view('view_absensi', $x);
				$this->load->view("include/sidebar");
				$this->load->view("include/panel");
				$this->load->view("include/footer");
			}
		} else {
			redirect("user");
		}
	}

	// function presensi()
	// {
	// 	if ($this->session->userdata('nip') != NULL) {
	// 		$divisi = $this->Absensi_model->get_divisi()->result();
	// 		$x['divisi'] = json_encode($divisi);

	// 		$fromDate = $this->input->post('fromDate', true);
	// 		$endDate = $this->input->post('endDate', true);

	// 		if($divisi != NULL && $fromDate != NULL && $endDate != NULL){
	// 			$data = $this->Absensi_model->get_range_awalakhir($divisi, $fromDate, $endDate)->result();

	// 			$x['fromDate'] = $fromDate;
	// 			$x['divisi'] = $divisi;
	// 			$x['endDate'] = $endDate;
	// 			$x['data'] = $data;

	// 			$this->load->view("include/head");
	// 			$this->load->view("include/top-header");
	// 			$this->load->view('view_absensi', $x);
	// 			$this->load->view("include/sidebar");
	// 			$this->load->view("include/panel");
	// 			$this->load->view("include/footer"); 
	// 		}else{

	// 			$x['data'] = "Tidak";
	// 			$x['divisi'] = $divisi;
	// 			$x['fromDate'] = $fromDate;
	// 			$x['endDate'] = $endDate;

	// 			$this->load->view("include/head");
	// 			$this->load->view("include/top-header");
	// 			$this->load->view('view_absensi', $x);
	// 			$this->load->view("include/sidebar");
	// 			$this->load->view("include/panel");
	// 			$this->load->view("include/footer");
	// 		}
	// 	} else {
	// 		redirect("user");
	// 	}
	// }

	function coba($penugasan = NULL)
	{
		// var_dump($penugasan);exit();

		// $bebas= preg_replace('/[^A-Z a-z\,]/', '', $penugasan);
		$nya = str_replace('%20', " ", $penugasan);
		// var_dump($nya);exit();
		if ($this->session->userdata('nip') != NULL) {
			$data = $this->Absensi_model->get_divisi_table($nya)->result();
			echo json_encode($data);

		} else {
			redirect("user");
		}
	}



}