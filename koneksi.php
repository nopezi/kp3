<?php

// definisikan koneksi ke database
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "kp3";

// // Koneksi dan memilih database di server
// $koneksi = new mysqli($server,$username, null, $database) or die("Koneksi gagal");
// //mysql_select_db($database) or die("Database tidak bisa dibuka");

$koneksi = mysqli_connect("localhost","root","");
mysqli_select_db($koneksi, "kp3");

?>
