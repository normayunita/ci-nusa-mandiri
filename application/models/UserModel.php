<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	private $table = 'user';

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

	public function get_users()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

    public function get_data()
    {
        $format = "%Y-%m-%d %H:%i";
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'role_id' => $this->input->post('role'),
            'is_active' => $this->input->post('status'),
            'tanggal_input' =>  mdate($format),
        );
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function get_one($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id])->row();
		return $data;
    }

    public function update_data($data)
    {
        $where = $this->db->where('id', $data['id']);
        $update = $where->update($this->table, $data);
        return $update;
    }

    public function delete_data($id)
    {
        $delete = $this->db->delete($this->table, ['id' => $id]); 
        return $delete;
    }
    

    public function get_login_data($data)
    {
        $where = $this->db->get_where($this->table, $data)->row();
        return $where;
    }

    public function get_all_join_with_role()
    {
        $this->db->select()
                ->from('user a')
                ->join('role b', 'b.id =a.role_id')
                ->order_by("a.tanggal_input", "dessc");
        return $this->db->get()->result_array();
    }
    

}

/* End of file UserModel.php */
