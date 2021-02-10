  <?php
  class Absensi_model extends CI_Model
  {
  	public function get_divisi()
  	{
  		$result = $this->db->query("SELECT penugasan FROM `users` GROUP by penugasan");

  		return $result;
  	}

  	public function get_absensi()
  	{
  		$result = $this->db->query("SELECT * FROM `absensi`");

  		return $result;
  	}

  	public function get_divisi_table($penugasan)
  	{
  		$result = $this->db->query("SELECT absensi.id_absen,absensi.tgl,absensi.waktu,absensi.keterangan,users.nama,users.penugasan FROM absensi JOIN users ON absensi.id_user= users.id_user WHERE users.penugasan = '$penugasan' ");

  		return $result;
  	}


  	public function get_range_awalakhir ($penugasan, $fromDate, $endDate)
  	{	

  		$penugasan = json_encode($penugasan);
  		// var_dump($penugasan);exit;
  		// echo "SELECT id_user,tgl,nama, masuk,penugasan, case when masuk=keluar then NULL else keluar end as keluar
  		// FROM(SELECT DISTINCT min(ab.waktu) as MASUK, max(ab.waktu) as KELUAR, us.nama,ab.id_absen,ab.tgl,ab.id_user, ab.penugasan
  		// FROM absensi ab JOIN users us ON ab.id_user=us.id_user WHERE ab.penugasan = $penugasan and  ab.tgl between '$fromDate' and '$endDate'
  		// GROUP BY ab.id_user,ab.tgl,ab.penugasan
  		// ORDER BY ab.tgl DESC,ab.id_user) a";exit();
  		$result = $this->db->query("SELECT id_user,tgl,nama, masuk,penugasan, case when masuk=keluar then NULL else keluar end as keluar
  			FROM(SELECT DISTINCT min(ab.waktu) as MASUK, max(ab.waktu) as KELUAR, us.nama,ab.id_absen,ab.tgl,ab.id_user, ab.penugasan
  			FROM absensi ab JOIN users us ON ab.id_user=us.id_user WHERE ab.penugasan = $penugasan and  ab.tgl between '$fromDate' and '$endDate'
  			GROUP BY ab.id_user,ab.tgl,ab.penugasan
  			ORDER BY ab.tgl DESC,ab.id_user) a");

  		return $result;
  	}

  	public function get_range_awal($penugasan,$fromDate)
  	{	
  		$result = $this->db->query("SELECT id_user,tgl,nama, masuk,penugasan,
  			case when masuk=keluar then NULL else keluar end as keluar
  			FROM(SELECT DISTINCT min(ab.waktu) as MASUK, max(ab.waktu) as KELUAR, us.nama,ab.id_absen,ab.tgl,ab.id_user, ab.penugasan
  			FROM absensi ab JOIN users us ON ab.id_user=us.id_user WHERE ab.penugasan = '$penugasan' and ab.tgl = 'fromDate' 
  			GROUP BY ab.id_user,ab.tgl,ab.penugasan
  			ORDER BY ab.tgl DESC,ab.id_user) a");

  		return $result;
  	}

  }