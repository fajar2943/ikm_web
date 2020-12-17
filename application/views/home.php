<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_part/head.php") ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body id="page-top">

	<div id="wrapper" class="container">

		<div class="row mt-4">
			<div class="col-sm-6">
				<div class="jumbotron text-center mx-auto">
					<h1 class="display-5">Selamat Datang!</h1>
					<p class="lead">mari lakukan penilaian terhadap kami</p>
					<hr class="my-4">
					<a class="btn btn-primary btn-lg" href="<?php echo site_url('welcome/bidang') ?>" role="button">Mulai Sekarang</a>
				</div>
				<div class="jumbotron text-center mx-auto">
					<h3 class="display-6" id="tanggal"></h3>
					<hr>
					<h5 class="lead"><span class="badge badge-dark" id="clock"></span></h5>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="jumbotron text-center">
					<?php foreach ($about as $about) : ?>
						<img class="text-center" src="<?php echo base_url('upload/about/' . $about->gambar) ?>" width="150" />
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

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("_part/scrolltop.php") ?>
	<?php $this->load->view("_part/modal.php") ?>

	<?php $this->load->view("_part/js.php") ?>

	<script type='text/javascript'>
		var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth();
		var thisDay = date.getDay(),
			thisDay = myDays[thisDay];
		var yy = date.getYear();
		var year = (yy < 1000) ? yy + 1900 : yy;
		document.getElementById('tanggal').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
		//
	</script>

	<script type="text/javascript">
		function showTime() {
			var a_p = "";
			var today = new Date();
			var curr_hour = today.getHours();
			var curr_minute = today.getMinutes();
			var curr_second = today.getSeconds();
			if (curr_hour < 12) {
				a_p = "AM";
			} else {
				a_p = "PM";
			}
			if (curr_hour == 0) {
				curr_hour = 12;
			}
			if (curr_hour > 12) {
				curr_hour = curr_hour - 12;
			}
			curr_hour = checkTime(curr_hour);
			curr_minute = checkTime(curr_minute);
			curr_second = checkTime(curr_second);
			document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}
		setInterval(showTime, 500);
	</script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		<?php if ($this->session->flashdata('success')) : ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>")
		<?php endif; ?>
	</script>
</body>

</html>