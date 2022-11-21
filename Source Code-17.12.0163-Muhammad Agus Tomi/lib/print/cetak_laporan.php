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
$pdf->Cell(71, 5, 'REKAP DATA HASIL PENILAIAN BEASISWA', 0, 1, 'C');
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

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(9, 6, '', 2, 0, 'C');
$pdf->Cell(15, 6, 'NIS', 1, 0, 'C');
$pdf->Cell(50, 6, 'NAMA MURID', 1, 0, 'C');
// $pdf->Text(98, 50, $kels);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(10, 6, 'KELAS', 1, 0, 'C');
$pdf->Cell(30, 6, 'NAMA WALI', 1, 0, 'C');
$pdf->Cell(30, 6, 'TANGGAL PENILAIAN', 1, 0, 'C');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(15, 6, 'PERIODE', 1, 0, 'C');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(17, 6, 'HASIL', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);

include '../../lib/koneksi.php';
$priode = $_GET['periode'];
$tgl = $_GET['tgl_daftar'];

$no = 1;
$prak = mysqli_query($con, "SELECT DISTINCT pnl.nilai_v,pnd.nis_murid,pnd.nama_murid,pnd.kelas_murid,pnd.nama_wali,pnl.tgl_daftar  FROM tbl_penilaian pnl LEFT JOIN tbl_murid pnd ON pnl.nis_murid = pnd.nis_murid WHERE pnl.periode = $priode AND pnl.tgl_daftar='$tgl' GROUP BY pnd.nama_murid ORDER BY pnl.nilai_v DESC");
while ($row = mysqli_fetch_array($prak)) {
    $hasil = number_format($row['nilai_v'], 2);
    $pdf->Cell(9, 6, '', 2, 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(15, 6, $row['nis_murid'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['nama_murid'], 1, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(10, 6, $row['kelas_murid'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nama_wali'], 1, 0, 'L');
    $pdf->Cell(30, 6, $row['tgl_daftar'], 1, 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(15, 6, $priode, 1, 0, 'C');
    $pdf->Cell(17, 6, $hasil, 1, 1, 'C');
}

$pdf->Output();
