<?php

class M_data extends CI_Model{

	public function ambil_data(){
		return $dataDown=$this->db->query("select * from tb_booking where status = 'DP'")->result();
	}

	public function dataFullpay(){
		// $result = array();
		return $dataFull = $this->db->query("select * from tb_booking where status = 'Lunas'")->result();
		
	}

	public function ambilDataCustomer(){
		return $dataCust = $this->db->query("SELECT * From tb_customer")->result();

	}

	public function ambilDataOwner(){
		return $dataOwner = $this->db->query("SELECT * From tb_futsal")->result();
	}

	public function ambilDataBook(){

		return $dataBook = $this->db->query("SELECT * from tb_booking JOIN tb_futsal ON tb_booking.id_futsal=tb_futsal.id_futsal JOIN tb_lapangan ON tb_booking.id_lapangan=tb_lapangan.id_lapangan JOIN tb_customer ON tb_booking.id_cust=tb_customer.id_cust WHERE tb_booking.id_futsal")->result();

	}

}

