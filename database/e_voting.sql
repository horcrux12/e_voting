-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 08:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin E-Voting', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, '', 'super_admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tps`
--

CREATE TABLE `admin_tps` (
  `id_tps` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `no_tps` varchar(11) NOT NULL,
  `jumlah_bilik` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tps`
--

INSERT INTO `admin_tps` (`id_tps`, `nama`, `username`, `password`, `lokasi`, `no_tps`, `jumlah_bilik`, `id_kegiatan`) VALUES
(1, 'TPS Fakultas Teknik dan Sains UIKA', 'tpsftuika', '81dc9bdb52d04dc20036dbd8313ed055', 'Gedung Fakultas Teknik dan Sains Universitas Ibn Khaldun Bogor', '01', 7, 1),
(2, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor', 'tpsfebuika', '81dc9bdb52d04dc20036dbd8313ed055', 'Gedung Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor', '02', 7, 1),
(3, 'TPS Lap Gas Alam', 'tpsrt03guput', '81dc9bdb52d04dc20036dbd8313ed055', 'Lapangan Gas Alam RT 003 /RW 002 Gunung Putri Selatan', '01', 3, 2),
(4, 'TPS Lapangan Bola', 'lapblrt03', '81dc9bdb52d04dc20036dbd8313ed055', 'Lapangan Bola Gunung Putri Selatan RT 003 RW 002', '02', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pemilih_pelajar`
--

CREATE TABLE `data_pemilih_pelajar` (
  `no_identitas` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kab/kot` varchar(100) NOT NULL,
  `desa/kelurahan` varchar(100) NOT NULL,
  `kelas/fakultas` varchar(150) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `no_urut` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `id_bilik` int(11) DEFAULT NULL,
  `id_kandidat` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_tps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pemilih_umum`
--

CREATE TABLE `data_pemilih_umum` (
  `no_identitas` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kab_kot` varchar(50) NOT NULL,
  `desa_kelurahan` varchar(50) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `pekerjaan` varchar(50) NOT NULL,
  `id_bilik` int(11) DEFAULT NULL,
  `id_kandidat` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_tps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemilih_umum`
--

INSERT INTO `data_pemilih_umum` (`no_identitas`, `no_kk`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `provinsi`, `kab_kot`, `desa_kelurahan`, `no_urut`, `status`, `pekerjaan`, `id_bilik`, `id_kandidat`, `id_kegiatan`, `id_tps`) VALUES
('3201022003980005', '3201022003980067', 'Siapa', 'Laki-laki', 'Bogor', '2020-04-01', 'Gunung Sindur', 'Jawa Barat', 'Kab Bogor', 'Gunung Sindur', 1, 1, 'Mahasiswa', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jenis`, `nama`) VALUES
(1, 'Umum'),
(2, 'Pelajar/Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat_umum`
--

CREATE TABLE `kandidat_umum` (
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(150) NOT NULL,
  `foto` text NOT NULL,
  `hasil` int(255) NOT NULL DEFAULT '0',
  `saksi` varchar(150) DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `jumlah_tps` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `alamat`, `start_date`, `end_date`, `jumlah_tps`, `id_jenis`) VALUES
(1, 'Pemilih Badan Eksekutif Mahasiswa (BEM) Universitas Ibn Khaldun Bogor', 'Jl. Sholeh Iskandar, RT.01/RW.10, Kedungbadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16162', '2020-04-12 08:00:00', '2020-04-12 16:00:00', 2, 2),
(2, 'Pemilihan Ketua RT 003 Gunung Putri Selatan', 'Gunung Putri Selatan RT 003/ RW 002 Desa Gunung Putri, Kec. Gunung Putri, Kab. Bogor', '2020-04-15 08:00:00', '2020-04-15 15:30:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` int(11) NOT NULL,
  `ketua` varchar(150) NOT NULL,
  `anggota_staff_1` varchar(150) NOT NULL,
  `anggota_staff_2` varchar(150) NOT NULL,
  `anggota_staff_3` varchar(150) NOT NULL,
  `anggota_staff_4` varchar(150) NOT NULL,
  `anggota_staff_5` varchar(150) NOT NULL,
  `anggota_staff_6` varchar(150) NOT NULL,
  `anggota_staff_7` varchar(150) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_tps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `ketua`, `anggota_staff_1`, `anggota_staff_2`, `anggota_staff_3`, `anggota_staff_4`, `anggota_staff_5`, `anggota_staff_6`, `anggota_staff_7`, `id_kegiatan`, `id_tps`) VALUES
(1, 'Udin', 'Udin Sedunia', 'Rama', 'Sinta', 'Nurbaya', 'Sebaya', 'Komarudin', 'Nanang', 1, 1),
(2, 'Nama Ketua', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 1, 2),
(3, 'Nama Ketua', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 'Nama Anggota', 2, 3),
(4, 'Nanang', 'Nunung', 'Nining', 'Neneng', 'Nonong', 'Naning', 'Noning', 'Nuning', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_bilik`
--

CREATE TABLE `user_bilik` (
  `id_bilik` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `id_pemilih` varchar(20) DEFAULT NULL,
  `no_bilik` varchar(11) NOT NULL,
  `id_tps` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bilik`
--

INSERT INTO `user_bilik` (`id_bilik`, `nama`, `username`, `password`, `id_pemilih`, `no_bilik`, `id_tps`, `id_kegiatan`) VALUES
(1, 'TPS Fakultas Teknik dan Sains UIKA Bilik 1', 'tpsftuika_bilik_1', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '01', 1, 1),
(2, 'TPS Fakultas Teknik dan Sains UIKA Bilik 2', 'tpsftuika_bilik_2', '1234', NULL, '2', 1, 1),
(3, 'TPS Fakultas Teknik dan Sains UIKA Bilik 3', 'tpsftuika_bilik_3', '1234', NULL, '3', 1, 1),
(4, 'TPS Fakultas Teknik dan Sains UIKA Bilik 4', 'tpsftuika_bilik_4', '1234', NULL, '4', 1, 1),
(5, 'TPS Fakultas Teknik dan Sains UIKA Bilik 5', 'tpsftuika_bilik_5', '1234', NULL, '5', 1, 1),
(6, 'TPS Fakultas Teknik dan Sains UIKA Bilik 6', 'tpsftuika_bilik_6', '1234', NULL, '6', 1, 1),
(7, 'TPS Fakultas Teknik dan Sains UIKA Bilik 7', 'tpsftuika_bilik_7', '1234', NULL, '7', 1, 1),
(8, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 1', 'tpsfebuika_bilik_1', '1234', NULL, '1', 2, 1),
(9, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 2', 'tpsfebuika_bilik_2', '1234', NULL, '2', 2, 1),
(10, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 3', 'tpsfebuika_bilik_3', '1234', NULL, '3', 2, 1),
(11, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 4', 'tpsfebuika_bilik_4', '1234', NULL, '4', 2, 1),
(12, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 5', 'tpsfebuika_bilik_5', '1234', NULL, '5', 2, 1),
(13, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 6', 'tpsfebuika_bilik_6', '1234', NULL, '6', 2, 1),
(14, 'TPS Fakultas Ekonomi dan Bisnis Universitas Ibn Khaldun Bogor Bilik 7', 'tpsfebuika_bilik_7', '1234', NULL, '7', 2, 1),
(15, 'TPS Lap Gas Alam Bilik 1', 'tpsrt03guput_bilik_1', '1234', NULL, '1', 3, 2),
(16, 'TPS Lap Gas Alam Bilik 2', 'tpsrt03guput_bilik_2', '1234', NULL, '2', 3, 2),
(17, 'TPS Lap Gas Alam Bilik 3', 'tpsrt03guput_bilik_3', '1234', NULL, '3', 3, 2),
(18, 'Bilik 1', 'lapblrt03_bilik_1', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '01', 4, 2),
(19, 'Bilik 2', 'lapblrt03_bilik_2', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '02', 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_tps`
--
ALTER TABLE `admin_tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `data_pemilih_pelajar`
--
ALTER TABLE `data_pemilih_pelajar`
  ADD PRIMARY KEY (`no_identitas`),
  ADD KEY `id_kandidat` (`id_kandidat`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_bilik` (`id_bilik`),
  ADD KEY `id_tps` (`id_tps`);

--
-- Indexes for table `data_pemilih_umum`
--
ALTER TABLE `data_pemilih_umum`
  ADD PRIMARY KEY (`no_identitas`),
  ADD KEY `id_kandidat` (`id_kandidat`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_bilik` (`id_bilik`),
  ADD KEY `id_tps` (`id_tps`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kandidat_umum`
--
ALTER TABLE `kandidat_umum`
  ADD PRIMARY KEY (`id_kandidat`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_tps` (`id_tps`);

--
-- Indexes for table `user_bilik`
--
ALTER TABLE `user_bilik`
  ADD PRIMARY KEY (`id_bilik`),
  ADD KEY `id_pemilih` (`id_pemilih`,`id_tps`,`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_tps` (`id_tps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_tps`
--
ALTER TABLE `admin_tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kandidat_umum`
--
ALTER TABLE `kandidat_umum`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_bilik`
--
ALTER TABLE `user_bilik`
  MODIFY `id_bilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_tps`
--
ALTER TABLE `admin_tps`
  ADD CONSTRAINT `admin_tps_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pemilih_pelajar`
--
ALTER TABLE `data_pemilih_pelajar`
  ADD CONSTRAINT `data_pemilih_pelajar_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pemilih_pelajar_ibfk_2` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat_umum` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pemilih_pelajar_ibfk_3` FOREIGN KEY (`id_bilik`) REFERENCES `user_bilik` (`id_bilik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pemilih_umum`
--
ALTER TABLE `data_pemilih_umum`
  ADD CONSTRAINT `data_pemilih_umum_ibfk_1` FOREIGN KEY (`id_bilik`) REFERENCES `user_bilik` (`id_bilik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pemilih_umum_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pemilih_umum_ibfk_3` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat_umum` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pemilih_umum_ibfk_4` FOREIGN KEY (`id_tps`) REFERENCES `admin_tps` (`id_tps`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kandidat_umum`
--
ALTER TABLE `kandidat_umum`
  ADD CONSTRAINT `kandidat_umum_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_kegiatan` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panitia`
--
ALTER TABLE `panitia`
  ADD CONSTRAINT `panitia_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panitia_ibfk_2` FOREIGN KEY (`id_tps`) REFERENCES `admin_tps` (`id_tps`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_bilik`
--
ALTER TABLE `user_bilik`
  ADD CONSTRAINT `user_bilik_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_bilik_ibfk_2` FOREIGN KEY (`id_tps`) REFERENCES `admin_tps` (`id_tps`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
