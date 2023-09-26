-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ardi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `judul`, `gambar`, `nama_lengkap`, `tanggal`) VALUES
(1, 'background', '0ea941e6602117ed88c6b58d3a1fff22.jpg', 'admin', '2023-08-20 04:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bansos`
--

CREATE TABLE `tbl_bansos` (
  `id_bansos` int(11) NOT NULL,
  `nama_bansos` varchar(50) NOT NULL,
  `jenis_bansos` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jumlah_nominal` varchar(50) NOT NULL,
  `nama_warga` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bansos`
--

INSERT INTO `tbl_bansos` (`id_bansos`, `nama_bansos`, `jenis_bansos`, `keterangan`, `file`, `nik`, `jumlah_nominal`, `nama_warga`, `nama_user`, `tanggal`) VALUES
(1, '124', 'BLT', 'tes', 'c7730cd4263f918e86a95be509194bae.pdf', '3671102611970001', '20500000', 'budi', 'admin', '2023-09-26 03:42:23'),
(2, 'blt', 'BLT', '123', '954271b31e6c2a7f99ed24e1494d2e89.pdf', '3671102611970001', '20080000', 'Budi', 'admin', '2023-09-26 03:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `status` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `gambar`, `status`, `tanggal`, `nama_user`) VALUES
(1, 'testing kegiatan', 'nama kegiatan', '546d831e74546f1b489e8f5da7d86650.png', 1, '2023-09-26 03:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `hak_akses`, `waktu`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-08-20 00:00:00'),
(2, 'admin', 'admin', 'edc641d94490a040c6c01e157f0c1f76', 'admin', '2023-08-21 02:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id_warga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_warga` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `verifikasi` varchar(10) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `nik`, `nama_warga`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `no_hp`, `verifikasi`, `nama_user`, `file`, `tanggal`) VALUES
(3, '3671102611970001', 'Budi', 'Laki-Laki', 'Tangerang', '1', '1', '', '1', 'admin', '45f7ae80f992ca7a89ffe0e499944411.pdf', '2023-09-12 05:25:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tbl_bansos`
--
ALTER TABLE `tbl_bansos`
  ADD PRIMARY KEY (`id_bansos`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bansos`
--
ALTER TABLE `tbl_bansos`
  MODIFY `id_bansos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
