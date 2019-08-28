-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 01:45 PM
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
-- Database: `updateautosheba`
--

-- --------------------------------------------------------

--
-- Table structure for table `b2b_customers`
--

CREATE TABLE `b2b_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `b2bCustomer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_tag_line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bCustomer_is_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2bCustomer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_image` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `banner_image`, `active_image`, `created_at`, `updated_at`) VALUES
(1, 'banner1222', 'banner1222', 'uploads/banners/15612836899208_1560582457.png', 0, '2019-06-23 02:00:35', '2019-06-23 03:56:28'),
(2, 'banner2', 'fhghjkj', 'uploads/banners/156127684999.jpg', 1, '2019-06-23 02:00:49', '2019-06-23 02:00:49'),
(3, 'banner3', 'banner3', 'uploads/banners/15612768612241_1560050474.jpg', 0, '2019-06-23 02:01:02', '2019-06-23 04:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_details` mediumtext COLLATE utf8mb4_unicode_ci,
  `brand_images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `vendor_id`, `brand_name`, `brand_details`, `brand_images`, `created_at`, `updated_at`) VALUES
(1, 0, 'Brand One', NULL, '[\"94943_1560661655.jpg\",\"108255_1560661655.jpg\",\"30223_1560661655.jpg\"]', '2019-06-15 23:07:01', '2019-06-15 23:07:35'),
(2, 0, 'Brand Two', NULL, '[\"86524_1560662196.jpg\",\"27052_1560662196.jpg\",\"26924_1560662196.jpg\"]', '2019-06-15 23:16:36', '2019-06-15 23:16:36'),
(4, 1, 'vendorBrand', 'Text Here', '[\"110836_1561441911.jpg\",\"35058_1561441911.jpg\",\"17930_1561441911.jpg\"]', '2019-06-24 23:51:51', '2019-06-24 23:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` int(11) DEFAULT NULL,
  `category_details` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `vendor_id`, `category_name`, `category_type`, `category_details`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mobile', 2, NULL, '2019-06-15 23:01:11', '2019-06-15 23:03:27'),
