<?php
class Profil_model extends CI_Model {

    function get_data()
	{
        $nip = $this->session->userdata('nip');
        $query = $this->db->query("SELECT * FROM tbl_users where nip = '$nip'")->result();

        return $query;
    }

    function edit_profil($input_data)
    {       
        
        $nip = $this->session->userdata('nip');
        $hasil = $this->db->where('nip', $nip)->update('tbl_users', $input_data);
        
        return $hasil;       
             
    }
}
?>