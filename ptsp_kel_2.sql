-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220511.c3fb567b13
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2022 pada 06.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `email` varchar(265) NOT NULL,
  `nama` varchar(265) NOT NULL,
  `telp_wa` bigint(16) NOT NULL,
  `pesan` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id`, `no_antrian`, `email`, `nama`, `telp_wa`, `pesan`, `user_id`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'bejo@mail.oyi', 'Bejo Bin Salam', 89515330249, '', 1, 0, '2022-04-09', '2022-04-04 11:10:13', '2022-04-09 02:44:18'),
(2, 1, 'php@go.id', 'Php In', 89515330248, '', 3, 0, '2022-04-09', '2022-04-04 09:02:13', '2022-04-09 08:54:08'),
(3, 2, 'antrian@an.an', 'My Antrian', 89515330253, '', 3, 0, '2022-04-04', '2022-04-04 08:06:28', '2022-04-04 09:10:35'),
(4, 3, 'salmanan@mail.com', 'Salamanan', 89515330253, '', 3, 1, '2022-04-09', '2022-04-04 15:10:36', '2022-04-09 02:44:22'),
(5, 1, 'prepare432@gmail.com', 'prepare channel', 89515330252, '', 2, 0, '2022-04-04', '2022-04-04 10:05:59', '2022-04-04 09:10:20'),
(6, 1, 'ucok@mail.co', 'Ucok Baba', 8234983274, '', 3, 0, '2022-04-12', '2022-04-12 07:18:11', '2022-04-12 05:36:37'),
(7, 2, 'tes@mail.co', 'Tester', 89345345, '', 3, 1, '2022-04-12', '2022-04-12 07:49:00', '2022-04-12 05:49:00'),
(8, 3, 'bejo@mail.co', 'Tes', 12312, '', 3, 0, '2022-04-12', '2022-04-12 07:42:07', '2022-04-12 05:43:02'),
(9, 4, 'indah@gmai.com', 'Kukatakan', 819283, '', 3, 0, '2022-04-12', '2022-04-12 07:47:08', '2022-04-12 05:47:08'),
(10, 1, 'admin@min.plus', 'admin plus', 8976765667, '', 2, 1, '2022-04-12', '2022-04-12 12:58:25', '2022-04-12 11:19:17'),
(11, 5, 'yasu@dah.lah', 'Bersedih', 868829790, '', 3, 0, '2022-04-12', '2022-04-12 07:52:27', '2022-04-12 11:19:27'),
(12, 6, 'teste@r.ow', 'tester', 86734599, '', 3, 0, '2022-04-12', '2022-04-12 07:59:20', '2022-04-12 11:19:34'),
(13, 2, 'akulah@sang.prabu', 'Sang Prabu', 85689098978, '', 2, 0, '2022-04-12', '2022-04-12 13:21:01', '2022-04-12 11:21:01'),
(14, 1, 'dewi@mail.com', 'dewi satria', 8967283478, '', 2, 1, '2022-04-17', '2022-05-05 18:00:53', '2022-05-05 16:00:53'),
(15, 2, 'contoh@mail.com', 'Contoh', 893434545, '', 2, 1, '2022-04-17', '2022-04-17 11:17:33', '2022-04-17 09:17:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'ptsp123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_tinggal` varchar(128) NOT NULL,
  `nik` int(11) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `akun_bank` varchar(128) NOT NULL,
  `telepon` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `agama` text NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `ibk` varchar(128) NOT NULL,
  `status_kawin` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `perkara` varchar(256) NOT NULL,
  `ktp` varchar(256) NOT NULL,
  `kk` varchar(256) NOT NULL,
  `surat_nikah` varchar(256) NOT NULL,
  `skbi` varchar(256) NOT NULL,
  `akta` varchar(256) NOT NULL,
  `sktm` varchar(256) NOT NULL,
  `don_pen` varchar(256) NOT NULL,
  `ijazah` varchar(256) NOT NULL,
  `skl` varchar(256) NOT NULL,
  `permohonan` varchar(256) NOT NULL,
  `permohonan_bermaterai` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id`, `nama`, `tanggal_lahir`, `tempat_tinggal`, `nik`, `bank`, `no_rek`, `akun_bank`, `telepon`, `email`, `alamat`, `jenis_kelamin`, `agama`, `pekerjaan`, `ibk`, `status_kawin`, `pendidikan`, `perkara`, `ktp`, `kk`, `surat_nikah`, `skbi`, `akta`, `sktm`, `don_pen`, `ijazah`, `skl`, `permohonan`, `permohonan_bermaterai`) VALUES
(3, 'Riski Maulana ', '2022-04-21', 'Asembagus', 2147483647, 'BCA', 2147483647, 'afafaf', 2147483647, 'hilmanuary09@gmail.com', 'sdadadsd', 'laki-laki', 'Islam', 'adsadas', 'tidak', 'Kawin', 'tidak sekolah', 'Permohonan perbaikan nama', 'Kurikulum_MBKM_OBE_PRODI_TI86.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI87.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI89.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI84.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI89.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI85.pdf', '', 'TranskripNilai24.pdf', 'TranskripNilai24.pdf'),
(19, 'Muhammad Adif ', '2022-05-17', 'situbondoo', 2147483647, 'BCA', 3243, 'adsad', 143, 'hilmanuari@gmail.com', 'adas', 'laki-laki', 'Islam', 'as', 'tidak', 'Kawin', 'tidak sekolah', 'Permohonan perbaikan nama', 'Kurikulum_MBKM_OBE_PRODI_TI66.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI67.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI69.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI64.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI69.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI65.pdf', '', '', ''),
(20, 'Ahmad', '2022-05-10', 'm', 979797979, 'BCA', 9, 'adsaads', 2147483647, 'hilmanuary09@gmail.com', 'sfsfsfsfsf', 'laki-laki', 'Islam', 'k', 'tidak', 'Kawin', 'tidak sekolah', 'Permohonan perbaikan nama', 'Kurikulum_MBKM_OBE_PRODI_TI72.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI73.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI75.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI70.pdf', 'Kurikulum_MBKM_OBE_PRODI_TI75.pdf', '', 'Kurikulum_MBKM_OBE_PRODI_TI71.pdf', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(165) NOT NULL,
  `email` varchar(165) NOT NULL,
  `username` varchar(165) NOT NULL,
  `password` varchar(265) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Online','Offline','Sedang Melayani') NOT NULL,
  `level` enum('cs perdata','cs pidana','cs umum','cs hukum','cs posbakum','admin') NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status`, `level`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Yanuar', 'ahmadyanuar@mail.com', 'ahmadyanuar', '31f07fe51e3cec18a08f290784addb24', '2000-01-01', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Offline', 'admin', '1648875361766.svg', '2022-03-27 13:53:29', '2022-05-12 16:43:40'),
