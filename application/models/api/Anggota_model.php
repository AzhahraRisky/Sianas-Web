<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Anggota_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function update($id, $data)
	{

		$this->db->where('no_anggota', $id);
		$update = $this->db->update('anggota', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function getUserById($id)
	{

		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('no_anggota', $id);
		return $this->db->get()->row_array();
	}

	function getAllAnggota()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		return $this->db->get()->result();
	}

	function insert($data)
	{
		$insert = $this->db->insert('anggota', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
}
