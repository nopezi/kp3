<?php
include('koneksi.php');
session_start();
if(isset($_POST['login'])){
 $user = mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
 $pass = mysqli_real_escape_string($koneksi, htmlentities($_POST['pass']));
 
 $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND pass='$pass'") or die(mysql_error()); //simpan variabel pilih user
 if(mysqli_num_rows($sql) == 0){ //jika tidak ditemukan
  echo '<script language="javascript">alert("User tidak ada!"); document.location="index2.php";</script>';
 }else{ //jika ditemukan
  $row = mysqli_fetch_assoc($sql);
  if($row['level'] == 'admin'){ // admin berdasarkan level, jika level 1 berarti admin
   $_SESSION['admin']=$user;
   echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="home.php";</script>';
  }else{
   if($row['level']=='proxy'){
   
   $_SESSION['user']=$row['id']; //berdasarkan kolom user
   echo '<script language="javascript">alert("Anda berhasil Login Sebagai User!"); document.location="member/index.php";</script>';
  }
  }
 }
}
?>