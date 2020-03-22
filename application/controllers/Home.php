<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$data['dataBooking'] = $this->m_data->ambil_data();
		$this->load->view('booking',$data);
	}

	public function daftar(){
		$this->load->view('daftarAdmin');
	}


}


?>