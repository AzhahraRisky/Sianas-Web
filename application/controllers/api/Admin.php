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
		// echo $file;
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
}


/* End of file Anggotaapi.php */
/* Location: ./application/controllers/Anggotaapi.php */