(2, 'Andre Satria Pamungkas', 'suherman@mail.com', 'pamungkas', '631e173de3ed06fd50e8f439a7c6f2cf', '2022-03-30', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Offline', 'cs pidana', '1650168458339.png', '2022-03-30 03:46:24', '2022-04-29 19:44:22'),
(3, 'Gita Novita Cahyani S.H', 'riska@mail.com', 'gitanovita', '07976947cf0746fb1822b188677c7754', '2022-03-01', 'wanita', 'Jl. Dewi Sartika No. 69 Kec. SumberBaru, Jember', 'Offline', 'cs perdata', '1650168369407.png', '2022-03-30 03:51:45', '2022-04-17 04:06:09'),
(5, 'Diah Safitri S.H.I', 'diah@mail.com', 'diahsafitri', '836a307cb627b9e67b03817b8fa69a61', '1993-11-03', 'wanita', 'Jl. Merak, Sukorambi, Jember ', 'Online', 'cs hukum', '1650168598208.png', '2022-04-17 06:09:58', '2022-04-17 04:13:20'),
(6, 'Kurniawati Wahyuningsih', 'kurniawati@mail.com', 'kurniawati', '4d77685c0c363389b1735b5b356d5561', '2022-04-17', 'wanita', 'Jl. Moch Seruji, Jember', 'Offline', 'cs umum', '1650168775204.png', '2022-04-17 06:12:55', '2022-04-17 04:13:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



