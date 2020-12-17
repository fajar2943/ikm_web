<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_part/head.php") ?>
</head>

<body id="page-top">

    <div id="wrapper" class="container">
        <div class="mx-auto mt-5">
            <div class="jumbotron text-center">
                <h1 class="display-4">Mari Pilih!</h1>
                <p class="lead">Silahkan pilih bidang pelayanan yang ingin anda nilai!</p>
                <hr class="my-4">
                <?php foreach ($bidang as $bidang) : ?>
                    <a class="btn border border-primary btn-lg" href="<?php echo site_url('welcome/pertanyaan/' . $bidang->bidang_id) ?>" role="button"><?php echo $bidang->bidang_name ?></a>
                <?php endforeach; ?>
            </div>
            <h6>Kembali ke halaman Welcome dalam <span id="pesan" class="badge badge-secondary"></span></h6>
        </div>
    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("_part/scrolltop.php") ?>
    <?php $this->load->view("_part/modal.php") ?>

    <?php $this->load->view("_part/js.php") ?>

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