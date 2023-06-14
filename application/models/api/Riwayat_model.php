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
		$this->db->where('riwayat.no_anggota', $id);
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
}
