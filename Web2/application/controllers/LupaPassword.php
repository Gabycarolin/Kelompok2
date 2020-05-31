<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LupaPassword extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_lupaPassword');
		$this->load->library('form_validation');
	}

	public function index()
	{
		//validasi email, trim = bila ada spasi tidak akan kebaca pada database	
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		// validasi form lupapassword jika tidak diisi apa"
		if ($this->form_validation->run() == false) {

			// akan diarahkan kembali ke form lupa password
			$data['title'] = 'Lupa Password';
			$this->load->view('auth/v_lupaPassword', $data);
		} else {
			//deklarasi email yang diinput
			$email = $this->input->post('email');
			$user = $this->db->get_where('tb_futsal', ['email_futsal' => $email])->row_array();
			// $user = $this->db->get_where('tb_futsal', ['email_futsal' => $email])->row_array();

			//dilakukan pengecekan apakah email terdaftar pada database
			if ($user) {
				//deklarasi variabel baru
				$data = [
					'id' => $user['id_futsal'],
					'email' => $user['email_futsal'],
				];

				//session $data akan menangkap data inputan pada $data diatas
				$this->session->set_userdata($data);

				//alert sukses
				$this->session->set_flashdata('sukses', '<div class = "alert alert-success" role="alert">Email Terdaftar, Silahkan Ubah Password Anda !</div>');
				//load view ubah password
				redirect('ubahPassword');
			} else {
				//alert gagal
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar ! </div>');
				//load view lupa password
				redirect('lupaPassword');
			}
		}
	}
}
