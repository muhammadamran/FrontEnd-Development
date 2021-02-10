<?php
class Berita_model extends CI_Model{
    
	public function berita(){
        // var_dump($this->session->userdata('role') == 'Admin'&& ($this->session->userdata('role') == 'Humas'));exit;
		$this->db->select('*');
        $this->db->from('berita');
        if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Humas'){
        }else{
            $this->db->where('status_berita','Publish');
        }
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function tambah_berita($input_data){
        return $this->db->insert('berita', $input_data);
    }

    function edit_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }

    function draft_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }

    function publish_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }
}