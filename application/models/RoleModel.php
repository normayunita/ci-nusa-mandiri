<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_Model {    

	private $table = 'role';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_all()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}
    
    public function get_one($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id])->row();
		return $data;
    }

}

/* End of file RoleModel.php */
