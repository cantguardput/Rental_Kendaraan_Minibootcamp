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

	 	$id = $_POST['id'];
        $tipe_kend = $_POST['tipe_kend'];
		$Merk = $_POST['Merk'];
		$no_polisi = $_POST['no_polisi'];
		$harga_sewa = $_POST['harga_sewa'];

	// 	$ubah = mysqli_query($conn, "UPDATE kendaraan SET tipe_kend='$tipe_kend',Merk='$Merk',no_polisi='$no_polisi',harga_sewa='$harga_sewa',status='$status' WHERE id_kend = '$id'");

	// if ($ubah) {
	// 	echo "<script>alert('Edit data berhasil');window.location.href='tambahkend.php';</script>";
	// }else {
	// 	echo "<script>alert('Edit data gagal');window.location.href='tambahkend.php';</script>";
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

    		$ubah = mysqli_query($koneksi, "UPDATE kendaraan SET tipe_kend='$tipe_kend',Merk='$Merk',no_polisi='$no_polisi',harga_sewa='$harga_sewa', foto='$target_path' WHERE id_kend = '$id'");

	if ($ubah) {
		echo "<script>alert('Edit data berhasil');window.location.href='manage.php';</script>";
	}else {
		echo "<script>alert('Edit data gagal');window.location.href='manage.php';</script>";
	}

        
    }
}
 ?>