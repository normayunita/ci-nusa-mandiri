<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }    

    public function index()
    {

        $headerData = [
            "headertitle" => "Users",
            "headerchild" => "Show Data",
            "urldata" => "users"
        ];

         $data = [
             "nama" => "Norma Yunita",
             "email" => "normayunita.nyt@nusamandiri.ac.id",
             "image" => "norma.jpg",
             "password" => "-screet-",
             "role_id" => 1,
             "is_active" => 1,
             "tanggal_input" => "2021-09-29"
         ];

         $this->load->view('_template/header', $headerData);
         $this->load->view('user/user_index', $data);
         $this->load->view('_template/footer');
               
    }

    public function form_add_view()
    {
        $headerData = [
            "headertitle" => "Users",
            "headerchild" => "Create User",
            "urldata" => "users"
        ];

         $this->load->view('_template/header', $headerData);
         $this->load->view('user/form_add');
         $this->load->view('_template/footer');
    }

    public function create()
    {   
        $this->UserModel->rule();
        if($this->form_validation->run() == true){
            $this->index();
        }else{
            $this->form_add_view();
        }
    }

}

/* End of file User.php */
