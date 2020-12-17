<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pertanyaan extends CI_Controller
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
        
        $data["pertanyaan"] = $this->pertanyaan_model->getAll();
        $this->load->view("admin/pertanyaan/list_pertanyaan", $data);
    }

    public function add()
    {
        $dataku["bidang"] = $this->bidang_model->getAll();

        $bidang = $this->bidang_model;
        $pertanyaan = $this->pertanyaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pertanyaan->rules());

        if ($validation->run()) {
            $pertanyaan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pertanyaan/new_pertanyaan", $dataku);
    }

    public function edit($id = null)
    {
        $data["bidang"] = $this->bidang_model->getAll();
        
        if (!isset($id)) redirect('admin/pertanyaan');
       
        
        $pertanyaan = $this->pertanyaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pertanyaan->rules());

        if ($validation->run()) {
            $pertanyaan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pertanyaan"] = $pertanyaan->getById($id);
        if (!$data["pertanyaan"]) show_404();
        
        $this->load->view("admin/pertanyaan/edit_pertanyaan", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pertanyaan_model->delete($id)) {
            redirect(site_url('admin/pertanyaan'));
        }
    }
}
