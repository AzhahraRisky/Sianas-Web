<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Anggota_model', 'anggota');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['anggota'] = $this->anggota->getAllAnggota();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/anggota/anggota', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function tambah()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();

		$this->form_validation->set_rules('subbag', 'Sub Bagian / Komisi', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telpon', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/anggota/tambah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['anggota'] = $this->anggota->tambahAnggota();
			$this->session->set_flashdata('success', 'Ditambahkan!');
			redirect('anggota');
		}
	}
	public function hapus($no_anggota)
	{
		$data['no_anggota'] = $this->anggota->hapusAnggota($no_anggota);
		$this->session->set_flashdata('success', 'Dihapus');
		redirect('anggota');
	}
	public function ubah($no_anggota)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['anggota'] = $this->anggota->getAnggotaById($no_anggota);

		$this->form_validation->set_rules('subbag', 'Sub Bagian / Komisi', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telp', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/anggota/ubah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['anggota'] = $this->anggota->ubahAnggota();
			$this->session->set_flashdata('success', 'Diubah!');
			redirect('anggota');
		}
	}
}
