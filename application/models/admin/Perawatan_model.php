<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan_model extends CI_Model
{
    public function getAllPerawatan()
    {
        $query = "SELECT * from perawatan";
        return $this->db->query($query)->result_array();
    }

    public function tambahPerawatan()
    {
        $data = [
            "no_mobil" => $this->input->post('no_mobil', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "no_plat" => $this->input->post('no_plat', true),
            "perawatan" => $this->input->post('perawatan', true),
            "surat" => $this->input->post('surat', true),
        ];

        $this->db->insert('perawatan', $data);
    }

    public function hapusPerawatan($no_perawatan)
    {
        $this->db->where('no_perawatan', $no_perawatan);
        $this->db->delete('perawatan');
    }

    public function getPerawatanById($no_perawatan)
    {
        return $this->db->get_where('perawatan', ['no_perawatan' => $no_perawatan])->row_array();
    }

    public function ubahPerawatan()
    {
        $data = [
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "no_plat" => $this->input->post('no_plat', true),
            "perawatan" => $this->input->post('perawatan', true),
        ];

        $this->db->where('no_perawatan', $this->input->post('no_perawatan'));
        $this->db->update('perawatan', $data);
    }

    public function getAllService()
    {
        $query = "SELECT s.no_service, s.bukti, s.tgl_service, s.konfirmasi, m.jenis_mobil, m.no_plat from service s, mobil m where s.no_mobil = m.no_mobil";
        return $this->db->query($query)->result_array();
    }
}
