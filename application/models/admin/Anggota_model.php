<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAllAnggota()
    {
        $query = "SELECT * from anggota";
        return $this->db->query($query)->result_array();
    }

    public function tambahAnggota()
    {
        $data = [
            "subbag" => $this->input->post('subbag', true),
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jabatan" => $this->input->post('jabatan', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "role" => $this->input->post('role', true),
        ];

        $this->db->insert('anggota', $data);
    }

    public function hapusAnggota($no_anggota)
    {
        $this->db->where('no_anggota', $no_anggota);
        $this->db->delete('anggota');
    }

    public function getAnggotaById($no_anggota)
    {
        return $this->db->get_where('anggota', ['no_anggota' => $no_anggota])->row_array();
    }

    public function getAnggotaByEdit($id)
    {
        return $this->db->get_where('anggota', ['no_anggota' => $id])->row_array();
    }

    public function ubahAnggota()
    {
        $data = [
            "subbag" => $this->input->post('subbag', true),
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "no_hp" => $this->input->post('no_hp', true),
            "jabatan" => $this->input->post('jabatan', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
        ];

        $this->db->where('no_anggota', $this->input->post('no_anggota'));
        $this->db->update('anggota', $data);
    }

    public function editProfil()
    {
        $data = [
            "subbag" => $this->input->post('subbag', true),
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jabatan" => $this->input->post('jabatan', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
        ];

        $this->db->where('no_anggota', $this->input->post('no_anggota'));
        $this->db->update('anggota', $data);
    }
}
