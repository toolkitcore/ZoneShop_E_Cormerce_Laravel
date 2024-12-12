-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 05:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `zoneshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_status`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Đức Trình', 'admin@gmail.com', NULL, '$2y$10$RkM.l07fi0ymYBB/zB2JA.18rzaDQgetJ4B9RTCg3nCAhbCpiyO1O', NULL, 1, NULL, NULL),
(2, 'Nguyễn Thái Hoàng', 'thaihoang@gmail.com', NULL, '$2y$10$RkM.l07fi0ymYBB/zB2JA.18rzaDQgetJ4B9RTCg3nCAhbCpiyO1O', NULL, 1, NULL, NULL),
(3, 'Duy Tân', 'duytan@gmail.com', NULL, '$2y$10$RkM.l07fi0ymYBB/zB2JA.18rzaDQgetJ4B9RTCg3nCAhbCpiyO1O', NULL, 1, NULL, '2024-11-27 16:06:16'),
(6, 'Nguyễn Thị Tố Trinh', 'nguyenthitotrinh@gmail.com', NULL, '$2y$10$vfL2TIH8sc9bC3j.tbQHXeVSzNi/Rob3QqUYJ3eZvJBNEiZ9prp5S', NULL, 1, '2024-11-27 12:36:47', '2024-11-27 12:49:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_27_011824_create_tbl_admin_table', 1),
(6, '2024_09_28_081537_create_tbl_category_product', 1),
(7, '2024_10_03_084125_create_tbl_brand_product', 2),
(8, '2024_10_05_091807_create_tbl_product', 3),
(9, '2024_10_05_112614_create_tbl_attributes', 4),
(10, '2024_10_05_113958_create_tbl_product_attributes', 5),
(11, '2024_10_05_140940_create_tbl_product_images', 6),
(12, '2024_10_05_142430_update_product_table_add_on_delete', 6),
(13, '2024_10_06_193125_add_product_status_to_tbl_product_table', 7),
(14, '2024_11_06_201245_create_tbl_addresses_table', 8),
(15, '2024_11_06_202744_create_tbl_transactions', 9),
(16, '2024_11_07_004437_create_tbl_order', 10),
(17, '2024_11_09_181945_add_fullname_email_phone_to_tbl_address', 11),
(19, '2024_11_11_233131_create_posts_table', 12),
(20, '2024_11_11_233220_create_comments_table', 12),
(21, '2024_11_11_233300_create_interactions_table', 12),
(22, '2024_11_12_081252_add_post_image_to_tbl_posts_table', 13),
(23, '2024_11_12_094911_modify_content_column_in_tbl_posts', 14),
(24, '2024_11_12_095648_modify_tags_column_in_tbl_posts', 15),
(25, '2024_11_12_104554_add_post_des_to_tbl_posts', 16),
(26, '2024_11_13_093522_create_slider_home_table', 17),
(27, '2024_11_13_094019_add_slider_image_to_slider_home_table', 18),
(28, '2024_11_15_102728_create_tbl_poster', 19),
(29, '2024_11_16_131915_create_tbl_reviews_product', 20),
(30, '2024_11_17_105226_add_transaction_id_to_tbl_review_product', 21),
(31, '2024_11_17_112700_remove_review_image_from_tbl_review_product', 22),
(32, '2024_11_18_005637_add_is_featured_to_tbl_review_product', 23),
(33, '2024_11_22_205015_create_tbl_admins', 24),
(34, '2024_11_25_163120_create_permission_tables', 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\Admin', 1),
(5, 'App\\Models\\Admin', 3),
(6, 'App\\Models\\Admin', 2),
(7, 'App\\Models\\Admin', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hoangductrinh2k5@gmail.com', '$2y$10$ArzhkM4lUVi4wkS2qFQ0G.U30SkVXmAWfvh3NWTCP1bJKxSj7.13C', '2024-11-28 11:19:11'),
('nxhung20it@gmail.com', '$2y$10$GhyX.bAbaqRdnrCgzSce/OrLtRTDowcdtRb.BPUkP/d06B0R9y.YO', '2024-11-05 02:40:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(17, 'add category', 'admin', '2024-11-26 11:27:27', '2024-11-26 11:27:27'),
(18, 'edit category', 'admin', '2024-11-26 11:27:27', '2024-11-26 11:27:27'),
(19, 'delete category', 'admin', '2024-11-26 11:27:27', '2024-11-26 11:27:27'),
(20, 'publish category', 'admin', '2024-11-26 11:27:27', '2024-11-26 11:27:27'),
(21, 'add brand', 'admin', '2024-11-26 11:28:20', '2024-11-26 11:28:20'),
(22, 'edit brand', 'admin', '2024-11-26 11:28:20', '2024-11-26 11:28:20'),
(23, 'delete brand', 'admin', '2024-11-26 11:28:20', '2024-11-26 11:28:20'),
(24, 'publish brand', 'admin', '2024-11-26 11:28:20', '2024-11-26 11:28:20'),
(25, 'add product attribute', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(26, 'edit product attribute', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(27, 'delete product attribute', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(28, 'publish product attribute', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(29, 'add product detail', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(30, 'edit product detail', 'admin', '2024-11-26 11:31:28', '2024-11-26 11:31:28'),
(31, 'delete product detail', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(32, 'publish product detail', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(33, 'add product', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(34, 'edit product', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(35, 'delete product', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(36, 'publish product', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(37, 'add product image', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(39, 'delete product image', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(40, 'publish product image', 'admin', '2024-11-26 11:31:29', '2024-11-26 11:31:29'),
(42, 'publish order list', 'admin', '2024-11-26 12:01:56', '2024-11-26 12:01:56'),
(43, 'publish order detail', 'admin', '2024-11-26 12:01:56', '2024-11-26 12:01:56'),
(44, 'publish order address', 'admin', '2024-11-26 12:01:56', '2024-11-26 12:01:56'),
(45, 'edit order address', 'admin', '2024-11-26 12:01:56', '2024-11-26 12:01:56'),
(46, 'add blog', 'admin', '2024-11-26 12:01:56', '2024-11-26 12:01:56'),
(47, 'edit blog', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(48, 'delete blog', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(49, 'publish blog', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(50, 'publish review', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(51, 'delete review', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(52, 'add slider', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(53, 'delete slider', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(54, 'publish slider', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(55, 'add poster', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(56, 'delete poster', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(57, 'publish poster', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(58, 'add feedback', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(59, 'delete feedback', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(60, 'publish feedback', 'admin', '2024-11-26 12:01:57', '2024-11-26 12:01:57'),
(62, 'edit order list', 'admin', '2024-11-26 13:46:47', '2024-11-26 13:46:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin', '2024-11-25 10:33:49', '2024-11-25 10:33:49'),
(5, 'employee', 'admin', '2024-11-25 10:34:15', '2024-11-25 10:34:15'),
(6, 'publisher', 'admin', '2024-11-25 10:44:00', '2024-11-25 10:44:00'),
(7, 'editor', 'admin', '2024-11-27 10:58:02', '2024-11-27 10:58:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(17, 4),
(18, 4),
(18, 7),
(19, 4),
(20, 4),
(20, 5),
(20, 6),
(21, 4),
(22, 4),
(22, 7),
(23, 4),
(24, 4),
(24, 5),
(24, 6),
(25, 4),
(26, 4),
(26, 7),
(27, 4),
(28, 4),
(28, 5),
(28, 6),
(29, 4),
(30, 4),
(30, 7),
(31, 4),
(32, 4),
(32, 5),
(32, 6),
(33, 4),
(34, 4),
(34, 7),
(35, 4),
(36, 4),
(36, 5),
(36, 6),
(37, 4),
(39, 4),
(40, 4),
(40, 5),
(40, 6),
(42, 4),
(42, 5),
(43, 4),
(43, 5),
(44, 4),
(44, 5),
(45, 4),
(45, 7),
(46, 4),
(47, 4),
(47, 5),
(47, 7),
(48, 4),
(48, 5),
(49, 4),
(49, 5),
(50, 4),
(50, 5),
(51, 4),
(52, 4),
(52, 5),
(53, 4),
(53, 5),
(54, 4),
(54, 5),
(55, 4),
(55, 5),
(56, 4),
(57, 4),
(57, 5),
(58, 4),
(58, 5),
(59, 4),
(60, 4),
(60, 5),
(62, 4),
(62, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_type` enum('pickup','delivery') NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `user_id`, `address_type`, `province`, `district`, `ward`, `address`, `created_at`, `updated_at`, `fullname`, `email`, `phone`) VALUES
(63, 4, 'delivery', 'Thành phố Hà Nội', 'Huyện Đông Anh', 'Xã Kim Nỗ', '23 Nguyễn Hoàng', '2024-11-10 18:55:57', '2024-11-10 18:55:57', 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0223432223'),
(64, 6, 'delivery', 'Thành phố Hà Nội', 'Huyện Sóc Sơn', 'Xã Hiền Ninh', '10 Phan duy tân', '2024-11-10 19:07:51', '2024-11-10 19:07:51', 'Nguyễn Minh Quân', 'nguyenminhquan@gmail.com', '0233223333'),
(65, 6, 'delivery', 'Tỉnh Phú Thọ', 'Huyện Lâm Thao', 'Xã Vĩnh Lại', '23 Nguyễn Văn Linh', '2024-11-10 19:15:36', '2024-11-10 19:15:36', 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575'),
(66, 6, 'delivery', 'Thành phố Hà Nội', 'Quận Bắc Từ Liêm', 'Phường Cổ Nhuế 2', '23 Nguyễn Văn Linh', '2024-11-14 06:11:35', '2024-11-14 06:11:35', 'Nguyễn Thị Tố Trinh', 'nguyenthitotrinh@gmail.com', '0293232322'),
(67, 6, 'delivery', 'Thành phố Hà Nội', 'Huyện Đông Anh', 'Xã Dục Tú', '23 Lê Từ Liêm', '2024-11-14 18:17:48', '2024-11-14 18:17:48', 'Diệp Mạnh Tuấn', 'diepmanhtuan@gmail.com', '0848720575'),
(68, 6, 'delivery', 'Thành phố Hà Nội', 'Quận Long Biên', 'Phường Thạch Bàn', '23 Thanh phú', '2024-11-14 18:32:31', '2024-11-14 18:32:31', 'Phan Thanh Tuấn', 'hoangductrinh2k5@gmail.com', '0848720575'),
(69, 6, 'delivery', 'Thành phố Hà Nội', 'Quận Nam Từ Liêm', 'Phường Mễ Trì', '23 Nguyễn Văn Linh', '2024-11-14 18:51:53', '2024-11-14 18:51:53', 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0921321222'),
(73, 7, 'delivery', 'Thành phố Hà Nội', 'Quận Nam Từ Liêm', 'Phường Mễ Trì', '40 Lê Đình Lý', '2024-11-14 19:59:47', '2024-11-14 19:59:47', 'Diệp Thanh Tuấn', 'trinhhd.23ns@vku.udn.vn', '0848720575'),
(74, 6, 'delivery', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Hàng Mã', '10 Phan duy tân', '2024-11-14 22:04:21', '2024-11-14 22:04:21', 'Nguyễn Diên Tiến', 'nguyendientien01062005@gmail.com', '0848720575'),
(75, 7, 'delivery', 'Thành phố Hà Nội', 'Huyện Thanh Trì', 'Xã Vạn Phúc', '23 Nguyễn Văn Linh', '2024-11-16 01:50:14', '2024-11-16 01:50:14', 'Tuấn Hưng', 'trinhhd.23ns@vku.udn.vn', '0848720575'),
(76, 4, 'delivery', 'Thành phố Hà Nội', 'Huyện Gia Lâm', 'Xã Dương Quang', '23 Nguyễn Văn Linh', '2024-11-17 18:51:52', '2024-11-17 18:51:52', 'Xuân Hưng', 'hoangductrinh2k5@gmail.com', '0324394223'),
(77, 6, 'delivery', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Cửa Nam', '23 Nguyễn Văn Linh', '2024-11-19 13:39:16', '2024-11-19 13:39:16', 'Nguyễn Thị Tố Trinh', 'totrinh@gmail.com', '0848720575'),
(78, 6, 'delivery', 'Tỉnh Phú Thọ', 'Huyện Lâm Thao', 'Xã Phùng Nguyên', '23 Nguyễn Hoàng', '2024-11-22 11:19:01', '2024-11-22 11:19:01', 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575'),
(79, 6, 'delivery', 'Thành phố Hà Nội', 'Huyện Thanh Trì', 'Xã Yên Mỹ', '23 Nguyễn Hoàng', '2024-11-22 11:22:55', '2024-11-22 11:22:55', 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575'),
(80, NULL, 'pickup', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Cửa Nam', '50 Nguyễn Hoàng', '2024-11-22 15:52:10', '2024-11-22 15:52:10', NULL, NULL, NULL),
(81, 6, 'delivery', 'Tỉnh Sơn La', 'Huyện Sốp Cộp', 'Xã Mường Lèo', '23 Nguyễn Văn Linh', '2024-11-27 15:19:12', '2024-11-27 15:19:12', 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0233223777'),
(82, 97, 'delivery', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Nhật Tân', '23 Nguyễn Hoàng', '2024-11-27 15:33:35', '2024-11-27 15:33:35', 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575'),
(83, 6, 'delivery', 'Tỉnh Yên Bái', 'Thành phố Yên Bái', 'Xã Minh Bảo', '23 Nguyễn Hoàng', '2024-11-28 11:30:17', '2024-11-28 11:30:17', 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0848720575');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_attributes`
--

CREATE TABLE `tbl_attributes` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_attributes`
--

INSERT INTO `tbl_attributes` (`attribute_id`, `category_id`, `attribute_name`, `created_at`, `updated_at`) VALUES
(166, 35, 'Type', '2024-10-10 09:27:15', '2024-10-24 08:22:46'),
(167, 35, 'Number of Keys', '2024-10-10 09:27:15', '2024-10-10 09:27:15'),
(168, 35, 'Key Actions', '2024-10-10 09:27:15', '2024-10-24 08:14:42'),
(169, 35, 'Material', '2024-10-10 09:27:15', '2024-10-10 09:27:15'),
(170, 35, 'Finish', '2024-10-10 09:27:15', '2024-10-10 09:27:15'),
(192, 31, 'Keys', '2024-10-24 04:50:12', '2024-10-24 17:57:03'),
(193, 31, 'Pedals', '2024-10-24 04:50:12', '2024-10-24 17:57:06'),
(194, 31, 'Soundboard', '2024-10-24 04:50:12', '2024-10-24 17:57:09'),
(195, 31, 'Strings', '2024-10-24 04:50:12', '2024-10-24 17:57:13'),
(217, 41, 'Bảo hành', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(218, 41, 'Nhóm sản phẩm', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(219, 41, 'Tên', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(220, 41, 'Series', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(221, 41, 'Độ phân giải', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(222, 41, 'Loại cảm biến', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(223, 41, 'Ống kính', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(224, 41, 'ISO', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(225, 41, 'Tốc độ chụp', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(226, 41, 'Độ mở', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(227, 41, 'Kết nối', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(228, 41, 'Chế độ chụp', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(229, 41, 'Quay video', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(230, 41, 'Màn hình LCD', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(231, 41, 'Thời gian sử dụng pin', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(232, 41, 'Kích thước', '2024-11-26 13:11:52', '2024-11-26 13:11:52'),
(233, 41, 'Khối lượng', '2024-11-26 13:11:52', '2024-11-26 13:11:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(5, 'Yamaha', 'Description: A leading brand in the music industry, Yamaha offers a wide range of instruments, including pianos, guitars, and brass instruments. Known for their quality and innovation, Yamaha instruments are suitable for beginners and professionals alike.', 1, '2024-10-10 08:53:00', '2024-10-10 08:53:00'),
(6, 'Fender', 'Description: Renowned for their electric guitars and basses, Fender is a staple brand in rock and blues music. Their Stratocaster and Telecaster models are iconic, favored by musicians around the world.', 1, '2024-10-10 08:53:13', '2024-10-10 08:53:13'),
(7, 'Gibson', 'Gibson is famous for its high-quality electric guitars, particularly the Les Paul and SG models. The brand is synonymous with rock music and is known for its craftsmanship and rich tone.', 1, '2024-10-10 08:53:27', '2024-10-10 08:53:27'),
(8, 'Roland', 'Roland specializes in electronic musical instruments, including synthesizers, digital pianos, and drum machines. They are known for their innovative technology and sound quality.', 1, '2024-10-10 08:53:39', '2024-10-10 08:53:39'),
(9, 'Martin & Co.', 'C.F. Martin & Co. is a prestigious brand in acoustic guitars, known for their craftsmanship and rich tone. Their guitars are favored by folk, country, and bluegrass musicians.', 1, '2024-10-10 08:53:50', '2024-10-10 08:53:50'),
(10, 'Korg', 'Korg is well-known for its synthesizers, workstations, and electronic music gear. They offer a range of products for both live performance and studio recording.', 1, '2024-10-10 08:53:59', '2024-10-10 08:53:59'),
(11, 'Pearl', 'Pearl is a leading manufacturer of drums and percussion instruments. Their drum kits are favored by drummers for their sound quality and durability.', 1, '2024-10-10 08:54:10', '2024-10-10 08:54:10'),
(12, 'Ibanez', 'Ibanez is known for its electric guitars and basses, often favored by metal and rock musicians. They offer a wide range of models, catering to various playing styles.', 1, '2024-10-10 08:54:21', '2024-10-10 08:54:21'),
(13, 'Zildjian', 'Zildjian is one of the oldest and most respected cymbal manufacturers. Their cymbals are known for their exceptional sound quality and are used by drummers across various genres.', 1, '2024-10-10 08:54:33', '2024-10-10 08:54:33'),
(14, 'Kawai', 'Kawai specializes in pianos and digital pianos, known for their quality and craftsmanship. They offer a range of acoustic and digital instruments suitable for all levels of players.', 1, '2024-10-10 08:54:43', '2024-10-10 08:54:43'),
(15, 'Mendini by Cecilio', 'Mendini by Cecilio is a brand that specializes in producing affordable musical instruments, particularly for beginners and intermediate players', 1, '2024-10-14 11:41:12', '2024-10-14 11:41:12'),
(16, 'Stentor', 'Stentor is a well-respected brand that specializes in crafting high-quality string instruments, particularly violins, violas, cellos, and double basses', 1, '2024-10-14 11:41:58', '2024-10-14 11:41:58'),
(17, 'Cremona', 'Cremona is a well-known brand that specializes in crafting string instruments, including violins, violas, cellos, and double basses', 1, '2024-10-14 11:42:32', '2024-10-14 11:42:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_parent_id` tinyint(4) DEFAULT NULL,
  `category_sort_order` tinyint(4) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` tinyint(4) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_parent_id`, `category_sort_order`, `category_desc`, `category_status`, `category_image`, `created_at`, `updated_at`) VALUES
(30, 'String Instruments', NULL, 1, 'String instruments, also known as stringed instruments, are musical instruments that produce sound through the vibration of strings', 1, 'music_harp_instrument_harps_musical_instruments_icon_26284174.png', '2024-10-10 08:11:25', '2024-11-27 15:51:46'),
(31, 'Violin', 30, 1, 'The violin is a highly versatile and popular string instrument known for its expressive sound and agility', 1, '697violin_10098441.png', '2024-10-10 08:12:32', '2024-11-27 13:30:16'),
(32, 'Cello', 30, 2, 'The cello is a prominent string instrument known for its rich, deep sound and versatility in various musical genre', 1, 'cello_icon-icons97.png', '2024-10-10 08:13:14', '2024-10-10 08:13:14'),
(34, 'Keyboard Instruments', NULL, 2, 'Keyboard instruments are a diverse group of musical instruments that produce sound by means of a keyboard', 1, 'wind_harmonica_instruments_music_melodic_musical_instrument_icon_25401830.png', '2024-10-10 08:16:03', '2024-10-10 08:16:03'),
(35, 'Piano', 34, 1, 'The piano is one of the most popular and versatile musical instruments, known for its wide range of expressive capabilities and rich tonal qualities', 1, 'piano_icon-icons92.png', '2024-10-10 08:16:53', '2024-10-10 08:16:53'),
(36, 'Synthesizer', 34, 2, 'A synthesizer is an electronic musical instrument that generates audio signals through various methods, allowing for the creation and manipulation of sounds', 1, '1490134636-synthesizer_8223876.png', '2024-10-10 08:17:36', '2024-10-10 08:17:36'),
(39, 'Guitar', 30, 3, 'A six-stringed instrument played by strumming or plucking the strings. Available in various types, including electric, acoustic, bass, and classical, each offering a unique sound.', 1, 'gibson-les_paul_guitar_bass_icon-icons31.png', '2024-10-25 10:58:45', '2024-10-25 10:58:45'),
(40, 'Harp', 30, 4, 'A plucked string instrument with a triangular frame and multiple strings. It produces a soft, ethereal sound and is often associated with classical and folk music.', 1, 'music_harp_instrument_harps_musical_instruments_icon_26284159.png', '2024-10-25 10:59:25', '2024-10-25 10:59:25'),
(41, 'Ukulele', 30, 5, 'A small, four-stringed instrument that originated in Hawaii. It has a cheerful sound and is popular in folk and pop music.', 1, 'iconfinder-musicmelodysoundaudio18-4105563_1138534.png', '2024-10-25 11:00:29', '2024-10-25 11:00:29'),
(42, 'Accordion', 34, 3, 'A portable instrument with a bellows and buttons or keys, producing sound as air passes through reeds. It is often used in folk music and has a distinctive, lively sound.', 1, 'accordion_icon-icons27.png', '2024-10-25 11:03:11', '2024-10-25 11:03:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `post_id`, `user_id`, `content`, `timestamp`, `created_at`, `updated_at`) VALUES
(8, 22, 6, 'con chim non', '2024-11-13 09:02:38', '2024-11-13 02:02:38', '2024-11-13 02:02:38'),
(9, 22, 6, 'Chào mọi người nừ', '2024-11-13 09:03:01', '2024-11-13 02:03:01', '2024-11-13 02:03:01'),
(10, 22, 4, 'Chào fen', '2024-11-13 09:09:52', '2024-11-13 02:09:52', '2024-11-13 02:09:52'),
(11, 21, 4, 'Hãy đăng ký ngay hôm nay và bắt đầu tiếp cận nhiều sinh viên âm nhạc hơn!', '2024-11-13 09:15:32', '2024-11-13 02:15:32', '2024-11-13 02:15:32'),
(22, 22, 10, 'This is a great post!', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(23, 22, 11, 'I really enjoyed reading this, thanks for sharing.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(24, 22, 12, 'Interesting thoughts, I agree with you.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(25, 22, 13, 'Couldn’t have said it better myself.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(26, 22, 14, 'I learned a lot from this post, very informative.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(27, 22, 15, 'Great perspective, definitely something to think about.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(28, 21, 16, 'I love how detailed this post is, well done!', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(29, 21, 17, 'Very thought-provoking, I will definitely share this.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(30, 21, 18, 'Thanks for the post! I’ve learned so much.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(31, 21, 19, 'Really insightful! Keep up the good work.', '2024-11-22 15:33:29', '2024-11-22 15:33:29', '2024-11-22 15:33:29'),
(32, 17, 20, 'This is a fantastic post, very helpful!', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(33, 17, 21, 'Great article, I’ll be coming back for more posts like this.', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(34, 17, 22, 'This article made me think in a different way, thank you!', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(35, 18, 23, 'Really useful information, appreciate the effort you put into this.', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(36, 18, 24, 'I agree with most of your points, really insightful!', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(37, 18, 25, 'Very informative, I will definitely look into this further.', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(38, 18, 26, 'Excellent post, I’m glad I stumbled upon this!', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(39, 19, 27, 'Thanks for the share, I really enjoyed reading this.', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(40, 19, 28, 'Such a well-researched post, I will be sure to recommend it!', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(41, 19, 29, 'This was really helpful, thank you for the great insights.', '2024-09-30 17:00:00', '2024-09-30 17:00:00', '2024-09-30 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_interactions`
--

CREATE TABLE `tbl_interactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_product_name` varchar(255) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `transaction_id`, `product_id`, `order_qty`, `order_product_name`, `order_price`, `order_amount`, `created_at`, `updated_at`) VALUES
(68, 53, 8, 34, 'Yamaha U1', 15000, 510000, '2024-11-10 18:55:57', '2024-11-10 18:55:57'),
(69, 53, 21, 28, 'Yamaha FG830', 1000, 28000, '2024-11-10 18:55:57', '2024-11-10 18:55:57'),
(70, 54, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-10 19:07:51', '2024-11-10 19:07:51'),
(71, 55, 8, 7, 'Yamaha U1', 15000, 105000, '2024-11-10 19:15:36', '2024-11-10 19:15:36'),
(72, 55, 16, 5, 'Yamaha V3 Series Student Violin', 399, 1995, '2024-11-10 19:15:36', '2024-11-10 19:15:36'),
(73, 56, 9, 4, 'Kawai K-300', 8000, 32000, '2024-11-14 06:11:35', '2024-11-14 06:11:35'),
(74, 57, 8, 2, 'Yamaha U1', 15000, 30000, '2024-11-14 18:17:48', '2024-11-14 18:17:48'),
(75, 58, 9, 1, 'Kawai K-300', 8000, 8000, '2024-11-14 18:32:31', '2024-11-14 18:32:31'),
(79, 62, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-14 19:59:47', '2024-11-14 19:59:47'),
(80, 62, 9, 2, 'Kawai K-300', 8000, 16000, '2024-11-14 19:59:47', '2024-11-14 19:59:47'),
(81, 62, 16, 2, 'Yamaha V3 Series Student Violin', 399, 798, '2024-11-14 19:59:47', '2024-11-14 19:59:47'),
(82, 62, 17, 2, 'Cremona SV-130 Premier Novice', 600, 1200, '2024-11-14 19:59:47', '2024-11-14 19:59:47'),
(83, 63, 21, 4, 'Yamaha FG830', 1000, 4000, '2024-11-14 22:04:21', '2024-11-14 22:04:21'),
(84, 64, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(85, 64, 16, 1, 'Yamaha V3 Series Student Violin', 399, 399, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(86, 64, 17, 2, 'Cremona SV-130 Premier Novice', 600, 1200, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(87, 64, 18, 1, 'Stentor 1500 Violin Student I', 11000, 11000, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(88, 64, 21, 1, 'Yamaha FG830', 1000, 1000, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(89, 64, 22, 3, 'Fender American Professional II Stratocaster', 1211, 3633, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(90, 64, 23, 3, 'Gibson Les Paul Standard \'50s', 40000, 120000, '2024-11-16 01:50:14', '2024-11-16 01:50:14'),
(91, 65, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-17 18:51:52', '2024-11-17 18:51:52'),
(92, 65, 21, 1, 'Yamaha FG830', 1000, 1000, '2024-11-17 18:51:52', '2024-11-17 18:51:52'),
(93, 65, 22, 1, 'Fender American Professional II Stratocaster', 1211, 1211, '2024-11-17 18:51:52', '2024-11-17 18:51:52'),
(94, 65, 23, 1, 'Gibson Les Paul Standard \'50s', 40000, 40000, '2024-11-17 18:51:52', '2024-11-17 18:51:52'),
(95, 66, 8, 28, 'Yamaha U1', 15000, 420000, '2024-11-19 13:39:16', '2024-11-19 13:39:16'),
(96, 66, 9, 24, 'Kawai K-300', 8000, 192000, '2024-11-19 13:39:16', '2024-11-19 13:39:16'),
(97, 67, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-22 11:19:01', '2024-11-22 11:19:01'),
(98, 68, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-22 11:22:55', '2024-11-22 11:22:55'),
(99, 69, 8, 6, 'Yamaha U1', 15000, 90000, '2024-11-27 15:19:12', '2024-11-27 15:19:12'),
(100, 70, 18, 3, 'Stentor 1500 Violin Student I', 11000, 33000, '2024-11-27 15:33:35', '2024-11-27 15:33:35'),
(101, 70, 9, 1, 'Kawai K-300', 8000, 8000, '2024-11-27 15:33:35', '2024-11-27 15:33:35'),
(102, 71, 8, 1, 'Yamaha U1', 15000, 15000, '2024-11-28 11:30:17', '2024-11-28 11:30:17'),
(103, 71, 9, 1, 'Kawai K-300', 8000, 8000, '2024-11-28 11:30:17', '2024-11-28 11:30:17'),
(104, 71, 16, 1, 'Yamaha V3 Series Student Violin', 399, 399, '2024-11-28 11:30:17', '2024-11-28 11:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posters`
--

CREATE TABLE `tbl_posters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poster_image` varchar(255) NOT NULL,
  `poster_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posters`
--

INSERT INTO `tbl_posters` (`id`, `poster_image`, `poster_status`, `created_at`, `updated_at`) VALUES
(1, 'public/uploads/posters/pic1_1731668028.png', 0, '2024-11-15 03:53:48', '2024-11-27 15:50:03'),
(2, 'public/uploads/posters/pic2_1731668035.png', 1, '2024-11-15 03:53:55', '2024-11-15 04:01:11'),
(3, 'public/uploads/posters/pic3_1731668039.png', 1, '2024-11-15 03:53:59', '2024-11-15 04:01:09'),
(4, 'public/uploads/posters/pic4_1731668043.png', 1, '2024-11-15 03:54:03', '2024-11-15 03:54:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `category` varchar(100) NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `title`, `content`, `category`, `publication_date`, `tags`, `post_image`, `created_at`, `updated_at`, `post_des`) VALUES
(17, '25 Blog Guitar Hay Nhất', '<h2><strong>Phấn viết đàn guitar</strong></h2><p>Tìm kiếm các nguồn tài nguyên đáng tin cậy, chất lượng cao và thú vị là một phần quan trọng trong hành trình tự phát triển của một nghệ sĩ guitar. Guitar Chalk (&nbsp;<a href=\"https://www.guitarchalk.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitarchalk.com</a>&nbsp;) là thư viện tài nguyên mà tất cả chúng ta đều mơ ước với tư cách là giáo viên và học sinh. Đầy đủ các nguồn tài nguyên hữu ích và thiết thực bao gồm nhiều khía cạnh khác nhau liên quan đến thiết bị guitar, học tập, ghi âm và chơi Guitar Chalk rất dễ tìm kiếm và sử dụng.</p><h2><strong>Tiếng ồn của đàn guitar</strong></h2><p>Guitar Noise (&nbsp;<a href=\"http://www.guitarnoise.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitarnoise.com</a>&nbsp;) là một blog tuyệt vời nếu bạn đang tìm kiếm Đánh giá hoặc Bài học &amp; thật tuyệt vời khi họ làm cả hai điều đó! Trang web này được bình chọn là nguồn tài nguyên trực tuyến tốt nhất cho các bài học guitar, theo bình chọn của các học viên guitar của chúng tôi. Trang web này miễn phí để tham gia và có toàn bộ nội dung để người đọc hoặc người chơi truy cập chỉ bằng một nút bấm. Trang web này cũng có các podcast thường xuyên, đây là điều mà không nhiều blog guitar làm được hiện nay, theo ý kiến ​​của các học viên guitar của chúng tôi thì điều đó thật tuyệt!</p><h2><strong>Giàn khoan sát thủ</strong></h2><p>Killer Rig (&nbsp;<a href=\"https://killerrig.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">killerrig.com</a>&nbsp;) là nơi bạn có thể tìm thấy thông tin chi tiết về hướng dẫn, hiểu biết sâu sắc và đánh giá giúp bạn tìm, chơi và bảo dưỡng thiết bị của mình và xây dựng kỹ năng trong nhiều năm tới! Bao gồm mọi thứ từ lựa chọn dây đàn đến cài đặt amp, blog này phù hợp với người học ở mọi trình độ và chứa đầy nội dung hữu ích giúp bạn hiểu thế giới thiết bị guitar đôi khi gây nhầm lẫn.</p><h2><strong>Blog Đàn Guitar Cổ Điển Thật Sự</strong></h2><p>Blog True Vintage Guitar (&nbsp;<a href=\"https://truevintageguitar.com/blogs/tvg-blog\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">truevintageguitar.com/blog/</a>&nbsp;) thực hiện chính xác những gì nó nói trên hộp. Được người dùng của chúng tôi bình chọn là một trong những blog tốt nhất trên internet về các bài viết về thiết bị guitar cổ điển và guitar cổ điển. Với các bài viết chuyên sâu khám phá lịch sử và tác động của guitar, blog được hỗ trợ bởi những bức ảnh đẹp về thiết bị. Một bài viết phải đọc nếu bạn quan tâm đến thiết bị guitar cổ điển. Hiện có 11.000 người theo dõi trên Facebook.</p><h2><strong>Blog Guitar của tôi</strong></h2><p>Blog i Heart Guitar (&nbsp;<a href=\"http://iheartguitarblog.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">iheartguitarblog.com</a>&nbsp;) đã được cộng đồng sinh viên guitar của chúng tôi bình chọn là một trong những blog guitar toàn diện nhất năm 2018. Blog cung cấp các bài đánh giá chi tiết về thiết bị, phỏng vấn nghệ sĩ cũng như giới thiệu cho sinh viên của chúng tôi về âm nhạc mới. Thật thú vị khi thấy rằng blog này thực sự được các nghệ sĩ guitar metal và progressive ưa chuộng, mặc dù chắc chắn là dễ tiếp cận đối với các nghệ sĩ guitar thuộc mọi sở thích thể loại. Hiện có khoảng 7.500 người theo dõi trên Facebook và 14.500 người theo dõi trên Twitter.</p><h2><strong>Sự thật trong việc cắt nhỏ</strong></h2><p>Blog Truth in Shredding (&nbsp;<a href=\"https://www.truthinshredding.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">tructuyenshredding.com)</a>&nbsp;được bình chọn là blog guitar hay nhất dành cho người chơi shredder. Cộng đồng guitar của chúng tôi rất thích blog này vì có rất nhiều nghệ sĩ khác nhau từ khắp nơi trên thế giới tụ họp lại với nhau cùng chung tình yêu với shredder! Với gần 6.000 người theo dõi trên Facebook và hơn 11 triệu lượt xem, Truth in Shredding đã xây dựng được một cộng đồng người theo dõi và nghệ sĩ guitar đáng kể. Ngay cả khi shredding không phải là sở thích của bạn, hãy đảm bảo rằng bạn xem qua một số bài đăng trên blog của họ và bạn sẽ phải kinh ngạc trước một số tài năng được thể hiện.</p><h2><strong>Đàn Guitar Hippie</strong></h2><p>Không có danh sách blog guitar nào có thể hoàn thiện nếu thiếu blog GuitarHippies (&nbsp;<a href=\"http://guitarhippies.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitarhippies.com</a>&nbsp;). Một trong những blog guitar phổ biến nhất thế giới, blog này thực sự phổ biến với cộng đồng guitar của chúng tôi. Đây là một blog tồn tại rất lâu, cung cấp nội dung tuyệt vời từ các bài học, bài đăng về thiết bị, phỏng vấn nghệ sĩ cho đến những bài đăng lý thuyết cực kỳ quan trọng! Độ sâu của thông tin thực sự là vô tận, một điều thực sự được 40.000 người theo dõi trên mạng xã hội của blog này đánh giá cao.</p><h2><strong>ClassicalGuitar.org</strong></h2><p>Classical Guitar (&nbsp;<a href=\"http://www.classicalguitar.org/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">classicalguitar.org</a>&nbsp;) đã được bình chọn là một trong những blog hay nhất dành cho những người chơi guitar cổ điển. Trang web này cung cấp tin tức mới nhất, bài học &amp; mẹo và thủ thuật rất hữu ích cho bất kỳ người mới bắt đầu hoặc người chơi đã thành thạo nào. Đừng nản lòng vì giao diện đen trắng của trang web này vì những gì thiếu về màu sắc thì chắc chắn nó bù đắp bằng nội dung! Classical Guitar có gần 9.000 người theo dõi trên Facebook.</p><h2><strong>Người chơi đàn ghita</strong></h2><p>Được bình chọn là “chén thánh của các bài đánh giá guitar” như một nghệ sĩ guitar đã bình luận Guitaarr (&nbsp;<a href=\"http://guitaarr.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitaarr.com</a>&nbsp;) là một blog đánh giá thiết bị tuyệt vời. Cung cấp cho bạn những mẹo quan trọng để tự mua hoặc nếu bạn mua cho người khác, cho dù bạn muốn mua một cây đàn guitar mới hay tìm bàn đạp guitar tiếp theo của mình, blog này sẽ cung cấp cho bạn nhiều hơn thế nữa.</p><h2><strong>Blog Dạy Đàn Guitar</strong></h2><p>Blog Dạy Guitar (&nbsp;<a href=\"https://theguitarteachingblog.blogspot.co.uk/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">theguitarteachingblog.blogspot.co.uk</a>&nbsp;) được cộng đồng giáo viên dạy guitar của chúng tôi bình chọn là một trong những nguồn tài nguyên trực tuyến tốt nhất nhằm hỗ trợ giáo viên dạy guitar. Blog này được một giáo viên dạy guitar chuyên nghiệp mô tả là \"một trong những blog quan trọng và thú vị nhất\" trên internet.</p><p>Blog này thảo luận và đưa ra lời khuyên về những gì bạn nên dạy cho học sinh của mình với tư cách là một giáo viên và cung cấp nhiều bài học mẫu mà Matthew (chủ sở hữu Blog) đã tự mình trải qua. Một blog tuyệt vời dành cho giáo viên dạy guitar và những người muốn trở thành giáo viên dạy guitar để đọc và làm theo.</p><h2><strong>TrueFire</strong></h2><p>Blog TrueFire (&nbsp;<a href=\"http://truefire.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">truefire.com/blog/</a>&nbsp;) cung cấp nội dung bài học thực sự tốt và không chỉ tập trung vào một thể loại. Có rất nhiều thể loại từ Jazz đến Blues được trình bày. Blog này được bình chọn là nguồn tài nguyên trực tuyến tốt nhất dành cho học viên mới bắt đầu và có gần 130.000 người theo dõi trên Facebook.</p><h2><strong>Guitar Trả Lời Guy</strong></h2><p>Không có gì ngạc nhiên khi được bình chọn là nền tảng tư vấn guitar tốt nhất, Guitar Answer Guy (&nbsp;<a href=\"http://www.guitaranswerguy.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitaranswerguy.com</a>&nbsp;) có rất nhiều nội dung. Đánh giá thiết bị, mẹo bảo dưỡng guitar, bài học, lý thuyết &amp; lời khuyên sâu rộng từ những người chơi guitar khác. Nếu bạn thích có một chút mọi thứ ở một nơi và chỉ là một phần của một blog, hãy đảm bảo đó là blog này. Guitar Answer Guy hiện có hơn 8.000 người theo dõi trên Twitter.</p><h2><strong>Guitar Ventures</strong></h2><p>Guitar Ventures (&nbsp;<a href=\"http://www.guitaradventures.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitaradventures.com</a>&nbsp;) là một blog khác mà nhiều học viên guitar mới bắt đầu đã nêu bật như một nguồn tài nguyên chính mà họ sử dụng giữa các bài học guitar. Có các phần dành cho các bài học acoustic cho người mới bắt đầu, các bài học điện cho người mới bắt đầu và các bài học cổ điển cho người mới bắt đầu. Với sự đóng góp từ các chuyên gia guitar, nền tảng này là một nguồn tài nguyên lý tưởng để học viên sử dụng. Guitar Ventures hiện có 9.350 người theo dõi trên Facebook.</p><h2><strong>Chia sẻ cây đàn guitar của tôi</strong></h2><p>Một blog tuyệt vời có các bài đăng trên mọi thể loại từ acoustic đến metal, cũng như một số mẹo thực sự hữu ích cho người chơi guitar. Share My Guitar (&nbsp;<a href=\"http://blog.sharemyguitar.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">blog.sharemyguitar.com</a>&nbsp;) được bình chọn là một trong những blog mạng xã hội tốt nhất dành cho người chơi guitar. Cho dù bạn muốn thiết lập một phòng thu tại nhà hay đọc về các huyền thoại guitar thì đây là blog guitar dành cho bạn. Share My Guitar hiện có hơn 3.000 người theo dõi trên Facebook.</p>', '30', '2024-11-13 07:05:16', NULL, 'public/uploads/blog/post/PIC1_1731481516.jpg', '2024-11-13 00:05:16', '2024-11-13 00:05:16', 'Kết quả đã có từ cuộc bình chọn Blog Guitar hay nhất của chúng tôi! Xin chân thành cảm ơn cộng đồng học viên guitar của chúng tôi đã cung cấp các blog guitar yêu thích của họ trên khắp internet và bình luận về lý do tại sao các bài đăng trên blog này lại tuyệt vời'),
(18, 'Hướng dẫn tối ưu để dạy nhạc trực tuyến', '<p class=\"ql-indent-1\">Năm 2020 đã thay đổi thế giới và thay đổi hoàn toàn ngành dạy nhạc tư nhân. Nhiều giáo viên trên toàn cầu đã buộc phải suy nghĩ lại về cách tiếp cận của họ và dựa vào công nghệ hiện có để cho phép họ tiếp tục làm việc với học sinh của mình và thúc đẩy họ thành công.</p><p class=\"ql-indent-1\">May mắn thay, các công cụ chúng ta có cho phép chúng ta kết nối với bất kỳ ai, bất kỳ lúc nào, bất kỳ nơi đâu. Đối với giáo viên, điều này thực sự mở ra khả năng về những người chúng ta có thể dạy.</p><p class=\"ql-indent-1\">Dạy&nbsp;<a href=\"https://musicteacher.com/online-music-lessons/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">các bài học âm nhạc trực tuyến</a>&nbsp;có thể là một trải nghiệm đáng sợ hoặc đáng sợ đối với cả giáo viên chưa từng làm trước đây và học sinh chưa từng nhận được loại học phí này. Nhưng đừng lo lắng. Không có gì phải lo lắng. Trong hướng dẫn này, bạn sẽ tìm thấy tất cả những gì bạn cần biết về việc dạy nhạc trực tuyến cùng với một số mẹo và thủ thuật từ các giáo viên chuyên nghiệp khác đang làm theo cách này.</p><p class=\"ql-indent-1\">Lời khuyên từ giáo viên âm nhạc trực tuyến</p><p class=\"ql-indent-1\"><br></p><p class=\"ql-indent-1\">Một số giáo viên âm nhạc trong cộng đồng MusicTeacher.com đã chia sẻ suy nghĩ và kinh nghiệm của họ khi giảng dạy trực tuyến:</p><p class=\"ql-indent-1\"><br></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">Lên lịch nghỉ ngơi nhiều lần giữa mỗi bài học, ngay cả khi chỉ là 5-10 phút.</em></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">Kevin Armstrong, Giáo viên dạy đàn ghita</em></p><p class=\"ql-indent-1\"><br></p><p class=\"ql-indent-1\">Đây là một điểm tuyệt vời, vì việc bắt đầu học trên màn hình trong nhiều giờ kết hợp với cường độ giảng dạy – vốn đã là một môn thể thao năng lượng cao – thực sự có thể khiến bạn kiệt sức. Thật vậy, đây là một khái niệm mà nhiều giáo viên mà chúng tôi đã nói chuyện đã đề cập, với Craig Hill, một&nbsp;<a href=\"https://musicteacher.com/drum-lessons-york/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">giáo viên dạy trống ở York</a>&nbsp;, ủng hộ ý tưởng này:&nbsp;<em>“Tôi thấy rằng việc nghỉ giải lao 30 phút thường xuyên giữa các buổi học nhạc cho tôi thời gian để chuẩn bị cho học viên tiếp theo của mình và thiết lập cũng như kiểm tra thiết bị khi cần thiết”.</em>&nbsp;Việc có sẵn nước và đồ ăn nhẹ cũng có thể thực sự giúp duy trì mức năng lượng trong suốt các buổi học.</p><p class=\"ql-indent-1\">Calder McLaughlin, giáo viên dạy hát tại Loughborough, khuyến nghị rằng giáo viên “&nbsp;<em>Hãy kiên nhẫn với công nghệ và khuyến khích học sinh làm như vậy. Đối với học sinh học hát, tôi gửi các bản nhạc đệm hoặc thang âm cho họ và yêu cầu họ có một thiết bị thứ hai để phát qua đó để tránh các vấn đề với cài đặt âm thanh khử tiếng ồn của zoom.</em>&nbsp;”</p><p class=\"ql-indent-1\">Sử dụng công nghệ phù hợp cũng là một khía cạnh mà các giáo viên thực sự nhận ra trong quá trình nghiên cứu của chúng tôi. Tom Warner, một&nbsp;<a href=\"https://musicteacher.com/drum-lessons-sheffield/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">giáo viên dạy trống tại Sheffield</a>&nbsp;, đã chia sẻ với chúng tôi rằng&nbsp;<em>“Hãy tìm một nền tảng hiệu quả. Tôi đang chuyển từ Zoom sang Microsoft Teams vì lý do này. Ngoài ra, hãy đảm bảo chất lượng giảng dạy ở mức cao nhất có thể. Ngay cả việc kết hợp nhiều góc độ cũng giúp ích rất nhiều”.</em></p><p class=\"ql-indent-1\">Mỗi nhạc cụ đều có những thách thức riêng khi giảng dạy trực tuyến. Chúng tôi đã trao đổi với Tom về vấn đề này khi hỏi anh ấy về các vấn đề liên quan đến mức âm thanh của trống và từ góc nhìn của giáo viên, anh ấy thấy thế nào khi xem học viên chơi trống vì họ có các thiết bị/vị trí khác nhau để đặt camera.</p><p class=\"ql-indent-1\"><em><img src=\"data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20width=\'0\'%20height=\'0\'%20viewBox=\'0%200%200%200\'%3E%3C/svg%3E\" alt=\"Thiết lập bài học guitar trực tuyến của David Jobson.\"></em></p><p class=\"ql-indent-1\">David Jobson, người đã bắt đầu dạy&nbsp;<a href=\"https://musicteacher.com/zoom-guitar-lessons/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">guitar trên Zoom</a>&nbsp;cho học viên trên toàn thế giới, đã chia sẻ phương pháp giảng dạy của mình với chúng tôi.</p><p class=\"ql-indent-1\">Tom chia sẻ với chúng tôi rằng:&nbsp;<em>“Hầu hết thời gian, rất khó để biết được, vì vậy tôi cố gắng đảm bảo họ có góc nhìn tốt nhất về tôi và tôi cố gắng chỉ lắng nghe cẩn thận qua con vịt âm thanh lớn. Về góc độ, miễn là tôi có thể nhìn thấy tay của họ thì ổn, nhưng một số người chỉ có điện thoại, và những người khác có máy tính xách tay cũ.</em></p><p class=\"ql-indent-1\"><em>Một số chỉ có một cái bàn ở phía bên kia phòng và một số khác chỉ có một cái ngay sau họ khi bộ dụng cụ hướng vào góc. Gần như không thể có được một bức ảnh tương tự như của bạn, vì vậy tốt nhất là luôn có chất lượng tốt nhất để gửi cho họ.”</em></p><p class=\"ql-indent-1\">Do đó, việc tìm ra thiết lập phù hợp cho bạn và nhạc cụ của bạn là điều quan trọng. Ở trên, bạn sẽ thấy hình ảnh do David Jobson, một giáo viên dạy guitar trực tuyến, cung cấp về những gì trông giống như một thiết lập tuyệt vời để dạy các bài học âm nhạc trực tuyến. Điều quan trọng không kém là thừa nhận những hạn chế về khả năng dạy nhạc cụ trực tuyến, để bạn có thể lập kế hoạch và giải quyết những khía cạnh này - thiết lập để dạy trống, piano hoặc guitar sẽ trông và yêu cầu những cách tiếp cận khá khác nhau.</p><p class=\"ql-indent-1\">Chúng tôi nghĩ rằng bản tóm tắt ngắn gọn nhất về thành công của việc dạy nhạc trực tuyến được đưa ra bởi Alan Tang, một giáo viên dạy piano tại Leicester, người đã đưa ra ba bước sau:</p><p class=\"ql-indent-1\"><br></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">1. Hãy nghiêm ngặt với thời gian của bạn</em></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">2. Nhắc nhở phụ huynh (theo cách tử tế) rằng việc liên lạc liên tục sau giờ học ngoài giờ có thể hơi khó chịu (tôi chưa từng gặp trường hợp này) nhưng đôi khi học sinh/phụ huynh có thể vượt qua ranh giới với các bài học trực tuyến.</em></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">3. Có một cuốn sổ tay kỹ thuật số có thể chia sẻ với phụ huynh/học sinh/chính bạn</em></p><p class=\"ql-indent-1\"><em style=\"background-color: rgb(250, 204, 204);\">Alan Tang, Giáo viên dạy piano</em></p><p class=\"ql-indent-1\"><br></p><p class=\"ql-indent-1\">Đây là nơi tuyệt vời để bắt đầu với ba nguyên tắc cốt lõi cần tuân theo nếu bạn là giáo viên âm nhạc muốn dạy trực tuyến. Vậy hãy cùng tìm hiểu xem giáo viên âm nhạc trực tuyến thực sự như thế nào.</p><p class=\"ql-indent-1\">Lợi ích của việc giảng dạy trực tuyến</p><p class=\"ql-indent-1\">Nếu bạn đang cân nhắc theo đuổi sự nghiệp dạy nhạc trực tuyến thì một câu hỏi bạn có thể thắc mắc là những lợi ích chính của các bài học nhạc trực tuyến là gì.</p><p class=\"ql-indent-1\">Khi bạn dạy học ở khu vực địa phương của mình, bạn chỉ bị giới hạn bởi khu vực đó.</p><p class=\"ql-indent-1\">Các bài học âm nhạc trực tuyến mở ra toàn bộ thế giới để bạn tiếp cận. Điều này có nghĩa là bạn có thể dạy học viên tiềm năng từ San Francisco đến Thượng Hải chỉ trong một ngày (tất nhiên là múi giờ cho phép).</p><p class=\"ql-indent-1\">Với Internet, chúng ta có thể kết nối nhiều hơn bao giờ hết và điều này có nghĩa là chúng ta có thể kinh doanh theo cách hiệu quả hơn bao giờ hết.</p>', '30', '2024-11-13 07:07:21', NULL, 'public/uploads/blog/post/PIC2_1731481641.jpg', '2024-11-13 00:07:21', '2024-11-13 00:07:21', 'Năm 2020 đã thay đổi thế giới và thay đổi hoàn toàn ngành dạy nhạc tư nhân. Nhiều giáo viên trên toàn cầu đã buộc phải suy nghĩ lại về cách tiếp cận của họ và dựa vào công nghệ hiện có để cho phép họ tiếp tục làm việc với học sinh của mình và thúc đẩy họ thành công.'),
(19, 'Nhược điểm của việc giảng dạy trực tuyến', '<h2 class=\"ql-indent-1\">Bạn cần những thiết bị gì?</h2><p class=\"ql-indent-1\">Nếu bạn muốn dạy trực tuyến, bạn không cần một loạt thiết bị lớn. Bạn có thể xây dựng một thiết lập phù hợp với nhu cầu hoặc ngân sách của riêng mình, nhưng tin tuyệt vời là, điều này có thể mở rộng. Nếu bạn muốn mở rộng hơn và tốt hơn, bạn chắc chắn có thể.</p><p class=\"ql-indent-1\">Tối thiểu bạn sẽ cần:</p><ul><li class=\"ql-indent-1\">Một webcam</li><li class=\"ql-indent-1\">Một máy tính</li><li class=\"ql-indent-1\">Một micrô (Có thể được tích hợp vào webcam/máy tính xách tay/iPad)</li></ul><p class=\"ql-indent-1\">Để có kết quả tốt nhất, bạn nên sử dụng máy tính xách tay hoặc máy tính để bàn vì chúng có sức mạnh xử lý mạnh hơn nhiều so với iPhone hoặc iPad và không chỉ cho phép bạn truyền phát video chất lượng tốt hơn mà còn có thể thêm các thiết bị ngoại vi như nhiều micrô ngoài hơn hoặc camera tốt hơn.</p><p class=\"ql-indent-1\">Tùy thuộc vào nhạc cụ bạn đang dạy, giao diện âm thanh cũng có thể là một bổ sung rất hữu ích cho thiết lập của bạn. Ví dụ, nếu bạn là giáo viên dạy guitar, bạn có thể bật mic amp guitar và chạy vào giao diện để có âm thanh rõ ràng hơn, trực tiếp hơn so với âm thanh trong phòng mà mic máy tính mặc định của bạn sẽ thu được.</p><p class=\"ql-indent-1\">Nếu bạn đang sử dụng Zoom, bạn cũng có thể chỉ định nhiều đầu vào để có thể cắm nhiều thứ khác nhau vào giao diện, chẳng hạn như micrô cho nhạc cụ, micrô cho giọng nói, cách phát lại bản nhạc (có thể là cắm iPad vào giao diện) và bất kỳ thứ gì khác bạn cần.</p><p class=\"ql-indent-1\">Hầu hết các webcam giá cả phải chăng hiện nay đều có thể quay và phát trực tiếp ở độ phân giải HD 1080p, vì vậy chất lượng hình ảnh sẽ không phải là vấn đề bất kể ngân sách của bạn là bao nhiêu.&nbsp;</p><p class=\"ql-indent-1\">Bạn sẽ cần một kết nối internet ổn định với tốc độ tải xuống và tải lên tốt. Để có kết quả tốt nhất, hãy chạy kết nối internet của bạn qua Ethernet thay vì WiFi vì điều này sẽ cung cấp tốc độ và độ ổn định cao hơn nhiều.</p><h2 class=\"ql-indent-1\">Chương trình gọi video</h2><p class=\"ql-indent-1\">Có nhiều chương trình gọi video dành cho giáo viên âm nhạc để mở rộng bài học ra khỏi khu vực địa phương của họ. Hai chương trình phổ biến nhất là Skype và Zoom, cả hai đều cung cấp phiên bản miễn phí có thể được sử dụng để gọi cho bất kỳ ai trên thế giới qua internet.&nbsp;</p><p class=\"ql-indent-1\">Cả hai dịch vụ này đều cho phép chia sẻ tệp, chia sẻ màn hình và tương tác dựa trên văn bản để bạn có thể chia sẻ tất cả ghi chú và tệp cần thiết với học sinh trực tiếp trên nền tảng theo thời gian thực.</p><p class=\"ql-indent-1\">Bạn cũng có thể truy cập các dịch vụ này từ thiết bị di động và máy tính bảng nếu bạn hoặc học sinh không có máy tính để bàn hoặc máy tính xách tay, nhưng với tư cách là giáo viên, tốt nhất là bạn nên có một máy tính để bàn hoặc máy tính xách tay để sử dụng.</p><p class=\"ql-indent-1\">Cả hai chương trình đều chấp nhận giao diện âm thanh USB để phát âm thanh, điều này có nghĩa là bạn có thể kết nối nhạc cụ trực tiếp hoặc với micrô, do đó học viên có thể nghe được tín hiệu rõ ràng. Skype chỉ chấp nhận tín hiệu từ kênh&nbsp;thứ nhất&nbsp;của giao diện, nhưng Zoom sẽ chấp nhận nhiều kênh.</p><p class=\"ql-indent-1\">Có nhiều nền tảng gọi video khác, nhưng đây là hai nền tảng dễ truy cập nhất đối với bất kỳ ai.</p><p class=\"ql-indent-1\">Một số giáo viên sẽ sử dụng FaceTime hoặc Facebook Video Calling để dạy học, tuy nhiên nhiều giáo viên sẽ muốn tránh các nền tảng này vì chúng được coi là kênh giao tiếp \"cá nhân\" hơn vì bạn cần sử dụng tài khoản cá nhân hoặc số điện thoại cá nhân của mình.&nbsp;</p><h2 class=\"ql-indent-1\">Phần mềm miễn phí so với phần mềm cao cấp</h2><p class=\"ql-indent-1\">Khi nói đến việc lựa chọn nền tảng gọi video, các nền tảng miễn phí trên thị trường cung cấp chức năng tuyệt vời và đủ tính năng để hoàn thành công việc.</p><p class=\"ql-indent-1\"><a href=\"https://www.skype.com/en/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">Skype</a>&nbsp;và&nbsp;<a href=\"https://zoom.us/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">Zoom</a>&nbsp;là hai ứng dụng phổ biến nhất sẽ đủ đáp ứng nhu cầu của hầu hết giáo viên âm nhạc. Bạn có thể dễ dàng gọi điện cho ai đó, chia sẻ tệp, chia sẻ màn hình và nguồn cấp âm thanh, và tiến hành bài học.</p><p class=\"ql-indent-1\">Nhưng nếu bạn cần một số tính năng bổ sung mà các chương trình miễn phí không cung cấp, có một số lựa chọn thay thế tuyệt vời trong lĩnh vực cao cấp. Một lựa chọn đáng cân nhắc là&nbsp;<a href=\"https://rockoutloud.live/login\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">RockOutLoud.live</a>&nbsp;, đây là nền tảng video được thiết kế dành riêng cho việc dạy các bài học âm nhạc trực tuyến.&nbsp;</p><p class=\"ql-indent-1\">Vì đây là sản phẩm cao cấp nên nó có giá thành với các gói trả phí bắt đầu từ 9,95 đô la một tháng. Có một giấy phép miễn phí cung cấp cho bạn khả năng gọi video và chia sẻ PDF; tuy nhiên, tất cả các tính năng bổ sung đều bị khóa trong các gói trả phí.</p><p class=\"ql-indent-1\">Một giấy phép giáo viên đơn lẻ sẽ tốn của bạn 9,95 đô la một tháng và cho phép đặt bài học không giới hạn, Âm thanh HD với chức năng song ca, bảng trắng để ghi chú trực tiếp và nhiều hơn nữa. Nếu bạn thực sự muốn nghiêm túc với trường âm nhạc trực tuyến của mình và mang đến cho học sinh của mình trải nghiệm trực tuyến tuyệt vời nhất thì một số tính năng có sẵn ở đây có thể hữu ích.</p><h2 class=\"ql-indent-1\">Cách thiết lập phần mềm của bạn</h2><p class=\"ql-indent-1\">Sau khi đã quyết định chọn ứng dụng gọi video, bạn có thể thiết lập chương trình phù hợp với nhu cầu của mình. Luôn đáng để thực hiện một số cuộc gọi thử nghiệm với bạn bè hoặc thành viên gia đình trước để đảm bảo mọi thứ diễn ra suôn sẻ.</p><p class=\"ql-indent-1\">Bạn muốn kiểm tra một số điều quan trọng sau:</p><ul><li class=\"ql-indent-1\">Người gọi trông như thế nào?</li><li class=\"ql-indent-1\">Người gọi nghe thấy thế nào?</li><li class=\"ql-indent-1\">Chất lượng luồng như thế nào? Có mượt mà không, hay có hiện tượng giật và trễ không?</li></ul><p class=\"ql-indent-1\">Bạn muốn giữ cho khu vực giảng dạy của mình được chiếu sáng tốt để đảm bảo người ở đầu bên kia có thể nhìn rõ hình ảnh của bạn trên màn hình của họ. Bạn có thể sử dụng đèn đã có trong phòng hoặc thêm thứ gì đó như đèn vòng selfie từ Amazon.</p><p class=\"ql-indent-1\">Nếu webcam của bạn cho phép bạn điều chỉnh thông qua khu vực cài đặt gọi video, bạn nên dành thời gian cân bằng các yếu tố như Cân bằng trắng và độ bão hòa để video trông rõ ràng và tự nhiên ở phía người xem. Hầu hết các webcam cũng có vòng lấy nét ngoài, vì vậy hãy dành thời gian làm quen với cách thức hoạt động của vòng này để đảm bảo video của bạn được lấy nét.</p><p class=\"ql-indent-1\">Đối với âm thanh, bạn luôn muốn âm thanh của mình rõ ràng nhất có thể. Đây là lúc việc thêm giao diện âm thanh USB ngoài và một số micrô có thể hữu ích. Nhiều webcam hoặc máy tính xách tay sẽ có micrô tích hợp, nhưng thường thì chúng không thực sự đạt đến mức chất lượng bạn cần để mang đến những bài học âm nhạc tuyệt vời. Thêm micrô ngoài cho phép bạn kiểm soát hoàn toàn âm thanh của mình và chọn micrô chính xác mà bạn cần để phù hợp với bài học của mình.</p><p class=\"ql-indent-1\">Điều này cũng hữu ích khi sử dụng micrô cho các thiết bị bên ngoài như trống hoặc bộ khuếch đại guitar để mang đến cho học viên âm thanh được kiểm soát tốt nhất khi bạn trình bày.</p><p class=\"ql-indent-1\">Hầu hết các nền tảng gọi video cũng có chức năng khử tiếng ồn tích hợp sẵn. Mặc dù trên bề mặt, đây có vẻ là một tính năng hữu ích, nhưng đối với việc giảng dạy, nó thực sự có thể gây ra một số vấn đề. Tốt nhất là khuyến khích học sinh tắt tính năng này khi có thể để đảm bảo âm thanh của họ không bị gián đoạn hoặc cắt ngang bởi tính năng này.</p><p class=\"ql-indent-1\">Khi phát trực tuyến bài học qua cuộc gọi video, hãy cố gắng giảm thiểu việc sử dụng wifi. Luôn cố gắng kết nối qua cáp ethernet để có kết quả tốt nhất. Nếu WiFi là lựa chọn duy nhất, hãy thử ngắt kết nối bất kỳ thiết bị nào gần đó có thể đang sử dụng băng thông WiFi không cần thiết.&nbsp;</p><p class=\"ql-indent-1\">Zoom đã xuất bản&nbsp;<a href=\"https://blog.zoom.us/how-to-get-the-most-out-of-your-zoom-experience/#:~:text=There%2520are%2520many%2520webcams%2520that,per%2520second%2520under%2520this%2520resolution.\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">hướng dẫn thực sự hữu ích này</a>&nbsp;về cách thiết lập cuộc gọi Zoom của bạn để có chất lượng video và âm thanh tốt nhất. Nếu bạn là người dùng Skype, bạn cũng có thể xem&nbsp;<a href=\"https://support.skype.com/en/faq/FA34863/how-do-i-change-audio-and-video-settings-in-skype-on-desktop\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">hướng dẫn này</a>&nbsp;về cách cấu hình tài khoản Skype của mình.</p><p class=\"ql-indent-1\">Ngoài ra còn có một hướng dẫn tuyệt vời do Eric Heidbreder cung cấp, trong đó ông đánh giá các nền tảng và cài đặt tốt nhất để dạy nhạc trực tuyến – bài viết có thể được tìm thấy tại đây:&nbsp;<a href=\"https://www.ericheidbreder.com/single-post/the-best-services-and-settings-for-remote-music-lessons-with-step-by-step-instructions\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">ericheidbreder.com/single-post/the-best-services-and-settings-for-remote-music-lessons-with-step-by-step-instructions</a></p><h2 class=\"ql-indent-1\">Làm thế nào để thu hút sinh viên tiềm năng</h2><p class=\"ql-indent-1\">Có nhiều cách để thu hút lượng học viên toàn cầu cho doanh nghiệp giảng dạy trực tuyến của bạn. Hãy cùng xem xét một số phương pháp chính:</p><h3 class=\"ql-indent-1\">Phương tiện truyền thông xã hội</h3><p class=\"ql-indent-1\">Phương tiện truyền thông xã hội về cơ bản là danh bạ lớn nhất của mọi người. Với hàng tỷ người tiềm năng trong tầm tay, đây là nền tảng tuyệt vời để xây dựng sự hiện diện và thiết lập thương hiệu của bạn.&nbsp;</p><p class=\"ql-indent-1\">Nếu bạn chưa làm như vậy, hãy tạo một hồ sơ trên nền tảng mạng xã hội bạn đã chọn và đảm bảo rằng bạn xây dựng thương hiệu để phản ánh doanh nghiệp giảng dạy của bạn. Nếu bạn đã có trang cá nhân trên mạng này, hãy tạo một trang riêng cho mục đích sử dụng kinh doanh của bạn. Điều này có nghĩa là học sinh sẽ tìm thấy doanh nghiệp của bạn và tất cả các bài đăng liên quan đến doanh nghiệp của bạn.</p><p class=\"ql-indent-1\">Hãy xem các phương pháp hay nhất để thu hút lượt thích và theo dõi trang. Ví dụ, Instagram là một mạng lưới được kết nối bằng các hashtag liên quan đến bài đăng, hãy nghiên cứu xem hashtag nào phù hợp với nhu cầu của bạn và đừng quên đóng góp cho cộng đồng nhiều như bạn nhận được. Nếu bạn đang xây dựng đối tượng trên Facebook, thuật toán sẽ thưởng cho khả năng hiển thị bằng khả năng hiển thị nhiều hơn, vì vậy hãy đảm bảo rằng bạn chia sẻ bài đăng của mình với bạn bè và gia đình và yêu cầu họ liên kết và theo dõi trang.</p><h3 class=\"ql-indent-1\">Quảng cáo trên mạng xã hội</h3><p class=\"ql-indent-1\">Phương tiện truyền thông xã hội không chỉ là cách tuyệt vời để kết nối trực tiếp với khách hàng tiềm năng mà còn nhanh chóng trở thành một trong những nơi hàng đầu để quảng cáo doanh nghiệp.&nbsp;</p><p class=\"ql-indent-1\">Ví dụ, Facebook có Trình quản lý quảng cáo toàn diện cho phép bạn tinh chỉnh và nêu rõ thông tin nhân khẩu học chính xác của mình từ độ tuổi và vị trí đến sở thích và mối quan tâm. Xem xét phạm vi tiếp cận của họ, các quảng cáo được cung cấp có giá khá thấp so với một số phương pháp quảng cáo thông thường hơn như đăng bài trên báo hoặc tạp chí địa phương.</p><p class=\"ql-indent-1\">Quảng cáo trên mạng xã hội là một cách tuyệt vời để quảng cáo doanh nghiệp của bạn, tăng cường sự hiện diện trực tuyến và cho phép mọi người tìm thấy bạn và các dịch vụ bạn cung cấp, đặc biệt là khi hầu hết các công việc hàng ngày ngày càng tập trung nhiều hơn vào trực tuyến.</p><h3 class=\"ql-indent-1\">SEO trang web</h3><p class=\"ql-indent-1\">Tất cả giáo viên nên có một trang web. Phương tiện truyền thông xã hội là tuyệt vời để tiếp cận mọi người trong khu vực của bạn hoặc trong lĩnh vực của bạn, nhưng một trang web hoạt động như điểm liên lạc trung tâm của bạn trên internet. Đây là thứ mà Google sử dụng để thúc đẩy doanh nghiệp của bạn trong bảng xếp hạng. Nó cũng hoạt động như một hình thức thẩm quyền. Nếu bạn có một trang web, bạn phải là một doanh nghiệp nghiêm túc.</p><p class=\"ql-indent-1\">Trang web không cần phải tốn nhiều tiền. Ngay cả một trang web Wordpress đơn giản với một chủ đề được xây dựng sẵn cũng đủ để tạo trung tâm trực tuyến của bạn. Đảm bảo rằng SEO trang web của bạn đạt chuẩn để Google có thể tìm thấy trang của bạn và hiển thị cho những người có thể đang tìm kiếm.</p><p class=\"ql-indent-1\">SEO là Tối ưu hóa công cụ tìm kiếm. Đây là quá trình thêm các từ khóa, cụm từ và nội dung cụ thể khác vào trang web của bạn mà Google liên kết với các thuật ngữ tìm kiếm mà khách hàng tiềm năng có thể sử dụng.</p><h3 class=\"ql-indent-1\">Quảng cáo Google</h3><p class=\"ql-indent-1\">Cùng với việc có SEO tốt, bạn cũng có thể chạy quảng cáo trên Google.&nbsp;</p><p class=\"ql-indent-1\">Bạn đã bao giờ tự hỏi tại sao một số trang web luôn đứng đầu tìm kiếm chưa? Hoặc là chúng có SEO tuyệt vời, hoặc là chúng đang chạy quảng cáo kết quả tìm kiếm được tài trợ. Điều này có nghĩa là nếu ai đó trong khu vực địa phương của bạn tìm kiếm bất kỳ dịch vụ nào của bạn, bạn sẽ xuất hiện như một kết quả tìm kiếm được ưu tiên hoặc được đề xuất.</p><p class=\"ql-indent-1\">Khi sử dụng Google Ads, bạn cũng có thể theo dõi số liệu phân tích và xem quảng cáo của mình được xem bao nhiêu lần, cũng như xem tỷ lệ nhấp chuột (Số lần ai đó nhấp vào liên kết) và số lượt chuyển đổi bạn nhận được so với lượt xem trên trang web.</p><h2 class=\"ql-indent-1\">Cách Lên Lịch Học và Nhận Thanh Toán</h2><p class=\"ql-indent-1\">Khi nói đến việc giảng dạy trực tuyến, việc lên lịch học đòi hỏi mức độ quản lý nhật ký giống như khi giải quyết các buổi học trực tiếp. Bạn chỉ cần thỏa thuận các khung giờ với học viên qua điện thoại hoặc qua email/tin nhắn và đảm bảo rằng điều này được ghi chú lại, giống như khi bạn đặt lịch học thông thường.</p><p class=\"ql-indent-1\">Sự khác biệt lớn nhất là với thanh toán trực tuyến. Có một số cách để xử lý việc này và thực sự là làm sao cho phù hợp với cách bạn thường làm với tài khoản kinh doanh của mình.&nbsp;</p><p class=\"ql-indent-1\">Thanh toán có thể được nhận qua chuyển khoản ngân hàng hoặc qua dịch vụ của bên thứ ba như Paypal. Vì bạn sẽ yêu cầu chuyển tiền nên việc lập hóa đơn cho sinh viên sẽ hữu ích để bạn có thể theo dõi các tài khoản của mình.&nbsp;</p><p class=\"ql-indent-1\">Hóa đơn có thể được gửi dưới dạng tài liệu Word qua email hoặc qua dịch vụ như Quickbooks tạo hóa đơn qua email. Các loại hóa đơn này sẽ cung cấp cho sinh viên cách thanh toán thông qua thông tin chi tiết bạn cung cấp. Bạn có thể gửi cho họ thông tin chi tiết về ngân hàng hoặc địa chỉ Paypal để thực hiện chuyển khoản.</p><p class=\"ql-indent-1\">Nếu bạn sử dụng hệ thống lập hóa đơn tích hợp từ Paypal, học sinh thực sự có thể thanh toán hóa đơn trực tuyến thông qua liên kết Paypal gửi. Điều này sẽ thêm một khoản phí 4,4% vào phía bạn cho việc chuyển tiền, nhưng nhiều giáo viên vui lòng chấp nhận khoản phí nhỏ này để thuận tiện cho học sinh có thể thanh toán chỉ bằng một vài cú nhấp chuột.</p><p class=\"ql-indent-1\">Bạn có thể chọn lập hóa đơn theo từng bài học hoặc theo khối bài học. Nếu bạn chọn lập hóa đơn theo từng bài học, sẽ tiết kiệm thời gian hơn nhiều nếu chọn một ngày trong tuần để xử lý toàn bộ hóa đơn cho tuần tiếp theo. Điều này cũng giúp học viên làm quen với thời điểm bạn có thể lập hóa đơn cho họ.&nbsp;</p><p class=\"ql-indent-1\">Một cách làm tốt nữa là đảm bảo rằng học viên biết về bất kỳ chính sách hủy nào. Các bài học phải được thanh toán trước, càng sớm càng tốt và nếu học viên hủy ngoài khung thời gian bạn cho phép hủy, học phí cho bài học đó sẽ bị mất.</p><h2 class=\"ql-indent-1\">Cách Chuẩn Bị Bài Học</h2><p class=\"ql-indent-1\">Chuẩn bị bài học trực tuyến đôi khi có thể khó khăn hơn một chút so với bài học trực tiếp. Hầu hết giáo viên dạy tại studio của riêng họ thường có khả năng in tài liệu hoặc phát tài liệu cho học sinh trong lớp khi cần.&nbsp;</p><p class=\"ql-indent-1\">Các bài học trực tuyến đôi khi cần thêm một chút công tác chuẩn bị và một số kế hoạch trước. Vào cuối mỗi buổi học, hãy nói chuyện với học viên của bạn về bất kỳ chủ đề hoặc ý tưởng tiềm năng nào cho buổi học tiếp theo. Theo cách này, bạn có thể chuẩn bị bất kỳ ghi chú hoặc ký hiệu nhạc nào và gửi chúng trước buổi học để học viên có cùng nguồn lực như bạn.</p><p class=\"ql-indent-1\">Khoảng thời gian thêm này có thể chiếm hết ngày của bạn, vì vậy việc lập kế hoạch rất quan trọng. Hãy đảm bảo bạn có một ý tưởng cụ thể, thậm chí có thể lập kế hoạch cho một vài bài học cùng một lúc để bạn biết mình sẽ dạy gì cho học sinh theo từng tuần miễn là mọi thứ diễn ra theo đúng kế hoạch.</p><h2 class=\"ql-indent-1\">Chia sẻ tài nguyên với sinh viên</h2><p class=\"ql-indent-1\">Chia sẻ tài nguyên với sinh viên chưa bao giờ dễ dàng đến thế.&nbsp;</p><p class=\"ql-indent-1\">Hầu hết các chương trình gọi video đều có phương pháp trò chuyện hoặc chuyển tệp nào đó. Bạn chỉ cần kéo và thả các tệp Word, tài liệu PDF, hình ảnh hoặc tệp video hoặc âm thanh nhỏ hơn vào luồng trò chuyện và học viên sẽ nhận được theo thời gian thực.</p><p class=\"ql-indent-1\">Nếu bạn muốn gửi các tệp lớn hơn, chẳng hạn như bộ sưu tập các bản nhạc nền của một video thực sự chi tiết, hãy xem WeTransfer, một dịch vụ truyền tệp trực tuyến cho phép bạn gửi miễn phí tối đa 2 GB tệp đến email của người dùng.</p><p class=\"ql-indent-1\">Nếu bạn cần giải pháp lưu trữ trực tuyến để chia sẻ tệp với nhiều sinh viên, bạn có thể đăng ký Dropbox hoặc dịch vụ lưu trữ tệp khác. Dropbox cung cấp nhiều dung lượng lưu trữ đám mây trực tuyến với mức giá chỉ 9,99 bảng Anh/tháng và bạn có thể chia sẻ thư mục với mọi người để bất kỳ lúc nào bạn tải tệp mới lên, họ sẽ nhận được thông báo.</p><h2 class=\"ql-indent-1\">Làm việc hướng tới kỳ thi được chấm điểm</h2><p class=\"ql-indent-1\">Kỳ thi chấm điểm là một sự thu hút lớn đối với nhiều học sinh. Nhiều học sinh mơ ước theo đuổi sự nghiệp âm nhạc và kỳ thi chấm điểm có thể là một cách tuyệt vời để bắt đầu con đường theo đuổi ước mơ của họ.&nbsp;</p><p class=\"ql-indent-1\">Các kỳ thi được xếp loại là bằng cấp được công nhận và cũng cung cấp cái nhìn tổng quan hoàn chỉnh về nhạc cụ mà học viên đã chọn theo nhiều phong cách khác nhau.</p><p class=\"ql-indent-1\">Nếu bạn cung cấp các bài học có phân loại cho học sinh, bạn vẫn có thể thực hiện việc này trực tuyến, nhưng cần phải suy nghĩ trước một chút.&nbsp;</p><p class=\"ql-indent-1\">Là giáo viên, bạn cũng sẽ cần một bản sao của cuốn sách. Thông thường, bạn phải tự trả chi phí này, nhưng nếu bạn định đặt mua sách cho học sinh, thì không có gì sai khi xem xét liệu hội đồng khảo thí có cung cấp cho bạn bản sao PDF để bạn có thể hoàn thành tốt vai trò của mình hay không.&nbsp;</p><p class=\"ql-indent-1\">Làm hầu hết các bài kiểm tra được chấm điểm khá dễ dàng qua các cuộc gọi video. Hầu hết các chủ đề đều liên quan đến thảo luận qua lại và thiết lập kiểu trình diễn. Trong một số trường hợp, bạn có thể được yêu cầu chơi cùng lúc với học sinh.</p><p class=\"ql-indent-1\">Ví dụ, trong các kỳ thi chấm điểm guitar có một phần đệm mà giám khảo đưa cho học viên một biểu đồ hợp âm và yêu cầu họ đệm một giai điệu với các hợp âm được cung cấp. Do hạn chế của cuộc gọi video, không thể chơi phần này cùng lúc nên bạn có thể chuẩn bị trước một số buổi học và tạo một bản nhạc đệm ngắn với giai điệu và yêu cầu học viên chơi phần kết thúc của họ và chơi hợp âm của họ ở trên cùng theo thời gian thực.</p><p class=\"ql-indent-1\">Các kỳ thi thử cũng có thể được tổ chức trực tuyến, cũng như các kỳ thi thực tế. Nếu bạn đang chuẩn bị cuối cùng cho học sinh của mình, bạn có thể đảm nhận vai trò giám khảo và hỏi họ tất cả các câu hỏi có liên quan. Bạn sẽ cần sử dụng các tài liệu được ghi âm trước cho bất kỳ phần nào yêu cầu chơi cùng nhau. Đảm bảo có số lượng rõ ràng cho các tài liệu được ghi âm trước này, để học sinh biết chính xác cách sử dụng chúng.</p>', '30', '2024-11-13 07:08:07', NULL, 'public/uploads/blog/post/PIC3_1731481687.jpg', '2024-11-13 00:08:07', '2024-11-13 00:08:07', 'Dạy học trực tuyến là cơ hội tuyệt vời cho bất kỳ gia sư nào vì nó thực sự mở rộng phạm vi tìm kiếm của bạn và cho phép bạn kiểm soát hoàn toàn, tuy nhiên nó cũng có một vài nhược điểm.');
INSERT INTO `tbl_posts` (`id`, `title`, `content`, `category`, `publication_date`, `tags`, `post_image`, `created_at`, `updated_at`, `post_des`) VALUES
(21, 'Làm thế nào để tìm được một giáo viên âm nhạc giỏi', '<h2 class=\"ql-indent-1\">Có thể nói yếu tố quan trọng nhất cần cân nhắc khi đăng ký cho con bạn học nhạc là đảm bảo rằng bạn chọn đúng giáo viên, nhưng làm thế nào để tìm được một giáo viên âm nhạc giỏi và dấu hiệu của một giáo viên âm nhạc GIỎI là gì?</h2><p class=\"ql-indent-1\">Trong hành trình tìm kiếm một giáo viên âm nhạc giỏi có thể khiến con em chúng ta (hoặc chính chúng ta) hứng thú, say mê và đam mê với một loại nhạc cụ, đôi khi việc tìm kiếm giáo viên âm nhạc phù hợp có thể khiến chúng ta cảm thấy hơi khó khăn và không phải lúc nào chúng ta cũng tìm được người phù hợp ngay từ lần đầu tiên.</p><p class=\"ql-indent-1\">Tuy nhiên, vì sự khác biệt giữa việc tìm được một giáo viên âm nhạc giỏi và một giáo viên kém quan tâm có thể tạo nên sự khác biệt giữa việc con bạn muốn bỏ học sau một tháng và cuối cùng trở thành một chuyên gia chơi nhạc cụ mà chúng đã chọn, tôi nghĩ chúng ta đều có thể đồng ý rằng đó là một sự thất vọng đáng để vượt qua!</p><p class=\"ql-indent-1\">Vậy chúng ta bắt đầu từ đâu? Làm sao để tìm được một giáo viên âm nhạc giỏi? Chúng ta nên hỏi những câu hỏi nào và điều gì tạo nên một giáo viên âm nhạc tuyệt vời?</p><h3 class=\"ql-indent-1\">Làm thế nào để tìm được một giáo viên âm nhạc giỏi – 5 yếu tố chính bạn muốn tìm kiếm</h3><p class=\"ql-indent-1\">Điều đáng nhớ là gia sư âm nhạc mà bạn chọn không chỉ là người quyết định những gì con bạn nên/không nên học hoặc cách chúng nên/không nên chơi, mà họ còn là người chịu trách nhiệm chính cho con bạn bước vào hành trình âm nhạc suốt đời.</p><p class=\"ql-indent-1\">Một giáo viên âm nhạc giỏi là người có thể kết nối với con bạn ở cấp độ cá nhân, là người mà cả bạn và con bạn đều tin tưởng và lấy cảm hứng từ họ, để tận dụng tối đa trải nghiệm học âm nhạc của con bạn.</p><p class=\"ql-indent-1\">Có một số phương pháp để bạn có thể tìm được giáo viên phù hợp cho bạn và con bạn. Sau đây chúng ta sẽ xem xét một số cách phổ biến nhất.</p><h4 class=\"ql-indent-1\">1. Truyền miệng</h4><p class=\"ql-indent-1\">Trong khi tìm kiếm qua cơ sở dữ liệu giáo viên âm nhạc địa phương trực tuyến, như&nbsp;<a href=\"https://musicteacher.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\"><strong>MusicTeacher.com</strong></a>&nbsp;luôn là một khởi đầu tuyệt vời, thì không có gì tuyệt vời hơn bằng bằng chứng giai thoại về thành tích của giáo viên từ một người nào đó mà bạn biết.</p><p class=\"ql-indent-1\">Chúng tôi khuyên bạn nên bắt đầu bằng cách hỏi hàng xóm, bạn bè, giáo viên và thậm chí là thành viên gia đình xem họ có lời khuyên nào dành cho bạn không.</p><p class=\"ql-indent-1\">Bạn có thể làm theo những khuyến nghị này bằng cách tìm kiếm nhanh trên web, vì nhiều giáo viên giỏi sẽ có trang web và phương tiện truyền thông xã hội riêng, với các video và đánh giá để giúp bạn đưa ra quyết định.</p><p class=\"ql-indent-1\">Sau khi đã tập hợp được danh sách tên, bạn có thể liên hệ với các ứng viên để trò chuyện, xác minh thông tin của họ hoặc thậm chí tham dự buổi độc tấu/biểu diễn tại địa phương do họ tổ chức để hiểu rõ hơn về định hướng âm nhạc mà họ ưa thích.</p><h4 class=\"ql-indent-1\">2. Hỏi về bài học giới thiệu</h4><p class=\"ql-indent-1\">Học nhạc có thể là một cam kết tốn kém, và không ai hiểu rõ điều này hơn chính giáo viên. Tuy nhiên, điều đáng chú ý là giáo viên giàu kinh nghiệm thường sẽ cung cấp bài học giới thiệu mà bạn không mất một xu nào.</p><p class=\"ql-indent-1\">Những bài học giới thiệu này là cách tuyệt vời để thu hẹp danh sách ứng viên của bạn vì chúng có thể giúp cả con bạn và giáo viên đánh giá mức độ tương tác giữa họ với nhau.</p><p class=\"ql-indent-1\">Một giáo viên âm nhạc giỏi sẽ không cố gắng ký ngay cho bạn một hợp đồng dài hạn!</p><h4 class=\"ql-indent-1\">3. Đừng quên đặt câu hỏi</h4><p class=\"ql-indent-1\">Đối với giáo viên, việc đảm bảo học sinh phù hợp với mình cũng quan trọng như việc học sinh chọn đúng giáo viên.</p><p class=\"ql-indent-1\">Để đảm bảo tình huống này có lợi cho tất cả những người liên quan, chúng tôi khuyên bạn nên cân nhắc sử dụng bài học giới thiệu để đặt câu hỏi, bất kể bạn cảm thấy chúng có tầm thường đến mức nào.</p><p class=\"ql-indent-1\">Với loại câu hỏi phù hợp, bạn sẽ có thể đánh giá được cách giáo viên tương tác với con bạn, khả năng giảng dạy của họ như thế nào và thậm chí cả mức độ nhiệt tình giảng dạy của họ.</p><p class=\"ql-indent-1\">Ví dụ về những điều bạn có thể hỏi họ bao gồm:</p><ol><li class=\"ql-indent-1\">Bạn đã giảng dạy được bao lâu rồi?</li><li class=\"ql-indent-1\">Bạn có cung cấp đánh giá tiến độ thường xuyên cho học sinh của mình không?</li><li class=\"ql-indent-1\">Bạn sẽ khuyên học sinh nên luyện tập thường xuyên như thế nào?</li><li class=\"ql-indent-1\">Học sinh có bắt buộc phải học trong suốt năm không?</li><li class=\"ql-indent-1\">Bạn có dạy loại nhạc cụ nào khác không?</li><li class=\"ql-indent-1\">Bạn thường dạy học sinh ở độ tuổi nào?</li><li class=\"ql-indent-1\">Họ dạy những lớp/trình độ nào?</li><li class=\"ql-indent-1\">Họ mong đợi gì ở học sinh của mình?</li><li class=\"ql-indent-1\">Họ mong đợi điều gì ở cha mẹ?</li><li class=\"ql-indent-1\">Bạn&nbsp;<a href=\"https://musicteacher.com/group-music-lessons-vs-private-music-tuition/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">có cung cấp lớp học nhóm hay lớp học riêng không?</a></li></ol><p class=\"ql-indent-1\">Mỗi câu hỏi này đều có thể được sử dụng như một cách phá băng và sẽ giúp bạn hiểu rõ hơn về tính cách cũng như trình độ kinh nghiệm chung của giáo viên.</p><p class=\"ql-indent-1\">Nhưng hãy chuẩn bị trả lời các câu hỏi ngược lại!</p><p class=\"ql-indent-1\">Dấu hiệu của một giáo viên âm nhạc giỏi và một dấu hiệu tuyệt vời cho thấy ứng viên nghiêm túc với công việc giảng dạy chính là loại câu hỏi mà họ có thể hỏi bạn hoặc thậm chí là con bạn khi bạn gặp họ.</p><p class=\"ql-indent-1\">Trong số những câu hỏi này, bạn sẽ nghe thấy những câu hỏi sau:</p><ol><li class=\"ql-indent-1\">Con bạn quan tâm đến âm nhạc như thế nào?</li><li class=\"ql-indent-1\">Con bạn thích thể loại nhạc nào?</li><li class=\"ql-indent-1\">Con của bạn học tập thế nào ở trường?</li><li class=\"ql-indent-1\">Bạn có người thân nào có nền tảng âm nhạc không?</li><li class=\"ql-indent-1\">Con bạn có được tiếp cận với nhạc cụ phù hợp ở nhà để luyện tập không?</li><li class=\"ql-indent-1\">Bạn có sẵn sàng đầu tư thời gian và năng lượng để giúp con bạn luyện tập hàng ngày không?</li><li class=\"ql-indent-1\">Con bạn có thể tập trung vào một chủ đề trong ít nhất 20 phút không?</li></ol><p class=\"ql-indent-1\">Và cuối cùng, thông thường bạn sẽ được hỏi những câu hỏi sau nếu con bạn không phải là người mới bắt đầu và đã từng học trước đó:</p><ol><li class=\"ql-indent-1\">Tôi có thể nghe con bạn chơi nhạc cụ được không?</li></ol><p class=\"ql-indent-1\">Mỗi câu hỏi này được thiết kế để giúp gia sư biết cách tiếp cận việc dạy con bạn theo cách hiệu quả nhất có thể và cho phép họ điều chỉnh những bài học đầu tiên của con bạn cho phù hợp.</p><p class=\"ql-indent-1\">Một giáo viên chu đáo sẽ luôn là lựa chọn tốt hơn!</p><h4 class=\"ql-indent-1\">4. Họ có dạy nhạc cụ nào khác không?</h4><p class=\"ql-indent-1\">Như đã đề cập ở trên, một trong những câu hỏi \"phỏng vấn\" quan trọng mà bạn nên luôn hỏi khi gặp một giáo viên âm nhạc tiềm năng cho con mình là liệu họ có thể và có dạy bất kỳ nhạc cụ nào khác hay không.</p><p class=\"ql-indent-1\">Học sinh học nhạc – đặc biệt là trẻ em – thường có sở thích học nhạc nhưng lại nhận ra rằng nhạc cụ mình chọn không phù hợp với mình.</p><p class=\"ql-indent-1\">Khi điều này xảy ra, việc có một giáo viên thay thế mà các em quen thuộc và cảm thấy thoải mái có thể là lựa chọn tốt nhất trong tương lai.</p><p class=\"ql-indent-1\">Việc chuyển đổi theo cách này phổ biến hơn bạn nghĩ, khi nhiều tên tuổi âm nhạc lớn nhất thế giới bắt đầu hành trình âm nhạc của mình theo một cách, chỉ để thay đổi nhạc cụ chính vì lý do nào đó.</p><p class=\"ql-indent-1\">Một ví dụ điển hình là Flea của nhóm Red Hot Chilli Peppers, người được coi là một trong những nghệ sĩ chơi bass rock và funk nổi tiếng nhất trong bốn thập kỷ qua, nhưng bass không phải là tình yêu đầu của ông.</p><p class=\"ql-indent-1\">Flea – tên thật là Michael Peter Balzary – yêu thích nhạc Jazz từ khi còn nhỏ và bắt đầu học chơi kèn trumpet ở tuổi 11, nhưng&nbsp;<a href=\"https://www.rollingstone.com/music/music-news/bad-influence-flea-on-jazz-drugs-and-his-role-in-low-down-42923/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">lại chuyển sang chơi guitar bass khi tham gia ban nhạc vài năm sau đó</a>&nbsp;.</p><p class=\"ql-indent-1\">Một số giáo viên có thể chơi nhiều loại nhạc cụ, đây là cơ hội tuyệt vời để con bạn học nhiều loại nhạc cụ khác nhau.</p><h4 class=\"ql-indent-1\">5. Chúng có sẵn và nằm trong ngân sách của bạn không?</h4><p class=\"ql-indent-1\">Bây giờ bạn đã chuẩn bị tốt hơn để chọn đúng giáo viên âm nhạc cho con mình, nhưng đừng quên ghi nhớ một số yếu tố quan trọng khác khi cố gắng tìm một giáo viên âm nhạc giỏi. Tất nhiên, một số yếu tố quan trọng khác có thể phát huy tác dụng khi chọn đúng gia sư cho con bạn bao gồm:</p><ol><li class=\"ql-indent-1\">Sự sẵn có của giáo viên</li><li class=\"ql-indent-1\">Giáo viên ở đâu</li><li class=\"ql-indent-1\">Học phí của các bài học là bao nhiêu?</li></ol><p class=\"ql-indent-1\">Đừng bao giờ quên rằng việc lựa chọn giáo viên âm nhạc phù hợp có thể mang lại tác động tích cực đến con bạn và sự phát triển của trẻ trong nhiều năm tới, vì vậy hãy chắc chắn rằng bạn lựa chọn một cách khôn ngoan.</p><p class=\"ql-indent-1\">Nếu bạn tò mò về giá cả, chúng tôi đã tổng hợp một bài viết về&nbsp;<a href=\"https://musicteacher.com/how-much-should-i-charge-for-music-lessons/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\"><strong>chi phí học nhạc</strong></a>&nbsp;– bài viết tuyệt vời để bạn có thể biết được chi phí học nhạc theo nhóm và học riêng.</p><h4 class=\"ql-indent-1\">Kết hợp với giáo viên âm nhạc gần bạn</h4><p class=\"ql-indent-1\">Bằng cách sử dụng&nbsp;&nbsp;<a href=\"https://musicteacher.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\"><strong>MusicTeacher.com,</strong></a>&nbsp;&nbsp;bạn có thể truy cập vào hàng ngàn giáo viên âm nhạc trên toàn thế giới. Đây là cơ sở dữ liệu dễ điều hướng mà học sinh và phụ huynh có thể sử dụng để tìm gia sư âm nhạc theo vị trí của họ, hầu như ở bất kỳ đâu trên thế giới!</p><p class=\"ql-indent-1\">Học sinh hoặc phụ huynh chỉ cần tìm kiếm theo vị trí và nhạc cụ, họ sẽ thấy một loạt các gia sư âm nhạc khác nhau gần nơi họ ở.</p><h4 class=\"ql-indent-1\">Hơn 54.000 câu hỏi của sinh viên âm nhạc và con số này vẫn đang tiếp tục tăng!</h4><p class=\"ql-indent-1\">Bạn có phải là giáo viên âm nhạc đang muốn thu hút thêm học viên âm nhạc không? MusicTeacher.com đã tạo ra hơn 54.000 yêu cầu của học viên về giáo viên âm nhạc kể từ năm 2012.</p><p class=\"ql-indent-1\">Đây là một trong những cách dễ nhất để tìm được giáo viên âm nhạc phù hợp với bạn.</p><p class=\"ql-indent-1\">Nếu bạn là giáo viên âm nhạc, đây là cách tuyệt vời để thu hút sự chú ý của hàng ngàn học viên âm nhạc tiềm năng!</p><p class=\"ql-indent-1\">Hãy đăng ký ngay hôm nay và bắt đầu tiếp cận nhiều sinh viên âm nhạc hơn!</p>', '34', '2024-11-13 07:09:21', NULL, 'public/uploads/blog/post/PIC4_1731481761.jpg', '2024-11-13 00:09:21', '2024-11-13 00:09:21', 'Có thể nói yếu tố quan trọng nhất cần cân nhắc khi đăng ký cho con bạn học nhạc là đảm bảo rằng bạn chọn đúng giáo viên, nhưng làm thế nào để tìm được một giáo viên âm nhạc giỏi và dấu hiệu của một giáo viên âm nhạc GIỎI là gì?'),
(22, 'Làm thế nào để ngăn trẻ em bỏ học nhạc', '<h2 class=\"ql-indent-1\">Bạn lo lắng con hoặc học sinh của mình có thể muốn ngừng học nhạc? Sau đây là 7 mẹo giúp trẻ không bỏ học nhạc.</h2><p class=\"ql-indent-1\">Bất kỳ giáo viên hoặc phụ huynh nào có con muốn chơi một loại nhạc cụ sẽ nói với bạn rằng: đôi khi, việc khuyến khích các em không bỏ cuộc có thể là một cuộc đấu tranh khó khăn.</p><p class=\"ql-indent-1\">Trên thực tế, số liệu công bố từ một nghiên cứu do hãng sản xuất đàn guitar Fender thực hiện cho thấy có tới&nbsp;<a href=\"https://www.musicradar.com/news/90-of-beginner-guitar-players-give-up-within-a-year-says-fender\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\"><strong>90% học viên mới học đàn guitar bỏ cuộc ngay trong năm đầu tiên</strong></a>&nbsp;!</p><p class=\"ql-indent-1\">Vậy, chúng ta có thể làm gì để giúp trẻ em không bỏ học nhạc?</p><p class=\"ql-indent-1\">Bạn có thể nói chuyện với trẻ về số tiền đã đầu tư vào các bài học và nhạc cụ của chúng, các bài học âm nhạc có thể có lợi như thế nào cho sự phát triển của chúng và thậm chí có thể cố gắng thuyết phục chúng rằng chúng đang tiến bộ như thế nào, nhưng nếu tất cả những gì chúng muốn làm là chạy đi chơi Fortnite với bạn bè thì điều này có lẽ sẽ không có ích.</p><p class=\"ql-indent-1\">Ở đây chúng tôi đã tổng hợp một số gợi ý hữu ích cho cả phụ huynh và giáo viên cân nhắc khi họ thấy mình trong tình huống này. Tất cả đều nhằm mục đích giúp khuyến khích trẻ em tiếp tục các bài học âm nhạc của mình.</p><h3 class=\"ql-indent-1\">1. Giao tiếp cởi mở là chìa khóa</h3><p class=\"ql-indent-1\">Điều này có vẻ hiển nhiên, nhưng thật đáng ngạc nhiên khi có rất nhiều gia sư và phụ huynh không quan tâm đến nhu cầu thực sự của học sinh, thay vào đó, họ chỉ tập trung vào giáo án và giới hạn thời gian.</p><p class=\"ql-indent-1\">Nếu con bạn bắt đầu mất hứng thú với nhạc cụ mình đang chơi hoặc có vẻ không mấy hào hứng khi giờ học sắp đến, hãy nhờ gia sư tư vấn.</p><p class=\"ql-indent-1\">Giao tiếp cũng có tác dụng theo cả hai chiều. Nếu bạn là giáo viên và nhận thấy học sinh của mình có vẻ hơi mất hứng thú với bài học hoặc có vẻ hơi chán nản, hãy nói chuyện với các em: có thể các em đang gặp khó khăn với một khía cạnh cụ thể nào đó của nhạc cụ hoặc bài học, nhưng lại cảm thấy quá ngại ngùng để nói ra.</p><p class=\"ql-indent-1\">Hãy nhớ lại cảm giác của bạn khi ở độ tuổi đó nếu bạn phải vật lộn để chơi nhạc cụ của mình, và bạn sẽ hiểu rõ hơn những gì đang diễn ra trong đầu họ. Chúng tôi thực sự đã đề cập đến&nbsp;<a href=\"https://musicteacher.com/how-to-retain-music-students/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\"><strong>cách giữ chân học viên âm nhạc trong một blog trước đó</strong></a>&nbsp;, điều này rất hữu ích khi nói đến việc tạo ra các bài học âm nhạc thú vị!</p><h3 class=\"ql-indent-1\">2. Đảm bảo rằng họ đang học đúng nhạc cụ</h3><p class=\"ql-indent-1\">Khi nói đến việc trẻ em học một nhạc cụ, sự lựa chọn của chúng thường bị ảnh hưởng bởi sự sẵn có của nhạc cụ, sở thích của cha mẹ hoặc thậm chí là định kiến ​​giới tính - ví dụ,&nbsp;<a href=\"https://www.researchgate.net/publication/248981393_\'If_I_play_my_sax_my_parents_are_nice_to_me\'_Opportunity_and_motivation_in_musical_instrument_and_singing_tuition\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">nghiên cứu đã chỉ ra</a>&nbsp;rằng các nhạc sĩ nam trẻ tuổi thường chọn chơi guitar, saxophone hoặc trống, trong khi các nhạc sĩ nữ trẻ tuổi lại thích chơi violin, sáo và hát.</p><p class=\"ql-indent-1\">Tuy nhiên, giống như mọi thứ khác, trẻ em không bao giờ nên cảm thấy rằng chúng phải tuân theo bất kỳ khuôn mẫu nào khi lựa chọn nhạc cụ phù hợp với mình.</p><p class=\"ql-indent-1\">Mặc dù việc chuyển từ nhạc cụ này sang nhạc cụ khác sau nhiều buổi học có thể giống như một khoản chi phí có thể tránh được, nhưng điều đáng nhớ là với nhạc cụ phù hợp, trẻ sẽ tiếp tục phát triển và tiến bộ, cũng như gắn bó với các bài học lâu hơn nhiều.</p><h3 class=\"ql-indent-1\">3. Giữ cho bài học thú vị</h3><p class=\"ql-indent-1\">Là một giáo viên âm nhạc, bạn phải luôn đảm bảo rằng các bài học có liên quan đến mục tiêu âm nhạc và kỹ thuật của từng học viên, nhưng bạn cũng cần nhớ rằng việc này có thể khó khăn đến mức nào nếu bạn ở vị trí của họ.</p><p class=\"ql-indent-1\">Sẽ rất hữu ích nếu bạn nói chuyện với học sinh của mình không chỉ để xác định loại nhạc mà các em thích nghe mà còn để biết bộ phim yêu thích của các em là gì hoặc thậm chí các em thích chơi trò chơi điện tử nào.</p><p class=\"ql-indent-1\">Học các bài hát hoặc giai điệu từ thứ gì đó mà trẻ hoặc bạn bè trẻ nhận ra thường có thể là yếu tố quyết định xem trẻ có gắn bó với nhạc cụ đã chọn hay không và chắc chắn có thể giúp trẻ tự tin hơn trong suốt quá trình học.</p><p class=\"ql-indent-1\">Bạn cũng có thể lập danh sách những bài hát mà học sinh của bạn phản hồi tích cực, sau đó giúp các em khám phá những bài hát có âm thanh tương tự mà trước đây các em có thể chưa từng biết đến.</p><h3 class=\"ql-indent-1\">4. Cân nhắc một giáo viên mới</h3><p class=\"ql-indent-1\">Mặc dù đây là điều mà hầu hết gia sư không muốn đề xuất, nhưng có thể họ không phù hợp với học sinh.</p><p class=\"ql-indent-1\">Nguyên nhân có thể là do xung đột về tính cách, không thích phong cách giảng dạy của gia sư, hoặc thậm chí là do chán nản nếu trẻ đã học với giáo viên đó trong một thời gian.</p><p class=\"ql-indent-1\">Con người đều thay đổi – đặc biệt là trẻ em – vì vậy, điều quan trọng là phải đảm bảo bạn tìm được một giáo viên có thể đáp ứng được bất kỳ sở thích nào của con bạn.</p><p class=\"ql-indent-1\">Đừng quên nói chuyện với con bạn về điều này: nếu chúng có vẻ hào hứng trước viễn cảnh tìm một giáo viên mới thì đây có thể là kịch bản tốt nhất cho tất cả mọi người liên quan.</p><p class=\"ql-indent-1\">MusicTeacher.com cung cấp cơ sở dữ liệu khổng lồ về&nbsp;<a href=\"https://musicteacher.com/music-lessons/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">giáo viên âm nhạc tại địa phương của bạn,</a>&nbsp;do đó bạn luôn có nhiều lựa chọn nếu giáo viên âm nhạc hiện tại của bạn không phù hợp.</p><h3 class=\"ql-indent-1\">5. Đừng sợ tham gia</h3><p class=\"ql-indent-1\">Là cha mẹ, nếu con bạn đặc biệt nhút nhát, có thể bạn cần thêm một chút động viên trong quá trình luyện tập để con tiếp tục.</p><p class=\"ql-indent-1\">Trong một số trường hợp, điều này có thể chỉ có nghĩa là ngồi cạnh trẻ trong khi chúng luyện tập để cho trẻ thấy bạn cũng nhiệt tình như chúng, hoặc thậm chí cùng tham gia bài học để học nhạc cụ cùng lúc để cả hai có thể luyện tập cùng nhau.</p><h3 class=\"ql-indent-1\">6. Nghỉ ngơi cũng không sao cả!</h3><p class=\"ql-indent-1\">Nếu một đứa trẻ hoặc học sinh nói với bạn rằng chúng muốn bỏ cuộc, có thể là do áp lực luyện tập thường xuyên quá lớn - đặc biệt là khi chúng còn phải làm bài tập về nhà và thi cử.</p><p class=\"ql-indent-1\">Trên thực tế,&nbsp;<a href=\"https://www.researchgate.net/publication/248981393_\'If_I_play_my_sax_my_parents_are_nice_to_me\'_Opportunity_and_motivation_in_musical_instrument_and_singing_tuition\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">các nhà nghiên cứu trong một nghiên cứu tại Anh năm 2009</a>&nbsp;cho rằng phần lớn học sinh bỏ học nhạc ở độ tuổi 10-11 là do phải học lên trung học.</p><p class=\"ql-indent-1\">Trong trường hợp đó, hãy nói chuyện với trẻ và cố gắng thỏa hiệp, chẳng hạn như “Con không thể bỏ bài học ngay bây giờ, nhưng con không cần phải luyện tập nếu con không muốn”.</p><p class=\"ql-indent-1\">Mặc dù điều này có vẻ hơi phản tác dụng, nhưng việc giảm áp lực luyện tập có thể mang lại hiệu quả tốt hơn về lâu dài.</p><h3 class=\"ql-indent-1\">7. Nếu mọi cách đều thất bại…</h3><p class=\"ql-indent-1\">…họ có thể bỏ cuộc.</p><p class=\"ql-indent-1\">Mặc dù giáo viên âm nhạc và phụ huynh không thích ý tưởng con/học sinh của mình từ bỏ một loại nhạc cụ, nhưng điều quan trọng nhất cần nhớ là quyết định có tiếp tục hay không hoàn toàn phụ thuộc vào chính học sinh.</p><p class=\"ql-indent-1\">Đôi khi tất cả những gì trẻ cần là một kỳ nghỉ dài trước khi quay lại với nhạc cụ, thậm chí có thể phải mất nhiều năm trước khi điều này xảy ra, nhưng ít nhất trẻ sẽ làm điều đó vì trẻ muốn - điều này có thể tạo nên sự khác biệt.</p><p class=\"ql-indent-1\">Một số học sinh có thể không bao giờ chơi nhạc cụ nữa trong đời, nhưng điều đó cũng không sao. Chỉ cần nhớ rằng: ngay cả khi họ không chơi nhạc cụ đó suốt đời, họ vẫn sẽ học được những bài học giá trị trong suốt chặng đường.</p><h3 class=\"ql-indent-1\">Bạn đang tìm kiếm một giáo viên âm nhạc gần bạn? Bạn đang tìm kiếm thêm học viên âm nhạc?</h3><p class=\"ql-indent-1\">Bạn có biết&nbsp;<a href=\"https://musicteacher.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: var(--bb-primary-color); background-color: transparent;\">MusicTeacher.com</a>&nbsp;đã tạo ra hơn 54.000 yêu cầu của học sinh về giáo viên âm nhạc không? Hàng ngàn học sinh và phụ huynh đang tích cực tìm kiếm giáo viên trong khu vực của họ và sử dụng musicteacher.com để tìm gia sư âm nhạc hoàn hảo.</p><p class=\"ql-indent-1\">Người đó có thể là bạn! MusicTeacher.com sẽ đưa hồ sơ của bạn đến với hàng ngàn học viên tiềm năng.</p><p class=\"ql-indent-1\">Tạo hồ sơ của bạn ngay hôm nay và tham gia cộng đồng giáo viên âm nhạc chuyên nghiệp đang ngày càng mở rộng danh sách khách hàng thông qua nền tảng của chúng tôi.</p><p class=\"ql-indent-1\">Nếu bạn cần một giáo viên âm nhạc tại khu vực của mình, MusicTeacher.com là giải pháp hoàn hảo để tìm giáo viên âm nhạc chất lượng cao.</p><p class=\"ql-indent-1\">Chúng tôi hy vọng những mẹo này giúp bạn hiểu được lý do hoặc ngăn cản trẻ em bỏ học nhạc. Chúc may mắn!</p>', '34', '2024-11-13 07:09:54', NULL, 'public/uploads/blog/post/PIC5_1731481794.jpg', '2024-11-13 00:09:54', '2024-11-13 00:09:54', 'Bạn lo lắng con hoặc học sinh của mình có thể muốn ngừng học nhạc? Sau đây là 7 mẹo giúp trẻ không bỏ học nhạc.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price_original` decimal(10,2) NOT NULL,
  `product_price_selling` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_price_original`, `product_price_selling`, `product_quantity`, `product_image`, `brand_id`, `category_id`, `created_at`, `updated_at`, `product_status`) VALUES
(8, 'Yamaha U1', 'A highly regarded upright piano, known for its balanced tone, responsive action, and durability. It’s widely used in schools, studios, and homes.', 20000.00, 15000.00, 6, 'public/uploads/product/u1yamaha-3-768x768-1-132.jpg', 5, 35, '2024-10-10 08:59:57', '2024-10-10 08:59:57', 1),
(9, 'Kawai K-300', 'An upright piano with excellent sound quality and action, ideal for advanced students and professionals. Known for its responsive touch and clear tone.', 10000.00, 8000.00, 120, 'public/uploads/product/kawai-k-300-mau-nau8.jpg', 14, 35, '2024-10-10 09:00:48', '2024-11-27 15:35:58', 1),
(16, 'Yamaha V3 Series Student Violin', 'The Yamaha V3 violin is designed specifically for beginners and students. It comes with a solid spruce top and maple back and sides, providing a warm, rich tone', 500.00, 399.00, 200, 'public/uploads/product/violin-yamaha-v3ska_1728931571.jpg', 5, 31, '2024-10-14 11:46:11', '2024-10-14 11:46:11', 1),
(17, 'Cremona SV-130 Premier Novice', 'The Cremona SV-130 is perfect for novice players, offering a solid hand-carved body, high-quality construction, and excellent tone. It comes with a lightweight case, bow, and rosin, making it a convenient option for beginners looking for an affordable yet reliable violin.', 1000.00, 600.00, 2121, 'public/uploads/product/71krSlUXrmL_1728931670.jpg', 17, 31, '2024-10-14 11:47:50', '2024-10-14 11:47:50', 1),
(18, 'Stentor 1500 Violin Student I', 'This Stentor violin is ideal for beginners. It features a solid spruce top with maple back and sides. The violin comes with ebony fittings, ensuring durability and quality. Included are a lightweight case, a bow, and rosin, making it an excellent package for students.', 12000.00, 11000.00, 397, 'public/uploads/product/1500_1_1728931735.jpg', 16, 31, '2024-10-14 11:48:55', '2024-11-27 15:35:58', 1),
(21, 'Yamaha FG830', 'Yamaha FG830 là một cây guitar acoustic với thiết kế truyền thống, mặt trước bằng gỗ thông nguyên khối, cho âm thanh ấm áp và phong phú. Cây guitar này rất phù hợp cho người mới bắt đầu và cả những nghệ sĩ chuyên nghiệp.', 1211.00, 1000.00, 111, 'public/uploads/product/14952105_800_1730137723.jpg', 5, 39, '2024-10-28 10:48:43', '2024-10-28 10:48:43', 1),
(22, 'Fender American Professional II Stratocaster', 'ender American Professional II Stratocaster mang đến âm thanh huyền thoại với các pickup V-Mod II, giúp tạo ra âm sắc rõ nét và linh hoạt. Cây guitar này lý tưởng cho những nhạc sĩ cần sự đa dạng trong phong cách chơi.', 4000.00, 1211.00, 121, 'public/uploads/product/BMT-Front_1730137852.jpg', 6, 39, '2024-10-28 10:50:52', '2024-10-28 10:50:52', 1),
(23, 'Gibson Les Paul Standard \'50s', 'Gibson Les Paul Standard \'50s là biểu tượng trong giới guitar electric với thiết kế cổ điển và âm thanh mạnh mẽ. Với mặt gỗ phong và thân gỗ mahogany, cây guitar này mang lại âm sắc ấm áp và bền bỉ, phù hợp cho các thể loại nhạc rock và blues.', 50000.00, 40000.00, 200, 'public/uploads/product/guitar-dien-fender-player-stratocaster-pf-3-colors-sunburst_1730137906.jpg', 7, 39, '2024-10-28 10:51:46', '2024-10-28 10:51:46', 1),
(24, 'Stentor 1 Cello', 'Stentor 1 Cello là một lựa chọn tuyệt vời cho người mới bắt đầu. Được làm từ gỗ tự nhiên, cello này cung cấp âm thanh ấm áp và dễ chơi. Thiết kế đẹp mắt và hoàn thiện chất lượng cao giúp tăng cường trải nghiệm học tập.', 3450.00, 3000.00, 200, 'public/uploads/product/1490APU-USQUARE_600x600_1730138449.webp', 16, 32, '2024-10-28 11:00:49', '2024-10-28 11:00:49', 1),
(25, 'Cremona SV-175', 'Cremona SV-175 là một cây cello chất lượng dành cho học sinh và nhạc sĩ trẻ. Với mặt gỗ thông nguyên khối và thân gỗ mahogany, cây cello này mang lại âm thanh phong phú và ấm áp, giúp người chơi phát triển kỹ năng âm nhạc của mình.', 1200.00, 1100.00, 300, 'public/uploads/product/dJ7x_4xC_1730138493.webp', 17, 32, '2024-10-28 11:01:33', '2024-10-28 11:01:33', 1),
(26, 'Yamaha SVC-110', 'Yamaha SVC-110 là một cây cello điện với thiết kế nhỏ gọn và dễ dàng mang theo. Âm thanh chân thực và chất lượng cao, cây cello này phù hợp cho cả việc biểu diễn và tập luyện, đặc biệt là trong môi trường thu âm.', 300.00, 100.00, 3000, 'public/uploads/product/images_1730138528.jpg', 5, 32, '2024-10-28 11:02:08', '2024-10-28 11:02:08', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_attributes`
--

CREATE TABLE `tbl_product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_attributes`
--

INSERT INTO `tbl_product_attributes` (`id`, `product_id`, `attribute_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(1, 16, 192, '122 sợi dâyw', '2024-10-24 06:04:05', '2024-10-25 08:11:04'),
(2, 16, 193, 'Đức Trình1', '2024-10-24 06:04:05', '2024-10-25 08:10:22'),
(3, 16, 194, 'Tôi nèe', '2024-10-24 06:04:05', '2024-10-25 08:08:34'),
(4, 16, 195, 'sửa đổi thành', '2024-10-24 06:04:05', '2024-10-25 08:08:58'),
(7, 8, 166, 'Value 1', '2024-10-25 08:12:45', '2024-10-25 08:12:45'),
(8, 8, 167, 'Con chim nè', '2024-10-25 08:12:45', '2024-10-25 08:12:45'),
(9, 8, 168, 'Value nè', '2024-10-25 08:12:45', '2024-10-25 08:12:45'),
(10, 8, 169, 'Ủa aloofoo', '2024-10-25 08:12:45', '2024-10-25 08:12:45'),
(11, 8, 170, 'mợt nha má', '2024-10-25 08:12:45', '2024-10-25 08:12:45'),
(12, 9, 166, 'Pikachu', '2024-10-25 08:13:42', '2024-10-25 08:13:42'),
(13, 9, 167, 'nihongo', '2024-10-25 08:13:42', '2024-10-25 09:36:43'),
(14, 9, 168, 'Pikiadesa', '2024-10-25 08:13:42', '2024-10-25 08:13:42'),
(15, 9, 169, 'hehehe', '2024-10-25 08:13:42', '2024-10-25 08:13:42'),
(16, 9, 170, 'Opaie', '2024-10-25 08:13:42', '2024-10-25 08:13:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`image_id`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(247, 'public/uploads/images/product/1729874297-17.jpg', 17, '2024-10-25 09:38:17', '2024-10-25 09:38:17'),
(248, 'public/uploads/images/product/1729874297-6.jpg', 17, '2024-10-25 09:38:17', '2024-10-25 09:38:17'),
(249, 'public/uploads/images/product/1729874297-9.jpg', 17, '2024-10-25 09:38:18', '2024-10-25 09:38:18'),
(250, 'public/uploads/images/product/1729874297-50.jpg', 17, '2024-10-25 09:38:18', '2024-10-25 09:38:18'),
(251, 'public/uploads/images/product/1729874783-67.jpg', 18, '2024-10-25 09:46:23', '2024-10-25 09:46:23'),
(252, 'public/uploads/images/product/1729874783-31.jpg', 18, '2024-10-25 09:46:23', '2024-10-25 09:46:23'),
(253, 'public/uploads/images/product/1729874783-4.jpg', 18, '2024-10-25 09:46:23', '2024-10-25 09:46:23'),
(254, 'public/uploads/images/product/1729874783-33.jpg', 18, '2024-10-25 09:46:23', '2024-10-25 09:46:23'),
(255, 'public/uploads/images/product/1729874797-88.jpg', 8, '2024-10-25 09:46:37', '2024-10-25 09:46:37'),
(256, 'public/uploads/images/product/1729874797-83.jpg', 8, '2024-10-25 09:46:37', '2024-10-25 09:46:37'),
(257, 'public/uploads/images/product/1729874797-49.jpg', 8, '2024-10-25 09:46:37', '2024-10-25 09:46:37'),
(258, 'public/uploads/images/product/1729874797-0.jpg', 8, '2024-10-25 09:46:37', '2024-10-25 09:46:37'),
(259, 'public/uploads/images/product/1729874815-58.png', 9, '2024-10-25 09:46:55', '2024-10-25 09:46:55'),
(260, 'public/uploads/images/product/1729874815-10.jpg', 9, '2024-10-25 09:46:55', '2024-10-25 09:46:55'),
(261, 'public/uploads/images/product/1729874815-43.jpg', 9, '2024-10-25 09:46:55', '2024-10-25 09:46:55'),
(262, 'public/uploads/images/product/1729874815-23.jpg', 9, '2024-10-25 09:46:55', '2024-10-25 09:46:55'),
(269, 'public/uploads/images/product/1731491547-10.jpg', 24, '2024-11-13 02:52:27', '2024-11-13 02:52:27'),
(270, 'public/uploads/images/product/1731491547-55.jpg', 24, '2024-11-13 02:52:27', '2024-11-13 02:52:27'),
(271, 'public/uploads/images/product/1731491668-42.jpg', 25, '2024-11-13 02:54:28', '2024-11-13 02:54:28'),
(272, 'public/uploads/images/product/1731491668-37.jpg', 25, '2024-11-13 02:54:28', '2024-11-13 02:54:28'),
(273, 'public/uploads/images/product/1731491668-60.jpg', 25, '2024-11-13 02:54:28', '2024-11-13 02:54:28'),
(274, 'public/uploads/images/product/1731491668-2.jpg', 25, '2024-11-13 02:54:28', '2024-11-13 02:54:28'),
(275, 'public/uploads/images/product/1731491678-95.jpg', 26, '2024-11-13 02:54:38', '2024-11-13 02:54:38'),
(276, 'public/uploads/images/product/1731491678-30.jpg', 26, '2024-11-13 02:54:38', '2024-11-13 02:54:38'),
(277, 'public/uploads/images/product/1731491678-12.jpg', 26, '2024-11-13 02:54:38', '2024-11-13 02:54:38'),
(278, 'public/uploads/images/product/1731491678-86.jpg', 26, '2024-11-13 02:54:38', '2024-11-13 02:54:38'),
(279, 'public/uploads/images/product/1731491709-73.jpg', 24, '2024-11-13 02:55:09', '2024-11-13 02:55:09'),
(280, 'public/uploads/images/product/1732818377-20.jpg', 16, '2024-11-28 11:26:17', '2024-11-28 11:26:17'),
(281, 'public/uploads/images/product/1732818377-67.jpg', 16, '2024-11-28 11:26:17', '2024-11-28 11:26:17'),
(282, 'public/uploads/images/product/1732818377-15.webp', 16, '2024-11-28 11:26:17', '2024-11-28 11:26:17'),
(283, 'public/uploads/images/product/1732818377-81.jpg', 16, '2024-11-28 11:26:17', '2024-11-28 11:26:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review_product`
--

CREATE TABLE `tbl_review_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `review` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review_product`
--

INSERT INTO `tbl_review_product` (`id`, `product_id`, `user_id`, `rating`, `review`, `is_approved`, `is_featured`, `created_at`, `updated_at`, `transaction_id`) VALUES
(11, 8, 6, 3, 'I am extremely happy with this product! It exceeded all my expectations. The quality is top-notch, and it works exactly as advertised. The design is sleek and modern, and I love how easy it is to use. I highly recommend it to anyone looking for a reliable and high-performing product.', 1, 0, '2024-11-17 04:42:08', '2024-11-17 20:09:45', 55),
(13, 8, 6, 5, 'I am beyond impressed with this product! From the moment I unboxed it, I could tell it was made with care and attention to detail. The functionality is superb, and the performance is flawless. It has truly enhanced my experience, and I couldn\'t be happier with my choice. Definitely worth every penny!', 1, 1, '2024-11-17 04:52:43', '2024-11-17 04:55:29', 54),
(14, 21, 6, 5, 'This product has completely changed the way I work. It’s easy to use, and the quality is exceptional. The design is sleek, and it performs flawlessly. I\'ve noticed a significant improvement in efficiency since using it. It’s durable, lightweight, and perfect for daily use. I highly recommend it to anyone in need of a reliable and well-crafted product', 1, 1, '2024-11-17 05:03:12', '2024-11-17 18:44:07', 63),
(15, 9, 6, 5, 'I couldn’t be happier with this product! It’s exactly what I needed and works perfectly. The performance is outstanding, and it’s incredibly user-friendly. The design is modern and stylish, and it feels solid and durable. I’ve been using it every day, and it’s never let me down. If you\'re looking for something reliable and efficient, this is it', 1, 0, '2024-11-17 05:03:28', '2024-11-17 18:56:47', 58),
(16, 8, 4, 5, 'The Yamaha P-125 is an exceptional digital piano for both beginners and experienced players. Its compact design makes it perfect for small spaces, and the weighted keys provide a natural feel that mimics an acoustic piano.', 1, 0, '2024-11-17 18:54:28', '2024-11-17 18:54:28', 65),
(17, 21, 4, 5, 'The built-in speakers deliver rich, clear sound, and the range of voices and rhythms enhances creativity. However, it lacks Bluetooth connectivity, which could be a downside for tech-savvy users. Overall, it’s a great investment for quality and reliability.', 1, 1, '2024-11-17 18:54:38', '2024-11-17 18:56:52', 65),
(18, 22, 4, 5, 'The Fender Stratocaster is a classic choice for any guitarist looking for versatile tones and iconic style. Its comfortable neck and smooth fretboard make it easy to play for long sessions. The pickups offer a wide range of sounds, from crisp and clean to warm and bluesy. While the price may be steep for beginners, its durability and performance make it worth every penny for serious players.', 1, 1, '2024-11-17 18:54:47', '2024-11-17 18:56:49', 65),
(19, 23, 4, 5, 'The Pearl Roadshow is a fantastic entry-level drum set that includes everything a beginner needs to start drumming. The drums are well-crafted, and the sound quality is impressive for its price range.', 1, 0, '2024-11-17 18:55:02', '2024-11-17 18:55:02', 65),
(20, 8, 6, 5, 'Quá đắt, nâuu', 1, 0, '2024-11-19 13:41:48', '2024-11-19 13:41:48', 66),
(21, 8, 6, 2, 'I couldn’t be happier with this product! It’s exactly what I needed and works perfectly. The performance is outstanding, and it’s incredibly user-friendly. The design is modern and stylish, and it feels solid and durable.', 1, 0, '2024-11-22 11:49:28', '2024-11-22 11:49:28', 68),
(23, 9, 97, 4, 'ha', 1, 0, '2024-11-27 15:37:39', '2024-11-27 15:37:39', 70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider_home`
--

CREATE TABLE `tbl_slider_home` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider_home`
--

INSERT INTO `tbl_slider_home` (`id`, `product_id`, `created_at`, `updated_at`, `slider_image`) VALUES
(8, 17, '2024-11-13 04:14:12', '2024-11-13 04:14:12', 'public/uploads/sliders/71krSlUXrmL_1731496452.png'),
(9, 24, '2024-11-13 04:14:21', '2024-11-13 04:14:21', 'public/uploads/sliders/1490APU-USQUARE_600x600_1731496461.png'),
(10, 16, '2024-11-13 04:14:32', '2024-11-13 04:14:32', 'public/uploads/sliders/violin-yamaha-v3ska_1731496472.png'),
(11, 22, '2024-11-13 04:14:39', '2024-11-13 04:14:39', 'public/uploads/sliders/BMT-Front_1731496479.png'),
(12, 8, '2024-11-13 04:14:51', '2024-11-13 04:14:51', 'public/uploads/sliders/u1yamaha-3-768x768-1-1_1731496491.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_name` varchar(255) NOT NULL,
  `transaction_email` varchar(255) NOT NULL,
  `transaction_phone` varchar(10) NOT NULL,
  `pickup_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_payment` enum('pay_online','pay_offline') NOT NULL,
  `transaction_message` text NOT NULL,
  `transaction_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`transaction_id`, `user_id`, `transaction_name`, `transaction_email`, `transaction_phone`, `pickup_address_id`, `delivery_address_id`, `transaction_amount`, `transaction_payment`, `transaction_message`, `transaction_status`, `created_at`, `updated_at`) VALUES
(53, 4, 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0223432223', 80, 63, 607500, 'pay_offline', 'NOT MESSAGE', 4, '2024-11-10 18:55:57', '2024-11-15 05:00:13'),
(54, 6, 'Nguyễn Minh Quân', 'nguyenminhquan@gmail.com', '0233223333', 80, 64, 152000, 'pay_offline', 'NOT MESSAGE', 6, '2024-10-10 19:07:51', '2024-11-15 05:00:41'),
(55, 6, 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575', 80, 65, 450995, 'pay_offline', 'NOT MESSAGE', 4, '2024-01-10 19:15:36', '2024-11-15 05:34:59'),
(56, 6, 'Nguyễn Thị Tố Trinh', 'nguyenthitotrinh@gmail.com', '0293232322', 80, 66, 83500, 'pay_online', 'NOT MESSAGE', 6, '2024-02-14 06:11:35', '2024-11-27 14:50:53'),
(57, 6, 'Diệp Mạnh Tuấn', 'diepmanhtuan@gmail.com', '0848720575', 80, 67, 99500, 'pay_online', 'NOT MESSAGE', 3, '2024-03-14 18:17:48', '2024-11-14 20:09:01'),
(58, 6, 'Phan Thanh Tuấn', 'hoangductrinh2k5@gmail.com', '0848720575', 80, 68, 68500, 'pay_online', 'NOT MESSAGE', 5, '2024-11-14 18:32:31', '2024-11-14 20:08:20'),
(62, 7, 'Diệp Thanh Tuấn', 'trinhhd.23ns@vku.udn.vn', '0848720575', 80, 73, 88998, 'pay_online', 'NOT MESSAGE', 5, '2024-07-14 19:59:47', '2024-11-14 20:09:22'),
(63, 6, 'Nguyễn Diên Tiến', 'nguyendientien01062005@gmail.com', '0848720575', 80, 74, 33000, 'pay_online', 'NOT MESSAGE', 5, '2024-08-14 22:04:21', '2024-11-14 22:05:59'),
(64, 7, 'Tuấn Hưng', 'trinhhd.23ns@vku.udn.vn', '0848720575', 80, 75, 226232, 'pay_offline', 'NOT MESSAGE', 5, '2024-09-16 01:50:14', '2024-11-16 01:51:49'),
(65, 4, 'Xuân Hưng', 'hoangductrinh2k5@gmail.com', '0324394223', 80, 76, 144711, 'pay_offline', 'NOT MESSAGE', 6, '2024-11-17 18:51:52', '2024-11-17 18:51:52'),
(66, 6, 'Nguyễn Thị Tố Trinh', 'totrinh@gmail.com', '0848720575', 80, 77, 641000, 'pay_offline', 'NOT MESSAGE', 5, '2024-10-19 13:39:16', '2024-11-19 13:41:10'),
(67, 6, 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575', 80, 78, 359000, 'pay_offline', 'NOT MESSAGE', 2, '2024-11-22 11:19:01', '2024-11-27 07:33:00'),
(68, 6, 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575', 80, 79, 89000, 'pay_online', 'NOT MESSAGE', 5, '2024-11-22 11:22:55', '2024-11-22 11:28:59'),
(69, 6, 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0233223777', 80, 81, 1851500, 'pay_online', 'NOT MESSAGE', 6, '2024-11-27 15:19:12', '2024-11-27 15:19:17'),
(70, 97, 'Hoàng Đức Trình', 'totrinh@gmail.com', '0848720575', 80, 82, 88000, 'pay_offline', 'NOT MESSAGE', 5, '2024-11-27 15:33:35', '2024-11-27 15:36:51'),
(71, 6, 'Hoàng Đức Trình nè', 'hoangductrinh2k5@gmail.com', '0848720575', 80, 83, 740899, 'pay_online', 'NOT MESSAGE', 6, '2024-11-28 11:30:17', '2024-11-28 11:30:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Zone', 'zone@gmail.com', NULL, '$2y$10$hac71NTlSMyZVwO.yt8v9ePlfhhFZzr8/7W6iK4qsSMLETVvMNNQq', NULL, 'ZzMGZd62HlIU8XnZVUjfq7o7haJax2PZ5ku4MSFOKUADRgtleRwQOFsQgw6k', '2024-11-04 12:47:54', '2024-11-04 12:47:54'),
(4, 'Xuân Hưng', 'nxhung20it@gmail.com', NULL, '$2y$10$GLZyjMs8c4gupcCQRERxhO4qEnp5lbGbHDwxjTZgJLBT04FYLypeS', NULL, NULL, '2024-11-05 02:40:30', '2024-11-05 02:40:30'),
(5, 'check', 'check@gmail.com', NULL, '$2y$10$ZDtk84ay45cX5HWqgGlFfOkRD5ZOpIi05JTLjtq/9X.k6zI41Voaq', NULL, NULL, '2024-11-07 07:44:42', '2024-11-07 07:44:42'),
(6, 'Hoàng Đức Trình', 'hoangductrinh2k5@gmail.com', NULL, '$2y$10$RkM.l07fi0ymYBB/zB2JA.18rzaDQgetJ4B9RTCg3nCAhbCpiyO1O', NULL, NULL, '2024-11-10 19:05:55', '2024-11-10 19:05:55'),
(7, 'Đức Trình', 'trinhhd.23ns@vku.udn.vn', NULL, '$2y$10$1j6gQtkYVdm4ZgwBu3WQL.8huUUS/ZILECjikk7r48JfOnDjm8jZy', NULL, NULL, '2024-10-14 19:58:41', '2024-11-14 19:58:41'),
(8, 'User 1', 'user1@example.com', NULL, 'user1@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(9, 'User 2', 'user2@example.com', NULL, 'user2@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(10, 'User 3', 'user3@example.com', NULL, 'user3@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(11, 'User 4', 'user4@example.com', NULL, 'user4@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(12, 'User 5', 'user5@example.com', NULL, 'user5@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(13, 'User 6', 'user6@example.com', NULL, 'user6@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(14, 'User 7', 'user7@example.com', NULL, 'user7@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(15, 'User 8', 'user8@example.com', NULL, 'user8@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(16, 'User 9', 'user9@example.com', NULL, 'user9@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(17, 'User 10', 'user10@example.com', NULL, 'user10@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(18, 'User 11', 'user11@example.com', NULL, 'user11@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(19, 'User 12', 'user12@example.com', NULL, 'user12@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(20, 'User 13', 'user13@example.com', NULL, 'user13@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(21, 'User 14', 'user14@example.com', NULL, 'user14@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(22, 'User 15', 'user15@example.com', NULL, 'user15@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(23, 'User 16', 'user16@example.com', NULL, 'user16@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(24, 'User 17', 'user17@example.com', NULL, 'user17@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(25, 'User 18', 'user18@example.com', NULL, 'user18@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(26, 'User 19', 'user19@example.com', NULL, 'user19@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(27, 'User 20', 'user20@example.com', NULL, 'user20@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(28, 'User 21', 'user21@example.com', NULL, 'user21@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(29, 'User 22', 'user22@example.com', NULL, 'user22@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(30, 'User 23', 'user23@example.com', NULL, 'user23@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(31, 'User 24', 'user24@example.com', NULL, 'user24@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(32, 'User 25', 'user25@example.com', NULL, 'user25@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(33, 'User 26', 'user26@example.com', NULL, 'user26@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(34, 'User 27', 'user27@example.com', NULL, 'user27@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(35, 'User 28', 'user28@example.com', NULL, 'user28@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(36, 'User 29', 'user29@example.com', NULL, 'user29@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(37, 'User 30', 'user30@example.com', NULL, 'user30@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(38, 'User 31', 'user31@example.com', NULL, 'user31@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(39, 'User 32', 'user32@example.com', NULL, 'user32@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(40, 'User 33', 'user33@example.com', NULL, 'user33@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(41, 'User 34', 'user34@example.com', NULL, 'user34@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(42, 'User 35', 'user35@example.com', NULL, 'user35@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(43, 'User 36', 'user36@example.com', NULL, 'user36@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(44, 'User 37', 'user37@example.com', NULL, 'user37@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(45, 'User 38', 'user38@example.com', NULL, 'user38@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(46, 'User 39', 'user39@example.com', NULL, 'user39@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(47, 'User 40', 'user40@example.com', NULL, 'user40@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(48, 'User 41', 'user41@example.com', NULL, 'user41@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(49, 'User 42', 'user42@example.com', NULL, 'user42@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(50, 'User 43', 'user43@example.com', NULL, 'user43@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(51, 'User 44', 'user44@example.com', NULL, 'user44@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(52, 'User 45', 'user45@example.com', NULL, 'user45@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(53, 'User 46', 'user46@example.com', NULL, 'user46@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(54, 'User 47', 'user47@example.com', NULL, 'user47@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(55, 'User 48', 'user48@example.com', NULL, 'user48@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(56, 'User 49', 'user49@example.com', NULL, 'user49@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(57, 'User 50', 'user50@example.com', NULL, 'user50@example.com', NULL, NULL, '2024-11-22 15:22:19', '2024-11-22 15:22:19'),
(58, 'User 51', 'user51@example.com', NULL, 'user51@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(59, 'User 52', 'user52@example.com', NULL, 'user52@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(60, 'User 53', 'user53@example.com', NULL, 'user53@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(61, 'User 54', 'user54@example.com', NULL, 'user54@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(62, 'User 55', 'user55@example.com', NULL, 'user55@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(63, 'User 56', 'user56@example.com', NULL, 'user56@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(64, 'User 57', 'user57@example.com', NULL, 'user57@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(65, 'User 58', 'user58@example.com', NULL, 'user58@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(66, 'User 59', 'user59@example.com', NULL, 'user59@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(67, 'User 60', 'user60@example.com', NULL, 'user60@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(68, 'User 61', 'user61@example.com', NULL, 'user61@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(69, 'User 62', 'user62@example.com', NULL, 'user62@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(70, 'User 63', 'user63@example.com', NULL, 'user63@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(71, 'User 64', 'user64@example.com', NULL, 'user64@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(72, 'User 65', 'user65@example.com', NULL, 'user65@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(73, 'User 66', 'user66@example.com', NULL, 'user66@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(74, 'User 67', 'user67@example.com', NULL, 'user67@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(75, 'User 68', 'user68@example.com', NULL, 'user68@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(76, 'User 69', 'user69@example.com', NULL, 'user69@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(77, 'User 70', 'user70@example.com', NULL, 'user70@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(78, 'User 71', 'user71@example.com', NULL, 'user71@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(79, 'User 72', 'user72@example.com', NULL, 'user72@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(80, 'User 73', 'user73@example.com', NULL, 'user73@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(81, 'User 74', 'user74@example.com', NULL, 'user74@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(82, 'User 75', 'user75@example.com', NULL, 'user75@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(83, 'User 76', 'user76@example.com', NULL, 'user76@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(84, 'User 77', 'user77@example.com', NULL, 'user77@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(85, 'User 78', 'user78@example.com', NULL, 'user78@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(86, 'User 79', 'user79@example.com', NULL, 'user79@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(87, 'User 80', 'user80@example.com', NULL, 'user80@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(88, 'User 81', 'user81@example.com', NULL, 'user81@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(89, 'User 82', 'user82@example.com', NULL, 'user82@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(90, 'User 83', 'user83@example.com', NULL, 'user83@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(91, 'User 84', 'user84@example.com', NULL, 'user84@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(92, 'User 85', 'user85@example.com', NULL, 'user85@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(93, 'User 86', 'user86@example.com', NULL, 'user86@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(94, 'User 87', 'user87@example.com', NULL, 'user87@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(95, 'User 88', 'user88@example.com', NULL, 'user88@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(96, 'User 89', 'user89@example.com', NULL, 'user89@example.com', NULL, NULL, '2024-09-30 17:00:00', '2024-09-30 17:00:00'),
(97, 'Trinh', 'trinh@gmail.com', NULL, '$2y$10$N8KdqNBneKJ9qwSM2pU4OO49uqH5/FvojrS5SS5RPflO9bUY6aikO', NULL, NULL, '2024-11-27 15:24:53', '2024-11-27 15:24:53'),
(100, 'Trình Hoàng Đức', 'trunghoangduc123hd@gmail.com', NULL, 'eyJpdiI6IlVucjNVVEsreU8vaVg3ZUFnRlpYNFE9PSIsInZhbHVlIjoiSUtpZ0RPYTQydE1TYUhCd0E1ZXd1YUhndE9aQ2xOT0UvanpyamxLZFowaz0iLCJtYWMiOiJlNWMxOWFhM2JhODk4NjY1ZWI2NTlmZWIxYjlmNzk2MGQ0MGJhZDcyYjFkNjcwYTRiM2YyYjQ4MWVlMzQ0MGNlIiwidGFnIjoiIn0=', '112130660230264718613', NULL, '2024-11-28 11:10:25', '2024-11-28 11:10:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `tbl_address_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_attributes`
--
ALTER TABLE `tbl_attributes`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `tbl_attributes_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_comments_post_id_foreign` (`post_id`),
  ADD KEY `tbl_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_interactions`
--
ALTER TABLE `tbl_interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_interactions_user_id_foreign` (`user_id`),
  ADD KEY `tbl_interactions_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_orders_transaction_id_foreign` (`transaction_id`),
  ADD KEY `tbl_orders_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_posters`
--
ALTER TABLE `tbl_posters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_brand_id_foreign` (`brand_id`),
  ADD KEY `tbl_product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product_attributes`
--
ALTER TABLE `tbl_product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_attributes_product_id_foreign` (`product_id`),
  ADD KEY `tbl_product_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Chỉ mục cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `tbl_product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_review_product`
--
ALTER TABLE `tbl_review_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_review_product_product_id_foreign` (`product_id`),
  ADD KEY `tbl_review_product_user_id_foreign` (`user_id`),
  ADD KEY `tbl_review_product_transaction_id_foreign` (`transaction_id`);

--
-- Chỉ mục cho bảng `tbl_slider_home`
--
ALTER TABLE `tbl_slider_home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_slider_home_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `tbl_transactions_user_id_foreign` (`user_id`),
  ADD KEY `tbl_transactions_pickup_address_id_foreign` (`pickup_address_id`),
  ADD KEY `tbl_transactions_delivery_address_id_foreign` (`delivery_address_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_attributes`
--
ALTER TABLE `tbl_attributes`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_interactions`
--
ALTER TABLE `tbl_interactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `tbl_posters`
--
ALTER TABLE `tbl_posters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_product_attributes`
--
ALTER TABLE `tbl_product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT cho bảng `tbl_review_product`
--
ALTER TABLE `tbl_review_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_slider_home`
--
ALTER TABLE `tbl_slider_home`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `transaction_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD CONSTRAINT `tbl_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_attributes`
--
ALTER TABLE `tbl_attributes`
  ADD CONSTRAINT `tbl_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `tbl_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_interactions`
--
ALTER TABLE `tbl_interactions`
  ADD CONSTRAINT `tbl_interactions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `tbl_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_interactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `tbl_transactions` (`transaction_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand_product` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product_attributes`
--
ALTER TABLE `tbl_product_attributes`
  ADD CONSTRAINT `tbl_product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `tbl_attributes` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD CONSTRAINT `tbl_product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_review_product`
--
ALTER TABLE `tbl_review_product`
  ADD CONSTRAINT `tbl_review_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_review_product_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `tbl_transactions` (`transaction_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_review_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_slider_home`
--
ALTER TABLE `tbl_slider_home`
  ADD CONSTRAINT `tbl_slider_home_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD CONSTRAINT `tbl_transactions_delivery_address_id_foreign` FOREIGN KEY (`delivery_address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_transactions_pickup_address_id_foreign` FOREIGN KEY (`pickup_address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
