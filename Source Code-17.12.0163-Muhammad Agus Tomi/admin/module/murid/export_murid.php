<?php
require '../../../lib/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Export Data Murid SMK Nurul Huda</title>
</head>

<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel; charset=utf-8");
	header("Content-Disposition: attachment; filename=data_siswaSMKNUHALOSARI.xls");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	?>

	<center>
		<h1>DATA CALON PENERIMA BEASISWA</h1>
		<h5>SMK Nurul Huda Losari @2020</h5>
	</center>
	<table border="1">
		<thead>
			<tr>
				<th>NIS</th>
				<th>Nama Murid</th>
				<th>Jenis Kelamin</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>No. Telpon</th>
				<th>Nama Wali</th>
				<th>Pekerjaan Wali</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$kueriExport = mysqli_query($con, "SELECT * FROM tbl_murid");
			while ($Exp = mysqli_fetch_array($kueriExport)) {
			?>
				<tr>
					<td><?php echo $Exp['nis_murid']; ?></td>
					<td><?php echo $Exp['nama_murid']; ?></td>
					<td><?php echo $Exp['jenkel_murid']; ?></td>
					<td><?php echo $Exp['kelas_murid']; ?></td>
					<td><?php echo $Exp['alamat_murid']; ?></td>
					<td><?php echo $Exp['email_murid']; ?></td>
					<td><?php echo $Exp['no_tlp_murid']; ?></td>
					<td><?php echo $Exp['nama_wali']; ?></td>
					<td><?php echo $Exp['pekerjaan_wali']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>

</html>