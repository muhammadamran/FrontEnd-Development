<?php
class Ortala_model extends CI_Model{
    public function get_ortala($id_kat)
	{
		$getuu = $this->db->query("SELECT * FROM tbl_ort where id_kat = '$id_kat'");

		return $getuu;
    }

    function add_prokum($data)
	{   
		$addprokum = $this->db->insert('tbl_ort', $data);
		return $addprokum;
    }

	function del_prokum($id_prokum)
	{
		return $this->db->query("DELETE FROM tbl_ort WHERE id_prokum= '$id_prokum'");
    }

	public function edit_prokum($id_prokum, $editprokum) 
	{
		return $this->db->where('id_prokum', $id_prokum)->update('tbl_ort', $editprokum);
	}
	
	public function get_status_count($kat, $status)
	{
		$this->db->where('id_kat', $kat);
		$this->db->where('status', $status);
		$this->db->from('tbl_ort'); 
		return $this->db->count_all_results();
	}
	
	public function getById($id)
	{
		return $this->db->get_where('tbl_ort', ['id_prokum' => $id])->row();
    }
    
    /*function get_kategori()
    {   
        $getkat = $this->db->query("SELECT * FROM tbl_ort_kat")->result();
        return $getkat;
    }*/

}