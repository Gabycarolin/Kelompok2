<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_data');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim'); // validasi username
		$this->form_validation->set_rules('password', 'Password', 'required|trim'); // validasi password

		// validasi form login jika tidak diisi apa"
		if ($this->form_validation->run() == false) {

			// akan diarahkan kembali ke form login
			$data['title'] = 'Login SIBALL';
			$this->load->view('auth/v_login', $data);
		} else {
			// mengarah ke function _masuk
			$this->_masuk();
		}
	}

	private function _masuk()
	{

		// query tb_futsal where username dan password futsal
		// $user = $this->db->get_where('tb_pengelola', 
		// 	[
		// 		'username_pengelola' => $username,
		// 		'password_pengelola' => $password

		// ])->row_array();

		$username = $this->input->post('username'); // mengambil data post username
		$password = $this->input->post('password');	// mengambil data post password

		// load function auth_admin di model
		$user = $this->m_login->auth_admin($username, $password);

		// jika user pengelola ada didatabase
		if ($user) {

			$data = [
				// mengambil data pengelola yang diperlukan dalam array
				'id' => $user['id_pengelola'],
				'username' => $user['username_pengelola'],
				'nama' => $user['nama_pengelola']
			];

			$this->session->set_userdata('masuk', TRUE);
			$this->session->set_userdata('level', '1'); // memberi session level 1
			$this->session->set_userdata($data);
			redirect('Dashboard/dataProfil', $data); // diarahkan ke view dataBooking
			// print_r($data1);

		} else {
			// load function auth_owner di model
			$userFutsal = $this->m_login->auth_owner($username, $password);

			// jika user futsal ada didatabase
			if ($userFutsal) {

				$data = [
					// mengambil data pengelola yang diperlukan dalam array
					'id' => $userFutsal['id_futsal'],
					'username' => $userFutsal['username_futsal'],
					'nama' => $userFutsal['nama_futsal']
				];

				$this->session->set_userdata('masuk', TRUE);
				$this->session->set_userdata('level', '2'); // memberi session level 2
				$this->session->set_userdata($data);
				// $this->session->set_userdata('nama',$data2['nama_futsal']); // menyimpan data pada session
				redirect('Dashboard/dataProfil', $data); // diarahkan ke view dataOwn
				print_r($data);
			} else {

				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau password futsal salah!</div>');
				redirect('Auth');
			}

			// jika tidak ada user didatabase
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau password pengelola salah!</div>');
			redirect('Auth');
		}
	}
}
