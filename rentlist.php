<!DOCTYPE html>
<?php 
	session_start();
	include 'koneksi.php';
	$id_user = $_SESSION['id_user'];
	$nama =ucfirst( $_SESSION['nama']);
	if (!isset($_SESSION['level'])) {
		echo "<script>window.location='login2.php'</script>";
	}

 ?>
<html>
<head>
	<title>Rent list</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
		<div id="main">
			<div class="inner">
				<header id="header">
					<a href="#" class="logo"><strong>Rent List</strong></a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
					</ul>
				</header>
				<h3>Rent List</h3>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Order Number</th>
								<th>Merk</th>
								<th>No Polisi</th>
								<th>Tarif</th>
								<th>Status</th>
							</tr>
						</thead>
						<?php
							$no = 1; 
							$book = mysqli_query($koneksi, "SELECT * FROM booking ORDER BY id_booking DESC");
							while ($data = mysqli_fetch_assoc($book)) { ?>
						<tbody>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['id_booking'] ?></td>
								<td>
									<?php 
									$id_kend = $data['id_kend'];
									$kend = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kend = '$id_kend'");
									$data2 = mysqli_fetch_assoc($kend);
									echo $data2['Merk'];
								 ?>
								</td>
								<td><?= $data2['no_polisi'] ?></td>
								<td>Rp.<?= $data2['harga_sewa'] ?>/day</td>
								<?php if ($data['total_sewa']=='') {?>
									<td><a href="bayar.php?id=<?= $data['id_booking'] ?>">bayar</a></td>
								<?php }else{ ?>
									<td>Selesai</td>
								<?php } ?>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
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