<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UbahPassword extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/v_ubahPassword');
    }
}
