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

				<!-- 
				karena ini halaman overview (home), kita matikan partial breadcrumb.
				Jika anda ingin mengampilkan breadcrumb di halaman overview,
				silahkan hilangkan komentar (//) di tag PHP di bawah.
				-->
				<?php //$this->load->view("admin/_partials/breadcrumb.php") 
				?>

				<!-- Icon Cards-->
				<div class="row">
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-primary o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-boxes"></i>
								</div>
								<div class="mr-5"><?php echo $this->db->count_all('bidang'); ?> Bidang</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/bidang') ?>">
								<span class="float-left">Lihat Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-danger o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-times-circle"></i>
								</div>
								<div class="mr-5"><?php echo $this->db->count_all('emot'); ?> Emoticon</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/emot') ?>">
								<span class="float-left">Lihat Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-info o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-question"></i>
								</div>
								<div class="mr-5"><?php echo $this->db->count_all('pertanyaan'); ?> Pertanyaan</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/pertanyaan') ?>">
								<span class="float-left">Lihat Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-success o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-eye"></i>
								</div>
								<?php
								$today = date('Y-m-d');
								$pengunjung = $this->db->get_where('penilaian', ["pindah" => $today])->result();
								$hasil = 0;
								foreach ($pengunjung as $p) :

									$jml = $p->jumlah;
									$hasil += $jml;

								endforeach

								?>
								<div class="mr-5"><?php echo $hasil ?> pengunjung hari ini</div>
							</div>
							<?php
							$bulan = date('m');
							$tahun = date('Y');
							?>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/laporan?filter=2&bulan=' . $bulan . '&tahun=' . $tahun) ?>">
								<span class="float-left">Lihat Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
				</div>

				<?php
				$bt = date('Y-m-d');
				$t = date('Y');

				//filter tahun
				if (isset($_GET['tahun'])) {

					$tahun = $_GET['tahun'];
					if ($tahun == true) {
						$t = $tahun;
					}
				}

				$visit = $this->db->from('penilaian')->get()->result();
				$jan = 0;
				$feb = 0;
				$mar = 0;
				$apr = 0;
				$mei = 0;
				$jun = 0;
				$jul = 0;
				$agt = 0;
				$sep = 0;
				$okt = 0;
				$nov = 0;
				$des = 0;
				foreach ($visit as $v) :
					$bulan = $v->pindah = date('Y-m', strtotime($v->pindah));
					$jm = $v->jumlah;
					if ($bulan == $t . '-01') {
						$jan += $jm;
					}
					if ($bulan == $t . '-02') {
						$feb += $jm;
					}
					if ($bulan == $t . '-03') {
						$mar += $jm;
					}
					if ($bulan == $t . '-04') {
						$apr += $jm;
					}
					if ($bulan == $t . '-05') {
						$mei += $jm;
					}
					if ($bulan == $t . '-06') {
						$jun += $jm;
					}
					if ($bulan == $t . '-07') {
						$jul += $jm;
					}
					if ($bulan == $t . '-08') {
						$agt += $jm;
					}
					if ($bulan == $t . '-09') {
						$sep += $jm;
					}
					if ($bulan == $t . '-10') {
						$okt += $jm;
					}
					if ($bulan == $t . '-11') {
						$nov += $jm;
					}
					if ($bulan == $t . '-12') {
						$des += $jm;
					}

				endforeach
				?>

				<!-- Area Chart Example-->
				<form action="" method="get">
					<div id="form-tahun">
						<label>Tahun</label><br>
						<select name="tahun">
							<option value="">--Pilih Tahun--</option>
							<?php
							foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
								echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
							}
							?>
						</select>
						<button type="submit" class="btn btn-sm btn-primary">Filter</button>
						<br /><br />
					</div>
				</form>
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-chart-area"></i>
						Visitor Tahun <?php echo $t ?></div>
					<div class="card-body">
						<canvas id="bagan" width="100%" height="30"></canvas>
					</div>
					<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
	<script src="<?php echo base_url('js/demo/chart-bar-demo.js') ?>"></script>

	<script>
		// Set new default font family and font color to mimic Bootstrap's default styling
		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';

		// Area Chart Example
		var ctx = document.getElementById("bagan");
		var myLineChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sept", "Okt", "Nov", "Des"],
				datasets: [{
					label: "Sessions",
					lineTension: 0.3,
					backgroundColor: "rgba(2,117,216,0.2)",
					borderColor: "rgba(2,117,216,1)",
					pointRadius: 5,
					pointBackgroundColor: "rgba(2,117,216,1)",
					pointBorderColor: "rgba(255,255,255,0.8)",
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(2,117,216,1)",
					pointHitRadius: 50,
					pointBorderWidth: 2,
					data: [<?php echo $jan . ',' . $feb . ',' . $mar . ',' . $apr . ',' . $mei . ',' . $jun . ',' . $jul . ',' . $agt . ',' . $sep . ',' . $okt . ',' . $nov . ',' . $des ?>],
				}],
			},
			options: {
				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {
							min: 0,
							max: 10000,
							maxTicksLimit: 5
						},
						gridLines: {
							color: "rgba(0, 0, 0, .125)",
						}
					}],
				},
				legend: {
					display: false
				}
			}
		});
	</script>

</body>

</html>