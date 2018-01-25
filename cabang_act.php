<?php 
include 'koneksi.php';
$proxy   = $_POST['proxy'];
$lokasi = $_POST['lokasi'];

mysqli_query($koneksi, "insert into cabang values('','$proxy','$lokasi')");
header("location:cabang.php");

 ?>