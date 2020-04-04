<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //untuk menge-load Login_model
        $this->load->model('Login_model', 'login');
        //memasukkan data 'is_login' ke variabel '$is_login'
        $is_login    = $this->session->userdata('is_login');
        //menge-cek apakah user sedang login
        if ($is_login) {
            //jika iya, maka langsung dilarikan(redirect)ke url welcome 
            redirect(base_url('welcome'));
            return;
            //jika tidak, maka user tidak dapat melakukan perintah apapun dan akan di return di login
        }
    }

    public function index() //menjalankan index.php
    {
        //inisialisasi email, apabila memasukkan email/password salah maka data email tsb tidak hilang
        $data = [
            'email' => ''
        ];
        //untuk menge-load loginView
        $this->load->view('loginView', $data);
    }

    function auth() //menjalankan function auth
    {
        // echo "berhasil";

        if (!$_POST) { //pertama di cek dahulu apakah ada post
            $input    = (object) $this->login->getDefaultValues(); //getDefaultValues diambil dari login_model
        } else { //jika ada post, maka dikirim ke variabel $input dijadikan object
            $input    = (object) $this->input->post(null, true);
        }
        //lalu dilakukan validasi data
        if (!$this->login->validate()) { //jika data tidak valid
            //maka akan menge-load loginView lagi
            $this->load->view('loginView', $input);
            return;
        }

        if ($this->login->authFutsal($input)) { //akan dikirim ke funtion authfutsal dan akan dicek apakah data benar
            //jika data yg dimasukkan benar maka akan diberi session
            $this->session->set_flashdata('success', 'Berhasil melakukan login sebagai futsal');
            $sess_data = [
                'email'        => $input->email,
                'role'        => 'futsal',
                'is_login'    => true, //berarti sudah login
            ];
            $this->session->set_userdata($sess_data); //sesi diatas dikirim kesini
            // redirect(base_url());
            $this->load->view('futsal', $input);
        } else if ($this->login->authPengelola($input)) { //cek di authpengelola yang ada di login_model
            //jika data yang dimasukkan benar maka akan diberi session sukses
            $this->session->set_flashdata('success', 'Berhasil melakukan login sebagai pengelola');
            $sess_data = [
                'email'        => $input->email,
                'role'        => 'pengelola',
                'is_login'    => true,
            ];
            $this->session->set_userdata($sess_data);
            // redirect(base_url());
            $this->load->view('pengelola', $input);
        } else { //jika salah semua berarti user memang belum memiliki data user atau memsaukkan data salah
            $this->session->set_flashdata('error', 'E-Mail atau Password salah atau akun Anda sedang tidak aktif!');
            // redirect(base_url('login'));
            $this->load->view('loginView', $input);
        }
    }
}

/* End of file Login.php */
