<?php
///////////////////////////////////////
/////////// START AKSI LOGIN //////////
///////////////////////////////////////

//jika tombol login di klik, jalankan script ini.
if(isset($_POST["login"])){
	 //cek value data yang di kirimkan dari form login, ada yg kosong atau tidak
  	 if($_POST["username"] == "" | $_POST["password"] == ""){
  	 	echo'<script>
  	 	      alert("Jangan ada yang kosong !");
  	 	      window.location="'.$base_url.'/index.php";
  	 	     </script>';
  	 	return false;
  	 }
     
     //Jika semua value data dari form login sudah benar atau salah satu tidak ada yang kosong
    //maka jalankan script ini.
     $name = htmlspecialchars($_POST['username']); //$name yg di isi dng value username dari form login
     $password = md5($_POST['password']); //$pass yg di isi dng value password dari form login lalu hash dengan md5
     
     //cek data username pengguna login dari table login
     //apakah ada data username pengguna login di dalam table login
     $login = mysqli_query($conn,"SELECT * FROM login WHERE username='$name'");
     //jika 1 atau datanya ada
     if(mysqli_num_rows($login) ===1){
     	//ambil data tersebut ke dalam variabel data
     	$data = mysqli_fetch_assoc($login);
        
        //cek jika password sama dan levelnya == admin
     	if($password == $data["password"] && $data["level"] == "admin"){
     		$_SESSION["username"] = $data["username"]; //buat session username
     		$_SESSION["level"] = $data["level"]; //buat session level
     		header('Location: '.$base_url.'/admin/'); //redirect kehalaman admin.

     	//jika password sama dan levelnya == user
     	}else if($password == $data["password"] && $data["level"] == "user"){
     		$_SESSION["username"] = $data["username"]; //buat session username
     		$_SESSION["level"] = $data["level"]; //buat session level
     		header('Location: '.$base_url.'/user/'); //redirect kehalaman user.

     	//jika password tidak sama, dan level pengguna == admin atau level pengguna == user
     	}else if($password != $data["password"] && $data["level"] == "admin" | $data["level"] == "user"){
     		//tampilkan notif ini, lalu redirect kembali ke halaman index.php atau ke form login.
     		echo'<script>
     		        alert("Nama Atau Password Salah !");
     		        window.location="'.$base_url.'/index.php";
     		     </script>';
     		return false; //hentikan proses sampai sini.
     	}
      //jika data username tidak ada dalam table login
     }else{
     	//maka tampilkan notif ini, lalu redirect langsung ke halaman index.php atau form login
     	echo'<script>
     		        alert("Akun Tidak Ada Dalam Database !");
     		        window.location="'.$base_url.'/index.php";
     		     </script>';
        return false;
     }

  }
///////////////////////////////////////
//////////// END AKSI LOGIN ///////////
///////////////////////////////////////


///////////////////////////////////////
///////// START AKSI REGISTER /////////
///////////////////////////////////////

