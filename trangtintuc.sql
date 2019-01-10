-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2019 at 06:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trangtintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `stt` int(255) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `stt` int(255) NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_tintuc` int(10) UNSIGNED NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(10) UNSIGNED NOT NULL,
  `stt` int(255) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_theloai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`id`, `stt`, `ten`, `tenkhongdau`, `id_theloai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Giao Thông', 'giao-thong', 8, '2018-12-24 00:07:20', '2018-12-24 00:07:20'),
(2, 2, 'Đô Thị', 'do-thi', 8, '2018-12-24 00:08:08', '2018-12-24 00:08:08'),
(3, 3, 'Đời Sống', 'doi-song', 8, '2018-12-24 00:08:20', '2018-12-24 00:08:20'),
(4, 4, 'Quốc Phòng', 'quoc-phong', 8, '2018-12-24 00:08:29', '2018-12-24 00:08:29'),
(5, 5, 'Quân Sự', 'quan-su', 9, '2018-12-24 00:09:24', '2018-12-24 00:09:24'),
(6, 6, 'Tư Liệu', 'tu-lieu', 9, '2018-12-24 00:09:37', '2018-12-24 00:09:37'),
(7, 7, 'Phân Tích', 'phan-tich', 9, '2018-12-24 00:09:58', '2018-12-24 00:09:58'),
(9, 8, 'Người Việt 4 Phương', 'nguoi-viet-4-phuong', 9, '2018-12-24 00:21:44', '2018-12-24 00:43:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_23_080030_theloai', 2),
(4, '2018_12_23_081124_loaitin', 3),
(5, '2018_12_23_081226_tintuc', 4),
(6, '2018_12_23_083049_comment', 5),
(7, '2018_12_23_083355_banner', 5),
(8, '2018_12_24_080005_tintuc', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `stt` int(255) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `stt`, `ten`, `tenkhongdau`, `created_at`, `updated_at`) VALUES
(8, 1, 'Thời Sự', 'thoi-su', '2018-12-23 07:08:20', '2018-12-23 20:28:16'),
(9, 2, 'Thế Giới', 'the-gioi', '2018-12-23 07:45:48', '2018-12-23 20:29:04'),
(10, 3, 'Kinh Doanh', 'kinh-doanh', '2018-12-23 07:45:53', '2018-12-23 20:29:20'),
(11, 4, 'Pháp Luật', 'phap-luat', '2018-12-23 07:45:58', '2018-12-23 20:29:28'),
(12, 5, 'Thể Thao', 'the-thao', '2018-12-23 07:46:02', '2018-12-23 20:29:46'),
(13, 6, 'Công Nghệ', 'cong-nghe', '2018-12-23 07:46:09', '2018-12-23 20:29:56'),
(14, 7, 'Giải Trí', 'giai-tri', '2018-12-23 07:46:19', '2018-12-23 20:30:05'),
(15, 8, 'Âm Nhạc', 'am-nhac', '2018-12-23 07:46:24', '2018-12-23 20:30:15'),
(16, 9, 'Phim Ảnh', 'phim-anh', '2018-12-23 07:46:28', '2018-12-23 20:30:28'),
(17, 10, 'Thời Trang', 'thoi-trang', '2018-12-23 07:46:36', '2018-12-23 20:30:36'),
(18, 11, 'Sống Trẻ', 'song-tre', '2018-12-23 07:46:43', '2018-12-23 20:30:43'),
(19, 12, 'Giáo Dục', 'giao-duc', '2018-12-23 07:46:48', '2018-12-23 20:30:50'),
(20, 33, 'rrrrrrrrrrrrr', 'rrrrrrrrrrrrr', '2018-12-25 22:46:20', '2018-12-25 22:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--
-- Error reading structure for table trangtintuc.tintuc: #1932 - Table 'trangtintuc.tintuc' doesn't exist in engine
-- Error reading data for table trangtintuc.tintuc: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `trangtintuc`.`tintuc`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_users_foreign` (`id_users`),
  ADD KEY `comment_id_tintuc_foreign` (`id_tintuc`);

--
-- Indexes for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitin_id_theloai_foreign` (`id_theloai`) USING BTREE;

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
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_tintuc_foreign` FOREIGN KEY (`id_tintuc`) REFERENCES `tintuc` (`id`),
  ADD CONSTRAINT `comment_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_id_theloai_foreign` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
