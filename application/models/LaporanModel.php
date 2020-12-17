<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanModel extends CI_Model
{
    public function view_by_date($date)
    {
        $this->db->where('DATE(pindah)', $date); // Tambahkan where tanggal nya

        return $this->db->get('penilaian')->result(); // Tampilkan data penilaian sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->where('MONTH(pindah)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(pindah)', $year); // Tambahkan where tahun

        return $this->db->get('penilaian')->result(); // Tampilkan data penilaian sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->where('YEAR(pindah)', $year); // Tambahkan where tahun

        return $this->db->get('penilaian')->result(); // Tampilkan data penilaian sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        return $this->db->get('penilaian')->result(); // Tampilkan semua data penilaian
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(pindah) AS tahun'); // Ambil Tahun dari field pindah
        $this->db->from('penilaian'); // select ke tabel penilaian
        $this->db->order_by('YEAR(pindah)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(pindah)'); // Group berdasarkan tahun pada field pindah

        return $this->db->get()->result(); // Ambil data pada tabel penilaian sesuai kondisi diatas
    }
}
