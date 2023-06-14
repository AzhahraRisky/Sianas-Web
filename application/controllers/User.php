<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Mobil_model', 'mobil');
		$this->load->model('admin/Motor_model', 'motor');
		$this->load->model('admin/Riwayat_model', 'riwayat');
		$this->load->model('admin/Anggota_model', 'anggota');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$data['jam_masuk'] = $this->session->userdata('jam_masuk');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['riwayat'] = $this->riwayat->getAllRiwayatById($id);
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function mobil()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['mobil'] = $this->mobil->getAllMobil();
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/mobil', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function lihat($no_mobil)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['mobil'] = $this->mobil->getMobilById($no_mobil);
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/lihat', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function motor()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['motor'] = $this->motor->getAllMotor();
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/motor', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function riwayat()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['mobil'] = $this->mobil->getAllMobil();
		$data['riwayat'] = $this->riwayat->getAllRiwayatById($id);
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/riwayat/riwayat', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function pengajuan()
	{

		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['mobil'] = $this->mobil->getAllMobilTersedia();
		$data['riwayat'] = $this->riwayat->getAllRiwayatById($id);
		$this->load->view('user/template/header', $data);
		$this->load->view('user/template/sidebar', $data);
		$this->load->view('user/template/topbar', $data);
		$this->load->view('user/riwayat/tambah', $data);
		$this->load->view('user/template/footer', $data);
	}

	public function edit_riwayat($id)
	{
		$data = [

			'konfirmasi' => $this->input->post('konfirmasi')
		];
		$this->db->where('no_pengajuan', $id);
		$this->db->update('riwayat', $data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Riwayat Berhasil Di Edit</div>');
		redirect('user/riwayat');
	}

	public function tambah_riwayat()
	{
		$data['judul'] = 'Form Tambah Data Riwayat';
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['mobil'] = $this->mobil->getAllMobilTersedia();
		$data['con'] = mysqli_connect('localhost', 'root', '', $this->db->database);

		$this->form_validation->set_rules('jenis', 'Jenis Mobil', 'required');
		$this->form_validation->set_rules('tujuan_1', 'Tujuan 1', 'required');
		$this->form_validation->set_rules('tujuan_2', 'Tujuan 2', 'required');
		$this->form_validation->set_rules('tujuan_2', 'Tujuan 2', 'required');
		$this->form_validation->set_rules('tujuan_3', 'Tujuan 3', 'required');
		$this->form_validation->set_rules('alamat_1', 'Alamat 1', 'required');
		$this->form_validation->set_rules('alamat_2', 'Alamat 2', 'required');
		$this->form_validation->set_rules('alamat_3', 'Alamat 3', 'required');
		$this->form_validation->set_rules('kota_1', 'Kota 1', 'required');
		$this->form_validation->set_rules('kota_2', 'Kota 2', 'required');
		$this->form_validation->set_rules('kota_3', 'Kota 3', 'required');
		$this->form_validation->set_rules('muatan', 'Penumpang', 'required');
		$this->form_validation->set_rules('tgl_digunakan', 'Tanggal Digunakan', 'required');
		$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/template/header', $data);
			$this->load->view('user/template/topbar', $data);
			$this->load->view('user/riwayat/tambah', $data);
			$this->load->view('user/template/footer', $data);
		} else {
			if (!empty($_FILES["surat"]["name"])) {
				$date = substr(date('Ymd'), 2, 8);
				$config = array();
				$config['upload_path'] = './assets/data/surat';
				$config['allowed_types'] = 'pdf';
				$config['file_name']    = $date . '-' . $_FILES['surat']['name'];

				$this->load->library('upload', $config, 'surat');
				$this->surat->initialize($config);
				$upload_surat = $this->surat->do_upload('surat');

				$data['mobil'] = $this->mobil->getAllMobilTersedia();
				// $nomobil = explode("-", $this->input->post('jenis'));
				// $no_mobil = $nomobil[0];

				// $this->db->select('no_sopir');
				// $this->db->from('mobil');
				// $this->db->where('no_mobil', $no_mobil);
				// $query = $this->db->get();
				// $no_sopir = $query->row()->no_sopir;


				if ($upload_surat) {
					$data =  array(
						'no_mobil' => $this->input->post('jenis'),
						'no_anggota' => $this->input->post('no_anggota'),
						'tujuan_1' => $this->input->post('tujuan_1'),
						'tujuan_2' => $this->input->post('tujuan_2'),
						'tujuan_3' => $this->input->post('tujuan_3'),
						'alamat_1' => $this->input->post('alamat_1'),
						'alamat_2' => $this->input->post('alamat_2'),
						'alamat_3' => $this->input->post('alamat_3'),
						'kota_1' => $this->input->post('kota_1'),
						'kota_2' => $this->input->post('kota_2'),
						'kota_3' => $this->input->post('kota_3'),
						'muatan' => $this->input->post('muatan'),
						'surat' => $this->surat->data("file_name"),
						'tgl_digunakan' => $this->input->post('tgl_digunakan'),
						'tgl_kembali' => $this->input->post('tgl_kembali'),
						'tgl_upload' => $this->input->post('tgl_upload'),
						'konfirmasi' => $this->input->post('konfirmasi'),
						'konfirmasi_sopir' => $this->input->post('konfirmasi_sopir'),
					);

					$this->db->insert('riwayat', $data);
					$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Riwayat Baru Telah Diupdate!</div>');
					redirect('user/riwayat');
				} else {
					$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Riwayat Baru Gagal, silahkan ulangi pengisian form!</div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File Masih Kosong , silahkan ulangi pengisian form!</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}

			$data['riwayat'] = $this->riwayat->tambahRiwayat();
			$this->session->set_flashdata('success', 'Ditambahkan!');
			redirect('riwayat');
		}
	}

	public function editprofil()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
		$data['anggota'] = $this->anggota->getAnggotaByEdit($id);

		$this->form_validation->set_rules('subbag', 'Sub Bagian / Komisi', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/template/header', $data);
			$this->load->view('user/template/topbar', $data);
			$this->load->view('user/editprofil', $data);
			$this->load->view('user/template/footer', $data);
		} else {

			$data['anggota'] = $this->anggota->editProfil();
			$this->session->set_flashdata('success', 'Diubah!');
			redirect('user');
		}
	}
}
