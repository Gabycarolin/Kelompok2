<?php

class M_data extends CI_Model{

	public function ambil_data(){
		return $dataDown=$this->db->query("select * from tb_booking where status = 'DP'")->result();
	}

	public function dataFullpay(){
		// $result = array();
		return $dataFull = $this->db->query("select * from tb_booking where status = 'Lunas'")->result();
		// $query = $this->db->get();

		// if($dataFull->num_rows() > 0){
		// 	$results = $query->$result();
		// 	}
		// 	return $results;
		// }
		
	}
}

