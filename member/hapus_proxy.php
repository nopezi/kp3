<?php 
include 'koneksi.php';
$id_proxy=$_GET['id_proxy'];
mysqli_query($koneksi, "delete from proxy where id_proxy='$id_proxy'");
header("location:proxy.php");

?>