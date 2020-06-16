<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //data admin
    public function getData() {
        $id = $this->get('id_admin');
        if ($id == '') {
            $data = $this->db->get('tb_admin')->result();
        } else {
            $this->db->where('id_admin', $id);
            $data = $this->db->get('tb_admin')->result();
        }
        $this->response($data, 200);
    }

    // tambah data admin
    public function postData() {
    	$id = $this->post('id_admin');
    	$nama = $this->post('nama_admin');
    	$alamat = $this->post('alamat_admin');
        $data = array(
                    'id_admin'           => $id,
                    'nama_admin'          => $nama,
                    'alamat_admin'    => $alamat);
        $insert = $this->db->insert('tb_admin', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data
    public function putData() {
        $id = $this->put('id_admin');
        $id_adm = $this->put('id_admin');
        $nama = $this->put('nama_admin');
        $alamat = $this->put('nomor');
        $data = array(
                    'id_admin'       => $id_adm,
                    'nama_admin'          => $nama,
                    'nomor'    => $alamat);
        $this->db->where('id_admin', $id);
        $update = $this->db->update('tb_admin', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // hapus data
    public function delData() {
        $id = $this->delete('id_admin');
        $this->db->where('id_admin', $id);
        $delete = $this->db->delete('tb_admin');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}