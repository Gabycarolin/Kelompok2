<?php 

if(!defined('BASEPATH')) exit ('No direct scrip acces allowed');

class m_daftar extends CI_Model{
    function tampil_data($table, $data){
        return $this->db->get_where('tb_customer', $data);
    }

    function input_data($table, $data){
        $this->db->insert($table, $data);
    }
}
?>