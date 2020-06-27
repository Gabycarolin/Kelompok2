<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Futsal extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_futsal');

	}

	public function index_get(){
		$id = $this->get('id_futsal');

		$futsal = $this->m_futsal->lapangan($id)->result();
		$this->response($futsal, REST_Controller::HTTP_OK);
	}

}


?>