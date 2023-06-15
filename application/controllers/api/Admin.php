<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/mobil_model');
		$this->load->model('api/motor_model');
		$this->load->model('api/riwayat_model');
		$this->load->model('api/anggota_model');
	}

	function getMobilById()
	{
		$id = $this->input->get('id');
		echo json_encode($this->mobil_model->getMobilById($id));
	}


	function downloadLaporan($dateStart, $dateEnd)
	{
		$data['riwayat'] = $this->riwayat_model->getFilterKeseluruhan($dateStart, $dateEnd);
		$data['tgl_awal'] = $dateStart;
		$data['tgl_akhir'] = $dateEnd;
		$this->load->library('pdflib');
		$this->pdflib->setFileName('Rekap_peminjaman_' . $dateStart . '-' . $dateEnd . ".pdf");
		$this->pdflib->setPaper('A4', 'landscape');
		$this->pdflib->loadView('v_laporan', $data);
	}

	function updateMobil()
	{

		$id  = $this->input->post('no_mobil');
		$data = [

			'jenis_mobil' => $this->input->post('jenis_mobil'),
			'no_plat' => $this->input->post('no_plat'),
			'tgl_pjk' => $this->input->post('tgl_pjk'),
			'no_rangka' => $this->input->post('no_rangka'),
			'no_mesin' => $this->input->post('no_mesin'),
			'no_stnk' => $this->input->post('no_stnk'),
			'warna' => $this->input->post('warna'),
			'status' => $this->input->post('status')
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

	function updateMotor()
	{
		$id = $this->input->post('id');
		$data = [
			'jenis_motor' => $this->input->post('jenis_motor'),
			'no_plat' => $this->input->post('no_plat'),
			'tgl_pjk' => $this->input->post('tgl_pjk'),
		];
		$update = $this->motor_model->update($id, $data);
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

	function deleteMotor()
	{
		$id = $this->input->post('id');
		$delete = $this->motor_model->delete($id);
		if ($delete == true) {
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

	function getPengajuanByStatus()
	{
		$status = $this->input->get('status');
		echo json_encode($this->riwayat_model->getRiwayatByStatus($status));
	}

	function downloadSuratPeminjaman($id)
	{

		$data = $this->riwayat_model->getRiwayatById($id);
		$this->load->helper('download');
		$file = './assets/data/surat/' . $data['surat'];
		force_download($file, NULL);
	}

	function downloadBukti($id)
	{

		$data = $this->riwayat_model->getRiwayatById($id);
		$this->load->helper('download');
		$file = './assets/data/bukti/' . $data['bukti'];
		// echo $file;
		force_download($file, NULL);
	}

	function decision()
	{
		$id = $this->input->post('id');
		$data = [
			'konfirmasi' => $this->input->post('konfirmasi')
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

	function getAllAnggota()
	{
		echo json_encode($this->anggota_model->getAllAnggota());
	}

	function insertAnggota()
	{
		$data = [
			'subbag' => $this->input->post('subbag'),
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'jabatan' => $this->input->post('jabatan'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => 2,
			'foto' => 'default.png'

		];
		$insert = $this->anggota_model->insert($data);
		if ($insert == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 4044
			];
			echo json_encode($response);
		}
	}

	function getAllSopir()
	{
		echo json_encode($this->mobil_model->getAllMObil());
	}


	function insertSopir()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'jenis_mobil' => $this->input->post('jenis_mobil'),
			'no_plat' => $this->input->post('no_plat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => 3
		];

		$insert = $this->mobil_model->insert($data);

		if ($insert == true) {
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

	function updateSopir()
	{
		$id = $this->input->post('id');
		$data = [
			'nama' => $this->input->post('nama'),
			'jenis_mobil' => $this->input->post('jenis_mobil'),
			'no_plat' => $this->input->post('no_plat'),
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
	function deleteSopir()
	{
		$id = $this->input->post('id');
		$delete = $this->mobil_model->delete($id);
		if ($delete == true) {
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
