-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2023 pada 18.59
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sianas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no_admin` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no_admin`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'ara', 'ara', '123456', 1, 'default.png'),
(2, 'admin', 'admin', '12345', 1, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `no_anggota` int(11) NOT NULL,
  `subbag` varchar(100) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nip` varchar(120) NOT NULL,
  `jabatan` varchar(120) NOT NULL,
  `no_hp` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`no_anggota`, `subbag`, `nama`, `nip`, `jabatan`, `no_hp`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Komisi B', 'Andri', '198508172021212015', 'Staff Komisi', '089373429', 'andri', '12345', 2, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `no_mobil` int(10) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `no_hp` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` int(10) NOT NULL,
  `jenis_mobil` varchar(20) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `tgl_pjk` date NOT NULL,
  `no_rangka` varchar(120) NOT NULL,
  `no_mesin` varchar(120) NOT NULL,
  `no_stnk` varchar(120) NOT NULL,
  `warna` varchar(120) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`no_mobil`, `nama`, `no_hp`, `alamat`, `username`, `password`, `role`, `jenis_mobil`, `no_plat`, `tgl_pjk`, `no_rangka`, `no_mesin`, `no_stnk`, `warna`, `status`, `foto`) VALUES
(17, 'Yanto', '097675', 'Jl. Bringin Raya no 128, Ungaran', 'yanto', '12345', 3, 'Toyota HAICE ', 'H 9517 AG', '2022-07-21', '4GHJM34JHNB209284', 'VR001FMG17000001', '08698264', 'abu', 'Digunakan', ''),
(18, 'biyu', '09876', 'Jl. Jendral Soedirman no 34, Salatiga', 'biyu', '12345', 3, 'Toyota HAICE', 'H 9515 AG', '2022-12-21', 'FGHN43JHNM324235', 'MN008JKA37000004', '09384595', 'abu', 'Tidak_digunakan', ''),
(19, 'Andi', '08969097', 'Jl. Ahmad Yani no 67, Solo', 'andisopir', 'andisopir', 3, 'Toyota HAICE', 'H 9518 AG', '2022-07-21', '2HJMJ98VGHN987424', 'KL003KAL89000001', '09374809', 'abu', 'Tidak_digunakan', ''),
(20, '', '', '', '', '', 0, 'Toyota HIACE', 'H 9516 AG', '2022-07-21', '8VBNM82YUIK924563', 'SD001MND3100003', '37408274', 'abu', 'Digunakan', ''),
(21, '', '', '', '', '', 0, 'Toyota HAICE', 'H 9515 AG', '2022-07-21', '6DFGH85HBVJ567369', 'KL009HDK35000002', '37490284', 'hitam', 'Digunakan', ''),
(22, '', '', '', '', '', 0, 'Toyota Innova', 'H 1213 XG', '2022-05-15', '7FGHK43CVBN988424', 'JK001JDN12000001', '45028495', 'hitam', 'Digunakan', ''),
(23, '', '', '', '', '', 0, 'Toyota Innova', 'H 1229 AG', '2022-05-15', '4VBNK89CVBF098763', 'LS003HDK23000003', '85994574', 'hitam', 'Digunakan', ''),
(24, '', '', '', '', '', 0, 'Toyota Innova', 'H 1225 AG', '2022-05-15', '9HJKM09VGHJ865534', 'JF002JSD43000004', '75994583', 'hitam', 'Digunakan', ''),
(25, '', '', '', '', '', 0, 'Toyota Innova', 'H 1220 XG', '2022-05-15', '4MNDA34KDUN126473', 'KB009HSL12000004', '93794798', 'hitam', 'Digunakan', ''),
(26, '', '', '', '', '', 0, 'Toyota Innova', 'H 1218 XG', '2022-05-15', '0JEND11ARAR152201', 'MN004GSK18000005', '57375890', 'hitam', 'Digunakan', ''),
(28, '', '', '', '', '', 0, 'Kijang Inova', 'H 9513 CZ', '2022-12-16', '6YKLS50BRJK759204', 'JE004ARS05000003', '47503857', 'hitam', 'Digunakan', ''),
(29, '', '', '', '', '', 0, 'Kijang Inova', 'H 9512 CZ ', '2022-12-16', '9NJAB53KWER210934', 'MK006BHS45000002', '85904578', 'hitam', 'Digunakan', ''),
(30, 'Supriyanto', '085782012', 'Jl Supriyadi no 89, Semarang', 'sopir', '12345', 3, 'Kijang Inova', 'H 9511 CZ', '2022-12-17', '1HGBH41JXMN109186', 'SL002NCM69000004', '09573986', 'hitam', 'Tidak_digunakan', 'default.png'),
(31, '', '', '', '', '', 0, 'Kijang Inova', 'H 9528 BZ', '2022-12-16', '5JKEY98KLOM129452', 'CV009FNL78000003', '09874847', 'hitam', 'Digunakan', 'default.png'),
(39, 'gendon', '08956533', '', 'gendhon', '12345', 3, 'supra', 'H 089765', '0000-00-00', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `no_motor` int(10) NOT NULL,
  `jenis_motor` varchar(20) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `tgl_pjk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`no_motor`, `jenis_motor`, `no_plat`, `tgl_pjk`) VALUES
(1, 'Supra', 'H 1568 AB', '2022-11-11'),
(2, 'Supra', 'H 8319 JE', '2022-09-16'),
(3, 'Jupiter MX', 'H 0928 KM', '2022-12-12'),
(7, 'Supra', 'H 4571 AG', '2022-12-22'),
(8, 'Jupiter MX', 'H 8910 HI', '2022-11-09'),
(9, 'Honda CB', 'H 5691 KI', '2022-01-07'),
(10, 'Honda CB', 'H 8631 FE', '2022-06-16'),
(11, 'Jupiter MX', 'H 2678 BA', '2022-06-18'),
(12, 'Honda CB', 'H 8679 AQ', '2022-11-30'),
(13, 'Supra', 'H 9876 HY', '2022-04-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `no_perawatan` int(10) NOT NULL,
  `no_mobil` int(120) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `perawatan` varchar(20) NOT NULL,
  `surat` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`no_perawatan`, `no_mobil`, `jenis_kendaraan`, `no_plat`, `perawatan`, `surat`) VALUES
(6, 30, 'Toyota HIACE', 'H 9517 AG', 'Cuci', 'A22.2020.02813 - PROPOSAL KKI 1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `no_pengajuan` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `no_mobil` int(11) NOT NULL,
  `tujuan_1` varchar(20) NOT NULL,
  `tujuan_2` varchar(120) NOT NULL,
  `tujuan_3` varchar(120) NOT NULL,
  `alamat_1` varchar(120) NOT NULL,
  `alamat_2` varchar(120) NOT NULL,
  `alamat_3` varchar(120) NOT NULL,
  `kota_1` varchar(120) NOT NULL,
  `kota_2` varchar(120) NOT NULL,
  `kota_3` varchar(120) NOT NULL,
  `muatan` int(11) NOT NULL,
  `tgl_digunakan` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_upload` datetime DEFAULT NULL,
  `km_awal` varchar(20) NOT NULL,
  `km_akhir` varchar(20) NOT NULL,
  `surat` varchar(120) NOT NULL,
  `bukti` varchar(120) DEFAULT NULL,
  `konfirmasi` varchar(20) NOT NULL,
  `konfirmasi_sopir` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`no_pengajuan`, `no_anggota`, `no_mobil`, `tujuan_1`, `tujuan_2`, `tujuan_3`, `alamat_1`, `alamat_2`, `alamat_3`, `kota_1`, `kota_2`, `kota_3`, `muatan`, `tgl_digunakan`, `tgl_kembali`, `tgl_upload`, `km_awal`, `km_akhir`, `surat`, `bukti`, `konfirmasi`, `konfirmasi_sopir`) VALUES
