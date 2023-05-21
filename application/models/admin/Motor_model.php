<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Motor_model extends CI_Model
{
    public function getAllMotor()
    {
        $query = "SELECT * from motor";
        return $this->db->query($query)->result_array();
    }

    public function tambahMotor()
    {
        $data = [
            "jenis_motor" => $this->input->post('jenis_motor', true),
            "no_plat" => $this->input->post('no_plat', true),
            "tgl_pjk" => $this->input->post('tgl_pjk', true),
        ];

        $this->db->insert('motor', $data);
    }

    public function hapusMotor($no_motor)
    {
        $this->db->where('no_motor', $no_motor);
        $this->db->delete('motor');
    }

    public function getMotorById($no_motor)
    {
        return $this->db->get_where('motor', ['no_motor' => $no_motor])->row_array();
    }

    public function ubahMotor()
    {
        $data = [
            "jenis_motor" => $this->input->post('jenis_motor', true),
            "no_plat" => $this->input->post('no_plat', true),
            "tgl_pjk" => $this->input->post('tgl_pjk', true),
        ];

        $this->db->where('no_motor', $this->input->post('no_motor'));
        $this->db->update('motor', $data);
    }
}
