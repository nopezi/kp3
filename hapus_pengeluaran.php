<?php 
include 'koneksi.php';
$id_keluar=$_GET['id_keluar'];
mysqli_query($koneksi, "delete from keluar where id_keluar='$id_keluar'");
header("location:pengeluaran.php");

?>