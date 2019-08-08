<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('date');
		$this->load->model('m_yuhu', '', TRUE);
		//if (!$this->session->userdata('dash_keu_id')) {
		//	redirect('auth','location');
		//}
	}

	public function index() {
		$data['sekolah'] = $this->m_yuhu->get_sekolah();
		$this->load->view('home/index', $data);
	}
	
	public function home() {
		$this->load->view('home/home');
	}
	public function sekolah($id) {
		$data['sekolah'] = $this->m_yuhu->get_nama_sek($id);
		$data['tot_biaya'] = $this->m_yuhu->get_tot_biaya($id);
		$data['tot_siswa'] = $this->m_yuhu->get_total_siswa($id);
		$this->load->view('home/sekolah', $data);
	}
	public function Yayasan() {
		$data['nama_yayasan'] = $this->m_yuhu->get_nama_sek(6);
		$data['nama_smp'] = $this->m_yuhu->get_nama_sek(1);
		$data['nama_sma'] = $this->m_yuhu->get_nama_sek(2);
		$data['nama_smk'] = $this->m_yuhu->get_nama_sek(3);
		$data['tot_yayasan'] = $this->m_yuhu->get_tot_yayasan();
		$data['tot_smp'] = $this->m_yuhu->get_tot_biaya(1);
		$data['tot_sma'] = $this->m_yuhu->get_tot_biaya(2);
		$data['tot_smk'] = $this->m_yuhu->get_tot_biaya(3);
		// total siswa
		$data['siswa_smp'] = $this->m_yuhu->get_total_siswa(1);
		$data['siswa_sma'] = $this->m_yuhu->get_total_siswa(2);
		$data['siswa_smk'] = $this->m_yuhu->get_total_siswa(3);
		$this->load->view('home/yayasan', $data);
	}
	public function pemasukan(){
		$data['pilih_sekolah'] = $this->m_yuhu->get_sekolah();
		$this->load->view('pemasukan/pemasukan', $data);
	}
	public function show_data(){
		$data['data'] = $this->m_yuhu->get_siswa();
		$this->load->view('pemasukan/list_siswa', $data);
	}
	function show_data_by_id($id_sekolah){
    	$data['data'] = $this->m_yuhu->get_siswa_by_id_sekolah($id_sekolah);
    	$this->load->view('pemasukan/list_siswa', $data);
    }
    function semi_detail($id){
    	$data['data'] = $this->m_yuhu->semi_detail($id);
    	$this->load->view('pemasukan/semi_siswa', $data);
    }
    public function detailii($aku,$kamu) {
		$data['data'] = $this->m_yuhu->detailii($aku,$kamu);
		$this->load->view('pemasukan/detail_pembayaran', $data);
	}
	public function laporan_siswa(){
		$data['pilih_sekolah'] = $this->m_yuhu->get_sekolah();
		$this->load->view('pemasukan/laporan_siswa',$data);
	}
	public function show_tingkat($nis){
		$data = $this->m_yuhu->get_tingkat($nis);
		echo json_encode($data);
	}
	public function printkan($nis,$tingkat){
		$data['data'] = $this->m_yuhu->get_print($nis,$tingkat);
		$this->load->view('pemasukan/print', $data);

	}
	public function a($nis,$tingkat) {
		$data['data'] = $this->m_yuhu->get_print($nis,$tingkat);
		$this->load->view('pemasukan/a', $data);
	}
}