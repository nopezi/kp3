<?php 

include 'header.php';
@session_start();

    include "../koneksi.php";

    if (@$_SESSION['user']) { 
?>


<?php require_once 'header.php'; ?>


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

<?php }else { ?>

	
<?php } ?>









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