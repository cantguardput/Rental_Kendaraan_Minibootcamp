<?php 
	include 'koneksi.php';

	function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/cars/bmp': return '.bmp';
        case 'assets/img/cars/gif': return '.gif';
        case 'assets/img/cars/jpeg': return '.jpg';
        case 'assets/img/cars/png': return '.png';
        default: return false;
    }
}

	$tipe_kend = $_POST['tipe_kend'];
	$Merk = $_POST['Merk'];
	$no_polisi = $_POST['no_polisi'];
	$harga_sewa = $_POST['harga_sewa'];
	$status = 'tersedia';

	// $tambah = mysqli_query($koneksi, "INSERT INTO siswa(id_siswa, nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES ('','$nisn','$nis','$nama','$kelas','$alamat','$tlp','$spp')");

	// if ($tambah) {
	// 	echo "<script>alert('Tambah data berhasil');window.location.href='siswa.php';</script>";
	// }else {
	// 	echo "<script>alert('Tambah data gagal');window.location.href='siswa.php';</script>";
	// }

	if (!empty($_FILES["foto"]["name"])) {
    	$file_name=$_FILES["foto"]["name"];
    	$temp_name=$_FILES["foto"]["tmp_name"];
    	$imgtype=$_FILES["foto"]["type"];
    	$ext= GetImageExtension($imgtype);
    	$imagename=$_FILES["foto"]["name"];
    	$target_path = "assets/img/cars/".$imagename;

    	if(move_uploaded_file($temp_name, $target_path)) {
        //$query0="INSERT into cars (car_img) VALUES ('".$target_path."')";
      	//$query0 = "UPDATE cars SET car_img = '$target_path' WHERE ";
        //$success0 = $conn->query($query0);

    		$tambah = mysqli_query($koneksi, "INSERT INTO kendaraan(id_kend, Merk, foto, tipe_kend, harga_sewa, no_polisi, status) VALUES ('','$Merk','$target_path','$tipe_kend','$harga_sewa','$no_polisi','$status')");
        // $query = "INSERT into cars(car_name,car_nameplate,car_img,ac_price,non_ac_price,ac_price_per_day,non_ac_price_per_day,car_availability) VALUES('" . $car_name . "','" . $car_nameplate . "','".$target_path."','" . $ac_price . "','" . $non_ac_price . "','" . $ac_price_per_day . "','" . $non_ac_price_per_day . "','" . $car_availability ."')";
        // $success = $conn->query($query);
    		if ($tambah) {
    			echo "<script>alert('Tambah data berhasil');window.location.href='manage.php';</script>";
    		}else {
                echo "<script>alert('Tambah data gagal');window.location.href='manage.php';</script>";
            }

        
    }else{
        $query = mysqli_query($koneksi, "INSERT INTO kendaraan(id_kend, Merk, foto, tipe_kend, harga_sewa, no_polisi, status) VALUES ('','$Merk','$target_path','$tipe_kend','$harga_sewa','$no_polisi','$status')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:manage.php?pesan=berhasil");
            } else {
                header("location:manage.php?pesan=gagal");
            }
    }

}
 ?>