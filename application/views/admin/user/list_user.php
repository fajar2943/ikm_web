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
						<?php
						$u = $this->session->userdata('user_logged');
						$u_id = $u->user_id;
						$role = $u->role;

						if ($role == 'super') { ?>
							<a href="<?php echo site_url('admin/user/add') ?>"><i class="fas fa-plus"></i> Tambah user</a>
						<?php
						}
						?>

					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php

									if ($role == 'super') { ?>
										<?php foreach ($user as $user) : ?>
											<tr>
												<td width="150">
													<?php echo $user->username ?>
												</td>
												<td>
													<?php echo $user->email ?>
												</td>
												<td width="250">
													<a href="<?php echo site_url('admin/user/edit/' . $user->user_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
													<?php
													if ($u_id != $user->user_id) { ?>
														<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/' . $user->user_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
													<?php
													} else {
														echo '<span class="badge badge-success">Super Admin</span>';
													}
													?>

												</td>
											</tr>
										<?php endforeach; ?>
									<?php
									} else { ?>
										<tr>
											<td width="150">
												<?php echo $u->username ?>
											</td>
											<td>
												<?php echo $u->email ?>
											</td>
											<td width="250">
												<a href="<?php echo site_url('admin/user/edit/' . $u->user_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit Profil</a>
											</td>
										</tr>
									<?php
									}
									?>


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
		function deleteConfirm(url) {
			$('#btn-delete6').attr('href', url);
			$('#deleteuser').modal();
		}
	</script>
</body>

</html>