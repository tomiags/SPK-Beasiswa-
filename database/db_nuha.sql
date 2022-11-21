-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 14.23
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nuha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(30) NOT NULL,
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `tingkatan` varchar(8) DEFAULT NULL,
  `foto_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `id_admin`, `nama_admin`, `password`, `no_tlp`, `email_admin`, `tingkatan`, `foto_admin`) VALUES
('kepsek', 1, 'Nunung Nurhayati', 'nunung123', '08128188313', 'nunung.nurhayati@gmail.com', 'Kepsek', '3b848aa640339225e4bc802e3b682b34.jpg'),
('admin', 2, 'Dede Irfansyah', 'ada', '0836427365', 'dede.irfansyah@gmail.com', 'Admin', '34.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(8) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` int(4) NOT NULL,
  `jenis_kriteria` varchar(8) NOT NULL,
  `tgl_ubah` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_kriteria`, `tgl_ubah`) VALUES
(1, 'Rata-rata Rapot Murid Semester Sebelumnya (RRMSS)', 20, 'Benefit', '2021-04-01 05:44:53'),
(2, 'Status Anak Dalam Keluarga (SADK)', 20, 'Cost', '2021-04-23 18:18:14'),
(3, 'Jumlah Kehadiran Murid Semester Sebelumnya (JKMSS)', 10, 'Benefit', '2021-04-23 18:18:23'),
(4, 'Penghasilan Wali (PW)', 15, 'Cost', '2021-04-23 18:18:35'),
(5, 'Tanggungan Wali (TW)', 15, 'Benefit', '2021-04-23 18:18:40'),
(6, 'Jarak Rumah Ke Sekolah (JRKS)', 10, 'Benefit', '2021-04-23 18:18:50'),
(7, 'Keaktifan Kegiatan Ekstrakulikuler (KKE)', 10, 'Benefit', '2021-04-23 18:18:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_murid`
--

CREATE TABLE `tbl_murid` (
  `nis_murid` int(15) NOT NULL,
  `nama_murid` varchar(50) NOT NULL,
  `jenkel_murid` varchar(10) NOT NULL,
  `kelas_murid` varchar(10) NOT NULL,
  `alamat_murid` text DEFAULT NULL,
  `email_murid` varchar(50) DEFAULT NULL,
  `no_tlp_murid` varchar(13) DEFAULT NULL,
  `foto_murid` varchar(100) DEFAULT NULL,
  `tgl_update` varchar(20) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_murid`
--

INSERT INTO `tbl_murid` (`nis_murid`, `nama_murid`, `jenkel_murid`, `kelas_murid`, `alamat_murid`, `email_murid`, `no_tlp_murid`, `foto_murid`, `tgl_update`, `nama_wali`, `pekerjaan_wali`) VALUES
(1221, 'Siti Aisyah', 'P', '2', 'Randusari', 'isyah@gmail.com', '628383838', 'foto.png', '2021-06-19', 'Solikin', 'Sopir'),
(1222, 'Helmi Wijaya', 'L', '2', 'Kalibuntu', 'helmi@gmail.com', '628766566', 'foto.png', '2021-06-19', 'Kodin', 'Petani'),
(1223, 'Faisal Muhaimin', 'L', '2', 'Kalibuntu', 'isal@gmail.com', '628766567', 'foto.png', '2021-06-19', 'Ridwan', 'Montir'),
(1224, 'Mumu Muslikhah', 'P', '2', 'Kedungeneng', 'mumu@gmail.com', '628766568', 'foto.png', '2021-06-19', 'Mahesa', 'Pedagang'),
(1225, 'Aris Hermawan', 'L', '2', 'Prapag Lor', 'aris@gmail.com', '628766569', 'foto.png', '2021-06-19', 'Herman', 'Nelayan'),
(1226, 'Supriyanto', 'L', '2', 'Losari Kidul', 'ato@gmail.com', '628766570', 'foto.png', '2021-06-19', 'Taudi', 'Petani'),
(1227, 'Farhan Andriansyah', 'L', '2', 'Kalibuntu', 'farhan@gmail.com', '628766571', 'foto.png', '2021-06-19', 'Tarmidi', 'Sopir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id_kriteria` int(8) NOT NULL,
  `id_parameter` int(8) NOT NULL,
  `nilai_parameter` int(10) NOT NULL,
  `nama_parameter` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id_kriteria`, `id_parameter`, `nilai_parameter`, `nama_parameter`) VALUES
(1, 1, 1, '0-25 '),
(1, 2, 2, '26-50 '),
(1, 3, 3, '51-75 '),
(1, 4, 4, '76-100 '),
(2, 5, 1, 'Yatim Piatu'),
(2, 6, 2, 'Yatim'),
(2, 7, 3, 'Piatu'),
(2, 8, 4, 'Ortu Lengkap'),
(3, 9, 1, '0-30'),
(3, 10, 2, '30-60'),
(3, 11, 3, '60-90'),
(3, 12, 4, 'Lebih dari 90'),
(4, 13, 1, '< 1 Juta'),
(4, 14, 2, '1 Juta s/d 2 Juta'),
(4, 15, 3, '2 Juta s/d 3 Juta'),
(4, 16, 4, 'Lebih dari 3 juta'),
(5, 17, 1, '1 s/d 2 orang'),
(5, 18, 2, '3 s/d 4 orang'),
(5, 19, 3, '5 s/d 6 orang'),
(5, 20, 4, 'Lebih dari 6 orang'),
(6, 21, 1, '< 3 KM'),
(6, 22, 2, '3 s/d 5 KM'),
(6, 23, 3, '5 s/d 7 KM'),
(6, 24, 4, 'Lebih dari 7 KM'),
(7, 25, 1, 'Kurang Aktif'),
(7, 26, 2, 'Cukup Aktif'),
(7, 27, 3, 'Aktif'),
(7, 28, 4, 'Sangat Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `nis_murid` int(15) NOT NULL,
  `id_kriteria` int(8) NOT NULL,
  `nilai_normalisasi` float(10,4) DEFAULT NULL,
  `nilai_kriteria` int(20) NOT NULL,
  `periode` char(4) DEFAULT NULL,
  `nilai_v` float(10,4) DEFAULT NULL,
  `status_penilaian` varchar(15) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  ADD PRIMARY KEY (`nis_murid`);

--
-- Indeks untuk tabel `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD KEY `id_penduduk` (`nis_murid`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  MODIFY `nis_murid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD CONSTRAINT `tbl_parameter_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD CONSTRAINT `tbl_penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_ibfk_2` FOREIGN KEY (`nis_murid`) REFERENCES `tbl_murid` (`nis_murid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
