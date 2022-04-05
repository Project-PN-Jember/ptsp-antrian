-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 07:54 AM
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
(1, 1, 'bejo@mail.oyi', 'Bejo Bin Salam', 89515330249, '', 1, 0, '2022-04-01', '2022-04-01 11:10:13', '2022-04-04 09:10:41'),
(2, 1, 'php@go.id', 'Php In', 89515330248, '', 3, 1, '2022-04-04', '2022-04-04 15:10:40', '2022-04-04 13:10:40'),
(3, 2, 'antrian@an.an', 'My Antrian', 89515330253, '', 3, 0, '2022-04-04', '2022-04-04 08:06:28', '2022-04-04 09:10:35'),
(4, 3, 'salmanan@mail.com', 'Salamanan', 89515330253, '', 3, 1, '2022-04-04', '2022-04-04 15:10:36', '2022-04-04 13:10:36'),
(5, 1, 'prepare432@gmail.com', 'prepare channel', 89515330252, '', 2, 0, '2022-04-04', '2022-04-04 10:05:59', '2022-04-04 09:10:20');

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
(1, 'Ahmad Yanuar', 'ahmadyanuar@mail.com', 'ahmadyanuar', 'ahmadyanuar', '2000-01-01', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Online', 'cs perdata', '1648875361766.svg', '2022-03-27 13:53:29', '2022-04-02 04:56:01'),
(2, 'Ahmad Suherman', 'suherman@mail.com', 'suherman', 'suherman', '2022-03-30', 'pria', 'Jl. Dewi Sartika No. 27 Kec. SumberBaru, Jember', 'Offline', 'cs hukum', '1648875207360.svg', '2022-03-30 03:46:24', '2022-04-04 14:19:42'),
(3, 'Riska Aqila', 'riska@mail.com', 'riskaaqila', 'riskaaqila', '2022-03-01', 'wanita', 'Jl. Dewi Sartika No. 69 Kec. SumberBaru, Jember', 'Online', 'cs perdata', '1649137279486.svg', '2022-03-30 03:51:45', '2022-04-05 05:41:19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
