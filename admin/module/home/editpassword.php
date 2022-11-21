<?php
session_start();
include "../../../lib/koneksi.php";

if (empty($_SESSION['id_admin'])) {
	echo "<script>alert ('Maaf, Hak akses tidak ditemukan, silahkan LOGIN terlebih dahulu.'); window.location='index.php';</script>";
} else {
	$password_admin = $_POST['password_admin'];
	$password_baru_admin = $_POST['password_baru_admin'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
	$id_admin = $_POST['id_admin'];
	$kueriPass = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id_admin = '$id_admin'");
	$kpass = mysqli_fetch_array($kueriPass);
	$pass = $kpass['password'];

	if ($password_admin == $pass) {
		if ($password_baru_admin == $konfirmasi_password) {
			$queryEdit = mysqli_query($con, "UPDATE tbl_admin set password = '$password_baru_admin' WHERE id_admin = '$id_admin'");
			if ($queryEdit) {
				echo "<script>alert ('Password Admin telah diubah.'); window.location='../../index.php?module=home';</script>";
			} else {
				echo "<script>alert ('Password Admin gagal diubah, silahkan ulangi dan pastikan inputan sesuai.'); window.location='../../index.php?module=gantipass';</script>";
			}
		} else {
			echo "<script>alert ('Maaf, konfirmasi inputan password baru tidak sama. Silahkan ulangi dan pastikan sesuai.'); window.location='../../index.php?module=gantipass';</script>";
		}
	} else {
		echo "<script>alert ('Maaf, validasi password lama gagal. Silahkan ulangi dan pastikan sesuai. $password_admin,$password_baru_admin,$konfirmasi_password'); window.location='../../index.php?module=gantipass';</script>";
	}
}