(2, 0, 'Fabrics', 1, NULL, '2019-06-15 23:01:24', '2019-06-15 23:02:51'),
(3, 0, 'Desktop', 3, NULL, '2019-06-15 23:14:18', '2019-06-15 23:14:18'),
(4, 0, 'Laptop', 4, NULL, '2019-06-15 23:14:36', '2019-06-15 23:14:36'),
(5, 0, 'Electronics', 5, NULL, '2019-06-16 00:20:45', '2019-06-16 00:20:45'),
(6, 1, 'vendorcat', 10, NULL, '2019-06-24 23:05:07', '2019-06-24 23:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_types`
--

INSERT INTO `category_types` (`id`, `vendor_id`, `category_type`, `created_at`, `updated_at`) VALUES
(1, 0, 'catType1', '2019-06-15 22:54:19', '2019-06-15 22:54:19'),
(2, 0, 'cattype2', '2019-06-15 23:00:58', '2019-06-15 23:00:58'),
(3, 0, 'Desktop Type', '2019-06-15 23:14:05', '2019-06-15 23:14:05'),
(4, 0, 'Laptop Type', '2019-06-15 23:14:33', '2019-06-15 23:14:33'),
(5, 0, 'electricType', '2019-06-16 00:20:41', '2019-06-16 00:20:41'),
(6, 0, 'DFR', '2019-06-24 06:02:25', '2019-06-24 06:02:25'),
(7, 0, 'FGT', '2019-06-24 06:03:44', '2019-06-24 06:03:44'),
(8, 0, 'GHT', '2019-06-24 06:04:58', '2019-06-24 06:04:58'),
(9, 0, 'JKR', '2019-06-24 22:45:28', '2019-06-24 22:45:28'),
(10, 1, 'vendorCatType', '2019-06-24 23:01:29', '2019-06-24 23:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_customer` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `name`, `email`, `phone`, `password`, `address`, `is_customer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'nizam', 'nizam@gmail.com', '01714142005', '$2y$10$vdaPSj8Ri0RX8e5NFjUDn.V16REaLTStwXwJw48Ld.g6Vy/h8meVy', 'jessore', 1, NULL, '2019-06-19 23:25:53', '2019-06-20 04:00:17'),
(3, NULL, NULL, 'arafat', 'arafat@gmail.com', '01714142001', '$2y$10$qyOZDj/6uXMrlY7JUKiZxeBHFwhofs9jDrMfOEaEhRv6HreMTXXrK', 'dhaka', 1, NULL, '2019-06-19 23:56:55', '2019-06-20 00:02:11'),
(4, NULL, NULL, 'Masud Rana', 'masud@gmail.com', '01712639365', '$2y$10$v1fqF4MObZh6LxnXGSp4b.ZRJfn.hI7M0bDx4i3zOvFt2fNt3/L46', 'Dhaka', 1, NULL, '2019-06-22 00:13:23', '2019-06-22 00:13:23'),
(9, 'akibul', 'islam', 'akibi', 'akibi@gmail.com', '01714142001', '$2y$10$w6H5brX5AQbm5rylbq2HaOQvAWaoXhd8VyUTlrOpo4iFAMx7zT35K', 'jessore', 1, NULL, '2019-06-22 01:41:57', '2019-06-22 01:41:57'),
(12, 'monirul', 'islam', 'monir', 'monir@gmail.com', '01714142001', '$2y$10$SpRkpfmyEFtN4Oa81ro64u.kX.y86T/./JRY2kfhG5Z8TyDK2SZr6', 'jessore', 1, NULL, '2019-06-22 03:38:06', '2019-06-22 03:38:06'),
(13, 'majedur', 'rahman', 'majed', 'majed@gmail.com', '01714142005', '$2y$10$mbRxA6dHKxdbER/Cs18ZOu5aK3/TpYdnCtHlr.V.cMaoFpHCPDsje', 'jessore', 1, NULL, '2019-06-22 04:00:38', '2019-06-22 04:00:38'),
(15, 'akib', 'uddin', 'akib', 'akib@gmail.com', '017411212222', '$2y$10$pYnMzagyCvUB2zy1ANPC9OMnYrk.lekT126aWKMGEy66k8WrL.gS6', 'dhaka', 1, NULL, '2019-06-22 04:37:36', '2019-06-22 04:37:36'),
(16, 'galib', 'rahman', 'galib', 'galib@gmail.com', '01912122007', '$2y$10$447lfjjkaIg3rtcm3yRCtelZsQYxJcApEeyVvOOfoOeGYFh3MpeA.', 'jessore', 1, NULL, '2019-06-22 04:43:31', '2019-06-22 04:43:31'),
(17, 'rakib', 'rahman', 'rakib', 'rakib@gmail.com', '01714142008', '$2y$10$P5A.KX3mVlX5flxW4LjSq.P.bb8U1UYdnJney7wMbJNsXMxuLBfNK', 'khulna', 1, NULL, '2019-06-22 06:48:14', '2019-06-22 06:48:14'),
(18, 'talib', 'rahman', 'talib', 'talib@gmail.com', '01714142001', '$2y$10$.Jhd9DH4x9hC2cz9vr28E.7NaPBNrlCCCDewfMyjQvK3bBpFJa5Ue', 'dhaka', 1, NULL, '2019-06-22 22:36:06', '2019-06-22 22:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `custom_footers`
--

CREATE TABLE `custom_footers` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_footers`
--

INSERT INTO `custom_footers` (`id`, `description`, `youtube_link`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `googleplus_link`, `created_at`, `updated_at`) VALUES
(1, 'PGRpdiBjbGFzcz0icm93Ij4NCjxhc2lkZSBjbGFzcz0iY29sLXNtLTMgY29sLW1kLTMgd2hpdGUiPg0KPGg1IGNsYXNzPSJ0aXRsZSI+Q3VzdG9tZXIgU2VydmljZXM8L2g1Pg0KDQo8dWwgY2xhc3M9Imxpc3QtdW5zdHlsZWQiPg0KCTxsaT48YSBocmVmPSIjIj5IZWxwIGNlbnRlcjwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5Nb25leSByZWZ1bmQ8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iIyI+VGVybXMgYW5kIFBvbGljeTwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5PcGVuIGRpc3B1dGU8L2E+PC9saT4NCjwvdWw+DQo8L2FzaWRlPg0KDQo8YXNpZGUgY2xhc3M9ImNvbC1zbS0zICBjb2wtbWQtMyB3aGl0ZSI+DQo8aDUgY2xhc3M9InRpdGxlIj5NeSBBY2NvdW50PC9oNT4NCg0KPHVsIGNsYXNzPSJsaXN0LXVuc3R5bGVkIj4NCgk8bGk+PGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hdXRvc2hlYmEvcHVibGljL2xvZ2luL2N1c3RvbWVycyI+VXNlciBMb2dpbiA8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hdXRvc2hlYmEvcHVibGljL2xvZ2luL3ZlbmRvci1zaXRlIj5WZW5kb3IgTG9naW48L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0ie3sgdXJsKCcvY3VzdG9tZXIvY3VzdG9tZXJQcm9maWxlJykgfX0iPk15IEFjY291bnQgPC9hPjwvbGk+DQo8L3VsPg0KPC9hc2lkZT4NCg0KPGFzaWRlIGNsYXNzPSJjb2wtc20tMyAgY29sLW1kLTMgd2hpdGUiPg0KPGg1IGNsYXNzPSJ0aXRsZSI+QWJvdXQ8L2g1Pg0KDQo8dWwgY2xhc3M9Imxpc3QtdW5zdHlsZWQiPg0KCTxsaT48YSBocmVmPSIjIj5PdXIgaGlzdG9yeTwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5Ib3cgdG8gYnV5PC9hPjwvbGk+DQoJPGxpPjxhIGhyZWY9IiMiPkRlbGl2ZXJ5IGFuZCBwYXltZW50IDwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5BZHZlcnRpY2UgPC9hPjwvbGk+DQoJPGxpPjxhIGhyZWY9IiMiPlBhcnRuZXJzaGlwIDwvYT48L2xpPg0KPC91bD4NCjwvYXNpZGU+DQoNCjxhc2lkZSBjbGFzcz0iY29sLXNtLTMiPg0KPGFydGljbGUgY2xhc3M9IndoaXRlIj4NCjxoNSBjbGFzcz0idGl0bGUiPkNvbnRhY3RzPC9oNT4NCg0KPHA+PHN0cm9uZz5QaG9uZTogPC9zdHJvbmc+ICsxMjM0NTY3ODk8YnIgLz4NCjxzdHJvbmc+RmF4Ojwvc3Ryb25nPiArMTIzNDU2Nzg5PGJyIC8+DQo8c3Ryb25nPkVtYWlsOjwvc3Ryb25nPiBpbmZvMTJAZ21haWwuY29tPC9wPg0KPC9hcnRpY2xlPg0KPC9hc2lkZT4NCjwvZGl2Pg0KPCEtLSByb3cuLy8gLS0+', 'https://www.youtube.com/', 'https://www.facebook.com/asdf', 'https://www.twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', NULL, '2019-06-23 23:14:34', '2019-06-24 22:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL DEFAULT '0',
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'BARGUNA', NULL, NULL),
(2, 1, 'BARISAL', NULL, NULL),
(3, 1, 'BHOLA', NULL, NULL),
(4, 1, 'JHALOKATI', NULL, NULL),
(5, 1, 'PATUAKHALI', NULL, NULL),
(6, 1, 'PIROJPUR ', NULL, NULL),
(7, 2, 'BANDARBAN', NULL, NULL),
(8, 2, 'BRAHMANBARIA', NULL, NULL),
(9, 2, 'CHANDPUR', NULL, NULL),
(10, 2, 'CHITTAGONG', NULL, NULL),
(11, 2, 'COMILLA', NULL, NULL),
(12, 2, 'COX\'S BAZAR', NULL, NULL),
(13, 2, 'FENI', NULL, NULL),
(14, 2, 'KHAGRACHHARI', NULL, NULL),
(15, 2, 'LAKSHMIPUR', NULL, NULL),
(16, 2, 'NOAKHALI', NULL, NULL),
(17, 2, 'RANGAMATI ', NULL, NULL),
(18, 3, 'DHAKA', NULL, NULL),
(19, 3, 'FARIDPUR', NULL, NULL),
(20, 3, 'GAZIPUR', NULL, NULL),
(21, 3, 'GOPALGANJ', NULL, NULL),
(22, 3, 'JAMALPUR', NULL, NULL),
(23, 3, 'KISHOREGONJ', NULL, NULL),
(24, 3, 'MADARIPUR', NULL, NULL),
(25, 3, 'MANIKGANJ', NULL, NULL),
(26, 3, 'MUNSHIGANJ', NULL, NULL),
(27, 3, 'MYMENSINGH', NULL, NULL),
(28, 3, 'NARAYANGANJ', NULL, NULL),
(29, 3, 'NARSINGDI', NULL, NULL),
(30, 3, 'NETRAKONA', NULL, NULL),
(31, 3, 'RAJBARI', NULL, NULL),
(32, 3, 'SHARIATPUR', NULL, NULL),
(33, 3, 'SHERPUR', NULL, NULL),
(34, 3, 'TANGAIL', NULL, NULL),
(35, 4, 'BAGERHAT', NULL, NULL),
(36, 4, 'CHUADANGA', NULL, NULL),
(37, 4, 'JESSORE', NULL, NULL),
(38, 4, 'JHENAIDAH', NULL, NULL),
(39, 4, 'KHULNA', NULL, NULL),
(40, 4, 'KUSHTIA', NULL, NULL),
(41, 4, 'MAGURA', NULL, NULL),
(42, 4, 'MEHERPUR', NULL, NULL),
(43, 4, 'NARAIL', NULL, NULL),
(44, 4, 'SATKHIRA', NULL, NULL),
(45, 5, 'BOGRA', NULL, NULL),
(46, 5, 'CHAPAINABABGANJ', NULL, NULL),
(47, 5, 'JOYPURHAT', NULL, NULL),
(48, 5, 'PABNA', NULL, NULL),
(49, 5, 'NAOGAON', NULL, NULL),
(50, 5, 'NATORE', NULL, NULL),
(51, 5, 'RAJSHAHI', NULL, NULL),
(52, 5, 'SIRAJGANJ', NULL, NULL),
(53, 6, 'DINAJPUR', NULL, NULL),
(54, 6, 'GAIBANDHA', NULL, NULL),
(55, 6, 'KURIGRAM', NULL, NULL),
(56, 6, 'LALMONIRHAT', NULL, NULL),
(57, 6, 'NILPHAMARI', NULL, NULL),
(58, 6, 'PANCHAGARH', NULL, NULL),
(59, 6, 'RANGPUR', NULL, NULL),
(60, 6, 'THAKURGAON', NULL, NULL),
(61, 7, 'HABIGANJ', NULL, NULL),
(62, 7, 'MAULVIBAZAR', NULL, NULL),
(63, 7, 'SUNAMGANJ', NULL, NULL),
(64, 7, 'SYLHET', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'BARISAL', NULL, NULL),
(2, 'CHITTAGONG', NULL, NULL),
(3, 'DHAKA', NULL, NULL),
(4, 'KHULNA', NULL, NULL),
(5, 'RAJSHAHI', NULL, NULL),
(6, 'RANGPUR', NULL, NULL),
(7, 'SYLETE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_type` int(11) DEFAULT NULL,
  `item_subcategory` int(11) DEFAULT NULL,
  `item_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reorder_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `warrenty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warrenty_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warrenty_end_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `warrenty_details` mediumtext COLLATE utf8mb4_unicode_ci,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_of` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `vendor_id`, `item_name`, `item_category`, `item_type`, `item_subcategory`, `item_supplier`, `cost_price`, `sale_price`, `tax_rate`, `reorder_quantity`, `item_description`, `warrenty`, `warrenty_type`, `warrenty_end_date`, `warrenty_details`, `color`, `part_of`, `model_no`, `item_images`, `created_at`, `updated_at`) VALUES
(1, 0, 'item1', 3, 3, 3, '2', '100', '122', '2', '22', 'swd', 'yes', 'monthly', '2019-06-17 18:00:00', 'dfgdgfh', '#006096', 'saddf,part1,part2,part3', '01714142005', '[\"93947_1560665867.jpg\",\"34467_1560665867.jpg\",\"24758_1560665867.jpg\"]', '2019-06-16 00:17:47', '2019-06-16 00:17:47'),
(2, 0, 'item2', 1, 2, 3, '1', '125', '100', '2', '2', 'sadad', 'no', NULL, NULL, NULL, '#d12b2b', 'A1,A2,A3', '01525253006', '[\"59586_1560665933.jpg\",\"36955_1560665933.jpg\",\"8976_1560665933.png\"]', '2019-06-16 00:18:53', '2019-06-16 00:18:53'),
(3, 0, 'ITEM3', 5, NULL, 2, '2', '123', '122', '2', '2', 'SD', 'no', NULL, NULL, NULL, '#e03939', 'D1,D2,D3', '01714142005', '[\"70416_1560666212.png\",\"1061_1560666212.jpg\",\"33826_1560666212.jpg\"]', '2019-06-16 00:23:05', '2019-06-16 00:23:32'),
(4, 0, 'item4', 1, NULL, NULL, '1', '322', '456', '2', '2', 'fggrth fghguy', 'yes', 'monthly', '2019-06-25 18:00:00', 'gyj', '#783535', 'hghj ,y87ti7,uyiuio,', '01714142006', '[\"70795_1560835522.jpg\",\"97368_1560835522.jpg\",\"73420_1560835522.jpg\",\"71652_1560835522.jpg\"]', '2019-06-17 23:25:22', '2019-06-18 00:02:50'),
(5, 0, 'deskitem', 3, 3, 5, '2', '321', '456', '2', '2', 'gfbhgj hui', 'no', NULL, NULL, NULL, '#804747', 'ghkugk,yuyium,ydthty', '01814142006', '[\"96857_1560835847.jpg\",\"2426_1560835847.jpg\",\"91695_1560835847.jpg\"]', '2019-06-17 23:30:47', '2019-06-17 23:30:47'),
(6, 1, 'VendorItem', 6, NULL, NULL, '1', '254', '256', '2', '2', 'Description here', 'yes', 'monthly', '2019-06-25 18:00:00', 'condition here', '#389ba8', 'part asd,partQWRT,part:kjy', '01712122009', '[\"62802_1561445282.jpg\",\"79640_1561445282.jpg\",\"30150_1561445282.jpg\"]', '2019-06-25 00:48:02', '2019-06-25 00:55:17'),
(8, 1, 'vendorItem2', 6, 10, 10, '1', '123', '222', '2', '2', NULL, 'no', NULL, NULL, NULL, '#de3d3d', 'part1:asd,part2:wert,part3:terrf', '01712122008', '[\"47824_1561452921.jpg\",\"103555_1561452921.jpg\",\"16692_1561452921.jpg\"]', '2019-06-25 02:55:21', '2019-06-25 02:55:21'),
(9, 1, 'vendorItem3', 6, 10, 10, '1', '222', '321', '2', '3', 'sgdghfd', 'no', NULL, NULL, NULL, '#b33d3d', 'part1:sff,part:tttr,part:tyop', '01923236001', '[\"93165_1561453028.jpg\",\"69739_1561453028.jpg\",\"62400_1561453028.jpg\"]', '2019-06-25 02:57:08', '2019-06-25 02:57:08'),
(10, 5, 'fatikItem', 6, NULL, NULL, '5', '125', '214', '2', '2', 'sdfff', 'no', NULL, NULL, NULL, '#c44444', 'part:fgfgfg.part:nmmn', '01912122009', '[\"99128_1561460129.jpg\",\"92123_1561460129.jpg\"]', '2019-06-25 04:54:34', '2019-06-25 04:55:29');

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
(3, '2019_04_09_084224_create_customers_table', 1),
(4, '2019_04_11_120249_create_categories_table', 1),
(5, '2019_04_23_053014_create_products_table', 1),
(6, '2019_04_25_042432_create_companies_table', 1),
(7, '2019_04_25_090354_create_orders_table', 1),
(8, '2019_05_15_090824_create_sub_categories_table', 1),
(9, '2019_05_19_080005_create_category_types_table', 1),
(10, '2019_05_21_151930_create_brands_table', 1),
(11, '2019_05_22_155250_create_items_table', 1),
(12, '2019_05_29_145422_create_vendors_table', 1),
(13, '2019_05_31_043040_create_b2b_customers_table', 1),
(14, '2019_06_15_084631_create_teachers_table', 1),
(15, '2019_06_16_113242_create_order_details_table', 2),
(16, '2019_06_16_113311_create_shippings_table', 2),
(17, '2019_06_16_113337_create_payments_table', 2),
(18, '2019_06_19_085803_create_divisions_table', 3),
(19, '2019_06_19_085823_create_districts_table', 3),
(20, '2019_06_23_045852_create_banners_table', 4),
(21, '2019_06_23_105849_create_custom_footers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_id` int(11) NOT NULL DEFAULT '0',
  `order_total` float(10,2) NOT NULL DEFAULT '0.00',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(11) DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `product_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `payment_type`, `payment_id`, `vendor_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 'w0IV4', 1, 1, 1368.00, 0, 'Bkash', 1, 0, NULL, '2019-06-20 00:11:30', '2019-06-20 00:11:30'),
(4, 'LOtpk', 1, 3, 2280.00, 0, 'Bkash', 4, 0, NULL, '2019-06-20 04:49:02', '2019-06-20 04:49:02'),
(5, 'K3Kod', 1, 2, 456.00, 0, 'Cash', 5, 0, NULL, '2019-06-20 04:59:09', '2019-06-20 04:59:09'),
(6, 'wdi24', 1, 4, 488.00, 0, 'Cash', 6, 0, NULL, '2019-06-20 05:16:59', '2019-06-20 05:16:59'),
(7, 'b01fJ', 9, 6, 912.00, 0, 'Cash', 7, 0, NULL, '2019-06-22 02:46:37', '2019-06-22 02:46:37'),
(9, 'MkX9Y', 12, 7, 1156.00, 0, 'Bank', 9, 0, NULL, '2019-06-22 03:42:03', '2019-06-22 03:42:03'),
(10, 'vN76q', 12, 7, 122.00, 0, 'Cash', 10, 0, NULL, '2019-06-22 03:42:49', '2019-06-22 03:42:49'),
(11, 'BQNpw', 13, 9, 222.00, 0, 'Cash', 11, 0, NULL, '2019-06-22 04:05:29', '2019-06-22 04:05:29'),
(13, '4cAHO', 13, 9, 244.00, 0, 'Bank', 13, 0, NULL, '2019-06-22 04:15:27', '2019-06-22 04:15:27'),
(14, 'pRESo', 13, 9, 122.00, 0, 'Cash', 14, 0, NULL, '2019-06-22 04:16:30', '2019-06-22 04:16:30'),
(15, 'JOqQa', 15, 10, 100.00, 0, 'Cash', 15, 0, NULL, '2019-06-22 04:41:58', '2019-06-22 04:41:58'),
(16, '8JrOC', 15, 10, 578.00, 0, 'Cash', 16, 0, NULL, '2019-06-22 04:42:42', '2019-06-22 04:42:42'),
(17, 'XINmP', 16, 11, 456.00, 0, 'Bkash', 17, 0, NULL, '2019-06-22 04:44:52', '2019-06-22 04:44:52'),
(18, 'RWdWA', 13, 9, 456.00, 0, 'Cash', 18, 0, NULL, '2019-06-22 06:46:08', '2019-06-22 06:46:08'),
(19, 'OXbFi', 17, 12, 556.00, 0, 'Bank', 19, 0, NULL, '2019-06-22 06:49:32', '2019-06-22 06:49:32'),
(20, '1nFrc', 17, 12, 456.00, 0, 'Cash', 20, 0, NULL, '2019-06-22 06:50:21', '2019-06-22 06:50:21'),
(21, 'V9wNL', 17, 12, 1112.00, 0, 'Cash', 21, 0, NULL, '2019-06-22 22:32:49', '2019-06-22 22:32:49'),
(22, '4zCs4', 18, 912, 1156.00, 0, 'Bkash', 22, 0, NULL, '2019-06-22 22:37:41', '2019-06-22 22:37:41'),
(23, 'hOmJW', 17, 12, 256.00, 0, 'Cash', 23, 0, NULL, '2019-06-25 01:16:55', '2019-06-25 01:16:55'),
(24, 'o8WSS', 17, 12, 256.00, 0, 'Cash', 24, 0, NULL, '2019-06-25 01:22:37', '2019-06-25 01:22:37'),
(25, 'qeO4X', 17, 12, 256.00, 0, 'Cash', 25, 0, NULL, '2019-06-25 01:23:22', '2019-06-25 01:23:22'),
(26, 'Fjegl', 17, 12, 1024.00, 0, 'Cash', 26, 0, NULL, '2019-06-25 02:33:16', '2019-06-25 02:33:16'),
(27, '7OwdV', 17, 12, 768.00, 0, 'Cash', 27, 0, NULL, '2019-06-25 02:34:21', '2019-06-25 02:34:21'),
(28, 'dvs6y', 17, 12, 1024.00, 0, 'Bkash', 28, 0, NULL, '2019-06-25 02:34:58', '2019-06-25 02:34:58'),
(29, 'ZsbRI', 13, 9, 642.00, 0, 'Bkash', 29, 0, NULL, '2019-06-25 03:30:55', '2019-06-25 03:30:55'),
(30, 'nstJP', 13, 9, 642.00, 0, 'Bkash', 30, 0, NULL, '2019-06-25 03:31:22', '2019-06-25 03:31:22'),
(31, '2c8oY', 1, 913, 1070.00, 0, 'Cash', 31, 0, NULL, '2019-06-25 04:57:32', '2019-06-25 04:57:32'),
(32, 'MPkHs', 1, 913, 214.00, 0, 'Bank', 32, 0, NULL, '2019-06-25 04:58:10', '2019-06-25 04:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `vendor_item_id` int(11) NOT NULL DEFAULT '0',
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_price` float(10,2) NOT NULL DEFAULT '0.00',
  `total_price` float(10,2) NOT NULL DEFAULT '0.00',
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_id` int(11) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `vendor_item_id`, `item_name`, `item_quantity`, `item_price`, `total_price`, `customer_id`, `shipping_id`, `payment_id`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 0, 'item4', 2, 456.00, 912.00, 1, 1, 1, '2019-06-25 15:28:41', '2019-06-20 00:11:30', '2019-06-20 00:11:30'),
(2, 1, 5, 0, 'deskitem', 1, 456.00, 456.00, 1, 1, 1, '2019-06-25 15:28:41', '2019-06-20 00:11:31', '2019-06-20 00:11:31'),
(3, 2, 3, 0, 'ITEM3', 1, 122.00, 122.00, 1, 2, 2, '2019-06-25 15:28:41', '2019-06-20 00:59:29', '2019-06-20 00:59:29'),
(4, 2, 1, 0, 'item1', 2, 122.00, 244.00, 1, 2, 2, '2019-06-25 15:28:41', '2019-06-20 00:59:29', '2019-06-20 00:59:29'),
(5, 2, 4, 0, 'item4', 1, 456.00, 456.00, 1, 2, 2, '2019-06-25 15:28:41', '2019-06-20 00:59:29', '2019-06-20 00:59:29'),
(9, 4, 5, 0, 'deskitem', 5, 456.00, 2280.00, 1, 3, 4, '2019-06-25 15:28:41', '2019-06-20 04:49:02', '2019-06-20 04:49:02'),
(10, 5, 4, 0, 'item4', 1, 456.00, 456.00, 1, 2, 5, '2019-06-25 15:28:41', '2019-06-20 04:59:09', '2019-06-20 04:59:09'),
(11, 6, 3, 0, 'ITEM3', 2, 122.00, 244.00, 1, 4, 6, '2019-06-25 15:28:41', '2019-06-20 05:16:59', '2019-06-20 05:16:59'),
(12, 6, 1, 0, 'item1', 2, 122.00, 244.00, 1, 4, 6, '2019-06-25 15:28:41', '2019-06-20 05:16:59', '2019-06-20 05:16:59'),
(13, 7, 5, 0, 'deskitem', 2, 456.00, 912.00, 9, 6, 7, '2019-06-25 15:28:41', '2019-06-22 02:46:37', '2019-06-22 02:46:37'),
(16, 9, 3, 0, 'ITEM3', 2, 122.00, 244.00, 12, 7, 9, '2019-06-25 15:28:41', '2019-06-22 03:42:03', '2019-06-22 03:42:03'),
(17, 9, 4, 0, 'item4', 2, 456.00, 912.00, 12, 7, 9, '2019-06-25 15:28:41', '2019-06-22 03:42:03', '2019-06-22 03:42:03'),
(18, 10, 3, 0, 'ITEM3', 1, 122.00, 122.00, 12, 7, 10, '2019-06-25 15:28:41', '2019-06-22 03:42:49', '2019-06-22 03:42:49'),
(19, 11, 3, 0, 'ITEM3', 1, 122.00, 122.00, 13, 9, 11, '2019-06-25 15:28:41', '2019-06-22 04:05:29', '2019-06-22 04:05:29'),
(20, 11, 2, 0, 'item2', 1, 100.00, 100.00, 13, 9, 11, '2019-06-25 15:28:41', '2019-06-22 04:05:29', '2019-06-22 04:05:29'),
(23, 13, 3, 0, 'ITEM3', 1, 122.00, 122.00, 13, 9, 13, '2019-06-25 15:28:41', '2019-06-22 04:15:27', '2019-06-22 04:15:27'),
(24, 13, 1, 0, 'item1', 1, 122.00, 122.00, 13, 9, 13, '2019-06-25 15:28:41', '2019-06-22 04:15:27', '2019-06-22 04:15:27'),
(25, 14, 3, 0, 'ITEM3', 1, 122.00, 122.00, 13, 9, 14, '2019-06-25 15:28:41', '2019-06-22 04:16:30', '2019-06-22 04:16:30'),
(26, 15, 2, 0, 'item2', 1, 100.00, 100.00, 15, 10, 15, '2019-06-25 15:28:41', '2019-06-22 04:41:58', '2019-06-22 04:41:58'),
(27, 16, 4, 0, 'item4', 1, 456.00, 456.00, 15, 10, 16, '2019-06-25 15:28:41', '2019-06-22 04:42:42', '2019-06-22 04:42:42'),
(28, 16, 1, 0, 'item1', 1, 122.00, 122.00, 15, 10, 16, '2019-06-25 15:28:41', '2019-06-22 04:42:42', '2019-06-22 04:42:42'),
(29, 17, 5, 0, 'deskitem', 1, 456.00, 456.00, 16, 11, 17, '2019-06-25 15:28:41', '2019-06-22 04:44:52', '2019-06-22 04:44:52'),
(30, 18, 5, 0, 'deskitem', 1, 456.00, 456.00, 13, 9, 18, '2019-06-25 15:28:41', '2019-06-22 06:46:08', '2019-06-22 06:46:08'),
(31, 19, 5, 0, 'deskitem', 1, 456.00, 456.00, 17, 12, 19, '2019-06-25 15:28:41', '2019-06-22 06:49:32', '2019-06-22 06:49:32'),
(32, 19, 2, 0, 'item2', 1, 100.00, 100.00, 17, 12, 19, '2019-06-25 15:28:41', '2019-06-22 06:49:32', '2019-06-22 06:49:32'),
(33, 20, 5, 0, 'deskitem', 1, 456.00, 456.00, 17, 12, 20, '2019-06-25 15:28:41', '2019-06-22 06:50:21', '2019-06-22 06:50:21'),
(34, 21, 4, 0, 'item4', 2, 456.00, 912.00, 17, 12, 21, '2019-06-25 15:28:41', '2019-06-22 22:32:49', '2019-06-22 22:32:49'),
(35, 21, 2, 0, 'item2', 2, 100.00, 200.00, 17, 12, 21, '2019-06-25 15:28:41', '2019-06-22 22:32:49', '2019-06-22 22:32:49'),
(36, 22, 5, 0, 'deskitem', 2, 456.00, 912.00, 18, 912, 22, '2019-06-25 15:28:41', '2019-06-22 22:37:41', '2019-06-22 22:37:41'),
(37, 22, 1, 0, 'item1', 2, 122.00, 244.00, 18, 912, 22, '2019-06-25 15:28:41', '2019-06-22 22:37:41', '2019-06-22 22:37:41'),
(42, 27, 6, 1, 'VendorItem', 3, 256.00, 768.00, 17, 12, 27, '2019-05-25 15:28:41:PM', '2019-05-25 02:34:21', '2019-06-25 02:34:21'),
(43, 28, 6, 1, 'VendorItem', 4, 256.00, 1024.00, 17, 12, 28, '2019-06-22 15:28:41:PM', '2019-06-25 02:34:58', '2019-06-25 02:34:58'),
(44, 30, 9, 1, 'vendorItem3', 2, 321.00, 642.00, 13, 9, 30, '2019-06-25 09:31:22:AM', '2019-06-25 03:31:22', '2019-06-25 03:31:22'),
(45, 31, 10, 5, 'fatikItem', 5, 214.00, 1070.00, 1, 913, 31, '2019-06-25 10:57:32:AM', '2019-06-25 04:57:32', '2019-06-25 04:57:32'),
(46, 32, 10, 5, 'fatikItem', 1, 214.00, 214.00, 1, 913, 32, '2019-06-25 10:58:10:AM', '2019-06-25 04:58:10', '2019-06-25 04:58:10');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_type`, `bank_name`, `bank_number`, `card_number`, `cvc_number`, `bkash_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bkash', NULL, NULL, NULL, NULL, '01512122008', NULL, '2019-06-20 00:11:30', '2019-06-20 00:11:30'),
(2, 'Bank', 'DBBL', '12314565855668', NULL, NULL, NULL, NULL, '2019-06-20 00:59:29', '2019-06-20 00:59:29'),
(3, 'Bank', 'Uttara Bank', '11236547885', NULL, NULL, NULL, NULL, '2019-06-20 04:46:22', '2019-06-20 04:46:22'),
(4, 'Bkash', NULL, NULL, NULL, NULL, '01913132003', NULL, '2019-06-20 04:49:02', '2019-06-20 04:49:02'),
(5, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-20 04:59:09', '2019-06-20 04:59:09'),
(6, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-20 05:16:59', '2019-06-20 05:16:59'),
(7, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 02:46:37', '2019-06-22 02:46:37'),
(8, 'Bkash', NULL, NULL, NULL, NULL, '01814142001', NULL, '2019-06-22 03:03:22', '2019-06-22 03:03:22'),
(9, 'Bank', 'DBBL', '12314565855667', NULL, NULL, NULL, NULL, '2019-06-22 03:42:03', '2019-06-22 03:42:03'),
(10, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 03:42:49', '2019-06-22 03:42:49'),
(11, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 04:05:29', '2019-06-22 04:05:29'),
(12, 'Bkash', NULL, NULL, NULL, NULL, '01714121223', NULL, '2019-06-22 04:06:21', '2019-06-22 04:06:21'),
(13, 'Bank', 'Uttara Bank', '123145658556677', NULL, NULL, NULL, NULL, '2019-06-22 04:15:27', '2019-06-22 04:15:27'),
(14, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 04:16:30', '2019-06-22 04:16:30'),
(15, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 04:41:58', '2019-06-22 04:41:58'),
(16, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 04:42:42', '2019-06-22 04:42:42'),
(17, 'Bkash', NULL, NULL, NULL, NULL, '01814142007', NULL, '2019-06-22 04:44:52', '2019-06-22 04:44:52'),
(18, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 06:46:08', '2019-06-22 06:46:08'),
(19, 'Bank', 'DBBL', '123145658556679525', NULL, NULL, NULL, NULL, '2019-06-22 06:49:32', '2019-06-22 06:49:32'),
(20, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 06:50:21', '2019-06-22 06:50:21'),
(21, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-22 22:32:49', '2019-06-22 22:32:49'),
(22, 'Bkash', NULL, NULL, NULL, NULL, '01912122007', NULL, '2019-06-22 22:37:41', '2019-06-22 22:37:41'),
(23, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 01:16:55', '2019-06-25 01:16:55'),
(24, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 01:22:37', '2019-06-25 01:22:37'),
(25, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 01:23:22', '2019-06-25 01:23:22'),
(26, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 02:33:16', '2019-06-25 02:33:16'),
(27, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 02:34:21', '2019-06-25 02:34:21'),
(28, 'Bkash', NULL, NULL, NULL, NULL, '01814142001', NULL, '2019-06-25 02:34:58', '2019-06-25 02:34:58'),
(29, 'Bkash', NULL, NULL, NULL, NULL, '01714121223', NULL, '2019-06-25 03:30:55', '2019-06-25 03:30:55'),
(30, 'Bkash', NULL, NULL, NULL, NULL, '01714121223', NULL, '2019-06-25 03:31:22', '2019-06-25 03:31:22'),
(31, 'Cash', NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-25 04:57:32', '2019-06-25 04:57:32'),
(32, 'Bank', 'DBBL', '123145658556677', NULL, NULL, NULL, NULL, '2019-06-25 04:58:10', '2019-06-25 04:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subcategory` int(11) NOT NULL DEFAULT '0',
  `product_price` int(11) NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci,
  `product_images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_category`, `product_subcategory`, `product_price`, `product_details`, `product_images`, `created_at`, `updated_at`) VALUES
(1, '7439604', 'product1', 'Desktop', 3, 1200, 'dfsgth', '[\"84021_1560663203.jpg\",\"26997_1560663203.jpg\",\"64633_1560663203.jpg\"]', '2019-06-15 23:33:23', '2019-06-15 23:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT '0',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `division_id` int(11) NOT NULL DEFAULT '0',
  `district_id` int(11) NOT NULL DEFAULT '0',
  `shipping_method` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `customer_id`, `first_name`, `last_name`, `name`, `email`, `phone`, `password`, `division_name`, `district_name`, `address`, `division_id`, `district_id`, `shipping_method`, `is_shipping`, `created_at`, `updated_at`) VALUES
(2, 0, 'ataur', 'rahman', NULL, 'ataur@gmail.com', '01712122001', '$2y$10$KB.wq16Y4C40IPIjAKyQB.GwbCyBqmBnse93NY2A0mzhmelfJvYny', NULL, NULL, 'barisal', 1, 3, 'office_collection', 1, '2019-06-20 00:59:09', '2019-06-20 00:59:09'),
(3, 0, 'faridur', 'rahman', NULL, 'farid@gmail.com', '01814142001', '$2y$10$IBOqaVz7sx8oZ3KtGpNtwubT.4rzSbySysVU1riFNWl/bV16YXyiS', NULL, NULL, 'dhaka', 3, 31, 'home_delivery', 1, '2019-06-20 04:48:48', '2019-06-20 04:48:48'),
(5, 0, 'tarikul', 'islam', NULL, 'tarik@gmail.com', '01714142001', '$2y$10$EHzAztA7YYttP5rmuLsT2uEVoRx35XjjWLcWVcxpko5LrxFbBOWsC', NULL, NULL, 'chittagong', 2, 11, 'home_delivery', 1, '2019-06-22 01:19:18', '2019-06-22 01:19:18'),
(6, 0, 'ajad', 'khan', NULL, 'ajad@gmail.com', '01714142001', '$2y$10$LGQ6Kokra9g23oMZ.KOTGuCgLWOLY7zeT.dkN/WZLXSPE7n1y8gG.', NULL, NULL, 'rajshahi', 5, 45, 'home_delivery', 1, '2019-06-22 01:43:48', '2019-06-22 01:43:48'),
(7, 0, 'kobirul', 'islam', NULL, 'kobir@gmail.com', '01414142001', '$2y$10$avtl8of19RI5QxoJLnBaJOGdz.fF/1yqIWW8ulFBzQ6biKV7QImSu', NULL, NULL, 'khulna', 4, 37, 'home_delivery', 1, '2019-06-22 03:39:31', '2019-06-22 03:39:31'),
(9, 13, 'manik', 'mollik', NULL, 'manik@gmail.com', '01912122001', '$2y$10$O5DkgqY/hLJAQQu19M.sH.VWifF4BCkhdNcFKkD0.K5MSA4EGGFq6', NULL, NULL, 'khulna', 4, 41, 'home_delivery', 1, '2019-06-22 04:04:56', '2019-06-22 04:04:56'),
(10, 15, 'habib', 'rahman', NULL, 'habib@gmail.com', '01912123001', '$2y$10$OLsQJoh.vv0Zu74iCM4u1.BNKJonOjLBYN.1ySGyDmUN.1tsfCxme', NULL, NULL, 'rangpur', 6, 53, 'office_collection', 1, '2019-06-22 04:41:47', '2019-06-22 04:41:47'),
(11, 16, 'tarek12', 'rahman12', NULL, 'tarek1@gmail.com', '01912122001', '$2y$10$.75HvqvnBKHOi2wW.MLtG./.orxz09jt8bAFHAv138k7wM.Sq0y7C', NULL, NULL, 'khulna', 4, 40, 'home_delivery', 1, '2019-06-22 04:44:32', '2019-06-22 06:44:37'),
(12, 17, 'arafat', 'rahman', NULL, 'arafat@gmail.com', '01714142001', '$2y$10$bZ/wouzTXPI.eI2jYc9fMOXPGcPDx8.Ih8XxSOM2CLEfLYz9Uz1vm', NULL, NULL, 'barisal', 1, 3, 'home_delivery', 1, '2019-06-22 06:49:05', '2019-06-22 06:49:54'),
(911, 12, 'jabed', 'rahman', NULL, 'jabed@gmail.com', '01914142001', '$2y$10$VCDGsylWleebmHsw6OIjmORguKTC7VtVdRVKe3A7M36mg7rl14e5C', NULL, NULL, 'rajshahi', 5, 49, 'home_delivery', 1, '2019-06-20 05:16:38', '2019-06-20 05:16:38'),
(912, 18, 'salim', 'uddin', NULL, 'salim@gmail.com', '01712122008', '$2y$10$1fFzn5BFz3M/tyHMc1UdMeuIi4PoxkkRejzceRHzyNGqw1D558nkW', NULL, NULL, 'dhaka', 3, 32, 'home_delivery', 1, '2019-06-22 22:37:20', '2019-06-22 22:37:20'),
(913, 1, 'hasan', 'mahmud', NULL, 'hasan@gmail.com', '01914142007', '$2y$10$Syt/dg10ULiNvxrI/RwxNekUihDN../MDO41y9a9Hyog0JSYK/KLy', NULL, NULL, 'dhaka', 3, 18, 'office_collection', 1, '2019-06-25 04:57:25', '2019-06-25 04:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_details` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `vendor_id`, `category_id`, `subcategory_name`, `subcategory_details`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'Female T-shit', NULL, '2019-06-15 23:03:43', '2019-06-15 23:03:43'),
(2, 0, 2, 'Male T-shirt', NULL, '2019-06-15 23:03:52', '2019-06-15 23:03:52'),
(3, 0, 3, 'Dell', NULL, '2019-06-15 23:14:53', '2019-06-15 23:14:53'),
(4, 0, 3, 'Samsung', NULL, '2019-06-15 23:15:05', '2019-06-15 23:15:05'),
(5, 0, 3, 'LG', NULL, '2019-06-15 23:15:19', '2019-06-15 23:15:19'),
(6, 0, 4, 'Asus', NULL, '2019-06-15 23:15:28', '2019-06-15 23:15:28'),
(7, 0, 4, 'HP', NULL, '2019-06-15 23:15:34', '2019-06-15 23:15:34'),
(8, 0, 4, 'Lenevu', NULL, '2019-06-15 23:15:42', '2019-06-15 23:15:42'),
(10, 1, 6, 'vendorSubcat', NULL, '2019-06-24 23:15:20', '2019-06-24 23:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_customer` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$4O8EHTcMEiCZYqlIrxskQODMLIdWhRXQ8190B21vWIfozgA14NFSK', 'an1UTErfWqu3k0D4KPn1uNlm0kUWDvDk6v8jHp4wtaDhWTyUj7JFnqtaI5hm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_tag_line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_authorized_person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_contact_reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_is_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_is_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_is_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_is_approved_vendor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_password`, `vendor_tag_line`, `vendor_address`, `vendor_website`, `vendor_authorized_person_name`, `vendor_contact_reference`, `vendor_phone`, `vendor_mobile`, `vendor_fax`, `vendor_email`, `vendor_title`, `vendor_is_company`, `vendor_is_customer`, `vendor_is_supplier`, `vendor_is_approved_vendor`, `vendor_status`, `vendor_logo`, `created_at`, `updated_at`) VALUES
(1, 'nizam', 'GYXsy', 'as2', 'dsfg2', 'eetg2', 'dgth', '0112', '01714142005', '01714142005', NULL, 'nizam@gmail.com', 'dsgdd', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '91110_1561457172.jpg', '2019-06-15 23:39:19', '2019-06-25 04:06:32'),
(2, 'rabi', NULL, 'rabi', 'dhaka', 'robiweb.com', 'nizam', '01812123006', '01812123006', '01812123006', NULL, 'robi@gmail.com', NULL, 'Yes', 'No', 'Yes', 'No', 'Yes', '66260_1560665593.jpg', '2019-06-16 00:13:13', '2019-06-16 00:13:13'),
(3, 'Arif', NULL, 'asd', 'dhaka', 'wwwarif.com', 'abid hasan', '01914142008', '01914142008', '01914142008', NULL, 'arif@gmail.com', 'vendor-title', 'Yes', 'Yes', 'Yes', 'No', 'No', '62141_1560837634.jpg', '2019-06-18 00:00:04', '2019-06-18 00:00:34'),
(4, 'devid', 'MCXGY', 'adavid', 'dhaka', 'www.adevid.com', 'nizamul islam', '01712122009', '0124569', '01712122009', NULL, 'devid@gmail.com', NULL, 'Yes', 'No', 'Yes', 'No', 'No', '72484_1561360587.jpg', '2019-06-24 01:16:27', '2019-06-24 01:16:27'),
(5, 'fatik', 'G1mwu', 'asdf', 'jessore', 'www.fatik.com', 'farid', '01412122001', '123654', '01812122007', NULL, 'fatik@gmail.com', NULL, 'No', 'Yes', 'Yes', 'No', 'No', '69535_1561360827.jpg', '2019-06-24 01:20:27', '2019-06-24 01:20:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b2b_customers`
--
ALTER TABLE `b2b_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `custom_footers`
--
ALTER TABLE `custom_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shippings_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b2b_customers`
--
ALTER TABLE `b2b_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `custom_footers`
--
ALTER TABLE `custom_footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=914;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
