<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Riwayat_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function getRiwayatBYUsrId($id)
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.no_anggota', $id);
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}

	function getRiwayatByStatus($status)
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.konfirmasi', $status);
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}

	function update($id, $data)
	{
		$this->db->where('no_pengajuan', $id);
		$update = $this->db->update('riwayat', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function insert($data)
	{
		$insert = $this->db->insert('riwayat', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function getFilterRiwayat($id, $dateStart, $dateEnd)
	{
		$this->db->select(
			'riwayat.*, anggota.nama as nama_anggota, anggota.subbag, mobil.nama as nama_sopir, mobil.jenis_mobil,
			mobil.no_plat'
		);
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.no_anggota', $id);
		$this->db->where('riwayat.tgl_digunakan >=', $dateStart);
		$this->db->where('riwayat.tgl_digunakan <=', $dateEnd);
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}

	function getFilterKeseluruhan($dateStart, $dateEnd)
	{
		$this->db->select(
			'riwayat.*, anggota.nama as nama_anggota, anggota.subbag, mobil.nama as nama_sopir, mobil.jenis_mobil,
			mobil.no_plat'
		);
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.tgl_digunakan >=', $dateStart);
		$this->db->where('riwayat.tgl_digunakan <=', $dateEnd);
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}

	function getRiwayatById($id)
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->where('no_pengajuan', $id);
		return $this->db->get()->row_array();
	}

	function getJadwalBySopir($id)
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.no_mobil', $id);
		$this->db->where('riwayat.konfirmasi', 'Dikonfirmasi');
		$this->db->where('riwayat.konfirmasi_sopir', 'Diproses');
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}

	function getHistorySopir($id)
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('mobil', 'mobil.no_mobil = riwayat.no_mobil', 'left');
		$this->db->join('anggota', 'anggota.no_anggota = riwayat.no_anggota', 'left');
		$this->db->where('riwayat.no_mobil', $id);
		$this->db->order_by('no_pengajuan', 'desc');
		return $this->db->get()->result();
	}
}
