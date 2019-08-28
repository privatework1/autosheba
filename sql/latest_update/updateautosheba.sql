-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 02:22 PM
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

--
-- Dumping data for table `b2b_customers`
--

INSERT INTO `b2b_customers` (`id`, `b2bCustomer_name`, `b2bCustomer_tag_line`, `b2bCustomer_code`, `b2bCustomer_address`, `b2bCustomer_website`, `b2bCustomer_contact_person`, `b2bCustomer_position`, `b2bCustomer_phone`, `b2bCustomer_mobile`, `b2bCustomer_email`, `b2bCustomer_title`, `b2bCustomer_is_company`, `b2bCustomer_status`, `b2bCustomer_logo`, `created_at`, `updated_at`) VALUES
(1, 'Tarek2', 'tarek2', 'yowce', 'dhaka2', 'www.tarek.com', 'nizam', 'entry', '01714142002', '01714142008', 'tarek@gmail.com', 'tarek', 'Yes', 'Yes', '58240_1562838986.gif', '2019-07-11 03:19:45', '2019-07-11 03:56:34'),
(2, 'rakib', 'rakib', 'BBUQK', 'dhaka', 'wwwrakib.com', 'nizam', 'senior', '01714142002', '01714142009', 'rakib@gmail.com', 'asd', 'Yes', 'Yes', '1496_1563080564.jpg', '2019-07-13 23:02:44', '2019-07-13 23:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `b2_b_purchases`
--

CREATE TABLE `b2_b_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `b2bcustomer_id` int(11) NOT NULL DEFAULT '0',
  `b2bpurchase_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2bpurchase_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_purchase` double(8,2) NOT NULL DEFAULT '0.00',
  `po_company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_company_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_company_address` text COLLATE utf8mb4_unicode_ci,
  `po_company_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b2_b_purchases`
--

INSERT INTO `b2_b_purchases` (`id`, `b2bcustomer_id`, `b2bpurchase_code`, `b2bpurchase_date`, `total_purchase`, `po_company_logo`, `po_company_name`, `po_company_email`, `po_company_mobile`, `po_company_address`, `po_company_code`, `po_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'jp4dN', '2019-08-01 4:14:09:PM', 700.00, '77944_1565092036.jpg', 'ghcompany', 'gh@gmail.com', '01912122005', 'dhaka,Bangladesh', '123985', '08/01/2019', '2019-08-01 04:14:09', '2019-08-06 05:47:16'),
(2, 1, 'omz5K', '2019-08-01 4:36:57:PM', 7700.00, '53258_1564655817.jpg', 'asd company', 'asd@gmail.com', '01913322005', 'dhaka,Bangladesh', '348988', '08/01/2019', '2019-08-01 04:36:57', '2019-08-01 04:36:57'),
(3, 1, 'FOoKs', '2019-08-01 5:57:00:PM', 768.00, '', 'agh company', 'agh@gmail.com', '01933122005', 'dhaka', '44985', '08/01/2019', '2019-08-01 05:57:00', '2019-08-01 05:57:00'),
(4, 1, 'e9j4w', '2019-08-01 6:04:03:PM', 772.00, '44003_1564661043.png', 'jk company', 'jk@gmail.com', '01345122005', 'dhaka', '32578', '08/01/2019', '2019-08-01 06:04:03', '2019-08-01 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `b2_b_purchase_details`
--

CREATE TABLE `b2_b_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `b2bpurchase_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_price` double(8,2) NOT NULL DEFAULT '0.00',
  `total_price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b2_b_purchase_details`
--

INSERT INTO `b2_b_purchase_details` (`id`, `b2bpurchase_id`, `item_id`, `item_quantity`, `item_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 2, 350.00, 700.00, NULL, NULL),
(2, 2, 12, 22, 350.00, 7700.00, NULL, NULL),
(3, 3, 6, 3, 256.00, 768.00, NULL, NULL),
(4, 4, 16, 1, 550.00, 550.00, NULL, NULL),
(5, 4, 13, 1, 222.00, 222.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `banners` (`id`, `type`, `title`, `description`, `banner_image`, `active_image`, `created_at`, `updated_at`) VALUES
(1, 'slider', 'slider1222', 'slider1222', 'uploads/banners/banner-1.png', 0, '2019-06-23 02:00:35', '2019-07-13 02:51:55'),
(2, 'slider', 'slider2', 'slider2', 'uploads/banners/banner-2.png', 1, '2019-06-23 02:00:49', '2019-07-13 02:53:57'),
(3, 'slider', 'slider3', 'slider3', 'uploads/banners/banner-3.png', 0, '2019-06-23 02:01:02', '2019-07-13 02:54:38'),
(5, 'banner', 'banner One', 'title One', 'uploads/banners/slider-b.png', 0, '2019-07-28 05:21:11', '2019-07-28 05:41:06'),
(6, 'banner', 'banner Two', 'banner Two', 'uploads/banners/slider-b.png', 0, '2019-07-28 05:23:49', '2019-07-28 05:41:29'),
(7, 'banner', 'banner Three', 'banner Three', 'uploads/banners/slider-b.png', 0, '2019-07-28 05:25:08', '2019-07-28 05:42:20'),
(8, 'banner', 'banner Four', 'banner Four', 'uploads/banners/slider-b.png', 0, '2019-07-28 05:25:08', '2019-07-28 05:42:20');

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
(6, 1, 'vendorcat', 10, NULL, '2019-06-24 23:05:07', '2019-06-24 23:05:07'),
(7, 0, 'categoryFour', 11, NULL, '2019-07-13 02:04:51', '2019-07-13 02:04:51');

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
(10, 1, 'vendorCatType', '2019-06-24 23:01:29', '2019-06-24 23:01:29'),
(11, 0, 'categoryFourType', '2019-07-13 02:04:46', '2019-07-13 02:04:46');

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
  `vendor_id` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `customers` (`id`, `vendor_id`, `first_name`, `last_name`, `name`, `email`, `phone`, `password`, `address`, `is_customer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'nizamul', 'islam', 'nizam', 'nizam@gmail.com', '01714142002', '$2y$10$pp71pjFJaKAL264HSvF6q.85cmZobZr9cvgM4aFanJib8OZAEde9m', 'dhaka', 1, NULL, '2019-07-13 02:19:48', '2019-07-13 02:19:48'),
(2, 0, 'manir', 'ujjaman', 'manir', 'manir@gmail.com', '01714142002', '$2y$10$yt/Y9USTljjb6/vl2upf3OfPcEoRK4ObfP3MeM5g3GBTsplpXy1/G', 'jessore', 1, NULL, '2019-07-13 05:03:17', '2019-07-13 05:03:17'),
(3, 0, 'rashed', 'rahman', 'rashed', 'rashed@gmail.com', '01714142008', '$2y$10$I3cCCoA3Fl/8FTAWGEayLeyFWo15Qgr1WzMxmDNkFrvS/l/JW5jE6', 'dhaka', 1, NULL, '2019-07-27 06:16:25', '2019-07-27 06:16:25'),
(4, 0, 'monirul', 'islam', 'monir', 'monir@gmail.com', '01714142008', '$2y$10$8NlRdPwlgLkIBtYD3WaFWO/SwEy4.5q2akMU4bSr/BkRX1FHfqf1q', 'dhaka', 1, NULL, '2019-07-27 22:42:23', '2019-07-27 22:42:23');

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
(1, 'PGRpdiBjbGFzcz0icm93Ij4NCjxhc2lkZSBjbGFzcz0iY29sLXNtLTMgY29sLW1kLTMgd2hpdGUiPg0KPGg1IGNsYXNzPSJ0aXRsZSI+Q3VzdG9tZXIgU2VydmljZXM8L2g1Pg0KDQo8dWwgY2xhc3M9Imxpc3QtdW5zdHlsZWQiPg0KCTxsaT48YSBocmVmPSIjIj5IZWxwIGNlbnRlcjwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5Nb25leSByZWZ1bmQ8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iIyI+VGVybXMgYW5kIFBvbGljeTwvYT48L2xpPg0KCTxsaT48YSBocmVmPSIjIj5PcGVuIGRpc3B1dGU8L2E+PC9saT4NCjwvdWw+DQo8L2FzaWRlPg0KDQo8YXNpZGUgY2xhc3M9ImNvbC1zbS0zICBjb2wtbWQtMyB3aGl0ZSI+DQo8aDUgY2xhc3M9InRpdGxlIj5NeSBBY2NvdW50PC9oNT4NCg0KPHVsIGNsYXNzPSJsaXN0LXVuc3R5bGVkIj4NCgk8bGk+PGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hdXRvc2hlYmEvcHVibGljL2xvZ2luL2N1c3RvbWVycyI+VXNlciBMb2dpbiA8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hdXRvc2hlYmEvcHVibGljL2xvZ2luL3ZlbmRvci1zaXRlIj5WZW5kb3IgTG9naW48L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hdXRvc2hlYmEvcHVibGljL2IyYi1zaXRlL2xvZ2luIj5CMkIgTG9naW48L2E+PC9saT4NCjwvdWw+DQo8L2FzaWRlPg0KDQo8YXNpZGUgY2xhc3M9ImNvbC1zbS0zICBjb2wtbWQtMyB3aGl0ZSI+DQo8aDUgY2xhc3M9InRpdGxlIj5BYm91dDwvaDU+DQoNCjx1bCBjbGFzcz0ibGlzdC11bnN0eWxlZCI+DQoJPGxpPjxhIGhyZWY9IiMiPk91ciBoaXN0b3J5PC9hPjwvbGk+DQoJPGxpPjxhIGhyZWY9IiMiPkhvdyB0byBidXk8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iIyI+RGVsaXZlcnkgYW5kIHBheW1lbnQgPC9hPjwvbGk+DQoJPGxpPjxhIGhyZWY9IiMiPkFkdmVydGljZSA8L2E+PC9saT4NCgk8bGk+PGEgaHJlZj0iIyI+UGFydG5lcnNoaXAgPC9hPjwvbGk+DQo8L3VsPg0KPC9hc2lkZT4NCg0KPGFzaWRlIGNsYXNzPSJjb2wtc20tMyI+DQo8YXJ0aWNsZSBjbGFzcz0id2hpdGUiPg0KPGg1IGNsYXNzPSJ0aXRsZSI+Q29udGFjdHM8L2g1Pg0KDQo8cD48c3Ryb25nPlBob25lOiA8L3N0cm9uZz4gKzEyMzQ1Njc4OTxiciAvPg0KPHN0cm9uZz5GYXg6PC9zdHJvbmc+ICsxMjM0NTY3ODk8YnIgLz4NCjxzdHJvbmc+RW1haWw6PC9zdHJvbmc+IGluZm8xMkBnbWFpbC5jb208L3A+DQo8L2FydGljbGU+DQo8L2FzaWRlPg0KPC9kaXY+DQo8IS0tIHJvdy4vLyAtLT4=', 'https://www.youtube.com/', 'https://www.facebook.com/asdf', 'https://www.twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', NULL, '2019-06-23 23:14:34', '2019-07-13 05:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_processes`
--

CREATE TABLE `delivery_processes` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `process_status` int(11) NOT NULL DEFAULT '0',
  `process_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_process_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_process_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_processes`
--

INSERT INTO `delivery_processes` (`id`, `order_id`, `name`, `email`, `mobile`, `address`, `process_status`, `process_date_time`, `complete_process_date_time`, `complete_process_time`, `process_day`, `created_at`, `updated_at`) VALUES
(1, 1, 'kamal', 'kamal@gmail.com', '01714122008', 'jessore', 1, '2019-06-29 3:48:46:PM', '2019-06-30T13:02', NULL, 'June-3-2019', '2019-06-29 03:48:46', '2019-06-29 03:50:02'),
(2, 3, 'kamal', 'kamal@gmail.com', '01714142005', 'dhaka', 1, '2019-07-09 12:31:20:PM', '2019-07-13T10:12', NULL, 'July-12-2019', '2019-07-09 00:31:20', '2019-07-13 04:45:15'),
(3, 3, 'ajad', 'ajad@gmail.com', '0141412005', 'dhaka', 0, '2019-07-13 4:33:43:PM', '2019-07-13T10:12', NULL, 'July-4-2019', '2019-07-13 04:33:43', '2019-07-13 04:33:43'),
(4, 2, 'asad2', 'asad2@gmail.com', '01714142001', 'dhaka', 1, '2019-07-13 4:39:37:PM', '2019-07-13T10:12', NULL, 'July-4-2019', '2019-07-13 04:39:37', '2019-07-13 04:40:12');

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
  `item_brand` int(11) NOT NULL DEFAULT '0',
  `item_type` int(11) DEFAULT NULL,
  `item_subcategory` int(11) DEFAULT NULL,
  `item_supplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `part_of` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_feature` text COLLATE utf8mb4_unicode_ci,
  `item_images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `vendor_id`, `item_name`, `item_category`, `item_brand`, `item_type`, `item_subcategory`, `item_supplier`, `cost_price`, `sale_price`, `tax_rate`, `reorder_quantity`, `item_description`, `warrenty`, `warrenty_type`, `warrenty_end_date`, `warrenty_details`, `color`, `part_of`, `model_no`, `item_size`, `item_feature`, `item_images`, `created_at`, `updated_at`) VALUES
(1, 0, 'item1', 3, 4, 3, 3, '2', '100', '122', '2', '22', 'swd', 'yes', 'monthly', '2019-06-17 18:00:00', 'dfgdgfh', '#42dcf4', 'saddf,part1,part2,part3', '01714142005', NULL, NULL, '[\"373-327.png\",\"34467_1560665867.jpg\",\"24758_1560665867.jpg\"]', '2019-06-16 00:17:47', '2019-06-16 00:17:47'),
(2, 0, 'item2', 1, 0, 2, 3, '1', '125', '100', '2', '2', 'sadad', 'no', NULL, NULL, NULL, '#d12b2b', 'A1,A2,A3', '01525253006', NULL, NULL, '[\"59586_1560665933.jpg\",\"36955_1560665933.jpg\",\"8976_1560665933.png\"]', '2019-06-16 00:18:53', '2019-06-16 00:18:53'),
(3, 0, 'ITEM3', 5, 0, NULL, 2, '2', '123', '122', '2', '2', 'SD', 'no', NULL, NULL, NULL, '#e03939', 'D1,D2,D3', '01714142005', NULL, NULL, '[\"70416_1560666212.png\",\"1061_1560666212.jpg\",\"33826_1560666212.jpg\"]', '2019-06-16 00:23:05', '2019-06-16 00:23:32'),
(4, 0, 'item4', 1, 0, NULL, NULL, '1', '322', '456', '2', '2', 'fggrth fghguy', 'yes', 'monthly', '2019-06-25 18:00:00', 'gyj', '#4292f4', 'hghj ,y87ti7,uyiuio,', '01714142006', 'medium,small', NULL, '[\"70795_1560835522.jpg\",\"97368_1560835522.jpg\",\"73420_1560835522.jpg\",\"71652_1560835522.jpg\"]', '2019-06-17 23:25:22', '2019-06-18 00:02:50'),
(5, 0, 'deskitem', 3, 0, 3, 5, '2', '321', '456', '2', '2', 'gfbhgj hui', 'no', NULL, NULL, NULL, '#804747', 'ghkugk,yuyium,ydthty', '01814142006', NULL, NULL, '[\"96857_1560835847.jpg\",\"2426_1560835847.jpg\",\"91695_1560835847.jpg\"]', '2019-06-17 23:30:47', '2019-06-17 23:30:47'),
(6, 1, 'VendorItem', 6, 0, NULL, NULL, '1', '254', '256', '2', '2', 'Description here', 'yes', 'monthly', '2019-06-25 18:00:00', 'condition here', '#389ba8', 'part asd,partQWRT,part:kjy', '01712122009', NULL, NULL, '[\"62802_1561445282.jpg\",\"79640_1561445282.jpg\",\"30150_1561445282.jpg\"]', '2019-06-25 00:48:02', '2019-06-25 00:55:17'),
(8, 1, 'vendorItem2', 6, 0, 10, 10, '1', '123', '222', '2', '2', NULL, 'no', NULL, NULL, NULL, '#de3d3d', 'part1:asd,part2:wert,part3:terrf', '01712122008', NULL, NULL, '[\"71344_1563015713.jpg\",\"29510_1563015713.jpg\",\"97556_1563015713.jpg\"]', '2019-06-25 02:55:21', '2019-06-25 02:55:21'),
(9, 1, 'vendorItem3', 6, 0, 10, 10, '1', '222', '321', '2', '3', 'sgdghfd', 'no', NULL, NULL, NULL, '#5ff442', 'part1:sff,part:tttr,part:tyop', '01923236001', NULL, NULL, '[\"93165_1561453028.jpg\",\"69739_1561453028.jpg\",\"62400_1561453028.jpg\"]', '2019-06-25 02:57:08', '2019-06-25 02:57:08'),
(10, 5, 'fatikItem', 6, 0, NULL, NULL, '5', '125', '214', '2', '2', 'sdfff', 'no', NULL, NULL, NULL, '#bc42f4', 'part:fgfgfg.part:nmmn', '01912122009', NULL, NULL, '[\"99128_1561460129.jpg\",\"92123_1561460129.jpg\"]', '2019-06-25 04:54:34', '2019-06-25 04:55:29'),
(11, 6, 'arafatItem', 6, 0, 10, 10, '6', '123', '213', '2', '2', NULL, 'no', NULL, NULL, NULL, '#7215ba', 'parta,partb,partc', '01714142005', NULL, NULL, '[\"22553_1561530565.jpg\",\"26908_1561530565.jpg\",\"25844_1561530565.jpg\"]', '2019-06-26 00:29:25', '2019-06-26 00:29:25'),
(12, 0, 'Alloy', 5, 0, 5, NULL, '6', '250', '350', '0', '5', 'An alloy is a combination of metals or a combination of one or more metals with other non-metallic elements. For example, combining the metallic elements gold and copper produces red gold, gold and silver becomes white gold, and silver combined with copper produces sterling silver. Elemental iron, combined with non-metallic carbon or silicon, produces alloys called steel or silicon steel.', 'no', NULL, NULL, NULL, '#302929', 'As a noun, the term alloy is used to describe a mixture of atoms', '02568', NULL, NULL, '[\"49482_1561550448.jpg\",\"37868_1561550448.jpg\",\"50663_1561550448.jpg\"]', '2019-06-26 06:00:48', '2019-06-26 06:00:48'),
(13, 0, 'ItemQW', 1, 0, 2, NULL, NULL, '222', '222', '2', '2', 'It\'s probably because you have used whereOwnerAndStatus which seems wrong and if there were data in $product then it would not work in your first example because get()', 'no', NULL, NULL, NULL, '#c23434', NULL, 'qPuZw', 'medium,small', 'PHA+ZmdmaCxndGZodGgseXR0dXV5eTwvcD4=', '[\"53561_1561628884.jpg\",\"95965_1561628884.jpg\",\"52014_1561628884.jpg\"]', '2019-06-27 03:48:04', '2019-06-27 03:48:04'),
(14, 0, 'ItemRTY22', 4, 0, NULL, NULL, '3', '344', '444', '4', '4', 'efrg u7i8 udjfjdf ndbjdjg ndfbfjdjg dbfjhdjgh', 'no', NULL, NULL, NULL, '#d61313', NULL, 'l3RwW', 'large,small', 'PHA+QWJvdmUgd2UgY2FuIHNlZSB0aGUgdGltZXpvbmUgaXMgVVRDICg8d2JyIC8+Q29vcmRpbmF0ZWQgVW5pdmVyc2FswqBBYm92ZSB3ZSBjYW4gc2VlIHRoZSB0aW1lem9uZSBpcyBVVEMgKDx3YnIgLz5Db29yZGluYXRlZCBVbml2ZXJzYWzCoEFib3ZlIHdlIGNhbiBzZWUgdGhlIHRpbWV6b25lIGlzIFVUQyAoPHdiciAvPkNvb3JkaW5hdGVkIFVuaXZlcnNhbMKgPC9wPg==', '[\"108434_1561628990.jpg\",\"77082_1561628990.jpg\",\"68117_1561628990.jpg\"]', '2019-06-27 03:49:50', '2019-06-27 04:18:02'),
(15, 0, 'Item456', 2, 0, 1, 1, NULL, '333', '333', '3', '3', 'ffgfgb', 'no', NULL, NULL, NULL, '#a82222', NULL, 'HDR56', 'medium', 'PHA+ZGZoanVqZ2JiZ2ZoPC9wPg==', '[\"91260_1561635269.png\",\"82650_1561635269.jpg\"]', '2019-06-27 05:34:29', '2019-06-27 05:34:29'),
(16, 0, 'itemcat4', 7, 0, 11, 11, NULL, '120', '550', '4', '4', 'AANulla eleifend venenatis aliquam. Nulla fringilla maximus velit vitae convallis. Duis enim tortor, dapibus vitae tristique vel, tristique at ligula', 'no', NULL, NULL, NULL, '#5f2fc4', NULL, '5aN8Z', 'medium,small', 'PHVsPg0KCTxsaT5naGtoamsseXV5Zyx5dHV5dWlqdSx5dWl5dWl1PC9saT4NCgk8bGk+Z3lqaGdqa2g8L2xpPg0KCTxsaT5yZXRyeXI8L2xpPg0KPC91bD4=', '[\"product-1.png\",\"product-2.png\",\"product-3.png\",\"product-4.png\",\"product-5.png\"]', '2019-07-13 02:17:47', '2019-07-13 02:17:47'),
(17, 7, 'manikitem', 7, 0, NULL, NULL, '4', '120', '320', '2', '2', 'gdg', 'no', NULL, NULL, NULL, '#de0303', 'add,sdfdg,dfsfgfdgf', '01714142005', NULL, NULL, '[\"29510_1563015713.jpg\",\"71344_1563015713.jpg\",\"97556_1563015713.jpg\"]', '2019-07-13 05:01:16', '2019-07-13 05:01:53'),
(18, 0, 'Item777', 6, 4, 10, 10, '2', '220', '320', '2', '2', 'text', 'no', NULL, NULL, NULL, '#3221ed', NULL, 'RxD0C', 'large,medium', 'PGRsPg0KCTxkdD5TdHJva2U8L2R0Pg0KCTxkZD40IFN0cm9rZTwvZGQ+DQoJPGR0Pk1heCBQb3dlcjwvZHQ+DQoJPGRkPjYya1cvNjAwMCAoci9taW4pPC9kZD4NCgk8ZHQ+Q3lsaW5kZXJzPC9kdD4NCgk8ZGQ+MiBDeWxpbmRlcjwvZGQ+DQoJPGR0Pk1heCBUb3JxdWU8L2R0Pg0KCTxkZD4xMDFOJm1pZGRvdDttLzUwMDAgKHIvbWluKTwvZGQ+DQoJPGR0PkRpc3BsYWNlbWVudCAobWwpPC9kdD4NCgk8ZGQ+MTAwMENDPC9kZD4NCgk8ZGQ+Jm5ic3A7PC9kZD4NCjwvZGw+', '[\"86519_1564308913.jpg\",\"95339_1564308913.jpg\",\"30907_1564308913.jpg\"]', '2019-07-28 04:15:13', '2019-07-28 04:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `full_names` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `physical_address` varchar(191) DEFAULT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `created_at` varchar(191) DEFAULT NULL,
  `updated_at` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_names`, `gender`, `physical_address`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Leonard Hofstadter', 'Male', 'Woodcrest', '845738767', '2019-01-14 10:43:16', NULL),
(2, 'alia Hofstadter', 'Female', 'Woodcrest2', '84357328767', '2019-02-14 10:43:16', NULL),
(3, 'Leonard3 Hofstadter', 'Male', 'Woodcrest2', '84357387627', '2019-04-14 10:43:16', NULL),
(4, 'gulia Hofstadter', 'Female', 'Woodcrest', '84537238767', '2019-01-14 10:43:16', NULL),
(5, 'anam Hofstadtear', 'Male', 'Woodcrest3', '8345738767', '2019-03-14 10:43:16', NULL),
(6, 'sadia Hofstadter', 'Female', 'Woodcrest', '8245738767', '2019-01-14 10:43:16', NULL),
(7, 'ajad Hofstadter', 'Male', 'Woodcraest', '82245738767', '2019-02-14 10:43:16', NULL),
(8, 'maria Hofstadter', 'Female', 'Woodcrest', '84453738767', '2019-04-14 10:43:16', NULL),
(9, 'abeda Hofstadter', 'Female', 'Woodcrest', '8453738767', '2019-05-14 10:43:16', NULL),
(10, 'jabeda Hofstadter', 'Female', 'Woodcrest', '845455738767', '2019-02-14 10:43:16', NULL),
(11, 'Leonardww Hofstadter', 'Male', 'Woodcrest', '84573833767', '2019-01-14 10:43:16', NULL),
(12, 'dalia Hofstadter', 'Female', 'Woodcrest2', '8433357328767', '2019-02-14 10:43:16', NULL),
(13, 'Leoddnard3 Hofstadter', 'Male', 'Woodcrest2', '84357387627', '2019-04-14 10:43:16', NULL),
(14, 'mulia Hofstadter', 'Female', 'Woodcrest', '8453723338767', '2019-01-14 10:43:16', NULL),
(15, 'anam Hofstadtear', 'Male', 'Woodcrest3', '834572238767', '2019-05-14 10:43:16', NULL),
(16, 'radia Hofstadter', 'Female', 'Woodcrest', '82457338767', '2019-01-14 10:43:16', NULL),
(17, 'daraj Hofstadter', 'Male', 'Woodcraest', '82245738767', '2019-02-14 10:43:16', NULL),
(18, 'saria Hofstadter', 'Female', 'Woodcrest', '844253738767', '2019-04-14 10:43:16', NULL),
(19, 'mahela Hofstadter', 'Female', 'Woodcrest', '8453733338767', '2019-01-14 10:43:16', NULL),
(20, 'jomila Hofstadter', 'Female', 'Woodcrest', '8454533335738767', '2019-02-14 10:43:16', NULL);

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
(21, '2019_06_23_105849_create_custom_footers_table', 5),
(23, '2019_06_27_043309_create_payment_types_table', 6),
(25, '2019_06_27_045602_create_order_deliveries_table', 7),
(26, '2019_06_27_043007_create_shipping_methods_table', 8),
(27, '2019_06_27_052522_create_shipping_infos_table', 8),
(28, '2019_06_29_063007_create_delivery_processes_table', 9),
(29, '2019_07_14_072657_create_b2_b_purchases_table', 10),
(30, '2019_07_14_072740_create_b2_b_purchase_details_table', 10),
(31, '2019_07_17_095831_create_shoppingcart_table', 11),
(32, '2019_08_01_083725_create_po_infos_table', 11),
(33, '2019_08_01_110205_create_poinvoices_table', 11),
(34, '2019_08_01_110315_create_poinvoice_details_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_id` int(11) NOT NULL DEFAULT '0',
  `order_total` float(10,2) NOT NULL DEFAULT '0.00',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `delivery_process` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `orders` (`id`, `order_code`, `order_date`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `delivery_process`, `payment_type`, `payment_id`, `vendor_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 'Aopcu', '2019-07-13 2:20:52:PM', 1, 1, 1100.00, 0, 0, 'bank', 5, 0, NULL, '2019-07-13 02:20:52', '2019-07-13 02:20:52'),
(2, '7oN3r', '2019-07-13 3:03:29:PM', 1, 1, 333.00, 1, 1, 'cash', 6, 0, NULL, '2019-07-13 03:03:29', '2019-07-13 04:40:12'),
(3, 'LOSUh', '2019-07-13 3:31:50:PM', 1, 1, 222.00, 1, 1, 'cash', 7, 0, NULL, '2019-07-13 03:31:50', '2019-07-13 04:45:15'),
(4, 'BQGRT', '2019-07-13 5:04:22:PM', 2, 2, 960.00, 0, 0, 'bkash', 8, 0, NULL, '2019-07-13 05:04:22', '2019-07-13 05:04:22'),
(5, '7zPEy', '2019-07-28 11:07:27:AM', 4, 3, 866.00, 0, 0, 'card', 10, 0, NULL, '2019-07-27 23:07:27', '2019-07-27 23:07:27'),
(6, 'lnPGp', '2019-07-28 11:09:45:AM', 1, 1, 2110.00, 0, 0, 'bank', 11, 0, NULL, '2019-07-27 23:09:45', '2019-07-27 23:09:45'),
(7, 'ip6gP', '2019-07-28 3:11:02:PM', 4, 3, 3412.00, 0, 0, 'bank', 12, 0, NULL, '2019-07-28 03:11:02', '2019-07-28 03:11:02'),
(8, 'rLTsc', '2019-08-01 12:57:19:PM', 1, 1, 794.00, 0, 0, 'bkash', 13, 0, NULL, '2019-08-01 00:57:19', '2019-08-01 00:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_deliveries`
--

CREATE TABLE `order_deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `myvendor_id` int(11) NOT NULL DEFAULT '0',
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_price` float(10,2) NOT NULL DEFAULT '0.00',
  `total_price` float(10,2) NOT NULL DEFAULT '0.00',
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_id` int(11) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL DEFAULT '0',
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_order_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `myvendor_id`, `item_name`, `item_quantity`, `item_price`, `total_price`, `customer_id`, `shipping_id`, `payment_id`, `order_date`, `single_order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 0, 'itemcat4', 2, 550.00, 1100.00, 1, 1, 5, '2019-07-13 2:20:52:PM', 0, '2019-03-13 02:20:52', '2019-07-13 02:20:52'),
(2, 2, 15, 0, 'Item456', 1, 333.00, 333.00, 1, 1, 6, '2019-07-13 3:03:29:PM', 0, '2019-07-13 03:03:30', '2019-07-13 03:03:30'),
(3, 3, 8, 1, 'vendorItem2', 1, 222.00, 222.00, 1, 1, 7, '2019-07-13 3:31:50:PM', 0, '2019-07-13 03:31:50', '2019-07-13 03:31:50'),
(4, 4, 17, 7, 'manikitem', 3, 320.00, 960.00, 2, 2, 8, '2019-07-13 5:04:22:PM', 0, '2019-07-13 05:04:22', '2019-07-13 05:04:22'),
(5, 1, 1666, 0, 'itemcat4', 2, 550.00, 1100.00, 1, 1, 5, '2019-06-13 2:20:52:PM', 0, '2019-06-13 02:20:52', '2019-07-13 02:20:52'),
(6, 1, 1666888, 0, 'itemcat4', 2, 550.00, 1100.00, 1, 1, 5, '2019-06-13 2:20:52:PM', 0, '2019-06-13 02:20:52', '2019-07-13 02:20:52'),
(7, 5, 2, 0, 'item2', 2, 100.00, 200.00, 4, 3, 10, '2019-07-28 11:07:27:AM', 0, '2019-07-27 23:07:27', '2019-07-27 23:07:27'),
(8, 5, 15, 0, 'Item456', 2, 333.00, 666.00, 4, 3, 10, '2019-07-28 11:07:27:AM', 0, '2019-07-27 23:07:27', '2019-07-27 23:07:27'),
(9, 6, 16, 0, 'itemcat4', 2, 550.00, 1100.00, 1, 1, 11, '2019-07-28 11:09:45:AM', 0, '2019-07-27 23:09:45', '2019-07-27 23:09:45'),
(10, 6, 14, 0, 'ItemRTY22', 2, 444.00, 888.00, 1, 1, 11, '2019-07-28 11:09:45:AM', 0, '2019-07-27 23:09:45', '2019-07-27 23:09:45'),
(11, 6, 3, 0, 'ITEM3', 1, 122.00, 122.00, 1, 1, 11, '2019-07-28 11:09:45:AM', 0, '2019-07-27 23:09:45', '2019-07-27 23:09:45'),
(12, 7, 16, 0, 'itemcat4', 3, 550.00, 1650.00, 4, 3, 12, '2019-07-28 3:11:02:PM', 0, '2019-07-28 03:11:02', '2019-07-28 03:11:02'),
(13, 7, 15, 0, 'Item456', 2, 333.00, 666.00, 4, 3, 12, '2019-07-28 3:11:02:PM', 0, '2019-07-28 03:11:02', '2019-07-28 03:11:02'),
(14, 7, 17, 7, 'manikitem', 2, 320.00, 640.00, 4, 3, 12, '2019-07-28 3:11:02:PM', 0, '2019-07-28 03:11:03', '2019-07-28 03:11:03'),
(15, 7, 5, 0, 'deskitem', 1, 456.00, 456.00, 4, 3, 12, '2019-07-28 3:11:02:PM', 0, '2019-07-28 03:11:03', '2019-07-28 03:11:03'),
(16, 8, 1, 0, 'item1', 2, 122.00, 244.00, 1, 1, 13, '2019-08-01 12:57:19:PM', 0, '2019-08-01 00:57:19', '2019-08-01 00:57:19'),
(17, 8, 16, 0, 'itemcat4', 1, 550.00, 550.00, 1, 1, 13, '2019-08-01 12:57:19:PM', 0, '2019-08-01 00:57:19', '2019-08-01 00:57:19');

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
  `bank_info` text COLLATE utf8mb4_unicode_ci,
  `card_info` text COLLATE utf8mb4_unicode_ci,
  `bkash_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_transaction_number` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_type`, `bank_info`, `card_info`, `bkash_number`, `bkash_transaction_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bkash', NULL, NULL, '01714142007', '0326561255556556889', NULL, '2019-06-29 03:47:44', '2019-06-29 03:47:44'),
(2, 'cash', NULL, NULL, NULL, NULL, NULL, '2019-06-29 22:35:21', '2019-06-29 22:35:21'),
(3, 'bkash', NULL, NULL, '01714142007', '032656125555789', NULL, '2019-07-09 00:28:29', '2019-07-09 00:28:29'),
(4, 'bank', '2NDBBL 0171412589545444', NULL, NULL, NULL, NULL, '2019-07-12 22:44:31', '2019-07-12 22:44:31'),
(5, 'bank', '2NDBBL 0171412589545444', NULL, NULL, NULL, NULL, '2019-07-13 02:20:52', '2019-07-13 02:20:52'),
(6, 'cash', NULL, NULL, NULL, NULL, NULL, '2019-07-13 03:03:29', '2019-07-13 03:03:29'),
(7, 'cash', NULL, NULL, NULL, NULL, NULL, '2019-07-13 03:31:50', '2019-07-13 03:31:50'),
(8, 'bkash', NULL, NULL, '01714142007', '0326561255556556889', NULL, '2019-07-13 05:04:22', '2019-07-13 05:04:22'),
(9, 'bkash', NULL, NULL, '01714142007', '0326565655556556', NULL, '2019-07-27 23:01:17', '2019-07-27 23:01:17'),
(10, 'card', NULL, '7Nvisacard', NULL, NULL, NULL, '2019-07-27 23:07:27', '2019-07-27 23:07:27'),
(11, 'bank', '2NDBBL 0171412589545444', NULL, NULL, NULL, NULL, '2019-07-27 23:09:45', '2019-07-27 23:09:45'),
(12, 'bank', '4NRUPALI 0156653564547246', NULL, NULL, NULL, NULL, '2019-07-28 03:11:02', '2019-07-28 03:11:02'),
(13, 'bkash', NULL, NULL, '01714142007', '032656125555655632445', NULL, '2019-08-01 00:57:19', '2019-08-01 00:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_type_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `payment_type_name`, `bank_name`, `bank_number`, `card_name`, `card_number`, `cvc_number`, `bkash_number`, `created_at`, `updated_at`) VALUES
(1, 'cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'bank', 'DBBL', '0171412589545444', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'bank', 'ASIA', '0125877562255', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'bank', 'RUPALI', '0156653564547246', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'bkash', '', NULL, NULL, NULL, NULL, '01714142007', NULL, NULL),
(6, 'card', NULL, NULL, 'mastercard', NULL, NULL, NULL, NULL, NULL),
(7, 'card', NULL, NULL, 'visacard', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poinvoices`
--

CREATE TABLE `poinvoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `b2b_purchase_id` int(11) NOT NULL DEFAULT '0',
  `b2bcustomer_id` int(11) NOT NULL DEFAULT '0',
  `poinvoice_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poinvoice_company_address` text COLLATE utf8mb4_unicode_ci,
  `poinvoice_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_purchase` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poinvoices`
--

INSERT INTO `poinvoices` (`id`, `b2b_purchase_id`, `b2bcustomer_id`, `poinvoice_code`, `poinvoice_company_logo`, `poinvoice_company_name`, `poinvoice_company_email`, `poinvoice_company_mobile`, `poinvoice_company_code`, `poinvoice_company_address`, `poinvoice_date`, `total_purchase`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'WzJmn', '103349_1564654449.jpg', 'gh2company', 'gh2@gmail.com', '01912122005', '123985', 'gh2dhaka,Bangladesh', '08/03/2019', 800.00, '2019-08-03 04:02:55', '2019-08-03 04:02:55'),
(2, 1, 1, 'tR44Q', '', 'ghcompany', 'gh@gmail.com', '01912122005', '123985', 'dhaka,Bangladesh', NULL, 700.00, '2019-08-06 04:58:54', '2019-08-06 04:58:54'),
(3, 1, 1, 'Yu1rU', '', 'ghcompany', 'gh@gmail.com', '01912122005', '123985', 'dhaka,Bangladesh', NULL, 700.00, '2019-08-06 04:59:59', '2019-08-06 04:59:59'),
(4, 1, 1, 'XQHvM', '', 'ghcompany', 'gh@gmail.com', '01912122005', '123985', 'dhaka,Bangladesh', NULL, 700.00, '2019-08-06 05:43:09', '2019-08-06 05:43:09'),
(5, 1, 1, 'hC6Bx', '', 'ghcompany', 'gh@gmail.com', '01912122005', '123985', 'dhaka,Bangladesh', NULL, 700.00, '2019-08-06 05:43:21', '2019-08-06 05:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `poinvoice_details`
--

CREATE TABLE `poinvoice_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `b2bpurchaseinvoice_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_price` double(8,2) NOT NULL DEFAULT '0.00',
  `total_price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poinvoice_details`
--

INSERT INTO `poinvoice_details` (`id`, `b2bpurchaseinvoice_id`, `item_id`, `item_quantity`, `item_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 2, 350.00, 700.00, NULL, NULL),
(2, 1, 2, 1, 100.00, 100.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_infos`
--

CREATE TABLE `po_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'arafat', 'mastafa', NULL, 'arafat@gmail.com', '01814142001', '$2y$10$GdgbJUEfOogct6vKqmG2WO9SoVMwZj/6JL//4samEXxuPz9rP.xL.', NULL, NULL, 'barisal', 1, 1, NULL, 1, '2019-07-13 02:20:18', '2019-07-13 02:20:18'),
(2, 2, 'kartik', 'sen', NULL, 'kartik@gmail.com', '01714142005', '$2y$10$lCvbz019eCTaS6N9AlffSOw7M8qrLaF/tawZx.bqRhRfK52TR9qZa', NULL, NULL, 'barisal', 1, 1, NULL, 1, '2019-07-13 05:03:51', '2019-07-13 05:03:51'),
(3, 4, 'arifur', 'rahman', NULL, 'arif@gmail.com', '01714142005', '$2y$10$snaCc17531hh6sENcoTL1uHqN59e1628wUT2uctfxSfj2ALMtrXlm', NULL, NULL, 'dhaka', 3, 24, NULL, 1, '2019-07-27 22:43:16', '2019-07-27 22:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE `shipping_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_id` int(11) NOT NULL DEFAULT '0',
  `shipping_method_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_infos`
--

INSERT INTO `shipping_infos` (`id`, `customer_id`, `shipping_id`, `shipping_method_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'office_collection', '2019-07-13 02:20:23', '2019-07-13 02:20:23'),
(2, 1, 1, 'home_delivery', '2019-07-13 03:03:24', '2019-07-13 03:03:24'),
(3, 1, 1, 'home_delivery', '2019-07-13 03:31:46', '2019-07-13 03:31:46'),
(4, 2, 2, 'home_delivery', '2019-07-13 05:04:09', '2019-07-13 05:04:09'),
(5, 4, 3, 'office_collection', '2019-07-27 22:58:13', '2019-07-27 22:58:13'),
(6, 1, 1, 'office_collection', '2019-07-27 23:09:05', '2019-07-27 23:09:05'),
(7, 4, 3, 'home_delivery', '2019-07-28 03:09:46', '2019-07-28 03:09:46'),
(8, 1, 1, 'office_collection', '2019-08-01 00:57:12', '2019-08-01 00:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_method_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `shipping_method_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'home_delivery', NULL, NULL, NULL),
(2, 'office_collection', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 1, 6, 'vendorSubcat', NULL, '2019-06-24 23:15:20', '2019-06-24 23:15:20'),
(11, 0, 7, 'catfourSubcat', NULL, '2019-07-13 02:05:28', '2019-07-13 02:05:28');

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
(1, 'admin', 'admin@gmail.com', '$2y$10$4O8EHTcMEiCZYqlIrxskQODMLIdWhRXQ8190B21vWIfozgA14NFSK', 'CAzRhFgiIxmOPJGg6dtGmT6ec3h6uGYSYlblJLewtFhWn6OwABxkGgrVCk72', NULL, NULL);

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
(5, 'fatik', '$2y$10$4O8EHTcMEiCZYqlIrxskQODMLIdWhRXQ8190B21vWIfozgA14NFSK', 'asdf', 'jessore', 'www.fatik.com', 'farid', '01412122001', '123654', '01812122007', NULL, 'fatik@gmail.com', NULL, 'No', 'Yes', 'Yes', 'No', 'No', '69535_1561360827.jpg', '2019-06-24 01:20:27', '2019-06-24 01:20:27'),
(6, 'arafat', '4dI78', 'ard', 'dhaka', 'asdweb.com', 'nizam', '01714142001', '01714142001', '01912122003', NULL, 'arafat@gmail.com', 'ara', 'Yes', 'Yes', 'Yes', 'No', 'No', '38959_1561530157.jpg', '2019-06-26 00:22:37', '2019-06-26 00:22:37'),
(7, 'manik', 'R0oXh', 'manik', 'dhaka', 'aaweb.com', 'nizam', '01714141002', NULL, '01714142005', NULL, 'manik@gmail.com', 'manik', 'Yes', 'Yes', 'Yes', 'No', 'No', '35882_1563015539.jpg', '2019-07-13 04:58:59', '2019-07-13 04:58:59'),
(8, 'fatik', '123456', 'fatik', 'dhaka', 'www.web.com', 'nizam', '01714142002', '01714142002', '01714142002', NULL, 'fatik@gmail.com', 'fatik', 'Yes', 'No', 'No', 'No', 'Yes', '87095_1565092733.gif', '2019-08-06 05:58:53', '2019-08-06 05:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b2b_customers`
--
ALTER TABLE `b2b_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b2_b_purchases`
--
ALTER TABLE `b2_b_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b2_b_purchase_details`
--
ALTER TABLE `b2_b_purchase_details`
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
-- Indexes for table `delivery_processes`
--
ALTER TABLE `delivery_processes`
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
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
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
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poinvoices`
--
ALTER TABLE `poinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poinvoice_details`
--
ALTER TABLE `poinvoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_infos`
--
ALTER TABLE `po_infos`
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
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `b2_b_purchases`
--
ALTER TABLE `b2_b_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `b2_b_purchase_details`
--
ALTER TABLE `b2_b_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_footers`
--
ALTER TABLE `custom_footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_processes`
--
ALTER TABLE `delivery_processes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poinvoices`
--
ALTER TABLE `poinvoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poinvoice_details`
--
ALTER TABLE `poinvoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_infos`
--
ALTER TABLE `po_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
