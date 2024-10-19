<?php
session_start();
include 'koneksi.php';
class ContactUs2
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function render()
    {
        echo '<!DOCTYPE html>';
		$id_user = $_SESSION['id_user'];
		$nama =ucfirst( $_SESSION['nama']);
		if (!isset($_SESSION['level'])) {
			echo "<script>window.location='login2.php'</script>";
		}
		echo'
<head>
	<title>Contact Us</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />

	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
</head>
<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">

				<!-- Header -->
				<header id="header">
					<a class="logo"><strong>Rental Kendaraan</strong></a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					</ul>
				</header>

				<!-- Content -->
				<section>
					<header class="main">
						<h1><strong style="color:rgb(118, 60, 60);">Contact Us</strong></h1>
					</header>

					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3187665122164!2d104.45431231482577!3d0.9066856630913814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9728e5c34d421%3A0xece601db1d6a7f10!2sDinas%20Perpustakaan%20dan%20Kearsipan%20Daerah%20Prov.%20Kepri!5e0!3m2!1sid!2sid!4v1644830606963!5m2!1sid!2sid"
						width="100%" height="450" style="border:2px solid #333;" allowfullscreen=""
						loading="lazy"></iframe>

					<div class="container">

						<div class="row py-4" id="contact_us">

							<div class="col-lg-6 m-auto">
								<form action="process.php" method="post" target="_blank" reset>
									<h4 class="">Form <strong style="color :indianred">Pesan</strong></h4>
									<div class="container p-3 mb-2 bg-light text-white">
										<label class="mt-3" for="nama">Nama Anda :</label>
										<input class="text-form" type="text" id="name" name="name"
											placeholder="Ketikkan Nama Anda" require>
										<label class="mt-2" for="email">Email Anda :</label>
										<input type="email" id="email" name="email" placeholder="Ketikkan Email Anda"
											require>
										<label class="mt-2" for="pesan">Message / Pesan :</label>
										<textarea id="message" name="message" rows="2"
											placeholder="Ketikkan Permintaan / Pesan Anda..."></textarea>
										<input type="hidden" name="nowa" value="6285281900600">

										<button class="button primary btn-sm btn-block mt-3" type="submit"
											name="submit">Kirim Pesan</button>
										<input href="" type="submit" value="Refresh"
											class="button btn-sm btn-block mt-3"
											onClick="document.location.reload(true)" />
									</div>
								</form>
							</div>

							<div class=" col-lg-6">

								<div>
									<h4 class="mt-2 mb-1">Kontak <strong style="color :indianred">Kami</strong></h4>
									<ul class="list-group list-group-flush mt-3">
										<li class="list-group-item"><i class="fas fa-map-marker-alt top-6"></i><strong
												class="text-dark"> Alamat :</strong>
											Jln. Basuki Rahmat No.1, Bukit
											Bestari, Kota Tanjung Pinang,Kepulauan Riau 29125</li>
										<li class="list-group-item"><i class="fas fa-phone top-6"></i> <strong
												class="text-dark">Telephone:</strong> (+62) 852-8190-0600</li>
										<li class="list-group-item"><i class="fas fa-envelope top-6"></i> <strong
												class="text-dark">Email:</strong> <a
												href="mailto:bpadkepri@asia.com">bpadkepri@asia.com</a></li>
									</ul>
								</div>

								<div>
									<h4 class="pt-4">Jam Operasional</h4>
									<ul class="llist-group list-group-flush mt-3">
										<li class="list-group-item"><i class="far fa-clock top-8"></i> Senin - Kamis -
											08:30 / 16:00
										</li>
										<li class="list-group-item"><i class="far fa-clock top-6"></i> Jumat - 08:30 /
											12:00</li>
										<li class="list-group-item"><i class="far fa-clock top-6"></i> Sabtu - Minggu -
											Tutup</li>
									</ul>
								</div>
							</div>
						</div>
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

			<!-- Menu -->';
			if ($_SESSION['level']=='admin'){

				echo '<nav id="menu">
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
							<li><a href="contactus2.php">Contact Us!</a></li>
						</ul>
					</nav>';
	
		}elseif ($_SESSION['level']=='pelanggan'){
					
				echo '<nav id="menu">
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
					</nav>';
					}
					echo '<!-- Login -->
					<nav id="menu">
						<header class="major">
							<h2>LOGOUT</h2>
						</header>
						<ul>
							<li><a href="logout.php" onclick="return confirm(\'Yakin keluar?\')">Logout</a></li>
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
							<li class="icon solid fa-envelope"><a href="#">rentalkelompok4@gmail.com</a></li>
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
	</html>';
}
}

$contactUs2 = new ContactUs2($koneksi);
$contactUs2->render();

?>
