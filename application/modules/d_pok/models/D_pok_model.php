<?php
class D_pok_model extends CI_Model{

  public function get_biro_data() {

		$result = $this->db->query("SELECT tbl_satker_biro.kode_satker_biro as idx, tbl_satker_biro.*, tbl_satker_biro.nama_satker_biro as nama, sum(c.pagu) as pagu, SUM(c.realisasi) as realisasi, sum(c.kembali) as kembali, MAX(c.tgl) as tgl from tbl_satker_biro join (select unit_pok.id_b, unit_pok.id, unit_pok.nama, sum(out_pok.pagu) as pagu, sum(out_pok.realisasi) as realisasi, sum(out_pok.kembali) as kembali, MAX(out_pok.tgl) as tgl from out_pok JOIN unit_pok on out_pok.id_u = unit_pok.id GROUP BY unit_pok.id) as c on tbl_satker_biro.kode_satker_biro = c.id_b GROUP by c.id_b order by tbl_satker_biro.id_satker_biro asc");
        
		return $result;
  }

  public function get_unit_data($id) {
  		
		// $query = $this->db->get_where('tbl_satker_biro', array('kode_satker_biro' => $id));
		// $res = $query->row_array();
		// $id_b = $res['kode_satker_biro'];
		// echo $id_b;
		// exit();

		// $this->db->select('unit_pok.id_b as idx, unit_pok.id, unit_pok.nama, sum(out_pok.pagu) as pagu, sum(out_pok.realisasi) as realisasi, sum(out_pok.kembali) as kembali, MAX(out_pok.tgl) as tgl');
		// $this->db->from('out_pok');
		// $this->db->join('unit_pok', 'out_pok.id_u = unit_pok.id');
		// $this->db->where('out_pok.id_b', $id_b);
		// $this->db->group_by('unit_pok.id');
		// $this->db->order_by('unit_pok.id_b', 'asc');
		// $query = $this->db->get();
		// return $query->result_array();

		return $this->db->query("SELECT unit_pok.id_b, unit_pok.id as idx, unit_pok.nama, unit_pok.nama as alias, sum(out_pok.pagu) as pagu, sum(out_pok.realisasi) as realisasi, sum(out_pok.kembali) as kembali, MAX(out_pok.tgl) as tgl from out_pok JOIN unit_pok on out_pok.id_u = unit_pok.id where unit_pok.id_b = $id GROUP BY unit_pok.id");
  }

  public function get_biro_name($id) {
		$query = $this->db->get_where('tbl_satker_biro', array('kode_satker_biro' => $id));
		// $res = $query->row_array();
		// return $res['alias'];
		return $query->row_array();
  }

  public function get_unit_name($id) {
		// $query = $this->db->get_where('unit_pok', array('id' => $id));
  		// $query = $this->db->query('SELECT * FROM unit_pok JOIN tbl_satker_biro ON id_b = kode_satker_biro WHERE id = $id');
		// $res = $query->row_array();
		// return $res['nama'];
  	return $this->db->query("SELECT * FROM unit_pok JOIN tbl_satker_biro ON id_b = kode_satker_biro WHERE id = $id");
  }

  public function get_out_data($id) {	
	// echo $id;
	// exit();
		return $this->db->query("SELECT *, nama as alias FROM out_pok WHERE id_u = $id");
  }
  
}