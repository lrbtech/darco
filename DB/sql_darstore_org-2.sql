-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2023 at 05:31 AM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_darstore_org`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `employee_id`, `username`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_image`, `role_id`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', NULL, NULL, 'admin@gmail.com', NULL, '$2y$10$n2xE3AG57lCPJ4bRKPBSAO.m.5rhwGm6/MPW2RdMR55s7OED9lY0e', NULL, NULL, '1', 'english', '0', NULL, '2022-11-25 16:28:33'),
(2, NULL, 'prasanth', NULL, NULL, 'prasanthats@gmail.com', NULL, '$2y$10$femyDNG67zowJkj4S29Bj.4RMXrXJSe4vgiZ9ZhQ8bW/03uoJMI5q', NULL, NULL, '1', 'english', '0', '2023-06-14 13:46:26', '2023-06-14 13:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `app_carts`
--

CREATE TABLE `app_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_carts`
--

INSERT INTO `app_carts` (`id`, `customer_id`, `vendor_id`, `product_id`, `product_name`, `qty`, `price`, `total`, `image`, `status`, `created_at`, `updated_at`) VALUES
(31, '1', '2', '5', NULL, '1', '0', '0', NULL, '0', '2023-05-19 03:59:40', '2023-05-19 03:59:40'),
(32, '1', '1', '2', NULL, '1', '0', '0', NULL, '0', '2023-07-18 05:24:00', '2023-07-18 05:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_sliders`
--

CREATE TABLE `app_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_sliders`
--

INSERT INTO `app_sliders` (`id`, `product_id`, `category`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '5', '0', '12083695761684312974.png', '0', NULL, '2023-05-17 06:12:54'),
(2, '1', '1', '5901982741684312984.png', '0', NULL, '2023-05-17 06:13:04'),
(3, '1', '2', '978941351684265638.png', '0', NULL, '2023-05-16 17:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Color', '6', '0', '2022-07-25 07:20:39', '2022-07-25 07:20:39'),
(7, 'Size', NULL, '0', '2023-05-12 07:36:40', '2023-05-12 07:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_fields`
--

CREATE TABLE `attribute_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_fields`
--

INSERT INTO `attribute_fields` (`id`, `vendor_id`, `attribute_id`, `attributes_value`, `status`, `created_at`, `updated_at`) VALUES
(10, '6', '6', 'white', '0', '2022-07-25 07:20:50', '2022-07-25 07:20:50'),
(11, '6', '6', 'Red', '0', '2022-07-25 07:21:01', '2022-07-25 07:21:01'),
(12, '6', '6', 'Yellow', '0', '2022-07-25 07:21:09', '2022-07-25 07:21:09'),
(13, NULL, '7', 'XL', '0', '2023-05-12 07:36:50', '2023-05-12 07:36:50'),
(14, NULL, '7', 'XXL', '0', '2023-05-12 07:36:57', '2023-05-12 07:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `date`, `brand`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'IKEA Furniture', '14088603961658822533.jpg', NULL, '0', '2022-07-26 07:02:13', '2022-07-26 07:02:13'),
(2, NULL, 'Urban Ladder Furniture', '8912808901658822569.jpg', NULL, '0', '2022-07-26 07:02:49', '2022-07-26 07:02:49'),
(3, NULL, 'Godrej Interio Furniture', '8864072141658822612.jpg', NULL, '0', '2022-07-26 07:03:32', '2022-07-26 07:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `date`, `parent_id`, `category`, `category_arabic`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', 'Furniture', 'أثاث', '12218149411658713250.jpg', '8929193951658680809.jpg', '0', '2022-06-30 09:20:07', '2022-07-25 00:40:50'),
(2, NULL, '0', 'Outdoor', 'في الخارج', '4507004281658713376.jpg', '1451643061658681090.jpg', '0', '2022-06-30 11:24:55', '2022-07-25 00:42:56'),
(3, NULL, '6', 'Sofas & Sectionals', 'أرائك ومقاطع', '1852751178.jpg', '2013217686.jpg', '0', '2022-06-30 11:25:33', '2022-07-24 23:49:08'),
(4, NULL, '6', 'Coffee & Accent Tables', 'طاولات القهوة واللكنة', '393320412.jpg', '1972297431.jpg', '0', '2022-06-30 11:26:12', '2022-07-24 23:52:16'),
(5, NULL, '6', 'Side & End Tables', 'الجداول الجانبية والنهائية', '689589113.jpg', '1062956865.jpg', '0', '2022-06-30 11:26:31', '2022-07-24 23:55:11'),
(6, NULL, '1', 'Living Room Furniture', 'أثاث غرفة المعيشة', '2041338279.jpg', '1676860340.jpg', '0', '2022-06-30 11:27:26', '2022-07-24 23:47:11'),
(7, NULL, '0', 'Rugs & Decor', 'السجاد والديكور', '17829767101658713523.jpg', '19478926131658749308.jpg', '0', '2022-07-03 20:08:52', '2022-07-25 10:41:48'),
(8, NULL, '0', 'Lighting', 'إضاءة', '10415345311658713643.jpg', '11771450911658749323.jpeg', '0', '2022-07-03 20:10:30', '2022-07-25 10:42:03'),
(9, NULL, '0', 'Bath', 'حمام', '17016596951658713752.jpg', '12261931571658749399.jpg', '0', '2022-07-03 20:10:57', '2022-07-25 10:43:19'),
(10, NULL, '1', 'Bedroom Furniture', 'أثاث غرفة نوم', '1470390344.jpg', '2038613587.jpg', '0', '2022-07-04 10:31:08', '2022-07-24 23:33:24'),
(11, NULL, '1', 'Kitchen & Dining', 'المطبخ والطعام', '139433956.jpg', '264799643.jpg', '0', '2022-07-04 10:32:25', '2022-07-24 23:42:41'),
(12, NULL, '1', 'Office', 'مكتب', '645410567.jpg', '1221433753.jpg', '0', '2022-07-04 10:32:36', '2022-07-24 23:43:03'),
(13, NULL, '6', 'Console Tables', 'طاولات كونسول', '2067349903.jpg', '873116921.jpg', '0', '2022-07-24 16:00:16', '2022-07-24 23:59:47'),
(14, NULL, '6', 'Armchairs & Accent Chairs', 'الكراسي ذات الذراعين وكراسي اللكنة', '1604341166.jpg', '1021359995.jpg', '0', '2022-07-24 16:05:05', '2022-07-24 16:05:05'),
(15, NULL, '6', 'Living Room Sets', 'مجموعات غرفة المعيشة', '1497775086.jpg', '35610887.jpg', '0', '2022-07-24 16:08:47', '2022-07-24 16:08:47'),
(16, NULL, '6', 'TV Stands', 'تقف التلفزيون', '380532318.jpg', '1747951507.jpg', '0', '2022-07-24 16:22:09', '2022-07-24 16:22:09'),
(17, NULL, '6', 'Chaise Lounges', 'شيزلونج', '470233209.jpg', '1615167277.jpg', '0', '2022-07-24 16:24:57', '2022-07-24 16:24:57'),
(18, NULL, '6', 'Ottomans & Poufs', 'العثمانيون و Poufs', '2050732490.jpg', '1626232689.png', '0', '2022-07-24 16:29:03', '2022-07-24 16:29:03'),
(19, NULL, '10', 'Beds', 'سرير', '1914215861.jpg', '1468226045.jpg', '0', '2022-07-24 16:32:05', '2022-07-24 16:32:05'),
(20, NULL, '10', 'Dressers', 'تسريحة', '451834190.jpg', '1518936618.jpg', '0', '2022-07-24 16:35:07', '2022-07-24 16:35:07'),
(21, NULL, '10', 'Nightstands', 'نايتستاندس', '186288807.jpg', '920518498.png', '0', '2022-07-24 16:39:22', '2022-07-24 16:39:22'),
(22, NULL, '10', 'Headboards', 'الألواح الأمامية', '247698392.jpg', '1430385669.jpg', '0', '2022-07-24 16:42:06', '2022-07-24 16:42:06'),
(23, NULL, '10', 'Bed Frames', 'إطارات السرير', '1613697219.jpg', '944657494.jpg', '0', '2022-07-24 16:46:35', '2022-07-24 16:46:35'),
(24, NULL, '10', 'Bedroom Sets', 'مجموعات غرف النوم', '705848928.jpeg', '1167685121.jpg', '0', '2022-07-24 16:51:38', '2022-07-24 16:51:38'),
(25, NULL, '10', 'Mattresses', 'مراتب', '973099992.jpg', '649558215.jpg', '0', '2022-07-24 16:53:33', '2022-07-24 16:53:33'),
(26, NULL, '11', 'Bar Stools', 'شريط براز', '174255298.jpg', '444100115.jpg', '0', '2022-07-24 16:57:25', '2022-07-24 16:57:25'),
(27, NULL, '11', 'Dining Tables', 'طاولات الطعام', '322158273.jpg', '879924683.jpg', '0', '2022-07-24 17:00:16', '2022-07-24 17:00:16'),
(28, NULL, '11', 'Dining Chairs', 'الطعام الكراسي', '1697492353.jpg', '433792369.jpg', '0', '2022-07-24 17:04:04', '2022-07-24 17:04:04'),
(29, NULL, '11', 'Dining Room Sets', 'مجموعات غرفة الطعام', '1749857191.jpeg', '113920246.jpg', '0', '2022-07-24 17:08:04', '2022-07-24 17:08:04'),
(30, NULL, '11', 'Sideboards & Buffets', 'خزائن جانبية وبوفيهات', '1672105217.jpeg', '2002085196.jpg', '0', '2022-07-24 17:12:49', '2022-07-24 17:12:49'),
(31, NULL, '12', 'Desks', 'مكاتب', '425273068.jpeg', '1665743988.jpg', '0', '2022-07-24 17:17:21', '2022-07-24 17:17:21'),
(32, NULL, '12', 'Bookcases', 'مكتبات', '1070568084.jpeg', '824815834.jpg', '0', '2022-07-24 17:19:35', '2022-07-24 17:19:35'),
(33, NULL, '12', 'File Cabinets', 'خزانة الملفات', '786252674.jpeg', '2054729741.jpg', '0', '2022-07-24 17:22:36', '2022-07-24 17:22:36'),
(34, NULL, '12', 'Office Chairs', 'كراسي المكتب', '1938737611.jpg', '433629486.jpg', '0', '2022-07-24 17:25:18', '2022-07-24 17:25:18'),
(35, NULL, '12', 'Room Dividers', 'مقسمات الغرفة', '1741734399.jpg', '759370429.jpg', '0', '2022-07-24 17:27:49', '2022-07-24 17:27:49'),
(36, NULL, '2', 'Patio Furniture', 'أثاث الفناء', '1344643774.jpg', '1025562872.jpg', '0', '2022-07-24 17:47:57', '2022-07-25 00:56:57'),
(37, NULL, '2', 'Outdoor Lighting', 'إضاءة خارجية', '765863757.jpg', '1043024641.jpg', '0', '2022-07-24 17:53:52', '2022-07-25 00:59:41'),
(38, NULL, '2', 'Outdoor Decor', 'ديكورات خارجية', '759376656.jpg', '1269587930.jpeg', '0', '2022-07-24 18:00:32', '2022-07-25 01:02:31'),
(39, NULL, '2', 'Lawn & Garden', 'النجيلة والحديقة', '1696530571.jpg', '1892637023.jpg', '0', '2022-07-24 18:05:31', '2022-07-25 01:04:15'),
(40, NULL, '36', 'Outdoor Dining Furniture', 'أثاث غرفة الطعام في الهواء الطلق', '407341182.jpg', '1901195563.jpg', '0', '2022-07-24 18:11:40', '2022-07-25 01:09:50'),
(41, NULL, '36', 'Outdoor Lounge Furniture', 'أثاث صالة في الهواء الطلق', '1579631841.jpg', '2105145152.jpeg', '0', '2022-07-24 18:14:49', '2022-07-25 01:12:40'),
(42, NULL, '36', 'Outdoor Chairs', 'كراسي في الهواء الطلق', '597223237.jpg', '165524656.jpg', '0', '2022-07-24 18:17:26', '2022-07-25 01:15:20'),
(43, NULL, '36', 'Adirondack Chairs', 'كراسي آديرونداك', '1856901485.jpg', '1578870503.jpg', '0', '2022-07-24 18:20:36', '2022-07-25 01:17:27'),
(44, NULL, '36', 'Outdoor Bar Furniture', 'أثاث البار في الهواء الطلق', '26052004.jpg', '1380144665.jpg', '0', '2022-07-24 18:22:42', '2022-07-25 01:21:03'),
(45, NULL, '36', 'Outdoor Benches', 'مقاعد في الهواء الطلق', '1782015938.jpg', '1458720435.png', '0', '2022-07-24 18:25:14', '2022-07-25 01:23:15'),
(46, NULL, '37', 'Wall Lights & Sconces', 'مصابيح الحائط والشمعدانات', '1357275932.jpeg', '1748251697.png', '0', '2022-07-24 18:32:24', '2022-07-24 18:32:24'),
(47, NULL, '37', 'Outdoor Flush-Mounts', 'يتصاعد دافق في الهواء الطلق', '812750798.png', '1671499858.png', '0', '2022-07-24 18:36:18', '2022-07-24 18:36:18'),
(48, NULL, '37', 'Landscape Lighting', 'إضاءة المناظر الطبيعية', '135506887.png', '935496476.png', '0', '2022-07-24 18:37:47', '2022-07-24 18:37:47'),
(49, NULL, '37', 'Outdoor Flood & Spot Lights', 'كشافات خارجية وأضواء سبوت', '2055128576.png', '303046475.png', '0', '2022-07-24 18:39:26', '2022-07-24 18:39:26'),
(50, NULL, '38', 'Outdoor Rugs', 'سجاد خارجي', '1214214031.png', '1000932174.png', '0', '2022-07-24 18:41:04', '2022-07-24 18:41:04'),
(51, NULL, '38', 'Doormats', 'ممسحات', '1765145410.png', '1994366929.png', '0', '2022-07-24 18:43:05', '2022-07-24 18:43:05'),
(52, NULL, '38', 'Outdoor Cushions & Pillows', 'وسائد ووسائد خارجية', '23572376.png', '1948956525.png', '0', '2022-07-24 18:44:49', '2022-07-24 18:44:49'),
(53, NULL, '38', 'Patio Umbrellas', 'مظلات الفناء', '2080172681.png', '1658797235.png', '0', '2022-07-24 18:46:18', '2022-07-24 18:46:18'),
(54, NULL, '39', 'Garden Statues & Yard Art', 'تماثيل الحديقة وفناء الفناء', '29645322.png', '631763235.png', '0', '2022-07-24 18:47:50', '2022-07-24 18:47:50'),
(55, NULL, '39', 'Planters & Pots', 'المزارعون والأواني', '758010772.png', '1751994520.png', '0', '2022-07-24 18:49:26', '2022-07-24 18:49:26'),
(56, NULL, '2', 'Fire Pits', 'حفر النار', '1582675750.png', '855853169.png', '1', '2022-07-24 18:51:26', '2022-07-24 23:10:17'),
(57, NULL, '7', 'Rugs', 'سجاد', '422784236.jpg', '444871162.png', '0', '2022-07-24 20:09:28', '2022-07-25 01:25:24'),
(58, NULL, '7', 'Home Decor & Accents', 'ديكور المنزل واللهجات', '1691612945.jpg', '1629380486.png', '0', '2022-07-24 20:11:08', '2022-07-25 01:27:24'),
(59, NULL, '7', 'Wall Decor', 'ديكور الحائط', '762749595.jpg', '1209483811.png', '0', '2022-07-24 20:12:45', '2022-07-25 01:29:38'),
(60, NULL, '7', 'Window Treatments', 'نافذة المعالجات', '797717201.jpg', '1727360942.png', '0', '2022-07-24 20:13:56', '2022-07-25 01:31:35'),
(61, NULL, '8', 'Ceiling Lighting', 'إضاءة السقف', '933341352.png', '730098169.png', '0', '2022-07-24 20:16:03', '2022-07-24 20:16:03'),
(62, NULL, '8', 'Wall Lighting', 'إضاءة الحائط', '77949933.png', '644898753.png', '0', '2022-07-24 20:18:29', '2022-07-24 20:18:29'),
(63, NULL, '8', 'Lamps', 'مصابيح', '230406742.png', '1501405079.png', '0', '2022-07-24 20:19:45', '2022-07-24 20:19:45'),
(64, NULL, '8', 'Outdoor Lighting', 'إضاءة خارجية', '788365853.png', '146414840.png', '0', '2022-07-24 20:21:14', '2022-07-24 20:21:14'),
(65, NULL, '9', 'Bath', 'حمام', '921482422.png', '194259096.png', '0', '2022-07-24 20:27:29', '2022-07-24 20:27:29'),
(66, NULL, '9', 'Bathroom Storage', 'تخزين الحمام', '2073961715.png', '1309361649.png', '0', '2022-07-24 20:28:37', '2022-07-24 20:34:54'),
(67, NULL, '9', 'Bathroom Accessories', 'اكسسوارات الحمام', '1968206863.png', '1211448308.png', '0', '2022-07-24 20:30:23', '2022-07-24 20:30:23'),
(68, NULL, '0', 'Home Improvement', 'تحسين المنزل', '20656717661658713928.jpg', '8101420171658698371.png', '0', '2022-07-24 20:32:51', '2022-07-25 00:52:08'),
(69, NULL, '68', 'Bathroom Remodel', 'إعادة تشكيل الحمام', '875909420.png', '1345089284.png', '0', '2022-07-24 20:36:52', '2022-07-24 20:36:52'),
(70, NULL, '68', 'Kitchen Remodel', 'إعادة تشكيل المطبخ', '25747796.png', '2075025507.png', '0', '2022-07-24 20:39:09', '2022-07-24 20:39:09'),
(71, NULL, '68', 'Tile', 'البلاط', '764975014.png', '596755626.png', '0', '2022-07-24 20:40:12', '2022-07-24 20:40:12'),
(72, NULL, '68', 'Whole House Remodel', 'إعادة تشكيل البيت كله', '1953739021.png', '684555223.png', '0', '2022-07-24 21:30:15', '2022-07-24 21:30:15'),
(73, NULL, '0', 'Kitchen & Tabletop', 'المطبخ والطاولة', '796211021658714056.jpg', '12007336031658701967.png', '1', '2022-07-24 21:32:47', '2022-07-25 00:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `parent_id`, `city`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '0', 'Kuwait City', NULL, '0', '2022-07-24 07:18:38', '2022-07-24 07:18:38'),
(2, '1', '0', 'Mangaf', NULL, '0', '2022-07-24 07:19:07', '2022-07-24 07:19:07'),
(3, NULL, '1', 'Hawally', NULL, '0', '2022-07-24 07:20:35', '2022-07-24 07:20:35'),
(4, NULL, '1', 'mishrif', NULL, '0', '2023-08-14 19:54:10', '2023-08-14 19:54:10'),
(5, NULL, '2', 'khaldiyda', NULL, '0', '2023-08-14 20:14:44', '2023-08-14 20:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name_english`, `country_name_arabic`, `phone_count`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '965', 'Kuwait', NULL, '9', NULL, '0', '2023-07-12 14:01:11', '2023-08-14 17:30:04'),
(2, '123', 'Spain', NULL, '854351', NULL, '0', '2023-08-14 17:29:45', '2023-08-14 17:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_order_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_coupon_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `vendor_id`, `coupon_title`, `coupon_code`, `start_date`, `end_date`, `value_type`, `coupon_value`, `min_order_value`, `max_coupon_value`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'code100', 'code100', '2023-02-20', '2023-02-25', '0', '50', '20', '100', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `date`, `product_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(17, '2023-07-18', '5', '1', '0', '2023-07-18 10:41:54', '2023-07-18 10:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `favourites_ideas`
--

CREATE TABLE `favourites_ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_book_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `idea_books`
--

CREATE TABLE `idea_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_books`
--

INSERT INTO `idea_books` (`id`, `vendor_id`, `project_id`, `title`, `category`, `subcategory`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'Open and Airy Highland House', '23', '24', '<h3 class=\"sc-1hirnpv-0 feeuEH sc-mwxddt-0 bPkVhu\">Services Provided</h3>\r\n<p class=\"sc-mwxddt-0 krnygu\">3D Rendering, Accessory Dwelling Units (ADUs), Architectural Design, Architectural Drawings, Attic Conversion, Barn Design &amp; Construction, Basement Design, Basement Remodeling, Bathroom Design, Building Design, Custom Home, Deck Design, Drafting, Energy-Efficient Homes, Floor Plans, Garage Design, Green Building, Guesthouse Design &amp; Construction, Handicap-Accessible Design, Historic Building Conservation, Home Additions, Home Extensions, Home Gym Design &amp; Construction, Home Remodeling, Home Restoration, House Plans, Kitchen Design, Kitchen Remodeling, Landscape Plans, Laundry Room Design, Mudroom Design, Multigenerational Homes, New Home Construction, Outdoor Kitchen Design, Pool House Design &amp; Construction, Prefab Houses, Project Management, Space Planning, Staircase Design, Sustainable Design, Universal Design, Custom Homes, Interior Design, Furniture Selection</p>', '18916398741676958488.jpg', '2', '2023-02-21 03:18:08', '2023-07-14 08:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `idea_book_images`
--

CREATE TABLE `idea_book_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_book_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_book_images`
--

INSERT INTO `idea_book_images` (`id`, `vendor_id`, `idea_book_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '15471854041676958488.png', '0', '2023-02-21 03:18:08', '2023-02-21 03:18:08'),
(2, '1', '1', '677031941676958488.png', '0', '2023-02-21 03:18:08', '2023-02-21 03:18:08'),
(3, '1', '1', '15916028621676959773.jpg', '0', '2023-02-21 03:39:33', '2023-02-21 03:39:33'),
(4, '1', '1', '7656951001676959773.jpg', '0', '2023-02-21 03:39:33', '2023-02-21 03:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `idea_categories`
--

CREATE TABLE `idea_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_categories`
--

INSERT INTO `idea_categories` (`id`, `date`, `parent_id`, `category`, `category_arabic`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', 'Kitchen & Dining', 'المطبخ والطعام', '1571408531658705074.png', '897293421658705074.png', '0', '2022-07-24 22:24:34', '2022-07-24 22:24:34'),
(2, NULL, '1', 'Kitchen', 'مطبخ', '1976367447.png', '1883522846.png', '0', '2022-07-24 22:25:40', '2022-07-24 22:25:40'),
(3, NULL, '1', 'Dining Room', 'غرفة العشاء', '1786578547.png', '1214361288.png', '0', '2022-07-24 22:26:10', '2022-07-24 22:26:10'),
(4, NULL, '1', 'Pantry', 'المخزن', '584734416.png', '1606868879.png', '0', '2022-07-24 22:31:43', '2022-07-24 22:31:43'),
(5, NULL, '1', 'Great Room', 'غرفة رائعة', '939657498.png', '115313178.png', '0', '2022-07-24 22:33:09', '2022-07-24 22:33:09'),
(6, NULL, '1', 'Breakfast Nook', 'ركن الإفطار', '1653990956.png', '1751998818.png', '0', '2022-07-24 22:34:45', '2022-07-24 22:34:45'),
(7, NULL, '0', 'Bed & Bath', 'السرير والحمام', '7977999201658705790.png', '19515637441658705790.png', '0', '2022-07-24 22:36:30', '2022-07-24 22:36:30'),
(8, NULL, '7', 'Bathroom', 'دوره المياه', '1060220639.png', '420464344.png', '0', '2022-07-24 22:37:48', '2022-07-24 22:37:48'),
(9, NULL, '7', 'Powder Room', 'حجرة التواليت', '215022148.png', '525191790.png', '0', '2022-07-24 22:39:21', '2022-07-24 22:39:21'),
(10, NULL, '7', 'Bedroom', 'غرفة نوم', '1538372126.png', '1568318866.png', '0', '2022-07-24 22:40:49', '2022-07-24 22:40:49'),
(11, NULL, '7', 'Storage & Closet', 'خزانة التخزين', '687628586.png', '141578747.png', '0', '2022-07-24 22:41:54', '2022-07-24 22:41:54'),
(12, NULL, '7', 'Baby & Kids', 'أطفال رضع', '848459446.png', '643265282.png', '0', '2022-07-24 22:43:21', '2022-07-24 22:43:21'),
(13, NULL, '0', 'Outdoor', 'في الخارج', '3709485371658706304.png', '3449039511658706304.png', '0', '2022-07-24 22:45:04', '2022-07-24 22:45:04'),
(14, NULL, '13', 'Landscape', 'المناظر الطبيعيه', '1005351748.png', '110337822.png', '0', '2022-07-24 22:47:00', '2022-07-24 22:47:00'),
(15, NULL, '13', 'Patio', 'فناء', '367738535.png', '1824510673.png', '0', '2022-07-24 22:48:05', '2022-07-24 22:48:05'),
(16, NULL, '13', 'Deck', NULL, '1410461481.png', '1100543082.png', '0', '2022-07-24 22:49:18', '2022-07-24 22:49:18'),
(17, NULL, '13', 'Pool', NULL, '1799341182.png', '364002705.png', '0', '2022-07-24 22:50:25', '2022-07-24 22:50:25'),
(18, NULL, '13', 'Backyard', NULL, '528476013.png', '952047605.png', '0', '2022-07-24 22:51:41', '2022-07-24 22:51:41'),
(19, NULL, '0', 'Utility', NULL, '19116918961658706947.png', '3345280591658706947.png', '0', '2022-07-24 22:55:47', '2022-07-24 22:55:47'),
(20, NULL, '19', 'Laundry', NULL, '549839388.png', '336361301.png', '0', '2022-07-24 22:56:57', '2022-07-24 22:56:57'),
(21, NULL, '19', 'Garage', NULL, '1468348197.png', '2065996596.png', '0', '2022-07-24 22:58:12', '2022-07-24 22:58:12'),
(22, NULL, '19', 'Mudroom', NULL, '1167972641.png', '1324293478.png', '0', '2022-07-24 22:59:52', '2022-07-24 22:59:52'),
(23, NULL, '0', 'Living', NULL, '5543996761658707305.png', '2829392131658707305.png', '0', '2022-07-24 23:01:45', '2022-07-24 23:01:45'),
(24, NULL, '23', 'Living Room', NULL, '845423339.png', '411739276.png', '0', '2022-07-24 23:03:01', '2022-07-24 23:03:01'),
(25, NULL, '23', 'Family Room', NULL, '1693492047.png', '877398166.png', '0', '2022-07-24 23:04:26', '2022-07-24 23:04:26'),
(26, NULL, '23', 'Sunroom', NULL, '1312059286.png', '1676881625.png', '0', '2022-07-24 23:06:07', '2022-07-24 23:06:07'),
(27, NULL, '19', 'Library', NULL, '1661158034.png', '627960004.png', '0', '2022-07-24 23:08:08', '2022-07-24 23:08:08'),
(28, NULL, '19', 'Gym', NULL, '211630802.png', '1538668157.png', '0', '2022-07-24 23:09:23', '2022-07-24 23:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `english` text COLLATE utf8mb4_unicode_ci,
  `arabic` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `english`, `arabic`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'لوحة القيادة', '2022-11-24 18:34:22', '2022-11-25 10:05:28'),
(2, 'Total Customer', 'إجمالي العميل', '2022-11-25 10:28:43', '2022-11-25 15:58:51'),
(3, 'Total Vendor', 'إجمالي البائع', '2022-11-25 10:28:55', '2022-11-25 15:59:09'),
(4, 'Total Order', 'من أجل الكاملة', '2022-11-25 10:29:08', '2022-11-25 15:59:24'),
(5, 'Total Order Value', 'إجمالي قيمة الطلب', '2022-11-25 10:29:22', '2022-11-25 15:59:37'),
(6, 'Recent Transactions', 'التحويلات الاخيرة', '2022-11-25 10:29:34', '2022-11-25 15:59:50'),
(7, 'Order ID', 'رقم التعريف الخاص بالطلب', '2022-11-25 10:29:53', '2022-11-25 16:00:05'),
(8, 'Date', 'تاريخ', '2022-11-25 10:30:07', '2022-11-25 16:00:18'),
(9, 'Customer', 'عميل', '2022-11-25 10:30:19', '2022-11-25 16:00:38'),
(10, 'Vendor', 'بائع', '2022-11-25 10:30:32', '2022-11-25 16:00:50'),
(11, 'Shipping', 'شحن', '2022-11-25 10:30:45', '2022-11-25 16:01:03'),
(12, 'Status', 'حالة', '2022-11-25 10:30:56', '2022-11-25 16:01:16'),
(13, 'Amount', 'مقدار', '2022-11-25 10:31:09', '2022-11-25 16:01:28'),
(14, 'Customers', 'عملاء', '2022-11-25 10:33:37', '2022-11-25 16:01:42'),
(15, 'All Customers', 'كل العملاء', '2022-11-25 10:34:15', '2022-11-25 16:02:04'),
(16, 'Date', 'تاريخ', '2022-11-25 10:34:30', '2022-11-25 16:02:25'),
(17, 'Name', 'اسم', '2022-11-25 10:34:38', '2022-11-25 16:02:38'),
(18, 'Mobile', 'التليفون المحمول', '2022-11-25 10:34:46', '2022-11-25 16:02:52'),
(19, 'E-Mail', 'البريد الإلكتروني', '2022-11-25 10:34:55', '2022-11-25 16:03:07'),
(20, 'Status', 'حالة', '2022-11-25 10:35:07', '2022-11-25 16:03:19'),
(21, 'Action', 'عمل', '2022-11-25 10:35:15', '2022-11-25 16:03:32'),
(22, 'Vendors', 'الباعة', '2022-11-25 10:37:38', '2022-11-25 16:03:46'),
(23, 'All Vendors', 'كل الباعة', '2022-11-25 10:38:16', '2022-11-25 16:03:58'),
(24, 'Date', 'تاريخ', '2022-11-25 10:38:37', '2022-11-25 16:04:11'),
(25, 'Type', 'يكتب', '2022-11-25 10:38:47', '2022-11-25 16:04:29'),
(26, 'Name', 'اسم', '2022-11-25 10:38:54', '2022-11-25 16:04:43'),
(27, 'Mobile', 'التليفون المحمول', '2022-11-25 10:39:07', '2022-11-25 16:05:06'),
(28, 'E-Mail', 'البريد الإلكتروني', '2022-11-25 10:39:16', '2022-11-25 16:05:28'),
(29, 'Commission', 'عمولة', '2022-11-25 10:39:28', '2022-11-25 16:05:40'),
(30, 'Status', 'حالة', '2022-11-25 10:39:43', '2022-11-25 16:05:54'),
(31, 'Action', 'عمل', '2022-11-25 10:39:52', '2022-11-25 16:06:09'),
(32, 'Reviews', 'المراجعات', '2022-11-25 10:44:16', '2022-11-25 16:06:22'),
(33, 'All Reviews', 'جميع المراجعات', '2022-11-25 10:45:35', '2022-11-25 16:06:34'),
(34, 'Vendor Name', 'اسم البائع', '2022-11-25 10:46:21', '2022-11-25 16:06:49'),
(35, 'Customer Name', 'اسم الزبون', '2022-11-25 10:46:48', '2022-11-25 16:07:01'),
(36, 'Product Name', 'اسم المنتج', '2022-11-25 10:47:02', '2022-11-25 16:07:37'),
(37, 'Comments', 'تعليقات', '2022-11-25 10:47:12', '2022-11-25 16:08:14'),
(38, 'Ratting', 'الضرب', '2022-11-25 10:47:24', '2022-11-25 16:08:36'),
(39, 'Date & Time', 'التاريخ والوقت', '2022-11-25 10:47:45', '2022-11-25 16:08:47'),
(40, 'Product Category', 'فئة المنتج', '2022-11-25 10:49:50', '2022-11-25 16:09:04'),
(41, 'All Category', 'كل الفئات', '2022-11-25 10:50:49', '2022-11-25 16:09:23'),
(42, 'Category', 'فئة', '2022-11-25 10:50:58', '2022-11-25 16:09:35'),
(43, 'Image', 'صورة', '2022-11-25 10:51:10', '2022-11-25 16:09:48'),
(44, 'Status', 'حالة', '2022-11-25 10:51:18', '2022-11-25 16:10:00'),
(45, 'Action', 'عمل', '2022-11-25 10:51:25', '2022-11-25 16:10:14'),
(46, 'Add New', 'اضف جديد', '2022-11-25 10:52:43', '2022-11-25 16:10:31'),
(47, 'Professional Category', 'الفئة الفنية', '2022-11-25 10:54:56', '2022-11-25 16:10:44'),
(48, 'All Professional Category', 'جميع الفئات المهنية', '2022-11-25 10:56:03', '2022-11-25 16:10:56'),
(49, 'Category', 'فئة', '2022-11-25 10:56:33', '2022-11-25 16:11:09'),
(50, 'Image', 'صورة', '2022-11-25 10:56:41', '2022-11-25 16:11:21'),
(51, 'Status', 'حالة', '2022-11-25 10:56:48', '2022-11-25 16:11:33'),
(52, 'Action', 'عمل', '2022-11-25 10:56:56', '2022-11-25 16:11:47'),
(53, 'Add New', 'اضف جديد', '2022-11-25 10:57:05', '2022-11-25 16:12:04'),
(54, 'Idea Category', 'فئة الفكرة', '2022-11-25 10:59:10', '2022-11-25 16:12:17'),
(55, 'All Idea Category', 'كل فئة الفكرة', '2022-11-25 10:59:50', '2022-11-25 16:12:30'),
(56, 'Add New', 'اضف جديد', '2022-11-25 11:00:03', '2022-11-25 16:12:44'),
(57, 'Category', 'فئة', '2022-11-25 11:00:15', '2022-11-25 16:12:56'),
(58, 'Image', 'صورة', '2022-11-25 11:00:23', '2022-11-25 16:13:08'),
(59, 'Status', 'حالة', '2022-11-25 11:00:33', '2022-11-25 16:13:22'),
(60, 'Action', 'عمل', '2022-11-25 11:00:42', '2022-11-25 16:13:36'),
(61, 'Attributes', 'صفات', '2022-11-25 11:02:02', '2022-11-25 16:13:58'),
(62, 'All Attributes', 'كل السمات', '2022-11-25 11:02:43', '2022-11-25 16:15:00'),
(63, 'Add New Attributes', 'أضف سمات جديدة', '2022-11-25 11:02:55', '2022-11-25 16:15:12'),
(64, 'Attributes Name', 'اسم السمات', '2022-11-25 11:03:31', '2022-11-25 16:15:23'),
(65, 'Status', 'حالة', '2022-11-25 11:03:39', '2022-11-25 16:15:39'),
(66, 'Action', 'عمل', '2022-11-25 11:03:49', '2022-11-25 16:15:51'),
(67, 'Brand', 'ماركة', '2022-11-25 11:05:05', '2022-11-25 16:16:03'),
(68, 'All Brand', 'جميع العلامات التجارية', '2022-11-25 11:05:41', '2022-11-25 16:16:21'),
(69, 'Add New', 'اضف جديد', '2022-11-25 11:05:56', '2022-11-25 16:16:36'),
(70, 'Brand', 'ماركة', '2022-11-25 11:06:10', '2022-11-25 16:16:48'),
(71, 'Image', 'صورة', '2022-11-25 11:06:18', '2022-11-25 16:17:00'),
(72, 'Status', 'حالة', '2022-11-25 11:06:27', '2022-11-25 16:17:12'),
(73, 'Action', 'عمل', '2022-11-25 11:06:35', '2022-11-25 16:17:29'),
(74, 'City', 'مدينة', '2022-11-25 11:07:48', '2022-11-25 16:17:43'),
(75, 'All City', 'كل المدينة', '2022-11-25 11:08:37', '2022-11-25 16:17:55'),
(76, 'Add New', 'اضف جديد', '2022-11-25 11:08:46', '2022-11-25 16:18:24'),
(77, 'City', 'مدينة', '2022-11-25 11:09:08', '2022-11-25 16:18:36'),
(78, 'Status', 'حالة', '2022-11-25 11:09:15', '2022-11-25 16:18:48'),
(79, 'Action', 'عمل', '2022-11-25 11:09:23', '2022-11-25 16:19:02'),
(80, 'Vendor Package', 'حزمة البائع', '2022-11-25 11:09:54', '2022-11-25 16:19:13'),
(81, 'All Package', 'كل حزمة', '2022-11-25 11:10:51', '2022-11-25 16:19:30'),
(82, 'Add New', 'اضف جديد', '2022-11-25 11:11:17', '2022-11-25 16:19:44'),
(83, 'Package Name', 'اسم الحزمة', '2022-11-25 11:11:27', '2022-11-25 16:19:59'),
(84, 'Price', 'سعر', '2022-11-25 11:11:35', '2022-11-25 16:20:21'),
(85, 'Image', 'صورة', '2022-11-25 11:11:42', '2022-11-25 16:20:36'),
(86, 'Status', 'حالة', '2022-11-25 11:11:51', '2022-11-25 16:20:49'),
(87, 'Action', 'عمل', '2022-11-25 11:11:58', '2022-11-25 16:21:14'),
(88, 'Reports', 'التقارير', '2022-11-25 11:12:56', '2022-11-25 16:21:26'),
(89, 'Orders', 'الطلب #٪ s', '2022-11-25 11:13:35', '2022-11-25 16:21:48'),
(90, 'All Orders', 'جميع الطلبات', '2022-11-25 11:16:49', '2022-11-25 16:22:00'),
(91, 'Date', 'تاريخ', '2022-11-25 11:17:02', '2022-11-25 16:22:16'),
(92, 'Vendor', 'بائع', '2022-11-25 11:17:10', '2022-11-25 16:22:28'),
(93, 'Customer', 'عميل', '2022-11-25 11:17:19', '2022-11-25 16:22:40'),
(94, 'Total', 'المجموع', '2022-11-25 11:17:29', '2022-11-25 16:22:51'),
(95, 'Shipping Status', 'حالة الشحن', '2022-11-25 11:17:40', '2022-11-25 16:23:03'),
(96, 'Action', 'عمل', '2022-11-25 11:17:50', '2022-11-25 16:23:15'),
(97, 'Settlement Reports', 'تقارير التسوية', '2022-11-25 11:19:03', '2022-11-25 16:23:29'),
(98, 'Date', 'تاريخ', '2022-11-25 11:20:20', '2022-11-25 16:23:54'),
(99, 'Vendor', 'بائع', '2022-11-25 11:20:37', '2022-11-25 16:24:05'),
(100, 'Total', 'المجموع', '2022-11-25 11:20:45', '2022-11-25 16:24:16'),
(101, 'Service Charge', 'تكلفة الخدمة', '2022-11-25 11:20:56', '2022-11-25 16:24:31'),
(102, 'Commission', 'عمولة', '2022-11-25 11:21:08', '2022-11-25 16:24:42'),
(103, 'Payable Amount', 'المبلغ المستحق', '2022-11-25 11:21:19', '2022-11-25 16:24:54'),
(104, 'Status', 'حالة', '2022-11-25 11:21:31', '2022-11-25 16:25:06'),
(105, 'Action', 'عمل', '2022-11-25 11:21:41', '2022-11-25 16:25:19'),
(106, 'Master', 'يتقن', '2022-11-25 11:23:20', '2022-11-25 16:25:32'),
(107, 'Users', 'المستخدمون', '2022-11-25 11:23:53', '2022-11-25 16:25:46'),
(108, 'Roles', 'الأدوار', '2022-11-25 11:24:05', '2022-11-25 16:25:57'),
(109, 'Return Reason', 'سبب عودة', '2022-11-25 11:24:16', '2022-11-25 16:26:08'),
(110, 'About Us', 'معلومات عنا', '2022-11-25 11:24:25', '2022-11-25 16:26:18'),
(111, 'Purchase Guide', 'دليل الشراء', '2022-11-25 11:24:34', '2022-11-25 16:26:29'),
(112, 'Vendor Guide', 'دليل البائع', '2022-11-25 11:24:47', '2022-11-25 16:26:42'),
(113, 'Professional Guide', 'دليل محترف', '2022-11-25 11:24:59', '2022-11-25 16:26:55'),
(114, 'Delivery Information', 'معلومات التوصيل', '2022-11-25 11:25:15', '2022-11-25 16:27:06'),
(115, 'Terms and Conditions', 'الأحكام والشروط', '2022-11-25 11:25:29', '2022-11-25 16:27:18'),
(116, 'Privacy Policy', 'سياسة الخصوصية', '2022-11-25 11:25:39', '2022-11-25 16:27:30'),
(117, 'Languages', 'اللغات', '2022-11-25 11:25:48', '2022-11-25 16:27:43'),
(118, 'Logout', 'تسجيل خروج', '2022-11-25 11:25:58', '2022-11-25 16:28:01'),
(119, 'About Us', 'معلومات عنا', '2022-11-26 05:21:01', '2022-11-26 05:21:01'),
(120, 'My Account', 'حسابي', '2022-11-26 05:21:20', '2022-11-26 05:21:20'),
(121, 'Contact Us', 'اتصل بنا', '2022-11-26 05:21:44', '2022-11-26 05:21:44'),
(122, 'Language', 'لغة', '2022-11-26 05:22:15', '2022-11-26 05:22:15'),
(123, 'All Categories', 'جميع الفئات', '2022-11-26 05:22:40', '2022-11-26 05:22:40'),
(124, 'Get Ideas', 'احصل على الأفكار', '2022-11-26 05:23:11', '2022-11-26 05:23:11'),
(125, 'Find Professionals', 'ابحث عن محترفين', '2022-11-26 05:23:38', '2022-11-26 05:23:38'),
(126, 'Shop', 'محل', '2022-11-26 05:24:08', '2022-11-26 05:24:08'),
(127, 'Wishlist', 'قائمة الرغبات', '2022-11-26 05:25:42', '2022-11-26 05:25:42'),
(128, 'Cart', 'عربة التسوق', '2022-11-26 05:26:01', '2022-11-26 05:26:01'),
(129, 'Login', 'تسجيل الدخول', '2022-11-26 05:26:17', '2022-11-26 05:26:17'),
(130, 'Total', 'المجموع', '2022-11-26 05:26:47', '2022-11-26 05:26:47'),
(131, 'View Cart', 'عرض عربة التسوق', '2022-11-26 05:27:04', '2022-11-26 05:27:04'),
(132, 'Checkout', 'الدفع', '2022-11-26 05:27:22', '2022-11-26 05:27:22'),
(133, 'GET IDEAS', 'احصل على الأفكار', '2022-11-26 05:27:43', '2022-11-26 05:27:43'),
(134, 'FIND PROFESSIONALS', 'ابحث عن المهنيين', '2022-11-26 05:28:06', '2022-11-26 05:28:06'),
(135, 'SHOP BY DEPARTMENT', 'التسوق حسب الأقسام', '2022-11-26 05:28:36', '2022-11-26 05:28:36'),
(136, 'Search for Items', 'البحث عن العناصر', '2022-11-26 05:41:12', '2022-11-26 05:41:12'),
(137, 'Account', 'الحساب', '2022-11-26 05:45:24', '2022-11-26 05:45:24'),
(138, 'My Account', 'حسابي', '2022-11-26 05:45:43', '2022-11-26 05:45:43'),
(139, 'My Orders', 'طلباتي', '2022-11-26 05:46:04', '2022-11-26 05:46:04'),
(140, 'My Enquiries', 'استفساراتي', '2022-11-26 05:46:35', '2022-11-26 05:46:35'),
(141, 'My Address', 'عنواني', '2022-11-26 05:47:03', '2022-11-26 05:47:03'),
(142, 'Change Password', 'غير كلمة السر', '2022-11-26 05:47:22', '2022-11-26 05:47:22'),
(143, 'Sign out', 'خروج', '2022-11-26 05:47:41', '2022-11-26 05:47:41'),
(144, 'Our location', 'موقعنا', '2022-11-26 05:51:51', '2022-11-26 05:51:51'),
(145, 'Log In / Sign Up', 'الدخول التسجيل فى الموقع', '2022-11-26 05:52:09', '2022-11-26 05:52:09'),
(146, '(+01) - 2345 - 6789', '(+01) - 2345 - 6789', '2022-11-26 05:52:22', '2022-11-26 05:52:22'),
(147, 'Follow Us', 'تابعنا', '2022-11-26 05:52:42', '2022-11-26 05:52:42'),
(148, 'Copyright 2022 © DAR. All rights reserved. Developed By LRBINFOTECH', 'Copyright 2022 © DAR. All rights reserved. Developed By LRBINFOTECH', '2022-11-26 05:53:03', '2022-11-26 05:53:03'),
(149, 'Best prices & offers', 'أفضل الأسعار والعروض', '2022-11-26 05:54:17', '2022-11-26 05:54:17'),
(150, 'Orders $50 or more', 'تطلب 50 دولارًا أو أكثر', '2022-11-26 05:56:03', '2022-11-26 05:56:03'),
(151, 'Free delivery', 'توصيل مجاني', '2022-11-26 05:56:29', '2022-11-26 05:56:29'),
(152, '24/7 amazing services', '24/7 خدمات مذهلة', '2022-11-26 05:56:49', '2022-11-26 05:56:49'),
(153, 'Great daily deal', 'صفقة يومية كبيرة', '2022-11-26 05:57:10', '2022-11-26 05:57:10'),
(154, 'When you sign up', 'عندما تقوم بالتسجيل', '2022-11-26 05:57:34', '2022-11-26 05:57:34'),
(155, 'Wide assortment', 'تشكيلة واسعة', '2022-11-26 05:57:52', '2022-11-26 05:57:52'),
(156, 'Mega Discounts', 'خصومات ضخمة', '2022-11-26 05:58:11', '2022-11-26 05:58:11'),
(157, 'Easy returns', 'عوائد سهلة', '2022-11-26 05:59:03', '2022-11-26 05:59:03'),
(158, 'Within 30 days', 'خلال 30 يوما', '2022-11-26 05:59:22', '2022-11-26 05:59:22'),
(159, 'Safe delivery', 'التسليم الآمن', '2022-11-26 05:59:41', '2022-11-26 05:59:41'),
(160, 'Within 30 days', 'خلال 30 يوما', '2022-11-26 05:59:58', '2022-11-26 05:59:58'),
(161, 'Perfect Home Service Partner', 'شريك خدمة المنزل المثالي', '2022-11-26 06:00:27', '2022-11-26 06:00:27'),
(162, 'Address', 'تبوك', '2022-11-26 06:00:45', '2022-11-26 06:00:45'),
(163, 'DARDESIGN kuwait', 'DARDESIGN kuwait', '2022-11-26 06:01:07', '2022-11-26 06:01:07'),
(164, 'Call Us', 'اتصل بنا', '2022-11-26 06:01:30', '2022-11-26 06:01:30'),
(165, '(+965) - 540-025-124553', '(+965) - 540-025-124553', '2022-11-26 06:01:44', '2022-11-26 06:01:44'),
(166, 'Email', 'البريد الإلكتروني', '2022-11-26 06:02:06', '2022-11-26 06:02:06'),
(167, 'info@dardesign.com', 'info@dardesign.com', '2022-11-26 06:03:13', '2022-11-26 06:03:13'),
(168, 'Quick Menu', 'القائمة السريعة', '2022-11-26 06:04:39', '2022-11-26 06:04:39'),
(169, 'About Us', 'معلومات عنا', '2022-11-26 06:04:56', '2022-11-26 06:04:56'),
(170, 'Delivery Information', 'معلومات التوصيل', '2022-11-26 06:05:14', '2022-11-26 06:05:14'),
(171, 'Privacy Policy', 'سياسة الخصوصية', '2022-11-26 06:05:32', '2022-11-26 06:05:32'),
(172, 'Terms & Conditions', 'البنود و الظروف', '2022-11-26 06:05:54', '2022-11-26 06:05:54'),
(173, 'Contact Us', 'اتصل بنا', '2022-11-26 06:06:11', '2022-11-26 06:06:11'),
(174, 'Purchase Guide', 'دليل الشراء', '2022-11-26 06:06:31', '2022-11-26 06:06:31'),
(175, 'Corporate', 'شركة كبرى', '2022-11-26 06:06:51', '2022-11-26 06:06:51'),
(176, 'Become a Vendor or Professional', 'كن بائعًا أو محترفًا', '2022-11-26 06:07:11', '2022-11-26 06:07:11'),
(177, 'Vendor Login', 'تسجيل دخول البائع', '2022-11-26 06:07:28', '2022-11-26 06:07:28'),
(178, 'Vendor Guide', 'دليل البائع', '2022-11-26 06:07:46', '2022-11-26 06:07:46'),
(179, 'Professional Login', 'تسجيل دخول احترافي', '2022-11-26 06:08:07', '2022-11-26 06:08:07'),
(180, 'Professional Guide', 'دليل محترف', '2022-11-26 06:08:27', '2022-11-26 06:08:27'),
(181, 'Install App', 'تثبيت التطبيق', '2022-11-26 06:08:47', '2022-11-26 06:08:47'),
(182, 'From App Store or Google Play', 'من App Store أو Google Play', '2022-11-26 06:09:09', '2022-11-26 06:09:09'),
(183, 'Secured Payment Gateways', 'بوابات الدفع الآمنة', '2022-11-26 06:09:29', '2022-11-26 06:09:29'),
(184, '&copy; 2022, <strong class=\"text-brand\">DARDESIGN</strong> -  All rights reserved<br /> Developed By LRBINFOTECH', '&copy; 2022, <strong class=\"text-brand\">DARDESIGN</strong> -  All rights reserved<br /> Developed By LRBINFOTECH', '2022-11-26 06:10:32', '2022-11-26 06:10:32'),
(185, 'Follow Us', 'تابعنا', '2022-11-26 06:10:53', '2022-11-26 06:10:53'),
(186, 'Make your dream', 'اصنع حلمك', '2022-11-26 11:45:22', '2022-11-26 11:45:22'),
(187, 'home a reality', 'المنزل حقيقة واقعة', '2022-11-26 11:45:49', '2022-11-26 11:45:49'),
(188, 'Find inspiration, products and the pros to make it happen', 'ابحث عن الإلهام والمنتجات والمحترفين لتحقيق ذلك', '2022-11-26 11:46:38', '2022-11-26 11:46:38'),
(189, 'all in one place', 'كل ذلك في مكان واحد', '2022-11-26 11:47:30', '2022-11-26 11:47:30'),
(190, 'SignUp', 'اشتراك', '2022-11-26 11:47:52', '2022-11-26 11:47:52'),
(191, 'Join of Home', 'انضمام للمنزل', '2022-11-26 11:49:04', '2022-11-26 11:49:04'),
(192, 'Professionals', 'المهنيين', '2022-11-26 11:49:25', '2022-11-26 11:49:25'),
(193, 'Join', 'انضم', '2022-11-26 11:49:39', '2022-11-26 11:49:39'),
(194, 'SHOP BY DEPARTMENT', 'التسوق حسب الأقسام', '2022-11-26 11:50:33', '2022-11-26 11:50:33'),
(195, 'Do you love decorating the space around you?', 'هل تحب تزيين الفضاء من حولك؟', '2022-11-26 11:51:16', '2022-11-26 11:51:16'),
(196, 'Every room needs a touch of colours just as it needs one antique piece.', 'تحتاج كل غرفة إلى لمسة من الألوان تمامًا كما تحتاج إلى قطعة أثرية واحدة.', '2022-11-26 11:51:38', '2022-11-26 11:51:38'),
(197, 'Be it a corporate house or residential space, the need for Interior Designers has grown manifolds today, and therefore it has become a promising career option. With creative thinking and imaginative skills, Interior Designers can transform ordinary offices spaces, houses, hotels, etc. into masterpieces.', 'سواء كان ذلك منزلًا لشركة أو مساحة سكنية ، فقد نمت الحاجة إلى مصممي الديكور الداخلي اليوم ، وبالتالي أصبح خيارًا مهنيًا واعدًا. من خلال التفكير الإبداعي والمهارات التخيلية ، يمكن لمصممي الديكور الداخلي تحويل مساحات المكاتب والمنازل والفنادق وما إلى ذلك إلى روائع.', '2022-11-26 11:54:12', '2022-11-26 11:54:12'),
(198, 'View all', 'مشاهدة الكل', '2022-11-26 11:55:20', '2022-11-26 11:55:20'),
(199, 'Browse ideas by Room', 'تصفح الأفكار حسب الغرفة', '2022-11-26 11:55:41', '2022-11-26 11:55:41'),
(200, 'View your ideas', 'اعرض أفكارك', '2022-11-26 11:56:33', '2022-11-26 11:56:33'),
(201, 'Good ideas beget great designs', 'الأفكار الجيدة تولد تصاميم رائعة', '2022-11-26 11:56:50', '2022-11-26 11:56:50'),
(202, 'But design is nothing without details and finesse. We bring the experience and dedication to deliver your dream.', 'لكن التصميم لا يخلو من التفاصيل والبراعة. نأتي بالخبرة والتفاني لتحقيق حلمك.', '2022-11-26 11:57:12', '2022-11-26 11:57:12'),
(203, 'Contact the professional', 'تواصل مع المحترف', '2022-11-26 11:57:40', '2022-11-26 11:57:40'),
(204, 'View all', 'مشاهدة الكل', '2022-11-26 11:58:01', '2022-11-26 11:58:01');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_27_132829_create_admins_table', 1),
(6, '2022_06_28_130402_create_categories_table', 1),
(7, '2022_06_28_150233_create_reviews_table', 1),
(8, '2022_06_29_075113_create_settings_table', 1),
(9, '2022_06_29_164732_create_vendors_table', 1),
(10, '2022_06_30_074346_create_products_table', 2),
(11, '2022_07_01_030255_create_vendor_projects_table', 3),
(12, '2022_07_01_124230_create_shipping_addresses_table', 4),
(13, '2022_07_01_153807_create_attributes_table', 5),
(14, '2022_07_01_153929_create_attribute_fields_table', 5),
(15, '2022_07_01_154023_create_product_groups_table', 5),
(16, '2022_07_02_092120_create_vendor_enquiries_table', 6),
(17, '2022_07_02_184949_create_orders_table', 7),
(18, '2022_07_03_160439_create_professional_categories_table', 8),
(19, '2022_07_03_163544_create_favourites_table', 9),
(20, '2022_07_04_103051_create_product_images_table', 10),
(21, '2022_07_14_110843_create_product_attributes_table', 11),
(22, '2022_07_15_135317_create_project_images_table', 12),
(23, '2022_07_18_155606_create_idea_books_table', 13),
(24, '2022_07_18_155618_create_idea_book_images_table', 13),
(25, '2022_07_24_035711_create_order_attributes_table', 14),
(26, '2022_07_24_074305_create_idea_categories_table', 15),
(27, '2022_07_24_074316_create_cities_table', 15),
(28, '2022_07_25_072037_create_favourites_ideas_table', 16),
(29, '2022_07_25_092237_create_roles_table', 17),
(30, '2022_07_25_181346_create_coupons_table', 18),
(31, '2022_07_26_062740_create_brands_table', 19),
(32, '2022_07_26_110825_create_order_items_table', 20),
(33, '2022_08_08_103044_create_return_items_table', 21),
(34, '2022_08_09_084523_create_report_posts_table', 22),
(35, '2022_08_09_120633_create_return_reasons_table', 22),
(36, '2022_09_13_152830_create_packages_table', 23),
(37, '2016_06_01_000001_create_oauth_auth_codes_table', 24),
(38, '2016_06_01_000002_create_oauth_access_tokens_table', 24),
(39, '2016_06_01_000003_create_oauth_refresh_tokens_table', 24),
(40, '2016_06_01_000004_create_oauth_clients_table', 24),
(41, '2016_06_01_000005_create_oauth_personal_access_clients_table', 24),
(42, '2022_11_24_171656_create_languages_table', 25),
(43, '2023_01_10_080000_create_app_sliders_table', 26),
(44, '2023_01_11_173114_create_app_carts_table', 27),
(47, '2023_02_12_185150_create_product_specifications_table', 28),
(48, '2023_04_29_125053_create_vendor_customer_chats_table', 28),
(49, '2023_07_12_191728_create_countries_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'REdguj9pQhKr8E35PJnFmR0KsflcACnDCF5vMgS1', NULL, 'http://localhost', 1, 0, 0, '2022-11-21 14:16:41', '2022-11-21 14:16:41'),
(2, NULL, 'Laravel Password Grant Client', 'L01EkTVBMs898Q2KPxOH2mz19tKNTumssaZzn3se', 'users', 'http://localhost', 0, 1, 0, '2022-11-21 14:16:41', '2022-11-21 14:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-21 14:16:41', '2022-11-21 14:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_message` text COLLATE utf8mb4_unicode_ci,
  `sub_total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percentage` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceurl` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicestatus` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicereference` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delivery_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_percentage` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_description` text COLLATE utf8mb4_unicode_ci,
  `paid_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cancel_category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `vendor_id`, `customer_id`, `shipping_address_id`, `billing_address_id`, `order_message`, `sub_total`, `coupon_code`, `discount_value`, `after_discount`, `tax_percentage`, `tax_amount`, `shipping_charge`, `service_charge`, `total`, `payment_type`, `payment_status`, `payment_id`, `invoiceid`, `invoiceurl`, `invoicestatus`, `invoicereference`, `shipping_status`, `delivery_date`, `commission_percentage`, `commission_amount`, `paid_amount`, `paid_type`, `paid_description`, `paid_image`, `paid_status`, `status`, `cancel_category`, `cancel_description`, `created_at`, `updated_at`) VALUES
(1, '2023-07-18', '2', '1', '1', '1', NULL, '250', NULL, '0', NULL, '5', '11.9', '0', '1', '251', '1', '0', NULL, '1689682031', 'https://api.upayments.com/live/new-knet-payment?ref=yKGlJr2qbd1689682031168968203027765012864b6806eb923e&sess_id=6ce312321f8a4355f97c4a7fd2a6bd6e&alive=R1d4RTRxcEJ5ag==', NULL, NULL, '0', NULL, '3', '7.5', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '2023-07-18 06:37:11', '2023-07-18 06:37:14'),
(2, '2023-07-18', '1', '1', '1', '1', NULL, '90', NULL, '0', NULL, '5', '4.29', '0', '1', '91', '1', '0', NULL, '1689682031', 'https://api.upayments.com/live/new-knet-payment?ref=yKGlJr2qbd1689682031168968203027765012864b6806eb923e&sess_id=6ce312321f8a4355f97c4a7fd2a6bd6e&alive=R1d4RTRxcEJ5ag==', NULL, NULL, '0', NULL, '3', '2.7', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '2023-07-18 06:37:11', '2023-07-18 06:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_attributes`
--

CREATE TABLE `order_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_attributes`
--

INSERT INTO `order_attributes` (`id`, `order_id`, `product_id`, `attribute_name`, `attribute_value`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '5', 'Color', 'Red', '0', '2023-07-18 06:37:11', '2023-07-18 06:37:11'),
(2, '1', '5', 'Size', 'XL', '0', '2023-07-18 06:37:11', '2023-07-18 06:37:11'),
(3, '2', '2', 'Color', 'Yellow', '0', '2023-07-18 06:37:11', '2023-07-18 06:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_attributes` text COLLATE utf8mb4_unicode_ci,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `return_policy` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_return` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `date`, `order_id`, `vendor_id`, `customer_id`, `shipping_address_id`, `billing_address_id`, `product_attributes`, `product_id`, `product_name`, `price`, `qty`, `total`, `status`, `return_policy`, `return_date`, `is_return`, `created_at`, `updated_at`) VALUES
(1, '2023-07-18', '1', '2', '1', '1', '1', '<p>Color : Red</p><p>Size : XL</p>', '5', 'American Furniture Sierra Lodge Sofa, Red', '250', '1', '250', '0', '0', '2023-08-02', '0', '2023-07-18 06:37:11', '2023-07-18 06:37:11'),
(2, '2023-07-18', '2', '1', '1', '1', '1', '<p>Color : Yellow</p>', '2', 'Heritage Upholstered Velvet Sofa, Yellow', '90', '1', '90', '0', '0', '2023-08-02', '0', '2023-07-18 06:37:11', '2023-07-18 06:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `description`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Standard', NULL, '0', '15073926151663085283.png', '0', '2022-09-13 15:08:03', '2022-09-13 15:08:03');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_group` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubcategory` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''0''',
  `specifications` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `specifications_arabic` longtext COLLATE utf8mb4_unicode_ci,
  `description_arabic` longtext COLLATE utf8mb4_unicode_ci,
  `mobile_description` text COLLATE utf8mb4_unicode_ci,
  `mobile_specifications` text COLLATE utf8mb4_unicode_ci,
  `height_weight_size` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tax_percentage` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_enable` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `shipping_charge` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_description` text COLLATE utf8mb4_unicode_ci,
  `return_policy` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_days` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_description` text COLLATE utf8mb4_unicode_ci,
  `assured_seller` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_available` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_assured_seller` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `most_trusted` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku_value`, `vendor_id`, `product_group`, `product_code`, `hsn_code`, `product_name`, `product_name_arabic`, `brand`, `category`, `subcategory`, `subsubcategory`, `mrp_price`, `sales_price`, `stock_status`, `stock`, `specifications`, `description`, `specifications_arabic`, `description_arabic`, `mobile_description`, `mobile_specifications`, `height_weight_size`, `tax_type`, `tax_percentage`, `shipping_enable`, `shipping_charge`, `shipping_description`, `return_policy`, `return_days`, `return_description`, `assured_seller`, `delivery_available`, `rest_assured_seller`, `most_trusted`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1000000000', '1', '1', NULL, NULL, 'Heritage Upholstered Velvet Sofa, White', 'Heritage Upholstered Velvet Sofa, White', '3', '1', '6', '3', '100', '80', '0', '-1', NULL, NULL, NULL, NULL, 'American Furniture Sierra Lodge Sofa.\nBring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.', NULL, '35\"L x 86\"W x 30.5\"H', '0', NULL, '0', '0', NULL, '0', '15', NULL, '1', '1', '1', '1', '20668541341675537452.jpg', '1', '2023-02-04 16:34:12', '2023-07-14 08:15:01'),
(2, '1000000001', '1', '1', NULL, NULL, 'Heritage Upholstered Velvet Sofa, Yellow', NULL, '3', '1', '6', '3', '110', '90', '0', '7', NULL, NULL, NULL, NULL, 'American Furniture Sierra Lodge Sofa.\nBring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.', NULL, NULL, '0', NULL, '0', '0', NULL, '0', '15', NULL, '1', '1', '1', '1', '1857050801675538121.jpg', '1', '2023-02-04 16:45:21', '2023-07-14 08:15:07'),
(3, '1000000002', '1', '1', NULL, NULL, 'Heritage Upholstered Velvet Sofa, Red', NULL, '3', '1', '6', '3', '120', '100', '0', '1', NULL, '<p>An inspired take on the ever-popular classic, Heritage reflects the timeless silhouette of the traditional chesterfield sofa with its rolled armrests and deep button tufting, while chic nailhead trim offers a luxurious update. An elegant addition to living and lounge spaces alike, Heritage\'s stain-resistant velvet upholstery, broad profile, black birch wood legs, and dense foam padding grants a comfortable place to sit, relax, and entertain. Sofa Weight Capacity: 1322 lbs.</p>\r\n<p class=\"description-header\">Bullet Features:</p>\r\n<ul class=\"description-item-list\">\r\n<li class=\"description-item\">Chesterfield Style Sofa</li>\r\n<li class=\"description-item\">Stain-Resistant Velvet Upholstery</li>\r\n<li class=\"description-item\">Silver or Copper (Ivory Sofa) Nailhead Trim</li>\r\n<li class=\"description-item\">Deep Button Tufting</li>\r\n<li class=\"description-item\">Black Birch Wood Legs</li>\r\n<li class=\"description-item\">Sofa Weight Capacity: 1322 lbs.</li>\r\n<li class=\"description-item\">Assembly Required</li>\r\n</ul>\r\n<p class=\"description-header\">Set Includes:</p>\r\n<ul class=\"description-item-list\">\r\n<li class=\"description-item\">One - Heritage Sofa</li>\r\n</ul>\r\n<p class=\"description-header\">Product Dimensions:</p>\r\n<ul class=\"description-item-list\">\r\n<li class=\"description-item\">Overall Product Dimensions: 35\"L x 86\"W x 30.5\"H</li>\r\n<li class=\"description-item\">Seat Dimensions: 24\"L x 70.5\"W x 17.5\"H</li>\r\n<li class=\"description-item\">Armrest Dimension: 30.5\"H</li>\r\n<li class=\"description-item\">Armrest Height from Seat: 13.5\"H</li>\r\n</ul>', NULL, NULL, 'American Furniture Sierra Lodge Sofa.\r\nBring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.', NULL, '35\"L x 86\"W x 30.5\"H', '0', NULL, '0', '0', NULL, '0', '15', NULL, '1', '1', '1', '1', '841741021675538554.jpg', '1', '2023-02-04 16:52:34', '2023-07-14 08:15:12'),
(4, '1000000003', '2', '2', NULL, NULL, 'American Furniture Sierra Lodge Sofa , White', NULL, '1', '1', '6', '3', '1200', '1100', '0', '8', '<div class=\"left-column\">\n<div class=\"hzui-tabs hzui-tabs--theme-underline product-info-redesign redesign-phase-two hz-track-me\">\n<div id=\"1_TABPANEL\" class=\"hzui-tabs__content\" tabindex=\"0\">\n<div class=\"product-spec-item\">Product ID43711050</div>\n<div class=\"product-spec-item\">Manufactured By<a class=\"text-primary\" href=\"https://www.houzz.com/products/manufacturer--sherry3414\" target=\"_blank\" rel=\"noreferrer\">American Furniture Classics</a></div>\n<div class=\"product-spec-item\">Sold By<a class=\"text-primary\" href=\"https://www.houzz.com/pro/beyondstores/beyond-stores\" target=\"_blank\" rel=\"noreferrer\">Beyond Stores</a></div>\n<div class=\"product-spec-item\">Size/WeightW 88\" / D 37\" / H 36\" / 153 lb.</div>\n<div class=\"product-spec-item\">Assembly RequiredYes</div>\n<div class=\"product-spec-item\">Category<a class=\"\" href=\"https://www.houzz.com/products/sofas\" target=\"_blank\" rel=\"noreferrer\">Sofas</a></div>\n<div class=\"product-spec-item\">Style<a class=\"\" href=\"https://www.houzz.com/products/rustic/sofas\" target=\"_blank\" rel=\"noreferrer\">Rustic</a></div>\n</div>\n</div>\n</div>\n<div class=\"right-column\">&nbsp;</div>', '<p>American Furniture Sierra Lodge Sofa.<br />Bring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.</p>', NULL, NULL, 'American Furniture Sierra Lodge Sofa.\nBring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.', NULL, '88\" / D 37\" / H 36\" / 153 lb.', '0', NULL, '0', '0', NULL, '0', '15', NULL, '1', '1', '1', '1', '19671139171675611559.jpg', '1', '2023-02-05 13:09:19', '2023-07-14 08:15:17'),
(5, '8937745900', '2', '2', NULL, NULL, 'American Furniture Sierra Lodge Sofa, Red', NULL, '3', '1', '6', '4', '200', '250', '0', '15', '<div class=\"left-column\">\r\n<div class=\"hzui-tabs hzui-tabs--theme-underline product-info-redesign redesign-phase-two hz-track-me\">\r\n<div id=\"1_TABPANEL\" class=\"hzui-tabs__content\" tabindex=\"0\">\r\n<div class=\"product-spec-item\">Product ID43711050</div>\r\n<div class=\"product-spec-item\">Manufactured By<a class=\"text-primary\" href=\"https://www.houzz.com/products/manufacturer--sherry3414\" target=\"_blank\" rel=\"noreferrer\">American Furniture Classics</a></div>\r\n<div class=\"product-spec-item\">Sold By<a class=\"text-primary\" href=\"https://www.houzz.com/pro/beyondstores/beyond-stores\" target=\"_blank\" rel=\"noreferrer\">Beyond Stores</a></div>\r\n<div class=\"product-spec-item\">Size/WeightW 88\" / D 37\" / H 36\" / 153 lb.</div>\r\n<div class=\"product-spec-item\">Assembly RequiredYes</div>\r\n<div class=\"product-spec-item\">Category<a class=\"\" href=\"https://www.houzz.com/products/sofas\" target=\"_blank\" rel=\"noreferrer\">Sofas</a></div>\r\n<div class=\"product-spec-item\">Style<a class=\"\" href=\"https://www.houzz.com/products/rustic/sofas\" target=\"_blank\" rel=\"noreferrer\">Rustic</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"right-column\">&nbsp;</div>', '<p>American Furniture Sierra Lodge Sofa.<br />Bring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.</p>', NULL, NULL, 'American Furniture Sierra Lodge Sofa.\r\nBring the warmth and comfort of a Sierra Mountain Lodge into your home. Quality construction, featuring solid wood frames and solid wood legs, ensures years of enjoyment. Lodge-inspired tapestry, coupled with beautiful nail head accents, spice up the rustic appeal of this sofa. Soft, but supportive, cushions are filled with high-density foam and a layer of fiber wrap. This is a perfect sofa for your den or living room.', NULL, '88\" / D 37\" / H 36\" / 153 lb.', '0', NULL, '0', '0', NULL, '0', '15', NULL, '1', '1', '1', '1', '5161671421677046956.jpg', '1', '2023-02-22 03:52:36', '2023-07-14 07:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_field_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `vendor_id`, `product_id`, `product_group`, `attribute_id`, `attribute_field_id`, `attribute_value`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '6', '10', 'white', '0', '2023-02-04 16:34:12', '2023-02-04 16:34:12'),
(2, '1', '2', '1', '6', '12', 'Yellow', '0', '2023-02-04 16:45:21', '2023-02-04 16:45:21'),
(3, '1', '3', '1', '6', '11', 'Red', '0', '2023-02-04 16:52:34', '2023-02-04 16:52:34'),
(4, '2', '4', '2', '6', '10', 'white', '0', '2023-02-05 13:09:19', '2023-02-05 13:09:19'),
(5, '2', '5', '2', '6', '11', 'Red', '0', '2023-02-22 03:52:36', '2023-08-16 15:13:56'),
(6, '2', '5', '2', '7', '13', 'XL', '0', '2023-05-16 16:17:43', '2023-08-16 15:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `group_name`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Heritage Upholstered Velvet Sofa', '1', '0', '2023-02-04 15:42:37', '2023-02-04 15:42:37'),
(2, 'American Furniture Sierra Lodge Sofa', '2', '0', '2023-02-05 13:07:08', '2023-02-05 13:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `vendor_id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2121430611675538121.jpg', '0', '2023-02-04 16:45:21', '2023-02-04 16:45:21'),
(2, '1', '3', '18113020711675538554.jpg', '0', '2023-02-04 16:52:34', '2023-02-04 16:52:34'),
(3, '1', '3', '2190458011675538555.jpg', '0', '2023-02-04 16:52:35', '2023-02-04 16:52:35'),
(4, '2', '4', '1135841621675611559.jpg', '0', '2023-02-05 13:09:20', '2023-02-05 13:09:20'),
(5, '2', '4', '352003081675611560.jpg', '0', '2023-02-05 13:09:20', '2023-02-05 13:09:20'),
(6, '2', '4', '10291593101675611835.jpg', '0', '2023-02-05 13:09:20', '2023-02-05 13:13:55'),
(7, '2', '5', '8768945071677046956.jpg', '0', '2023-02-22 03:52:36', '2023-02-22 03:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `label`, `value`, `status`, `created_at`, `updated_at`) VALUES
(10, '5', 'Height', '50', '0', '2023-08-16 15:13:56', '2023-08-16 15:13:56'),
(11, '5', 'Width', '20', '0', '2023-08-16 15:13:56', '2023-08-16 15:13:56'),
(12, '5', 'Size', '30.5', '0', '2023-08-16 15:13:56', '2023-08-16 15:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `professional_categories`
--

CREATE TABLE `professional_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_categories`
--

INSERT INTO `professional_categories` (`id`, `date`, `parent_id`, `category`, `category_arabic`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', 'Design & Planning', 'التصميم والتخطيط', '3017923331658749648.jpeg', '15617531031658702264.jpg', '0', '2022-07-03 15:16:44', '2022-07-25 10:47:28'),
(2, NULL, '1', 'subcategory', 'تصنيف فرعي', '2147171922.jpg', NULL, '1', '2022-07-03 15:18:25', '2022-07-24 21:39:09'),
(3, NULL, '0', 'Construction', 'بناء', '6833324551656883799.jpeg', NULL, '0', '2022-07-03 20:29:59', '2022-07-03 20:55:14'),
(4, NULL, '0', 'Finishes & Fixtures', 'التشطيبات والتركيبات', '4150711391656883867.jpeg', NULL, '0', '2022-07-03 20:31:07', '2022-07-24 22:00:37'),
(5, NULL, '0', 'Landscaping & Outdoor', 'المناظر الطبيعية والخارجية', '19362408801656883908.jpeg', NULL, '0', '2022-07-03 20:31:48', '2022-07-24 22:09:30'),
(6, NULL, '0', 'Systems & Appliances', 'الأنظمة والأجهزة', '10621605951656883983.jpeg', NULL, '1', '2022-07-03 20:33:03', '2022-07-24 22:20:33'),
(7, NULL, '1', 'Architects & Building Designers', 'المهندسين المعماريين ومصممي المباني', '1180999510.png', '1067178243.png', '0', '2022-07-24 21:40:52', '2022-07-24 21:40:52'),
(8, NULL, '1', 'Design-Build Firms', 'شركات التصميم والبناء', '1213809992.png', '142406711.png', '0', '2022-07-24 21:42:59', '2022-07-24 21:42:59'),
(9, NULL, '1', 'Interior Designers & Decorators', 'مصممون داخليون وديكور', '331566040.png', '1238999381.png', '0', '2022-07-24 21:44:14', '2022-07-24 21:44:14'),
(10, NULL, '1', 'Kitchen & Bathroom Designers', 'مصممي المطابخ والحمامات', '917497260.png', '21127903.png', '0', '2022-07-24 21:45:31', '2022-07-24 21:45:31'),
(11, NULL, '1', 'Lighting Designers and Suppliers', 'مصممو وموردو الإضاءة', '649597156.png', '1148551574.png', '0', '2022-07-24 21:48:11', '2022-07-24 21:48:11'),
(12, NULL, '3', 'Construction & Renovation', 'البناء والتجديد', '526744510.png', '1354678149.png', '0', '2022-07-24 21:50:56', '2022-07-24 21:50:56'),
(13, NULL, '3', 'General Contractors', 'المقاولون العام', '1979645123.png', '1929342991.png', '0', '2022-07-24 21:52:30', '2022-07-24 21:52:30'),
(14, NULL, '3', 'Home Builders', 'باني منازل', '231557953.png', '1231411305.png', '0', '2022-07-24 21:54:14', '2022-07-24 21:54:14'),
(15, NULL, '3', 'Kitchen & Bathroom Remodellers', 'أجهزة إعادة تشكيل المطابخ والحمامات', '1338503116.png', '1451598360.png', '0', '2022-07-24 21:55:49', '2022-07-24 21:55:49'),
(16, NULL, '3', 'Home Additions', 'إضافات المنزل', '875531065.png', '1442883011.png', '0', '2022-07-24 21:57:54', '2022-07-24 21:57:54'),
(17, NULL, '3', 'Garage Building', 'مبنى المرآب', '508827145.png', '224283782.png', '0', '2022-07-24 21:59:18', '2022-07-24 21:59:18'),
(18, NULL, '4', 'Interior Designers & Decorators', 'مصممون داخليون وديكور', '16571975.png', '77992201.png', '0', '2022-07-24 22:03:38', '2022-07-24 22:03:38'),
(19, NULL, '4', 'Carpet Contractors', 'مقاولو السجاد', '685867390.png', '404170518.png', '0', '2022-07-24 22:05:06', '2022-07-24 22:05:06'),
(20, NULL, '4', 'Carpet Installation', 'تركيب السجاد', '409237603.png', '270154020.png', '0', '2022-07-24 22:05:36', '2022-07-24 22:05:36'),
(21, NULL, '4', 'Flooring Contractors', 'مقاولو الأرضيات', '2145256059.png', '101657444.png', '0', '2022-07-24 22:06:37', '2022-07-24 22:06:37'),
(22, NULL, '4', 'Wood Floor', 'الأرضيات الخشبية', '1064169362.png', '1379156198.png', '0', '2022-07-24 22:07:34', '2022-07-24 22:07:34'),
(23, NULL, '4', 'Refinishing', 'صقل', '915431496.png', '953966575.png', '0', '2022-07-24 22:08:55', '2022-07-24 22:08:55'),
(24, NULL, '5', 'Hardwood Flooring Dealers', 'تجار الأرضيات الخشبية', '455992593.png', '683321792.png', '0', '2022-07-24 22:11:19', '2022-07-24 22:11:19'),
(25, NULL, '5', 'Painters', 'الرسامين', '1438590349.png', '1770747027.png', '0', '2022-07-24 22:12:37', '2022-07-24 22:12:37'),
(26, NULL, '5', 'Landscape Contractors', 'مقاولو تنسيق حدائق', '1840717500.png', '2098664241.png', '0', '2022-07-24 22:14:39', '2022-07-24 22:14:39'),
(27, NULL, '5', 'Patio Design', 'تصميم الفناء', '1886211905.png', '498725866.png', '0', '2022-07-24 22:15:53', '2022-07-24 22:15:53'),
(28, NULL, '5', 'Paver Installation', 'تركيب رصف', '1146562490.png', '275885264.png', '0', '2022-07-24 22:17:10', '2022-07-24 22:17:10'),
(29, NULL, '5', 'Repair', 'بصلح', '1598333990.png', '544079318.png', '0', '2022-07-24 22:18:22', '2022-07-24 22:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `vendor_id`, `project_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '13685102461676958284.png', '0', '2023-02-21 03:14:44', '2023-02-21 03:14:44'),
(2, '1', '1', '5729419951676959730.jpg', '0', '2023-02-21 03:38:50', '2023-02-21 03:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `report_posts`
--

CREATE TABLE `report_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_attributes` text COLLATE utf8mb4_unicode_ci,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_attributes` text COLLATE utf8mb4_unicode_ci,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `return_pickup_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_items`
--

INSERT INTO `return_items` (`id`, `date`, `order_id`, `order_item_id`, `vendor_id`, `customer_id`, `shipping_address_id`, `billing_address_id`, `product_attributes`, `product_id`, `product_name`, `price`, `qty`, `total`, `return_reason`, `description`, `return_pickup_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, '2023-05-29', '35', '81', '1', '1', '1', '1', NULL, '2', 'Heritage Upholstered Velvet Sofa, Yellow', '90', NULL, '90', 'Order mismatch', NULL, 'testing', '1782232522.jpg', '0', '2023-05-29 12:22:29', '2023-05-29 12:22:29'),
(4, '2023-05-29', '35', '81', '1', '1', '1', '1', NULL, '2', 'Heritage Upholstered Velvet Sofa, Yellow', '90', NULL, '90', 'Order mismatch', NULL, 'testing', '283652400.jpg', '0', '2023-05-29 12:25:43', '2023-05-29 12:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `return_reasons`
--

CREATE TABLE `return_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_reasons`
--

INSERT INTO `return_reasons` (`id`, `date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Order mismatch', '0', '2022-08-09 11:16:42', '2022-08-09 11:16:42'),
(2, NULL, 'Order defect', '0', '2022-08-09 11:16:59', '2022-08-09 11:16:59'),
(3, NULL, 'This is not my order', '0', '2022-08-09 11:17:18', '2022-08-09 11:17:18'),
(4, NULL, 'Order damage', '0', '2022-08-09 11:17:36', '2022-08-09 11:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_category_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_category_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_category_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_category_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_category_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_category_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_create` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_delete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `dashboard`, `customers`, `vendors`, `reviews`, `product_category`, `product_category_create`, `product_category_edit`, `product_category_delete`, `professional_category`, `professional_category_create`, `professional_category_edit`, `professional_category_delete`, `idea_category`, `idea_category_create`, `idea_category_edit`, `idea_category_delete`, `city`, `city_create`, `city_edit`, `city_delete`, `orders`, `settlement_report`, `users`, `users_create`, `users_edit`, `users_delete`, `roles`, `roles_create`, `roles_edit`, `roles_delete`, `terms_and_conditions`, `privacy_policy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '0', '2022-07-25 09:18:07', '2022-07-25 09:18:07'),
(2, 'Store Managere', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', '0', '2023-06-14 13:47:17', '2023-06-14 13:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_iframe` text COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci,
  `terms_and_conditions` longtext COLLATE utf8mb4_unicode_ci,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci,
  `vendor_guide` longtext COLLATE utf8mb4_unicode_ci,
  `professional_guide` longtext COLLATE utf8mb4_unicode_ci,
  `purchase_guide` longtext COLLATE utf8mb4_unicode_ci,
  `delivery_information` longtext COLLATE utf8mb4_unicode_ci,
  `invoice_footer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `mobile`, `phone`, `address`, `city`, `area`, `map_iframe`, `latitude`, `longitude`, `logo_header`, `logo_footer`, `logo_favicon`, `about_us`, `terms_and_conditions`, `privacy_policy`, `vendor_guide`, `professional_guide`, `purchase_guide`, `delivery_information`, `invoice_footer`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>&lt;div class=\"page-content pt-50\"&gt;<br /> &lt;div class=\"container\"&gt;<br /> &lt;div class=\"row\"&gt;<br /> &lt;div class=\"col-xl-10 col-lg-12 m-auto\"&gt;<br /> &lt;section class=\"row align-items-center mb-50\"&gt;<br /> &lt;div class=\"col-lg-6\"&gt;<br /> &lt;img src=\"/assets/images/about-dar.gif\" alt=\"\" class=\"border-radius-15 mb-md-3 mb-lg-0 mb-sm-4\" /&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-6\"&gt;<br /> &lt;div class=\"pl-25\"&gt;<br /> &lt;h2 class=\"mb-30\"&gt;Welcome to DAR&lt;/h2&gt;<br /> &lt;p class=\"mb-25\"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.&lt;/p&gt;<br /> &lt;p class=\"mb-50\"&gt;Ius ferri velit sanctus cu, sed at soleat accusata. Dictas prompta et Ut placerat legendos interpre.Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante Etiam sit amet orci eget. Quis commodo odio aenean sed adipiscing. Turpis massa tincidunt dui ut ornare lectus. Auctor elit sed vulputate mi sit amet. Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.&lt;/p&gt;<br /> <br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/section&gt;<br /> &lt;section class=\"text-center mb-50\"&gt;<br /> &lt;h2 class=\"title style-3 mb-40\"&gt;What We Provide?&lt;/h2&gt;<br /> &lt;div class=\"row\"&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-1.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;Best Prices &amp; Offers&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-2.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;Wide Assortment&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-3.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;Free Delivery&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-4.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;Easy Returns&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-5.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;100% Satisfaction&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 col-md-6 mb-24\"&gt;<br /> &lt;div class=\"featured-card\"&gt;<br /> &lt;img src=\"/frontend/assets/imgs/theme/icons/icon-6.svg\" alt=\"\" /&gt;<br /> &lt;h4&gt;Great Daily Deal&lt;/h4&gt;<br /> &lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form&lt;/p&gt;<br /> &lt;a href=\"#\"&gt;Read more&lt;/a&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/section&gt;<br /> &lt;section class=\"row align-items-center mb-50\"&gt;<br /> &lt;div class=\"row mb-50 align-items-center\"&gt;<br /> &lt;div class=\"col-lg-7 pr-30\"&gt;<br /> &lt;img src=\"/assets/images/banner2.gif\" alt=\"\" class=\"mb-md-3 mb-lg-0 mb-sm-4\" /&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-5\"&gt;<br /> &lt;h4 class=\"mb-20 text-muted\"&gt;Our performance&lt;/h4&gt;<br /> &lt;h1 class=\"heading-1 mb-40\"&gt;Your Partner for e-commerce solution&lt;/h1&gt;<br /> &lt;p class=\"mb-30\"&gt;Ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto&lt;/p&gt;<br /> &lt;p&gt;Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia&lt;/p&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"row\"&gt;<br /> &lt;div class=\"col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5\"&gt;<br /> &lt;h3 class=\"mb-30\"&gt;Who we are&lt;/h3&gt;<br /> &lt;p&gt;Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.&lt;/p&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5\"&gt;<br /> &lt;h3 class=\"mb-30\"&gt;Our history&lt;/h3&gt;<br /> &lt;p&gt;Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.&lt;/p&gt;<br /> &lt;/div&gt;<br /> &lt;div class=\"col-lg-4\"&gt;<br /> &lt;h3 class=\"mb-30\"&gt;Our mission&lt;/h3&gt;<br /> &lt;p&gt;Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.&lt;/p&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/section&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt;<br /> <br /> <br /> &lt;/div&gt;</p>', '<div class=\"page-content pt-50\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xl-10 col-lg-12 m-auto\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-9\">\r\n<div class=\"single-page pr-30 mb-lg-0 mb-sm-5\">\r\n<div class=\"single-header style-2\">\r\n<p><strong>TERMS &amp; CONDITIONS</strong></p>\r\n<p>Welcome to DarStore, DarStore is an online platform dedicated to home renovation and design. We bring together homeowners, home professionals, sellers of home goods, and design enthusiasts. Through Dar Design, people can find or offer design ideas, advice, products and services related to home renovation and design.</p>\r\n<p>&nbsp;</p>\r\n<p>These Terms and Conditions (the \"Terms\" or the \"Agreement\") set forth the binding legal agreement between you and Dar Design. The Agreement governs your use of www.darstore.me and all of the related websites, mobile apps, products and services offered by Dar Design, including our plug-ins and browser extensions (collectively, the \"Dar Design Platform\").</p>\r\n<p>&nbsp;</p>\r\n<p>We refer to the e-commerce marketplace on the Dar Design Platform as the \"Dar store.\" If you visit or make a purchase or sale through the Dar Shop through www.darstore.me or the related mobile app experience, or if you create an account on the Dar Design Platform, then this Agreement is also between you and Dar Design L.L.C., shall be referred to as \" Dar Design,&rdquo; &ldquo;Dar&rdquo;,\" \"we,\" or \"us\" in this Agreement.</p>\r\n<p>&nbsp;</p>\r\n<p>The Terms cover your agreement to grant us rights to your content, our limitation of liability to you, governing law and, if you choose to provide us with your phone number, your agreement to receive calls and text messages from us in accordance with applicable law. By agreeing to these Terms, you agree to resolve all disputes through the Kuwaiti Courts.</p>\r\n<p>&nbsp;</p>\r\n<p>We encourage you to review this Agreement carefully. By accessing or using Dar Design Platform in any way, you are agreeing to these Terms in their entirety. If you do not agree to any of the Terms, you may not use Dar Design Platform.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Using Dar Design Platform.</strong></li>\r\n</ol>\r\n<p>Registration. Access to certain services of Dar Design Platform will require you to register with us and to create a profile on our Platform. If you register with Dar Design, you agree to provide us with accurate information and update it as needed for accuracy. We will treat personal information you provide as part of registration in accordance with our Privacy Policy. You also may have the option to register for an account by linking your Facebook or Google account.</p>\r\n<p>Privacy Policy. Our privacy practices are set forth in our Privacy Policy. By using the Dar Design Platform in any way, you understand and acknowledge that the terms of the Privacy Policy apply to you, regardless of whether you have created an account on Darstore.</p>\r\n<p>Profile for Professionals. If you are a professional services provider, you may set up a Professional Profile. If you do, you give us the right to list your Professional Profile in our directory of service providers, and you will be able to connect with others on the Dar Design Platform while identified by your professional profile.</p>\r\n<p>Acceptable Use Policy. When using Dar Design Platform, you agree to abide by common standards of etiquette and act in accordance with the law.</p>\r\n<p>Prohibited Products Policy. If you are a professional, vendor, or seller, who is authorized to offer products through DarStore, you agree to abide by the Prohibited Products Policy.</p>\r\n<p>Termination. You may close your account at any time by going to account settings and deactivating your account. We may permanently or temporarily suspend your use of Dar Design Platform at any time for any reason, without any notice or liability to you. We may terminate your account at any time for any or no reason.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. Our Content and Materials.</strong></p>\r\n<p>Definition of Our Content and Materials. All intellectual property in or related to the Dar Design Platform (specifically including, but not limited to, our software, Dar Design marks, and Dar Design logo (\"Our Content and Materials\").</p>\r\n<p>No Endorsement or Verification. Please note that the Dar Design Platform enables access to third-party content, products, and services, and it offers interactions with third-parties that we do not control. We assume no responsibility for, nor do we endorse or verify the content, offerings or conduct of third-parties (including but not limited to the products or services offered by third-parties or the descriptions of the products or services offered by third-parties). We make no warranties or representations with respect to the accuracy, completeness or timeliness of any content posted on the Dar Design Platform by anyone.</p>\r\n<p>Restrictions. Except as expressly provided in these Terms, you agree not to use, modify, reproduce, distribute, sell, license, reverse engineer, decompile, or otherwise exploit Our Content and Materials without our express written permission.</p>\r\n<p>Ownership. You acknowledge and agree that the Dar Design Platform and Dar Design marks will remain the property of Dar Design. The content, information and services made available on the Dar Design Platform are protected by Kuwait and international copyright, trademark, and other laws, and you acknowledge that these rights are valid and enforceable. You acknowledge that you do not acquire any ownership rights by using the Dar Design Platform</p>\r\n<p><strong>3. Offerings on the Dar Design Platform.</strong></p>\r\n<p>Third-Party Products. You may be provided the opportunity on the Dar Design Platform to purchase products that are offered by third parties (collectively \"Third-Party Products\"). The availability of any Third-Party Product on Dar Design Platform does not imply our endorsement of the Third-Party Product.</p>\r\n<p>Third-Party Services. You may be provided the opportunity on Dar Design Platform to purchase services that are offered by third parties (collectively \"Third-Party Services\"), including those offered by professionals registered with Professional Profiles on the Dar Design Platform. The availability of any Third-Party Services on the Dar Design Platform does not imply our endorsement of the Third-Party Services.</p>\r\n<p>Third-Party Sites. Dar Design Platform may contain links to other websites (the \"Third-Party Sites\") for your convenience. We do not control the linked websites or the content provided through such Third-Party Sites. Your use of Third-Party Sites is subject to the privacy practices and terms of use established by the specific linked Third-Party Site, and we disclaim all liability for such use. The availability of such links does not indicate any approval or endorsement by us.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>4. Disclaimers and Limitations of Liability.</strong></p>\r\n<p>PLEASE READ THIS SECTION CAREFULLY SINCE IT LIMITS THE LIABILITY OF DAR DESIGN TO YOU.</p>\r\n<p>&nbsp;</p>\r\n<p>\"DAR DESIGN\" MEANS DAR DESIGN LLC, AND ANY SUBSIDIARIES, AFFILIATES, RELATED COMPANIES, SUPPLIERS, LICENSORS AND PARTNERS, AND THE OFFICERS, DIRECTORS, EMPLOYEES, AGENTS AND REPRESENTATIVES OF EACH OF THEM. EACH PROVISION BELOW APPLIES TO THE MAXIMUM EXTENT PERMITTED UNDER APPLICABLE LAW:</p>\r\n<p>&nbsp;</p>\r\n<p>WE ARE PROVIDING YOU THE DAR DESIGN PLATFORM, SERVICES, INFORMATION, AND THIRD-PARTY CONTENT ON AN \"AS IS\" AND \"AS AVAILABLE\" BASIS, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED. WITHOUT LIMITING THE FOREGOING, DAR DESIGN EXPRESSLY DISCLAIM ANY AND ALL WARRANTIES AND CONDITIONS OF MERCHANTABILITY, TITLE, ACCURACY AND COMPLETENESS, UNINTERRUPTED OR ERROR-FREE SERVICE, FITNESS FOR A PARTICULAR PURPOSE, QUIET ENJOYMENT, AND NON-INFRINGEMENT, AND ANY WARRANTIES ARISING OUT OF COURSE OF DEALING OR TRADE USAGE.</p>\r\n<p>DAR DESIGN MAKE NO PROMISES WITH RESPECT TO, AND EXPRESSLY DISCLAIM ALL LIABILITY, TO THE MAXIMUM EXTENT PERMITTED BY LAW, FOR: (i) CONTENT POSTED BY ANY THIRD-PARTY ON DAR DESIGN PLATFORM, (ii) THE PRODUCT DESCRIPTIONS OR PRODUCTS, (iii) THIRD-PARTY SITES AND ANY THIRD-PARTY PRODUCT OR SERVICE LISTED ON OR ACCESSIBLE TO YOU THROUGH THE SITE, AND (iv) THE QUALITY OR CONDUCT OF ANY THIRD-PARTY YOU ENCOUNTER IN CONNECTION WITH YOUR USE OF THE SITE.</p>\r\n<p>YOU AGREE THAT UNDER THE MAXIMUM EXTENT PERMITTED BY LAW, DAR DESIGN WILL NOT BE LIABLE TO YOU. AND YOU AGREE THAT DAR DESIGN SPECIFICALLY WILL NOT BE LIABLE FOR (i) ANY INDIRECT, INCIDENTAL, CONSEQUENTIAL, SPECIAL, OR EXEMPLARY DAMAGES, LOSS OF PROFITS, BUSINESS INTERRUPTION, REPUTATIONAL HARM, OR LOSS OF DATA (EVEN IF DAR DESIGN HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES OR SUCH DAMAGES ARE FORESEEABLE) ARISING OUT OF AND IN ANY WAY CONNECTED WITH YOUR USE OF, OR INABILITY TO USE, DAR DESIGN PLATFORM. YOUR USE OF DAR DESIGN PLATFORM, PRODUCTS, INFORMATION, OR SERVICES IS AT YOUR SOLE RISK</p>\r\n<p>&nbsp;</p>\r\n<p><strong>5. Indemnification.</strong></p>\r\n<p>You agree to fully indemnify, defend, and hold Dar Design and their directors, officers, employees, consultants, and other representatives, harmless from and against any and all claims, damages, losses, costs (including reasonable attorneys\' fees), and other expenses that arise directly or indirectly out of or from: (a) your breach of any part of this Agreement, including but not limited to all the Policy&rsquo;s; (b) any allegation that any materials you submit to us or transmit to Dar Design Platform infringe or otherwise violate the copyright, patent, trademark, trade secret, or other intellectual property or other rights of any third party; (c) your activities in connection with Dar Design Platform or other websites to which Dar Design Platform is linked; and/or (d) your negligent or willful misconduct.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>6. Dispute Resolution.</strong></p>\r\n<p>If you have a dispute arises with Dar Design, you agree to contact us through darstore.me to attempt to resolve the issue informally first. If we are not able to resolve the dispute informally, then this section will govern any legal dispute that relates to Dar Design Platform or involves our services.</p>\r\n<p>Governing Law &amp; Jurisdiction: if any dispute arises and cannot be settled amicably, shall be referred to the courts of the State of Kuwait, and the laws of Kuwait shall apply.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>7. Miscellaneous.</strong></p>\r\n<p>Supplemental Terms for Certain Services. Certain services offered on Dar Design Platform may require you to enter into a separate agreement and/or be subject to additional terms. For example: placement of advertisements, participation in brand services, offering products for sale on Dar Design Platform, or use of Site Designer each require you to enter into a separate agreement with terms specific to that service. In the event of any conflict between this Agreement and the terms of that separate agreement, the terms of this Agreement will control.</p>\r\n<p>Application Provider Terms. If you access Dar Design Platform through a Darstore application, you acknowledge that this Agreement is between you and Dar Design only, and not with another application service or application platform provider (such as Apple, Inc. or Google Inc.), which may provide you the application subject to its own terms.</p>\r\n<p>Controlling Law and Jurisdiction. This Agreement will be interpreted in accordance with the laws of the State of Kuwait and the Kuwaiti courts shall have exclusive jurisdiction to settle any dispute between us that may arise.</p>\r\n<p><strong>Changes. We reserve the right to:</strong></p>\r\n<ol>\r\n<li>change the terms of this Agreement, consistent with applicable law;</li>\r\n<li>change Dar Design Platform, including eliminating or discontinuing any information or services or other features in whole or in part; and</li>\r\n</ol>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; iii. deny or terminate your Darstore account, or use of and access to Dar Design Platform.</p>\r\n<p>Languages. The English version of this Agreement will be the binding version and all communications, notices and other actions and proceedings relating to this Agreement will be made and conducted in English, even if we choose to provide translations of this Agreement into the native languages in certain countries. To the extent allowed by law, any inconsistencies among the different translations will be resolved in favor of the English version.</p>\r\n<p>Assignment. No terms of this Agreement, nor any right, obligation, or remedy hereunder is assignable, transferable, delegable, or sub licensable by you except with Dar Design prior written consent. Dar Design may assign, transfer, or delegate this Agreement or any right or obligation or remedy hereunder in its sole discretion.</p>\r\n<p>Waiver. Our failure to assert a right or provision under this Agreement will not constitute a waiver of such right or provision.</p>\r\n<p>Headings. Any heading, caption, or section title contained is inserted only as a matter of convenience and in no way defines or explains any section or provision hereof.</p>\r\n<p>Entire Agreement and Severability. This Agreement supersedes all prior terms, agreements, discussions and writings regarding the Dar Design Platform and constitutes the entire agreement between you and us regarding Dar Design Platform. If any part of this Agreement is found to be unenforceable, then that part will not affect the enforceability of the remaining parts of the Agreement, which will remain in full force and effect.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<p><strong>PRIVACY POLICY</strong></p>\r\n<p>Dar Design is committed to respecting your privacy and protecting the information you share with us. The purpose of this Privacy Policy is to inform you what information we may collect from you, how we use such information, and the choices you have regarding our use of, and your ability to review, correct and opt out of our use of, the information. By using any of our web sites or applications or sharing your contact information with us, you are accepting and consenting to the practices described in this Privacy Policy.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>COLLECTING INFORMATION ABOUT YOU</strong></p>\r\n<p>There may be times (such as when you purchase or order a product, subscribe to a service, register to a newsletter, or participate in contests, sweepstakes or promotions, etc.) when we ask you to provide certain contact information about yourself, such as your name, phone number, email address, credit card information and other information. We may also keep a record of your product purchases.</p>\r\n<p>Whether or not to provide such information is completely your own choice. But if you choose not to provide the information we request, you may be unable to use certain services we provide or purchase products or take advantage of offers.</p>\r\n<p>We may track the Internet domain address from which people visit us and analyze this data for preferences, trends, and site usage statistics, but individual users will remain anonymous, unless you voluntarily provide more information.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>USING INFORMATION ABOUT YOU</strong></p>\r\n<p>We use your contact information for internal purposes only, such as: confirming and tracking your order, subscription, or registration; analyzing preferences, trends, and statistics; informing you of third party or our new products, services, and offers; and providing you with other information from and about Darstore or Dar Design.</p>\r\n<p>We process your contact information only in ways compatible with the purposes for which it was collected or authorized by you. To the extent necessary for such purposes, we take reasonable steps to make sure that your contact information is accurate, complete, current, and otherwise reliable with regard to its intended use.</p>\r\n<p>To serve you better, we may combine information you give us online or over the phone. This information may be used to enhance and personalize the shopping experience you or other customers, to communicate with you about our products and events that you may be interested in, and for other promotional purposes.</p>\r\n<p>We may contract with companies or persons to provide certain services including credit card processing, shipping, data management, promotional services, etc. We allow third&ndash;party companies to serve ads and/or collect certain anonymous information when you visit our web sites or application. These companies may use non&ndash;personally identifiable information during your visits to this and other web sites in order to provide advertisements about goods and services you are likely to be interested in. These companies typically use a cookie or third party tool to collect this information.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>COOKIES</strong></p>\r\n<p>When you visit our web sites or application, we send one or more \"cookies\" to your computer or other device. We may also use cookies in emails that you receive from us. A \"cookie\" is a small data file that is placed on the hard drive of your computer when you visit a web site. A \"session cookie\" expires immediately when you end your session (i.e., close your browser). A \"persistent cookie\" stores information on the hard drive so when you end your session and return to the same web site at a later date the cookie information is still available. Generally, we use cookies to improve the quality of our service when you visit our web site or application and other web sites of interest to you. We also use cookies to remind us of who you are, tailor our products, services and advertising to suit the personal interests of you and others, estimate our audience size, assist our online merchants to track visits to and sales at our web sites or application and to process your order, track your status in our promotions, contests and sweepstakes, and/or analyze your visiting patterns.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>SECURITY</strong></p>\r\n<p>We maintain physical, electronic, and procedural safeguards to protect the confidentiality and security of information transmitted to us. Unfortunately, however, no data transmission over the Internet can be guaranteed to be 100% secure. As a result, while we strive to protect your contact information, to the extent permitted by law, we do not guarantee security of all data transmitted through our site, and should you choose to provide data to us, you do so at your own risk.</p>\r\n<p>We urge you to keep any password that you establish with us in a safe place and not to divulge it to anyone. Also remember to log off your account and close your browser window when you have finished your visit. This is to ensure that others cannot access your account, especially if you are sharing a computer with someone else or are using a computer in a public place.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>LINKS TO THIRD PARTY WEBSITES</strong></p>\r\n<p>Our web sites may contain links to web sites operated and maintained by third parties, over which we have no control. Privacy policies on such linked web sites may be different from our privacy policy. You access such linked web sites at your own risk. You should always read the privacy policy of a linked web site before disclosing any of your information on such web site.</p>\r\n<div class=\"page-content pt-50\">&nbsp;</div>', '<div class=\"page-content pt-50\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-5 mx-auto text-center\">\r\n<h1 class=\"title heading-1 style-3 mb-40\">Start an online retail business with <span class=\"text-brand\">Nest</span> today</h1>\r\n<p class=\"font-xl mb-80\">Sell your products and accept credit card payments from buying customers. Shopify gives you everything you need to run a successful online store.</p>\r\n</div>\r\n<div class=\"col-xl-10 col-lg-12 m-auto\">\r\n<section class=\"text-center mb-50\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-1.svg\" alt=\"\" />\r\n<h4>Best Prices &amp; Offers</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-2.svg\" alt=\"\" />\r\n<h4>Wide Assortment</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-3.svg\" alt=\"\" />\r\n<h4>Free Delivery</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n<div class=\"col-xl-8 col-lg-12 mx-auto\">\r\n<div class=\"single-content mb-50\">\r\n<h3>1. Account Registering</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>\r\n<ul class=\"mb-30\">\r\n<li>Name (required)</li>\r\n<li>Age (required)</li>\r\n<li>Date of birth (required)</li>\r\n<li>Passport/ ID no. (required)</li>\r\n<li>Current career (required)</li>\r\n<li>Mobile phone numbers (required)</li>\r\n<li>Email address (required)</li>\r\n<li>Hobbies &amp; interests (optional)</li>\r\n<li>Social profiles (optional)</li>\r\n</ul>\r\n<h3>2. Choose a package</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>\r\n<h3>3. Add your products</h3>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>\r\n<h3>4. Start selling</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>\r\n<h3>5. Accepted Credit Cards</h3>\r\n<ul>\r\n<li>Visa</li>\r\n<li>Mastercards</li>\r\n<li>American Express</li>\r\n<li>Discover</li>\r\n</ul>\r\n*Taxes are calculated by your local bank and location.\r\n<h3 class=\"mt-30\">6. Get money</h3>\r\n<ul>\r\n<li>Updated content on a regular basis</li>\r\n<li>Secure &amp; hassle-free payment</li>\r\n<li>1-click checkout</li>\r\n<li>Easy access &amp; smart user dashboard</li>\r\n</ul>\r\n</div>\r\n<div class=\"contact-from-area padding-20-row-col mb-80\">\r\n<h5 class=\"text-brand mb-10\">Contact form</h5>\r\n<h2 class=\"mb-10\">Drop Us a Line</h2>\r\n<p class=\"text-muted mb-30 font-sm\">Your email address will not be published. Required fields are marked *</p>\r\n<form id=\"contact-form\" class=\"contact-form-style mt-30\" action=\"#\" method=\"post\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"name\" type=\"text\" placeholder=\"First Name\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"email\" type=\"email\" placeholder=\"Your Email\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"telephone\" type=\"tel\" placeholder=\"Your Phone\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"subject\" type=\"text\" placeholder=\"Subject\" /></div>\r\n</div>\r\n<div class=\"col-lg-12 col-md-12\">\r\n<div class=\"textarea-style mb-30\"><textarea name=\"message\" placeholder=\"Message\"></textarea></div>\r\n</div>\r\n</div>\r\n</form></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"page-content pt-50\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-5 mx-auto text-center\">\r\n<h1 class=\"title heading-1 style-3 mb-40\">Start an online retail business with <span class=\"text-brand\">Nest</span> today</h1>\r\n<p class=\"font-xl mb-80\">Sell your products and accept credit card payments from buying customers. Shopify gives you everything you need to run a successful online store.</p>\r\n</div>\r\n<div class=\"col-xl-10 col-lg-12 m-auto\">\r\n<section class=\"text-center mb-50\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-1.svg\" alt=\"\" />\r\n<h4>Best Prices &amp; Offers</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-2.svg\" alt=\"\" />\r\n<h4>Wide Assortment</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n<div class=\"col-lg-4 col-md-6 mb-24\">\r\n<div class=\"featured-card\"><img src=\"assets/imgs/theme/icons/icon-3.svg\" alt=\"\" />\r\n<h4>Free Delivery</h4>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>\r\n<a href=\"#\">Read more</a></div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n<div class=\"col-xl-8 col-lg-12 mx-auto\">\r\n<div class=\"single-content mb-50\">\r\n<h3>1. Account Registering</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>\r\n<ul class=\"mb-30\">\r\n<li>Name (required)</li>\r\n<li>Age (required)</li>\r\n<li>Date of birth (required)</li>\r\n<li>Passport/ ID no. (required)</li>\r\n<li>Current career (required)</li>\r\n<li>Mobile phone numbers (required)</li>\r\n<li>Email address (required)</li>\r\n<li>Hobbies &amp; interests (optional)</li>\r\n<li>Social profiles (optional)</li>\r\n</ul>\r\n<h3>2. Choose a package</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>\r\n<h3>3. Add your products</h3>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>\r\n<h3>4. Start selling</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>\r\n<h3>5. Accepted Credit Cards</h3>\r\n<ul>\r\n<li>Visa</li>\r\n<li>Mastercards</li>\r\n<li>American Express</li>\r\n<li>Discover</li>\r\n</ul>\r\n*Taxes are calculated by your local bank and location.\r\n<h3 class=\"mt-30\">6. Get money</h3>\r\n<ul>\r\n<li>Updated content on a regular basis</li>\r\n<li>Secure &amp; hassle-free payment</li>\r\n<li>1-click checkout</li>\r\n<li>Easy access &amp; smart user dashboard</li>\r\n</ul>\r\n</div>\r\n<div class=\"contact-from-area padding-20-row-col mb-80\">\r\n<h5 class=\"text-brand mb-10\">Contact form</h5>\r\n<h2 class=\"mb-10\">Drop Us a Line</h2>\r\n<p class=\"text-muted mb-30 font-sm\">Your email address will not be published. Required fields are marked *</p>\r\n<form id=\"contact-form\" class=\"contact-form-style mt-30\" action=\"#\" method=\"post\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"name\" type=\"text\" placeholder=\"First Name\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"email\" type=\"email\" placeholder=\"Your Email\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"telephone\" type=\"tel\" placeholder=\"Your Phone\" /></div>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6\">\r\n<div class=\"input-style mb-20\"><input name=\"subject\" type=\"text\" placeholder=\"Subject\" /></div>\r\n</div>\r\n<div class=\"col-lg-12 col-md-12\">\r\n<div class=\"textarea-style mb-30\"><textarea name=\"message\" placeholder=\"Message\"></textarea></div>\r\n</div>\r\n</div>\r\n</form></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"page-content pt-50\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xl-10 col-lg-12 m-auto\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-9\">\r\n<div class=\"single-page pr-30 mb-lg-0 mb-sm-5\">\r\n<div class=\"single-header style-2\">\r\n<h2>Purchase Guide<img class=\"border-radius-15\" src=\"assets/imgs/page/guide-1.png\" alt=\"\" /></h2>\r\n</div>\r\n<div class=\"single-content mb-50\">\r\n<h3>1. Account Registering</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>\r\n<ul class=\"mb-30\">\r\n<li>Name (required)</li>\r\n<li>Age (required)</li>\r\n<li>Date of birth (required)</li>\r\n<li>Passport/ ID no. (required)</li>\r\n<li>Current career (required)</li>\r\n<li>Mobile phone numbers (required)</li>\r\n<li>Email address (required)</li>\r\n<li>Hobbies &amp; interests (optional)</li>\r\n<li>Social profiles (optional)</li>\r\n</ul>\r\n<h3>2. Select Product</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>\r\n<h3>3. Confirm Order Content</h3>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>\r\n<h3>4.Transaction Completed</h3>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>\r\n<h3>5. Accepted Credit Cards</h3>\r\n<ul>\r\n<li>Visa</li>\r\n<li>Mastercards</li>\r\n<li>American Express</li>\r\n<li>Discover</li>\r\n</ul>\r\n*Taxes are calculated by your local bank and location.\r\n<h3 class=\"mt-30\">6. Download and Setup</h3>\r\n<ul>\r\n<li>Updated content on a regular basis</li>\r\n<li>Secure &amp; hassle-free payment</li>\r\n<li>1-click checkout</li>\r\n<li>Easy access &amp; smart user dashboard</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-3 primary-sidebar sticky-sidebar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '<div>All information in the Service is provided \"as is\", with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability and fitness for a particular purpose.</div>\r\n<div>The Company will not be liable to You or anyone else for any decision made or action taken in reliance on the information given by the Service or for any consequenti&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>\r\n<div>If you have any questions about this Disclaimer, You can contact Us:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n<div>By email: info@darstore.org</div>', NULL, '2023-08-14 19:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avenue` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_description` text COLLATE utf8mb4_unicode_ci,
  `landmark` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `customer_id`, `address_type`, `contact_person`, `contact_mobile`, `street`, `street_name`, `block`, `avenue`, `building_no`, `floor_no`, `apartment_no`, `additional_description`, `landmark`, `country`, `country_code`, `city`, `area`, `zipcode`, `is_active`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'House', 'prasanth', '9876543210', 'Test Street', NULL, 'D Block', NULL, '403', NULL, NULL, NULL, NULL, '🇰🇼    Kuwait', NULL, 'Capital Governorate', 'Kuwait City', NULL, '1', '0', '2023-07-18 06:37:10', '2023-07-18 06:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_unique_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `user_unique_id`, `username`, `first_name`, `last_name`, `mobile`, `email`, `firebase_key`, `password`, `remember_token`, `city`, `area`, `zipcode`, `country`, `country_code`, `profile_image`, `cover_image`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-02-03', '18208992101675383899', NULL, 'prasanth', 's', '86681746', 'prasanthats@gmail.com', NULL, '$2y$10$xWa4XKnBxAyd4q.R0VnI1OD7lCYUvNl3v4C0/DOjErLySRpoZ.xGu', NULL, 'Al Ahmadi Governorate', 'Al Aḩmadī', '13245', '🇰🇼    Kuwait', NULL, NULL, NULL, '1', '2023-02-02 18:54:59', '2023-07-18 07:29:45'),
(2, '2023-07-18', '6775519091689673485', NULL, 'test', 'account', '9876543210', 'prasanth1@gmail.com', NULL, '$2y$10$h.tKi7HWszCeMzibNmDXx.cZI3p8rI0eN3GtszWGB6rVCyBV0M3G.', NULL, 'Al Ahmadi Governorate', 'Al Aḩmadī', NULL, 'Kuwait', NULL, NULL, NULL, '0', '2023-07-18 04:14:45', '2023-07-18 04:14:45'),
(3, '2023-07-18', '5466083681689674059', NULL, 'test', 'account', '9876543211', 'prasanth2@gmail.com', NULL, '$2y$10$wZ/7dvWXsVoJMN.kWp/3lOIcGzMvZ9ydfxrrcflYDt4...EvSCpq2', NULL, 'Al Ahmadi Governorate', 'Al Aḩmadī', NULL, 'Kuwait', NULL, NULL, NULL, '1', '2023-07-18 04:24:19', '2023-07-18 04:24:19'),
(4, '2023-07-18', '3654642021689675138', NULL, 'test', 'account', '9876543213', 'prasanth3@gmail.com', NULL, '$2y$10$l2jcKM6XxiS96QQAtkv.f.mg9jeGa15iqRlM/PDKYlNhuCSw5PR.y', NULL, 'Al Jahra Governorate', 'Al Jahrā’', NULL, '🇰🇼    Kuwait', NULL, NULL, NULL, '1', '2023-07-18 04:42:18', '2023-07-18 04:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_unique_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_email_verify` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_certificate_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civi_id_or_passport` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_license_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proof` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civi_id_or_passport_copy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_license_copy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_of_association` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `vendor_commission` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `package_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_pay` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_paid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_balance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_unique_id`, `email`, `is_email_verify`, `email_verified_at`, `remember_token`, `date`, `username`, `business_type`, `business_category`, `business_name`, `first_name`, `last_name`, `mobile`, `trade_license_no`, `vat_certificate_no`, `civi_id_or_passport`, `commercial_license_no`, `id_proof`, `civi_id_or_passport_copy`, `commercial_license_copy`, `article_of_association`, `password`, `city`, `area`, `zipcode`, `address`, `country`, `country_code`, `website`, `landline`, `about_us`, `cover_image`, `profile_image`, `login_status`, `status`, `user_id`, `role_id`, `vendor_commission`, `package_id`, `account_number`, `account_name`, `bank_name`, `iban_number`, `swift_code`, `admin_pay`, `admin_paid`, `admin_balance`, `created_at`, `updated_at`) VALUES
(1, '7855909421675533724', 'aravind@lrbinfotech.com', '0', NULL, 'Uoymbdm0SetHLzrK6R9OkR3ZUAYlt0kjV9wLkOc2Cp7Ghs3202OMfGVlJloq', '2023-02-04', 'aravind0216', '1', NULL, 'Furniture Mart', 'Aravindkumar', 'R', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$GVqkfqmawlzTra8V3AbzYuirg4GCtN79.aJmoNmTUrCOXAKIWljEy', '1', '3', '123456', 'Kuwait', '1', NULL, NULL, NULL, NULL, NULL, '6603678181676958894.png', '0', '1', NULL, 'admin', '3', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-04 15:32:04', '2023-02-21 03:24:54'),
(2, '6390354921675611238', 'prasanthats@gmail.com', '0', NULL, 'wFBeZruSCraKCIqxgyMlN6gIbR4pkIAL4G5Es72wva30y9DSWdH0bdKyF4B9', '2023-02-05', NULL, '0', NULL, 'Lrbinfotech', 'Prasanth', 'Prasanth', '986543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$0.yf0oe3U98lp5GvuEP6UOcvO67/q1qreW3ORKlNsHYYkDXiz2WL2', '1', '3', '9876543', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, 'admin', '3', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 13:03:58', '2023-02-05 13:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_customer_chats`
--

CREATE TABLE `vendor_customer_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `attachment_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `staus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_customer_chats`
--

INSERT INTO `vendor_customer_chats` (`id`, `enquiry_id`, `vendor_id`, `customer_id`, `message_from`, `date`, `time`, `attachment`, `attachment_file`, `message`, `staus`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'hi', '0', '2023-04-29 12:08:49', '2023-04-29 12:08:49'),
(2, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-04-29 12:10:35', '2023-04-29 12:10:35'),
(3, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'hi', '0', '2023-04-29 12:14:17', '2023-04-29 12:14:17'),
(4, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-04-29 12:18:07', '2023-04-29 12:18:07'),
(5, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'aravind', '0', '2023-04-29 11:22:42', '2023-04-29 11:22:42'),
(6, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'hi', '0', '2023-04-29 11:27:56', '2023-04-29 11:27:56'),
(7, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-04-29 11:43:33', '2023-04-29 11:43:33'),
(8, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-04-29 11:44:54', '2023-04-29 11:44:54'),
(9, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how r u?', '0', '2023-04-29 11:45:03', '2023-04-29 11:45:03'),
(10, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'im fine', '0', '2023-04-29 12:20:41', '2023-04-29 12:20:41'),
(11, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-10 10:11:58', '2023-05-10 10:11:58'),
(12, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-10 10:36:26', '2023-05-10 10:36:26'),
(13, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how r u?', '0', '2023-05-10 10:41:54', '2023-05-10 10:41:54'),
(14, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-10 10:43:53', '2023-05-10 10:43:53'),
(15, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-10 10:44:29', '2023-05-10 10:44:29'),
(16, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-10 10:45:00', '2023-05-10 10:45:00'),
(17, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how r u', '0', '2023-05-10 11:00:35', '2023-05-10 11:00:35'),
(18, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 17:02:46', '2023-05-18 17:02:46'),
(19, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi prasanth', '0', '2023-05-18 17:04:15', '2023-05-18 17:04:15'),
(20, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 17:56:33', '2023-05-18 17:56:33'),
(21, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi prasanth', '0', '2023-05-18 17:57:15', '2023-05-18 17:57:15'),
(22, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 18:48:46', '2023-05-18 18:48:46'),
(23, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how are you', '0', '2023-05-18 18:50:22', '2023-05-18 18:50:22'),
(24, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how are you', '0', '2023-05-18 18:50:54', '2023-05-18 18:50:54'),
(25, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 18:51:18', '2023-05-18 18:51:18'),
(26, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how are you', '0', '2023-05-18 18:51:37', '2023-05-18 18:51:37'),
(27, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 18:52:26', '2023-05-18 18:52:26'),
(28, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'jji', '0', '2023-05-18 18:53:47', '2023-05-18 18:53:47'),
(29, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-05-18 18:54:15', '2023-05-18 18:54:15'),
(30, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ok', '0', '2023-05-18 18:54:32', '2023-05-18 18:54:32'),
(31, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-05-18 18:55:14', '2023-05-18 18:55:14'),
(32, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ok', '0', '2023-05-18 18:55:28', '2023-05-18 18:55:28'),
(33, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hii', '0', '2023-05-18 18:56:38', '2023-05-18 18:56:38'),
(34, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 19:04:14', '2023-05-18 19:04:14'),
(35, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hello', '0', '2023-05-18 19:04:35', '2023-05-18 19:04:35'),
(36, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hello', '0', '2023-05-18 19:34:35', '2023-05-18 19:34:35'),
(37, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'jji', '0', '2023-05-18 19:35:10', '2023-05-18 19:35:10'),
(38, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'testing', '0', '2023-05-18 20:43:48', '2023-05-18 20:43:48'),
(39, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hello', '0', '2023-05-18 20:48:22', '2023-05-18 20:48:22'),
(40, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-05-18 20:49:12', '2023-05-18 20:49:12'),
(41, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ji', '0', '2023-05-18 20:49:50', '2023-05-18 20:49:50'),
(42, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'ok', '0', '2023-05-18 20:50:18', '2023-05-18 20:50:18'),
(43, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'done', '0', '2023-05-18 20:51:05', '2023-05-18 20:51:05'),
(44, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'final', '0', '2023-05-18 20:51:36', '2023-05-18 20:51:36'),
(45, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'right', '0', '2023-05-18 20:54:48', '2023-05-18 20:54:48'),
(46, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'done', '0', '2023-05-18 20:56:39', '2023-05-18 20:56:39'),
(47, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hello', '0', '2023-05-18 20:58:33', '2023-05-18 20:58:33'),
(48, '1', '1', NULL, '0', NULL, NULL, '0', NULL, 'thanks', '0', '2023-05-18 21:06:11', '2023-05-18 21:06:11'),
(49, '1', '1', NULL, '0', NULL, NULL, '0', NULL, 'ok', '0', '2023-05-18 21:06:58', '2023-05-18 21:06:58'),
(50, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'sure', '0', '2023-05-18 21:08:34', '2023-05-18 21:08:34'),
(51, '1', '1', NULL, '0', NULL, NULL, '0', NULL, 'thanks', '0', '2023-05-18 21:12:10', '2023-05-18 21:12:10'),
(52, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'test123', '0', '2023-05-18 21:15:11', '2023-05-18 21:15:11'),
(53, '1', '1', '1', '0', NULL, NULL, '0', NULL, 'test123', '0', '2023-05-18 21:16:06', '2023-05-18 21:16:06'),
(54, '1', '1', NULL, '0', NULL, NULL, '0', NULL, 'ok', '0', '2023-05-18 21:16:30', '2023-05-18 21:16:30'),
(55, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'thanks', '0', '2023-05-18 21:16:41', '2023-05-18 21:16:41'),
(56, '1', '1', NULL, '0', NULL, NULL, '0', NULL, 'welcome', '0', '2023-05-18 21:16:48', '2023-05-18 21:16:48'),
(57, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hello', '0', '2023-06-07 20:35:31', '2023-06-07 20:35:31'),
(58, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-06-07 20:41:09', '2023-06-07 20:41:09'),
(59, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'hi', '0', '2023-06-07 21:00:27', '2023-06-07 21:00:27'),
(60, '1', '1', '1', '1', NULL, NULL, '0', NULL, 'how are you', '0', '2023-06-07 21:00:35', '2023-06-07 21:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_enquiries`
--

CREATE TABLE `vendor_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_idea_book_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_enquiries`
--

INSERT INTO `vendor_enquiries` (`id`, `vendor_id`, `type`, `project_idea_book_id`, `customer_id`, `date`, `name`, `email`, `mobile`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '0', '1', '1', '2023-02-22', 'prasanth', 'prasanthats@gmail.com', '567100733', 'hi', '0', '2023-02-22 09:33:55', '2023-02-22 09:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_projects`
--

CREATE TABLE `vendor_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_projects`
--

INSERT INTO `vendor_projects` (`id`, `vendor_id`, `project_name`, `category`, `subcategory`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'BEST OF HOUZZ', '1', '7', '<p>Studio S Squared Architecture, Inc. was founded in 1996, on the belief that client involvement and a positive relationship is the key to a successful project. We are committed to a team-oriented approach in all phases of the design process. We believe in the value of collaboration within our office, with our consultant team, the building contractor, and most importantly, with our clients. When you hire Studio S Squared Architecture, you partner with a diverse, dynamic team of architects and interior designers who will help guide you through the entire design process, from site selection all the way through move in day! We consistently deliver outstanding design that makes the most of your budget&mdash;along with innovative ideas that transform your space into something truly extraordinary. Our practical experience covers the entire spectrum of styles and scopes of work ranging from modest renovations to large new buildings. The common thread in our work is the belief that architecture can lift the spirit, and that great relationships make great design possible.</p>', '6544717391676958284.png', '2', '2023-02-21 03:14:44', '2023-07-14 08:13:27');

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
-- Indexes for table `app_carts`
--
ALTER TABLE `app_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_sliders`
--
ALTER TABLE `app_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_fields`
--
ALTER TABLE `attribute_fields`
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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites_ideas`
--
ALTER TABLE `favourites_ideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_books`
--
ALTER TABLE `idea_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_book_images`
--
ALTER TABLE `idea_book_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_categories`
--
ALTER TABLE `idea_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_attributes`
--
ALTER TABLE `order_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_categories`
--
ALTER TABLE `professional_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_posts`
--
ALTER TABLE `report_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_reasons`
--
ALTER TABLE `return_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendor_customer_chats`
--
ALTER TABLE `vendor_customer_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_enquiries`
--
ALTER TABLE `vendor_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_projects`
--
ALTER TABLE `vendor_projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_carts`
--
ALTER TABLE `app_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `app_sliders`
--
ALTER TABLE `app_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_fields`
--
ALTER TABLE `attribute_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `favourites_ideas`
--
ALTER TABLE `favourites_ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `idea_books`
--
ALTER TABLE `idea_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `idea_book_images`
--
ALTER TABLE `idea_book_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `idea_categories`
--
ALTER TABLE `idea_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_attributes`
--
ALTER TABLE `order_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `professional_categories`
--
ALTER TABLE `professional_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_posts`
--
ALTER TABLE `report_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_reasons`
--
ALTER TABLE `return_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_customer_chats`
--
ALTER TABLE `vendor_customer_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vendor_enquiries`
--
ALTER TABLE `vendor_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_projects`
--
ALTER TABLE `vendor_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
