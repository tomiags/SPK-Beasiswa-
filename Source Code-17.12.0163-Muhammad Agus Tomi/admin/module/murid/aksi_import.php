<!-- import excel ke mysql -->
<?php
// menghubungkan dengan koneksi
include "../../../lib/koneksi.php";
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']);
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;

for ($i = 2; $i <= $jumlah_baris; $i++) {

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nis_murid     = $data->val($i, 1);
	$nama_murid   = $data->val($i, 2);
	$jenkel_murid  = $data->val($i, 3);
	$kelas_murid   = $data->val($i, 4);
	$alamat_murid  = $data->val($i, 5);
	$email_murid  = $data->val($i, 6);
	$no_tlp_murid  = $data->val($i, 7);
	$nama_wali  = $data->val($i, 8);
	$pekerjaan_wali  = $data->val($i, 9);
	// $tgl_update    = $data->val($i, 5);
	$tgl_update = date("Y-m-d");
	$foto_murid = 'foto.png';

	if ($nis_murid != "" && $nama_murid != "" && $jenkel_murid != "" && $kelas_murid != "" && $alamat_murid != "" && $email_murid != "" && $no_tlp_murid != "" && $nama_wali != "" && $pekerjaan_wali != "" && $foto_murid != "" && $tgl_update != "") {
		// input data ke database (table data_pegawai)
		mysqli_query($con, "INSERT into tbl_murid (nis_murid,nama_murid,jenkel_murid,kelas_murid,alamat_murid,email_murid,no_tlp_murid,nama_wali,pekerjaan_wali,foto_murid,tgl_update) values('$nis_murid','$nama_murid','$jenkel_murid','$kelas_murid','$alamat_murid','$email_murid','$no_tlp_murid','$nama_wali','$pekerjaan_wali','$foto_murid','$tgl_update')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
echo "<script>window.location='../../index.php?module=murid';</script>";
?>