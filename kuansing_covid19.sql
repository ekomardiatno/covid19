-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 05:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `status` enum('','odp_proses','odp_selesai','pdp_perawatan','pdp_sembuh','pdp_meninggal','positif_dirawat','positif_meninggal','positif_sembuh') NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal` date NOT NULL DEFAULT,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Kuantan Mudik'),
(2, 'Kuantan Tengah'),
(3, 'Singingi'),
(4, 'Kuantan Hilir'),
(5, 'Cerenti'),
(6, 'Benai'),
(7, 'Gunung Toar'),
(8, 'Singingi Hilir'),
(9, 'Pangean'),
(10, 'Logas Tanah Darat'),
(11, 'Inuman'),
(12, 'Hulu Kuantan'),
(13, 'Kuantan Hilir Seberang'),
(14, 'Sentajo Raya'),
(15, 'Pucuk Rantau');

-- --------------------------------------------------------

--
-- Table structure for table `pantauan`
--

CREATE TABLE `pantauan` (
  `id_pantauan` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `riwayat` text NOT NULL,
  `status` enum('odp_proses','odp_selesai','pdp_perawatan','pdp_sembuh','pdp_meninggal','positif_dirawat','positif_meninggal','positif_sembuh') NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL DEFAULT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `alamat_rumah_sakit` text NOT NULL,
  `telepon_rumah_sakit` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `name`, `email`, `password`, `role`, `last_login`) VALUES
(1, 'admin', 'Administrator', 'admin@email.com', '', 'admin', '2020-04-14 06:02:35'),
(2, 'kecamatan', 'Lorem', 'lorem@ipsum.com', '$2y$10$aIF9lfD5wlYkjzqga2pwFuai9EzkaAtGgmHdib9K0qlgIrDaoiFgi', 'admin', '2020-04-08 05:42:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `hp` (`hp`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pantauan`
--
ALTER TABLE `pantauan`
  ADD PRIMARY KEY (`id_pantauan`),
  ADD KEY `id_kasus` (`id_kasus`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pantauan`
--
ALTER TABLE `pantauan`
  MODIFY `id_pantauan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
