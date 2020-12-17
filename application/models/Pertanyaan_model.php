<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{
    private $_table = "pertanyaan";

    public $pertanyaan_id;
    public $bidang_id;
    public $name;

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
        $this->db->order_by('pertanyaan_id', 'ASC');
        return $this->db->from('pertanyaan')
          ->join('bidang', 'bidang.bidang_id=pertanyaan.bidang_id')
          ->get()
          ->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pertanyaan_id" => $id])->row();
    }

    public function ambil_id_pertanyaan($id)
    {
        $result = $this->db->where('bidang_id', $id)
        ->get('pertanyaan');
        if($result->num_rows() > 0 ){
            return $result->result();
        }else {
            return false;
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->pertanyaan_id = uniqid('PT_');
        $this->name = $post["name"];
        $this->bidang_id = $post["bidang_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->pertanyaan_id = $post["id"];
        $this->name = $post["name"];
        $this->bidang_id = $post["bidang_id"];
        $this->db->update($this->_table, $this, array('pertanyaan_id' => $post['id']));
    }

    public function delete($id)
    {
		// $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("pertanyaan_id" => $id));
	}
	

}
