<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_part/head.php") ?>
</head>

<body id="page-top">

    <div id="wrapper" class="container">
        <div class="mx-auto">
            <div class="jumbotron mt-5 text-center">
                <h1 class="display-4">Mari Jawab!</h1>
                <?php foreach ($pertanyaan ?: [] as $pertanyaan) : $p_id = $pertanyaan->pertanyaan_id; ?>
                    <p class="lead"><?php echo $pertanyaan->name ?></p>
                <?php endforeach; ?>
                <hr class="my-4">
                <div class="row">
                    <?php foreach ($emot as $emot) : ?>
                        <div class="col-md-3">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" type="text" name="pertanyaan_id" value="<?php echo $p_id ?>" placeholder="untuk pertanyaan" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" type="text" name="emot_id" value="<?php echo $emot->emot_id ?>" placeholder="untuk pertanyaan" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" type="text" name="jumlah" value="1" placeholder="untuk pertanyaan" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" type="text" name="pindah" value="<?php echo date('Y-m-d'); ?>" placeholder="untuk tanggal create data baru" />
                                </div>
                                <!-- <input class="btn btn-success" type="submit" name="hajar" value="Save" /> -->
                                <button type="submit" name="hajar">
                                    <img src="<?php echo base_url('upload/emot/' . $emot->image_emot) ?>" alt="" width=200 height=200>
                                </button>
                                <p><strong><?php echo $emot->name ?></strong></p>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php
                $today = date('Y-m-d');
                $penilaian = $this->db->from('penilaian')->get()->result();
                $c = $this->db->count_all('penilaian');
                $i = 0;

                if (isset($_POST['hajar'])) {
                    $em = $_POST['emot_id'];

                    foreach ($penilaian as $penilaian) :
                        $pdh = $penilaian->pindah;
                        if ($today == $pdh) {
                            $emt_id = $penilaian->emot_id;
                            $prt_id = $penilaian->pertanyaan_id;
                            $pn_id = $penilaian->penilaian_id;
                            $jml = $penilaian->jumlah;
                            $jml++;
                            if ($em == $emt_id && $p_id == $prt_id) {
                                $post = $this->input->post();
                                $this->jumlah = $jml;
                                $this->db->update('penilaian', $this, array('penilaian_id' => $pn_id));
                                $this->session->set_flashdata('success', 'Terimakasih, penilaian anda berhasil di rekam...');
                                redirect(site_url('welcome'));
                            }
                        }
                        $i++;
                    endforeach;

                    if ($c == $i) {
                        $post = $this->input->post();
                        $this->penilaian_id = uniqid('PN_');
                        $this->pertanyaan_id = $post["pertanyaan_id"];
                        $this->jumlah = $post["jumlah"];
                        $this->pindah = $post["pindah"];
                        $this->emot_id = $post["emot_id"];
                        $this->db->insert('penilaian', $this);
                        $this->session->set_flashdata('success', 'Terimakasih, penilaian anda berhasil di rekam...');
                        redirect(site_url('welcome'));
                    }
                }
                ?>
            </div>
            <h6>Kembali ke halaman Welcome dalam <span id="pesan" class="badge badge-secondary"></span></h6>
        </div>
    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("_part/scrolltop.php") ?>
    <?php $this->load->view("_part/modal.php") ?>

    <?php $this->load->view("_part/js.php") ?>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete2').attr('href', url);
            $('#deleteabout').modal();
        }
    </script>
    <script>
        var url = "<?php echo site_url('welcome/') ?>"; // url tujuan
        var count = 20; // dalam detik
        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#pesan').html(waktu + ' detik.');
                setTimeout("countDown()", 2000);
            } else {
                window.location.href = url;
            }
        }
        countDown();
    </script>
</body>

</html>