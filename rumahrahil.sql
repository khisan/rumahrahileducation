-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Apr 2021 pada 01.34
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

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
('SD00001', 'Bambang', 'bambang', 'Klojen, Malang', 'bambang@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', NULL, '2021-02-08 23:12:34', '2021-03-20 13:34:36');

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
(19, 4, 'Perguruan Tinggi', NULL);

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
(13, 1, 'Tema 2', '2021-02-23 19:24:51', NULL),
(19, 19, 'TKD', '2021-03-30 06:28:37', NULL),
(20, 19, 'TPS', '2021-03-30 06:28:42', NULL);

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
  `bab_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `waktu` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `bab_id`, `mapel_id`, `nama_paket`, `waktu`, `created`, `updated`) VALUES
(17, NULL, 19, 'Paket SBM 1', 60, '2021-03-31 08:06:50', '2021-04-01 01:32:12'),
(24, 1, NULL, 'Paket SD 1', 50, '2021-03-31 13:05:57', '2021-04-01 01:31:54'),
(25, 9, NULL, 'Paket 2', 50, '2021-03-31 13:08:25', NULL);

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
('SD11061c', 'Budi', 'budi', 1, 2, '', 'SMAN 1 Singasari', 'Pendem, Batu', 'budi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210213-f42bab1f74.jpeg', '2021-02-13 16:07:22', '2021-03-20 13:33:50'),
('SD179322', 'coba sd', 'coba', 1, 1, '', 'coba', 'coba', 'coba@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210325-28add851fb.png', '2021-03-25 07:37:37', '2021-03-28 04:10:22'),
('SMA1BAHASAcfce8', 'coba sma bahasa', 'bahasa', 3, 1, 'BAHASA', 'sma bahasa', 'coba', 'coba4@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SMA-1-210328-2cd064b347.jpg', '2021-03-28 09:13:17', '2021-03-28 05:00:20'),
('SMA1IPA5416c', 'coba sma ipa', 'ipa', 3, 1, 'IPA', 'sma ipa', 'coba', 'coba2@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SMA-1-210328-c55f67b4e7.png', '2021-03-28 09:09:47', '2021-03-28 05:00:33'),
('SMA1IPSa6b91', 'coba sma ips', 'ips', 3, 1, 'IPS', 'sma ips', 'coba', 'coba3@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SMA-1-210328-df0004801c.jpg', '2021-03-28 09:12:07', NULL),
('SMP1f82d2', 'coba smp', 'smp', 2, 1, '', 'smp coba', 'coba', 'coba6@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SMP-1-210328-cd7f3976b3.jpg', '2021-03-28 09:05:34', NULL),
('SMP38ed27', 'Bagas', 'bagas', 2, 3, '', 'SMPN 3 Pacet', 'Pacet, Mojokerto', 'bagas@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '2021-02-14 05:10:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `soal_text` text NOT NULL,
  `soal_gambar` varchar(256) NOT NULL,
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
  ADD KEY `bab_id` (`bab_id`),
  ADD KEY `mapel_id` (`mapel_id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`bab_id`) REFERENCES `tb_bab` (`id_bab`),
  ADD CONSTRAINT `tb_paket_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`);

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