//cek jika tombol register di klik
//maka jalankan script ini.
if(isset($_POST["register"])){
   //cek value data yg dikirimkan dari form login, jika salah satu ada yg kosong
   if($_POST["email"] =="" | $_POST["username"] == "" | $_POST["password"] == ""){
      //maka tampilkan notif dan lalu redirect kembali ke halaman register.
      echo'<script>
             alert("Jangan ada yang kosong !");
             windows.location="'.$base_url.'/register.php";
            </script>';
      return false;//hentikan proses sampai sini.
   }
   //Jika semua value data dari form register sudah benar atau salah satu tidak ada yang kosong
   //maka jalankan script ini.
   $email = $_POST["email"]; // $email yg di isi dng value email dari form register
   $username = $_POST["username"]; // $username yg di isi dng value username dari form register
   $password = md5($_POST["password"]); // $password yg di isi dng value password dari form register
  
   //cek adakah email si pengguna di table login.
   $cek = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
   //jika hasil 1 artinya email si pengguna register sudah ada di table login
   if(mysqli_num_rows($cek) === 1){
      //maka tampilkan notif ini
      echo'<script>
                alert("Email ini sudah terdaftar, silahkan coba dengan email lain !");
                window.location="'.$base_url.'/register.php";
             </script>';
        return false; //hentikan proses sampai sini.
   }

  //jika email si pengguna register tidak ada dlm table login
   //maka jalankan aksi penyimpanan data baru ke table login.
   $save = mysqli_query($conn,"INSERT INTO login(username,email,password) VALUES('$username', '$email', '$password')");
   //cek proses penyimpanan berhasil atau tidak
   //jika true artinya berhasil
   if ($save === true) {
        //maka tampilkan notif ini
        //lalu redirect ke halaman index.php atau halaman login.
        echo'<script>
                alert("Registrasi Berhasil...");
                window.location="'.$base_url.'/index.php"; 
             </script>';
   }else{
         //jika proses gagal, tampilkan notif ini lalu redirect kembali ke halaman register.
         echo'<script>
                alert("Registrasi Gagal !");
                window.location="'.$base_url.'/register.php";
             </script>';
        return false;
   }
}
///////////////////////////////////////
////////// END AKSI REGISTER //////////
///////////////////////////////////////


///////////////////////////////////////
//////// START TAMBAH PENGGUNA ////////
///////////////////////////////////////
  if(isset($_POST["tambah_pengguna"])){
   if($_POST["email"] =="" | $_POST["username"] == "" | $_POST["password"] == "" | $_POST["level"] == ""){
      echo'<script>
             alert("Jangan ada yang kosong !");
             windows.location="'.$base_url.'/admin/tambah-pengguna.php.php";
            </script>';
      return false;
   }
   $email = $_POST["email"];
   $level = $_POST["level"];
   $username = $_POST["username"];
   $password = md5($_POST["password"]);
   //cek
   $cek = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
   if(mysqli_num_rows($cek) === 1){
      echo'<script>
                alert("Email ini sudah terdaftar, silahkan coba dengan email lain !");
                window.location="'.$base_url.'/admin/tambah-pengguna.php";
             </script>';
        return false;
   }

  //save
   $save = mysqli_query($conn,"INSERT INTO login(username,email,password,level) VALUES('$username', '$email', '$password', '$level')");
   if ($save === true) {
        echo'<script>
                alert("Pengguna Baru Berhasil Ditambahkan...");
                window.location="'.$base_url.'/admin/data-pengguna.php";
             </script>';
   }else{
         echo'<script>
                alert("Pengguna Baru Gagal Ditambahkan !");
                window.location="'.$base_url.'/admin/tambah-pengguna.php";
             </script>';
        return false;
   }
}
///////////////////////////////////////
//////// END TAMBAH PENGGUNA ////////
///////////////////////////////////////


///////////////////////////////////////
/////////// START DATA VIEW  /////////
//////////////////////////////////////
  if(isset($_SESSION["username"])){
	  $username = $_SESSION["username"]; //$username isi dng session username.
	  //cocokan data pengguna berdasarkan $username.
	  $data = mysqli_query($conn,"SELECT * FROM login WHERE username='$username'");
	  //ambil data hasil pencocokan.
	  $pengguna = mysqli_fetch_assoc($data);
      
      //data ini hanya untuk level admin
      if($_SESSION["level"] == "admin"){
	      //hitung semua pengguna
	      $count = mysqli_query($conn,"SELECT * FROM login ORDER BY id DESC");
	      $totalPengguna = mysqli_num_rows($count); //total pengguna
	      //hitung semua admin
	      $count = mysqli_query($conn,"SELECT * FROM login WHERE level='admin'");
	      $totalAdmin = mysqli_num_rows($count); //total admin
	      //hitung semua user
	      $count = mysqli_query($conn,"SELECT * FROM login WHERE level='user'");
	      $totalUser = mysqli_num_rows($count); //total user
	   }
  }
///////////////////////////////////////
///////////   END DATA VIEW  /////////
//////////////////////////////////////