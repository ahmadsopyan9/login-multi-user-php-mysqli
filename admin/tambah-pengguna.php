<?php
  session_start();

  include("../koneksi.php");
  include("../proses.php");
  
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }

  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device=width,initial-scale=1">
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="<?=$base_url;?>/css/style.css">
	</head>
	<body>
		<div class="container">
          <h3 class="title-index">Aplikasi Login Multi User Php Mysqli</h3>
           <div class="content-login">
              <div class="box-login">
              	<h3 align="center">Tambah Pengguna Aplikasi</h3>
                 <form action="" method="post">
                 	<label>Username</label>
                 	<input type="text" name="username" placeholder="Nama anda" required>
                 	<br>
                  <label>Email</label>
                  <input type="email" name="email" placeholder="Alamat email" required>
                  <br>
                  <label>Level</label>
                  <select name="level" required>
                     <option disabled selected>-Pilih-</option>
                     <option value="admin">Admin</option>
                     <option value="user">User</option>
                  </select>
                  <br>
                 	<label>Password</label>
                 	<input type="password" name="password" placeholder="Kata Sandi" required>
                 	<br>
                 	<button type="submit" name="tambah_pengguna" class="btn-action bg-blue">TAMBAH PENGGUNA</button>
                 </form>

                 <p>
                  <a href="index.php">Kembali Ke dashboard</a>
                 </p>
              </div>
           </div>
		</div>
	</body>
    </html>