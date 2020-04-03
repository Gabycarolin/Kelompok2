<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');

        $is_login    = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url('welcome'));
            return;
        }
    }

    public function index()
    {
        $data = [
            'email' => ''
        ];
        $this->load->view('loginView', $data);
    }

    function auth()
    {
        // echo "berhasil";
        if (!$_POST) {
            $input    = (object) $this->login->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $this->load->view('loginView', $input);
            return;
        }

        if ($this->login->authFutsal($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login sebagai futsal');
            $sess_data = [
                'email'        => $input->email,
                'role'        => 'futsal',
                'is_login'    => true,
            ];
            $this->session->set_userdata($sess_data);
            // redirect(base_url());
            $this->load->view('futsal', $input);
        } else if ($this->login->authPengelola($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login sebagai pengelola');
            $sess_data = [
                'email'        => $input->email,
                'role'        => 'pengelola',
                'is_login'    => true,
            ];
            $this->session->set_userdata($sess_data);
            // redirect(base_url());
            $this->load->view('pengelola', $input);
        } else {
            $this->session->set_flashdata('error', 'E-Mail atau Password salah atau akun Anda sedang tidak aktif!');
            // redirect(base_url('login'));
            $this->load->view('loginView', $input);
        }
    }
}

/* End of file Login.php */
