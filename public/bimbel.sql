-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 04:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(10) NOT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `id_siswa` int(10) UNSIGNED DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `waktu_absen` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `id_jadwal`, `id_siswa`, `id_user`, `status`, `waktu_absen`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, 'HADIR', '2020-08-20 09:50:49', NULL, NULL),
(2, 1, 8, NULL, 'HADIR', '2020-08-20 09:52:53', NULL, NULL),
(3, 1, 8, NULL, 'HADIR', '2020-08-20 09:52:56', NULL, NULL),
(4, 1, 8, NULL, 'HADIR', '2020-08-20 16:58:26', NULL, NULL),
(5, 1, 8, NULL, 'HADIR', '2020-08-20 16:58:29', NULL, NULL),
(6, 1, 8, NULL, 'HADIR', '2020-08-23 12:27:13', NULL, NULL),
(7, 1, 8, NULL, 'HADIR', '2020-08-23 12:27:23', NULL, NULL),
(8, 1, 8, NULL, 'HADIR', '2020-08-23 12:27:28', NULL, NULL),
(9, 1, 8, NULL, 'HADIR', '2020-08-23 12:27:30', NULL, NULL),
(10, 1, 8, NULL, 'HADIR', '2020-08-23 12:27:35', NULL, NULL),
(11, 1, 8, NULL, 'HADIR', '2020-08-23 12:34:50', NULL, NULL),
(12, 1, 8, NULL, 'HADIR', '2020-08-24 14:03:57', NULL, NULL),
(13, 1, 8, NULL, 'HADIR', '2020-08-29 16:39:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nama_lengkap` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `nama_bank` varchar(20) DEFAULT NULL,
  `nama_akun` varchar(25) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`, `nama_akun`, `no_rekening`, `created_at`, `updated_at`) VALUES
(2, 'BCA', 'Salma Alvira', '08767520', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nama_evaluasi` varchar(100) DEFAULT NULL,
  `skor` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `id_user`, `name`, `kelas`, `nama_evaluasi`, `skor`, `created_at`, `updated_at`) VALUES
(4, 10, 'Mia', '12', 'https://www.w3schools.com/icons/tryit.asp?icon=far_fa-file-alt&unicon=f15c', 0, NULL, NULL),
(5, 13, 'Salma Alvira', '12', 'https://dianagung.com/belajar-css-background-image/', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE `galeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_transfer` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting for review',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeries`
--

INSERT INTO `galeries` (`id`, `id_user`, `name`, `kelas`, `nama_bank`, `no_rekening`, `tgl_pembayaran`, `jml_transfer`, `status`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(18, 10, 'Mia', '12', 'BTN', '09822222', '2020-08-03', 900000, 'approved', '1598890360_7. menu siswa.png', 'spp', '2020-08-31 09:12:40', '2020-08-31 09:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `hari_jadwal`
--

CREATE TABLE `hari_jadwal` (
  `id` int(10) NOT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_akhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_jadwal`
--

INSERT INTO `hari_jadwal` (`id`, `id_jadwal`, `hari`, `waktu_mulai`, `waktu_akhir`) VALUES
(1, 1, 'senin', '09:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_akhir` time DEFAULT NULL,
  `max_siswa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_user`, `nama_kelas`, `hari`, `waktu_mulai`, `waktu_akhir`, `max_siswa`, `created_at`, `updated_at`) VALUES
(1, NULL, '10', 'Rabu', '09:00:00', '10:00:00', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_08_12_142442_create_galeries_table', 3),
(5, '2020_08_18_152019_create_registers_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `tgl_evaluasi` date DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `skor` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `name`, `kelas`, `tgl_evaluasi`, `jenkel`, `skor`, `created_at`, `updated_at`) VALUES
(2, 'Salma Alvira', '11', '2020-08-03', 'P', 85, NULL, NULL),
(3, 'Mia', '12', '2020-08-04', 'P', 90, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) NOT NULL,
  `id_siswa` int(10) UNSIGNED DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `nama_akun` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(10) DEFAULT NULL,
  `jml_transfer` varchar(30) DEFAULT NULL,
  `no_rekening` varchar(100) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` date NOT NULL,
  `no_telp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_evaluasi` int(10) UNSIGNED DEFAULT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `nilai_evaluasi` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_users`, `name`, `email`, `id_evaluasi`, `id_jadwal`, `kelas`, `jenkel`, `nilai_evaluasi`, `status`, `created_at`, `updated_at`) VALUES
(8, 10, 'Mia', 'mia.umairoh@petaniweb.com', NULL, 1, '12', 'P', NULL, 'Aktif', '2020-08-20 08:47:06', '2020-08-20 08:47:06'),
(11, 13, 'Salma Alvira', 'bellsmiaa@gmail.com', NULL, NULL, '11', 'P', NULL, 'Aktif', '2020-08-23 05:35:24', '2020-08-23 05:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(2) DEFAULT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_verification`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Mia', NULL, 'mia.umairoh@petaniweb.com', '$2y$10$IWx5Qqr4dgu70gBwTegmAOdqGmfkEGHjmpl.xCMOJQbi324BiiMeO', 2, NULL, 'Ojmgsqe7oikIdreZOoPRcT6MDU37tPdgVf3znR5bQc9svZKPaxYQwv9pOqPx', '2020-08-20 08:47:06', '2020-08-20 08:47:06'),
(13, 'Salma Alvira', NULL, 'bellsmiaa@gmail.com', '$2y$10$muxPpgd4z43X8eIknxKm/u0DBKqvaL8rjL/xRxLYec6ma1UcSw78u', 2, NULL, NULL, '2020-08-23 05:35:23', '2020-08-23 05:35:23'),
(14, 'admin', NULL, 'admin@admin.com', '$2y$10$IWx5Qqr4dgu70gBwTegmAOdqGmfkEGHjmpl.xCMOJQbi324BiiMeO', 1, NULL, 'Kc6TY3MBtCVN1cnLmUlNXvGWGCkrlBoAA14jAIR4M9M9dS8LLWDEML3KJ9KU', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_fk` (`id_jadwal`),
  ADD KEY `absen_fk_1` (`id_siswa`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasi_fk` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari_jadwal`
--
ALTER TABLE `hari_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hari_jadwal_fk` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_fk` (`id_bank`),
  ADD KEY `pembayaran_fk_1` (`id_siswa`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users_idx` (`id_users`),
  ADD KEY `siswa_fk_1` (`id_jadwal`),
  ADD KEY `siswa_fk_2` (`id_evaluasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hari_jadwal`
--
ALTER TABLE `hari_jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_fk` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `absen_fk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD CONSTRAINT `evaluasi_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `hari_jadwal`
--
ALTER TABLE `hari_jadwal`
  ADD CONSTRAINT `hari_jadwal_fk` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_fk` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `pembayaran_fk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_fk` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `siswa_fk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `siswa_fk_2` FOREIGN KEY (`id_evaluasi`) REFERENCES `evaluasi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
