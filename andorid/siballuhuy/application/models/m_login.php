<?php 

if(!defined('BASEPATH')) exit ('No direct scrip acces allowed');

class m_login extends CI_Model{
    function cek_login($table, $where){
        return $this->db->get_where($table, $where);
    }
}
?>