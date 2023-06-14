<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Anggotaapi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/mobil_model');
		$this->load->model('api/motor_model');
		$this->load->model('api/riwayat_model');
	}

	function getMobilByStatus()
	{
		$status = $this->input->get('status');
		echo json_encode($this->mobil_model->getMobilByStatus($status));
	}

	function getMotor()
	{
		echo json_encode($this->motor_model->getAllMotor());
	}

	function getMyHistory()
	{
		$userId = $this->input->get('user_id');
		echo json_encode($this->riwayat_model->getRiwayatBYUsrId($userId));
	}

	function cancelPengajuan()
	{
		$id = $this->input->post('id');
		$data = [
			'konfirmasi' => 'Dicancel'
		];
		$update = $this->riwayat_model->update($id, $data);

		if ($update == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}
}


/* End of file Anggotaapi.php */
/* Location: ./application/controllers/Anggotaapi.php */
