-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 03:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `court`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` bigint(20) NOT NULL,
  `user_id_1` bigint(20) UNSIGNED NOT NULL,
  `user_id_2` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `user_id_1`, `user_id_2`, `created_at`, `updated_at`) VALUES
(1, 87, 88, '2021-09-29 12:20:41', '2022-06-04 06:29:40'),
(2, 87, 85, '2021-09-15 12:53:54', '2022-06-04 05:28:42'),
(4, 137, 88, '2021-10-20 09:15:40', '2022-06-04 05:28:42'),
(5, 137, 85, '2021-10-20 09:15:40', '2022-06-04 05:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Hasan Raza', 'hr1938082@gmail.com', 'asdaskmdkasmd, asklmdklasmd\r\nsajkdnaskl', '2022-06-09 05:37:14', '2022-06-09 05:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `sub_title`, `code`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'The Role of the Treatment Provider I Best Practices in Action', 'The Role of the Treatment Provider', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=37a75f99-d247-4f00-b86d-97c5b736cd65', '2022-06-08 02:33:12', '2022-06-08 02:33:12', NULL),
(2, 'The Role of the Defense Counsel I Best Practices in Action', 'The Role of the Defense Counsel', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=1c45c96f-c914-4cdf-a62b-06c769692973', '2022-06-08 02:34:11', '2022-06-08 02:34:11', NULL),
(3, 'The Role of the Prosecutor I Best Practices in Action', 'The Role of the Prosecutor', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=2c7778a3-24ae-4bf8-81b4-07c20808d555', '2022-06-08 02:37:08', '2022-06-08 02:37:08', NULL),
(4, 'The Role of the Case Manager I Best Practices in Action', 'The Role of the Case Manager', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=74ab78ba-04c2-45a6-9918-ce2f3f3ffe85', '2022-06-08 02:38:14', '2022-06-08 02:38:14', NULL),
(5, 'The Role of the Drug Court Coordinator I Best Practices in Action', 'The Role of the Drug Court Coordinator', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=e042e4e8-2de3-46da-9107-77bbca52f8f9', '2022-06-08 02:39:12', '2022-06-08 02:39:12', NULL),
(6, 'The Role of the Judge I Best Practices in Action', 'The Role of the Judge', 'code', 'https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=05c3193d-ecbb-4778-b1c0-760b2acea17f', '2022-06-08 02:40:01', '2022-06-08 02:40:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_type`, `imageable_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Course', 1, 'cd4aefa0-270f-44ba-8af1-d10c37c478f8.jpeg', '2022-06-08 02:33:13', '2022-06-08 02:33:13'),
(2, 'App\\Models\\Course', 2, '38c092c9-e5f5-4c9e-ac7d-b44b74fef6b6.jpeg', '2022-06-08 02:34:12', '2022-06-08 02:34:12'),
(3, 'App\\Models\\Course', 3, '5f509662-79b3-4a9c-991d-a62c20973437.jpeg', '2022-06-08 02:37:08', '2022-06-08 02:37:08'),
(4, 'App\\Models\\Course', 4, '199ff273-4595-4970-8be6-ac7d7cd0a1e0.jpeg', '2022-06-08 02:38:14', '2022-06-08 02:38:14'),
(5, 'App\\Models\\Course', 5, '03fddff5-0cf1-4c1d-8607-52dca77cc086.jpeg', '2022-06-08 02:39:12', '2022-06-08 02:39:12'),
(6, 'App\\Models\\Course', 6, 'db0b30c0-9e58-473d-85d2-31eeb5ed5ae3.jpeg', '2022-06-08 02:40:01', '2022-06-08 02:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender_id`, `message`, `time`, `seen`, `created_at`, `updated_at`) VALUES
(1, 5, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:00:17'),
(2, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:00:54'),
(3, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:02:17'),
(4, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:02:59'),
(5, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:03:36'),
(6, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:03:42'),
(7, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:04:26'),
(8, 4, 88, 'this is the message', 'fffff', 0, NULL, '2022-06-06 08:05:05');

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
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2022_05_13_080342_create_permission_tables', 1),
(36, '2022_05_17_132742_create_courses_table', 1),
(37, '2022_05_18_081857_create_images_table', 1),
(38, '2022_05_24_103852_add_soft_delete_column_to_users_table', 1),
(39, '2022_06_09_094736_create_contact_us_table', 2),
(48, '2022_06_10_111330_create_schedules_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Admin', '17e6dcdc264c9735dd39295fcc9c45c017294b60855375851d6f21f4b7b1d9bf', '[\"*\"]', '2022-06-08 07:54:28', '2022-06-07 03:44:48', '2022-06-08 07:54:28'),
(2, 'App\\Models\\User', 1, 'Admin', '7e92282c767c8f36f058fa526216ab4014aa5eeb88494bb95a9ad607c61f17db', '[\"*\"]', NULL, '2022-06-07 04:38:23', '2022-06-07 04:38:23'),
(3, 'App\\Models\\User', 1, 'Admin', 'aa5086f6de3b32b777d68f884881119a277f9ae9b600fbab932822eafc3b5b2a', '[\"*\"]', '2022-06-09 08:14:25', '2022-06-09 05:20:47', '2022-06-09 08:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-07 03:39:59', '2022-06-07 03:39:59'),
(2, 'User', 'web', '2022-06-07 03:40:15', '2022-06-07 03:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `UUID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAllDay` tinyint(4) NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('allday','time') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dueDateClass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dragBgColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borderColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPrivate` tinyint(4) NOT NULL,
  `calendarId` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`UUID`, `title`, `isAllDay`, `start`, `end`, `category`, `dueDateClass`, `color`, `bgColor`, `dragBgColor`, `borderColor`, `location`, `isPrivate`, `calendarId`, `user_id`, `created_at`, `updated_at`) VALUES
('6fec53b7-fa68-5720-8452-b429580efb8b', 'asklk', 0, '2022-06-01T13:30:00.000Z', '2022-06-03T14:30:00.000Z', 'time', NULL, '#ffffff', '#9e5fff', '#9e5fff', '#9e5fff', 'askldm', 0, 1, 6, '2022-06-10 08:55:57', '2022-06-10 08:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurisdiction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_varified` tinyint(4) NOT NULL DEFAULT 0,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `socket_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `jurisdiction`, `email`, `email_varified`, `phone_number`, `password`, `otp`, `socket_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hasan Raza', NULL, NULL, 'admin@bcg-northamerica.com', 0, '023151', '$2y$10$i5TvFtbNmbCJXZvml4OYDOPcuZzwh7sEV8Pap.Ol3X09Kc6DbZ1Py', NULL, NULL, '2022-06-07 08:41:57', NULL, NULL),
(4, 'Hasan Raza', 'user', 'user', 'user@gmail.com', 0, '564612561', '$2y$10$NeavvY54Y.4nMvjrqMi3X.yvxy/tX5VUbYshZc2YBPTfHHiLEr68a', NULL, NULL, '2022-06-07 06:28:30', '2022-06-07 06:58:26', NULL),
(6, 'Hasan Raza', 'user', 'user', 'user2@gmail.com', 1, '68453154', '$2y$10$eP1YG4f4UVeuoLEztOAj5uI3T5YDflzu1rJ9IHeXXgQ27matEcUI2', NULL, NULL, '2022-06-07 07:23:05', '2022-06-07 07:23:52', NULL),
(7, 'test user', 'test', 'test', 'test@mail.com', 0, '3545616', '$2y$10$aomBmx3pXtWenxaxLyh18ej3po1QKClqdi3NTuh7YWiZ8ps7d5Pf2', NULL, NULL, '2022-06-08 02:54:18', '2022-06-08 02:54:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `student_id` (`user_id_1`),
  ADD KEY `tutor_id` (`user_id_2`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`UUID`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
