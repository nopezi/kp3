<?php 

include 'header.php';
@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { ?>


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
                    <li><a href="proxy.php?id=<?php echo $_SESSION['id'] ?>" >Proxy</a></li>
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


$det=mysqli_query($koneksi, "select * from proxy where id_proxy='$id_brg'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td><b>Nama Proxy</b></td>
			<td><?php echo $d['nama_proxy'] ?></td>
		</tr>
		<tr>
			<td><b>Cabang Proxy</b></td>
			<td><?php echo $d['cabang'] ?></td>
		</tr>
		<tr>
			<td><b>Email Proxy</b></td>
			<td><?php echo $d['email_proxy'] ?></td>
		</tr>
		<tr>
			<td><b>Nomor Whatsapp</b></td>
			<td><?php echo $d['no_wa'] ?></td>
		</tr>
		<tr>
			<td><b>Domisili/Alamat</b></td>
			<td><?php echo $d['lokasi'] ?></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<a href="edit_proxy.php?id_proxy=<?php echo $d['id_proxy']; ?>" class="btn btn-warning">Edit</a>
			</td>
		</tr>
	</table>
	<?php 
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