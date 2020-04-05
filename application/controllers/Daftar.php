<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //untuk menge-load Daftar_model
        $this->load->model('Daftar_model', 'daftar');
    }

    public function index()
    {
        $this->load->view('daftarView');
    }

    public function daftar()
    {
    }
}
