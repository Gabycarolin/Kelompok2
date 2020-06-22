<?php 
class customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->low = "tb_customer";
    }
    public function index(){

    }
    public function all(){
        $q = $this->db->get($this->low)->result_array();
        echo json_encode(['data' => $q]);
    }
    public function edit($id){
        $q = $this->db->get_where($this->low, ['id_cust' => $id])->row_array();
        echo json_encode(['data' => $q]);
    }
}

?>