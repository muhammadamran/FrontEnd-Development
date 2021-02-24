<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Apps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps_model');
    }

    public function index()
	{
        if($this->session->userdata('nip') != NULL)
        {
            if($this->session->userdata('role') != 'Admin')
            {
                $this->load->view('Home');
            }else{
                
                $data = $this->apps_model->get_data()->result();
                $kategori = $this->apps_model->get_kategori()->result();
                $x['data'] = $data;
                $x['kategori'] = $kategori;

                $this->load->view("include/head");
                $this->load->view("include/top-header");
                $this->load->view('index_apps', $x);
                $this->load->view("include/sidebar");
                $this->load->view("include/panel");
                $this->load->view("include/footer");
            }
        }else{
            redirect("user");
        }
    }

    public function tambah_apps()
	{
        $input_data['link_apps'] = $this->input->post('link_apps', true); 			
        $input_data['nama_apps'] = $this->input->post('nama_apps', true);
        $input_data['kategori_apps'] = $this->input->post('kategori_apps', true);
        $input_data['image_url'] = $this->input->post('image_url', true);  
        $input_data['status'] = $this->input->post('status', true); 

        $result = $this->apps_model->tambah_apps($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('apps', 'Aplikasi GAGAL DITAMBAHKAN.'); 				
            redirect('apps'); 			
        } else { 				
            
            $isi = $input_data['nama_apps'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Menambahkan aplikasi, Nama Aplikasi = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->apps_model->log($log);

            $this->session->set_flashdata('apps', 'Aplikasi BERHASIL DITAMBAHKAN.');			
            redirect('apps'); 			
        }
    }

    public function edit_apps()
	{
        $input_data['id_apps'] = $this->input->post('id_apps', true); 
        $input_data['link_apps'] = $this->input->post('link_apps', true); 			
        $input_data['nama_apps'] = $this->input->post('nama_apps', true);
        $input_data['kategori_apps'] = $this->input->post('kategori_apps', true);
        $input_data['image_url'] = $this->input->post('image_url', true);  
        $input_data['status'] = $this->input->post('status', true);

        $result = $this->apps_model->edit_apps($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('apps', 'Aplikasi GAGAL DIUBAH.');		
            redirect('apps'); 			
        } else { 					
            
            $isi = $input_data['id_apps'];
            $log['user'] = $this->session->userdata('nip');
            $log['Ket'] = "Mengubah aplikasi, Id Aplikasi = $isi";
            $log['tanggal'] = date('Y-m-d H:i:s');
            $this->apps_model->log($log);

            $this->session->set_flashdata('apps', 'Aplikasi BERHASIL DIUBAH.');			
            redirect('apps'); 			
        }
    }

    function hapus_apps()
    {
        $input_data['id_apps'] = $this->input->post('id_apps', true);
        $input_data['status'] = 3;
        
        $this->apps_model->hapus_apps($input_data);

        $isi = $input_data['id_apps'];
        $log['user'] = $this->session->userdata('nip');
        $log['Ket'] = "Menghapus aplikasi, Id Aplikasi = $isi";
        $log['tanggal'] = date('Y-m-d H:i:s');
        $this->apps_model->log($log);

        redirect('apps');
    }
}
?>