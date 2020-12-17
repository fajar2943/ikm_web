<?php

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bidang_model");
        $this->load->model("pertanyaan_model");
        $this->load->model("emot_model");
        $this->load->model("about_model");
        $this->load->model("penilaian_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        if ($this->input->post()) {
            if ($this->user_model->doLogin()) redirect(site_url('admin'));
        }
        $data["about"] = $this->about_model->getAll();
        $this->load->view("home.php", $data);
    }

    public function bidang()
    {
        $a = $this->db->count_all('bidang');
        $b = 1;
        $c = $this->bidang_model->getAll();
        if ($a == $b) {
            foreach ($c as $c) :
                redirect(site_url('welcome/pertanyaan/' . $c->bidang_id));
            endforeach;
        } else {
            $data["bidang"] = $this->bidang_model->getAll();
            $this->load->view("bidang.php", $data);
        }
    }

    public function pertanyaan($id)
    {
        $data["emot"] = $this->emot_model->getAll();
        $data['bidang'] = $this->bidang_model->ambil_id_bidang($id);
        $data['pertanyaan'] = $this->pertanyaan_model->ambil_id_pertanyaan($id);
        $this->load->view("pertanyaan.php", $data);
    }

    public function about()
    {
        $data["about"] = $this->about_model->getAll();
        $this->load->view("about.php", $data);
    }

    public function penilaian()
    {
        $penilaian = $this->penilaian_model;
        $validation = $this->form_validation;
        $validation->set_rules($penilaian->rules());

        if ($validation->run()) {
            $penilaian->save();
            redirect(site_url('welcome'));
        }

        $this->load->view("welcome/pertanyaan");
    }
}
