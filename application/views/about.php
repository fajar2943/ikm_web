<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_part/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("_part/navbar.php") ?>
    <div id="wrapper" class="container">
        <div class="mx-auto">
            <div class="jumbotron mt-5 text-center">
			<?php foreach ($about as $about): ?>
            	<img class="rounded-circle text-center" src="<?php echo base_url('upload/about/'.$about->gambar) ?>" width="150" />
                <h1 class="display-4"><?php echo $about->judul ?></h1>
                <p class="lead"><?php echo $about->deskripsi ?></p>
                <hr>
				<p><i class="fas fa-home pr-1"></i> <?php echo $about->alamat ?></p>
                <hr>
                <button type="button" class="btn btn-email"><i class="fas fa-envelope pr-1"></i> <?php echo $about->email ?></button>
				<button type="button" class="btn btn-comm"><i class="fas fa-phone pr-1"></i> <?php echo $about->phone ?></button>
				<button type="button" class="btn btn-comm"><i class="fas fa-tty pr-1"></i> <?php echo $about->fax ?></button>
			<?php endforeach; ?>
            </div>
        </div>
  </div>
	<!-- /#wrapper -->


	<?php $this->load->view("_part/scrolltop.php") ?>
	<?php $this->load->view("_part/modal.php") ?>

	<?php $this->load->view("_part/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete2').attr('href', url);
		$('#deleteabout').modal();
	}
	</script>
</body>

</html>
