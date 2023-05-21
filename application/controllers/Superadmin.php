<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
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
        $this->load->model('admin/Perawatan_model', 'perawatan');
        $this->load->model('admin/Sopir_model', 'sopir');
        $this->load->model('admin/Superadmin_model', 'superadmin');
        $this->CI = &get_instance();
    }
    public function index()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['riwayat'] = $this->riwayat->getAllRiwayatById($id);
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/dashboard', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function mobil()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['mobil'] = $this->mobil->getAllMobil();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/mobil/mobil', $data);
        $this->load->view('superadmin/template/footer', $data);
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
            $this->load->view('superadmin/template/header', $data);
            $this->load->view('superadmin/template/topbar', $data);
            $this->load->view('superadmin/mobil/tambah', $data);
            $this->load->view('superadmin/template/footer', $data);
        } else {

            $data['motor'] = $this->motor->tambahMotor();
            $this->session->set_flashdata('success', 'Ditambahkan!');
            redirect('motor');
        }
    }
    public function lihat($no_mobil)
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['mobil'] = $this->mobil->getMobilById($no_mobil);
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/mobil/lihat', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function ubah($no_mobil)
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['mobil'] = $this->mobil->getMobilById($no_mobil);

        $this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('no_rangka', 'No Rangka', 'required');
        $this->form_validation->set_rules('no_mesin', 'No Mesin', 'required');
        $this->form_validation->set_rules('no_stnk', 'No STNK', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('tgl_pjk', 'Tanggal Pajak', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('superadmin/template/header', $data);
            $this->load->view('superadmin/template/topbar', $data);
            $this->load->view('superadmin/mobil/ubah', $data);
            $this->load->view('superadmin/template/footer', $data);
        } else {

            $data['mobil'] = $this->mobil->ubahMobil();
            $this->session->set_flashdata('success', 'Diubah!');
            redirect('mobil');
        }
    }
    public function motor()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['motor'] = $this->motor->getAllMotor();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/motor/motor', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function riwayat()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['riwayat'] = $this->riwayat->getAllRiwayat();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/riwayat/riwayat', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function service()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['service'] = $this->perawatan->getAllService();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/sevice/service', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function perawatan()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['perawatan'] = $this->perawatan->getAllPerawatan();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/perawatan/perawatan', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
    public function anggota()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['anggota'] = $this->anggota->getAllAnggota();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/anggota/anggota', $data);
        $this->load->view('superadmin/template/footer', $data);
    }

    public function sopir()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['sopir'] = $this->sopir->getAllSopir();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/sopir/sopir', $data);
        $this->load->view('superadmin/template/footer', $data);
    }

    public function admin()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('superadmin', ['no_superadmin' => $id])->row_array();
        $data['admin'] = $this->superadmin->getAllAdmin();
        $this->load->view('superadmin/template/header', $data);
        $this->load->view('superadmin/template/sidebar', $data);
        $this->load->view('superadmin/template/topbar', $data);
        $this->load->view('superadmin/admin/admin', $data);
        $this->load->view('superadmin/template/footer', $data);
    }
}
