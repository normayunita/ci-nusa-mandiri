<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

    private $table = 'kategori';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        return $data;
    }

    public function get_rowCount()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

    public function get_kategori()
	{
		$query = $this->db->get($this->table);
		return $query->result();
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

}

/* End of file KategoriModel.php */
