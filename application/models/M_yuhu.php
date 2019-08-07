<?php

class M_yuhu extends CI_Model 
{
	public function get_sekolah() {
		return $this->db->query("SELECT id_sekolah, Sekolah, nama_sekolah FROM mst_tb_sekolah")->result();
	}
	public function get_nama_sek($id) {
		$query = $this->db->query("SELECT nama_sekolah from mst_tb_sekolah where id_sekolah = $id")->result();
		foreach($query as $row) {
      return $row->nama_sekolah;
    }
	}
	public function get_tot_biaya($id) {
		$query = $this->db->query("SELECT SUM(Jumlah) as total
		FROM tb_histori_pembayaran WHERE id_sekolah = $id")->result_array();
		return $query[0]['total'];
	}
	public function get_tot_yayasan() {
		$query = $this->db->query("SELECT SUM(Jumlah) as total FROM tb_histori_pembayaran")->result_array();
		return $query[0]['total'];
	}
	public function semi_detail($id){
		$query = $this->db->query("SELECT
			`tb_histori_pembayaran`.`id_siswa`
    ,`tb_histori_pembayaran`.`no_kwitansi`
    ,SUM( `tb_histori_pembayaran`.`Jumlah`) AS Jumlah
    , `mst_tb_tingkat`.`Tingkat`
    , `tb_histori_pembayaran`.`Jenis`
FROM
    `tb_histori_pembayaran`
    INNER JOIN `mst_tb_tingkat` 
        ON (`tb_histori_pembayaran`.`id_sekolah` = `mst_tb_tingkat`.`id_sekolah`)
 WHERE id_siswa='$id'  GROUP BY Tingkat;");
		return $query->result();
	}
	public function detailii($aku,$kamu){
		$query =$this->db->query("SELECT
			`tb_histori_pembayaran`.`id_siswa`,
    `tb_histori_pembayaran`.`no_kwitansi`
    ,`tb_histori_pembayaran`.`Jumlah`
    , `mst_tb_tingkat`.`Tingkat`
    , `tb_histori_pembayaran`.`Jenis`
FROM
    `tb_histori_pembayaran`
    INNER JOIN `mst_tb_tingkat` 
        ON (`tb_histori_pembayaran`.`id_sekolah` = `mst_tb_tingkat`.`id_sekolah`)
 WHERE id_siswa='$aku' AND Tingkat ='$kamu';");
		return $query->result();
	}
	public function get_tingkat($nis){
		$tes = $this->db->query("SELECT
    `mst_tb_tingkat`.`Tingkat`
    , `mst_tb_tingkat`.`id_tingkat`
    , `mst_tb_sekolah`.`nama_sekolah`
FROM
    `mst_tb_sekolah`
    INNER JOIN `tb_siswa` 
        ON (`mst_tb_sekolah`.`id_sekolah` = `tb_siswa`.`id_sekolah`)
    INNER JOIN `tb_histori_kelas` 
        ON (`tb_siswa`.`id_siswa` = `tb_histori_kelas`.`id_siswa`)
    INNER JOIN `mst_tb_tingkat` 
        ON (`mst_tb_sekolah`.`id_sekolah` = `mst_tb_tingkat`.`id_sekolah`) AND (`tb_histori_kelas`.`id_tingkat` = `mst_tb_tingkat`.`id_tingkat`)
    WHERE `NIS`='$nis'");
    	return $tes->result();
	}
	public function get_print($nis,$tingkat){
		$query = $this->db->query("SELECT
    `tb_histori_pembayaran`.`no_kwitansi`
    , `tb_histori_pembayaran`.`Jumlah`
    , `tb_histori_pembayaran`.`Tanggal`
    , `tb_histori_pembayaran`.`Tanggal_Input`
    , `mst_tb_tingkat`.`Tingkat`
     , `tb_siswa`.`NIS`
FROM
    `tb_histori_pembayaran`
    INNER JOIN `mst_tb_tingkat` 
        ON (`tb_histori_pembayaran`.`id_tingkat` = `mst_tb_tingkat`.`id_tingkat`) AND (`tb_histori_pembayaran`.`id_sekolah` = `mst_tb_tingkat`.`id_sekolah`)
    INNER JOIN `tb_siswa` 
        ON (`tb_histori_pembayaran`.`id_siswa` = `tb_siswa`.`id_siswa`)
    INNER JOIN `mst_tb_sekolah` 
        ON (`mst_tb_sekolah`.`id_sekolah` = `mst_tb_tingkat`.`id_sekolah`)
 WHERE `tb_siswa`.`NIS`='$nis' AND `mst_tb_tingkat`.`id_tingkat`='$tingkat'");
		return $query->result();
	}
}