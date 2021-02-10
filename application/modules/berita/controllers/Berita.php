<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Berita extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
    }

    /**
     * This function is used to load page view
     * @return Void
     */
    public function index(){
        if($this->session->userdata('nip') != NULL){
             $data = $this->berita_model->berita();

             $x['data'] = $data;
        
             $this->load->view("include/head");
             $this->load->view("include/top-header");
             $this->load->view('v_berita', $x);
             $this->load->view("include/sidebar");
             $this->load->view("include/panel");
             $this->load->view("include/footer");
        }else{
             redirect("user");
        }
    }

    function upload() {
        foreach($_FILES as $name => $fileInfo)
        {
            $filename=$_FILES[$name]['name'];
            $tmpname=$_FILES[$name]['tmp_name'];
            $exp=explode('.', $filename);
            $ext=end($exp);
            $newname=  $exp[0].'_'.time().".".$ext; 
            $config['upload_path'] = './assets/img/gallery/';
            $config['upload_url'] =  base_url().'assets/img/gallery/';
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = '2000000';
            $config['file_name'] = $newname;
            $this->load->library('upload', $config);
            move_uploaded_file($tmpname,"assets/img/gallery/".$newname);
            return $newname;
        }
    }

    public function tambah_berita()
	{
        $pic = '';

        foreach($_FILES as $name => $fileInfo)
        { 
            if(!empty($_FILES[$name]['name'])){
                $newname = $this->upload(); 
                $data[$name] = $newname;
                $pic = $newname;
            }
        }

        $input_data['gambar'] = $pic;
        $input_data['judul_berita'] = $this->input->post('judul_berita', true);
        $input_data['isi'] = $this->input->post('isi', true);
        $input_data['status_berita'] = $this->input->post('status_berita', true);
        $input_data['tanggal'] = date('Y-m-d H:i:s');

        $result = $this->berita_model->tambah_berita($input_data);
        
        if (!$result) { 							
            $this->session->set_flashdata('berita', 'Gagal Menambahkan berita.'); 				
            redirect('berita'); 			
        } else {
            $this->session->set_flashdata('berita', 'Berhasil Menambahkan berita.'); 		
            redirect('berita'); 			
        }
    }

    public function edit_berita(){
        
        $profile_pic = '';

        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            $profile_pic =$newname;
        }else {
            $profile_pic ='';
        }

        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $profile_pic =$newname;
             } else {  
                if($this->input->post('fileOld')) {  
                    $newname = $this->input->post('fileOld');
                    $data[$name]=$newname;
                    $profile_pic =$newname;
                }else {
                    $data[$name]='';
                    $profile_pic ='';
                }
            } 
        }

        $input_data['id_berita'] = $this->input->post('id_berita', true);
        $input_data['gambar'] = $profile_pic;
        $input_data['judul_berita'] = $this->input->post('judul_berita', true);
        $input_data['isi'] = $this->input->post('isi', true);
        $input_data['status_berita'] = $this->input->post('status_berita', true);

        $result = $this->berita_model->edit_berita($input_data);
        
        if (!$result) { 							
            $this->session->set_flashdata('berita', 'Gagal Mengubah berita.'); 				
            redirect('berita'); 			
        } else {
            $this->session->set_flashdata('berita', 'Berhasil Mengubah berita.'); 		
            redirect('berita'); 			
        }
    }

    public function draft_berita(){

        $input_data['id_berita'] = $this->input->post('id_berita', true);
        $input_data['status_berita'] = $this->input->post('status_berita', true);

        $result = $this->berita_model->draft_berita($input_data);
        
        if (!$result) { 							
            $this->session->set_flashdata('berita', 'Draft Berita Gagal.'); 				
            redirect('berita'); 			
        } else {
            $this->session->set_flashdata('berita', 'Draft Berita Berhasil.'); 		
            redirect('berita'); 			
        }
    }

    public function publish_berita(){

        $input_data['id_berita'] = $this->input->post('id_berita', true);
        $input_data['status_berita'] = $this->input->post('status_berita', true);

        $result = $this->berita_model->publish_berita($input_data);
        
        if (!$result) { 							
            $this->session->set_flashdata('berita', 'Publish Berita Gagal.'); 				
            redirect('berita'); 			
        } else {
            $this->session->set_flashdata('berita', 'Publish Berita Berhasil.'); 		
            redirect('berita'); 			
        }
    }
}