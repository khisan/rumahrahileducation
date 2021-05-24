-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 02.21
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

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
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `name`, `password`, `created`, `updated`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-02-06 11:42:24', '2021-03-24 07:38:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bab`
--

CREATE TABLE `tb_bab` (
  `id_bab` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nama_bab` varchar(256) NOT NULL,
  `semester` int(2) NOT NULL COMMENT '1=ganjil; 2=genap.',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru_profile`
--

CREATE TABLE `tb_guru_profile` (
  `id_guru_profile` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru_profile`
--

INSERT INTO `tb_guru_profile` (`id_guru_profile`, `nama`, `username`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('guru-210324-940c0', 'cobacuy Guru', 'cobacuy', 'cobacuy', 'cobacuy@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'guru-210324-bfe63281cc.png', '2021-03-24 15:52:46', '2021-03-26 01:17:41'),
('guru-210408-c9298', 'Guru', 'coba_guru', 'coba', 'coba@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-04-08 13:27:54', NULL),
('SD00001', 'Bambang', 'bambang', 'Klojen, Malang', 'bambang@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', NULL, '2021-02-08 23:12:34', '2021-03-20 13:34:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_h_test`
--

CREATE TABLE `tb_h_test` (
  `id_h_test` int(11) NOT NULL,
  `siswa_profile_id` varchar(128) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tgl_test` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_h_test`
--

INSERT INTO `tb_h_test` (`id_h_test`, `siswa_profile_id`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `tgl_test`) VALUES
(378, 'SD11061c', '41,42', '41:,42:', 0, 0, '2021-05-20 07:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenjang`
--

CREATE TABLE `tb_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenjang`
--

INSERT INTO `tb_jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang_id` int(11) DEFAULT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `jurusan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `jenjang_id`, `nama_kelas`, `jurusan`) VALUES
(1, 1, 'Kelas 1', NULL),
(2, 1, 'Kelas 2', NULL),
(3, 1, 'Kelas 3', NULL),
(4, 1, 'Kelas 4', NULL),
(5, 1, 'Kelas 5', NULL),
(6, 1, 'Kelas 6', NULL),
(7, 2, 'Kelas 7', NULL),
(8, 2, 'Kelas 8', NULL),
(9, 2, 'Kelas 9', NULL),
(10, 3, 'Kelas 10', 'IPA'),
(11, 3, 'Kelas 10', 'IPS'),
(12, 3, 'Kelas 10', 'BAHASA'),
(13, 3, 'Kelas 11', 'IPA'),
(14, 3, 'Kelas 11', 'IPS'),
(15, 3, 'Kelas 11', 'BAHASA'),
(16, 3, 'Kelas 12', 'IPA'),
(17, 3, 'Kelas 12', 'IPS'),
(18, 3, 'Kelas 12', 'BAHASA'),
(19, 4, 'SBM', NULL),
(20, 4, 'Kedinasan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `nama_mapel` varchar(256) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kelas_id`, `paket_id`, `nama_mapel`, `created`, `updated`) VALUES
(40, 1, NULL, 'Tema 1', '2021-04-27 09:07:14', NULL),
(59, NULL, 48, 'Matematika', '2021-05-24 07:20:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `waktu` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `kelas_id`, `nama_paket`, `waktu`, `created`, `updated`) VALUES
(48, 19, 'Paket 1', 100, '2021-05-24 07:20:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa_profile`
--

CREATE TABLE `tb_siswa_profile` (
  `id_siswa_profile` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(50) NOT NULL,
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
-- Dumping data untuk tabel `tb_siswa_profile`
--

INSERT INTO `tb_siswa_profile` (`id_siswa_profile`, `nama`, `username`, `jenjang_id`, `kelas_id`, `jurusan`, `sekolah`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('Kedinasan20a7f12', 'coba kedinasan', 'kedinasan', 4, 20, '', 'coba kedinasan', 'asd', 'kedinasan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-04-22 15:40:06', NULL),
('SBM1908e13', 'coba sbm', 'sbm', 4, 19, '', 'coba sbm', 'asd', 'sbm@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-04-22 15:36:07', NULL),
('SD11061c', 'Budi', 'budi', 1, 1, '', 'SDN 1 Singasari', 'Pendem, Batu', 'budi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210213-f42bab1f74.jpeg', '2021-02-13 16:07:22', '2021-03-20 13:33:50'),
('SD179322', 'coba sd', 'coba', 1, 1, '', 'coba', 'coba', 'coba@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210325-28add851fb.png', '2021-03-25 07:37:37', '2021-03-28 04:10:22'),
('SMP7e5679', 'coba smp', 'smp', 2, 7, '', 'coba', 'coba', 'smp@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-04-26 12:10:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) DEFAULT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text DEFAULT NULL,
  `option_e` text DEFAULT NULL,
  `jawaban_benar` varchar(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_bab`
--
ALTER TABLE `tb_bab`
  ADD PRIMARY KEY (`id_bab`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `tb_guru_profile`
--
ALTER TABLE `tb_guru_profile`
  ADD PRIMARY KEY (`id_guru_profile`);

--
-- Indeks untuk tabel `tb_h_test`
--
ALTER TABLE `tb_h_test`
  ADD PRIMARY KEY (`id_h_test`),
  ADD KEY `siswa_profile_id` (`siswa_profile_id`);

--
-- Indeks untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jenjang_id` (`jenjang_id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `tb_paket_ibfk_3` (`kelas_id`);

--
-- Indeks untuk tabel `tb_siswa_profile`
--
ALTER TABLE `tb_siswa_profile`
  ADD PRIMARY KEY (`id_siswa_profile`),
  ADD KEY `jenjang_id` (`jenjang_id`,`kelas_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `paket_id` (`paket_id`),
  ADD KEY `tb_soal_ibfk_2` (`mapel_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_bab`
--
ALTER TABLE `tb_bab`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_h_test`
--
ALTER TABLE `tb_h_test`
  MODIFY `id_h_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bab`
--
ALTER TABLE `tb_bab`
  ADD CONSTRAINT `tb_bab_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_h_test`
--
ALTER TABLE `tb_h_test`
  ADD CONSTRAINT `tb_h_test_ibfk_2` FOREIGN KEY (`siswa_profile_id`) REFERENCES `tb_siswa_profile` (`id_siswa_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`jenjang_id`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD CONSTRAINT `tb_mapel_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mapel_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa_profile`
--
ALTER TABLE `tb_siswa_profile`
  ADD CONSTRAINT `tb_siswa_profile_ibfk_1` FOREIGN KEY (`jenjang_id`) REFERENCES `tb_jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_profile_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_soal_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
