<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php foreach ($about as $about) : ?>
					<div class="card">
						<div class="row">
							<div class="col-sm-6">
								<img src="<?php echo base_url('upload/about/' . $about->gambar) ?>" style="width: 30rem;" class="card-img-top" alt="...">
							</div>
							<div class="col-sm-6">
								<div class="card-body">
									<h5 class="card-title"><?php echo $about->judul ?></h5>
									<p class="card-text">Email : <?php echo $about->email ?></p>
									<p class="card-text">Phone : <?php echo $about->phone ?></p>
									<p class="card-text">Fax : <?php echo $about->fax ?></p>
									<p class="card-text">Deskripsi : <?php echo substr($about->deskripsi, 0, 65) ?>...</p>
									<p class="card-text">Alamat : <?php echo substr($about->alamat, 0, 65) ?>...</p>
									<a href="<?php echo site_url('admin/about/edit/' . $about->about_id) ?>" class="btn btn-primary">Edit</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url) {
			$('#btn-delete2').attr('href', url);
			$('#deleteabout').modal();
		}
	</script>
</body>

</html>