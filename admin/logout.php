<?php
// Melkukan inisialisasi
session_start();

// Melkukan Unset semua variabel pada array session.
$_SESSION = array();

// Menghapus Session.
session_destroy();

echo "<script>alert('Anda telah keluar'); window.location = '../index.php'</script>";
