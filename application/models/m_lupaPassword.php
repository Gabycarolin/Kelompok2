<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_lupaPassword extends CI_Model
{
    public function auth_admin($email){
		$q = $this->db->query("SELECT * FROM tb_futsal where email_futsal='$email' ")->row_array();
		return $q;
	}
}
