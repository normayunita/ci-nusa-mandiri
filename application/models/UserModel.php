<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function rule()
    {
        $rules = [
            [
                'field'   => 'nama',
                'label'   => 'Nama Lengkap',
                'rules'   => 'required',
            ],
            [
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'trim|required|valid_email'
            ],
            [
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required|min_length[8]'
            ],
        ];

        return $this->form_validation->set_rules($rules);
        
    }
    

}

/* End of file UserModel.php */
