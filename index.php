<?php
  session_start(); //memulai session
  //cek jika sebelumnya sudah ada session level
  //maka redirect ke halaman berdasarkan level si pengguna.
  if(isset($_SESSION["level"])){
     header('Location: ./'.$_SESSION["level"].'/');
  }

  include("koneksi.php"); //include koneksi database
  include("proses.php"); //include proses untuk merespon dari masing-masing action
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device=width,initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			 <h3 class="title-index">Aplikasi Login Multi User Php Mysqli</h3>
           <div class="content-login">
              <div class="box-login">
              	<h3 align="center">Please Login</h3>
                 <form action="" method="post">
                 	<label>Username</label>
                 	<input type="text" name="username" placeholder="Nama anda" required>
                 	<br>
                 	<label>Password</label>
                 	<input type="password" name="password" placeholder="Kata Sandi" required>
                 	<br>
                 	<button type="submit" name="login" class="btn-action bg-blue">LOGIN</button>
                 </form>

                 <p>
                   Belum punya akun? silahkan <a href="register.php">Register</a>
                 </p>
              </div>
           </div>
		</div>
	</body>
    </html>