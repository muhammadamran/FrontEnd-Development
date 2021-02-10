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
}
