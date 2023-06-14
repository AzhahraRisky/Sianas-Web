<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sopir_model extends CI_Model
{
    public function getAllSopir()
    {
        $query = "SELECT m.jenis_mobil, m.no_mobil, m.no_plat, m.nama, m.alamat, m.no_hp, m.username, m.password from mobil m where m.role='3'";
        return $this->db->query($query)->result_array();
    }

    public function getAllSopirByAdmin()
    {
        $query = "SELECT  m.jenis_mobil, m.no_plat, m.nama, m.username, m.alamat, m.no_hp from mobil m";
        return $this->db->query($query)->result_array();
    }

    public function getAllSopirById()
    {
        $query = "SELECT  m.jenis_mobil, m.no_plat, m.nama, m.username, m.alamat from mobil m";
        return $this->db->query($query)->result_array();
    }

    public function getAllServiceById($id)
    {
        $query = "SELECT s.no_service, s.bukti, s.tgl_service, s.konfirmasi, m.jenis_mobil, m.no_plat from service s, mobil m where s.no_mobil = m.no_mobil and m.no_mobil = $id";
        return $this->db->query($query)->result_array();
    }

    public function getAllServiceByTambah($id)
    {
        $query = "SELECT jenis_mobil, no_mobil, no_plat from mobil  where no_mobil = $id";
        return $this->db->query($query)->row_array();
    }

    public function tambahSopir()
    {
        $data = [
            "jenis_mobil" => $this->input->post('jenis_mobil', true),
            "no_plat" => $this->input->post('no_plat', true),
            "nama" => $this->input->post('nama', true),
            "no_hp" => $this->input->post('no_hp', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "role" => $this->input->post('role', true),
        ];

        $this->db->insert('mobil', $data);
    }

    public function tambahService()
    {
        $data = [
            "no_mobil" => $this->input->post('no_mobil', true),
            "tgl_service" => $this->input->post('tgl_service', true),
            "konfirmasi" => $this->input->post('konfirmasi', true),
        ];

        $this->db->insert('service', $data);
    }

    public function hapusSopir($no_mobil)
    {
        $this->db->where('no_mobil', $no_mobil);
        $this->db->delete('mobil');
    }

    public function getAnggotaById($no_mobil)
    {
        return $this->db->get_where('mobil', ['no_mobil' => $no_mobil])->row_array();
    }

    public function getSopirByEdit($id)
    {
        $query = "SELECT no_mobil, nama, username, no_hp, password, foto, no_mobil, jenis_mobil, no_plat, foto from mobil where no_mobil = $id";
        return $this->db->query($query)->row_array();
    }

    public function ubahSopir()
    {
        $data = [
            "jenis_mobil" => $this->input->post('jenis_mobil', true),
            "no_plat" => $this->input->post('no_plat', true),
            "nama" => $this->input->post('nama', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
        ];

        $this->db->where('no_mobil', $this->input->post('no_mobil'));
        $this->db->update('mobil', $data);
    }

    public function editProfil()
    {
        $data = [

            "nama" => $this->input->post('nama', true),
            "no_hp" => $this->input->post('no_hp', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
        ];

        $this->db->where('no_mobil', $this->input->post('no_mobil'));
        $this->db->update('mobil', $data);
    }

    public function getAllPerawatanSopir($id)
    {
        $query = "SELECT * from perawatan where no_mobil = $id";
        return $this->db->query($query)->result_array();
    }

    public function sopirPerawatan($id)
    {
        $query = "SELECT * from perawatan where no_mobil = $id";
        return $this->db->query($query)->row_array();
    }

    public function getPerawatanById($no_perawatan)
    {
        return $this->db->get_where('perawatan', ['no_perawatan' => $no_perawatan])->row_array();
    }

    public function tambahPerawatanMobil()
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
}
