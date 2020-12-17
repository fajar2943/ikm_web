<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model('LaporanModel');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $pindah = $_GET['tanggal'];

                $ket = 'Data penilaian Tanggal ' . date('d-m-y', strtotime($pindah));
                $url_cetak = 'admin/laporan/cetak?filter=1&tanggal=' . $pindah;
                $penilaian = $this->LaporanModel->view_by_date($pindah); // Panggil fungsi view_by_date yang ada di LaporanModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data penilaian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'admin/laporan/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $penilaian = $this->LaporanModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di LaporanModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data penilaian Tahun ' . $tahun;
                $url_cetak = 'admin/laporan/cetak?filter=3&tahun=' . $tahun;
                $penilaian = $this->LaporanModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di LaporanModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data penilaian';
            $url_cetak = 'admin/laporan/cetak';
            $penilaian = $this->LaporanModel->view_all(); // Panggil fungsi view_all yang ada di LaporanModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['penilaian'] = $penilaian;
        $data['option_tahun'] = $this->LaporanModel->option_tahun();
        $this->load->view('view', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $pindah = $_GET['tanggal'];

                $ket = 'Data penilaian Tanggal ' . date('d-m-y', strtotime($pindah));
                $penilaian = $this->LaporanModel->view_by_date($pindah); // Panggil fungsi view_by_date yang ada di LaporanModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data penilaian Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $penilaian = $this->LaporanModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di LaporanModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data penilaian Tahun ' . $tahun;
                $penilaian = $this->LaporanModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di LaporanModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data penilaian';
            $penilaian = $this->LaporanModel->view_all(); // Panggil fungsi view_all yang ada di LaporanModel
        }

        $data['ket'] = $ket;
        $data['penilaian'] = $penilaian;


        $this->load->view('print', $data);
    }
}
