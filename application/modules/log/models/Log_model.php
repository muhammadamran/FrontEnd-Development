<?php
class Log_model extends CI_Model{

    public function get_log(){	
        return $this->db->query("SELECT * FROM tbl_log ORDER BY tanggal DESC");
    }
}