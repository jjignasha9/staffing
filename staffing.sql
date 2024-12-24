-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 07:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `employee_id`, `client_id`, `start`, `end`, `hours`, `created_at`, `updated_at`) VALUES
(7, 2, 3, '2024-12-13 07:30:00', '2024-12-13 17:00:00', 10, '2024-12-13 03:01:54', '2024-12-13 03:01:57'),
(8, 2, 6, '2024-12-10 07:00:00', '2024-12-10 16:00:00', 9, '2024-12-13 09:06:40', '2024-12-13 09:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(22, 1, 2, 'hello', 1, '2022-04-11 22:43:52', '2022-04-12 01:13:29'),
(23, 2, 1, 'hello', 1, '2022-04-12 01:12:01', '2022-04-12 01:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `client_employees`
--

CREATE TABLE `client_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_employees`
--

INSERT INTO `client_employees` (`id`, `employee_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 5, 6, '2022-03-16 19:12:55', '2022-03-30 20:04:44'),
(3, 8, 3, '2022-04-07 23:35:55', '2022-04-07 23:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `client_supervisors`
--

CREATE TABLE `client_supervisors` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_supervisors`
--

INSERT INTO `client_supervisors` (`client_id`, `supervisor_id`, `created_at`, `updated_at`) VALUES
(3, 4, NULL, NULL),
(6, 7, '2022-03-30 20:06:10', '2022-03-30 20:06:10');

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
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `date`, `created_at`, `updated_at`) VALUES
(2, 'holi', '2022-04-18', '2022-04-09 00:43:34', '2022-04-09 01:34:12'),
(3, 'eid', '2022-04-21', '2022-04-09 00:44:26', '2022-04-09 00:44:26'),
(4, 'New Year Holiday', '2022-01-02', '2022-04-09 01:29:22', '2022-04-09 01:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `invite_users`
--

CREATE TABLE `invite_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invite_users`
--

INSERT INTO `invite_users` (`id`, `name`, `email`, `is_registered`, `created_at`, `updated_at`) VALUES
(1, 'devid', 'devid@gmail.com', 0, '2022-04-09 02:03:54', '2022-04-09 02:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timesheet_id` bigint(20) UNSIGNED NOT NULL,
  `day_weekend` date NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `terms_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `timesheet_id`, `day_weekend`, `client_id`, `employee_id`, `status_id`, `terms_id`, `total_amount`, `bill_date`, `due_date`, `file`, `created_at`, `updated_at`) VALUES
(2, 18, '2022-04-24', 3, 2, 2, 2, 760.00, '2022-04-11', '2022-05-11', '/storage/invoices/invoices_2.pdf', '2022-04-12 01:41:22', '2022-09-06 00:45:51'),
(3, 18, '2022-04-24', 3, 2, 1, 2, 760.00, '2024-12-12', '2025-01-11', '/storage/invoices/invoices_3.pdf', '2024-12-12 00:33:59', '2024-12-12 00:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `bill_rate` double(8,2) NOT NULL,
  `hours` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `shift_id`, `bill_rate`, `hours`, `total_amount`, `created_at`, `updated_at`) VALUES
(279, 2, 2, 10.00, 8.00, 80.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(280, 2, 2, 10.00, 8.00, 80.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(281, 2, 3, 15.00, 8.00, 120.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(282, 2, 5, 25.00, 8.00, 200.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(283, 2, 2, 10.00, 8.00, 80.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(284, 2, 5, 25.00, 8.00, 200.00, '2022-04-12 01:41:22', '2022-04-12 01:41:22'),
(285, 3, 2, 10.00, 8.00, 80.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59'),
(286, 3, 2, 10.00, 8.00, 80.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59'),
(287, 3, 3, 15.00, 8.00, 120.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59'),
(288, 3, 5, 25.00, 8.00, 200.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59'),
(289, 3, 2, 10.00, 8.00, 80.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59'),
(290, 3, 5, 25.00, 8.00, 200.00, '2024-12-12 00:33:59', '2024-12-12 00:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_statuses`
--

CREATE TABLE `invoice_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_statuses`
--

INSERT INTO `invoice_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', NULL, NULL),
(2, 'sent', NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_02_15_072215_create_roles_table', 1),
(5, '2022_02_15_072216_create_shifts_table', 1),
(6, '2022_02_15_072217_create_timesheet_statuses_table', 1),
(7, '2022_02_15_072218_create_users_table', 1),
(8, '2022_02_15_072219_create_rates_table', 1),
(9, '2022_02_23_195037_create_client_supervisors_table', 1),
(10, '2022_03_01_072224_create_client_employees_table', 1),
(11, '2022_03_01_093020_create_timesheets_table', 1),
(12, '2022_03_01_093553_create_workdays_table', 1),
(13, '2022_03_01_093558_create_booking_table', 1),
(14, '2022_03_01_093559_create_chat_table', 1),
(15, '2022_03_01_093560_create_payroll_statuses_table', 2),
(17, '2022_03_01_093562_create_payroll_items_table', 2),
(20, '2022_03_24_085058_create_invoice_statuses_table', 3),
(21, '2022_03_24_085059_create_terms_table', 3),
(25, '2022_03_24_085061_create_invoice_items_table', 4),
(27, '2022_03_01_093558_create_bookings_table', 6),
(28, '2022_03_01_093559_create_chats_table', 6),
(29, '2022_03_24_085062_crete_invite_users_table', 7),
(30, '2022_04_07_053035_crete_holidays_table', 7),
(31, '2022_03_01_093561_create_payrolls_table', 8),
(32, '2022_03_24_085060_create_invoices_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$10$gIGWiKy7/C24VEqgTB.hmOfZgbPwUGpU8lO/P7/DPcRCsUYfcWtjm', '2024-12-11 23:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timesheet_id` bigint(20) UNSIGNED NOT NULL,
  `day_weekend` date NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `timesheet_id`, `day_weekend`, `total_amount`, `status_id`, `created_at`, `updated_at`) VALUES
(8, 18, '2022-04-24', 520.00, 1, '2022-04-12 01:40:18', '2022-04-12 01:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `pay_rate` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`id`, `payroll_id`, `shift_id`, `pay_rate`, `hours`, `total_amount`, `created_at`, `updated_at`) VALUES
(212, 8, 2, 5, 8, 40, '2022-04-12 01:40:18', '2022-04-12 01:40:18'),
(213, 8, 2, 5, 8, 40, '2022-04-12 01:40:18', '2022-04-12 01:40:18'),
(214, 8, 3, 10, 8, 80, '2022-04-12 01:40:18', '2022-04-12 01:40:18'),
(215, 8, 5, 20, 8, 160, '2022-04-12 01:40:18', '2022-04-12 01:40:18'),
(216, 8, 2, 5, 8, 40, '2022-04-12 01:40:18', '2022-04-12 01:40:18'),
(217, 8, 5, 20, 8, 160, '2022-04-12 01:40:18', '2022-04-12 01:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_statuses`
--

CREATE TABLE `payroll_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_statuses`
--

INSERT INTO `payroll_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', NULL, NULL),
(2, 'paid', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `pay_rate` int(11) NOT NULL,
  `bill_rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `client_id`, `employee_id`, `shift_id`, `pay_rate`, `bill_rate`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, 5, '2022-03-16 19:07:51', '2022-03-16 19:07:51'),
(2, 3, 2, 2, 5, 10, '2022-03-16 19:08:02', '2022-03-16 19:08:02'),
(3, 3, 2, 3, 10, 15, '2022-03-16 19:08:15', '2022-03-16 19:08:15'),
(4, 3, 2, 4, 15, 20, '2022-03-16 19:08:27', '2022-03-16 19:08:27'),
(5, 3, 2, 5, 20, 25, '2022-03-16 19:08:43', '2022-03-16 19:08:43'),
(6, 3, 5, 3, 8, 13, '2022-03-16 19:20:18', '2022-03-16 19:20:18'),
(8, 3, 5, 5, 12, 12, '2022-03-22 01:41:42', '2022-03-22 01:41:42'),
(9, 3, 5, 4, 5, 15, '2022-03-22 02:32:36', '2022-03-22 02:32:36'),
(10, 3, 2, 1, 5, 5, '2022-03-30 20:11:48', '2022-03-30 20:11:48'),
(11, 6, 5, 2, 7, 9, '2022-03-30 20:52:12', '2022-03-30 20:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'employee', NULL, NULL),
(3, 'client', NULL, NULL),
(4, 'supervisor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'regular', NULL, NULL),
(2, '1st shift', NULL, NULL),
(3, '2nd shift', NULL, NULL),
(4, '3rd shift', NULL, NULL),
(5, 'we shift', NULL, NULL),
(6, '3rd shift', '2022-04-07 23:22:16', '2022-04-07 23:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NET 15', NULL, NULL),
(2, 'NET 30', NULL, NULL),
(3, 'NET 45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_weekend` date NOT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_invoiced` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `employee_id`, `client_id`, `supervisor_id`, `day_weekend`, `submitted_at`, `approved_at`, `approved_by`, `status_id`, `is_paid`, `is_invoiced`, `created_at`, `updated_at`) VALUES
(16, 2, 3, 4, '2022-04-10', '2022-04-08 22:17:23', '2022-04-08 22:23:03', 4, 3, 0, 0, '2022-04-09 02:17:16', '2022-04-09 02:23:33'),
(17, 2, 3, 4, '2022-04-17', '2022-04-11 20:53:49', '2022-04-11 20:54:09', 4, 3, 0, 0, '2022-04-09 02:17:33', '2022-04-12 01:31:05'),
(18, 2, 3, 4, '2022-04-24', '2022-04-11 21:29:42', '2022-04-11 21:30:16', 4, 3, 1, 1, '2022-04-12 01:29:19', '2024-12-12 00:33:59'),
(19, 2, 3, 4, '2022-09-11', '2022-09-06 15:20:41', NULL, NULL, 2, 0, 0, '2022-09-06 19:20:32', '2022-09-06 19:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_statuses`
--

CREATE TABLE `timesheet_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheet_statuses`
--

INSERT INTO `timesheet_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'draft', NULL, NULL),
(2, 'pending', NULL, NULL),
(3, 'approved', NULL, NULL),
(4, 'rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', 'Surat', '$2y$10$8PBJYIQ4zBpZ4uX2otOixujJ5SoW6VJxYP3ggPRQcXCI5D22NpBa.', 1, NULL, NULL),
(2, 'John', 'john@example.com', 'Surat', '$2y$10$8PBJYIQ4zBpZ4uX2otOixujJ5SoW6VJxYP3ggPRQcXCI5D22NpBa.', 2, NULL, NULL),
(3, 'Robert', 'robert@example.com', 'Surat', '$2y$10$UuBXM0dKLxefadqj7Ra5sO1XyuNj2qHVJXQBVA1.0Pbcg5mULK29K', 3, NULL, NULL),
(4, 'Matthew', 'matthew@example.com', 'Surat', '$2y$10$6dQfU0sZCbhM0nGlhj7ki.alikVtjXgoq1MvZ3AYnCg/qQPFNVj3u', 4, NULL, NULL),
(5, 'devid', 'devid@gmail.com', 'bombay', '$2y$10$8PBJYIQ4zBpZ4uX2otOixujJ5SoW6VJxYP3ggPRQcXCI5D22NpBa.', 2, '2022-03-16 19:12:54', '2022-03-16 19:12:54'),
(6, 'roy', 'roy@gmail.com', 'bombay', '$2y$10$aPV/vGouwugMYgkmVc0xRuLBgPkt/m9MC0UNxm2gBlAXP1siVxEey', 3, '2022-03-30 20:04:29', '2022-03-30 20:04:29'),
(7, 'roysuper', 'roysuper@gmail.com', 'surat', '$2y$10$2pD0235P8/q9466xGLK6Z.4TZoRo6ifGFOxKCHvGcNDAkU16Oa2QG', 4, '2022-03-30 20:06:10', '2022-03-30 20:06:10'),
(9, 'test', 'test@gmail.com', 'surat', '123456789', 3, NULL, NULL),
(10, 'admin', 'admin@gmail.com', NULL, '$2y$10$L7kRHKx5V/7uiaA2r7va1Ox3ctD0SJxLZW5r6tOvbAtmL1y8bi/5W', 1, '2024-12-12 00:33:11', '2024-12-12 00:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `workdays`
--

CREATE TABLE `workdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timesheet_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `break` double(8,2) NOT NULL,
  `total_hours` double(8,2) NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workdays`
--

INSERT INTO `workdays` (`id`, `timesheet_id`, `date`, `in_time`, `out_time`, `break`, `total_hours`, `shift_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-14', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-14 23:53:44', '2022-03-14 23:53:44'),
(2, 1, '2022-03-15', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-14 23:53:47', '2022-03-14 23:53:47'),
(3, 1, '2022-03-16', '09:00:00', '17:00:00', 1.00, 7.00, 3, NULL, '2022-03-16 19:10:20', '2022-03-16 19:10:20'),
(4, 1, '2022-03-17', '09:00:00', '13:00:00', 1.00, 3.00, 4, NULL, '2022-03-16 19:10:31', '2022-03-16 19:10:31'),
(5, 2, '2022-03-21', '09:00:00', '16:00:00', 1.50, 5.50, 3, NULL, '2022-03-16 19:11:39', '2022-03-16 19:11:39'),
(6, 2, '2022-03-22', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-16 19:11:55', '2022-03-16 19:11:55'),
(7, 2, '2022-03-23', '09:00:00', '18:00:00', 1.00, 8.00, 4, NULL, '2022-03-16 19:12:00', '2022-03-16 19:12:00'),
(8, 2, '2022-03-24', '09:00:00', '18:00:00', 1.00, 8.00, 3, NULL, '2022-03-16 19:12:06', '2022-03-16 19:12:06'),
(9, 3, '2022-03-21', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-16 19:18:57', '2022-03-22 02:32:03'),
(10, 3, '2022-03-22', '09:00:00', '17:00:00', 1.00, 7.00, 3, NULL, '2022-03-16 19:19:12', '2022-03-22 02:31:56'),
(11, 3, '2022-03-23', '08:00:00', '18:00:00', 0.50, 9.50, 4, NULL, '2022-03-16 19:19:25', '2022-03-22 02:31:52'),
(12, 4, '2022-03-14', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-16 19:21:39', '2022-03-16 19:21:39'),
(13, 4, '2022-03-15', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-16 19:21:42', '2022-03-16 19:21:42'),
(14, 4, '2022-03-16', '09:00:00', '18:00:00', 1.00, 8.00, 3, NULL, '2022-03-16 19:21:48', '2022-03-16 19:21:48'),
(15, 3, '2022-03-24', '09:00:00', '17:00:00', 1.00, 7.00, 5, NULL, '2022-03-22 01:42:40', '2022-03-22 01:42:40'),
(16, 2, '2022-03-25', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-23 02:20:48', '2022-03-23 02:20:48'),
(17, 2, '2022-03-26', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-23 02:25:06', '2022-03-23 02:25:06'),
(18, 5, '2022-03-28', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-23 03:02:00', '2022-03-23 03:02:00'),
(19, 5, '2022-03-29', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-23 03:02:03', '2022-03-23 03:02:06'),
(20, 5, '2022-03-30', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-23 03:02:08', '2022-03-23 03:02:08'),
(21, 6, '2022-03-28', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-29 00:29:42', '2022-03-29 00:29:42'),
(22, 7, '2022-03-29', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-03-30 20:05:14', '2022-03-30 20:05:14'),
(23, 7, '2022-03-30', '09:00:00', '18:00:00', 0.50, 8.50, 2, NULL, '2022-03-30 21:25:39', '2022-03-30 21:25:39'),
(24, 8, '2022-04-04', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-04 22:40:42', '2022-04-04 22:40:42'),
(25, 8, '2022-04-05', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-04 22:40:47', '2022-04-04 22:40:47'),
(26, 8, '2022-04-06', '09:00:00', '18:00:00', 1.00, 8.00, 3, NULL, '2022-04-04 22:40:53', '2022-04-04 22:40:53'),
(27, 9, '2022-04-12', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-04 22:41:04', '2022-04-04 22:41:04'),
(28, 10, '2022-04-05', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-04 22:41:16', '2022-04-04 22:41:16'),
(29, 10, '2022-04-07', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-04 22:41:20', '2022-04-04 22:41:20'),
(30, 11, '2022-04-12', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-04 22:42:15', '2022-04-04 22:42:15'),
(31, 12, '2022-04-05', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-05 00:10:09', '2022-04-05 00:10:09'),
(32, 12, '2022-04-07', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-05 00:10:14', '2022-04-05 00:10:14'),
(33, 13, '2022-04-12', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-05 00:12:04', '2022-04-05 00:12:04'),
(34, 13, '2022-04-15', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-05 00:12:09', '2022-04-05 00:12:09'),
(35, 14, '2022-04-05', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-05 01:13:47', '2022-04-05 01:13:47'),
(36, 14, '2022-04-07', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-05 01:13:59', '2022-04-05 01:13:59'),
(37, 15, '2022-04-12', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-05 01:14:13', '2022-04-05 01:14:13'),
(38, 15, '2022-04-14', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-05 01:14:18', '2022-04-05 01:14:18'),
(39, 16, '2022-04-05', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-09 02:17:16', '2022-04-09 02:17:16'),
(40, 16, '2022-04-06', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-09 02:17:20', '2022-04-09 02:17:20'),
(41, 17, '2022-04-12', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-09 02:17:33', '2022-04-09 02:17:33'),
(42, 17, '2022-04-14', '09:00:00', '18:00:00', 1.00, 8.00, 1, NULL, '2022-04-09 02:17:36', '2022-04-09 02:17:36'),
(43, 17, '2022-04-11', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-12 00:45:30', '2022-04-12 00:45:30'),
(44, 17, '2022-04-13', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-12 00:45:33', '2022-04-12 00:45:33'),
(45, 17, '2022-04-15', '09:00:00', '18:00:00', 1.00, 8.00, 3, NULL, '2022-04-12 00:45:37', '2022-04-12 00:45:37'),
(46, 17, '2022-04-16', '09:00:00', '18:00:00', 1.00, 8.00, 5, NULL, '2022-04-12 00:45:41', '2022-04-12 00:45:41'),
(47, 17, '2022-04-17', '09:00:00', '18:00:00', 1.00, 8.00, 5, NULL, '2022-04-12 00:45:44', '2022-04-12 00:45:44'),
(48, 18, '2022-04-18', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-12 01:29:19', '2022-04-12 01:29:19'),
(49, 18, '2022-04-19', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-12 01:29:21', '2022-04-12 01:29:21'),
(50, 18, '2022-04-20', '09:00:00', '18:00:00', 1.00, 8.00, 3, NULL, '2022-04-12 01:29:25', '2022-04-12 01:29:25'),
(51, 18, '2022-04-21', '09:00:00', '18:00:00', 1.00, 8.00, 5, NULL, '2022-04-12 01:29:28', '2022-04-12 01:29:28'),
(52, 18, '2022-04-22', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-04-12 01:29:30', '2022-04-12 01:29:30'),
(53, 18, '2022-04-23', '09:00:00', '18:00:00', 1.00, 8.00, 6, NULL, '2022-04-12 01:29:34', '2022-04-12 01:29:34'),
(54, 18, '2022-04-24', '09:00:00', '18:00:00', 1.00, 8.00, 5, NULL, '2022-04-12 01:29:39', '2022-04-12 01:29:39'),
(55, 19, '2022-09-06', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-09-06 19:20:32', '2022-09-06 19:20:32'),
(56, 19, '2022-09-08', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-09-06 19:20:35', '2022-09-06 19:20:35'),
(57, 19, '2022-09-10', '09:00:00', '18:00:00', 1.00, 8.00, 2, NULL, '2022-09-06 19:20:37', '2022-09-06 19:20:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_employee_id_foreign` (`employee_id`),
  ADD KEY `bookings_client_id_foreign` (`client_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_employees`
--
ALTER TABLE `client_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_employees_employee_id_foreign` (`employee_id`),
  ADD KEY `client_employees_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_supervisors`
--
ALTER TABLE `client_supervisors`
  ADD KEY `client_supervisors_client_id_foreign` (`client_id`),
  ADD KEY `client_supervisors_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite_users`
--
ALTER TABLE `invite_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_timesheet_id_foreign` (`timesheet_id`),
  ADD KEY `invoices_status_id_foreign` (`status_id`),
  ADD KEY `invoices_terms_id_foreign` (`terms_id`),
  ADD KEY `invoices_client_id_foreign` (`client_id`),
  ADD KEY `invoices_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `invoice_statuses`
--
ALTER TABLE `invoice_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_timesheet_id_foreign` (`timesheet_id`),
  ADD KEY `payrolls_status_id_foreign` (`status_id`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_items_payroll_id_foreign` (`payroll_id`),
  ADD KEY `payroll_items_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `payroll_statuses`
--
ALTER TABLE `payroll_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_client_id_foreign` (`client_id`),
  ADD KEY `rates_employee_id_foreign` (`employee_id`),
  ADD KEY `rates_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheets_employee_id_foreign` (`employee_id`),
  ADD KEY `timesheets_client_id_foreign` (`client_id`),
  ADD KEY `timesheets_supervisor_id_foreign` (`supervisor_id`),
  ADD KEY `timesheets_approved_by_foreign` (`approved_by`),
  ADD KEY `timesheets_status_id_foreign` (`status_id`);

--
-- Indexes for table `timesheet_statuses`
--
ALTER TABLE `timesheet_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`);

--
-- Indexes for table `workdays`
--
ALTER TABLE `workdays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workdays_timesheet_id_foreign` (`timesheet_id`),
  ADD KEY `workdays_shift_id_foreign` (`shift_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_employees`
--
ALTER TABLE `client_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invite_users`
--
ALTER TABLE `invite_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `invoice_statuses`
--
ALTER TABLE `invoice_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `payroll_statuses`
--
ALTER TABLE `payroll_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `timesheet_statuses`
--
ALTER TABLE `timesheet_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workdays`
--
ALTER TABLE `workdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `client_employees`
--
ALTER TABLE `client_employees`
  ADD CONSTRAINT `client_employees_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `client_employees_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `client_supervisors`
--
ALTER TABLE `client_supervisors`
  ADD CONSTRAINT `client_supervisors_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `client_supervisors_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoices_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoices_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `invoice_statuses` (`id`),
  ADD CONSTRAINT `invoices_terms_id_foreign` FOREIGN KEY (`terms_id`) REFERENCES `terms` (`id`),
  ADD CONSTRAINT `invoices_timesheet_id_foreign` FOREIGN KEY (`timesheet_id`) REFERENCES `timesheets` (`id`);

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_items_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`);

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `payroll_statuses` (`id`),
  ADD CONSTRAINT `payrolls_timesheet_id_foreign` FOREIGN KEY (`timesheet_id`) REFERENCES `timesheets` (`id`);

--
-- Constraints for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD CONSTRAINT `payroll_items_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`),
  ADD CONSTRAINT `payroll_items_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rates_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rates_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`);

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `timesheets_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `timesheets_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `timesheets_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `timesheet_statuses` (`id`),
  ADD CONSTRAINT `timesheets_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `workdays`
--
ALTER TABLE `workdays`
  ADD CONSTRAINT `workdays_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`),
  ADD CONSTRAINT `workdays_timesheet_id_foreign` FOREIGN KEY (`timesheet_id`) REFERENCES `timesheets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
