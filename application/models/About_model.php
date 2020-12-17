<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model
{
    private $_table = "about";

    public $about_id;
    public $judul;
    public $email;
    public $phone;
    public $fax;
    public $gambar = "default.jpg";
    public $deskripsi;
    public $alamat;
    

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'judul',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],
            
            ['field' => 'phone',
            'label' => 'phone',
            'rules' => 'numeric'],

            ['field' => 'fax',
            'label' => 'fax',
            'rules' => 'numeric'],
            
            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["about_id" => $id])->row();
    }

    

    public function update()
    {
        $post = $this->input->post();
        $this->about_id = $post["id"];
        $this->judul = $post["judul"];
        $this->email = $post["email"];
        $this->phone = $post["phone"];
        $this->fax = $post["fax"];
        $this->alamat = $post["alamat"];

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
		}

		
		$this->deskripsi = $post["deskripsi"];
		

        $this->db->update($this->_table, $this, array('about_id' => $post['id']));
    }

    
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/about/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->about_id;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	
	

}
