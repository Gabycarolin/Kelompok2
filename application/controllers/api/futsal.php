<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Futsal extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_futsal');

	}

	public function index_get(){

		$futsal = $this->m_futsal->tampilFut()->result();
		$this->response($futsal, REST_Controller::HTTP_OK);
		
	}

}


?>