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
			
			if($pen == "all" && $fromDate != NULL && $endDate != NULL) {
				$data = $this->Absensi_model->get_range_awalakhir_all($fromDate, $endDate)->result();
				// var_dump($data);exit();
				$x['fromDate'] = $fromDate;
				$x['endDate'] = $endDate;
				$x['data'] = $data;
				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view('view_absensi', $x);
				$this->load->view("include/sidebar");
				$this->load->view("include/panel");
				$this->load->view("include/footer"); 

			}elseif($pen != NULL && $fromDate != NULL && $endDate != NULL){
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

	function users(){

		$data = $this->Absensi_model->users()->result();
		$x['data'] = json_encode($data);

		$penugasan = $this->Absensi_model->get_divisi()->result();
		$x['penugasan'] = $penugasan;

		$level = $this->Absensi_model->get_level()->result();
		$x['level'] = $level;

		$this->load->view("include/head");
		$this->load->view("include/top-header");
		$this->load->view('view_users', $x);
		$this->load->view("include/sidebar");
		$this->load->view("include/panel");
		$this->load->view("include/footer");
	}

	public function tambah_users()
	{

		$date = new DateTime($this->input->post('tgl', true));
		$result = $date->format('dmY');

		$cek_data = $this->Absensi_model->cek_dataakhir()->row();

		$dataterakhir = $cek_data->username;
		// var_dump($dataterakhir);exit();
		$datakahirnya = substr($dataterakhir, 9);
		// var_dump($datakahirnya);exit();

		$datakahirnya++;
		$hasil = $result."0".$datakahirnya;
		// var_dump($hasil);exit();

		$input_data['nik'] = $this->input->post('nik', true); 			
		$input_data['nama'] = $this->input->post('nama', true);
		$input_data['telp'] = 	$this->input->post('telp', true);
		$input_data['email'] = $this->input->post('email', true);
		$input_data['penugasan'] = $this->input->post('penugasan', true);
		$input_data['username'] = $hasil;
		$input_data['password'] = md5($this->input->post('password', true));
		$input_data['level'] = $this->input->post('level', true);
		
		// var_dump($input_data);exit();
		
		$cek_userrrr = $this->Absensi_model->cek_users($input_data['username']);

		if(!$cek_userrrr){
			$result = $this->Absensi_model->tambah_users($input_data);

		}else{
			$this->session->set_flashdata('users', 'USERNEMAE THL SUDAH TERDAFTAR.');
			$x['alert'] = 'ada';			
			redirect('absensi/users',$x);
		}

		if (!$result) { 							
			$this->session->set_flashdata('users', 'DATA THL GAGAL DITAMBAHKAN.'); 				
			redirect('absensi/users'); 			
		} else { 								
			$this->session->set_flashdata('users', 'DATA THL BERHASIL DITAMBAHKAN.');			
			redirect('absensi/users'); 			
		}
	}

	

}