<?php
session_start();
include "../../../lib/koneksi.php";
$queryHapusPenilaian = mysqli_query($con, "DELETE FROM tbl_penilaian");
$queryClear = mysqli_query($con, "DELETE FROM tbl_murid");
if ($queryHapusPenilaian) {
	if ($queryClear) {
		echo "<script>alert ('Seluruh Data Murid berhasil dihapus'); window.location = '../../index.php?module=murid';</script>";
	} else {
		echo "<script>alert ('Seluruh Data Murid gagal dihapus'); window.location = '../../index.php?module=murid';</script>";
	}
} else {
	echo "<script>alert ('Penilaian gagal dihapus'); window.location = '../../index.php?module=murid';</script>";
}
