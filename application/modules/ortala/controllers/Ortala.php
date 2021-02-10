<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Ortala extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('ortala_model');
		$this->load->helper('url');
    }

    public function uu() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_uu');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	
	public function get_uu() {
		$data = $this->ortala_model->get_ortala(1)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}

    public function add_prokum() {
		$url = $this->input->post('url', true);
		$data['nama_kat'] = $this->input->post('nama_kat', true);
		$data['tanggal'] = $this->input->post('tanggal', true);
		$data['id_kat'] = $this->input->post('id_kat', true);
		$data['nomor'] = $this->input->post('nomor', true);
		$data['tahun'] = $this->input->post('tahun', true);
		$data['tentang'] = $this->input->post('tentang', true);
		$data['status'] = $this->input->post('status', true);
		$data['link'] = $this->input->post('link', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/prokum_files';
			$config['allowed_types'] = 'pdf';
			//$config['max_size'] = 2048; //KB
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('prokum', ['danger', $error]);
				redirect("ortala/$url"); 
			}
			else {
				$data['nama_file'] = $this->upload->data('file_name');
			}
		}
			
		$result = $this->ortala_model->add_prokum($data);

		if ($result) { 				
			$this->session->set_flashdata('prokum', ['success', 'Data Produk Hukum berhasil disimpan']);
			redirect("ortala/$url"); 			
		} 
		else { 								
			$this->session->set_flashdata('prokum', ['danger', 'Data Produk Hukum gagal disimpan']); 
			redirect("ortala/$url"); 	
		}
    }
    
    public function del_prokum() {
		$id_prokum = $this->input->post('del_id_prokum');
		$url = $this->input->post('url', true);
		$prokum = $this->ortala_model->getById($id_prokum);
		$file = "./assets/prokum_files/$prokum->nama_file";
		if(is_file($file)) {
			unlink($file);
		}

		$hasil = $this->ortala_model->del_prokum($id_prokum);

		if ($hasil) { 								
			$this->session->set_flashdata('prokum', ['success', 'Data Produk Hukum berhasil dihapus']);			
			redirect("ortala/$url");		
		} else { 								
			$this->session->set_flashdata('prokum', ['danger', 'Data Produk Hukum gagal dihapus']);	
			redirect("ortala/$url");
		}
    }
    
    public function edit_prokum() {
		$url = $this->input->post('url', true);
		$id_prokum = $this->input->post('id_prokum', true);
		$editprokum['tentang'] = $this->input->post('tentang', true);
		$editprokum['tanggal'] = $this->input->post('tanggal', true);
		$editprokum['tahun'] = $this->input->post('tahun', true);
		$editprokum['nomor'] = $this->input->post('nomor', true);
		$editprokum['link'] = $this->input->post('link', true);
		$editprokum['status'] = $this->input->post('status', true);

		if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] = './assets/prokum_files';
			$config['allowed_types'] = 'pdf';
			//$config['max_size'] = 2048; //KB
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = strip_tags($this->upload->display_errors());
				$this->session->set_flashdata('prokum', ['danger', $error]);
				redirect("ortala/$url"); 
			}
			else {
				$pdf = $this->ortala_model->getById($id_prokum);
				$file = "./assets/prokum_files/$pdf->nama_file";
				if(is_file($file)) {
					unlink($file);
				}
				$editprokum['nama_file'] = $this->upload->data('file_name');
			}
		}

		$result = $this->ortala_model->edit_prokum($id_prokum, $editprokum);

		if ($result) { 		
			$this->session->set_flashdata('prokum', ['success', 'Data Produk Hukum berhasil diubah']);	
			redirect("ortala/$url");
		} else {
			$this->session->set_flashdata('prokum', ['danger', 'Data Produk Hukum gagal diubah']);			
			redirect("ortala/$url");
		}
	}

	public function keputusan_rektor() {
        if($this->session->userdata('nip') != NULL) {       
			$open_ka =  $this->ortala_model->get_status_count(5, "Open");
			$done_ka =  $this->ortala_model->get_status_count(5, "Done");

			$x["open_ka"] = $open_ka;
			$x["done_ka"] = $done_ka;
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('view_kr', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}

	public function get_ka() {
		$data = $this->ortala_model->get_ortala(5)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			$link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}

			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}
		echo json_encode($uu);
	}

	public function pp() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_pp');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_pp() {
		$data = $this->ortala_model->get_ortala(2)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}
	
	public function permen() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_permen');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_permen() {
		$data = $this->ortala_model->get_ortala(3)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}
	public function pr() {
        if($this->session->userdata('nip') != NULL) {       
			$open_pr =  $this->ortala_model->get_status_count(4, "Open");
			$done_pr =  $this->ortala_model->get_status_count(4, "Done");

			$x["open_pr"] = $open_pr;
			$x["done_pr"] = $done_pr;
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('view_pr', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_pr() {
		$data = $this->ortala_model->get_ortala(4)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}
	public function km() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_km');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_km() {
		$data = $this->ortala_model->get_ortala(6)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
			$opsi = "<a 
				href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
				data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
				data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
				data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "Tidak ada Akses";
		   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}

	public function ser() {
        if($this->session->userdata('nip') != NULL) {       
			$open_ser =  $this->ortala_model->get_status_count(10, "Open");
			$done_ser =  $this->ortala_model->get_status_count(10, "Done");

			$x["open_ser"] = $open_ser;
			$x["done_ser"] = $done_ser;
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('view_ser', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}

	public function get_ser() {
		$data = $this->ortala_model->get_ortala(10)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			$link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}

			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
				$opsi = "<a 
					href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
					data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
					data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
					</a>
	
					<a 
					href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
					data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
					</a>";
				}else{
					$opsi = "Tidak ada Akses";
			   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}
		echo json_encode($uu);
	}
	public function kepres() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_kepres');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_kepres() {
		$data = $this->ortala_model->get_ortala(7)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
			$opsi = "<a 
				href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
				data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
				data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
				data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "Tidak ada Akses";
		   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}
	public function perpres() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_perpres');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_perpres() {
		$data = $this->ortala_model->get_ortala(9)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
			$opsi = "<a 
				href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
				data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
				data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
				data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "Tidak ada Akses";
		   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}

	public function sem() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_sem');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_sem() {
		$data = $this->ortala_model->get_ortala(11)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
			$opsi = "<a 
				href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
				data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
				data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
				data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "Tidak ada Akses";
		   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}
	public function im() {
        if($this->session->userdata('nip') != NULL) {       
            $this->load->view("include/head");
            $this->load->view("include/top-header");
			$this->load->view('view_im');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        } else {
             redirect("user");
        }
	}
	public function get_im() {
		$data = $this->ortala_model->get_ortala(8)->result();
		$uu = array();
		$no = 1;
		foreach($data as $d) {
			$kategori = $d->nama_kat;
			$nomor = $d->nomor;
			$tanggal = $d->tanggal;
			$tahun = $d->tahun;
			$tentang = $d->tentang;
			// $link = '<a href="'.prep_url($d->link).'" target="blank">'.$d->link.'</a>';
			$status = $d->status;
			$file = "./assets/prokum_files/$d->nama_file";
			if(is_file($file)) {
				$pdf = '<a href="'.base_url().$file.'" target="blank"><i class="far fa-file-pdf fa-2x text-danger"></i></a>';
			}
			else {
				$pdf ='Tidak ada file';
			}
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'ortala'){
			$opsi = "<a 
				href='javascript:;' data-prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang' data-file='$d->nama_file'
				data-link='$d->link' data-status='$d->status' data-tanggal='$d->tanggal'
				data-toggle='modal' data-target='#editprokum' class='btn btn-sm btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_prokum='$d->id_prokum' data-nomor='$d->nomor'  data-tahun='$d->tahun' data-tentang='$d->tentang'
				data-toggle='modal' data-target='#delprokum' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "Tidak ada Akses";
		   }
		
			$uu[] = array(
				$no++,
				$kategori,
				$nomor,
				$tanggal,
				$tahun,
				$tentang,
				// $link,
				$status,
				$pdf,
				$opsi
			);
		}

		echo json_encode($uu);
	}


}
