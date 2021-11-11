<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }    

    public function login()
    {

        $email = $this->input->post('email');
        $password =  md5($this->input->post('password'));

        
        if ($email != null) {
           $data = [
                     'email' => $email,
                     'password' => $password,
                     'is_active' => 1
                    ];

            $getData = $this->UserModel->get_login_data($data);
            if ($getData != null) {
                $getData->password = "- secret -";
                $this->session->set_userdata((array) $getData);              
                redirect(base_url('user'),'refresh');                
            }
        }
        $this->session->set_flashdata('error_msg', "Username atau Password salah!");
        $this->load->view('Auth/index');        
    }

    public function destroy()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'),'refresh');   
    }

}

/* End of file Auth.php */
