-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2021 at 02:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
(4, '2019-07-25', '07:21:53', 'Masuk', 6),
(5, '2019-07-26', '09:00:47', 'Masuk', 6),
(6, '2019-07-26', '16:01:03', 'Pulang', 6),
(7, '2019-07-25', '17:01:28', 'Pulang', 6),
(8, '2021-12-17', '11:04:35', 'Masuk', 13),
(9, '2021-12-17', '11:04:47', 'Pulang', 13),
(10, '2021-12-17', '11:04:57', 'Masuk', 13),
(11, '2021-12-17', '11:05:06', 'Masuk', 13),
(12, '2021-12-17', '11:05:13', 'Masuk', 13),
(13, '2021-12-17', '11:05:19', 'Masuk', 13);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id_divisi` smallint(3) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Marketing'),
(2, 'IT '),
(3, 'Akuntan'),
(4, 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

DROP TABLE IF EXISTS `jam`;
CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '06:00:00', '08:15:00', 'Masuk'),
(2, '17:00:00', '19:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(300) NOT NULL,
  `tempat` varchar(300) NOT NULL,
  `kegiatan` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal`, `waktu`, `tempat`, `kegiatan`, `deskripsi`, `id_user`) VALUES
(5, '2021-12-20', '16.09', 'kulon Progo', '', '<p>Testing yang banyak tesingauerlaksjdlaskfasfa</p>\r\n', 6),
(8, '2021-12-18', '08.00', 'Surabaya', 'Kunjungan Kerja', '<p>Saat iru saya melakukan</p>\r\n', 13),
(9, '2021-12-17', '08.00', 'Surabaya', 'Kunjungan Kerja', '<p>asdasdsad</p>\r\n', 13),
(10, '2021-12-16', '16.09', 'Surabaya', 'Rapat', '<h3>asdsadsadsad</h3>\r\n', 13),
(11, '2021-12-21', '08.00', 'Surabaya', 'Rapat', '<p>asdasdasdasdasd</p>\r\n', 13),
(12, '2021-12-21', '16.09', 'kulon Progo', 'Kunjungan Kerja', '<p>asdasdasdasdasdas</p>\r\n', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(20) DEFAULT 'no-foto.png',
  `divisi` smallint(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Manager','Karyawan') NOT NULL DEFAULT 'Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `divisi`, `username`, `password`, `level`) VALUES
(1, '123984756473', 'Ahmad Fadillah 1', '08139212092', 'ahm.fadil@mail.com', '1639886970.jpg', NULL, 'ahmad', '$2y$10$UwqloCX7PFLM3aQvgQxh6e9UgifqwQOZiF1zdogtLF6iVDR7Yr7IW', 'Manager'),
(6, '123456789101112', 'Anissa Rahma', '08151231902', 'anissa.rhm31@mail.com', '1564293217.png', 1, 'anissa', '$2y$10$2kexYaZKVXX/5Liljm2FXO0Zk7BI5LUQgOTz1bRIf211eraxpju2a', 'Karyawan'),
(7, '1231231231231123', 'Willy', '081231238', 'willy@mail.com', 'no-foto.png', 2, 'willy', '$2y$10$zGwtkQ8uCLBCmXEbPjJWF.vZkVlf7nmxhbe9iYu08wE8qkJNPdMb.', 'Karyawan'),
(8, '8931289124891', 'Manager 1', '', '', 'no-foto.png', NULL, 'manager_1', '$2y$10$XtMY01KEOd5I065s8Exs0OcQ373RvRNG1JznORr6TmmBNWnZ3vjjK', 'Manager'),
(9, '1231231238900', 'Manager 2', '', '', 'no-foto.png', NULL, 'manager_2', '$2y$10$iJWUOXDznGEmxo.bqnhtmeFL51jN5130LfDlKg8VROfoEmlgC.cFW', 'Manager'),
(10, '908121310291', 'Manager 3', '', '', 'no-foto.png', NULL, 'manager_3', '$2y$10$uGsLvgl.6ji2iZ7tWkNvPelTwZdLQ6QA81Yawa20wsLairCXqV8BO', 'Manager'),
(11, '123801204012', 'Manager 4', '', '', 'no-foto.png', NULL, 'master_4', '$2y$10$Kot81WNqrho4WlcYI13kT.Y5V2sMg1ZSAXcITrp8cj3dqHpbl4vrS', 'Manager'),
(13, '00218319457689', 'fian', '0968569', 'arfianfia@gmail.com', 'no-foto.png', 2, 'arfian', '$2y$10$Iln/ZjY8EWWguWVB/IpPZObZpr2AD3n5YEW43QenECQ9qgBAighw6', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
