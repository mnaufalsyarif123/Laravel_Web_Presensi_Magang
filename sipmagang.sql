-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 03:23 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipmagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `user_uuid` char(36) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_check_in` time DEFAULT NULL,
  `foto_bukti_check_in` varchar(255) DEFAULT NULL,
  `waktu_check_out` time DEFAULT NULL,
  `keterangan_harian` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim_nisn` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `foto_ktm` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `surat_diterima_magang` varchar(255) NOT NULL,
  `asal_sekolah_universitas` varchar(255) NOT NULL,
  `jurusan_prodi` varchar(255) NOT NULL,
  `kelas_semester` varchar(255) NOT NULL,
  `tanggal_mulai_magang` date NOT NULL,
  `tanggal_berakhir_magang` date NOT NULL,
  `satker` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status_magang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2024_11_12_012022_create_presensi_table', 1),
(3, '2024_11_12_012122_create_roles_table', 1),
(4, '2024_11_12_012508_create_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `user_uuid` char(36) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_check_in` time DEFAULT NULL,
  `foto_bukti_check_in` longtext DEFAULT NULL,
  `waktu_check_out` time DEFAULT NULL,
  `keterangan_harian` text DEFAULT NULL,
  `status` varchar(264) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`user_uuid`, `tanggal`, `waktu_check_in`, `foto_bukti_check_in`, `waktu_check_out`, `keterangan_harian`, `status`, `created_at`, `updated_at`) VALUES
('123e4567-e89b-12d3-a456-426614174000', '2024-12-23', '01:09:59', 'path/to/photo.jpg', NULL, 'Deskripsi aktivitas harian', 'Check In', '2024-12-22 18:09:59', '2024-12-22 18:09:59'),
('0e49b105-b67f-4b7e-912a-e3e9b39d4507', '2024-12-23', '01:13:04', 'path/to/photo.jpg', NULL, 'Deskripsi aktivitas harian', 'Check In', '2024-12-22 18:13:04', '2024-12-22 18:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `uuid` char(36) NOT NULL,
  `name_role` varchar(255) NOT NULL,
  `status_role` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim_nisn` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `foto_ktm` varchar(255) DEFAULT NULL,
  `surat_pengantar` varchar(255) DEFAULT NULL,
  `surat_diterima_magang` varchar(255) DEFAULT NULL,
  `asal_sekolah_universitas` varchar(255) NOT NULL,
  `jurusan_prodi` varchar(255) NOT NULL,
  `kelas_semester` varchar(255) DEFAULT NULL,
  `tanggal_mulai_magang` date NOT NULL,
  `tanggal_berakhir_magang` date NOT NULL,
  `satker` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status_magang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD KEY `activity_log_user_uuid_foreign` (`user_uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`) ON DELETE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
