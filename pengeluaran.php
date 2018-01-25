<?php 
include 'header.php'; 



    @session_start();

    include "koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['accounting']) {     

?>





<body>
	

<div class="container-fluid">
   <div class="panel panel-success" style="padding-top: 100px">


     <div class="panel-body">
            
     <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pengeluaran</h3>
<a href="tambah_pengeluaran.php" type="button" style="margin-bottom:20px" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>Tambah Data</a>

<!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry</button> -->
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="nama_proxy" class="form-control" onchange="this.form.submit()">
			<option>Pilih Nama ..</option>
			<?php 
			$pil=mysqli_query($koneksi, "select distinct nama_proxy from keluar order by nama_proxy desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['nama_proxy'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['nama_proxy'])){
	$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
	$tg="lap_pengeluaran.php?nama_proxy='$nama_proxy'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="lap_pengeluaran.php";
}
?>

<br/>
<?php 
if(isset($_GET['nama_proxy'])){
	echo "<a class='btn' href='pengeluaran.php'><span class='glyphicon glyphicon-arrow-left'></span>  Kembali</a>";
	echo "<h4> Data Pengeluaran Proxy : <a style='color:blue'> ". $_GET['nama_proxy']."</a></h4>";
}
?>
<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
<table id="example" class="display" cellspacing="0">
	<thead>
		<tr>
		<th>No</th>
		<th>Nama Proxy</th>
		<th>Tanggal</th>
		<th>Detail Pengeluaran</th>
		<th>Jumlah Pengeluaran</th>			
		<th>Opsi</th>
	</tr>
	</thead>
	<tbody>
		<?php 
	if(isset($_GET['nama_proxy'])){
		$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
		$brg=mysqli_query($koneksi, "select * from keluar where nama_proxy like '$nama_proxy' order by nama_proxy desc");
	}else{
		$brg=mysqli_query($koneksi, "select * from keluar order by nama_proxy desc");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_proxy'] ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['detail'] ?></td>
			<td>Rp.<?php echo number_format($b['jumlah']) ?>,-</td>
									
			<td>		
				<a href="edit_pengeluaran.php?id_keluar=<?php echo $b['id_keluar']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pengeluaran.php?id_keluar=<?php echo $b['id_keluar']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		

		<?php 
	}
	?>
	</tbody>

	
	<tr>
		<th colspan="4">Total Pengeluaran</th>
		
		<?php 
		if(isset($_GET['nama_proxy'])){
			$nama_proxy=mysqli_real_escape_string($koneksi, $_GET['nama_proxy']);
			$x=mysqli_query($koneksi, "select sum(jumlah) as total from keluar where nama_proxy='$nama_proxy'");	
			$xx=mysqli_fetch_array($x);			
			echo "<th><b> Rp.". number_format($xx['total']).",-</b></th>";
		}else{

		}

		?>
	</tr>
	
</table>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered table-hover');
</script>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Pengeluaran
				</div>
				<div class="modal-body">				
					<form action="pengeluaran_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama Proxy</label>								
							<select class="form-control" name="nama_proxy">
								<?php 
								$brg=mysqli_query($koneksi, "select * from proxy");
								while($b=mysqli_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama_proxy']; ?>"><?php echo $b['nama_proxy'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Detail Pengeluaran</label>
							<input name="detail" type="text" class="form-control" placeholder="" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tanggal").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>


     </div>

   <div class="panel-footer">&copy; Nopezi</div>
        
   </div>
</div>


</body>









<?php 
}else{
        header("location:index.php");
}
?>
