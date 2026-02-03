-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2026 at 06:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastprint_test`
--

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
('a0fd2e62-c60c-40ec-843d-19d2ae8a1f59', 'L QUEENLY', '2026-02-02 21:24:13', '2026-02-02 21:24:13'),
('a0fd2e62-d067-44e8-aac2-9116496d4350', 'L MTH AKSESORIS (IM)', '2026-02-02 21:24:13', '2026-02-02 21:24:13'),
('a0fd2e62-ebe3-45a1-b8e0-037cc4d7308b', 'L MTH TABUNG (LK)', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-fadd-43ab-96b5-8d6dcdd9e47b', 'SP MTH SPAREPART (LK)', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'CI MTH TINTA LAIN (IM)', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-151e-45ee-b592-ac8c82288eee', 'L MTH AKSESORIS (LK)', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-18ef-45c9-98eb-c5dbebb0f6ca', 'S MTH STEMPEL (IM)', '2026-02-02 21:24:14', '2026-02-02 21:24:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_02_054422_create_kategoris_table', 1),
(6, '2026_02_02_054422_create_statuses_table', 1),
(7, '2026_02_02_054423_create_produks_table', 1);

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
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint UNSIGNED NOT NULL,
  `kategori_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`, `created_at`, `updated_at`) VALUES
('a0fd2e62-ced5-45ed-b3c7-40ba629ec8e3', 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 'a0fd2e62-c60c-40ec-843d-19d2ae8a1f59', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:13', '2026-02-02 21:34:22'),
('a0fd2e62-d343-451b-af78-0d3deb25155c', 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:13', '2026-02-02 21:24:13'),
('a0fd2e62-d6b4-46f0-aa1f-48ef8a701dfb', 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:13', '2026-02-02 21:24:13'),
('a0fd2e62-dc29-4369-95c9-b2da546b781a', 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-dfb5-435b-b350-3d46c0ccb584', 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-e2ae-4bb5-a2bf-9b2a82240cb0', 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-e5c0-4993-94ea-10f0c73c8b0c', 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-e825-4c57-b65b-f0d1e954e203', 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-ea7c-45e9-8b71-eff875d38083', 'ARM PENDEK MODEL U', 13000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-ed49-4ba7-8230-4dd1a9ceea6b', 'ARM SUPPORT KECIL', 13000, 'a0fd2e62-ebe3-45a1-b8e0-037cc4d7308b', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-ef2b-4fe6-9241-a4b908f2603e', 'ARM SUPPORT KOTAK PUTIH', 13000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-f155-4401-abe9-81f5547b6505', 'ARM SUPPORT PENDEK POLOS', 13000, 'a0fd2e62-ebe3-45a1-b8e0-037cc4d7308b', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-f376-4222-b4e7-50e511e56ef5', 'ARM SUPPORT S IM', 1000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-f5ed-4833-afcc-101cbdacc990', 'ARM SUPPORT T (IMPORT)', 13000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-f7d7-48fc-9d8e-42f8deeec55a', 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 'a0fd2e62-ebe3-45a1-b8e0-037cc4d7308b', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-f9a7-467e-867e-0b3fe4c13256', 'BLACK LASER TONER FP-T3 (100gr)', 13000, 'a0fd2e62-d067-44e8-aac2-9116496d4350', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-fc3d-46b6-8254-b4fd72e4a631', 'BODY PRINTER CANON IP2770', 500, 'a0fd2e62-fadd-43ab-96b5-8d6dcdd9e47b', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e62-fe71-4f37-bb3b-4b8d26cba6ef', 'BODY PRINTER T13X', 15000, 'a0fd2e62-fadd-43ab-96b5-8d6dcdd9e47b', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-017a-4ac0-8beb-6c531115ab31', 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0395-47e3-a17f-997e778e1ffe', 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-05c7-46ca-9cb5-57f71c3e46d6', 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0748-4d64-81ce-6c60f55c8dff', 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0948-46e5-a7d7-c1787d05f823', 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0bd8-4b12-bfbb-c6e20d4ae3b7', 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0d4b-4575-a9b1-8bf87e9341ad', 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-0f03-453a-b967-320fed7d753d', 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-11d6-4af8-acc4-ea98554687e5', 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-13eb-40b1-afc7-d89bf0410d57', 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 'a0fd2e62-ff98-43c8-b1c0-60c09645fb92', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-1737-4065-9447-645430d2b719', 'BOTOL KOTAK 100ML LK', 1000, 'a0fd2e63-151e-45ee-b592-ac8c82288eee', 'a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', '2026-02-02 21:24:14', '2026-02-02 21:24:14'),
('a0fd2e63-1b01-4d0c-8349-60f061df3210', 'BOTOL 10ML IM', 1000, 'a0fd2e63-18ef-45c9-98eb-c5dbebb0f6ca', 'a0fd2e62-da24-444e-9881-b97a9655fe44', '2026-02-02 21:24:14', '2026-02-02 21:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id_status` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id_status`, `nama_status`, `created_at`, `updated_at`) VALUES
('a0fd2e62-ccf5-4191-9292-fb5e5c748a2a', 'bisa dijual', '2026-02-02 21:24:13', '2026-02-02 21:24:13'),
('a0fd2e62-da24-444e-9881-b97a9655fe44', 'tidak bisa dijual', '2026-02-02 21:24:14', '2026-02-02 21:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('a0fd2dfb-a3b2-4dbe-9d59-09b7be5c3906', 'Admin', 'admin@admin.com', NULL, '$2y$10$rxncf5.JkChn4GyZGq42vOnZrpuS4sSKtqeVkiFYwb0QGGZNL9Ep6', NULL, '2026-02-02 21:23:06', '2026-02-02 21:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`),
  ADD KEY `produks_status_id_foreign` (`status_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id_kategori`),
  ADD CONSTRAINT `produks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
