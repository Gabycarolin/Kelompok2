<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$data['dataBooking'] = $this->m_data->ambil_data();
		$data['dataLunas'] = $this->m_data->dataFullpay();
		$this->load->view('templates/sidebar');
		$this->load->view('booking/booking',$data);
	}

	// public function fullPayment(){
	// 	$data['dataLunas'] = $this->m_data->dataFullpay();
	// 	$this->load->view('booking',$data);
	// }

	public function dataCustomer(){
		$this->load->view('templates/sidebar');
		$this->load->view('customer/v_customer');
	}

	public function daftar(){
		$this->load->view('daftarAdmin');
	}

	public function dataOwner(){
		$this->load->view('templates/sidebar');
		$this->load->view('profile');
	}


}


?>