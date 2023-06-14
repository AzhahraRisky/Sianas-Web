<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Anggotaapi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/mobil_model');
	}

	function getMobilByStatus()
	{
		$status = $this->input->get('status');
		echo json_encode($this->mobil_model->getMobilByStatus($status));
	}
}


/* End of file Anggotaapi.php */
/* Location: ./application/controllers/Anggotaapi.php */
