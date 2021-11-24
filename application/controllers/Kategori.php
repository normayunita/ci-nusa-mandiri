<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
    }

    public function index()
    {
        $headerData = [
            "headertitle" => "Kategori",
            "headerchild" => "Show Data",
            "urldata" => "kategori"
        ];

        $this->load->view('_template/header', $headerData);
        $this->load->view('kategori/kategori_index');
        $this->load->view('_template/footer');
    }

    public function getAll()
    {
        $dataKategori = $this->KategoriModel->get_kategori();
        $dataCount = $this->KategoriModel->get_rowCount();

        $tampung = "";

        if ($dataCount > 0) {
            $i = 1;
            foreach($dataKategori as $row) {
                // exit($row);
                $tampung .= "<tr>";
                $tampung .= "<td>" . $i++ . "</td>";
                $tampung .= "<td>" . $row->nama_kategori . "</td>";
                $tampung .= "<td>";
                $tampung .= "<button class='btn_hapus btn btn-warning btn-update' onclick='onUpdate(".$row->id.")'  id='data-update_" . $row->id . "' data-kategoriName='" . $row->nama_kategori . "' >Update</button>  ";
                $tampung .= "<button class='btn_hapus btn btn-danger btn-delete' onclick='onDelete(".$row->id.")'  id='data-delete_" . $row->id . "' data-kategoriName='" . $row->nama_kategori . "' >Hapus</button>";
                $tampung .= "</td>";
                $tampung .= "</tr>";
            }
        }else{
            $tampung .= "<tr>";
            $tampung .= "<td colspan='3'>Data Tidak Ditemukan</td>";
            $tampung .= "</tr>";
        }
        

        $data = [
            "AllData" => $tampung
        ];

        echo json_encode($data);
    }

    public function create()
    {
        $data = $this->KategoriModel->get_data();
        $save = $this->KategoriModel->insert_data($data);
        $data = [
            "response" => 200,
            "message" => "Success"
        ];
        echo json_encode($data);
    }

    public function update()
    {
        $data = $this->KategoriModel->get_data();
        $data['id'] = $this->input->post('id');
        $update = $this->KategoriModel->update_data($data);
        $data = [
            "response" => 200,
            "message" => "Success Update"
        ];
        echo json_encode($data);
    }

    public function delete()
    {        
        $id = $this->input->post('id');
        $getData = $this->KategoriModel->get_one($id);
        if ($getData != null) {
           $delete = $this->KategoriModel->delete_data($id);
        }
        
        $data = [
            "response" => 200,
            "message" => "Success di hapus!"
        ];
        echo json_encode($data);
    }

}

/* End of file Kategori.php */
