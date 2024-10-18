<?php
session_start();
include 'koneksi.php';
class Bayar
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function render()
    {
        echo '<!DOCTYPE html>';
	include 'koneksi.php';
	if (!isset($_SESSION['level'])) {
		echo "<script>window.location='login2.php'</script>";
	}
echo '	<html>
<head>
	<title>Edit</title>
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
					<a href="#" class="logo"><strong>Transaksi</strong></a>
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
						<h3>Pembayaran</h3>
					</header>'; 
						$id = $_GET['id'];
						$edit = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_booking = '$id'");
						$data = mysqli_fetch_assoc($edit);
		 			echo '
		 			<input type="hidden" name="id" value="'. $data['id_booking'] .'">
					<!-- form -->
					<form method="post" action="transaksi.php" class="container-form" enctype="multipart/form-data">
						<div class="row gtr-uniform">
							<input type="hidden" name="id" value="'. $data['id_booking'] .'">
							<div class="col-6 col-12-xsmall">
								<label>Merk</label>'; 
									$id_kend = $data['id_kend'];
									$kend = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kend = '$id_kend'");
									$data2 = mysqli_fetch_assoc($kend);
									$today = date("Y-m-d");
								 echo'
								 <input type="hidden" name="id_kend" value="'.$data['id_kend'].'">
								<input type="text" name="Merk" id="Merk" value="'.$data2['Merk'] .'" placeholder="Merek" required readonly>
							</div>
							<div class="col-6">
								
							</div>
							<div class="col-6 col-12-xsmall">
								<label>No Polisi (plat)</label>
								<input type="text" name="no_polisi" id="no_polisi" value="'. $data2['no_polisi'] .'" placeholder="No Polisi(Plat)" readonly>
							</div>
							<div class="col-6">
							</div>
							<div class="col-6">
								<label>Harga Sewa /day</label>
								<input type="text" name="harga_sewa" id="harga_sewa" value="'. $data2['harga_sewa'] .'" placeholder="Harga Sewa" readonly>
							</div>
							<div class="col-6"></div>
							<div class="col-6">
								<label>Start Date</label>
								<input type="text" name="rent_start_date" value="'. $data['rent_start_date'] .'" class="form-control" readonly>
							</div>
							<div class="col-6"></div>
							<div class="col-6 col-12-xsmall">
					          	<label>Return Date:</label>
					          	<input type="date" name="return_date" id="return_date" min="'. $today.'" required="">
					        </div>
					        <div class="col-6"></div>
					        <div class="col-6">
								<label>Total Harga</label>
								<input type="text" name="total_sewa" id="total_sewa" placeholder="Total" required="">
							</div>
							<div class="col-12 col-12-small">
								<ul class="actions stacked">
									<li>
										<button type="submit" class="button primary">Bayar</button>
									</li>
									<li>
										<a href="rentlist.php" class="button">Kembali</a>
									</li>
								</ul>
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

			<!-- Menu -->';
			if ($_SESSION['level']=='admin') {
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
						<li><a href="aboutus2.php">About Creator</a></li>
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
</html>';
}
}

$bayar = new Bayar($koneksi);
$bayar->render();
?>