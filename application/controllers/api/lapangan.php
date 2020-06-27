<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Lapangan extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_Futsal');
	}	
	
	public function index_post(){

		$idFut = $this->post('id_futsal');
		$id_lapangan = $this->post('id_lapangan');
		$tanggal = $this->post('tanggal');
		$jamAwal = $this->post('jam_mulai');
		$durasi = "+ ". $this->post('durasi') . " hours";
		$combine = $tanggal . " " . $jamAwal;

		$jamAwal1s = (new DateTime($jamAwal))->modify('+1 seconds')->format("H:i:s");

		$jamAkhir = (new DateTime($combine))->modify($durasi)->modify('+1 seconds')->format("Y-m-d H:i:s");

		$lapangan = $this->M_Futsal->lapangan($idFut)->result();
		
		foreach($lapangan as $lapang){
			$tersedia = $this->M_Futsal->tersedia($idFut, $lapang->id_lapangan, $tanggal, $jamAwal1s, $jamAkhir);

			if($tersedia->num_rows() <= 0){
				echo "Lapangan ".$lapang->id_lapangan." Tersedia";
			}else{
				echo "Lapangan ".$lapang->id_lapangan." Tidak Tersedia";
			}

			echo "<br><br>";
		}
		
	}

	
}


?>