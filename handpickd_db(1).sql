-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 06:06 PM
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
(4, 1, 1, 'Handmade Wooden Bowl', 'A beautifully carved wooden bowl that serves as a centerpiece.', 59.99, 6, '2023-11-01 16:34:34', '2023-11-09 16:31:53'),
(11, 16, 3, 'Vintage Leather Wallet', 'A durable and stylish vintage leather wallet.', 29.99, 20, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(12, 16, 4, 'Handwoven Scarf', 'A warm and fashionable handwoven scarf.', 34.99, 7, '2023-11-12 09:41:12', '2023-11-14 18:19:51'),
(13, 21, 5, 'Artisanal Scented Candles', 'Soothing scented candles made with natural ingredients.', 19.99, 30, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(14, 21, 6, 'Hand-painted Canvas Art', 'Abstract canvas art, perfect for decorating any room.', 89.99, 5, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(15, 27, 7, 'Personalized Jewelry Box', 'An elegant, personalized jewelry box for your treasures.', 49.99, 12, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(16, 27, 8, 'Custom Engraved Pen', 'A custom engraved pen, ideal for gifts.', 24.99, 20, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(17, 1, 4, 'Rustic Wooden Serving Tray', 'A handcrafted serving tray made from reclaimed wood, perfect for rustic-themed gatherings.', 39.99, 15, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(18, 1, 4, 'Oak Wood Coaster Set', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', 25.00, 25, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(19, 1, 4, 'Carved Wooden Picture Frame', 'An elegantly carved picture frame, suitable for 5x7 inch photos.', 29.50, 20, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(20, 16, 3, 'Hand-Stitched Leather Belt', 'A classic, durable leather belt, hand-stitched for superior quality.', 35.99, 18, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(21, 16, 3, 'Leather Journal Cover', 'A premium leather journal cover, designed to fit standard-sized notebooks.', 40.00, 12, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(22, 16, 3, 'Leather Phone Case', 'A sleek, handcrafted leather phone case.', 27.99, 25, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(23, 16, 3, 'Vintage Leather Satchel', 'A stylish satchel made from high-quality vintage leather.', 69.99, 10, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(24, 21, 10, 'Handcrafted Soap Set', 'A set of four natural, handcrafted soaps made with organic ingredients.', 24.99, 30, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(25, 21, 10, 'Decorative Throw Pillows', 'A pair of hand-sewn throw pillows, featuring vibrant, artistic designs.', 55.00, 15, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(26, 21, 10, 'Ceramic Coffee Mugs', 'A set of two handcrafted ceramic coffee mugs, each with a unique, rustic design.', 32.99, 20, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(27, 27, 1, 'Engraved Wooden Watch', 'A sophisticated wooden watch with a custom engraving option.', 60.00, 15, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(28, 27, 1, 'Personalized Leather Bookmark', 'A sleek leather bookmark, customizable with your choice of initials or a short message.', 12.99, 40, '2023-11-17 13:34:53', '2023-11-17 13:34:53'),
(29, 27, 1, 'Hand-Engraved Decorative Plate', 'A stunning, hand-engraved decorative plate, ideal for display or special occasions.', 49.99, 8, '2023-11-17 13:34:53', '2023-11-17 13:34:53');

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
  `show_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `alt_text`, `created_at`, `updated_at`, `resized_image_path`, `show_image_path`) VALUES
(44, 13, 'product_images/product_1700227257_original.webp', 'Soothing scented candles made with natural ingredients.', '2023-11-17 12:20:57', '2023-11-17 12:20:57', 'product_images/product_1700227257_resized.webp', NULL),
(53, 6, 'product_images/product_1700237697_original.webp', 'A string of Dna I found on the floor', '2023-11-17 15:14:58', '2023-11-17 15:14:58', 'product_images/product_1700237697_resized.webp', 'product_images/product_1700237697_show.webp'),
(54, 4, 'product_images/product_1700237749_original.webp', 'A beautifully carved wooden bowl that serves as a centerpiece.', '2023-11-17 15:15:51', '2023-11-17 15:15:51', 'product_images/product_1700237749_resized.webp', 'product_images/product_1700237749_show.webp'),
(55, 11, 'product_images/product_1700237883_original.webp', 'A durable and stylish vintage leather wallet.', '2023-11-17 15:18:05', '2023-11-17 15:18:05', 'product_images/product_1700237883_resized.webp', 'product_images/product_1700237883_show.webp'),
(56, 12, 'product_images/product_1700237909_original.webp', 'A warm and fashionable handwoven scarf.', '2023-11-17 15:18:30', '2023-11-17 15:18:30', 'product_images/product_1700237909_resized.webp', 'product_images/product_1700237909_show.webp'),
(57, 13, 'product_images/product_1700237975_original.webp', 'Soothing scented candles made with natural ingredients.', '2023-11-17 15:19:37', '2023-11-17 15:19:37', 'product_images/product_1700237975_resized.webp', 'product_images/product_1700237975_show.webp'),
(58, 14, 'product_images/product_1700238001_original.webp', 'Abstract canvas art, perfect for decorating any room.', '2023-11-17 15:20:04', '2023-11-17 15:20:04', 'product_images/product_1700238001_resized.webp', 'product_images/product_1700238001_show.webp'),
(59, 15, 'product_images/product_1700238049_original.webp', 'An elegant, personalized jewelry box for your treasures.', '2023-11-17 15:20:52', '2023-11-17 15:20:52', 'product_images/product_1700238049_resized.webp', 'product_images/product_1700238049_show.webp'),
(60, 16, 'product_images/product_1700238128_original.webp', 'A custom engraved pen, ideal for gifts.', '2023-11-17 15:22:10', '2023-11-17 15:22:10', 'product_images/product_1700238128_resized.webp', 'product_images/product_1700238128_show.webp'),
(61, 17, 'product_images/product_1700238174_original.webp', 'A handcrafted serving tray made from reclaimed wood, perfect for rustic-themed gatherings.', '2023-11-17 15:22:55', '2023-11-17 15:22:55', 'product_images/product_1700238174_resized.webp', 'product_images/product_1700238174_show.webp'),
(62, 18, 'product_images/product_1700238277_original.webp', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', '2023-11-17 15:24:39', '2023-11-17 15:24:39', 'product_images/product_1700238277_resized.webp', 'product_images/product_1700238277_show.webp'),
(63, 18, 'product_images/product_1700238279_original.webp', 'A set of six oak wood coasters, each uniquely grained and finished with a protective coating to resist water stains.', '2023-11-17 15:24:41', '2023-11-17 15:24:41', 'product_images/product_1700238279_resized.webp', 'product_images/product_1700238279_show.webp'),
(64, 19, 'product_images/product_1700238359_original.webp', 'An elegantly carved picture frame, suitable for 5x7 inch photos.', '2023-11-17 15:26:00', '2023-11-17 15:26:00', 'product_images/product_1700238359_resized.webp', 'product_images/product_1700238359_show.webp'),
(65, 20, 'product_images/product_1700238463_original.webp', 'A classic, durable leather belt, hand-stitched for superior quality.', '2023-11-17 15:27:46', '2023-11-17 15:27:46', 'product_images/product_1700238463_resized.webp', 'product_images/product_1700238463_show.webp'),
(66, 21, 'product_images/product_1700238567_original.webp', 'A premium leather journal cover, designed to fit standard-sized notebooks.', '2023-11-17 15:29:29', '2023-11-17 15:29:29', 'product_images/product_1700238567_resized.webp', 'product_images/product_1700238567_show.webp'),
(67, 22, 'product_images/product_1700238607_original.webp', 'A sleek, handcrafted leather phone case.', '2023-11-17 15:30:08', '2023-11-17 15:30:08', 'product_images/product_1700238607_resized.webp', 'product_images/product_1700238607_show.webp'),
(68, 23, 'product_images/product_1700238648_original.webp', 'A stylish satchel made from high-quality vintage leather.', '2023-11-17 15:30:51', '2023-11-17 15:30:51', 'product_images/product_1700238648_resized.webp', 'product_images/product_1700238648_show.webp'),
(69, 24, 'product_images/product_1700238947_original.webp', 'A set of four natural, handcrafted soaps made with organic ingredients.', '2023-11-17 15:35:49', '2023-11-17 15:35:49', 'product_images/product_1700238947_resized.webp', 'product_images/product_1700238947_show.webp'),
(70, 25, 'product_images/product_1700239013_original.webp', 'A pair of hand-sewn throw pillows, featuring vibrant, artistic designs.', '2023-11-17 15:36:55', '2023-11-17 15:36:55', 'product_images/product_1700239013_resized.webp', 'product_images/product_1700239013_show.webp'),
(71, 26, 'product_images/product_1700239310_original.webp', 'A set of two handcrafted ceramic coffee mugs, each with a unique, rustic design.', '2023-11-17 15:41:52', '2023-11-17 15:41:52', 'product_images/product_1700239310_resized.webp', 'product_images/product_1700239310_show.webp'),
(72, 27, 'product_images/product_1700239399_original.webp', 'A sophisticated wooden watch with a custom engraving option.', '2023-11-17 15:43:20', '2023-11-17 15:43:20', 'product_images/product_1700239399_resized.webp', 'product_images/product_1700239399_show.webp'),
(73, 28, 'product_images/product_1700239687_original.webp', 'A sleek leather bookmark, customizable with your choice of initials or a short message.', '2023-11-17 15:48:10', '2023-11-17 15:48:10', 'product_images/product_1700239687_resized.webp', 'product_images/product_1700239687_show.webp'),
(74, 29, 'product_images/product_1700239767_original.webp', 'A stunning, hand-engraved decorative plate, ideal for display or special occasions.', '2023-11-17 15:49:29', '2023-11-17 15:49:29', 'product_images/product_1700239767_resized.webp', 'product_images/product_1700239767_show.webp');

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
(24, 12, 1, 3, 'Very interesting product', '2023-11-14 11:09:44', '2023-11-14 11:09:44'),
(25, 11, 1, 4, 'Very cool item', '2023-11-14 11:32:28', '2023-11-14 11:32:28'),
(26, 14, 1, 5, 'Not so cool product :(', '2023-11-14 12:01:16', '2023-11-17 11:24:26'),
(38, 13, 1, 4, 'Cool', '2023-11-14 19:55:36', '2023-11-15 14:29:15'),
(39, 16, 1, 1, 'Rool', '2023-11-15 16:19:50', '2023-11-15 16:19:50'),
(42, 15, 1, 4, 'Cool Stuff', '2023-11-16 15:15:06', '2023-11-17 11:48:09'),
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
(299, 23, 11, 5, 'I’ve received numerous compliments on this bag. It’s durable and looks even better as it ages.', '2023-11-17 14:07:18', '2023-11-17 14:07:18');

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
(1, 11, 6, 1, 1.99, 'sent', '2023-11-09 15:20:11', '2023-11-09 16:25:53'),
(2, 11, 4, 3, 179.97, 'sent', '2023-11-09 15:20:11', '2023-11-09 16:14:03'),
(3, 11, 4, 1, 59.99, 'sent', '2023-11-09 16:31:53', '2023-11-09 16:32:12'),
(4, 1, 12, 3, 104.97, 'sent', '2023-11-14 18:19:51', '2023-11-14 18:20:19');

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
(1, 'Seweryn Czabanowski', 'seweryn_cz@outlook.com', NULL, '$2y$12$Lx4yjybUIz9Bfs.L/Ssfzu.evzsjd1ypIo970xrpj.US63kRCh8Qq', NULL, '2023-11-01 14:07:21', '2023-11-01 14:07:21', 1),
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
(31, 'Tyler Martin', 'tyler.martin@example.com', NULL, '$2y$12$ayy0qBTOtfn5b.kpeEZvT.rm73nHdPns1Kk2z7nAUmuuGQJ8o5.Ou', NULL, '2023-11-12 09:35:35', '2023-11-12 09:35:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `contact_info` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
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
