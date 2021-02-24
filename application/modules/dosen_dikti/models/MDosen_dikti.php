<?php
class MDosen_dikti extends CI_Model{

    public function get_all_dosen(){	
        return $this->db->query("SELECT * FROM tbl_dosen_pddikti ORDER BY updated_date DESC");
    }

    public function belum(){
        return $this->db->query("SELECT serdos, nidn, total
        FROM 
        (SELECT COUNT(*) as serdos FROM tbl_dosen_pddikti WHERE sertifikasi_dosen = '') a,
        (SELECT COUNT(*) as nidn FROM tbl_dosen_pddikti WHERE nidn_nup_nidk = 0) b,
        (SELECT COUNT(*) as total FROM tbl_dosen_pddikti) c")->result();
    }

    public function log($log){
        return $this->db->insert('tbl_log', $log);
    }

    function tambah_dosen_dikti($input_data){   
        return $this->db->insert('tbl_dosen_pddikti', $input_data);
    }

    function update_dosen_dikti($input_data){       
        $id = $input_data['id'];

        return $this->db->where('id', $id)->update('tbl_dosen_pddikti', $input_data);
    }

    function hapus_dosen_dikti($id){
        return $this->db->where('id', $id)->delete('tbl_dosen_pddikti');
    }
}