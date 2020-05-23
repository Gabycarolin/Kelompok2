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

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->m_user->auth_admin($username, $password); 

	}




}