<?php
session_start();
include 'koneksi.php';

class RentalMobil
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function render()
    {
        echo '<!DOCTYPE html>
        <html>
<head>
	<title>Rental Mobil</title>
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
					<a href="#" class="logo"><strong>Homepage Rental</strong></a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
					</ul>
				</header>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h1>Hai, Perental!  <br />
							<i>Good to see u here!</i></h1>
							<p>Solusi ketika anda membutuhkan kendaraan</p>
						</header>
						<p>Pernah berpikir, bagaimana cara kamu untuk pergi ke suatu tempat tapi terkendala dengan kendaraan? pasti cukup sulit mengatasinya. Bisa saja menggunakan ojek <i>online</i>, tapi tentunya tidak cost effective bukan? Atau bisa saja numpang dengan teman, tapi kalau keseringan pasti teman jadi bete kan? Pilihan kamu sangat benar ketika sedang melihat <i>website</i> ini, dikarenakan kami akan menyediakan kendaraan sesuai dengan kebutuhan kamu!</p>
						<!-- <ul class="actions">
							<li><a href="#" class="button big">Contact Us!</a></li>
						</ul> -->
					</div>
					<span class="image object">
						<img src="images/pic10.PNG" alt="" />
					</span>
				</section>

				<i>What Next? </i>
				<section>
					<header class="major">
						<h2>Kelebihan Rental Kami Apa Saja?</h2>
					</header>
					<div class="features">
						<article>
							<span class="icon fa-gem"></span>
							<div class="content">
								<h3>Kendaraan Yang Terawat</h3>
								<p>Tentu saja kami akan memberikan yang terbaik kepada konsumen. Dengan memberikan kendaraan yang terawat, bersih, serta nyaman akan membuat pelanggan merasa dimanjakan oleh kendaraan yang kami sediakan. </p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-paper-plane"></span>
							<div class="content">
								<h3>Harga yang <i>Affordable</i></h3>
								<p>Jika dibandingkan dengan tempat rental yang lain, kami berani menjanjikan dengan harga yang terbaik kepada <i>customer</i> untuk rental disini. Meski kami memberikan harga yang murah, bukan berarti kualitas kami murahan. </p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-rocket"></span>
							<div class="content">
								<h3><i>Quick Response</i> dari Karyawan yang ramah</h3>
								<p>Kami memiliki belasan karyawan yang siap melayani <i>customer</i> dengan sepenuh hati kami. Serta akan cepat merespon ketika dibutuhkan. </p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-signal"></span>
							<div class="content">
								<h3>Dapat Di Akses Dimanapun</h3>
								<p>Selagi perangkat yang digunakan dapat terhubung dengan internet, kamu dapat mengakses <i>website</i> kami dengan mudah dimanapun, dan kapanpun. </p>
							</div>
						</article>
					</div>
				</section>
				<!-- Section -->
                        <section>
                            <header class="major">
                                <h2><i>Preview</i> Kendaraan dulu yuk!</h2>
                            </header>
                            <div class="posts">';

							$sql1 = "SELECT * FROM kendaraan WHERE status='tersedia'";
							$result1 = mysqli_query($this->koneksi, $sql1);
							if(mysqli_num_rows($result1) > 0) {
								while($row1 = mysqli_fetch_assoc($result1)){
									$tipe = $row1["tipe_kend"];
									$merk = $row1["Merk"];
									$harga = $row1["harga_sewa"];
									$plat = $row1["no_polisi"];
									$kend = $row1["id_kend"];
									$foto = $row1["foto"];

									echo '<article>
									<a href="booking.php?id='. $kend .'" class="image"><img src="'. $foto .'" alt="Card image cap" /></a>
									<h3>'. $merk .'</h3>
									<p>Harga Sewa: '. ("Rp. " . $harga . "/day") .'</p>
									<p>NO POLISI: '. $plat .'</p>
									<ul class="actions">
										<li><a href="booking.php?id='. $kend .'" class="button">More</a></li>
									</ul>
								</article>';
							}
						}

				
						echo '</div>
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
</html>';
    }
}

$rentalMobil = new RentalMobil($koneksi);
$rentalMobil->render();

?>