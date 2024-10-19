<!DOCTYPE html>
<html>
<?php 	
	include 'koneksi.php';
 ?>
<head>
	<title>Rental Motor</title>
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
					<a href="#" class="logo"><strong>List Motor</strong></a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
					</ul>
				</header>
				<!-- List kendaraan -->
				<section>
					<header class="major">
						<h2>Dipilih Kendaraannya Bang!!</h2>
					</header>
					<div class="row gtr-uniform">
						<div class="col-3">
							<form method="GET">
							 	<input type="text" name="Merk" placeholder="Searching">
							</form>	
						</div>
					</div>
					<div class="posts">
						<?php 
						if (isset($_GET['Merk'])) {
							$Merk = $_GET['Merk'];
							$query = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE  Merk LIKE '%".$Merk."%'");
						}else{
                			$query = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE status='tersedia' AND tipe_kend = 'motor'");
						}
                			if(mysqli_num_rows($query) > 0) {
                    			while($data = mysqli_fetch_assoc($query)){
                        	?>

						<article>
							<a href="booking.php?id=<?= $data['id_kend'] ?>" class="image"><img src="<?= $data['foto']; ?>" alt="Card image cap" /></a>
							<h3><?= $data['Merk'] ?></h3>
							<p>Harga Sewa: <?= ("Rp. " . $data['harga_sewa'] . "/day"); ?></p>
							<p>NO POLISI: <?= $data['no_polisi']; ?></p>
							<ul class="actions">
								<li><a href="booking.php?id=<?= $data['id_kend'] ?>" class="button">Rent</a></li>
							</ul>
						</article>
				<?php 	}} 
				else {
                ?>
                <div>
					<h4> Kendaraan Kosong :( </h1>
                <?php
            		}
            		?>
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
				<nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
						<li><a href="index.php" class="active">Homepage</a></li>
						<li>
							<span class="opener">Vehicle List</span>
							<ul>
								<li><a href="kendaraan.php">Mobil</a></li>
								<li><a href="kendaraan2.php">Motor</a></li>
							</ul>
						</li>
						<li><a href="contactus.php">Contact Us!</a></li>
					</ul>
                </nav>

                <!-- Login -->
                <nav id="menu">
                    <header class="major">
                        <h2>Sign in/Sign up</h2>
                    </header>
                    <ul>
                        <li><a href="login2.php">Login</a></li>
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
