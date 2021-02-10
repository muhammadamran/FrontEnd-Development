<?php
class Pegawai_model extends CI_Model {

    function get_data()
	{
        $query = $this->db->query("SELECT * FROM tbl_users");
        return $query;
    }

    function get_role()
	{
        $role = $this->db->query("SELECT * FROM tbl_role");
        return $role;
    }

    function tambah_pegawai($input_data)
	{   
        $add_peg = $this->db->insert('tbl_users', $input_data);
        return $add_peg;
    }

    function cek_pegawai($nip)
	{   
        $cek_peg = $this->db->query("SELECT * FROM tbl_users WHERE nip='$nip'")->result();
        return $cek_peg;
    }

    function hapus_pegawai($id_user){
        $hasil=$this->db->query("DELETE FROM tbl_users WHERE id_user='$id_user'");
        return $hasil;
    }

    function edit_pegawai($input_data)
    {       
        $nip = $input_data['nip'];
        $hasil = $this->db->where('nip', $nip)->update('tbl_users', $input_data);
        
        return $hasil;       
             
    }
}
?>