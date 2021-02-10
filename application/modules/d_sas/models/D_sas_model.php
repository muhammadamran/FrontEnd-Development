<?php
class D_sas_model extends CI_Model{

  	public function get_all_kampus()
	{	
		$result = $this->db->query("SELECT tbl_satker.kode_satker, tbl_satker.alias, tbl_satker.nama_satker as nama , SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi, tbl_satker.kode_satker as url FROM tbl_satker JOIN output_sas ON tbl_satker.kode_satker = output_sas.kode_satker GROUP BY tbl_satker.kode_satker");

		return $result;
	}

	public function get_kampus($link)
	{	
		$result = $this->db->query("SELECT tbl_satker.kode_satker, tbl_satker.alias,tbl_satker.nama_satker as nama , SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM tbl_satker JOIN output_sas ON tbl_satker.kode_satker = output_sas.kode_satker WHERE tbl_satker.kode_satker = $link GROUP BY tbl_satker.kode_satker");

		return $result;
  	}

  	public function get_nama_kampus($kode_satker) {
  		$query = $this->db->get_where('tbl_satker', array('kode_satker' => $kode_satker));

		return $query->row_array();
  	}

	public function get_all_biro($kode_satker)
	{	

		// $result = $this->db->query("SELECT tbl_satker_biro.kode_satker_biro , output_sas.id_b, tbl_satker_biro.nama_satker_biro as nama, tbl_satker_biro.alias as alias, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM tbl_satker_biro JOIN output_sas ON tbl_satker_biro.kode_satker_biro = output_sas.id_b WHERE output_sas.kode_satker = $kode_satker GROUP BY tbl_satker_biro.kode_satker_biro ORDER BY tbl_satker_biro.id_satker_biro");

		$result = $this->db->query("SELECT tbl_satker_biro.kode_satker_biro , output_sas.id_b, tbl_satker_biro.nama_satker_biro as nama, tbl_satker_biro.alias as alias, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi, CONCAT('$kode_satker.', tbl_satker_biro.kode_satker_biro) as url FROM tbl_satker_biro JOIN output_sas ON tbl_satker_biro.kode_satker_biro = output_sas.id_b WHERE output_sas.kode_satker = $kode_satker GROUP BY tbl_satker_biro.kode_satker_biro ORDER BY tbl_satker_biro.id_satker_biro");
			
		return $result;
	}

	public function get_biro($link)
	{

		$result = $this->db->query("SELECT nama_satker_biro as nama FROM tbl_satker_biro WHERE kode_satker_biro = $link");
			
		return $result;
	}

	public function get_nama_biro($kode_satker_biro) {
  		$query = $this->db->get_where('tbl_satker_biro', array('kode_satker_biro' => $kode_satker_biro));

		return $query->row_array();
  	}


  public function get_all_unit($unit_sas)
	{	
		$temp = explode(".", $unit_sas);
		$kampus = $temp[0];
		$biro = $temp[1];
		// $result = $this->db->query("SELECT unit_sas.id_b, unit_sas.id_c, unit_sas.ket as nama, unit_sas.ket as alia, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM unit_sas JOIN output_sas ON unit_sas.id_b = output_sas.id_b WHERE unit_sas.id_b = $unit_sas GROUP BY unit_sas.id_c ");

		// $result = $this->db->query("SELECT unit_sas.id_b, unit_sas.id_c, unit_sas.ket as nama, unit_sas.ket as alia, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi, CONCAT(unit_sas.kode_satker,'.',unit_sas.id_b, '.', unit_sas.id_c) as url FROM unit_sas JOIN output_sas ON unit_sas.id_b = output_sas.id_b WHERE unit_sas.id_b = $unit_sas GROUP BY unit_sas.id_c ");

		$result = $this->db->query("SELECT o.kode_satker, o.id_b, o.id_c, u.ket as nama, u.ket as alias, SUM(o.pagu) as pagu, SUM(o.realisasi) as realisasi, CONCAT(o.kode_satker,'.',o.id_b, '.', o.id_c) as url FROM output_sas o JOIN unit_sas u ON o.id_c = u.id_c WHERE o.kode_satker = $kampus and o.id_b = $biro GROUP BY o.id_c ORDER BY `id_c` ASC");
		// $result = $this->db->query("SELECT id_b, ket as nama FROM unit_sas where id_b = $unit_sas");

		// $resul = $this->db->query("SELECT unit_sas.id_b, unit_sas.ket as nama , sum(output_sas.pagu) as pagu, sum(output_sas.realisasi) as realisasi, from output_sas JOIN unit_sas on output_sas.id_b = output_sas.id_b where unit_sas.id_b = $id_b GROUP BY unit_sas.id_b");

        
		return $result;

  }

