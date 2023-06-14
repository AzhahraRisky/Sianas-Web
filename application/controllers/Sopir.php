<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sopir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('admin/Sopir_model', 'sopir');
        $this->load->model('admin/Mobil_model', 'mobil');
        $this->load->model('admin/Riwayat_model', 'riwayat');
        $this->load->model('admin/Perawatan_model', 'perawatan');
        $this->CI = &get_instance();
    }
    public function index()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['sopir'] = $this->sopir->getAllSopirByAdmin();
        $data['riwayat'] = $this->riwayat->getAllRiwayatByConfSopir($id);
        $this->load->view('sopir/template/header', $data);
        $this->load->view('sopir/template/sidebar', $data);
        $this->load->view('sopir/template/topbar', $data);
        $this->load->view('sopir/dashboard', $data);
        $this->load->view('sopir/template/footer', $data);
    }
    public function riwayat()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['mobil'] = $this->mobil->getAllMobil();
        $data['riwayat'] = $this->riwayat->getAllRiwayatByConf($id);
        $this->load->view('sopir/template/header', $data);
        $this->load->view('sopir/template/sidebar', $data);
        $this->load->view('sopir/template/topbar', $data);
        $this->load->view('sopir/riwayat', $data);
        $this->load->view('sopir/template/footer', $data);
    }

    public function jadwal()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['mobil'] = $this->mobil->getAllMobil();
        $data['riwayat'] = $this->riwayat->getAllRiwayatByConfSopir($id);
        $this->load->view('sopir/template/header', $data);
        $this->load->view('sopir/template/sidebar', $data);
        $this->load->view('sopir/template/topbar', $data);
        $this->load->view('sopir/jadwal', $data);
        $this->load->view('sopir/template/footer', $data);
    }

    public function edit_riwayat($id)
    {
        $data = [

            'konfirmasi_sopir' => $this->input->post('konfirmasi')
        ];
        $this->db->where('no_pengajuan', $id);
        $this->db->update('riwayat', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Riwayat Berhasil Di Edit</div>');
        redirect('sopir/riwayat');
    }

    public function riwayat_upload($id)
    {
        $date = substr(date('Ymd'), 2, 8);
        $config = array();
        $config['upload_path'] = './assets/data/bukti';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name']    = $date . '-' . $_FILES['bukti']['name'];

        $this->load->library('upload', $config, 'bukti');
        $this->bukti->initialize($config);
        $upload_bukti = $this->bukti->do_upload('bukti');

        if ($upload_bukti) {
            $data =  array(

                'bukti' => $this->bukti->data("file_name"),
                'konfirmasi_sopir' => 'Dikonfirmasi',
                'km_awal' => $this->input->post('awal'),
                'km_akhir' => $this->input->post('akhir'),
            );

            $this->db->where('no_pengajuan', $id);
            $this->db->update('riwayat', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Riwayat Berhasil Di Edit</div>');
            redirect('sopir/riwayat');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data Riwayat Tidak Berhasil Di Edit</div>');
            redirect('sopir/jadwal');
        }
    }

    public function riwayat_cancel($id)
    {
        $data = [

            'konfirmasi_sopir' => $this->input->post('konfirmasi')
        ];
        $this->db->where('no_pengajuan', $id);
        $this->db->update('riwayat', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Riwayat Berhasil Di Edit</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function perawatan()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['perawatan'] = $this->sopir->getAllPerawatanSopir($id);
        $this->load->view('sopir/template/header', $data);
        $this->load->view('sopir/template/sidebar', $data);
        $this->load->view('sopir/template/topbar', $data);
        $this->load->view('sopir/perawatan/perawatan', $data);
        $this->load->view('sopir/template/footer', $data);
    }
    public function tambahperawatan()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['perawatan'] = $this->sopir->sopirPerawatan($id);

        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('perawatan', 'Perawatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sopir/template/header', $data);
            $this->load->view('sopir/template/topbar', $data);
            $this->load->view('sopir/perawatan/tambah', $data);
            $this->load->view('sopir/template/footer', $data);
        } else {

            $data['perawatan'] = $this->sopir->tambahPerawatanMobil();
            $this->session->set_flashdata('success', 'Ditambahkan!');
            redirect('sopir/perawatan');
        }
    }

    public function editprofil()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['sopir'] = $this->sopir->getSopirByEdit($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telpon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sopir/template/header', $data);
            $this->load->view('sopir/template/topbar', $data);
            $this->load->view('sopir/editprofil', $data);
            $this->load->view('sopir/template/footer', $data);
        } else {

            $data['sopir'] = $this->sopir->editProfil();
            $this->session->set_flashdata('success', 'Diubah!');
            redirect('sopir');
        }
    }

    public function sopir()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
        $data['sopir'] = $this->sopir->getAllSopir();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/sopir/sopir', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function tambah()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();

        $this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required');
        $this->form_validation->set_rules('no_plat', 'No Polisi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telpon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/topbar', $data);
            $this->load->view('admin/sopir/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {

            $data['sopir'] = $this->sopir->tambahSopir();
            $this->session->set_flashdata('success', 'Ditambahkan!');
            redirect('sopir/sopir');
        }
    }

    public function hapus($no_mobil)
    {
        $data['no_mobil'] = $this->sopir->hapusSopir($no_mobil);
        $this->session->set_flashdata('success', 'Dihapus');
        redirect('sopir/sopir');
    }

    public function ubah($no_mobil)
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
        $data['sopir'] = $this->sopir->getAnggotaById($no_mobil);

        $this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required');
        $this->form_validation->set_rules('no_plat', 'No Polisi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telp', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/topbar', $data);
            $this->load->view('admin/sopir/ubah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {

            $data['sopir'] = $this->sopir->ubahSopir();
            $this->session->set_flashdata('success', 'Diubah!');
            redirect('sopir/sopir');
        }
    }

    public function ubahPerawatan($no_perawatan)
    {
        $data['session'] = $this->session->userdata('nama');
		$id = $this->session->userdata('userid');
		$data['nama'] = $this->db->get_where('admin', ['no_admin' => $id])->row_array();
		$data['perawatan'] = $this->sopir->getPerawatanById($no_perawatan);

		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('perawatan', 'Perawatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('sopir/template/header', $data);
			$this->load->view('sopir/template/topbar', $data);
			$this->load->view('sopir/perawatan/ubah', $data);
			$this->load->view('sopir/template/footer', $data);
		} else {

			$data['perawatan'] = $this->sopir->ubahPerawatan();
			$this->session->set_flashdata('success', 'Diubah!');
			redirect('sopir/perawatan');
		}
    }

    public function service()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['service'] = $this->sopir->getAllServiceById($id);
        $this->load->view('sopir/template/header', $data);
        $this->load->view('sopir/template/sidebar', $data);
        $this->load->view('sopir/template/topbar', $data);
        $this->load->view('sopir/sevice/service', $data);
        $this->load->view('sopir/template/footer', $data);
    }

    public function service_tambah()
    {
        $data['session'] = $this->session->userdata('nama');
        $id = $this->session->userdata('userid');
        $data['nama'] = $this->db->get_where('mobil', ['no_mobil' => $id])->row_array();
        $data['service'] = $this->sopir->getAllServiceByTambah($id);

        $this->form_validation->set_rules('jenis_mobil', 'jenis_mobil', 'required');
        $this->form_validation->set_rules('no_plat', 'No', 'required');
        $this->form_validation->set_rules('tgl_service', 'tgl_service', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sopir/template/header', $data);
            $this->load->view('sopir/template/sidebar', $data);
            $this->load->view('sopir/template/topbar', $data);
            $this->load->view('sopir/sevice/tambah', $data);
            $this->load->view('sopir/template/footer', $data);
        } else {
            if (!empty($_FILES["surat"]["name"])) {
                $date = substr(date('Ymd'), 2, 8);
                $config = array();
                $config['upload_path'] = './assets/data/service';
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['file_name']    = $date . '-' . $_FILES['surat']['name'];

                $this->load->library('upload', $config, 'surat');
                $this->surat->initialize($config);
                $upload_surat = $this->surat->do_upload('surat');


                if ($upload_surat) {
                    $data =  array(
                        'bukti' => $this->surat->data("file_name"),
                        'tgl_service' => $this->input->post('tgl_service'),
                        'konfirmasi' => $this->input->post('konfirmasi'),
                        'no_mobil' => $this->input->post('no_mobil'),

                    );

                    $this->db->insert('service', $data);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Riwayat Baru Telah Diupdate!</div>');
                    redirect('sopir/service');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Riwayat Baru Gagal, silahkan ulangi pengisian form!</div>');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File Masih Kosong , silahkan ulangi pengisian form!</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }

            $data['sopir'] = $this->sopir->tambahService();
            $this->session->set_flashdata('success', 'Diubah!');
            redirect('sopir/service');
        }
    }
}
