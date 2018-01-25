<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from cabang where id='$id'");
header("location:cabang.php");

?>