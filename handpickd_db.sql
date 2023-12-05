-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 11:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handpickd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state_province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `transaction_id`, `email`, `phone_number`, `first_name`, `last_name`, `address`, `city`, `country`, `state_province`, `postal_code`, `created_at`, `updated_at`, `delivery_method`) VALUES
(1, 47, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 17:37:12', '2023-11-30 17:37:12', NULL),
(2, 48, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 17:37:12', '2023-11-30 17:37:12', NULL),
(3, 49, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 18:09:52', '2023-11-30 18:09:52', NULL),
(4, 50, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 18:41:19', '2023-11-30 18:41:19', NULL),
(5, 51, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 18:46:29', '2023-11-30 18:46:29', NULL),
(6, 52, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 18:52:30', '2023-11-30 18:52:30', NULL),
(7, 53, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:01:44', '2023-11-30 19:01:44', NULL),
(8, 54, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:06:15', '2023-11-30 19:06:15', NULL),
(9, 55, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:10:08', '2023-11-30 19:10:08', NULL),
(10, 56, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:10:08', '2023-11-30 19:10:08', NULL),
(11, 57, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:11:21', '2023-11-30 19:11:21', NULL),
(12, 58, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:16:04', '2023-11-30 19:16:04', NULL),
(13, 59, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:21:23', '2023-11-30 19:21:23', NULL),
(14, 60, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:22:46', '2023-11-30 19:22:46', NULL),
(15, 61, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:26:22', '2023-11-30 19:26:22', NULL),
(16, 62, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:29:01', '2023-11-30 19:29:01', NULL),
(17, 63, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:35:47', '2023-11-30 19:35:47', NULL),
(18, 64, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:37:39', '2023-11-30 19:37:39', NULL),
(19, 65, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:42:16', '2023-11-30 19:42:16', NULL),
(20, 66, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:52:32', '2023-11-30 19:52:32', NULL),
(21, 67, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-11-30 19:56:01', '2023-11-30 19:56:01', NULL),
(22, 68, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 15:59:07', '2023-12-01 15:59:07', 'Express'),
(23, 69, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:10:49', '2023-12-01 16:10:49', 'Standard'),
(24, 70, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:34:33', '2023-12-01 16:34:33', 'Express'),
(25, 71, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:34:33', '2023-12-01 16:34:33', 'Express'),
(26, 72, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:41:04', '2023-12-01 16:41:04', 'Express'),
(27, 73, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:41:04', '2023-12-01 16:41:04', 'Express'),
(28, 74, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:50:03', '2023-12-01 16:50:03', 'Express'),
(29, 75, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 16:50:03', '2023-12-01 16:50:03', 'Express'),
(30, 76, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-01 20:04:03', '2023-12-01 20:04:03', 'Express'),
(31, 77, 'seweryn_cz@outlook.com', '01590 1137779', 'Seweryn', 'Czabanowski', 'Street 123', 'Berlin', 'Germany', 'Berlin', '13587', '2023-12-04 07:48:28', '2023-12-04 07:48:28', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Handmade Crafts', 'Beautifully crafted handmade items.', '2023-11-01 16:34:34', '2023-11-01 16:34:34'),
(3, 'Jewelry & Accessories', 'Handcrafted jewelry and accessories.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(4, 'Home & Living', 'Handmade home decor and living products.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(5, 'Art & Collectibles', 'Unique art pieces and collectibles.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(6, 'Clothing & Shoes', 'Handmade clothing and shoes for all ages.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(7, 'Wedding & Party', 'Personalized items for weddings and parties.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(8, 'Toys & Entertainment', 'Handcrafted toys and entertainment products.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(9, 'Vintage', 'Vintage items and retro finds.', '2023-11-12 09:40:25', '2023-11-12 09:40:25'),
(10, 'Bath & Beauty', 'Handmade beauty and bath products.', '2023-11-12 09:40:25', '2023-11-12 09:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_12_162225_add_resized_image_path_to_product_images', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artisan_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `artisan_id`, `category_id`, `name`, `description`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Handmade Wooden Bowl', 'A beautifully carved wooden bowl that serves as a centerpiece.', 60.99, 8, '2023-11-01 16:34:34', '2023-12-04 08:43:59'),
(11, 16, 3, 'Vintage Leather Wallet', 'A durable and stylish vintage leather wallet.', 29.99, 2, '2023-11-12 09:41:12', '2023-12-01 20:04:03'),
(12, 16, 4, 'Handwoven Scarf', 'A warm and fashionable handwoven scarf.', 34.99, 1, '2023-11-12 09:41:12', '2023-12-01 15:59:07'),
(13, 21, 5, 'Artisanal Scented Candles', 'Soothing scented candles made with natural ingredients.', 19.99, 24, '2023-11-12 09:41:12', '2023-11-30 17:37:12'),
(14, 21, 6, 'Hand-painted Canvas Art', 'Abstract canvas art, perfect for decorating any room.', 89.99, 1, '2023-11-12 09:41:12', '2023-12-01 16:10:49'),
(15, 27, 7, 'Personalized Jewelry Box', 'An elegant, personalized jewelry box for your treasures.', 49.99, 8, '2023-11-12 09:41:12', '2023-11-30 19:10:08'),
(16, 27, 8, 'Custom Engraved Pen', 'A custom engraved pen, ideal for gifts.', 24.99, 14, '2023-11-12 09:41:12', '2023-11-30 13:46:27'),
(17, 1, 4, 'Rustic Wooden Serving Tray', 'A handcrafted serving tray made from reclaimed wood, perfect for rustic-themed gatherings.', 39.99, 14, '2023-11-17 13:34:53', '2023-11-23 15:51:47'),
(18, 1, 4, 'Oak Wood Coaster Set', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', 25.00, 25, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(19, 1, 4, 'Carved Wooden Picture Frame', 'An elegantly carved picture frame, suitable for 5x7 inch photos.', 29.50, 20, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(20, 16, 3, 'Hand-Stitched Leather Belt', 'A classic, durable leather belt, hand-stitched for superior quality.', 35.99, 11, '2023-11-17 13:34:53', '2023-12-04 07:48:28'),
(21, 16, 3, 'Leather Journal Cover', 'A premium leather journal cover, designed to fit standard-sized notebooks.', 40.00, 10, '2023-11-17 13:34:53', '2023-12-01 16:34:33'),
(22, 16, 3, 'Leather Phone Case', 'A sleek, handcrafted leather phone case.', 27.99, 21, '2023-11-17 13:34:53', '2023-12-01 16:41:04'),
(23, 16, 3, 'Vintage Leather Satchel', 'A stylish satchel made from high-quality vintage leather.', 69.99, 8, '2023-11-17 13:34:53', '2023-12-01 16:41:04'),
(24, 21, 10, 'Handcrafted Soap Set', 'A set of four natural, handcrafted soaps made with organic ingredients.', 24.99, 29, '2023-11-17 13:34:53', '2023-11-23 16:10:14'),
(25, 21, 10, 'Decorative Throw Pillows', 'A pair of hand-sewn throw pillows, featuring vibrant, artistic designs.', 55.00, 12, '2023-11-17 13:34:53', '2023-11-30 19:01:44'),
(26, 21, 10, 'Ceramic Coffee Mugs', 'A set of two handcrafted ceramic coffee mugs, each with a unique, rustic design.', 32.99, 19, '2023-11-17 13:34:53', '2023-12-01 16:50:03'),
(27, 27, 1, 'Engraved Wooden Watch', 'A sophisticated wooden watch with a custom engraving option.', 60.00, 11, '2023-11-17 13:34:53', '2023-12-01 16:50:03'),
(28, 27, 1, 'Personalized Leather Bookmark', 'A sleek leather bookmark, customizable with your choice of initials or a short message.', 12.99, 37, '2023-11-17 13:34:53', '2023-11-30 18:46:29'),
(29, 27, 1, 'Hand-Engraved Decorative Plate', 'A stunning, hand-engraved decorative plate, ideal for display or special occasions.', 49.99, 5, '2023-11-17 13:34:53', '2023-11-25 16:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `resized_image_path` varchar(255) DEFAULT NULL,
  `show_image_path` varchar(255) DEFAULT NULL,
  `thumbnail_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `alt_text`, `created_at`, `updated_at`, `resized_image_path`, `show_image_path`, `thumbnail_image_path`) VALUES
(44, 13, 'product_images/product_1700227257_original.webp', 'Soothing scented candles made with natural ingredients.', '2023-11-17 12:20:57', '2023-11-21 17:01:33', 'product_images/product_1700227257_resized.webp', 'product_images/product_1700227257_show.webp', 'product_images/product_1700227257_thumbnail.webp'),
(56, 12, 'product_images/product_1700237909_original.webp', 'A warm and fashionable handwoven scarf.', '2023-11-17 15:18:30', '2023-11-21 17:01:33', 'product_images/product_1700237909_resized.webp', 'product_images/product_1700237909_show.webp', 'product_images/product_1700237909_thumbnail.webp'),
(57, 13, 'product_images/product_1700237975_original.webp', 'Soothing scented candles made with natural ingredients.', '2023-11-17 15:19:37', '2023-11-21 17:01:33', 'product_images/product_1700237975_resized.webp', 'product_images/product_1700237975_show.webp', 'product_images/product_1700237975_thumbnail.webp'),
(58, 14, 'product_images/product_1700238001_original.webp', 'Abstract canvas art, perfect for decorating any room.', '2023-11-17 15:20:04', '2023-11-21 17:01:34', 'product_images/product_1700238001_resized.webp', 'product_images/product_1700238001_show.webp', 'product_images/product_1700238001_thumbnail.webp'),
(59, 15, 'product_images/product_1700238049_original.webp', 'An elegant, personalized jewelry box for your treasures.', '2023-11-17 15:20:52', '2023-11-21 17:01:34', 'product_images/product_1700238049_resized.webp', 'product_images/product_1700238049_show.webp', 'product_images/product_1700238049_thumbnail.webp'),
(60, 16, 'product_images/product_1700238128_original.webp', 'A custom engraved pen, ideal for gifts.', '2023-11-17 15:22:10', '2023-11-21 17:01:34', 'product_images/product_1700238128_resized.webp', 'product_images/product_1700238128_show.webp', 'product_images/product_1700238128_thumbnail.webp'),
(61, 17, 'product_images/product_1700238174_original.webp', 'A handcrafted serving tray made from reclaimed wood, perfect for rustic-themed gatherings.', '2023-11-17 15:22:55', '2023-11-21 17:01:34', 'product_images/product_1700238174_resized.webp', 'product_images/product_1700238174_show.webp', 'product_images/product_1700238174_thumbnail.webp'),
(62, 18, 'product_images/product_1700238277_original.webp', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', '2023-11-17 15:24:39', '2023-11-21 17:01:34', 'product_images/product_1700238277_resized.webp', 'product_images/product_1700238277_show.webp', 'product_images/product_1700238277_thumbnail.webp'),
(63, 18, 'product_images/product_1700238279_original.webp', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', '2023-11-17 15:24:41', '2023-11-21 17:01:34', 'product_images/product_1700238279_resized.webp', 'product_images/product_1700238279_show.webp', 'product_images/product_1700238279_thumbnail.webp'),
(64, 19, 'product_images/product_1700238359_original.webp', 'An elegantly carved picture frame, suitable for 5x7 inch photos.', '2023-11-17 15:26:00', '2023-11-21 17:01:34', 'product_images/product_1700238359_resized.webp', 'product_images/product_1700238359_show.webp', 'product_images/product_1700238359_thumbnail.webp'),
(65, 20, 'product_images/product_1700238463_original.webp', 'A classic, durable leather belt, hand-stitched for superior quality.', '2023-11-17 15:27:46', '2023-11-21 17:01:34', 'product_images/product_1700238463_resized.webp', 'product_images/product_1700238463_show.webp', 'product_images/product_1700238463_thumbnail.webp'),
(66, 21, 'product_images/product_1700238567_original.webp', 'A premium leather journal cover, designed to fit standard-sized notebooks.', '2023-11-17 15:29:29', '2023-11-21 17:01:34', 'product_images/product_1700238567_resized.webp', 'product_images/product_1700238567_show.webp', 'product_images/product_1700238567_thumbnail.webp'),
(67, 22, 'product_images/product_1700238607_original.webp', 'A sleek, handcrafted leather phone case.', '2023-11-17 15:30:08', '2023-11-21 17:01:34', 'product_images/product_1700238607_resized.webp', 'product_images/product_1700238607_show.webp', 'product_images/product_1700238607_thumbnail.webp'),
(68, 23, 'product_images/product_1700238648_original.webp', 'A stylish satchel made from high-quality vintage leather.', '2023-11-17 15:30:51', '2023-11-21 17:01:34', 'product_images/product_1700238648_resized.webp', 'product_images/product_1700238648_show.webp', 'product_images/product_1700238648_thumbnail.webp'),
(69, 24, 'product_images/product_1700238947_original.webp', 'A set of four natural, handcrafted soaps made with organic ingredients.', '2023-11-17 15:35:49', '2023-11-21 17:01:34', 'product_images/product_1700238947_resized.webp', 'product_images/product_1700238947_show.webp', 'product_images/product_1700238947_thumbnail.webp'),
(70, 25, 'product_images/product_1700239013_original.webp', 'A pair of hand-sewn throw pillows, featuring vibrant, artistic designs.', '2023-11-17 15:36:55', '2023-11-21 17:01:34', 'product_images/product_1700239013_resized.webp', 'product_images/product_1700239013_show.webp', 'product_images/product_1700239013_thumbnail.webp'),
(71, 26, 'product_images/product_1700239310_original.webp', 'A set of two handcrafted ceramic coffee mugs, each with a unique, rustic design.', '2023-11-17 15:41:52', '2023-11-21 17:01:34', 'product_images/product_1700239310_resized.webp', 'product_images/product_1700239310_show.webp', 'product_images/product_1700239310_thumbnail.webp'),
(72, 27, 'product_images/product_1700239399_original.webp', 'A sophisticated wooden watch with a custom engraving option.', '2023-11-17 15:43:20', '2023-11-21 17:01:34', 'product_images/product_1700239399_resized.webp', 'product_images/product_1700239399_show.webp', 'product_images/product_1700239399_thumbnail.webp'),
(73, 28, 'product_images/product_1700239687_original.webp', 'A sleek leather bookmark, customizable with your choice of initials or a short message.', '2023-11-17 15:48:10', '2023-11-21 17:01:34', 'product_images/product_1700239687_resized.webp', 'product_images/product_1700239687_show.webp', 'product_images/product_1700239687_thumbnail.webp'),
(74, 29, 'product_images/product_1700239767_original.webp', 'A stunning, hand-engraved decorative plate, ideal for display or special occasions.', '2023-11-17 15:49:29', '2023-11-21 17:01:34', 'product_images/product_1700239767_resized.webp', 'product_images/product_1700239767_show.webp', 'product_images/product_1700239767_thumbnail.webp'),
(75, 11, 'product_images/product_1700585995_original.webp', 'A durable and stylish vintage leather wallet.', '2023-11-21 16:00:00', '2023-11-21 16:00:00', 'product_images/product_1700585995_resized.webp', 'product_images/product_1700585995_show.webp', 'product_images/product_1700585995_thumbnail.webp'),
(82, 4, 'product_images/product_1701189156_original.webp', 'A beautifully carved wooden bowl that serves as a centerpiece.', '2023-11-28 15:32:40', '2023-11-28 15:32:40', 'product_images/product_1701189156_resized.webp', 'product_images/product_1701189156_show.webp', 'product_images/product_1701189156_thumbnail.webp');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(7, 11, 18, 5, 'Exceptional quality and detail. I’m thoroughly impressed!', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(8, 11, 19, 4, 'Beautiful work, but the delivery took longer than expected.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(9, 11, 20, 3, 'Nice, but not exactly what I was expecting based on the photos.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(10, 12, 21, 5, 'Absolutely perfect! I couldn’t be happier with this purchase.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(11, 12, 22, 4, 'Great product, though the color is slightly off from the website image.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(12, 12, 23, 2, 'Arrived damaged, but customer service was helpful in resolving the issue.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(13, 13, 24, 5, 'Superb quality! It has become my favorite piece in the house.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(14, 13, 25, 4, 'Looks great, but the size was a bit smaller than I expected.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(15, 13, 26, 3, 'Decent product, but I found it a bit overpriced for the quality.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(16, 14, 27, 5, 'I am extremely pleased with this purchase. Highly recommend!', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(17, 14, 28, 4, 'Very good craftsmanship, though the packaging was not great.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(18, 14, 29, 2, 'The product is okay, but it did not meet my expectations.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(19, 15, 29, 5, 'Truly a masterpiece! The craftsmanship is top-notch.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(20, 15, 30, 4, 'Very unique and well-made, but took a while to arrive.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(21, 15, 31, 1, 'Not what I expected, and the material feels a bit cheap.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(22, 16, 30, 5, 'Stunning design and excellent quality. I highly recommend it.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(23, 16, 31, 4, 'Great product, but the packaging could be improved.', '2023-11-12 09:47:34', '2023-11-12 09:47:34'),
(26, 14, 1, 5, 'I\'ve changed my mind...THIS IS AMAZING!!! HELL YEAH', '2023-11-14 12:01:16', '2023-12-02 18:54:02'),
(38, 13, 1, 5, 'Cool', '2023-11-14 19:55:36', '2023-12-02 19:29:26'),
(39, 16, 1, 1, 'Rool', '2023-11-15 16:19:50', '2023-11-15 16:19:50'),
(71, 17, 11, 4, 'The rustic charm of this tray is perfect for my country cottage aesthetic. Love it!', '2023-11-17 13:44:08', '2023-11-17 13:44:08'),
(72, 17, 11, 4, 'The rustic charm of this tray is perfect for my country cottage aesthetic. Love it!', '2023-11-17 13:44:38', '2023-11-17 13:44:38'),
(101, 17, 13, 5, 'Every time I have guests over, they compliment this tray. It’s as sturdy as it is beautiful.', '2023-11-17 13:46:13', '2023-11-17 13:46:13'),
(102, 17, 19, 5, 'I bought this as a housewarming gift and my friend can’t stop raving about it.', '2023-11-17 13:46:13', '2023-11-17 13:46:13'),
(103, 17, 22, 3, 'The tray is well-made but a bit smaller than I expected. Check dimensions before buying.', '2023-11-17 13:46:13', '2023-11-17 13:46:13'),
(104, 18, 12, 4, 'These coasters have a lovely finish and protect my tables effectively.', '2023-11-17 13:46:56', '2023-11-17 13:46:56'),
(105, 18, 14, 5, 'Just what I was looking for - rustic and practical.', '2023-11-17 13:46:56', '2023-11-17 13:46:56'),
(106, 18, 23, 3, 'Decent coasters, though I anticipated a bit more heft to them.', '2023-11-17 13:46:56', '2023-11-17 13:46:56'),
(107, 18, 30, 4, 'The grain of the wood is so nice, and they have a very natural feel.', '2023-11-17 13:46:56', '2023-11-17 13:46:56'),
(108, 19, 15, 5, 'The frame is a piece of art in itself. It’s now holding my favorite family photo.', '2023-11-17 13:47:16', '2023-11-17 13:47:16'),
(109, 19, 20, 4, 'Beautiful craftsmanship, though it took a little longer to arrive than expected.', '2023-11-17 13:47:16', '2023-11-17 13:47:16'),
(110, 19, 24, 5, 'So pleased with this purchase. It’s beautifully carved and solid.', '2023-11-17 13:47:16', '2023-11-17 13:47:16'),
(111, 19, 29, 2, 'A bit disappointed as the carving was not as detailed as I hoped.', '2023-11-17 13:47:16', '2023-11-17 13:47:16'),
(116, 20, 31, 5, 'The belt is just phenomenal. It feels custom-made for my waist.', '2023-11-17 13:47:52', '2023-11-17 13:47:52'),
(117, 20, 21, 5, 'High quality leather and the stitching detail is impeccable.', '2023-11-17 13:47:52', '2023-11-17 13:47:52'),
(118, 20, 25, 4, 'Took some time to break in, but now it’s the perfect fit and very comfortable.', '2023-11-17 13:47:52', '2023-11-17 13:47:52'),
(119, 20, 28, 3, 'Solid belt, but the buckle feels a bit lightweight.', '2023-11-17 13:47:52', '2023-11-17 13:47:52'),
(185, 21, 10, 5, 'Transformed my journal into something I can proudly display on my shelf.', '2023-11-17 13:49:24', '2023-11-17 13:49:24'),
(186, 21, 17, 4, 'The leather smells amazing and the texture is very pleasant.', '2023-11-17 13:49:24', '2023-11-17 13:49:24'),
(187, 21, 26, 4, 'It’s a stylish cover, though I wish there were more color options.', '2023-11-17 13:49:24', '2023-11-17 13:49:24'),
(188, 21, 31, 4, 'Very classy - makes me feel like a true writer when I pull this out at coffee shops.', '2023-11-17 13:49:24', '2023-11-17 13:49:24'),
(189, 24, 16, 4, 'The scents are divine and it’s great knowing they’re made with natural ingredients.', '2023-11-17 13:49:39', '2023-11-17 13:49:39'),
(190, 24, 18, 5, 'These soaps lather up nicely and don’t dry out my skin.', '2023-11-17 13:49:39', '2023-11-17 13:49:39'),
(191, 24, 27, 3, 'Enjoyed the variety, but the lavender one didn’t smell as I expected.', '2023-11-17 13:49:39', '2023-11-17 13:49:39'),
(192, 24, 31, 5, 'Each bar has a subtle and soothing scent. They’re gentle and I love the eco-friendly packaging.', '2023-11-17 13:49:39', '2023-11-17 13:49:39'),
(193, 25, 25, 4, 'They add such a cozy touch to my reading nook.', '2023-11-17 13:50:51', '2023-11-17 13:50:51'),
(194, 25, 16, 5, 'The colors are vibrant, and the material is top-notch.', '2023-11-17 13:50:51', '2023-11-17 13:50:51'),
(195, 25, 29, 3, 'Cute and comfy, but they flatten out a bit too quickly.', '2023-11-17 13:50:51', '2023-11-17 13:50:51'),
(196, 25, 28, 4, 'These pillows look like something you’d find in a chic boutique!', '2023-11-17 13:50:51', '2023-11-17 13:50:51'),
(272, 27, 20, 5, 'The craftsmanship of this watch is outstanding. It feels personalized and is incredibly stylish.', '2023-11-17 14:00:21', '2023-11-17 17:02:08'),
(273, 27, 26, 4, 'Beautifully made and the engraving is a nice touch. A perfect gift for a loved one.', '2023-11-17 14:00:21', '2023-11-17 17:02:08'),
(274, 27, 30, 5, 'Truly a piece of art. This wooden watch stands out every time I wear it.', '2023-11-17 14:00:21', '2023-11-17 17:02:08'),
(275, 27, 29, 3, 'The watch is nice, but it’s lighter than I expected. I’m not sure how it will hold up over time.', '2023-11-17 14:00:21', '2023-11-17 17:02:08'),
(276, 28, 28, 5, 'The leather bookmark is not just practical, it’s also very elegant.', '2023-11-17 14:00:21', '2023-11-17 17:02:59'),
(277, 28, 19, 4, 'I love the personalization option. It’s a simple yet thoughtful touch.', '2023-11-17 14:00:21', '2023-11-17 17:02:59'),
(278, 28, 10, 4, 'This bookmark makes reading even more enjoyable. The leather feels premium.', '2023-11-17 14:00:21', '2023-11-17 17:02:59'),
(279, 28, 22, 5, 'Got this as a present for a friend and they absolutely loved it! The craftsmanship is superb.', '2023-11-17 14:00:21', '2023-11-17 17:02:59'),
(280, 29, 10, 5, 'This decorative plate is even more beautiful in person. The hand-engraved details are impeccable.', '2023-11-17 14:00:21', '2023-11-17 14:00:21'),
(281, 29, 11, 4, 'It’s the centerpiece of my dining table and always gets compliments.', '2023-11-17 14:00:21', '2023-11-17 14:00:21'),
(282, 29, 13, 3, 'Lovely design, but the plate is smaller than I anticipated.', '2023-11-17 14:00:21', '2023-11-17 14:00:21'),
(283, 29, 15, 4, 'The artwork on this plate is stunning. It has a permanent spot in my display cabinet.', '2023-11-17 14:00:21', '2023-11-17 14:00:21'),
(284, 26, 21, 5, 'The ceramic mugs have a great hand-feel and the craftsmanship is top-notch.', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(285, 26, 26, 4, 'I adore the rustic look of these mugs. They’re perfect for my morning coffee.', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(286, 26, 13, 4, 'These mugs retain heat well and are a joy to use. Plus, they’re dishwasher safe!', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(287, 26, 26, 5, 'Absolutely beautiful. Each mug is unique which makes them feel extra special.', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(288, 26, 19, 3, 'The mugs are pretty, but one of them had a small chip on the bottom.', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(289, 26, 30, 5, 'Perfect size for my latte. The quality is evident and they have a lovely design.', '2023-11-17 14:02:27', '2023-11-17 14:03:51'),
(290, 22, 17, 5, 'The phone case feels luxurious and fits perfectly. Definitely exceeded my expectations.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(291, 22, 23, 4, 'The leather quality is superb, and it offers good protection for my phone.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(292, 22, 26, 3, 'Nice case but a bit tight on the sides. Hoping it stretches out a bit with use.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(293, 22, 14, 4, 'Elegant and sleek - it’s exactly what I was looking for in a phone case.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(294, 22, 25, 5, 'Impressed with the craftsmanship. It’s stylish and functional.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(295, 23, 24, 5, 'This satchel is the perfect size for daily use, and the vintage leather feels like it will last.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(296, 23, 12, 4, 'Classic design with a lot of character. It stands out from typical bags.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(297, 23, 29, 4, 'The satchel carries all my essentials without being bulky. The leather is really high quality.', '2023-11-17 14:07:18', '2023-11-17 17:05:05'),
(298, 23, 10, 3, 'Good bag but I expected more compartments for organization.', '2023-11-17 14:07:18', '2023-11-17 14:07:18'),
(299, 23, 11, 5, 'I’ve received numerous compliments on this bag. It’s durable and looks even better as it ages.', '2023-11-17 14:07:18', '2023-11-17 14:07:18'),
(300, 28, 1, 5, 'Cool Stuff', '2023-11-25 13:33:05', '2023-11-25 13:33:05'),
(309, 11, 1, 5, 'Very nice product, would buy again (maybe)', '2023-12-01 17:56:34', '2023-12-05 07:21:08'),
(310, 24, 1, 5, 'Coolest Thing Ever!', '2023-12-02 18:16:01', '2023-12-02 18:16:22'),
(314, 23, 1, 5, 'Cool thing!', '2023-12-03 13:26:30', '2023-12-03 13:26:30'),
(315, 15, 1, 5, 'Cool Thing!', '2023-12-04 08:23:53', '2023-12-04 08:23:53'),
(316, 4, 12, 5, 'This handmade wooden bowl is a masterpiece! The intricate carving and attention to detail make it a stunning centerpiece on my dining table. The craftsmanship is top-notch, and it adds a touch of elegance to any room. Highly recommended!', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(317, 4, 14, 3, 'While the design of this bowl is lovely, I found it to be slightly smaller than expected. The craftsmanship is good, but the size doesn\'t make it as versatile as I hoped. Still a beautiful piece, but be mindful of the dimensions.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(318, 4, 17, 4, 'This wooden bowl is a charming addition to my home. The quality is excellent, and it makes for a unique focal point. My only minor gripe is that it requires careful cleaning to preserve its beauty. Nevertheless, it\'s a delightful purchase.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(319, 4, 20, 2, 'Unfortunately, my bowl arrived with a small crack. While the design is appealing, the quality control seems lacking. Disappointed in the durability, as I expected better from a handmade item.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(320, 4, 22, 5, 'I absolutely love my handmade wooden bowl! It\'s not just a functional piece but a work of art. The size is perfect, and the craftsmanship is outstanding. It has become the highlight of my dining room.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(321, 4, 24, 3, 'The bowl\'s design is beautiful, but the wood seems a bit too delicate. I\'ve noticed a few scratches despite gentle use. It requires extra care to maintain its appearance, which can be a bit inconvenient.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(322, 4, 26, 4, 'The handmade wooden bowl is a conversation starter! Its unique design catches everyone\'s eye. It\'s perfect for serving snacks, though I wish it came with care instructions to ensure its longevity.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(323, 4, 28, 5, 'Exquisite craftsmanship! The bowl is not only a practical item but also a piece of art. The wood\'s natural grain is showcased beautifully. I couldn\'t be happier with this purchase.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(324, 4, 30, 2, 'The bowl arrived with an uneven finish, and the carving details were not as precise as I expected. It\'s a bit disappointing given the price. Quality control needs improvement.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(325, 4, 32, 4, 'I love the rustic charm of this bowl! It\'s well-made and looks fantastic as a centerpiece. The only downside is that it\'s not dishwasher-safe, which makes cleaning a bit more laborious.', '2023-12-04 20:49:16', '2023-12-04 20:49:16'),
(326, 11, 10, 4, 'I love the vintage vibe of this leather wallet! It\'s durable and has that worn-in charm that gives it character. The stitching is well done, and it has enough compartments for all my cards and cash. The only downside is that it\'s a bit bulkier than I expected, but overall, it\'s a solid choice.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(327, 11, 11, 2, 'Disappointed with the quality of this wallet. The leather feels cheap, and after just a few weeks of use, it started showing signs of wear and tear. The card slots are tight, making it difficult to retrieve cards easily. Not worth the price in my opinion.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(328, 11, 13, 5, 'Absolutely thrilled with my purchase! This wallet exceeded my expectations. The leather is soft, the stitching is impeccable, and the vintage design is just what I was looking for. It\'s a stylish accessory that adds a touch of sophistication to my everyday carry.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(329, 11, 14, 3, 'The wallet is decent, but the color started fading sooner than I anticipated. The card slots are well-sized, but the overall construction feels a bit flimsy. It gets the job done, but I expected better longevity.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(330, 11, 15, 5, 'This wallet is a classic! The leather is of excellent quality, and it has a timeless appeal. The compartments are well-organized, and it fits comfortably in my pocket. A must-have for anyone who appreciates a blend of style and functionality.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(332, 11, 17, 4, 'The wallet has a rustic charm that I adore. It\'s spacious enough for my essentials, and the leather feels authentic. My only complaint is that the closure button is a bit loose, but it hasn\'t caused any issues so far.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(333, 11, 21, 5, 'Fantastic wallet! The vintage look is spot on, and it\'s holding up well to daily use. The attention to detail in the design is commendable. I appreciate the craftsmanship that went into creating this stylish accessory.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(334, 11, 22, 3, 'It\'s an average wallet. The leather is okay, but I expected a richer color. The card slots are a bit tight initially, and the wallet takes some breaking in. Decent for the price, but not outstanding.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(335, 11, 23, 5, 'This vintage leather wallet is a gem! The quality is exceptional, and it ages beautifully. The compartments are well thought out, providing practicality without compromising on style. A reliable and stylish accessory for sure.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(336, 11, 24, 2, 'Regretting my purchase. The leather feels plasticky, and the wallet started falling apart after a few weeks of use. Not the durable vintage accessory I was hoping for. Disappointed.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(337, 11, 25, 4, 'Pleasantly surprised by the quality of this wallet. The leather is soft yet sturdy, and the design is timeless. The only drawback is that it could use more card slots. Nonetheless, it\'s a stylish addition to my collection.', '2023-12-04 20:51:43', '2023-12-04 20:51:43'),
(338, 12, 10, 4, 'I love the cozy feel of this handwoven scarf. The craftsmanship is evident in its softness and intricate patterns. However, I wish it were a bit longer for more styling options. Overall, a great addition to my winter wardrobe.', '2023-12-04 21:05:17', '2023-12-04 21:05:17'),
(339, 12, 11, 5, 'The handwoven scarf exceeded my expectations! It\'s not only stylish but also incredibly warm. The quality is exceptional, and I appreciate the attention to detail in every stitch. A must-have accessory for the colder months.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(340, 12, 12, 3, 'The design of the handwoven scarf is lovely, but I found it to be a bit itchy against my skin. It\'s a beautiful accessory, but comfort is crucial for me. Perhaps a softer material would make it more wearable.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(341, 12, 13, 5, 'This scarf is a work of art! The vibrant colors and unique patterns make it a standout piece. The quality is excellent, and I\'ve received numerous compliments every time I wear it. Definitely, a great investment for anyone who loves statement accessories.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(342, 12, 14, 2, 'Unfortunately, I was disappointed with the handwoven scarf. The colors faded after just a few washes, and the fabric lost its original softness. It\'s a beautiful piece initially, but the lack of durability was a letdown.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(343, 12, 15, 5, 'I am in awe of the craftsmanship in this handwoven scarf. The intricate details and high-quality materials make it a standout accessory. It\'s not just a scarf; it\'s a wearable piece of art that enhances any outfit. Highly satisfied!', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(345, 12, 17, 5, 'I adore my handwoven scarf! The color palette is versatile, allowing me to pair it with various outfits. It\'s incredibly soft and comfortable, making it my go-to accessory during the colder months. A definite must-have for fashion enthusiasts!', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(346, 12, 18, 3, 'While the design of the handwoven scarf is nice, I noticed some loose threads that affect its overall durability. It\'s disappointing as I expected better quality for the price. A beautiful piece, but attention to detail is crucial.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(347, 12, 19, 5, 'I\'m thrilled with my purchase of the handwoven scarf! The texture is delightful, and the scarf is surprisingly lightweight yet incredibly warm. It\'s become my favorite winter accessory, and I can\'t recommend it enough.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(348, 12, 20, 4, 'The handwoven scarf is a versatile addition to my wardrobe. It drapes beautifully and adds a touch of sophistication to any outfit. My only suggestion would be to offer more color options to cater to different preferences.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(349, 12, 32, 1, 'Regrettably, the handwoven scarf didn\'t meet my expectations. The colors faded significantly after the first wash, and the fabric lost its softness. It\'s not worth the price considering the lack of durability. Disappointed with the overall quality.', '2023-12-04 21:05:18', '2023-12-04 21:05:18'),
(350, 13, 14, 4, 'These scented candles are a delightful addition to my relaxation routine. The soothing aroma fills the room, creating a calming atmosphere. While the scent is fantastic, I wish the candles burned a bit longer. Still, a lovely product for winding down after a hectic day.', '2023-12-04 21:07:03', '2023-12-04 21:07:03'),
(351, 13, 18, 3, 'The scent of these candles is pleasant, but I found it to be a bit overpowering. The natural ingredients are a plus, but the fragrance intensity might be too much for some. The quality is good, but I\'d prefer a milder option for a more subtle ambiance.', '2023-12-04 21:07:03', '2023-12-04 21:07:03'),
(352, 13, 25, 5, 'These artisanal scented candles exceeded my expectations. The fragrance is divine, not too strong, and the natural ingredients are a big selling point for me. They burn evenly, and the packaging is elegant. Perfect for creating a cozy and inviting atmosphere.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(353, 13, 28, 2, 'Unfortunately, these candles didn\'t live up to the hype. The scent is barely noticeable, and they burn unevenly. The natural ingredients didn\'t seem to make a significant difference. Disappointed with the overall quality; there are better options available.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(354, 13, 16, 5, 'These candles are a game-changer! The natural ingredients create a pure and refreshing scent that instantly lifts my mood. The packaging is chic, and they burn for an extended period. A must-have for anyone looking to enhance their home with a touch of luxury.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(355, 13, 30, 3, 'These candles have a unique fragrance, but it\'s not my personal favorite. The natural ingredients are a plus, but the scent doesn\'t align with my preferences. The burn time is decent, though. It\'s all about individual taste when it comes to these candles.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(356, 13, 12, 4, 'I\'m impressed with the quality of these candles. The natural ingredients ensure a clean burn, and the scent is invigorating. However, the price point is a bit high compared to similar products on the market. Nevertheless, a solid choice for those who prioritize natural ingredients.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(357, 13, 29, 5, 'These scented candles are a true gem! The natural ingredients make a noticeable difference in the purity of the fragrance. The packaging is elegant, and the burn time is exceptional. I\'m a repeat customer and highly recommend these candles for a luxurious sensory experience.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(358, 13, 19, 2, 'I had high hopes for these candles, but I was disappointed. The scent is too faint, and they burn out quickly. The promise of natural ingredients didn\'t translate into a memorable experience. I won\'t be purchasing these candles again.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(359, 13, 31, 4, 'These candles strike a good balance between fragrance and subtlety. The natural ingredients are a plus, and they burn evenly. While the scent is enjoyable, it could be a touch stronger for those who prefer a more pronounced aroma. Overall, a solid choice.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(360, 13, 20, 5, 'These candles are a sensory delight! The natural ingredients create a pure, refreshing scent that permeates the room. The burn time is impressive, and the packaging is visually appealing. I\'m thoroughly satisfied with this purchase and will be buying more.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(361, 13, 26, 3, 'The candles are decent, but the fragrance is a bit too overpowering for my taste. The burn time is satisfactory, and the natural ingredients are appreciated. It\'s a matter of personal preference, so if you enjoy stronger scents, these might be perfect for you.', '2023-12-04 21:07:04', '2023-12-04 21:07:04'),
(362, 14, 10, 4, 'The abstract canvas art exceeded my expectations in terms of vibrant colors and unique design. It effortlessly transformed the ambiance of my living room. However, the canvas could be a bit sturdier for long-term durability.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(363, 14, 11, 2, 'Disappointed with the purchase. The colors in the picture online are much brighter than in reality. The quality of the canvas is mediocre, and the overall impression is not as captivating as I had hoped.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(364, 14, 12, 5, 'This canvas art is a true masterpiece! The colors blend seamlessly, creating a captivating and lively atmosphere. It\'s the perfect addition to my home decor, and I couldn\'t be happier with this purchase.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(365, 14, 13, 3, 'The abstract canvas art is decent, but the packaging could be improved. The edges arrived slightly damaged, impacting the overall presentation. Otherwise, the colors and design are as expected.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(366, 14, 14, 5, 'Absolutely in love with this canvas art! It effortlessly brings life and character to my bedroom. The quality is superb, and the attention to detail is commendable. Highly recommend to anyone looking for a statement piece.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(367, 14, 15, 2, 'Not satisfied with the purchase. The canvas arrived with noticeable creases, and the colors looked faded. The quality does not match the price point, and I expected better packaging to prevent damage.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(368, 14, 16, 4, 'The abstract canvas art is a fantastic addition to my home. The colors are vibrant, and the design is eye-catching. The only drawback is that the hanging hardware provided was a bit flimsy.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(369, 14, 17, 5, 'This hand-painted canvas art is a true work of art. The intricate details and bold colors make it a focal point in my living room. The quality is exceptional, and it arrived well-packaged and in perfect condition.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(370, 14, 18, 3, 'The canvas art is decent, but the colors are not as vibrant as I expected. It adds a subtle touch to my room, but I wish it had more pop. The quality is acceptable for the price.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(371, 14, 19, 5, 'Absolutely stunning! This canvas art exceeded my expectations. The colors are rich, and the abstract design adds a modern touch to my home. It\'s a conversation starter, and I couldn\'t be happier.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(372, 14, 20, 1, 'Extremely disappointed with the purchase. The canvas arrived with visible scratches and the colors were dull. The quality is far below what was advertised, and I regret buying it.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(373, 14, 32, 4, 'The canvas art is a great addition to my office space. The colors are vibrant, and the abstract design sparks creativity. However, the price seems a bit high for the size of the artwork.', '2023-12-04 21:08:47', '2023-12-04 21:08:47'),
(374, 4, 10, 4, 'Beautifully crafted and perfect for salads. Just wish it was a bit larger.', '2023-12-04 21:12:24', '2023-12-04 21:12:24'),
(375, 4, 11, 5, 'Absolutely love this bowl! It\'s a work of art and functional too.', '2023-12-04 21:12:24', '2023-12-04 21:12:24'),
(376, 4, 12, 3, 'Good quality, but the color is a bit different than what I expected.', '2023-12-04 21:12:24', '2023-12-04 21:12:24'),
(377, 4, 13, 5, 'Perfect centerpiece for my dining table. Everyone compliments it.', '2023-12-04 21:12:24', '2023-12-04 21:12:24'),
(378, 4, 14, 4, 'Sturdy and well-made, but requires careful maintenance.', '2023-12-04 21:12:24', '2023-12-04 21:12:24'),
(379, 17, 15, 4, 'Great rustic look, but a bit heavier than I anticipated.', '2023-12-04 21:12:32', '2023-12-04 21:12:32'),
(380, 17, 16, 5, 'This tray is just stunning and adds charm to our brunches.', '2023-12-04 21:12:32', '2023-12-04 21:12:32'),
(381, 17, 17, 3, 'Looks good, but not as smooth as I\'d like. Be careful of splinters.', '2023-12-04 21:12:32', '2023-12-04 21:12:32'),
(382, 17, 18, 5, 'A perfect mix of rustic and elegance. Very durable!', '2023-12-04 21:12:32', '2023-12-04 21:12:32'),
(383, 17, 19, 2, 'The tray is okay, but it arrived with a small crack on the side.', '2023-12-04 21:12:32', '2023-12-04 21:12:32'),
(384, 18, 20, 5, 'Superb quality and finish. Protects my table perfectly.', '2023-12-04 21:12:37', '2023-12-04 21:12:37'),
(385, 18, 21, 3, 'Functional, but one of the coasters is not level.', '2023-12-04 21:12:37', '2023-12-04 21:12:37'),
(386, 18, 22, 5, 'Elegant and durable. They look great on my coffee table.', '2023-12-04 21:12:37', '2023-12-04 21:12:37'),
(387, 18, 23, 4, 'Love the design, but they are a bit thinner than I expected.', '2023-12-04 21:12:37', '2023-12-04 21:12:37'),
(388, 18, 24, 2, 'Nice looking but started to warp after a few uses.', '2023-12-04 21:12:37', '2023-12-04 21:12:37'),
(389, 19, 25, 5, 'Gorgeous frame, it really highlights the picture inside.', '2023-12-04 21:13:48', '2023-12-04 21:13:48'),
(390, 19, 26, 4, 'Beautiful craftsmanship, but the hanging mechanism is a bit flimsy.', '2023-12-04 21:13:48', '2023-12-04 21:13:48'),
(391, 19, 27, 3, 'Okay, but the color is darker than shown in the pictures.', '2023-12-04 21:13:48', '2023-12-04 21:13:48'),
(392, 19, 28, 4, 'Lovely detail in the carving. A real artisan product.', '2023-12-04 21:13:48', '2023-12-04 21:13:48'),
(393, 19, 29, 5, 'This frame added such a warm, rustic touch to my room.', '2023-12-04 21:13:48', '2023-12-04 21:13:48'),
(394, 11, 30, 5, 'A timeless piece. The leather quality is top-notch.', '2023-12-04 21:14:01', '2023-12-04 21:14:01'),
(395, 11, 31, 4, 'Stylish and functional, though a bit tight for all my cards.', '2023-12-04 21:14:01', '2023-12-04 21:14:01'),
(396, 11, 32, 2, 'Looks good but started to show wear quite quickly.', '2023-12-04 21:14:01', '2023-12-04 21:14:01'),
(397, 11, 10, 5, 'Perfect size, great material. Feels like it will last a lifetime.', '2023-12-04 21:14:01', '2023-12-04 21:14:01'),
(398, 11, 11, 3, 'Decent wallet, but not as many compartments as I\'d like.', '2023-12-04 21:14:01', '2023-12-04 21:14:01'),
(399, 12, 12, 4, 'Beautifully woven and warm. A bit scratchy, though.', '2023-12-04 21:14:08', '2023-12-04 21:14:08'),
(400, 12, 13, 5, 'Absolutely gorgeous scarf, the craftsmanship is excellent.', '2023-12-04 21:14:08', '2023-12-04 21:14:08'),
(401, 12, 14, 3, 'Nice pattern, but the colors were not as vibrant as in the photo.', '2023-12-04 21:14:08', '2023-12-04 21:14:08'),
(402, 12, 15, 5, 'Perfect for chilly days, very cozy and stylish.', '2023-12-04 21:14:08', '2023-12-04 21:14:08'),
(404, 20, 17, 5, 'High-quality leather and stitching. Fits perfectly.', '2023-12-04 21:14:31', '2023-12-04 21:14:31'),
(405, 20, 18, 3, 'Looks good, but the buckle feels a bit flimsy.', '2023-12-04 21:14:31', '2023-12-04 21:14:31'),
(406, 20, 19, 5, 'This belt is exceptional. The attention to detail is evident.', '2023-12-04 21:14:31', '2023-12-04 21:14:31'),
(407, 20, 20, 4, 'Durable and stylish, though it took some time to break in.', '2023-12-04 21:14:31', '2023-12-04 21:14:31'),
(408, 20, 21, 1, 'Not very comfortable, and the color started fading quickly.', '2023-12-04 21:14:31', '2023-12-04 21:14:31'),
(409, 17, 21, 5, 'Very Cool!', '2023-12-04 20:31:15', '2023-12-04 20:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `buyer_id`, `product_id`, `quantity`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, 11, 1, 29.99, 'sent', '2023-11-21 19:29:02', '2023-11-22 16:56:00'),
(11, 1, 12, 1, 34.99, 'sent', '2023-11-21 20:06:24', '2023-11-23 12:17:08'),
(12, 1, 11, 1, 29.99, 'sent', '2023-11-22 11:20:56', '2023-11-23 12:12:48'),
(13, 1, 12, 1, 34.99, 'sent', '2023-11-22 11:20:56', '2023-11-22 15:15:48'),
(14, 1, 22, 1, 27.99, 'sent', '2023-11-22 11:20:56', '2023-11-22 15:14:15'),
(15, 1, 27, 2, 120.00, 'sent', '2023-11-22 17:18:51', '2023-11-22 17:19:34'),
(16, 16, 17, 1, 39.99, 'sent', '2023-11-23 15:51:47', '2023-11-27 08:07:12'),
(17, 16, 27, 1, 60.00, 'pending', '2023-11-23 16:08:06', '2023-11-23 16:08:06'),
(18, 16, 24, 1, 24.99, 'pending', '2023-11-23 16:10:14', '2023-11-23 16:10:14'),
(19, 16, 25, 1, 55.00, 'pending', '2023-11-23 16:13:11', '2023-11-23 16:13:11'),
(20, 1, 12, 1, 34.99, 'sent', '2023-11-24 17:45:13', '2023-11-25 09:05:55'),
(21, 1, 25, 1, 55.00, 'pending', '2023-11-24 17:58:56', '2023-11-24 17:58:56'),
(22, 1, 15, 1, 49.99, 'pending', '2023-11-24 18:00:19', '2023-11-24 18:00:19'),
(23, 1, 29, 1, 49.99, 'pending', '2023-11-24 18:12:39', '2023-11-24 18:12:39'),
(24, 1, 29, 1, 49.99, 'pending', '2023-11-24 18:46:22', '2023-11-24 18:46:22'),
(25, 1, 16, 1, 24.99, 'pending', '2023-11-24 18:46:39', '2023-11-24 18:46:39'),
(26, 1, 11, 1, 29.99, 'pending', '2023-11-24 18:47:25', '2023-11-24 18:47:25'),
(28, 1, 12, 1, 34.99, 'pending', '2023-11-24 19:00:02', '2023-11-24 19:00:02'),
(29, 1, 13, 1, 19.99, 'pending', '2023-11-24 19:27:14', '2023-11-24 19:27:14'),
(30, 1, 14, 1, 89.99, 'pending', '2023-11-24 19:34:50', '2023-11-24 19:34:50'),
(31, 1, 15, 1, 49.99, 'pending', '2023-11-24 19:34:50', '2023-11-24 19:34:50'),
(32, 1, 20, 1, 35.99, 'pending', '2023-11-24 19:38:48', '2023-11-24 19:38:48'),
(33, 1, 28, 1, 12.99, 'pending', '2023-11-25 09:28:03', '2023-11-25 09:28:03'),
(36, 1, 13, 1, 19.99, 'pending', '2023-11-25 16:26:47', '2023-11-25 16:26:47'),
(37, 1, 29, 1, 49.99, 'pending', '2023-11-25 16:59:27', '2023-11-25 16:59:27'),
(38, 1, 14, 1, 89.99, 'pending', '2023-11-27 08:10:43', '2023-11-27 08:10:43'),
(39, 1, 11, 1, 29.99, 'sent', '2023-11-29 16:03:18', '2023-11-29 16:04:35'),
(40, 1, 12, 1, 34.99, 'sent', '2023-11-29 16:03:18', '2023-11-29 16:04:37'),
(41, 1, 16, 1, 24.99, 'pending', '2023-11-30 13:40:00', '2023-11-30 13:40:00'),
(42, 1, 16, 1, 24.99, 'pending', '2023-11-30 13:42:05', '2023-11-30 13:42:05'),
(43, 1, 16, 1, 24.99, 'pending', '2023-11-30 13:45:39', '2023-11-30 13:45:39'),
(44, 1, 16, 1, 24.99, 'pending', '2023-11-30 13:46:27', '2023-11-30 13:46:27'),
(45, 1, 13, 1, 19.99, 'pending', '2023-11-30 13:47:30', '2023-11-30 13:47:30'),
(46, 1, 13, 1, 19.99, 'pending', '2023-11-30 13:49:31', '2023-11-30 13:49:31'),
(47, 1, 22, 1, 27.99, 'pending', '2023-11-30 17:37:12', '2023-11-30 17:37:12'),
(48, 1, 13, 1, 19.99, 'pending', '2023-11-30 17:37:12', '2023-11-30 17:37:12'),
(49, 1, 11, 1, 29.99, 'pending', '2023-11-30 18:09:52', '2023-11-30 18:09:52'),
(50, 1, 20, 1, 35.99, 'pending', '2023-11-30 18:41:19', '2023-11-30 18:41:19'),
(51, 1, 28, 2, 25.98, 'pending', '2023-11-30 18:46:29', '2023-11-30 18:46:29'),
(52, 1, 21, 1, 40.00, 'pending', '2023-11-30 18:52:30', '2023-11-30 18:52:30'),
(53, 1, 25, 1, 55.00, 'pending', '2023-11-30 19:01:44', '2023-11-30 19:01:44'),
(54, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:06:15', '2023-11-30 19:06:15'),
(55, 1, 14, 1, 89.99, 'pending', '2023-11-30 19:10:08', '2023-11-30 19:10:08'),
(56, 1, 15, 1, 49.99, 'pending', '2023-11-30 19:10:08', '2023-11-30 19:10:08'),
(57, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:11:21', '2023-11-30 19:11:21'),
(58, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:16:04', '2023-11-30 19:16:04'),
(59, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:21:23', '2023-11-30 19:21:23'),
(60, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:22:46', '2023-11-30 19:22:46'),
(61, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:26:22', '2023-11-30 19:26:22'),
(62, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:29:01', '2023-11-30 19:29:01'),
(63, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:35:47', '2023-11-30 19:35:47'),
(64, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:37:39', '2023-11-30 19:37:39'),
(65, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:42:16', '2023-11-30 19:42:16'),
(66, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:52:32', '2023-11-30 19:52:32'),
(67, 1, 11, 1, 29.99, 'pending', '2023-11-30 19:56:01', '2023-11-30 19:56:01'),
(68, 1, 12, 1, 34.99, 'pending', '2023-12-01 15:59:07', '2023-12-01 15:59:07'),
(69, 1, 14, 1, 89.99, 'pending', '2023-12-01 16:10:49', '2023-12-01 16:10:49'),
(70, 1, 20, 1, 48.98, 'pending', '2023-12-01 16:34:33', '2023-12-01 16:34:33'),
(71, 1, 21, 1, 52.99, 'pending', '2023-12-01 16:34:33', '2023-12-01 16:34:33'),
(72, 1, 23, 1, 69.99, 'pending', '2023-12-01 16:41:04', '2023-12-01 16:41:04'),
(73, 1, 22, 1, 27.99, 'pending', '2023-12-01 16:41:04', '2023-12-01 16:41:04'),
(74, 1, 26, 1, 32.99, 'pending', '2023-12-01 16:50:03', '2023-12-01 16:50:03'),
(75, 1, 27, 1, 60.00, 'pending', '2023-12-01 16:50:03', '2023-12-01 16:50:03'),
(76, 1, 11, 1, 29.99, 'sent', '2023-12-01 20:04:03', '2023-12-02 17:47:09'),
(77, 1, 20, 4, 143.96, 'pending', '2023-12-04 07:48:28', '2023-12-04 07:48:28');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isArtisan` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `isArtisan`) VALUES
(1, 'Seweryn Czabanowski', 'seweryn_cz@outlook.com', NULL, '$2y$12$Lx4yjybUIz9Bfs.L/Ssfzu.evzsjd1ypIo970xrpj.US63kRCh8Qq', 'Lj2n8Kd6HhakJYugqL3zanEdsduJIF1yzVkDazvPI8f8hzXP5tBgqPAUGPL7', '2023-11-01 14:07:21', '2023-11-01 14:07:21', 1),
(10, 'John Doe', 'john@example.com', NULL, '$2y$12$fR.GGqbu9X196vY4xfFuS.rCaHzMmVt8Z95.c81BrW8mYZbC/BbmK', NULL, '2023-11-01 16:34:34', '2023-11-01 16:34:34', 0),
(11, 'Some Guy', 'someguy@email.com', NULL, '$2y$12$RuNqNdgbeYT5qSPWD5HH9.88AoMYPLJFARWVo1fnkr.ofvDxaa.pi', NULL, '2023-11-09 15:02:29', '2023-11-09 15:02:29', 0),
(12, 'Alice Smith', 'alice.smith@example.com', NULL, '$2y$12$RaeQYYWYlLw.hUrQRFQT5eS3q6sAOJupNzuVScycy7FH6dbu7fy0W', NULL, '2023-11-12 09:35:24', '2023-11-12 09:35:24', 0),
(13, 'Bob Johnson', 'bob.johnson@example.com', NULL, '$2y$12$0QTfm9rDLmJQ9dffh7hjnuR4gbEGUrU4SSTzb7LqiHuPRJCiJKMcO', NULL, '2023-11-12 09:35:24', '2023-11-12 09:35:24', 0),
(14, 'Charlie Williams', 'charlie.williams@example.com', NULL, '$2y$12$5Y8pFpUR0/r/1Sf/AM2/gOG/O3RGaCtbeOse5QDKLJYZ1vaRE.3OK', NULL, '2023-11-12 09:35:25', '2023-11-12 09:35:25', 0),
(15, 'Diana Brown', 'diana.brown@example.com', NULL, '$2y$12$O8sdj8oCnVn5DH6J7BMQKeFX7Ojse6AEgzMe2eG7reDyAt8xah0Uq', NULL, '2023-11-12 09:35:26', '2023-11-12 09:35:26', 0),
(16, 'Ethan Jones', 'ethan.jones@example.com', NULL, '$2y$12$Jptd18jPEK9UyoyBbc2EaOC.Bk0QQAIhzVZFs5k5vOhAzBXo55VgG', NULL, '2023-11-12 09:35:27', '2023-11-12 09:35:27', 1),
(17, 'Fiona Garcia', 'fiona.garcia@example.com', NULL, '$2y$12$qRNdId.NYA/D3jS5sGHN1OMbbmUlKiRDdZZ7eSWwJhbUWYslQZSky', NULL, '2023-11-12 09:35:27', '2023-11-12 09:35:27', 0),
(18, 'George Miller', 'george.miller@example.com', NULL, '$2y$12$4SY2cDgv2YoEq7jJpH2WUOzySFFbiUs8OHiM9bQpdg8WSkSY.SGTG', NULL, '2023-11-12 09:35:28', '2023-11-12 09:35:28', 0),
(19, 'Hannah Davis', 'hannah.davis@example.com', NULL, '$2y$12$0OMA73Mdn58p5dSDeGhSDeEemLxvsd6J5Tx/4c/Q9BSYhS3BteKfu', NULL, '2023-11-12 09:35:28', '2023-11-12 09:35:28', 0),
(20, 'Ian Rodriguez', 'ian.rodriguez@example.com', NULL, '$2y$12$8HpgkgvHEzXKbkDfUT4kAenz5cm0bjNOGkNpttEFGR.2Z3I//N5ly', NULL, '2023-11-12 09:35:29', '2023-11-12 09:35:29', 0),
(21, 'Julia Martinez', 'julia.martinez@example.com', NULL, '$2y$12$UxmaUmhKogV0laLZ5qTjn.4u66RaiKbjc0KShAo7O7nUmZZf2q5h2', NULL, '2023-11-12 09:35:30', '2023-11-12 09:35:30', 1),
(22, 'Kevin Hernandez', 'kevin.hernandez@example.com', NULL, '$2y$12$eugbvKUWnr7jCfrRZSjSmudCUVDx21dbmLr1xneeaf2R8HEZK6bhO', NULL, '2023-11-12 09:35:31', '2023-11-12 09:35:31', 0),
(23, 'Luna Lopez', 'luna.lopez@example.com', NULL, '$2y$12$C8Txdt.ScW7nhnFgyqJvse27mdS9WPRKJmRGTS1QkW4/VSrMHi4LG', NULL, '2023-11-12 09:35:31', '2023-11-12 09:35:31', 0),
(24, 'Max Gonzalez', 'max.gonzalez@example.com', NULL, '$2y$12$CLa5VyCeWkXgMp.VD/K7PeV1Pyoapc6BU8fe5GtMVbdtvAixeTt/a', NULL, '2023-11-12 09:35:32', '2023-11-12 09:35:32', 0),
(25, 'Nora Wilson', 'nora.wilson@example.com', NULL, '$2y$12$Kv.o83tvLz03DZtv7hLo4Oc7htYF6PRgaW6V7UH4dU3867JHzitaC', NULL, '2023-11-12 09:35:32', '2023-11-12 09:35:32', 0),
(26, 'Oscar Anderson', 'oscar.anderson@example.com', NULL, '$2y$12$lqkaVLPeCbtR7ny9SDUOf.grf2KCqGEP4aWYxuk6bydloNwngnKJ6', NULL, '2023-11-12 09:35:33', '2023-11-12 09:35:33', 0),
(27, 'Penny Thomas', 'penny.thomas@example.com', NULL, '$2y$12$ycDrVzVkWO0oV7DajCLKA./DUfOBo0MjeENJPXV5gTwBInYUjjjPm', NULL, '2023-11-12 09:35:33', '2023-11-12 09:35:33', 1),
(28, 'Quinn Taylor', 'quinn.taylor@example.com', NULL, '$2y$12$xToDSr/8WvP43l4vVPBgXelbcXHOLAlS6iLoO892i3MasXyDKivau', NULL, '2023-11-12 09:35:34', '2023-11-12 09:35:34', 0),
(29, 'Ryan Moore', 'ryan.moore@example.com', NULL, '$2y$12$SD3DimREtQFPo6gKVT.eV.xpEboqMYobIm39Z5m2rj1ykTKH5CtSa', NULL, '2023-11-12 09:35:34', '2023-11-12 09:35:34', 0),
(30, 'Sophia Jackson', 'sophia.jackson@example.com', NULL, '$2y$12$6fntDq24ad4dqVLH1Yv2v.tu6Ad34fYra0R/jGagr6yPF1OKUvic.', NULL, '2023-11-12 09:35:35', '2023-11-12 09:35:35', 0),
(31, 'Tyler Martin', 'tyler.martin@example.com', NULL, '$2y$12$ayy0qBTOtfn5b.kpeEZvT.rm73nHdPns1Kk2z7nAUmuuGQJ8o5.Ou', NULL, '2023-11-12 09:35:35', '2023-11-12 09:35:35', 0),
(32, 'Emily Thornton', 'emily.thornton@example.com', NULL, '$2y$12$UttJkr6bniMZTVXGZxBiJuBDsskrf5w5vBznRSL2VL.ytYWVHkonS', NULL, '2023-11-23 16:21:19', '2023-11-23 16:21:19', 0),
(33, 'Bob Dome', 'bob.dome@example.com', NULL, '$2y$12$Q50w3LuqzZU17I7lRMKV5eM385le4rj1ZvzM7H4kcWWo09z2qcGm6', NULL, '2023-11-29 13:27:43', '2023-11-29 13:27:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bio` longtext DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `bio`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 33, NULL, NULL, '2023-11-29 13:27:43', '2023-11-29 13:27:43'),
(2, 1, 'Just a guy that loves turtles a bit too much :)', 'profile_pictures/profile_1701762719.webp', '2023-11-29 17:43:19', '2023-12-05 07:28:32'),
(3, 10, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(4, 11, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(5, 12, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(6, 13, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(7, 14, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(8, 15, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(9, 16, 'Hello! I\'m Ethan Jones, and this is my arena of innovation where functionality meets art. Growing up in a tech-savvy environment, I was always fascinated by the fusion of technology and traditional art forms. My creations are designed not just to please the eye but to serve a purpose in your daily life. From tech-inspired home gadgets to sleek, minimalist accessories, each item reflects a blend of modern aesthetics and practical design. Dive into my collection and discover how art can be both beautiful and useful. Thanks for visiting, and enjoy exploring!', 'profile_pictures/profile_1701725350.webp', '2023-11-29 17:43:19', '2023-12-04 20:29:10'),
(10, 17, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(11, 18, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(12, 19, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(13, 20, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(14, 21, 'Hi there! I\'m Julia Martinez. Welcome to my creative corner where each item is a testament to my love for detailed, precision crafting. My journey as an artist began in the bustling city, surrounded by vibrant cultures and diverse inspirations. Specializing in contemporary designs with a touch of traditional flair, my work aims to blend the old with the new. Whether it\'s home decor or personalized gifts, I strive to infuse a sense of warmth and personality into every piece. Thank you for stopping by, and I hope my creations resonate with your own style and story!', 'profile_pictures/profile_1701725425.webp', '2023-11-29 17:43:19', '2023-12-04 20:30:25'),
(15, 22, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(16, 23, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(17, 24, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(18, 25, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(19, 26, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(20, 27, 'Hello! I\'m Penny Thomas, the heart and hands behind the unique creations you see here. My journey in crafting began as a small-town hobby, turning everyday items into little treasures. I\'m deeply inspired by the beauty of nature and the charm of vintage styles, infusing these elements into each piece I make. My creations are more than just items; they\'re a piece of my world, lovingly crafted to add a special touch to yours. Welcome to my shop – I hope you find something that speaks to you! 🌟', 'profile_pictures/profile_1701724744.webp', '2023-11-29 17:43:19', '2023-12-04 20:24:35'),
(21, 28, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(22, 29, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(23, 30, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(24, 31, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19'),
(25, 32, NULL, NULL, '2023-11-29 17:43:19', '2023-11-29 17:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyers_transaction_fk` (`transaction_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyers`
--
ALTER TABLE `buyers`
  ADD CONSTRAINT `buyers_transaction_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
