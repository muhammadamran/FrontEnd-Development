<?php
class Apps_model extends CI_Model {

    function get_data()
	{
        $query = $this->db->query("SELECT a.*,b.nama_unit, CASE WHEN a.status = 1 THEN 'Aktif, digunakan' WHEN a.status = 2 THEN 'Aktif, tidak digunakan' WHEN a.status = 3 THEN 'Tidak Aktif' END AS status FROM tbl_apps as a JOIN kategori_app as b ON b.id_app = a.kategori_apps ORDER BY a.status ASC");
        return $query;
    }

    function get_kategori()
	{
        $role = $this->db->query("SELECT * FROM kategori_app");
        return $role;
    }

    public function log($log){
        return $this->db->insert('tbl_log', $log);
    }

    function tambah_apps($input_data)
	{   
        $add_peg = $this->db->insert('tbl_apps', $input_data);
        return $add_peg;
    }

    function hapus_apps($input_data)
    {
        $id_apps = $input_data['id_apps'];
        $hasil = $this->db->where('id_apps', $id_apps)->update('tbl_apps', $input_data);

        return $hasil;
    }

    function edit_apps($input_data)
    {       
        $id_apps = $input_data['id_apps'];
        $hasil = $this->db->where('id_apps', $id_apps)->update('tbl_apps', $input_data);
        
        return $hasil;       
             
    }
}
?>