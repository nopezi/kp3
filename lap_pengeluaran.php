<?php

include 'koneksi.php';
require('pdf/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('gambar/images.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Kahyangan Multimedia',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. KIOS MALASNGODING',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.kahyangan.com email : kahyangandata@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Pengeluaran Proxy',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan pengeluaran : ".$_GET['nama_proxy'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Proxy', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Detail Pengeluaran', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jumlah Pengeluaran', 1, 1, 'C');

$no=1;
$nama_proxy=$_GET['nama_proxy'];
$query=mysqli_query($koneksi, "select * from keluar where nama_proxy=" . $nama_proxy);
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nama_proxy'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['detail'], 1, 0,'C');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($lihat['jumlah'])." ,-", 1, 1,'C');
	
	$no++;
}
$q=mysqli_query($koneksi, "select sum(jumlah) as total from keluar where nama_proxy=".$nama_proxy);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=mysqli_fetch_array($q)){
	$pdf->Cell(13, 0.8, "Total Pengeluaran", 1, 0,'C');		
	$pdf->Cell(4, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}
// $qu=mysqli_query($koneksi, "select sum(jumlah) as jumlah from keluar where nama_proxy=".$nama_proxy);
// // select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
// while($tl=mysqli_fetch_array($qu)){
// 	$pdf->Cell(4, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
// }
$pdf->Output("../pdf/Pengeluaran_Proxy.pdf","I");

?>

