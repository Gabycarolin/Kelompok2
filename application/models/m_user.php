<?php

class M_user extends CI_Model{

	public function auth_admin($username, $password){
		$q = $this->db->query("SELECT * FROM tb_pengelola where username_pengelola='$username' AND password_pengelola='$password' ")->row_array();
		return $q;
	}

	public function auth_owner($username, $password){
		$q = $this->db->query("SELECT * FROM tb_futsal where username_futsal='$username' AND password_futsal='$password'")->row_array();
		return $q;
	}
	
}