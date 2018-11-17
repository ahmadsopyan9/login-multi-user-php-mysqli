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
    <title>Dashboard User</title>
    <link rel="stylesheet" type="text/css" href="<?=$base_url;?>/css/style.css">
  </head>
  <body>
    <div class="container">
       <h3 class="title-index">Aplikasi Login Multi User Php Mysqli</h3>
        <div class="content">
            <h3 align="center">Selamat Datang <?=$pengguna["username"];?></h3>
            <p align="center">Anda Login Sebagai <?=$pengguna["level"];?></p>
            <hr>
                <p class="centered">
                  <a href="data-pengguna.php" class="btn-action bg-hijau">Data Pengguna</a>
                  <a href="tambah-pengguna.php" class="btn-action bg-blue">Tambah Pengguna</a>
                  <a href="../logout.php" class="btn-action bg-red">LOGOUT</a>
                </p>

                <div class="chart">
                  <div class="panel-chart">
                    Grafik Data
                  </div>
                    <div class="box-chart">
                      <ul class="list-chart">
                        <li class="bg-black" style="height: <?=$totalPengguna*10;?>px;"><span class="detail-chart">Total Data: <?=$totalPengguna;?></span></li>
                        <li class="bg-orange" style="height: <?=$totalAdmin*10;?>px;"><span class="detail-chart">Total Data: <?=$totalAdmin;?></span></li>
                        <li class="bg-ungu" style="height: <?=$totalUser*10;?>px;"><span class="detail-chart">Total Data: <?=$totalUser;?></span></li>
                      </ul>
                       
                       
                       
                      <ul>
                        <li class="legend-title">Pengguna</li>
                        <li class="legend-title">Admin</li>
                        <li class="legend-title">User</li>
                      </ul>
                    </div>
                </div>
              
          </div>
    </div>
  </body>
    </html>