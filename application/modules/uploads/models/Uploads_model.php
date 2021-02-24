<?php
class uploads_model extends CI_Model {

	public function upsert_batch($data, $tbl, $date) {
		$this->db->where('created_at',$date);
		$q = $this->db->get($tbl)->num_rows();
		if ($q) {
			$this->db->where('created_at',$date);
			$this->db->update_batch($tbl, $data, 'nama');
		} else {
			$this->db->insert_batch($tbl, $data);
		}
	}

	public function log($log){
        return $this->db->insert('tbl_log', $log);
    }

    function cek_dataakhir()
    {   
      $cek_thl = $this->db->query("SELECT id_thl FROM tbl_thl order by id_thl DESC limit 1")->result();
      return $cek_thl;
    }
}
