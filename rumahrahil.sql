-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2021 pada 11.35
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

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
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-02-06 11:42:24', NULL),
(2, 'admin1', 'admin1', '7c222fb2927d828af22f592134e8932480637c0d', '2021-02-08 13:29:44', NULL),
(3, 'admin2', 'admin2', '7c222fb2927d828af22f592134e8932480637c0d', '2021-02-08 13:50:24', NULL),
(4, 'admin3', 'admin3', 'a4811a6f1e3f9d28cd65dcc2df64480593af4519', '2021-02-08 15:25:51', NULL),
(6, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2021-02-21 13:32:30', NULL);

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

--
-- Dumping data untuk tabel `tb_bab`
--

INSERT INTO `tb_bab` (`id_bab`, `mapel_id`, `nama_bab`, `semester`, `created`, `updated`) VALUES
(1, 10, 'Subtema 1', 1, '2021-02-23 18:08:45', '2021-02-23 13:16:42'),
(9, 10, 'Subtema 2', 2, '2021-02-23 19:21:12', '2021-02-23 15:19:39'),
(10, 12, 'Aljabar Linier', 2, '2021-02-23 21:37:15', '2021-02-23 16:03:11'),
(11, 12, 'SPLDV', 1, '2021-02-23 22:07:09', NULL),
(12, 11, 'Bangun Datar', 1, '2021-02-23 22:22:13', NULL),
(13, 11, 'Pitagoras', 1, '2021-02-23 22:22:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_code_guru`
--

CREATE TABLE `tb_code_guru` (
  `id_code_guru` int(11) NOT NULL,
  `siswa_profile_id` varchar(128) NOT NULL,
  `mapel_guru_id` varchar(128) NOT NULL,
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

INSERT INTO `tb_guru_profile` (`id_guru_profile`, `nama`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('SD00001', 'Bambang', 'Klojen, Malang', 'bambang@gmail.com', '40deeb9b48ab6f238f76a1a6322e1099ed064428', NULL, '2021-02-08 23:12:34', NULL);

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
(3, 'SMA');

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
(18, 3, 'Kelas 12', 'BAHASA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_latihan`
--

CREATE TABLE `tb_latihan` (
  `id_latihan` int(11) NOT NULL,
  `bab_id` int(11) NOT NULL,
  `nama_latihan` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_latihan`
--

INSERT INTO `tb_latihan` (`id_latihan`, `bab_id`, `nama_latihan`, `created`, `updated`) VALUES
(6, 10, 'Latihan 1', '2021-02-23 22:17:53', '2021-02-23 16:19:45'),
(8, 1, 'Latihan 1', '2021-02-24 00:05:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_mapel` varchar(256) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kelas_id`, `nama_mapel`, `created`, `updated`) VALUES
(10, 1, 'Tema 1', '2021-02-21 14:25:42', '2021-02-21 12:47:32'),
(11, 7, 'Matematika', '2021-02-21 19:09:01', NULL),
(12, 10, 'Matematika Wajib', '2021-02-21 19:12:12', '2021-02-21 13:12:32'),
(13, 1, 'Tema 2', '2021-02-23 19:24:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel_guru`
--

CREATE TABLE `tb_mapel_guru` (
  `id_mapel_guru` varchar(128) NOT NULL,
  `guru_profile_id` varchar(128) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL,
  `sekolah` varchar(256) NOT NULL,
  `keterangan` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `latihan_id` int(11) NOT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `waktu` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `latihan_id`, `nama_paket`, `waktu`, `created`, `updated`) VALUES
(1, 6, 'Paket 1', NULL, '2021-02-24 00:01:13', '2021-02-23 18:02:23'),
(2, 8, 'Paket 1', 60, '2021-02-24 00:06:01', '2021-02-23 18:21:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa_profile`
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
-- Dumping data untuk tabel `tb_siswa_profile`
--

INSERT INTO `tb_siswa_profile` (`id_siswa_profile`, `nama`, `jenjang_id`, `kelas_id`, `jurusan`, `sekolah`, `alamat`, `email`, `password`, `image`, `created`, `updated`) VALUES
('SD11061c', 'Budi', 1, 2, '', 'SMAN 1 Singasari', 'Pendem, Batu', 'budi@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'SISWA-SD-1-210213-f42bab1f74.jpeg', '2021-02-13 16:07:22', '2021-02-13 23:00:01'),
('SD1fdebf', 'dsadsadadasd', 1, 2, '', 'dsa', 'dsa', 'dsa@mail.com', 'cc4723995ce819915e734147a77850427a9e95f9', '', '2021-02-12 18:00:51', NULL),
('SMP38ed27', 'Bagas', 2, 3, '', 'SMPN 3 Pacet', 'Pacet, Mojokerto', 'bagas@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '2021-02-14 05:10:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) NOT NULL,
  `soal_suara` varchar(256) NOT NULL,
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
-- Indeks untuk tabel `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  ADD PRIMARY KEY (`id_code_guru`),
  ADD KEY `siswa_profile_id` (`siswa_profile_id`),
  ADD KEY `mapel_guru_id` (`mapel_guru_id`);

--
-- Indeks untuk tabel `tb_guru_profile`
--
ALTER TABLE `tb_guru_profile`
  ADD PRIMARY KEY (`id_guru_profile`);

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
-- Indeks untuk tabel `tb_latihan`
--
ALTER TABLE `tb_latihan`
  ADD PRIMARY KEY (`id_latihan`),
  ADD KEY `bab_id` (`bab_id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `tb_mapel_guru`
--
ALTER TABLE `tb_mapel_guru`
  ADD PRIMARY KEY (`id_mapel_guru`),
  ADD KEY `guru_profile_id` (`guru_profile_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `latihan_id` (`latihan_id`);

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
  ADD KEY `paket_id` (`paket_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_bab`
--
ALTER TABLE `tb_bab`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  MODIFY `id_code_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_latihan`
--
ALTER TABLE `tb_latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bab`
--
ALTER TABLE `tb_bab`
  ADD CONSTRAINT `tb_bab_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `tb_code_guru`
--
ALTER TABLE `tb_code_guru`
  ADD CONSTRAINT `tb_code_guru_ibfk_1` FOREIGN KEY (`mapel_guru_id`) REFERENCES `tb_mapel_guru` (`id_mapel_guru`),
  ADD CONSTRAINT `tb_code_guru_ibfk_2` FOREIGN KEY (`siswa_profile_id`) REFERENCES `tb_siswa_profile` (`id_siswa_profile`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`jenjang_id`) REFERENCES `tb_jenjang` (`id_jenjang`);

--
-- Ketidakleluasaan untuk tabel `tb_latihan`
--
ALTER TABLE `tb_latihan`
  ADD CONSTRAINT `tb_latihan_ibfk_1` FOREIGN KEY (`bab_id`) REFERENCES `tb_bab` (`id_bab`);

--
-- Ketidakleluasaan untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD CONSTRAINT `tb_mapel_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_mapel_guru`
--
ALTER TABLE `tb_mapel_guru`
  ADD CONSTRAINT `tb_mapel_guru_ibfk_1` FOREIGN KEY (`guru_profile_id`) REFERENCES `tb_guru_profile` (`id_guru_profile`),
  ADD CONSTRAINT `tb_mapel_guru_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_mapel_guru_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`latihan_id`) REFERENCES `tb_latihan` (`id_latihan`);

--
-- Ketidakleluasaan untuk tabel `tb_siswa_profile`
--
ALTER TABLE `tb_siswa_profile`
  ADD CONSTRAINT `tb_siswa_profile_ibfk_1` FOREIGN KEY (`jenjang_id`) REFERENCES `tb_jenjang` (`id_jenjang`),
  ADD CONSTRAINT `tb_siswa_profile_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
