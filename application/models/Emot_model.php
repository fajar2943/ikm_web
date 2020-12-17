<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Emot_model extends CI_Model
{
    private $_table = "emot";

    public $emot_id;
    public $name;
    public $image_emot = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required']

          
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["emot_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->emot_id = uniqid('EM_');
        $this->name = $post["name"];
		$this->image_emot = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->emot_id = $post["id"];
        $this->name = $post["name"];
		
		
		if (!empty($_FILES["image_emot"]["name"])) {
            $this->image_emot = $this->_uploadImage();
        } else {
            $this->image_emot = $post["old_image"];
		}

        $this->db->update($this->_table, $this, array('emot_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("emot_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/emot/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->emot_id;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image_emot')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$emot = $this->getById($id);
		if ($emot->image_emot != "default.jpg") {
			$filename = explode(".", $emot->image_emot)[0];
			return array_map('unlink', glob(FCPATH."upload/emot/$filename.*"));
		}
	}

}
