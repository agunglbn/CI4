-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2023 pada 06.47
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deskapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'System Admin'),
(2, 'user', 'Reguler'),
(3, 'parataon', 'Parataon'),
(4, 'diakonia', 'Diakonia'),
(5, 'naposo', 'Naposo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 2),
(3, 4),
(4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 10),
(3, 44),
(4, 42),
(5, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'q', NULL, '2022-12-22 09:02:40', 0),
(2, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-22 23:42:31', 0),
(3, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 12:56:02', 0),
(4, '::1', 'agungsilaban25@gmail.com', 1, '2022-12-23 13:08:02', 1),
(5, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:32:34', 0),
(6, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:32:40', 0),
(7, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:33:25', 0),
(8, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:33:31', 0),
(9, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:33:36', 0),
(10, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:34:22', 0),
(11, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:34:31', 0),
(12, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:34:36', 0),
(13, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:34:54', 0),
(14, '::1', 'santa25', NULL, '2022-12-23 13:35:41', 0),
(15, '::1', 'santa25', NULL, '2022-12-23 13:35:50', 0),
(16, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-23 13:36:16', 0),
(17, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-23 13:36:21', 0),
(18, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:37:08', 0),
(19, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:37:44', 0),
(20, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:37:50', 0),
(21, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 13:38:42', 1),
(22, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:38:59', 0),
(23, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 13:41:07', 0),
(24, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 13:57:59', 1),
(25, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 14:04:26', 1),
(26, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 22:22:04', 0),
(27, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 22:26:58', 0),
(28, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 22:44:16', 0),
(29, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 22:44:20', 0),
(30, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 22:44:25', 1),
(31, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 22:44:45', 0),
(32, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 22:51:45', 1),
(33, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 23:02:14', 0),
(34, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 23:02:19', 0),
(35, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-23 23:03:43', 1),
(36, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 23:08:23', 0),
(37, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 23:08:41', 0),
(38, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-23 23:16:04', 0),
(39, '::1', 'aldops', NULL, '2022-12-24 00:21:36', 0),
(40, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-24 00:21:43', 0),
(41, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:21:59', 0),
(42, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:22:41', 0),
(43, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:22:51', 0),
(44, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-24 00:23:36', 0),
(45, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:23:40', 0),
(46, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:23:45', 1),
(47, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:24:41', 0),
(48, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-24 00:25:24', 0),
(49, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:29:01', 0),
(50, '::1', 'tumbal.game25@gmail.com', 8, '2022-12-24 00:35:01', 1),
(51, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:38:36', 1),
(52, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:39:07', 1),
(53, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:39:53', 1),
(54, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:43:47', 1),
(55, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:44:16', 0),
(56, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:44:57', 1),
(57, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-24 00:47:04', 0),
(58, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-24 00:51:29', 1),
(59, '::1', 'andiexcited@yahoo.com', 9, '2022-12-24 00:53:00', 1),
(60, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 09:21:07', 1),
(61, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 09:55:45', 1),
(62, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 10:20:32', 1),
(63, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 10:31:36', 1),
(64, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 10:33:44', 1),
(65, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 10:41:37', 1),
(66, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 10:44:47', 1),
(67, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:17:49', 1),
(68, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-25 11:18:13', 0),
(69, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:18:17', 1),
(70, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-25 11:22:49', 0),
(71, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:22:54', 1),
(72, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-25 11:23:55', 0),
(73, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:24:02', 1),
(74, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:39:56', 1),
(75, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:40:29', 1),
(76, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-25 11:42:21', 0),
(77, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-25 11:42:28', 0),
(78, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-25 11:42:34', 0),
(79, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-25 11:42:43', 0),
(80, '::1', 'tumbal.game25@gmail.com', 10, '2022-12-25 11:44:19', 1),
(81, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:48:07', 1),
(82, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-25 11:49:01', 0),
(83, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:49:06', 1),
(84, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:49:16', 1),
(85, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 11:49:27', 1),
(86, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-25 11:49:49', 0),
(87, '::1', 'tumbal.game25@gmail.com', 10, '2022-12-25 11:49:54', 1),
(88, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 12:02:50', 1),
(89, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 12:13:21', 1),
(90, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 21:54:22', 1),
(91, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 21:55:33', 1),
(92, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 21:58:15', 1),
(93, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:00:23', 1),
(94, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-25 22:00:33', 0),
(95, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:00:40', 1),
(96, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:05:06', 1),
(97, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:08:11', 1),
(98, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:08:45', 1),
(99, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:09:12', 1),
(100, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:15:46', 1),
(101, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 22:18:18', 1),
(102, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-25 23:45:08', 1),
(103, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 00:36:54', 1),
(104, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 00:41:22', 1),
(105, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 00:57:09', 1),
(106, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 00:57:28', 1),
(107, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 00:58:09', 1),
(108, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 01:22:26', 1),
(109, '::1', 'tumbal.game25@gmail.com', NULL, '2022-12-26 01:26:45', 0),
(110, '::1', 'dani', NULL, '2022-12-26 01:27:10', 0),
(111, '::1', 'dasdasd@gmail.com', 11, '2022-12-26 01:27:15', 1),
(112, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 01:27:38', 1),
(113, '::1', 'dasdasd@gmail.com', 11, '2022-12-26 01:28:31', 1),
(114, '::1', 'dani', NULL, '2022-12-26 03:38:44', 0),
(115, '::1', 'dasdasd@gmail.com', 11, '2022-12-26 03:38:50', 1),
(116, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 03:47:13', 1),
(117, '::1', 'dasdasd@gmail.com', 11, '2022-12-26 03:48:55', 1),
(118, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 04:02:31', 1),
(119, '::1', 'dasdasd@gmail.com', 11, '2022-12-26 04:06:10', 1),
(120, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 04:35:30', 1),
(121, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-26 11:36:29', 1),
(122, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 00:05:30', 1),
(123, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:17:11', 1),
(124, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:17:27', 1),
(125, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:19:31', 1),
(126, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:20:21', 1),
(127, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:29:15', 1),
(128, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:30:13', 1),
(129, '::1', 'agungsilaban25@gmail.com', NULL, '2022-12-27 01:30:22', 0),
(130, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:30:26', 1),
(131, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:34:22', 1),
(132, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:35:10', 1),
(133, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:35:38', 1),
(134, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:35:55', 1),
(135, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 01:37:21', 1),
(136, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 01:37:39', 1),
(137, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 07:16:39', 1),
(138, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 07:26:57', 1),
(139, '::1', 'dasdasd@gmail.com', 11, '2022-12-27 07:28:28', 1),
(140, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 07:31:47', 1),
(141, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-27 23:54:41', 1),
(142, '::1', 'dasdasd@gmail.com', 11, '2022-12-28 00:26:36', 1),
(143, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-28 00:27:09', 1),
(144, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-29 10:17:58', 1),
(145, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-29 22:21:07', 1),
(146, '::1', 'dasdasd@gmail.com', 11, '2022-12-30 00:54:29', 1),
(147, '::1', 'agungsilaban25@gmail.com', 4, '2022-12-30 00:54:41', 1),
(148, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-01 21:18:13', 1),
(149, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-01 21:53:14', 1),
(150, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-01 21:53:25', 1),
(151, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-01 22:16:08', 1),
(152, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-02 06:19:39', 1),
(153, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-04 05:23:03', 0),
(154, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-04 05:23:09', 1),
(155, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-04 20:58:05', 1),
(156, '::1', 'parataon', NULL, '2023-01-04 21:19:19', 0),
(157, '::1', 'ina', NULL, '2023-01-04 21:19:32', 0),
(158, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-05 06:49:01', 1),
(159, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-05 06:57:57', 1),
(160, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-06 04:16:43', 1),
(161, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-07 00:37:02', 1),
(162, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-07 08:14:13', 1),
(163, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-08 09:03:52', 1),
(164, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-08 22:53:19', 0),
(165, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-08 22:54:13', 0),
(166, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-08 22:54:19', 1),
(167, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-09 04:21:44', 1),
(168, '::1', 'dasdasd@gmail.com', 11, '2023-01-09 05:30:35', 1),
(169, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-09 09:29:18', 1),
(170, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-09 09:29:37', 1),
(171, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-09 20:16:23', 1),
(172, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-10 05:10:54', 1),
(173, '::1', 'caca', NULL, '2023-01-10 05:23:53', 0),
(174, '::1', 'caca', NULL, '2023-01-10 05:24:01', 0),
(175, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-10 05:24:07', 0),
(176, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-10 05:24:12', 1),
(177, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-10 10:57:18', 0),
(178, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-10 10:57:23', 0),
(179, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-10 10:57:29', 1),
(180, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-10 22:19:52', 1),
(181, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-11 09:32:12', 1),
(182, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-13 04:34:31', 1),
(183, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-14 00:06:45', 1),
(184, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-14 04:27:48', 1),
(185, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-14 11:37:25', 1),
(186, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-14 23:07:25', 1),
(187, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-15 09:56:33', 1),
(188, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-16 01:55:20', 1),
(189, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-16 23:35:24', 1),
(190, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-17 09:58:03', 1),
(191, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-18 01:14:22', 1),
(192, '::1', 'caca', NULL, '2023-01-18 01:53:32', 0),
(193, '::1', 'caca', NULL, '2023-01-18 01:53:39', 0),
(194, '::1', 'caca', NULL, '2023-01-18 01:53:44', 0),
(195, '::1', 'caca', NULL, '2023-01-18 01:53:51', 0),
(196, '::1', 'caca', NULL, '2023-01-18 01:53:59', 0),
(197, '::1', 'sela23@gmail.com', 25, '2023-01-18 01:55:49', 1),
(198, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-18 03:01:43', 0),
(199, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-18 03:01:49', 1),
(200, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-18 21:12:22', 1),
(201, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-19 10:06:04', 1),
(202, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-20 07:07:03', 1),
(203, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-22 21:51:30', 1),
(204, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-23 03:28:33', 1),
(205, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-23 06:09:06', 1),
(206, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-24 23:25:48', 1),
(207, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-25 10:33:50', 1),
(208, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 11:48:37', 1),
(209, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 11:49:15', 1),
(210, '::1', 'tumbal.game25@gmail.com', NULL, '2023-01-25 11:49:31', 0),
(211, '::1', 'tumbal.game25@gmail.com', NULL, '2023-01-25 11:49:35', 0),
(212, '::1', 'tumbal.game25@gmail.com', NULL, '2023-01-25 11:49:39', 0),
(213, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 11:49:43', 1),
(214, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 11:50:49', 1),
(215, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-25 11:51:05', 1),
(216, '::1', 'agung', NULL, '2023-01-25 11:52:28', 0),
(217, '::1', 'agung', NULL, '2023-01-25 11:52:36', 0),
(218, '::1', 'adfawd@gmail.com', NULL, '2023-01-25 11:53:06', 0),
(219, '::1', 'adfawd@gmail.com', NULL, '2023-01-25 11:53:14', 0),
(220, '::1', 'adfawd@gmail.com', NULL, '2023-01-25 11:53:19', 0),
(221, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-25 11:53:26', 1),
(222, '::1', 'dika', NULL, '2023-01-25 11:54:19', 0),
(223, '::1', 'dika', NULL, '2023-01-25 11:54:44', 0),
(224, '::1', 'dika', NULL, '2023-01-25 11:54:54', 0),
(225, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-25 11:55:27', 1),
(226, '::1', 'dani', NULL, '2023-01-25 11:56:07', 0),
(227, '::1', 'dani', NULL, '2023-01-25 11:56:12', 0),
(228, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 11:56:17', 1),
(229, '::1', 'dani', NULL, '2023-01-25 22:47:49', 0),
(230, '::1', 'dasdasd@gmail.com', 11, '2023-01-25 22:47:53', 1),
(231, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-26 00:11:32', 1),
(232, '::1', 'dasdasd@gmail.com', 11, '2023-01-26 00:14:11', 1),
(233, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-26 00:40:17', 1),
(234, '::1', 'dasdasd@gmail.com', 11, '2023-01-26 00:47:41', 1),
(235, '::1', 'dasdasd@gmail.com', 11, '2023-01-26 09:00:15', 1),
(236, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-26 21:22:01', 1),
(237, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-27 02:25:14', 0),
(238, '::1', 'agungsilaban225@gmail.com', NULL, '2023-01-27 02:37:36', 0),
(239, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-27 02:40:21', 0),
(240, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-27 02:40:38', 0),
(241, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 02:44:24', 1),
(242, '::1', 'santa25', NULL, '2023-01-27 03:31:49', 0),
(243, '::1', 'santa25', NULL, '2023-01-27 03:31:57', 0),
(244, '::1', 'santa25', NULL, '2023-01-27 03:32:04', 0),
(245, '::1', 'santa25', NULL, '2023-01-27 03:32:09', 0),
(246, '::1', 'santa25', NULL, '2023-01-27 03:32:39', 0),
(247, '::1', 'santa25', NULL, '2023-01-27 03:32:44', 0),
(248, '::1', 'tumbal.game25@gmail.com', 10, '2023-01-27 03:33:11', 1),
(249, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 03:43:36', 1),
(250, '::1', 'tumbal.game25@gmail.com', 10, '2023-01-27 03:49:36', 1),
(251, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 04:51:51', 1),
(252, '::1', 'tumbal.game25@gmail.com', 10, '2023-01-27 04:54:49', 1),
(253, '::1', 'tania', NULL, '2023-01-27 05:39:15', 0),
(254, '::1', 'tania', NULL, '2023-01-27 05:39:20', 0),
(255, '::1', 'tania', NULL, '2023-01-27 05:39:32', 0),
(256, '::1', 'tani', NULL, '2023-01-27 05:39:53', 0),
(257, '::1', 'tania25@gmail.com', 35, '2023-01-27 05:40:19', 1),
(258, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 05:42:25', 1),
(259, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 05:42:47', 1),
(260, '::1', 'tania25@gmail.com', 35, '2023-01-27 05:43:01', 1),
(261, '::1', 'tania25@gmail.com', 35, '2023-01-27 05:43:34', 1),
(262, '::1', 'tumbal.game25@gmail.com', 10, '2023-01-27 05:44:50', 1),
(263, '::1', 'tumbal.game25@gmail.com', 10, '2023-01-27 05:45:17', 1),
(264, '::1', 'tania', NULL, '2023-01-27 05:46:54', 0),
(265, '::1', 'tania', NULL, '2023-01-27 05:47:08', 0),
(266, '::1', 'tania', NULL, '2023-01-27 05:47:22', 0),
(267, '::1', 'tania', NULL, '2023-01-27 05:47:43', 0),
(268, '::1', 'tania25@gmail.com', 36, '2023-01-27 05:47:48', 1),
(269, '::1', 'tania25@gmail.com', 36, '2023-01-27 05:48:34', 1),
(270, '::1', 'tania25@gmail.com', 36, '2023-01-27 05:50:20', 1),
(271, '::1', 'tani', NULL, '2023-01-27 05:52:48', 0),
(272, '::1', 'Tani', NULL, '2023-01-27 05:52:59', 0),
(273, '::1', 'tania25@gmail.com', 37, '2023-01-27 05:53:33', 1),
(274, '::1', 'tania25@gmail.com', 37, '2023-01-27 05:54:06', 1),
(275, '::1', 'tania', NULL, '2023-01-27 05:54:19', 0),
(276, '::1', 'Tani', NULL, '2023-01-27 05:54:24', 0),
(277, '::1', 'tania25@gmail.com', 37, '2023-01-27 05:54:32', 1),
(278, '::1', 'tania25@gmail.com', 37, '2023-01-27 05:55:10', 1),
(279, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 06:00:07', 1),
(280, '::1', 'admin', NULL, '2023-01-27 06:01:33', 0),
(281, '::1', 'admin', NULL, '2023-01-27 06:01:40', 0),
(282, '::1', 'admin232@gmail.com', 38, '2023-01-27 06:02:59', 1),
(283, '::1', 'dadang', NULL, '2023-01-27 06:15:22', 0),
(284, '::1', 'Dadang', NULL, '2023-01-27 06:15:29', 0),
(285, '::1', 'andiexcited@yahoo.com', NULL, '2023-01-27 06:15:48', 0),
(286, '::1', 'andiexcited@yahoo.com', 39, '2023-01-27 06:16:07', 1),
(287, '::1', 'andiexcited@yahoo.com', 39, '2023-01-27 06:18:35', 1),
(288, '::1', 'aldosilaban', NULL, '2023-01-27 06:21:25', 0),
(289, '::1', 'aldosilaban', NULL, '2023-01-27 06:21:48', 0),
(290, '::1', 'aldoastek243@gmail.com', NULL, '2023-01-27 06:22:02', 0),
(291, '::1', 'aldoastek243@gmail.com', NULL, '2023-01-27 06:22:08', 0),
(292, '::1', 'aldoastek243@gmail.com', 40, '2023-01-27 06:22:38', 1),
(293, '::1', 'aldoastek243@gmail.com', 41, '2023-01-27 06:24:42', 1),
(294, '::1', 'parataon22@gmail.com', 42, '2023-01-27 06:26:07', 1),
(295, '::1', 'parataon22@gmail.com', 42, '2023-01-27 06:37:21', 1),
(296, '::1', 'parataon22@gmail.com', 42, '2023-01-27 06:38:08', 1),
(297, '::1', 'parataon22@gmail.com', 42, '2023-01-27 06:39:13', 1),
(298, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 06:39:22', 1),
(299, '::1', 'parataon22@gmail.com', 42, '2023-01-27 08:25:29', 1),
(300, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 08:28:23', 1),
(301, '::1', 'parataon22@gmail.com', 42, '2023-01-27 08:29:06', 1),
(302, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 08:31:26', 1),
(303, '::1', 'parataon22@gmail.com', 42, '2023-01-27 08:32:18', 1),
(304, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 08:48:39', 1),
(305, '::1', 'parhataon22', NULL, '2023-01-27 08:49:45', 0),
(306, '::1', 'parataon22@gmail.com', 42, '2023-01-27 08:49:53', 1),
(307, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 08:52:30', 1),
(308, '::1', 'dani', NULL, '2023-01-27 08:56:39', 0),
(309, '::1', 'dani', NULL, '2023-01-27 08:57:01', 0),
(310, '::1', 'dasdasd@gmail.com', 11, '2023-01-27 08:57:08', 1),
(311, '::1', 'aldosilaban', NULL, '2023-01-27 09:15:33', 0),
(312, '::1', 'aldosilaban', NULL, '2023-01-27 09:15:41', 0),
(313, '::1', 'aldosilaban', NULL, '2023-01-27 09:15:58', 0),
(314, '::1', 'aldoastek243@gmail.com', NULL, '2023-01-27 09:16:40', 0),
(315, '::1', 'aldoastek243@gmail.com', NULL, '2023-01-27 09:16:53', 0),
(316, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 09:17:09', 1),
(317, '::1', 'aldoslbn24@gmail.com', 43, '2023-01-27 09:18:25', 1),
(318, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 10:18:23', 1),
(319, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-27 10:24:12', 1),
(320, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-28 01:34:59', 1),
(321, '::1', 'parataon22@gmail.com', 42, '2023-01-28 02:18:27', 1),
(322, '::1', 'lodewic24@gmail.com', 44, '2023-01-28 02:19:25', 1),
(323, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-29 20:46:00', 1),
(324, '::1', 'lodewic24@gmail.com', 44, '2023-01-29 20:46:41', 1),
(325, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-29 21:24:23', 1),
(326, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-30 01:42:25', 1),
(327, '::1', 'lodewic24@gmail.com', 44, '2023-01-30 01:42:59', 1),
(328, '::1', 'lodewic24@gmail.com', 44, '2023-01-30 05:44:20', 1),
(329, '::1', 'lodewic24@gmail.com', 44, '2023-01-31 02:12:33', 1),
(330, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-31 02:14:15', 1),
(331, '::1', 'lodewic24@gmail.com', 44, '2023-01-31 02:15:14', 1),
(332, '::1', 'agungsilaban25@gmail.com', NULL, '2023-01-31 02:33:00', 0),
(333, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-31 02:33:05', 1),
(334, '::1', 'lodewic24@gmail.com', 44, '2023-01-31 02:35:30', 1),
(335, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-31 02:40:27', 1),
(336, '::1', 'gultom', NULL, '2023-01-31 02:45:48', 0),
(337, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-31 04:15:33', 1),
(338, '::1', 'aldoslbn24@gmail.com', 43, '2023-01-31 07:09:36', 1),
(339, '::1', 'agungsilaban25@gmail.com', 4, '2023-01-31 07:10:23', 1),
(340, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-01 04:35:10', 1),
(341, '::1', 'parataon22@gmail.com', 42, '2023-02-01 08:37:14', 1),
(342, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 03:33:20', 1),
(343, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 03:44:09', 1),
(344, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 03:50:07', 1),
(345, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 03:51:52', 1),
(346, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 03:59:37', 1),
(347, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 04:02:27', 1),
(348, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-04 04:58:55', 1),
(349, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:43:31', 1),
(350, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:44:02', 1),
(351, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:45:24', 1),
(352, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:46:54', 1),
(353, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:47:09', 1),
(354, '::1', 'dani', NULL, '2023-02-06 09:47:19', 0),
(355, '::1', 'dani', NULL, '2023-02-06 09:47:24', 0),
(356, '::1', 'dasdasd@gmail.com', 11, '2023-02-06 09:47:31', 1),
(357, '::1', 'parataon22@gmail.com', 42, '2023-02-06 09:47:45', 1),
(358, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:48:31', 1),
(359, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:50:30', 1),
(360, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 09:52:01', 1),
(361, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:10:03', 1),
(362, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:11:46', 1),
(363, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:12:32', 1),
(364, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:13:45', 1),
(365, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:14:55', 1),
(366, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:42:02', 1),
(367, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:44:55', 1),
(368, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:49:27', 1),
(369, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-06 10:53:15', 1),
(370, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:40:16', 1),
(371, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:40:47', 1),
(372, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:41:25', 1),
(373, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:42:03', 1),
(374, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:42:46', 1),
(375, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:43:28', 1),
(376, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:44:56', 1),
(377, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:46:25', 1),
(378, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 08:58:00', 1),
(379, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:02:58', 1),
(380, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:22:27', 1),
(381, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:47:30', 1),
(382, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:48:05', 1),
(383, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:48:29', 1),
(384, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 09:50:25', 1),
(385, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:09:32', 1),
(386, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:10:33', 1),
(387, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:23:18', 1),
(388, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:23:44', 1),
(389, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:24:01', 1),
(390, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:24:19', 1),
(391, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:31:08', 1),
(392, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 10:31:53', 1),
(393, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-07 11:07:52', 0),
(394, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 11:07:56', 1),
(395, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-07 11:08:19', 1),
(396, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:37:03', 1),
(397, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:38:27', 1),
(398, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:39:26', 1),
(399, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:40:32', 1),
(400, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:40:52', 1),
(401, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:42:09', 1),
(402, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:43:10', 1),
(403, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:43:47', 1),
(404, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-08 03:46:59', 0),
(405, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:47:03', 1),
(406, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:47:17', 1),
(407, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:54:06', 1),
(408, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:54:31', 1),
(409, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:54:50', 1),
(410, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:55:06', 1),
(411, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:56:19', 1),
(412, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 03:57:21', 1),
(413, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 04:00:19', 1),
(414, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-08 09:03:35', 1),
(415, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-09 03:01:07', 0),
(416, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-09 03:01:17', 1),
(417, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-10 04:07:19', 1),
(418, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-11 05:53:20', 1),
(419, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-12 21:01:05', 1),
(420, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-13 04:05:58', 0),
(421, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-13 04:06:04', 1),
(422, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-14 04:16:53', 1),
(423, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:13:02', 1),
(424, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:13:13', 1),
(425, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:17:38', 1),
(426, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:18:07', 1),
(427, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:43:31', 1),
(428, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:57:57', 1),
(429, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:58:10', 1),
(430, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:59:43', 1),
(431, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 01:59:56', 1),
(432, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 02:00:32', 1),
(433, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 02:00:44', 1),
(434, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 02:01:58', 0),
(435, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 02:02:03', 0),
(436, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 02:02:11', 0),
(437, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 02:02:17', 0),
(438, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 02:02:24', 0),
(439, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 02:52:33', 1),
(440, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 02:52:43', 1),
(441, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 02:52:55', 1),
(442, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 03:41:21', 0),
(443, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 03:41:28', 0),
(444, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 03:41:35', 0),
(445, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 03:41:40', 0),
(446, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 03:41:50', 1),
(447, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 03:42:02', 1),
(448, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 03:47:52', 1),
(449, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 03:48:37', 1),
(450, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 04:52:20', 1),
(451, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 04:52:32', 1),
(452, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 04:52:43', 1),
(453, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 10:20:56', 1),
(454, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 10:21:15', 1),
(455, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:21:52', 0),
(456, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:23:13', 0),
(457, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:23:39', 0),
(458, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:32:07', 0),
(459, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:33:13', 0),
(460, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 10:37:11', 1),
(461, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 10:37:19', 1),
(462, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 10:46:20', 0),
(463, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 23:10:32', 0),
(464, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 23:10:40', 0),
(465, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 23:10:47', 0),
(466, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 23:10:55', 0),
(467, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-20 23:13:06', 0),
(468, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 23:23:10', 1),
(469, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 23:25:09', 1),
(470, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-20 23:25:18', 1),
(471, '::1', 'dasdasd@gmail.com', 11, '2023-02-20 23:25:32', 1),
(472, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:24:07', 0),
(473, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:24:30', 0),
(474, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:08', 0),
(475, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:20', 0),
(476, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:21', 0),
(477, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:29', 0),
(478, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:35', 0),
(479, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:35', 0),
(480, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:33:43', 0),
(481, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:34:37', 0),
(482, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:35:45', 0),
(483, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:35:53', 0),
(484, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:41:11', 0),
(485, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:44:57', 0),
(486, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:45:04', 0),
(487, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:45:09', 0),
(488, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 00:45:15', 0),
(489, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 01:33:04', 0),
(490, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 01:36:50', 0),
(491, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 01:37:23', 0),
(492, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 01:37:28', 0),
(493, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 01:37:34', 0),
(494, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-21 01:37:39', 1),
(495, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:20:26', 0),
(496, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:22:13', 0),
(497, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:22:20', 0),
(498, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:22:26', 0),
(499, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:24:52', 0),
(500, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:24:56', 0),
(501, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-21 02:25:34', 1),
(502, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-21 02:25:51', 1),
(503, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-21 02:26:13', 1),
(504, '::1', 'dasdasd@gmail.com', 11, '2023-02-21 02:26:35', 1),
(505, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:30:15', 0),
(506, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:30:20', 0),
(507, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:46:02', 0),
(508, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:46:05', 0),
(509, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:47:00', 0),
(510, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:47:05', 0),
(511, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:51:20', 0),
(512, '::1', 'agungsilaban25@gmail.com', NULL, '2023-02-21 02:51:24', 0),
(513, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-23 09:35:39', 1),
(514, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-25 01:11:40', 1),
(515, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-26 23:32:21', 1),
(516, '::1', 'agungsilaban25@gmail.com', 4, '2023-02-28 06:38:06', 1),
(517, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-08 04:59:49', 1),
(518, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-10 00:13:36', 1),
(519, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-10 02:34:30', 1),
(520, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-10 23:53:02', 1),
(521, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-12 21:42:55', 1),
(522, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-15 23:49:50', 1),
(523, '::1', 'parataon22@gmail.com', 42, '2023-03-16 00:58:09', 1),
(524, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-16 00:59:20', 1),
(525, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-16 08:01:29', 1),
(526, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-16 22:06:43', 1),
(527, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-17 02:35:05', 1),
(528, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-20 03:11:18', 1),
(529, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-22 23:41:42', 1),
(530, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-23 14:26:46', 1),
(531, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-26 23:54:06', 1),
(532, '::1', 'agungsilaban25@gmail.com', 4, '2023-03-27 23:49:04', 1),
(533, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-02 22:22:38', 1),
(534, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-04 05:29:15', 1),
(535, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-06 04:16:07', 1),
(536, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-08 01:03:15', 1),
(537, '::1', 'parhataon22', NULL, '2023-04-08 03:05:29', 0),
(538, '::1', 'parataon22@gmail.com', 42, '2023-04-08 03:05:45', 1),
(539, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-08 03:07:47', 1),
(540, '::1', 'parataon22@gmail.com', 42, '2023-04-09 21:20:03', 1),
(541, '::1', 'parataon22@gmail.com', 42, '2023-04-21 23:39:06', 1),
(542, '::1', 'pa', NULL, '2023-04-21 23:43:44', 0),
(543, '::1', 'parataon22@gmail.com', 42, '2023-04-21 23:43:57', 1),
(544, '::1', 'lodewic24@gmail.com', 44, '2023-04-21 23:45:13', 1),
(545, '::1', 'agungsilaban25@gmail.com', 4, '2023-04-21 23:56:16', 1),
(546, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-01 00:37:25', 1),
(547, '::1', 'agunlbn', NULL, '2023-05-01 00:41:09', 0),
(548, '::1', 'agunlbn', NULL, '2023-05-01 00:41:22', 0),
(549, '::1', 'agunlbn', NULL, '2023-05-01 00:41:38', 0),
(550, '::1', 'agunlbn', NULL, '2023-05-01 00:41:44', 0),
(551, '::1', 'agunglbn@gmail.com', 45, '2023-05-01 00:42:15', 1),
(552, '::1', 'lodewic24@gmail.com', 44, '2023-05-01 00:47:29', 1),
(553, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-01 00:48:18', 1),
(554, '::1', 'lodewic24@gmail.com', 44, '2023-05-01 00:50:30', 1),
(555, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-01 00:51:40', 1),
(556, '::1', 'agunglbn@gmail.com', 45, '2023-05-01 00:57:19', 1),
(557, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-01 00:58:04', 1),
(558, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-03 03:58:36', 1),
(559, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-04 05:59:06', 1),
(560, '::1', 'agungsilaban25@gmail.com', 4, '2023-05-04 06:12:40', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', ''),
(2, 'manage-profile', ''),
(3, 'Keuangan', 'Data Keuangan'),
(4, 'Berita', 'Data Berita'),
(5, 'Parataon', 'Data Divi Parataon'),
(6, 'Diakonia', 'Data Diakonia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `role` varchar(32) NOT NULL,
  `judul_berita` varchar(256) NOT NULL,
  `isi_berita` text NOT NULL,
  `kategori_berita` varchar(64) NOT NULL,
  `jenis_berita` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created` varchar(64) NOT NULL,
  `modified` varchar(64) NOT NULL,
  `created_at` varchar(32) NOT NULL,
  `modified_at` varchar(32) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `slug`, `username`, `role`, `judul_berita`, `isi_berita`, `kategori_berita`, `jenis_berita`, `status`, `created`, `modified`, `created_at`, `modified_at`, `img`) VALUES
(24, '', 'agunglbn', 'admin', 'Stensilan 23 Maret 2024', '', '', 0, 1, '2023-03-13 04:27:42', '2023-02-14 04:47:14', '', '', '1676371634_92a596afee1f0a80c325.docx'),
(25, '', 'agunglbn', 'admin', 'Stensilan 25 Maret 2024', '', '', 0, 1, '2023-05-14 04:51:11', '2023-02-14 04:51:11', '', '', '1676371871_6c258328564c520b6c5d.pdf'),
(37, 'renungan-17-maret-2023-fokus-kepada-tuhan-6413e3ff1ca4b373612400', 'agunglbn', 'admin', 'Renungan 17 Maret 2023 (Fokus kepada Tuhan)', '<p><a href=\"https://alkitab.mobi/tb/passage/1+KORINTUS+7%3A17-40/\">1 Korintus 7 : 17 - 40</a></p>\r\n\r\n<p>Korintus adalah kota yang kaya. Korintus menjadi pusat perdagangan yang berkembang dan juga menjadi kota industri. Sayangnya, Korintus terkenal dengan percabulan dan hawa nafsunya. Bahkan dalam 1Kor. 5:1, Paulus menyebutkan bahwa percabulan yang terjadi di Korintus bahkan tidak terdapat sekalipun di antara bangsa-bangsa yang tidak mengenal Allah.</p>\r\n\r\n<p>Tak heran jika ajaran Paulus kepada jemaat Korintus terdengar sangat keras dan tidak biasa. Orang yang beristri harus berlaku seolah-olah tidak beristri, yang menangis seolah-olah tidak menangis, yang bergembira seolah-olah tidak bergembira, yang membeli seolah-olah tidak memiliki apa yang mereka beli. Bukan karena Paulus membenci orang yang menikah, tidak senang melihat orang berbahagia, enggan melihat orang berduka atau iri melihat orang berpunya. Paulus ingin menekankan bahwa hal terpenting yang harus dilakukan umat adalah menggunakan waktu yang singkat di dunia ini untuk memuliakan Tuhan.</p>\r\n\r\n<p>Fokus hidup orang percaya adalah Tuhan. Bukan dirinya, apalagi kesenangan dan nafsu duniawinya. Lagi pula, dari Tuhanlah segala berkat dan keselamatan sejati kita. Semua hal yang ada di dunia merupakan sarana untuk memuliakan Tuhan, termasuk pernikahan. Menikah demi menghalalkan nafsu badani sebagaimana yang dihidupi orang-orang Korintus tentu bukan tujuan pernikahan kudus yang Tuhan kehendaki. Demikian pula dalam menanggapi setiap situasi. Hendaklah kiranya kita mampu mengendalikan diri supaya hati kita jangan dikendalikan oleh kondisi dunia. --EBL/www.renunganharian.net</p>\r\n\r\n<p>* * *<br />\r\nBUKAN MENGABAIKAN KEHIDUPAN DUNIA, HANYA,<br />\r\nJANGAN MENJERUMUSKAN DIRI KE DALAMNYA<br />\r\nHINGGA MENGHALANGI KASIH KEPADA BAPA.</p>\r\n', 'Renungan', 2, 1, '16 March 2023', '2023-03-16 22:52:31', '', '', 'default.jpg'),
(38, 'cek-kesehatan-hkbp-beringin-indah-64142eb9276b9952110749', 'agunglbn', 'admin', 'Cek Kesehatan HKBP Beringin Indah', '<p>Puji Tuhan , kegiatan Cek Kesehatan pagi ini berjalan dengan lancar.....<img alt=\"????????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfb/1/16/1f64f_1f3fb.png\" style=\"height:16px; width:16px\" /><img alt=\"????????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfb/1/16/1f64f_1f3fb.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>Mauliate buat Amang inang yg sudah turut serta semoga semakin tambah sehat , terlebih buat para medis HKBP Beringin Indah yg sudah mau meluangkan waktu nya buat kami...<img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfc/1/16/1f44d.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>Semoga tambah sukses inang semua dalam karir nya...TYM</p>\r\n\r\n<p># Cek gula darah , kolesterol dan asam urat.</p>\r\n\r\n<p># Semoga bulan depan kita tambah ramai lagi.</p>\r\n\r\n<p># Sehat itu mahal , lebih baik mencegah dari pada terlambat.</p>\r\n', 'Kesehatan', 1, 1, '17 March 2023', '17 March 2023', '', '', '1679044364_3ee814ef43b32f460e8c.jpg'),
(51, 'perayaan-paskah-naposo-remaja-hkbp-beringin-indah-644f5cb6e6133589013916', 'agunglbn', 'admin', 'Perayaan Paskah Naposo Remaja HKBP Beringin Indah', '<p>Shalom<br />\r\n<br />\r\nPekanbaru (24/04/2023)-NHKBP Beringin Indah telah melaksanakan kegiatan Paskah bersama Panti Asuhan Yerahmeel. Kegiatan ini dilaksanakan di gereja HKBP Beringin Indah pada tanggal 15 April 2023.<br />\r\n<br />\r\nSukacita dari Tuhan kita dapat melaksanakan Paskah ini bersama teman-teman dari Panti Asuhan Yerahmeel. Mereka sangat antusias mengikuti rangkaian acara yang telah disusun. Acara berjalan dengan lancar sesuai dengan yang diharapkan.<br />\r\n<br />\r\nKiranya melalui Paskah tahun ini kita dapat beroleh sukacita dan kehidupan baru dari kebangkita Tuhan Yesus Kristus. Terimakasih buat teman-teman dari Panti Asuhan Yerahmeel yang telah hadir dan berpartisipasi dalam liturgi serta memberikan persembahan pujian, kiranya menjadi berkat bagi banyak orang.<br />\r\n<br />\r\n_1 Petrus 1 : 3 &ldquo;Terpujilah Allah dan Bapa Tuhan kita Yesus Kristus, yang karena rahmat-Nya yang besar telah melahirkan kita kembali oleh kebangkitan Yesus Kristus dari antara orang mati, kepada suatu hidup yang penuh pengharapan&rdquo;._<br />\r\n<br />\r\nSee u next easter yes????<br />\r\n<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;▪︎▪︎&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\nKetua: Royman Wesley Hutauruk<br />\r\nWakil Ketua: Abednego Siregar<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;▪︎▪︎&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\nTim Media &amp; Kreatif Tahun 2022-2024<br />\r\n<br />\r\nInstagram:&nbsp;<a href=\"https://www.instagram.com/nhkbpberinginindah/\">@nhkbpberinginindah</a><br />\r\nYoutube: nhkbpberinginindah<br />\r\n<br />\r\n<a href=\"https://www.instagram.com/explore/tags/nhkbpjaya/\">#NHKBPJAYA</a><br />\r\n<a href=\"https://www.instagram.com/explore/tags/nhkbpnewera/\">#NHKBPNEWERA</a></p>\r\n', 'Naposo', 1, 1, '01 May 2023', '2023-05-01 01:31:18', '', '', '1682922678_64282e19c293473e44fc.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(64) NOT NULL,
  `created` varchar(64) NOT NULL,
  `modified` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created`, `modified`) VALUES
(1, 'Parataon', '', ''),
(2, 'Diakonia', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `groups` varchar(20) NOT NULL,
  `description` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created` varchar(32) NOT NULL,
  `modified` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `username`, `fullname`, `groups`, `description`, `img`, `status`, `created`, `modified`) VALUES
(16, 'agunglbn', 'Agung Ferdinan', 'admin', 'Paskah 2023 Naposo', '1682921887_f37fe71878ac7ebf83d7.jpg', 1, '01 May 2023', '2023-05-01 01:18:07'),
(17, 'agunglbn', 'Agung Ferdinan', 'admin', 'Paskah 2023 Naposo', '1682921887_74d3427549f54175f3c3.jpg', 1, '01 May 2023', '2023-05-01 01:18:07'),
(18, 'agunglbn', 'Agung Ferdinan', 'admin', 'Paskah 2023 Naposo', '1682921887_32e71773fd82a772ce64.jpg', 1, '01 May 2023', '2023-05-01 01:18:08'),
(19, 'agunglbn', 'Agung Ferdinan', 'admin', 'Paskah 2023 Naposo', '1682921888_45bddcd74c4aeb7675fd.jpg', 1, '01 May 2023', '2023-05-01 01:18:08'),
(20, 'agunglbn', 'Agung Ferdinan', 'admin', 'Paskah 2023 Naposo', '1682921888_93dd05cbb0948cf3d0a7.jpg', 1, '01 May 2023', '2023-05-01 01:18:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `groups` varchar(64) NOT NULL,
  `created` varchar(64) NOT NULL,
  `modified` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id`, `username`, `fullname`, `nama_barang`, `tanggal`, `status`, `groups`, `created`, `modified`) VALUES
(4, 'gultom', 'Lodewick Gultom', 'Toa', '02 January 2023', 0, 'parataon', '2023-01-29 22:59:30', '2023-01-30 01:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemaat`
--

CREATE TABLE `jemaat` (
  `id` int(11) NOT NULL,
  `nama_jemaat` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tgl_lahir` varchar(64) NOT NULL,
  `umur` varchar(5) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `sektor` varchar(64) NOT NULL,
  `img` varchar(128) NOT NULL,
  `kepala_keluarga` varchar(128) NOT NULL,
  `nohp_kp` varchar(15) NOT NULL,
  `created` varchar(20) NOT NULL,
  `modified` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL,
  `otp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jemaat`
--

INSERT INTO `jemaat` (`id`, `nama_jemaat`, `email`, `nohp`, `jenis_kelamin`, `tgl_lahir`, `umur`, `alamat`, `kategori`, `pekerjaan`, `sektor`, `img`, `kepala_keluarga`, `nohp_kp`, `created`, `modified`, `status`, `otp`) VALUES
(1, 'Agung Ferdinan', 'agungsilaban25@gmail.com', 89508837177, 'Laki-laki', '12 May 2021', '22', 'Jalan parkit 8 Perumahan sidomulyo', 'Naposo', 'Mahasiswa', 'Nazaret', '1674027473_e5098dfc565aab979d90.jpeg', 'Alfred Pardomuan Silaban', '08942134232', '2023-01-06 04:23:22', '2023-01-18 01:37:53', '', ''),
(8, 'tania', 'ccx@gmail.com', 89508837177, 'Perempuan', '11 January 2023', '23', 'Jalan parkit 8 Perumahan sidomulyo', 'Ina', 'Mahasiswa', 'Yudea', '1674146384_bbe6f001710fdaa725bc.png', 'Aldo Fernando', '089688767732', '2023-01-07 08:33:56', '2023-01-19 10:40:09', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `jenis_khas` int(2) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `tanggal` varchar(64) NOT NULL,
  `total_kas` bigint(20) NOT NULL,
  `groups` varchar(64) NOT NULL,
  `created` varchar(64) NOT NULL,
  `modified` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Sekolah Minggu'),
(2, 'Naposo'),
(3, 'Ama & Ina'),
(4, 'Lansia'),
(5, 'Kesehatan'),
(6, 'Renungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1671706311, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `nama_peminjam` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `return_date` varchar(32) NOT NULL,
  `groups` varchar(64) NOT NULL,
  `file` varchar(128) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created` varchar(32) NOT NULL,
  `modified` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `username`, `nama_peminjam`, `nama_barang`, `tanggal`, `return_date`, `groups`, `file`, `status`, `created`, `modified`) VALUES
(1, 'agunglbn', 'Agung Silaban', 'Toa', '12 Jan 2022', '', 'naposo', '', 1, '', '2023-01-30 09:03:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(128) NOT NULL,
  `divisi` varchar(64) NOT NULL,
  `progres` smallint(6) NOT NULL,
  `status` int(2) NOT NULL,
  `create_user` varchar(128) NOT NULL,
  `created` varchar(32) NOT NULL,
  `modified` varchar(32) NOT NULL,
  `created_at` varchar(32) NOT NULL,
  `modified_at` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `nama_program`, `divisi`, `progres`, `status`, `create_user`, `created`, `modified`, `created_at`, `modified_at`) VALUES
(1, 'AC', 'diakonia', 50, 1, 'Agung Ferdinan', '09 April 2023', '03 April 2023', '', '2023-04-09 23:05:31'),
(3, 'Jubah', 'diakonia', 59, 1, 'Agung Ferdinan', '02 April 2023', '', '', ''),
(5, 'Sound System', 'parataon', 90, 1, 'Agung Ferdinan', '04 April 2023', '', '2023-04-04 05:41:48', '2023-04-04 05:41:48'),
(6, 'Pembangunan', 'parataon', 0, 0, 'Agung Ferdinan', '08 April 2023', '', '2023-04-08 03:04:00', '2023-04-08 03:04:00'),
(8, 'Kunjungan', 'naposo', 0, 1, 'Agung Silaban', '01 May 2023', '01 May 2023', '2023-05-01 00:57:35', '2023-05-01 00:58:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor`
--

CREATE TABLE `sektor` (
  `id` int(5) NOT NULL,
  `nama_sektor` varchar(64) NOT NULL,
  `created` varchar(64) NOT NULL,
  `modified` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sektor`
--

INSERT INTO `sektor` (`id`, `nama_sektor`, `created`, `modified`) VALUES
(1, 'Efrata', '', ''),
(2, 'Sion', '', ''),
(3, 'Efesus', '', ''),
(4, 'Yerusalem', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `salt` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `divisi` varchar(64) NOT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `groups` varchar(64) NOT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `salt`, `email`, `username`, `fullname`, `mobile`, `divisi`, `user_img`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `groups`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '64436f538a27064.00401158', 'agungsilaban25@gmail.com', 'agunglbn', 'Agung Ferdinan', 0, '', 'default.png', '$2y$10$TJhXaHfDEehZqlTFYE7Ro.xtxA11LJ0eZ8plGF/WAlWJInPyxGWMK', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, 1, 0, '2022-12-23 13:38:37', '2022-12-23 13:38:37', NULL),
(10, '', 'tumbal.game25@gmail.com', 'santa25', NULL, 0, '', 'default.png', '$2y$10$TJhXaHfDEehZqlTFYE7Ro.xtxA11LJ0eZ8plGF/WAlWJInPyxGWMK', NULL, NULL, NULL, NULL, NULL, 'user', NULL, 1, 0, '2022-12-25 11:44:13', '2022-12-25 11:44:13', NULL),
(19, '123436fb827064.00401158', 'parataon@gmail.com', 'Parataon', 'parataon', 2147483647, '', 'default.png', '$2y$10$XJUYaw9/k8M.eQ3ZLtD3p.fBXil.ZikyYVivARTYaHbdYgnZ9d97O', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, 0, '2023-01-04 21:16:05', '2023-01-04 21:16:05', NULL),
(31, '82436fdwb8a27064.004011234', 'sela23@gmail.com', 'sela', 'selaaa', 89508837177, '', 'default.png', '$2y$10$TJhXaHfDEehZqlTFYE7Ro.xtxA11LJ0eZ8plGF/WAlWJInPyxGWMK', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, 0, '2023-01-18 03:02:48', '2023-01-18 03:02:48', NULL),
(42, 'ds3436fb457a27064.0040234vd', 'parataon22@gmail.com', 'parhataon22', 'Agung Ferdinan', 89508837177, '', 'default.png', '$2y$10$kKV3j5TosdRq7O7jp7PykON8etxar.mXqtNmAKJs3w8KM4KV8TW4S', NULL, NULL, NULL, NULL, NULL, 'diakonia', NULL, 1, 0, '2023-01-27 06:25:59', '2023-01-27 06:25:59', NULL),
(44, '71436fhba27064.00401158', 'lodewic24@gmail.com', 'gultom', 'Lodewick Gultom', 812898732, '', 'default.png', '$2y$10$7k97S9NuHSBkhCiuVpO2xekAtgxOJje4DnPQp5v/6mjzam0RIesm6', NULL, NULL, NULL, NULL, NULL, 'parataon', NULL, 1, 0, '2023-01-27 10:33:41', '2023-01-27 10:33:41', NULL),
(45, '43f436fb8a27064.00401246', 'agunglbn@gmail.com', 'agunlbn', 'Agung Silaban', 812898732, '', 'default.png', '$2y$10$7k97S9NuHSBkhCiuVpO2xekAtgxOJje4DnPQp5v/6mjzam0RIesm6', NULL, NULL, NULL, NULL, NULL, 'naposo', NULL, 1, 0, '2023-04-21 23:57:28', '2023-04-21 23:57:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userss`
--

INSERT INTO `userss` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `avatar`, `password`, `created_at`, `updated_at`) VALUES
(1, 'vendetta', 'Mushe', 'Abdul-Hakim', 'musheabdulhakim99@gmail.com', '0542441933', '/opt/lampp/temp/phpBI156N', '$2y$10$w/Mlff4D8r8na63sum221eTIsQmwLMUdDivFnZ5lbSQwHEkibhZJ.', '2021-02-13 22:00:56', '2021-02-13 22:00:56'),
(2, 'bfoster', 'Walk-In', 'Customer', 'info@bfoster.com', '0342020369', '1613288323_dbc66a90b1c291bffaa4.jpg', '$2y$10$zy8n93A1cr5p3I8P8AxgGuqtlQzTEsjnP8sIT6RUzZWmcXwP/t1qy', '2021-02-14 07:38:43', '2021-02-14 07:38:43'),
(3, 'agunglbn', 'Agung', 'Ferdinan', 'agungsilaban25@gmail.com', '089508837177', '1671698934_672c3f7152cc7337beb3.jpeg', '$2y$10$nNggfN4cVH3XvOrP.jjM4.R5/zhy1lwFYuQSwc.Sbs7D3vd.T2m22', '2022-12-22 15:48:54', '2022-12-22 15:48:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
