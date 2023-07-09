-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 05:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_admin`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'ara', 'ara', '123456', 1, 'default.png'),
(2, 'admin', 'admin', '12345', 1, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
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
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no_anggota`, `subbag`, `nama`, `nip`, `jabatan`, `no_hp`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Komisi B', 'Andrii', '198508172021212015', 'Staff Komis', '089373429', 'andri', '12345', 2, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
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
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_mobil`, `nama`, `no_hp`, `alamat`, `username`, `password`, `role`, `jenis_mobil`, `no_plat`, `tgl_pjk`, `no_rangka`, `no_mesin`, `no_stnk`, `warna`, `status`, `foto`) VALUES
(17, 'Yanto b', '097675', 'Jl. Bringin Raya no 128, Ungaran', 'yanto', '097675', 3, 'Toyota HAICE ', 'H 9517 AG', '2022-07-21', '4GHJM34JHNB209284', 'VR001FMG17000001', '08698264', 'abu', 'Digunakan', ''),
(18, 'biyu', '09876', 'Jl. Jendral Soedirman no 34, Salatiga', 'biyu', '12345', 3, 'Toyota HAICE', 'H 9515 AG', '2022-12-21', 'FGHN43JHNM324235', 'MN008JKA37000004', '09384595', 'abu', 'Tidak_digunakan', ''),
(19, 'Andi', '08969097', 'Jl. Ahmad Yani no 67, Solo', 'andisopir', 'andisopir', 3, 'Toyota HAICE', 'H 9518 AG', '2022-07-21', '2HJMJ98VGHN987424', 'KL003KAL89000001', '09374809', 'abu', 'Tidak_digunakan', ''),
(30, 'Supriyanto', '085782012', 'Jl Supriyadi no 89, Semarang', 'sopir', '12345', 3, 'Kijang Inova', 'H 9511 CZ', '2022-12-17', '1HGBH41JXMN109186', 'SL002NCM69000004', '09573986', 'hitam', 'Tidak_digunakan', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `no_motor` int(10) NOT NULL,
  `jenis_motor` varchar(20) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `tgl_pjk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`no_motor`, `jenis_motor`, `no_plat`, `tgl_pjk`) VALUES
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
-- Table structure for table `perawatan`
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
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`no_perawatan`, `no_mobil`, `jenis_kendaraan`, `no_plat`, `perawatan`, `surat`) VALUES
(6, 30, 'Toyota HIACE', 'H 9517 AG', 'Cuci', 'A22.2020.02813 - PROPOSAL KKI 1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
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
  `konfirmasi_sopir` varchar(120) NOT NULL,
  `lat_1` varchar(150) NOT NULL,
  `lng_1` varchar(150) NOT NULL,
  `lat_2` varchar(150) NOT NULL,
  `lng_2` varchar(150) NOT NULL,
  `lat_3` varchar(150) NOT NULL,
  `lng_3` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`no_pengajuan`, `no_anggota`, `no_mobil`, `tujuan_1`, `tujuan_2`, `tujuan_3`, `alamat_1`, `alamat_2`, `alamat_3`, `kota_1`, `kota_2`, `kota_3`, `muatan`, `tgl_digunakan`, `tgl_kembali`, `tgl_upload`, `km_awal`, `km_akhir`, `surat`, `bukti`, `konfirmasi`, `konfirmasi_sopir`, `lat_1`, `lng_1`, `lat_2`, `lng_2`, `lat_3`, `lng_3`) VALUES
