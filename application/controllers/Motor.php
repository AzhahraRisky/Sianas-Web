<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Motor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Motor_model', 'motor');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['motor'] = $this->motor->getAllMotor();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/motor/motor', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function tambah()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();

		$this->form_validation->set_rules('jenis_motor', 'Jenis Motor', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('tgl_pjk', 'Tanggal Pajak', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/motor/tambah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['motor'] = $this->motor->tambahMotor();
			$this->session->set_flashdata('success', 'Ditambahkan!');
			redirect('motor');
		}
	}
	public function hapus($no_motor)
	{
		$data['no_motor'] = $this->motor->hapusMotor($no_motor);
		$this->session->set_flashdata('success', 'Dihapus');
		redirect('motor');
	}
	public function ubah($no_motor)
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['motor'] = $this->motor->getMotorById($no_motor);

		$this->form_validation->set_rules('jenis_motor', 'Jenis Mobil', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('tgl_pjk', 'Tanggal Pajak', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/motor/ubah', $data);
			$this->load->view('admin/template/footer', $data);
		} else {

			$data['motor'] = $this->motor->ubahMotor();
			$this->session->set_flashdata('success', 'Diubah!');
			redirect('motor');
		}
	}
}
