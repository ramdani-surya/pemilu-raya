-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2021 at 01:35 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xwprckyy_pemiluraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_number` int(11) NOT NULL,
  `chairman_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vice_chairman_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `election_id`, `candidate_number`, `chairman_name`, `vice_chairman_name`, `image`, `program`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(28, 31, 1, 'Ariswara', 'Santi', '1626681326_Cetak Foto 3x4.jpg', '<p>Di kolom ini anda dapat menambahkan program kandidat.</p>', NULL, NULL, '2021-07-19 06:42:32', '2021-07-19 07:55:26'),
(29, 31, 2, 'Cahya Saepudin', 'Muhamad Eri', '1626681361_20210403_122942.jpg', '<p>Di kolom ini anda dapat menambahkan program kandidat.</p>', NULL, NULL, '2021-07-19 06:42:50', '2021-07-19 07:56:01'),
(30, 31, 3, 'Jenal Arifin', 'Fauzan Ismail', '1626681403_Image.jpg', '<p>Di kolom ini anda dapat menambahkan program kandidat.</p>', NULL, NULL, '2021-07-19 06:48:02', '2021-07-19 07:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_voters` int(11) DEFAULT NULL,
  `voted_voters` int(11) DEFAULT NULL,
  `unvoted_voters` int(11) DEFAULT NULL,
  `total_candidates` int(11) DEFAULT NULL,
  `election_winner` int(11) DEFAULT NULL COMMENT 'isi dengan candidate_number',
  `chairman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vice_chairman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairman_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vice_chairman_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `running_date` date DEFAULT NULL,
  `running` tinyint(1) NOT NULL DEFAULT 0,
  `archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`, `period`, `total_voters`, `voted_voters`, `unvoted_voters`, `total_candidates`, `election_winner`, `chairman`, `vice_chairman`, `chairman_photo`, `vice_chairman_photo`, `running_date`, `running`, `archived`, `created_at`, `updated_at`) VALUES
(31, 'Pemilu Raya 2021', '2021 - 2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-24', 0, 0, '2021-06-27 07:16:41', '2021-07-19 08:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_23_031025_create_elections_table', 1),
(5, '2021_03_23_145447_create_candidates_table', 1),
(6, '2021_03_23_150326_create_voters_table', 1),
(7, '2021_03_23_151726_create_votings_table', 1),
(8, '2021_04_12_033838_add_running_column_into_elections_table', 2),
(10, '2021_04_14_224931_add_name_into_elections', 3),
(11, '2021_04_15_090718_create_jobs_table', 4),
(12, '2021_04_15_092454_add_email_into_voters_table', 5),
(13, '2021_04_19_070328_add_running_date_into_election_table', 6),
(14, '2021_04_19_220921_update_candidates', 7),
(15, '2021_04_27_011911_add_program_column', 8);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','panitia') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panitia',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin', 'bpm_mhs@stmik-sumedang.ac.id', NULL, '$2y$10$FSPRfs5P4vxR42VuFzM/welluDDr06HZJ3l2H01NFj5nEqY9uVG2S', 'admin', NULL, '2021-04-16 23:12:22', '2021-04-27 05:26:38'),
(4, 'tahungoding', 'tahungoding', 'tahungoding@gmail.com', NULL, '$2y$10$PC3cOk33xdQADprChqwx5OQdpvliVSRfyNyL/s2djHTj9v3jz.oUe', 'admin', NULL, NULL, NULL),
(5, 'Komisi Pemilihan Umum', 'kpu2021', 'kpu@2021.com', NULL, '$2y$10$U/LCG0fnlE2rDJY1rQRr0O1ff2JJ.JYvNMiyU/WWmMqfZqLdJHs.G', 'admin', NULL, '2021-07-19 08:12:44', '2021-07-19 08:12:44'),
(6, 'panitia', 'panitia', 'panitia@gmail.com', NULL, '$2y$10$rzdbXtsv3GhUXVsVb.0GquFRSpnNuQDj5ITiwjvos8mLAn7/Hp0zO', 'panitia', NULL, '2021-07-19 08:22:24', '2021-07-19 08:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voted` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `user_id`, `election_id`, `nim`, `name`, `token`, `voted`, `email`, `email_sent`, `created_at`, `updated_at`) VALUES
(5050, 4, 31, 'a1.1800001', 'Didan Agung Sergia', '7BXrsA', 0, 'a1.1800001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5051, 4, 31, 'a1.1800005', 'Luul Jannah A', 'UJ7e3n', 0, 'a1.1800005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5052, 4, 31, 'a1.1800006', 'Riska Aprianti', 'RxCi5a', 0, 'a1.1800006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5053, 4, 31, 'a1.1800007', 'Rizki Andriana Ismail', 'Iu73VL', 0, 'a1.1800007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5054, 4, 31, 'a1.1800010', 'Yoga Yoga', 'gMN1WX', 0, 'a1.1800010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5055, 4, 31, 'a1.1900001', 'Alisa Nur Saadah', 'CoIUb8', 0, 'a1.1900001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5056, 4, 31, 'a1.1900002', 'DEA SAEFUL SIDIK', '4UvRmD', 0, 'a1.1900002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5057, 4, 31, 'a1.1900003', 'Elsa Bintang Rahayu', 'wHCThU', 0, 'a1.1900003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5058, 4, 31, 'a1.1900004', 'Grisnabila Anggraeni', 'uzQoL0', 0, 'a1.1900004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5059, 4, 31, 'a1.1900005', 'Imam Rachmat Faturahaman', 'qrFbUi', 0, 'a1.1900005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5060, 4, 31, 'a1.1900006', 'Muhamad Rifki Rahadian', 'H2jcyH', 0, 'a1.1900006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5061, 4, 31, 'a1.1900008', 'Nurhidayat Ramadan', 'ipFpYH', 0, 'a1.1900008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5062, 4, 31, 'a1.1900009', 'Ressa Febrianti', 'FVDMAp', 0, 'a1.1900009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5063, 4, 31, 'a1.1900011', 'Salsabila Isla Kartika', 'Y655iz', 0, 'a1.1900011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5064, 4, 31, 'a1.1900013', 'Yoga Kurniawan', '7R2VXO', 0, 'a1.1900013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5065, 4, 31, 'a1.2000001', 'Daffa Refa Ismanto MI ANG 20', 'XK1Fbo', 0, 'a1.2000001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5066, 4, 31, 'a1.2000002', 'Imam Wahyuningrat MI ANG 20', 'GMe6NM', 0, 'a1.2000002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5067, 4, 31, 'a1.2000006', 'Daffa Rizki Aulia Putra Harahap MI ANG 20 A', 'M0cSpX', 0, 'a1.2000006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5068, 4, 31, 'a12000003@', 'Nita Lismaya MI ANG 20', '3FVbYC', 0, 'a12000003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5069, 4, 31, 'a12000004@', 'Muhamad Bakti Solihin MI ANG 20', '7PQ1TF', 0, 'a12000004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5070, 4, 31, 'a2.1300091', 'Eko Haryadi', 'iLVMrv', 0, 'a2.1300091@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5071, 4, 31, 'a2.1500028', 'Dea Alif', '7T4IMm', 0, 'a2.1500028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5072, 4, 31, 'a2.1500108', 'Diky Cahyadi', '19jsO3', 0, 'a2.1500108@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5073, 4, 31, 'a2.1600004', 'Aditya Ahmad Dimyati', 'VqhxVy', 0, 'a2.1600004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5074, 4, 31, 'a2.1600013', 'Ande wardatul maola', 'reV9j0', 0, 'a2.1600013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5075, 4, 31, 'a2.1600030', 'Budi Hamdan', 'kqKTvv', 0, 'a2.1600030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5076, 4, 31, 'a2.1600036', 'Dede Fahmi', 'RRZXF3', 0, 'a2.1600036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5077, 4, 31, 'a2.1600071', 'Gani Supriyadi', 'v6etWY', 0, 'a2.1600071@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5078, 4, 31, 'a2.1600083', 'Ihsan Septian', '5X3Oqy', 0, 'a2.1600083@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5079, 4, 31, 'a2.1600099', 'M.Diska Maulana', 'fsFZ16', 0, 'a2.1600099@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5080, 4, 31, 'a2.1600100', 'Mochamad tegar Pamungkas', 'BuclRN', 0, 'a2.1600100@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5081, 4, 31, 'a2.1600101', 'irwan ardiansyah', 'vZ9xRG', 0, 'a2.1600101@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5082, 4, 31, 'a2.1600122', 'Rega Rukmana', 'KsFKOB', 0, 'a2.1600122@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5083, 4, 31, 'a2.1600132', 'Slamet Kamal Riyadi', 'GlLMu6', 0, 'a2.1600132@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5084, 4, 31, 'a2.1600149', 'Zunaedi Zunaedi', 'nhvjCz', 0, 'a2.1600149@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5085, 4, 31, 'a2.1700002', 'Adah Rosyadah', 'qP3OOh', 0, 'a2.1700002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5086, 4, 31, 'a2.1700005', 'Aditia Nugraha', '6Lxxot', 0, 'a2.1700005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5087, 4, 31, 'a2.1700007', 'Aggi Shandy Supriadi', 'TW8B5L', 0, 'a2.1700007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5088, 4, 31, 'a2.1700008', 'Agung Muharom', 'ldl4az', 0, 'a2.1700008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5089, 4, 31, 'a2.1700009', 'Ajeng Sindi Elfarina', 'Q8yTgu', 0, 'a2.1700009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5090, 4, 31, 'a2.1700010', 'Akbar Nur Syahrudin', 'ntU3sV', 0, 'a2.1700010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5091, 4, 31, 'a2.1700011', 'Ali Permana Nugraha', '6EIDUC', 0, 'a2.1700011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5092, 4, 31, 'a2.1700014', 'KKP- 02 Alip Lasmana', 'J7iZAH', 0, 'a2.1700014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5093, 4, 31, 'a2.1700015', 'Amar Ma\'ruf', 'MdAMe7', 0, 'a2.1700015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5094, 4, 31, 'a2.1700018', 'Ardian Aprilianto', '6ToJdD', 0, 'a2.1700018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5095, 4, 31, 'a2.1700019', 'Ari Nur Ismail', 'aXIa3d', 0, 'a2.1700019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5096, 4, 31, 'a2.1700020', 'Arif Faizal Rahman Faizal Rahman', 'RQ2pal', 0, 'a2.1700020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5097, 4, 31, 'a2.1700021', 'Arkan Yassar Mustari', 'zS0mku', 0, 'a2.1700021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5098, 4, 31, 'a2.1700022', 'Asep Budiman', 'xWrTGX', 0, 'a2.1700022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5099, 4, 31, 'a2.1700024', 'Bagja Sumarlin', 'S8kNCY', 0, 'a2.1700024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5100, 4, 31, 'a2.1700026', 'Candra Cumarya', 'bxbSyb', 0, 'a2.1700026@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5101, 4, 31, 'a2.1700028', 'Chaerul Fikri', 'zBobMG', 0, 'a2.1700028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5102, 4, 31, 'a2.1700029', 'Dede Fuji Abdul', 'qMh634', 0, 'a2.1700029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5103, 4, 31, 'a2.1700032', 'Deden Nuryadin Deden Nuryadin', 'glytXJ', 0, 'a2.1700032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5104, 4, 31, 'a2.1700033', 'Deden Sukarno', 'WyTrSz', 0, 'a2.1700033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5105, 4, 31, 'a2.1700034', 'KKP-23_Deni Herdiansyah', 'OQNr00', 0, 'a2.1700034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5106, 4, 31, 'a2.1700035', 'Dhery Anggara Setiawan', 'cJfNWi', 0, 'a2.1700035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5107, 4, 31, 'a2.1700036', 'Dicky Alamsyah', 'mDQLqh', 0, 'a2.1700036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5108, 4, 31, 'a2.1700037', 'Edi Herdiawan', 'hhPIAp', 0, 'a2.1700037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5109, 4, 31, 'a2.1700039', 'Fahmi Muhammad Anshory', 'nMBWTE', 0, 'a2.1700039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5110, 4, 31, 'a2.1700040', 'Fajri Ahmad Syawaldi Syawaldi', 'mIlgaO', 0, 'a2.1700040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5111, 4, 31, 'a2.1700041', 'Fanni Ramadhani Dewi', 'QFZDwe', 0, 'a2.1700041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5112, 4, 31, 'a2.1700042', 'Fany Nuranazmi Sulistiowati', 'iulcCz', 0, 'a2.1700042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5113, 4, 31, 'a2.1700043', 'FARHAN NURSIDIK', 'Om3uXq', 0, 'a2.1700043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5114, 4, 31, 'a2.1700044', 'Farid AdhityaP', 'bDUwU5', 0, 'a2.1700044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5115, 4, 31, 'a2.1700045', 'Fikri Sumarsono', 'ylNqof', 0, 'a2.1700045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5116, 4, 31, 'a2.1700046', 'Firda Rihadatun Nafisyah', 'mSbrE9', 0, 'a2.1700046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5117, 4, 31, 'a2.1700047', 'D Firdaus', 'LBR9xp', 0, 'a2.1700047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5118, 4, 31, 'a2.1700048', 'Hafid Prastisyo', 'MW3HeE', 0, 'a2.1700048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5119, 4, 31, 'a2.1700049', 'Hafidh Fauzan Mulany Mulany', 'hIghxp', 0, 'a2.1700049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5120, 4, 31, 'a2.1700050', 'Hanifah Nurbaeti', 'qjiHsy', 0, 'a2.1700050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5121, 4, 31, 'a2.1700051', 'KKP-23_Hendy Purwansyah', 'W1N6XC', 0, 'a2.1700051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5122, 4, 31, 'a2.1700052', 'Hijaz Fazlurrahman', '27MWWb', 0, 'a2.1700052@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5123, 4, 31, 'a2.1700054', 'Ihsan Saeful Alam', 'uNB2Ry', 0, 'a2.1700054@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5124, 4, 31, 'a2.1700056', 'Ilyasa Firdaus', 'B92XDa', 0, 'a2.1700056@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5125, 4, 31, 'a2.1700058', 'Indrianti Retno Palupi', 'PHzu4A', 0, 'a2.1700058@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5126, 4, 31, 'a2.1700059', 'Irfan Ridhorahman', 'vWB6T0', 0, 'a2.1700059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5127, 4, 31, 'a2.1700060', 'Jujun Mulyana', 'rZ7xuW', 0, 'a2.1700060@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5128, 4, 31, 'a2.1700061', 'Kholis Ma\'ruful Fikri', '3MDdwr', 0, 'a2.1700061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5129, 4, 31, 'a2.1700062', 'Annisa Alfimunaya', 'xwtn4z', 0, 'a2.1700062@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5130, 4, 31, 'a2.1700063', 'Lugina Galih', 'RN3CMk', 0, 'a2.1700063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5131, 4, 31, 'a2.1700065', 'Ma\'mur Mulyawan', 'nlI1zU', 0, 'a2.1700065@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5132, 4, 31, 'a2.1700066', 'Mochamad Aditya Putra', 'bu5OVu', 0, 'a2.1700066@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5133, 4, 31, 'a2.1700067', 'Malwan Fauzan', '78N4Xe', 0, 'a2.1700067@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5134, 4, 31, 'a2.1700068', 'Ihsan Budiman', '4iQ2YW', 0, 'a2.1700068@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5135, 4, 31, 'a2.1700069', 'Deden Juliandi Juliandi', 'g2MGht', 0, 'a2.1700069@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5136, 4, 31, 'a2.1700070', 'Mohammad Basry Gaffar', 'MgbHkH', 0, 'a2.1700070@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5137, 4, 31, 'a2.1700071', 'Muhamad Irfan Setiawan', 'aDVmRo', 0, 'a2.1700071@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5138, 4, 31, 'a2.1700073', 'Ho Chse Chung Calvin', 'OEFBad', 0, 'a2.1700073@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5139, 4, 31, 'a2.1700074', 'Muhammad Fikri Fajari', '3tzbgO', 0, 'a2.1700074@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5140, 4, 31, 'a2.1700075', 'Muhammad Ilham R', 'cTrAsx', 0, 'a2.1700075@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5141, 4, 31, 'a2.1700076', 'Muhammad Nu\'man Izudin', 'Gcdm8C', 0, 'a2.1700076@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5142, 4, 31, 'a2.1700077', 'Muhammad Zulfikar Habibullahissalam', 'TD8qfP', 0, 'a2.1700077@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5143, 4, 31, 'a2.1700080', 'Nopi Hardianti', 'w6qdhc', 0, 'a2.1700080@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5144, 4, 31, 'a2.1700081', 'Nunu Indra Nugraha', '6dPnSi', 0, 'a2.1700081@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5145, 4, 31, 'a2.1700082', 'Nuryana N', 'vqkIgs', 0, 'a2.1700082@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5146, 4, 31, 'a2.1700083', 'Shofiya Nurfadilah', 'bZ8zxm', 0, 'a2.1700083@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5147, 4, 31, 'a2.1700084', 'A2.1700084 Opan Dilaga', 'H7Gj84', 0, 'a2.1700084@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5148, 4, 31, 'a2.1700085', 'Permana Kodarusman', 'lifNNs', 0, 'a2.1700085@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5149, 4, 31, 'a2.1700086', 'Pujastian Deden Nurazis Syaban', 'OabO2y', 0, 'a2.1700086@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5150, 4, 31, 'a2.1700088', 'Radi Aditya', 'VyUy48', 0, 'a2.1700088@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:16', '2021-07-19 06:38:16'),
(5151, 4, 31, 'a2.1700089', 'Ramadhina Andina Pratama', '1A19yd', 0, 'a2.1700089@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5152, 4, 31, 'a2.1700091', 'Rd Rani Robi\'ah', 'I5fS8J', 0, 'a2.1700091@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5153, 4, 31, 'a2.1700095', 'Alan Febriana', 'IVMnDr', 0, 'a2.1700095@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5154, 4, 31, 'a2.1700096', 'Kkp-06 Reza ansara', '2oqBkc', 0, 'a2.1700096@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5155, 4, 31, 'a2.1700097', 'Ridwan Ahmad Ginanjar', 'S9ZWR9', 0, 'a2.1700097@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5156, 4, 31, 'a2.1700098', 'Rifaldi M Putra', 'P4Z90S', 0, 'a2.1700098@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5157, 4, 31, 'a2.1700099', 'Riffa Nurfatiah', '0OPFkP', 0, 'a2.1700099@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5158, 4, 31, 'a2.1700101', 'KKP-07 Roby Febrian', 'MI0txZ', 0, 'a2.1700101@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5159, 4, 31, 'a2.1700102', 'Roni Yusup', 'zUCtpw', 0, 'a2.1700102@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5160, 4, 31, 'a2.1700103', 'ROSITA WATI', 'e8baNZ', 0, 'a2.1700103@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5161, 4, 31, 'a2.1700104', 'Rostika Noviyanti', '18JecD', 0, 'a2.1700104@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5162, 4, 31, 'a2.1700105', 'Rudi Setiawan', 'kNOMMD', 0, 'a2.1700105@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5163, 4, 31, 'a2.1700106', 'Ryan Juniardi azhar', 'MM2NUX', 0, 'a2.1700106@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5164, 4, 31, 'a2.1700107', 'Ryan Samsudin', 'EEYsOi', 0, 'a2.1700107@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5165, 4, 31, 'a2.1700108', 'Said Agiel Darmawan', 'UeIPrQ', 0, 'a2.1700108@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5166, 4, 31, 'a2.1700109', 'Deri Rinaldi', '7Qomfz', 0, 'a2.1700109@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5167, 4, 31, 'a2.1700110', 'Sindi Nuraeni', '9ipdBt', 0, 'a2.1700110@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5168, 4, 31, 'a2.1700111', 'Sintia Dewi Puspitasari', '9MepEX', 0, 'a2.1700111@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5169, 4, 31, 'a2.1700113', 'Sony Prayoga', 'WqdlsC', 0, 'a2.1700113@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5170, 4, 31, 'a2.1700114', 'Sri Nuraeni', 'O4IJjM', 0, 'a2.1700114@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5171, 4, 31, 'a2.1700115', 'Sri Rohayati', 'PutOGc', 0, 'a2.1700115@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5172, 4, 31, 'a2.1700116', 'Sudrajat -', 'XSFaBp', 0, 'a2.1700116@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5173, 4, 31, 'a2.1700117', 'Tantan Koswara', '1tNRtG', 0, 'a2.1700117@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5174, 4, 31, 'a2.1700118', 'Tasya Sabilla', 'DLD04E', 0, 'a2.1700118@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5175, 4, 31, 'a2.1700119', 'Tedi Kurniawan', '0AO10r', 0, 'a2.1700119@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5176, 4, 31, 'a2.1700120', 'Teguh Gumelar Nugraha', 'iLf6UF', 0, 'a2.1700120@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5177, 4, 31, 'a2.1700122', 'Tono Nugraha', '2ZOr7K', 0, 'a2.1700122@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5178, 4, 31, 'a2.1700123', 'Ubad Bahrudin', 'ZreW4E', 0, 'a2.1700123@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5179, 4, 31, 'a2.1700127', 'Willy Aditya Agung Widodo', 'ZnUitN', 0, 'a2.1700127@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5180, 4, 31, 'a2.1700128', 'Wisnu Hidayat', 'AV9eNt', 0, 'a2.1700128@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5181, 4, 31, 'a2.1700129', 'Wisnu Pranadita', 'RLFBaF', 0, 'a2.1700129@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5182, 4, 31, 'a2.1700130', 'Yosi Rian Hernika', 'DeYErA', 0, 'a2.1700130@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5183, 4, 31, 'a2.1700131', 'Yudhistira Y', 'VRsmQp', 0, 'a2.1700131@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5184, 4, 31, 'a2.1700132', 'Yuli Apriani', 'ZtRCzg', 0, 'a2.1700132@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5185, 4, 31, 'a2.1700133', 'Yulia Wulandari', 'MmPBGF', 0, 'a2.1700133@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5186, 4, 31, 'a2.1700135', 'Yusup Apandi', 'CK3Ksq', 0, 'a2.1700135@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5187, 4, 31, 'a2.1700136', 'Muhamad Resa', 'pQg6Lc', 0, 'a2.1700136@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5188, 4, 31, 'a2.1700137', 'Aditya Fitra Romadona', 'iwG0tV', 0, 'a2.1700137@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5189, 4, 31, 'a2.1700139', 'Dede Eli Permana', 'Tvl6B4', 0, 'a2.1700139@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5190, 4, 31, 'a2.1700140', 'Tari Widya Hastuti', '8Seufy', 0, 'a2.1700140@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5191, 4, 31, 'a2.1700143', 'Shendy Fiqi nurazhar', 'uQlFIH', 0, 'a2.1700143@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5192, 4, 31, 'a2.1700144', 'Herfy Hidayat', 'QF8i6P', 0, 'a2.1700144@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5193, 4, 31, 'a2.1700145', 'Rian Riansah', '6sCjzO', 0, 'a2.1700145@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5194, 4, 31, 'a2.1800003', 'ABDUL YUSUP', 'i0g8Pr', 0, 'a2.1800003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5195, 4, 31, 'a2.1800005', 'Adinda Noer Khoeruddin', 'VenB9M', 0, 'a2.1800005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5196, 4, 31, 'a2.1800007', 'Afif Alli Ma\'Ruf', '2YiQVO', 0, 'a2.1800007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5197, 4, 31, 'a2.1800008', 'Agung Sopian', 'NRgncQ', 0, 'a2.1800008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5198, 4, 31, 'a2.1800009', 'Agus Maulana Mubaroq', 'zAmNxB', 0, 'a2.1800009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5199, 4, 31, 'a2.1800010', 'Ahmad Khotib Nawawi', 'DJFi8L', 0, 'a2.1800010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5200, 4, 31, 'a2.1800011', 'Ahmad Mauludin', 'wtSXiE', 0, 'a2.1800011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5201, 4, 31, 'a2.1800012', 'Aji Abdillah Gymnastiar', 'FrkwoP', 0, 'a2.1800012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5202, 4, 31, 'a2.1800013', 'Alif Ramadhan Arya', 'DyTlv1', 0, 'a2.1800013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5203, 4, 31, 'a2.1800014', 'Alif Yudis Rusdiana', 'H9iCDq', 0, 'a2.1800014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5204, 4, 31, 'a2.1800015', 'Amelia Septiarini', 'Ndkqf1', 0, 'a2.1800015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5205, 4, 31, 'a2.1800016', 'Andini Putri Maharani', '5ilwcr', 0, 'a2.1800016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5206, 4, 31, 'a2.1800018', 'Andre Surya Praja', '0xaGLy', 0, 'a2.1800018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5207, 4, 31, 'a2.1800019', 'Andreas Aprillian', '68gXga', 0, 'a2.1800019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5208, 4, 31, 'a2.1800021', 'Anissa Hakim Mulyada', 'mWnxqT', 0, 'a2.1800021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5209, 4, 31, 'a2.1800022', 'Apip Febriansyah', '6BDD6q', 0, 'a2.1800022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5210, 4, 31, 'a2.1800023', 'Arif Darmawan', 'AiYJvx', 0, 'a2.1800023@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5211, 4, 31, 'a2.1800025', 'Azis Nuromdona Maelandi', 'XtuiPw', 0, 'a2.1800025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5212, 4, 31, 'a2.1800026', 'Aziz Nur Falah', '26DS20', 0, 'a2.1800026@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5213, 4, 31, 'a2.1800028', 'Azmi Fauzan Maulana', 'ogj1Go', 0, 'a2.1800028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5214, 4, 31, 'a2.1800029', 'Bagas Pardana Ilham', 'mkdR48', 0, 'a2.1800029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5215, 4, 31, 'a2.1800030', 'Bima Maulana Saputra', 'MhYsLE', 0, 'a2.1800030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5216, 4, 31, 'a2.1800031', 'Cepi Yahya', 'Adp8Ax', 0, 'a2.1800031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5217, 4, 31, 'a2.1800032', 'Cucum Eliyanti', 'euLkJ6', 0, 'a2.1800032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5218, 4, 31, 'a2.1800033', 'Dadang Rusmana', 'G9tPbL', 0, 'a2.1800033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5219, 4, 31, 'a2.1800034', 'Danni Ramdhani Samsudin', '3qXgtJ', 0, 'a2.1800034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5220, 4, 31, 'a2.1800035', 'David Noviyanto', 'bwEZvc', 0, 'a2.1800035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5221, 4, 31, 'a2.1800036', 'Davo Al Giyana', 'GfNKmc', 0, 'a2.1800036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5222, 4, 31, 'a2.1800037', 'Desi Suciatin', 'lI6r82', 0, 'a2.1800037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5223, 4, 31, 'a2.1800038', 'Deyan Saefulloh', 'jLgz2g', 0, 'a2.1800038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5224, 4, 31, 'a2.1800039', 'Dicky Karyana', 'YeiQnh', 0, 'a2.1800039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5225, 4, 31, 'a2.1800040', 'Dicky Setiawan', 'DoI5T7', 0, 'a2.1800040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5226, 4, 31, 'a2.1800041', 'Dika Muhammad', 'FYQpk7', 0, 'a2.1800041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5227, 4, 31, 'a2.1800043', 'Edwar Anas', 'GhLgWg', 0, 'a2.1800043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5228, 4, 31, 'a2.1800045', 'Viona Saprila Valentina', 'Z4D4Ec', 0, 'a2.1800045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5229, 4, 31, 'a2.1800046', 'Fadjar Widyana Nugraha', 'VMC6iA', 0, 'a2.1800046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5230, 4, 31, 'a2.1800048', 'Fajar Andre Mulyana', 'TBwpN1', 0, 'a2.1800048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5231, 4, 31, 'a2.1800049', 'Fajar Lukman Nugraha', 'WkRVMD', 0, 'a2.1800049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5232, 4, 31, 'a2.1800050', 'Fauzi Mulyana', 'EC3PIG', 0, 'a2.1800050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5233, 4, 31, 'a2.1800051', 'Fikri Mohammad Fahrezy', 'V99er3', 0, 'a2.1800051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5234, 4, 31, 'a2.1800053', 'Galih Ramanda', 'tURHot', 0, 'a2.1800053@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5235, 4, 31, 'a2.1800055', 'Giri Erlangga Arta', 'szAOVG', 0, 'a2.1800055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5236, 4, 31, 'a2.1800057', 'Hadi Alisuwarna', 'HkFfSV', 0, 'a2.1800057@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5237, 4, 31, 'a2.1800059', 'Rifqi Faturohman Nursamsi', 'KzgCHq', 0, 'a2.1800059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5238, 4, 31, 'a2.1800061', 'Heri Perdiayansah', 'R7mqG6', 0, 'a2.1800061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5239, 4, 31, 'a2.1800063', 'Heru Esa Ramadhan', 'CEk4tT', 0, 'a2.1800063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5240, 4, 31, 'a2.1800064', 'Hilal Hamdi', 'ToVuUE', 0, 'a2.1800064@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5241, 4, 31, 'a2.1800065', 'Hilman Wahyudin', 'Q2QQkK', 0, 'a2.1800065@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5242, 4, 31, 'a2.1800066', 'Ibnu Ammar', 'Tx3KAN', 0, 'a2.1800066@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5243, 4, 31, 'a2.1800068', 'Indra Baskara Saputra', 'rWVHvz', 0, 'a2.1800068@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5244, 4, 31, 'a2.1800069', 'Iqbal Nurhayadin', 'HXSNOF', 0, 'a2.1800069@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5245, 4, 31, 'a2.1800071', 'Jajang Jamaludin', 'cjiLNq', 0, 'a2.1800071@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5246, 4, 31, 'a2.1800073', 'Jujun Supendi', 'kTEBaV', 0, 'a2.1800073@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5247, 4, 31, 'a2.1800074', 'Khalid Insan Tauhid', 'OlGXvu', 0, 'a2.1800074@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5248, 4, 31, 'a2.1800075', 'Krisman Nurslamet', 'QYbmxu', 0, 'a2.1800075@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5249, 4, 31, 'a2.1800076', 'Lucky Rohmatulloh', 'I4tNdZ', 0, 'a2.1800076@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5250, 4, 31, 'a2.1800077', 'Luthfi Izzuddin', 'dsvGrE', 0, 'a2.1800077@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5251, 4, 31, 'a2.1800079', 'Marissa Maysaroh Maysaroh', '44L6mE', 0, 'a2.1800079@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5252, 4, 31, 'a2.1800080', 'Melawati Melawati', 'qI1tOV', 0, 'a2.1800080@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5253, 4, 31, 'a2.1800081', 'Melina Wida Winingsih', 'ehaYff', 0, 'a2.1800081@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5254, 4, 31, 'a2.1800082', 'Miranti Agisna Nurfatimah', 'FUxMyO', 0, 'a2.1800082@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5255, 4, 31, 'a2.1800083', 'Muhamad Abi Fahzsa', '0roOo8', 0, 'a2.1800083@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5256, 4, 31, 'a2.1800084', 'Muhamad Azka Hifzhurohman', '70FNQV', 0, 'a2.1800084@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5257, 4, 31, 'a2.1800086', 'Muhamad Iqbal Rivaldi', 'IniRFg', 0, 'a2.1800086@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5258, 4, 31, 'a2.1800088', 'Muhamad Wildan Nur', 'UcqRgM', 0, 'a2.1800088@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5259, 4, 31, 'a2.1800089', 'Muhammad Arsyad Fathandani', '66iEsI', 0, 'a2.1800089@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5260, 4, 31, 'a2.1800090', 'Muhammad Fiqri Fardiyanto', 'N9ssG7', 0, 'a2.1800090@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5261, 4, 31, 'a2.1800093', 'Nadia Rahma Aprilian', 'FaHxhz', 0, 'a2.1800093@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5262, 4, 31, 'a2.1800094', 'Nasrul Fahrul Ziah', '61WqPr', 0, 'a2.1800094@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5263, 4, 31, 'a2.1800095', 'Natasya Savira Putri', '6ByR0E', 0, 'a2.1800095@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5264, 4, 31, 'a2.1800096', 'Naufal M T', 'OdHi9O', 0, 'a2.1800096@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5265, 4, 31, 'a2.1800097', 'Neneng Reni Ratnengsih', 'ytJ4VR', 0, 'a2.1800097@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5266, 4, 31, 'a2.1800098', 'Nida Nur Aini', 'Ra5g01', 0, 'a2.1800098@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5267, 4, 31, 'a2.1800099', 'Nurul Wulan', 'e4ItNm', 0, 'a2.1800099@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5268, 4, 31, 'a2.1800100', 'Pipit Badriah', 'gdPLNN', 0, 'a2.1800100@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5269, 4, 31, 'a2.1800101', 'Puzi Rismala', 'sf6fQh', 0, 'a2.1800101@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5270, 4, 31, 'a2.1800102', 'Rafiud Darajat', 'bFKCiD', 0, 'a2.1800102@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5271, 4, 31, 'a2.1800104', 'Raka Patyan Aulia', 'h6lIuN', 0, 'a2.1800104@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5272, 4, 31, 'a2.1800105', 'Ramdani Surya Manggala', 'slK4MA', 1, 'a2.1800105@mhs.stmik-sumedang.ac.id', 1, '2021-07-19 06:38:17', '2021-07-19 08:04:13'),
(5273, 4, 31, 'a2.1800106', 'Ramdaniel Arya Suantadiredja', 'xCtlRO', 0, 'a2.1800106@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5274, 4, 31, 'a2.1800108', 'Reza Aldiansyah', 'kc3hBr', 0, 'a2.1800108@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5275, 4, 31, 'a2.1800109', 'Rian Andika', 'HdB7GI', 0, 'a2.1800109@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5276, 4, 31, 'a2.1800111', 'Risky Amelia', 'JLJKh7', 0, 'a2.1800111@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5277, 4, 31, 'a2.1800112', 'Rismaya Siti Mukarromah', 'IQ8fPf', 0, 'a2.1800112@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5278, 4, 31, 'a2.1800113', 'Riza Suparman', 'SMw3i2', 0, 'a2.1800113@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5279, 4, 31, 'a2.1800114', 'Rizal Achmad Ramdhiana', 'Apopgn', 0, 'a2.1800114@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5280, 4, 31, 'a2.1800115', 'Rizal Fathan Fadillah', 'I9eQbo', 0, 'a2.1800115@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5281, 4, 31, 'a2.1800116', 'Rizal Zalaludin', 'X3AIhu', 0, 'a2.1800116@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5282, 4, 31, 'a2.1800117', 'Rizki Abdul Hamid', 'MKdIWb', 0, 'a2.1800117@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5283, 4, 31, 'a2.1800119', 'Salsabilla Siti Sa\'Adah', 'QdI7jA', 0, 'a2.1800119@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5284, 4, 31, 'a2.1800120', 'Shiffa Aulia Indisilvi', 'GffzJI', 0, 'a2.1800120@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5285, 4, 31, 'a2.1800121', 'Shofian Shofian', 'ZOtl5c', 0, 'a2.1800121@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5286, 4, 31, 'a2.1800122', 'Sindi Fazri Awaludin', '3qgq3k', 0, 'a2.1800122@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5287, 4, 31, 'a2.1800123', 'Sinta Manah', 'zr5vCg', 0, 'a2.1800123@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5288, 4, 31, 'a2.1800124', 'Siti Latifayudha Putri', 'YXuHzK', 0, 'a2.1800124@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5289, 4, 31, 'a2.1800125', 'Siti Nurhayati', 'bzqdFL', 0, 'a2.1800125@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5290, 4, 31, 'a2.1800126', 'Siti Wihdah Sururoh', 'UXqRwA', 0, 'a2.1800126@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5291, 4, 31, 'a2.1800127', 'Sri Rahayu', 'U1u4va', 0, 'a2.1800127@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5292, 4, 31, 'a2.1800128', 'Stansa Andricko', 'C4WBE8', 0, 'a2.1800128@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5293, 4, 31, 'a2.1800129', 'Sugih Sopian', 'Dd8vBr', 0, 'a2.1800129@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5294, 4, 31, 'a2.1800131', 'Taufik Hidayat', 'IWZomR', 0, 'a2.1800131@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5295, 4, 31, 'a2.1800133', 'Tiara Taufik Shobirin', '2mqm4d', 0, 'a2.1800133@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5296, 4, 31, 'a2.1800134', 'Turino Dela Suherman', 'C00x77', 0, 'a2.1800134@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5297, 4, 31, 'a2.1800135', 'Vergin Herlang Herlangga', 'vbPlpu', 0, 'a2.1800135@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5298, 4, 31, 'a2.1800136', 'Vetty Apriliani', 'EFD5Ma', 0, 'a2.1800136@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5299, 4, 31, 'a2.1800137', 'Widi Priansyah', 'R6eSZ2', 0, 'a2.1800137@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5300, 4, 31, 'a2.1800138', 'Wira Bhakti Kencana', 'nELfLY', 0, 'a2.1800138@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5301, 4, 31, 'a2.1800139', 'Yuliyani Yuliani', 'g4UA5w', 0, 'a2.1800139@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5302, 4, 31, 'a2.1800140', 'Yurianto Yurianto', 'Oll6kw', 0, 'a2.1800140@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5303, 4, 31, 'a2.1800141', 'Moch. Dadan Ramdani', 'EWtdPy', 0, 'a2.1800141@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5304, 4, 31, 'a2.1800142', 'Revan Fachrel Islamy', 'RgX9G8', 0, 'a2.1800142@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5305, 4, 31, 'a2.1800144', 'Ahmad Yusup Saepudin', 'nZgv1J', 0, 'a2.1800144@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5306, 4, 31, 'a2.1800145', 'Cecep Agung Herdian', '0RAiaI', 0, 'a2.1800145@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5307, 4, 31, 'a2.1800147', 'Deris Brillianisa', 'DvmUYd', 0, 'a2.1800147@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5308, 4, 31, 'a2.1800148', 'Devy Octavia', 'FVRoDG', 0, 'a2.1800148@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5309, 4, 31, 'a2.1800149', 'Encep Hendri Setiawan', 'Oc2wHb', 0, 'a2.1800149@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5310, 4, 31, 'a2.1800150', 'Endang Haris Gunawan', 'Xgp0wy', 0, 'a2.1800150@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5311, 4, 31, 'a2.1800151', 'Fitri Anggraeni', '3O7pJo', 0, 'a2.1800151@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5312, 4, 31, 'a2.1800153', 'Juliana Syifa Listiani', 'RGd80l', 0, 'a2.1800153@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5313, 4, 31, 'a2.1800154', 'Manggar Sri Sasongko Jati', 'Fvz1CL', 0, 'a2.1800154@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5314, 4, 31, 'a2.1800155', 'Muhammad Rizki Iryanto', '3nDTqe', 0, 'a2.1800155@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5315, 4, 31, 'a2.1800159', 'Vedry Ajay Ary Putra', 'fvT1Hi', 0, 'a2.1800159@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5316, 4, 31, 'a2.1800160', 'Yogi Aprilianto', 'BWBoj4', 0, 'a2.1800160@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5317, 4, 31, 'a2.1800162', 'Ichsan Mughni', 'iGF3eV', 0, 'a2.1800162@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5318, 4, 31, 'a2.1800164', 'Muhammad Rafly', '96c7S9', 0, 'a2.1800164@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5319, 4, 31, 'a2.1800166', 'Tresna Wiwitan', 'lB2qo2', 0, 'a2.1800166@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5320, 4, 31, 'a2.1810004', 'FADHLIATUL AKBAR', 'nmLXJW', 0, 'a2.1810004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5321, 4, 31, 'a2.1900001', 'Abdul Ali Komaludin', 'CJ9TBB', 0, 'a2.1900001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5322, 4, 31, 'a2.1900002', 'Abdul Jalil Maulani', '8wqDAb', 0, 'a2.1900002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5323, 4, 31, 'a2.1900003', 'Acep Ahmad Fauzi', '4cFfe4', 0, 'a2.1900003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5324, 4, 31, 'a2.1900004', 'Adit Inggar Purnama', 'oaHjls', 0, 'a2.1900004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5325, 4, 31, 'a2.1900005', 'Aditya Nugraha Triyono', 'y3bnFB', 0, 'a2.1900005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5326, 4, 31, 'a2.1900006', 'Agung Gumelar', 'XJOtEx', 0, 'a2.1900006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5327, 4, 31, 'a2.1900007', 'Agung Gunawan', '8St7Qq', 0, 'a2.1900007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5328, 4, 31, 'a2.1900010', 'Ahmad Al Faruq', 'jmgZWB', 0, 'a2.1900010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5329, 4, 31, 'a2.1900011', 'Ahmad Ependi', 'TYoEKM', 0, 'a2.1900011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5330, 4, 31, 'a2.1900012', 'Ahmad Fuad Dimyati', 'pIeqOK', 0, 'a2.1900012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5331, 4, 31, 'a2.1900015', 'Aldi Febriansyah', 'mGwDt0', 0, 'a2.1900015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5332, 4, 31, 'a2.1900016', 'Ananda Frizky Maulana', 'nRc0X1', 0, 'a2.1900016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5333, 4, 31, 'a2.1900018', 'Anggi Apriyanti Putri', 'IhXUbR', 0, 'a2.1900018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5334, 4, 31, 'a2.1900020', 'Annisa Sucianty Aulya Suganda', 'rtTlDs', 0, 'a2.1900020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5335, 4, 31, 'a2.1900021', 'Ari Alhabsyi', 'MqddsH', 0, 'a2.1900021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5336, 4, 31, 'a2.1900022', 'Arif Wiradinata', 'vnvDty', 0, 'a2.1900022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5337, 4, 31, 'a2.1900024', 'Ariswara Ariswara', 'LJprWt', 0, 'a2.1900024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5338, 4, 31, 'a2.1900025', 'Bagus Salam Nur Rahmat', '0H2upq', 0, 'a2.1900025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5339, 4, 31, 'a2.1900027', 'Bunga Diantrie Putri', 'URhpFs', 0, 'a2.1900027@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5340, 4, 31, 'a2.1900028', 'Cahya Satria Gumelar', 'PbbXSs', 0, 'a2.1900028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5341, 4, 31, 'a2.1900029', 'Cahyana Cahyana', 'LYrdRp', 0, 'a2.1900029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5342, 4, 31, 'a2.1900030', 'Chikal Tyaga', 'mOwgsA', 0, 'a2.1900030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5343, 4, 31, 'a2.1900032', 'Dadi Muhamad Muslih', 'AOkcBP', 0, 'a2.1900032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5344, 4, 31, 'a2.1900034', 'Darul Ariv Priyono', 'UnNpYB', 0, 'a2.1900034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5345, 4, 31, 'a2.1900035', 'Dani Nugraha', 'yXzDrb', 0, 'a2.1900035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5346, 4, 31, 'a2.1900036', 'Anshar A F', 'Llwiyn', 0, 'a2.1900036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5347, 4, 31, 'a2.1900037', 'Dede Novita Lestari Supriatin', 'vgS7BB', 0, 'a2.1900037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5348, 4, 31, 'a2.1900038', 'Dede Supriatna', 'qGHddE', 0, 'a2.1900038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5349, 4, 31, 'a2.1900040', 'Delia Nurholijah', 'IjQ2SS', 0, 'a2.1900040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5350, 4, 31, 'a2.1900042', 'Deni Anggara', 'qyMd1d', 0, 'a2.1900042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5351, 4, 31, 'a2.1900043', 'Deni Romansyah', 'lNH1ZY', 0, 'a2.1900043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5352, 4, 31, 'a2.1900044', 'Deni Saepulloh', 'KOD2AG', 0, 'a2.1900044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5353, 4, 31, 'a2.1900045', 'Denisa .', '1Pmmpr', 0, 'a2.1900045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5354, 4, 31, 'a2.1900046', 'Deri Febriansyah', 'qb5XlN', 0, 'a2.1900046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5355, 4, 31, 'a2.1900047', 'Devia Tiara Putri', 'bllHwN', 0, 'a2.1900047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5356, 4, 31, 'a2.1900048', 'Deyanti Herliana', 'N51SPL', 0, 'a2.1900048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5357, 4, 31, 'a2.1900051', 'Dimas Rizqi Firdaus', 'MFf5Mr', 0, 'a2.1900051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5358, 4, 31, 'a2.1900052', 'Dinda Tri Rahmasari', 'FqaPjy', 0, 'a2.1900052@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5359, 4, 31, 'a2.1900053', 'Doni Alviandi', '1IXI93', 0, 'a2.1900053@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5360, 4, 31, 'a2.1900054', 'Dzikri Ghulaam Zakiyya', '2lMQAc', 0, 'a2.1900054@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5361, 4, 31, 'a2.1900055', 'Efendi Suhanda', 'nqMYOc', 0, 'a2.1900055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5362, 4, 31, 'a2.1900057', 'Eris Ikhwanulmuslim', 'PE0Eml', 0, 'a2.1900057@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5363, 4, 31, 'a2.1900058', 'Fadhil Hafiyyan Wijaya', 'pmuKgj', 0, 'a2.1900058@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5364, 4, 31, 'a2.1900059', 'Muhammad Nandi Junaedi', 'dOOlSc', 0, 'a2.1900059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5365, 4, 31, 'a2.1900060', 'Fahmi Hidayat', 'Hr4ZL9', 0, 'a2.1900060@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5366, 4, 31, 'a2.1900061', 'Faizal Rachman', '272P2X', 0, 'a2.1900061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5367, 4, 31, 'a2.1900062', 'Fajar Bhakti Nugraha', 'BPXd1z', 0, 'a2.1900062@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5368, 4, 31, 'a2.1900063', 'Fajar Purnama', 'JjU9Pr', 0, 'a2.1900063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5369, 4, 31, 'a2.1900064', 'Farhan Ardian', 'CGV0vB', 0, 'a2.1900064@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5370, 4, 31, 'a2.1900066', 'Fathul Gorib', 'iOVkGJ', 0, 'a2.1900066@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5371, 4, 31, 'a2.1900067', 'Fauzan Ismail', 'ynUnZh', 0, 'a2.1900067@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5372, 4, 31, 'a2.1900068', 'Fauzi Firjatullah', 'x9PV5s', 0, 'a2.1900068@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5373, 4, 31, 'a2.1900069', 'Ferry Yoga Perkasa', 'cEwS48', 0, 'a2.1900069@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5374, 4, 31, 'a2.1900070', 'Galih Permana', '35lJfJ', 0, 'a2.1900070@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5375, 4, 31, 'a2.1900072', 'Gilang Erlangga Kurnia Ardi', 'UNRhRt', 0, 'a2.1900072@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5376, 4, 31, 'a2.1900073', 'Gilang Fajar Ramdhan', 'VhVOFN', 0, 'a2.1900073@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5377, 4, 31, 'a2.1900074', 'Dewanda Dewanda', 'Ch70R5', 0, 'a2.1900074@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5378, 4, 31, 'a2.1900075', 'Hafid Fadhil', 'skWKSZ', 0, 'a2.1900075@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5379, 4, 31, 'a2.1900076', 'Hanatasya Putri Lestari', '9Jryq5', 0, 'a2.1900076@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5380, 4, 31, 'a2.1900077', 'Haris Akbar Asyfa', '9Qra0g', 0, 'a2.1900077@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5381, 4, 31, 'a2.1900079', 'Heri Firmansah', 'lMAocq', 0, 'a2.1900079@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5382, 4, 31, 'a2.1900080', 'Heru Khaerul Cahyana', 'Kly0Ny', 0, 'a2.1900080@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5383, 4, 31, 'a2.1900082', 'Inar Inar', 'olGQZk', 0, 'a2.1900082@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17');
INSERT INTO `voters` (`id`, `user_id`, `election_id`, `nim`, `name`, `token`, `voted`, `email`, `email_sent`, `created_at`, `updated_at`) VALUES
(5384, 4, 31, 'a2.1900083', 'Indra Rizky Anfasa', 'jwShrY', 0, 'a2.1900083@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5385, 4, 31, 'a2.1900084', 'Indrawan Surya Ramadhan', 'pcm5Of', 0, 'a2.1900084@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5386, 4, 31, 'a2.1900085', 'Iqbal Mufariz', 'fxevRm', 0, 'a2.1900085@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5387, 4, 31, 'a2.1900086', 'Irvan Octavian Kurniawan', 'mGz4Zl', 0, 'a2.1900086@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5388, 4, 31, 'a2.1900087', 'Intan Sri Mulyati', 'N7rVso', 0, 'a2.1900087@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5389, 4, 31, 'a2.1900088', 'Ivah Aprianti', 'P31bx8', 0, 'a2.1900088@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5390, 4, 31, 'a2.1900089', 'Jaenal Arifin', 'Gk5BXx', 0, 'a2.1900089@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5391, 4, 31, 'a2.1900090', 'Jamaludin Muhamad Akbar', 'rMp0sT', 0, 'a2.1900090@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5392, 4, 31, 'a2.1900091', 'Rhadika Ramdhan Aprilrizal', 'SVNLjx', 0, 'a2.1900091@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5393, 4, 31, 'a2.1900092', 'Januar Pribadi Hakim', '3aO76S', 0, 'a2.1900092@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5394, 4, 31, 'a2.1900093', 'Jimmi Andreansa', 'HonI6B', 0, 'a2.1900093@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5395, 4, 31, 'a2.1900095', 'Krisna Loviana Sutisna', 'od5PGK', 0, 'a2.1900095@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5396, 4, 31, 'a2.1900096', 'Levira Ratu Vitaloka', 'eENRn3', 0, 'a2.1900096@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5397, 4, 31, 'a2.1900097', 'Lusi Tsulutsiah Nur Faridoh', 'U4wGxw', 0, 'a2.1900097@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5398, 4, 31, 'a2.1900098', 'Lusyana Arianti', 'jFTuLW', 0, 'a2.1900098@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5399, 4, 31, 'a2.1900099', 'Luthfi Hilman Al Farizi', 'atwspx', 0, 'a2.1900099@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5400, 4, 31, 'a2.1900101', 'M. Rizki Saepul Rohman', 'hNHWoi', 0, 'a2.1900101@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5401, 4, 31, 'a2.1900102', 'Mita Nadila', 'NRyc88', 0, 'a2.1900102@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5402, 4, 31, 'a2.1900103', 'Moch. Faisal Mutaqin', 'RBClQ4', 0, 'a2.1900103@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5403, 4, 31, 'a2.1900105', 'Mochamad Abdullah Mubarok', 'crWM7I', 0, 'a2.1900105@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5404, 4, 31, 'a2.1900106', 'Mochammad Hudda', '20tU3k', 0, 'a2.1900106@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5405, 4, 31, 'a2.1900107', 'Moh. Albi Shihabuddin', '53JHx6', 0, 'a2.1900107@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5406, 4, 31, 'a2.1900108', 'Moh. Syahrul Zen', 'n1l8b5', 0, 'a2.1900108@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5407, 4, 31, 'a2.1900109', 'Mohammad Erya Sambega', 'IlE7wV', 0, 'a2.1900109@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5408, 4, 31, 'a2.1900110', 'Muhamad Arya Habibie', 'KOOwnp', 0, 'a2.1900110@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5409, 4, 31, 'a2.1900111', 'Muhamad Dwiki Darusalam', '6SnoR4', 0, 'a2.1900111@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5410, 4, 31, 'a2.1900112', 'Muhamad Eri Rizki Hadi Abdulrohman', 'locPwZ', 0, 'a2.1900112@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5411, 4, 31, 'a2.1900113', 'Muhamad Haidzir Ismail', 'NtxJh6', 0, 'a2.1900113@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5412, 4, 31, 'a2.1900114', 'Muhamad Hilmi', '0ngYED', 0, 'a2.1900114@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5413, 4, 31, 'a2.1900115', 'Muhamad Ikhsan Kamal', '9nnE3z', 0, 'a2.1900115@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5414, 4, 31, 'a2.1900116', 'Muhamad Ridwan Asidiq', 'otBIlf', 0, 'a2.1900116@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5415, 4, 31, 'a2.1900117', 'Muhammad Andi Rahman Fadillah', 'ql8SO1', 0, 'a2.1900117@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5416, 4, 31, 'a2.1900119', 'Muhammad Iqbal Fauzi', 'w3gZ4H', 0, 'a2.1900119@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5417, 4, 31, 'a2.1900121', 'Muhammad Syarifudin', 'Ve07si', 0, 'a2.1900121@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5418, 4, 31, 'a2.1900122', 'Muqsit Gifari', 'oX0Y9N', 0, 'a2.1900122@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5419, 4, 31, 'a2.1900123', 'Murry Muryadin', '7OWJCJ', 0, 'a2.1900123@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5420, 4, 31, 'a2.1900125', 'Nandy Farhan Fahrizal', '2Zx8Ey', 0, 'a2.1900125@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5421, 4, 31, 'a2.1900128', 'Novi Nurisnaeni', 'mZwd1G', 0, 'a2.1900128@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5422, 4, 31, 'a2.1900130', 'Nurul Fallah', 'JgKwlQ', 0, 'a2.1900130@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5423, 4, 31, 'a2.1900132', 'Puji Auliana Arpiani', 'npy4Th', 0, 'a2.1900132@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5424, 4, 31, 'a2.1900134', 'Putry Nurwahyuni', '17L1bn', 0, 'a2.1900134@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5425, 4, 31, 'a2.1900135', 'Nurul Elina Yuliani', 'zu4JPD', 0, 'a2.1900135@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5426, 4, 31, 'a2.1900136', 'R. Muhammad Rifqi Febrian Hadiana', 'd6scq9', 0, 'a2.1900136@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5427, 4, 31, 'a2.1900137', 'R. Nafisa Azhar', 'SUlyND', 0, 'a2.1900137@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5428, 4, 31, 'a2.1900138', 'Radit Muharom', 'OcJnwc', 0, 'a2.1900138@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5429, 4, 31, 'a2.1900139', 'Ragil Insani Syukur', 'zmEYu4', 0, 'a2.1900139@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5430, 4, 31, 'a2.1900141', 'Rangga Meinandi', '2QITuu', 0, 'a2.1900141@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5431, 4, 31, 'a2.1900142', 'Rani Rahmawati', 'zAjQ8t', 0, 'a2.1900142@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5432, 4, 31, 'a2.1900143', 'Ratna Komala', 'k7LByJ', 0, 'a2.1900143@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5433, 4, 31, 'a2.1900145', 'Regyta Harpan', 'K9VhRi', 0, 'a2.1900145@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5434, 4, 31, 'a2.1900146', 'Reki Ramdani', '8pPIew', 0, 'a2.1900146@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5435, 4, 31, 'a2.1900147', 'Rendy Rishandi Perkasa', 'e9xbrC', 0, 'a2.1900147@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5436, 4, 31, 'a2.1900148', 'Restu Muhamad Akbar', 'DvqbkR', 0, 'a2.1900148@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5437, 4, 31, 'a2.1900149', 'Reza Alfajari', 'l08krZ', 0, 'a2.1900149@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5438, 4, 31, 'a2.1900150', 'Ridwan Taufiq Akbar', 'ffwrtH', 0, 'a2.1900150@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5439, 4, 31, 'a2.1900151', 'Rifky Iqbal Permadi', 'IcuK2K', 0, 'a2.1900151@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5440, 4, 31, 'a2.1900152', 'Riki Maulana', 'pjkSmL', 0, 'a2.1900152@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5441, 4, 31, 'a2.1900153', 'Riki Septiana', 'o4k8At', 0, 'a2.1900153@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5442, 4, 31, 'a2.1900154', 'Riky Muhamad Zein', 'qBPLTj', 0, 'a2.1900154@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5443, 4, 31, 'a2.1900155', 'Rivaldi Rahmat Maulana', 'BjrcLX', 0, 'a2.1900155@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5444, 4, 31, 'a2.1900156', 'Rizal Kharyadi', 'fPN73K', 0, 'a2.1900156@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5445, 4, 31, 'a2.1900157', 'Rizqi Ramadan', 'u2j3d3', 0, 'a2.1900157@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5446, 4, 31, 'a2.1900158', 'Roby Purba Sakty', '6vhoUf', 0, 'a2.1900158@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5447, 4, 31, 'a2.1900159', 'Roffi Nur Rohman', 'D27Zel', 0, 'a2.1900159@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5448, 4, 31, 'a2.1900160', 'Rony Yanuar Nurhidayat', 'wzV44M', 0, 'a2.1900160@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5449, 4, 31, 'a2.1900161', 'Rosi Rosita', 'YrHdYq', 0, 'a2.1900161@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5450, 4, 31, 'a2.1900163', 'Sandy Somantri', 'CPuN2e', 0, 'a2.1900163@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5451, 4, 31, 'a2.1900164', 'Sandy Zaenal Mustopa', 'qAJgC1', 0, 'a2.1900164@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5452, 4, 31, 'a2.1900165', 'Sep Yusman Maulana', 'FCrUcY', 0, 'a2.1900165@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5453, 4, 31, 'a2.1900166', 'Silvy Fuji Dianti', 'ue01qs', 0, 'a2.1900166@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5454, 4, 31, 'a2.1900167', 'Santi Santi', 'BXVOcn', 0, 'a2.1900167@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5455, 4, 31, 'a2.1900168', 'Siti Ainun Fatimah', 'M2EJTO', 0, 'a2.1900168@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5456, 4, 31, 'a2.1900169', 'Siti Reva Shofiyan', 'txwGxR', 0, 'a2.1900169@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5457, 4, 31, 'a2.1900170', 'Silvi Fauzia Adzani', 'NLk587', 0, 'a2.1900170@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5458, 4, 31, 'a2.1900171', 'Sony Solahudin Abdurachman', 'TVbYuD', 0, 'a2.1900171@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5459, 4, 31, 'a2.1900174', 'Supandi .', 'HVGbZS', 0, 'a2.1900174@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5460, 4, 31, 'a2.1900176', 'Syaeful Anwar', 'LeP0JY', 0, 'a2.1900176@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5461, 4, 31, 'a2.1900178', 'Tanti Nurharomah', 'oM7wt0', 0, 'a2.1900178@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5462, 4, 31, 'a2.1900179', 'Teddy Septian', 'nKpSIb', 0, 'a2.1900179@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5463, 4, 31, 'a2.1900180', 'Tina Sri Wulan Agustin', 'cP0XMn', 0, 'a2.1900180@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5464, 4, 31, 'a2.1900181', 'Titin Ayu Pratiwi', 'ofnR0j', 0, 'a2.1900181@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5465, 4, 31, 'a2.1900182', 'Tubagus Firmansyah Hidayat', 'NWj6n5', 0, 'a2.1900182@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5466, 4, 31, 'a2.1900183', 'Usep Umaran', 'Ctpv2p', 0, 'a2.1900183@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5467, 4, 31, 'a2.1900184', 'Vicky Nugraha', '46Gv6S', 0, 'a2.1900184@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5468, 4, 31, 'a2.1900185', 'Vildan Vinanda', 'QQjbzo', 0, 'a2.1900185@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5469, 4, 31, 'a2.1900186', 'Wildan Purwana', 'TOOoXl', 0, 'a2.1900186@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5470, 4, 31, 'a2.1900188', 'Yosef Akbar Maulana', 'tXaXyp', 0, 'a2.1900188@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5471, 4, 31, 'a2.1900189', 'Yusril Fahrul Munawar', 'E92xWo', 0, 'a2.1900189@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5472, 4, 31, 'a2.1900190', 'Zaid Dzulfiqar', 'm5mQv3', 0, 'a2.1900190@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5473, 4, 31, 'a2.1900191', 'Zalfa Nurrobby Arkhan', 'H2kS7p', 0, 'a2.1900191@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5474, 4, 31, 'a2.1900192', 'Ziyan Saffana Erhaff', '8SQCRL', 0, 'a2.1900192@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5475, 4, 31, 'a2.1900194', 'Rega Miftachudin', 'PR5hjI', 0, 'a2.1900194@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5476, 4, 31, 'a2.1900195', 'Romadhoni Romadhoni', 'cOQlVF', 0, 'a2.1900195@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5477, 4, 31, 'a2.1900196', 'Moehammad Diky Jakaria', 'b4QA5K', 0, 'a2.1900196@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5478, 4, 31, 'a2.1900197', 'Zidane Saeful Budiman', 'lTwmCv', 0, 'a2.1900197@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5479, 4, 31, 'a2.1900200', 'MUSA  AL AZIZ', '3XGa0r', 0, 'a2.1900200@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5480, 4, 31, 'a2.1910002', 'Bona Ventura Saputro', 'gYE31Z', 0, 'a2.1910002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5481, 4, 31, 'a2.1910004', 'Cep Zamzam Lutfi Firdaus', 'rqqMwi', 0, 'a2.1910004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5482, 4, 31, 'a2.1910009', 'Robby Maulana', 'DxlyVR', 0, 'a2.1910009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5483, 4, 31, 'a2.2000001', 'Adisty Rahma Rahayu TI ANG 20', 'kj7Cov', 0, 'a2.2000001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5484, 4, 31, 'a2.2000002', 'Al Farizi Barajawinata TI ANG 20 A', 'VRK3XB', 0, 'a2.2000002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5485, 4, 31, 'a2.2000003', 'Albi Fajar Ramadhan', 'mU58Bu', 0, 'a2.2000003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5486, 4, 31, 'a2.2000004', 'Alfian Ahmad Gani TI ANG 20', 'jdhWOx', 0, 'a2.2000004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5487, 4, 31, 'a2.2000005', 'Alif Saefuloh TI ANG 20', 'ikyW9q', 0, 'a2.2000005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5488, 4, 31, 'a2.2000006', 'Amelia Febiani TI ANG 20', 'eY3q7O', 0, 'a2.2000006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5489, 4, 31, 'a2.2000007', 'Ande Suganda TI ANG 20 A', 'mZTS4r', 0, 'a2.2000007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5490, 4, 31, 'a2.2000008', 'Andrian Rizky Restuyadi TI ANG 20', 'Y7Z8T8', 0, 'a2.2000008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5491, 4, 31, 'a2.2000009', 'Anggi Agustian Herlambang TI ANG 20', 'JumFbC', 0, 'a2.2000009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5492, 4, 31, 'a2.2000010', 'Ari Susanto TI ANG 20', 'NH88h1', 0, 'a2.2000010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5493, 4, 31, 'a2.2000011', 'Ariel Teza Permana TI ANG 20 A', 'vEoLEX', 0, 'a2.2000011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5494, 4, 31, 'a2.2000012', 'Aril Muhammad Mughni Fachry TI ANG 20', 'ef4uZA', 0, 'a2.2000012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5495, 4, 31, 'a2.2000013', 'Arini Fitrian Rebitasari TI ANG 20', 'hyHl0r', 0, 'a2.2000013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5496, 4, 31, 'a2.2000014', 'Asep Ramdani TI ANG 20', 'tGEFV3', 0, 'a2.2000014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5497, 4, 31, 'a2.2000015', 'Aulia Aprilliani Khaerunisa TI ANG 20', 'PdhCKg', 0, 'a2.2000015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5498, 4, 31, 'a2.2000016', 'Azril Saepudin Mubarok TI ANG 20', 'ZmqBrg', 0, 'a2.2000016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5499, 4, 31, 'a2.2000017', 'Bagas Sudam Darmana TI ANG 20 A', 'n4AUgk', 0, 'a2.2000017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5500, 4, 31, 'a2.2000018', 'Bayu Krisna Herlambang TI ANG 20', 'zFuX0p', 0, 'a2.2000018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5501, 4, 31, 'a2.2000019', 'Bayu Nuralam TI ANG 20', 'vpzrZS', 0, 'a2.2000019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5502, 4, 31, 'a2.2000020', 'Chandra Pamungkas TI ANG 20', 'v8bIdy', 0, 'a2.2000020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5503, 4, 31, 'a2.2000021', 'Muhammad Bagus Firdaus TI ANG 20 A', 'K99f8t', 0, 'a2.2000021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5504, 4, 31, 'a2.2000022', 'Dafa Arif Pratama TI ANG 20 A', 'iXDHAo', 0, 'a2.2000022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5505, 4, 31, 'a2.2000024', 'Dede Ahyaman TI ANG 20', 'QlV1QH', 0, 'a2.2000024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5506, 4, 31, 'a2.2000025', 'Aen Rynaldi Kurnia TI ANG 20', 'SA44qW', 0, 'a2.2000025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5507, 4, 31, 'a2.2000026', 'Defi Nurfaridah TI ANG 20', 'YCLKof', 0, 'a2.2000026@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5508, 4, 31, 'a2.2000027', 'Deni Rohmat TI ANG 20 A', 'kPqUjf', 0, 'a2.2000027@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5509, 4, 31, 'a2.2000028', 'Diky Ahmad Sidiq TI ANG 20', 'YZzzzV', 0, 'a2.2000028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5510, 4, 31, 'a2.2000029', 'Dila Dwi Lestari TI ANG 20', 'V1Wufg', 0, 'a2.2000029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5511, 4, 31, 'a2.2000030', 'Dyen Dwi Alvianto TI ANG 20', '7tlxR7', 0, 'a2.2000030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5512, 4, 31, 'a2.2000031', 'Dzakwan Muhammad Sidik TI ANG 20', 'gliLiN', 0, 'a2.2000031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5513, 4, 31, 'a2.2000032', 'Ega Yunita TI ANG 20', 'pOh7SB', 0, 'a2.2000032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5514, 4, 31, 'a2.2000033', 'Elen Nurhasanah TI ANG 20 A', 'td0Wpb', 0, 'a2.2000033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5515, 4, 31, 'a2.2000034', 'Erwin Syahputra Koswara TI ANG 20 A', 'C1uOw7', 0, 'a2.2000034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5516, 4, 31, 'a2.2000035', 'Fadly Komarudin TI ANG 20', 'ssxl6x', 0, 'a2.2000035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5517, 4, 31, 'a2.2000036', 'Fajar Nugraha TI ANG 20', 'lOdqpd', 0, 'a2.2000036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5518, 4, 31, 'a2.2000037', 'Farhan Fadhilah Al Fathani TI ANG 20', 'AoDsB1', 0, 'a2.2000037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5519, 4, 31, 'a2.2000038', 'Farhan Nur Kholilullah TI ANG 20 A', 'Hgursm', 0, 'a2.2000038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5520, 4, 31, 'a2.2000039', 'Fariq Fauzan Rahmat TI ANG 20', '2xR4Co', 0, 'a2.2000039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5521, 4, 31, 'a2.2000040', 'Faris Arrasid TI ANG 20', 'CWNx7R', 0, 'a2.2000040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5522, 4, 31, 'a2.2000041', 'Fauzan Farhandani TI ANG 20', 'IBjkJ8', 0, 'a2.2000041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5523, 4, 31, 'a2.2000042', 'Fauzi Bayu Hendrawan TI ANG 20 A', 'vCQRr2', 0, 'a2.2000042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5524, 4, 31, 'a2.2000043', 'Fauzi Fathurrahman TI ANG 20', 'fEfmzl', 0, 'a2.2000043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5525, 4, 31, 'a2.2000044', 'Fenita Disca Arianti TI ANG 20', 'JRjJUe', 0, 'a2.2000044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5526, 4, 31, 'a2.2000045', 'Gilang Purwadani TI ANG 20', 'uaSdsp', 0, 'a2.2000045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5527, 4, 31, 'a2.2000046', 'Gustiana Hodiz TI ANG 20', 'jO3NLK', 0, 'a2.2000046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5528, 4, 31, 'a2.2000047', 'Hilal Naufal Setiawan TI ANG 20 A', 'UwCOCs', 0, 'a2.2000047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5529, 4, 31, 'a2.2000048', 'Ihsan Abdullah TI ANG 20', '847VlR', 0, 'a2.2000048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5530, 4, 31, 'a2.2000049', 'Ikbal Malik Ramadhan TI ANG 20', 'dzCMWT', 0, 'a2.2000049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5531, 4, 31, 'a2.2000050', 'Ilham Rusliansyah TI ANG 20', 'anWWAf', 0, 'a2.2000050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5532, 4, 31, 'a2.2000051', 'Indah Dapina Nurazizah TI ANG 20', 'iSJfrE', 0, 'a2.2000051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5533, 4, 31, 'a2.2000052', 'Indra Anugrah R', 'pnp6QY', 0, 'a2.2000052@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5534, 4, 31, 'a2.2000053', 'Intan Putri Aulia TI ANG 20', 'X6l2XZ', 0, 'a2.2000053@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5535, 4, 31, 'a2.2000054', 'Irvan Nugraha Marzuki TI ANG 20', '2rOBnL', 0, 'a2.2000054@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5536, 4, 31, 'a2.2000055', 'Ismail Fawwaz Al Hasyir TI ANG 20', 'CJN9Xz', 0, 'a2.2000055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5537, 4, 31, 'a2.2000056', 'Ivan Abdillah TI ANG 20', '2Hl6js', 0, 'a2.2000056@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5538, 4, 31, 'a2.2000058', 'Levia Amanda Yuniar TI ANG 20 A', 'hH8VpU', 0, 'a2.2000058@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5539, 4, 31, 'a2.2000059', 'Lukman Kartadipraja TI ANG 20', '7yzwgo', 0, 'a2.2000059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5540, 4, 31, 'a2.2000060', 'Luthfi Bukhori TI ANG 20', 'KmjQYP', 0, 'a2.2000060@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5541, 4, 31, 'a2.2000061', 'Lisda Kania TI ANG 20 A', 'lacohn', 0, 'a2.2000061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5542, 4, 31, 'a2.2000062', 'Miftahul Khoer TI ANG 20 A', 'QGmgaQ', 0, 'a2.2000062@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5543, 4, 31, 'a2.2000063', 'Mishbah Fauzi Ramadhan TI ANG 20', 'yLUQd9', 0, 'a2.2000063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5544, 4, 31, 'a2.2000064', 'Mohamad Rifqi Nurhidayah TI ANG 20', 'EbsrS4', 0, 'a2.2000064@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5545, 4, 31, 'a2.2000065', 'Muhamad Ariansyah TI ANG 20', 'MokHAu', 0, 'a2.2000065@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5546, 4, 31, 'a2.2000066', 'Muhamad Luthfi Assidiq', 'tFFV5R', 0, 'a2.2000066@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5547, 4, 31, 'a2.2000067', 'Muhamad Ramdan Maulana TI ANG 20', 'MloNyP', 0, 'a2.2000067@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5548, 4, 31, 'a2.2000068', 'Muhamad Ridwan Permana TI ANG 20', 'O8T4Wp', 0, 'a2.2000068@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5549, 4, 31, 'a2.2000069', 'Muhamad Rizki Al Akbar TI ANG 20', 'wpheWO', 0, 'a2.2000069@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5550, 4, 31, 'a2.2000070', 'Muhamad Rizki Solehudin TI ANG 20 A', 'tc4uO3', 0, 'a2.2000070@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5551, 4, 31, 'a2.2000071', 'Muhamad Solihin TI ANG 20', 'ycX3Xs', 0, 'a2.2000071@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5552, 4, 31, 'a2.2000072', 'Muhammad Akbar Fauzi TI ANG 20', 'szPzjs', 0, 'a2.2000072@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5553, 4, 31, 'a2.2000073', 'Muhammad Alfaz', 'sX3x6D', 0, 'a2.2000073@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5554, 4, 31, 'a2.2000074', 'Muhammad Fajar Nugraha TI ANG 20 A', 'fi3q5U', 0, 'a2.2000074@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5555, 4, 31, 'a2.2000075', 'Muhammad Ikhsan Mahendra TI ANG 20', 'K9R7Hg', 0, 'a2.2000075@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5556, 4, 31, 'a2.2000076', 'Muhammad Iman Hafidin TI ANG 20', 'uwc5Qa', 0, 'a2.2000076@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5557, 4, 31, 'a2.2000077', 'Muhammad Iqbal Kamaluddin TI ANG 20', 'EL5dJx', 0, 'a2.2000077@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5558, 4, 31, 'a2.2000078', 'Muhammad Rifqi Mubarok Attarmidzi TI ANG 20 A', 'ZnkYAk', 0, 'a2.2000078@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5559, 4, 31, 'a2.2000079', 'Nahrulsyah TI ANG 20', 'pYWKuD', 0, 'a2.2000079@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5560, 4, 31, 'a2.2000080', 'Naufal Fadlurrahman TI ANG 20', 'Eu09Qi', 0, 'a2.2000080@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5561, 4, 31, 'a2.2000081', 'Naufal Maulana Fadhilah TI ANG 20', 'RwA195', 0, 'a2.2000081@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5562, 4, 31, 'a2.2000082', 'Neng Fitri Nurhidayah TI ANG 20', 'Ry6tmd', 0, 'a2.2000082@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5563, 4, 31, 'a2.2000083', 'Nida Alpiani TI ANG 20', '3S0ajA', 0, 'a2.2000083@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5564, 4, 31, 'a2.2000084', 'Nova Nurhidayat TI ANG 20 A', 'BqoY7a', 0, 'a2.2000084@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5565, 4, 31, 'a2.2000085', 'Nunu Awaludin TI ANG 20', 'Mb3b6O', 0, 'a2.2000085@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5566, 4, 31, 'a2.2000086', 'Pikri Ardiansyah TI ANG 20', 'jTF1cw', 0, 'a2.2000086@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5567, 4, 31, 'a2.2000087', 'Raden Muchamad Naufal Ramadhan TI ANG 20', 'Q0q9VO', 0, 'a2.2000087@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5568, 4, 31, 'a2.2000088', 'Raka Aditya Irawan TI ANG 20 A', 'xPkS0w', 0, 'a2.2000088@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5569, 4, 31, 'a2.2000089', 'Ramdan Ginanjar TI ANG 20', '0PLKJG', 0, 'a2.2000089@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5570, 4, 31, 'a2.2000090', 'Ramdhan Purboyo Sumarlien TI ANG 20', 'c487v3', 0, 'a2.2000090@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5571, 4, 31, 'a2.2000091', 'Rangga Muharram TI ANG 20', 'BRG7ed', 0, 'a2.2000091@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5572, 4, 31, 'a2.2000092', 'Renaldy Djunaedi', 'KH7epd', 0, 'a2.2000092@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5573, 4, 31, 'a2.2000093', 'Rifqi Adli Septian TI ANG 20', '0tEJej', 0, 'a2.2000093@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5574, 4, 31, 'a2.2000094', 'Risma Azhari TI ANG 20', 'LC3TRq', 0, 'a2.2000094@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5575, 4, 31, 'a2.2000095', 'Rizal Jalaludin TI ANG 20', 'VpDYjS', 0, 'a2.2000095@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5576, 4, 31, 'a2.2000096', 'Rizki Fauziah Arief TI ANG 20 A', 'fMfgZa', 0, 'a2.2000096@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5577, 4, 31, 'a2.2000097', 'Rizki Ramadhani Rismawan TI ANG 20', 'T48lxF', 0, 'a2.2000097@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5578, 4, 31, 'a2.2000099', 'Rosita Apriliani TI ANG 20', 'figTZj', 0, 'a2.2000099@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5579, 4, 31, 'a2.2000100', 'Rozaan Shofwan Nursiddiq', 'jHx5gQ', 0, 'a2.2000100@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5580, 4, 31, 'a2.2000101', 'Salsa Ayunda Maudiani', 'UxNTCL', 0, 'a2.2000101@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5581, 4, 31, 'a2.2000102', 'Sandi Lopa TI ANG 20', '9wjlSJ', 0, 'a2.2000102@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5582, 4, 31, 'a2.2000103', 'Sandy Shultan Gunawan TI ANG 20', '97VrFl', 0, 'a2.2000103@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5583, 4, 31, 'a2.2000104', 'Sari Retna Kandini TI ANG 20', 'zWwzAn', 0, 'a2.2000104@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5584, 4, 31, 'a2.2000105', 'Siti Nida Saripah TI ANG 20 A', 'Rvf109', 0, 'a2.2000105@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5585, 4, 31, 'a2.2000106', 'Siti Rubiah TI ANG 20', 'UHMCWP', 0, 'a2.2000106@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5586, 4, 31, 'a2.2000107', 'Sofian Rizki Nugraha TI ANG 20 A', '1tmE13', 0, 'a2.2000107@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5587, 4, 31, 'a2.2000108', 'Suzana Nur Aena TI ANG 20', 'VoVwST', 0, 'a2.2000108@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5588, 4, 31, 'a2.2000109', 'Tedik Hadi Prayoga TI ANG 20', 'K0ulrP', 0, 'a2.2000109@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5589, 4, 31, 'a2.2000110', 'Wafan Zaelani TI ANG 20', 'Vto7v4', 0, 'a2.2000110@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5590, 4, 31, 'a2.2000111', 'Wijaya Kusuma TI ANG 20', 'FcDB4d', 0, 'a2.2000111@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5591, 4, 31, 'a2.2000112', 'Wildan Nur Rohmat TI ANG 20 A', 'QDyKbS', 0, 'a2.2000112@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5592, 4, 31, 'a2.2000113', 'Winata Pranata TI ANG 20', 'Af57wY', 0, 'a2.2000113@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5593, 4, 31, 'a2.2000114', 'Winaya Zarkasih TI ANG 20', 'EAUXqp', 0, 'a2.2000114@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5594, 4, 31, 'a2.2000115', 'Windi Dwi Widayanti TI ANG 20', 'trXJAy', 0, 'a2.2000115@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5595, 4, 31, 'a2.2000116', 'Yovi Koesniawan TI ANG 20', 'xWHFRw', 0, 'a2.2000116@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5596, 4, 31, 'a2.2000117', 'Zaki Fachreji TI ANG 20 A', '5ocmo1', 0, 'a2.2000117@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5597, 4, 31, 'a2.2000118', 'Hamdun Muzadi TI ANG 20', 'uvm5Qj', 0, 'a2.2000118@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5598, 4, 31, 'a2.2000119', 'Maria Fatima Baul TI ANG 20 A', '3ItfmC', 0, 'a2.2000119@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5599, 4, 31, 'a2.2000120', 'Sugih Purnama TI ANG 20', 'CKqdoc', 0, 'a2.2000120@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5600, 4, 31, 'a2.2000121', 'Surya Wiguna TI ANG 20', '0Aa7w2', 0, 'a2.2000121@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5601, 4, 31, 'a2.2000122', 'Zaeni Mubarok TI ANG 20 A', 'vpjpor', 0, 'a2.2000122@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5602, 4, 31, 'a2.2000123', 'Angga Putra U TI ANG 20', 'feYxLo', 0, 'a2.2000123@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5603, 4, 31, 'a2.2000124', 'Aditiya TI ANG 20 A', 'bmpTa6', 0, 'a2.2000124@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5604, 4, 31, 'a2.2000125', 'Endang Hendayatna TI ANG 20', 'SBoP4r', 0, 'a2.2000125@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5605, 4, 31, 'a2.2000126', 'Rafi Eka Nugraha Saputra TI ANG 20', 'ZRAOvP', 0, 'a2.2000126@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5606, 4, 31, 'a2.2000127', 'Ronaeli TI ANG 20', 'wttQnm', 0, 'a2.2000127@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5607, 4, 31, 'a2.2000129', 'Siti Aisyah Mushalifah TI ANG 20', 'YCZnLo', 0, 'a2.2000129@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5608, 4, 31, 'a2.2000130', 'Muhammad Fairuz Yorisyahputra TI ANG 20', '2NQztu', 0, 'a2.2000130@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5609, 4, 31, 'a2.2000131', 'Wildan Pirmansah TI ANG 20', 'ayLLIN', 0, 'a2.2000131@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5610, 4, 31, 'a2.2000132', 'Muhamad Yusrisa Juniawan TI ANG 20 A', 'ZI9KJW', 0, 'a2.2000132@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5611, 4, 31, 'a2.2000133', 'Agung Karya Nugraha TI ANG 20', 'b2le38', 0, 'a2.2000133@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5612, 4, 31, 'a2.2000134', 'Siti Rahmadanti Abdurrahman TI ANG 20', 'fNPq7G', 0, 'a2.2000134@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5613, 4, 31, 'a2.2000135', 'Fajar Akbar Ramadhan TI ANG 20', 'O6oCBI', 0, 'a2.2000135@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5614, 4, 31, 'a2.2000136', 'Arya Ahmad Zakaria TI ANG 20 A', '1zSfhp', 0, 'a2.2000136@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5615, 4, 31, 'a2.2000137', 'Adi Mulyadi TI ANG 20', '4GbD8m', 0, 'a2.2000137@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5616, 4, 31, 'a2.2000138', 'Nadia Farisatunnisa TI ANG 20', 'Rahbzy', 0, 'a2.2000138@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5617, 4, 31, 'a2.2000140', 'Gin Gin Algifari TI ANG 20 A', 'QSjbgm', 0, 'a2.2000140@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5618, 4, 31, 'a2.2000141', 'Jumadi Muhammad Rizal TI ANG 20 B', 'RRWjLm', 0, 'a2.2000141@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5619, 4, 31, 'a2.2000142', 'Diva Putri Devani TI ANG 20 C', '5mypgL', 0, 'a2.2000142@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5620, 4, 31, 'a2.2000143', 'Fauzi Ibnu Hakim TI ANG 20', 'naL04H', 0, 'a2.2000143@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5621, 4, 31, 'a2.2000145', 'Dhika Mahesa Gumilang TI ANG 20', 'f8nb2x', 0, 'a2.2000145@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5622, 4, 31, 'a2.2000146', 'Jaya TI ANG 20 A', 'vaGkoy', 0, 'a2.2000146@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5623, 4, 31, 'a2.2010001', 'Wildan Permadi', 'raiPZ8', 0, 'a2.2010001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5624, 4, 31, 'a2.2010002', 'Wisman Suherlan TI ANG 20', '0CFid5', 0, 'a2.2010002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5625, 4, 31, 'a2.2010003', 'Hadi Firmansyah TI ANG 20', 'zbwUgV', 0, 'a2.2010003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5626, 4, 31, 'a2.2010004', 'Hendra Gatot Pramayuda', '7wMeXS', 0, 'a2.2010004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5627, 4, 31, 'a21700087@', 'KKP-19 _RD Devandhio', '9bEFw0', 0, 'a21700087@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5628, 4, 31, 'a21910006@', 'Al Amien Muhammad Kahfi Tonthawi', '5L2GKV', 0, 'a21910006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5629, 4, 31, 'a3.1500003', 'ALDY MAULANA AKBAR', 'KM2M08', 0, 'a3.1500003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5630, 4, 31, 'a3.1500017', 'ILHAM JAELANI', 'm655Yj', 0, 'a3.1500017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5631, 4, 31, 'a3.1500028', 'RIZKI SOPIAN', 'H4WUSp', 0, 'a3.1500028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5632, 4, 31, 'a3.1500035', 'WAHYU NOERGANA', 'Kdbmkc', 0, 'a3.1500035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5633, 4, 31, 'a3.1600019', 'Ipin Herlambang S', '806OKF', 0, 'a3.1600019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5634, 4, 31, 'a3.1610055', 'CECEP NURDIN MULYANA', 'bzfyIp', 0, 'a3.1610055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5635, 4, 31, 'a3.1700001', 'Aditya Ramdhani', 'CP9hbP', 0, 'a3.1700001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5636, 4, 31, 'a3.1700002', 'Ai Komala', 'EDEYWd', 0, 'a3.1700002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5637, 4, 31, 'a3.1700003', 'Amelya Khansya', '5oIujw', 0, 'a3.1700003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5638, 4, 31, 'a3.1700005', 'Kiki Afrianto', 'hjG49S', 0, 'a3.1700005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5639, 4, 31, 'a3.1700006', 'Anwar Lukmanulhakim', 'EOWhEb', 0, 'a3.1700006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5640, 4, 31, 'a3.1700009', 'KKP-11_Azkha Sandika Ginanjar', 'dZbjmi', 0, 'a3.1700009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5641, 4, 31, 'a3.1700010', 'Cepy Septiadi Junjunan Junjunan', 'VBHw5H', 0, 'a3.1700010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5642, 4, 31, 'a3.1700011', 'Chandra Lesmana', 'dEJ2Ru', 0, 'a3.1700011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5643, 4, 31, 'a3.1700013', 'KKP-11_Deni_Riza Riza', 'Gug9Am', 0, 'a3.1700013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5644, 4, 31, 'a3.1700014', 'Devaliyana Nurlita Putri', 'HmnNea', 0, 'a3.1700014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5645, 4, 31, 'a3.1700016', 'Dwita Anjelita', 'L7lriR', 0, 'a3.1700016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5646, 4, 31, 'a3.1700017', 'Eliya Ayustina', '0MnmVE', 0, 'a3.1700017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5647, 4, 31, 'a3.1700019', 'Eneng Vini Octaviani', '73WHuk', 0, 'a3.1700019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5648, 4, 31, 'a3.1700022', 'Helinda Muhani', 'Oa8imv', 0, 'a3.1700022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5649, 4, 31, 'a3.1700023', 'KKP-13 Hizkia Cakra Fitra', '18F0rr', 0, 'a3.1700023@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5650, 4, 31, 'a3.1700024', 'Muhammad Arie Nurhafidz', 'pqeJt5', 0, 'a3.1700024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5651, 4, 31, 'a3.1700025', 'KKP-14_Ilham Fadillah Ilhamfadillah', '186sKh', 0, 'a3.1700025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5652, 4, 31, 'a3.1700029', 'Marwah Sabilatul Anwar', 'w46io8', 0, 'a3.1700029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5653, 4, 31, 'a3.1700030', 'Muhammad Gilang Yudhistira', 'Bjhhmx', 0, 'a3.1700030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5654, 4, 31, 'a3.1700031', 'Nani Diar Anggita', 'xK1XPz', 0, 'a3.1700031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5655, 4, 31, 'a3.1700032', 'Nita Rosita', '1XTHIE', 0, 'a3.1700032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5656, 4, 31, 'a3.1700033', 'Nur liasari', 'VoHPKI', 0, 'a3.1700033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5657, 4, 31, 'a3.1700034', 'ONLY AZASI', 'prHPQo', 0, 'a3.1700034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5658, 4, 31, 'a3.1700035', 'Rahayu Sri Lestari', 'I5ds1W', 0, 'a3.1700035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5659, 4, 31, 'a3.1700038', 'Riki Gunawan', 'KlzTIB', 0, 'a3.1700038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5660, 4, 31, 'a3.1700039', 'Rizky Fauzi Rahman', '8okqDh', 0, 'a3.1700039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5661, 4, 31, 'a3.1700040', 'Robi Rozali', 'IDK9bG', 0, 'a3.1700040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5662, 4, 31, 'a3.1700041', 'Rosi Rojanah', 'T3YePQ', 0, 'a3.1700041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5663, 4, 31, 'a3.1700042', 'Satriya Laksana', 'ZSfaOK', 0, 'a3.1700042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5664, 4, 31, 'a3.1700044', 'Tri Diyanatomi AD tri', 'JTmPFi', 0, 'a3.1700044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5665, 4, 31, 'a3.1700046', 'Vina Fitriani', 'zdmBbI', 0, 'a3.1700046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5666, 4, 31, 'a3.1700047', 'Widea Akbar Nurfatoni', 'tPxFu3', 0, 'a3.1700047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5667, 4, 31, 'a3.1700049', 'Restiadi Hilman K', 'Imbg4A', 0, 'a3.1700049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5668, 4, 31, 'a3.1700051', 'KKP-06_Viki Tajudin', 'W7z4oZ', 0, 'a3.1700051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5669, 4, 31, 'a3.1800001', 'Aditya Luqman', '8JKkZy', 0, 'a3.1800001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5670, 4, 31, 'a3.1800002', 'Ahmad Kamaludin', 'QWEYOu', 0, 'a3.1800002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5671, 4, 31, 'a3.1800003', 'Aini Nurinayah', 'lyFeZN', 0, 'a3.1800003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5672, 4, 31, 'a3.1800004', 'Anjas Karunia Putra', 'O3AK2n', 0, 'a3.1800004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5673, 4, 31, 'a3.1800005', 'Asep A\'la Jalaludin', 'tq3iXP', 0, 'a3.1800005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5674, 4, 31, 'a3.1800006', 'Asep Solahudin', 'IJ0nge', 0, 'a3.1800006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5675, 4, 31, 'a3.1800007', 'Belliana Mustika Wiradiputra', 'rFGgZ4', 0, 'a3.1800007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5676, 4, 31, 'a3.1800008', 'Chikal Miftahul Fauzan', 'RhJ1f3', 0, 'a3.1800008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5677, 4, 31, 'a3.1800009', 'Dani Malik', 'TUa0IM', 0, 'a3.1800009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5678, 4, 31, 'a3.1800010', 'Desy Rahmayanti', 'cwwl6C', 0, 'a3.1800010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5679, 4, 31, 'a3.1800011', 'Dianti Febri Yani', 'OVY22D', 0, 'a3.1800011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5680, 4, 31, 'a3.1800012', 'Elis Irapitriani', 'sgN8qx', 0, 'a3.1800012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5681, 4, 31, 'a3.1800013', 'Elsa Anjelika', 'SzqCqu', 0, 'a3.1800013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5682, 4, 31, 'a3.1800014', 'Elviana Dwi Lestari', 'JSdbhA', 0, 'a3.1800014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5683, 4, 31, 'a3.1800015', 'Erika Fasya Nabila', 'nf6vHv', 0, 'a3.1800015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5684, 4, 31, 'a3.1800017', 'Fadhal Muyassar', '4rswlj', 0, 'a3.1800017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5685, 4, 31, 'a3.1800018', 'Fadli Rafidan', 'LSftP1', 0, 'a3.1800018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5686, 4, 31, 'a3.1800019', 'Hadiana Afiaty', 'g9E2pE', 0, 'a3.1800019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5687, 4, 31, 'a3.1800020', 'Hani Magfiroh Nur', 'NDcx2X', 0, 'a3.1800020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5688, 4, 31, 'a3.1800021', 'Indah Fatimah Azzahra', 'ELVb4G', 0, 'a3.1800021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5689, 4, 31, 'a3.1800023', 'Karisma Nurul Anissa', 'RqOUCT', 0, 'a3.1800023@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5690, 4, 31, 'a3.1800024', 'Lifiyandri Khairunnisa', 'eHqym4', 0, 'a3.1800024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5691, 4, 31, 'a3.1800025', 'M. Aditiya Nugraha', 'zfEW5k', 0, 'a3.1800025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5692, 4, 31, 'a3.1800027', 'Mochamad Faqih Abdul Falah', 'ILKZhK', 0, 'a3.1800027@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5693, 4, 31, 'a3.1800029', 'Muhamad Irpan', '4W3f0L', 0, 'a3.1800029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5694, 4, 31, 'a3.1800030', 'Muhammad Natsir', 'bsxRMd', 0, 'a3.1800030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5695, 4, 31, 'a3.1800031', 'Muhammad Zaki Fauzaan', 'BW2ogP', 0, 'a3.1800031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5696, 4, 31, 'a3.1800032', 'Munaziah Munaziah', '4jJBtx', 0, 'a3.1800032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5697, 4, 31, 'a3.1800033', 'Pilipo Giancarlo Asmoro', 'D50fiq', 0, 'a3.1800033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5698, 4, 31, 'a3.1800034', 'Prian Daru Belum Tentu', 'IDlFAv', 0, 'a3.1800034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5699, 4, 31, 'a3.1800035', 'Putri Tiara Julaika', 'vA5AEE', 0, 'a3.1800035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5700, 4, 31, 'a3.1800037', 'Rani Noer Adiana', 'MokI2B', 0, 'a3.1800037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5701, 4, 31, 'a3.1800038', 'Fadhlurrohman Salim', 'Rdu5Tv', 0, 'a3.1800038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5702, 4, 31, 'a3.1800039', 'Riri Oktavianingrum', 'RLLvtY', 0, 'a3.1800039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5703, 4, 31, 'a3.1800040', 'Risma Hapsah Septiani', '8ijVgA', 0, 'a3.1800040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5704, 4, 31, 'a3.1800041', 'Risna Mukharom', 'JZNLk7', 0, 'a3.1800041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5705, 4, 31, 'a3.1800042', 'Rosa Febriantika', 'TitcJu', 0, 'a3.1800042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5706, 4, 31, 'a3.1800043', 'Sony Herisandy', 'MsxFHo', 0, 'a3.1800043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17');
INSERT INTO `voters` (`id`, `user_id`, `election_id`, `nim`, `name`, `token`, `voted`, `email`, `email_sent`, `created_at`, `updated_at`) VALUES
(5707, 4, 31, 'a3.1800044', 'Fahrul Agustin Saputra', 'tT4ezB', 0, 'a3.1800044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5708, 4, 31, 'a3.1800045', 'Vira Fitri Yulia ANG 18', 'l0SdeE', 0, 'a3.1800045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5709, 4, 31, 'a3.1800046', 'Wanda Mutiara Cherin', 'Pj37ov', 0, 'a3.1800046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5710, 4, 31, 'a3.1800048', 'Yoga Widi Anggara', '3fPh1Q', 0, 'a3.1800048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5711, 4, 31, 'a3.1800050', 'Yudi Hendri Taufik', 'OnGTdd', 0, 'a3.1800050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5712, 4, 31, 'a3.1810009', 'RICKY RADIANSYAH', '8mYJKs', 0, 'a3.1810009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5713, 4, 31, 'a3.1900001', 'Acep Dadang Koswara', 'uAmHGo', 0, 'a3.1900001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5714, 4, 31, 'a3.1900002', 'Afitria Sopiyanti', 'n0SZsQ', 0, 'a3.1900002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5715, 4, 31, 'a3.1900003', 'Agrico Elang Wahyudi', 'CprFK4', 0, 'a3.1900003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5716, 4, 31, 'a3.1900004', 'Alya Nurfitri', 'SFq4RP', 0, 'a3.1900004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5717, 4, 31, 'a3.1900005', 'Aprilia lia', 'SoyIDT', 0, 'a3.1900005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5718, 4, 31, 'a3.1900006', 'Arham Ghani', 'lzNQJo', 0, 'a3.1900006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5719, 4, 31, 'a3.1900007', 'Arieq Fikri Khaerulloh', 'oH6vjc', 0, 'a3.1900007@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5720, 4, 31, 'a3.1900008', 'Astri Afrianti', 'W1MYou', 0, 'a3.1900008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5721, 4, 31, 'a3.1900009', 'Ayulita Merliana Tanti', '2J4PjV', 0, 'a3.1900009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5722, 4, 31, 'a3.1900010', 'Bayu Satrio Bimantoro', 'meYhxu', 0, 'a3.1900010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5723, 4, 31, 'a3.1900011', 'Cahya Saepudin', 'fMKqDN', 0, 'a3.1900011@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5724, 4, 31, 'a3.1900012', 'Dea Andriani', 'YMNOpu', 0, 'a3.1900012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5725, 4, 31, 'a3.1900013', 'Dedi Wijaya Hutasoit', 'ilDWDc', 0, 'a3.1900013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5726, 4, 31, 'a3.1900014', 'Dodi Permana', 'cl846k', 0, 'a3.1900014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5727, 4, 31, 'a3.1900015', 'Dwina Muralviati Sophiyah', '0EjP5E', 0, 'a3.1900015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5728, 4, 31, 'a3.1900016', 'Dyah Salmanisa', '4LX7Z5', 0, 'a3.1900016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5729, 4, 31, 'a3.1900017', 'Firggi Sandy Pramudia', 'YF886Z', 0, 'a3.1900017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5730, 4, 31, 'a3.1900018', 'Fitria Hardiyanty Irawan', 'UpOJis', 0, 'a3.1900018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5731, 4, 31, 'a3.1900020', 'Hani Ismayati', 'Z8WVrU', 0, 'a3.1900020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5732, 4, 31, 'a3.1900021', 'Hanifa Alfiani', 'Dli8YW', 0, 'a3.1900021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5733, 4, 31, 'a3.1900022', 'Herliana Diana Putri', 'qLRKZ6', 0, 'a3.1900022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5734, 4, 31, 'a3.1900023', 'Herlina Mustikawaty', 'k255cJ', 0, 'a3.1900023@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5735, 4, 31, 'a3.1900025', 'Ine Fitria Salsabila', 'KmjYsv', 0, 'a3.1900025@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5736, 4, 31, 'a3.1900026', 'Iqbal Setiawan', 'x6BYGZ', 0, 'a3.1900026@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5737, 4, 31, 'a3.1900028', 'Ismi Yuniarti', '3bQeNf', 0, 'a3.1900028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5738, 4, 31, 'a3.1900029', 'Jatnika Eka Hidayat Sumawiganda', 'g8Gfiw', 0, 'a3.1900029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5739, 4, 31, 'a3.1900031', 'Muhamad Bubung Faizal', 'o1gScL', 0, 'a3.1900031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5740, 4, 31, 'a3.1900032', 'Muhamad Dikjaya', 'EJywUJ', 0, 'a3.1900032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5741, 4, 31, 'a3.1900033', 'Muhamad Ridwan Efendi', 'yNDZuU', 0, 'a3.1900033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5742, 4, 31, 'a3.1900034', 'Muhammad Fadjar Maulana', 'vZZ6Bt', 0, 'a3.1900034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5743, 4, 31, 'a3.1900035', 'Sri Nurfitriyani', 'Gn0tSB', 0, 'a3.1900035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:17', '2021-07-19 06:38:17'),
(5744, 4, 31, 'a3.1900036', 'Namira Amalia', '2ULEpZ', 0, 'a3.1900036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5745, 4, 31, 'a3.1900037', 'Nisa Siti Nurlaela', '7WcZzH', 0, 'a3.1900037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5746, 4, 31, 'a3.1900038', 'Nita Khairunisa', 'kmsjnU', 0, 'a3.1900038@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5747, 4, 31, 'a3.1900039', 'Nunung Nurhayati', 'TdiqwS', 0, 'a3.1900039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5748, 4, 31, 'a3.1900040', 'Nur Khoirunisa Shalihah', 'LNsSGY', 0, 'a3.1900040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5749, 4, 31, 'a3.1900041', 'Pebi Pauji', 'ubiikw', 0, 'a3.1900041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5750, 4, 31, 'a3.1900043', 'Pur Purnama', 'ymk26L', 0, 'a3.1900043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5751, 4, 31, 'a3.1900044', 'Rara Oktavianingrum', 'niN1Ut', 0, 'a3.1900044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5752, 4, 31, 'a3.1900046', 'Reisa Adisty Nurholis', 'WrnJvP', 0, 'a3.1900046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5753, 4, 31, 'a3.1900047', 'Reza Santika', '8UHavp', 0, 'a3.1900047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5754, 4, 31, 'a3.1900048', 'Reza Setiawan', 'U39Qgl', 0, 'a3.1900048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5755, 4, 31, 'a3.1900049', 'Rigan Azmi Nur Hakim', '9f3tcl', 0, 'a3.1900049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5756, 4, 31, 'a3.1900050', 'Hadi Akbar Saputra', 'AoPNjU', 0, 'a3.1900050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5757, 4, 31, 'a3.1900051', 'Septian Fauzi Supriyadi', 're6PW9', 0, 'a3.1900051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5758, 4, 31, 'a3.1900052', 'Shinta Ainurrahmah', 'uyiiFm', 0, 'a3.1900052@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5759, 4, 31, 'a3.1900054', 'Sri Nuraeni', 'Mk5mGi', 0, 'a3.1900054@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5760, 4, 31, 'a3.1900055', 'Syanda Faturochman', 'geqHgf', 0, 'a3.1900055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5761, 4, 31, 'a3.1900056', 'Syifa Aulia Primeisya', '65ty9n', 0, 'a3.1900056@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5762, 4, 31, 'a3.1900058', 'Taryana Nugraha', '2ucIGX', 0, 'a3.1900058@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5763, 4, 31, 'a3.1900059', 'Taufik Nurdiansyah', 'gLmR1A', 0, 'a3.1900059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5764, 4, 31, 'a3.1900061', 'Yunus Firdaus', 'cqlExg', 0, 'a3.1900061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5765, 4, 31, 'a3.1900062', 'Moch Kemal Indra Aditya', 'vYSyqG', 0, 'a3.1900062@mhs.stmik-sumedang.ac.id', 1, '2021-07-19 06:38:18', '2021-07-19 13:04:13'),
(5766, 4, 31, 'a3.1900063', 'Renaldie Prasetiady', 't9PTr8', 0, 'a3.1900063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5767, 4, 31, 'a3.1910006', 'Siska Sri Rahayu', 'PDHh0L', 0, 'a3.1910006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5768, 4, 31, 'a3.1910008', 'Yudi Yudinar', 'xv0ldI', 0, 'a3.1910008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5769, 4, 31, 'a3.2000001', 'Achmad Dhani Chandra SI ANG 20', 'tLhfhJ', 0, 'a3.2000001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5770, 4, 31, 'a3.2000002', 'Adam Kurniawan SI ANG 20', 'Zj5jbm', 0, 'a3.2000002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5771, 4, 31, 'a3.2000003', 'Adelya Syafitria Syafril SI ANG 20', 'zMVrQf', 0, 'a3.2000003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5772, 4, 31, 'a3.2000004', 'Adipati Raja Mahameru SI ANG 20', 'iceUFL', 0, 'a3.2000004@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5773, 4, 31, 'a3.2000005', 'Agus Tin Kosasih SI ANG 20', 'egdwWf', 0, 'a3.2000005@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5774, 4, 31, 'a3.2000006', 'Aji Pratama SI ANG 20', 'RbpLwe', 0, 'a3.2000006@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5775, 4, 31, 'a3.2000008', 'Aqilah Nahdah Salsabila SI ANG 20', 'Q9rucm', 0, 'a3.2000008@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5776, 4, 31, 'a3.2000009', 'Atalariq Maulana SI ANG 20', 'Iy3mBX', 0, 'a3.2000009@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5777, 4, 31, 'a3.2000010', 'Deni Dermawan SI ANG 20', 'iN82O5', 0, 'a3.2000010@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5778, 4, 31, 'a3.2000012', 'Dimas Destian Ramadhani SI ANG 20', 'aKOvWx', 0, 'a3.2000012@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5779, 4, 31, 'a3.2000013', 'Ela Salvia SI ANG 20', 'xT5kxD', 0, 'a3.2000013@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5780, 4, 31, 'a3.2000014', 'Fachry Fauzan Ibrahim SI ANG 20', 'yNi16f', 0, 'a3.2000014@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5781, 4, 31, 'a3.2000015', 'FADILAH TETI NURJANAH SI ANG 20', '3swS22', 0, 'a3.2000015@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5782, 4, 31, 'a3.2000016', 'Fadya Dwi Alfina Devi SI ANG 20', 'jfBNQa', 0, 'a3.2000016@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5783, 4, 31, 'a3.2000017', 'Fajar Setiawan SI ANG 20', 'vFFvIi', 0, 'a3.2000017@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5784, 4, 31, 'a3.2000018', 'FASYA ZAHIRA BADENI SI ANG 20', 'GAlQ5O', 0, 'a3.2000018@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5785, 4, 31, 'a3.2000019', 'Felix Yusuf Maskandinata SI ANG 20', 'AU8ckw', 0, 'a3.2000019@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5786, 4, 31, 'a3.2000020', 'Feri Firmansyah SI ANG 20', '6PAVpE', 0, 'a3.2000020@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5787, 4, 31, 'a3.2000021', 'Fitriyani SI ANG 20', 'SfdUFe', 0, 'a3.2000021@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5788, 4, 31, 'a3.2000022', 'Gilang Gumelar Ramadan SI ANG 20', '7jobE9', 0, 'a3.2000022@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5789, 4, 31, 'a3.2000023', 'HIKAM ANUGRAH FIRDAUS SI ANG 20', 'Jw7mYO', 0, 'a3.2000023@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5790, 4, 31, 'a3.2000024', 'Iman Faturohman SI ANG 20', 'XuMaD8', 0, 'a3.2000024@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5791, 4, 31, 'a3.2000026', 'Indra Maulana SI ANG 20', '8IfUF7', 0, 'a3.2000026@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5792, 4, 31, 'a3.2000027', 'Indriani Astuti SI ANG 20', 'gicWtf', 0, 'a3.2000027@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5793, 4, 31, 'a3.2000028', 'Lin Lin Herlina SI ANG 20', 'Ua2mgt', 0, 'a3.2000028@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5794, 4, 31, 'a3.2000029', 'M. Fadillah Nur Arief SI ANG 20', 'mROIRp', 0, 'a3.2000029@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5795, 4, 31, 'a3.2000030', 'Miyoko Rizki Ramdhani SI ANG 20', 'LswmvI', 0, 'a3.2000030@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5796, 4, 31, 'a3.2000031', 'Mugy Lugina Suarna SI ANG 20', 'gW6Quv', 0, 'a3.2000031@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5797, 4, 31, 'a3.2000032', 'Muhammad Hafiz Faisa SI ANG 20', 'UZ4z5t', 0, 'a3.2000032@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5798, 4, 31, 'a3.2000033', 'Muhammad Apipudin SI ANG 20', 'FpZq0E', 0, 'a3.2000033@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5799, 4, 31, 'a3.2000034', 'Muhammad Bima Yudha Antariksa SI ANG 20', 'r298ap', 0, 'a3.2000034@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5800, 4, 31, 'a3.2000035', 'Muhammad Hilmi Rizqullah SI ANG 20', 'ekfQzL', 0, 'a3.2000035@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5801, 4, 31, 'a3.2000036', 'Muhammad Rizkhy Afdhal', 'SGESO1', 0, 'a3.2000036@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5802, 4, 31, 'a3.2000037', 'Mutiara Anuari Putri SI ANG 20', 'XjICkn', 0, 'a3.2000037@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5803, 4, 31, 'a3.2000039', 'Neneng Widia SI ANG 20', 'ageoac', 0, 'a3.2000039@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5804, 4, 31, 'a3.2000040', 'Nisa Nabila SI ANG 20', 'kPDsXh', 0, 'a3.2000040@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5805, 4, 31, 'a3.2000041', 'Nisha Amelia Putri SI ANG 20', 'FTBpBS', 0, 'a3.2000041@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5806, 4, 31, 'a3.2000042', 'Nisrina Assyifa Aras SI ANG 20', '2JxZzy', 0, 'a3.2000042@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5807, 4, 31, 'a3.2000043', 'Nuke Putri Samiati SI ANG 20', '0k1Mci', 0, 'a3.2000043@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5808, 4, 31, 'a3.2000044', 'Paisal Deni Azis SI ANG 20', 'rno8Ya', 0, 'a3.2000044@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5809, 4, 31, 'a3.2000045', 'Pandya Wishnu Abdul Azis SI ANG 20', 'yWardY', 0, 'a3.2000045@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5810, 4, 31, 'a3.2000046', 'Rai Kurnia Dewi SI ANG 20', 'QFiOrH', 0, 'a3.2000046@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5811, 4, 31, 'a3.2000047', 'Richi Ramadhan SI ANG 20', 'YHiz5x', 0, 'a3.2000047@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5812, 4, 31, 'a3.2000048', 'Ricky Tri Adriansyah SI ANG 20', 'Pcwc8F', 0, 'a3.2000048@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5813, 4, 31, 'a3.2000049', 'Rio Akmal Afandi SI ANG 20', 'qrl7jP', 0, 'a3.2000049@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5814, 4, 31, 'a3.2000050', 'Sarah Dwi Yuniartini SI ANG 20', 'd3juic', 0, 'a3.2000050@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5815, 4, 31, 'a3.2000051', 'Shandy Khoerurizki Afdoly SI ANG 20', '5vfiF0', 0, 'a3.2000051@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5816, 4, 31, 'a3.2000052', 'Shintia Febriyanti SI ANG 20', 'e7DYxQ', 0, 'a3.2000052@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5817, 4, 31, 'a3.2000053', 'Siti Halimah SI ANG 20', 'ShWPg6', 0, 'a3.2000053@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5818, 4, 31, 'a3.2000054', 'Siti Nurhayati SI ANG 20', 'NtzJvY', 0, 'a3.2000054@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5819, 4, 31, 'a3.2000055', 'M. Ramadan Sukmadi Putra SI ANG 20', 'rES970', 0, 'a3.2000055@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5820, 4, 31, 'a3.2000056', 'Suci Destia Risdayanti SI ANG 20', '77yFTC', 0, 'a3.2000056@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5821, 4, 31, 'a3.2000057', 'Syahrul Dwi Saputra', 'cGQiLD', 0, 'a3.2000057@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5822, 4, 31, 'a3.2000058', 'Tegar Faza Al Khafiyan SI ANG 20', 'wGFOmA', 0, 'a3.2000058@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5823, 4, 31, 'a3.2000059', 'Teuku Pangeran Juang SI ANG 20', 'KjIobt', 0, 'a3.2000059@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5824, 4, 31, 'a3.2000060', 'Yola Grece Sumba T SI ANG 20', 'BkCx39', 0, 'a3.2000060@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5825, 4, 31, 'a3.2000061', 'Ega Nugraha SI ANG 20', 'T62RNt', 0, 'a3.2000061@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5826, 4, 31, 'a3.2000062', 'Muhamad Fikri', 'aN0GZp', 0, 'a3.2000062@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5827, 4, 31, 'a3.2000063', 'Pamugia Gandhara Pamungkas SI ANG 20', '6b04V2', 0, 'a3.2000063@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5828, 4, 31, 'a3.2000064', 'Delvin Agung Rifaldi SI ANG 20', 'lR3UBf', 0, 'a3.2000064@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5829, 4, 31, 'a3.2000065', 'Mohammad Fakhri Fakhruddin SI ANG 20', 'm9ZxZo', 0, 'a3.2000065@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5830, 4, 31, 'a3.2000066', 'Muhamad Fariz Syukur Ramdhani SI ANG 20', 'WyVeDD', 0, 'a3.2000066@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5831, 4, 31, 'a3.2000067', 'Mauludy Fajri SI ANG 20', 'doTzac', 0, 'a3.2000067@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5832, 4, 31, 'a3.2000068', 'Ari Al Ghiffari SI ANG 20', 'ga1fNj', 0, 'a3.2000068@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5833, 4, 31, 'a3.2000070', 'Hani Alghomidi SI ANG 20', 'kEgVm3', 0, 'a3.2000070@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5834, 4, 31, 'a3.2000071', 'Citrandila SI ANG 20', 'HLVjqN', 0, 'a3.2000071@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5835, 4, 31, 'a3.2000072', 'Marini Siti Aisyah Noer Abidin SI ANG 20', 'q6K61L', 0, 'a3.2000072@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5836, 4, 31, 'a3.2000073', 'Fathur Rohman SI ANG 20', 'Ik0gJS', 0, 'a3.2000073@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5837, 4, 31, 'a3.2010001', 'Andri Supiyana SI ANG 20', 'FVAnta', 0, 'a3.2010001@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5838, 4, 31, 'a3.2010002', 'Reva Maturida Sihabuddin SI ANG 20', 'FUWDF6', 0, 'a3.2010002@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18'),
(5839, 4, 31, 'a3.2010003', 'Ade Wahyu Hidayat SI ANG 20', 'bEaqSe', 0, 'a3.2010003@mhs.stmik-sumedang.ac.id', 0, '2021-07-19 06:38:18', '2021-07-19 06:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `voter_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `election_id`, `voter_id`, `candidate_id`, `created_at`, `updated_at`) VALUES
(162, 31, 5272, 29, '2021-07-19 08:04:13', '2021-07-19 08:04:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_election_id_foreign` (`election_id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voters_user_id_foreign` (`user_id`),
  ADD KEY `voters_election_id_foreign` (`election_id`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votings_election_id_foreign` (`election_id`),
  ADD KEY `votings_voter_id_foreign` (`voter_id`),
  ADD KEY `votings_candidate_id_foreign` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5840;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_election_id_foreign` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`);

--
-- Constraints for table `voters`
--
ALTER TABLE `voters`
  ADD CONSTRAINT `voters_election_id_foreign` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `voters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `votings`
--
ALTER TABLE `votings`
  ADD CONSTRAINT `votings_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `votings_election_id_foreign` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `votings_voter_id_foreign` FOREIGN KEY (`voter_id`) REFERENCES `voters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
