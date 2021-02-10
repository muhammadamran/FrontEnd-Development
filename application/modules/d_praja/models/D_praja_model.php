<?php
class D_praja_model extends CI_Model
{

	public function get_praja()
	{

		// $result = $this->db->query("SELECT * FROM praja");

		$result = $this->db->query("SELECT *,CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jeniskelamin FROM praja ");

		// $result = "SELECT *, CASE WHEN jk = 'P' THEN 'Perempuan'
		// WHEN jk= 'L' THEN 'Laki-Laki'
		// ELSE 'Belum Ada'
		// END AS jeniskelamin
		// FROM Praja
		// ";

		return $result;
	}

	public function get_detail($npp)
	{

		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja JOIN orangtua ON praja.npp = orangtua.npp JOIN wali ON orangtua.npp = wali.npp WHERE praja.npp = '$npp' ");

		return $result;
	}

	public function get_angkatan()
	{
		$result = $this->db->query("SELECT angkatan FROM `praja` GROUP by angkatan");

		return $result;
	}


	public function get_table_praja($angkatan)
	{

		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja JOIN orangtua ON praja.id = orangtua.id_ortu JOIN wali ON orangtua.id_ortu = wali.id_wali WHERE angkatan = $angkatan" );

		return $result;
	}


	public function exportdata($angkatan)
	{

		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja JOIN orangtua ON praja.id = orangtua.id_ortu JOIN wali ON orangtua.id_ortu = wali.id_wali WHERE angkatan = '$angkatan'" );

		return $result;
	}



	public function get_statuspraja()
	{


		$result = $this->db->query("SELECT * FROM hukuman");

		return $result;
	}

	public function get_npp()
	{

		$result = $this->db->query("SELECT npp FROM praja ");

		return $result;
	}

	public function getcoba($npp)
	{
		// $nama = strtoupper(str_replace('-', ' ', $nama));
		$result = $this->db->query("SELECT npp,nama,status,angkatan,tingkat FROM praja WHERE npp = '$npp'");

		return $result;
	}



	public function view_edit($editnya)
	{
		$id = $editnya['id'];

		// $hasil ="UPDATE praja SET email=$email,alamat=$alamat,rt=$rt,rw=$rw,nama_dusun=$nama_dusun,
		// kelurahan=$kelurahan,kecamatan=$kecamatan,kab_kota=$kab_kota,kode_pos=$kode_pos,
		// provinsi=$provinsi,tlp_pribadi=$tlp_pribadi,status=$status,tingkat=$tingkat,
		// angkatan=$angkatan where nama=$nama";
		
		$hasil = $this->db->where('id', $id)->update('praja', $editnya);
		return $hasil;
	}

	public function view_editortu($editort)
	{
		$id_ortu = $editort['id_ortu'];


		// $hasil ="UPDATE orangtua SET id_ortu=$id_ortu,nik_praja=$nik_praja,nama=$nama,nik_ayah=$nik_ayah,nama_ayah=$nama_ayah,
		// tgllahir_ayah=$tgllahir_ayah,pendidikan_ayah=$pendidikan_ayah,pekerjaan_ayah=$pekerjaan_ayah,penghasilan_ayah=$penghasilan_ayah,
		// tlp_ayah=$tlp_ayah,tlp_ayah=$tlp_ayah,nik_ibu=$nik_ibu,nama_ibu=$nama_ibu,tgllahir_ibu=$tgllahir_ibu,pendidikan_ibu=$pendidikan_ibu,pekerjaan_ibu=$pekerjaan_ibu,penghasilan_ibu=$penghasilan_ibu,tlp_ibu=$tlp_ibu where id_ortu=$id_ortu";
		// echo "$hasil";
		$hasil = $this->db->where('id_ortu', $id_ortu)->update('orangtua', $editort);
		// echo "$id_ortu";
	 // exit();
		return $hasil;
	}

	public function view_editwali($editwal)
	{
		$id_wali = $editwal['id_wali'];

		// $hasil ="UPDATE orangtua SET id_ortu=$id_ortu,nik_praja=$nik_praja,nama=$nama,nik_ayah=$nik_ayah,nama_ayah=$nama_ayah,
		// tgllahir_ayah=$tgllahir_ayah,pendidikan_ayah=$pendidikan_ayah,pekerjaan_ayah=$pekerjaan_ayah,penghasilan_ayah=$penghasilan_ayah,
		// tlp_ayah=$tlp_ayah,tlp_ayah=$tlp_ayah,nik_ibu=$nik_ibu,nama_ibu=$nama_ibu,tgllahir_ibu=$tgllahir_ibu,pendidikan_ibu=$pendidikan_ibu,pekerjaan_ibu=$pekerjaan_ibu,penghasilan_ibu=$penghasilan_ibu,tlp_ibu=$tlp_ibu where id_ortu=$id_ortu";
		// echo "$hasil";
		$hasil = $this->db->where('id_wali', $id_wali)->update('wali', $editwal);
		// echo "$hasil";
	 // 	exit();
		return $hasil;
	}

	public function hapus_praja($id_praja)
	{
		$hasil = $this->db->query("DELETE FROM praja WHERE id_praja='$id_praja'");
		return $hasil;
	}

	public function get_status()
	{
		$prov = $this->db->query("SELECT status from praja ");
		return $prov;
	}

	public function get_provinsi()
	{
		$prov = $this->db->query("SELECT provinsi , count(provinsi) as jumlah from praja group by provinsi");
		return $prov;
	}


	function edit($editpraja)
	{   
		$id = $editpraja['id'];
		$hasil = $this->db->where('id', $id)->update('praja', $editpraja);
		return $hasil;
	}
}
