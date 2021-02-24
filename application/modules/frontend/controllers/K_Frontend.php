<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class K_Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
		$this->load->model('frontend_model');
	}

	// MENU
	public function menu()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$data = $this->frontend_model->get_menu()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('menu', $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	public function add_menu()
	{	
		$user = $this->session->userdata('nama');

		$data = array(
			'title' => $this->input->post('title'),
			'link' => $this->input->post('link'),
			'icon' => $this->input->post('icon'),
			'is_main_menu' => $this->input->post('is_main_menu'),
			'crated_by' => $user,
			'date_create' => date('Y-m-d h-m-i'),
			'status' => 'Created'
		);

		$result = $this->frontend_model->add_menu('tbl_fmenu', $data);

		if (!$result) { 							
			$this->session->set_flashdata('menu', 'DATA MENU BERHASIL DITAMBAH.');		
			redirect('frontend/K_Frontend/menu'); 			
		} else { 								
			$this->session->set_flashdata('menu', 'DATA MENU GAGAL DITAMBAH.');			
			redirect('frontend/K_Frontend/menu'); 			
		}
	}

	public function edit_menu()
	{
		$data['id'] = $this->input->post('id');
		$data['title'] = $this->input->post('title', true);
		$data['link'] = $this->input->post('link', true);
		$data['icon'] = $this->input->post('icon', true);
		$data['is_main_menu'] = $this->input->post('is_main_menu', true);
		$data['crated_by'] = $this->session->userdata('nama');
		$data['date_create'] = date('Y-m-d h-m-i');
		$data['status'] = 'Update';

		$result = $this->frontend_model->edit_menu($data);

		if (!$result) { 							
			$this->session->set_flashdata('menu', 'DATA MENU GAGAL DIUPDATE.'); 				
			redirect('frontend/K_Frontend/menu'); 			
		} else { 								
			$this->session->set_flashdata('menu', 'DATA MENU BERHASIL DIUPDATE.');			
			redirect('frontend/K_Frontend/menu'); 			
		}
	}

	public function del_menu(){
		$id = $this->input->post('id');
		$result = $this->frontend_model->del_menu($id);

		if (!$result) { 							
			$this->session->set_flashdata('menu', 'DATA MENU GAGAL DIHAPUS.'); 				
			redirect('frontend/K_Frontend/menu'); 			
		} else { 								
			$this->session->set_flashdata('menu', 'DATA MENU BERHASIL DIHAPUS.');			
			redirect('frontend/K_Frontend/menu'); 			
		}
	}

	public function show_m($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '1'
		);

		$result= $this->frontend_model->update_berkas('tbl_fmenu',$data, $id);
		$this->session->set_flashdata('menu', 'FOTO MENU BERHASIL HIDDEN.');			
		redirect('frontend/K_Frontend/menu');
	}

	public function hide_m($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '0'
		);

		$result= $this->frontend_model->update_berkas('tbl_fmenu',$data, $id);
		$this->session->set_flashdata('menu', 'FOTO MENU BERHASIL DITAMPILKAN.');			
		redirect('frontend/K_Frontend/menu');
	}

    // GALERI
	public function galeri()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$data = $this->frontend_model->get_galeri()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('galeri', $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}else{
			redirect("user");
		}
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/img/galeri/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('frontend/K_Frontend/galeri');
		}
		return $this->upload->data('file_name');
	}

	public function add_galeri()
	{	
		$user = $this->session->userdata('nama');

		$data = array(
			'crated_by' => $user,
			'judul' => $this->input->post('judul'),
			'keterangan' => $this->input->post('keterangan'),
			'date_created' => date('Y-m-d h-m-i'),
			'status' => 'Created',
			'berkas' => '0'
		);

		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}

		$result = $this->frontend_model->add_galeri('tbl_fgaleri', $data);

		if (!$result) { 							
			$this->session->set_flashdata('galeri', 'DATA GALERI BERHASIL DITAMBAH.');		
			redirect('frontend/K_Frontend/galeri'); 			
		} else { 								
			$this->session->set_flashdata('galeri', 'DATA GALERI GAGAL DITAMBAH.');			
			redirect('frontend/K_Frontend/galeri'); 			
		}
	}

	public function edit_galeri()
	{
		$data['id'] = $this->input->post('id');
		$data['judul'] = $this->input->post('judul', true);
		$data['keterangan'] = $this->input->post('keterangan', true);
		$data['crated_by'] = $this->session->userdata('nama');
		$data['date_created'] = date('Y-m-d h-m-i');
		$data['status'] = 'Update';

		$result = $this->frontend_model->edit_galeri($data);

		if (!$result) { 							
			$this->session->set_flashdata('galeri', 'DATA GALERI GAGAL DIUPDATE.'); 				
			redirect('frontend/K_Frontend/galeri'); 			
		} else { 								
			$this->session->set_flashdata('galeri', 'DATA GALERI BERHASIL DIUPDATE.');			
			redirect('frontend/K_Frontend/galeri'); 			
		}
	}

	public function edit_fgaleri($id)
	{

		$config['upload_path']="assets/img/galeri/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("foto")){
			$file = $this->upload->data();
			
			$gambar= $file['file_name'];

			$data = array(
				'foto' => $gambar,
			);

			$result= $this->frontend_model->update_foto('tbl_fgaleri',$data, $id);
			echo json_decode($result);
		}
		$this->session->set_flashdata('galeri', 'FOTO GALERI BERHASIL DIUPDATE.');			
		redirect('frontend/K_Frontend/galeri');
	}

	public function show_g($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '1'
		);

		$result= $this->frontend_model->update_berkas('tbl_fgaleri',$data, $id);
		$this->session->set_flashdata('galeri', 'FOTO GALERI BERHASIL HIDDEN.');			
		redirect('frontend/K_Frontend/galeri');
	}

	public function hide_g($id)
	{
		$data = array(
			'id' => $id,
			'berkas' => '0'
		);

		$result= $this->frontend_model->update_berkas('tbl_fgaleri',$data, $id);
		$this->session->set_flashdata('galeri', 'FOTO GALERI BERHASIL DITAMPILKAN.');			
		redirect('frontend/K_Frontend/galeri');
	}

	public function del_galeri()
	{
		$id = $this->input->post('id');
		$result = $this->frontend_model->del_galeri($id);

		if (!$result) { 							
			$this->session->set_flashdata('galeri', 'DATA GALERI GAGAL DIHAPUS.'); 				
			redirect('frontend/K_Frontend/galeri'); 			
		} else { 								
			$this->session->set_flashdata('galeri', 'DATA GALERI BERHASIL DIHAPUS.');			
			redirect('frontend/K_Frontend/galeri'); 			
		}
	}
}
?>