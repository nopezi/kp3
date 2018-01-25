<?php 
include 'koneksi.php';
$id=$_POST['id'];
$proxy=$_POST['proxy'];
$lokasi=$_POST['lokasi'];


mysqli_query($koneksi, "update cabang set proxy='$proxy', lokasi='$lokasi' where id='$id'");
header("location:cabang.php");

?>