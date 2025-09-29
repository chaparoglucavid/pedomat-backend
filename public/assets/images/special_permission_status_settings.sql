-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 01:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_epermission`
--

-- --------------------------------------------------------

--
-- Table structure for table `special_permission_status_settings`
--

CREATE TABLE `special_permission_status_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `main_companies_uid` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `from_status` varchar(255) DEFAULT NULL,
  `to_status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `operation_type` varchar(255) NOT NULL DEFAULT 'confirmed',
  `query_finished` int(11) NOT NULL,
  `frequency_requirement` enum('Rəy tələbi var','Rəy tələbi yoxdur','Ümumi prosedura uyğun') DEFAULT NULL,
  `mail_status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `special_permission_status_settings`
--
ALTER TABLE `special_permission_status_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `special_permission_status_settings_uid_unique` (`uid`),
  ADD KEY `special_permission_status_settings_main_companies_uid_index` (`main_companies_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `special_permission_status_settings`
--
ALTER TABLE `special_permission_status_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `special_permission_status_settings`
--
ALTER TABLE `special_permission_status_settings`
  ADD CONSTRAINT `special_permission_status_settings_main_companies_uid_foreign` FOREIGN KEY (`main_companies_uid`) REFERENCES `main_companies` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
