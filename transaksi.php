<?php 
	include 'koneksi.php';

	$id = $_POST['id'];
	$id_kend = $_POST['id_kend'];
	$date = $_POST['return_date'];
	$total = $_POST['total_sewa'];
	$statusr = 'R';
	$status = 'tersedia';


	$ubah = mysqli_query($koneksi, "UPDATE booking SET return_date='$date',total_sewa='$total',return_status='$statusr' WHERE id_booking = '$id'");

	$ubah2 = mysqli_query($koneksi, "UPDATE kendaraan SET status='$status' WHERE id_kend = '$id_kend'");

	if ($ubah | $ubah2) {
		echo "<script>alert('Transaksi Berhasil');window.location.href='rentlist.php';</script>";
	}else {
		echo "<script>alert('Gagal');window.location.href='rentlist.php';</script>";
	}
 ?>