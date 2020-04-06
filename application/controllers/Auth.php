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
		$this->load->view('auth/v_login');
	}




}