<?php
@session_start();
include "../../../lib/koneksi.php";
$nilai = $_POST['nilai'];
$priode = $_POST['priode'];
$status = "sudah selesai";
$terakhir_update = date("Y-m-d H:i:s");

$querypen = mysqli_query($con, "SELECT * FROM tbl_murid");
while ($pen = mysqli_fetch_array($querypen)) {
    $id_pen = $pen['nis_murid'];

    $querykriteria = mysqli_query($con, "SELECT *  FROM tbl_kriteria");
    while ($krt = mysqli_fetch_array($querykriteria)) {
        $id_krt = $krt['id_kriteria'];
        $nilai_kriteria = $nilai[$id_pen][$id_krt];
        mysqli_query($con, "INSERT INTO tbl_penilaian(nis_murid,id_kriteria,periode,nilai_kriteria,tgl_daftar) VALUES ('$id_pen','$id_krt','$priode','$nilai_kriteria','$terakhir_update')");
        if ($nilai_kriteria == 0) {
            $status = "belum selesai";
        }
    }
}
mysqli_query($con, "UPDATE tbl_penilaian set status_penilaian='$status' where periode='$priode'");
if ($status == "belum selesai") {
    echo "<script>window.location='../../index.php?module=listnilai';</script>";
} else {
    echo "<script>window.location='perhitungan.php?tgl_daftar=$terakhir_update&priode=$priode';</script>";
}
