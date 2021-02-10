<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('uploads_model');
	}

	public function index()
	{
		if($this->session->userdata('nip') != NULL)
		{
			redirect("home"); 
		}else{
			redirect("user");
		}
	}

	public function v_span()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_span');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_pok()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = "pok";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer");  
		}else{
			redirect("user");
		}
	}

	public function v_sas()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_sas');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_sarpras($kampus = NULL)
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = 'sarpras';
			$x['kampus'] = $kampus;
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_rank()
	{
		if($_SESSION['nip'])
		{
			$x['title'] = "rank";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_praja()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = "praja";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_praja', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_pns()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_pns');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}
	
	public function v_thl()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_thl');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_dosen()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_dosen');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_alumni()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_alumni');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function span(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['span']['name']) && in_array($_FILES['span']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['span']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['span']['tmp_name']);

			$list_sheet = $spreadsheet->getSheetNames();

			$sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();

			$data = array();
			$biro = array();

			$date = new DateTime();
			$datee = $date->format('Y-m-d');

			for($i = 10;$i < 23;$i++)
			{
				// var_dump($sheetData[$i]['2'] != 1286);
				if($sheetData[$i]['2'] != NULL && $sheetData[$i]['2'] != 1286 && $sheetData[$i]['2'] != 1292 && $sheetData[$i]['2'] != 1293 && $sheetData[$i]['2'] != 1294 && $sheetData[$i]['2'] != 1295){
					array_push($data, array(
						'kode_satker'      => $sheetData[$i]['2'],
						'nama_satker'      => $sheetData[$i]['3'],
						'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
						'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
						'persentase_bp'      => $sheetData[$i]['7'],
						'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
						'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
						'persentase_bb'   => $sheetData[$i]['11'],
						'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
						'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
						'persentase_bm'   => $sheetData[$i]['15'],
						'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
						'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
						'persentase_t'   => $sheetData[$i]['19'],
						'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
						'created_date' => $datee,
					));
				}
			}

			for($i = 11;$i < 15;$i++)
			{
				array_push($biro, array(
					'kode_satker_biro'      => $sheetData[$i]['2'],
					'nama_satker_biro'      => $sheetData[$i]['3'],
					'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
					'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
					'persentase_bp'      => $sheetData[$i]['7'],
					'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
					'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
					'persentase_bb'   => $sheetData[$i]['11'],
					'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
					'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
					'persentase_bm'   => $sheetData[$i]['15'],
					'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
					'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
					'persentase_t'   => $sheetData[$i]['19'],
					'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
					'created_date' => $datee,
				));
			}
			// exit;

			$span = $this->db->query("SELECT created_date FROM tbl_span WHERE created_date = '$datee'")->result();
			$biroo = $this->db->query("SELECT created_date FROM tbl_span_biro WHERE created_date = '$datee'")->result();
			
			if(!$span && !$biroo){
				$this->db->insert_batch('tbl_span_biro', $biro);
				$this->db->insert_batch('tbl_span', $data);
			}else{
				$this->db->query("DELETE FROM tbl_span_biro WHERE created_date='$datee'");
				$this->db->insert_batch('tbl_span_biro', $biro);
				$this->db->query("DELETE FROM tbl_span WHERE created_date='$datee'");
				$this->db->insert_batch('tbl_span', $data);
			}
			
			//upload success
			$this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

			redirect("uploads/v_span"); 
		}
	}

	public function satkerspan() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['satker']['name']) && in_array($_FILES['satker']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['satker']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('satker', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['satker']['tmp_name']);
			// echo $_FILES['belanja']['name'];

			$shit = $loadexcel->getActiveSheet();
			$rows = $shit->toArray(null, true, true ,true);
			$data = array();
			

			$date = new DateTime();
			$datee = $date->format('Y-m-d');

			
			foreach ($rows as $row) {
			// echo $row ['B'];
				$add = false;
				$nama = "";
				preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
				if (count($tmp) > 0) {
					preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
					$nama = $txt[0];
					switch ($tmp[0]) {
						case 448302:
							// IPDN KAMPUS JATINANGOR
						$add = true;
						break;
						case 352593:
                            // IPDN KAMPUS JAKARTA 
						$add = true;
						break;
						case 677010:
                            // IPDN KAMPUS SULUT
						$add = true;
						break;
						case 677024:
                            // IPDN KAMPUS SULSES
						$add = true;
						break;	
						case 677045:
                            // IPDN KAMPUS SUMBAR
						$add = true;
						break;	
						case 683070:
                            // IPDN KAMPUS KALBAR
						$add = true;
						break;	
						case 683084:
                            // IPDN KAMPUS NTB
						$add = true;
						break;	
						case 683091:
                            // IPDN KAMPUS PAPUA
						$add = true;
						break;
					}
					if ($add) {
						array_push($data, array(
							'kode_satker'    =>  $tmp[0],
							'nama_satker'  =>  $txt[0],
							'pagu_bp'      => $row['C'],
							'realisasi_bp'      => $row['D'],
							'persentase_bp'      => substr($row['E'], 1, 6),
							'pagu_bb'      => $row['G'],
							'realisasi_bb'   => $row['H'],
							'persentase_bb'   => substr($row['I'], 1, 6),
							'pagu_bm'   => $row['K'],
							'realisasi_bm'   => $row['L'],
							'persentase_bm'   => substr($row['M'], 1, 6),
							'pagu_t'   => $row['AM'],
							'realisasi_t'   => $row['AN'],
							'persentase_t'   => substr($row['AO'], 1, 6),
							'sisa'   => $row['AP'],
							'created_date' => $datee,

						));
					}	
				}
			}


			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		}
		// $this->db->insert_truncate('tbl_span');
		$this->db->truncate('tbl_span_rank');
		$this->db->insert_batch('tbl_span_rank', $data);
		//upload success
		$this->session->set_flashdata('satker', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_span");
	}

	public function satkerspanbiro() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['belanja']['name']) && in_array($_FILES['belanja']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['belanja']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('belanja', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['belanja']['tmp_name']);
			// echo $_FILES['belanja']['name'];

			$shit = $loadexcel->getActiveSheet();
			$rows = $shit->toArray(null, true, true ,true);
			$biroo = array();
			
			$date = new DateTime();
			$datee = $date->format('Y-m-d');
			
			foreach ($rows as $row) {
			// echo $row ['B'];
				$add = false;
				$nama = "";
				preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
				if (count($tmp) > 0) {
					preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
					$nama = $txt[0];
					switch ($tmp[0]) {
						case '1294':
							// Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan
						$add = true;
						break;
						case '1293':
							// Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan
						$add = true;
						break;
						case '1286':
							// Penyelenggaraan Administrasin Kerjasama dan Hukum
						$add = true;
						break;
						case '1292':
							// Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan
						$add = true;
						break;
					}
					if ($add) {
						array_push($biroo, array(
							'kode_satker'    =>  $tmp[0],
							'nama_satker'  =>  $txt[0],
							'pagu_bp'      => $row['C'],
							'realisasi_bp'      => $row['D'],
							'persentase_bp'      => substr($row['E'], 1, 4),
							'pagu_bb'      => $row['G'],
							'realisasi_bb'   => $row['H'],
							'persentase_bb'   => substr($row['I'], 1, 4),
							'pagu_bm'   => $row['K'],
							'realisasi_bm'   => $row['L'],
							'persentase_bm'   => substr($row['M'], 1, 4),
							'pagu_t'   => $row['AM'],
							'realisasi_t'   => $row['AN'],
							'persentase_t'   => substr($row['AO'], 1, 4),
							'sisa'   => $row['AP'],
							'created_date' => $datee,

						));
					}	
				}
			}
			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		} var_dump($biroo);
		exit;
		// $this->db->insert_truncate('tbl_span');
		$this->db->truncate('tbl_span_rank');
		$this->db->insert_batch('tbl_span_rank', $biroo);
		//upload success
		$this->session->set_flashdata('belanja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_span");
	}

	public function pok() {
		// error_reporting(E_ERROR | E_PARSE);
		// error_reporting(E_ALL);
		// ini_set('display_errors', TRUE);
		// ini_set('display_startup_errors', TRUE);
		// satker kampus
		// 448302 IPDN KAMPUS JATINANGOR
		// 352593 IPDN KAMPUS JAKARTA
		// 677010 IPDN KAMPUS SULAWESI UTARA
		// 677024 IPDN KAMPUS SULAWESI SELATAN
		// 677045 IPDN KAMPUS SUMATERA BARAT
		// 683070 IPDN KAMPUS KALIMANTAN BARAT
		// 683084 IPDN KAMPUS NUSA TENGGARA BARAT
		// 683091 IPDN KAMPUS PAPUA

		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_FILES['pok']['tmp_name'][0] != "") {
			// ada isinya
			$count = count($_FILES['pok']['name']);

			// echo $count."<br>";
			// var_dump($_FILES);
			// print("<pre>".print_r($_FILES,true)."</pre>");
			$data_out = array();
			$unitList = array();

			foreach($_FILES[ 'pok' ][ 'tmp_name' ] as $index => $tmpName) {
				// echo $_FILES['pok']['name'][$index]."<br>";
				// echo $index."<br>";

				if(isset($_FILES['pok']['name'][$index]) && in_array($_FILES['pok']['type'][$index], $file_mimes)) {

					$arr_file = explode('.', $_FILES['pok']['name'][$index]);
					$extension = end($arr_file);

					// echo $_FILES['pok']['name'][$index];
					// echo "<br><br>=============================<br><br>";

					if($extension != 'xlsx') {
						$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("uploads/v_pok"); 
					} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					}

					$loadexcel = $reader->load($_FILES['pok']['tmp_name'][$index]);

					$list_sheet = $loadexcel->getSheetNames();

					// print("<pre>".print_r($list_sheet,true)."</pre>");

					// $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();


					$biro = "";
					$set = false;
					// $data_out = array();
					// $unitList = array();

					foreach ($list_sheet as $shit) {

						// pisahkan cara membaca sheet, antara rekap dan nama bagian / unit
						// sheet yang biasanya nama bagian
						// 1. TU BIRO..
						// 2. AKADEMIK
						// ...
						// PASCA*
						// PROFESI*
						// echo $shit."<br>";
						$es = explode(".", $shit);

						if ((is_numeric($es[0]) || ($shit == "PASCA") || ($shit == "PROFESI")) && !(strpos(strtolower($shit), 'edit') === 0)) {
							// echo "<br><br>=============================<br><br>";
							// echo $shit."<br>";

							// set unit, biro ke berapa, unit ke berapa
							switch ($shit) {
								case "PASCA":
								$unit = 115;
								break;
								case "PROFESI":
								$unit = 116;
								break;
								default:
								$unit = ($es[0]<10)?$biro."0".$es[0]:$biro.$es[0];
								break;
							}

							// echo "<br>".$unit."<br>";

							$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
							$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
							$stop = false;
							$num = 1;
							$nullcc = 0;
							while(!$stop && $num < $maxRow) {
								$row = $rows[$num++];
								if ($row['A'] == NULL) {
									$nullcc++;
									if ($nullcc == 4) {
										$stop = true;    
									}
								} else {
									$nullcc = 0;
									// echo $row['A']."<br>";
									if (strpos($row['A'], 'tgl')) {
										// echo $row['A']."<br>";
										$tgl = explode("tgl. ", $row['A']);
										$tgl_last = count($tgl)-1;
										$tgl = $this->ite($tgl[$tgl_last]);
										$newDate = date("Y-m-d", strtotime($tgl));
										// echo $newDate."<br>";
									} else if ($num > 6) {
										$regex = '/^[0-9]{4}\.[0-9]{3}$/';
										if (preg_match($regex, $row['A'])) {
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])." ".preg_replace("/[^0-9]/", "", $row['C'])." ".preg_replace("/[^0-9]/", "", $row['D'])." ".preg_replace("/[^0-9]/", "", $row['E'])."<br>";
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])."<br>";
											array_push($data_out, array(
												'id_u'      => $unit,
												'nama'      => str_replace("[Base Line]", "", str_replace("_x000D_", "",$row['B'])),
												'pagu'      => preg_replace("/[^0-9]/", "", $row['C']),
												'realisasi' => preg_replace("/[^0-9]/", "", $row['D']),
												'kembali'   => preg_replace("/[^0-9]/", "", $row['E']),
												'tgl'       => $newDate
											));
										}
									}
								}
							}

						// sheet rekap
						// bukan nama bagian / unit
						// REKAP IPDN
						// REKAP BIRO I
						// REKAP BIRO 2
						} else if (strpos($shit, 'REKAP BIRO') === 0 && !$set) {
							// get nomer biro untuk id biro
							$set = true;
							$temp = explode(" ", $shit);
							$biro = $temp[2];
							// $unitList = array();
							if (!is_numeric($biro)) {
								$biro = $this->rti($biro);
							}

							// khusus IPDN Jatinangor
							$id_b = ($biro<10)?"10".$biro:"1".$biro;
							switch ($biro) {
								case '1':
								$id_b = 1292;
								break;
								case '2':
								$id_b = 1294;
								break;
								case '3':
								$id_b = 1293;
								break;
								case '4':
								$id_b = 1286;
								break;
							}

							// echo $shit."<br>";
							// echo "ID BIRO : ".$id_b."<br>";

							// read data pada sheet REKAP BIRO
							$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
							$stop = false;
							$num = 1;
							$nullcc = 0;
							while(!$stop) {
								// echo $row['A']."<br>";
								$row = $rows[$num++];

								// cek eof
								if ($row['A'] == NULL) {
									$nullcc++;
									if ($nullcc == 6) {
										$stop = true;
									}
								} else if (is_numeric($row['A']) && strlen($row['B']) > 3) {
									// harusnya konten, bukan header table
									// list nama bagian / unit
									$nullcc = 0;
									$id_u = ($row['A']<10)?$biro."0".$row['A']:"1".$row['A'];
									// echo $id_u."=".$row['B']."<br>";
									// echo "INSERT INTO unit values (".$id_u.", ".$id_b.", '".$row['B']."')";
									array_push($unitList, array(
										'id'    =>  $id_u , // 301, 411, 103, ... id unit
										'id_b'  =>  $id_b,  // 101, 102, 103, 104, ... id biro
										'nama'  =>  $row['B'] // LAB, TU BIRO
									));
									// echo "<br>";
								} else if (strpos($row['A'], 'tgl')) {
									// echo $row['A']."<br>";
									$tgl = explode("tgl. ", $row['A']);
									$tgl_last = count($tgl)-1;
									$tgl = $this->ite($tgl[$tgl_last]);
									$newDate = date("Y-m-d", strtotime($tgl));
									// echo $newDate."<br>";
								}
							}
							// echo "<br>";
							// var_dump($unitList);
							// echo "<br>";

							// setting table unit kalo belum ada isinya
							// $this->db->truncate('unit_pok');

							// untuk unit_pok yang kosong
							// $this->db->insert_batch('unit_pok', $unitList); // PENTING
						}
					}
					// echo "<br>";
					// var_dump($unitList);
					// print("<pre>".print_r($unitList,true)."</pre>");
					// var_dump($data_out);
					// print("<pre>".print_r($data_out,true)."</pre>");
					// exit();

					// if (!empty($unitList)) {
					// 	$this->db->insert_batch('unit_pok', $unitList); // PENTING    
					// }
					// $this->db->truncate('out_pok');
					// $this->db->insert_batch('out_pok', $data_out);  // PENTING
					//delete file from server
					// unlink(realpath('excel/'.$data_upload['file_name'])); 
				}

			}
			// var_dump($unitList);
			// exit;
			// print("<pre>".print_r($unitList,true)."</pre>");
			$this->db->truncate('unit_pok');
			$this->db->insert_batch('unit_pok', $unitList); // PENTING 
			// var_dump($data_out);
			// print("<pre>".print_r($data_out,true)."</pre>");
			$this->db->truncate('out_pok');
			$this->db->insert_batch('out_pok', $data_out);  // PENTING
			// exit;
			// //upload success
			$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_pok");
		} else {
			// echo "kosong";
			$this->session->set_flashdata('pok', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_pok");
		}
	}

	public function sarpras_jatinangor() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_jatinangor']['name']) && in_array($_FILES['sarpras_jatinangor']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_jatinangor']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_jatinangor', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/jatinangor"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_jatinangor']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$set = false;
			$data = array();
			$kode_satker = 448302;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				// $kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel (tanpa pake luas, pake luas)
				while(!$stop) {
					$row = $rows[$num++];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (strpos(strtoupper($row['A']), 'PER') === 0) {
							$tgl = explode("PER ", $row['A']);
							$tgl_last = count($tgl)-1;
							$tgl = $this->ite($tgl[$tgl_last]);
							$newDate = date("Y-m-d", strtotime($tgl));
							// echo "tanggal: $newDate<br>";
						} else if ($num > 6) {
							if (!$set) {
								if (strpos(strtolower($row['L']), 'asal') === 0) {
									$set = true;
									$tab = 1;
								} elseif (strpos(strtolower($row['L']), 'kondisi') === 0) {
									$set = true;
									$tab = 0;
								}
							} elseif (is_numeric($row['A']) && strlen($row['A']) > 4) {
								$harga_beli = $harga_baru = $asal = $kondisi = "";
								$jumlah = $this->ktt($row['F']);
								if ($tab) { //if ($row['M'] != NULL) {
									// punya luas
									$luas = $this->ktt($row['G']);
									$harga_beli = $this->ktt($row['H']);
									$harga_baru = $this->ktt($row['J']);
									$asal = $row['L'];
									$kondisi = $row['M'];
								} else {
									$harga_beli = $this->ktt($row['G']);
									$harga_baru = $this->ktt($row['I']);
									$asal = $row['K'];
									$kondisi = $row['L'];
								}

								array_push($data, array(
									'kode_satker'    =>  $kode_satker,
									'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
									'uraian' => $row['B'],
									'nup' => $row['C'],
									'merk' => $row['D'],
									'tahun' => $row['E'],
									'jumlah' => $jumlah,
									'harga_beli' => $harga_beli,
									'harga_baru' => $harga_baru,
									'asal' => $asal,
									'kondisi' => $kondisi,
									'luas' => $luas
								));
							}
						}
					}
				}
			} 

			$this->db->insert_batch('tbl_sarpras', $data);
			// exit;
		}

		//upload success
		$this->session->set_flashdata('sarpras_jatinangor', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_jatinangor']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/jatinangor");
	}

	public function sarpras_papua() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_papua']['name']) && in_array($_FILES['sarpras_papua']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_papua']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_papua', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/papua");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_papua']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683091;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} elseif (is_numeric($row['D']) && strlen($row['D']) > 4) {
						$nullcc = 0;
						$harga_beli = $harga_baru = $asal = $kondisi = "";
						$jumlah = $this->ktt($row['K']);
						$harga_beli = $this->ktt($row['L']);
						$harga_baru = $this->ktt($row['P']);
						$kondisi = $row['J'];

						$thn = $row['I'];
						if (strlen($thn) > 4) {
							preg_match("/[0-9]{4}\b/", $thn, $thnT);
							$thn = $thnT[0];
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['D']),
							'uraian' => $row['F'],
							'nup' => $row['E'],
							'merk' => $row['G'],
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi,
							'luas' => $luas
						));

					} elseif (strpos(strtoupper($row['A']), 'PER') === 0) {
						$nullcc = 0;
						$tgl = explode("PER ", $row['A']);
						$tgl_last = count($tgl)-1;
						$tgl = $this->ite($tgl[$tgl_last]);
						$newDate = date("Y-m-d", strtotime($tgl));
						// echo $newDate."<br>";exit;
					}
					$num++;
				}
			}
			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_papua', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_papua']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/papua");
	}

	public function sarpras_sulsel() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sulsel']['name']) && in_array($_FILES['sarpras_sulsel']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sulsel']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sulsel', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sulsel");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sulsel']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677024;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel (pake luas, tanpa pake luas)
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					// print("<pre>".print_r($row,true)."</pre>");
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['H']), "harga") === 0) {
								if (strpos(strtolower($row['L']), 'asal') === 0) {
									// tanah
									$set = true;
									$tab = 0;
								} elseif (strpos(strtolower($row['L']), 'kondisi') === 0) {
									// aset tak berwujud, aset tetap lainnya, peralatan dan mesin
									$set = true;
									$tab = 1;
								}
							} elseif (strpos(strtolower($row['H']), "luas") === 0) {
								if (strpos(strtolower($row['M']), 'asal') === 0) {
									// gedung dan bangunan
									$set = true;
									$tab = 2;
								} elseif (strpos(strtolower($row['M']), 'kondisi') === 0) {
									// jaringan, irigasi, jalan dan jembatan
									$set = true;
									$tab = 3;
								}
							}
						} elseif (is_numeric($row['B']) && strlen($row['B']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$asal = $kondisi = "";
							$jumlah = $this->ktt($row['G']);
							switch ($tab) {
								case 0:
									// tanah
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 1:
									// aset tak berwujud, aset tetap lainnya, peralatan dan mesin
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$kondisi = $row['L'];
								break;
								case 2:
									// gedung dan bangunan
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$asal = $row['M'];
								$kondisi = $row['N'];
								break;
								case 3:
									// jaringan, irigasi, jalan dan jembatan
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$kondisi = $row['M'];
								break;
							}

							$thn = $row['F'];
							if (strlen($thn) > 4) {
								// $thnT = explode('/', $thn);
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
								'uraian' => $row['C'],
								'nup' => $row['D'],
								'merk' => $row['E'],
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi,
								'luas' => $luas
							));

						}
					}
					$num++;
				}
			}
			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_sulsel', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sulsel']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/sulsel"); 
	}

	public function sarpras_ntb() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_ntb']['name']) && in_array($_FILES['sarpras_ntb']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_ntb']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_ntb', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/ntb");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_ntb']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683084;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['F']), "luas") === 0) {
								if (strpos(strtolower($row['J']), 'kondisi') === 0) {
									// jalan dan jembatan, tanah, bangunan air
									$set = true;
									$tab = 1;
								} else {
									// gedung dan bangunan
									$set = true;
									$tab = 4;
								}
							} elseif (strpos(strtolower($row['F']), "jumlah") === 0) {
								if (strpos(strtolower($row['J']), 'kondisi') === 0) {
									// peralatan dan mesin, aset tetap lainnya, monografi, jaringan, alat besar
									$set = true;
									$tab = 3;
								} else {
									// irigasi
									$set = true;
									$tab = 2;
								}
							} elseif (strpos(strtolower($row['F']), "polis") === 0) {
								// randis
								$set = true;
								$tab = 5;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['A'])) && strlen($row['A']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";
							switch ($tab) {
								case 1:
								$luas = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 2:
								$jumlah = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['K'];
								$kondisi = $row['L'];
								break;
								case 3:
								$jumlah = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 4:
								$luas = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['H']);
								$asal = $row['J'];
								$kondisi = $row['K'];
								break;
								case 5:
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
							}

							$thn = $row['E'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
								'uraian' => $row['B'],
								'nup' => $row['C'],
								'merk' => $row['D'],
								'tahun' => $thn,
								// -------------------- //
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}

			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_ntb', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_ntb']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/ntb");
	}

	public function sarpras_sulut() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sulut']['name']) && in_array($_FILES['sarpras_sulut']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sulut']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sulut', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sulut");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sulut']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677010;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['J']), "harga") === 0) {
								if (strpos(strtolower($row['N']), 'psp') === 0) {
									// jaringan, aset tetap lainnya
									$set = true;
									$tab = 3;
								} elseif (strpos(strtolower($row['N']), 'lokasi') === 0) {
									// peralatan dan mesin
									$set = true;
									$tab = 4;
								} elseif (strpos(strtolower($row['N']), 'kondisi') === 0) {
									// gedung dan bangunan
									$set = true;
									$tab = 5;
								}
							} elseif (strpos(strtolower($row['J']), "asal") === 0) {
								// kendaraan
								$set = true;
								$tab = 2;
							} elseif (strpos(strtolower($row['J']), "kondisi") === 0) {
								// jalan
								$set = true;
								$tab = 1;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['B'])) && strlen($row['B']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";

							switch ($tab) {
								case 1:
								$harga_beli = $this->ktt($row['H']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 2:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['J'];
								$kondisi = $row['K'];
								break;
								case 3:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 4:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 5:
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$asal = $row['M'];
								$kondisi = $row['N'];
								break;
							}

							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
								'uraian' => $row['C'],
								'nup' => $row['D'],
								'merk' => $row['E'],
								// -------------------- //
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_sulut', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sulut']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/sulut");
	}

	public function sarpras_jakarta() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_jakarta']['name']) && in_array($_FILES['sarpras_jakarta']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_jakarta']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_jakarta', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/jakarta");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_jakarta']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 352593;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['G']), "harga") === 0) {
								if (strpos(strtolower($row['K']), 'kondisi') === 0) {
									// jalan dan jembatan, jaringan, aset tetap lainnya, peralatan dan mesin, aset tak berwujud
									$set = true;
									$tab = 3;
								} else {
									// tanah
									$set = true;
									$tab = 2;
								}
							} elseif (strpos(strtolower($row['G']), "luas") === 0) {
								// gedung dan bangunan, irigasi
								$set = true;
								$tab = 1;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['A'])) && strlen(preg_replace("/[^0-9]/", "", $row['A'])) > 8) {
							// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";

							switch ($tab) {
								case 1:
								$luas = $this->ktt($row['G']);
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$kondisi = $row['L'];
								break;
								case 2:
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['K'];
								$kondisi = $row['L'];
								break;
								case 3:
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$kondisi = $row['K'];
								break;
							}

							$thn = $row['E'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['F']);

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
								'uraian' => $row['B'],
								'nup' => $row['C'],
								'merk' => $row['D'],
								// -------------------- //
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_jakarta', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_jakarta']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/jakarta");
	}

	public function sarpras_kalbar() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_kalbar']['name']) && in_array($_FILES['sarpras_kalbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_kalbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_kalbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/kalbar");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_kalbar']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683070;
			$ctest = 0;
			$carr = 0;

			foreach ($list_sheet as $shit) {
				$ctest = 0;
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while($num < $maxRow) {
					$row = $rows[$num];
					$nullcc = 0;
					if (!$set) {
						if (strpos(strtolower($row['F']), "luas") === 0) {
							// tanah
							$set = true;
							$tab = 1;
						} elseif (strpos(strtolower($row['F']), "jumlah") === 0) {
							// jalan
							$set = true;
							$tab = 2;
						} elseif (strpos(strtolower($row['F']), "tahun") === 0) {
							if (strpos(strtolower($row['H']), 'luas') === 0) {
								if (strpos(strtolower($row['K']), 'harga') === 0) {
									// jaringan
									$set = true;
									$tab = 3;
								} else {
									// gedung, irigasi
									$set = true;
									$tab = 4;
								}									
							} else {
								if (isset($row['J'])) {
									// peralatan
									$set = true;
									$tab = 5;
								} else {
									// aset tetap lainnya, buku
									$set = true;
									$tab = 6;
								}
							}
						}
					} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['B'])) && strlen(preg_replace("/[^0-9]/", "", $row['B'])) > 8) {
						// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
						$luas = $harga_beli = $harga_baru = 0;
						$jumlah = 1;
						$asal = $kondisi = "";

						switch ($tab) {
							case 1:
							$luas = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$asal = $row['L'];
							$ctest++;
							break;
							case 2:
							$jumlah = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$ctest++;
							break;
							case 3:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$harga_baru = $this->ktt($row['K']);
							$kondisi = $row['L'];
							$ctest++;
							break;
							case 4:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$kondisi = $row['K'];
							$ctest++;
							break;
							case 5:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$harga_beli = $this->ktt($row['H']);
							$kondisi = $row['J'];
							$ctest++;
							break;
							case 6:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$harga_beli = $this->ktt($row['H']);
							$ctest++;
							break;
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
							'uraian' => $row['C'],
							'nup' => $row['D'],
							'merk' => $row['E'],
							// -------------------- //
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'luas' => $luas,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi
						));
						$carr++;

					}
					
					$num++;
				}
				// echo $ctest."<br>";
			}
			// echo $carr."<br>";
			// echo count($data)."<br>";
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_kalbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_kalbar']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/kalbar");
	}

	public function sarpras_sumbar() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sumbar']['name']) && in_array($_FILES['sarpras_sumbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sumbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sumbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sumbar");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sumbar']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677045;
			$ctest = 0;
			$carr = 0;

			foreach ($list_sheet as $shit) {
				$ctest = 0;
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while($num < $maxRow) {
					$row = $rows[$num];
					$nullcc = 0;
					if (!$set) {
						if (strpos(strtolower($row['G']), "lokasi") === 0) {
							// gedung dan bangunan
							$set = true;
							$tab = 1;
						} elseif (strpos(strtolower($row['G']), "tanggal") === 0) {
							// kendaraan
							$set = true;
							$tab = 2;
						} elseif (strpos(strtolower($row['G']), "nilai") === 0) {
							// jalan, jembatan dan jaringan
							$set = true;
							$tab = 3;
						}
					} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['C'])) && strlen(preg_replace("/[^0-9]/", "", $row['C'])) > 8) { //kode barang
						// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
						$luas = $harga_beli = $harga_baru = 0;
						$jumlah = 1;
						$uraian = $nup = $merk = $thn = $asal = $kondisi = "";

						switch ($tab) {
							case 1:
							$uraian = $row['D'];
							$nup = $row['E'];
							$harga_beli = $this->ktt($row['H']);
							$luas = $this->ktt($row['I']);
							$kondisi = $row['J'];
							$ctest++;
							break;
							case 2:
							$uraian = $row['D'];
							$merk = $row['E'];
							$harga_beli = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$kondisi = $row['H'];
							$ctest++;
							break;
							case 3:
							$nup = $row['D'];
							$uraian = $row['E'];
							$harga_beli = $this->ktt($row['G']);
								// $thn = $row['H'];
								// if (strlen($thn) > 4) {
								// 	preg_match("/[0-9]{4}\b/", $thn, $thnT);
								// 	$thn = $thnT[0];
								// }
							$ctest++;
							break;
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['C']),
							// -------------------- //
							'uraian' => $uraian,
							'nup' => $nup,
							'merk' => $merk,
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'luas' => $luas,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi
						));
						$carr++;

					}
					$num++;
				}
				// echo $ctest."<br>";
			}
			// echo $carr."<br>";
			// echo count($data)."<br>";
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$this->session->set_flashdata('sarpras_sumbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sumbar']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/sumbar");
	}

	public function rank() {

		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_FILES['rank']['tmp_name'][0] != "") {

			// hitung ada berapa file yg di upload bersamaan, buat cek doang
			// $count = count($_FILES['rank']['name']);

			// echo $count."<br>";
			// var_dump($_FILES);
			// print("<pre>".print_r($_FILES,true)."</pre>");
			$data = $data_span = array();
			$nf = 1; // tanda file aja, kalo file pertama eselon 1 brarti 1, satker 2, kegiatan 3

			foreach($_FILES[ 'rank' ][ 'tmp_name' ] as $index => $tmpName) {
				$f_name = $_FILES['rank']['name'][$index];
				// echo $f_name."<br>";
				if (strpos(strtolower($f_name), 'satker')) {
					$nf = 2;
				} elseif (strpos(strtolower($f_name), 'kegiatan')) {
					$nf = 3;
				}

				if(isset($_FILES['rank']['name'][$index]) && in_array($_FILES['rank']['type'][$index], $file_mimes)) {

					$arr_file = explode('.', $_FILES['rank']['name'][$index]);
					$extension = end($arr_file);

					if($extension != 'xlsx') {
						$this->session->set_flashdata('rank', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("uploads/v_rank");
					}

					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					$loadexcel = $reader->load($_FILES['rank']['tmp_name'][$index]);
					$shit = $loadexcel->getActiveSheet();
					$rows = $shit->toArray(null, true, true ,true);
					$newDate = date_format(new DateTime(),"Y-m-d");

					switch ($nf) {
						case 1:
							// file eselon 1
						foreach ($rows as $row) {
							preg_match('/\b[0-9]{5}\b/', $row['B'], $tmp);
								// echo count($tmp);
							if (count($tmp) > 0) {
								if ($tmp[0] != "01001") {
									preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
									array_push($data, array(
										'satker'    =>  $tmp[0],
										'nama'  =>  $txt[0],
										'pagu_peg' => $row['C'],
										'real_peg' => $row['D'],
										'pagu_bar' => $row['G'],
										'real_bar' => $row['H'],
										'pagu_mod' => $row['K'],
										'real_mod' => $row['L'],
										'created_at' => $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
						case 2:
							// file satker
						$pool = 0;
						$pagu_peg_a = $pagu_mod_a = $pagu_bar_a = $real_peg_a = $real_mod_a = $real_bar_a = $satker_a = $nama_a = 0;
						foreach ($rows as $row) {
							$add = $spanint = false;
							$nama = "";
							preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
								// echo count($tmp);
							if (count($tmp) > 0) {
								preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
								$nama = $txt[0];

								switch ($tmp[0]) {
									case 403200:
											// SETJEN
									$add = true;
									break;
									case 483005:
											// DKPP
									$add = true;
									break;
									case 448302:
											// IPDN
											// $add = true;
									$satker_a = $tmp[0];
									$nama_a = $txt[0];
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									$nama = "IPDN KAMPUS JATINANGOR";
									break;
									case 352593:
											// IPDN JAKARTA
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677010:
											// IPDN SULUT
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677024:
											// IPDN SULSEL
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677045:
											// IPDN SUMBAR
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683070:
											// IPDN KALBAR
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683084:
											// IPDN NTB
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683091:
											// IPDN PAPUA
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
								}

								if ($add) {
									array_push($data, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $nama,
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								} elseif ($pool == 8) {
									array_push($data, array(
										'satker'	=>  $satker_a,
										'nama'		=>  $nama_a,
										'pagu_peg'	=> $pagu_peg_a,
										'real_peg'	=> $real_peg_a,
										'pagu_bar'	=> $pagu_bar_a,
										'real_bar'	=> $real_bar_a,
										'pagu_mod'	=> $pagu_mod_a,
										'real_mod'	=> $real_mod_a,
										'created_at'	=> $newDate
									));
								} 

								if ($spanint) {
									array_push($data_span, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $nama,
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
						case 3:
							// file kegiatan (biro)
						$biro = array('1286', '1292', '1293', '1294');
						foreach ($rows as $row) {
							preg_match('/\b[0-9]{4}\b/', $row['B'], $tmp);
							if (count($tmp) > 0) {
								if (in_array($tmp[0], $biro)) {
									preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
									array_push($data_span, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $txt[0],
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
					}
				}
			}
			// print("<pre>".print_r($data,true)."</pre>");
			// $this->db->truncate('peringkat');
			// $this->db->insert_batch('peringkat', $data);  // PENTING
			// $this->ptt($data);exit;
			
			
			$this->uploads_model->upsert_batch($data, 'tbl_rank', $newDate);

			// exit;

			// $this->db->truncate('tbl_rank');
			// $this->db->insert_batch('tbl_rank', $data);

			// $this->db->truncate('tbl_spanint');
			// $this->db->insert_batch('tbl_spanint', $data_span);
			$this->uploads_model->upsert_batch($data_span, 'tbl_spanint', $newDate);
			// exit;
			// //upload success
			$this->session->set_flashdata('rank', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_rank");
		} else {
			// echo "kosong";
			$this->session->set_flashdata('rank', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_rank");
		}
	}

	public function uploadPagu()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pagu']['name']) && in_array($_FILES['pagu']['type'], $file_mimes)) {
			// var_dump($file_mimes);exit();

			$arr_file = explode('.', $_FILES['pagu']['name']);
			$extension = end($arr_file);
			// var_dump($extension);exit;

			if($extension != 'xlsx') {
				$this->session->set_flashdata('notifpagu', '<div class="alert alert-danger"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['pagu']['tmp_name']);
			// var_dump($reader->load($_FILES['pagu']['tmp_name']));exit;


			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);


			$dataunit = array();
			$dataoutput = array();
			$numrow = 1;
			$bag = '';
			$id_c = 0;
			$satker_jatinangor = 448302;
			$tgl = date('Y-m-d');


			$this->db->where('kode_satker', $satker_jatinangor);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_jatinangor);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 1){
					if ($row['A'] == 2){
						$cunit = 0;
						$coutput = 0;
						if (strpos($row['AI'], 'Perencanaan')) {
							$cbiro = 1;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Keuangan')) {
							$cbiro = 2;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Alumni')) {
							$cbiro = 3;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Hukum')) {
							$cbiro = 4;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}


					} elseif ($row['A'] == 3) {

					// if ($row['A'] == 3) {
						$cunit++;
						$unit = $id_b."<br>".(($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit).$row['AI']."<br>";
						$temp = explode(".", $row['AI']);
						$satker_biro = $temp[0];
						// var_dump($satker_biro);exit();

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						// echo $id_c;
						$ket = trim($row['AI']);
						$temp = explode(".", $ket);
						$satker_biro = $temp[0];
						$ket = substr($ket, 9);

						
						//echo "<br><br>";

						array_push($dataunit, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'ket'      => $ket,
							'tanggal' => $tgl
						));


					} elseif ($row['A'] ==5) {
						$coutput++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						array_push($dataoutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}
				}
				$numrow++;
			}
			// echo "<br>";
			// var_dump($data);

			// echo "</pre>";
			// exit();

			// $this->db->truncate('unit');
			$this->db->insert_batch('unit_sas', $dataunit);
			// $this->db->truncate('output');
			$this->db->insert_batch('output_sas', $dataoutput);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifpagu', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');

		}
	}

	public function uploadRealisasiSulsel()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sulsel']['name']) && in_array($_FILES['sulsel']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulsel']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sulsel', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulsel']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulsel = 677024;
			$tgl = date('Y-m-d');


			$this->db->where('kode_satker', $satker_sulsel);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sulsel);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 7){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;

						$unitsulsel = array();
						array_push($unitsulsel, array(
							'kode_satker'      => $satker_sulsel,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsulsel);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						

						$outputsulsel = array();
						array_push($outputsulsel, array(
							'kode_satker' => $satker_sulsel,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsulsel);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sulsel.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}


				}
				$numrow++;
			}
			// $this->db->truncate('unit');
			// $this->db->insert_batch('output', $dataoutput);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsulsel', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiKalbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['kalbar']['name']) && in_array($_FILES['kalbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['kalbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('kalbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['kalbar']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_kalbar = 683070;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_kalbar);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_kalbar);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 4){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					// echo "$ket<br>";
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;


						$unitkalbar = array();
						array_push($unitkalbar, array(
							'kode_satker'      => $satker_kalbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitkalbar);


					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					    // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						$outputkalbar = array();
						array_push($outputkalbar, array(
							'kode_satker' => $satker_kalbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputkalbar);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_kalbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifkalbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiNTB()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['ntb']['name']) && in_array($_FILES['ntb']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['ntb']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('ntb', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['ntb']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_ntb = 683084;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_ntb);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_ntb);
			$this->db->delete('output_sas');

			foreach($sheet as $row){
				if($numrow > 6){
					$ket1 = trim($row['AB']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);


						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitntb = array();
						array_push($unitntb, array(
							'kode_satker'      => $satker_ntb,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitntb);
					// $sql1 = "INSERT INTO unit_sas values (".$satker_ntb.",".$id_c.",".$satker_biro[0].",'".$ket."')";
					// echo "$sql1";
					// echo "<br>";
					// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['AB']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];

						$outputntb = array();
						array_push($outputntb, array(
							'kode_satker' => $satker_ntb,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AC']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AD']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputntb);
				 // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_ntb.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['AC']).",".preg_replace("/[^0-9]/", "", $row['AD']).",'".$ket1."') ";
				 // echo "$sql2";
				 // echo "<br>";
				 // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_ntb');
			// $this->db->insert_batch('realisasi_ntb', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifntb', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiPapua()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['papua']['name']) && in_array($_FILES['papua']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['papua']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('papua', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['papua']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_papua = 683091;
			$tgl = date('Y-m-d');


			$this->db->where('kode_satker', $satker_papua);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_papua);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 6){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitpapua = array();
						array_push($unitpapua, array(
							'kode_satker'      => $satker_papua,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitpapua);
						// $sql1 = "INSERT INTO unit_sas values (".$satker_papua.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputpapua = array();
						array_push($outputpapua, array(
							'kode_satker' => $satker_papua,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputpapua);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_papua.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_papua');
			// $this->db->insert_batch('realisasi_papua', $data);


			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifpapua', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSulut()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sulut']['name']) && in_array($_FILES['sulut']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulut']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sulut', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulut']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulut = 677010;
			$tgl = date('Y-m-d');

			
			$this->db->where('kode_satker', $satker_sulut);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sulut);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);


						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsulut = array();
						array_push($unitsulut, array(
							'kode_satker'  => $satker_sulut,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsulut);
					// $sql1 = "INSERT INTO unit_sas values (".$satker_sulut.",".$id_c.",".$satker_biro[0].",'".$ket."')";
					// echo "$sql1";
					// echo "<br>";
					// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsulut = array();
						array_push($outputsulut, array(
							'kode_satker' => $satker_sulut,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsulut);
				 // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sulut.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
				 // echo "$sql2";
				 // echo "<br>";
				 // $this->db->query($sql2);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sulut');
			// $this->db->insert_batch('realisasi_sulut', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsulut', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSumbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sumbar']['name']) && in_array($_FILES['sumbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sumbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sumbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sumbar']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sumbar = 677045;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_sumbar);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sumbar);
			$this->db->delete('output_sas');
			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsumbar = array();
						array_push($unitsumbar, array(
							'kode_satker'  => $satker_sumbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsumbar);

						// $sql1 = "INSERT INTO unit_sas values (".$satker_sumbar.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

						// echo $id_c;
					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsumbar = array();
						array_push($outputsumbar, array(
							'kode_satker' => $satker_sumbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsumbar);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sumbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sumbar');
			// $this->db->insert_batch('realisasi_sumbar', $data);

			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsumbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function praja()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


		if(isset($_FILES['praja']['name']) && in_array($_FILES['praja']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['praja']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');
				
				redirect("uploads/v_praja"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['praja']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$namasheet = $loadexcel->getSheetNames();

			$data = array();
			$unitpraja = array();
			$unitortu = array();
			$unitwali = array();
			$numrow = 1;
			$stat = 'aktif';
			// $date = STR_TO_DATE($row['AY'], '%d.%m.%y');

			$stop = false;
			$num = 1;
			$nullcc = 0;
			while(!$stop) {
				$row = $sheet[$num++];
				// var_dump($round(val)w);exit();
				if ($row['B'] == NULL) {
					$nullcc++;
					if ($nullcc == 4) {
						$stop = true;    
					}
				} elseif (strlen($row['C']) == 1){
					$nullcc = 0;
					$angkatan = 31;
					$kurangtahun = 2020 - $row['BA'];
					$hasil = 0;

					$bb = explode(".", $row['F']);
					$cc = $bb[0];

					if ($row['BA'] == 2020)  {
						$hasil = $angkatan;
					}elseif($row['BA'] < 2020 || $row['BA'] > 2020 ){
						$hasil= $angkatan-$kurangtahun;
					}


					
					array_push($unitpraja, array(
						'no_spcp'      => $row['A'],
						'nama'      => $row['B'],
						'jk'      => $row['C'],
						'nisn'      => $row['D'],
						'npwp'      => $row['E'],
						'npp'      => $row['F'],
						'nik_praja'      => $row['G'],
						'tmpt_lahir'      => $row['H'],
						'tgl_lahir'      =>  date("Y-m-d", strtotime($row['I'])),
						'agama'      => $row['J'],
						'alamat'      => $row['K'],
						'rt'      => $row['L'],
						'rw'      => $row['M'],
						'nama_dusun'      => $row['N'],
						'kelurahan'      => $row['O'],
						'kecamatan'      => $row['P'],
						'kode_pos'      =>$row['Q'],
						'kab_kota'      => $row['R'],
						'provinsi'      => $row['S'],
						'jenis_tinggal'      => $row['T'],
						'alat_transport'      => $row['U'],
						'tlp_rumah'      => $row['V'],
						'tlp_pribadi'      => $row['W'],
						'email'      => $row['X'],
						'kewarganegaraan'      => $row['AM'],
						'penerima_pks'      => $row['AN'],
						'no_pks'      => $row['AO'],
						'prodi'      => $row['AW'],
						'fakultas'      => $row['AX'],
						'jenis_pendaftaran'      =>  $row['AY'],
						'tgl_masuk_kuliah'      =>  date("Y-m-d", strtotime($row['AZ'])),
						'tahun_masuk_kuliah'      => $row['BA'],
						'pembiayaan'      => $row['BB'],
						'jalur_masuk'      => $row['BC'],
						'status' => $stat,
						'tingkat' => 2020-$row['BA']+1,
						'angkatan' => $cc
					));
					// var_dump( date("Y-m-d", strtotime($row['I'])));exit();
					// var_dump($row['BA']-date('Y')+1);exit();
					array_push($unitortu, array(
						'npp'      => $row['F'],
						'nama'      => $row['B'],
						'nik_ayah'      => $row['Y'],
						'nama_ayah'      => $row['Z'],
						'tgllahir_ayah'      => $row['AA'],
						'pendidikan_ayah'      => $row['AB'],
						'pekerjaan_ayah'      => $row['AC'],
						'penghasilan_ayah'      => $row['AD'],
						'tlp_ayah'      => $row['AE'],
						'nik_ibu'      => $row['AF'],
						'nama_ibu'      => $row['AG'],
						'tgllahir_ibu'      => $row['AH'],
						'pendidikan_ibu'      => $row['AI'],
						'pekerjaan_ibu'      => $row['AJ'],
						'penghasilan_ibu'      => $row['AK'],
						'tlp_ibu'      => $row['AL']

					));


					array_push($unitwali, array(
						'npp'      => $row['F'],
						'nama'      => $row['B'],
						'nik_wali'      => $row['AP'],
						'nama_wali'      => $row['AQ'],
						'tgllahir_wali'      => $row['AR'],
						'pendidikan_wali'      => $row['AS'],
						'pekerjaan_wali'      => $row['AT'],
						'penghasilan_wali'      => $row['AU'],
						'tlp_wali'      => $row['AV']

					));

				}

			}

			// var_dump($unitpraja);exit();
			// $this->db->truncate('praja');
			$this->db->insert_batch('praja', $unitpraja);
			// $this->db->truncate('orangtua');
			$this->db->insert_batch('orangtua', $unitortu);
			// $this->db->truncate('wali');
			$this->db->insert_batch('wali', $unitwali);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_praja');
		}
	}


	public function prajabaru()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES['prajabaru']['name']) && in_array($_FILES['prajabaru']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['prajabaru']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('prajabaru', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');
				
				redirect("uploads/v_praja"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['prajabaru']['tmp_name']);
			
			$namasheet = $loadexcel->getSheetNames();

			// var_dump($sheetData);
			// $i = 28;
			$unitpraja = array();
			$unitortu = array();
			$unitwali = array();
			$stat = 'aktif';

			foreach($namasheet as $shit){
				
				if (($shit == "Angkatan 28") || ($shit == "Angkatan 29") || ($shit == "Angkatan 30")) {
					$sheetData = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
					$numrow =  1;

					$bb = explode(" ", $shit);
					$cc = $bb[1];
					// echo "$cc";

					$stop = false;
					$num = 1;
					$nullcc = 0;
					while(!$stop) {
						$row = $sheetData[$num++];
						if ($row['C'] == NULL && $numrow > 7) {
							$nullcc++;
							if ($nullcc == 3) {
								$stop = true;    
							}
						} else {
							
							$nullcc = 0;
							$angka = 'XXX';
							$jadi =1;
							if($numrow > 7){
								if ($row['AC'] != "") {
									$angka = $row['AC'];

								}
								$angka = $this->rti($angka);
								$jadi = date('y') +12 - $angka;
							// echo "$jadi";
								array_push($unitpraja, array(
									'nama'      => $row['C'],
									'tmpt_lahir'      => $row['D'],
									'tgl_lahir'      => date("Y-m-d", strtotime($row['E'])),
									'jk'      => $row['F'],
									'provinsi'      => $row['H'],
									'kab_kota'      => $row['J'],
									'agama'      => $row['K'],		
									'nik_praja'      => $row['N'],
									'alamat'      => $row['S'],
									'kelurahan'      => $row['T'],
									'kecamatan'      => $row['U'],
									'tingkat' => $jadi,
									'angkatan' => $cc,
									'status'=>$stat

								));

								array_push($unitortu, array(
									'nik_praja'      => $row['N'],
									'nama'      => $row['C'],
									'nama_ayah'      => $row['O'],
									'pekerjaan_ayah'      => $row['P'],
									'nama_ibu'      => $row['Q'],
									'pekerjaan_ibu'      => $row['R']

								));

								array_push($unitwali, array(
									'nik_praja'      => $row['N'],
									'nama'      => $row['C'],
								));

							}
							$numrow++;
						}
					}
				}

			}

			// print("<pre>".print_r($unitwali,true)."</pre>");
			// exit();
			$this->db->insert_batch('praja', $unitpraja);
			$this->db->insert_batch('orangtua', $unitortu);
			$this->db->insert_batch('wali', $unitwali);
					//upload success
			$this->session->set_flashdata('prajabaru', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_praja');

		}
	}

	

	public function thl()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['thl']['name']) && in_array($_FILES['thl']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['thl']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('thl','<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>'); 
				redirect('uploads/v_thl'); 
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['thl']['tmp_name']);
			$excel = $loadexcel->getActiveSheet();
			$rowCount = $excel->getHighestDataRow();
			$saveData   = array();
			for ($i=7; $i<=$rowCount; $i++){
				$nama = $excel->getCellByColumnAndRow(2, $i)->getValue();
				$ttl = $excel->getCellByColumnAndRow(3, $i)->getValue();
				$ttl2 = explode(',', $ttl);
				$tempat_lahir = $ttl2[0];
				$tanggal_lahir = date_create($ttl2[1]);
				$tanggal_lahir = date_format($tanggal_lahir, "Y-m-d");
				$dik =  $excel->getCellByColumnAndRow(4, $i)->getValue();
				$penugasan =  $excel->getCellByColumnAndRow(5, $i)->getValue();
				$satker =  $excel->getCellByColumnAndRow(6, $i)->getValue();
				$data = array(
					'nama' => $nama,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'dik' => $dik,
					'penugasan' => $penugasan,
					'nama_satker' => $satker
				);
				array_push($saveData, $data);
			}
			$this->db->insert_batch('tbl_thl', $saveData);
			$this->session->set_flashdata('thl',"<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"); 
			redirect('uploads/v_thl'); 
		}
	}


	public function pns() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pns']['name']) && in_array($_FILES['pns']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pns']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('pns', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_pns"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['pns']['tmp_name']);

			$shit = $loadexcel->getActiveSheet();

			$data = $pelatihan = array();
			$rows = $shit->toArray(null, true, true ,true);
			$stop = false;
			$pegawai = 1; // jumlah pegawai per bagian
			$det_peg = 0; // tanda buat ambil detail pegawai
			$bagian = "";
			$no = $cc = $newDate = 0;

			// create variable global
			$nip = $nama_lengkap = $bagian = $tempat_lahir = $tanggal_lahir = $no_urut_pangkat = $pangkat = $gol_ruang = $tmt_pangkat = $jabatan = $tmt_jabatan = $jurusan = $nama_pt = $tahun_lulus = $tingkat_pendidikan = $usia = $masa_kerja = $catatan_mutasi = $no_kapreg = $eselon = $nama_pelatihan = $tanggal_pelatihan = $jumlah_jam = "";

			foreach ($rows as $row) {
				$cc++;

				if ($cc < 5) {
					// ngambil tanggal dari file
					if (strpos(strtolower($row['A']), 'keadaan') === 0) {
						$tgl = explode(": ", $row['A']);
						$tgl_last = count($tgl)-1;
						$tgl = $this->ite($tgl[$tgl_last]);
						$newDate = date("Y-m-d", strtotime($tgl));
					}
				} elseif (strlen($row['A']) > 6 && $cc > 5) {
					// ketemu bagian
					$bagian = $row['A'];
					$pegawai = 0;

				} elseif ($bagian != "") {
					// nemu pegawai baru
					if (is_numeric($row['A'])) {
						$det_peg = 0;
						$pegawai++;
						$no++;
					}
					$det_peg++;
					switch ($det_peg) {
						case 1:
							// baris pertama
						$nama_lengkap = $row['B'];
						$no_urut_pangkat = $row['C'];
							// $pangkat_t = preg_split('/\(([^"]+)\)/', $row['D']);
						$pangkat_t = preg_split('/( \(|\))/', $row['D']);
						$pangkat = trim($pangkat_t[0]);
							# preg_match('/\(([^"]+)\)/', $row['D'], $gol_t);
						$gol_ruang = trim($pangkat_t[1]);
						$jabatan = $row['E'];
						$tmt_jabatan = date("Y-m-d", strtotime($row['F']));
						$jurusan = $row['L'];
						$nama_pt = $row['M'];
						$tahun_lulus = $row['N'];
						$tingkat_pendidikan = $row['O'];
						$usia = $row['P'];
						$catatan_mutasi = $row['Q'];
						$no_kapreg = preg_replace('/[ ,.]/', "", $row['R']);

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
						}

						break;
						case 2:
							// baris kedua
						$nip = str_replace(" ", "", $row['B']);
						$tmt_pangkat = date("Y-m-d", strtotime($row['D']));

						if ($row['E'] != NULL) {
							preg_match('/\(([^"]+)\)/', $row['E'], $es_t);
							$eselon = $es_t[1];
						}

						$masa_kerja = $row['P'];

						if ($nama_pelatihan != "") {
							array_push($pelatihan, array(
								'nip' => $nip,
								'nama_pelatihan' => $nama_pelatihan,
								'tanggal_pelatihan' => $tanggal_pelatihan,
								'jumlah_jam'=> $jumlah_jam
							));
						}

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
							array_push($pelatihan, array(
								'nip' => $nip,
								'nama_pelatihan' => $nama_pelatihan,
								'tanggal_pelatihan' => $tanggal_pelatihan,
								'jumlah_jam'=> $jumlah_jam
							));
						}							

						break;
						case 3:
							// baris ketiga
						$ttl = explode(",", $row['B']);
						switch (count($ttl)) {
							case 1:
							$tempat_lahir = "";
							$tanggal_lahir = date("Y-m-d", strtotime($row['B']));
							break;
							case 2:
							$tempat_lahir = strtoupper(trim($ttl[0]));
							$tgl_t = explode("/", trim($ttl[1]));
							$tanggal_lahir = date("Y-m-d", strtotime("$tgl_t[1]/$tgl_t[0]/$tgl_t[2]"));
							break;
							case 3:
							$tempat_lahir = strtoupper(trim($ttl[0]).", ".trim($ttl[1]));
							$tgl_t = explode("/", trim($ttl[2]));
							$tanggal_lahir = date("Y-m-d", strtotime("$tgl_t[1]/$tgl_t[0]/$tgl_t[2]"));
							break;
						}

						array_push($data, array(
							'nip' => $nip,
							'nama_lengkap' => $nama_lengkap,
							'bagian' => $bagian,
							'tempat_lahir' => $tempat_lahir,
							'tanggal_lahir' => $tanggal_lahir,
							'no_urut_pangkat' => $no_urut_pangkat,
							'pangkat' => $pangkat,
							'gol_ruang' => $gol_ruang,
							'tmt_pangkat' => $tmt_pangkat,
							'jabatan' => $jabatan,
							'tmt_jabatan' => $tmt_jabatan,
							'jurusan' => $jurusan,
							'nama_pt' => $nama_pt,
							'tahun_lulus' => $tahun_lulus,
							'tingkat_pendidikan' => $tingkat_pendidikan,
							'usia' => $usia,
							'masa_kerja' => $masa_kerja,
							'catatan_mutasi' => $catatan_mutasi,
							'no_kapreg' => $no_kapreg,
							'eselon' => $eselon
						));

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
							array_push($pelatihan, array(
								'nip'				=> $nip,
								'nama_pelatihan'	=> $nama_pelatihan,
								'tanggal_pelatihan'	=> $tanggal_pelatihan,
								'jumlah_jam'		=> $jumlah_jam
							));
						}

							// set variable
						$nip = $nama_lengkap = $tempat_lahir = $tanggal_lahir = $no_urut_pangkat = $pangkat = $gol_ruang = $tmt_pangkat = $jabatan = $tmt_jabatan = $jurusan = $nama_pt = $tahun_lulus = $tingkat_pendidikan = $usia = $masa_kerja = $catatan_mutasi = $no_kapreg = $eselon = $nama_pelatihan = $tanggal_pelatihan = $jumlah_jam = "";

						break;
					}				
				}
			}

			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		}

		//upload success
		$this->db->insert_batch('tbl_pns', $data);
		$this->db->insert_batch('tbl_pelatihan', $pelatihan);
		$this->session->set_flashdata('pns', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['pns']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_pns");

	}

	public function pns2()
	{       
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pns']['name']) && in_array($_FILES['pns']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pns']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('pns','<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>'); 
				redirect('uploads/v_pns'); 
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['pns']['tmp_name']);

			$excel = $loadexcel->getActiveSheet();
			$rowCount = $excel->getHighestDataRow();
			$saveData  = array();
			$savedDataTrain = array();
			$lineLimitNo = array();
			for ($i=9; $i <=$rowCount; $i++) { 
				$cellA = $excel->getCellByColumnAndRow(1, $i);
				$limitA = $i+2;
				if($cellA->isInMergeRange() || $cellA->isMergeRangeValueCell()) {
					if($cellA->getMergeRange() == "A$i:A$limitA") {
						$colNo = $cellA->getMergeRange();
						$limitNo = explode("A", $colNo);
						$limitNo = $limitNo[1];
						$limitNo = explode(":", $limitNo);
						$limitNo = $limitNo[0];
						array_push($lineLimitNo, $limitNo);
					}
				}
			}
			$keepBagian = array();
			foreach ($lineLimitNo as $col) {
				$lineBagian = $col - 1;
				$rowBagian = $excel->getCellByColumnAndRow(1, $lineBagian);
				if($rowBagian->getMergeRange() != "A$lineBagian:R$lineBagian") {
					$bagian = array_pop($keepBagian);
				}
				else {
					$bagian = $excel->getCellByColumnAndRow(1, $lineBagian)->getValue();
				}            
				$no = $excel->getCellByColumnAndRow(1, $col)->getValue();
				$nip = $excel->getCellByColumnAndRow(2, $col+1)->getValue();
				$nip = str_replace(' ', '', $nip);
				$nama_lengkap = $excel->getCellByColumnAndRow(2, $col)->getValue();
				$ttl = $excel->getCellByColumnAndRow(2, $col+2)->getValue();
				$ttl = explode(', ', $ttl);
				$tempat_lahir = $ttl[0];
				$tanggal_lahir = explode('/', $ttl[1]);
				$tanggal_lahir = date_create("$tanggal_lahir[1]/$tanggal_lahir[0]/$tanggal_lahir[2]");
				$tanggal_lahir = date_format($tanggal_lahir, "Y-m-d");
				$no_urut_pangkat = $excel->getCellByColumnAndRow(3, $col)->getValue();
				$pangkat_gol = $excel->getCellByColumnAndRow(4, $col)->getValue();
				$pangkat_gol = explode("(", $pangkat_gol);
				$pangkat = $pangkat_gol[0];
				$gol_ruang = trim($pangkat_gol[1], ")");
				$tmt_pangkat = $excel->getCellByColumnAndRow(4, $col+1)->getValue();
				$tmt_pangkat = Date::excelToDateTimeObject($tmt_pangkat)->format('Y-m-d');
				$jabatan = $excel->getCellByColumnAndRow(5, $col)->getValue();
				$eselon = $excel->getCellByColumnAndRow(5, $col+1)->getValue();
				$tmt_jabatan = $excel->getCellByColumnAndRow(6, $col)->getValue();
				$tmt_jabatan = Date::excelToDateTimeObject($tmt_jabatan)->format('Y-m-d');
				$jurusan = $excel->getCellByColumnAndRow(12, $col)->getValue();
				$nama_pt = $excel->getCellByColumnAndRow(13, $col)->getValue();
				$tahun_lulus = $excel->getCellByColumnAndRow(14, $col)->getValue();
				$tingkat_pendidikan = $excel->getCellByColumnAndRow(15, $col)->getValue();
				$usia = $excel->getCellByColumnAndRow(16, $col)->getValue();
				$masa_kerja = $excel->getCellByColumnAndRow(16, $col+1)->getValue();
				$catatan_mutasi = $excel->getCellByColumnAndRow(17, $col)->getValue();
				$no_kapreg = $excel->getCellByColumnAndRow(18, $col)->getValue();

				for($j=0; $j<3;$j++){
					$col2 = $col+2;
					$nama_pelatihan = $excel->getCellByColumnAndRow(8, $col+$j)->getValue();
					$cellBln = $excel->getCellByColumnAndRow(9, $col+$j);

					if($cellBln->isInMergeRange() && $cellBln->getMergeRange() == "I$col:I$col2" && $nama_pelatihan != null) {
						$bln_pelatihan = $excel->getCellByColumnAndRow(9, $col)->getValue();
					}
					else {
						$bln_pelatihan = $excel->getCellByColumnAndRow(9, $col+$j)->getValue();
					}

					$cellThn = $excel->getCellByColumnAndRow(10, $col+$j);
					if($cellThn->isInMergeRange() && $cellThn->getMergeRange() == "J$col:J$col2" && $nama_pelatihan != null) {
						$thn_pelatihan = $excel->getCellByColumnAndRow(10, $col)->getValue();
					}
					else {
						$thn_pelatihan = $excel->getCellByColumnAndRow(10, $col+$j)->getValue();
					}

					$cellJam = $excel->getCellByColumnAndRow(11, $col+$j);
					if($cellJam->isInMergeRange() && $cellJam->getMergeRange() == "K$col:K$col2" && $nama_pelatihan != null) {
						$jumlah_jam = $excel->getCellByColumnAndRow(11, $col)->getValue();
					}
					else {
						$jumlah_jam = $excel->getCellByColumnAndRow(11, $col+$j)->getValue();
					}

					if($bln_pelatihan == '') {
						$bln_pelatihan = 0;
					}

					if($thn_pelatihan == '') {
						$thn_pelatihan = 0;
					}
					$tanggal_pelatihan = "$bln_pelatihan-$thn_pelatihan";

					$dataTrain = array(
						'nip' => $nip,
						'nama_pelatihan' => $nama_pelatihan,
						'tanggal_pelatihan' => $tanggal_pelatihan,
						'jumlah_jam'=> $jumlah_jam
					);
					array_push($savedDataTrain, $dataTrain);
				}
				array_push($keepBagian, $bagian);

				$data = array(
					'no' => $no,
					'nip' => $nip,
					'nama_lengkap' => $nama_lengkap,
					'bagian' => $bagian,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'no_urut_pangkat' => $no_urut_pangkat,
					'pangkat' => $pangkat,
					'gol_ruang' => $gol_ruang,
					'tmt_pangkat' => $tmt_pangkat,
					'jabatan' => $jabatan,
					'tmt_jabatan' => $tmt_jabatan,
					'jurusan' => $jurusan,
					'nama_pt' => $nama_pt,
					'tahun_lulus' => $tahun_lulus,
					'tingkat_pendidikan' => $tingkat_pendidikan,
					'usia' => $usia,
					'masa_kerja' => $masa_kerja,
					'catatan_mutasi' => $catatan_mutasi,
					'no_kapreg' => $no_kapreg,
					'eselon' => $eselon
				);
				array_push($saveData, $data);
			}
            // print("<pre>".print_r($saveData,true)."</pre>");exit();

			$this->db->insert_batch('tbl_pns', $saveData);
			$this->db->insert_batch('tbl_pelatihan', $savedDataTrain); 

			$this->session->set_flashdata('pns',"<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"); 
			redirect('uploads/v_pns'); 
		}
	}


	public function uploadJatinangor()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['nangor']['name']) && in_array($_FILES['nangor']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['nangor']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('nangor', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['nangor']['tmp_name']);

			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);			
			$dataoutput = array();
			$datasuboutput = array();
			$datakomponen = array();
			$datasubkomponen = array();
			$dataakun = array();
			$numrow = 1;
			$bag = '';
			$id_c = 0;
			$id_d = 0;
			$id_e = 0;
			$satker_jatinangor = 448302;
			$tgl = date('Y-m-d');

			foreach($sheet as $row){
				if($numrow > 1){
					if ($row['A'] == 2){
						$coutput = 0;
						$csuboutput = 0;
						$ckomponen =0;
						$csubkomponen =0;
						$cakun =0;
						$csubunit =0;
						if (strpos($row['AI'], 'Perencanaan')) {
							$cbiro = 1;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Keuangan')) {
							$cbiro = 2;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Alumni')) {
							$cbiro = 3;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Hukum')) {
							$cbiro = 4;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;

							// echo "ID BIRO : ".$id_b." <br>";
						}
					} elseif ($row['A'] == 3) {
						$coutput++;
						$output = (($coutput<10)?$cbiro."0".$coutput:$cbiro.$coutput).$row['AI']."<br>";
						// echo("$output");
						$temp = explode(".", $row['AI']);
						$satker_biro = $temp[0];

						// $id_c = ($cunit<10)?$cbiro."0".$coutput:$cbiro.$coutput;
						$id_c = ($coutput<20)?"out.".$cbiro."0".$coutput:$cbiro.$coutput;
						// echo "$id_c ";
						$ket = trim($row['AI']);
						$temp = explode(".", $ket);
						$satker_biro = $temp[0];
						// echo "$satker_biro";
						$ket = substr($ket, 9);
						// echo "$ket";
						// echo "<br><br>";

						array_push($dataoutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'ket'      => $ket,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 4) {
						$csuboutput++;   
						$id_d = ($csuboutput<20)?"subout.".$cbiro."0".$csuboutput:$csuboutput.$cbiro;      
						// echo "$id_d ";               
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						// echo "$ket1<br>";
						array_push($datasuboutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'		=> $id_d,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// echo("<br>");
					}  elseif ($row['A'] == 5) {
						$ckomponen++;  
						$id_e = ($ckomponen<1000)?"komp.".$cbiro."0".$ckomponen:$ckomponen.$cbiro;   
						// echo "$id_e ";                    
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						// echo "$ket1 <br>"; 
						array_push($datakomponen, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 6) {
						$csubkomponen++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 2);
						$id_f = ($csubkomponen<1000)?"subkomp.".$cbiro."0".$csubkomponen:$csubkomponen.$cbiro;   
						// echo "idf = $id_f ";
						// echo "$ket1 <br>";
						array_push($datasubkomponen, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							'id_f'		=> $id_f,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 7) {
						$cakun++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 33);

						$id_g = ($cakun<1000)?"akun.".$cbiro."0".$cakun:$cakun.$cbiro;   
						// echo "$id_g ";
						// echo "$ket1 <br>";

						array_push($dataakun, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							'id_f'		=> $id_f,
							'id_g'		=> $id_g,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}
				}
				$numrow++;
			}
			// echo "<br>";
			// var_dump($data);

			// echo "</pre>";
			// exit();

			$this->db->truncate('outputnya_sas');
			$this->db->insert_batch('outputnya_sas', $dataoutput);
			$this->db->truncate('suboutput_sas');
			$this->db->insert_batch('suboutput_sas', $datasuboutput);

			$this->db->truncate('komponen_sas');
			$this->db->insert_batch('komponen_sas', $datakomponen);
			$this->db->truncate('subkomponen_sas');
			$this->db->insert_batch('subkomponen_sas', $datasubkomponen);
			$this->db->truncate('akun_sas');
			$this->db->insert_batch('akun_sas', $dataakun);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('nangor', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');

		}
	}

	function dosen()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['dosen']['name']) && in_array($_FILES['dosen']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['dosen']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('dosen', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/dosen"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['dosen']['tmp_name']);

			$list_sheet = $spreadsheet->getSheetNames();

			$sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);
			$data = array();
			$datex = new DateTime();
			$date = $datex->format('Y-m-d');

			foreach($sheetData as $row){
				if($row['A'] >= 1){

					array_push($data, array(
						'nama'      => $row['B'],
						'nip'      => $row['C'],
						'nidn'      => $row['D'],
						'serdos'      => $row['E'],
						'bidang_ilmu'      => $row['F'],
						'nik'   => $row['G'],
						'alamat'   => $row['H'],
						'jabatan'   => $row['I'],
						'pangkat'   => $row['J'],
						'created_date' => $date,
					));

					// echo "NO: $row[A]<br>";
					// echo "NAMA: $row[B]<br>";
					// echo "NIP: $row[C]<br>";
					// echo "NIDN: $row[D]<br>";
					// echo "SERTIFIKASI DOSEN: $row[E]<br>";
					// echo "BIDANG ILMU: $row[F]<br>";
					// echo "NIK: $row[G]<br>";
					// echo "ALAMAT: $row[H]<br>";
					// echo "JABATAN: $row[I]<br>";
					// echo "PANGKAT: $row[J]<br>";
				}	
			}
			$this->db->truncate('tbl_dosen');
			$this->db->insert_batch('tbl_dosen', $data);

			$this->session->set_flashdata('dosen', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_dosen");
		}else {
			$this->session->set_flashdata('dosen', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_dosen");
		}

	}

	public function alumni()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['alumni']['name']) && in_array($_FILES['alumni']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['alumni']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('alumni', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_alumni"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['alumni']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$upalumni = array();
			$numrow = 1;
			$tgl = date('Y-m-d');

			foreach($sheet as $row){
				if($numrow > 1){
					
					// $regex = "/[-\d]+([ \d]|[ '\w])+[- \d]+$/";
					// $tgl =  $row['H'];
					// if ($row['H'] != NULL) {
					// 	preg_match($regex, trim($row['H']),$haha);
					// 	if (count($haha) > 1) {
					// 		$tgl = $haha['0'];
					// 		// echo "$tgl<br>";
					// 		$tgl = str_replace("'"," ","$tgl");
					// 	}
					// }else{
					// 	$tgl =  $row['H'];
					// }

					// $temp = explode(",", $row['H']);
					// $tgl_last = count($temp)-1;
					// $caca = "/[ ,-]+$/";
					// // echo "$tgl_last ..... $row[H]<br>";
					// $kosong = " ";
					// $yukbisa = preg_replace($regex,'' , $row['H']);
					// $yukbisa = preg_replace($caca,'' , $yukbisa);
					// echo "$yukbisa<br>";

					// array_push($upalumni, array(
					// 	'nama'      => $row['D'],
					// 	'jk'      => $row['E'],
					// 	'npp'      => $row['F'],
					// 	'nip'      => $row['G'],
					// 	'tempat_lahir' => $yukbisa,
					// 	'tanggal_lahir' => $tgl,
					// 	'asdaf' => $row['I'],
					// 	'agama' => $row['K'],
					// 	'instansi' => $row['L'],
					// 	'jabatan' =>$row['M']
					// ));

					array_push($upalumni, array(
						'nip'      => $row['C'],
						'nama'      => $row['D'],
						'jk'      => $row['E'],
						'npp'      => $row['F'],
						'nip'      => $row['G'],
						'tempat_lahir' => $yukbisa,
						'tanggal_lahir' => $tgl,
						'asdaf' => $row['I'],
						'agama' => $row['K'],
						'instansi' => $row['L'],
						'jabatan' =>$row['M']
					));
						// exit;


				}
				$numrow++;
			}
			$this->db->insert_batch('alumni', $upalumni);
			// print("<pre>".print_r($upalumni,true)."</pre>");
			// exit();

			//upload success
			$this->session->set_flashdata('alumni', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_alumni');
		}
	}

	function rti($s) {
		$romans = array(
			'M' => 1000,
			'CM' => 900,
			'D' => 500,
			'CD' => 400,
			'C' => 100,
			'XC' => 90,
			'L' => 50,
			'XL' => 40,
			'X' => 10,
			'IX' => 9,
			'V' => 5,
			'IV' => 4,
			'I' => 1,
		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($romans as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function ite($s) {
		$months = array(
			'Jan' => "Januari",
			'Feb' => "Februari",
			'Mar' => "Maret",
			'Apr' => "April",
			'May' => "Mei",
			'Jun' => "Juni",
			'Jul' => "Juli",
			'Aug' => "Agustus",
			'Sep' => "September",
			'Oct' => "Oktober",
			'Nov' => "November",
			'Dec' => "Desember"
		);

		$result = "";

		$bi = explode(" ", $s);
		// echo "file: ".$s."<br>";
		foreach ($months as $en => $in) {
			if (strpos(strtoupper($in), strtoupper($bi[1])) === 0) {
				$result = str_replace($bi[1],$en,$s);
			}
		}
		return strtoupper($result);
	}

	function ktt($s) {
		if ($s == "" || !is_numeric(preg_replace('/[A-Za-z,. ]/', "", $s))) {
			return 0;
		}
		$temp = preg_replace("/[^0-9,.]/", "", $s);
		$res = $temp;
		$temp = explode(",", $temp);
		$temp_last = count($temp)-1;
		if ((strlen($temp[$temp_last]) < 3) && count($temp) > 1) {
			// berarti koma
			$res = substr_replace($s, ".", -3, 1);
		}
		return str_replace(",", "", $res);
	}

	function ptt($data) {
		$html = "<table border='1'>";
		$html .= '<tr>';
		$html .= '<th>No.</th>';
		foreach($data[0] as $key=>$value){
			$html .= '<th>' . htmlspecialchars($key) . '</th>';
		}
		$html .= '</tr>';

		// data rows
		$cc = 1;
		foreach( $data as $key=>$value){
			$html .= '<tr>';
			$html .= '<td>' . $cc++ . '</td>';
			foreach($value as $key2=>$value2){
				$html .= '<td>' . htmlspecialchars($value2) . '</td>';
			}
			$html .= '</tr>';
		}

		// finish table and return it

		$html .= '</table>';
		echo $html;
	}
}
