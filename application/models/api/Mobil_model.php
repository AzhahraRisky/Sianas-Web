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
}

/* End of file Mobil_model.php */
/* Location: ./application/models/Mobil_model.php */
