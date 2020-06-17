<?php 

class Login_Siball extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
        $this->load->view('v_login');
    }

    function aksi_login(){
        $username_cust = $this->input->post('username_cust');
        $password_cust = $this->input->post('password_cust');
        $where = array(
            'username_cust' => $username_cust,
            'password_cust' => $password_cust,
        );
        $cek = $this->m_login->cek_login("tb_customer", $where)->num_rows();
        if($cek > 0){
            $data_session = array(
                'nama' => $username_cust,
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("admin"));
        }else{
            echo "username atau password salah!";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login_siball'));
    }
}
?>