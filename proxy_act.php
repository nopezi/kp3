<?php 
include 'koneksi.php';
$nama_proxy   = $_POST['nama_proxy'];
$cabang = $_POST['cabang'];
$email_proxy = $_POST['email_proxy'];
$no_wa = $_POST['no_wa'];
$lokasi = $_POST['lokasi'];

mysqli_query($koneksi, "insert into proxy values('', '$nama_proxy', '$cabang', '$email_proxy', '$no_wa', '$lokasi')");
header("location:proxy.php");

 ?>