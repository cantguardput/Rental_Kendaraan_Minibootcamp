<!DOCTYPE html>
<?php 
	session_start();
	include 'koneksi.php';

	if (!isset($_SESSION['level'])) {
		echo "<script>window.location='login2.php'</script>";
	}

 ?>
<html>
<head>
	<title>Tambah Kendaraan</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">
<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
		<div id="main">
			<div class="inner">
			<!-- Header -->
				<header id="header">
					<a href="#" class="logo"><strong>Tambah Vehicle</strong></a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
					</ul>
				</header>
				<!-- Section -->
				<section>
					<header class="major">
						<h3>Tambah Kendaraan</h3>
					</header>
					<!-- form -->
					<form method="post" action="tambahkend1.php" class="container-form" enctype="multipart/form-data">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<label for="">Merk</label>
								<input type="text" name="Merk" id="Merk" placeholder="Merek" required="">
							</div>
							<div class="col-6 col-12-xsmall">
								<label for="">No Polisi(Plat)</label>
								<input type="text" name="no_polisi" id="no_polisi" placeholder="No Polisi(Plat)" required="">
							</div>
							<div class="col-6">
								<label for="">Tipe Kendaraan</label>
								<select name="tipe_kend" id="tipe_kend">
										<option value="">- Tipe Kendaraan -</option>
										<option value="mobil">Mobil</option>
										<option value="motor">Motor</option>
								</select>
							</div>
							<div class="col-6 col-12-xsmall">
								<label for="">Harga Sewa</label>
								<input type="text" name="harga_sewa" id="harga_sewa" placeholder="Harga Sewa(/Day)" required="">
							</div>
							<div class="col-6 col-12-xsmall ">
								<label for="">Kapasitas</label>
								<input type="text" name="kapasitas" id="kapasitas" placeholder="Kapasitas" required>
          					</div>
							<div class="col-6 col-12-xsmall">
								<label for="">Foto</label>
            					<input name="foto" type="file" required="">
          					</div>
          					
							<div class="col-12 col-6-xsmall">
								<button type="submit" class="button primary fit">Tambah</button>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>

		<!-- Sidebar -->
		<div id="sidebar">
			<div class="inner">

			<!-- Search -->
				<!-- <section id="search" class="alt">
					<form method="post" action="#">
						<input type="text" name="query" id="query" placeholder="Search" />
					</form>
				</section> -->

			<!-- Menu -->
				<nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
						<li><a href="admin.php" class="active">Homepage</a></li>
						<li>
							<span class="opener">Vehicle List</span>
							<ul>
								<li><a href="kendaraan0.php">Mobil</a></li>
								<li><a href="kendaraan1.php">Motor</a></li>
							</ul>
						</li>
						<li><a href="rent now.html">Rent Now!</a></li>
						<li><a href="manage.php">Manage Kendaraan</a></li>
						<li><a href="aboutus2.php">About Creator</a></li>
						<li><a href="contactus2.php">Contact Us!</a></li>
					</ul>
                </nav>

                <!-- Login -->
                <nav id="menu">
                    <header class="major">
                        <h2>LOGOUT</h2>
                    </header>
                    <ul>
                        <li><a href="logout.php" onclick="return confirm('Yakin keluar?')">Logout</a></li>
                    </ul>
                </nav>

			<!-- Section -->
				<!-- <section>
					<header class="major">
						<h2>Ante interdum</h2>
					</header>
					<div class="mini-posts">
						<article>
							<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
						</article>
					</div>
					<ul class="actions">
						<li><a href="#" class="button">More</a></li>
					</ul>
				</section> -->

			<!-- Section -->
				<section>
					<header class="major">
						<h2>Hubungi kami Disini</h2>
					</header>
					<ul class="contact">
						<li class="icon solid fa-envelope"><a href="#">rentalkelompok5@gmail.com</a></li>
						<li class="icon solid fa-phone">(+62) 853-5624-8647</li>
						<li class="icon solid fa-home">Jln. Basuki Rahmat No.1, BUkit Bestari, kota Tanjung Pinang, Kepulauan Riau, 29125.<br />
						</li>
					</ul>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<p class="copyright">&copy; RentalKu. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
				</footer>
			</div>
		</div>
	</div>
<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>