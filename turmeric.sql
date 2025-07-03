-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2025 at 06:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turmeric`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tanaman`
--

CREATE TABLE `jenis_tanaman` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu_tanah_max` int NOT NULL,
  `suhu_tanah_min` int NOT NULL,
  `kelembapan_tanah_max` int NOT NULL,
  `kelembapan_tanah_min` int NOT NULL,
  `suhu_udara_max` int NOT NULL,
  `suhu_udara_min` int NOT NULL,
  `kelembapan_udara_max` int NOT NULL,
  `kelembapan_udara_min` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_tanaman`
--

INSERT INTO `jenis_tanaman` (`id`, `nama`, `suhu_tanah_max`, `suhu_tanah_min`, `kelembapan_tanah_max`, `kelembapan_tanah_min`, `suhu_udara_max`, `suhu_udara_min`, `kelembapan_udara_max`, `kelembapan_udara_min`, `created_at`, `updated_at`) VALUES
(1, 'kunyit', 25, 20, 70, 40, 15, 20, 75, 50, '2025-06-27 18:21:55', '2025-06-29 06:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_27_220000_create_jenis_tanaman_table', 1),
(5, '2025_06_27_225942_create_sensors_table', 1),
(6, '2025_06_27_231137_create_personal_access_tokens_table', 1),
(7, '2025_06_28_003508_create_tanaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` bigint UNSIGNED NOT NULL,
  `humidity` double NOT NULL,
  `temperature` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`id`, `humidity`, `temperature`, `created_at`, `updated_at`) VALUES
