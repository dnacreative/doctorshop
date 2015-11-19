-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2015 at 09:02 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `waterfall`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adele', '21'),
(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 'Gotye', 'Making  Mirrors');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SmartPhones', '2014-04-14 00:38:38', '2014-04-14 00:38:38'),
(2, 'Tablets', '2014-04-14 00:39:00', '2014-04-14 00:39:00'),
(3, 'Laptops', '2014-04-14 00:39:10', '2014-04-14 00:39:10'),
(4, 'Desktops', '2014-04-14 00:39:42', '2014-04-14 00:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE IF NOT EXISTS `credit_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `credit_cards_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `user_id`, `number`, `created_at`, `updated_at`) VALUES
(1, 11, '1234123412341234', '2014-04-13 21:41:00', '2014-04-13 22:12:28'),
(2, 12, '1111222233334444', '2014-04-13 22:13:00', '2014-04-13 22:13:00'),
(3, 13, '1122334455667788', '2014-04-13 22:57:20', '2014-04-13 22:57:20'),
(4, 14, '1234567890123456', '2014-09-01 05:44:15', '2014-09-01 05:44:15'),
(5, 15, '1234567890123456', '2015-09-02 08:32:04', '2015-09-02 08:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_11_085115_create_users_table', 1),
('2014_04_14_015625_create_credit_cards_table', 2),
('2014_04_14_021246_create_categories_and_products_table', 3),
('2014_04_14_021705_create_product_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lenovo A680', '4190.00', '2014-04-14 03:04:47', '2014-04-14 03:21:55'),
(2, 1, 'Huawei Ascend Y600', '3990.00', '2014-04-14 03:30:55', '2014-04-14 03:30:55'),
(3, 1, 'i-mobile IQ X SLIM', '7490.00', '2014-04-14 03:32:30', '2014-04-14 03:32:30'),
(4, 1, 'Nokia Asha 230', '1990.00', '2014-04-14 03:34:06', '2014-04-14 03:34:06'),
(5, 1, 'Samsung Galaxy S Duos', '4990.00', '2014-04-14 03:34:49', '2014-04-14 04:07:14'),
(6, 2, 'Acer Iconia B1', '4190.00', '2014-04-14 04:00:54', '2014-04-14 04:00:54'),
(7, 2, 'SONY Xperia Tablet Z2', '12990.00', '2014-04-14 04:02:30', '2014-04-14 04:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_user_user_id_foreign` (`user_id`),
  KEY `product_user_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 15, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 15, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `real_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test@test.com', 'Test Account', 'test', '2014-04-11 07:09:04', '2014-04-11 07:09:04'),
(2, 'test2@test.com', 'Test Account 2', 'test', '2014-04-11 07:46:51', '2014-04-11 07:46:51'),
(3, 'test3@test.com', 'Test Account 3', 'test', '2014-04-11 07:46:59', '2014-04-11 07:46:59'),
(4, 'test4@test.com', 'Test Account 4', 'test', '2014-04-11 07:47:07', '2014-04-11 07:47:07'),
(5, 'test5@test.com', 'Test Account 5', 'test', '2014-04-11 07:47:15', '2014-04-11 07:47:15'),
(8, 'test8@test.com', 'Test Account 8', '$2y$10$OOSsw7p/pE35sD2mPBZn5u3j4gFfihpVvR9MyYJ/9Ke0XF2ybQJti', '2014-04-11 08:32:04', '2014-04-11 21:44:02'),
(9, 'test9@test.com', 'Test Account 9', '$2y$10$uxa7Zv6a9JwCDggjkHnY8.Hkts.twnAe/PU5T/LEtTT3Lm05i87b6', '2014-04-12 22:39:28', '2014-04-12 22:39:28'),
(10, 'test10@test.com', 'Tester Account 10', '$2y$10$G4jOP0SjQBR4EbXDyXFTjeBBt5O7Uq8kCaOIkg3tw8xYWS0WP5Dcu', '2014-04-13 02:29:03', '2014-04-13 02:36:12'),
(11, 'test13@test.com', 'Test Account 13', '$2y$10$dMe.ZxsZ4Unl2wHhZBWjF.8shq85f5N0NJtDKvVYmJlbQnC2kRdeW', '2014-04-13 21:41:00', '2014-04-13 21:41:00'),
(12, 'test14@test.com', 'Test Account 14', '$2y$10$FBgfkzcSW5VolTpD7kOHd.qlpZkGUd/iRaKyuL6/tynON8HU4NJ4.', '2014-04-13 22:13:00', '2014-04-13 22:13:00'),
(13, 'test15@test.com', 'Test Account 15', '$2y$10$sBF8vbgfgv3lQqKkaZFvmOmBXAltfsdx28QIyzeXCTv7d30btNLtO', '2014-04-13 22:57:20', '2014-04-13 22:57:20'),
(14, 'clock@test.com', 'Clock Up', '$2y$10$gaGQUfZnbXLCtbQY8E5ooeTt0YujmAvdCL2psQLmfN6xWSkRoqFNm', '2014-09-01 05:44:15', '2014-09-01 05:44:15'),
(15, 'test20@example.com', 'Test Account 20', '$2y$10$KqlG3zPMB93c4e23L0Jaj.bFl5s3klnVCLG9dwjSn3kp0cvunDj.K', '2015-09-02 08:32:04', '2015-09-02 08:32:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `credit_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
