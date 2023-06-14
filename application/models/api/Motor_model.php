<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Motor_model
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

class Motor_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getAllMotor()
	{

		$this->db->select('*');
		$this->db->from('motor');
		return $this->db->get()->result();
	}

	function update($id, $data)
	{
		$this->db->where('no_motor', $id);
		$update = $this->db->update('motor', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function delete($id)
	{

		$this->db->where('no_motor', $id);
		$delete = $this->db->delete('motor');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Motor_model.php */
/* Location: ./application/models/Motor_model.php */
