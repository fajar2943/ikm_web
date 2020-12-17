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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/bidang/add') ?>"><i class="fas fa-plus"></i> Tambah bidang</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama bidang</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($bidang as $bidang): ?>
									<tr>
										<td>
											<?php echo $bidang->bidang_name ?>
										</td>

										<td width="280">
											<a href="<?php echo site_url('admin/bidang/detail/'.$bidang->bidang_id) ?>"
											 class="btn btn-small text-success"><i class="fas fa-search"></i> Detail</a>
											<a href="<?php echo site_url('admin/bidang/edit/'.$bidang->bidang_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/bidang/delete/'.$bidang->bidang_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	function deleteConfirm(url){
		$('#btn-delete2').attr('href', url);
		$('#deletebidang').modal();
	}
	</script>
</body>

</html>
