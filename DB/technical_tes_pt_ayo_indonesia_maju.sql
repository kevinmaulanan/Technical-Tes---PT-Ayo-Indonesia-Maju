-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 05:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical_tes_pt_ayo_indonesia_maju`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_29_071403_team', 1),
(2, '2020_05_29_074955_positions', 1),
(3, '2020_05_29_075138_player', 1),
(4, '2020_05_29_075213_schedule', 1),
(5, '2020_05_29_075347_result', 1),
(6, '2020_05_31_003740_results', 2),
(7, '2020_05_31_004040_results_players', 2),
(8, '2020_05_31_004800_results_players', 3),
(9, '2020_05_31_015753_results_players', 4);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_tall` int(11) NOT NULL,
  `player_weight` int(11) NOT NULL,
  `player_nomor` int(11) NOT NULL,
  `id_position` bigint(20) UNSIGNED NOT NULL,
  `id_team` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `player_tall`, `player_weight`, `player_nomor`, `id_position`, `id_team`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kevman', 168, 60, 10, 1, 3, NULL, '2020-05-30 22:15:55', NULL),
(2, 'Ceristian Gonzales', 172, 68, 99, 1, 2, NULL, NULL, NULL),
(3, 'Markus', 170, 65, 1, 4, 2, NULL, NULL, NULL),
(4, 'Atep', 168, 68, 20, 1, 2, NULL, NULL, NULL),
(5, 'Maman Abdurahman', 168, 65, 21, 1, 2, NULL, '2020-05-31 07:30:46', NULL),
(6, 'Kevin', 168, 68, 2, 3, 3, NULL, NULL, NULL),
(7, 'Abdul', 179, 70, 6, 3, 7, NULL, NULL, NULL),
(8, 'Rizki', 168, 53, 12, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Penyerang', NULL, NULL, NULL),
(2, 'Gelandang', NULL, NULL, NULL),
(3, 'Bertahan', NULL, NULL, NULL),
(4, 'Penjaga Gawang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_schedule` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `score`, `id_schedule`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 - 6', 3, NULL, '2020-05-31 10:12:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results_players`
--

CREATE TABLE `results_players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gol_time` time NOT NULL,
  `id_player` bigint(20) UNSIGNED NOT NULL,
  `id_team` bigint(20) UNSIGNED NOT NULL,
  `id_result` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results_players`
--

INSERT INTO `results_players` (`id`, `gol_time`, `id_player`, `id_team`, `id_result`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '21:34:00', 8, 4, 1, NULL, NULL, NULL),
(5, '19:55:00', 5, 2, 1, NULL, NULL, NULL),
(6, '19:56:00', 3, 2, 1, NULL, NULL, NULL),
(7, '19:57:00', 4, 2, 1, NULL, NULL, NULL),
(8, '19:57:00', 4, 2, 1, NULL, NULL, NULL),
(9, '19:01:00', 4, 2, 1, NULL, NULL, NULL),
(10, '22:11:00', 2, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `id_host` bigint(20) UNSIGNED NOT NULL,
  `id_guest` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `match_date`, `match_time`, `id_host`, `id_guest`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '2020-05-16', '19:36:00', 4, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_since` date NOT NULL,
  `team_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_logo`, `team_since`, `team_address`, `team_city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Persib Bandung', 'Tim-Persib Bandung-1590849460.png', '2020-05-30', 'Bandung', 'Bandung', NULL, '2020-05-30 21:57:16', NULL),
(3, 'Persija Jakarta', 'Tim-Persija-1590849637.png', '2020-05-15', 'Jakarta', 'Jakarta', NULL, '2020-05-31 07:32:33', NULL),
(4, 'Persebaya', 'Tim-Persebaya-1590854106.png', '2020-05-30', 'Surabaya', 'Surabaya', NULL, NULL, NULL),
(5, 'Arema', 'Tim-Arema-1590854169.png', '2020-05-30', 'Malang', 'Malang', NULL, NULL, NULL),
(6, 'Persela', 'Tim-Persela-1590854224.png', '2020-05-30', 'Lamongan', 'Lamongan', NULL, NULL, NULL),
(7, 'Persikabo', 'Tim-Persikabo-1590854272.png', '2020-05-30', 'Bogor', 'Bogor', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_player_name_unique` (`player_name`),
  ADD KEY `players_id_position_foreign` (`id_position`),
  ADD KEY `players_id_team_foreign` (`id_team`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_position_unique` (`position`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_id_schedule_foreign` (`id_schedule`);

--
-- Indexes for table `results_players`
--
ALTER TABLE `results_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_players_id_player_foreign` (`id_player`),
  ADD KEY `results_players_id_team_foreign` (`id_team`),
  ADD KEY `results_players_id_result_foreign` (`id_result`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_id_host_foreign` (`id_host`),
  ADD KEY `schedules_id_guest_foreign` (`id_guest`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_team_name_unique` (`team_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results_players`
--
ALTER TABLE `results_players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_id_position_foreign` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `players_id_team_foreign` FOREIGN KEY (`id_team`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_id_schedule_foreign` FOREIGN KEY (`id_schedule`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results_players`
--
ALTER TABLE `results_players`
  ADD CONSTRAINT `results_players_id_player_foreign` FOREIGN KEY (`id_player`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_players_id_result_foreign` FOREIGN KEY (`id_result`) REFERENCES `results` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_players_id_team_foreign` FOREIGN KEY (`id_team`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_id_guest_foreign` FOREIGN KEY (`id_guest`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_id_host_foreign` FOREIGN KEY (`id_host`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
