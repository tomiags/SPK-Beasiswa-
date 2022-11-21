<?php
include "lib/koneksi.php";
if (isset($_POST["masuk"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (!ctype_alnum($username) or !ctype_alnum($password)) {
		echo '<div class="login_wrapper">
    <div class="alert alert-danger" role="alert">';
		echo "Gagal Login!";
		echo "Username atau Password Anda tidak benar atau account Anda sedang diblokir";
		echo '</div></div></div>';
	} else {
		$loginsiswa = mysqli_query($con, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
		$ketemu = mysqli_num_rows($loginsiswa);
		$r = mysqli_fetch_array($loginsiswa, MYSQLI_BOTH);
		if ($ketemu > 0) {
			session_start();
			$_SESSION['username'] = $r['username'];
			$_SESSION['password'] = $r['password'];
			$_SESSION['id_admin'] = $r['id_admin'];
			$_SESSION['email_siswa'] = $r['email_siswa'];
			$_SESSION['tingkatan'] = $r['tingkatan'];
			header('location:admin/index.php?module=home');
		} else {
		   echo "<script>alert ('username atau password salah'); window.location = login.php</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Sistem Penilaian</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href='asset/style.css' rel='stylesheet'>
	<link rel="shortcut icon" href="admin/assets/images/logonuha.png">
</head>

<body>
	<div class="background-img">
		<div class="container-fluid">
			<div class="row">

				<div class="col-12 col-md-6 offset-md-6 col-lg-4 offset-lg-8 col-xl-4 offset-xl-8 pl-0">
					<div class="signin">
						<form class="signin-form" method="post">
							<div class="text-center mb-4 logo">
								<h1>Sistem Penilaian Beasiswa</h1>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<h6 class="text-center">Selamat Datang</h6>
									<label class="text-center d-block">Hanya Panitia Penyeleksi Beasiswa yang bisa Login!</label>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="email">Username</label>
									<input type="text" name="username" id="email" class="form-control" placeholder="Username" required="required">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required="required">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-12">
									<button type="submit" name="masuk" class="btn btn-info text-center btn-block">LOGIN</button>
								</div>
							</div>

                <div class="item form-group">
                <div class="">
                    <a href="homepage.php?module=hasil" target="_BLANK" class="btn btn-buy btn-block btn-round btn-secondary" >KEMBALI</a>
                </div>
				</div>



						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>