(1, 93, 30.2, '2025-06-27 18:48:03', '2025-06-27 18:48:03'),
(2, 92, 30.2, '2025-06-27 18:48:08', '2025-06-27 18:48:08'),
(3, 92, 30.2, '2025-06-27 18:48:13', '2025-06-27 18:48:13'),
(4, 92, 30.2, '2025-06-27 18:48:19', '2025-06-27 18:48:19'),
(5, 92, 30.2, '2025-06-27 18:48:24', '2025-06-27 18:48:24'),
(6, 92, 30.2, '2025-06-27 18:48:30', '2025-06-27 18:48:30'),
(7, 92, 30.2, '2025-06-27 18:48:36', '2025-06-27 18:48:36'),
(8, 92, 30.2, '2025-06-27 18:48:41', '2025-06-27 18:48:41'),
(9, 92, 30.2, '2025-06-27 18:48:47', '2025-06-27 18:48:47'),
(10, 92, 30.2, '2025-06-27 18:48:53', '2025-06-27 18:48:53'),
(11, 92, 30.5, '2025-06-27 18:48:58', '2025-06-27 18:48:58'),
(12, 92, 30.7, '2025-06-27 18:49:04', '2025-06-27 18:49:04'),
(13, 92, 30.8, '2025-06-27 18:49:09', '2025-06-27 18:49:09'),
(14, 92, 30.8, '2025-06-27 18:49:15', '2025-06-27 18:49:15'),
(15, 92, 30.8, '2025-06-27 18:49:21', '2025-06-27 18:49:21'),
(16, 92, 30.8, '2025-06-27 18:49:26', '2025-06-27 18:49:26'),
(17, 92, 30.8, '2025-06-27 18:49:32', '2025-06-27 18:49:32'),
(18, 92, 30.8, '2025-06-27 18:49:37', '2025-06-27 18:49:37'),
(19, 92, 30.8, '2025-06-27 18:49:43', '2025-06-27 18:49:43'),
(20, 92, 30.8, '2025-06-27 18:49:48', '2025-06-27 18:49:48'),
(21, 92, 30.8, '2025-06-27 18:49:54', '2025-06-27 18:49:54'),
(22, 92, 30.8, '2025-06-27 18:49:59', '2025-06-27 18:49:59'),
(23, 92, 30.8, '2025-06-27 18:50:05', '2025-06-27 18:50:05'),
(24, 92, 30.8, '2025-06-27 18:50:10', '2025-06-27 18:50:10'),
(25, 92, 30.8, '2025-06-27 18:50:16', '2025-06-27 18:50:16'),
(26, 92, 30.8, '2025-06-27 18:50:21', '2025-06-27 18:50:21'),
(27, 92, 30.8, '2025-06-27 18:50:27', '2025-06-27 18:50:27'),
(28, 92, 30.8, '2025-06-27 18:50:32', '2025-06-27 18:50:32'),
(29, 92, 30.8, '2025-06-27 18:50:38', '2025-06-27 18:50:38'),
(30, 92, 30.8, '2025-06-27 18:50:43', '2025-06-27 18:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AeICxzQVOz0kHi3EKE8AprbNWoXZnexoqudB6tgT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVJqbjhEdExHN2tUUFRFdkw3M2UwdXhuNzhMUEMzVTBFeUJ2SmJKZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751254698);

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_tanaman_id` bigint UNSIGNED NOT NULL,
  `suhu_udara` double NOT NULL,
  `kelembapan_udara` double NOT NULL,
  `suhu_tanah` double NOT NULL,
  `kelembapan_tanah` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`id`, `jenis_tanaman_id`, `suhu_udara`, `kelembapan_udara`, `suhu_tanah`, `kelembapan_tanah`, `created_at`, `updated_at`) VALUES
(211, 1, 27.6, 96, 26.37, 64, '2025-06-28 09:15:06', '2025-06-28 09:15:06'),
(216, 1, 27.6, 95, 26.37, 93, '2025-06-28 09:28:24', '2025-06-28 09:28:24'),
(218, 1, 27.6, 95, 26.44, 81, '2025-06-28 09:32:25', '2025-06-28 09:32:25'),
(219, 1, 27.6, 95, 26.37, 84, '2025-06-28 09:34:26', '2025-06-28 09:34:26'),
(220, 1, 27.1, 96, 26.25, 81, '2025-06-28 15:58:53', '2025-06-28 15:58:53'),
(221, 1, 27.2, 96, 26.31, 87, '2025-06-28 16:00:53', '2025-06-28 16:00:53'),
(222, 1, 27.2, 96, 85, 98, '2025-06-28 16:01:26', '2025-06-28 16:01:26'),
(223, 1, 27.5, 97, 26.25, 99, '2025-06-28 16:03:27', '2025-06-28 16:03:27'),
(224, 1, 27.2, 96, 26.25, 100, '2025-06-28 16:05:27', '2025-06-28 16:05:27'),
(225, 1, 27.2, 96, 26.25, 99, '2025-06-28 16:07:47', '2025-06-28 16:07:47'),
(226, 1, 27.3, 96, 26.25, 97, '2025-06-28 16:09:48', '2025-06-28 16:09:48'),
(227, 1, 27.5, 96, 26.25, 96, '2025-06-28 16:11:48', '2025-06-28 16:11:48'),
(228, 1, 27.6, 96, 26.25, 97, '2025-06-28 16:13:49', '2025-06-28 16:13:49'),
(229, 1, 29.8, 92, 85, 98, '2025-06-29 04:42:40', '2025-06-29 04:42:40'),
(230, 1, 30.8, 91, 85, 100, '2025-06-29 05:34:22', '2025-06-29 05:34:22'),
(231, 1, 30.8, 90, 85, 90, '2025-06-29 05:36:37', '2025-06-29 05:36:37'),
(232, 1, 30.8, 89, 28.56, 1, '2025-06-29 06:13:43', '2025-06-29 06:13:43'),
(233, 1, 31.2, 90, 28.56, 1, '2025-06-29 06:15:43', '2025-06-29 06:15:43'),
(234, 1, 31.2, 89, 28.5, 1, '2025-06-29 06:17:44', '2025-06-29 06:17:44'),
(235, 1, 31.2, 90, 28.5, 1, '2025-06-29 06:19:45', '2025-06-29 06:19:45'),
(236, 1, 30.9, 89, 28.56, 1, '2025-06-29 06:21:45', '2025-06-29 06:21:45'),
(237, 1, 30.8, 88, 28.56, 1, '2025-06-29 06:23:46', '2025-06-29 06:23:46'),
(238, 1, 30.8, 89, 28.5, 1, '2025-06-29 06:25:46', '2025-06-29 06:25:46'),
(239, 1, 30.8, 89, 28.63, 1, '2025-06-29 06:26:56', '2025-06-29 06:26:56'),
(240, 1, 30.8, 89, 28.63, 1, '2025-06-29 06:28:57', '2025-06-29 06:28:57'),
(241, 1, 31.2, 90, 28.56, 1, '2025-06-29 06:30:57', '2025-06-29 06:30:57'),
(242, 1, 31.3, 90, 28.56, 1, '2025-06-29 06:32:58', '2025-06-29 06:32:58'),
(243, 1, 31.2, 90, 28.56, 1, '2025-06-29 06:34:58', '2025-06-29 06:34:58'),
(244, 1, 31.3, 90, 28.56, 1, '2025-06-29 06:36:59', '2025-06-29 06:36:59'),
(245, 1, 31.3, 89, 28.63, 1, '2025-06-29 06:38:59', '2025-06-29 06:38:59'),
(246, 1, 31.3, 88, 28.63, 1, '2025-06-29 06:41:00', '2025-06-29 06:41:00'),
(247, 1, 31.3, 89, 28.63, 1, '2025-06-29 06:43:01', '2025-06-29 06:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_tanaman`
--
ALTER TABLE `jenis_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanaman_jenis_tanaman_id_foreign` (`jenis_tanaman_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_tanaman`
--
ALTER TABLE `jenis_tanaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD CONSTRAINT `tanaman_jenis_tanaman_id_foreign` FOREIGN KEY (`jenis_tanaman_id`) REFERENCES `jenis_tanaman` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