(26, 1, 30, 'Kec Surakarta Utara', 'Kec. Surakarta Barat', '-', 'Jl. surakarta utara', 'jl. surakarta selatan', '-', 'surakarta', 'surakarta', '-', 5, '2023-02-02', '2023-02-04', '2023-02-19 20:39:00', '100000', '1212121', '230219-A22_2020_02813.pdf', '230219-logo_jateng.png', 'Dicancel', 'Dikonfirmasi', '', '', '', '', '', ''),
(28, 1, 30, 'dfgj', '-', '-', 'ghj', '-', '-', 'vbn', '-', '-', 6, '2023-03-23', '2023-03-24', '2023-03-29 21:44:55', '100000', '12121212', '230329-A22_2020_02813_-_PROPOSAL_KKI_13.pdf', '230614-Group_2367.png', 'Dikonfirmasi', 'Dikonfirmasi', '', '', '', '', '', ''),
(29, 1, 30, 'semarang', '-', '-', 'jakarta', '-', '-', 'ungaran', '-', '-', 10, '2023-05-04', '2023-05-05', '2023-05-04 15:06:09', '16800', '1000', '230504-KTP.pdf', '230504-SWAFOTO1.jpg', 'Ditolak', 'Dikonfirmasi', '', '', '', '', '', ''),
(30, 1, 30, 'dgh', '-', '-', 'dfg', '-', '-', '-', '-', '-', 9, '2023-05-06', '2023-05-08', '2023-05-06 21:42:06', '', '', '230506-KTP_11.pdf', NULL, 'Ditolak', 'Ditolak', '', '', '', '', '', ''),
(31, 1, 18, 'jl. adad', 'wdad', 'sdsd', 'sadada', 'dsd', 'sddsd', 'asdadsdd', 'dsdsds', 'dsd', 12, '2023-06-14', '2023-06-30', '2023-06-14 16:37:50', '', '', '230614-report-pdf.pdf', NULL, 'Dicancel', 'Diproses', '', '', '', '', '', ''),
(32, 1, 18, 'adasd', 'asd', 'dad', 'sdad', 'ads', 'ada', 'ada', 'sad', 'ada', 20, '2023-06-13', '2023-06-29', '2023-06-14 18:03:22', '', '', '230614-thunder-file_020d7d94.pdf', NULL, 'Dicancel', 'Diproses', '', '', '', '', '', ''),
(33, 1, 19, 'vgg', 'bb', 'vv', 'vv', 'bb', 'bb', 'bb', 'hh', 'hh', 6, '2023-06-14', '2023-06-17', '2023-06-14 19:32:09', '', '', 'Surat_Cuti.pdf', NULL, 'Dicancel', 'Diproses', '', '', '', '', '', ''),
(34, 1, 30, 'ghh', 'tggy', 'vhhj', 'hbjj', 'bbn', 'gbn', 'ghh', 'ghg', 'ggh', 20, '2023-06-14', '2023-06-14', '2023-06-14 19:42:31', '1120', '11120', 'Laporan_transaksi.pdf', '5.png', 'Dikonfirmasi', 'Dikonfirmasi', '-6.9921283333333335', '110.41679666666666', '-6.992053333333333', '110.41701499999999', '-6.992046666666666', '110.41701666666668'),
(35, 1, 18, 'yy', '', '', 'ggg', '', '', 'hhh', '', '', 20, '2023-06-14', '2023-06-29', '2023-06-14 19:43:10', '', '', 'surat-melahirkanPGW-2023-00020-05-06-20232.pdf', NULL, 'Ditolak', 'Diproses', '', '', '', '', '', ''),
(36, 1, 18, 'sss', 's', 's', 's', 's', 's', 's', 's', 's', 0, '2023-06-17', '2023-06-28', '2023-06-17 00:35:47', '', '', '230616-thunder-file_536f6bf3.pdf', NULL, 'Dikonfirmasi', 'Diproses', '', '', '', '', '', ''),
(37, 1, 18, 's', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 2, '2023-06-17', '2023-06-28', '2023-06-17 00:37:20', '', '', '230616-230219-A22_2020_02813.pdf', NULL, 'Dikonfirmasi', 'Diproses', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `no_service` int(11) NOT NULL,
  `tgl_service` date NOT NULL,
  `no_mobil` int(11) NOT NULL,
  `konfirmasi` varchar(120) NOT NULL,
  `bukti` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`no_service`, `tgl_service`, `no_mobil`, `konfirmasi`, `bukti`) VALUES
(1, '2023-01-07', 30, 'Dikonfirmasi', NULL),
(2, '2023-01-14', 19, 'Dikonfirmasi', NULL),
(5, '2023-01-27', 30, 'Dikonfirmasi', NULL),
(2024, '2023-02-21', 30, 'Menunggu', '230221-4781517.png');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
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
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`no_superadmin`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'superadmin', 'superadmin', '12345', 4, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_mobil`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`no_motor`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`no_perawatan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`no_pengajuan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`no_service`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`no_superadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `no_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `no_mobil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `no_motor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `no_perawatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `no_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `no_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `no_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
