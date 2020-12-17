<html>

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>

    <link rel="stylesheet" href="<?php echo base_url('aset/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('aset/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>

    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <h2>Data penilaian</h2>
                <hr>
                <form method="get" action="">
                    <label>Filter Berdasarkan</label><br>
                    <select name="filter" id="filter">
                        <option value="">Pilih</option>
                        <option value="1">Per Tanggal</option>
                        <option value="2">Per Bulan</option>
                        <option value="3">Per Tahun</option>
                    </select>
                    <br /><br />
                    <!-- <input type="hidden" value="2" name="filter"> -->
                    <div id="form-tanggal">
                        <label>Tanggal</label><br>
                        <input type="text" name="tanggal" class="input-tanggal" />
                        <br /><br />
                    </div>
                    <div id="form-bulan">
                        <label>Bulan</label><br>
                        <select name="bulan">
                            <option value="">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <br /><br />
                    </div>
                    <div id="form-tahun">
                        <label>Tahun</label><br>
                        <select name="tahun">
                            <option value="">Pilih</option>
                            <?php
                            foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-sm btn-secondary" type="submit">Filter</button>

                    <br /><br />
                    <a href="<?php echo site_url('admin/laporan'); ?>">Tampilkan semua data</a>
                </form>
                <hr />

                <b><?php echo $ket; ?></b><br /><br />
                <a class="btn btn-sm btn-info" target="_blank" href="<?php echo $url_cetak; ?>">CETAK</a><br /><br />

                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Bidang</th>
                                <th>Penilaian</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($penilaian)) {
                                $no = 1;
                                $total = 0;
                                foreach ($penilaian as $data) {
                                    $pindah = date('d-m-Y', strtotime($data->pindah));
                                    $total += $data->jumlah;
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $pindah . "</td>";

                                    $p_id = $data->pertanyaan_id;
                                    $get_p =  $this->db->get_where('pertanyaan', ["pertanyaan_id" => $p_id])->row();
                                    $id_bid = $get_p->bidang_id;
                                    $bidang =  $this->db->get_where('bidang', ["bidang_id" => $id_bid])->row();
                                    echo "<td>" . $bidang->bidang_name . "</td>";

                                    $e_id = $data->emot_id;
                                    $get_e = $this->db->get_where('emot', ["emot_id" => $e_id])->row();
                                    echo "<td>" . $get_e->name . "</td>";
                                    echo "<td>" . $data->jumlah . "</td>";
                                    echo "</tr>";
                                    $no++;
                                }
                            }
                            ?>
                        </tbody>
                        <tr>
                            <td colspan="4" align="right"><b>Total Pengunjung</b></td>
                            <td align="right"><?php echo $total ?></b></td>
                        </tr>

                        <script src="<?php echo base_url('aset/jquery-ui/jquery-ui.min.js') ?>"></script> <!-- Load file plugin js jquery-ui -->

                        <script>
                            $(document).ready(function() { // Ketika halaman selesai di load
                                $('.input-tanggal').datepicker({
                                    dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                                });
                                $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                                $('#filter').change(function() { // Ketika user memilih filter
                                    if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                                        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                                        $('#form-tanggal').show(); // Tampilkan form tanggal
                                    } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                                        $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                                    } else { // Jika filternya 3 (per tahun)
                                        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                        $('#form-tahun').show(); // Tampilkan form tahun
                                    }
                                    $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                                })
                            })
                        </script>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
    <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>