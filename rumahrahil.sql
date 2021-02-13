-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2021 at 01:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahrahil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `name`, `password`, `created`, `updated`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-02-06 11:42:24', NULL),
(2, 'admin1', 'admin1', '7c222fb2927d828af22f592134e8932480637c0d', '2021-02-08 13:29:44', NULL),
(3, 'admin2', 'admin2', '7c222fb2927d828af22f592134e8932480637c0d', '2021-02-08 13:50:24', NULL),
(4, 'admin3', 'admin3', 'a4811a6f1e3f9d28cd65dcc2df64480593af4519', '2021-02-08 15:25:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_code_guru`
--

CREATE TABLE `tb_code_guru` (
  `id_code_guru` int(11) NOT NULL,
  `siswa_profile_id` varchar(128) NOT NULL,
  `mapel_guru_id` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru_profile`
--

CREATE TABLE `tb_guru_profile` (
  `id_guru_profile` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru_profile`
--

INSERT INTO `tb_guru_profile` (`id_guru_profile`, `nama`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('guru-210212-2961d', 'Ora Umum', 'Kacuk, Malang', 'oraumum@gmail.com', '10fd978d047e92d357ec5631645da6a635e58bfd', 'guru-210212-2a8777e5f5.jpeg', '2021-02-12 20:57:44', '2021-02-12 14:59:29'),
('SD00001', 'Bambang', 'Klojen, Malang', 'bambang@gmail.com', '40deeb9b48ab6f238f76a1a6322e1099ed064428', NULL, '2021-02-08 23:12:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang`
--

CREATE TABLE `tb_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenjang`
--

INSERT INTO `tb_jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Kelas 1'),
(2, 'Kelas 2'),
(3, 'Kelas 3'),
(4, 'Kelas 4'),
(5, 'Kelas 5'),
(6, 'Kelas 6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel_guru`
--

CREATE TABLE `tb_mapel_guru` (
  `id_mapel_guru` varchar(128) NOT NULL,
  `guru_profile_id` varchar(128) NOT NULL,
  `mapel` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `sekolah` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel_guru`
--

INSERT INTO `tb_mapel_guru` (`id_mapel_guru`, `guru_profile_id`, `mapel`, `kelas_id`, `sekolah`, `created`, `updated`) VALUES
('2aa2097', 'guru-210212-2961d', 'Kelas 2', 2, 'SDN Karanglo', '2021-02-13 16:05:27', NULL),
('MP0001', 'guru-210212-2961d', 'Kelas 1', 1, 'SDN Polehan 1', '2021-02-13 09:59:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa_profile`
--

CREATE TABLE `tb_siswa_profile` (
  `id_siswa_profile` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `jenjang_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jurusan` varchar(128) DEFAULT NULL,
  `sekolah` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(126) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa_profile`
--

INSERT INTO `tb_siswa_profile` (`id_siswa_profile`, `nama`, `jenjang_id`, `kelas_id`, `jurusan`, `sekolah`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('SD11061c', 'Budi', 1, 1, '', 'SMAN 1 Singasari', 'Pendem, Batu', 'budi@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'SISWA-SD-1-210213-f42bab1f74.jpeg', '2021-02-13 16:07:22', '2021-02-13 10:08:04'),
('SD1fdebf', 'dsadsadadasd', 1, 2, '', 'dsa', 'dsa', 'dsa@mail.com', 'cc4723995ce819915e734147a77850427a9e95f9', '', '2021-02-12 18:00:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  ADD PRIMARY KEY (`id_code_guru`),
  ADD KEY `siswa_profile_id` (`siswa_profile_id`),
  ADD KEY `mapel_guru_id` (`mapel_guru_id`);

--
-- Indexes for table `tb_guru_profile`
--
ALTER TABLE `tb_guru_profile`
  ADD PRIMARY KEY (`id_guru_profile`);

--
-- Indexes for table `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel_guru`
--
ALTER TABLE `tb_mapel_guru`
  ADD PRIMARY KEY (`id_mapel_guru`),
  ADD KEY `guru_profile_id` (`guru_profile_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tb_siswa_profile`
--
ALTER TABLE `tb_siswa_profile`
  ADD PRIMARY KEY (`id_siswa_profile`),
  ADD KEY `jenjang_id` (`jenjang_id`,`kelas_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  MODIFY `id_code_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  ADD CONSTRAINT `tb_code_guru_ibfk_1` FOREIGN KEY (`mapel_guru_id`) REFERENCES `tb_mapel_guru` (`id_mapel_guru`),
  ADD CONSTRAINT `tb_code_guru_ibfk_2` FOREIGN KEY (`siswa_profile_id`) REFERENCES `tb_siswa_profile` (`id_siswa_profile`);

--
-- Constraints for table `tb_mapel_guru`
--
ALTER TABLE `tb_mapel_guru`
  ADD CONSTRAINT `tb_mapel_guru_ibfk_1` FOREIGN KEY (`guru_profile_id`) REFERENCES `tb_guru_profile` (`id_guru_profile`),
  ADD CONSTRAINT `tb_mapel_guru_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_siswa_profile`
--
ALTER TABLE `tb_siswa_profile`
  ADD CONSTRAINT `tb_siswa_profile_ibfk_1` FOREIGN KEY (`jenjang_id`) REFERENCES `tb_jenjang` (`id_jenjang`),
  ADD CONSTRAINT `tb_siswa_profile_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
