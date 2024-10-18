<?php 
	include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data siswa_foto didalam table siswa
		$get_foto = "SELECT foto FROM kendaraan WHERE id_kend='$id'";
		$data_foto = mysqli_query($koneksi, $get_foto); 
        // Mengubah data yang diambil menjadi Array
		$foto_lama = mysqli_fetch_array($data_foto);

        // Menghapus Foto lama didalam folder FOTO
		unlink("assets/img/cars/".$foto_lama['foto']);    

		// Mengapus data siswa berdasarkan ID
		$query = mysqli_query($koneksi,"DELETE FROM kendaraan WHERE id_kend='$id'");
		if ($query) {
			header("location:manage.php?pesan=hapus");
		}else{
			header("location:manage.php?pesan=gagalhapus");
		}
		
	}else{
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("location:index.php");
	}
}else{
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("location:index.php");
}
 ?>