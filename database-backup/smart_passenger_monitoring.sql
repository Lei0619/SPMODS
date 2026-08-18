-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2026 at 08:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_passenger_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `license_number`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vilma', 'Shields', 'LIC-34477', '09676895720', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(2, 'Madyson', 'Schaefer', 'LIC-14706', '09114396549', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(3, 'Kenneth', 'Kreiger', 'LIC-30627', '09798598162', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 'Sabryna', 'Gutmann', 'LIC-20967', '09194481033', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 'Lempi', 'Hodkiewicz', 'LIC-76745', '09029651448', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 'Doug', 'Tremblay', 'LIC-46706', '09143354029', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 'Matilda', 'Langosh', 'LIC-67371', '09484309375', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 'Augustine', 'Heidenreich', 'LIC-03718', '09435608564', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 'Sylvan', 'Adams', 'LIC-69900', '09685728586', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 'Maybell', 'Adams', 'LIC-17252', '09310835491', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(11, 'Ruby', 'Kuhn', 'LIC-06682', '09006367768', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(12, 'Thurman', 'Rutherford', 'LIC-51793', '09831928757', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(13, 'Roberto', 'Pfeffer', 'LIC-03774', '09668954881', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(14, 'Stephen', 'Rath', 'LIC-43662', '09056414550', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(15, 'Sarai', 'Kirlin', 'LIC-76759', '09500696428', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(16, 'Ephraim', 'Bruen', 'LIC-21204', '09331966116', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(17, 'Colleen', 'Hahn', 'LIC-54803', '09532220839', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(18, 'Emelia', 'Schoen', 'LIC-13548', '09886417857', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(19, 'Mathew', 'Kihn', 'LIC-74672', '09825703410', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(20, 'Maye', 'Hirthe', 'LIC-74715', '09020077482', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(21, 'Gerald', 'McDermott', 'LIC-20091', '09362049164', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(22, 'Johann', 'Breitenberg', 'LIC-75094', '09389269302', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(23, 'Tianna', 'Stehr', 'LIC-88194', '09444632438', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(24, 'Sydney', 'Welch', 'LIC-23790', '09849284649', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(25, 'Jacques', 'Murphy', 'LIC-78954', '09764807777', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(26, 'Dolly', 'Schumm', 'LIC-65234', '09688066058', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(27, 'Clementine', 'Parker', 'LIC-58697', '09346727566', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(28, 'Gisselle', 'Marquardt', 'LIC-86620', '09765093446', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(29, 'Ally', 'Keeling', 'LIC-28091', '09169451117', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(30, 'Danny', 'Renner', 'LIC-19898', '09648316250', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(31, 'Trevion', 'Schuppe', 'LIC-54432', '09277710300', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(32, 'Jovan', 'Stanton', 'LIC-38331', '09341961930', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(33, 'Rudolph', 'Wolff', 'LIC-46867', '09167054302', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(34, 'Lilly', 'Smith', 'LIC-84529', '09021762142', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(35, 'Marcus', 'Pfeffer', 'LIC-17880', '09240242442', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(36, 'Raphael', 'Wolff', 'LIC-73873', '09367827671', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(37, 'Guillermo', 'Littel', 'LIC-89676', '09986957969', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(38, 'Ashlynn', 'Bogisich', 'LIC-89494', '09611122028', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(39, 'Jerod', 'Bauch', 'LIC-80687', '09181278197', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(40, 'Zora', 'Quigley', 'LIC-56244', '09942910534', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(41, 'Delores', 'Willms', 'LIC-24727', '09816262873', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(42, 'Leda', 'Volkman', 'LIC-30871', '09082027294', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(43, 'Adriel', 'Schinner', 'LIC-58068', '09900344969', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(44, 'Marjory', 'Mayer', 'LIC-94637', '09955404745', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(45, 'Millie', 'Conn', 'LIC-67009', '09967149449', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(46, 'Dolly', 'Romaguera', 'LIC-72154', '09392185776', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(47, 'Gwendolyn', 'Yundt', 'LIC-09781', '09223998310', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(48, 'Maxwell', 'Stoltenberg', 'LIC-06685', '09114622992', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(49, 'Davion', 'Mitchell', 'LIC-20156', '09338868083', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(50, 'Jeanie', 'Rath', 'LIC-29409', '09925980581', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(51, 'Salvador', 'Durgan', 'LIC-08097', '09646041219', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(52, 'Myrtle', 'Padberg', 'LIC-55870', '09723281731', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(53, 'Scarlett', 'Bernier', 'LIC-16782', '09763546694', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(54, 'Jeffry', 'Kautzer', 'LIC-44944', '09832160082', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(55, 'Kareem', 'Littel', 'LIC-02621', '09558536411', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(56, 'Genoveva', 'Hackett', 'LIC-05723', '09090190455', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(57, 'Raven', 'Schuppe', 'LIC-88842', '09172809180', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(58, 'Bobbie', 'Schoen', 'LIC-52951', '09183977233', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(59, 'Ludwig', 'Kuhic', 'LIC-12343', '09168618032', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(60, 'Xavier', 'Cole', 'LIC-09688', '09064941298', 'active', '2026-07-29 22:37:11', '2026-07-29 22:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000000_create_passkeys_table', 1),
(5, '2025_08_14_170933_add_two_factor_columns_to_users_table', 1),
(6, '2026_07_29_060051_create_drivers_table', 1),
(7, '2026_07_29_060100_create_transport_routes_table', 1),
(8, '2026_07_29_060108_create_vehicles_table', 1),
(9, '2026_07_29_060126_create_trips_table', 1),
(10, '2026_07_29_060146_create_violations_table', 1),
(11, '2026_07_29_060155_create_notifications_table', 1),
(12, '2026_07_29_125004_add_status_to_passenger_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passkeys`
--

CREATE TABLE `passkeys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `credential_id` varchar(255) NOT NULL,
  `credential` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`credential`)),
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rVE3WEcum8A6sxwj4ZUUE7LA0gmmXm5eP0lWEmID', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.133.0 Chrome/148.0.7778.280 Electron/42.8.0 Safari/537.36', 'eyJfdG9rZW4iOiJrb3ZIMzFzZnJyakgyRDE2RjVrSGdGNThmWG01dk1aWVY1enp2ZFdjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC92ZWhpY2xlc1wvOVwvZWRpdCIsInJvdXRlIjoidmVoaWNsZXMuZWRpdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1786748287),
('WUxEGuxSDWKjUyF4QW59wyJooL0nPfIfQZGQ9gbW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.133.0 Chrome/148.0.7778.280 Electron/42.8.0 Safari/537.36', 'eyJfdG9rZW4iOiJSaTVPazMyOVVKWjBPZUhvUkFFT01SVVlZV01FMktwOW1XTTd3eWNzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC92ZWhpY2xlcyIsInJvdXRlIjoidmVoaWNsZXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvZGFzaGJvYXJkIn19', 1786859968);

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE `transport_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) NOT NULL DEFAULT 'Route 1',
  `origin` varchar(255) NOT NULL DEFAULT 'Origin A',
  `destination` varchar(255) NOT NULL DEFAULT 'Destination B',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_routes`
--

INSERT INTO `transport_routes` (`id`, `route_name`, `origin`, `destination`, `created_at`, `updated_at`) VALUES
(1, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(2, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(3, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(11, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(12, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(13, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(14, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(15, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(16, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(17, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(18, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(19, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(20, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(21, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(22, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(23, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(24, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(25, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(26, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(27, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(28, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(29, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(30, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(31, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(32, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(33, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(34, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(35, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(36, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(37, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(38, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(39, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(40, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(41, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(42, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(43, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(44, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(45, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(46, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(47, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(48, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(49, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(50, 'Route 1', 'Origin A', 'Destination B', '2026-07-29 22:37:11', '2026-07-29 22:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_code` varchar(255) NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime DEFAULT NULL,
  `status` enum('Active','Completed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_code`, `vehicle_id`, `departure_time`, `arrival_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TRIP-90558', 11, '2026-07-24 07:02:34', '2026-07-26 06:21:11', 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(2, 'TRIP-24951', 12, '2026-07-28 03:37:12', '2026-07-30 20:30:47', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(3, 'TRIP-89892', 13, '2026-07-26 02:15:04', '2026-07-27 10:14:39', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 'TRIP-28216', 14, '2026-07-23 12:47:58', '2026-07-28 07:07:08', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 'TRIP-03110', 15, '2026-07-28 20:15:36', NULL, 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 'TRIP-30691', 16, '2026-07-26 13:01:47', '2026-07-27 22:14:02', 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 'TRIP-30341', 17, '2026-07-29 01:16:07', '2026-07-30 22:03:12', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 'TRIP-78588', 18, '2026-07-29 23:43:04', NULL, 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 'TRIP-95792', 19, '2026-07-24 17:49:59', '2026-07-25 21:07:37', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 'TRIP-62534', 20, '2026-07-30 04:26:19', '2026-07-30 09:25:07', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(11, 'TRIP-08001', 22, '2026-07-27 21:02:27', NULL, 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(12, 'TRIP-83719', 24, '2026-07-24 10:07:25', NULL, 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(13, 'TRIP-71818', 26, '2026-07-28 11:08:12', NULL, 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(14, 'TRIP-06969', 28, '2026-07-25 11:37:35', NULL, 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(15, 'TRIP-76710', 30, '2026-07-27 14:42:07', '2026-07-28 12:52:12', 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(16, 'TRIP-35378', 32, '2026-07-26 13:52:08', NULL, 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(17, 'TRIP-36898', 34, '2026-07-26 12:50:19', '2026-07-27 21:07:20', 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(18, 'TRIP-97968', 36, '2026-07-29 08:38:47', '2026-07-30 03:06:47', 'Completed', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(19, 'TRIP-87196', 38, '2026-07-29 06:31:58', NULL, 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(20, 'TRIP-12436', 40, '2026-07-23 15:29:11', NULL, 'Active', '2026-07-29 22:37:11', '2026-07-29 22:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','operator','inspector') NOT NULL DEFAULT 'inspector',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vincenzo Ernser III', 'ronaldo.mohr@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'FdPWfWakE9', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(2, 'Dr. Annabell Quitzon IV', 'parisian.maritza@example.com', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'suvPCBwEkx', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(3, 'Else Jones', 'bethany.stehr@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'XrXcH4X2gx', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 'Margarette Brekke', 'jupton@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'DolipYfwBX', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 'Chaya Rath', 'jovanny.sipes@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'VhxRU0dIkp', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 'Dr. Loren Wilkinson II', 'chalvorson@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'nWH7nVkD3m', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 'Dr. Faustino Barrows V', 'ashley14@example.com', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'xfu2scpPha', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 'Rose Hintz III', 'dino66@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', '98L0Fzc2Gd', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 'Alvena Hagenes', 'albert81@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'q58zm4b5vP', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 'Mrs. Everette Hyatt Jr.', 'carter.kyle@example.org', '2026-07-29 22:37:11', '$2y$12$qes8dZmUrPg3Xa42sPHSiedKixD0n0TonNeAT9Zbxy50pij1o.SQe', NULL, NULL, NULL, 'inspector', 'VNCxPyLq23', '2026-07-29 22:37:11', '2026-07-29 22:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plate_number` varchar(255) NOT NULL DEFAULT 'ABC123',
  `vehicle_type` varchar(255) NOT NULL DEFAULT 'jeepney',
  `max_capacity` int(11) NOT NULL DEFAULT 20,
  `driver_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `route_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('available','on_trip','maintenance','offline') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `plate_number`, `vehicle_type`, `max_capacity`, `driver_id`, `route_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'WGK837', 'van', 34, 13, 13, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 'BSK891', 'jeepney', 46, 14, 14, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 'UMF843', 'jeepney', 17, 15, 15, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 'GXJ780', 'van', 16, 16, 16, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 'BYC244', 'van', 15, 17, 17, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 'GXW040', 'jeepney', 50, 18, 18, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 'JYN280', 'bus', 39, 19, 19, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 'TZS234', 'taxi', 46, 20, 20, 'maintenance', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(11, 'BRF039', 'jeepney', 36, 21, 21, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(12, 'ZNW436', 'jeepney', 44, 22, 22, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(13, 'TNB986', 'bus', 19, 23, 23, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(14, 'DGF183', 'taxi', 27, 24, 24, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(15, 'WIQ770', 'taxi', 25, 25, 25, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(16, 'YWJ920', 'jeepney', 22, 26, 26, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(17, 'NVK231', 'bus', 37, 27, 27, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(18, 'CXV806', 'taxi', 24, 28, 28, 'maintenance', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(19, 'BXD502', 'bus', 21, 29, 29, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(20, 'KYT526', 'bus', 31, 30, 30, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(21, 'XYX200', 'bus', 47, 32, 31, 'maintenance', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(22, 'GSX302', 'taxi', 18, 33, 32, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(23, 'QIW655', 'van', 40, 35, 33, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(24, 'QUA072', 'taxi', 33, 36, 34, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(25, 'JMG437', 'jeepney', 47, 38, 35, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(26, 'TGI874', 'taxi', 26, 39, 36, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(27, 'QSX583', 'van', 48, 41, 37, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(28, 'NPC389', 'taxi', 27, 42, 38, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(29, 'IDJ614', 'jeepney', 37, 44, 39, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(30, 'ZSR079', 'taxi', 31, 45, 40, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(31, 'MKC326', 'taxi', 26, 47, 41, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(32, 'CIS210', 'jeepney', 43, 48, 42, 'maintenance', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(33, 'ZPR284', 'bus', 21, 50, 43, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(34, 'NEE182', 'van', 37, 51, 44, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(35, 'EZF853', 'van', 25, 53, 45, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(36, 'CRD878', 'van', 49, 54, 46, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(37, 'HAR088', 'jeepney', 27, 56, 47, 'available', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(38, 'YAY298', 'van', 22, 57, 48, 'offline', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(39, 'WXP231', 'jeepney', 25, 59, 49, 'on_trip', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(40, 'YNS888', 'jeepney', 43, 60, 50, 'maintenance', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(41, 'Test123', 'jeepney', 18, 11, 11, 'available', '2026-08-09 16:58:51', '2026-08-09 16:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `allowed_capacity` int(11) NOT NULL,
  `actual_capacity` int(11) NOT NULL,
  `violation_type` varchar(255) NOT NULL,
  `violation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `driver_id`, `vehicle_id`, `trip_id`, `allowed_capacity`, `actual_capacity`, `violation_type`, `violation_time`, `created_at`, `updated_at`) VALUES
(1, 31, 21, 11, 55, 53, 'no_seatbelt', '2026-07-25 00:19:41', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(2, 34, 23, 12, 45, 59, 'over_capacity', '2026-07-25 08:27:30', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(3, 37, 25, 13, 32, 60, 'over_capacity', '2026-07-26 01:24:56', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(4, 40, 27, 14, 59, 22, 'no_seatbelt', '2026-07-24 07:24:33', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(5, 43, 29, 15, 20, 32, 'speeding', '2026-07-26 19:11:18', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(6, 46, 31, 16, 44, 47, 'route_violation', '2026-07-25 10:38:50', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(7, 49, 33, 17, 54, 8, 'route_violation', '2026-07-26 01:26:57', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(8, 52, 35, 18, 37, 61, 'speeding', '2026-07-26 09:36:42', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(9, 55, 37, 19, 39, 69, 'speeding', '2026-07-26 07:54:25', '2026-07-29 22:37:11', '2026-07-29 22:37:11'),
(10, 58, 39, 20, 20, 39, 'route_violation', '2026-07-26 08:17:59', '2026-07-29 22:37:11', '2026-07-29 22:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_license_number_unique` (`license_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `notifications_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passkeys_credential_id_unique` (`credential_id`),
  ADD KEY `passkeys_user_id_index` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trips_trip_code_unique` (`trip_code`),
  ADD KEY `trips_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicles_plate_number_unique` (`plate_number`),
  ADD KEY `vehicles_driver_id_foreign` (`driver_id`),
  ADD KEY `vehicles_route_id_foreign` (`route_id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violations_driver_id_foreign` (`driver_id`),
  ADD KEY `violations_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `violations_trip_id_foreign` (`trip_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `passkeys`
--
ALTER TABLE `passkeys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD CONSTRAINT `passkeys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicles_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `transport_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `violations`
--
ALTER TABLE `violations`
  ADD CONSTRAINT `violations_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `violations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `violations_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
