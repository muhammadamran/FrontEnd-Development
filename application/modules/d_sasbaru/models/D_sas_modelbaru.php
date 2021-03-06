<?php
class D_sas_modelbaru extends CI_Model
{

    public function get_all_kampus()
    {
        $kampus = $this->db->query("SELECT tbl_satker.nama_satker as nama,  akun_sas.satker, akun_sas.id_b,SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN tbl_satker ON tbl_satker.kode_satker = akun_sas.satker ORDER BY akun_sas.satker");

        return $kampus;
    }
    public function get_kegiatan($kode)
    {
        $kegiatan = $this->db->query("SELECT kegiatan_sas.ket as nama, akun_sas.id_b as satker , SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN kegiatan_sas ON akun_sas.id_b = kegiatan_sas.id_b Where akun_sas.satker = $kode GROUP BY akun_sas.id_b ORDER BY akun_sas.id_b");
        return $kegiatan;
    }

    public function get_output($kegiatan)
    {
        $output = $this->db->query("SELECT outputnya_sas.ket as nama ,outputnya_sas.id_c, akun_sas.id_c as satker, SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN outputnya_sas ON outputnya_sas.id_c = akun_sas.id_c WHERE akun_sas.id_b = $kegiatan GROUP BY akun_sas.id_c ORDER BY akun_sas.id_c ");
        return $output;
    }

    public function get_suboutput($out)
    {
        $suboutput = $this->db->query("SELECT suboutput_sas.ket as nama, akun_sas.id_d as satker, SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN suboutput_sas ON suboutput_sas.id_d = akun_sas.id_d WHERE akun_sas.id_c = '$out' GROUP BY akun_sas.id_d ORDER BY akun_sas.id_d ");
        return $suboutput;
    }

    public function get_komponen($subout)
    {
        $komponen = $this->db->query("SELECT komponen_sas.ket as nama , akun_sas.id_e as satker, SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN komponen_sas ON komponen_sas.id_e = akun_sas.id_e WHERE akun_sas.id_d = '$subout' GROUP BY akun_sas.id_e ORDER BY akun_sas.id_e");
        return $komponen;
    }

    public function get_subkomponen($komp)
    {
        $subkomponen = $this->db->query("SELECT subkomponen_sas.ket as nama, akun_sas.id_f as satker, SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas JOIN subkomponen_sas ON akun_sas.id_f = subkomponen_sas.id_f WHERE akun_sas.id_e = '$komp' GROUP BY akun_sas.id_f ORDER BY akun_sas.id_f");
        return $subkomponen;
    }
    public function get_akun($subkomp)
    {
        $akun = $this->db->query("SELECT akun_sas.ket as nama, akun_sas.id_g as satker, SUM(akun_sas.pagu) as pagu, SUM(akun_sas.realisasi) as realisasi FROM akun_sas WHERE akun_sas.id_f = '$subkomp' GROUP BY akun_sas.id_g ORDER BY akun_sas.id_g");
        return $akun;
    }
}
