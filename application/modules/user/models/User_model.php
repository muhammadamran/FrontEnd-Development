<?php
class User_model extends CI_Model {

    function login_user($nip,$password)
	{
        $query = $this->db->get_where('tbl_users',array('nip'=>$nip));
        
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            $this->db->where("nip='$nip'");
            $this->db->where("password='$password'");
            
            $result = $this->db->get('tbl_users')->result();

            if(!empty($result)){
                $this->session->set_userdata('nip',$nip);
                $this->session->set_userdata('nama',$data_user->nama_user);
                $this->session->set_userdata('role',$data_user->role);
                $this->session->set_userdata('image_url',$data_user->image_url);
                $this->session->set_userdata('is_login',TRUE);

                if($nip != 'admin'){
                    $this->db->where("nip='$nip'");
                    $dosen = $this->db->get('tbl_dosen')->result();

                    
                    if(!empty($dosen)){
                        $this->session->set_userdata('dosen','Dosen');
                    }
                }
                

                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
    
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('user');
		}
    }
}
?>