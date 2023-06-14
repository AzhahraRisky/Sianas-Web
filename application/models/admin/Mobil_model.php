<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_model extends CI_Model
{
    public function getAllMobil()
    {
        $query = "SELECT * from mobil";
        return $this->db->query($query)->result_array();
    }

    public function getAllMobilTersedia()
    {
        $query = "SELECT m.no_mobil,m.jenis_mobil,m.no_plat,m.nama from mobil m where m.status = 'Tidak_digunakan'";
        return $this->db->query($query)->result_array();
    }


    public function hapusMobil($no_mobil)
    {
        $this->db->where('no_mobil', $no_mobil);
        $this->db->delete('mobil');
    }

    public function getMobilById($no_mobil)
    {
        return $this->db->get_where('mobil', ['no_mobil' => $no_mobil])->row_array();
    }

    public function ubahMobil()
    {
        $data = [
            "jenis_mobil" => $this->input->post('jenis_mobil', true),
            "no_plat" => $this->input->post('no_plat', true),
            "no_rangka" => $this->input->post('no_rangka', true),
            "no_mesin" => $this->input->post('no_mesin', true),
            "no_stnk" => $this->input->post('no_stnk', true),
            "warna" => $this->input->post('warna', true),
            "tgl_pjk" => $this->input->post('tgl_pjk', true), 
            "status" => $this->input->post('status')
        ];

        $this->db->where('no_mobil', $this->input->post('no_mobil'));
        $this->db->update('mobil', $data);
    }

    public function getRiwayatById($id)
    {
        return $this->db->get_where('riwayat', ['no_anggota' => $id])->result_array();
    }
}
