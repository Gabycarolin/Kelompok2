<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->dataBook();
		
	}

	public function dataBook(){
		$data['dataBook'] = $this->m_data->ambilDataBook();
		$this->load->view('templates/sidebar');
		$this->load->view('booking/booking',$data);
	}

	public function dataCust(){
		$data['dataCust'] = $this->m_data->ambilDataCustomer();
		$this->load->view('templates/sidebar');
		$this->load->view('customer/v_customer', $data);
	}

	public function daftar(){
		$this->load->view('daftarAdmin');
	}

	public function dataOwner(){
		$data['dataOwner'] = $this->m_data->ambilDataOwner();
		$this->load->view('templates/sidebar');
		$this->load->view('owner/profile', $data);
	}

	public function dataProfil(){

		$this->load->view('profil/profil');

	}


}


?>