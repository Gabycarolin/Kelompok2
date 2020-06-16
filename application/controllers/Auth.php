<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_data');
		$this->load->library('form_validation');
	}

	public function index(){

		$this->form_validation->set_rules('username', 'Username', 'required|trim'); // validasi username
		$this->form_validation->set_rules('password', 'Password', 'required|trim'); // validasi password

		// validasi form login jika tidak diisi apa"
		if($this->form_validation->run() == false){

			// akan diarahkan kembali ke form login
			$data['title'] = 'Login SIBALL';
			$this->load->view('auth/v_login', $data);

		}else{
			// mengarah ke function _masuk
			$this->_masuk();

		}
		
	}

	private function _masuk(){

		// query tb_futsal where username dan password futsal
		// $user = $this->db->get_where('tb_pengelola', 
		// 	[
		// 		'username_pengelola' => $username,
		// 		'password_pengelola' => $password

		// ])->row_array();

		$username = $this->input->post('username'); // mengambil data post username
		$password = $this->input->post('password');	// mengambil data post password

		// load function auth_admin di model
		$user = $this->m_user->auth_admin($username, $password);

		// jika user pengelola ada didatabase
		if($user){

			$data = [
				// mengambil data pengelola yang diperlukan dalam array
				'id' => $user['id_pengelola'],
				'username' => $user['username_pengelola'],
				'nama' => $user['nama_pengelola']
				];

			$this->session->set_userdata('masuk', TRUE);
			$this->session->set_userdata('level','1'); // memberi session level 1
			$this->session->set_userdata($data);
			redirect('dashboard/dataProfil', $data); // diarahkan ke view dataBooking
			// print_r($data1);

		} else {
				// load function auth_owner di model
				$userFutsal = $this->m_user->auth_owner($username, $password);

				// jika user futsal ada didatabase
				if($userFutsal){

					$data = [
								// mengambil data pengelola yang diperlukan dalam array
								'id' => $userFutsal['id_futsal'],
								'username' => $userFutsal['username_futsal'],
								'nama' => $userFutsal['nama_futsal']	
							];

					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('level','2'); // memberi session level 2
					$this->session->set_userdata($data);
					// $this->session->set_userdata('nama',$data2['nama_futsal']); // menyimpan data pada session
					redirect('dashboard/dataProfil', $data); // diarahkan ke view dataOwn
					print_r($data);

				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau password salah!</div>');
					redirect('Auth');
				}

			// jika tidak ada user didatabase
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau password salah!</div>');
			redirect('Auth');
		}

	}

	public function daftar(){

		$data['title'] = 'Daftar Owner Futsal';
		$this->form_validation->set_rules('namaF', 'Nama-futsal', 'required|trim');
		$this->form_validation->set_rules('alamatF', 'Alamat-futsal', 'required|trim');
		$this->form_validation->set_rules('telpF', 'Telp-futsal', 'required|trim|integer');
		$this->form_validation->set_rules('emailF', 'Email-futsal', 'required|trim|valid_email|is_unique[tb_futsal.email_futsal]', [

			'is_unique' => 'Email ini sudah terdaftar !'

		]);
		
		$this->form_validation->set_rules('passwordF', 'Password-futsal', 'required|trim|min_length[10]', [
			'min_length' => 'Password terlalu pendek!'
		]);

		// jika form tidak diisi
		if($this->form_validation->run() == false){
			// kembali ke view daftar
			$this->load->view('daftar/daftarAdmin', $data);

		}else{

			$nama = $this->input->post('namaF');
			$alamat = $this->input->post('alamatF');
			$telp = $this->input->post('telpF');
			$username = $this->input->post('usernameF');
			$email = $this->input->post('emailF');
			$pass = $this->input->post('passwordF');

			$data = [
				'nama_futsal' => htmlspecialchars($nama, true),
				'alamat_futsal' => htmlspecialchars($alamat, true),
				'telp_futsal' => $telp,
				'username_futsal' => htmlspecialchars($username, true),
				'email_futsal' => htmlspecialchars($email, true),
				'password_futsal' => htmlspecialchars($pass, true)
			];

			$this->m_data->tambahOwner($data, 'tb_futsal');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan Login</div>');
			redirect('Auth');
		}
		
	}

	public function keluar(){

		$this->session->sess_destroy();
		redirect('auth');

	}

}

