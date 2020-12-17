<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    private $_table = "bidang";

    public $bidang_id;
    public $bidang_name;
    

    public function rules()
    {
        return [
            ['field' => 'bidang_name',
            'label' => 'bidang_name',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["bidang_id" => $id])->row();
    }

    public function ambil_id_bidang($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('bidang_id', $id)->limit(1)
        ->get('bidang');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    

    public function save()
    {
        $post = $this->input->post();
        $this->bidang_id = uniqid('BD_');
        $this->bidang_name = $post["bidang_name"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->bidang_id = $post["id"];
        $this->bidang_name = $post["bidang_name"];

        $this->db->update($this->_table, $this, array('bidang_id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("bidang_id" => $id));
	}
	

}
