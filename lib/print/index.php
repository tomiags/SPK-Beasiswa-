<?php
// memanggil library FPDF
require('fpdf.php');
$nama_prak = $_GET['nama_prak'];
$alamat_prak = $_GET['alamat_prak'];
$tgl_skrg = date("d F Y");
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('pemda.png', 20, 8, 19);
// setting jenis font yang akan digunakan
$pdf->SetFont('times', '', 14);
// mencetak string 
$pdf->Cell(71);
$pdf->Cell(71, 5, 'PEMERINTAH DAERAH DAERAH ISTIMEWA YOGYAKARTA', 0, 1, 'C');
$pdf->Cell(71);
$pdf->Cell(71, 8, 'DINAS PENDIDIKAN, PEMUDA, DAN OLAH RAGA', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(71, 5, 'SMK NEGERI 1 NGLIPAR', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetFont('times', 'I', 9);
$pdf->Cell(71, 5, 'Alamat : Jln. Nglipar-Ngawen Km. 06 Pilangrejo, Nglipar, Gunungkidul, Kode Pos 55852, Telepon 08112655711', 0, 1, 'C');
$pdf->Cell(71);
$pdf->SetLineWidth(1);
$pdf->Line(20, 36, 190, 36);
$pdf->SetLineWidth(0);
$pdf->Line(20, 35, 190, 35);
$pdf->Ln(6);

$pdf->SetFont('Times', '', 12);
$pdf->Text(100, 80, 'Kepada 	: ');
$pdf->Text(100, 87, 'Yth. Bapak/Ibu/Saudara Pimpinan/Pemilik');
$pdf->Text(100, 94, 'Perusahaan/Bengkel/Industri');
$pdf->Text(100, 101, '.....................................................................');
$pdf->Text(100, 108, '.....................................................................');
$pdf->Text(100, 107, 'Di');


$pdf->SetFont('Times', 'I', 12);
$pdf->Text(37, 120, 'Dengan Hormat,');
$pdf->SetFont('Times', '', 12);
$pdf->Text(37, 130, 'Dengan ini disampaikan kepada Bapak/Ibu/Saudara Pimpinan/ Pemilik Bengkel/Industri/');
$pdf->Text(37, 137, 'Perusahaan, bahwa dalam rangka memenuhi tuntutan  kurikulum tahun 2013 SMK, siswa');
$pdf->Text(37, 144, 'diwajibkan melaksanaakan Praktek Kerja Lapangan  yang  bertujuan untuk meningkatkan');
$pdf->Text(37, 151, 'pengetahuan  dan  ketrampilan  serta  memberikan  pengalaman  pada  situasi  kerja  yang');
$pdf->Text(37, 158, 'sebenarnya di  Dunia  Usaha/Dunia Industri. Maka  dengan  ini  kami  mohon  Bapak/Ibu/');
$pdf->Text(37, 165, 'Saudara berkenan memberikan kesempatan pada siswa kami untuk melaksanakan Praktek');
$pdf->Text(37, 172, 'Kerja Lapangan di  Perusahaan/ Industri/ Bengkel  yang  Bapak/Ibu/Saudara Pimpin yang');
$pdf->Text(37, 179, 'akan dilaksanakan selama 6 (enam) bulan terhitung mulai :');
$pdf->SetFont('Times', 'B', 12);
$pdf->Text(37, 186, 'Oktober 2020 sampai dengan Maret 2020.');
$pdf->SetFont('Times', '', 12);
$pdf->Text(37, 193, 'Apabila Bapak/Ibu pimpinan  berkenan  pada  permohonan  kami  mohon  untuk  mengisi ');
$pdf->Text(37, 200, 'form yang kami sampaikan dan kami mengharapkan balasan secepatnya.');
$pdf->Text(37, 207, 'Demikian permohonan kami, atas kerjasamanya diucapkan terima kasih');

$pdf->Text(125, 230, 'Kepala Sekolah,');
$pdf->Text(125, 250, 'Drs. Susanta, M. Eng.');
$pdf->Text(125, 257, 'NIP. 19650929 198903 1 006');

$pdf->Text(20, 45, 'Nomor 	: 423.4/111');
$pdf->Text(20, 52, 'Lamp.	 	: 3 Lembar');
$pdf->Text(20, 59, 'Hal		      : Permohonan Kesempatan Pelaksanaan');
$pdf->Text(37, 66, 'Praktek Kerja Lapangan (PKL)');
$pdf->Text(140, 45, 'Nglipar,');
$pdf->Text(155, 45, $tgl_skrg);
$pdf->Text(100, 100, $nama_prak);
$pdf->Text(105, 107, $alamat_prak);




// $pdf->Cell(120, 5, 'Dengan ini disampaikan kepada Bapak/Ibu/Saudara Pimpinan/ Pemilik Bengkel/Industri/ ', 0, 1, 'J');
// $pdf->write(7, 'Dengan ini disampaikan kepada Bapak/Ibu/Saudara Pimpinan/ Pemilik Bengkel/Industri/ Perusahaan, bahwa dalam rangka memenuhi tuntutan kurikulum tahun 2013 SMK, siswa diwajibkan melaksanaakan Praktek Kerja Lapangan yang bertujuan untuk meningkatkan pengetahuan dan ketrampilan serta memberikan pengalaman pada situasi kerja yang sebenarnya di Dunia Usaha/Dunia Industri. Maka dengan ini kami mohon Bapak/Ibu/Saudara berkenan memberikan kesempatan pada siswa kami untuk melaksanakan Praktek Kerja Lapangan di Perusahaan/ Industri/ Bengkel yang Bapak/Ibu/Saudara Pimpin yang akan dilaksanakan selama 6 (enam) bulan terhitung mulai :');
// Memberikan space kebawah agar tidak terlalu rapat
// $pdf->Cell(10, 7, '', 0, 1);

// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(20, 6, 'NIM', 1, 0);
// $pdf->Cell(85, 6, 'NAMA SISWA', 1, 0);
// $pdf->Cell(27, 6, 'NO HP', 1, 0);
// $pdf->Cell(25, 6, 'TANGGAL LHR', 1, 1);

// $pdf->Cell(190, 0.6, '', '0', '1', 'L', false);

// $pdf->SetFont('Arial', '', 10);

// include '../../lib/koneksi.php';
// $mahasiswa = mysqli_query($con, "select * from tbl_siswa");
// while ($row = mysqli_fetch_array($mahasiswa)) {
//     $pdf->Cell(20, 6, $row['id_siswa'], 1, 0);
//     $pdf->Cell(85, 6, $row['nama_siswa'], 1, 0);
//     $pdf->Cell(27, 6, $row['telepon_siswa'], 1, 0);
//     $pdf->Cell(25, 6, $row['ttl'], 1, 1);
// }

$pdf->Output();
