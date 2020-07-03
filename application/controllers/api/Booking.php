<?php
//controller

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Booking extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_futsal');
		$this->load->library('AutoNumber', ["K", 5, 1]);
	}

	public function index_post(){

		$idFut = $this->post('id_futsal');
		$id_lapangan = $this->post('id_lapangan');
		$tanggal = $this->post('tanggal');
		$jamAwal = $this->post('jam_mulai');
		$durasi = "+ ". $this->post('durasi') . " hours";
		$username = $this->post('username');
		$combine = $tanggal . " " . $jamAwal;

		$harga = $this->m_futsal->harga($idFut, $id_lapangan)[0]['harga_lapangan'];
		$status = 'DP';



		$jamAwal1s = (new DateTime($jamAwal))->format("H:i:s");


		$jamAkhir = (new DateTime($combine))->modify($durasi)->format("Y-m-d H:i:s");

		$kodeBaru = $this->autonumber->make($this->m_futsal->maxID()[0]['id_booking']);

		$user = $this->m_futsal->ambilID($username)[0]['id_cust'];

		$gTotal = $harga * $this->post('durasi');

		$data = [

			'id_booking' => $kodeBaru,
			'id_futsal' => $idFut,
			'id_lapangan' => $id_lapangan,
			'id_cust' => $user,
			'waktu_mulai' => $combine,
			'waktu_berakhir' => $jamAkhir,
			'total_durasi' => $this->post('durasi'),
			'total_harga' => $gTotal,
			'status' => $status
		];	

			$this->m_futsal->tambahBook($data);
			
		}
		public function tiket_post(){
			$id = $this->post('id_cust');
			$data = $this->db->query("SELECT tf.nama_futsal, tb.status, tl.nama_lapangan, tb.waktu_mulai, tb.total_harga, tb.id_booking FROM `tb_booking` tb JOIN tb_futsal tf ON tb.id_futsal=tf.id_futsal JOIN tb_lapangan tl ON tb.id_lapangan=tl.id_lapangan where tb.id_cust = '$id' order by tb.id_booking desc")->row_array();
			$this->response($data, REST_Controller::HTTP_OK);
		}

		$jamAkhir = (new DateTime($combine))->modify($durasi)->format("Y-m-d H:i:s");

		$kodeBaru = $this->autonumber->make($this->m_futsal->maxID()[0]['id_booking']);

		$user = $this->m_futsal->ambilID($username)[0]['id_cust'];

		$gTotal = $harga * $this->post('durasi');

		$data = [

			'id_booking' => $kodeBaru,
			'id_futsal' => $idFut,
			'id_lapangan' => $id_lapangan,
			'id_cust' => $user,
			'waktu_mulai' => $combine,
			'waktu_berakhir' => $jamAkhir,
			'total_durasi' => $this->post('durasi'),
			'total_harga' => $gTotal,
			'status' => $status
		];	

			$this->m_futsal->tambahBook($data);
			
		}

	}
	
?>