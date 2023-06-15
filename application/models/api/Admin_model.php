<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getProfile($id)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('no_admin', $id);
		return $this->db->get()->row_array();
	}

	function update($id, $data)
	{
		$this->db->where('no_admin', $id);
		$update = $this->db->update('admin', $data);

		if ($update) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
