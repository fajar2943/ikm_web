<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("penilaian_model");
		if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$data['option_tahun'] = $this->penilaian_model->option_tahun();
		$this->load->view("admin/overview", $data);
		// load view admin/overview.php
		// $this->load->view("admin/overview");
	}
}
