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
        <div class="panel panel-success" style="padding-top: 100px">


        <div class="panel-body">
            <h2><marquee>Selamat Datang di Halaman Proxy </marquee></h2>
        </div>

        <div class="panel-footer">
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
        </div>
        
        </div>
   </div>
<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}else{
        header("location:index.php");
}
?>