<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{


    function authFutsal($input)
    {
        //dicocokkan apakah data yang dimasukkan benar
        //get('futsal' ini memanggil tabel futsal, karena kita menggunakan dbprefik jadi langsung dituliskan 'futsal')
        //row digunakan untuk mengambil id yang dipanggil
        $query = $this->db->where('email_futsal', $input->email)->where('password_futsal', $input->password)->get('futsal')->row();
        // $query = $this->db->query("SELECT * FROM tb_futsal WHERE id_futsal='$email_futsal' AND password_futsal='$password_futsal' LIMIT 1");
        return $query; //apabila bener dikembalikan ke login controller
    }

    function authPengelola($input)
    {
        $query = $this->db->where('email_pengelola', $input->email)->where('password_pengelola', $input->password)->get('pengelola')->row();
        // $query = $this->db->query("SELECT * FROM tb_futsal WHERE id_futsal='$email_futsal' AND password_futsal='$password_futsal' LIMIT 1");

        return $query;
    }

    public function getDefaultValues()
    {
        return [
            'email'        => '',
            'password'    => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'email',
                'label'    => 'E-Mail',
                'rules'    => 'trim|required|valid_email', //harus diisi dan format harus email
            ],
            [
                'field'    => 'password',
                'label'    => 'Password',
                'rules'    => 'required', //harus diisi
            ]
        ];

        return $validationRules;
    }

    public function validate()
    {
        $this->load->library('form_validation'); //menge-load form validation

        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">',
            '</small>'
        );
        $validationRules = $this->getValidationRules();

        $this->form_validation->set_rules($validationRules);

        return $this->form_validation->run();
    }
}

/* End of file ModelName.php */
