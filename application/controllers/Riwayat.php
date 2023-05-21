<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/Riwayat_model', 'riwayat');
		$this->CI = &get_instance();
	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['riwayat'] = $this->riwayat->getAllRiwayat();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/riwayat', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function edit_riwayat($id)
	{
		$data = [

			'konfirmasi' => $this->input->post('konfirmasi')
		];
		$this->db->where('no_pengajuan', $id);
		$this->db->update('riwayat', $data);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Riwayat Berhasil Di Edit</div>');
		redirect('riwayat');
	}
}
