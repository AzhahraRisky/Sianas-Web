<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Mobil_model', 'mobil');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['mobil'] = $this->mobil->getAllMobil();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/mobil/mobil', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function hapus($no_mobil)
	{
		$data['no_mobil'] = $this->mobil->hapusMobil($no_mobil);
		$this->session->set_flashdata('success', 'Dihapus');
		redirect('mobil');
	}
	public function ubah($no_mobil)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['mobil'] = $this->mobil->getMobilById($no_mobil);

		$this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('no_rangka', 'No Rangka', 'required');
		$this->form_validation->set_rules('no_mesin', 'No Mesin', 'required');
		$this->form_validation->set_rules('no_stnk', 'No STNK', 'required');
		$this->form_validation->set_rules('warna', 'Warna', 'required');
		$this->form_validation->set_rules('tgl_pjk', 'Tanggal Pajak', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/mobil/ubah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['mobil'] = $this->mobil->ubahMobil();
			$this->session->set_flashdata('success', 'Diubah!'); 
			redirect('mobil');
		}
	}
	public function lihat($no_mobil)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['mobil'] = $this->mobil->getMobilById($no_mobil);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/mobil/lihat', $data);
		$this->load->view('admin/template/footer', $data);
	}
}
