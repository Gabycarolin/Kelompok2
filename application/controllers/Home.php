<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$data['dataBooking'] = $this->m_data->ambil_data();
		$data['dataLunas'] = $this->m_data->dataFullpay();

		$this->load->view('booking',$data);
	}

	// public function fullPayment(){
	// 	$data['dataLunas'] = $this->m_data->dataFullpay();
	// 	$this->load->view('booking',$data);
	// }

	public function listCustomer(){
		$this->load->view("v_customer");
	}

	public function daftar(){
		$this->load->view('daftarAdmin');
	}

	public function tambahAdmin(){
		
	}


}


?>