<?php 

if(!defined('BASEPATH')) exit ('No direct scrip acces allowed');

class m_ubahpassword extends CI_Model{
     public function update($data, $id_cust){
        $this->db->update('tb_customer', $data, array('id_cust' => $id_cust));
        return ($this->db->affected_rows() > 0 )? TRUE : FALSE;
     }
}
?>