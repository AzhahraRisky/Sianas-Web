<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('admin/Mobil_model', 'mobil');
        $this->load->model('admin/Riwayat_model', 'riwayat');
        $this->CI = &get_instance();
    }

    public function index()
    {
        $data['session'] = $this->session->userdata('nama');
        $data['jam_masuk'] = $this->session->userdata('jam_masuk');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
        $data['totalproses'] = $this->riwayat->countAllSurat();
        $data['riwayat'] = $this->riwayat->getAllRiwayatByStatus();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function mobil()
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

    public function riwayat()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
        $data['mobil'] = $this->mobil->getAllMobil();
        $data['riwayat'] = $this->riwayat->getAllRiwayat();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/riwayat', $data);
        $this->load->view('admin/template/footer', $data);
    }
}
