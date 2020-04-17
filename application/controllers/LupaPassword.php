<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LupaPassword extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lupaPassword');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email'); 

		// validasi form lupapassword jika tidak diisi apa"
		if ($this->form_validation->run() == false) {

			// akan diarahkan kembali ke form login
			$data['title'] = 'Lupa Password';
			$this->load->view('auth/v_lupaPassword', $data);
		} else {
			// mengarah ke function _masuk
			$this->_masuk();
		}
	}

	private function _masuk()
	{

		$email = $this->input->post('email'); 

		$user = $this->m_lupaPassword->auth_admin($email);

		// jika user pengelola ada didatabase
		if ($user) {

			$data = [
				// mengambil data pengelola yang diperlukan dalam array
				'id' => $user['id_pengelola'],
				'email' => $user['email_futsal'],
			];

			$this->session->set_userdata('masuk', TRUE);
			$this->session->set_userdata($data);
			redirect('ubahPassword', $data); // diarahkan ke view dataBooking
			// print_r($data1);

		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email yang dimasukkan salah!</div>');
			redirect('lupaPassword');
		}
	}
}