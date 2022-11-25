-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 06:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilty`
--

CREATE TABLE `bilty` (
  `id` int(7) NOT NULL,
  `bilty_number` int(9) NOT NULL,
  `consignor` int(4) DEFAULT NULL,
  `co_nor` varchar(50) DEFAULT NULL,
  `consignee` int(4) DEFAULT NULL,
  `co_nee` varchar(50) DEFAULT NULL,
  `inv_no` varchar(15) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `ewb` varchar(25) DEFAULT NULL,
  `inv_amt` varchar(15) DEFAULT NULL,
  `distance` int(4) DEFAULT NULL,
  `from_city` int(4) DEFAULT NULL,
  `to_city` int(4) DEFAULT NULL,
  `payment_type` int(3) DEFAULT NULL,
  `dly_office` int(3) DEFAULT NULL,
  `full_load_freight` int(7) DEFAULT NULL,
  `hamali` int(4) DEFAULT NULL,
  `lr_charges` int(3) DEFAULT NULL,
  `dd_charges` int(5) DEFAULT NULL,
  `other_charges` int(5) DEFAULT NULL,
  `total_freight` int(6) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `entered_by` varchar(100) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `biltydetails`
--

CREATE TABLE `biltydetails` (
  `id` int(9) NOT NULL,
  `bilty_id` int(6) NOT NULL,
  `pkg_id` int(6) NOT NULL,
  `qty` int(5) NOT NULL,
  `pkg_cat` varchar(100) NOT NULL,
  `rate` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `frtype` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `nee_id` int(3) NOT NULL,
  `nee_name` varchar(50) NOT NULL,
  `nee_shortcode` varchar(10) NOT NULL,
  `nee_email` varchar(30) NOT NULL,
  `nee_mobile` varchar(11) NOT NULL,
  `nee_city` int(4) NOT NULL,
  `nee_state` varchar(20) NOT NULL,
  `nee_pincode` int(7) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`nee_id`, `nee_name`, `nee_shortcode`, `nee_email`, `nee_mobile`, `nee_city`, `nee_state`, `nee_pincode`, `createdat`) VALUES
(8, 'asdf', 'asdf', 'asd', '235', 3, 'eret', 2354, '2022-08-05 16:47:01'),
(9, 'as', 'asdf', 'asdf', '34', 4, 'asdf', 3425, '2022-08-06 15:36:24'),
(10, 'krushna', 'sadjf', 'asjdf', '786687', 3, 'kasdlfj', 786786, '2022-08-06 22:08:44'),
(11, 'mauli', 'asjkdf', 'sdjaf', '786', 1, 'sja', 45, '2022-08-06 22:11:29'),
(12, 'mahesh', 'askdjf', 'askdjf', '86', 4, 'saljf', 6, '2022-08-06 22:17:51'),
(13, 'una', 'asdjf', 'asdfj', 'sdj', 5, 'askldfj', 786, '2022-08-06 22:19:16'),
(14, 'nana', 'asdljf', 'asdlfj', 'skldjf', 2, 'sadjkf', 786, '2022-08-06 22:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `consignor`
--

CREATE TABLE `consignor` (
  `nor_id` int(5) NOT NULL,
  `nor_name` varchar(50) NOT NULL,
  `nor_shortcode` varchar(10) NOT NULL,
  `nor_email` varchar(30) NOT NULL,
  `nor_mobile` varchar(11) NOT NULL,
  `nor_city` int(3) NOT NULL,
  `nor_state` varchar(20) NOT NULL,
  `nor_pincode` int(7) NOT NULL,
  `nor_payment_type` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignor`
--

INSERT INTO `consignor` (`nor_id`, `nor_name`, `nor_shortcode`, `nor_email`, `nor_mobile`, `nor_city`, `nor_state`, `nor_pincode`, `nor_payment_type`) VALUES
(22, 'bhua', 'asdf', 'asdf', '35', 3, 'adf', 2345, 3),
(25, 'krishna', 'asjd', 'asjdf', '768576', 6, 'jasdfkjh', 76876, 3),
(26, 'mauli', 'ajksf', 'asjkdf', 'sajdf', 3, 'asdf', 78686, 2),
(27, 'mahesh', 'asjkdfh', 'jkasdhf', '876', 3, 'asjd', 786, 1),
(28, 'Dhanuka Agritech Private Limited', 'dal', 'asdf', '876', 2, 'askdl', 876, 2),
(29, 'जनार्दन कृषी सेवा केंद्र', 'asd', 'asd', '43', 1, 'asd', 43, 2),
(31, 'wagh', 'sf', 'dff', '245', 2, '425', 245, 2);

