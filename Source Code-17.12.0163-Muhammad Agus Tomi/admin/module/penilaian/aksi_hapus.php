<?php

include "../../../lib/koneksi.php";

$tgl_penilaian = $_GET['tgl_penilaian'];
$queryHapus = mysqli_query($con, "DELETE FROM tbl_penilaian WHERE tgl_penilaian='$tgl_penilaian'");
if ($queryHapus) {
    echo "<script>alert ('data penilaian berhasil dihapus'); window.location = '../../index.php?module=daftar_penilaian';</script>";
    //jika query gagal maka akan tampil alert dan halaman akan kembali ke tambah kategori
} else {
    echo "<script>alert ('data penilaian gagal dihapus'); window.location = '../../index.php?module=daftar_penilaian;'</script>";
}
