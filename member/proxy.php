<?php 

include 'header.php';
@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
       </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                 <li><a href="index.php">home</a></li>
                    
                    
                    <li><a href="pengeluaran.php" title="">Pengeluaran</a></li>
                    <li><a href="proxy.php" >Proxy</a></li>
                    <li><a href="finance.php" >Laporan Finance</a></li>

                    <li class=""><a href="../logout.php" class="dropdown-toggle">Keluar </a></li>
                </ul>
            </div>
    </div>
</div>


<div class="container">
	<div class="">
	<div class="panel panel-primary" style="padding-top: 100px">
	<div class="panel-heading">
	 <h3><span class="glyphicon glyphicon-briefcase"></span>Data Proxy</h3>
	</div>	
	
	
	<div class="panel-body">
<?php
$id_proxy = $_SESSION['user'];
$id_brg=mysqli_real_escape_string($koneksi, $id_proxy);
$sql = "select * from proxy where id_proxy='$id_brg'";
$det=mysqli_query($koneksi, $sql)or die(mysql_error());
$d = mysqli_fetch_assoc($det);
if ($d['id_proxy']==$id_proxy) {
	// die(print_r($d));
	echo $d['id_proxy'];
	echo $d['nama_proxy'];
}else {
	echo 'string';
}


?>









	</div>
	
	<div class="panel-footer">
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
    </div>
	</div>
	</div>
</div>


<?php 
}else{
        header("location:index.php");
}
?>