-- --------------------------------------------------------

--
-- Table structure for table `del_office`
--

CREATE TABLE `del_office` (
  `id` int(3) NOT NULL,
  `office_del` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `d_id` int(4) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`d_id`, `city`) VALUES
(1, 'ahmednagar'),
(2, 'pune'),
(3, 'solapur'),
(4, 'nashik'),
(5, 'sambhajinagar'),
(6, 'jalna');

-- --------------------------------------------------------

--
-- Table structure for table `freight_type`
--

CREATE TABLE `freight_type` (
  `id` int(3) NOT NULL,
  `fr_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freight_type`
--

INSERT INTO `freight_type` (`id`, `fr_type`) VALUES
(1, 'Cartoon'),
(2, 'Weight');

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `la_id` int(3) NOT NULL,
  `user` int(3) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`la_id`, `user`, `agent`, `ip`, `login_time`, `logout_time`) VALUES
(1, 2, 'Chrome', '192.168.43.103', '2022-08-03 12:10:06', '0000-00-00 00:00:00'),
(2, 2, 'Chrome', '192.168.43.103', '2022-08-03 12:24:51', '2022-08-03 12:25:01'),
(3, 3, 'Chrome', '192.168.43.103', '2022-08-03 12:31:15', '2022-08-03 12:32:46'),
(4, 2, 'Chrome', '192.168.43.1', '2022-08-03 12:31:54', '2022-08-03 12:32:17'),
(5, 2, 'Edge', '192.168.43.103', '2022-08-03 12:34:28', '2022-08-03 12:35:16'),
(6, 2, 'Chrome', '192.168.43.103', '2022-08-03 12:34:54', '2022-08-03 12:35:08'),
(7, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:09:33', '2022-08-03 11:09:49'),
(8, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:13:08', '0000-00-00 00:00:00'),
(9, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:33:35', '2022-08-03 11:34:03'),
(10, 3, 'Chrome', '192.168.43.103', '2022-08-03 11:34:07', '2022-08-03 11:34:10'),
(11, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:34:14', '0000-00-00 00:00:00'),
(12, 3, 'Chrome', '192.168.43.1', '2022-08-03 11:35:13', '0000-00-00 00:00:00'),
(13, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:47:55', '0000-00-00 00:00:00'),
(14, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:49:12', '2022-08-03 11:55:11'),
(15, 2, 'Chrome', '192.168.43.103', '2022-08-03 11:55:21', '2022-08-04 12:08:23'),
(16, 3, 'Chrome', '192.168.43.1', '2022-08-03 11:55:47', '2022-08-03 11:55:57'),
(17, 2, 'Chrome', '192.168.43.103', '2022-08-04 12:08:36', '2022-08-04 12:09:44'),
(18, 3, 'Chrome', '192.168.43.1', '2022-08-04 12:09:08', '2022-08-04 12:09:18'),
(19, 2, 'Chrome', '192.168.43.103', '2022-08-04 12:10:06', '2022-08-04 12:11:30'),
(20, 2, 'Chrome', '192.168.43.103', '2022-08-04 12:11:49', '2022-08-04 12:38:58'),
(21, 2, 'Chrome', '192.168.43.103', '2022-08-04 12:40:01', '2022-08-04 12:40:23'),
(22, 2, 'Chrome', '192.168.43.103', '2022-08-04 12:43:20', '2022-08-04 12:43:27'),
(23, 2, 'Chrome', '192.168.43.103', '2022-08-04 06:36:15', '0000-00-00 00:00:00'),
(24, 2, 'Chrome', '192.168.43.103', '2022-08-04 06:57:00', '2022-08-04 06:58:30'),
(25, 2, 'Chrome', '192.168.43.103', '2022-08-04 06:58:38', '2022-08-04 08:11:42'),
(26, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:11:53', '2022-08-04 08:22:57'),
(27, 3, 'Chrome', '192.168.43.103', '2022-08-04 08:23:23', '2022-08-04 08:23:38'),
(28, 3, 'Chrome', '192.168.43.103', '2022-08-04 08:23:44', '0000-00-00 00:00:00'),
(29, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:23:57', '2022-08-04 08:27:55'),
(30, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:28:06', '2022-08-04 08:28:23'),
(31, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:28:56', '2022-08-04 08:29:04'),
(32, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:29:35', '2022-08-04 08:30:15'),
(33, 3, 'Chrome', '192.168.43.103', '2022-08-04 08:31:35', '2022-08-04 08:32:00'),
(34, 2, 'Chrome', '192.168.43.103', '2022-08-04 08:36:53', '0000-00-00 00:00:00'),
(35, 2, 'Chrome', '192.168.43.103', '2022-08-04 09:20:12', '2022-08-04 09:21:46'),
(36, 5, 'Chrome', '192.168.43.103', '2022-08-04 09:21:55', '0000-00-00 00:00:00'),
(37, 2, 'Chrome', '192.168.43.103', '2022-08-04 09:22:54', '2022-08-04 09:25:41'),
(38, 6, 'Chrome', '192.168.43.103', '2022-08-04 09:25:49', '0000-00-00 00:00:00'),
(39, 2, 'Chrome', '192.168.43.103', '2022-08-04 10:11:07', '2022-08-04 10:14:55'),
(40, 2, 'Chrome', '192.168.43.1', '2022-08-04 10:11:51', '2022-08-04 10:18:51'),
(41, 2, 'Chrome', '192.168.43.103', '2022-08-04 10:14:59', '2022-08-04 10:16:31'),
(42, 7, 'Chrome', '192.168.43.103', '2022-08-04 10:16:43', '2022-08-04 10:17:48'),
(43, 2, 'Chrome', '192.168.43.103', '2022-08-04 10:17:52', '2022-08-04 10:33:58'),
(44, 7, 'Edge', '192.168.43.103', '2022-08-04 10:20:18', '2022-08-04 10:21:14'),
(45, 2, 'Chrome', '192.168.43.103', '2022-08-04 10:34:01', '0000-00-00 00:00:00'),
(46, 2, 'Chrome', '192.168.43.103', '2022-08-04 11:13:50', '2022-08-04 11:28:34'),
(47, 2, 'Chrome', '192.168.43.103', '2022-08-04 11:28:38', '0000-00-00 00:00:00'),
(48, 7, 'Chrome', '192.168.43.103', '2022-08-04 11:49:59', '2022-08-04 11:58:50'),
(49, 7, 'Chrome', '192.168.43.103', '2022-08-04 11:59:00', '2022-08-05 12:08:54'),
(50, 7, 'Chrome', '192.168.43.103', '2022-08-05 12:09:23', '0000-00-00 00:00:00'),
(51, 2, 'Chrome', '192.168.43.103', '2022-08-05 12:53:17', '0000-00-00 00:00:00'),
(52, 2, 'Chrome', '192.168.43.103', '2022-08-05 01:11:56', '0000-00-00 00:00:00'),
(53, 7, 'Chrome', '192.168.43.103', '2022-08-05 01:25:57', '0000-00-00 00:00:00'),
(54, 7, 'Chrome', '192.168.43.103', '2022-08-05 02:04:31', '2022-08-05 02:18:59'),
(55, 7, 'Chrome', '192.168.43.103', '2022-08-05 02:19:11', '2022-08-05 02:28:00'),
(56, 7, 'Chrome', '192.168.43.1', '2022-08-05 02:25:43', '0000-00-00 00:00:00'),
(57, 8, 'Chrome', '192.168.43.103', '2022-08-05 02:28:04', '2022-08-05 03:22:18'),
(58, 8, 'Chrome', '192.168.43.1', '2022-08-05 03:19:58', '0000-00-00 00:00:00'),
(59, 8, 'Chrome', '192.168.43.103', '2022-08-05 01:32:20', '0000-00-00 00:00:00'),
(60, 8, 'Chrome', '192.168.43.103', '2022-08-05 02:17:13', '2022-08-05 02:24:05'),
(61, 3, 'Chrome', '192.168.43.103', '2022-08-05 02:24:09', '2022-08-05 02:26:10'),
(62, 8, 'Chrome', '192.168.43.103', '2022-08-05 02:26:14', '0000-00-00 00:00:00'),
(63, 8, 'Chrome', '192.168.43.103', '2022-08-05 03:40:51', '2022-08-05 03:52:52'),
(64, 3, 'Chrome', '192.168.43.103', '2022-08-05 03:52:54', '0000-00-00 00:00:00'),
(65, 3, 'Chrome', '192.168.43.103', '2022-08-05 03:53:36', '0000-00-00 00:00:00'),
(66, 3, 'Chrome', '192.168.43.103', '2022-08-05 03:55:48', '0000-00-00 00:00:00'),
(67, 3, 'Chrome', '192.168.43.103', '2022-08-05 03:56:25', '0000-00-00 00:00:00'),
(68, 3, 'Chrome', '192.168.43.103', '2022-08-05 03:57:15', '2022-08-05 03:57:21'),
(69, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:07:47', '2022-08-05 04:08:30'),
(70, 9, 'Chrome', '192.168.43.103', '2022-08-05 04:08:38', '0000-00-00 00:00:00'),
(71, 9, 'Chrome', '192.168.43.103', '2022-08-05 04:08:58', '0000-00-00 00:00:00'),
(72, 9, 'Chrome', '192.168.43.103', '2022-08-05 04:09:29', '2022-08-05 04:13:14'),
(73, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:13:17', '2022-08-05 04:14:01'),
(74, 10, 'Chrome', '192.168.43.103', '2022-08-05 04:14:13', '2022-08-05 04:17:25'),
(75, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:17:27', '2022-08-05 04:18:59'),
(76, 11, 'Chrome', '192.168.43.103', '2022-08-05 04:19:06', '2022-08-05 04:20:54'),
(77, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:20:58', '2022-08-05 04:21:39'),
(78, 12, 'Chrome', '192.168.43.103', '2022-08-05 04:21:50', '0000-00-00 00:00:00'),
(79, 12, 'Chrome', '192.168.43.103', '2022-08-05 04:22:33', '2022-08-05 04:25:17'),
(80, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:25:19', '2022-08-05 04:26:02'),
(81, 13, 'Chrome', '192.168.43.103', '2022-08-05 04:26:12', '2022-08-05 04:27:21'),
(82, 8, 'Chrome', '192.168.43.103', '2022-08-05 04:27:25', '0000-00-00 00:00:00'),
(83, 11, 'Chrome', '192.168.43.1', '2022-08-05 04:34:55', '2022-08-05 04:35:00'),
(84, 8, 'Chrome', '192.168.43.1', '2022-08-05 04:35:08', '0000-00-00 00:00:00'),
(85, 8, 'Chrome', '192.168.43.103', '2022-08-05 07:44:29', '0000-00-00 00:00:00'),
(86, 8, 'Chrome', '192.168.43.103', '2022-08-05 08:37:20', '2022-08-05 08:38:37'),
(87, 8, 'Chrome', '192.168.43.103', '2022-08-05 09:25:58', '2022-08-05 09:26:42'),
(88, 7, 'Chrome', '192.168.43.103', '2022-08-05 11:21:11', '2022-08-05 11:21:43'),
(89, 8, 'Chrome', '192.168.43.103', '2022-08-06 12:44:01', '2022-08-06 12:55:24'),
(90, 8, 'Chrome', '192.168.43.103', '2022-08-06 12:59:20', '2022-08-06 01:00:04'),
(91, 8, 'Chrome', '192.168.43.103', '2022-08-06 12:59:51', '2022-08-06 01:00:58'),
(92, 8, 'Chrome', '192.168.43.103', '2022-08-06 01:01:08', '0000-00-00 00:00:00'),
(93, 8, 'Chrome', '192.168.43.103', '2022-08-06 01:01:22', '0000-00-00 00:00:00'),
(94, 8, 'Chrome', '192.168.43.103', '2022-08-06 01:32:22', '0000-00-00 00:00:00'),
(95, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:01:03', '2022-08-06 02:01:31'),
(96, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:01:54', '2022-08-06 02:03:24'),
(97, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:00:35', '0000-00-00 00:00:00'),
(98, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:40:24', '2022-08-06 02:41:09'),
(99, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:41:13', '2022-08-06 02:41:20'),
(100, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:44:43', '2022-08-06 02:44:49'),
(101, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:44:54', '0000-00-00 00:00:00'),
(102, 8, 'Chrome', '192.168.43.103', '2022-08-06 02:52:01', '2022-08-06 03:37:14'),
(103, 8, 'Chrome', '192.168.43.103', '2022-08-06 03:37:22', '2022-08-06 03:37:29'),
(104, 8, 'Chrome', '192.168.43.103', '2022-08-06 03:37:33', '2022-08-06 03:38:06'),
(105, 8, 'Chrome', '192.168.43.103', '2022-08-06 03:38:12', '2022-08-06 03:38:33'),
(106, 8, 'Chrome', '192.168.43.103', '2022-08-06 03:38:39', '0000-00-00 00:00:00'),
(107, 8, 'Chrome', '192.168.43.103', '2022-08-06 05:15:40', '0000-00-00 00:00:00'),
(108, 8, 'Chrome', '192.168.43.103', '2022-08-06 05:40:57', '2022-08-06 05:41:12'),
(109, 8, 'Chrome', '192.168.43.103', '2022-08-06 05:41:16', '2022-08-06 05:42:08'),
(110, 8, 'Chrome', '192.168.43.103', '2022-08-06 05:44:33', '2022-08-06 05:54:11'),
(111, 8, 'Chrome', '192.168.43.103', '2022-08-06 07:14:02', '0000-00-00 00:00:00'),
(112, 8, 'Chrome', '192.168.43.103', '2022-08-06 08:08:15', '2022-08-06 08:11:07'),
(113, 15, 'Chrome', '192.168.43.103', '2022-08-06 08:11:22', '2022-08-06 08:14:52'),
(114, 15, 'Chrome', '192.168.43.103', '2022-08-06 08:16:50', '2022-08-06 08:26:54'),
(115, 3, 'Chrome', '192.168.43.103', '2022-08-06 08:28:38', '2022-08-06 08:28:42'),
(116, 8, 'Chrome', '192.168.43.103', '2022-08-06 09:02:13', '2022-08-06 09:03:14'),
(117, 8, 'Chrome', '192.168.43.103', '2022-08-06 09:08:46', '2022-08-06 09:08:51'),
(118, 8, 'Chrome', '192.168.43.103', '2022-08-06 09:10:33', '2022-08-06 09:10:36'),
(119, 8, 'Chrome', '192.168.43.103', '2022-08-06 09:14:14', '0000-00-00 00:00:00'),
(120, 8, 'Chrome', '192.168.43.103', '2022-08-06 10:06:13', '0000-00-00 00:00:00'),
(121, 8, 'Chrome', '192.168.43.103', '2022-08-06 11:02:26', '0000-00-00 00:00:00'),
(122, 8, 'Chrome', '192.168.43.103', '2022-08-07 12:15:29', '0000-00-00 00:00:00'),
(123, 8, 'Chrome', '192.168.43.103', '2022-08-07 12:56:19', '0000-00-00 00:00:00'),
(124, 8, 'Chrome', '192.168.43.103', '2022-08-07 02:52:54', '2022-08-07 03:09:07'),
(125, 8, 'Chrome', '192.168.43.103', '2022-08-07 10:22:50', '0000-00-00 00:00:00'),
(126, 8, 'Chrome', '192.168.43.103', '2022-08-07 07:34:18', '0000-00-00 00:00:00'),
(127, 8, 'Chrome', '192.168.43.103', '2022-08-07 11:08:41', '0000-00-00 00:00:00'),
(128, 8, 'Chrome', '192.168.43.103', '2022-08-07 11:56:25', '0000-00-00 00:00:00'),
(129, 8, 'Chrome', '192.168.1.17', '2022-08-08 03:09:21', '0000-00-00 00:00:00'),
(130, 8, 'Chrome', '192.168.1.17', '2022-08-08 04:18:44', '0000-00-00 00:00:00'),
(131, 8, 'Chrome', '192.168.1.17', '2022-08-08 05:26:08', '0000-00-00 00:00:00'),
(132, 8, 'Chrome', '192.168.43.103', '2022-08-08 07:29:56', '2022-08-08 07:35:11'),
(133, 8, 'Chrome', '192.168.43.103', '2022-08-08 07:35:14', '2022-08-08 07:47:37'),
(134, 8, 'Chrome', '192.168.43.103', '2022-08-08 07:47:43', '2022-08-08 07:51:46'),
(135, 16, 'Chrome', '192.168.43.103', '2022-08-08 08:02:16', '2022-08-08 08:02:28'),
(136, 8, 'Chrome', '192.168.43.103', '2022-08-08 08:02:31', '2022-08-08 08:02:39'),
(137, 8, 'Chrome', '192.168.43.103', '2022-08-08 08:08:45', '2022-08-08 08:10:38'),
(138, 17, 'Chrome', '192.168.43.103', '2022-08-08 08:10:57', '2022-08-08 08:11:42'),
(139, 17, 'Chrome', '192.168.43.6', '2022-08-08 08:21:20', '0000-00-00 00:00:00'),
(140, 17, 'Chrome', '192.168.43.103', '2022-08-08 08:22:15', '0000-00-00 00:00:00'),
(141, 8, 'Chrome', '192.168.43.1', '2022-08-08 08:24:23', '0000-00-00 00:00:00'),
(142, 8, 'Chrome', '192.168.43.103', '2022-08-08 11:52:10', '0000-00-00 00:00:00'),
(143, 8, 'Chrome', '192.168.43.103', '2022-08-09 03:30:02', '0000-00-00 00:00:00'),
(144, 8, 'Chrome', '192.168.43.103', '2022-08-09 06:52:01', '0000-00-00 00:00:00'),
(145, 8, 'Chrome', '192.168.43.103', '2022-08-09 07:23:33', '0000-00-00 00:00:00'),
(146, 8, 'Chrome', '192.168.43.1', '2022-08-09 07:59:16', '0000-00-00 00:00:00'),
(147, 8, 'Chrome', '192.168.43.103', '2022-08-09 10:13:54', '0000-00-00 00:00:00'),
(148, 8, 'Chrome', '192.168.43.103', '2022-08-09 11:14:46', '0000-00-00 00:00:00'),
(149, 8, 'Chrome', '192.168.43.103', '2022-08-10 12:29:47', '0000-00-00 00:00:00'),
(150, 8, 'Chrome', '192.168.43.1', '2022-08-10 12:30:18', '0000-00-00 00:00:00'),
(151, 8, 'Chrome', '192.168.43.103', '2022-08-10 11:25:16', '0000-00-00 00:00:00'),
(152, 8, 'Chrome', '192.168.43.103', '2022-08-10 03:37:23', '0000-00-00 00:00:00'),
(153, 8, 'Chrome', '192.168.43.103', '2022-08-10 09:50:56', '0000-00-00 00:00:00'),
(154, 8, 'Chrome', '192.168.43.103', '2022-08-11 12:17:01', '0000-00-00 00:00:00'),
(155, 8, 'Chrome', '192.168.43.103', '2022-08-12 07:40:13', '2022-08-12 07:41:05'),
(156, 3, 'Chrome', '192.168.43.103', '2022-08-12 07:41:13', '2022-08-12 07:41:20'),
(157, 8, 'Chrome', '192.168.43.103', '2022-08-12 07:41:24', '2022-08-12 07:41:27'),
(158, 8, 'Chrome', '192.168.43.103', '2022-08-12 07:41:37', '2022-08-12 07:41:59'),
(159, 8, 'Chrome', '192.168.43.103', '2022-08-12 07:42:06', '0000-00-00 00:00:00'),
(160, 8, 'Chrome', '192.168.43.1', '2022-08-12 07:42:56', '0000-00-00 00:00:00'),
(161, 8, 'Chrome', '192.168.43.103', '2022-08-12 08:29:58', '0000-00-00 00:00:00'),
(162, 8, 'Chrome', '192.168.43.1', '2022-08-12 09:10:03', '0000-00-00 00:00:00'),
(163, 8, 'Chrome', '192.168.43.1', '2022-08-12 09:46:46', '0000-00-00 00:00:00'),
(164, 8, 'Chrome', '192.168.43.103', '2022-08-12 09:47:23', '0000-00-00 00:00:00'),
(165, 8, 'Chrome', '192.168.43.103', '2022-08-12 10:10:45', '0000-00-00 00:00:00'),
(166, 8, 'Chrome', '192.168.43.103', '2022-08-13 07:46:34', '0000-00-00 00:00:00'),
(167, 8, 'Chrome', '192.168.43.103', '2022-08-13 09:08:48', '0000-00-00 00:00:00'),
(168, 8, 'Chrome', '192.168.43.103', '2022-08-13 10:29:05', '0000-00-00 00:00:00'),
(169, 8, 'Chrome', '192.168.43.103', '2022-08-14 07:53:25', '0000-00-00 00:00:00'),
(170, 8, 'Chrome', '192.168.43.103', '2022-08-14 09:00:03', '0000-00-00 00:00:00'),
(171, 8, 'Chrome', '192.168.43.103', '2022-08-14 09:00:47', '0000-00-00 00:00:00'),
(172, 8, 'Chrome', '192.168.43.103', '2022-08-14 09:01:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mop`
--

CREATE TABLE `mop` (
  `id` int(3) NOT NULL,
  `mode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mop`
--

INSERT INTO `mop` (`id`, `mode`) VALUES
(1, 'TO PAY'),
(2, 'TBB'),
(3, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `pkg`
--

CREATE TABLE `pkg` (
  `pkg_id` int(4) NOT NULL,
  `pkg_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkg`
--

INSERT INTO `pkg` (`pkg_id`, `pkg_type`) VALUES
(1, 'box'),
(2, 'bag'),
(3, 'dag'),
(4, 'cartoon');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(3) NOT NULL,
  `post` varchar(20) NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `post`, `flag`) VALUES
(1, 'Admin', 0),
(2, 'Driver', 0),
(3, 'Dly.Office', 0),
(4, 'Consignor', 0),
(5, 'HR', 0),
(6, 'Account', 0),
(7, 'Assistant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `role` int(3) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `role`, `username`, `password`, `profile_pic`, `address`, `created_at`, `updated_at`) VALUES
(3, 'admin', '1234567890', 'admin@mail.com', 2, 'admin', '$2y$10$yPvE2vUUdxefnNaACncZPePVgJDXeRLW9.70IfdWWA1FuypaYHiym', '', '', '2022-08-03 02:34:24', NULL),
(4, 'blabla', '0987654321', 'khile1@gmail.com', 4, 'blabla', '$2y$10$WIW.pRvLtJP3yiEf.n0Q0OUmImAmPv9EnvhYSb6ocnqoQTZaj3Js2', '', '', '2022-08-04 00:37:35', NULL),
(5, 'baba', '0987654321', 'khile@gmail.com', 2, 'bababa', '$2y$10$Ppg9YDgLIMgX0r/tJlSyFuDXlwgkhMUeKOAKowP/sf6Bd6XgzBYE2', '', '', '2022-08-04 21:21:33', NULL),
(6, 'mama', '1234567890', 'khilebalkrushna1@gmail.com', 1, 'mama', '$2y$10$hJcnug7AmORWPtP7eaOd5OGfLuQC/Km6TC0Em7xzVr18sJ4UAIKQK', 'http://192.168.43.103/trp/public/public/profiles/1659628603_f1524422d4809ee722d7.jpg', '', '2022-08-04 21:25:35', NULL),
(7, 'Parmeshwar Shendage', '7083832104', 'shendageparmeshwara@gmail.com', 1, 'Bhau', '$2y$10$1PxVJM43hpvVdcY6hX/jpur7DoMNDHe1OYdrA5PRLx2qNT2EsnB5G', 'http://192.168.43.103/trp/public/public/profiles/1659646578_943ae70cf1b82a728571.jpg', 'kanadi', '2022-08-04 22:16:22', '2022-08-08 08:14:36'),
(8, 'Krushna khile', '9284407251', 'khilebalkrushna@gmail.com', 1, 'krishna@gmail.com', '$2y$10$S5B0ez/fcIUFOoF/w9pBw.dgtlPXm3mANlTmJTcg26A/ozDX/361q', 'http://192.168.43.103/trp/public/public/profiles/1660200527_b2ba243e299ecb10e439.jpg', 'kanadi', '2022-08-05 02:27:39', '2022-08-08 08:07:26'),
(9, 'maya', '7666767676', 'maya@gmail.com', 3, 'maya', '$2y$10$0TI0/YYGVI/mK2ICb7iJM.dZuuPlYH3iuLFGi1x4ubtqjVeqfnvuy', '', '', '2022-08-05 16:08:25', NULL),
(10, 'consignor', '9090909090', 'nor@gmail.com', 4, 'norr', '$2y$10$qJLoWtcKCbQmS.z6OOUXwOqRdXgqsb7nrPSPNGsUuzBEP8Pgbiw1K', '', '', '2022-08-05 16:13:56', NULL),
(11, 'hr', '8989898989', 'hr@gmail.com', 5, 'hrhr', '$2y$10$XuLnuBXtjBelKN7lSsBJDOiyIHPyqPqvjqvSlSZBT6KK7MW/sOaqK', '', '', '2022-08-05 16:18:55', NULL),
(12, 'account', '7878787878', 'account@gmail.com', 6, 'account', '$2y$10$61Vg.RTiDZrpbkQtsF6wUOSrgrUzkA071JFaC8Ap9D6L0/r7V4WmS', '', '', '2022-08-05 16:21:34', NULL),
(13, 'assistant', '1212121212', 'assistant@gmail.com', 7, 'assistant', '$2y$10$vET.iwdBKLinnAKBIhdoE.O3G2j48eDtJlGr0gXDPEJiFeNEqAWhO', '', '', '2022-08-05 16:25:58', NULL),
(14, 'dlyoffice', '1212121212', 'office@gmail.com', 3, 'office', '$2y$10$5pM1Wpdqp.DfKJjbODm79ujtMUkmHyzAfJaB3hAj97Lr/1au.cEJi', '', '', '2022-08-05 17:32:58', NULL),
(15, 'manisha', '7066452991', 'study.krushna@gmail.com', 1, 'manisha', '$2y$10$ZSSYTTXLaHq2rFh0.5D0TOEt76JxWnZujKkWbNBTzF2ZVwtuu5a3C', '', '', '2022-08-06 20:10:32', '2022-08-06 08:14:59'),
(16, 'wagh', '1234567890', 'abhijeetwagh188@gmail.com', 2, 'wagh', '$2y$10$DPLruLRKAhaY551wwCe.pOoVCMfVJzEk4.Lw9Ej7U0izfxPQe5h8y', '', '', '2022-08-08 19:51:38', '2022-08-08 08:06:44'),
(17, 'abhijeet', '0987654321', 'abijeetwagh188@gmail.com', 1, 'abhi', '$2y$10$NpuIlnWF5fvjZIvOVb9uu.XgPhR3mu7BUKbpG8cZha4BrwwY5LD5u', 'http://192.168.43.103/trp/public/public/profiles/1659969696_7b4db58eec46687a80ba.jpg', '', '2022-08-08 20:10:32', '2022-08-08 08:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilty`
--
ALTER TABLE `bilty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `consignee` (`consignee`),
  ADD KEY `from_city` (`from_city`),
  ADD KEY `payment_type` (`payment_type`),
  ADD KEY `to_city` (`to_city`);

--
-- Indexes for table `biltydetails`
--
ALTER TABLE `biltydetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bilty_id` (`bilty_id`),
  ADD KEY `frtype` (`frtype`),
  ADD KEY `pkg_id` (`pkg_id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`nee_id`);

--
-- Indexes for table `consignor`
--
ALTER TABLE `consignor`
  ADD PRIMARY KEY (`nor_id`),
  ADD KEY `nor_city` (`nor_city`),
  ADD KEY `nor_payment_type` (`nor_payment_type`);

--
-- Indexes for table `del_office`
--
ALTER TABLE `del_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `freight_type`
--
ALTER TABLE `freight_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`la_id`);

--
-- Indexes for table `mop`
--
ALTER TABLE `mop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pkg`
--
ALTER TABLE `pkg`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilty`
--
ALTER TABLE `bilty`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biltydetails`
--
ALTER TABLE `biltydetails`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `nee_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `consignor`
--
ALTER TABLE `consignor`
  MODIFY `nor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `del_office`
--
ALTER TABLE `del_office`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `d_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freight_type`
--
ALTER TABLE `freight_type`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `la_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `mop`
--
ALTER TABLE `mop`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pkg`
--
ALTER TABLE `pkg`
  MODIFY `pkg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consignor`
--
ALTER TABLE `consignor`
  ADD CONSTRAINT `consignor_ibfk_1` FOREIGN KEY (`nor_city`) REFERENCES `destination` (`d_id`),
  ADD CONSTRAINT `consignor_ibfk_2` FOREIGN KEY (`nor_payment_type`) REFERENCES `mop` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
