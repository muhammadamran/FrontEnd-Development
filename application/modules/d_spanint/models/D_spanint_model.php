<?php
class D_spanint_model extends CI_Model{

  public function get_spanint_kampus() {

	$result = $this->db->query("SELECT concat(satker, ' | ', nama) AS nama, nama AS alias, alias AS aliass,
		pagu_peg, real_peg, (pagu_peg - real_peg) AS sisa_peg, concat(round((100 * real_peg / pagu_peg), 2), '%') AS per_peg,
		pagu_bar, real_bar, (pagu_bar - real_bar) AS sisa_bar, concat(round((100 * real_bar / pagu_bar), 2), '%') AS per_bar,
		pagu_mod, real_mod, (pagu_mod - real_mod) AS sisa_mod, concat(round((100 * real_mod / pagu_mod), 2), '%') AS per_mod,
		@pagu_tot:=pagu_peg + pagu_bar + pagu_mod AS pagu_tot,
		@real_tot:=real_peg + real_bar + real_mod AS real_tot,
		@pagu_tot - @real_tot AS sisa_tot,
		concat(round((100 * @real_tot / @pagu_tot), 2), '%') AS per_tot
		FROM tbl_spanint JOIN tbl_satker ON tbl_spanint.satker = tbl_satker.kode_satker
		WHERE length(satker) > 4 ORDER BY created_at DESC, satker ASC LIMIT 8");

	return $result;
  }

  public function get_spanint_biro() {

	$years = date('Y');

	$result = $this->db->query("SELECT concat(satker, ' | ', nama) AS nama, alias, alias AS aliass,
		pagu_peg, real_peg, (pagu_peg - real_peg) AS sisa_peg, concat(round((100 * real_peg / pagu_peg), 2), '%') AS per_peg,
		pagu_bar, real_bar, (pagu_bar - real_bar) AS sisa_bar, concat(round((100 * real_bar / pagu_bar), 2), '%') AS per_bar,
		pagu_mod, real_mod, (pagu_mod - real_mod) AS sisa_mod, concat(round((100 * real_mod / pagu_mod), 2), '%') AS per_mod,
		@pagu_tot:=pagu_peg + pagu_bar + pagu_mod AS pagu_tot,
		@real_tot:=real_peg + real_bar + real_mod AS real_tot,
		@pagu_tot - @real_tot AS sisa_tot,
		concat(round((100 * @real_tot / @pagu_tot), 2), '%') AS per_tot
		FROM tbl_spanint JOIN tbl_satker_biro ON tbl_spanint.satker = tbl_satker_biro.kode_satker_biro
        WHERE length(satker) = 4 AND created_at LIKE '%$years%' ORDER BY created_at DESC, satker ASC LIMIT 4");

	return $result;
  }

  public function get_date() {
  	return $this->db->query("SELECT created_at FROM tbl_spanint ORDER BY created_at DESC LIMIT 1")->row_array();
  }
}