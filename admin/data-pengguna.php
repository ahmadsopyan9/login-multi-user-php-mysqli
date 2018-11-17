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
           <div class="content">
              	<h3 align="center">Data Pengguna Aplikasi</h3>
                <div style="width: 100%; overflow: auto;">
                  <table rules="all">
                   <thead>
                     <tr>
                       <th align="center"><b>No.</b></th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th>Level</th>
                       <th>Tgl Daftar</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                       $no = 1;
                       $pg = mysqli_query($conn,"SELECT * FROM login ORDER BY id DESC");
                       $jumlahPengguna = mysqli_num_rows($pg);
                       while ($val = mysqli_fetch_assoc($pg)) {
                    ?>
                     <tr>
                       <td align="center"><b><?=$no;?>.</b></td>
                       <td><?=$val["username"];?></td>
                       <td><?=$val["email"];?></td>
                       <td><?=$val["level"];?></td>
                       <td><?=$val["date"];?></td>
                     </tr>
                   <?php $no++; } ?>
                   </tbody>
                  </table>
                </div>
                 <p>
                   <strong>Jumlah Data Pengguna: <span style="color:red;"><?=$jumlahPengguna;?></span></strong>
                 </p>
                 
                 <p class="centered">
                  <a href="index.php" class="btn-action bg-red">Kembali Ke dashboard</a>
                 </p>
             
           </div>
		</div>
	</body>
    </html>