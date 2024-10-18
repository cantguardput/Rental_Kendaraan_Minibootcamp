<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Mengatur batasan waktu dan jumlah percobaan login
$limitTime = 1; // Menit
$limitAttempts = 3;

// Mengecek apakah pengguna telah mencapai batasan percobaan login
if(isset($_SESSION['login_attempts'])) {
    $loginAttempts = $_SESSION['login_attempts'];
    $lastAttemptTime = $_SESSION['last_attempt_time'];
    
    // Menghitung selisih waktu dalam menit
    $timeDiff = (time() - $lastAttemptTime) / 60;
    
    if($timeDiff < $limitTime && $loginAttempts >= $limitAttempts) {
        // Blokir akses login selama batasan waktu tertentu
        $blockDuration = $limitTime - ceil($timeDiff);
        header("location:login2.php?pesan=gagal&blokir=$blockDuration");
		exit;
    } elseif ($timeDiff >= $limitTime) {
        // Reset percobaan login jika telah melewati batasan waktu
        unset($_SESSION['login_attempts']);
        unset($_SESSION['last_attempt_time']);
    }
}

// menyeleksi data user dengan username dan password yang sesuai
$stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Mengambil data pengguna dari hasil query
$data = mysqli_fetch_assoc($result);

if (empty($_POST['username']) || empty($_POST['password'])) {
    header("location: login2.php?pesan=gagal");
    exit();
}

// cek apakah username dan password di temukan pada database
if ($data && password_verify($password, $data['password'])) {
 
	// Mengatur session login dan data pengguna
    $_SESSION['username'] = $username;
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level'];

	// cek jika user login sebagai admin
	if($data['level']=="admin"){
		header("location:admin.php");
	// cek jika user login sebagai pegawai
	}else if($data['level']=="pelanggan"){
		// alihkan ke halaman dashboard pegawai
		header("location:admin.php");
	}
}else{
	// Mengupdate jumlah percobaan login yang gagal dan waktu terakhir
    if(isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] += 1;
    } else {
        $_SESSION['login_attempts'] = 1;
    }
    $_SESSION['last_attempt_time'] = time();

    // alihkan ke halaman login kembali jika username tidak ditemukan
    header("location:login2.php?pesan=gagal");
}
?>