(26, 1, 30, 'Kec Surakarta Utara', 'Kec. Surakarta Barat', '-', 'Jl. surakarta utara', 'jl. surakarta selatan', '-', 'surakarta', 'surakarta', '-', 5, '2023-02-02', '2023-02-04', '2023-02-19 20:39:00', '100000', '1212121', '230219-A22_2020_02813.pdf', '230219-logo_jateng.png', 'Dikonfirmasi', 'Dikonfirmasi'),
(28, 1, 30, 'dfgj', '-', '-', 'ghj', '-', '-', 'vbn', '-', '-', 6, '2023-03-23', '2023-03-24', '2023-03-29 21:44:55', '100000', '12121212', '230329-A22_2020_02813_-_PROPOSAL_KKI_13.pdf', '230504-SWAFOTO.jpg', 'Dikonfirmasi', 'Dikonfirmasi'),
(29, 1, 30, 'semarang', '-', '-', 'jakarta', '-', '-', 'ungaran', '-', '-', 10, '2023-05-04', '2023-05-05', '2023-05-04 15:06:09', '16800', '1000', '230504-KTP.pdf', '230504-SWAFOTO1.jpg', 'Dikonfirmasi', 'Dikonfirmasi'),
(30, 1, 30, 'dgh', '-', '-', 'dfg', '-', '-', '-', '-', '-', 9, '2023-05-06', '2023-05-08', '2023-05-06 21:42:06', '', '', '230506-KTP_11.pdf', NULL, 'Dikonfirmasi', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `no_service` int(11) NOT NULL,
  `tgl_service` date NOT NULL,
  `no_mobil` int(11) NOT NULL,
  `konfirmasi` varchar(120) NOT NULL,
  `bukti` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`no_service`, `tgl_service`, `no_mobil`, `konfirmasi`, `bukti`) VALUES
(1, '2023-01-07', 30, 'Dikonfirmasi', NULL),
(2, '2023-01-14', 19, 'Dikonfirmasi', NULL),
(5, '2023-01-27', 30, 'Dikonfirmasi', NULL),
(2024, '2023-02-21', 30, 'Menunggu', '230221-4781517.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin`
--

CREATE TABLE `superadmin` (
  `no_superadmin` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `superadmin`
--

INSERT INTO `superadmin` (`no_superadmin`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'superadmin', 'superadmin', '12345', 4, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_mobil`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`no_motor`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`no_perawatan`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`no_pengajuan`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`no_service`);

--
-- Indeks untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`no_superadmin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `no_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `no_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `no_mobil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `motor`
--
ALTER TABLE `motor`
  MODIFY `no_motor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `no_perawatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `no_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `no_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025;

--
-- AUTO_INCREMENT untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `no_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
