<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_data');
		$this->load->library('form_validation');

		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('v_login');
	}


	public function dataBooking()
	{
		if ($this->session->userdata('level') == '1') {
			$id = $this->session->userdata('id');
			$data['dataLihatDP'] = $this->m_data->dataDP();
			$data['dataLihatLunas'] = $this->m_data->dataFullpay();
		} else {
			$id = $this->session->userdata('id');
			$data['dataBookLunas'] = $this->m_data->custBookingLunas($id);
			$data['dataBookDP'] = $this->m_data->custBookingDP($id);
		}
		$this->load->view('templates/sidebar');
		$this->load->view('booking/booking', $data);
	}

	public function dataCust()
	{
		$data['dataCusto'] = $this->m_data->getDataCust();
		$this->load->view('templates/sidebar');
		$this->load->view('customer/v_customer', $data);
	}


	public function dataOwn()
	{
		$data['dataOwner'] = $this->m_data->ambilSemuaOwner();
		$this->load->view('templates/sidebar');
		$this->load->view('owner/v_owner', $data);
	}

	public function dataProfil()
	{
		if ($this->session->userdata('level') == '1') {
			$id = $this->session->userdata('id');
			$data['dataPengelola'] = $this->m_data->profilPengelola($id);
		} else {
			$id = $this->session->userdata('id');
			$data['dataSatuOwner'] = $this->m_data->ambilSatuOwner($id);
		}

		$this->load->view('templates/sidebar');
		$this->load->view('auth/v_lupaPassword', $data);
	}


	public function tambahLapangan()
	{
		$this->load->view('templates/sidebar');
		$this->load->view('lapangan/v_tambahLap');
	}
}
