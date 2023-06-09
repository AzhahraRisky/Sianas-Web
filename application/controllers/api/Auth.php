<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api/Auth_model', 'auth_model');
		$this->load->model('api/mobil_model', 'mobil_model');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// validasi 
		$validateAnggota = $this->auth_model->validateUsername($username, 'anggota');
		$validateAdmin  = $this->auth_model->validateUsername($username, 'admin');
		$validateSopir = $this->mobil_model->validateSopir($username);
		if ($validateAnggota != null) {
			if ($validateAnggota['password'] == $password) {
				$response = [
					'code' => 200,
					'status' => true,
					'user_id' => $validateAnggota['no_anggota'],
					'nama' => $validateAnggota['nama'],
					'role' => $validateAnggota['role']
				];
				echo json_encode($response);
			} else {

				$response = [
					'code' => 404,
					'status' => false,
					'message' => 'Password Salah'
				];

				echo json_encode($response);
			}
		} else if ($validateAdmin != null) {
			if ($validateAdmin['password'] == $password) {
				$response = [
					'code' => 200,
					'status' => true,
					'user_id' => $validateAdmin['no_admin'],
					'nama' => $validateAdmin['nama'],
					'role' => $validateAdmin['role']
				];
				echo json_encode($response);
			} else {

				$response = [
					'code' => 404,
					'status' => false,
					'message' => 'Password Salah'
				];

				echo json_encode($response);
			}
		} else if ($validateSopir != null) {
			if ($validateSopir['password'] == $password) {
				$response = [
					'code' => 200,
					'status' => true,
					'user_id' => $validateSopir['no_mobil'],
					'nama' => $validateSopir['nama'],
					'role' => $validateSopir['role']
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Password salah'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'code' => 404,
				'status' => false,
				'message' => 'Username tidak terdaftar'
			];

			echo json_encode($response);
		}
	}
}
