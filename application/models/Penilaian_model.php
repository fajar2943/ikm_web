<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    private $_table = "penilaian";

    public $penilaian_id;
    public $pertanyaan_id;
    public $jumlah;
    public $emot_id;

    public function rules()
    {
        return [
            [
                'field' => 'pertanyaan_id',
                'label' => 'pertanyaan_id',
                'rules' => 'required'
            ]
        ];
    }


    public function getAll()
    {
        $this->db->order_by('penilaian_id', 'ASC');
        return $this->db->from('penilaian')
            ->join('pertanyaan', 'pertanyaan.pertanyaan_id=penilaian.pertanyaan_id')
            ->get()
            ->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["penilaian_id" => $id])->row();
    }

    public function ambil_id_penilaian($id)
    {
        $result = $this->db->where('pertanyaan_id', $id)
            ->get('penilaian');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->penilaian_id = uniqid('PN_');
        $this->pertanyaan_id = $post["pertanyaan_id"];
        $this->jumlah = $post["jumlah"];
        $this->emot_id = $post["emot_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->penilaian_id = $post["id"];
        $this->jumlah = $post["jumlah"];
        $this->db->update($this->_table, $this, array('penilaian_id' => $post['id']));
    }

    public function delete($id)
    {
        // $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("penilaian_id" => $id));
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(pindah) AS tahun'); // Ambil Tahun dari field pindah(tanggal)
        $this->db->from('penilaian'); // select ke tabel laporan
        $this->db->order_by('YEAR(pindah)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(pindah)'); // Group berdasarkan tahun pada field pindah

        return $this->db->get()->result(); // Ambil data pada tabel laporan sesuai kondisi diatas
    }
}
