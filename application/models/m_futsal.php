<?php

class M_futsal extends CI_Model{

	// Menampilkan List Futsal yang terdaftar
	function tampilFut(){
		return $tampilFut = $this->db->query("SELECT id_futsal, nama_futsal, alamat_futsal, telp_futsal FROM tb_futsal WHERE id_futsal");
	}

	// Menampilkan lapangan yang tersedia setelah memilih futsal
	public function specFut($id){
		return $specFut = $this->db->query("SELECT id_lapangan, tb_lapangan.id_futsal, nama_futsal, harga_lapangan, foto_lapangan FROM tb_lapangan JOIN tb_futsal ON tb_lapangan.id_futsal=tb_futsal.id_futsal WHERE tb_lapangan.id_futsal='$id'");
	}
	// menampilkan futsal
	public function lapangan($id_futsal){
		return $lapangan = $this->db->query("SELECT * FROM tb_lapangan WHERE id_futsal = 'id_futsal'");
	}

	public function tersedia($id_futsal, $id_lapangan, $tanggal, $jam_awal, $jam_akhir){		
		return $this->db->query("SELECT * FROM tb_booking WHERE id_futsal = '$id_futsal' AND id_lapangan = '$id_lapangan' AND (( TIME(waktu_mulai) BETWEEN CAST('$jam_awal' as TIME) AND CAST('$jam_akhir' as TIME)) OR ((TIME(waktu_berakhir) BETWEEN CAST('$jam_awal' as TIME) AND CAST('$jam_akhir' as TIME)))) AND DATE(waktu_mulai) = '$tanggal' AND DATE(waktu_berakhir) = '$tanggal'");
	}

	public function ambilID($username){
 		return $this->db->query("SELECT * FROM tb_customer WHERE username_cust = '$username'")->result_array();
	}

	public function maxID(){
		return $this->db->query("SELECT MAX(id_booking) as id_booking FROM tb_booking")->result_array();
	}

	public function harga($id_futsal,$id_lapangan){
		return $this->db->query("SELECT * FROM tb_lapangan WHERE id_futsal = '$id_futsal' AND id_lapangan = '$id_lapangan'")->result_array();
	}

	public function tambahBook($data){

		$this->db->insert('tb_booking', $data);

	}

}


?>