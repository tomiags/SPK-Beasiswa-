<?php

session_start();

include "lib/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($con, "SELECT * FROM tbl_admin where username='$username' AND password='$password'");
$ketemu = mysqli_num_rows($login);


if ($ketemu > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['id_admin'] = $r['id_admin'];
	$_SESSION['email_siswa'] = $r['email_siswa'];
	header('location:admin/index.php?module=home');
} else {
	header('location:admin/auth-login.php?pesan=gagal');
}
