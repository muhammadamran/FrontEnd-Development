<?php
class Home_model extends CI_Model{

	// Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data()
	{
        $query = $this->db->query("SELECT * FROM tbl_beritaeksternal");
        return $query;
    }

	public function ceksas()
	{
		$peg = $this->db->query("SELECT * FROM output_sas where tanggal like '%2021%'")->result();

		return $peg;
	}

	public function cekpok()
	{
		$peg = $this->db->query("SELECT * FROM out_pok where tgl like '%2021%'")->result();

		return $peg;
	}


	// Kepegawaian
	public function jumlah_peg()
	{
		$peg = $this->db->query("SELECT pns, thl, ta FROM (SELECT count(*) as pns FROM tbl_pns) as pns, (SELECT count(*) as thl FROM tbl_thl) as thl, (SELECT count(*) as ta FROM tbl_ta) as ta")->result();

		return $peg;
	}

	public function jum_eselon()
	{
		$result = $this->db->query("SELECT SUM(eselon LIKE 'I.%') as I, SUM(eselon LIKE 'II.%') as II, SUM(eselon LIKE 'III.%') as III, SUM(eselon LIKE 'IV.%') as IV FROM tbl_pns")->result();

		return $result;
	}

	public function update_last_dosen(){
		return $this->db->query("SELECT updated_date FROM tbl_dosen_pddikti ORDER BY updated_date DESC LIMIT 1")->result();
	}

