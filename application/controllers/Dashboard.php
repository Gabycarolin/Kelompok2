<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->model('m_user');
		$this->load->library('form_validation');

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url();
			redirect($url);
		}
	}

	public function index(){
		$this->load->view('auth/v_login');
		
	}


	public function dataBooking(){
		if($this->session->userdata('level')=='1'){
		$id = $this->session->userdata('id');
		$data['dataLihatDP'] = $this->m_data->dataDP();
		$data['dataLihatLunas'] = $this->m_data->dataFullpay();
		} else {
		$id = $this->session->userdata('id');
		$data['dataBookLunas'] = $this->m_data->custBookingLunas($id);
		$data['dataBookDP'] = $this->m_data->custBookingDP($id);
		}
		$this->load->view('templates/sidebar');
		$this->load->view('booking/booking',$data);
	
	}

	public function dataCust(){
		$data['dataCusto'] = $this->m_data->getDataCust();
		$this->load->view('templates/sidebar');
		$this->load->view('customer/v_customer',$data);
	}


	public function dataOwn(){
		$data['dataOwner']=$this->m_data->ambilSemuaOwner();
		$this->load->view('templates/sidebar');
		$this->load->view('owner/v_owner', $data);
		}

	public function dataProfil(){
		if($this->session->userdata('level')=='1'){
			$id = $this->session->userdata('id');
			$data['dataPengelola'] = $this->m_data->profilPengelola($id);
		} else {
			$id = $this->session->userdata('id');
			$data['dataSatuOwner'] = $this->m_data->ambilSatuOwner($id);
		}
		
		$this->load->view('templates/sidebar');
		$this->load->view('profil/profil', $data);
	}	
	
	public function dataLap(){
		$id = $this->session->userdata('id');
		$data['dataLa'] = $this->m_data->dataLapangan($id);

		$this->load->view('templates/sidebar');
		$this->load->view('lapangan/v_daftarLap', $data);
	}

	public function tambahLapangan(){
		$this->load->view('templates/sidebar');
		$this->load->view('lapangan/v_tambahLap');
	}

	public function tmbhLap(){
		$idFut = $this->input->post('id_futsal');
		$namaLap = $this->input->post('nama_lapangan');
		$hargaLap = $this->input->post('harga_lapangan');

		$this->form_validation->set_rules('nama_lapangan', 'Nama', 'required|trim'); // validasi username
		$this->form_validation->set_rules('harga_lapangan', 'Harga', 'required|trim'); // validasi password
		
		$config = [
			'upload_path' => './assets/images/', // diarahkan folder images
			'allowed_types' => 'gif|jpg|jpeg|png', // format file yang diperbolehkan
			'max_size' => 1000 // max size file
		];
		$this->load->library('upload', $config);

		//jika gagal upload
		if(!$this->upload->do_upload('foto_lapangan')){
			$error = [
				'error' => $this->upload->display_errors() // menampilkan error
			];

			$this->load->view('templates/sidebar');
			$this->load->view('lapangan/v_tambahLap', $error);

		// jika berhasil upload	
		}else{

			$file = $this->upload->data();
			$data = [
					'foto_lapangan' => $file['file_name'],
           			'nama_lapangan' => $namaLap,
           			'harga_lapangan' => $hargaLap,
           			'id_futsal' => $idFut
         			];

         	$this->m_data->tambahLapangan($data, 'tb_lapangan');
         	$this->load->view('templates/sidebar');
			$this->load->view('lapangan/v_tambahLap');
		}

	}

	public function editLap(){
		$id = $this->session->userdata('id');
		$nama_lapangan = $this->input->post('nama_lapangan');
		$harga_lapangan = $this->input->post('harga_lapangan');

		$data = [

			'nama_lapangan' => $nama_lapangan,
			'harga_lapangan' => $harga_lapangan

		];

		$where = [

			'id_futsal' => $id
				
		];

		$this->m_data->updateLap($where,$data,'tb_lapangan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil diedit</div>');
		redirect('dashboard/dataLap');

	}


}


?>