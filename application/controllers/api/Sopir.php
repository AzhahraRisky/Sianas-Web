<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Sopir extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/mobil_model');
		$this->load->model('api/motor_model');
		$this->load->model('api/riwayat_model');
		$this->load->model('api/anggota_model');
		$this->load->model('api/admin_model');
	}

	function getJadwalSaya()
	{
		$id = $this->input->get('id');
		echo json_encode($this->riwayat_model->getJadwalBySopir($id));
	}

	function konfirmasi()
	{
		$id = $this->input->post('id');
		$config['upload_path']          = './assets/data/bukti/';
		$config['allowed_types']        = 'jgp|png|jpeg';


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('bukti')) {
			$response = [
				'code' => 404,
				'message' => 'Format file tidak sesuai'
			];
			echo json_encode($response);
		} else {

			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];

			$data = [
				'konfirmasi_sopir' => 'Dikonfirmasi',
				'bukti' => $fileName,
				'km_awal' => $this->input->post('km_awal'),
				'km_akhir' => $this->input->post('km_akhir'),
			];
			$update = $this->riwayat_model->update($id, $data);
			if ($update == true) {
				$response = [
					'code' => 200,
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Terjadi kesalahan'
				];
				echo json_encode($response);
			}
		}
	}

	function tolakJadwal()
	{
		$id = $this->input->post('id');
		$data = [
			'konfirmasi_sopir' => 'Ditolak'
		];
		$update = $this->riwayat_model->update($id, $data);
		if ($update == true) {
			$response = [
				'code' => 200,
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404,
				'message' => 'Terjadi kesalahan'
			];
			echo json_encode($response);
		}
	}
	function getHistory()
	{
		$id = $this->input->get('id');
		echo json_encode($this->riwayat_model->getHistorySopir($id));
	}

	function getProfile()
	{
		$id = $this->input->get('id');
		echo json_encode($this->mobil_model->getMobilById($id));
	}

	function updateProfile()
	{
		$id = $this->input->post('id');
		$data = [
			'nama' => $this->input->post('nama'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];

		$update = $this->mobil_model->update($id, $data);
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

	function setLocation()
	{
		$id = $this->input->post('id');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$jenis = $this->input->post('jenis');

		if ($jenis == 'location_1') {
			$data = [
				'lat_1' => $lat,
				'lng_1' => $lng
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
		} else if ($jenis == 'location_2') {
			$data = [
				'lat_2' => $lat,
				'lng_2' => $lng
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
		} else if ($jenis == 'location_3') {
			$data = [
				'lat_3' => $lat,
				'lng_3' => $lng
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
}


/* End of file Anggotaapi.php */
/* Location: ./application/controllers/Anggotaapi.php */
