-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 01:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbucket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `age`, `address`, `gender`, `phone`, `profileimage`, `coverimage`, `created_at`, `updated_at`) VALUES
(1, 'foodbucket@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` bigint(20) UNSIGNED NOT NULL,
  `product` bigint(20) UNSIGNED NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `age`, `address`, `gender`, `phone`, `n_id`, `created_at`, `updated_at`) VALUES
(5, 'niloy@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-05-19 23:30:49', '2021-05-19 23:30:49'),
(6, 'skyfar@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-05-27 11:12:52', '2021-05-27 11:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_05_165927_create_admins_table', 1),
(5, '2021_01_09_060221_create_vendors_table', 1),
(6, '2021_01_09_062030_create_customers_table', 1),
(7, '2021_01_14_135604_create_riders_table', 1),
(8, '2021_04_18_213753_create_shop_categories_table', 1),
(9, '2021_04_18_213958_create_shops_table', 1),
(10, '2021_04_18_214339_create_product_categories_table', 1),
(11, '2021_04_18_214638_create_products_table', 1),
(20, '2021_04_19_170333_create_carts_table', 2),
(21, '2021_05_08_164407_create_orders_table', 2),
(22, '2021_05_08_164958_create_order__products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `payment_way` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `vendor_email`, `total_price`, `payment_way`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'Niloy', 'niloy@gmail.com', 'dokanbari@gmail.com', 1600, 'Cash-on-Delivery', 'Pending', 'Approved', '2021-05-27 13:31:06', '2021-05-27 15:12:58'),
(2, 'Niloy', 'niloy@gmail.com', 'rudeboy@gmail.com', 540, 'Cash-on-Delivery', 'Pending', 'Approved', '2021-05-27 13:47:58', '2021-05-27 14:56:17'),
(3, 'Niloy', 'niloy@gmail.com', 'rudeboy@gmail.com', 810, 'Cash-on-Delivery', 'Pending', 'Approved', '2021-05-27 14:58:16', '2021-05-27 15:00:37'),
(4, 'Niloy', 'niloy@gmail.com', 'dokanbari@gmail.com', 1900, 'Cash-on-Delivery', 'Pending', 'Approved', '2021-05-27 15:15:32', '2021-05-27 15:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `order__products`
--

CREATE TABLE `order__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__products`
--

INSERT INTO `order__products` (`id`, `order_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1', '2021-05-27 13:31:06', '2021-05-27 13:31:06'),
(2, 2, 15, '2', '2021-05-27 13:47:58', '2021-05-27 13:47:58'),
(3, 3, 15, '3', '2021-05-27 14:58:16', '2021-05-27 14:58:16'),
(4, 4, 2, '1', '2021-05-27 15:15:32', '2021-05-27 15:15:32'),
(5, 4, 1, '1', '2021-05-27 15:15:32', '2021-05-27 15:15:32');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `p_vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_price` double DEFAULT NULL,
  `p_discount` double DEFAULT NULL,
  `p_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_img_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_hh` int(11) DEFAULT NULL,
  `a_mm` int(11) DEFAULT NULL,
  `d_hh` int(11) DEFAULT NULL,
  `d_mm` int(11) DEFAULT NULL,
  `total_rate` bigint(20) DEFAULT NULL,
  `total_star` bigint(20) DEFAULT NULL,
  `product` tinyint(1) NOT NULL DEFAULT 0,
  `p_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `shop`, `category`, `p_vendor`, `p_price`, `p_discount`, `p_description`, `p_availability`, `p_img_1`, `p_img_2`, `p_img_3`, `a_hh`, `a_mm`, `d_hh`, `d_mm`, `total_rate`, `total_star`, `product`, `p_status`, `created_at`, `updated_at`) VALUES
(1, 'BBQ Pizza', 1, 1, 'dokanbari@gmail.com', 300, 10, 'kudfuyiktfkuygvjhbvjhb', 'In Stock', 'productImages/1618784040.gif', NULL, NULL, 8, 10, 18, 20, NULL, NULL, 1, 'Accepted', '2021-04-18 16:14:00', '2021-05-27 15:15:10'),
(2, 'Kacci Biryani', 2, 3, 'dokanbari@gmail.com', 1600, 3, 'aaaaaaa', 'In Stock', 'productImages/1618851298.jpeg', NULL, NULL, 8, 12, 19, 12, NULL, NULL, 1, 'Accepted', '2021-04-18 16:17:16', '2021-04-19 10:54:58'),
(3, 'Clear Men', 3, 4, 'dokanbari@gmail.com', 330, 0, 'asdfsdfsfsdvsvsvsdvsdvv', 'In Stock', 'productImages/1621403896.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending', '2021-05-18 23:58:16', '2021-05-18 23:58:16'),
(4, 'XFX AMD RDNA 2 16GB', 4, 5, 'dokanbari@gmail.com', 150000, 0, 'Model: Speedster MERC 319 RX6900 XT\r\nGame Clock: to 2135MHz, Boost Clock: Up to 2365MHz\r\nAMD RDNA 2 Architecture, AMD Fidelity FX\r\nBase clock Up to: 1950 MHz\r\nThermal Solution: 3 Fan', 'In Stock', 'productImages/1621413044.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Accepted', '2021-05-19 02:30:44', '2021-05-23 11:03:32'),
(15, 'Foog', 5, 4, 'rudeboy@gmail.com', 270, 0, 'dffwe', 'Limited Stock', 'productImages/1622142047.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Accepted', '2021-05-27 13:00:47', '2021-05-27 13:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', '2021-04-18 15:56:47', '2021-04-18 15:58:01'),
(2, 'Burger', '2021-04-18 15:56:57', '2021-04-18 15:56:57'),
(3, 'Biryani', '2021-04-18 16:15:52', '2021-04-18 16:15:52'),
(4, 'Cosmetics', '2021-05-18 23:53:18', '2021-05-18 23:53:18'),
(5, 'Computer Component', '2021-05-19 02:26:04', '2021-05-19 02:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `email`, `name`, `age`, `address`, `phone`, `gender`, `profileimage`, `n_id`, `created_at`, `updated_at`) VALUES
(1, 'motaleb@gmail.com', 'Motaleb', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-26 02:28:35', '2021-05-26 02:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `s_vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_hh` int(11) DEFAULT NULL,
  `open_mm` int(11) DEFAULT NULL,
  `close_hh` int(11) DEFAULT NULL,
  `close_mm` int(11) DEFAULT NULL,
  `s_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_brance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_discount` double DEFAULT NULL,
  `total_rate` bigint(20) DEFAULT NULL,
  `total_star` bigint(20) DEFAULT NULL,
  `shop` tinyint(1) NOT NULL DEFAULT 0,
  `s_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `s_name`, `category`, `s_vendor`, `open_hh`, `open_mm`, `close_hh`, `close_mm`, `s_banner`, `s_brance`, `s_discount`, `total_rate`, `total_star`, `shop`, `s_status`, `created_at`, `updated_at`) VALUES
(1, 'Hungry Jacks', 4, 'dokanbari@gmail.com', 10, 30, 23, 59, 'shopImages/1621192612.png', 'Pangsha', 15, NULL, NULL, 1, 'Accepted', '2021-04-18 15:56:36', '2021-05-21 12:45:07'),
(2, 'The Food Shop', 4, 'dokanbari@gmail.com', 9, 0, 23, 59, 'shopImages/1621192628.png', 'Pangsha', 5, NULL, NULL, 1, 'Accepted', '2021-04-18 16:15:04', '2021-05-21 12:44:44'),
(3, 'Almas Super Shop', 3, 'dokanbari@gmail.com', 9, 30, 23, 59, 'shopImages/1621401698.png', 'Dhaka', 3, NULL, NULL, 1, 'Accepted', '2021-05-18 23:21:38', '2021-05-23 11:10:15'),
(4, 'Star Tech', 2, 'dokanbari@gmail.com', 10, 0, 23, 59, 'shopImages/1621405130.png', 'Pangsha', 2, NULL, NULL, 1, 'Accepted', '2021-05-19 00:18:50', '2021-05-23 11:11:10'),
(5, 'Agora Super Shop', 3, 'rudeboy@gmail.com', 9, 20, 23, 59, 'shopImages/1621623899.png', 'Dhaka', 0, NULL, NULL, 1, 'Accepted', '2021-05-20 00:42:18', '2021-05-27 12:39:15'),
(10, NULL, NULL, 'totla@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending', '2021-05-27 12:42:37', '2021-05-27 12:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Computer', '2021-04-18 15:55:53', '2021-05-18 23:11:02'),
(3, 'Groceries', '2021-04-18 15:56:05', '2021-05-18 23:10:47'),
(4, 'Restaurants', '2021-04-19 10:14:18', '2021-04-19 10:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `vendor` tinyint(1) NOT NULL DEFAULT 0,
  `rider` tinyint(1) NOT NULL DEFAULT 0,
  `account` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `city`, `admin`, `vendor`, `rider`, `account`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SkyFar', 'foodbucket@gmail.com', NULL, '$2y$10$uiVb1JTxPXR.eKQsZAcvm.eiO71zrjiQnv3IjNvJwQzndCGBu/I2a', NULL, 1, 0, 0, 0, NULL, '2021-04-18 15:54:53', '2021-04-18 15:54:53'),
(6, 'Niloy', 'niloy@gmail.com', NULL, '$2y$10$jWCZs0gE7HSMqSgThSJYf.aDWYN/JxkKr75FtSeuUQdG6fSnELOFa', NULL, 0, 0, 0, 0, NULL, '2021-05-19 23:30:49', '2021-05-19 23:30:49'),
(9, 'RudeBoy', 'rudeboy@gmail.com', NULL, '$2y$10$kfBKRV8H20Z.IiyjG/O/XenAU/sWPIXpr6kOerK1gM0ZRPAJT8x22', NULL, 0, 1, 0, 0, NULL, '2021-05-20 00:42:18', '2021-05-20 00:42:18'),
(10, 'Motaleb', 'motaleb@gmail.com', NULL, '$2y$10$5thMfibtYgi7S3jL8vYlZ.y5GAbC4BB1kn.NTn70hVsYHI6jJlAr.', NULL, 0, 0, 1, 0, NULL, '2021-05-26 02:28:34', '2021-05-26 02:28:34'),
(11, 'SkyFar', 'skyfar@gmail.com', NULL, '$2y$10$fPdiu5WNecy.qqpu9HyhauV9Plbh006zmcJleeaBZ9KT5gv/gvFr2', NULL, 0, 0, 0, 0, NULL, '2021-05-27 11:12:52', '2021-05-27 11:12:52'),
(13, 'Totla', 'totla@gmail.com', NULL, '$2y$10$5GqD08l5Kt2MBpGUn7OBRe423fZJmK/uP4RjNZ70pN11rHp68vrFK', NULL, 0, 1, 0, 0, NULL, '2021-05-27 12:42:37', '2021-05-27 12:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `email`, `age`, `address`, `phone`, `gender`, `profileimage`, `n_id`, `created_at`, `updated_at`) VALUES
(5, 'rudeboy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-20 00:42:18', '2021-05-20 00:42:18'),
(7, 'totla@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-27 12:42:37', '2021-05-27 12:42:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_foreign` (`customer`),
  ADD KEY `carts_product_foreign` (`product`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `order__products`
--
ALTER TABLE `order__products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__products_order_id_foreign` (`order_id`),
  ADD KEY `order__products_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_foreign` (`shop`),
  ADD KEY `products_category_foreign` (`category`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riders_email_unique` (`email`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_category_foreign` (`category`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order__products`
--
ALTER TABLE `order__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_foreign` FOREIGN KEY (`customer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Constraints for table `order__products`
--
ALTER TABLE `order__products`
  ADD CONSTRAINT `order__products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order__products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_foreign` FOREIGN KEY (`category`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_shop_foreign` FOREIGN KEY (`shop`) REFERENCES `shops` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_category_foreign` FOREIGN KEY (`category`) REFERENCES `shop_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
