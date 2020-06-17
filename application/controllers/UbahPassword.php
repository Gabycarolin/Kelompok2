<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UbahPassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        // $this->load->model('m_ubahPassword');
    }

    public function index()
    {

        //query dari menampilka  session email untuk ubah password
        //saya menaruh query di controler sehingga pada function __construct diatas saya tidak me-load m_ubahPassword
        $data['tb_futsal'] = $this->db->get_where('tb_futsal', ['email_futsal' =>
        $this->session->userdata('email')])->row_array();


        // validasi inputan password baru
        $this->form_validation->set_rules('pass_baru', 'New Password', 'required|trim|max_length[10]|matches[confirm_pass]', [
            'max_length' => 'Password terlalu panjang !',
            'matches' => 'Password tidak cocok !'
        ]);
        $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[pass_baru]', [
            'max_length' => 'Password terlalu panjang !',
            'matches' => 'Password tidak cocok !'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['tittle'] = 'Masukkan Password  Baru !';
            $this->load->view('auth/v_ubahPassword', $data);
        } else {
            //membuat variabel baru untuk menangkap data inputan pada ubah password
            $password_baru = $this->input->post('pass_baru');
            //load model ubah password untuk memanggil query
            $this->db->set('password_futsal', $password_baru);
            $this->db->where('email_futsal', $this->session->userdata('email'));
            $this->db->update('tb_futsal');

            //alert pada tampilan login
            $this->session->set_flashdata('lupa_pass', '<div class="alert alert-success" role="alert">Password Berhasil Diubah, Silahkan Login Kembali !</div>');
            redirect('auth');
        }
    }
}
