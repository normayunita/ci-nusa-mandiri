<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('RoleModel');
    }    

    public function index()
    {
        $headerData = [
            "headertitle" => "Users",
            "headerchild" => "Show Data",
            "urldata" => "users"
        ];

		$data = [
            "AllData" => $this->UserModel->get_users(),
            "RoleData" => $this->RoleModel->get_all(),
            "AllDataWithJoin" => $this->UserModel->get_all_join_with_role()
        ];

        
        echo json_encode($data);
        exit();

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
            $data = $this->UserModel->get_data();
            
            $config = [
                "upload_path" => "./uploads/user_images/",
                "allowed_types" => "gif|jpg|jpeg|png",
                "overwrite" => true
            ];

            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('image')){
                $msg_err = $this->upload->display_errors();
                $this->session->set_flashdata('error_msg', $msg_err);
                $this->form_add_view();
            }else{
                $upload = $this->upload->data();
                $data["image"] = $upload["file_name"];
                $save = $this->UserModel->insert_data($data);
                $this->index();
            }
            
        }else{
            // jika validasi gagal
            $this->form_add_view();
        }
    }

    

    public function form_edit_view($id)
    {
        $headerData = [
            "headertitle" => "Users",
            "headerchild" => "Update User",
            "urldata" => "users"
        ];
		$data = [
			"oneData" => $this->UserModel->get_one($id)
		]; 

         $this->load->view('_template/header', $headerData);
         $this->load->view('user/form_edit', $data);
         $this->load->view('_template/footer');
    }

    public function update()
    {
		$id = $this->uri->segment('2');
        $this->UserModel->rule();
        if($this->form_validation->run() == true)
        {
            $data = $this->UserModel->get_data();            
            $data['id'] = $this->input->post('id');
            
            $update = $this->UserModel->update_data($data);
            if ($update) {                
               
               redirect(base_url('users'),'refresh');
               
            }
            $this->form_edit_view($id);
        }
        
        $this->form_edit_view($id);
    }

    public function delete()
    {
        $id = $this->uri->segment('2');
        $getData = $this->UserModel->get_one($id);
        if ($getData != null) {
           $delete = $this->UserModel->delete_data($id);
        }
        redirect(base_url('users'),'refresh');
    }
    

}

/* End of file User.php */
