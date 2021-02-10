<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_sarpras extends CI_Controller {
	function __construct(){
		parent::__construct();
			//load chart_model from model
		$this->load->model('d_sarpras_model');
	}

	function index($satker = NULL) {
		if($this->session->userdata('nip') != NULL) {
			if ($satker != NULL) {

				switch ($satker) {
					case 448302:
						// IPDN
						$x['title'] = 'Jatinangor';
						break;
					case 352593:
						// IPDN JAKARTA
						$x['title'] = 'Jakarta';
						break;
					case 677010:
						// IPDN SULUT
						$x['title'] = 'Sulawesi Utara';
						break;
					case 677024:
						// IPDN SULSEL
						$x['title'] = 'Sulawesi Selatan';
						break;
					case 677045:
						// IPDN SUMBAR
						$x['title'] = 'Sumatera Barat';
						break;
					case 683070:
						// IPDN KALBAR
						$x['title'] = 'Kalimantan Barat';
						break;
					case 683084:
						// IPDN NTB
						$x['title'] = 'Nusa Tenggara Barat';
						break;
					case 683091:
						// IPDN PAPUA
						$x['title'] = 'Papua';
						break;
				}
				
				// $data = $this->d_sarpras_model->get_sarpras($satker)->result();
				// $chart = $this->d_sarpras_model->get_sarpras_year($satker)->result();
				$chart = $this->d_sarpras_model->get_belanja_tahun($satker)->result();
				$list_kat = $this->d_sarpras_model->get_kategori($satker)->result();

				$chart = json_encode($chart);
				// var_dump($chart);exit();
				$kat = "";
				$arr = $tmp = array();
				foreach (json_decode($chart, true) as $z):

					if ($z['kategori'] != $kat) {
						if ($kat != "") {
							array_push($arr, $tmp);
							$tmp = array();
						}
						$kat = $z['kategori'];
					}
					array_push($tmp, array(
						'total'			=>  $z['total'],
						'perolehan'		=>  $z['perolehan'],
						'tahun'			=>	$z['tahun'],
						'kategori'		=>	$z['kategori']
					));

				endforeach;
				array_push($arr, $tmp);

				// $x['data'] = json_encode($data);
				$x['chart'] = $arr;
				$x['l_kat'] = json_encode($list_kat);

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view("view_sarpras",$x);
				$this->load->view("include/sidebar");
				$this->load->view("include/footer");
			} else {
				$chart = $this->d_sarpras_model->get_sarpras_year()->result();
				$list_kon = $this->d_sarpras_model->get_sarpras_kondisi()->result();
				$satker = $this->d_sarpras_model->get_satker()->result();

				$chart = json_encode($chart);
				$sat = "";
				$arr = $tmp = array();
				foreach (json_decode($chart, true) as $z):

					if ($z['kode_satker'] != $sat) {
						if ($sat != "") {
							array_push($arr, $tmp);
							$tmp = array();
						}
						$sat = $z['kode_satker'];
					}
					array_push($tmp, array(
						'total'			=>  $z['total'],
						'tahun'			=>	$z['tahun'],
						'kode_satker'		=>	$z['kode_satker']
					));

				endforeach;
				array_push($arr, $tmp);

				$list_kon = json_encode($list_kon);
				$kon = "";
				$arrk = $tmpk = array();
				foreach (json_decode($list_kon, true) as $z):

					if ($z['kode_satker'] != $kon) {
						if ($kon != "") {
							array_push($arrk, $tmpk);
							$tmpk = array();
						}
						$kon = $z['kode_satker'];
					}
					array_push($tmpk, array(
						'total'			=>  $z['total'],
						'kondisi'			=>	$z['kondisi'],
						'kode_satker'		=>	$z['kode_satker']
					));

				endforeach;
				array_push($arrk, $tmpk);

				// var_dump($arr[0]);

				$x['chart'] = $arr;
				$x['l_kon'] = $arrk;
				$x['satker'] = json_encode($satker);

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view("dash_sarpras", $x);
				$this->load->view("include/sidebar");
				$this->load->view("include/footer");
			}
		}else{
			redirect("user");
		}
	}

	function table($satker = NULL, $kategori = NULL) {
		// echo "$satker/$kategori";
		$kategori = str_replace("-", " ", $kategori);
		$data = $this->d_sarpras_model->get_sarpras_by_kategori($satker, $kategori)->result();
		echo json_encode($data);
	}

	function detail($id = NULL) {
		$data = $this->d_sarpras_model->get_detail($id)->row_array();
		echo json_encode($data);
	}

	public function update($satker = NULL) {
		$this->d_sarpras_model->update_sarpras();
		redirect('d_sarpras/'.$satker);
	}

	function test(){
		$list_kon = $this->d_sarpras_model->get_sarpras_kondisi()->result();
		echo json_encode($list_kon);
	}

}