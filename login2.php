<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
     <form action="cek_login.php" method="post">
	 	<?php
			if(isset($_GET['blokir'])) {
				$blockDuration = $_GET['blokir'];
				echo '<p class="gagal">Anda telah mencapai batas percobaan login. Silakan coba lagi dalam <span id="countdown"></span>.</p>';
			} else if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
				echo '<p class="gagal">Username atau password salah. Silakan coba lagi.</p>';
			}
		?>
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="username" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
	 <script>
		function countdownTimer(duration, display) {
			var timer = duration, minutes, seconds;
			setInterval(function () {
				minutes = parseInt(timer / 60, 10);
				seconds = parseInt(timer % 60, 10);

				minutes = minutes < 10 ? "0" + minutes : minutes;
				seconds = seconds < 10 ? "0" + seconds : seconds;

				display.textContent = minutes + " menit, " + seconds + " detik";

				if (--timer < 0) {
					clearInterval(timer);
					window.location.href = "login2.php";
				}
			}, 1000);
		}

		document.addEventListener("DOMContentLoaded", function () {
			var display = document.querySelector('#countdown');
			var blockDuration = 60; // 1 menit dalam detik
			if (blockDuration > 0) {
				countdownTimer(blockDuration, display);
			}
		});
	</script>
</body>
</html>