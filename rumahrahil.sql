-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2021 pada 11.21
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

--
-- Dumping data untuk tabel `tb_bab`
--

INSERT INTO `tb_bab` (`id_bab`, `mapel_id`, `nama_bab`, `semester`, `created`, `updated`) VALUES
(17, 40, 'Subtema 1', 1, '2021-04-27 09:07:34', NULL);

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
  `paket_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) NOT NULL,
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

INSERT INTO `tb_h_test` (`id_h_test`, `paket_id`, `mapel_id`, `siswa_profile_id`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `tgl_test`) VALUES
(159, 40, 72, 'SBM19432d5', '45,46', '45:b,46:d', 2, 100, '2021-07-04 06:10:01');

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
(19, 4, 'SBM', 'SOSHUM'),
(20, 4, 'SBM', 'SAINTEK'),
(21, 4, 'Kedinasan', 'STIS'),
(22, 4, 'Kedinasan', 'STAN'),
(23, 4, 'Kedinasan', 'LPDN');

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
(72, NULL, 40, 'Matematika', '2021-05-26 10:33:19', NULL),
(75, NULL, 51, 'SKD', '2021-05-29 11:12:57', NULL),
(76, NULL, 52, 'Coba Mapel STIS Kedinasan', '2021-07-05 06:53:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `bab_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `waktu` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `bab_id`, `kelas_id`, `nama_paket`, `waktu`, `created`, `updated`) VALUES
(40, NULL, 19, 'Paket 1 SOSHUM', 240, '2021-04-19 15:36:00', NULL),
(47, 17, NULL, 'Paket 1', 120, '2021-04-27 09:07:46', NULL),
(51, NULL, 20, 'Paket 1 SAINTEK', 120, '2021-05-29 11:12:47', '2021-06-11 08:48:18'),
(52, NULL, 21, 'Coba', 100, '2021-07-04 10:42:28', NULL);

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
  `jurusan` varchar(100) NOT NULL,
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
('Kedinasan2118254', 'kedinasan stis', 'stis', 4, 21, 'STIS', 'a', 'a', 'b@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-11 15:40:12', NULL),
('SBM19432d5', 'sbm soshum', 'soshum', 4, 19, 'SOSHUM', 'q', 'q', 'q@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-11 15:20:45', NULL),
('SBM19beda5', 'coba sbm soshum', 'soshum_coba', 4, 19, 'SOSHUM', 'SBM ', 'coba', 'coba5@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-19 11:10:23', NULL),
('SBM20cc816', 'coba saintek', 'saintek', 4, 20, 'SAINTEK', 'q', 'q', 'a@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-11 15:37:44', NULL),
('SD11061c', 'Budi', 'budi', 1, 1, '', 'SDN 1 Singasari', 'Pendem, Batu', 'budi@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210213-f42bab1f74.jpeg', '2021-02-13 16:07:22', '2021-03-20 13:33:50'),
('SD179322', 'coba sd', 'coba', 1, 1, '', 'coba', 'coba', 'coba@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'SISWA-SD-1-210325-28add851fb.png', '2021-03-25 07:37:37', '2021-03-28 04:10:22'),
('SMA10ec055', 'ipa', 'ipa', 3, 10, 'IPA', 'coba', 'coba', '1@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-19 11:33:35', NULL),
('SMA12c4f84', 'sma bahasa', 'bahasa', 3, 12, 'BAHASA', 'coba', 'coba', 't@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-06-12 07:18:56', NULL),
('SMP7e5679', 'coba smp', 'smp', 2, 7, '', 'coba', 'coba', 'smp@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '2021-04-26 12:10:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `soal` text NOT NULL,
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
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `paket_id`, `mapel_id`, `soal`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `jawaban_benar`, `created`, `updated`) VALUES
(41, 47, 40, '<p><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span class=\"CharacterStyle1\" xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">1. Jika a, b, ≥</span></span></span></span></span> <span class=\"CharacterStyle1\" xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">0, maka pernyataan </span></span></span></span></span><span class=\"CharacterStyle1\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">b</span></span></span></span></span><span class=\"CharacterStyle1\" xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">awah ini </span></span></span></span></span><span class=\"CharacterStyle1\" xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">yang benar adalah</span></span></span></span></span><span class=\"CharacterStyle1\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">…</span></span></span></span></span></span></span></span></span></p>\n\n<p><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span class=\"CharacterStyle1\" xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><img alt=\"\" src=\"/ckfinder/userfiles/images/__thumbs/aaron-wu-652354-unsplash.jpg/aaron-wu-652354-unsplash__300x200.jpg\" xss=\"removed\"></span></span></span></span></span></span></span></span></span></p>\n\n<p> </p>\n', '<p><i><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m>A. </m></span></span></span><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m> &lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt><mi>ab</mi></msqrt><mi> </mi><mi mathvariant=\"normal\"> </mi><mfrac><mrow><mi mathvariant=\"normal\">a</mi><mo>+</mo><mi mathvariant=\"normal\">b</mi></mrow><mn>2</mn></mfrac>&lt;/math&gt;</m></span></span></span></i>                               <i><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m></m></span></span></span></i></p>\n\n<p><i><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m> </m></span></span></span></i></p>\n\n<p> </p>\n\n<p><i><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m></m></span></span></span></i><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span><i><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><m></m></span></span></span></i><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span></p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<mi>B</mi><mo>.</mo><mo> </mo><mo> </mo><mo>√</mo><mi>a</mi><mi>b</mi><mo> </mo><mo>≤</mo><mo> </mo><mi>b</mi><mo>√</mo><mi>a</mi><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo>&lt;/math&gt;             </p>\n', '<p class=\"Style2\" xss=\"removed\">&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<mi>C</mi><mo>.</mo><mo> </mo><mo> </mo><mo>√</mo><mi>a</mi><mi>b</mi><mo> </mo><mo>≤</mo><mo> </mo><mi>a</mi><mi>b</mi><mo>/</mo><mn>2</mn>&lt;/math&gt;<span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span></span></span></span></span></span></span></p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<mi>D</mi><mo>.</mo><mo> </mo><mo> </mo><mo>√</mo><mi>a</mi><mi>b</mi><mo> </mo><mo>≥</mo><mo> </mo><mi>a</mi><mo>√</mo><mi>b</mi>&lt;/math&gt;<span lang=\"IN\" xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><img xss=\"removed\"></span></span></span></span></p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<mi>E</mi><mo>.</mo><mo> </mo><mo> </mo><mo>√</mo><mi>a</mi><mi>b</mi><mo> </mo><mo>≥</mo><mo> </mo><mi>a</mi><mi>b</mi>&lt;/math&gt;</p>\n', 'a', '2021-04-29 09:33:55', '2021-06-06 19:34:31'),
(42, 47, 40, '<p class=\"Style1\" xss=removed><span xss=removed><span xss=removed><span xss=removed><span xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed>2. Diketahui segitiga <i>ABC. </i>Titik <i>P </i>di tengah <i>AC, </i></span></span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed>dan <i>Q </i>pada BC sehingga <i>BQ = QC.</i></span></span></span></span></span></span></span></p>\n\n<p class=\"Style2\" xss=removed><span xss=removed><span xss=removed><span xss=removed><span xss=removed><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed>Jika </span></span></span></span></span><m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>AB</m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed> =</span></span></span></span></span> <m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>c</m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed>, </span></span></span></span></span><m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>AC </m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed>=</span></span></span></span></span> <m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>b</m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed><span xss=removed><span xss=removed><span xss=removed> , dan </span></span></span></span></span><m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>BC </m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed>= </span></span></span></span></span><m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></span></m></m><m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>a</m></span></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed>,</span></span></span></span></span></span></span></span></span></p>\n\n<p class=\"Style2\" xss=removed><span xss=removed><span xss=removed><span xss=removed><span xss=removed><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed>maka </span></span></span></span><m><m><m><m m:val=\"⃗\"><span xss=removed><span xss=removed><span xss=removed><m></m></span></span></span></m></m><m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><m><m><m m:val=\"roman\"><m m:val=\"p\"></m></m></m>PQ</m></span></span></span></m></m></m><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed> =...</span></span></span></span></span></span></span></span></p>\n\n<p> </p>\n', '<p><span class=\"CharacterStyle1\" xss=removed><span xss=removed>A.</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed> (</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>+</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>)                                            </span></span></p>\n', '<p><span class=\"CharacterStyle1\" xss=removed><span xss=removed>B.</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>(</span></span> <span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>‒</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>)                                             </span></span></p>\n', '<p><span class=\"CharacterStyle1\" xss=removed><span xss=removed>C.</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>(‒</span></span> <span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>+</span></span> <span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>)</span></span></p>\n', '<p><span class=\"CharacterStyle1\" xss=removed><span xss=removed>D. </span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>(‒</span></span> <span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>+</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>)</span></span></p>\n', '<p><span class=\"CharacterStyle1\" xss=removed><span xss=removed>E. </span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>(</span></span> <span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img CYII=\" style=\"></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>‒</span></span><span lang=\"IN\" xss=removed><span xss=removed><span xss=removed><span xss=removed><img xss=removed></span></span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed>)</span></span></p>\n', 'c', '2021-04-29 09:34:35', '2021-05-29 10:19:13'),
(45, 40, 72, '<p>Soal Mat SBM&nbsp;</p>\n', '<p>a</p>\n', '<p>b</p>\n', '<p>c</p>\n', '<p>d</p>\n', '<p>e</p>\n', 'b', '2021-05-27 16:25:26', '0000-00-00 00:00:00'),
(46, 40, 72, '<p>Soal Mat SBM 2</p>\n', '<p>a</p>\n', '<p>b</p>\n', '<p>c</p>\n', '<p>d</p>\n', '<p>e</p>\n', 'd', '2021-05-27 16:25:46', '0000-00-00 00:00:00'),
(47, 51, 75, '<ol>\n	<li class=\"Style1\" style=\"margin-top:2px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 7.9pt right 205.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.1pt\">Pancasila disahkan oleh PPKI sebagai</span></span></span></span></span></li>\n</ol>\n\n<p class=\"Style174\" style=\"margin-left:38px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.35pt\">dasarfilsafat negara Republik Indonesia </span></span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">pada tanggal</span></span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\" style=\"margin-left:8px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.8pt\">15 Agustus 1945</span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\" style=\"margin-left:8px; margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">B. 17 Agustus 1945</span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-left:8px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.8pt\">C. 18 Agustus 1945</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-left:8px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.9pt\">D. 22 Juni 1945</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-left:8px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.4pt\">E. 26 Juni 1945</span></span></span></span></span></span></span></span></p>\n', 'a', '2021-05-29 11:17:28', '0000-00-00 00:00:00'),
(48, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 7.9pt right 206.15pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.05pt\">2. Pancasila sebagai dasar negara pada </span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\">hakikatnya telah menjadikan bangsa <span style=\"letter-spacing:.15pt\">Indonesia ber-Pancasila dalam tiga </span><span style=\"letter-spacing:-.1pt\">prakara atau tiga asas, yaitu . . .</span></span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.5pt\">ketuhanan, kemanusiaan, persatuan</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.55pt\">B. kemanusiaan, persatuan, kerakyatan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">C. persatuan, kerakyatan, keadilan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.2pt\">D. kerakyatan, keadilan, kebudayaan </span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.05pt\">E. kebudayaan, religius, kenegaraan</span></span></span></span></span></span></span></span></span></p>\n', 'd', '2021-05-29 11:21:50', '0000-00-00 00:00:00'),
(49, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 7.9pt right 205.65pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.3pt\">3. Ideologi secara umum adalah suatu </span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\"><span style=\"letter-spacing:.15pt\">kumpulan gagasan, ide, keyakinan, </span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\">serta kepercayaan yang bersifat <span style=\"letter-spacing:-.1pt\">sistematis yang mengarahkan tingkah</span></span></span></span></span></span></span></p>\n\n<p class=\"Style174\" style=\"text-align:justify; margin-left:38px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.85pt\">laku seseorang dalam berbagai </span></span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">bidang kehidupan. Sebagai ideologi, <span style=\"letter-spacing:-.2pt\">Pancasila termasuk ke dalam ideologi </span>terbuka karena . . .</span></span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style1\" style=\"margin-left:22px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 46.8pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.05pt\">nilai-nilai dan cita-cita dihasilkan </span><span lang=\"IN\" style=\"letter-spacing:.9pt\">dari pemikiran individu atau </span>kelompok yang berkuasa dan <span style=\"letter-spacing:.2pt\">masyarakatnya berkorban demi </span>ideologinya</span></span></span></span></li>\n</ol>\n', '<p class=\"Style1\" style=\"margin-left:22px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.7pt\">B. menolak reformasi</span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:2px; margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C. masyarakat harus taat kepada ideologi elite penguasa</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:27px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.45pt\">D. penguasa bertanggung jawab pada </span><span lang=\"IN\" style=\"letter-spacing:-.1pt\">masyarakat sebagai pengemban </span>amanat rakyat</span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-left:22px; text-align:justify\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 21.6pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.6pt\">E. totaliter</span></span></span></span></span></span></span></span></span></p>\n', 'd', '2021-05-29 11:23:50', '0000-00-00 00:00:00'),
(50, 51, 75, '<p class=\"Style174\" style=\"text-align:justify\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.25pt\">4. Pancasila sebagai suatu ideologi tidak </span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.4pt\">bersifat kaku dan tertutup, namun </span></span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.55pt\">bersifat reformatif, dinamis,&nbsp; dan </span></span></span></span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">terbuka. Hal ini dimaksudkan bahwa ideologi Pancasila adalah bersifat . . .</span></span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\" style=\"text-align:justify\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.6pt\">aktual, statis, dan antisipatif</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\" style=\"margin-top:7px; text-align:justify\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.35pt\">b. aktual, dinamis, dan antisipatif</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"text-align:justify; margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.5pt\">C. faktual, statis, dan pragmatic</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-right:19px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.05pt\">D. faktual, dinamis, dan preventif </span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-right:19px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">E. aktual, statis, dan responsif</span></span></span></span></span></span></span></span></span></p>\n', 'd', '2021-05-29 11:27:12', '0000-00-00 00:00:00'),
(51, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 8.1pt right 206.35pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.6pt\">5. Ideologi Pancasila berdasar pada&nbsp;</span></span></span></span></span><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">hakikat sifat kodrat manusia sebagai <span style=\"letter-spacing:1.1pt\">makhluk individu dan makhluk </span><span style=\"letter-spacing:.75pt\">sosial. Oleh karena itu, ideologi </span>Pancasila mengakui kebebasan hak&shy;<span style=\"letter-spacing:-.15pt\">hak masyarakat. Kebebasan manusia </span><span style=\"letter-spacing:1.1pt\">dalam rangka demokrasi tidak </span><span style=\"letter-spacing:.15pt\">melampaui hakikat nilai-nilai ....</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.2pt\">ketuhanan</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.8pt\">B. kemanusiaan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.1pt\">C.persatuan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.0pt\">D. kerakyatan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.0pt\">E. keadilan</span></span></span></span></span></span></span></span></span></p>\n', 'd', '2021-05-29 11:29:00', '0000-00-00 00:00:00'),
(52, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 8.1pt right 205.6pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.05pt\">6. Teks-teks yang termuat dalam konstitusi </span><span lang=\"IN\" style=\"letter-spacing:-.1pt\">yang kemudian dikenal sebagai UUD </span><span lang=\"IN\" style=\"letter-spacing:.4pt\">1945 adalah hasil perumusan apa </span>yang terjadi di dalam kehidupan <span style=\"letter-spacing:-.25pt\">bermasyarakat. Keberadaan konstitusi </span><span style=\"letter-spacing:.1pt\">dalam negara pada prinsipnya untuk</span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style1\" style=\"margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.25pt\">membatasi kekuasaan pemerintah</span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style1\" style=\"margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt right 173.7pt 206.35pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.6pt\">B. memberikan </span><span lang=\"IN\" style=\"letter-spacing:-.3pt\">kekuasaan </span>tak terbatas pada pemerintah</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.35pt\">C. jaminan atas kewajiban politik </span>rakyat</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.7pt\">D. kekuasaan parlemen di atas </span>lembaga hukum</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:27px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\">E. kekuasaan&nbsp;&nbsp; hukum&nbsp; di atas parlemen</span></span></span></span></span></span></p>\n', 'd', '2021-05-29 11:31:49', '0000-00-00 00:00:00'),
(53, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 8.1pt right 205.6pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.6pt\">7. Konstitusi Indonesia yang dikenal </span>sebagai UUD 1945 dalam konteks <span style=\"letter-spacing:-.1pt\">klasifikasi konstitusi adalah konstitusi </span>yang ....</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">tertulis, fleksibel, solid</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">B. tidak tertulis, fleksibel, rigid</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">C. tertulis, fleksibel, rigid</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.15pt\">D. tidak tertulis, toleran, rigid</span></span></span></span></span></span></span></span></span></p>\n', '<p><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\"><span style=\"letter-spacing:.2pt\">E. tertulis, toleran, solid </span></span></span></p>\n', 'd', '2021-05-29 11:32:58', '0000-00-00 00:00:00'),
(54, 51, 75, '<p class=\"Style174\" style=\"margin-bottom:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.8pt\">8. UUD 1945 sebagai hukum dasar </span></span></span></span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.1pt\">Negara Kesatuan Republik Indonesia </span></span></span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.25pt\">dipenuhi perdebatan yang sengit pada </span></span></span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.25pt\">proses pembentukannya, terutama </span></span></span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.05pt\">antara para <i>founding fathers </i>sebagai </span></span></span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.1pt\">berikut, <i>kecuali ....</i></span></span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.4pt\">Soepomo</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.9pt\">B. Muhammad Hatta</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.9pt\">C. Muhammad Yamin</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.1pt\">D. Soekarno</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 21.6pt left 49.65pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.4pt\">E. H.O.S. Tjokroaminoto</span></span></span></span></span></span></span></span></span></p>\n', 'c', '2021-05-29 11:46:29', '0000-00-00 00:00:00'),
(55, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:decimal 8.15pt right 205.9pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.1pt\">9. Pada masa awal kemerdekaan, </span>negara Indonesia belum mempunyai <span style=\"letter-spacing:.2pt\">infrapolitik lengkap, yaitu lembaga&shy;</span><span style=\"letter-spacing:.9pt\">lembaga negara yang mestinya </span>ada sesuai ketentuan UUD 1945. <span style=\"letter-spacing:-.25pt\">Berdasarkan aturan peralihan pasal IV kekuasaan lembaga negara dijalankan </span>oleh ....</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.8pt\">perdana menteri</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.3pt\">B. presiden</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.0pt\">C. wakil presiden</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:1.2pt\">D. BPUPKI</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 21.6pt left 49.65pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">E. PPKI</span></span></span></span></span></span></span></span></p>\n', 'e', '2021-05-29 11:47:30', '0000-00-00 00:00:00');
INSERT INTO `tb_soal` (`id_soal`, `paket_id`, `mapel_id`, `soal`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `jawaban_benar`, `created`, `updated`) VALUES
(56, 51, 75, '<p class=\"Style1\" style=\"margin-top:7px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.05pt\">10. Problem awal dalam penyelenggaraan </span><span lang=\"IN\" style=\"letter-spacing:-.25pt\">negara justru mengingkari dibentuknya </span><span lang=\"IN\" style=\"letter-spacing:-.05pt\">UUD 1945 yang berkeinginan adanya</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\" style=\"margin-top:19px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">stabilitas ekonomi</span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\" style=\"margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.2pt\">B. swasembada pangan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:7px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.2pt\">C. pemusatan kekuasaan</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:5px; margin-right:67px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.45pt\">D. pembatasan kekuasaan </span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:5px; margin-right:67px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.3pt\">E. kontrol sosial</span></span></span></span></span></p>\n', 'b', '2021-05-29 11:49:02', '0000-00-00 00:00:00'),
(57, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:right 207.2pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.5pt\">41. Bila seseorang berangkat bekerja</span> <span style=\"letter-spacing:-.05pt\">pukul 06.10 menggunakan motornya </span><span style=\"letter-spacing:.05pt\">dengan kecepatan tetap menempuh </span><span style=\"letter-spacing:.4pt\">jarak 6 km dalam waktu 16 menit. </span>Pada pukul berapa Dia sampai di <span style=\"letter-spacing:.45pt\">kantornya bila jarak ke kantornya </span><span style=\"letter-spacing:-.35pt\">adalah 21 km?</span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\" style=\"margin-top:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.25pt\">07.00</span></span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\" style=\"margin-top:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.3pt\">B. 07.02</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.3pt\">C. 07.03</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:-.25pt\">D. 07.06</span></span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 21.6pt left 49.65pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"letter-spacing:.6pt\">E. 07.09</span></span></span></span></span></span></span></span></span></p>\n', 'c', '2021-05-29 11:50:41', '0000-00-00 00:00:00'),
(58, 51, 75, '<p class=\"Style1\" style=\"margin-top:22px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">42. Jika dalam suatu kantor perbandingan antara pegawai wanita dan pegawai <span style=\"letter-spacing:-.05pt\">pria adalah 5 : 3, berapa persentase </span><span style=\"letter-spacing:.2pt\">jumlah pegawai wanita pada </span><span style=\"letter-spacing:-.55pt\">tersebut?</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style1\" style=\"margin-top:22px; margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.55pt\">25,5 %</span></span></span></span></li>\n</ol>\n', '<p class=\"Style1\" style=\"margin-top:22px; margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.55pt\">B. 32,5 %</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:22px; margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.55pt\">C. 48,5 %</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:22px; margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.55pt\">D. 56,5 %</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:22px; margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.55pt\">E. 62,5 %</span></span></span></span></p>\n', 'b', '2021-05-29 11:51:58', '0000-00-00 00:00:00'),
(59, 51, 75, '<p class=\"Style1\" style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">43. Delapan pekerja bangunan membutuhkan waktu 12 hari untuk membangun pondasi gedung. Berapa tambahan pekerja yang dibutuhkan untuk membangun pondasi gedung dalam 2 hari ?</span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style1\" style=\"margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">36</span></span></span></span></li>\n</ol>\n', '<p class=\"Style1\" style=\"margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">B. 38</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">C. 40</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">D. 42</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:13px; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">E. 44</span></span></span></span></p>\n', 'c', '2021-05-29 11:53:05', '0000-00-00 00:00:00'),
(60, 51, 75, '<p class=\"Style1\" style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.2pt\">44. Ahmad dan Beno mendaftar asuransi </span><span lang=\"IN\" style=\"letter-spacing:-.3pt\">kesehatan dengan besaran premi yang </span><span lang=\"IN\" style=\"letter-spacing:-.15pt\">sama. Apabila Ahmad yang menerima </span><span lang=\"IN\" style=\"letter-spacing:.75pt\">gaji sebesar Rp3.500.000 harus </span><span lang=\"IN\" style=\"letter-spacing:-.1pt\">dipotong 5% untuk premi, berapa gaji </span><span lang=\"IN\" style=\"letter-spacing:-.15pt\">Beno jika potongan preminya sebesar </span>4%?</span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Rp3.750.000</span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p>&nbsp;</p>\n\n<p class=\"Style174\" style=\"margin-top:7px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">B. Rp3.850.000</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:7px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C. Rp4.150.000</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:5px; margin-right:130px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.5pt\">D. Rp4.375.000</span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-top:5px; margin-right:130px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.4pt\">E. Rp4.750.000</span></span></span></span></span></p>\n', 'd', '2021-05-29 11:56:15', '0000-00-00 00:00:00'),
(61, 51, 75, '<p class=\"Style1\" style=\"margin-top:19px\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:.35pt\">45. Jika 20% dari s adalah 4m dan 30% </span><span lang=\"IN\" style=\"letter-spacing:.15pt\">dari s adalah 2n, berapa persen kah </span><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:10.5pt\"><span style=\"letter-spacing:-.3pt\">m + n dari s?</span></span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style174\" style=\"margin-top:5px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 54.0pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">10%</span></span></span></span></span></span></span></span></li>\n</ol>\n', '<p class=\"Style174\" style=\"margin-top:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">B. 20%</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style174\" style=\"margin-top:2px\"><span style=\"font-size:10.5pt\"><span style=\"line-height:normal\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:Arial,sans-serif\"><span class=\"CharacterStyle5\" style=\"font-family:Arial,sans-serif\"><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">C. 30%</span></span></span></span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-right:182px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:-.25pt\">D. 40% </span></span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-right:182px\"><span style=\"font-size:12pt\"><span style=\"tab-stops:list 50.4pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.0pt\">E. 50%</span></span></span></span></span></p>\n', 'd', '2021-05-29 11:57:25', '0000-00-00 00:00:00'),
(62, 51, 75, '<p class=\"Style1\"><span style=\"font-size:12pt\"><span style=\"tab-stops:1.0cm\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.5pt\">Manakah dari bilangan berikut yang nilainya melebihi nilai </span><span lang=\"IN\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"position:relative\"><span style=\"top:7.0pt\"><img id=\"_x0000_i1025\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAbCAIAAAA/JAJkAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAMBJREFUKFO1kbERwyAMRSGzmIbzBLBBqlQZAcpUnsINlMkIrtIENnEDuxCBCFzOdpO7qPPzB6EnmlIimzptEZBGo5VU2oihSqOd11G0c4V6PZNp4v0yoF4/L/fbgMzbcksw/WDGwgR4FbwMC34XkqvRYNQnmRL9ZYqvGfcn3tVA/tXt0Dr4lrSU1FU7ZMNKrsWKGx/LC7fRnTmjlENpeK/XlLLzQjir8ls2BQculcNsblaaDIy3tcASnKpfApNH1t9ZJIZxtMPG1wAAAABJRU5ErkJggg==\" style=\"width:5.25pt; height:20.25pt\" /> </span></span></span></span><span lang=\"IN\" style=\"letter-spacing:1.5pt\">&nbsp;?</span></span></span></span></span></p>\n', '<ol style=\"list-style-type:upper-alpha\">\n	<li class=\"Style1\" style=\"margin-left:15px\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.5pt\">125 %</span></span></span></span></li>\n</ol>\n', '<p>b.&nbsp;<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfrac><mn>14</mn><mn>16</mn></mfrac></math></p>\n', '<p>C.&nbsp;<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mfrac><msqrt><mn>36</mn></msqrt><msqrt><mn>16</mn></msqrt></mfrac></math></p>\n', '<p class=\"Style1\" style=\"margin-left:15px\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.5pt\">D. 0.99</span></span></span></span></p>\n', '<p class=\"Style1\" style=\"margin-left:15px\"><span style=\"font-size:12pt\"><span style=\"text-autospace:ideograph-numeric ideograph-other\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span lang=\"IN\" style=\"letter-spacing:1.5pt\">E. 1,4 x 0,8</span></span></span></span></p>\n', 'e', '2021-05-29 11:59:46', '0000-00-00 00:00:00'),
(64, 47, 40, '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/__thumbs/backlit-2178297_1920.jpg/backlit-2178297_1920__300x200.jpg\" xss=\"removed\"></p>\n\n<p>coba soal woi</p>\n', '<p>a</p>\n', '<p>b</p>\n', '<p>c</p>\n', '<p>d</p>\n', '<p>e</p>\n', 'e', '2021-06-06 14:10:03', '2021-06-06 14:13:57'),
(65, 47, 40, '<p><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed>Jika a, b, ≥</span></span></span> <span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed>0, maka pernyataan </span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed><span xss=removed>b</span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed>awah ini </span></span></span><span class=\"CharacterStyle1\" xss=removed><span lang=\"IN\" xss=removed><span xss=removed>yang benar adalah</span></span></span><span class=\"CharacterStyle1\" xss=removed><span xss=removed><span xss=removed>…</span></span></span></p>\n', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/image-20210606190704-2.png\" xss=removed></p>\n\n<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt><mi>ab</mi></msqrt><mi> </mi><mo>≥</mo><mo> </mo><mfrac><mrow><mi mathvariant=\"normal\">a</mi><mo>+</mo><mi mathvariant=\"normal\">b</mi></mrow><mn>2</mn></mfrac>&lt;/math&gt;</p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt><mi>ab</mi></msqrt><mo> </mo><mo>≤</mo><mi> </mi><mi mathvariant=\"normal\"> </mi><mi mathvariant=\"normal\">b</mi><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo><mo> </mo>&lt;/math&gt;</p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt><mi>ab</mi></msqrt><mi> </mi><mo>≥</mo><mi mathvariant=\"normal\"> </mi><mfrac><mi>ab</mi><mn>2</mn></mfrac>&lt;/math&gt;</p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt><mi>ab</mi></msqrt><mo>≥</mo><mi mathvariant=\"normal\">a</mi><msqrt><mi>b</mi></msqrt>&lt;/math&gt;</p>\n', '<p>&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<mi> </mi><msqrt><mi>ab</mi></msqrt><mi> </mi><mo>≤</mo><mi mathvariant=\"normal\"> </mi><mi>ab</mi>&lt;/math&gt;</p>\n', 'a', '2021-06-19 11:31:17', '2021-06-19 11:38:51');

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
  ADD KEY `paket_id` (`paket_id`),
  ADD KEY `mapel_id` (`mapel_id`);

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
  ADD KEY `tb_paket_ibfk_1` (`bab_id`),
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
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_h_test`
--
ALTER TABLE `tb_h_test`
  MODIFY `id_h_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  ADD CONSTRAINT `tb_h_test_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_h_test_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`bab_id`) REFERENCES `tb_bab` (`id_bab`) ON DELETE CASCADE ON UPDATE CASCADE,
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
