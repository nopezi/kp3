<?php 
include 'koneksi.php';
$id_proxy=$_POST['id_proxy'];
$nama_proxy=$_POST['nama_proxy'];
$cabang=$_POST['cabang'];
$email_proxy=$_POST['email_proxy'];
$no_wa=$_POST['no_wa'];
$lokasi=$_POST['lokasi'];


mysqli_query($koneksi, "update proxy set 
			nama_proxy='$nama_proxy', 
			cabang='$cabang', 
			email_proxy='$email_proxy', 
			no_wa='$no_wa', 
			lokasi='$lokasi' 
			where id_proxy='$id_proxy'");
header("location:proxy.php");

?>