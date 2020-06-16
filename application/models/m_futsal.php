<?php

class M_futsal extends CI_Model{

	function tampilFut(){
		return $tampilFut = $this->db->query("SELECT id_futsal, nama_futsal, alamat_futsal, telp_futsal FROM tb_futsal WHERE id_futsal");
	}

	function specFut($id){
		return $specFut = $this->db->query("SELECT id_lapangan, tb_lapangan.id_futsal, nama_futsal, harga_lapangan, foto_lapangan FROM tb_lapangan JOIN tb_futsal ON tb_lapangan.id_futsal=tb_futsal.id_futsal WHERE tb_lapangan.id_futsal='$id'");
	}

}


?>