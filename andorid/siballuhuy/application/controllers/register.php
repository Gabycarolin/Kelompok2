<?php 

class register extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_daftar');
        $this->load->helper('url');
    }

    function index(){
        $data['tb_customer'] = $this->m_daftar->tampil_data("tb_customer", [])->result();
        $this->load->view('v_register', $data);
    }

    function tambah(){
        $this->load->view('v_register');
    }

    function daftar_aksi(){
        $nama_cust = $this->input->post('nama_cust');
        $alamat_cust = $this->input->post('alamat_cust');
        $telp_cust = $this->input->post('telp_cust');
        $email_cust = $this->input->post('email_cust');
        $username_cust = $this->input->post('username_cust');
        $password_cust = $this->input->post('password_cust');

        $data = array(
            'nama_cust' => $nama_cust,
            'alamat_cust' => $alamat_cust,
            'telp_cust' => $telp_cust,
            'email_cust' => $email_cust,
            'username_cust' => $username_cust,
            'password_cust' => $password_cust
        );

        $this->m_daftar->input_data($data, 'tb_customer');
        redirect('register/index');
    }
}
?>