<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$tipe_kend = $_POST['tipe_kend'];
$Merk = $_POST['Merk'];
$no_polisi = $_POST['no_polisi'];
$harga_sewa = $_POST['harga_sewa'];
$status = 'tersedia';
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "assets/img/cars/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $sql = $pdo->prepare("INSERT INTO kendaraan(id_kend, Merk, foto, tipe_kend, harga_sewa, no_polisi, status) VALUES(:,:Merk,:foto,:tipe_kend,:harga_sewa,:no_polisi,:status)");
  $sql->bindParam(':Merk', $Merk);
  $sql->bindParam(':tipe_kend', $tipe_kend);
  $sql->bindParam(':harga_sewa', $harga_sewa);
  $sql->bindParam(':no_polisi', $no_polisi);
  $sql->bindParam(':foto', $fotobaru);
  $sql->bindParam(':status', $status);
  $sql->execute(); // Eksekusi query insert
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: manage.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='tambahkendaraan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='tambahkendaraan.php'>Kembali Ke Form</a>";
}
?>