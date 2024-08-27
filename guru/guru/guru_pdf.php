<?php
// memanggil library FPDF
require('../../assets/fpdf17/fpdf.php');
include '../../config/mysqli.php';
 

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../images/kanzania.jpeg',50,6,40);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(60,10,'KANZANIA ROTI',0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(100);
    $this->Cell(60,5,'Mejing Wetan, Ambarketawang',0,1,'C');
    $this->Cell(100);
    $this->Cell(60,5,'Kec. Gamping, Kabupaten Sleman',0,1,'C');
    $this->Cell(100);
    $this->Cell(60,5,'Daerah Istimewa Yogyakarta 55294',0,1,'C');
    // Line break
    $this->Line(10,45,295,45);
    $this->Ln(20);

}
} 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
 
$pdf->SetFont('Times','B',15);
$pdf->Cell(105);
$pdf->Cell(65,10,'DATA PRODUK',0,0,'C');

$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(50,7,'Kode Produk' ,1,0,'C');
$pdf->Cell(60,7,'Nama Produk' ,1,0,'C');
$pdf->Cell(75,7,'Detail',1,0,'C');
$pdf->Cell(30,7,'Expire',1,0,'C');
$pdf->Cell(30,7,'Kategori',1,0,'C');
$pdf->Cell(30,7,'Rasa',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($mysqli,"SELECT  * FROM produk JOIN kategori ON produk.kategori_id=kategori.kategori_id JOIN rasa ON produk.rasa_id=rasa.rasa_id JOIN nama_produk ON produk.id_nama_produk=nama_produk.id_nama_produk");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(50,6, $d['kd_produk'],1,0);
  $pdf->Cell(60,6, $d['nama_produk'],1,0);  
  $pdf->Cell(75,6, $d['detail'],1,0);
  $pdf->Cell(30,6, $d['expire'],1,0);
  $pdf->Cell(30,6, $d['nama_kategori'],1,0);
  $pdf->Cell(30,6, $d['nama_rasa'],1,1);
}
 
$pdf->Output();
 
?>