	public function dosen()
	{
		$result = $this->db->query("SELECT 
							SUM(jabatan = 'ASISTEN AHLI') as asisten_ahli, 
							SUM(jabatan = 'GURU BESAR') as guru_besar, 
							SUM(jabatan = 'LEKTOR') as lektor, 
							SUM(jabatan = 'LEKTOR KEPALA') as lektor_kepala, 
							count(*) as total 
							FROM tbl_dosen_pddikti")
						->result();
		return $result;
	}

	// Hukum & ORTALA
	public function jumlah_prokum()
	{
		
		$prokum = $this->db->query("SELECT COUNT(*) as prokum from tbl_ort where status = 'Aktif' OR status='Done'")->result();
		
		return $prokum;
	}

	// public function update_last_ort(){
	// 	return $this->db->query("SELECT updated_date FROM tbl_ort ORDER BY updated_date DESC LIMIT 1")->result();
	// }

	public function peraturan_rektor()
	{
		$perek = $this->db->query("SELECT SUM(id_kat = 4) as pr FROM tbl_ort WHERE status = 'done'")->result();

		return $perek;
	}

	public function keputusan_rektor()
	{
		$keprek = $this->db->query("SELECT SUM(id_kat = 5) as kr FROM tbl_ort WHERE status = 'done'")->result();

		return $keprek;
	}

	public function surat_edaran()
	{
		$srt = $this->db->query("SELECT SUM(id_kat = 10) as ser FROM tbl_ort WHERE status = 'done'")->result();

		return $srt;
	}

	public function apps(){
		$result = $this->db->query("SELECT 
			app1_1,app1_2,app1_3,nama_1,
			app2_1,app2_2,app2_3,nama_2,
			app3_1,app3_2,app3_3,nama_3,
			app4_1,app4_2,app4_3,nama_4,
			app5_1,app5_2,app5_3,nama_5,
			app6_1,app6_2,app6_3,nama_6,
			app7_1,app7_2,app7_3,nama_7,
			app8_1,app8_2,app8_3,nama_8,
			app9_1,app9_2,app9_3,nama_9,
			app10_1,app10_2,app10_3,nama_10,
			app11_1,app11_2,app11_3,nama_11,
			aktif,tdk_digunakan,tdk_aktif,total
			FROM 
			(SELECT SUM(a.status LIKE '1') as app1_1, SUM(a.status LIKE '2') as app1_2, SUM(a.status LIKE '3') as app1_3, nama_unit as nama_1 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 1) as perpustakaan,
			(SELECT SUM(a.status LIKE '1') as app2_1, SUM(a.status LIKE '2') as app2_2, SUM(a.status LIKE '3') as app2_3, nama_unit as nama_2 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 2) as akademik,
			(SELECT SUM(a.status LIKE '1') as app3_1, SUM(a.status LIKE '2') as app3_2, SUM(a.status LIKE '3') as app3_3, nama_unit as nama_3 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 3) as keuangan,
			(SELECT SUM(a.status LIKE '1') as app4_1, SUM(a.status LIKE '2') as app4_2, SUM(a.status LIKE '3') as app4_3, nama_unit as nama_4 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 4) as riset,
			(SELECT SUM(a.status LIKE '1') as app5_1, SUM(a.status LIKE '2') as app5_2, SUM(a.status LIKE '3') as app5_3, nama_unit as nama_5 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 5) as tp,
			(SELECT SUM(a.status LIKE '1') as app6_1, SUM(a.status LIKE '2') as app6_2, SUM(a.status LIKE '3') as app6_3, nama_unit as nama_6 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 6) as keprajaan,
			(SELECT SUM(a.status LIKE '1') as app7_1, SUM(a.status LIKE '2') as app7_2, SUM(a.status LIKE '3') as app7_3, nama_unit as nama_7 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 7) as pasca,
			(SELECT SUM(a.status LIKE '1') as app8_1, SUM(a.status LIKE '2') as app8_2, SUM(a.status LIKE '3') as app8_3, nama_unit as nama_8 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 8) as pddikti,
			(SELECT SUM(a.status LIKE '1') as app9_1, SUM(a.status LIKE '2') as app9_2, SUM(a.status LIKE '3') as app9_3, nama_unit as nama_9 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 9) as kepegawaian,
			(SELECT SUM(a.status LIKE '1') as app10_1, SUM(a.status LIKE '2') as app10_2, SUM(a.status LIKE '3') as app10_3, nama_unit as nama_10 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 10) as kerjasama,
			(SELECT SUM(a.status LIKE '1') as app11_1, SUM(a.status LIKE '2') as app11_2, SUM(a.status LIKE '3') as app11_3, nama_unit as nama_11 FROM tbl_apps as a JOIN kategori_app as b ON a.kategori_apps=b.id_app WHERE a.kategori_apps = 11) as pengasuh,
			(SELECT SUM(status LIKE '1') as aktif, SUM(status LIKE '2') as tdk_digunakan, SUM(status LIKE '3') as tdk_aktif, COUNT(*) as total FROM tbl_apps) as total")->result();
		
		return $result;
	}

	public function angkatan_31()
	{

		$result = $this->db->query("SELECT SUM(status = 'turuntingkat') as turuntingkat FROM hukuman WHERE angkatan='31'")->result();
		return $result;
	
	}

	public function angkatan_30()
	{
		$result = $this->db->query("SELECT SUM(status = 'turuntingkat') as turuntingkat FROM hukuman WHERE angkatan='30'")->result();
		return $result;
	}

	public function angkatan_29()
	{
		$result = $this->db->query("SELECT SUM(status = 'turuntingkat') as turuntingkat FROM hukuman WHERE angkatan='29'")->result();
		return $result;
	}

	public function angkatan_28()
	{
		$result = $this->db->query("SELECT SUM(status = 'turuntingkat') as turuntingkat FROM hukuman WHERE angkatan='28'")->result();
		return $result;
	}

	public function app_perpus()
	{
		$perpus = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 1 AND status= 1 ")->result();

		return $perpus;
	}

	public function app_akademik()
	{
		$akademik = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 2 AND status= 1")->result();

		return $akademik;
	}

	public function app_keuangan()
	{
		$keuangan = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 3 AND status= 1")->result();

		return $keuangan;
	}

	public function app_riset()
	{
		$riset = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 4 AND status= 1")->result();

		return $riset;
	}

	public function app_tp()
	{
		$tp = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 5 AND status= 1")->result();

		return $tp;
	}

	public function app_keprajaan()
	{
		$keprajaan = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 6 AND status= 1")->result();

		return $keprajaan;
	}

	public function app_pascasarjana()
	{
		$pascasarjana = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 7 AND status= 1")->result();

		return $pascasarjana;
	}

	public function app_pddikti()
	{
		$pddikti = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 8 AND status= 1")->result();

		return $pddikti;
	}

	public function app_kepegawaian()
	{
		$result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 9 AND status= 1")->result();

		return $result;
	}
	
	public function app_kerjasama()
	{
		$result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 10 AND status= 1")->result();

		return $result;
	}

	public function app_pengasuhan()
	{
		$result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 11 AND status= 1")->result();

		return $result;
	}

	public function get_span()
	{	
		$result = $this->db->query("SELECT SUM(pagu_t) AS pagu, sum(realisasi_t) as realisasi
			FROM tbl_span
			GROUP BY created_date
			ORDER BY created_date DESC LIMIT 1");

		return $result;
	}

	public function get_span_jatinangor(){
		$result = $this->db->query("SELECT CONCAT(FORMAT(100*(real_peg+real_mod+real_bar)/(pagu_peg+pagu_mod+pagu_bar), 2), '%') as persentase_t FROM tbl_spanint WHERE satker = 448302 ORDER BY created_at DESC LIMIT 1")->result(); 

		return $result;
	}

	public function get_all_span_biro()
	{	
		$years = date('Y');
		
		$result = $this->db->query("SELECT alias, CONCAT(FORMAT(100*(real_peg+real_mod+real_bar)/(pagu_peg+pagu_mod+pagu_bar), 2), '%') as persentase_t FROM tbl_spanint JOIN tbl_satker_biro ON satker = kode_satker_biro  WHERE LENGTH(satker) = 4 AND created_at LIKE '%$years%' ORDER BY created_at DESC, alias ASC LIMIT 4")->result();

		return $result;
	}

	public function get_all_pok_biro()
	{	
		$result = $this->db->query("SELECT (100*sum(realisasi)/sum(pagu)) as persen FROM out_pok")->result();

		return $result;
	}

	public function get_all_sas()
	{	
		$result = $this->db->query("SELECT (100*sum(output_sas.realisasi)/sum(output_sas.pagu)) as persen FROM output_sas JOIN tbl_satker ON output_sas.kode_satker = tbl_satker.kode_satker")->result();

		return $result;
	}

	public function get_praja()
	{ 
		$result = $this->db->query("SELECT * FROM praja")->result();

		return $result;
	}

	public function get_jk_praja()
	{ 
		$result = $this->db->query("SELECT SUM(jk = 'p') AS jumlahP, SUM(jk = 'l') AS jumlahL FROM praja")->result();

		return $result;
	}
	
	public function jumlah_praja()
	{
		$praja = $this->db->query("SELECT count(*) as praja from praja WHERE status='aktif'")->result();

		return $praja;
	}
	public function hukuman()
	{
		$result = $this->db->query("SELECT SUM(status = 'diberhentikan') as berhenti FROM hukuman")->result();

		return $result;
	}
	
	public function status_praja()
	{
		$result = $this->db->query("SELECT SUM(status = 'turuntingkat') as tt, SUM(status = 'aktif') as aktif, SUM(status = 'cuti') as cuti FROM praja")->result();

		return $result;
  	}

	public function angkatan_praja()
	{
		$result = $this->db->query("SELECT SUM(angkatan = '31') as angkatan31, SUM(angkatan = '30') as angkatan30, SUM(angkatan = '29') as angkatan29, SUM(angkatan = '28') as angkatan28 FROM praja where status='aktif'")->result();

		return $result;
	}
	
	public function get_rank_persen() {
		
		return $this->db->query("SELECT CONCAT(ROUND(SUM((real_peg + real_bar + real_mod)) / SUM((pagu_peg + pagu_bar + pagu_mod)) * 100, 2), '%') AS persen FROM
			(SELECT * FROM tbl_rank ORDER BY created_at DESC LIMIT 13) t")->row_array();
	}

	public function get_rank_ipdn() {
		return $this->db->query("SELECT created_at, rank FROM
			(SELECT @rank:=@rank+1 AS rank, nama, created_at, satker,
			100 * (real_peg + real_bar + real_mod) / (pagu_peg + pagu_bar + pagu_mod) AS per_tot
			FROM
			tbl_rank, (SELECT @rank := 0) r
			ORDER BY created_at DESC, per_tot DESC LIMIT 13
			) t
			WHERE satker = '448302'")->row_array();
	}

	public function get_span_ipdn_sementara() {
		return $this->db->query("SELECT ROUND(100 * (real_peg + real_bar + real_mod) / (pagu_peg + pagu_bar + pagu_mod), 2) AS persentase_span FROM tbl_rank WHERE satker = '448302' ORDER BY created_at DESC LIMIT 1")->row_array();
	}
	
}
