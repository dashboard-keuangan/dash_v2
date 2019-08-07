<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('date');
		$this->load->model('m_user', '', TRUE);
		$this->load->model('m_keuangan', '', TRUE);
		if (!$this->session->userdata('dash_keu_id')) {
			redirect('auth','location');
		}
	  }
	  
	public function index()	{
		$data['pemasukan_total'] = $this->m_keuangan->get_total_masuk();
		$data['pengeluaran_total'] = $this->m_keuangan->get_total_keluar();
		$tgl = date("Y-m-d");
		$data['pemasukan_hari'] = $this->m_keuangan->get_total_masuk_hari($tgl);
		$data['pengeluaran_hari'] = $this->m_keuangan->get_total_keluar_hari($tgl);
		$this->load->view('index',$data);
	}

	public function team() {
		$this->load->view('team');
	}

	public function profile() {
		$id = $this->session->userdata('dash_keu_id');
		$data['profil'] = $this->m_user->get_user_by_id($id);
		$this->load->view('profile', $data);
	}

	public function act_update_prof() {
		$id = $this->session->userdata('dash_keu_id');
		$data['username'] = $this->input->post('username');
		$data['nama'] = $this->input->post('nama');
		$data['email'] = $this->input->post('email');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['no_telp'] = $this->input->post('no_telp');
		$data['alamat'] = $this->input->post('alamat');
		$data['bio'] = $this->input->post('bio');
		$data['skill'] = $this->input->post('skill');
		$data['education'] = $this->input->post('education');
		$data['notes'] = $this->input->post('notes');

		$this->m_user->update_user($data, $id);
		$this->session->set_flashdata('update_berhasil', TRUE);
		$this->session->set_userdata('dash_keu_nama', $data['nama']);
		redirect('/', 'location');
	}

	public function settings() {
		if ($this->input->post()){
			if ($this->input->post('submit1')){
				if (($this->input->post('password0') && $this->input->post('password')) == '') {
					$this->session->set_flashdata('ubahpass_kosong', TRUE);
					redirect('/', 'location');
				} elseif ($this->input->post('password0') == $this->input->post('password')) {
					$id = $this->session->userdata('dash_keu_id');
					$data['password'] = sha1($this->input->post('password0'));
		
					$this->m_user->update_user($data, $id);
					$this->session->set_flashdata('ubahpass_berhasil', TRUE);
					redirect('/', 'location');
				} else {
					$this->session->set_flashdata('ubahpass_gagal', TRUE);
					redirect('pages/settings', 'location');
				}
			} else {
				if ($this->input->post('jawaban')) {
					$id = $this->session->userdata('dash_keu_id');
					$data['pertanyaan'] = $this->input->post('pertanyaan');
					$data['jawaban'] = $this->input->post('jawaban');
	
					$this->m_user->update_user($data, $id);
					$this->session->set_flashdata('security_ok', TRUE);
					redirect('/', 'location');
				} else {
					$this->session->set_flashdata('security_kosong', TRUE);
					redirect('/', 'location');
				}
			}
		}
		$id = $this->session->userdata('dash_keu_id');
		$data['profil'] = $this->m_user->get_user_by_id($id);
		$this->load->view('settings', $data);
	}

	public function chart() {
		$this->load->view('chart');
	}

	public function lap_harian() {
		$data['report'] = $this->m_keuangan->report();
		$this->load->view('laporan_harian', $data);
	}

	public function blank() {
		$this->load->view('blank');
	}

	public function act_register() {
		if ($this->input->post()) {
		  $data['username'] = $this->input->post('username');
		  $data['nama'] = $this->input->post('nama');
		  $data['password'] = sha1($this->input->post('password'));
		  $data['password-v'] = sha1($this->input->post('password-v'));
		  if ($data['password']==$data['password-v']){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'password', 'is_unique[user.username]');
			if ($this->form_validation->run()) {
			  $this->m_user->add_user($data);
			  $this->session->set_flashdata('register_ok', 'Success!');
			  redirect('auth', 'location');
			} else {
			  $this->session->set_flashdata('register_fail', 'Failed! Username exist!');
			  redirect('auth/register', 'location');
			}
		  } else {
			$this->session->set_flashdata('register_fail_p', 'Failed! Password does not match');
			redirect('auth/register', 'location');
		  }
		}
	}

	public function pemasukan() {
		if ($this->input->post()) {
			$data['tanggal'] = $this->input->post('tanggal');
			$data['customer'] = $this->input->post('customer');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['biaya'] = $this->input->post('biaya');
			$data['no_kwitansi'] = $this->input->post('no_kwitansi');

			$this->m_keuangan->add_pemasukan($data);
			$this->session->set_flashdata('add_pem_ok', 'Success!');
			redirect('pages/pemasukan', 'refresh');
		}
		$tgl = date("Y-m-d");
		$data['pemasukan'] = $this->m_keuangan->get_pemasukan($tgl);
		$data['total'] = $this->m_keuangan->get_total_masuk_hari($tgl);
		$this->load->view('pemasukan', $data);
	}

	public function pengeluaran() {
		if ($this->input->post()) {
			$data['no_kwitansi'] = $this->input->post('no_kwitansi');
			$data['tanggal'] = $this->input->post('tanggal');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['jumlah'] = $this->input->post('jumlah');
			$data['harga_satuan'] = $this->input->post('harga_satuan');

			$this->m_keuangan->add_pengeluaran($data);
			$this->session->set_flashdata('add_peng_ok', 'Success!');
			redirect('pages/pengeluaran', 'refresh');
		}
		$tgl = date("Y-m-d");
		$data['totals'] = $this->m_keuangan->get_total_keluar_hari($tgl);
		
		$data['pengeluaran'] = $this->m_keuangan->get_pengeluaran($tgl);
		$this->load->view('pengeluaran',$data);
	}

	public function rekapitulasi() {
		if ($this->input->post()){
			$awal = $this->input->post('tanggal_awal');
			$akhir = $this->input->post('tanggal_akhir');
			$cat = $this->input->post('kategori');
			$data['rekap'] = $this->m_keuangan->rekapitulasi($awal,$akhir,$cat);
			$this->load->view('rekapitulasi', $data);
		} else {
			$this->load->view('rekapitulasi');
		}
	}

	public function search() {
		$keyword = $this->input->get('q');
		$tabel = $this->input->get('kategori');
		
		$data['results'] = $this->m_keuangan->pencarian($keyword, $tabel);
		$this->load->view('search',$data);
	}
	
	public function delete_masuk($id) {
		$this->m_keuangan->delete_pemasukan($id);
		$this->session->set_flashdata('delete_ok', TRUE);
		redirect('pages/pemasukan', 'location');
	}

	public function delete_keluar($id) {
		$this->m_keuangan->delete_pengeluaran($id);
		$this->session->set_flashdata('delete_ok', TRUE);
		redirect('pages/pengeluaran', 'location');
	}

	public function edit_data_masuk($id) {
		if ($this->input->post()){
			$data['tanggal'] = $this->input->post('tanggal');
			$data['customer'] = $this->input->post('customer');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['biaya'] = $this->input->post('biaya');
			$data['no_kwitansi'] = $this->input->post('no_kwitansi');

			$this->m_keuangan->update_masuk($data, $id);
			$this->session->set_flashdata('update_ok', 'Success!');
			redirect('pages/pemasukan', 'location');
		}
		$data['edit'] = $this->m_keuangan->get_pem_by_id($id);
		$this->load->view('edit_data', $data);
	}

	public function edit_data_keluar($id) {
		if ($this->input->post()){
			$data['tanggal'] = $this->input->post('tanggal');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['harga_satuan'] = $this->input->post('harga_satuan');
			$data['jumlah'] = $this->input->post('jumlah');
			$data['no_kwitansi'] = $this->input->post('no_kwitansi');

			$this->m_keuangan->update_keluar($data, $id);
			$this->session->set_flashdata('update_ok', 'Success!');
			redirect('pages/pengeluaran', 'location');
		}
		$data['edit'] = $this->m_keuangan->get_peng_by_id($id);
		$this->load->view('edit_data', $data);
	}
	function detailharian_keluar($tanggal){
        $data=$this->m_keuangan->detailyuhu($tanggal);
        echo json_encode($data);
    }
    function detailharian_masuk($tanggal){
        $data=$this->m_keuangan->detailuhuy($tanggal);
        echo json_encode($data);
    }
}