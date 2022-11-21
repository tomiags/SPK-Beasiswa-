<?php
@session_start();
include "../../../lib/koneksi.php";
$nilai = $_POST['nilai'];
$tgl_daftar = $_POST['tgl_daftar'];
$priode = $_POST['priode'];
$status = "sudah selesai";

$querypen = mysqli_query($con, "SELECT * FROM tbl_murid");
while ($pen = mysqli_fetch_array($querypen)) {
    $id_pen = $pen['nis_murid'];

    $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
    while ($krt = mysqli_fetch_array($querykriteria)) {
        $id_krt = $krt['id_kriteria'];
        $nilai_kriteria = $nilai[$id_pen][$id_krt];
        mysqli_query($con, "UPDATE tbl_penilaian SET nilai_kriteria='$nilai_kriteria' where id_kriteria='$id_krt' AND nis_murid='$id_pen' AND periode='$priode' AND tgl_daftar='$tgl_daftar'");
        if ($nilai_kriteria == 0) {
            $status = "belum selesai";
        }
    }

}
mysqli_query($con, "UPDATE tbl_penilaian set status_penilaian='$status'");
if ($status == "belum selesai") {
    echo "<script>window.location='../../index.php?module=cetak';</script>";
} else {
    echo "<script>window.location='perhitungan.php?tgl_daftar=$tgl_daftar&priode=$priode';</script>";
}
