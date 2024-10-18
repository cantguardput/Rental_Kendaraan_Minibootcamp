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
<?php

    $id_user = $_SESSION["id_user"];
    $id_kend = $koneksi->real_escape_string($_POST['id_kend']);
    $nama_cus = $_POST['nama_cus'];
    $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
    $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
    $return_status = "NR"; // not returned


    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }
    
    $err_date = dateDiff("$rent_start_date", "$rent_end_date");

    $sql0 = "SELECT * FROM kendaraan WHERE id_kend = '$id_kend'";
    $result0 = $koneksi->query($sql0);

    if (mysqli_num_rows($result0) > 0) {
        while($row0 = mysqli_fetch_assoc($result0)) {

        }
    }
    if($err_date >= 0) { 
    $sql1 = "INSERT into booking(id_user,id_kend,booking_date,rent_start_date,rent_end_date,return_status,nama_cus) 
    VALUES('" . $id_user . "','" . $id_kend . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $return_status . "','" .$nama_cus. "')";
    $result1 = $koneksi->query($sql1);

    $sql2 = "UPDATE kendaraan SET status = 'tidak_tersedia' WHERE id_kend = '$id_kend'";
    $result2 = $koneksi->query($sql2);

    $sql3 = "SELECT * FROM booking WHERE id_user = '$id_user'";
    $result3 = $koneksi->query($sql3);
    if (mysqli_num_rows($result3) > 0) {
        while($row1 = mysqli_fetch_assoc($result3)) {
            $id = $row1["id_booking"];
        }
    }

    $sql4 = "SELECT * FROM  kendaraan WHERE id_kend = '$id_kend' ";
    $result4 = $koneksi->query($sql4);


    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
            $Merk = $row["Merk"];
            $plate = $row["no_polisi"];
            $fare = $row["harga_sewa"];
        }
    }

    if (!$result1 | !$result2 ){
        die("Couldnt enter data: ".$koneksi->error);
    }
}

?>
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
            <!-- Header -->
                <header id="header">
                    <a href="#" class="logo"><strong>Booking Confirmed.</strong></a>
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
                    <div class="about-section">
                        <h1 class="text-center" style="color: white;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
                        <h3 class="text-center"> <strong style="color: white;">Your Order Number:</strong> <span style="color: red;"><?php echo "$id"; ?></span> </h3>
                        <h4 style="color: white;">Harap catat<strong style="color: white;"> order number</strong> Anda sekarang dan simpan jika Anda perlu berkomunikasi dengan kami tentang pesanan Anda.</h4>
                        <h3 style="color: red;">Invoice</h3>
                        <br>
                        <h4> <strong style="color: white;">Vehicle Name: </strong> <span style="color: white;"> <?php echo $Merk; ?></h4>
                        <br>
                        <h4> <strong style="color: white;">Vehicle Number:</strong> <span style="color: white;"> <?php echo $plate; ?></h4>
                        <br>
                        <h4 style="color: white;"> <strong style="color: white;">Tarif:</strong style="color: white;"> Rp.  <span style="color: white;"> <?php echo $fare; ?>/day</h4>
                        <br>
                        <h4> <strong style="color: white;">Booking Date: </strong> <span style="color: white;"> <?php echo date("Y-m-d"); ?> </h4>
                        <br>
                        <h6 style="color: white;">Peringatan! <strong style="color: white;">Jangan reload halaman ini</strong> atau tampilan diatas akan hilang. Jika Anda ingin Hardcopy halaman ini, silahkan Screenshot sekarang.</h6>
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