<!DOCTYPE html>
<?php 
	session_start();
	include 'koneksi.php';
	$id_user = $_SESSION['id_user'];
	if (!isset($_SESSION['level'])) {
		echo "<script>window.location='login2.php'</script>";
	}
 ?>
<html>
	<head>
		<title>Booking</title>
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
								<a href="#" class="logo"><strong>Booking</strong></a>
								<ul class="icons">
									<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
									<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
								</ul>
							</header>

						<!-- Banner -->
						<?php 
							$id = $_GET['id'];
							$query = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kend = '$id'");
							$data = mysqli_fetch_assoc($query);
	 					?>
							<section>
								
								<header class="main">
									<h1><?= $data['Merk'] ?></h1>
								</header>
								<div>
									<span class="image left"><img src="<?= $data['foto'] ?>" alt="" /></span>
								</div>
								<h3>Booking</h3>

								<?php if ($_SESSION['level']=='admin') {?>
								<form method="post" action="cek_booking.php">
									<div class="row gtr-uniform">
										<input type="hidden" name="id_kend" value="<?= $data['id_kend']  ?>">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="" id="" value="<?= $data['Merk'] ?>" placeholder="Name" readonly="" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="" id="" value="<?= $data['no_polisi'] ?>" placeholder="Email" readonly="" />
										</div>
										<div class="col-6 col-12-xsmall">
										<?php $today = date("Y-m-d") ?>
								          	<label>Start Date:</label>
								            <input type="date" name="rent_start_date" min="<?= ($today);?>" required="">
								            &nbsp; 
								        </div>
								        <div class="col-6 col-12-xsmall">
								          	<label>End Date:</label>
								          	<input type="date" name="rent_end_date" min="<?= ($today);?>" required="">
								        </div>
										<!-- Break -->
										<div class="col-12 col-12-xsmall">
											<input type="text" name="" id="" value="<?='Rp. '. $data['harga_sewa'] . ' / hari' ?>" placeholder="Email" readonly="" />
										</div>
										<div class="col-12 col-12-xsmall">
											<input type="text" name="nama_cus" id="" value="" placeholder="Name Customer"/>
										</div>
										<!-- Break -->
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Booking" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							<?php }elseif ($_SESSION['level']=='pelanggan') {?>
								<form method="post" action="cek_booking.php">
									<div class="row gtr-uniform">
										<input type="hidden" name="id_kend" value="<?= $data['id_kend']  ?>">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="" id="" value="<?= $data['Merk'] ?>" placeholder="Name" readonly="" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="" id="" value="<?= $data['no_polisi'] ?>" placeholder="Email" readonly="" />
										</div>
										<div class="col-6 col-12-xsmall">
										<?php $today = date("Y-m-d") ?>
								          	<label>Start Date:</label>
								            <input type="date" name="rent_start_date" min="<?= ($today);?>" required="">
								            &nbsp; 
								        </div>
								        <div class="col-6 col-12-xsmall">
								          	<label>End Date:</label>
								          	<input type="date" name="rent_end_date" min="<?= ($today);?>" required="">
								        </div>
										<!-- Break -->
										<div class="col-12 col-12-xsmall">
											<input type="text" name="" id="" value="<?='Rp. '. $data['harga_sewa'] . ' / hari' ?>" placeholder="Email" readonly="" />
										</div>
										<div class="col-12 col-12-xsmall">
											<input type="hidden" name="nama_cus" id="" value="" placeholder="Name Customer"/>
										</div>
										<!-- Break -->
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Booking" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							<?php } ?>
							</section>

						<!-- Section -->
							<section>
								<header class="major">
									<h2> Kendaraan Lain</h2>
								</header>
								<div class="posts">
									<?php 
										$sql1 = "SELECT * FROM kendaraan WHERE status='tersedia'";
            							$result1 = mysqli_query($koneksi,$sql1);
										if(mysqli_num_rows($result1) > 0) {
                							while($row1 = mysqli_fetch_assoc($result1)){
                   							$tipe = $row1["tipe_kend"];
                    						$merk = $row1["Merk"];
                    						$harga = $row1["harga_sewa"];
                    						$plat = $row1["no_polisi"];
                    						$kend = $row1["id_kend"];
                    						$foto = $row1["foto"];
                    					?>

									<article>
										<a href="booking.php?id=<?php echo($kend) ?>" class="image"><img src="<?php echo $foto; ?>" alt="Card image cap" /></a>
										<h3><?= $merk ?></h3>
										<p>Harga Sewa: <?= ("Rp. " . $harga . "/day"); ?></p>
										<p>NO POLISI: <?= $plat; ?></p>
										<ul class="actions">
											<li><a href="booking.php?id=<?php echo($kend) ?>" class="button">More</a></li>
										</ul>
									</article>
								<?php 	} ?>
							<?php 	} ?>
								</div>
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
			<?php if ($_SESSION['level']=='admin') {?>
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
						<li><a href="rentlist.php">Rent list</a></li>
						<li><a href="manage.php">Manage Vehicle</a></li>
						<li><a href="aboutus2.php">About Creator</a></li>
						<li><a href="contactus2.php">Contact Us!</a></li>
					</ul>
                </nav>
            <?php }elseif ($_SESSION['level']=='pelanggan') {?>
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
						<li><a href="mybooking.php">My Booking</a></li>
						<li><a href="aboutus2.php">About Creator</a></li>
						<li><a href="contactus2.php">Contact Us!</a></li>
					</ul>
                </nav>
            <?php } ?>
                <!-- Login -->
                <nav id="menu">
                    <header class="major">
                        <h2>Logout</h2>
                    </header>
                    <ul>
                        <li><a href="logout.php" onclick="return confirm('Yakin keluar?')">Logout</a></li>
                    </ul>
                </nav>


							<!-- Section -->
								<section>
									<header class="major">
										<h2>Hubungi kami Disini</h2>
									</header>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">rentalkendaraan@gmail.com</a></li>
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