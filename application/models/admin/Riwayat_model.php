<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_model extends CI_Model
{
    public function getAllRiwayat()
    {
        $query = "SELECT r.no_pengajuan,r.tujuan_1,r.tujuan_2,r.tujuan_3,r.alamat_1,r.alamat_2,r.alamat_3,r.kota_1,r.kota_2,r.kota_3,r.muatan,r.tgl_digunakan,r.tgl_kembali,r.km_awal,r.km_akhir,r.surat,r.konfirmasi,r.konfirmasi_sopir,m.no_mobil,m.jenis_mobil,m.no_plat,m.nama, a.nama as penanggung_jawab ,a.subbag, r.bukti from riwayat r, mobil m, anggota a where r.no_mobil = m.no_mobil and r.no_anggota = a.no_anggota ORDER BY r.no_pengajuan desc";
        return $this->db->query($query)->result_array();
    }
    public function getAllRiwayatById($id)
    {
        $query = "SELECT r.no_pengajuan,r.tujuan_1,r.tujuan_2,r.tujuan_3,r.alamat_1,r.alamat_2,r.alamat_3,r.kota_1,r.kota_2,r.kota_3,r.muatan,r.tgl_digunakan,r.tgl_kembali,r.km_awal,r.km_akhir,r.surat,r.konfirmasi,m.no_mobil,m.jenis_mobil,m.no_plat, a.nama as penanggung_jawab ,a.subbag, r.bukti, m.nama as nama_sopir from riwayat r, mobil m, anggota a where r.no_mobil = m.no_mobil and r.no_anggota = a.no_anggota and r.no_anggota = $id ";
        return $this->db->query($query)->result_array();
    }
    public function getAllRiwayatByConf($id)
    {
        $query = "SELECT r.no_pengajuan, r.tujuan_1, r.tujuan_2, r.tujuan_3, r.alamat_1, r.alamat_2, r.alamat_3, r.kota_1,r.kota_2,r.kota_3,r.muatan, r.tgl_digunakan, r.tgl_kembali, r.km_awal, r.km_akhir, r.surat, r.bukti, r.konfirmasi, r.konfirmasi_sopir, m.jenis_mobil, m.no_plat, m.nama AS nama_sopir, a.nama AS nama_anggota, a.subbag, a.no_hp from riwayat r, mobil m, anggota a where r.no_mobil = m.no_mobil and r.no_anggota = a.no_anggota and m.no_mobil = $id and r.konfirmasi_sopir = 'Dikonfirmasi' and r.konfirmasi = 'Dikonfirmasi'";
        return $this->db->query($query)->result_array();
    }

    public function getAllRiwayatByConfSopir($id)
    {
        $query = "SELECT r.no_pengajuan, r.tujuan_1, r.tujuan_2, r.tujuan_3, r.alamat_1, r.alamat_2, r.alamat_3, r.kota_1,r.kota_2,r.kota_3,r.muatan, r.tgl_digunakan, r.tgl_kembali, r.km_awal, r.km_akhir, r.surat, r.bukti, r.konfirmasi, r.konfirmasi_sopir, m.jenis_mobil, m.no_plat, m.nama AS nama_sopir, a.nama AS nama_anggota, a.subbag, a.no_hp from riwayat r, mobil m, anggota a where r.no_mobil = m.no_mobil and r.no_anggota = a.no_anggota and m.no_mobil = $id and r.konfirmasi_sopir = 'Diproses' and r.konfirmasi = 'Dikonfirmasi'";
        return $this->db->query($query)->result_array();
    }

    public function getAllRiwayatByStatus()
    {
        $query = "SELECT r.no_pengajuan,r.tujuan_1,r.tujuan_2,r.tujuan_3,r.alamat_1,r.alamat_2,r.alamat_3,r.kota_1,r.kota_2,r.kota_3,r.muatan,r.tgl_digunakan,r.tgl_kembali,r.km_awal,r.km_akhir,r.surat,r.konfirmasi,m.no_mobil,m.jenis_mobil,m.no_plat, a.nama as penanggung_jawab ,a.subbag from riwayat r, mobil m, anggota a where r.no_mobil = m.no_mobil and r.no_anggota = a.no_anggota and r.konfirmasi = 'Menunggu' ";
        return $this->db->query($query)->result_array();
    }


    public function countAllSurat()
    {
        $query = "SELECT *
        FROM riwayat WHERE konfirmasi = 'Menunggu'  ";
        return $this->db->query($query)->num_rows();
    }
}
