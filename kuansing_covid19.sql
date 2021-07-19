-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 12:32 PM
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
-- Database: `kuansing_covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `odp_proses` int(11) NOT NULL,
  `odp_selesai` int(11) NOT NULL,
  `pdp_rawat` int(11) NOT NULL,
  `pdp_rumah` int(11) NOT NULL,
  `pdp_sehat` int(11) NOT NULL,
  `pdp_meninggal` int(11) NOT NULL,
  `positif_rawat` int(11) NOT NULL,
  `positif_rumah` int(11) NOT NULL,
  `positif_sehat` int(11) NOT NULL,
  `positif_meninggal` int(11) NOT NULL,
  `data_kecamatan` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kasus_harian`
--

CREATE TABLE `kasus_harian` (
  `id_kasus_harian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kasus_harian_data` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `tipe_kontak` int(1) NOT NULL,
  `nama_kontak` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `tipe_kontak`, `nama_kontak`, `keterangan`, `no_hp`, `tanggal_dibuat`, `tanggal_diedit`) VALUES
(1, 0, 'Hotline Pengaduan', 'Covid-19 Nasional', '199', '2021-06-09 08:25:59', '2021-07-01 09:47:03'),
(3, 1, 'Dr. Agus Mandar, M.Si', 'Ka. Satgas Covid-19 Kuansing', '+628127583401', '2021-06-09 09:21:28', '2021-06-10 08:21:24'),
(4, 1, 'Dr. Gianjar Sukma', '(RSUD Teluk Kuantan)', '+628116909077', '2021-06-09 09:22:10', '2021-06-09 09:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `kontributor`
--

CREATE TABLE `kontributor` (
  `id_kontributor` int(11) NOT NULL,
  `nama_kontributor` varchar(50) NOT NULL,
  `deskripsi_kontributor` varchar(200) NOT NULL,
  `image_kontributor` text NOT NULL,
  `url_kontributor` varchar(50) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontributor`
--

INSERT INTO `kontributor` (`id_kontributor`, `nama_kontributor`, `deskripsi_kontributor`, `image_kontributor`, `url_kontributor`, `tanggal_dibuat`, `tanggal_diedit`) VALUES
(1, 'Badan Nasional Penanggulangan Bencana', '', 'http://localhost/covid19/uploads/images/38dcd7afd900d8259e401a4e6128daa2.png', 'https://www.bnpb.go.id/', '2021-06-30 02:50:53', '2021-07-01 09:40:21'),
(2, 'Dinas Kesehatan Kab. Kuantan Singingi', '', 'http://localhost/covid19/uploads/images/5d42edff4c9a27415e4390c371acba2c.png', 'https://dinkes.kuansing.go.id', '2021-06-30 02:55:29', '2021-06-30 02:55:29'),
(3, 'Diskominfoss Kab. Kuantan Singingi', '', 'http://localhost/covid19/uploads/images/3278893ec090f3595e2f9fa66fc7dc6f.png', 'https://kuansing.go.id/', '2021-06-30 02:55:40', '2021-06-30 02:55:40'),
(4, 'Polres Kuansing', '', 'http://localhost/covid19/uploads/images/77d5cb439c8bffbb9e440454befdd857.png', 'https://rri.co.id/', '2021-06-30 02:55:55', '2021-06-30 02:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `alamat_rumah_sakit` text NOT NULL,
  `telepon_rumah_sakit` text NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rumah_sakit`, `nama_rumah_sakit`, `alamat_rumah_sakit`, `telepon_rumah_sakit`, `latitude`, `longitude`, `tanggal_dibuat`, `tanggal_diedit`) VALUES
(1, 'RSUD TELUK KUANTAN', 'Komplek Perkantoran PEMDA KUANSING, Kelurahan, Sungai Jering, Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29562', 'a:2:{i:0;s:12:\"082219594614\";i:1;s:12:\"081144653321\";}', -0.5102584360906066, 101.54231009361119, '2021-06-09 08:42:10', '2021-07-01 09:45:20'),
(2, 'Rumah Sakit Syafira Pekanbaru', 'Jl. Jend. Sudirman No.134, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28282', 'a:1:{i:0;s:12:\"082210003636\";}', 0.4988004673101796, 101.45874003571409, '2021-06-10 08:56:29', '2021-06-10 08:56:29'),
(3, 'RS Prima Pekanbaru', 'Jl. Bima No.1, Delima, Kec. Tampan, Kota Pekanbaru, Riau 28292', 'a:1:{i:0;s:11:\"07618419007\";}', 0.4998316288266523, 101.397550866786, '2021-06-10 09:18:16', '2021-06-10 09:18:16'),
(4, 'Eka Hospital Pekanbaru', 'Jalan Mangga Suka Jadi No.Km, RW.5, Tengkerang Bar., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28292', 'a:1:{i:0;s:11:\"07616989999\";}', 0.48337563162433883, 101.41821298503791, '2021-06-10 09:19:15', '2021-06-10 09:20:46'),
(5, 'RS Awal Bros Sudirman', 'Jl. Jend. Sudirman, Tengkerang Sel., Kec. Bukit Raya, Kota Pekanbaru, Riau 28128', 'a:1:{i:0;s:9:\"076147333\";}', 0.49639995931539654, 101.45247590190759, '2021-06-10 09:22:10', '2021-06-10 09:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_tidur`
--

CREATE TABLE `tempat_tidur` (
  `id_tempat_tidur` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_tempat_tidur` varchar(100) NOT NULL,
  `total_tempat_tidur` int(11) NOT NULL,
  `tempat_tidur_terisi` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diedit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin', 'Administrator', 'admin@email.com', '$2y$10$yilV5k67WnmfiRtLdek.Pe.SeNZuDwrR7VhDPPYFfKdVuJtY5W6vm', 'admin', '2021-07-19 11:10:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD UNIQUE KEY `tanggal` (`tanggal`);

--
-- Indexes for table `kasus_harian`
--
ALTER TABLE `kasus_harian`
  ADD PRIMARY KEY (`id_kasus_harian`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD PRIMARY KEY (`id_kontributor`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indexes for table `tempat_tidur`
--
ALTER TABLE `tempat_tidur`
  ADD PRIMARY KEY (`id_tempat_tidur`),
  ADD KEY `id_rumah_sakit` (`id_rumah_sakit`);

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
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasus_harian`
--
ALTER TABLE `kasus_harian`
  MODIFY `id_kasus_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id_kontributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tempat_tidur`
--
ALTER TABLE `tempat_tidur`
  MODIFY `id_tempat_tidur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
