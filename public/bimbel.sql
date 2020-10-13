-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 12:17 PM
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
(13, 1, 8, NULL, 'HADIR', '2020-08-29 16:39:29', NULL, NULL),
(14, 1, 12, NULL, 'HADIR', '2020-09-06 15:57:39', NULL, NULL),
(15, 1, 8, NULL, 'HADIR', '2020-09-14 16:19:18', NULL, NULL),
(16, 1, 8, NULL, 'HADIR', '2020-10-07 13:40:58', NULL, NULL),
(17, 1, 8, NULL, 'HADIR', '2020-10-09 13:37:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `tgl_absen` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_user`, `name`, `kelas`, `tgl_absen`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 10, 'Mia', '12', '2020-09-04', 'Sakit', NULL, NULL),
(5, 13, 'Salma Alvira', '11', '2020-09-15', 'Hadir', NULL, NULL);

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
(3, 'BTN', 'Mia', '09822222', NULL, NULL),
(4, 'BNI', 'Salma Alvira', '074999222', NULL, NULL),
(5, 'BNI', 'Aluna Andromeda', '09822222', NULL, NULL),
(6, 'BCA', 'Kharisma Tri Atmanjani', '076565633', NULL, NULL),
(7, 'BTN', 'Fitri Wulandari', '09822222', NULL, NULL),
(8, 'BTN', 'Sulistya Cahcatika', '0297836756', NULL, NULL),
(9, 'BCA', 'Adam Rivandi', '023948964', NULL, NULL),
(10, 'BCA', 'Alhaf Bagus Bachtiar', '2844670387', NULL, NULL),
(11, 'BCA', 'Daffa Rafid Arikah', '9087564436', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `nama_evaluasi` varchar(100) DEFAULT NULL,
  `skor` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `id_user`, `name`, `kelas`, `nama_evaluasi`, `skor`, `created_at`, `updated_at`) VALUES
(4, 10, 'Mia', '12', 'https://www.w3schools.com/icons/tryit.asp?icon=far_fa-file-alt&unicon=f15c', 90, NULL, NULL),
(5, 13, 'Salma Alvira', '11', 'https://dianagung.com/belajar-css-background-image/', 75, NULL, NULL),
(6, 10, 'Mia', '12', 'https://meet.google.com/xxs-hpwu-juk', 0, NULL, NULL);

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
  `id` int(20) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_transfer` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting for review',
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeries`
--

INSERT INTO `galeries` (`id`, `id_user`, `name`, `kelas`, `nama_bank`, `no_rekening`, `tgl_pembayaran`, `jml_transfer`, `status`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(26, 22, 'Kharisma Tri Atmanjani', '9', 'BCA', '076565633', '2020-09-01', 100000, 'approved', '1601302329_CONTOH.jpeg', 'Pendaftaran Kharisma', '2020-09-28 07:12:14', '2020-09-28 07:12:14'),
(27, 23, 'Fitri Wulandari', '9', 'BTN', '09822222', '2020-09-02', 100000, 'waiting for review', '1601302725_CONTOH.jpeg', 'Pendaftaran Fitri Wulandari', '2020-09-28 07:18:47', '2020-09-28 07:18:47'),
(28, 24, 'Sulistya Cahcatika', '7', 'BTN', '0297836756', '2020-09-02', 100000, 'waiting for review', '1601302975_CONTOH.jpeg', 'Pendaftaran Sulis', '2020-09-28 07:22:59', '2020-09-28 07:22:59'),
(29, 25, 'Adam Rivandi', '9', 'BCA', '023948964', '2020-09-07', 100000, 'approved', '1601303104_CONTOH.jpeg', 'Pendaftaran Adam', '2020-09-28 07:25:06', '2020-09-28 07:25:06'),
(30, 26, 'Alhaf Bagus Bachtiar', '9', 'BCA', '2844670387', '2020-09-02', 100000, 'waiting for review', '1601303352_CONTOH.jpeg', 'Pendaftaran Alhaf', '2020-09-28 07:29:15', '2020-09-28 07:29:15'),
(31, 27, 'Daffa Rafid Arikah', '9', 'BCA', '9087564436', '2020-09-02', 100000, 'waiting for review', '1601303542_CONTOH.jpeg', 'Pendaftaran Daffa', '2020-09-28 07:32:24', '2020-09-28 07:32:24'),
(32, 28, 'M. Haekal', '7', 'BCA', '34567997589', '2020-09-04', 100000, 'waiting for review', '1601303658_CONTOH.jpeg', 'Pendafraean M. Haekal', '2020-09-28 07:34:19', '2020-09-28 07:34:19'),
(33, 29, 'Mulyanti', '11', 'BTN', '02937467533', '2020-09-07', 100000, 'waiting for review', '1601304720_CONTOH.jpeg', 'Pendaftaran Mulyanti', '2020-09-28 07:52:03', '2020-09-28 07:52:03'),
(34, 30, 'Siti Suhaebah', '10', 'BNI', '2635661993', '2020-09-04', 100000, 'waiting for review', '1601304928_CONTOH.jpeg', 'Pendaftaran Suhaebah', '2020-09-28 07:55:31', '2020-09-28 07:55:31'),
(35, 31, 'Brian Dwi Saputra', '12', 'BCA', '534262736', '2020-09-08', 100000, 'waiting for review', '1601305051_CONTOH.jpeg', 'Pendaftaran Brian', '2020-09-28 07:57:34', '2020-09-28 07:57:34'),
(36, 32, 'Akifah Nayla', '6', 'BCA', '3546667721', '2020-09-02', 100000, 'approved', '1601305194_CONTOH.jpeg', 'Pendaftaran Akifah Nayla', '2020-09-28 08:00:31', '2020-09-28 08:00:31'),
(37, 33, 'Alfi Ismi Soleha', '7', 'BTN', '37653445454', '2020-09-09', 100000, 'waiting for review', '1601305634_CONTOH.jpeg', 'Pendaftaran Alfi', '2020-09-28 08:07:15', '2020-09-28 08:07:15'),
(38, 34, 'Andita Maura Sabilla', '4', 'BTN', '377636536', '2020-10-05', 100000, 'waiting for review', '1601562242_CONTOH.jpeg', 'Pendaftaran Andita', '2020-10-01 07:24:06', '2020-10-01 07:24:06'),
(39, 35, 'Livia Aurelia E', '4', 'BCA', '02908397', '2020-10-02', 100000, 'waiting for review', '1601562496_CONTOH.jpeg', 'pendaftaran livia', '2020-10-01 07:28:19', '2020-10-01 07:28:19'),
(40, 36, 'Selvia Indriyani', '6', 'BCA', '9837367535', '2020-10-05', 100000, 'waiting for review', '1601562667_CONTOH.jpeg', 'spp selvia', '2020-10-01 07:31:10', '2020-10-01 07:31:10');

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
(1, NULL, '10', 'Rabu', '09:00:00', '10:00:00', 10, NULL, NULL),
(11, NULL, '9', 'Kamis', '13:00:00', '15:00:00', 8, NULL, NULL),
(13, NULL, '7', 'Sabtu', '11:30:00', '13:30:00', 12, '2020-09-15 07:55:09', '2020-09-15 07:55:09'),
(15, NULL, '4', 'Senin-Jum\'at', '06:30:00', '08:00:00', 15, '2020-09-28 06:39:39', '2020-09-28 06:39:39'),
(17, NULL, '6', 'Senin-Jum\'at', '08:00:00', '09:30:00', 15, '2020-09-28 06:42:27', '2020-09-28 06:42:27'),
(18, NULL, '6', 'Senin-Jum\'at', '14:30:00', '16:00:00', 25, '2020-09-28 06:43:44', '2020-09-28 06:43:44'),
(20, NULL, '8', 'Senin-Rabu-Jum\'at', '17:30:00', '19:00:00', 15, '2020-09-28 06:46:57', '2020-09-28 06:46:57'),
(21, NULL, '4', 'Senin-Rabu', '14:30:00', '16:00:00', 15, '2020-09-28 06:49:42', '2020-09-28 06:49:42'),
(22, NULL, '7', 'Senin-Rabu-Jum\'at', '16:00:00', '17:30:00', 20, '2020-09-28 06:50:33', '2020-09-28 06:50:33'),
(23, NULL, '9', 'Senin-Jum\'at', '17:30:00', '19:00:00', 20, '2020-09-28 06:51:13', '2020-09-28 06:51:13'),
(25, NULL, '7', 'Selasa-Kamis-Sabtu', '16:00:00', '17:30:00', 20, '2020-09-28 07:00:58', '2020-09-28 07:00:58'),
(26, NULL, '10', 'Senin-Rabu-Jum\'at', '19:00:00', '20:30:00', 20, '2020-09-28 07:02:33', '2020-09-28 07:02:33'),
(27, NULL, '11', 'Selasa-Kamis-Sabtu', '19:00:00', '20:30:00', 20, '2020-09-28 07:03:36', '2020-09-28 07:03:36'),
(28, NULL, '12', 'Senin-Kamis', '17:30:00', '19:30:00', 25, '2020-09-28 07:04:43', '2020-09-28 07:04:43');

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
  `kelas` varchar(100) DEFAULT NULL,
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
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_users`, `name`, `email`, `id_evaluasi`, `id_jadwal`, `kelas`, `jenkel`, `status`, `created_at`, `updated_at`) VALUES
(8, 10, 'Mia', 'mia.umairoh@petaniweb.com', NULL, 1, '12', 'P', 'Aktif', '2020-08-20 08:47:06', '2020-08-20 08:47:06'),
(11, 13, 'Salma Alvira', 'bellsmiaa@gmail.com', NULL, NULL, '11', 'P', 'Aktif', '2020-08-23 05:35:24', '2020-08-23 05:35:24'),
(12, 16, 'Aluna Andromeda', 'aluna@gmail.com', NULL, 11, '9', 'P', 'Aktif', '2020-09-06 08:56:37', '2020-09-06 08:56:37'),
(16, 21, 'ayumi', 'ayumi@gmail.com', NULL, 13, '7', 'P', 'Aktif', '2020-09-26 08:50:15', '2020-09-26 08:50:15'),
(17, 22, 'Kharisma Tri Atmanjani', 'kharisma@gmail.com', NULL, 23, '9', 'P', 'Aktif', '2020-09-28 07:12:13', '2020-09-28 07:12:13'),
(18, 23, 'Fitri Wulandari', 'fitriwulan@gmail.com', NULL, 20, '9', 'P', 'Aktif', '2020-09-28 07:18:47', '2020-09-28 07:18:47'),
(19, 24, 'Sulistya Cahcatika', 'sulistya@gmail.com', NULL, 22, '7', 'P', 'Aktif', '2020-09-28 07:22:59', '2020-09-28 07:22:59'),
(20, 25, 'Adam Rivandi', 'adam@gmail.com', NULL, 23, '9', 'L', 'Aktif', '2020-09-28 07:25:06', '2020-09-28 07:25:06'),
(21, 26, 'Alhaf Bagus Bachtiar', 'alhaf@gmail.com', NULL, 23, '9', 'L', 'Aktif', '2020-09-28 07:29:14', '2020-09-28 07:29:14'),
(22, 27, 'Daffa Rafid Arikah', 'daffa@gmail.com', NULL, 23, '9', 'L', 'Aktif', '2020-09-28 07:32:24', '2020-09-28 07:32:24'),
(23, 28, 'M. Haekal', 'mhaekal@gmail.com', NULL, 22, '7', 'L', 'Aktif', '2020-09-28 07:34:19', '2020-09-28 07:34:19'),
(24, 29, 'Mulyanti', 'mulyanti@gmail.com', NULL, 27, '11', 'P', 'Aktif', '2020-09-28 07:52:03', '2020-09-28 07:52:03'),
(25, 30, 'Siti Suhaebah', 'suhaebah@gmail.com', NULL, 26, '10', 'P', 'Aktif', '2020-09-28 07:55:31', '2020-09-28 07:55:31'),
(26, 31, 'Brian Dwi Saputra', 'briandwi@gmail.com', NULL, 28, '12', 'L', 'Aktif', '2020-09-28 07:57:34', '2020-09-28 07:57:34'),
(27, 32, 'Akifah Nayla', 'akifah@gmail.com', NULL, 18, '6', 'P', 'Aktif', '2020-09-28 08:00:31', '2020-09-28 08:00:31'),
(28, 33, 'Alfi Ismi Soleha', 'alfi@gmail.com', NULL, 25, '7', 'P', 'Aktif', '2020-09-28 08:07:15', '2020-09-28 08:07:15'),
(29, 34, 'Andita Maura Sabilla', 'andita@gmail.com', NULL, 15, '4', 'P', 'Aktif', '2020-10-01 07:24:06', '2020-10-01 07:24:06'),
(30, 35, 'Livia Aurelia E', 'livia@gmail.com', NULL, 21, '4', 'P', 'Aktif', '2020-10-01 07:28:19', '2020-10-01 07:28:19'),
(31, 36, 'Selvia Indriyani', 'selvia@gmail.com', NULL, 17, '6', 'P', 'Aktif', '2020-10-01 07:31:10', '2020-10-01 07:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` timestamp NULL DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, 'Mia', NULL, 'mia.umairoh@petaniweb.com', '$2y$10$IWx5Qqr4dgu70gBwTegmAOdqGmfkEGHjmpl.xCMOJQbi324BiiMeO', 2, NULL, 'lVIhK4R8KF9Kr4MuDQlzYTnmxKYp0xHFq3HhW0f4z63Wl9D39DqWQtOfwPKJ', '2020-08-20 08:47:06', '2020-08-20 08:47:06'),
(13, 'Salma Alvira', NULL, 'bellsmiaa@gmail.com', '$2y$10$muxPpgd4z43X8eIknxKm/u0DBKqvaL8rjL/xRxLYec6ma1UcSw78u', 2, NULL, NULL, '2020-08-23 05:35:23', '2020-08-23 05:35:23'),
(14, 'admin', NULL, 'admin@admin.com', '$2y$10$IWx5Qqr4dgu70gBwTegmAOdqGmfkEGHjmpl.xCMOJQbi324BiiMeO', 1, NULL, 'GVQlUIDpk8UF93UvsmF0WllpKWeyijYvBygJftJEsRdiAqs4MblQ7RfQD23y', NULL, NULL),
(16, 'Aluna Andromeda', NULL, 'aluna@gmail.com', '$2y$10$jT/kDc8r6sJ7ZU6Bu1HgO.V5r7L1fzlt/t4Mt2WAJ2r7hN.wpaGdK', 2, 'Aktif', NULL, '2020-09-06 08:56:37', '2020-09-06 08:56:37'),
(21, 'ayumi', NULL, 'ayumi@gmail.com', '$2y$10$Guvlg7QZzH0gPJPRmt/1yecEfYSZWmgZUlB8MOyNvX4Nxz.GVGCb.', 2, NULL, NULL, '2020-09-26 08:50:15', '2020-09-26 08:50:15'),
(22, 'Kharisma Tri Atmanjani', NULL, 'kharisma@gmail.com', '$2y$10$sD0ghEMvtm.TqeRooN3ZCu5jWqxJM.vHOHdWe4rGP8VTBIt1kI4MO', 2, NULL, NULL, '2020-09-28 07:12:13', '2020-09-28 07:12:13'),
(23, 'Fitri Wulandari', NULL, 'fitriwulan@gmail.com', '$2y$10$.MKqgx7MD2qU1OuMtKRD4O2VbNWPqHG2gP4G9./KgoO9MhaFCaBrW', 2, NULL, NULL, '2020-09-28 07:18:47', '2020-09-28 07:18:47'),
(24, 'Sulistya Cahcatika', NULL, 'sulistya@gmail.com', '$2y$10$7BYT/7K/B4354EwWJR83S.gBihd3pK8pX3815n8k.yGj40d9peG.i', 2, NULL, NULL, '2020-09-28 07:22:59', '2020-09-28 07:22:59'),
(25, 'Adam Rivandi', NULL, 'adam@gmail.com', '$2y$10$B6cayf4LOrthD14Q3HGaeO3nZShM54xlX5eUt2/nBEKK08vm.01/O', 2, NULL, NULL, '2020-09-28 07:25:06', '2020-09-28 07:25:06'),
(26, 'Alhaf Bagus Bachtiar', NULL, 'alhaf@gmail.com', '$2y$10$9yikaMeiiS3fzhbtnDDrRevz8oedPP2EC1A5N8lJ80I4Dm5xFmMCm', 2, NULL, NULL, '2020-09-28 07:29:14', '2020-09-28 07:29:14'),
(27, 'Daffa Rafid Arikah', NULL, 'daffa@gmail.com', '$2y$10$KhN9xlxUuJ4rkehYTLaXb.Yy5jjMtluvroIjIP41SOKdh87/nH37a', 2, NULL, NULL, '2020-09-28 07:32:24', '2020-09-28 07:32:24'),
(28, 'M. Haekal', NULL, 'mhaekal@gmail.com', '$2y$10$5Wxpu6njDUqEMkVKJJYt7ea9fhQbfjUlQ.whcLg0ctyMBTN2U2V5W', 2, NULL, NULL, '2020-09-28 07:34:19', '2020-09-28 07:34:19'),
(29, 'Mulyanti', NULL, 'mulyanti@gmail.com', '$2y$10$0rOOjIbQVcmOl.kQNWcV5.3oGmp1lzZLhzvg6D1apFQJ7yEwavobG', 2, NULL, NULL, '2020-09-28 07:52:03', '2020-09-28 07:52:03'),
(30, 'Siti Suhaebah', NULL, 'suhaebah@gmail.com', '$2y$10$ZG8ORCbBEwCSwhIiG9Vo0ehj2H/eXXCq3Txb8j8Odm9bniwlt2zd2', 2, NULL, NULL, '2020-09-28 07:55:31', '2020-09-28 07:55:31'),
(31, 'Brian Dwi Saputra', NULL, 'briandwi@gmail.com', '$2y$10$bZ2TzE.RgIhVvRtgUGAl8.F5Ek83ltJEmI0GRErfgJF87CYsLG/ky', 2, NULL, NULL, '2020-09-28 07:57:33', '2020-09-28 07:57:33'),
(32, 'Akifah Nayla', NULL, 'akifah@gmail.com', '$2y$10$Hhgh7oNs1jUYRGIsLm0AOufUvJsiZcv8vCckwfChSWCOy9p/l/S.i', 2, NULL, NULL, '2020-09-28 08:00:31', '2020-09-28 08:00:31'),
(33, 'Alfi Ismi Soleha', NULL, 'alfi@gmail.com', '$2y$10$C7Au2/gauBHm4kUtoCEC4.rfDDTsMAMMNB8YBiyqIeltH7zw8YACm', 2, NULL, NULL, '2020-09-28 08:07:15', '2020-09-28 08:07:15'),
(34, 'Andita Maura Sabilla', NULL, 'andita@gmail.com', '$2y$10$3IC1CPvjvVqor1xlNmCLFO/vKdRDEdLc3kmwFx41TqW3o66xK2Q/S', 2, 'Aktif', NULL, '2020-10-01 07:24:06', '2020-10-01 07:24:06'),
(35, 'Livia Aurelia E', NULL, 'livia@gmail.com', '$2y$10$usEWDrEjTqI4JyjN2.TTMeCipSuc7kwu1yRn564vb8FtTZFukvI8W', 2, NULL, NULL, '2020-10-01 07:28:19', '2020-10-01 07:28:19'),
(36, 'Selvia Indriyani', NULL, 'selvia@gmail.com', '$2y$10$Lw6MZM58FfyJlB53QLfXc./WzROo86/CQEadvO1tz1IKL90k5j73u', 2, NULL, NULL, '2020-10-01 07:31:10', '2020-10-01 07:31:10');

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
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_fk` (`id_user`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hari_jadwal`
--
ALTER TABLE `hari_jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
