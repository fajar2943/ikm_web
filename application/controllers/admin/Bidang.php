<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bidang_model");
        $this->load->model("pertanyaan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["bidang"] = $this->bidang_model->getAll();
        $this->load->view("admin/bidang/list_bidang", $data);
    }

    public function add()
    {
        $bidang = $this->bidang_model;
        $validation = $this->form_validation;
        $validation->set_rules($bidang->rules());

        if ($validation->run()) {
            $bidang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/bidang/new_bidang");
    }

    public function detail($id)
    {
        $data['bidang'] = $this->bidang_model->ambil_id_bidang($id);
        $data['pertanyaan'] = $this->pertanyaan_model->ambil_id_pertanyaan($id);
        $this->load->view("admin/bidang/detail_bidang", $data);

    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/bidang');
       
        $bidang = $this->bidang_model;
        $validation = $this->form_validation;
        $validation->set_rules($bidang->rules());

        if ($validation->run()) {
            $bidang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["bidang"] = $bidang->getById($id);
        if (!$data["bidang"]) show_404();
        
        $this->load->view("admin/bidang/edit_bidang", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->bidang_model->delete($id)) {
            redirect(site_url('admin/bidang'));
        }
    }
}
