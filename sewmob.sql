-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2024 at 08:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewmob`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `cars_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cars_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cars_nopol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cars_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `cars_description` text COLLATE utf8mb4_unicode_ci,
  `cars_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `cars_model`, `cars_brand`, `cars_nopol`, `cars_image`, `category_id`, `cars_description`, `cars_price`, `created_at`, `updated_at`) VALUES
(1, 'Hatchback Model', 'Hatchback Brand', 'AB 1234 CD', 'https://via.placeholder.com/150', 1, 'Hatchback Description', 100000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(2, 'Sedan Model', 'Sedan Brand', 'CD 1234 EF', 'https://via.placeholder.com/150', 2, 'Sedan Description', 200000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(3, 'SUV Model', 'SUV Brand', 'EF 1234 GH', 'https://via.placeholder.com/150', 3, 'SUV Description', 300000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(4, 'MPV Model', 'MPV Brand', 'GH 1234 IJ', 'https://via.placeholder.com/150', 4, 'MPV Description', 400000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(5, 'City Car Model', 'City Car Brand', 'IJ 1234 KL', 'https://via.placeholder.com/150', 5, 'City Car Description', 500000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(6, 'Crossover Model', 'Crossover Brand', 'KL 1234 MN', 'https://via.placeholder.com/150', 6, 'Crossover Description', 600000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(7, 'Pick-up Model', 'Pick-up Brand', 'MN 1234 OP', 'https://via.placeholder.com/150', 7, 'Pick-up Description', 700000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(8, 'Van Model', 'Van Brand', 'OP 1234 QR', 'https://via.placeholder.com/150', 8, 'Van Description', 800000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(9, 'Sport Car Model', 'Sport Car Brand', 'QR 1234 ST', 'https://via.placeholder.com/150', 9, 'Sport Car Description', 900000, '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(10, 'Convertible Model', 'Convertible Brand', 'ST 1234 UV', 'https://via.placeholder.com/150', 10, 'Convertible Description', 1000000, '2024-06-02 12:52:18', '2024-06-02 12:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Hatchback', '2024-06-02 12:52:17', '2024-06-02 12:52:17'),
(2, 'Sedan', '2024-06-02 12:52:17', '2024-06-02 12:52:17'),
(3, 'SUV', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(4, 'MPV', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(5, 'City Car', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(6, 'Crossover', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(7, 'Pick-up', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(8, 'Van', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(9, 'Sport Car', '2024-06-02 12:52:18', '2024-06-02 12:52:18'),
(10, 'Convertible', '2024-06-02 12:52:18', '2024-06-02 12:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_02_000002_create_categories_table', 1),
(6, '2024_06_02_000003_create_cars_table', 1),
(7, '2024_06_02_002603_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_starts` datetime NOT NULL,
  `order_ends` datetime NOT NULL,
  `order_total_price` int NOT NULL,
  `order_total_qty` int NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_duration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `car_id`, `user_id`, `order_starts`, `order_ends`, `order_total_price`, `order_total_qty`, `order_status`, `order_duration`) VALUES
(1, '2024-06-02 13:08:17', '2024-06-02 13:08:17', 4, 1, '2024-06-03 20:08:17', '2024-06-14 20:08:17', 4400000, 1, 'disewa', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telephone`, `license`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daffa admin', 'daffaadmin@gmail.com', NULL, '$2y$12$SQWUsf4MPhB.PUhgpQP9wu2OaZ7z5OiDkBGWelZ/E6HpWM9GS0wly', '08123456789', '123456789', 'Jl. dafa no 1', 'admin', NULL, '2024-06-02 12:52:16', '2024-06-02 12:52:16'),
(2, 'Daffa user', 'daffauser@gmail.com', NULL, '$2y$12$JuC/LdbCTn2aMG3OxHqREelPfoho4AA7qVCzBcd9pIYEZ2rHV.Urq', '08123456789', '123456789', 'Jl. dafa no 2', 'user', NULL, '2024-06-02 12:52:17', '2024-06-02 12:52:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_car_id_foreign` (`car_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
