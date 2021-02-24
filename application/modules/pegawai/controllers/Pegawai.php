<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('pegawai_model');
    }

    public function index()
	{
        if($this->session->userdata('nip') != NULL)
        {
            if($this->session->userdata('role') != 'SuperAdmin')
            {
                $this->load->view('Home');
            }else{
                
                $data = $this->pegawai_model->get_data()->result();
                $role = $this->pegawai_model->get_role()->result();
                $x['data'] = $data;
                $x['role'] = $role;

                $this->load->view("include/head");
                $this->load->view("include/top-header");
                $this->load->view('index_peg', $x);
                $this->load->view("include/sidebar");
                $this->load->view("include/panel");
                $this->load->view("include/footer");
            }
        }else{
            redirect("user");
        }
    }

    public function tambah_pegawai()
	{
        $input_data['nip'] = $this->input->post('nip', true); 			
        $input_data['nama_user'] = $this->input->post('nama_user', true);
        $input_data['password'] = md5($this->input->post('password', true));
        $input_data['role'] = $this->input->post('role', true);
        $input_data['created_at'] = date("Y-m-d H:i:s");

        $cek_peg = $this->pegawai_model->cek_pegawai($input_data['nip']);
        
        if(!$cek_peg){
            $result = $this->pegawai_model->tambah_pegawai($input_data);
        }else{
            $this->session->set_flashdata('pegawai', 'NIP USER SUDAH TERDAFTAR.');
            $x['alert'] = 'ada';			
            redirect('pegawai',$x);
        }

        if (!$result) { 							
            $this->session->set_flashdata('pegawai', 'DATA USER GAGAL DITAMBAHKAN.'); 				
            redirect('pegawai'); 			
        } else { 								
            $this->session->set_flashdata('pegawai', 'DATA USER BERHASIL DITAMBAHKAN.');			
            redirect('pegawai'); 			
        }
    }

    public function edit_pegawai()
	{
        $input_data['nip'] = $this->input->post('nip', true);
        $input_data['role'] = $this->input->post('role', true);

        $result = $this->pegawai_model->edit_pegawai($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('pegawai', 'DATA USER GAGAL DIUBAH.');		
            redirect('pegawai'); 			
        } else { 								
            $this->session->set_flashdata('pegawai', 'DATA USER BERHASIL DIUBAH.');			
            redirect('pegawai'); 			
        }
    }

    function hapus_pegawai(){
        $id_user=$this->input->post('id_user');
        $this->pegawai_model->hapus_pegawai($id_user);
        redirect('pegawai');
    }
}
?>