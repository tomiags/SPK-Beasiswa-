<?php
// memanggil library FPDF
require('fpdf.php');
// $nama_prak = $_GET['nama_prak'];
// $alamat_prak = $_GET['alamat_prak'];
$tgl_skrg = date("d F Y");
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../../upload/icon/nuha.png', 20, 8, 25);
// setting jenis font yang akan digunakan
$pdf->SetFont('times', '', 14);
// mencetak string 
$pdf->Cell(71);
$pdf->Cell(71, 5, 'REKAP DATA PENILAIAN BEASISWA', 0, 1, 'C');
$pdf->Cell(71);
$pdf->Cell(71, 8, 'TAHUN AJARAN 2020/2021', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(71, 5, 'SMK NURUL HUDA LOSARI', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetFont('times', 'I', 9);
$pdf->Cell(71, 5, 'Alamat : JL. AGUS MIFTAH NO. 72B KALIBUNTU, 52255, (0283)3315394 - 087729543884', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetLineWidth(1);
$pdf->Line(20, 36, 190, 36);
$pdf->SetLineWidth(0);
$pdf->Line(20, 35, 190, 35);
$pdf->Ln(6);

$pdf->SetFont('Times', 'B', 10);
$pdf->Text(48, 42, $tgl_skrg);
$pdf->Text(20, 42, 'Kalibuntu Losari');
// $pdf->Text(170, 42, 'KELAS ');
// $pdf->Text(184, 42, $kels);
// $pdf->Image('../../upload/icon/smp6.png', 155, 38, 37);

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(9, 6, '', 2, 0, 'C');
$pdf->Cell(15, 6, 'NIS', 1, 0, 'C');
$pdf->Cell(23, 6, 'NRRSS', 1, 0, 'C');
$pdf->Cell(23, 6, 'SADK', 1, 0, 'C');
$pdf->Cell(23, 6, 'JKMSS', 1, 0, 'C');
$pdf->Cell(23, 6, 'PW', 1, 0, 'C');
$pdf->Cell(23, 6, 'TW', 1, 0, 'C');
$pdf->Cell(23, 6, 'JRKS', 1, 0, 'C');
$pdf->Cell(23, 6, 'KKE', 1, 0, 'C');


$pdf->SetFont('Times', '', 10);

include "../../lib/koneksi.php";
$no = 1;
$querykar = mysqli_query($con, "SELECT * FROM tbl_murid");
while ($kar = mysqli_fetch_array($querykar)) {
$id = $kar['nis_murid'];
    $pdf->Ln(6);
    $pdf->Cell(9, 6, '', 2, 0, 'C'); 
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(15, 6, $kar['nis_murid'], 1, 0, 'L');
    $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
    while ($krt = mysqli_fetch_array($querykriteria)) {
        $id_krt = $krt['id_kriteria'];
        $queruynilaiparam = mysqli_query($con, "SELECT nilai_kriteria FROM tbl_penilaian where nis_murid = $id and id_kriteria = $id_krt");
        $nilai = mysqli_fetch_array($queruynilaiparam);

        $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt AND nilai_parameter = $nilai[nilai_kriteria]");
        $param = mysqli_fetch_array($queryparam);

    
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(23, 6, $param['nama_parameter'], 1, 0, 'C');


    }
}

$pdf->Output();
