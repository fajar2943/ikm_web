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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/about/') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/about/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $about->about_id?>" />

							<div class="form-group">
								<label for="judul">Nama Instansi*</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" placeholder="Masukan nama instansi..." value="<?php echo $about->judul ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="judul">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="Masukan email..." value="<?php echo $about->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="phone">Nomor Telepon</label>
								<input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>"
								 type="number" name="phone" min="0" placeholder="Masukan no telepon" value="<?php echo $about->phone ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('phone') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="fax">fax</label>
								<input class="form-control <?php echo form_error('fax') ? 'is-invalid':'' ?>"
								 type="number" name="fax" min="0" placeholder="Masukan fax" value="<?php echo $about->fax ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('fax') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="judul">Masukkan Gambar</label>
								<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
								 type="file" name="gambar" />
								<input type="hidden" name="old_image" value="<?php echo $about->gambar ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Alamat*</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 name="alamat" placeholder="Masukan alamat..."><?php echo $about->alamat ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">About*</label>
								<textarea id="editor1" class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Masukan deskripsi instansi..."><?php echo $about->deskripsi ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
