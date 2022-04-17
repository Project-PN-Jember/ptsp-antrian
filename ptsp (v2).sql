-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 11:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `antrian`
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
-- Dumping data for table `antrian`
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
(14, 1, 'dewi@mail.com', 'dewi satria', 8967283478, '', 2, 0, '2022-04-17', '2022-04-17 06:28:01', '2022-04-17 04:28:01'),
(15, 2, 'contoh@mail.com', 'Contoh', 893434545, '', 2, 1, '2022-04-17', '2022-04-17 11:17:33', '2022-04-17 09:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status`, `level`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Yanuar', 'ahmadyanuar@mail.com', 'ahmadyanuar', '31f07fe51e3cec18a08f290784addb24', '2000-01-01', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Offline', 'admin', '1648875361766.svg', '2022-03-27 13:53:29', '2022-04-12 13:19:15'),
(2, 'Andre Satria Pamungkas', 'suherman@mail.com', 'pamungkas', '631e173de3ed06fd50e8f439a7c6f2cf', '2022-03-30', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Offline', 'cs pidana', '1650168458339.png', '2022-03-30 03:46:24', '2022-04-17 09:23:31'),
(3, 'Gita Novita Cahyani S.H', 'riska@mail.com', 'gitanovita', '07976947cf0746fb1822b188677c7754', '2022-03-01', 'wanita', 'Jl. Dewi Sartika No. 69 Kec. SumberBaru, Jember', 'Offline', 'cs perdata', '1650168369407.png', '2022-03-30 03:51:45', '2022-04-17 04:06:09'),
(5, 'Diah Safitri S.H.I', 'diah@mail.com', 'diahsafitri', '836a307cb627b9e67b03817b8fa69a61', '1993-11-03', 'wanita', 'Jl. Merak, Sukorambi, Jember ', 'Online', 'cs hukum', '1650168598208.png', '2022-04-17 06:09:58', '2022-04-17 04:13:20'),
(6, 'Kurniawati Wahyuningsih', 'kurniawati@mail.com', 'kurniawati', '4d77685c0c363389b1735b5b356d5561', '2022-04-17', 'wanita', 'Jl. Moch Seruji, Jember', 'Offline', 'cs umum', '1650168775204.png', '2022-04-17 06:12:55', '2022-04-17 04:13:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
