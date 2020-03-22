<?php

class M_data extends CI_Model{

	public function ambil_data(){
		return $this->db->get('tb_booking')->result();
	}

}