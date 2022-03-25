-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2022 at 03:03 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelappdevelopment`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns_component`
--

CREATE TABLE `campaigns_component` (
  `id` blob NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convert_function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cls` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pluginID` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns_component`
--

INSERT INTO `campaigns_component` (`id`, `name`, `x_type`, `convert_function`, `description`, `template`, `cls`, `pluginID`, `created_at`, `updated_at`) VALUES
(0x484647484647, 'HDF', 'HDFH', 'HDF', 'FHFH', 'H', 'HDFRH', 0x34, '2022-02-07 04:56:41', '2022-02-07 04:56:41'),
(0x73686976753131, 'shivu', 'shivu', 'shivu', 'shivu', 'shivu', 'shivu', 0x35, '2022-02-07 05:44:53', '2022-02-07 05:44:53'),
(0x6e6d766267686e, 'nvbgn', 'vbnvbn', 'njfgh', 'nvbh', 'ghfghfg', 'gfnhfg', 0x38, '2022-02-07 23:27:53', '2022-02-07 23:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns_component1`
--

CREATE TABLE `campaigns_component1` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convert_function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cls` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pluginID` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_08_100000_create_telescope_entries_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_07_16_161755_create_sw_shops_table', 1),
(6, '2022_02_07_071805_create_campaigns_component_table', 2),
(7, '2022_02_07_080236_create_campaigns_component1_table', 3),
(8, '2022_02_08_073159_create_flights_table', 4),
(9, '2022_02_09_130228_create_newsletter_sender_table', 5),
(10, '2022_02_15_091607_create_posts_table', 6),
(11, '2022_02_21_083912_create_newsletter_recipients_group_table', 7),
(12, '2022_02_25_110226_create_demo_table', 8),
(13, '2022_03_01_080202_create_newsletter_sender_table', 9),
(14, '2022_03_03_050623_create_newsletter_sender_table', 10),
(15, '2022_03_07_112759_create_newsletter_recipients_group_table', 11),
(16, '2022_03_15_090101_create_newsletter_recipient_table', 12),
(17, '2022_03_15_093633_create_newsletter_recipient_table', 13),
(18, '2022_03_15_093806_create_newsletter_recipient_table', 14),
(19, '2022_03_15_094403_create_newsletter_recipient_table', 15),
(20, '2022_03_15_094547_create_newsletter_recipient_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_recipient`
--

CREATE TABLE `newsletter_recipient` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_recipients_group_id` bigint UNSIGNED NOT NULL,
  `customer` int NOT NULL,
  `lastmailing` int NOT NULL,
  `lastread` int NOT NULL,
  `sw_shops_shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added` datetime DEFAULT NULL,
  `double_optin_confirmed` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_recipient`
--

INSERT INTO `newsletter_recipient` (`id`, `email`, `newsletter_recipients_group_id`, `customer`, `lastmailing`, `lastread`, `sw_shops_shop_id`, `added`, `double_optin_confirmed`, `created_at`, `updated_at`) VALUES
(1, 'abc@gmail.com', 1, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', '2022-03-15 11:18:31', '2022-03-15 11:18:31', '2022-03-15 05:48:31', '2022-03-15 05:48:31'),
(3, 'secondabc@gmail.com', 1, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', '2022-03-15 11:18:31', '2022-03-15 11:18:31', '2022-03-15 06:05:37', '2022-03-15 06:05:37'),
(7, 'abc@gmail.com', 12, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', '2022-03-15 11:18:31', '2022-03-15 11:18:31', '2022-03-15 22:58:54', '2022-03-15 22:58:54'),
(9, 'karan@gmail.com', 7, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', '2022-03-15 11:18:31', '2022-03-15 11:18:31', '2022-03-16 00:03:08', '2022-03-16 00:03:08'),
(10, 'karan@gmail.com', 4, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-16 03:56:57', '2022-03-16 03:56:57'),
(11, 'karan@gmail.comccccccccccccccc', 7, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-16 03:57:18', '2022-03-16 03:57:18'),
(12, 'abc@gmail.com444444444444444', 2, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-17 03:19:11', '2022-03-17 03:19:11'),
(13, 'jay@gmail.com', 3, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-17 03:19:46', '2022-03-17 03:19:46'),
(14, 'karan@gmail.com2211333', 3, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-17 03:20:06', '2022-03-17 03:20:06'),
(15, 'karan555@gmail.combbbbbbbbbb', 3, 555, 666, 777, 'zHqwTzNT9aUUBZ0z', NULL, NULL, '2022-03-17 03:21:47', '2022-03-17 03:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_recipients_group`
--

CREATE TABLE `newsletter_recipients_group` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_shops_shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_recipients_group`
--

INSERT INTO `newsletter_recipients_group` (`id`, `name`, `sw_shops_shop_id`, `created_at`, `updated_at`) VALUES
(1, 'miral', 'zHqwTzNT9aUUBZ0z', '2022-03-07 05:59:59', '2022-03-07 05:59:59'),
(2, 'miral2', 'zHqwTzNT9aUUBZ0z', '2022-03-07 06:52:19', '2022-03-07 06:52:19'),
(3, 'bhavika34', 'zHqwTzNT9aUUBZ0z', '2022-03-07 23:13:19', '2022-03-08 01:50:35'),
(4, 'hello', 'zHqwTzNT9aUUBZ0z', '2022-03-08 03:47:50', '2022-03-14 07:12:57'),
(6, 'meera567', 'zHqwTzNT9aUUBZ0z', '2022-03-14 07:12:35', '2022-03-14 07:12:44'),
(7, 'group1', 'zHqwTzNT9aUUBZ0z', '2022-03-14 07:13:17', '2022-03-14 07:13:17'),
(8, 'group2', 'zHqwTzNT9aUUBZ0z', '2022-03-14 07:13:22', '2022-03-14 07:13:22'),
(9, 'group3', 'zHqwTzNT9aUUBZ0z', '2022-03-14 07:13:27', '2022-03-14 07:13:27'),
(12, 'group6', 'zHqwTzNT9aUUBZ0z', '2022-03-14 07:13:59', '2022-03-14 07:13:59'),
(13, 'meera567sdxsad', 'zHqwTzNT9aUUBZ0z', '2022-03-15 05:57:12', '2022-03-15 05:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_sender`
--

CREATE TABLE `newsletter_sender` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_shops_shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_sender`
--

INSERT INTO `newsletter_sender` (`id`, `email`, `name`, `sw_shops_shop_id`, `created_at`, `updated_at`) VALUES
(118, 'alexa@gmail.intttttt', '88tttttttttttttttt', 'zHqwTzNT9aUUBZ0z', '2022-03-06 22:58:02', '2022-03-10 05:33:12'),
(119, 'miral@icreativetechnologies.com', '1234456788', 'zHqwTzNT9aUUBZ0z', '2022-03-06 23:00:49', '2022-03-06 23:00:49'),
(122, 'bhavika@gmail.comssssss', 'bhavikassssss', 'zHqwTzNT9aUUBZ0z', '2022-03-08 23:26:54', '2022-03-10 07:32:03'),
(126, 'miral1234@gmail.comdfhgdfgh', 'dfgdfgdfg', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:13:22', '2022-03-09 07:13:22'),
(128, 'miral@icreativetechnologies.com88888', '34534554343', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:13:39', '2022-03-09 07:13:39'),
(129, 'bhavika1234@gmail.com', 'bhavikaaaa', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:13:53', '2022-03-09 07:13:53'),
(130, 'ppppppphp.ict3@gmail.com', 'ppppppppppppppp', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:14:14', '2022-03-09 07:14:14'),
(131, 'miral1234@gmail.com77777777777', 'hjhjk7777777777777777777777', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:19:00', '2022-03-10 07:32:34'),
(132, 'miral1234@gmail.com7', '11117', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:25:32', '2022-03-10 07:32:55'),
(133, 'admin@admin.com', 'admin', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:27:33', '2022-03-09 07:27:33'),
(134, 'admin@admin.com', '66666666666666666666', 'zHqwTzNT9aUUBZ0z', '2022-03-09 07:27:44', '2022-03-09 07:27:44'),
(135, 'hhhhhhhhhhhhhhhhhmiral1234@gmail.com', 'hhhhhhhhhhhhh', 'zHqwTzNT9aUUBZ0z', '2022-03-09 23:48:13', '2022-03-09 23:48:13'),
(136, 'php.ict3@gmail.comnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnn', 'zHqwTzNT9aUUBZ0z', '2022-03-09 23:48:24', '2022-03-09 23:48:24'),
(137, 'miral@icreativetechnologies.comnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'zHqwTzNT9aUUBZ0z', '2022-03-09 23:48:31', '2022-03-09 23:48:31'),
(138, 'lav@icreativetechnologies.comnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnnnn', 'zHqwTzNT9aUUBZ0z', '2022-03-09 23:48:41', '2022-03-09 23:48:41'),
(139, 'alexa@gmail.com', 'ravi2', 'zHqwTzNT9aUUBZ0z', '2022-03-09 23:49:07', '2022-03-09 23:49:07'),
(140, 'meeeeeeeeeeeeeeeeeeeeera@gmail.com', '111111111111111', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:14:21', '2022-03-10 05:49:08'),
(141, 'admin@admin.com2222', '2222222', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:14:31', '2022-03-10 05:14:31'),
(142, 'admin@admin.com3333', '3333333333333333333333', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:14:42', '2022-03-10 05:14:42'),
(143, 'admin@admin.com444444444', '44444444444', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:15:01', '2022-03-10 05:15:01'),
(144, 'php.ict3@gmail.com5555555555', '111111555555555555', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:29:06', '2022-03-10 05:29:06'),
(145, 'lav@icreativetechnologies.com5555555555', '55555555555555555555', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:29:15', '2022-03-10 05:29:15'),
(146, 'miral@icreativetechnologies.com555599999', '9999999999', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:29:23', '2022-03-10 05:29:23'),
(147, 'alexa@gmail.com000000000000', '10000000000', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:29:35', '2022-03-10 05:29:35'),
(148, 'miral1234@gmail.com7777777', '777777777777777771111111111111', 'zHqwTzNT9aUUBZ0z', '2022-03-10 05:29:47', '2022-03-10 05:29:47'),
(171, 'raj@raj.com', 'raj', 'zHqwTzNT9aUUBZ0z', '2022-03-17 05:32:19', '2022-03-17 05:32:19'),
(172, 'company567@gmail.com', 'hello', 'zHqwTzNT9aUUBZ0z', '2022-03-20 23:11:33', '2022-03-20 23:11:55');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sw_shops`
--

CREATE TABLE `sw_shops` (
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sw_shops`
--

INSERT INTO `sw_shops` (`shop_id`, `shop_url`, `shop_secret`, `api_key`, `secret_key`, `access_token`, `created_at`, `updated_at`) VALUES
('zHqwTzNT9aUUBZ0z', 'http://localhost/appdevelopment6470/public', 'f40999b6e24c4863a4a190c3ea843268', 'SWIARWPJRWZYU0KXTLL0D0GYNQ', 'bGlHdFEyM0M4VmQ1NVltS3FJWTRiemhxRU9mY2o2WUFtdUFiSlc', 'O:32:\"Vin\\ShopwareSdk\\Data\\AccessToken\":4:{s:11:\"accessToken\";s:678:\"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJTV0lBUldQSlJXWllVMEtYVExMMEQwR1lOUSIsImp0aSI6IjMwYzc3YjczMTVlZTdlNTBmZDIyZDE2OTg3ZmNmMzJlM2RiNjM2OGY2YjhjNGRmZDMxYWQ1OWZjMzZiNjM1ZmQ1ZjkzNTM5ZGU0M2RmYzBmIiwiaWF0IjoxNjQ3NTA2OTUxLjU3NDY3OSwibmJmIjoxNjQ3NTA2OTUxLjU3NDY4NSwiZXhwIjoxNjQ3NTA3NTUxLjU3MDgsInN1YiI6IiIsInNjb3BlcyI6WyJ3cml0ZSJdfQ.f4DfTwNX9-lnvyCLXpd4pn19TonYFZHdkXZfzi4gxTVz2Yn6lYDeQbY1qVRp4zaJ3yHITbMfixBXo-3kEBDkqIAdHwzcwpF1_BmwZLl1ow-zJySAgBQSl2NeBeUXO1nE2D1WbpBwZQByl2ajVxDKzgPoZxfnS4Yuay45Of27LWGybTYezmSXREYqCpRzQmzW_HawYWeBTdkwiWE8dbWxt_qbsymNad7AZoc15pMY2_WwK6h234XoBCtFMcRD9GN7fGcG682HYPOuz0-2JmZm8FU1IuiDBzMnniTgSXmUkOWRSEYNBSkQCywTh_Bn98hgd0nN2i1IRM224OeEeMYPaw\";s:9:\"expiresIn\";i:600;s:9:\"tokenType\";s:6:\"Bearer\";s:12:\"refreshToken\";N;}', '2022-02-04 03:56:55', '2022-03-17 03:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `campaigns_component1`
--
ALTER TABLE `campaigns_component1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_recipient`
--
ALTER TABLE `newsletter_recipient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsletter_recipient_newsletter_recipients_group_id_foreign` (`newsletter_recipients_group_id`),
  ADD KEY `newsletter_recipient_sw_shops_shop_id_foreign` (`sw_shops_shop_id`);

--
-- Indexes for table `newsletter_recipients_group`
--
ALTER TABLE `newsletter_recipients_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsletter_recipients_group_sw_shops_shop_id_foreign` (`sw_shops_shop_id`);

--
-- Indexes for table `newsletter_sender`
--
ALTER TABLE `newsletter_sender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsletter_sender_sw_shops_shop_id_foreign` (`sw_shops_shop_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sw_shops`
--
ALTER TABLE `sw_shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

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
-- AUTO_INCREMENT for table `campaigns_component1`
--
ALTER TABLE `campaigns_component1`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsletter_recipient`
--
ALTER TABLE `newsletter_recipient`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `newsletter_recipients_group`
--
ALTER TABLE `newsletter_recipients_group`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletter_sender`
--
ALTER TABLE `newsletter_sender`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83691;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `newsletter_recipient`
--
ALTER TABLE `newsletter_recipient`
  ADD CONSTRAINT `newsletter_recipient_newsletter_recipients_group_id_foreign` FOREIGN KEY (`newsletter_recipients_group_id`) REFERENCES `newsletter_recipients_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `newsletter_recipient_sw_shops_shop_id_foreign` FOREIGN KEY (`sw_shops_shop_id`) REFERENCES `sw_shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletter_recipients_group`
--
ALTER TABLE `newsletter_recipients_group`
  ADD CONSTRAINT `newsletter_recipients_group_sw_shops_shop_id_foreign` FOREIGN KEY (`sw_shops_shop_id`) REFERENCES `sw_shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletter_sender`
--
ALTER TABLE `newsletter_sender`
  ADD CONSTRAINT `newsletter_sender_sw_shops_shop_id_foreign` FOREIGN KEY (`sw_shops_shop_id`) REFERENCES `sw_shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
