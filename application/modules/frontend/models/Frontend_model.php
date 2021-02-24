<?php
class Frontend_model extends CI_Model {

    // MENU
    function get_menu()
    {
        $query = $this->db->query("SELECT * FROM tbl_fmenu");
        return $query;
    }

    function add_menu($table, $data)
    {
        $this->db->insert($table,$data);
    }

    function edit_menu($data)
    {       
        $id = $data['id'];
        $hasil = $this->db->where('id', $id)->update('tbl_fmenu', $data);
        
        return $hasil;    
    }

    function del_menu($id){
        $query=$this->db->query("DELETE FROM tbl_fmenu WHERE id='$id'");
        return $query;
    }

    // GALERI
    function get_galeri()
    {
        $query = $this->db->query("SELECT * FROM tbl_fgaleri");
        return $query;
    }

    function add_galeri($table, $data)
    {
        $this->db->insert($table,$data);
    }

    function edit_galeri($data)
    {       
        $id = $data['id'];
        $hasil = $this->db->where('id', $id)->update('tbl_fgaleri', $data);
        
        return $hasil;    
    }

    function update_foto($table,$data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($table,$data); 
    }

    function update_berkas($table,$data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($table,$data); 
    }

    function del_galeri($id){
        $query=$this->db->query("DELETE FROM tbl_fgaleri WHERE id='$id'");
        return $query;
    }
    
}
?>