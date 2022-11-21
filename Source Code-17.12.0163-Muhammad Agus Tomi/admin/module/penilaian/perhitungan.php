<?php
session_start();
/* $id_user = $_SESSION['id_user'];
$id_dusun = $_SESSION['id_dusun']; */
include "../../../lib/koneksi.php";
$priode = $_GET['priode'];
$tgl_daftar = $_GET['tgl_daftar'];
// echo $priode . "<br>";

$querypen = mysqli_query($con, "SELECT * FROM tbl_murid");
while ($pen = mysqli_fetch_array($querypen)) {
    $id_pen = $pen['nis_murid'];

    $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
    while ($krt = mysqli_fetch_array($querykriteria)) {
        $id_krt = $krt['id_kriteria'];
        $jenis_kriteria = $krt['jenis_kriteria'];
        $querynilai = mysqli_query($con, "SELECT nilai_kriteria FROM tbl_penilaian where nis_murid='$id_pen' AND id_kriteria='$id_krt' AND tgl_daftar='$tgl_daftar'");
        $nli = mysqli_fetch_array($querynilai);
        $nilai_krt = $nli['nilai_kriteria'];

        if ($jenis_kriteria == 'Benefit') {
            //memanggil nilai terbesar dari nilai aspek
            $querymax = mysqli_query($con, "SELECT max(nilai_kriteria) as nilai_max FROM tbl_penilaian where periode='$priode' AND id_kriteria=$id_krt");
            $nmax = mysqli_fetch_array($querymax);
            $max = $nmax['nilai_max'];
            // echo $max;

            //perhitungan normalisasi
            $nilai_normalisasi = $nilai_krt / $max;
        }

        //percabangan apakah jenis aspek cost
        elseif ($jenis_kriteria == 'Cost') {
            //memanggil nilai terkecil dari nilai aspek
            $querymin = mysqli_query($con, "SELECT min(nilai_kriteria) as nilai_min FROM tbl_penilaian where periode='$priode' AND id_kriteria=$id_krt");
            $nmin = mysqli_fetch_array($querymin);
            $min = $nmin['nilai_min'];
            // echo $min;

            //perhitungan normalisasi
            $nilai_normalisasi = $min / $nilai_krt;
        }
        $nilai_normalisasi_format = number_format($nilai_normalisasi, 4);
        $queryNormalisasi = mysqli_query($con, "UPDATE tbl_penilaian SET nilai_normalisasi = '$nilai_normalisasi_format' where nis_murid='$id_pen' AND id_kriteria='$id_krt' AND periode ='$priode' AND tgl_daftar='$tgl_daftar'");
    }
}


$querypen1 = mysqli_query($con, "SELECT * FROM tbl_murid");
while ($pen1 = mysqli_fetch_array($querypen1)) {
    $id_pen1 = $pen1['nis_murid'];
    $hasil = 0;

    $querykriteria1 = mysqli_query($con, "SELECT *  FROM tbl_kriteria");
    while ($krt1 = mysqli_fetch_array($querykriteria1)) {
        $id_krt1 = $krt1['id_kriteria'];

        //mengambil bobot kriteria
        $querybobot = mysqli_query($con, "SELECT bobot_kriteria FROM tbl_kriteria where id_kriteria=$id_krt1");
        $bobotkrt = mysqli_fetch_array($querybobot);
        $bobot = $bobotkrt['bobot_kriteria'];
        // echo $bobot;
        //
        $queryhasil = mysqli_query($con, "SELECT nilai_normalisasi FROM tbl_penilaian where nis_murid='$id_pen1' AND id_kriteria='$id_krt1' AND periode='$priode' AND tgl_daftar='$tgl_daftar'");
        $hsl = mysqli_fetch_array($queryhasil);
        $nilainormalisasi = $hsl['nilai_normalisasi'];
        // echo $nilainormalisasi;
        $temp = $nilainormalisasi * $bobot;
        $hasil = $hasil + $temp;
    }

    $simpan = mysqli_query($con, "UPDATE tbl_penilaian SET nilai_v = $hasil where nis_murid='$id_pen1' AND periode ='$priode' AND tgl_daftar='$tgl_daftar'");
    // echo $hasil . "<br>";
}
echo "<script>window.location='../../index.php?module=cetak';</script>";
