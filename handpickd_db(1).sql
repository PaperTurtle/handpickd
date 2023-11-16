-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:02 PM
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
(6, 1, 1, 'Dna', 'A string of Dna I found on the floor', 1.99, 0, '2023-11-03 08:22:49', '2023-11-09 15:20:11'),
(11, 16, 3, 'Vintage Leather Wallet', 'A durable and stylish vintage leather wallet.', 29.99, 20, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(12, 16, 4, 'Handwoven Scarf', 'A warm and fashionable handwoven scarf.', 34.99, 7, '2023-11-12 09:41:12', '2023-11-14 18:19:51'),
(13, 21, 5, 'Artisanal Scented Candles', 'Soothing scented candles made with natural ingredients.', 19.99, 30, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(14, 21, 6, 'Hand-painted Canvas Art', 'Abstract canvas art, perfect for decorating any room.', 89.99, 5, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(15, 27, 7, 'Personalized Jewelry Box', 'An elegant, personalized jewelry box for your treasures.', 49.99, 12, '2023-11-12 09:41:12', '2023-11-12 09:41:12'),
(16, 27, 8, 'Custom Engraved Pen', 'A custom engraved pen, ideal for gifts.', 24.99, 20, '2023-11-12 09:41:12', '2023-11-12 09:41:12');

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
  `resized_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `alt_text`, `created_at`, `updated_at`, `resized_image_path`) VALUES
(38, 6, 'product_images/product_1699861564_original.webp', 'A string of Dna I found on the floor', '2023-11-13 06:46:04', '2023-11-13 07:46:52', 'product_images/product_1699861564_resized.webp');

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
(26, 14, 1, 5, 'Cool Product :)', '2023-11-14 12:01:16', '2023-11-15 13:14:31'),
(38, 13, 1, 4, 'Cool', '2023-11-14 19:55:36', '2023-11-15 14:29:15'),
(39, 16, 1, 1, 'Rool', '2023-11-15 16:19:50', '2023-11-15 16:19:50');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
