<?php

class M_data extends CI_Model{

	public function ambilDataTrx(){
		return $dataTrx = $this->db->query("SELECT * FROM tb_booking")->result();
	}

	public function dataDP(){
		return $dataDP=$this->db->query("SELECT * From tb_booking JOIN tb_futsal ON tb_booking.id_futsal=tb_futsal.id_futsal JOIN tb_customer ON tb_booking.id_cust=tb_customer.id_cust WHERE tb_booking.status='DP'")->result();
	}

	public function dataFullpay(){
		return $dataFull = $this->db->query("SELECT * from tb_booking join tb_futsal ON tb_booking.id_futsal=tb_futsal.id_futsal JOIN tb_customer ON tb_booking.id_cust=tb_customer.id_cust where tb_booking.status='Lunas'")->result();		
	}

	public function custBookingLunas(){	
		$id = $this->session->userdata('id');
		return $dataBook = $this->db->query("SELECT * from tb_booking join tb_futsal ON tb_booking.id_futsal=tb_futsal.id_futsal JOIN tb_customer ON tb_booking.id_cust=tb_customer.id_cust where tb_booking.id_futsal='$id' AND tb_booking.status='Lunas'")->result();
		echo $dataBook;
	}

	public function custBookingDP(){
		$id = $this->session->userdata('id');
		return $dataBookDP = $this->db->query("SELECT * From tb_booking JOIN tb_futsal ON tb_booking.id_futsal=tb_futsal.id_futsal JOIN tb_customer ON tb_booking.id_cust=tb_customer.id_cust WHERE tb_booking.id_futsal='$id' AND tb_booking.status='DP'")->result();
	}

	public function getDataCust(){
		return $dataCust = $this->db->query("SELECT * from tb_customer")->result();
	}

	public function ambilSatuOwner(){
		$id = $this->session->userdata('id');
		return $dataSatuOwn = $this->db->query("SELECT * From tb_futsal where id_futsal='$id'")->result();
	}

	public function profilPengelola(){
		$id = $this->session->userdata('id');
		return $dataPengelola = $this->db->query("SELECT * From tb_pengelola WHERE id_pengelola='$id'")->result();
	}

	public function ambilSemuaOwner(){
		return $dataOwn = $this->db->query("SELECT * FROM tb_futsal")->result();
	}

	public function tambahOwner($data,$id){
		$this->db->insert($id,$data);
	}

	public function dataLapangan(){
		$id = $this->session->userdata('id');
		return $dataLapangan = $this->db->query("SELECT id_lapangan, nama_lapangan, harga_lapangan, foto_lapangan from tb_lapangan where id_futsal='$id'")->result();
	}

	public function updateLap($where,$data,$id){
		$this->db->where($where);
		$this->db->update($id,$data);
	}

	public function tambahLapangan($data,$id){
		$where = $this->session->userdata('id');
			$this->db->where($where);
			$this->db->insert($id,$data);
	}
}

