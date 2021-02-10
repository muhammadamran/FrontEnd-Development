<?php
class D_sarpras_model extends CI_Model{

	public function get_sarpras($satker) {
		// SELECT * FROM tbl_sarpras s JOIN tbl_sarpras_kat k ON kode REGEXP concat('^', k.id);
		$this->db->select('*');
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_sarpras_by_kategori($satker, $kategori) {
		// SELECT * FROM tbl_sarpras s JOIN tbl_sarpras_kat k ON kode REGEXP concat('^', k.id);
		$result = $this->db->query("SELECT @num:=@num+1 AS no, T.* FROM (SELECT @num := 0) N, (SELECT uraian, merk, tahun, IF(luas>0, FORMAT(luas,0,'de_DE'), FORMAT(jumlah,0,'de_DE')) as jumlah, FORMAT(harga_beli,2,'de_DE') AS harga_beli, FORMAT((jumlah*harga_beli),0,'de_DE') AS tb, FORMAT((jumlah*harga_baru), 0, 'de_DE') AS tr, asal, kondisi, tbl_sarpras.id FROM tbl_sarpras JOIN tbl_sarpras_kat ON kode REGEXP concat('^', tbl_sarpras_kat.id) WHERE kode_satker = '$satker' AND kategori = '$kategori' ORDER BY kategori ASC) T");
		return $result;
		// $this->db->select('*, (jumlah*harga_beli) AS tb, (jumlah*harga_baru) AS tr');
		// $this->db->from('tbl_sarpras');
		// $this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		// $this->db->where('kode_satker', $satker);
		// $this->db->where('kategori', $kategori);
		// $this->db->order_by('kategori', 'ASC');
		// $result = $this->db->get();

		// return $result;
	}

	public function get_sarpras_year() {

		$this->db->select('COUNT(tahun) as total, tahun, kode_satker');
		$this->db->group_by(array("tahun", "kode_satker"));
		$this->db->order_by('kode_satker', 'ASC');
		$this->db->order_by('tahun', 'ASC');
		$result = $this->db->get('tbl_sarpras');

		return $result;
	}

	public function get_sarpras_kondisi() {

		$this->db->select('COUNT(kondisi) as total, kondisi, kode_satker');
		$this->db->group_by(array("kondisi", "kode_satker"));
		$this->db->order_by('kode_satker', 'ASC');
		$result = $this->db->get('tbl_sarpras');

		return $result;
	}

	public function get_satker() {

		$this->db->select('tbl_satker.kode_satker, tbl_satker.nama_satker');
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_satker', "tbl_sarpras.kode_satker = tbl_satker.kode_satker");
		$this->db->group_by("tbl_sarpras.kode_satker");
		$this->db->order_by('tbl_sarpras.kode_satker', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_belanja_tahun($satker) {
		// $this->db->select("FORMAT(SUM((jumlah*harga_beli)+(luas*harga_beli)), 2, 'de_DE') AS total, tahun, kategori");
		$this->db->select("SUM((jumlah*harga_beli)) AS total, SUM((jumlah*harga_baru)) AS perolehan, tahun, kategori");
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->group_by(array("kategori", "tahun"));
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_kategori($satker) {

		// SELECT DISTINCT kategori FROM tbl_sarpras s JOIN tbl_sarpras_kat k ON kode REGEXP concat('^', k.id) WHERE kode_satker=677024 ORDER BY kategori ASC
		// $this->db->distinct();
		$this->db->select("kategori, FORMAT(SUM(jumlah*harga_beli), 2, 'de_DE') AS total, FORMAT(SUM(jumlah*harga_baru), 2, 'de_DE') AS perolehan");
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->group_by("kategori");
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_kategori2() {

		$this->db->distinct();
		$this->db->select('kategori');
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('tbl_sarpras_kat');

		return $result;
	}

	public function get_detail($id) {
		$this->db->select('tbl_sarpras.*, tbl_sarpras_kat.kategori, tbl_satker.nama_satker');
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_satker', "tbl_sarpras.kode_satker = tbl_satker.kode_satker");
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('tbl_sarpras.id', $id);
		$result = $this->db->get();

		return $result;
	}

	public function update_sarpras() {
		$id = $this->input->post('editModalId');
		$hr = $this->input->post('editModalHR');
		$ko = $this->input->post('editModalKondisi');
		// echo "$id $hr $ko";exit;

		$data = array(
			'harga_baru' => $this->input->post('editModalHR'),
			'kondisi' => $this->input->post('editModalKondisi')
			);
		$this->db->where('id', $id);
		return $this->db->update('tbl_sarpras', $data);

	}

}