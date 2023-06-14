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

	function addPengajuan()
	{

		$config['upload_path']          = './assets/data/surat/';
		$config['allowed_types']        = 'pdf';


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('surat')) {
			$response = [
				'code' => 404,
				'message' => 'Format file tidak sesuai'
			];
			echo json_encode($response);
		} else {

			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];
			$data = [
				'no_anggota' => $this->input->post('id'),
				'no_mobil' => $this->input->post('no_mobil'),
				'tujuan_1' => $this->input->post('tujuan_1'),
				'tujuan_2' => $this->input->post('tujuan_2'),
				'tujuan_3' => $this->input->post('tujuan_3'),
				'alamat_1' => $this->input->post('alamat_1'),
				'alamat_2' => $this->input->post('alamat_2'),
				'alamat_3' => $this->input->post('alamat_3'),
				'kota_1' => $this->input->post('kota_1'),
				'kota_2' => $this->input->post('kota_2'),
				'kota_3' => $this->input->post('kota_3'),
				'tgl_digunakan' => $this->input->post('tgl_digunakan'),
				'tgl_kembali' => $this->input->post('tgl_kembali'),
				'tgl_upload' => date('Y-m-d H:i:s'),
				'muatan' => $this->input->post('muatan'),
				'surat' => $fileName,
				'konfirmasi' => 'Menunggu',
				'konfirmasi_sopir' => 'Diproses',


			];

			$insert = $this->riwayat_model->insert($data);

			if ($insert == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Gagal mengajukan'
				];
				echo json_encode($response);
			}
		}
	}

	function downloadLaporan($id, $dateStart, $dateEnd)
	{
		$data['riwayat'] = $this->riwayat_model->getFilterRiwayat($id, $dateStart, $dateEnd);
		$data['tgl_awal'] = $dateStart;
		$data['tgl_akhir'] = $dateEnd;
		$this->load->library('pdflib');
		$this->pdflib->setFileName('Laporan_peminjaman.pdf');
		$this->pdflib->setPaper('A4', 'landscape');
		$this->pdflib->loadView('v_laporan', $data);
	}
}


/* End of file Anggotaapi.php */
/* Location: ./application/controllers/Anggotaapi.php */
