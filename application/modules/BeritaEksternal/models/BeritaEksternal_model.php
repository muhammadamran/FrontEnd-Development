<?php
class BeritaEksternal_model extends CI_Model {

    function get_data()
	{
        $query = $this->db->query("SELECT * FROM tbl_beritaeksternal");
        return $query;
    }

    function tambah_beritaeksternal($input_data)
	{   
        $add_berita = $this->db->insert('tbl_beritaeksternal', $input_data);
        return $add_berita;
    }

    function cek_beritaeksternal($judul)
	{   
        $cek_berita = $this->db->query("SELECT * FROM tbl_beritaeksternal WHERE Judul='$judul'")->result();
        return $cek_berita;
    }

    function hapus_BeritaEksternal($id){
        $hasil=$this->db->query("DELETE FROM tbl_beritaeksternal WHERE Id='$id'");
        return $hasil;
    }

    function edit_BeritaEksternal($input_data)
    {       
        $id = $input_data['Id'];
        $hasil = $this->db->where('Id', $id)->update('tbl_beritaeksternal', $input_data);
        return $hasil;
    }

    public function upsert_batch($data, $tbl, $date) 
    {
        $this->db->where('created_at',$date);
        $q = $this->db->get($tbl)->num_rows();
        if ($q) 
        {
            $this->db->where('created_at',$date);
            $this->db->update_batch($tbl, $data, 'judu;');
        } 
        else 
        {
            $this->db->insert_batch($tbl, $data);
        }
    }
}
?>