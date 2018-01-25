<?php 
    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['accounting']) {  

?>


<!DOCTYPE html>
<html>
<head>
	<title>Kahyangan Finance</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <!--Datepicker CSS-->
<link rel="stylesheet" href="css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="css/AdminLTE.min.css">

</head>

<!-- Menu Navbar -->

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
                 <li><a href="home.php">home</a></li>
                    <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jurnal <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="jurnalpembelian.php">Jurnal Pembelian</a></li>
                          <li><a href="jurnalpenjualan.php">Jurnal Penjualan</a></li>
                          <li><a href="jurnalpenggajian.php">Jurnal Penggajian</a></li>
                          <li><a href="jurnalkas.php">Jurnal Penerimaan Kas</a></li>
                          <li><a href="jurnalpengeluaran.php">Jurnal Pengeluaran Kas</a></li>
                          <li class=""><a href="jurnalUmum.php" class="dropdown-toggle">Jurnal Umum </a></li>
                          <li class=""><a href="bukuBesar.php" class="dropdown-toggle">Buku Besar </a></li>
                        </ul>
                    </li>
                    
                    <li><a href="pengeluaran.php" title="">Pengeluaran</a></li>
                    <li><a href="cabang.php" title="">Cabang</a></li>
                    <li><a href="proxy.php" >Proxy</a></li>
                    <li><a href="finance.php" >Laporan Finance</a></li>
                    <li class=""><a href="logout.php" class="dropdown-toggle">Keluar </a></li>
                </ul>
            </div>
    </div>
</div>

<!-- end Menu Navbar -->



<body>

<div class="container">
<div class="panel panel-success" style="padding-top: 100px">

<div class="panel-body">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pengeluaran</h3>
<a class="btn" href="pengeluaran.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

                  
    <form action="input_pengeluaran.php" method="post">
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td><input type="hidden" name="id_keluar"></td>
            </tr>
            
            <tr>
                <td>Tanggal</td>
                <td><input id="tanggal" type="text" class="form-control" name="tanggal"></td>
            </tr>

            <tr>
                <td>Nama Proxy</td>
                <td>
                    <select class="form-control" name="nama_proxy">
                                <?php 
                                $cbng=mysqli_query($koneksi, "select * from proxy");
                                while($b=mysqli_fetch_array($cbng)){
                                    ?>  
                                    <option value="<?php echo $b['nama_proxy']; ?>"><?php echo $b['nama_proxy'] ?></option>
                                    <?php 
                                }
                                ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Detail Pengeluaran</td>
                <td><input type="text" class="form-control" name="detail"></td>
            </tr>

            <tr>
                <td>Jumlah</td>
                <td><input type="text" class="form-control" name="jumlah"></td>
            </tr>

            
            
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-info" value="Simpan"></td>
            </tr>
        </table>
    </form>





		
</div>

<div class="panel-footer">
	&copy;Nopezi || Kahyangan Multimedia	
</div>	
</div>
</div>


</body>


<script src="jquery/jquery-1.8.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "yyyy/mm/dd",
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });
</script>

</html>

<?php 
}else{
        header("location:index.php");
}
?>