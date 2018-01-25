<?php 
include 'koneksi.php';
$tanggal   = $_POST['tanggal'];
$nama_proxy   = $_POST['nama_proxy'];
$detail = $_POST['detail'];
$jumlah = $_POST['jumlah'];


mysqli_query($koneksi, "insert into keluar values('', '$tanggal', '$nama_proxy', '$detail', '$jumlah')");
header("location:pengeluaran.php");

 ?>