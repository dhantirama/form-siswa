-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 09:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan3_kompre`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(11) NOT NULL,
  `gelombang` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `gelombang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1', 0, '2024-11-11 04:54:03', '2024-11-11 06:27:59'),
(2, 'Gelombang 2', 0, '2024-11-11 06:27:52', '2024-11-11 06:27:52'),
(5, 'Gelombang 3', 0, '2024-11-11 06:33:32', '2024-11-11 06:33:32'),
(13, 'Gelombang 5', 0, '2024-11-12 07:48:42', '2024-11-12 07:57:22'),
(14, 'Gelombang 6', 1, '2024-11-12 08:00:58', '2024-11-12 08:12:33'),
(15, 'Gelombang 7', 1, '2024-11-12 08:03:42', '2024-11-12 08:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Operator Komputer', '2024-11-11 06:39:43', '2024-11-11 06:40:24'),
(2, 'Bahasa Inggris', '2024-11-11 06:40:31', '2024-11-11 06:40:31'),
(3, 'Desain Grafis', '2024-11-11 06:40:37', '2024-11-11 06:40:37'),
(4, 'Tata Boga', '2024-11-11 06:40:44', '2024-11-11 06:40:44'),
(5, 'Tata Busana', '2024-11-11 06:40:50', '2024-11-11 06:40:50'),
(6, 'Tata Graha', '2024-11-11 06:41:00', '2024-11-11 06:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-11-11 01:59:11', '2024-11-12 01:47:25'),
(4, 'Master', '2024-11-12 02:05:47', '2024-11-12 02:05:47'),
(5, 'PIC', '2024-11-12 02:05:51', '2024-11-12 02:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `kartu_keluarga` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(25) DEFAULT NULL,
  `nama_sekolah` varchar(25) DEFAULT NULL,
  `kejuruan` varchar(25) DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `aktivitas` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_jurusan`, `id_gelombang`, `nama_lengkap`, `nik`, `kartu_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `nama_sekolah`, `kejuruan`, `no_hp`, `email`, `aktivitas`, `status`, `created_at`, `updated_at`) VALUES
(29, 3, 1, 'Dhanti', 'Doe', '', '', '', '', '', '', 'biologi', '', 'john.doe@example.com', '', 2, '2024-11-12 03:50:23', '2024-11-12 06:33:52'),
(30, 4, 1, 'Dhanti', 'Doe', '', '', '', '', '', '', 'kala', '', 'john.doe@example.com', '', 0, '2024-11-12 03:58:11', '2024-11-12 06:31:28'),
(31, 3, 1, 'Gelo', 'Doe', '', '', '', '', '', '', 'ayam', '', 'gelo@gmail.com', '', 0, '2024-11-12 04:02:22', '2024-11-12 06:31:32'),
(32, 1, 1, 'Ayam', 'Doe', '', '', '', '', '', '', '', '', 'john.doe@example.com', '', 2, '2024-11-12 06:27:37', '2024-11-12 06:44:19'),
(33, 3, 1, 'Kangkung', 'Doe', '', '', '', '', '', '', '', '', 'john.doe@example.com', '', 2, '2024-11-12 06:28:36', '2024-11-12 06:44:07'),
(34, 5, 1, 'Pecel', 'Doe', '', '', '', '', '', '', '', '', 'john.doe@example.com', '', 2, '2024-11-12 06:30:00', '2024-11-12 06:43:37'),
(35, 2, 1, 'Ikan', 'Doe', '', '', '', '', '', '', '', '', 'john.doe@example.com', '', 2, '2024-11-12 06:56:40', '2024-11-12 06:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin@gmail.com', '2024-11-11 01:59:47', '2024-11-12 04:33:45'),
(2, 4, 'User', 'user@gmail.com', 'user@gmail.com', '2024-11-12 02:06:21', '2024-11-12 04:33:35'),
(3, 5, 'PIC', 'pic@gmail.com', 'pic@gmail.com', '2024-11-12 02:07:29', '2024-11-12 02:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
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
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;