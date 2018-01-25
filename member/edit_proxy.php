<?php 

include 'header.php';
@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>

<?php require_once 'header.php'; ?>



<?php 
}else{
        header("location:index.php");
}
?>