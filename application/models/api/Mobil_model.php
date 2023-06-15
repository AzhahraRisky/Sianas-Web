<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Mobil_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Mobil_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function validateSopir($username)
	{

		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->where('username', $username);
		return $this->db->get()->row_array();
	}

	function getMobilByStatus($status)
	{

		if ($status == 'all') {
			$this->db->select('*');
			$this->db->from('mobil');
			return  $this->db->get()->result();
		} else {
			$this->db->select('*');
			$this->db->from('mobil');
			$this->db->where('status', $status);
			return  $this->db->get()->result();
		}
	}

	function getMobilById($id)
	{
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->where('no_mobil', $id);
		return $this->db->get()->row_array();
	}
	function update($id, $data)
	{

		$this->db->where('no_mobil', $id);
		$update = $this->db->update('mobil', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function insert($data)
	{

		$insert = $this->db->insert('mobil', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}


	function getAllMObil()
	{
		$this->db->select('*');
		$this->db->from('mobil');
		return $this->db->get()->result();
	}
	function delete($id)
	{

		$this->db->where('no_mobil', $id);
		$delete = $this->db->delete('mobil');

		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Mobil_model.php */
/* Location: ./application/models/Mobil_model.php */
