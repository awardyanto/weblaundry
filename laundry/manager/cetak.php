
<?php
include 'include/db.php';
$con = $GLOBALS['db'];
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
$a = mysqli_query($con,"select * from order_detail where Delivery_status = 'Diterima' and Delivery_date between '$awal' and '$akhir' ");
$b = mysqli_query($con,"select sum(Total_Price) as total from order_detail where Delivery_status = 'Diterima' and Delivery_date between '$awal' and '$akhir' ");
$cek = mysqli_num_rows($a);
$c = mysqli_fetch_array($b);
require('include/fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$path = '../icon.png';
$pdf->Image($path,10,10,-140);
$pdf->Cell(190,3,'',0,1);
$pdf->Cell(190,5,'LAUNDRY KITA',0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,4,'Tangerang Selatan, Pamulang Estate, Patung Kuda - Telp : 08314-5744-600 - Email: laundrykita@gmail.com',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,30,200,30);
$pdf->SetLineWidth(0);
$pdf->Line(10,31,200,31);
$pdf->Cell(10,12,'',0,1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,6,'Laporan Transaksi Periode',0,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(190,6,date('d F Y',strtotime($awal)).' s/d '. date('d F Y',strtotime($akhir)),0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,4,'',0,1);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(65,7,'Nama Pelanggan',1,0,'C');
$pdf->Cell(50,7,'Tanggal Transaksi',1,0,'C');
$pdf->Cell(15,7,'Item',1,0,'C');
$pdf->Cell(50,7,'Total Transaksi',1,1,'C');
$pdf->SetFont('Arial','',10);
if ($cek == 0) {
$pdf->Cell(190,7,'Data tidak ditemukan',1,0,'C');
}
else
{
	while ($data = mysqli_fetch_array($a)) {
	$no=1;
	$pdf->Cell(10,7,$no++,1,0,'C');
	$pdf->Cell(65,7,$data['User_Name'],1,0,'C');
	$pdf->Cell(50,7,date('d F Y',strtotime($data['Delivery_date'])),1,0,'C');
	$pdf->Cell(15,7,$data['Total_Item'],1,0,'C');
	$pdf->Cell(50,7,'Rp. '.number_format($data['Total_Price'],2,',','.'),1,1,'C');	
	}
	$pdf->Cell(140,7,'Total Pendapatan',1,0,'C');
	$pdf->Cell(50,7,'Rp. '.number_format($c['total'],2,',','.'),1,0,'C');
}
$pdf->Output();
?>