  public function get_all_unit_satker($kode)
	{	
		// $result = $this->db->query("SELECT unit_sas.id_b, unit_sas.id_c, unit_sas.ket as nama, unit_sas.ket as alias, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi, CONCAT(unit_sas.kode_satker,'.',unit_sas.id_b, '.', unit_sas.id_c) as url FROM unit_sas JOIN output_sas ON unit_sas.id_b = output_sas.id_b WHERE unit_sas.kode_satker = $kode GROUP BY unit_sas.id_c ");

		$result = $this->db->query("SELECT b.id_b, b.id_c, b.ket as nama, b.ket as alias, sum(a.pagu) as pagu, sum(a.realisasi) as realisasi, CONCAT(b.kode_satker,'.',b.id_b, '.', b.id_c) as url  FROM output_sas a JOIN unit_sas b on a.kode_satker = b.kode_satker and a.id_b = b.id_b and a.id_c = b.id_c where a.kode_satker = $kode GROUP BY a.id_c");

		// $result = $this->db->query("SELECT id_b, ket as nama FROM unit_sas where id_b = $unit_sas");

		// $resul = $this->db->query("SELECT unit_sas.id_b, unit_sas.ket as nama , sum(output_sas.pagu) as pagu, sum(output_sas.realisasi) as realisasi, from output_sas JOIN unit_sas on output_sas.id_b = output_sas.id_b where unit_sas.id_b = $id_b GROUP BY unit_sas.id_b");

        
		return $result;

  }

  public function get_nama_unit($id_b) {
	$temp = explode(".", $id_b);
	$kampus = $temp[0];
	$biro = $temp[1];
	$unit = $temp[2];
	$query = $this->db->get_where('unit_sas', array('kode_satker' => $kampus, 'id_c' => $unit, 'id_b' => $biro));

	return $query->row_array();
}

  public function get_all_output($output_sas)
	{	
		$temp = explode(".", $output_sas);
		$kampus = $temp[0];
		$biro = $temp[1];
		$unit = $temp[2];

		// $result = $this->db->query("SELECT output_sas.pagu,output_sas.realisasi,ket as nama FROM output_sas where id_c = $output_sas");

		// $result = $this->db->query("SELECT output_sas.pagu,output_sas.realisasi,ket as nama, ket as alias FROM output_sas where id_c = $output_sas");

		$result = $this->db->query("SELECT output_sas.pagu, output_sas.realisasi, ket as nama, ket as alias FROM output_sas where kode_satker = $kampus and id_b = $biro and id_c = $unit");
        
		return $result;
  }

  public function kampusnyaa()
	{	
		$result = $this->db->query("SELECT tbl_satker.kode_satker, tbl_satker.alias, tbl_satker.nama_satker as nama , SUM(akun_sas.pagu) AS pagu , SUM(akun_sas.realisasi) AS realisasi, tbl_satker.kode_satker as url FROM tbl_satker JOIN akun_sas ON tbl_satker.kode_satker = akun_sas.kode_satker GROUP BY tbl_satker.kode_satker");

		return $result;
	}


	public function biroo($bironya)
	{	
		$result = $this->db->query("SELECT nama_satker_biro as nama FROM tbl_satker_biro WHERE kode_satker_biro = $bironya");
		return $result;
  	}

  
}