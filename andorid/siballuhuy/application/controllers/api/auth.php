<?php 
    require APPPATH."libraries/REST_Controller.php";
    use RestServer\Libraries\REST_Controller;
    class Auth extends REST_Controller{
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('string');
            $this->load->model('m_login');
            $this->load->model('m_daftar');
        }

        function index_get(){
            $result = $this->db->get("tb_customer")->result_array();
            $this->response($result, REST_Controller::HTTP_OK);
        }

        public function login_post(){
            $username_cust = $this->post('username_cust');
            $password_cust = $this->post('password_cust');

            if(!empty($username_cust) && !empty($password_cust)){
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'username_cust' => $username_cust,
                    'password_cust' => $password_cust,
                );
                
                $m_login = $this->m_login->cek_login("tb_customer",$con['conditions'])->Row_array();

                if($m_login){
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Berhasil Login.',
                        'data' => $m_login
                    ], REST_Controller::HTTP_OK);
                }else{
                     $this->response([
                        'status' => FALSE,
                        'message' => "Username Atau Password Salah",
                    ], REST_Controller::HTTP_OK);
                }
            }else{
                // $this->response("Provide username and password", REST_Controller::HTTP_OK);
                $this->response([
                    'status' => FALSE,
                    'message' => "Provide username and password",
                ], REST_Controller::HTTP_OK);
            }
        }

        public function registration_post(){
            $nama_cust = strip_tags($this->post('nama_cust'));
            $alamat_cust = strip_tags($this->post('alamat_cust'));
            $telp_cust = strip_tags($this->post('telp_cust'));
            $email_cust = strip_tags($this->post('email_cust'));
            $username_cust = strip_tags($this->post('username_cust'));
            $password_cust = $this->post('password_cust');

            if(!empty($nama_cust) && !empty($alamat_cust) && !empty($telp_cust) && !empty($email_cust) &&
            !empty($username_cust) && !empty($password_cust)){
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email_cust'=> $email_cust,
                );
                $m_daftar = $this->m_daftar->tampil_data("tb_customer", $con['conditions'])->row_array();
                if($m_daftar > 0 ){
                    $this->response("The Given Email already exists", REST_Controller::HTTP_BAD_REQUEST);
                }else{
                    $userData = array(
                        'nama_cust' => $nama_cust,
                        'alamat_cust' => $alamat_cust,
                        'telp_cust' => $telp_cust,
                        'email_cust' => $email_cust,
                        'username_cust' => $username_cust,
                        'password_cust' => $password_cust
                    );
                    $daftar = $this->db->insert("tb_customer", $userData);

                    if($daftar){
                            $this->response([
                                'status' => TRUE,
                                'message' => 'Berhasil daftar',
                                'data' => $userData
                            ], REST_Controller::HTTP_OK);
                    }else{
                        $this->response("Terjadi Kesalahan, silahkan coba lagi", REST_Controller::HTTP_BAD_REQUEST);
                    }

                }
                }else{
                    $this->response("provide complete user info to add", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
            

            public function update($id_cust){
            $d = $_POST;
            
                $arr = 
                [
                    'nama_cust' => $this->input->post('nama_cust'), 
                    'alamat_cust' => $this->input->post('alamat_cust'),
                    'telp_cust' => $this->input->post('telp_cust'),
                    'email_cust' => $this->input->post('email_cust'),
                    'username_cust' => $this->input->post('username_cust'),
                    'password_cust' => $this->input->post('password_cust')
                ];

                $result = array();

                if(mysqli_num_rows($respone)== 1){
                    if($row = mysli_fetch_assoc($respone)){
                        $h['nama_cust'] = $row['nama_cust'];
                        $h['alamat_cust'] = $row['alamat_cust'];
                        $h['telp_cust'] = $row['telp_cust'];
                        $h['email_cust'] = $row['email_cust'];
                        $h['username_cust'] = $row['username_cust'];
                        $h['password_cust'] = $row['password_cust'];
                        $h['password_cust'] = $row['password_cust'];

                        array_push($arr, $h);

                        $result["sukses"] = "1";
                        echo json_encode($result);
                    }
                }else{
                    $result["sukses"] = "1";
                    $result["message"] = "Error";
                    echo json_encode;
                }
            
            }

            public function lupa_post()
            {
                $email_cust = $this->input->post('email_cust');
                if($email_cust){
                    $cek = $this->db->get_where('tb_customer', ['email_cust' => 
                    $email_cust])->row_array();
                    if($cek){
                        // $cektoken = $this->db->get_where('tb_token', ['email_cust' => 
                        // $email_cust, 'tipe' => 'lupapassword']);

                        //menyiapkan token
                        $token = base64_encode(random_string('alnum', 32));
                        $data = [
                            'email_cust' => $email_cust,
                            'tipe' => 'lupapassword',
                            'waktu_buat' => time()
                        ];
                            //respon rest api
                            $result['success'] = 1;
                            $result['message'] = 'silahkan cek email anda untuk aktifasi';
                            echo json_encode($result);
                       
                        
                    }else{
                        $result['success'] =0;
                        $result['message'] = 'email belum terdaftar';
                        echo json_encode($result);
                    }
                }else{
                    $result['success'] = 0;
                    $result['message'] = 'key dan value belum diisi';
                    echo json_encode($result);
                }
            }

            function kirim($token, $type)
            {
                $config = [
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'cobaandro21@gmail.com',
                    'smtp_pass' => 'tahatiunyu',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ];

                $this->load->library('email', $config);
                $this->email->initialize($config);

                $this->email->from('cobaandro21@gmail.com', 'Siball');
                $this->email->to($this->input->post('email_cust'));
                if($type == 'verify'){
                    $this->email->subject('Aktivasi Akun');
                    $this->email->message('Aktivasi akun anda
                    <a href="'. base_url() . 'auth/verifikasi?email=' 
                    . $this->input->post('email_cust') .'&token=' . urlencode($token) . '">disini</a>');
                }else if($type == 'lupapassword'){
                    $this->email->subject('reset password');
                    $this->email->message('reset password anda
                    <a href="' . base_url() . 'auth/resetpassword?email=' 
                    . $this->input->post('email_cust') . '&token=' . urlencode($token) . '">disini</a>');
                }

                if ($this->email->send()){
                    return true;
                }
            }

            }
        
    
?>