<?php  

//set koneksi database
$host = "localhost"; //host
$user = "root"; //username host
$pass = ""; // password database
$db   = "tutorial"; //nama database

$conn = mysqli_connect($host,$user,$pass,$db); //koneksi database

//set base_url
$base_url = "http://localhost/tutorial/login-multi-user"; 
//ketikan nama folder utama anda sesudah http://localhost/(nama folder utama anda).
