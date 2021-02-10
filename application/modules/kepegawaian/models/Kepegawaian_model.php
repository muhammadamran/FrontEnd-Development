<?php
class Kepegawaian_model extends CI_Model{

  function cek_pegawai($nip)
	{   
    $cek_peg = $this->db->query("SELECT * FROM tbl_pns WHERE nip='$nip'")->result();
    return $cek_peg;
  }

  function get_pendidikan()
	{   
    $tingkat = $this->db->query("SELECT * FROM tbl_pendidikan")->result();
    return $tingkat;
  }
  function get_namasatker()
	{   
    $nama_satker = $this->db->query("SELECT * FROM tbl_satker")->result();
    return $nama_satker;
  }

  //DOSEN
  public function get_all_dosen()
	{	
    $result = $this->db->query("SELECT * FROM tbl_dosen ORDER BY updated_date DESC");

    return $result;
  }

  public function get_not_serdos()
	{
    $result = $this->db->query("SELECT * FROM tbl_dosen WHERE serdos = ''");
    
    return $result;
  }

  public function get_not_nidn()
	{
    $result = $this->db->query("SELECT * FROM tbl_dosen WHERE nidn = 0");
    return $result;
  }

  function tambah_dosen($input_data)
	{   
    $result = $this->db->insert('tbl_dosen', $input_data);
    return $result;
  }

  function edit_dosen($input_data)
  {       
    $id = $input_data['id_dosen'];
    $hasil = $this->db->where('id_dosen', $id)->update('tbl_dosen', $input_data);
    
    return $hasil;    
  }

  function hapus_dosen($id){
    $hasil=$this->db->query("DELETE FROM tbl_dosen WHERE id_dosen='$id'");
    return $hasil;
  }

  // PNS
  public function get_all_pns()
	{	
    $result = $this->db->query("SELECT * FROM tbl_pns");

    return $result;
  }

  public function get_edit_pns($no)
	{	
    $result = $this->db->query("SELECT * FROM tbl_pns WHERE NO = $no");

    return $result;
  }

  function tambah_pns($input_data)
	{   
    $add_pns = $this->db->insert('tbl_pns', $input_data);
    return $add_pns;
  }

  function edit_pns($input_data)
  { 
    $no = $input_data['no'];
    $hasil = $this->db->where('no', $no)->update('tbl_pns', $input_data);
    
    return $hasil;    
  }

  function hapus_pns($nip){
    $hasil=$this->db->query("DELETE FROM tbl_pns WHERE nip='$nip'");
    return $hasil;
  }
  // END PNS

  // THL
  public function get_all_thl()
	{	
    $result = $this->db->query("SELECT * FROM tbl_thl");

    return $result;
  }

  function tambah_thl($input_data)
	{   
    $add_thl = $this->db->insert('tbl_thl', $input_data);
    return $add_thl;
  }

  function edit_thl($input_data)
  {       
    $id_thl = $input_data['id_thl'];
    $hasil = $this->db->where('id_thl', $id_thl)->update('tbl_thl', $input_data);
    
    return $hasil;    
  }

  function hapus_thl($id_thl){
    $hasil=$this->db->query("DELETE FROM tbl_thl WHERE id_thl='$id_thl'");
    return $hasil;
  }
  // END THL
  // TA
  public function get_all_ta()
	{	
    $result = $this->db->query("SELECT * FROM tbl_ta");

    return $result;
  }

  function tambah_ta($input_data)
	{   
    $add_ta = $this->db->insert('tbl_ta', $input_data);
    return $add_ta;
  }

  function edit_ta($input_data)
  {       
    $nik = $input_data['nik'];
    $hasil = $this->db->where('nik', $nik)->update('tbl_ta', $input_data);
    
    return $hasil;    
  }

  function hapus_ta($nik){
    $hasil=$this->db->query("DELETE FROM tbl_ta WHERE nik='$nik'");
    return $hasil;
  }
  // END TA
}