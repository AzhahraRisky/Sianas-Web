<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Perawatan_model', 'perawatan');
		$this->load->model('admin/Sopir_model', 'sopir');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['perawatan'] = $this->perawatan->getAllPerawatan();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/perawatan/perawatan', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function tambah()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
		$data['perawatan'] = $this->sopir->tambahPerawatanMobil();

		$this->form_validation->set_rules('perawatan', 'Perawatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('sopir/template/header', $data);
			$this->load->view('sopir/template/topbar', $data);
			$this->load->view('sopir/perawatan/tambah', $data);
			$this->load->view('sopir/template/footer', $data);
		} else {

			$data['perawatan'] = $this->perawatan->tambahPerawatan();
			$this->session->set_flashdata('success', 'Ditambahkan!');
			redirect('perawatan');
		}
	}
	public function hapus($no_perawatan)
	{
		$data['no_perawatan'] = $this->perawatan->hapusPerawatan($no_perawatan);
		$this->session->set_flashdata('success', 'Dihapus');
		redirect('perawatan');
	}
	public function ubah($no_perawatan)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['perawatan'] = $this->perawatan->getPerawatanById($no_perawatan);

		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('perawatan', 'Perawatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/perawatan/ubah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['perawatan'] = $this->perawatan->ubahPerawatan();
			$this->session->set_flashdata('success', 'Diubah!');
			redirect('perawatan');
		}
	}

	public function service()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
		$data['service'] = $this->perawatan->getAllService();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/sevice/service', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function konfirmasi($id)
	{
		$data = [

			'konfirmasi' => $this->input->post('konfirmasi')
		];
		$this->db->where('no_service', $id);
		$this->db->update('service', $data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Service Berhasil Di Edit</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
