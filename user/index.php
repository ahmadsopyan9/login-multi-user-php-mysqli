<?php
  session_start();
  include("../koneksi.php");
  include("../proses.php");

  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="'.$base_url.'/";
             </script>';
      return false;
  }

  if($_SESSION["level"] != "user"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="'.$base_url.'/'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device=width,initial-scale=1">
    <title>Dashboard User</title>
		<link rel="stylesheet" type="text/css" href="<?=$base_url;?>/css/style.css">
	</head>
	<body>
		<div class="container">
       <h3 class="title-index">Aplikasi Login Multi User Php Mysqli</h3>
           <div class="content-login">
              <div class="box-login">
              	<h3 align="center">Selamat Datang <?=$pengguna["username"];?></h3>
                <p align="center">Anda Login Sebagai <?=$pengguna["level"];?></p>
                <hr>
                <p class="centered"><a href="<?=$base_url;?>/logout.php" class="btn-action bg-red" style="color: #fafafa;">LOGOUT</a></p>
              </div>
           </div>
		</div>
	</body>
    </html>