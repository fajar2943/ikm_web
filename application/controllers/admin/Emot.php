<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("emot_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["emot"] = $this->emot_model->getAll();
        $this->load->view("admin/emot/list_emot", $data);
    }

    public function add()
    {
        $emot = $this->emot_model;
        $validation = $this->form_validation;
        $validation->set_rules($emot->rules());

        if ($validation->run()) {
            $emot->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/emot/new_emot");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/emot');
       
        $emot = $this->emot_model;
        $validation = $this->form_validation;
        $validation->set_rules($emot->rules());

        if ($validation->run()) {
            $emot->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["emot"] = $emot->getById($id);
        if (!$data["emot"]) show_404();
        
        $this->load->view("admin/emot/edit_emot", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->emot_model->delete($id)) {
            redirect(site_url('admin/emot'));
        }
    }
}
