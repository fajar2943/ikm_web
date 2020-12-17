<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("about_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["about"] = $this->about_model->getAll();
        $this->load->view("admin/about/list_about", $data);
    }

    

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/about');
       
        $about = $this->about_model;
        $validation = $this->form_validation;
        $validation->set_rules($about->rules());

        if ($validation->run()) {
            $about->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["about"] = $about->getById($id);
        if (!$data["about"]) show_404();
        
        $this->load->view("admin/about/edit_about", $data);
    }

    
}
