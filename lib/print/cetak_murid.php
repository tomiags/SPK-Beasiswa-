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
$pdf->Cell(71, 5, 'DATA CALON PENERIMA BEASISWA SMK NURUL HUDA LOSARI', 0, 1, 'C');
$pdf->Cell(71);
$pdf->Cell(71, 8, 'TAHUN AJARAN 2020/2021', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(71, 5, 'SMK Nurul Huda Losari', 0, 1, 'C');
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
// $pdf->Image('../../upload/akasha/eskasapar.png', 155, 38, 37);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(9, 6, '', 2, 0, 'C');
$pdf->Cell(15, 6, 'NIS', 1, 0, 'C');
$pdf->Cell(50, 6, 'NAMA MURID', 1, 0, 'C');
$pdf->Cell(15, 6, 'JENKEL', 1, 0, 'C');
$pdf->Cell(15, 6, 'KELAS', 1, 0, 'C');
$pdf->Cell(40, 6, 'NAMA WALI', 1, 0, 'C');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'PEKERJAAN WALI', 1, 0, 'C');
// $pdf->Cell(190, 0.6, '', '0', '1', 'L', false);

$pdf->SetFont('Arial', '', 10);


include '../../lib/koneksi.php';
$no = 1;
$siswa = mysqli_query($con, "select * from tbl_murid");
while ($row = mysqli_fetch_array($siswa)) {
    $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(9, 6, '', 2, 0, 'C');
    $pdf->Cell(15, 6, $row['nis_murid'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['nama_murid'], 1, 0);
    $pdf->Cell(15, 6, $row['jenkel_murid'], 1, 0, 'C');
    $pdf->Cell(15, 6, $row['kelas_murid'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['nama_wali'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['pekerjaan_wali'], 1, 0, 'C');
}

$pdf->Output();
