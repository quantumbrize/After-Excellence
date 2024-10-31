-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 05:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excellence_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `uid`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ACC9FEBE03F20240408', 'dashboard', 'inactive', '2024-04-08 16:17:50', '2024-04-08 16:17:50'),
(2, 'ACC8290797D20240408', 'banners', 'active', '2024-04-08 16:18:30', '2024-04-08 16:18:30'),
(3, 'ACCA487A0CE20240408', 'promotion_card', 'inactive', '2024-04-08 16:18:51', '2024-04-08 16:18:51'),
(4, 'ACC830F3F6020240408', 'categories', 'active', '2024-04-08 16:19:03', '2024-04-08 16:19:03'),
(5, 'ACC04028A7C20240408', 'products', 'inactive', '2024-04-08 16:19:21', '2024-04-08 16:19:21'),
(6, 'ACC3858643E20240408', 'orders', 'inactive', '2024-04-08 16:19:36', '2024-04-08 16:19:36'),
(7, 'ACC11D3CFA320240408', 'discounts', 'inactive', '2024-04-08 16:19:51', '2024-04-08 16:19:51'),
(8, 'ACCD741AD2420240408', 'users', 'active', '2024-04-08 16:20:00', '2024-04-08 16:20:00'),
(9, 'ACCD752AG2600240408', 'live_classes', 'active', '2024-05-15 17:28:09', '2024-05-15 17:28:09'),
(10, 'ACC04687A2J20240408', 'test', 'active', '2024-05-15 19:12:41', '2024-05-15 19:12:41'),
(11, 'ACC09680A2K20240408', 'popular_papers', 'active', '2024-05-15 19:12:41', '2024-05-15 19:12:41'),
(12, 'ACC58010M2K20240408', 'study_materials', 'active', '2024-05-15 19:12:41', '2024-05-15 19:12:41'),
(13, 'ACC28286F4120240408', 'classes_branches', 'active', '2024-05-15 19:12:41', '2024-05-15 19:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `vill_city` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `post_office` varchar(255) DEFAULT NULL,
  `police_station` varchar(255) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `type` enum('S','T') NOT NULL COMMENT 'S=Super Admin, T=Teacher',
  `status` enum('A','I') NOT NULL COMMENT 'A=Active, I=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone_number`, `user_name`, `password`, `registration_no`, `type`, `status`) VALUES
(1, 'atomz', 'atomz@yopmail.com', 9867545673, 'atomz123', 'a1c46c36bf5c2e1b9cc1aea3cbdf7f75', 'reg_867584', 'S', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `admit_form`
--

CREATE TABLE `admit_form` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admit_form`
--

INSERT INTO `admit_form` (`id`, `uid`, `question`, `question_type`, `created_at`) VALUES
(1, 'ADFO42F92A9E20240618', 'Fathers Name', 'text', '2024-06-18 18:35:35'),
(2, 'ADFO89A8D98820240618', 'Age', 'text', '2024-06-18 18:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `ans` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `right_ans` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `uid`, `question_id`, `ans`, `a`, `b`, `c`, `d`, `right_ans`, `created_at`) VALUES
(41, 'ANSD95DAB3C20240602', 'QSTBDC1B84B20240602', '3', '', '', '', '', '', '2024-06-02 15:02:52'),
(40, 'ANS907EB37F20240602', 'QSTCB16CB6420240602', '', 'Static variable', 'Local variable', 'Global variable', 'None of these', 'c', '2024-06-02 15:02:52'),
(39, 'ANS4A59138B20240602', 'QST0B2A911E20240602', 'Hyper-text preprocessor.', '', '', '', '', '', '2024-06-02 15:02:52'),
(38, 'ANSA7B8911820240601', 'QST87F59C9120240601', '', 'To develop organ systems such as the muscular system, digestive system properly.', 'To develop the ability to deal with success and failure with equanimity.', 'To develop understanding and appreciation of the culture which is worldwide.', 'To develop alertness of mind, deep concentration through various physical activities.', 'c', '2024-06-01 16:04:21'),
(37, 'ANSFCDF966020240601', 'QST450FB90320240601', '', '.js', '.class', '.txt', '.java', 'd', '2024-06-01 15:57:44'),
(36, 'ANS0180A9F020240601', 'QSTBA3603C320240601', '', 'identifier & keyword', 'keyword', 'identifier', 'none of the mentioned', 'a', '2024-06-01 15:57:43'),
(35, 'ANSBBF1B1CE20240601', 'QST271097CF20240601', '', 'JRE', 'JDK', 'JIT', 'JVM', 'b', '2024-06-01 15:57:43'),
(34, 'ANS29B1CE6020240601', 'QSTD8DFD34720240601', '', 'Java is a sequence-dependent programming language', ' Java is a platform-dependent programming language', 'Java is a code dependent programming language', 'Java is a platform-independent programming language', 'd', '2024-06-01 15:57:43'),
(33, 'ANSC6944FAF20240601', 'QST1B7EE4C220240601', '', 'Guido van Rossum', 'Dennis Ritchie', 'James Gosling', 'Bjarne Stroustrup', 'c', '2024-06-01 15:57:43'),
(42, 'ANSF73E61D920240622', 'QST1F022ABC20240622', '', 'a', 'b', 'c', 'd', 'c', '2024-06-22 22:52:31'),
(43, 'ANS0B622FC720240622', 'QSTD0F73E5120240622', '', 'a', 'b', 'd', 'c', 'a', '2024-06-22 22:52:31'),
(44, 'ANSD6157FD020240817', 'QST6EC8753A20240817', '', 'aa', 'cc', 'bb', 'dd', 'd', '2024-08-17 16:04:07'),
(45, 'ANSE0FA7C1E20240817', 'QST66BF584D20240817', '', 'aa', 'ab', 'ac', 'ad', 'b', '2024-08-17 16:04:07'),
(46, 'ANS2CEC27E720240817', 'QST2C3FB7BB20240817', '', 'xgn', 'ndg', 'bndg', 'nm', 'c', '2024-08-17 18:20:17'),
(47, 'ANSC9F000BA20240819', 'QSTF7EC258C20240819', '', 'a', 'a', 'r', 'd', 'c', '2024-08-19 14:19:50'),
(48, 'ANS15920A5020240821', 'QST6E64345220240821', '', 'a', 'b', 'c', 'd', 'a', '2024-08-21 11:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `uid`, `title`, `description`, `img`, `link`, `created_at`, `updated_at`) VALUES
(25, 'BNR1992084020240917', '', '', '1726587126_1294fd3ae517745fc4b2.gif', 'afterexcellence', '2024-09-17 15:32:06', '2024-09-17 15:32:06'),
(26, 'BNR37E77E5920240917', '', '', '1726587374_e3f63b310d0aa11d73b0.png', 'afterexcellence', '2024-09-17 15:36:14', '2024-09-17 15:36:14'),
(27, 'BNRD9F2826A20240917', '', '', '1726587587_00ed185cbebff0a414ee.gif', 'afterexcellence', '2024-09-17 15:39:47', '2024-09-17 15:39:47'),
(28, 'BNR28B28CEF20241020', '', '', '1729410100_9bf93f278507c2d5e612.png', '..', '2024-10-20 07:41:40', '2024-10-20 07:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `uid`, `class_id`, `branch_name`, `created_at`, `updated_at`) VALUES
(43, 'BRNCHFC64B47920240916', 'CLS5E47B55320240916', 'FLORA', '2024-09-16 08:48:55', '2024-09-16 08:48:55'),
(42, 'BRNCHF9B2AC5320240916', 'CLSC19C69FF20240916', 'FLORA', '2024-09-16 08:48:44', '2024-09-16 08:48:44'),
(41, 'BRNCHC89CEE4F20240916', 'CLSD0F33ECE20240916', 'FLORA', '2024-09-16 08:48:32', '2024-09-16 08:48:32'),
(44, 'BRNCHEFAFB54E20240916', 'CLS7A9C6C6120240916', 'FLORA', '2024-09-16 08:49:04', '2024-09-16 08:49:04'),
(45, 'BRNCHCA9FB5C820240916', 'CLS9ABE68B520240916', 'FLORA', '2024-09-16 08:49:22', '2024-09-16 08:49:22'),
(46, 'BRNCHD5E8BC2020240916', 'CLS57FCD1D520240916', 'FLORA', '2024-09-16 14:56:22', '2024-09-16 14:56:22'),
(47, 'BRNCHAD5C047E20240919', 'CLSC4FBFE0B20240919', 'FLORA', '2024-09-19 13:26:30', '2024-09-19 13:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` varchar(255) DEFAULT 'null',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uid`, `name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(126, 'CAT5581F94220240516', 'Class 11', 'CATFBA4A08520240516', 'active', '2024-05-16 21:15:31', '2024-05-16 21:15:31'),
(97, 'CAT5E083F1E20240312', 'Round ', 'CATCB514EA220240312', 'active', '2024-03-13 00:07:48', '2024-03-13 00:07:48'),
(98, 'CAT9C8FEF4720240312', 'V neck', 'CATCB514EA220240312', 'active', '2024-03-13 00:07:54', '2024-03-13 00:07:54'),
(95, 'CATFA7E730C20240312', 'Jeans', 'CATABEB187320240312', 'active', '2024-03-13 00:07:27', '2024-03-13 00:07:27'),
(94, 'CATCB514EA220240312', 'T shirt', 'CATABEB187320240312', 'active', '2024-03-13 00:07:23', '2024-03-13 00:07:23'),
(105, 'CATB503178620240313', 'round neck t shirt', 'CAT323DDF2D20240313', 'active', '2024-03-13 16:47:31', '2024-03-13 16:47:31'),
(106, 'CATEA4CE8B020240313', 'v neck tshirt', 'CAT323DDF2D20240313', 'active', '2024-03-13 16:47:39', '2024-03-13 16:47:39'),
(119, 'CAT4D4208FE20240331', 'a1', 'CAT3A4652A220240331', 'active', '2024-03-31 22:19:14', '2024-03-31 22:19:14'),
(128, 'CAT8B993EE820240516', 'JEE Main', 'CAT347B194D20240516', 'active', '2024-05-16 21:26:41', '2024-05-16 21:26:41'),
(144, 'CATE0BC427B20240725', 'Class 12', 'CATFBA4A08520240516', 'active', '2024-07-25 16:11:10', '2024-07-25 16:11:10'),
(103, 'CAT323DDF2D20240313', 't shirt', 'CAT46F542E320240313', 'active', '2024-03-13 16:47:13', '2024-03-13 16:47:13'),
(104, 'CATA617EA5520240313', 'jeans', 'CAT46F542E320240313', 'active', '2024-03-13 16:47:18', '2024-03-13 16:47:18'),
(125, 'CAT1328871420240516', 'Dropout', 'CATFBA4A08520240516', 'active', '2024-05-16 21:15:23', '2024-05-16 21:15:23'),
(96, 'CAT034395FE20240312', 'Shoes', 'CATABEB187320240312', 'active', '2024-03-13 00:07:31', '2024-03-13 00:07:31'),
(123, 'CATFBA4A08520240516', 'NEET 12th ', 'null', 'active', '2024-05-16 21:14:57', '2024-05-16 21:14:57'),
(124, 'CAT347B194D20240516', 'JEE 12th', 'null', 'active', '2024-05-16 21:15:08', '2024-05-16 21:15:08'),
(129, 'CAT0C7C1B3720240516', 'JEE Advance', 'CAT347B194D20240516', 'active', '2024-05-16 21:26:46', '2024-05-16 21:26:46'),
(162, 'CAT086C8DEF20240916', 'MHT-CET', 'null', 'active', '2024-09-16 08:43:51', '2024-09-16 08:43:51'),
(163, 'CATB891C1E920240916', 'NEET 11th', 'null', 'active', '2024-09-16 08:44:30', '2024-09-16 08:44:30'),
(164, 'CATFFB7E5F920240916', 'JEE 11th', 'null', 'active', '2024-09-16 08:44:47', '2024-09-16 08:44:47'),
(165, 'CATC4E576E720240916', 'NEET Repeated Batch 2024', 'null', 'active', '2024-09-16 14:56:05', '2024-09-16 14:56:05'),
(166, 'CAT6B552E4C20240919', 'School', 'null', 'active', '2024-09-19 13:26:08', '2024-09-19 13:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` enum('A','I') NOT NULL,
  `date_created` date NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `is_active`, `date_created`, `parent_id`, `created_by`, `status`) VALUES
(1, 'Design', 'A course description serves to state the rationale for the course and give an overview of key content covered, skills and knowledge to be learned, and how it will benefit the student. It may include learning strategies and major activities, if it would be', 'A', '2024-04-07', 0, 1, '1'),
(2, 'Development', 'A course description serves to state the rationale for the course and give an overview of key content covered, skills and knowledge to be learned, and how it will benefit the student. It may include learning strategies and major activities, if it would be', 'A', '2024-04-16', 0, 1, '1'),
(3, 'Class 11', 'For example, we offer workshops on topics such as self-care or stress reduction.', 'A', '2024-04-20', 1, 1, '1'),
(4, 'Class 12', 'For example, we offer workshops on topics such as self-care or stress reduction.', 'A', '2024-04-20', 1, 1, '1'),
(5, 'Dropper', 'For example, we offer workshops on topics such as self-care or stress reduction.', 'A', '2024-04-20', 1, 1, '1'),
(6, 'Architecture', 'Architecture is the art and science of Designing and engineering large structures and buildings.', 'A', '2024-04-22', 0, 1, '1'),
(7, 'CAT', 'The full form of CAT is the Common Admission Test. CAT is a computer-based examination conducted by IIM to shortlist candidates for the postgraduate programme', 'A', '2024-04-22', 6, 1, '1'),
(8, 'GAMT', 'GMAT stands for Graduate Management Admission Test. The GMAT online exam is a standardised test necessary for admission to any of the top business schools in the world. A high GMAT score reveals that your logical and thinking skills are vital.', 'A', '2024-04-22', 6, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`id`, `uid`, `city_id`, `name`, `location`, `img`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CNTR1F5145F220240524', 'CTYDB6B02EA20240524', 'English Study Home', 'Patna City, Patna, Bihar, India, 712452', '1716559293_a23cd2ca3f6ecf001ef6.jpg', '4789658426', 'active', '2024-05-24 14:32:41', '2024-05-24 14:01:35'),
(3, 'CNTR9E81AF8620240524', 'CTYDB6B02EA20240524', 'English Home', 'patna city, patna, bihar, india, 785412', '1716561285_75378dc04679bec036ba.jpg', '1458965873', 'active', '2024-05-24 14:34:47', '2024-05-24 14:34:25'),
(5, 'CNTRB3CA55D620240526', 'CTYDB6B02EA20240524', 't', 'Pune', '1716708893_91258a6410af85f62f91.png', '9123325003', 'active', '2024-05-26 07:34:52', '2024-05-26 07:34:52'),
(6, 'CNTR6369606F20240618', 'CTY0F6F99E720240613', 'ATOMZ', 'Kolkata', '1718714985_64a0fece7d81c2c93996.jpg', '9163465606', 'active', '2024-06-18 12:49:45', '2024-06-18 12:49:45'),
(9, 'CNTRDF64E96F20240618', 'CTY0F6F99E720240613', 'ATOMZ', 'Kolkata 2', '1718715195_ef9b3b3ab24d3f0bb080.jpg', '9163465605', 'active', '2024-06-18 12:53:15', '2024-06-18 12:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `centres` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `uid`, `name`, `img`, `centres`, `status`, `created_at`, `updated_at`) VALUES
(5, 'CTY94226BD420240526', 'Pune Maharashtra', '1721906572_3d10874f36ba2e613e0d.jpeg', NULL, 'active', '2024-07-25 11:22:53', '2024-05-26 09:12:45'),
(9, 'CTYEA5D625C20240725', 'Latur Maharashtra', '1721905282_13a6f50755e190ce7969.jpg', NULL, 'active', '2024-07-25 11:13:37', '2024-07-25 10:54:15'),
(10, 'CTY64B3D2BC20240730', 'Kolkata', '1722319196_a7edc63621836eb055bf.png', NULL, 'active', '2024-07-30 05:59:56', '2024-07-30 05:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `uid`, `class_name`, `created_at`, `updated_at`) VALUES
(20, 'CLS5E47B55320240916', 'JEE 12th', '2024-09-16 08:48:55', '2024-09-16 08:48:55'),
(19, 'CLSC19C69FF20240916', 'NEET 12th', '2024-09-16 08:48:44', '2024-09-16 08:48:44'),
(18, 'CLSD0F33ECE20240916', 'JEE 11th', '2024-09-16 08:48:32', '2024-09-16 08:48:32'),
(21, 'CLS7A9C6C6120240916', 'JEE 11th', '2024-09-16 08:49:04', '2024-09-16 08:49:04'),
(22, 'CLS9ABE68B520240916', 'MHT-CET 12 th ', '2024-09-16 08:49:22', '2024-09-16 08:49:22'),
(23, 'CLS57FCD1D520240916', 'NEET Repeated Batch 2024', '2024-09-16 14:56:22', '2024-09-16 14:56:22'),
(24, 'CLSC4FBFE0B20240919', 'School ', '2024-09-19 13:26:30', '2024-09-19 13:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `ccode` varchar(50) NOT NULL,
  `cdetails` varchar(255) NOT NULL,
  `about_course` varchar(255) NOT NULL,
  `start_form` date NOT NULL,
  `cprice` int(11) NOT NULL,
  `cduration` int(11) NOT NULL,
  `maximum_student` int(11) NOT NULL,
  `professor_name` varchar(255) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `cphoto` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cname`, `ccode`, `cdetails`, `about_course`, `start_form`, `cprice`, `cduration`, `maximum_student`, `professor_name`, `contact_number`, `cphoto`, `category_id`, `status`) VALUES
(1, 'When Is the Best Time to Take an Education Course?', 'code-3445', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '2024-04-17', 5000, 60, 30, 'Nashid Martines', 7654567865, 'pic1.jpg', 1, '1'),
(2, 'Education Courses: A Guide to Unlocking Your Potential', 'code-9865', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '2024-04-19', 6000, 120, 120, 'Jack Ronan', 4564564645, 'pic2.jpg', 1, '1'),
(3, 'A Comprehensive Guide to Taking an Education Course', 'code-3246', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '2024-04-16', 9000, 90, 170, 'Jimmy Morris', 4564564645, 'pic3.jpg', 1, '1'),
(4, 'sdfsfs', 'bnm', 'sdfsd', '', '2024-04-23', 56, 5, 56, 'fhg', 4564564645, '16189838101.jpg', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_lecturer`
--

CREATE TABLE `course_lecturer` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_lecturer`
--

INSERT INTO `course_lecturer` (`id`, `uid`, `course_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 'PROFA3F7A7A720240521', 'PRO4202EC5420240521', 'USRBC4BB2D720240513', 'active', '2024-05-21 21:01:18', '2024-05-21 21:01:18'),
(9, 'PROF21FE5F6520240521', 'PRO1696A94F20240521', 'USR6AAFB06C20240513', 'active', '2024-05-21 19:50:25', '2024-05-21 19:50:25'),
(8, 'PROF58B0625D20240516', 'PROB7288D1220240516', 'USR8762EAEF20240515', 'active', '2024-05-16 21:57:03', '2024-05-16 21:57:03'),
(7, 'PROF3FFBEC9E20240513', 'PRO8B2F61E520240513', 'USR6AAFB06C20240513', 'active', '2024-05-13 12:20:10', '2024-05-13 12:20:10'),
(6, 'PROFBCF0E15520240513', 'PRO58A617CC20240513', 'USR6AAFB06C20240513', 'active', '2024-05-13 11:59:51', '2024-05-13 11:59:51'),
(11, 'PROF9722E7F720240622', 'PRO05BC893720240622', 'USRF42CBAE720240622', 'active', '2024-06-22 21:09:38', '2024-06-22 21:09:38'),
(12, 'PROF4E2F3FD120240622', 'PRO2333636F20240622', 'USRF42CBAE720240622', 'active', '2024-06-22 21:25:17', '2024-06-22 21:25:17'),
(13, 'PROF02953DCF20240622', 'PROE3A9CE1320240622', 'USRF42CBAE720240622', 'active', '2024-06-22 22:11:53', '2024-06-22 22:11:53'),
(14, 'PROFEE19739A20240622', 'PRO4D85F67220240622', 'USRF42CBAE720240622', 'active', '2024-06-22 22:14:20', '2024-06-22 22:14:20'),
(15, 'PROF5DB4287F20240622', 'PRO54FEF7F620240622', 'USRF42CBAE720240622', 'active', '2024-06-22 22:45:25', '2024-06-22 22:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `minimum_purchase` varchar(255) NOT NULL,
  `discount_percentage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `important_notes`
--

CREATE TABLE `important_notes` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` longtext NOT NULL,
  `centre_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `important_notes`
--

INSERT INTO `important_notes` (`id`, `uid`, `title`, `note`, `centre_name`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'IMPNOTEFDFEE2920240618', 'Reporting Time at Centre: 9:30am', '<p>(i) Students must Carry Blue/Black Ball point Pen to fill the OMR Sheets</p><p>(ii) There should be no tampering while filing up the OMR sheets</p><p>(iii) Students must Reach the Center before 9:30am</p>', '[\"BRS School, Chittaranjan\"]', '[\"2024-07-06\"]', '[{\"start\":\"10:00\",\"end\":\"11:00\"}]', '2024-06-18 18:35:35', '2024-06-18 18:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `live_class`
--

CREATE TABLE `live_class` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `video_path` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `live_class`
--

INSERT INTO `live_class` (`id`, `uid`, `class_id`, `branch_id`, `title`, `keyword`, `img`, `link`, `video_path`, `description`, `created_at`, `updated_at`) VALUES
(21, 'LIVCLSB51C238720241031', 'CLSC19C69FF20240916', 'BRNCHF9B2AC5320240916', 'dasg', 'fgsdhg', '1730377092_5676651aa37005eda617.png', 'undefined', 'video_67237584692449.35852014.mp4', '<p>fgsdhfghs</p>', '2024-10-31 17:48:12', '2024-10-31 17:48:12'),
(20, 'LIVCLS5163EC5D20241031', 'CLSC19C69FF20240916', 'BRNCHF9B2AC5320240916', 'dasg', 'fgsdhg', '1730376726_5a9ab62ce2db8b315b62.png', 'undefined', 'video_67237416cfd999.52940200.mp4', '<p>fgsdhfghs</p>', '2024-10-31 17:42:06', '2024-10-31 17:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `user_id` text NOT NULL,
  `shipping_address_id` text NOT NULL,
  `shipping_method` text NOT NULL,
  `user_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `email` text NOT NULL,
  `order_discount_amount` text NOT NULL,
  `order_discount_percentage` text NOT NULL,
  `sub_total` text NOT NULL,
  `total` text NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'placed',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `payment_type` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `user_id`, `shipping_address_id`, `shipping_method`, `user_name`, `phone_number`, `email`, `order_discount_amount`, `order_discount_percentage`, `sub_total`, `total`, `order_status`, `status`, `payment_type`, `created_at`, `deleted_at`, `updated_at`) VALUES
(53, 'ORD40E6A5E220240501', 'USR03CB470120240424', 'ADRS4649B0AC20240424', 'free', 'rohan0420', '6290353314', 'skrohan0420@gmail.com', '0.00', '0', '6460.74', '6460.74', 'confirmed', 'active', 'cod', '2024-05-01 13:56:33', '2024-05-01 13:56:33', '2024-05-01 13:56:33'),
(57, 'ORD42A6123020240521', 'USR5BD560AC20240510', '', 'free', 'Student Subhankar', '9679377775', 'subhankar@gmail.com', '', '', '899.1', '899.1', 'confirmed', 'active', 'cod', '2024-05-21 23:19:48', '2024-05-21 23:19:48', '2024-05-21 23:19:48'),
(56, 'ORDEB6EF23E20240521', 'USR5BD560AC20240510', '', 'free', 'Student Subhankar', '9679377775', 'subhankar@gmail.com', '', '', '91150', '91150', 'placed', 'active', 'cod', '2024-05-21 21:01:43', '2024-05-21 21:01:43', '2024-05-21 21:01:43'),
(54, 'ORD6DE7B9F920240521', 'USR5BD560AC20240510', '', 'free', 'Student Subhankar', '9679377775', 'subhankar@gmail.com', '', '', '899.1', '899.1', 'confirmed', 'active', 'cod', '2024-05-21 17:02:14', '2024-05-21 17:02:14', '2024-05-21 17:02:14'),
(58, 'ORD6425A77C20240622', 'USR5BD560AC20240510', '', 'free', 'Student Subhankar', '9679377775', 'subhankar@gmail.com', '', '', '19000', '19000', 'confirmed', 'active', 'cod', '2024-06-22 22:10:22', '2024-06-22 22:10:22', '2024-06-22 22:10:22'),
(59, 'ORDB985710E20240622', 'USR5BD560AC20240510', '', 'free', 'Student Subhankar', '9679377775', 'subhankar@gmail.com', '', '', '538.02', '538.02', 'confirmed', 'active', 'cod', '2024-06-22 22:48:04', '2024-06-22 22:48:04', '2024-06-22 22:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders_cancelled`
--

CREATE TABLE `orders_cancelled` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_cancelled`
--

INSERT INTO `orders_cancelled` (`id`, `uid`, `order_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 'orders_cancelled2E77DF1D20240403', 'ORDCBB6DAC920240402', 'oui', '2024-04-03 18:14:34', '2024-04-03 18:14:34'),
(2, 'orders_cancelled84134D9320240403', 'ORDCBB6DAC920240402', 'oui', '2024-04-03 18:15:03', '2024-04-03 18:15:03'),
(3, 'orders_cancelled3D0E5ACF20240403', 'ORDF1A2F23120240401', 'hgjh', '2024-04-03 18:16:00', '2024-04-03 18:16:00'),
(4, 'orders_cancelled7B4C0A0120240403', 'ORD80AACD2A20240401', '', '2024-04-03 18:16:06', '2024-04-03 18:16:06'),
(5, 'orders_cancelledDA35ED2D20240403', 'ORD054D793520240401', '', '2024-04-03 18:22:17', '2024-04-03 18:22:17'),
(6, 'orders_cancelled588EEB6020240403', 'ORD47B3C47B20240330', '', '2024-04-03 18:23:17', '2024-04-03 18:23:17'),
(7, 'orders_cancelled407B509C20240403', 'ORDD2D1641F20240403', 'gfhdg', '2024-04-03 18:30:25', '2024-04-03 18:30:25'),
(8, 'orders_cancelled841F74B520240403', 'ORD63E3766920240403', 'test cancel', '2024-04-03 19:09:29', '2024-04-03 19:09:29'),
(9, 'orders_cancelledF979DFF020240404', 'ORD2E4CFD0C20240403', 'kl', '2024-04-04 11:48:46', '2024-04-04 11:48:46'),
(10, 'orders_cancelledFE570AE420240404', 'ORD2E4CFD0C20240403', ',hj', '2024-04-04 11:49:52', '2024-04-04 11:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders_return`
--

CREATE TABLE `orders_return` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `order_item_id` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_return`
--

INSERT INTO `orders_return` (`id`, `uid`, `order_id`, `order_item_id`, `reason`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'RTN03F1ABAD20240404', 'ORD5AE812C420240404', '', '', 'requested', 'order', '2024-04-04 17:18:21', '2024-04-04 17:18:21'),
(2, 'RTN6947384720240404', 'ORD5AE812C420240404', '', 'fgdf', 'requested', 'order', '2024-04-04 17:20:52', '2024-04-04 17:20:52'),
(3, 'RTNE3C41D1B20240404', 'ORD5AE812C420240404', '', 'fgdf', 'requested', 'order', '2024-04-04 17:50:41', '2024-04-04 17:50:41'),
(4, 'RTN66D318B020240404', 'ORD5AE812C420240404', '', '', 'requested', 'order', '2024-04-04 17:50:52', '2024-04-04 17:50:52'),
(5, 'RTN214C25B020240404', 'ORD5AE812C420240404', '', '', 'requested', 'order', '2024-04-04 17:51:01', '2024-04-04 17:51:01'),
(6, 'RTN31A7268720240404', 'ORD2E4CFD0C20240403', '', 'treuty', 'accepted', 'order', '2024-04-04 19:34:04', '2024-04-04 19:34:04'),
(7, 'RTN469AEF8620240404', 'ORD63E3766920240403', '', '', 'requested', 'order', '2024-04-04 19:44:31', '2024-04-04 19:44:31'),
(8, 'RTNA675DB7D20240405', 'ORD5AE812C420240404', 'PRO26DF072620240326', '', 'requested', 'item', '2024-04-05 12:33:56', '2024-04-05 12:33:56'),
(9, 'RTN8289F05C20240405', 'ORD5AE812C420240404', '', '', 'requested', 'order', '2024-04-05 12:34:30', '2024-04-05 12:34:30'),
(10, 'RTNEECE9FA820240405', 'ORD37567B2720240405', '', 'dfs', 'accepted', 'order', '2024-04-05 13:44:15', '2024-04-05 13:44:15'),
(11, 'RTN6FC6A56720240405', 'ORD2E2E6A6A20240405', 'PRO26DF072620240326', 'jfgj', 'requested', 'item', '2024-04-05 15:41:58', '2024-04-05 15:41:58'),
(12, 'RTNE687C1AC20240405', 'ORD77DBC9A320240405', 'PRO26DF072620240326', 'return', 'requested', 'item', '2024-04-05 16:57:13', '2024-04-05 16:57:13'),
(13, 'RTN4862B0C120240405', 'ORD77DBC9A320240405', 'PRO26DF072620240326', '', 'requested', 'item', '2024-04-05 16:58:33', '2024-04-05 16:58:33'),
(14, 'RTN9685B4E620240405', 'ORD77DBC9A320240405', 'PRO26DF072620240326', 'thala', 'requested', 'item', '2024-04-05 19:44:26', '2024-04-05 19:44:26'),
(15, 'RTN2CADCD1C20240427', 'ORD8879D3A120240427', '', 'qwerty', 'requested', 'order', '2024-04-27 17:28:52', '2024-04-27 17:28:52'),
(16, 'RTN3804448320240427', 'ORDE4A45CBE20240427', '', 'qwertyu', 'requested', 'order', '2024-04-27 17:29:57', '2024-04-27 17:29:57'),
(17, 'RTN12DDBAE920240427', 'ORD6A8C7AE020240427', '', 'werty', 'requested', 'order', '2024-04-27 17:47:44', '2024-04-27 17:47:44'),
(18, 'RTNDF8A6B3320240501', 'ORD40E6A5E220240501', '', 'return', 'returned', 'order', '2024-05-01 14:26:45', '2024-05-01 14:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `order_id` text NOT NULL,
  `product_id` text NOT NULL,
  `product_config_id` text NOT NULL,
  `price` text NOT NULL,
  `qty` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'placed',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `uid`, `order_id`, `product_id`, `product_config_id`, `price`, `qty`, `status`, `updated_at`, `created_at`) VALUES
(96, 'ORDI4152E99720240521', 'ORD42A6123020240521', 'PROB7288D1220240516', '', '899.1', '1', 'placed', '2024-05-21 23:19:48', '2024-05-21 23:19:48'),
(95, 'ORDIF10AD56A20240521', 'ORDEB6EF23E20240521', 'PRO1696A94F20240521', '', '18000', '1', 'placed', '2024-05-21 21:01:43', '2024-05-21 21:01:43'),
(94, 'ORDIE8F98DF720240521', 'ORDEB6EF23E20240521', 'PRO4202EC5420240521', '', '73150', '1', 'placed', '2024-05-21 21:01:43', '2024-05-21 21:01:43'),
(92, 'ORDIA6731D8120240521', 'ORD6DE7B9F920240521', 'PROB7288D1220240516', '', '899.1', '1', 'placed', '2024-05-21 17:02:14', '2024-05-21 17:02:14'),
(97, 'ORDI7D24E81220240622', 'ORD6425A77C20240622', 'PRO2333636F20240622', '', '19000', '1', 'placed', '2024-06-22 22:10:22', '2024-06-22 22:10:22'),
(98, 'ORDIF94C7E5A20240622', 'ORDB985710E20240622', 'PRO54FEF7F620240622', '', '538.02', '1', 'placed', '2024-06-22 22:48:04', '2024-06-22 22:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `otp` int(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `uid`, `user_id`, `otp`, `created_at`, `updated_at`) VALUES
(4, 'OTP07A6DEA220240223', 'USR526D873220240223', 1234, '2024-02-23 16:42:32', '2024-02-23 16:42:32'),
(5, 'OTPDAD7E14D20240227', 'USRECE81D7320240227', 1234, '2024-02-27 15:27:15', '2024-02-27 15:27:15'),
(6, 'OTPA21F349E20240227', 'USR526D873220240223', 1234, '2024-02-27 18:00:01', '2024-02-27 18:00:01'),
(7, 'OTP27F02E2620240227', 'USR526D873220240223', 1234, '2024-02-27 18:00:12', '2024-02-27 18:00:12'),
(8, 'OTP13039D7C20240227', 'USR526D873220240223', 1234, '2024-02-27 18:05:10', '2024-02-27 18:05:10'),
(9, 'OTP0F502A1620240227', 'USR526D873220240223', 1234, '2024-02-27 18:07:12', '2024-02-27 18:07:12'),
(10, 'OTP1167A34420240227', 'USR526D873220240223', 1234, '2024-02-27 18:07:30', '2024-02-27 18:07:30'),
(11, 'OTP311565E620240227', 'USR526D873220240223', 1234, '2024-02-27 18:09:17', '2024-02-27 18:09:17'),
(12, 'OTP5605CB4620240227', 'USR526D873220240223', 1234, '2024-02-27 18:10:09', '2024-02-27 18:10:09'),
(13, 'OTP40D140EF20240227', 'USR526D873220240223', 1234, '2024-02-27 18:11:59', '2024-02-27 18:11:59'),
(14, 'OTPE9F93A3020240227', 'USR526D873220240223', 1234, '2024-02-27 19:16:25', '2024-02-27 19:16:25'),
(15, 'OTPA99C833620240227', 'USR526D873220240223', 1234, '2024-02-27 19:17:34', '2024-02-27 19:17:34'),
(16, 'OTP82B1ABDE20240227', 'USR526D873220240223', 1234, '2024-02-27 19:17:58', '2024-02-27 19:17:58'),
(17, 'OTP1139627120240227', 'USR5FE6CF6A20240227', 1234, '2024-02-27 19:20:24', '2024-02-27 19:20:24'),
(18, 'OTP886A448920240228', 'USRFADD472E20240228', 1234, '2024-02-28 16:06:51', '2024-02-28 16:06:51'),
(19, 'OTP4F3B6FF320240301', 'USRECE81D7320240227', 1234, '2024-03-01 19:38:02', '2024-03-01 19:38:02'),
(20, 'OTP1CE7539320240301', 'USRC30CA0F120240301', 1234, '2024-03-01 19:38:53', '2024-03-01 19:38:53'),
(21, 'OTPD1CA857820240305', 'USR526D873220240223', 1234, '2024-03-05 19:28:15', '2024-03-05 19:28:15'),
(22, 'OTPCDE6BCD120240306', 'USR5FE6CF6A20240227', 1234, '2024-03-06 17:29:02', '2024-03-06 17:29:02'),
(23, 'OTP5DD934CF20240306', 'USR057140F420240306', 1234, '2024-03-06 18:51:55', '2024-03-06 18:51:55'),
(24, 'OTP1E5A658E20240307', 'USR5FE6CF6A20240227', 1234, '2024-03-07 17:15:15', '2024-03-07 17:15:15'),
(25, 'OTP7BAA3E5F20240312', 'USR0DFD771020240312', 1234, '2024-03-13 02:20:00', '2024-03-13 02:20:00'),
(26, 'OTP081E15D020240316', 'USR6A30957520240316', 1234, '2024-03-16 17:42:03', '2024-03-16 17:42:03'),
(27, 'OTP055CE00120240316', 'USR6F53215520240316', 1234, '2024-03-16 17:52:14', '2024-03-16 17:52:14'),
(28, 'OTP5348DD5720240318', 'USR0AA36B1D20240318', 1234, '2024-03-18 11:14:44', '2024-03-18 11:14:44'),
(29, 'OTPF0EFB90820240320', 'USR6DF2CE3720240320', 1234, '2024-03-20 18:55:04', '2024-03-20 18:55:04'),
(30, 'OTPF2058DF820240320', 'USRE81D06D220240320', 1234, '2024-03-20 23:01:26', '2024-03-20 23:01:26'),
(31, 'OTPD89772FC20240320', 'USR07EA0E5A20240320', 1234, '2024-03-20 23:19:26', '2024-03-20 23:19:26'),
(32, 'OTPB6043CF620240326', 'USRD60744C120240326', 1234, '2024-03-26 09:47:41', '2024-03-26 09:47:41'),
(33, 'OTP834D3A4220240403', 'USR467A4CC220240403', 1234, '2024-04-03 15:57:21', '2024-04-03 15:57:21'),
(34, 'OTP245F10B920240404', 'USR0AA36B1D20240318', 1234, '2024-04-04 11:49:14', '2024-04-04 11:49:14'),
(35, 'OTP20F778FA20240405', 'USRC66DA3A020240405', 1234, '2024-04-05 13:21:10', '2024-04-05 13:21:10'),
(36, 'OTP9DEA71A820240410', 'USR02AC942420240410', 1234, '2024-04-10 13:31:35', '2024-04-10 13:31:35'),
(37, 'OTPC1CD76E520240424', 'USR03CB470120240424', 1234, '2024-04-25 04:55:26', '2024-04-25 04:55:26'),
(38, 'OTP8A6EB95420240611', 'USRAC08079F20240611', 1234, '2024-06-11 12:00:42', '2024-06-11 12:00:42'),
(39, 'OTP3C8AE3AD20240611', 'USR375615C620240611', 1234, '2024-06-11 12:03:02', '2024-06-11 12:03:02'),
(40, 'OTP33D4AEE820240611', 'USR4DBC1B5B20240611', 1234, '2024-06-11 14:58:43', '2024-06-11 14:58:43'),
(41, 'OTP0AB083E020240611', '77', 1554, '2024-06-11 16:04:34', '2024-06-11 16:04:34'),
(42, 'OTPDF97AF4C20240611', 'USR43C545DB20240611', 2969, '2024-06-11 16:14:44', '2024-06-11 16:14:44'),
(43, 'OTPA8C4244C20240611', 'USR028953HJ0240410', 1234, '2024-06-11 16:17:27', '2024-06-11 16:17:27'),
(44, 'OTP629515FB20240611', 'USR2B2D03A020240611', 4650, '2024-06-11 16:33:31', '2024-06-11 16:33:31'),
(45, 'OTPA485B65220240611', 'USR0E20DE5120240611', 3514, '2024-06-11 16:51:39', '2024-06-11 16:51:39'),
(46, 'OTP65952A5B20240611', 'USR3891CB9420240611', 8031, '2024-06-11 17:52:20', '2024-06-11 17:52:20'),
(47, 'OTP86AEE00820240611', '83', 6241, '2024-06-11 17:52:40', '2024-06-11 17:52:40'),
(48, 'OTP4993994920240611', 'USR3891CB9420240611', 9550, '2024-06-11 17:53:37', '2024-06-11 17:53:37'),
(49, 'OTPF7E8F13020240611', 'USR3891CB9420240611', 8533, '2024-06-11 17:59:32', '2024-06-11 17:59:32'),
(50, 'OTPFB6490F620240611', 'USR3891CB9420240611', 4648, '2024-06-11 18:00:36', '2024-06-11 18:00:36'),
(51, 'OTP314DD5DB20240611', 'USR3891CB9420240611', 4457, '2024-06-11 18:01:05', '2024-06-11 18:01:05'),
(52, 'OTPE09EDFBF20240611', 'USR3891CB9420240611', 8877, '2024-06-11 18:01:46', '2024-06-11 18:01:46'),
(53, 'OTP34BF900920240611', 'USR3891CB9420240611', 1234, '2024-06-11 18:03:08', '2024-06-11 18:03:08'),
(54, 'OTPDBA5A81D20240611', 'USR3891CB9420240611', 2390, '2024-06-11 18:08:29', '2024-06-11 18:08:29'),
(55, 'OTP1F0BDA4520240611', 'USR3891CB9420240611', 8048, '2024-06-11 18:09:14', '2024-06-11 18:09:14'),
(56, 'OTPDD0C3A8320240611', 'USR3891CB9420240611', 3961, '2024-06-11 18:10:44', '2024-06-11 18:10:44'),
(57, 'OTP9C72132B20240611', 'USR3891CB9420240611', 8552, '2024-06-11 18:12:13', '2024-06-11 18:12:13'),
(58, 'OTP1CD9381A20240611', 'USR3891CB9420240611', 4598, '2024-06-11 18:12:45', '2024-06-11 18:12:45'),
(59, 'OTPAB3E50F620240612', 'USR0A59828F20240612', 1667, '2024-06-12 15:25:27', '2024-06-12 15:25:27'),
(60, 'OTPAAFC0E4F20240612', 'USR0A59828F20240612', 5678, '2024-06-12 15:25:32', '2024-06-12 15:25:32'),
(61, 'OTP26C7229F20240612', 'USR0A59828F20240612', 3120, '2024-06-12 15:25:49', '2024-06-12 15:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `order_id` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `uid`, `order_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PAYA0EB24F920240330', 'ORD47B3C47B20240330', 'cod', 'pending', '2024-03-30 15:48:03', '2024-03-30 15:48:03'),
(58, 'PAY3395C18F20240521', 'ORD42A6123020240521', 'cod', 'paid', '2024-05-21 23:19:48', '2024-05-21 23:19:48'),
(57, 'PAY401CCF1B20240521', 'ORDEB6EF23E20240521', 'cod', 'paid', '2024-05-21 21:01:43', '2024-05-21 21:01:43'),
(55, 'PAY03C3E77020240521', 'ORD6DE7B9F920240521', 'cod', 'paid', '2024-05-21 17:02:14', '2024-05-21 17:02:14'),
(59, 'PAYE1EABC1A20240622', 'ORD6425A77C20240622', 'cod', 'paid', '2024-06-22 22:10:22', '2024-06-22 22:10:22'),
(60, 'PAYC00EE54A20240622', 'ORDB985710E20240622', 'cod', 'paid', '2024-06-22 22:48:04', '2024-06-22 22:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `popular_paper`
--

CREATE TABLE `popular_paper` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pdf` longtext NOT NULL,
  `link` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `uid`, `vendor_id`, `category_id`, `name`, `description`, `video_url`, `created_at`, `updated_at`) VALUES
(82, 'PRO54FEF7F620240622', 'VEN9056TYUI453228', 'CAT1328871420240516', 'NEET Course for Class 11', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.youtube.com/embed/zmnFQkH4Jc4?si=YQeZumc19HnKUTzO', '2024-06-22 22:45:25', '2024-06-22 22:45:25'),
(84, 'PROBAE0BED720240622', 'VEN9056TYUI453228', 'CAT5581F94220240516', 'Education Course ', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.youtube.com/embed/zmnFQkH4Jc4?si=YQeZumc19HnKUTzO', '2024-06-23 00:06:44', '2024-06-23 00:06:44'),
(85, 'PROBBEB206820240622', 'VEN9056TYUI453228', 'CAT8B993EE820240516', 'Education Course', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.youtube.com/embed/zmnFQkH4Jc4?si=YQeZumc19HnKUTzO', '2024-06-23 00:57:49', '2024-06-23 00:57:49'),
(86, 'PRO43E23BC520240725', 'VEN9056TYUI453228', 'CAT0C7C1B3720240516', 'NEET Course for Class 12', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.youtube.com/embed/zmnFQkH4Jc4?si=YQeZumc19HnKUTzO', '2024-07-25 16:40:51', '2024-07-25 16:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_config`
--

CREATE TABLE `product_config` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `variation_option_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'path',
  `src` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `uid`, `product_id`, `type`, `src`, `created_at`, `updated_at`) VALUES
(155, 'PRG650C808E20240521', 'PRO4202EC5420240521', 'path', '1716305478_90f85c3ade216b338719.jpg', '2024-05-21 21:01:18', '2024-05-21 21:01:18'),
(154, 'PRG5BF1481220240521', 'PRO1696A94F20240521', 'path', '1716301223_82d46808dfd590580f90.jpg', '2024-05-21 19:50:25', '2024-05-21 19:50:25'),
(153, 'PRG96085D8C20240516', 'PROB7288D1220240516', 'path', '1716045482_db34df4e371014e29eb8.png', '2024-05-16 21:57:02', '2024-05-16 21:57:02'),
(151, 'PRGCB3EB5D120240513', 'PRO58A617CC20240513', 'path', '1715581791_844220d54fc245c2b873.jpg', '2024-05-13 11:59:51', '2024-05-13 11:59:51'),
(152, 'PRG214BBBC720240513', 'PRO8B2F61E520240513', 'path', '1715583010_62ce957ec3529fbc857c.jpg', '2024-05-13 12:20:10', '2024-05-13 12:20:10'),
(156, 'PRG40FB405E20240622', 'PRO05BC893720240622', 'path', '1719070777_adc8038244950bd9aeb7.jpg', '2024-06-22 21:09:38', '2024-06-22 21:09:38'),
(157, 'PRG5E4FD82E20240622', 'PRO2333636F20240622', 'path', '1719071716_9b5103fab4cbd66a1d54.jpg', '2024-06-22 21:25:17', '2024-06-22 21:25:17'),
(158, 'PRGEBB7C3E120240622', 'PROE3A9CE1320240622', 'path', '1719074513_2b48ab9a57c265b01cd0.jpg', '2024-06-22 22:11:53', '2024-06-22 22:11:53'),
(159, 'PRGB64F13B520240622', 'PRO4D85F67220240622', 'path', '1719074660_1cd2f0848653bf55ec64.jpg', '2024-06-22 22:14:20', '2024-06-22 22:14:20'),
(160, 'PRG722A806720240622', 'PRO54FEF7F620240622', 'path', '1721905776_dfb538b09b1735db9228.png', '2024-06-22 22:45:25', '2024-06-22 22:45:25'),
(161, 'PRG7618D75E20240622', 'PRO6C5C1E7020240622', 'path', '1719081245_45c20c41798f0a4b0d3c.jpg', '2024-06-23 00:04:07', '2024-06-23 00:04:07'),
(162, 'PRGCA80799120240622', 'PROBAE0BED720240622', 'path', '1721905696_3b8f66f69cfbd4a72213.png', '2024-06-23 00:06:44', '2024-06-23 00:06:44'),
(163, 'PRGC780DC4820240622', 'PROBBEB206820240622', 'path', '1721905747_68cdce1c0292b105cd16.png', '2024-06-23 00:57:49', '2024-06-23 00:57:49'),
(164, 'PRGFB2179D820240725', 'PRO43E23BC520240725', 'path', '1721905850_4fe82b2fe0a5c80cf826.png', '2024-07-25 16:40:51', '2024-07-25 16:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `about_product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL DEFAULT '0',
  `product_tags` varchar(255) NOT NULL,
  `publish_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `max_student` varchar(255) NOT NULL,
  `enrolled` varchar(255) NOT NULL,
  `professor_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`id`, `uid`, `product_id`, `about_product`, `price`, `discount`, `sku`, `product_tags`, `publish_date`, `status`, `visibility`, `code`, `duration`, `start_date`, `max_student`, `enrolled`, `professor_name`, `contact`, `created_at`, `updated_at`) VALUES
(74, 'PRI80C81E5020240725', 'PRO43E23BC520240725', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '612', '0', '0', '', '15-01-2030', 'published', 'public', '1234', '1 Year', '01-01-2001', '10000', '0', 'NA', 'NA', '2024-07-25 16:40:51', '2024-07-25 16:40:51'),
(70, 'PRI222A347920240622', 'PRO54FEF7F620240622', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '549', '2', '0', '', '', 'published', 'public', '1234', '3 years', '2024-06-24', '50', '0', 'USRF42CBAE720240622', '9123325003', '2024-06-22 22:45:25', '2024-06-22 22:45:25'),
(72, 'PRIE9126CA020240622', 'PROBAE0BED720240622', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '200', '0', '0', '', '', 'published', 'public', 'BTECH003456', '6 Months', '01-01-2001', '10000', '0', 'NA', 'NA', '2024-06-23 00:06:44', '2024-06-23 00:06:44'),
(73, 'PRI5B6A005020240622', 'PROBBEB206820240622', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '770', '0', '0', '', '15-01-2030', 'published', 'public', 'DIPLOMA0011223344', '3 years', '01-01-2001', '10000', '0', 'NA', 'NA', '2024-06-23 00:57:49', '2024-06-23 00:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_meta_detalis`
--

CREATE TABLE `product_meta_detalis` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_meta_detalis`
--

INSERT INTO `product_meta_detalis` (`id`, `uid`, `product_id`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(75, 'PRM4927C34120240521', 'PRO4202EC5420240521', '', '', '', '2024-05-21 21:01:18', '2024-05-21 21:01:18'),
(74, 'PRM3C048C7720240521', 'PRO1696A94F20240521', '', '', '', '2024-05-21 19:50:25', '2024-05-21 19:50:25'),
(73, 'PRM2F80DAD320240516', 'PROB7288D1220240516', '', '', '', '2024-05-16 21:57:03', '2024-05-16 21:57:03'),
(71, 'PRMCA003AE020240513', 'PRO58A617CC20240513', '', '', '', '2024-05-13 11:59:51', '2024-05-13 11:59:51'),
(72, 'PRM258C665A20240513', 'PRO8B2F61E520240513', '', '', '', '2024-05-13 12:20:10', '2024-05-13 12:20:10'),
(76, 'PRM282B18C520240622', 'PRO05BC893720240622', '', '', '', '2024-06-22 21:09:38', '2024-06-22 21:09:38'),
(77, 'PRM583EFE5320240622', 'PRO2333636F20240622', '', '', '', '2024-06-22 21:25:17', '2024-06-22 21:25:17'),
(78, 'PRM41F7E98E20240622', 'PROE3A9CE1320240622', '', '', '', '2024-06-22 22:11:53', '2024-06-22 22:11:53'),
(79, 'PRMAF9EBEBE20240622', 'PRO4D85F67220240622', '', '', '', '2024-06-22 22:14:20', '2024-06-22 22:14:20'),
(80, 'PRM6FFB0FE020240622', 'PRO54FEF7F620240622', '', '', '', '2024-06-22 22:45:25', '2024-06-22 22:45:25'),
(81, 'PRM0E2529B020240622', 'PRO6C5C1E7020240622', '', '', '', '2024-06-23 00:04:07', '2024-06-23 00:04:07'),
(82, 'PRMF56CD5F020240622', 'PROBAE0BED720240622', '', '', '', '2024-06-23 00:06:44', '2024-06-23 00:06:44'),
(83, 'PRMBD48D16920240622', 'PROBBEB206820240622', '', '', '', '2024-06-23 00:57:49', '2024-06-23 00:57:49'),
(84, 'PRMEF97E42920240725', 'PRO43E23BC520240725', '', '', '', '2024-07-25 16:40:51', '2024-07-25 16:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_card`
--

CREATE TABLE `promotion_card` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion_card`
--

INSERT INTO `promotion_card` (`id`, `uid`, `img1`, `link1`, `img2`, `link2`, `created_at`, `updated_at`) VALUES
(1, 'AAFFCEF720240328', '1714553358_d3c85a8826e64fe1cc30.png', 'https://github.com/quantum-brize/Daltonus-Store', '1713023699_b4b300370fc564119e5b.png', 'https://google.com', '2024-05-01 11:33:00', '2024-03-29 11:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `img` text NOT NULL,
  `question_type` varchar(255) NOT NULL DEFAULT 'saq',
  `marks` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `uid`, `test_id`, `question`, `img`, `question_type`, `marks`, `created_at`) VALUES
(41, 'QSTBDC1B84B20240602', 'TSTDE12711620240602', '<p>How many types of arrays are there in php?</p>', '', 'saq', '5', '2024-06-02 15:02:52'),
(39, 'QST0B2A911E20240602', 'TSTDE12711620240602', '<p>What is the full form of php?</p>', '', 'saq', '5', '2024-06-02 15:02:52'),
(40, 'QSTCB16CB6420240602', 'TSTDE12711620240602', '<p>$_SESSION is a ______?</p>', '', 'mcq', '5', '2024-06-02 15:02:52'),
(38, 'QST87F59C9120240601', 'TST425270ED20240601', '<p>Which of the following is the Psychological Development objective of Physical Education?</p>', '', 'mcq', '10', '2024-06-01 16:04:21'),
(37, 'QST450FB90320240601', 'TSTEB12B06920240601', '<p>What is the extension of java code files?</p>', '', 'mcq', '5', '2024-06-01 15:57:44'),
(36, 'QSTBA3603C320240601', 'TSTEB12B06920240601', '<p>Which of these cannot be used for a variable name in Java?</p>', '', 'mcq', '5', '2024-06-01 15:57:43'),
(35, 'QST271097CF20240601', 'TSTEB12B06920240601', '<p>Which component is used to compile, debug and execute the java programs?</p>', '', 'mcq', '5', '2024-06-01 15:57:43'),
(34, 'QSTD8DFD34720240601', 'TSTEB12B06920240601', '<p>Which statement is true about Java?</p>', '', 'mcq', '5', '2024-06-01 15:57:43'),
(33, 'QST1B7EE4C220240601', 'TSTEB12B06920240601', '<p>Who invented Java Programming?</p>', '', 'mcq', '5', '2024-06-01 15:57:43'),
(42, 'QST1F022ABC20240622', 'TST4168D2D920240622', '<p>question</p>', '', 'mcq', '10', '2024-06-22 22:52:31'),
(43, 'QSTD0F73E5120240622', 'TST4168D2D920240622', '<p>question 2</p>', '', 'mcq', '5', '2024-06-22 22:52:31'),
(44, 'QST6EC8753A20240817', 'TSTFF7EB70E20240817', '<p>lfvzhdbdbzhbfd bjnbdzb z ?</p>', '', 'mcq', '5', '2024-08-17 16:04:06'),
(45, 'QST66BF584D20240817', 'TSTFF7EB70E20240817', '<p>strhyrjzrtn</p>', '', 'mcq', '5', '2024-08-17 16:04:07'),
(46, 'QST2C3FB7BB20240817', 'TST0304EA1120240817', '<p>ndxmndnz gv bdfbdb</p>', '', 'mcq', '10', '2024-08-17 18:20:17'),
(47, 'QSTF7EC258C20240819', 'TST63FBFE3F20240819', '<p>x</p>', '', 'mcq', '10', '2024-08-19 14:19:50'),
(48, 'QST6E64345220240821', 'TST7562C37420240821', '<p>ques</p>', '', 'mcq', '12', '2024-08-21 11:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `uid`, `user_id`, `role`, `status`, `updated_at`, `created_at`) VALUES
(30, 'STF75BCDCB720240622', 'USRF42CBAE720240622', 'Teacher', 'active', '2024-06-22 13:47:31', '2024-06-22 13:47:31'),
(31, 'STF283E0C8B20240622', 'USRD677D50120240622', 'product add', 'active', '2024-06-22 22:29:35', '2024-06-22 22:29:35'),
(34, 'STF7C0595E320240822', 'USR7863D07020240822', 'Teacher', 'active', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(35, 'STFB30DA0F220240822', 'USR9130D34620240822', 'Teacher', 'active', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(36, 'STFAFB93D4120240822', 'USRF94EAA0F20240822', 'Teacher', 'active', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(37, 'STF4140192320240822', 'USR8D1D6CFF20240822', 'Teacher', 'active', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(38, 'STFDD6E045920240822', 'USRDCB4F3A920240822', 'Teacher', 'active', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(39, 'STF4CB999F720240822', 'USR38AED3EF20240822', 'Teacher', 'active', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(40, 'STF2ED8C90C20240822', 'USR9109805820240822', 'Teacher', 'active', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(41, 'STF5657700220240822', 'USRD6E5CDBE20240822', 'Teacher', 'active', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(42, 'STF82BC0EFE20240822', 'USRCF0284F520240822', 'Teacher', 'active', '2024-08-22 23:06:17', '2024-08-22 23:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `staff_access`
--

CREATE TABLE `staff_access` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `access_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_access`
--

INSERT INTO `staff_access` (`id`, `uid`, `staff_id`, `access_id`, `created_at`, `updated_at`) VALUES
(117, 'STFA0788795020240515', 'STF76F4A02220240515', 'ACC04687A2J20240408', '2024-05-15 19:13:19', '2024-05-15 19:13:19'),
(116, 'STFA64C01FDA20240515', 'STF76F4A02220240515', 'ACC04028A7C20240408', '2024-05-15 19:13:14', '2024-05-15 19:13:14'),
(115, 'STFA7645198820240515', 'STF76F4A02220240515', 'ACCD752AG2600240408', '2024-05-15 19:09:42', '2024-05-15 19:09:42'),
(129, 'STFAA8EB4A8120240622', 'STF75BCDCB720240622', 'ACC9FEBE03F20240408', '2024-06-22 13:47:31', '2024-06-22 13:47:31'),
(130, 'STFA11FC4A0E20240622', 'STF75BCDCB720240622', 'ACC8290797D20240408', '2024-06-22 13:47:31', '2024-06-22 13:47:31'),
(114, 'STFA2FE13CC220240515', 'STF76F4A02220240515', 'ACC9FEBE03F20240408', '2024-05-15 19:09:42', '2024-05-15 19:09:42'),
(131, 'STFA99DD67E020240622', 'STF75BCDCB720240622', 'ACC04687A2J20240408', '2024-06-22 13:47:32', '2024-06-22 13:47:32'),
(118, 'STFA98FFA0D120240618', 'STF94BA5B4820240618', 'ACC9FEBE03F20240408', '2024-06-18 19:08:23', '2024-06-18 19:08:23'),
(119, 'STFAA83485B120240618', 'STF94BA5B4820240618', 'ACC8290797D20240408', '2024-06-18 19:08:23', '2024-06-18 19:08:23'),
(120, 'STFA6F623C6E20240618', 'STF375C72E720240618', 'ACC9FEBE03F20240408', '2024-06-18 19:13:55', '2024-06-18 19:13:55'),
(121, 'STFA70CEF45920240618', 'STF375C72E720240618', 'ACC8290797D20240408', '2024-06-18 19:13:55', '2024-06-18 19:13:55'),
(122, 'STFA02A3988C20240618', 'STF7A82A83020240618', 'ACC9FEBE03F20240408', '2024-06-18 19:19:48', '2024-06-18 19:19:48'),
(123, 'STFAC49D0E4A20240618', 'STF7A82A83020240618', 'ACC04028A7C20240408', '2024-06-18 19:19:49', '2024-06-18 19:19:49'),
(124, 'STFAFA4EAEBD20240618', 'STFEFE67F2B20240618', 'ACC9FEBE03F20240408', '2024-06-18 19:27:46', '2024-06-18 19:27:46'),
(125, 'STFAB22100BE20240618', 'STFEFE67F2B20240618', 'ACCD741AD2420240408', '2024-06-18 19:27:46', '2024-06-18 19:27:46'),
(132, 'STFAFA0E57E520240622', 'STF283E0C8B20240622', 'ACC04687A2J20240408', '2024-06-22 22:29:35', '2024-06-22 22:29:35'),
(138, 'STFA2D05822920240822', 'STF7C0595E320240822', 'ACCD752AG2600240408', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(139, 'STFACCB3660720240822', 'STF7C0595E320240822', 'ACC04687A2J20240408', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(140, 'STFABE8555BF20240822', 'STF7C0595E320240822', 'ACC09680A2K20240408', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(141, 'STFAABF77C4F20240822', 'STF7C0595E320240822', 'ACC58010M2K20240408', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(142, 'STFA00E34B8E20240822', 'STFB30DA0F220240822', 'ACCD752AG2600240408', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(143, 'STFA24BB675720240822', 'STFB30DA0F220240822', 'ACC04687A2J20240408', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(144, 'STFA8A3C508120240822', 'STFB30DA0F220240822', 'ACC09680A2K20240408', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(145, 'STFA6502044220240822', 'STFB30DA0F220240822', 'ACC58010M2K20240408', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(146, 'STFAE04290AA20240822', 'STFAFB93D4120240822', 'ACCD752AG2600240408', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(147, 'STFA4D05B5DD20240822', 'STFAFB93D4120240822', 'ACC04687A2J20240408', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(148, 'STFA0789A67C20240822', 'STFAFB93D4120240822', 'ACC09680A2K20240408', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(149, 'STFA159221F620240822', 'STFAFB93D4120240822', 'ACC58010M2K20240408', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(150, 'STFA2D76910B20240822', 'STF4140192320240822', 'ACCD752AG2600240408', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(151, 'STFA82E88FFA20240822', 'STF4140192320240822', 'ACC04687A2J20240408', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(152, 'STFA8217137D20240822', 'STF4140192320240822', 'ACC09680A2K20240408', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(153, 'STFAD14333EE20240822', 'STF4140192320240822', 'ACC58010M2K20240408', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(154, 'STFAD3E02F4F20240822', 'STFDD6E045920240822', 'ACCD752AG2600240408', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(155, 'STFA6D5862EB20240822', 'STFDD6E045920240822', 'ACC04687A2J20240408', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(156, 'STFA026F775720240822', 'STFDD6E045920240822', 'ACC09680A2K20240408', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(157, 'STFA2FC67A4420240822', 'STFDD6E045920240822', 'ACC58010M2K20240408', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(158, 'STFA73DC1DFB20240822', 'STF4CB999F720240822', 'ACCD752AG2600240408', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(159, 'STFA5EBCD0E320240822', 'STF4CB999F720240822', 'ACC04687A2J20240408', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(160, 'STFA8CE3AA8C20240822', 'STF4CB999F720240822', 'ACC09680A2K20240408', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(161, 'STFA470E143020240822', 'STF4CB999F720240822', 'ACC58010M2K20240408', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(162, 'STFA0C7D3ED420240822', 'STF2ED8C90C20240822', 'ACCD752AG2600240408', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(163, 'STFAE7D22A1520240822', 'STF2ED8C90C20240822', 'ACC04687A2J20240408', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(164, 'STFA8B0A8DA820240822', 'STF2ED8C90C20240822', 'ACC09680A2K20240408', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(165, 'STFA06DB873820240822', 'STF2ED8C90C20240822', 'ACC58010M2K20240408', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(166, 'STFA1E35ABF020240822', 'STF5657700220240822', 'ACCD752AG2600240408', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(167, 'STFA9790E5D620240822', 'STF5657700220240822', 'ACC04687A2J20240408', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(168, 'STFAA11537D420240822', 'STF5657700220240822', 'ACC09680A2K20240408', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(169, 'STFAFE352BDF20240822', 'STF5657700220240822', 'ACC58010M2K20240408', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(170, 'STFA894568ED20240822', 'STF82BC0EFE20240822', 'ACCD752AG2600240408', '2024-08-22 23:06:17', '2024-08-22 23:06:17'),
(171, 'STFAF1E953C520240822', 'STF82BC0EFE20240822', 'ACC04687A2J20240408', '2024-08-22 23:06:17', '2024-08-22 23:06:17'),
(172, 'STFAF217600A20240822', 'STF82BC0EFE20240822', 'ACC09680A2K20240408', '2024-08-22 23:06:17', '2024-08-22 23:06:17'),
(173, 'STFABEA10DB820240822', 'STF82BC0EFE20240822', 'ACC58010M2K20240408', '2024-08-22 23:06:17', '2024-08-22 23:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uid`, `user_id`, `dob`, `password`, `login_code`, `created_at`, `updated_at`) VALUES
(17, 'STD5FCECDC920240916', 'USRF0CB94BE20240916', '2002-01-15', '123456', '7054', '2024-09-16 15:27:25', '2024-09-16 10:14:20'),
(18, 'STDABC35CF420240916', 'USR7357BC2820240916', '2002-01-15', '123456', '9463', '2024-09-16 15:02:20', '2024-09-16 10:15:12'),
(19, 'STD2D7D995320240916', 'USR885D900920240916', '2024-09-16', '123456', '1553', '2024-09-16 15:37:16', '2024-09-16 15:36:50'),
(20, 'STDEC8BEE6E20240917', 'USR78048AD920240917', '2024-09-17', '123456', '4700', '2024-09-17 15:08:31', '2024-09-17 15:06:53'),
(21, 'STD1814434020240919', 'USRAA94630820240919', '2024-09-19', '123456', '8053', '2024-10-20 08:00:12', '2024-09-19 13:27:56'),
(22, 'STD66BEC29720241021', 'USR974A8DEC20241021', '2024-10-21', '123456', '6846', '2024-10-21 12:14:54', '2024-10-21 12:14:05'),
(23, 'STDFC366C0B20241021', 'USR8A6A349120241021', '2024-10-21', '123456', '3636', '2024-10-21 12:16:03', '2024-10-21 12:15:45'),
(24, 'STD91E9B29920241021', 'USRA2A12C4620241021', '2024-10-21', '123456', '9224', '2024-10-21 12:18:31', '2024-10-21 12:17:51'),
(25, 'STD81F6F88D20241021', 'USR061BCD0020241021', '2024-10-21', '123456', '2020', '2024-10-21 12:19:41', '2024-10-21 12:18:49'),
(26, 'STD839E1AB820241021', 'USR0F3896B120241021', '2024-10-21', '123456', '5856', '2024-10-21 12:20:46', '2024-10-21 12:19:56'),
(27, 'STD8DEC2B7020241021', 'USR50875FD020241021', '2024-10-21', '123456', '8425', '2024-10-21 14:34:53', '2024-10-21 14:34:37'),
(28, 'STD944DACE420241030', 'USREB2B605F20241030', '1992-06-24', '123456', '6947', '2024-10-31 10:48:02', '2024-10-30 17:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_roll`
--

CREATE TABLE `student_class_roll` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class_roll`
--

INSERT INTO `student_class_roll` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `roll`, `status`, `created_at`, `updated_at`) VALUES
(14, 'ROLF25B345720240916', 'USRF0CB94BE20240916', 'CLS57FCD1D520240916', 'BRNCHFC64B47920240916', '240501', 'active', '2024-09-16 14:58:48', '2024-09-16 10:14:20'),
(15, 'ROLE54ECFC920240916', 'USR7357BC2820240916', 'CLS57FCD1D520240916', 'BRNCHFC64B47920240916', '240555', 'active', '2024-09-16 15:01:30', '2024-09-16 10:15:12'),
(16, 'ROL2721629120240916', 'USR885D900920240916', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240501', 'active', '2024-09-16 15:36:50', '2024-09-16 15:36:50'),
(17, 'ROLD902B5A920240917', 'USR78048AD920240917', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240537', 'active', '2024-09-17 15:06:53', '2024-09-17 15:06:53'),
(18, 'ROLA79E580720240919', 'USRAA94630820240919', 'CLSC4FBFE0B20240919', 'BRNCHAD5C047E20240919', 'School', 'active', '2024-09-19 13:27:56', '2024-09-19 13:27:56'),
(19, 'ROL8B36C37E20241021', 'USR974A8DEC20241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240543', 'active', '2024-10-21 12:14:05', '2024-10-21 12:14:05'),
(20, 'ROL407A2BA520241021', 'USR8A6A349120241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240531', 'active', '2024-10-21 12:15:45', '2024-10-21 12:15:45'),
(21, 'ROL21F794FE20241021', 'USRA2A12C4620241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240538', 'active', '2024-10-21 12:17:51', '2024-10-21 12:17:51'),
(22, 'ROLBC46C93220241021', 'USR061BCD0020241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240533', 'active', '2024-10-21 12:18:49', '2024-10-21 12:18:49'),
(23, 'ROLDABCDF5320241021', 'USR0F3896B120241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240536', 'active', '2024-10-21 12:19:56', '2024-10-21 12:19:56'),
(24, 'ROL8FC8151E20241021', 'USR50875FD020241021', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', '240530', 'active', '2024-10-21 14:34:37', '2024-10-21 14:34:37'),
(25, 'ROL6C4C1B1C20241030', 'USREB2B605F20241030', 'CLSC4FBFE0B20240919', 'BRNCHAD5C047E20240919', '12345', 'active', '2024-10-30 17:44:58', '2024-10-30 17:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_doubt`
--

CREATE TABLE `student_doubt` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `doubt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_doubt`
--

INSERT INTO `student_doubt` (`id`, `uid`, `student_id`, `teacher_id`, `doubt`, `created_at`, `updated_at`) VALUES
(19, 'DBTC9FA29A720240919', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Information about jawalanar nehru', '2024-09-19 13:42:20', '2024-09-19 13:42:20'),
(20, 'DBT0A38D0C520240919', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Information about pt usha in hind language', '2024-09-19 13:50:20', '2024-09-19 13:50:20'),
(21, 'DBT4AD0244E20240919', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Information about aarti shaha\r\nAnd kiran bedi', '2024-09-19 14:29:03', '2024-09-19 14:29:03'),
(22, 'DBTC8FE115C20240920', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Year 1857 and year 1942 2 independance soldiers information in hindi', '2024-09-20 02:06:26', '2024-09-20 02:06:26'),
(23, 'DBT98777F9320240920', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Send in exambash', '2024-09-20 14:53:38', '2024-09-20 14:53:38'),
(24, 'DBT04B8B50820240920', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'What is happened in 1857 and 1942', '2024-09-20 14:56:30', '2024-09-20 14:56:30'),
(25, 'DBTF47F266B20240920', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Nadeyao se honewale labo k viashya give information in hindi', '2024-09-20 15:06:49', '2024-09-20 15:06:49'),
(26, 'DBTA175799020240922', 'USR78048AD920240917', 'USRD6E5CDBE20240822', '.', '2024-09-22 14:11:36', '2024-09-22 14:11:36'),
(27, 'DBTB49355A920240923', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Information about the scientist who discovered the cell in english', '2024-09-23 14:53:32', '2024-09-23 14:53:32'),
(28, 'DBT9FEF98FA20240923', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Which of the two ruler the f', '2024-09-23 14:56:20', '2024-09-23 14:56:20'),
(29, 'DBTEFD060E320240923', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Which of the two ruler the fought the first battle of the panipat', '2024-09-23 14:57:22', '2024-09-23 14:57:22'),
(30, 'DBT5E758B3920240925', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Doubt sir send the answer', '2024-09-25 13:39:42', '2024-09-25 13:39:42'),
(31, 'DBTA2E2E3DF20240925', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Infor!nation about dusshera in english', '2024-09-25 13:40:07', '2024-09-25 13:40:07'),
(32, 'DBT9C1F0DF220240925', 'USRAA94630820240919', 'USRD6E5CDBE20240822', 'Introduction speech for captain of yellow house in english', '2024-09-25 13:43:12', '2024-09-25 13:43:12'),
(33, 'DBT6F9CB50220240929', 'USR885D900920240916', 'USR9109805820240822', 'Hii', '2024-09-29 12:07:43', '2024-09-29 12:07:43'),
(34, 'DBT5EC63BCA20241007', 'USR885D900920240916', 'USR9109805820240822', '1', '2024-10-07 05:06:24', '2024-10-07 05:06:24'),
(35, 'DBT77A554AB20241007', 'USR885D900920240916', 'USRD6E5CDBE20240822', 'Hi sir', '2024-10-07 05:06:42', '2024-10-07 05:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pdf` longtext NOT NULL,
  `link` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `title`, `pdf`, `link`, `type`, `created_at`, `updated_at`) VALUES
(15, 'STMT628B4C5920240914', 'USRD6E5CDBE20240822', 'CLS8B12DCE720240819', 'BRNCH82777A7E20240819', 'Study material ', '1726319787_f515c59e841dfe8b731b.pdf', '', 'pdf', '2024-09-14 13:16:27', '2024-09-14 13:16:27'),
(21, 'STMT1B810A4620241020', 'USRD6E5CDBE20240822', 'CLSC4FBFE0B20240919', 'BRNCHAD5C047E20240919', 'sdhjbkxb', '1729410217_9c54f67c5535cb807d1d.pdf', '', 'pdf', '2024-10-20 07:43:37', '2024-10-20 07:43:37'),
(22, 'STMTFDF274F420241021', 'USRDCB4F3A920240822', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', 'Board notes 16 oct NEW', '1729513463_52026e10a1b6413d0602.pdf', '', 'pdf', '2024-10-21 12:24:23', '2024-10-21 12:24:23'),
(24, 'STMT1E20238C20241021', 'USRF94EAA0F20240822', 'CLS57FCD1D520240916', 'BRNCHD5E8BC2020240916', 'C5.Medi.BOOKLET 5 Ch 13-17', '', 'https://drive.google.com/file/d/16QODZWsCO4uzBkPDVGXQpxmhhRNwMirs/view?usp=sharing', 'link', '2024-10-21 14:45:03', '2024-10-21 14:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `submit_admit_data`
--

CREATE TABLE `submit_admit_data` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `exam_centre` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `answers` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit_admit_data`
--

INSERT INTO `submit_admit_data` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `name`, `email`, `phone`, `dob`, `address`, `img`, `exam_centre`, `exam_date`, `exam_time`, `password`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(356, 'SUD07812C9F20240618', 'USR9EC5B69820240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'QBuser', 'quantumbrize@gmail.com', '9123325003', '1995-06-24', 'N-0024', '1718721404_919b1e098c0a1d7d1460.png', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Quantum Brize\",\"28\"]', '2024-06-18 20:06:44', '2024-06-18 20:06:44'),
(358, 'SUD8C629CC420240618', 'USR89FB611420240618', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Souradeep Mondal', 'deepakkumarmondal18@gmail.com', '8116837569', '2010-06-20', 'Chittaranjan St. No. -23, Qrs No. 81/B', '1718731505_60ed2b4917c0cd6384c8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '19ff87e1d610e1bff49bae4980b3363e', '[\"Fathers Name\",\"Age\"]', '[\"Deepak Kumar Mondal\",\"58\"]', '2024-06-18 22:55:05', '2024-06-18 22:55:05'),
(359, 'SUDA037CD9F20240618', 'USR57AB67E720240618', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Siddhant Kumar', 'siddhant3204fm@gmail.com', '7779989839', '2009-01-12', 'HOUSE NO 1218 AAMBAGAN MIHIJAM JHARKHAND ', '1718731511_b689e89f0c7acfe6a6ee.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a7acf3d6442569109354e816e1a010ef', '[\"Fathers Name\",\"Age\"]', '[\"Sanjib kumar\",\"15\"]', '2024-06-18 22:55:11', '2024-06-18 22:55:11'),
(360, 'SUD36D3A68B20240618', 'USR544128C620240618', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Anwesha Nandy', 'shipra.crj@gmail.com', '8617320163', '2009-10-01', 'Street no. 41, quater no. 1/14B, Chittaranjan,  paschim bardhaman', '1718731532_b7b0f24dc7e086af5d4e.webp', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f0f5fd8a2ca8d99ebaf6d1213d63d04b', '[\"Fathers Name\",\"Age\"]', '[\"Amar Kumar Nandy\",\"15\"]', '2024-06-18 22:55:32', '2024-06-18 22:55:32'),
(361, 'SUDCE1038EF20240618', 'USR3F99331320240618', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Souradeep Mondal', 'deepakkumarmondal18@gmail.com', '8116837569', '2010-06-20', 'Chittaranjan St. No. -23, Qrs No. 81/B', '1718731794_a175065ad5a75be06074.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '19ff87e1d610e1bff49bae4980b3363e', '[\"Fathers Name\",\"Age\"]', '[\"Deepak Kumar Mondal\",\"13\"]', '2024-06-18 22:59:54', '2024-06-18 22:59:54'),
(363, 'SUD677E47B920240618', 'USR0757142620240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'DARSH PATHAK', 'pathakdinesh1610@gmail.com', '9832786995', '2012-07-21', 'STREET-GOLD MOHAR AVENUE, QRS. NO. -28A, CHITTARANJAN, PASCHIM BARDHAMAN, WEST BENGAL, PIN-713331', '1718732026_b5a3988471835fadd145.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a7bca7506cdd0eae3a7d2764f1ed9085', '[\"Fathers Name\",\"Age\"]', '[\"DINESH PATHAK\",\"47\"]', '2024-06-18 23:03:46', '2024-06-18 23:03:46'),
(365, 'SUDF30C7CA720240618', 'USRF7D4D99020240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'RISHAV KUMAR RAJAN ', 'rkrajan280283@gmail.com', '7679395033', '2011-05-17', 'Quarter number- 12A/B, Street number-14 chittaranjan ', '1718732138_8bae732a31e18e3ffafe.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1148fd0c81fb3c0b3a1f6e79ab17cd9b', '[\"Fathers Name\",\"Age\"]', '[\"Rajnish kumar rajan \",\"13\"]', '2024-06-18 23:05:38', '2024-06-18 23:05:38'),
(366, 'SUDC872A78D20240618', 'USR4EB9C7C620240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Shubhangi Roy', 'prosantaclwlocodesign@gmail.com', '8900217812', '2010-10-20', 'St. No. 24A, Qtr. No. 6A, Chittaranjan ', '1718732172_cf40f92b2670d4115eb2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a82d17b5843ce99a048d456b77b2cafa', '[\"Fathers Name\",\"Age\"]', '[\"Prosanta Roy\",\"46\"]', '2024-06-18 23:06:12', '2024-06-18 23:06:12'),
(372, 'SUD3AD6DC1920240618', 'USR25CB937B20240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'DEBESH GORAI', 'rajibgorai487@yahoo.com', '7001938547', '2011-03-03', 'CHITTARANJAN ', '1718732331_3d37928896caa096abb0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e82a21b3977e89985a59baab939f902d', '[\"Fathers Name\",\"Age\"]', '[\"RAJIB GORAI\",\"13\"]', '2024-06-18 23:08:51', '2024-06-18 23:08:51'),
(373, 'SUDDFB9271920240618', 'USRADA78D7220240618', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Prachi Kar', 'rinkukar@gmail.com', '7258907369', '2008-12-07', 'Chittaranjan', '1718732394_50db700907fcd8cd385d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '11bd08a86712e6e7a511e2bc600b76bb', '[\"Fathers Name\",\"Age\"]', '[\"Gouranga Kar\",\"15\"]', '2024-06-18 23:09:54', '2024-06-18 23:09:54'),
(375, 'SUD4063A92920240618', 'USR477A7B6620240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Souvik Sahoo', 'rakhi19b@gmail.com', '8250726778', '2011-03-18', 'St no64 qrs no26B, chittaranjan, paschim bardhman,West Bengal ', '1718732525_0b90b211abb8b9402c0a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '7f7c717aea70166636f82f71f97a5950', '[\"Fathers Name\",\"Age\"]', '[\"Bikash Sahoo \",\"13+\"]', '2024-06-18 23:12:05', '2024-06-18 23:12:05'),
(377, 'SUDC38677FD20240618', 'USR2C94A8FA20240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Sudeshna Mukherjee', 'nishitmukherjee@gmail.com', '8637092801', '2012-05-13', 'Amdanga, P.O-Achra,Dist-Paschim Bardhaman,W.B , Pin-713335', '1718732716_e0bdbc0c8520c7193876.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f655b23a7406105b8bf096b25aea7a4d', '[\"Fathers Name\",\"Age\"]', '[\"Asit Mukherjee\",\"12\"]', '2024-06-18 23:15:16', '2024-06-18 23:15:16'),
(378, 'SUDE70161A320240618', 'USRC9B4616220240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ayantik Dey ', 'mitalideyclwcrj@gmail.com', '7478323130', '2013-01-08', 'Chittaranjan,  area-1 , Fatehpur ', '1718732864_0f0d4a44717afe1fd89c.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5e4421175e68d317997f3f7ca74a136f', '[\"Fathers Name\",\"Age\"]', '[\"Arun Kumar Dey \",\"11\"]', '2024-06-18 23:17:44', '2024-06-18 23:17:44'),
(379, 'SUDDC25EA3B20240618', 'USR6D0CAB0620240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Souvik Sahoo ', 'rakhi19b@gmail.com', '8250726778', '2011-03-18', 'Street no-64 Qrs no-26B, chittaranjan ', '1718732873_9bae5b7ceea4a764b347.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '32b9903e0e2ad1e829eb4c0bb77a9663', '[\"Fathers Name\",\"Age\"]', '[\"Bikash Sahoo\",\"8250726778\"]', '2024-06-18 23:17:53', '2024-06-18 23:17:53'),
(380, 'SUDA34216EB20240618', 'USRFB11292520240618', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Ananya Mondal ', 'rajkumarmondal508@gmail.com', '8967578554', '2010-02-11', 'Street no - 46, Quarter no - 9/A, Post - Chittaranjan ', '1718732931_ff1e14b2f62850a287dd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c667d53acd899a97a85de0c201ba99be', '[\"Fathers Name\",\"Age\"]', '[\"Late Chittaranjan Mondal \",\"14+\"]', '2024-06-18 23:18:51', '2024-06-18 23:18:51'),
(381, 'SUDE8F805B020240618', 'USR98C0EF9820240618', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Abhraneel Maji', 'prabirmaji.asn@gmail.com', '9832235278', '2010-03-29', 'Vill - East Rangamatia, P.O Rupnarayanpur Bazar, P.S Salanpur, Dist - Paschim Bardhaman', '1718733177_e4381781a8a1d6093536.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1ce766b9becf0b4d66df903dbe2fe43d', '[\"Fathers Name\",\"Age\"]', '[\"Prabir Maji \",\"14\"]', '2024-06-18 23:22:57', '2024-06-18 23:22:57'),
(382, 'SUD62F7FA8120240618', 'USR3292F78C20240618', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Abhraneel Maji', 'prabirmaji.asn@gmail.com', '9832235278', '2010-03-29', 'Vill - East Rangamatia, P.O Rupnarayanpur Bazar, P.S Salanpur, Dist - Paschim Bardhaman', '1718733178_205d9ba49bd4dd883f98.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1ce766b9becf0b4d66df903dbe2fe43d', '[\"Fathers Name\",\"Age\"]', '[\"Prabir Maji \",\"14\"]', '2024-06-18 23:22:58', '2024-06-18 23:22:58'),
(383, 'SUDF4FC5E1B20240618', 'USRCB8F2F7720240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'SHRIJOY SHANKAR DAS', 'jayantadas.aum@gmail.com', '7004148332', '2013-05-01', 'Jayanta Das, Swasti Dham, Kelahi Road, Post- Mihijam, Dis- Jamtara, Jharkhand, Pin- 815354', '1718733655_17e80e5466489f45a2d3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '34df20bab5e85dc75bfc94ef569cced9', '[\"Fathers Name\",\"Age\"]', '[\"Jayanta Das\",\"11 Years\"]', '2024-06-18 23:30:55', '2024-06-18 23:30:55'),
(384, 'SUD8076D21820240618', 'USR5223EFD720240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSH RAJ ', 'swetachourasia710@gmail.com', '6200778238', '2012-12-07', 'St.no.-33, Qtr.no.-23C, Chittaranjan, West Bengal st', '1718734078_de7130a1bdb264876095.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a5f575fd4f6fe6ffa3fe3aff925fe8a2', '[\"Fathers Name\",\"Age\"]', '[\"Anjanee Kumar \",\"11 yrs\"]', '2024-06-18 23:37:58', '2024-06-18 23:37:58'),
(385, 'SUDDF879A4520240618', 'USR3DA7A18F20240618', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Monmayuri Das', 'madhumitarnp1982@gmail.com', '9778692168', '2011-05-17', 'Arun Kumar Laha, Kailash bhawan, Samdi road, Dabour more, Rupnarayanpur, 713386', '1718736674_395010df529dfea2b0d9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c6d839d265dbe4478e82fcce7924f24b', '[\"Fathers Name\",\"Age\"]', '[\"Nimai das \",\"13\"]', '2024-06-19 00:21:14', '2024-06-19 00:21:14'),
(386, 'SUD6BAF803E20240618', 'USRA62113DA20240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Supriyo Roy', 'sumankumarroy17@yahoo.com', '9563477123', '2013-11-05', 'Deshbandhu Park, St. no- 6, Hindustan Cables, Paschim Bardhaman.', '1718738201_eb40561a0f954834016d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0748e8c1408d87b20486f86f0b8d9ee0', '[\"Fathers Name\",\"Age\"]', '[\"Suman Kumar Roy\",\"10\"]', '2024-06-19 00:46:41', '2024-06-19 00:46:41'),
(387, 'SUD7A46D98420240618', 'USR8138E81B20240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Supriyo Roy', 'sumankumarroy17@yahoo.com', '9563477123', '2013-11-05', 'Deshbandhu Park, St. no- 6, Hindustan Cables, Paschim Bardhaman.', '1718738201_0b45be084b00c13c506d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0748e8c1408d87b20486f86f0b8d9ee0', '[\"Fathers Name\",\"Age\"]', '[\"Suman Kumar Roy\",\"10\"]', '2024-06-19 00:46:41', '2024-06-19 00:46:41'),
(388, 'SUD1498E3C020240618', 'USR5436ABB620240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Supriyo Roy', 'sumankumarroy17@yahoo.com', '9563477123', '2013-11-05', 'Deshbandhu Park, St. no- 6, Hindustan Cables, Paschim Bardhaman.', '1718738201_a15c789e4e7eb26d3dd1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0748e8c1408d87b20486f86f0b8d9ee0', '[\"Fathers Name\",\"Age\"]', '[\"Suman Kumar Roy\",\"10\"]', '2024-06-19 00:46:41', '2024-06-19 00:46:41'),
(393, 'SUD7211A2B320240618', 'USRD5D26B6420240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Rajeshwari Mishra ', 'babinmishra11@gmail.com', '9333330694', '2012-11-01', 'Ambagan Mihijam ward no-04,Dist-Jamtara jharkhand ', '1720102557_f5da0a782d4b2c18e57b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '034fa9d9dff88445a664bca77fb52605', '[\"Fathers Name\",\"Age\"]', '[\"Soumitra Mishra \",\"11\"]', '2024-06-19 00:47:40', '2024-06-19 00:47:40'),
(394, 'SUDC711BB8E20240618', 'USR04C289A820240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742717_3de698e163176996252a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:01:57', '2024-06-19 02:01:57'),
(395, 'SUD8DAE471C20240618', 'USRF51AB30920240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742718_74b8c52bbfe51d3ad410.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:01:58', '2024-06-19 02:01:58'),
(396, 'SUD5AACD25D20240618', 'USR5623586120240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742720_91f6ece71bbc1c367d25.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:02:00', '2024-06-19 02:02:00'),
(397, 'SUDCE78186220240618', 'USRFA3D3D2D20240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742725_3a78f4db3f63ef389d23.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:02:05', '2024-06-19 02:02:05'),
(398, 'SUD9FAEBFD020240618', 'USRB27EBA8520240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742728_fc041b1219e0d66df3d7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:02:08', '2024-06-19 02:02:08'),
(399, 'SUDF2188BEE20240618', 'USRF2D1775A20240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742732_659b917a668d10c90cf5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:02:12', '2024-06-19 02:02:12'),
(400, 'SUD342237C220240618', 'USRBFF08CC020240618', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manish raj besra ', 'besrasomai@gmail.com', '8597788186', '2011-11-11', 'Street-39,QRS.NO33D ', '1718742735_08947d1abe6878c997b7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c8758b517083196f05ac29810b924aca', '[\"Fathers Name\",\"Age\"]', '[\"Somai Besra \",\"12\"]', '2024-06-19 02:02:15', '2024-06-19 02:02:15'),
(401, 'SUD77D0D15720240618', 'USRC776730720240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aditi Dutta', 'kalyanidutta44@gmail.com', '7602950816', '2012-08-07', 'St.no:21/B, Qtrs.no:8/A, Chittaranjan, West Bengal', '1718750540_754d591e4770779ea49d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '78e8301f7d5b802c46cade839198a7e1', '[\"Fathers Name\",\"Age\"]', '[\"DINESH CHANDRA DUTTA\",\"11\"]', '2024-06-19 04:12:20', '2024-06-19 04:12:20'),
(402, 'SUDC5F336D620240618', 'USR57E2CC9C20240618', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Shrayosi Laha', 'www.tanmay.laha77@gmail.com', '9641679178', '2008-12-07', 'AT--Kalyangram 5,Near durga mandir ,ST--Swami vivekananda marg', '1718754379_4e3069beeab90da0a7ad.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2ac4dc67aa22d7785cbc392a39593bd6', '[\"Fathers Name\",\"Age\"]', '[\"Tanmay Laha\",\"46\"]', '2024-06-19 05:16:19', '2024-06-19 05:16:19'),
(403, 'SUD9EE25DC520240618', 'USR15D092BA20240618', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ajay Mondal ', 'manojmondalcrj62@gmail.com', '8158094982', '2024-12-24', 'Dangal, Kushbedia ', '1718754527_5f533774728f3d453257.jpeg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e41e2e8cccfb1fadf47abe15daadadf', '[\"Fathers Name\",\"Age\"]', '[\"Manoj Mondal \",\"35\"]', '2024-06-19 05:18:47', '2024-06-19 05:18:47'),
(404, 'SUD327A030920240619', 'USREB66E3D220240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718755861_c07f12abfddce9f613e5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"43\"]', '2024-06-19 05:41:01', '2024-06-19 05:41:01'),
(405, 'SUD24AAD39520240619', 'USRC39B187220240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718755891_a499c99faf8278eeb064.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"43\"]', '2024-06-19 05:41:31', '2024-06-19 05:41:31'),
(406, 'SUD441B80AD20240619', 'USRDA16017B20240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718755902_6278157fb494abe8c864.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"43\"]', '2024-06-19 05:41:42', '2024-06-19 05:41:42'),
(407, 'SUD14EB94BB20240619', 'USRBB85592720240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718755928_ff8c287d868a5fb17c99.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"43\"]', '2024-06-19 05:42:08', '2024-06-19 05:42:08'),
(408, 'SUDDA206E6320240619', 'USR5464BF0320240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718755929_efc376339d68e633f972.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"43\"]', '2024-06-19 05:42:09', '2024-06-19 05:42:09'),
(409, 'SUD1B8265A920240619', 'USRF18D116A20240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Akash Kumar ', 'pradeepakash16@gmail.com', '9709201429', '2010-09-13', 'St.no-35, Qtr.no-12/A, r7 market, Chittaranjan', '1718756157_ea99560c8b61a14f34fb.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '04f2422f3b5461305172a1a73d848508', '[\"Fathers Name\",\"Age\"]', '[\"Pradeep Kumar \",\"14\"]', '2024-06-19 05:45:57', '2024-06-19 05:45:57'),
(412, 'SUDE941E57D20240619', 'USRB6CD487B20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ajay Mondal', 'manojmondalcrj40@gmail.com', '8158094982', '2013-12-24', 'Dangal, Kushbedia', '1719015679_7107f0b3f170cfa2ff21.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Manoj Mondal\",\"11\"]', '2024-06-19 05:47:20', '2024-06-19 05:47:20'),
(413, 'SUD1FB8AED620240619', 'USRD1739B6D20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ishita kumari ', 'babymahatobaby1234@gmail.com', '6297549747', '2012-05-22', 'Street number 84,Quater number 25B, po-Chittaranjan, dist- paschim bardhaman ,,Chittaranjan 713331', '1720179305_929440504a79f0e10a69.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f4a657a499306ce5dd6210c5c0e64be', '[\"Fathers Name\",\"Age\"]', '[\"Prabhat Kumar Mahato \",\"12+\"]', '2024-06-19 06:14:46', '2024-06-19 06:14:46'),
(414, 'SUDCD48374920240619', 'USRDFE1410720240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Aayushi Singh ', 'aayushi.singh0701@gmail.com', '8252861513', '2009-07-01', 'Nirmala Sadan, Krishna Nagar, Street No.1, Mihijam (JH)- 815354', '1718757919_19d3ddab07f3a765364a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '3caa662dfc83cdf703ad91393923a6df', '[\"Fathers Name\",\"Age\"]', '[\"Subodh Kumar Singh \",\"15 Years \"]', '2024-06-19 06:15:19', '2024-06-19 06:15:19'),
(415, 'SUDBBB478B820240619', 'USR7D0B949820240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Srijan Bose ', 'tanujagorain3@gmail.com', '8967730083', '2012-11-27', 'Kalyangram -6,Post- Achra, District -Paschim Bardhaman,PIN -713335,W.B', '1718758135_71cf90d5c97404cafea9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '326f26a9da0062cf4afbd09e2684a254', '[\"Fathers Name\",\"Age\"]', '[\"Shantanu Bose \",\"11\"]', '2024-06-19 06:18:55', '2024-06-19 06:18:55'),
(416, 'SUDD4CC3D0C20240619', 'USR261C4A8B20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aryan Raj ', 'bchoudhary1976@gmail.com', '9939753565', '2013-01-20', 'St.no.-85,Qtr.no.-2A,Area-7,Simjuri', '1718758173_b4ca3a77a9bf9588a98b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd6155c6ec9d14c2391543863de3bd15c', '[\"Fathers Name\",\"Age\"]', '[\"Balram Choudhary \",\"47\"]', '2024-06-19 06:19:33', '2024-06-19 06:19:33'),
(417, 'SUD823E7F4A20240619', 'USR9A62021B20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ishita kumari ', 'babymahatobaby1234@gmail.com', '6297549747', '2012-05-22', 'Street number 84,Quater number 25B, po-Chittaranjan, dist- paschim bardhaman ,,Chittaranjan 713331', '1720179305_929440504a79f0e10a69.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f4a657a499306ce5dd6210c5c0e64be', '[\"Fathers Name\",\"Age\"]', '[\"Prabhat Kumar Mahato \",\"12+\"]', '2024-06-19 06:20:51', '2024-06-19 06:20:51'),
(418, 'SUD1D06CAB020240619', 'USRAD50B1D420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'DIVYANKA KUSHWAHA', 'ajaysse21@gmail.com', '8101986492', '2012-01-10', 'STEET NO:2, QRS NO: 10A,CHITTARANJAN', '1718758907_9aff0f5bff46e865ad61.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5ba475b08aeeddf56d0fa9a969f26b78', '[\"Fathers Name\",\"Age\"]', '[\"AJAY KUMAR KUSHWAHA\",\"12\"]', '2024-06-19 06:31:47', '2024-06-19 06:31:47'),
(419, 'SUD809887EE20240619', 'USR60F9B49D20240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Jiya Kumari', 'babluchandanmihijam@gmail.com', '9308011341', '2010-06-30', 'Kalitalla mihijam ', '1718760282_22a13d7e6764ee26ae3e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7f62100b1338d2ca026027d5cad860f', '[\"Fathers Name\",\"Age\"]', '[\"Chandan Kr. Hazra\",\"14\"]', '2024-06-19 06:54:42', '2024-06-19 06:54:42'),
(420, 'SUD4BAC4FB820240619', 'USRA3DD264020240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Kaushik samrat', 'jagritijayshree@gmail.com', '9933900939', '2010-03-16', 'St no. 66 Qt no. -39/B', '1718761968_81a599189148fa97220b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1c04dce761a933b12c1c4d122f0e44a7', '[\"Fathers Name\",\"Age\"]', '[\"Rakesh Ravi\",\"15\"]', '2024-06-19 07:22:48', '2024-06-19 07:22:48'),
(421, 'SUDCBE33E1020240619', 'USR7F0EFF7920240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2013-01-01', 'St no.20A qr no. 5A chittaranjan ', '1718762488_2a3cee750633a385d656.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2721dab756cac78a04d2b6a7d5f322fc', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-19 07:31:28', '2024-06-19 07:31:28'),
(422, 'SUD98F70D2120240619', 'USR880F218120240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2013-01-01', 'St no.20A qr no. 5A chittaranjan ', '1718762489_ea8435ab70f94906db56.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2721dab756cac78a04d2b6a7d5f322fc', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-19 07:31:29', '2024-06-19 07:31:29'),
(423, 'SUD3758299920240619', 'USRD09A793D20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2013-01-01', 'St no.20A qr no. 5A chittaranjan ', '1718762646_99b4a58b35c422b8acbf.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2721dab756cac78a04d2b6a7d5f322fc', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-19 07:34:06', '2024-06-19 07:34:06'),
(424, 'SUDDE080FAD20240619', 'USR3436192E20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Niharika Bharti', 'bharatkumarbharti80@gmail.com', '9708927674', '2012-03-08', 'Qtr No - 12A/B St No - 5 Sp East Chittaranjan ', '1718762872_71e2560eb744b03685f1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6fb99aa1a2b217f67a82a0b2cb6755d8', '[\"Fathers Name\",\"Age\"]', '[\"Bharat Kumar Bharti \",\"12 \"]', '2024-06-19 07:37:52', '2024-06-19 07:37:52'),
(425, 'SUDBE6EA57B20240619', 'USR226BF53D20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Niharika Bharti', 'bharatkumarbharti80@gmail.com', '9708927674', '2012-03-08', 'Qtr No - 12A/B St No - 5 Sp East Chittaranjan ', '1718762891_814430f153cadc2e6d1a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6fb99aa1a2b217f67a82a0b2cb6755d8', '[\"Fathers Name\",\"Age\"]', '[\"Bharat Kumar Bharti \",\"12 \"]', '2024-06-19 07:38:11', '2024-06-19 07:38:11'),
(426, 'SUD3DFDFE6020240619', 'USRB1755AA420240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2012-01-01', 'st no.20aqr no.5a', '1718762921_f0cff7c4afcd352e1f2e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-19 07:38:42', '2024-06-19 07:38:42'),
(427, 'SUD3AEA1E0E20240619', 'USR69C00FB820240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2012-01-01', 'st no.20aqr no.5a', '1718763024_092dae47315cf2eee7bd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-19 07:40:24', '2024-06-19 07:40:24'),
(428, 'SUDD4B9EF0D20240619', 'USRE51EE3A720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat sharma ', 'RAVIBHUSAN80@GMAIL.COM', '9608928516', '2012-01-01', 'st no.20aqr no.5a', '1718763120_7b355ba57e3b7820131b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '3d12940805fdffba6c6292eaf73b4044', '[\"Fathers Name\",\"Age\"]', '[\"Ravi Bhushan\",\"45\"]', '2024-06-19 07:42:00', '2024-06-19 07:42:00'),
(429, 'SUD18094B6720240619', 'USR1DB3D22620240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763573_9f7e35a6f2ab54343ae1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:33', '2024-06-19 07:49:33'),
(430, 'SUD35F1922620240619', 'USR246EF66E20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763579_da53c872c9738cd92c87.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:39', '2024-06-19 07:49:39'),
(431, 'SUD2325FBE920240619', 'USR4343229420240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763581_3e34bbfd0e333c927651.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:41', '2024-06-19 07:49:41'),
(432, 'SUD8AA65D2620240619', 'USR9D3781FC20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763587_18a533ff010b356d19ad.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:47', '2024-06-19 07:49:47'),
(433, 'SUD692F92C420240619', 'USR5D9F4A1F20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763587_462bb644385c14e7409f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:47', '2024-06-19 07:49:47'),
(434, 'SUD9BEF371C20240619', 'USRE35EF6A120240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763588_aac0f7bef5be7c501fe8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:48', '2024-06-19 07:49:48'),
(435, 'SUDB5D9FAAE20240619', 'USR64C8CE6E20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arnab Mondal ', 'apurbacrjm43@gmail.com', '9153430169', '2011-04-24', 'St.no.- 64, Q.no.-1/7B, Simjuri, Chittaranjan,Paschim Bardhaman, West Bengal ', '1718763588_d18b17b7268e6b758185.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f7a1d2e5d0e337738dc53a98dfe2301e', '[\"Fathers Name\",\"Age\"]', '[\"Apurba Mondal \",\"13\"]', '2024-06-19 07:49:48', '2024-06-19 07:49:48'),
(436, 'SUD4EA625D220240619', 'USRE276D90520240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Nidhi Rani', 'nr4451674@gmail.com', '6206851034', '2011-06-20', 'ST NO 35B Q NO 12A/B AREA-8 CRJ', '1718764807_9c549a0a3ee577075db0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a7e5ac3229602f84354e64633bdf2ce3', '[\"Fathers Name\",\"Age\"]', '[\"Nitish Kumar \",\"13\"]', '2024-06-19 08:10:07', '2024-06-19 08:10:07'),
(437, 'SUD5F430FC320240619', 'USRFDC994A920240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ananya Mukherjee', 'mukherjeesoma803@gmail.com', '9339169947', '2012-12-13', 'ST NO. 34   QRS 9D  AREA 6 CHITTARANJAN', '1719160144_dbbe076f3022a9e88e91.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rajib Mukherjee\",\"11\"]', '2024-06-19 08:17:41', '2024-06-19 08:17:41'),
(438, 'SUD2862817120240619', 'USR17C59AF820240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ananya Mukherjee', 'mukherjeesoma803@gmail.com', '9339169947', '2012-12-13', 'ST NO. 34   QRS 9D  AREA 6 CHITTARANJAN', '1719160144_dbbe076f3022a9e88e91.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rajib Mukherjee\",\"11\"]', '2024-06-19 08:17:43', '2024-06-19 08:17:43'),
(439, 'SUD616FBED520240619', 'USR09EF5AEE20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Trishita Maji ', 'maji96@gmail.com', '7029575297', '2013-04-12', 'Rupnarayanpur Amdanga,pin-713386', '1718766124_3868d50f7a91a0b8ed87.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '471ef01fe3431fe13cdecc4c7f3a4fee', '[\"Fathers Name\",\"Age\"]', '[\"Milan Maji \",\"47\"]', '2024-06-19 08:32:04', '2024-06-19 08:32:04'),
(440, 'SUD86FC4B5E20240619', 'USRF56618DD20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Rishika Gupta ', 'pariruhi19021993@gmail.com', '7056618675', '2010-08-18', 'Aurobindo nagar,set no-10 sec-3 Hindustan cables near -shani mandir ', '1718766825_0400e1ee90b3b4840f5b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '8d127f7067687e3d754eb31f127afd30', '[\"Fathers Name\",\"Age\"]', '[\"Rahul Gupta \",\"13\"]', '2024-06-19 08:43:45', '2024-06-19 08:43:45'),
(441, 'SUD96AD340820240619', 'USRF2EA97C920240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ayan', 'ayan91634656@gmail.com', '9163465605', '2011-06-19', 'Nil', '1718767101_15fca4df418e8cedcffb.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '547b24c3ca55e26876823231f784208b', '[\"Fathers Name\",\"Age\"]', '[\"Am\",\"13\"]', '2024-06-19 08:48:21', '2024-06-19 08:48:21'),
(442, 'SUD56DC488E20240619', 'USR6006FACA20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'AYUSHI GUPTA ', 'ruma84@gmail.com', '8637059648', '2011-12-02', 'Janardan Apartment.Rupnagar.Post-Rupnarayanpur Bazar.Pin-713386', '1718768672_3fe047a264a8d80a589e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2615012777ae815687179ac12db989c3', '[\"Fathers Name\",\"Age\"]', '[\"BISWAJIT GUPTA \",\"52\"]', '2024-06-19 09:14:32', '2024-06-19 09:14:32'),
(443, 'SUDD0DBD79020240619', 'USR5C52588F20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'AYUSHI GUPTA ', 'ruma84@gmail.com', '8637059648', '2011-12-02', 'Janardan Apartment.Rupnagar.Post-Rupnarayanpur Bazar.Pin-713386', '1718768720_ee2ff0654d6fe3c754d7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2615012777ae815687179ac12db989c3', '[\"Fathers Name\",\"Age\"]', '[\"BISWAJIT GUPTA \",\"52\"]', '2024-06-19 09:15:20', '2024-06-19 09:15:20'),
(444, 'SUD30DA30B520240619', 'USR65BCA2B820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'AYUSHI GUPTA ', 'ruma84@gmail.com', '8637059648', '2011-12-02', 'Janardan Apartment.Rupnagar.Post-Rupnarayanpur Bazar.Pin-713386', '1718768721_de9bf53f8f3b90056aab.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2615012777ae815687179ac12db989c3', '[\"Fathers Name\",\"Age\"]', '[\"BISWAJIT GUPTA \",\"52\"]', '2024-06-19 09:15:21', '2024-06-19 09:15:21'),
(445, 'SUD54BAD81620240619', 'USR22A391A220240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'AYUSHI GUPTA ', 'ruma84@gmail.com', '8637059648', '2011-12-02', 'Janardan Apartment.Rupnagar.Post-Rupnarayanpur Bazar.Pin-713386', '1718768721_fe236cea5c09a1bf3f23.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2615012777ae815687179ac12db989c3', '[\"Fathers Name\",\"Age\"]', '[\"BISWAJIT GUPTA \",\"52\"]', '2024-06-19 09:15:21', '2024-06-19 09:15:21'),
(446, 'SUDC2A6910020240619', 'USR402D574F20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'AYUSHI GUPTA ', 'ruma84@gmail.com', '8637059648', '2011-12-02', 'Janardan Apartment.Rupnagar.Post-Rupnarayanpur Bazar.Pin-713386', '1718768722_a1283df462dccbd103d8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2615012777ae815687179ac12db989c3', '[\"Fathers Name\",\"Age\"]', '[\"BISWAJIT GUPTA \",\"52\"]', '2024-06-19 09:15:22', '2024-06-19 09:15:22'),
(448, 'SUD4B51324520240619', 'USR6142F1D820240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Sanchita Tudu', 'sujitasoren4@gmail.com', '9546628942', '2009-06-24', 'Vill-Sahardal, P. O-Sahardal, P. S-Mihijam Jamtara Jharkhand', '1719384220_9f8bd1a4ff57328ac1dd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Samir Tudu\",\"15\"]', '2024-06-19 09:26:12', '2024-06-19 09:26:12'),
(449, 'SUDFAF9A06020240619', 'USRDC5743C720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Prince Hembrom', 'baskirenu8@gmail.com', '8590724557', '2012-08-18', 'Bathanbari', '1718769711_133401ce89003b0ce550.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9158f5ae90b7b3f0ec63584854c6c780', '[\"Fathers Name\",\"Age\"]', '[\"Sushanta Hembrom\",\"38\"]', '2024-06-19 09:31:51', '2024-06-19 09:31:51'),
(450, 'SUD4F03E37820240619', 'USR1716F53020240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Prince Hembrom', 'baskirenu8@gmail.com', '8590724557', '2012-08-18', 'Bathanbari', '1718769713_516fdb4705d97e020e42.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9158f5ae90b7b3f0ec63584854c6c780', '[\"Fathers Name\",\"Age\"]', '[\"Sushanta Hembrom\",\"38\"]', '2024-06-19 09:31:53', '2024-06-19 09:31:53'),
(451, 'SUDB4B845C920240619', 'USRF123C01020240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Prince Hembrom', 'baskirenu8@gmail.com', '8590724557', '2012-08-18', 'Bathanbari', '1718769714_a39ac3aebc93d6ab3120.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9158f5ae90b7b3f0ec63584854c6c780', '[\"Fathers Name\",\"Age\"]', '[\"Sushanta Hembrom\",\"38\"]', '2024-06-19 09:31:54', '2024-06-19 09:31:54'),
(453, 'SUDBE21878820240619', 'USR90E350FA20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Anabia Aslam', 'mdaslamclwjaa@gmail.com', '9635726804', '2012-09-07', 'Street no.- 34 Qrs no.-1/3B Crj', '1720191835_dc3e85cf96380c1c54c9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '8e159adbeb9ab03b3c0c3c33dfc88128', '[\"Fathers Name\",\"Age\"]', '[\"MD Aslam\",\"11\"]', '2024-06-19 09:51:34', '2024-06-19 09:51:34'),
(454, 'SUD7C3AB1A720240619', 'USR7AACE36020240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Prince Hembrom', 'baskirenu8@gmail.com', '8509724557', '2012-08-18', 'Bathanbari', '1718771828_a2b9bf55038ddac3a6ba.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9158f5ae90b7b3f0ec63584854c6c780', '[\"Fathers Name\",\"Age\"]', '[\"Sushanta Hembrom\",\"38\"]', '2024-06-19 10:07:08', '2024-06-19 10:07:08'),
(455, 'SUD1CDDB5A720240619', 'USR7E26770620240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Pratyush Laha', 'trisha.laha123@gmail.com', '8900253777', '2011-06-11', 'Rupnarayanpur', '1718772524_7281d48db19236025207.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '3b6843e7267584a8d87c8182a84d546c', '[\"Fathers Name\",\"Age\"]', '[\"Pradip Kumar Laha\",\"13\"]', '2024-06-19 10:18:44', '2024-06-19 10:18:44'),
(456, 'SUD86A076C620240619', 'USRBEE60C6720240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sk Rubel', 'admin@gmail.com', '6290353314', '2024-07-09', 'Shopiya beauty Parlour', '1720270933_9e1fb3a85b4e2aa4983f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '76619592388b8c47ea88f01fe52e16f7', '[\"Fathers Name\",\"Age\"]', '[\"Sk Rubel\",\"Rohan \"]', '2024-06-19 10:22:53', '2024-06-19 10:22:53'),
(457, 'SUDCCA6F43220240619', 'USR5144AD6720240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774774_f3bb6d0d95db13c576c4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:14', '2024-06-19 10:56:14'),
(458, 'SUD6D663E1020240619', 'USR069BBD6920240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774782_2c1c070cddd90100fd4d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:22', '2024-06-19 10:56:22'),
(459, 'SUD82C9531420240619', 'USRBBA1802520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774784_4f1f75dbf1467cbcbd78.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:24', '2024-06-19 10:56:24'),
(460, 'SUD4BEC230620240619', 'USR831D90E820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774784_c2028f228ca96a04374f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(461, 'SUDDB7B1D9820240619', 'USR90E51D8B20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774784_3eb549150662616b8bca.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(462, 'SUD62B4860F20240619', 'USR8D6B452820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774785_701e77da23e6c8b70428.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(463, 'SUD021B910720240619', 'USR8FAD91D520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774785_7a1736f2f8ff12b61c6b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(464, 'SUD97EB2E6320240619', 'USR5E9CE1D420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774785_65fcb22166acc7381f0e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(465, 'SUD08AD19C520240619', 'USR2501B07520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774785_3871d36dda8a99d2dd56.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:25', '2024-06-19 10:56:25'),
(466, 'SUD0F6B137A20240619', 'USRC44CF1BE20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774786_8152676dd5ab58e0e2f7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:26', '2024-06-19 10:56:26'),
(467, 'SUD6B43CE0A20240619', 'USRE240361C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774786_87a743bd845ee5570de5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:26', '2024-06-19 10:56:26'),
(468, 'SUD9FC0B3CB20240619', 'USR48D15D2A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774786_660f54a1a645eddac9db.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:26', '2024-06-19 10:56:26'),
(469, 'SUD526C89BE20240619', 'USREB4F4BD520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774786_8b26a84ab6f38b4d1b1b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:26', '2024-06-19 10:56:26'),
(470, 'SUD6A0B444820240619', 'USRCBB3256C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718774786_adf5efc62b78d0e08f86.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Ajja\",\"12\"]', '2024-06-19 10:56:26', '2024-06-19 10:56:26'),
(471, 'SUD70B6BD6020240619', 'USR575587B920240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Pushkar Kumar Singh ', 'alonekiller515@gmail.com', '9635583672', '2009-05-03', 'Chittaranjan Fatehpur Street no - 54 Qtr no 16 /A', '1718774871_d791bfc5d71775b4abea.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '71602be187c74d04520dfd89392ce433', '[\"Fathers Name\",\"Age\"]', '[\"Santosh Singh \",\"15\"]', '2024-06-19 10:57:51', '2024-06-19 10:57:51'),
(472, 'SUD90539AE720240619', 'USR6927C4F920240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'DEBANGSHU MONDAL ', 'mondal.dipen77@gmail.com', '9932902480', '2011-08-30', 'Bolkunda , P.O-Samdi , District-Paschim Bardhaman , Pin-713359', '1718775655_592e500823a06250e09a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c54db8a74ff573a8c740d8664c947795', '[\"Fathers Name\",\"Age\"]', '[\"Dipen Mondal\",\"46\"]', '2024-06-19 11:10:55', '2024-06-19 11:10:55'),
(473, 'SUDBCE61B9020240619', 'USRACFBDE6320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sjsj', 'ayan91634656@gmail.com', '9163465605', '2002-06-19', 'Ejs', '1718775918_149343d07a2c3ad4201d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e36c32f0628088d66bbae7019cdae7a', '[\"Fathers Name\",\"Age\"]', '[\"Sjaj\",\"12\"]', '2024-06-19 11:15:18', '2024-06-19 11:15:18'),
(474, 'SUDF41D3CDD20240619', 'USRAC97A3F620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ayan Mondal', 'ayan91634656@gmail.com', '9163465605', '2011-06-19', 'Hssj', '1718776040_ae61d1cb539b013328b7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c13728c7c18141833e5bbadfd1fc2899', '[\"Fathers Name\",\"Age\"]', '[\"Aa\",\"12\"]', '2024-06-19 11:17:20', '2024-06-19 11:17:20'),
(475, 'SUD68202CBD20240619', 'USR6ED0C48620240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Ayush Arya ', 'bhartisinha2410@gmail.com', '9679890538', '2011-05-08', 'Street no. 64a ,qrs no.4, SP. North , Chittaranjan.', '1718777896_2bd0bc3a94ba8aac07c3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5e282c2eda8af7c460d2579a43738626', '[\"Fathers Name\",\"Age\"]', '[\"Manish Kumar \",\"13\"]', '2024-06-19 11:48:16', '2024-06-19 11:48:16'),
(476, 'SUD7A9FAC9520240619', 'USRE0F8E3C920240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Mayank Kumar', 'mk04122010@gmail.com', '7029292618', '2010-12-04', 'St.no.-28, Qrs.no.-46/1D,Area-5,Chittaranjan,West Bengal', '1718779305_0adc85e9238664b5e48d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd4f4efc07d478f864ace51d83415dbd6', '[\"Fathers Name\",\"Age\"]', '[\"Mithilesh Kumar\",\"12\"]', '2024-06-19 12:11:45', '2024-06-19 12:11:45'),
(477, 'SUDF27D03A620240619', 'USR7FC92AED20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Mayank Kumar', 'mk04122010@gmail.com', '7029292618', '2010-12-04', 'St.no.-28, Qrs.no.-46/1D,Area-5,Chittaranjan,West Bengal', '1718779305_c30464cf162a95325723.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd4f4efc07d478f864ace51d83415dbd6', '[\"Fathers Name\",\"Age\"]', '[\"Mithilesh Kumar\",\"12\"]', '2024-06-19 12:11:45', '2024-06-19 12:11:45'),
(478, 'SUD851FA2D620240619', 'USR257A3A3220240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Anubrata Ganguly ', 'manasime8@gmail.com', '8372892944', '2013-04-29', 'Street no 1D Qrt no 02 chittaranjan 713331', '1718780522_6d57d04e976aeec709c1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f8ad4f8c8792a1b1ffb6fcba1dd9702c', '[\"Fathers Name\",\"Age\"]', '[\"Anirban Ganguly \",\" 47\"]', '2024-06-19 12:32:02', '2024-06-19 12:32:02'),
(479, 'SUDFE49828F20240619', 'USR9C3517BC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781216_cb644e361c63a0d6978c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:43:36', '2024-06-19 12:43:36'),
(480, 'SUD061EADC720240619', 'USRDBCF76AA20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781226_a23352d48fb4073ce08b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:43:46', '2024-06-19 12:43:46'),
(481, 'SUD7348C94920240619', 'USRF728D32A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781231_0eefe6e1512052bfb3bc.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:43:51', '2024-06-19 12:43:51');
INSERT INTO `submit_admit_data` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `name`, `email`, `phone`, `dob`, `address`, `img`, `exam_centre`, `exam_date`, `exam_time`, `password`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(482, 'SUD123ACA7520240619', 'USRAEC5E2E820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781240_2008661c5a4f4eeb84f1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:44:00', '2024-06-19 12:44:00'),
(483, 'SUDD960376F20240619', 'USR019451CC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781240_ec78344137e106683330.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:44:01', '2024-06-19 12:44:01'),
(484, 'SUD0319377820240619', 'USR663F944320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781240_b10db7802cd532fc48cf.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:44:01', '2024-06-19 12:44:01'),
(485, 'SUDFD71D86E20240619', 'USR880C0D2A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781241_9b02fb62cb4168122b42.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:44:01', '2024-06-19 12:44:01'),
(486, 'SUD29DE19ED20240619', 'USR117533C620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', 'chartapan19@gmail.com', '1718781241_58f86da393faf74d285a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:44:01', '2024-06-19 12:44:01'),
(488, 'SUDB177472820240619', 'USRE9B2848A20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Aayush Kumar ', 'kumarsujit79356@gmail.com', '8709637808', '2011-05-27', 'Qa-60B,St no-38A,Area-8', '1718781320_11b17825a07947f1aa72.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f91882a261f03680cae383b5f46ca48a', '[\"Fathers Name\",\"Age\"]', '[\"Sujit kumar \",\"13\"]', '2024-06-19 12:45:20', '2024-06-19 12:45:20'),
(489, 'SUD7FF04A2A20240619', 'USRD6F950E620240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Aayush Kumar ', 'kumarsujit79356@gmail.com', '8709637808', '2011-05-27', 'Qa-60B,St no-38A,Area-8', '1718781320_046eed56d0cab1b3d42d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f91882a261f03680cae383b5f46ca48a', '[\"Fathers Name\",\"Age\"]', '[\"Sujit kumar \",\"13\"]', '2024-06-19 12:45:20', '2024-06-19 12:45:20'),
(490, 'SUD704905E120240619', 'USR398E4A7B20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Aayush Kumar ', 'kumarsujit79356@gmail.com', '8709637808', '2011-05-27', 'Qa-60B,St no-38A,Area-8', '1718781320_932ae8f8daa2e5718f41.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f91882a261f03680cae383b5f46ca48a', '[\"Fathers Name\",\"Age\"]', '[\"Sujit kumar \",\"13\"]', '2024-06-19 12:45:20', '2024-06-19 12:45:20'),
(491, 'SUDB0CD1DC220240619', 'USRA522E71B20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Aayush Kumar ', 'kumarsujit79356@gmail.com', '8709637808', '2011-05-27', 'Qa-60B,St no-38A,Area-8', '1718781320_4360a5b62196f0bd688f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f91882a261f03680cae383b5f46ca48a', '[\"Fathers Name\",\"Age\"]', '[\"Sujit kumar \",\"13\"]', '2024-06-19 12:45:20', '2024-06-19 12:45:20'),
(492, 'SUD5D86C52320240619', 'USRE2DA96C920240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Aayush Kumar ', 'kumarsujit79356@gmail.com', '8709637808', '2011-05-27', 'Qa-60B,St no-38A,Area-8', '1718781320_407830a9517e8e329b8c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f91882a261f03680cae383b5f46ca48a', '[\"Fathers Name\",\"Age\"]', '[\"Sujit kumar \",\"13\"]', '2024-06-19 12:45:20', '2024-06-19 12:45:20'),
(493, 'SUDECD60B5220240619', 'USRF7F156F220240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781507_9b3f38d0c734df5baad5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:48:27', '2024-06-19 12:48:27'),
(494, 'SUD5DA169B420240619', 'USR610DB57D20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ananya dokania ', 'dokaniabikash@gmail.com', '9471383753', '2012-01-25', 'Balajee motors, near BPCL petrol pump ,dumka road Jamtara ( Jharkhand)', '1718781575_496a327ff8fc30430c90.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '3ddc83c1d029fe60ea2b909bb3242774', '[\"Fathers Name\",\"Age\"]', '[\"Bikash dokania\",\"43\"]', '2024-06-19 12:49:35', '2024-06-19 12:49:35'),
(495, 'SUDD47B4BD120240619', 'USRD1FECA9820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781623_9a5cbabb009bf042b05a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:23', '2024-06-19 12:50:23'),
(496, 'SUD70E3453520240619', 'USR67AF187120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781626_384ecee7a97a4abc148d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:26', '2024-06-19 12:50:26'),
(497, 'SUD51D9DB7920240619', 'USR666EE86B20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781627_99d227a0f6aed5432a3c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:28', '2024-06-19 12:50:28'),
(498, 'SUD3D3818D220240619', 'USR546AF3EC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781628_4257c77de98badce6848.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:28', '2024-06-19 12:50:28'),
(499, 'SUDFDEB89F920240619', 'USR341F9D5420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781629_3bce3df2299317102ff4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:29', '2024-06-19 12:50:29'),
(500, 'SUDD0C6C54820240619', 'USRAC4C9C3C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781630_542f9dc5e031984cd143.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:30', '2024-06-19 12:50:30'),
(501, 'SUD3F16C6FD20240619', 'USR2DCB9A1020240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781630_b7b64d8a7707c2e571d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:30', '2024-06-19 12:50:30'),
(502, 'SUD0BA7A78920240619', 'USRD1F2149420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781630_357fbd0f90c8fcf736e2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:30', '2024-06-19 12:50:30'),
(503, 'SUD725D47F420240619', 'USRDA6B6BC320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781630_30630b7b48737d84eff0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:30', '2024-06-19 12:50:30'),
(504, 'SUD32EE837F20240619', 'USR0F801EBC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781630_7690ff7fe4de5b382ac3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:31', '2024-06-19 12:50:31'),
(505, 'SUD76A292FE20240619', 'USR745B321520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781631_3a16f718ae82184a9a6a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:31', '2024-06-19 12:50:31'),
(506, 'SUD9913B68F20240619', 'USRDEF6DA1520240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781631_cbc1c2bc11d7680092ed.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:31', '2024-06-19 12:50:31'),
(507, 'SUDD6EA5D8020240619', 'USR51EB7BDC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718781631_a06d18a1313c8a59536f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 12:50:31', '2024-06-19 12:50:31'),
(508, 'SUD8A4BAA0F20240619', 'USR5F040D8A20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Debopriya Maji ', 'debopriyamaji07@gmail.com', '8617643262', '2010-06-05', 'Rupnarayanpur ', '1718782032_669fb71e948bf7860c7b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '63dfad870feeea86fd79f2b9c0c3e62d', '[\"Fathers Name\",\"Age\"]', '[\"Nayan Maji \",\"14\"]', '2024-06-19 12:57:12', '2024-06-19 12:57:12'),
(509, 'SUD51167A4420240619', 'USR2185969020240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Mahima Sen ', 'sennirmal469@gmail.com', '9933793623', '2008-07-29', 'Chittaranjan, St. no. - 63, Qtr. no. - 26/9A', '1718782477_cd555e94c4bd1f3f7ff5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a7c52a1db9232b7b5635827656d24bc9', '[\"Fathers Name\",\"Age\"]', '[\"Nirmal Kumar Sen \",\"15\"]', '2024-06-19 13:04:38', '2024-06-19 13:04:38'),
(510, 'SUD3B8675F420240619', 'USRC34144B820240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Srijan Bose ', 'tanujagorain3@gmail.com', '8967730083', '2012-11-27', 'Kalyangram -6,Post -Achra, District -Paschim Bardhaman, PIN 713335, W.B', '1718782597_69dc66807215a8755f9b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '326f26a9da0062cf4afbd09e2684a254', '[\"Fathers Name\",\"Age\"]', '[\"Shantanu Bose \",\"11\"]', '2024-06-19 13:06:37', '2024-06-19 13:06:37'),
(511, 'SUDE51D0B3A20240619', 'USREB167CB420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_c196348d0eb199a3864f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:32', '2024-06-19 13:09:32'),
(512, 'SUD77D6933020240619', 'USR86B8219420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_e69653fffff067607028.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:32', '2024-06-19 13:09:32'),
(513, 'SUDF10CBEF120240619', 'USRCB6F3CD320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_ecca93f96ae91c808768.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:32', '2024-06-19 13:09:32'),
(514, 'SUDB88EBBC720240619', 'USR4A47F06620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_92472a49d54f935fcca9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:32', '2024-06-19 13:09:32'),
(515, 'SUDC5FAF81B20240619', 'USRCA9687CC20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_02adf2c1448ac52feb4a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(516, 'SUD4100D49520240619', 'USR534905A320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_0565b20cee74789e605a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(517, 'SUDAA23E34320240619', 'USRF5A63A5A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782772_c95e7934ca8fcb945397.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(518, 'SUDA907895720240619', 'USRACE207F420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782773_995e484848ee90851e89.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(519, 'SUD4364B3FF20240619', 'USRDE7A4A0820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782773_a776f28feafd814b5850.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(520, 'SUDC752D46020240619', 'USRCD9F134A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782773_084f4533766ae56a69a1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(521, 'SUD5C7EF94E20240619', 'USR3CF1702D20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dhruba Char ', 'chartapan19@gmail.com', '7602129022', '2012-02-04', ' Street no. 55,Quarter no. 28/A,Fatehpur, Chittaranjan, Paschim Bardhaman, West Bengal 71336t', '1718782773_13b3b73283977babf6de.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '392b2ad236a383be435d76bc237704a8', '[\"Fathers Name\",\"Age\"]', '[\"Tapan Kumar Char \",\"12\"]', '2024-06-19 13:09:33', '2024-06-19 13:09:33'),
(523, 'SUD140B780520240619', 'USR22A0189A20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718782990_960ed2976082a5fcf8da.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:13:10', '2024-06-19 13:13:10'),
(524, 'SUD1D3B623C20240619', 'USRBD98ACCC20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718782994_cf9e870692887dc6dcd9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:13:14', '2024-06-19 13:13:14'),
(525, 'SUDD779255D20240619', 'USR41B1A3B720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718783393_cc5a41cfb62654a77a4d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:19:53', '2024-06-19 13:19:53'),
(526, 'SUD508D47C820240619', 'USR09BF031420240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718783399_2f604a6fcee172881157.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:19:59', '2024-06-19 13:19:59'),
(527, 'SUD53502BED20240619', 'USR71A48BE620240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718783400_0f69b689f433ad9a3b2c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:20:00', '2024-06-19 13:20:00'),
(528, 'SUD063A05B520240619', 'USR51C55DCC20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Ayan', 'ayan9163465605@gmail.com', '9163465605', '2008-06-19', 'Shsh', '1718784451_c8405267ad86ac54fce5.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5753c28df8680090f7c281dd5e521a8d', '[\"Fathers Name\",\"Age\"]', '[\"Aka\",\"12\"]', '2024-06-19 13:37:31', '2024-06-19 13:37:31'),
(529, 'SUD929FE6BA20240619', 'USR2E51A62920240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718784613_68b0be821874cff73eb9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:40:13', '2024-06-19 13:40:13'),
(530, 'SUDA826391620240619', 'USRE43EB05220240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Tanmay Jain ', 'manishjain88884@gmail.com', '9749417390', '2013-10-03', 'Rupnarayanpur ', '1718785114_19829659149c33cb6ce2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a490cc3dd68576ea674e8a72972faae8', '[\"Fathers Name\",\"Age\"]', '[\"Manish Jain \",\"10\"]', '2024-06-19 13:48:34', '2024-06-19 13:48:34'),
(531, 'SUD5FECA9D920240619', 'USR8A13C53020240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Guddu Saha', 'Sarthaksaha1389@gmail.com', '8240983564', '2005-02-10', 'Baruipur Puratan Thana', '1718785469_3b71cd6baf47055bd66c.jpeg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c783a31e12153386bfd58361144bab20', '[\"Fathers Name\",\"Age\"]', '[\"Kumar saha\",\"19\"]', '2024-06-19 13:54:29', '2024-06-19 13:54:29'),
(532, 'SUD9A45715420240619', 'USRDB62F45020240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Shivangi jyoti ', 'sauravjyoti80@gmail.com', '7643910623', '2013-03-20', 'Hillroad,kismat marg Near gateno2 behind shiv mandir', '1719419136_e5c0b043eb657e8d63d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5cc9218b95b8e864198993468a9da63b', '[\"Fathers Name\",\"Age\"]', '[\"SAURAV JYOTI \",\"12\"]', '2024-06-19 14:03:02', '2024-06-19 14:03:02'),
(533, 'SUD72FE882B20240619', 'USR8B66264520240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Shivangi jyoti ', 'sauravjyoti80@gmail.com', '7643910623', '2013-03-20', 'Hillroad,kismat marg Near gateno2 behind shiv mandir', '1719419136_e5c0b043eb657e8d63d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5cc9218b95b8e864198993468a9da63b', '[\"Fathers Name\",\"Age\"]', '[\"SAURAV JYOTI \",\"12\"]', '2024-06-19 14:03:22', '2024-06-19 14:03:22'),
(534, 'SUD8E27F47620240619', 'USR4FA33F7820240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Shivangi jyoti ', 'sauravjyoti80@gmail.com', '7643910623', '2013-03-20', 'Hillroad,kismat marg Near gateno2 behind shiv mandir', '1719419136_e5c0b043eb657e8d63d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5cc9218b95b8e864198993468a9da63b', '[\"Fathers Name\",\"Age\"]', '[\"SAURAV JYOTI \",\"12\"]', '2024-06-19 14:03:25', '2024-06-19 14:03:25'),
(535, 'SUDAC15A07620240619', 'USRFCF8A77D20240619', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Shivangi jyoti ', 'sauravjyoti80@gmail.com', '7643910623', '2013-03-20', 'Hillroad,kismat marg Near gateno2 behind shiv mandir', '1719419136_e5c0b043eb657e8d63d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5cc9218b95b8e864198993468a9da63b', '[\"Fathers Name\",\"Age\"]', '[\"SAURAV JYOTI \",\"12\"]', '2024-06-19 14:03:25', '2024-06-19 14:03:25'),
(536, 'SUDBDF0F37620240619', 'USR4AF9845220240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manvik Mondal', 'salonimandal02@gmail.com', '8918683912', '2011-08-19', 'Chittaranjan', '1718786057_89d862152e6053e46fae.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '79283e9cbd247d3effbe1958d05d9f82', '[\"Fathers Name\",\"Age\"]', '[\"Suvendu Mondal\",\"12\"]', '2024-06-19 14:04:17', '2024-06-19 14:04:17'),
(537, 'SUDB56DF2F520240619', 'USR3EBCACE020240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ayan', 'ayan91634656@gmail.com', '9163465605', '2004-06-19', 'Sjsj', '1718786444_b7ff18b19f67add1b755.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'bfe4ea939ccc1b5a37ff1344b71b15cf', '[\"Fathers Name\",\"Age\"]', '[\"Am\",\"12\"]', '2024-06-19 14:10:44', '2024-06-19 14:10:44'),
(538, 'SUDF653DAE920240619', 'USR3494CF7220240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Pramita sinha ', 'pinkisarkarsinha91@gmail.com', '7501346157', '2012-12-27', 'Sinha House. Deshbandhu Park', '1720189072_9a3c08ab766834378f89.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '6e7ff1ea6228be60f477a39868e4c81b', '[\"Fathers Name\",\"Age\"]', '[\"Prakash Shankar sinha \",\"12\"]', '2024-06-19 14:12:24', '2024-06-19 14:12:24'),
(539, 'SUDCFD853F820240619', 'USR670EDDED20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Manvik Mondal ', 'mondalsuvendu885@gmail.com', '8918677437', '2012-08-19', 'ArabindaNagar, Sector-ll, Road No 7,P.O Hindustan Cables, District Paschim Bardhaman,P.S Salanpur, Pin 713335, West Bengal ', '1718786998_08aa42e4c281b9a1f749.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '75ee23e9ce72269bf152e109f69caccb', '[\"Fathers Name\",\"Age\"]', '[\"Suvendu Mondal \",\"11\"]', '2024-06-19 14:19:58', '2024-06-19 14:19:58'),
(540, 'SUD57B3F2E920240619', 'USR08456C9320240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Swarnabha Roy ', 'sanjibroykg6@gmail.com', '8436152939', '2013-08-03', 'Hemanta Mukherjee Road, Kalyangram-6, P.O- Achra, West Bengal, Indiat', '1718790191_ecee5252f57d90da4be4.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '8038da89e49ac5eabb489cfc6cea9fc1', '[\"Fathers Name\",\"Age\"]', '[\"Sanjib Roy \",\"10\"]', '2024-06-19 15:13:11', '2024-06-19 15:13:11'),
(541, 'SUD9AD940C920240619', 'USR23803CE420240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Swarnabha Roy ', 'sanjibroykg6@gmail.com', '8436152939', '2013-08-03', 'Hemanta Mukherjee Road, Kalyangram-6, P.O- Achra, West Bengal, Indiat', '1718790192_224ee493a4d2d5a94e88.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '8038da89e49ac5eabb489cfc6cea9fc1', '[\"Fathers Name\",\"Age\"]', '[\"Sanjib Roy \",\"10\"]', '2024-06-19 15:13:12', '2024-06-19 15:13:12'),
(542, 'SUD64F6931F20240619', 'USRF381318C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ananya Mandal ', 'suchanabasu28@gmail.com', '9051982391', '2011-06-07', 'Rupnarayanpur ', '1718790437_0051bdc9a86806feff9c.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '505cf749ffcfee8ca672c57c5f2b3660', '[\"Fathers Name\",\"Age\"]', '[\"Arup Mandal \",\"13\"]', '2024-06-19 15:17:17', '2024-06-19 15:17:17'),
(543, 'SUD03E510D920240619', 'USR87BC152220240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aryan Raj ', 'bchoudhary1976@gmail.com', '9939753565', '2013-01-20', 'St.no.-85,Qtr.no.-2A,Area-7,Sim juri ', '1718790947_45e0b9ed7889c850df63.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd6155c6ec9d14c2391543863de3bd15c', '[\"Fathers Name\",\"Age\"]', '[\"Balram Choudhary \",\"47\"]', '2024-06-19 15:25:48', '2024-06-19 15:25:48'),
(544, 'SUD9CED374520240619', 'USR6F9DF3DE20240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ranabir Mondal', 'dm1600540@gmail.com', '9800330341', '2010-04-29', 'ST : 52 . Qrs : 4A , Fathepur Chittaranjan', '1718792230_ac2e3e6a3024944a4ee6.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5a0a41988abf360d72b39e79d8face11', '[\"Fathers Name\",\"Age\"]', '[\"BAMAPADA MONDAL \",\"14\"]', '2024-06-19 15:47:10', '2024-06-19 15:47:10'),
(545, 'SUD2DB4005920240619', 'USR9A6B8EB920240619', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ranabir Mondal', 'dm1600540@gmail.com', '9800330341', '2010-04-29', 'ST : 52 . Qrs : 4A , Fathepur Chittaranjan', '1718792232_57483e7dd893ed6eae61.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5a0a41988abf360d72b39e79d8face11', '[\"Fathers Name\",\"Age\"]', '[\"BAMAPADA MONDAL \",\"14\"]', '2024-06-19 15:47:12', '2024-06-19 15:47:12'),
(546, 'SUD3CECF6C520240619', 'USR6526FEB420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha  Mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'Chittaranjan ', '1718795117_65714f10b99785292674.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 16:35:17', '2024-06-19 16:35:17'),
(547, 'SUD21A96BE020240619', 'USRC434A54120240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'ANKIT BALA', '73.tbala@gmail.com', '9434547157', '2013-02-20', 'Street No : 55, Qrts No : 6A, Fatehpur, P.O Chittaranjan', '1718795601_b258a5543d01865726eb.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f456d6606f8fa6587abab2b9699fa5a6', '[\"Fathers Name\",\"Age\"]', '[\"TAPOSH KUMAR BALA \",\"11\"]', '2024-06-19 16:43:22', '2024-06-19 16:43:22'),
(548, 'SUD577A2FC320240619', 'USR5088CBCF20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718796148_4b663aebe445358e61f3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 16:52:28', '2024-06-19 16:52:28'),
(549, 'SUDAFF50D1720240619', 'USRB765AEB720240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797102_b2366fc1f55c8c48aad1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:08:23', '2024-06-19 17:08:23'),
(550, 'SUDBA5C4FBB20240619', 'USRF20FA19920240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797103_48b589e5416d3854fe6d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:08:23', '2024-06-19 17:08:23'),
(551, 'SUD84AC419020240619', 'USR03586E9320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797136_c9d692ae59f62b39ec1a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:08:56', '2024-06-19 17:08:56'),
(552, 'SUDEE6D86EC20240619', 'USR8565DB9F20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797299_e832bd0b770740c2378b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:39', '2024-06-19 17:11:39'),
(553, 'SUDFD1A029620240619', 'USR45C4F69620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797299_5d800df45e6088368e58.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:39', '2024-06-19 17:11:39'),
(554, 'SUDAD04F35320240619', 'USR2CAFC40120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797299_d4033f259e26bb01e469.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:39', '2024-06-19 17:11:39'),
(555, 'SUDF9BBC75620240619', 'USR8FC7070620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797299_5d1784920785b4a08b6d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:39', '2024-06-19 17:11:39'),
(556, 'SUDC74E409A20240619', 'USRD815E3B620240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797299_24bf39340390f41214f9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:40', '2024-06-19 17:11:40'),
(557, 'SUDB9CE96C520240619', 'USR97AE5DBA20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Snigdha mondal ', 'manashmondal199@gmail.com', '7908787354', '2012-01-12', 'St 33  Qrs. 9C Chittaranjan ', '1718797300_1cc76d58962e04791e76.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ebaf37c9226c2cd812eb4c67effd8a58', '[\"Fathers Name\",\"Age\"]', '[\"Manas Mondal \",\"41\"]', '2024-06-19 17:11:40', '2024-06-19 17:11:40'),
(558, 'SUD487A496F20240619', 'USRE2CF8B1120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798204_7c733a3c6d3aa59febb0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:26:44', '2024-06-19 17:26:44'),
(559, 'SUD59942D5320240619', 'USR6D764B2020240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798218_16343240f0cfc104fbfd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:26:58', '2024-06-19 17:26:58'),
(560, 'SUDA6705A4220240619', 'USR4C18635E20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798220_2caab2da6279cb036654.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:00', '2024-06-19 17:27:00'),
(561, 'SUD5D34127220240619', 'USR71C1386420240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798220_145fa84ef3f07ff3456b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:00', '2024-06-19 17:27:00'),
(562, 'SUDF87D8BE420240619', 'USR773DE3C320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798221_467b2d0785efc28e2461.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:01', '2024-06-19 17:27:01'),
(563, 'SUD55C4484320240619', 'USR32426ED720240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798221_95bc08ba31fe8aa2e7b2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:02', '2024-06-19 17:27:02'),
(564, 'SUDBCA759C920240619', 'USR2B47D5BF20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798222_9eecc49058f79431496b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:02', '2024-06-19 17:27:02'),
(565, 'SUD72B8045720240619', 'USR795968B320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798222_d9dc91fe7e736dc1851f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:02', '2024-06-19 17:27:02'),
(566, 'SUD091BFB7120240619', 'USR7882CDFF20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_568abc1fbdec49336e19.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(567, 'SUD0EB823D920240619', 'USR08E4248120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_21bb8646c05979129b02.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(568, 'SUD1E08770A20240619', 'USRA568C93020240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_7ac7a0f982c454781940.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(569, 'SUD8E85807B20240619', 'USRD9A3043C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_7e544c76483e4c718f13.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(570, 'SUD6BC5FC8120240619', 'USR4774732120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_af5ee62f3d7637dab803.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(571, 'SUD13A5298120240619', 'USR95F3863E20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_ed40715929f93da30ab1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:03', '2024-06-19 17:27:03'),
(572, 'SUDB7E412A820240619', 'USR66B1943920240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_5df1f5e3ef9a7483c211.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:04', '2024-06-19 17:27:04'),
(573, 'SUD0DBBE63720240619', 'USRCED9152A20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipan ray', 'suchitraray01@gmail.com', '8116118305', '2011-07-26', 'St no:56, qrs no: 4B, fatepur, chittaranjan,west bengal ', '1718798223_5110b9b9247f88cde0d9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Sujit Kumar Ray\",\"12\"]', '2024-06-19 17:27:04', '2024-06-19 17:27:04'),
(574, 'SUDFA365E3220240619', 'USR8008B76120240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Tanuja Singh ', 'chaudharynishu660@gmail.com', '7011081095', '2011-07-10', 'stno- 85 ,qrs.no- 11 B,Simjuri Chittranjan,clw/crj dist-paschimbardhaman chittranjan-713331', '1718798800_edc106eaf064805f8094.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9958a416cbb5ea76fa43d2c53743cc34', '[\"Fathers Name\",\"Age\"]', '[\"Bichitra Kumar Singh \",\"12\"]', '2024-06-19 17:36:40', '2024-06-19 17:36:40'),
(575, 'SUDC9518B6D20240619', 'USR1598642D20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Tanuja Singh ', 'chaudharynishu660@gmail.com', '7011081095', '2011-07-10', 'stno- 85 ,qrs.no- 11 B,Simjuri Chittranjan,clw/crj dist-paschimbardhaman chittranjan-713331', '1718799475_257b5a13cbc002241592.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '9958a416cbb5ea76fa43d2c53743cc34', '[\"Fathers Name\",\"Age\"]', '[\"Bichitra Kumar Singh \",\"12\"]', '2024-06-19 17:47:55', '2024-06-19 17:47:55'),
(576, 'SUD8DCD3B9B20240619', 'USR49ADC42C20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Avigyan Layek', 'layekashis2017@gmail.com', '9083012872', '2013-10-12', 'Simantapally,Rupnarayanpur', '1718801701_d07d32d48c05dc8417ce.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '43113069cfc245b0d96a414770d7d34a', '[\"Fathers Name\",\"Age\"]', '[\"Ashis Layek\",\"13\"]', '2024-06-19 18:25:02', '2024-06-19 18:25:02'),
(577, 'SUD1482534B20240619', 'USR8B35F1E520240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Hrudhvi Mishra ', 'MituMishra@gmail.com', '7364805300', '2012-09-24', 'Rupnarayanpur Bazar HCL Road,Near Kali Mandir youth club,pin-713364', '1718805589_db77734d565c171fa3a2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2d6879cdc02abbba299da8046ba3318c', '[\"Fathers Name\",\"Age\"]', '[\"Hironmoy Mishra\",\"48\"]', '2024-06-19 19:29:49', '2024-06-19 19:29:49'),
(578, 'SUDD981FECC20240619', 'USREB1EA15720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Hrudhvi Mishra ', 'MituMishra@gmail.com', '7364805300', '2012-09-24', 'Rupnarayanpur Bazar HCL Road,Near Kali Mandir youth club,pin-713364', '1718805600_cada2ee438dd99fa7443.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2d6879cdc02abbba299da8046ba3318c', '[\"Fathers Name\",\"Age\"]', '[\"Hironmoy Mishra\",\"48\"]', '2024-06-19 19:30:00', '2024-06-19 19:30:00'),
(579, 'SUDF810CDFE20240619', 'USR1D90775720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Hrudhvi Mishra ', 'MituMishra@gmail.com', '7364805300', '2012-09-24', 'Rupnarayanpur Bazar HCL Road,Near Kali Mandir youth club,pin-713364', '1718805622_fd3ce77d34bb7e82f8f8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2d6879cdc02abbba299da8046ba3318c', '[\"Fathers Name\",\"Age\"]', '[\"Hironmoy Mishra\",\"48\"]', '2024-06-19 19:30:22', '2024-06-19 19:30:22'),
(580, 'SUD2217BE6D20240619', 'USR574E032B20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Hrudhvi Mishra ', 'MituMishra@gmail.com', '7364805300', '2024-06-19', 'Rupnarayanpur Bazar HCL Road,Near Kali Mandir youth club,Pin-713364,west Bengal', '1718806144_24edb80faa638aba28ff.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2d6879cdc02abbba299da8046ba3318c', '[\"Fathers Name\",\"Age\"]', '[\"Hironmoy Mishra \",\"48\"]', '2024-06-19 19:39:04', '2024-06-19 19:39:04'),
(581, 'SUD5A2CB05620240619', 'USRE701701B20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Hrudhvi Mishra ', 'MituMishra@gmail.com', '7364805300', '2024-06-19', 'Rupnarayanpur Bazar HCL Road,Near Kali Mandir youth club,Pin-713364,west Bengal', '1718806152_e1ad5bf1fed867eedb44.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2d6879cdc02abbba299da8046ba3318c', '[\"Fathers Name\",\"Age\"]', '[\"Hironmoy Mishra \",\"48\"]', '2024-06-19 19:39:12', '2024-06-19 19:39:12'),
(582, 'SUD1001CD1E20240619', 'USR52ACD0D720240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'HRUDHVI MISHRA', 'mitumishra@gmail.com', '7364805300', '2012-09-24', 'HIRONMOY MISHRA, H.C.L ROAD, NEAR KALI MANDIR, P.O - RUPNARAYANPUR BAZAR', '1718807665_d3f0d4e3bae96b30f91e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd84cb11bcd764867183a35468d530a09', '[\"Fathers Name\",\"Age\"]', '[\"HIRONMOY MISHRA\",\"48\"]', '2024-06-19 20:04:26', '2024-06-19 20:04:26'),
(583, 'SUD61C0396220240619', 'USR5BE4A4E720240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSHUL ARYAN ', 'anupkmrverma87@gmail.com', '9334633445', '2012-08-22', 'Street no-26A,QRS NO-9, CHITTARANJAN', '1718809392_ef2be987aa25eebe58cb.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '052a5f42af6fec12598a43da02bed43b', '[\"Fathers Name\",\"Age\"]', '[\"ANUP KUMAR \",\"39\"]', '2024-06-19 20:33:12', '2024-06-19 20:33:12'),
(584, 'SUDE9F7416F20240619', 'USR7AE93FE820240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSHUL ARYAN ', 'anupkmrverma87@gmail.com', '9334633445', '2012-08-22', 'Street no-26A,QRS NO-9, CHITTARANJAN', '1718809394_516bb5fb769e70cac95e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '052a5f42af6fec12598a43da02bed43b', '[\"Fathers Name\",\"Age\"]', '[\"ANUP KUMAR \",\"39\"]', '2024-06-19 20:33:14', '2024-06-19 20:33:14'),
(585, 'SUD8E096BA920240619', 'USRD9FE3E3C20240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSHUL ARYAN ', 'anupkmrverma87@gmail.com', '9334633445', '2012-08-22', 'Street no-26A,QRS NO-9, CHITTARANJAN', '1718809430_a4b8ca619b57c23d0e84.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '052a5f42af6fec12598a43da02bed43b', '[\"Fathers Name\",\"Age\"]', '[\"ANUP KUMAR \",\"39\"]', '2024-06-19 20:33:51', '2024-06-19 20:33:51'),
(586, 'SUD7748BB0720240619', 'USR5A21D3D320240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSHUL ARYAN ', 'anupkmrverma87@gmail.com', '9334633445', '2012-08-22', 'Street no-26A,QRS NO-9, CHITTARANJAN', '1718809431_ebb90ec3b83c3781d1fb.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '052a5f42af6fec12598a43da02bed43b', '[\"Fathers Name\",\"Age\"]', '[\"ANUP KUMAR \",\"39\"]', '2024-06-19 20:33:51', '2024-06-19 20:33:51'),
(587, 'SUD1E1F7CEA20240619', 'USR7CA1DEE020240619', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANSHUL ARYAN ', 'anupkmrverma87@gmail.com', '9334633445', '2012-08-22', 'Street no-26A,QRS NO-9, CHITTARANJAN', '1718809431_42db992dfb22e36657ae.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '052a5f42af6fec12598a43da02bed43b', '[\"Fathers Name\",\"Age\"]', '[\"ANUP KUMAR \",\"39\"]', '2024-06-19 20:33:51', '2024-06-19 20:33:51');
INSERT INTO `submit_admit_data` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `name`, `email`, `phone`, `dob`, `address`, `img`, `exam_centre`, `exam_date`, `exam_time`, `password`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(588, 'SUDFED3079220240619', 'USR2D9A16A520240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ananya Mukherjee', 'mukherjeesoma803@gmail.com', '9339169947', '2012-12-13', 'ST NO. 34   QRS 9D  AREA 6 CHITTARANJAN', '1719160144_dbbe076f3022a9e88e91.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rajib Mukherjee\",\"11\"]', '2024-06-19 20:51:23', '2024-06-19 20:51:23'),
(589, 'SUD8EBDBB3F20240619', 'USRE11C318A20240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ananya Mukherjee', 'mukherjeesoma803@gmail.com', '9339169947', '2012-12-13', 'ST NO. 34   QRS 9D  AREA 6 CHITTARANJAN', '1719160144_dbbe076f3022a9e88e91.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rajib Mukherjee\",\"11\"]', '2024-06-19 20:52:51', '2024-06-19 20:52:51'),
(590, 'SUDFAC429E220240619', 'USRF0260AF820240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mayuri Murmu', 'bela.besra@gmail.com', '7909093035', '2013-01-03', 'Ambagan, PO-Mihijam,Jamtara-815354', '1718813605_a8941755ccac9cceedc7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c43a2a9351d47b57d532b1cf504995ab', '[\"Fathers Name\",\"Age\"]', '[\"JOGESH MURMU \",\"11\"]', '2024-06-19 21:43:25', '2024-06-19 21:43:25'),
(591, 'SUDBBE4B93420240619', 'USR12114C6620240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mayuri Murmu', 'bela.besra@gmail.com', '7909093035', '2013-01-03', 'Ambagan, PO-Mihijam,Jamtara-815354', '1718813614_ede43ba67fd021fa6f62.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c43a2a9351d47b57d532b1cf504995ab', '[\"Fathers Name\",\"Age\"]', '[\"JOGESH MURMU \",\"11\"]', '2024-06-19 21:43:34', '2024-06-19 21:43:34'),
(592, 'SUD4F3E68A920240619', 'USRC5EE1FE520240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mayuri Murmu', 'bela.besra@gmail.com', '7909093035', '2013-01-03', 'Ambagan, PO-Mihijam,Jamtara-815354', '1718813614_170926d97efc7766c23a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c43a2a9351d47b57d532b1cf504995ab', '[\"Fathers Name\",\"Age\"]', '[\"JOGESH MURMU \",\"11\"]', '2024-06-19 21:43:34', '2024-06-19 21:43:34'),
(593, 'SUD0D2C156120240619', 'USR622CA58120240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mahesh Kumar ', 'sumanchoudhary1695@gmail.com', '8789820499', '2013-04-20', 'Vill-Ambedkar Nagar Po Ps-Mihijam District jamtara State -jharkhand ', '1718813865_67348483e926613dff63.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'fb6b3f0e616725a8be0b91d263c1bacc', '[\"Fathers Name\",\"Age\"]', '[\"Chunnu Kumar \",\"12\"]', '2024-06-19 21:47:45', '2024-06-19 21:47:45'),
(594, 'SUD830C00DA20240619', 'USRB869CB9620240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mahesh Kumar ', 'sumanchoudhary1695@gmail.com', '8789820499', '2013-04-20', 'Vill-Ambedkar Nagar Po Ps-Mihijam District jamtara State -jharkhand ', '1718813866_090a4ac67381f4f4066d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'fb6b3f0e616725a8be0b91d263c1bacc', '[\"Fathers Name\",\"Age\"]', '[\"Chunnu Kumar \",\"12\"]', '2024-06-19 21:47:46', '2024-06-19 21:47:46'),
(595, 'SUD7C4E7E7020240619', 'USR01BF59D220240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Arkendu Mondal ', 'mondallakshmikanta55@gmail.com', '8420043336', '2012-09-25', 'Street Name Gold Mohar Avenue Qrs no. 14A ', '1718814221_f00d328366ed7241f623.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'fabc831af917b1ccadf651cbd2820606', '[\"Fathers Name\",\"Age\"]', '[\"Lakshmi Kanta Mondal \",\"12years\"]', '2024-06-19 21:53:41', '2024-06-19 21:53:41'),
(596, 'SUDB202D5FF20240619', 'USR336538A620240619', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Arkendu Mondal ', 'mondallakshmikanta55@gmail.com', '8420043336', '2012-09-25', 'Street Name Gold Mohar Avenue Qrs no. 14A ', '1718814247_f19d1dc162d044ac4dca.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'fabc831af917b1ccadf651cbd2820606', '[\"Fathers Name\",\"Age\"]', '[\"Lakshmi Kanta Mondal \",\"12years\"]', '2024-06-19 21:54:07', '2024-06-19 21:54:07'),
(597, 'SUD9C260A4020240619', 'USRC0C77A5B20240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Rudra Kumar Sah', 'rudrakumar143xx@gmail.com', '8051141148', '2009-07-29', 'Paul Bagan Road no-1, Mihijam', '1718814531_4222f1537ebecbb04a44.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '94a5fb53ebdb4d139c551dda464c9a21', '[\"Fathers Name\",\"Age\"]', '[\"Suresh Kumar Sah\",\"15\"]', '2024-06-19 21:58:51', '2024-06-19 21:58:51'),
(598, 'SUD4C484A2820240619', 'USR91EF299B20240619', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Rudra Kumar Sah', 'rudrakumar143xx@gmail.com', '7903033709', '2009-07-29', 'Paul Bagan Road No-1, Mihijam', '1718814652_bf1696ef7207cfe2df30.jpeg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '94a5fb53ebdb4d139c551dda464c9a21', '[\"Fathers Name\",\"Age\"]', '[\"Suresh Kumar Sah \",\"15\"]', '2024-06-19 22:00:52', '2024-06-19 22:00:52'),
(599, 'SUD77F9CB3320240620', 'USR42D55E1320240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat Sharma ', 'Ravibhusan80@gmail.com', '9608928516', '2012-01-01', 'St no 20a qr no 5a chittaranjan ', '1718849986_0774e70aff608cf4d0d9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '21933a4aadf04b67c9f5ea8d3c8cac6e', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-20 07:49:46', '2024-06-20 07:49:46'),
(600, 'SUDF1EEC6C320240620', 'USR9BB4F6C020240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat Sharma ', 'Ravibhusan80@gmail.com', '9608928516', '2012-01-01', 'St no 20a qr no 5a chittaranjan ', '1718849990_ce9bb0118d63c724b1e8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '21933a4aadf04b67c9f5ea8d3c8cac6e', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-20 07:49:51', '2024-06-20 07:49:51'),
(601, 'SUD390804C820240620', 'USRF76D4F7620240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Virat Sharma ', 'Ravibhusan80@gmail.com', '9608928516', '2012-01-01', 'St no 20a qr no 5a chittaranjan ', '1718850344_a77ddc1f26fce47d11b4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a8eb1de7870de603dc86b161e5b2805f', '[\"Fathers Name\",\"Age\"]', '[\"Ravi bhushan \",\"45\"]', '2024-06-20 07:55:44', '2024-06-20 07:55:44'),
(602, 'SUDB140AEEF20240620', 'USR759C25CE20240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Dhritiman Manna ', 'chinmaychintu74@gmail.com', '8759124026', '2013-02-06', 'Rupnarayanpur', '1718850390_99e1266d011ca8e6bbe6.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'bd31df1d28d67a0d9be299d518164e2d', '[\"Fathers Name\",\"Age\"]', '[\"Chinmay Manna 451\",\"51\"]', '2024-06-20 07:56:30', '2024-06-20 07:56:30'),
(603, 'SUD264157A720240620', 'USRE24300DE20240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Dhritiman Manna ', 'chinmaychintu@gmail.com', '8759124026', '2013-02-06', 'Rupnarayanpur ', '1718851517_e2edb2fe9a20a9735547.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'bd31df1d28d67a0d9be299d518164e2d', '[\"Fathers Name\",\"Age\"]', '[\"Chinmay Manna \",\"51\"]', '2024-06-20 08:15:18', '2024-06-20 08:15:18'),
(604, 'SUD1B85A48820240620', 'USRC71966DF20240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'SUPRAVA MONDAL', 'mondalsuprava@gmail.com', '9339490144', '2011-06-30', 'Gandheswary apartment 3rd floor. 3/B', '1720181836_17c378356d255cb8d5c7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '049dd42dade5d5bef59b15c29459ff0e', '[\"Fathers Name\",\"Age\"]', '[\"Pradip mondal\",\"13\"]', '2024-06-20 08:15:47', '2024-06-20 08:15:47'),
(605, 'SUD63B767FA20240620', 'USR9EF21A2620240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Yashraj  Gupta', 'pushpraj21188@gmail.com', '7812043684', '2011-06-07', 'STREET NO. 10, QRTS NO. 6B, PO- CHITTARANJAN, DIST- PASHCHIM BURDHWAN, STATE-WEST BENGAL, PIN CODE-713331', '1718853382_f9874fd2d808454bcc48.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f8efe33f6acc9ebd5b1342a0781c595', '[\"Fathers Name\",\"Age\"]', '[\"Pramod Kumar\",\"13\"]', '2024-06-20 08:46:22', '2024-06-20 08:46:22'),
(606, 'SUD3A3166A720240620', 'USRBB92652C20240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Yashraj  Gupta', 'pushpraj21188@gmail.com', '7812043684', '2011-06-07', 'STREET NO. 10, QRTS NO. 6B, PO- CHITTARANJAN, DIST- PASHCHIM BURDHWAN, STATE-WEST BENGAL, PIN CODE-713331', '1718853384_21d40704cc7f2ab60066.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f8efe33f6acc9ebd5b1342a0781c595', '[\"Fathers Name\",\"Age\"]', '[\"Pramod Kumar\",\"13\"]', '2024-06-20 08:46:25', '2024-06-20 08:46:25'),
(607, 'SUD81DF730C20240620', 'USR32A4B87220240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Yashraj  Gupta', 'pushpraj21188@gmail.com', '7812043684', '2011-06-07', 'STREET NO. 10, QRTS NO. 6B, PO- CHITTARANJAN, DIST- PASHCHIM BURDHWAN, STATE-WEST BENGAL, PIN CODE-713331', '1718853385_4b902330c7dff3446493.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f8efe33f6acc9ebd5b1342a0781c595', '[\"Fathers Name\",\"Age\"]', '[\"Pramod Kumar\",\"13\"]', '2024-06-20 08:46:25', '2024-06-20 08:46:25'),
(608, 'SUD27BE51D520240620', 'USR4861F48C20240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Yashraj  Gupta', 'pushpraj21188@gmail.com', '7812043684', '2011-06-07', 'STREET NO. 10, QRTS NO. 6B, PO- CHITTARANJAN, DIST- PASHCHIM BURDHWAN, STATE-WEST BENGAL, PIN CODE-713331', '1718853385_ecca7eaf9cdd318cb2b0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '4f8efe33f6acc9ebd5b1342a0781c595', '[\"Fathers Name\",\"Age\"]', '[\"Pramod Kumar\",\"13\"]', '2024-06-20 08:46:25', '2024-06-20 08:46:25'),
(609, 'SUDF87562B520240620', 'USR5030D6D520240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'DHRITIMAN MANNA', 'chinmaychintu@gmail.com', '8759124026', '2013-02-06', 'VILL- DURGA MANDIR ROAD, RUPNARAYANPUR, PO- RUPNARAYANPUR BAZAR, PS- SALANPUR', '1718855517_659012fc58146f3a462c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e5d12b8163113d141a862c461f31ba77', '[\"Fathers Name\",\"Age\"]', '[\"CHINMAY MANNA\",\"11\"]', '2024-06-20 09:21:58', '2024-06-20 09:21:58'),
(610, 'SUDD80F630D20240620', 'USR4FA31D3F20240620', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sk Rubel', 'admin@gmail.com', '6290353314', '2024-07-09', 'Shopiya beauty Parlour', '1720270933_9e1fb3a85b4e2aa4983f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '76619592388b8c47ea88f01fe52e16f7', '[\"Fathers Name\",\"Age\"]', '[\"Sk Rubel\",\"Rohan \"]', '2024-06-20 12:10:50', '2024-06-20 12:10:50'),
(611, 'SUD43DAAF0D20240620', 'USR026C773E20240620', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Raunak Soren', 'sorendinesh03@gmail.com', '8340394633', '2011-01-28', 'village Sabdiha ', '1720185227_2cf2fc838ecaf427a99b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Dinesh Soren\",\"13\"]', '2024-06-20 12:51:45', '2024-06-20 12:51:45'),
(612, 'SUD5EEE741120240620', 'USR4459A07420240620', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Abinash panda ', 'ab67.nash@gmail.com', '7585881275', '2012-01-04', 'Street no - 82, quarter no - 12/3A, chittaranjan ', '1718868150_e7dec38b486114dff2a5.png', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '300551bf06965f6248de809c9cda1d70', '[\"Fathers Name\",\"Age\"]', '[\"SRIBATSA panda \",\"12\"]', '2024-06-20 12:52:30', '2024-06-20 12:52:30'),
(613, 'SUDAB8C4D3E20240620', 'USRCC4E5C7420240620', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Vinit Kumar Shaw', 'shawvikashmjm1981@gmail.com', '9572507080', '2010-04-16', 'Kishori gali Mihijam Jamtara pin-815354', '1718869832_2b8007129251e876ce8e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd9a13fbac10356902e27a6fdafa6bf5d', '[\"Fathers Name\",\"Age\"]', '[\"Vikash Kumar Shaw\",\"14\"]', '2024-06-20 13:20:32', '2024-06-20 13:20:32'),
(614, 'SUD6FA8EA1020240620', 'USR5A196A4420240620', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Vinit Kumar Shaw', 'shawvikashmjm1981@gmail.com', '9572507080', '2010-04-16', 'Kishori gali Mihijam Jamtara pin-815354', '1718869832_3dc144495f8955ba2dbd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd9a13fbac10356902e27a6fdafa6bf5d', '[\"Fathers Name\",\"Age\"]', '[\"Vikash Kumar Shaw\",\"14\"]', '2024-06-20 13:20:33', '2024-06-20 13:20:33'),
(615, 'SUDA566524820240620', 'USRB216FEBF20240620', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'PRIYANSHU MONDAL ', 'mondalpankaj299@gmail.com', '8768246416', '2009-11-13', 'YAMUNA TWINS,FLAT NO 305, RUPNARAYANPUR,WEST BENGAL', '1718873568_5c2dd2e4ae8306933d67.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b5b48ac55e8d8171a1010221b17319c1', '[\"Fathers Name\",\"Age\"]', '[\"PANKAJ MONDAL\",\"14\"]', '2024-06-20 14:22:49', '2024-06-20 14:22:49'),
(616, 'SUD450DDDC420240620', 'USR4CD5FEE020240620', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Mayank Pal ', 'Maloypalclw@gmail.com', '8250664476', '2012-05-06', 'St no 2c Qt no4a.post chittaranjan. Pin 713331', '1718874150_7b2204ff52c08e3c0a51.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '40aa52b561a1ae0c6b6303f1672bcc2e', '[\"Fathers Name\",\"Age\"]', '[\"Maloy Pal \",\"12+\"]', '2024-06-20 14:32:30', '2024-06-20 14:32:30'),
(617, 'SUD2E135F2220240620', 'USR8501BFAD20240620', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dharmanshu Dhermesh ', 'ranjeet191369@gmail.com', '9932872379', '2011-09-06', '26A', '1718879251_58e1e21fcb1e90ea44c3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'af71723cea1c744d2d6c70b429513a5c', '[\"Fathers Name\",\"Age\"]', '[\"Ranjeet Kumar Rajak \",\"13\"]', '2024-06-20 15:57:31', '2024-06-20 15:57:31'),
(618, 'SUD6118EFCA20240620', 'USR06823FBF20240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Arijit', 'info@quantumbrize.com', '9123325003', '1999-06-24', 'N-0024', '1718885644_53de20d4a123896e4cdd.png', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e10adc3949ba59abbe56e057f20f883e', '[\"Fathers Name\",\"Age\"]', '[\"QB\",\"24\"]', '2024-06-20 17:44:04', '2024-06-20 17:44:04'),
(622, 'SUDBDE2987B20240620', 'USRFE430FAB20240620', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Ashish Swain ', 'pujaswain9686@gmail.com', '9547063240', '2008-12-06', 'Street no-46 qtrno-9d fathepur, chittaranjan ', '1718890873_c8e60800b5f3075c09da.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'c29dc84e80becf5d2e4dc24f21ac5526', '[\"Fathers Name\",\"Age\"]', '[\"Kishor Kumar swain \",\"50\"]', '2024-06-20 19:11:13', '2024-06-20 19:11:13'),
(627, 'SUDD3CE532C20240620', 'USR4988742220240620', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Saikat Gorai', 'sanugorai8@gmail.com', '9832151461', '2009-03-15', 'Harisadi', '1718893265_31946cd744a49899b266.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1b5c1f6a6712f13449d4382f30871dcc', '[\"Fathers Name\",\"Age\"]', '[\"Sanjoy Gorai \",\"15\"]', '2024-06-20 19:51:05', '2024-06-20 19:51:05'),
(629, 'SUD9FCED93820240620', 'USR9D97FCC720240620', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Rishav Chowdhury ', 'www.rishavratanchowdhury@gmail.com', '7585827228', '2011-06-01', 'West Rangamatia HCL road Rupnarayanpur 713386', '1718900268_81efe660b335075aa116.png', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '88bfcf02e7f554f9e9ea350b699bc6a7', '[\"Fathers Name\",\"Age\"]', '[\"Ratan Chowdhury \",\"13\"]', '2024-06-20 21:47:48', '2024-06-20 21:47:48'),
(630, 'SUDF82B599D20240620', 'USR168692CE20240620', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'MIYAN MONDAL ', 'Paritoshmondal518@gmail.com', '7992408566', '2009-04-06', 'Street no  - 56A, Qua no - 25A, Fatehpur  Chittaranjan, Paschim bardhaman  ,Pin - 713365', '1718903257_b1cc661f6ffc071f04d4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1c5101ae2be49f14ad6760d3b42719d2', '[\"Fathers Name\",\"Age\"]', '[\"Paritosh Mondal \",\"15 year\"]', '2024-06-20 22:37:37', '2024-06-20 22:37:37'),
(631, 'SUD3DD11E4120240621', 'USR0D73199F20240621', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Shrijan Raj', 'sunilkumar20071984@gmail.com', '8967559667', '2013-08-11', 'Chittaranjan', '1718932269_525435edb2eaf22fb559.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e10adc3949ba59abbe56e057f20f883e', '[\"Fathers Name\",\"Age\"]', '[\"Sunil Kumar\",\"11\"]', '2024-06-21 06:41:10', '2024-06-21 06:41:10'),
(632, 'SUD9BD0CEAC20240621', 'USR9662DC9720240621', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Swastika Datta ', 'tapasi.dey.datta@gmail.com', '9475002078', '2009-01-15', 'Aurobindo Nagar, Sector -2, Road no. 7, Hindustan Cables, Paschim Bardhaman ', '1718936200_a2784a454daa8e1655d7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '38916af614264a71b8cf9446f5110654', '[\"Fathers Name\",\"Age\"]', '[\"Swarup Datta \",\"15\"]', '2024-06-21 07:46:41', '2024-06-21 07:46:41'),
(633, 'SUDB418A12A20240621', 'USR64F7951020240621', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Suniska Mukherjee ', 'suman.mukherjee77@yahoo.com', '9343504316', '2011-12-04', 'St No 56, Qrs No 10A, chittaranjan,  pin- 713365', '1718937149_c6706cd402e01be1749f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '065596ec98a227a1e27308ce11c94fad', '[\"Fathers Name\",\"Age\"]', '[\"Suman Mukherjee \",\"12 year\'s \"]', '2024-06-21 08:02:29', '2024-06-21 08:02:29'),
(634, 'SUDBECB264E20240621', 'USR2DFC14FF20240621', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Bhaskar kumar ', 'bhaskarkumar40bk@gmail.com', '7001566157', '2009-10-24', 'St No 37 A, qr no-52B, area-8, chiiaranjan ', '1718944985_cf2ed03330f5e8ff7087.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '8b52306f77764f678ae7b3e0617cea1a', '[\"Fathers Name\",\"Age\"]', '[\"Rajesh Kumar Mandal\",\"39\"]', '2024-06-21 10:13:05', '2024-06-21 10:13:05'),
(635, 'SUD3229E06820240621', 'USRA6EE669720240621', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Debjani Mondal', 'bapibbb46@gmal.com', '6296047456', '2012-07-10', 'Area 6, Street No.: 29 / Quater No.: 12A/B', '1718977543_bce1b157c64165a6e14e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f796e36325d00aa6d2f588a5f818fb05', '[\"Fathers Name\",\"Age\"]', '[\"Netai Mondal\",\"11\"]', '2024-06-21 19:15:44', '2024-06-21 19:15:44'),
(636, 'SUD6EB30C1A20240621', 'USR7AA9B87420240621', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Adya Pandey', 'bpandey_1984@rediffmail.com', '8547814643', '2011-06-04', 'Lila nagar Kangoi, Mihijam, Jamtara, JH 815354', '1718977808_a9f4713333b8d099331e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f5563c8a4f3a4decd841039e52d8e9d3', '[\"Fathers Name\",\"Age\"]', '[\"Badri Pandey\",\"13\"]', '2024-06-21 19:20:08', '2024-06-21 19:20:08'),
(637, 'SUD90B59F3C20240621', 'USRD8E340C420240621', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Kushagra Chhatri', 'shwetachhatri4545@gmail.com', '9378184212', '2010-03-24', 'Arvind Nagar, Road no. 9, Hindustan Cables, Chittaranjan', '1718980930_022a856c09ff7298dbaa.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Goutam Chhatri\",\"14\"]', '2024-06-21 20:12:11', '2024-06-21 20:12:11'),
(638, 'SUD27B2D29520240621', 'USR8EEF08D920240621', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'DEBASMIT PRADHAN ', 'pinkilatap1986@gmail.com', '7047076654', '2009-06-26', 'Palbagan,Mihijam', '1718982439_4595d7bc9b09d576fdde.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '7a576f2616c1541c7851dd56e1faca2a', '[\"Fathers Name\",\"Age\"]', '[\"Hare Krishna Pradhan\",\"14\"]', '2024-06-21 20:37:10', '2024-06-21 20:37:10'),
(639, 'SUD37117F2C20240621', 'USR10C3C7A220240621', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Sulagna Banarjee', 'lbanerjee284@gmail.com', '9434147374', '2010-08-08', 'simatopally Rupnarayanpur dabor more A to Z automobiles', '1719014351_3b28253ad0e899b16847.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Susanta Banerjee\",\"14\"]', '2024-06-21 20:56:40', '2024-06-21 20:56:40'),
(640, 'SUD591AFA6E20240621', 'USR7FCB42B220240621', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aditya Ranjan ', 'ksanjoy970@gmail.com', '9708621613', '2013-02-21', 'St 50 ,Q No 16/D , Chittaranjan ', '1718984360_5482f8432bcb54ae5db3.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0bfb331611cbcf420b38f73e1936f836', '[\"Fathers Name\",\"Age\"]', '[\"Sanjay kumar \",\"48\"]', '2024-06-21 21:03:19', '2024-06-21 21:03:19'),
(641, 'SUDF13C817E20240621', 'USR714B1AE520240621', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Anuj Kumar Sah', 'puja33sah@gmail.com', '7858089129', '2010-11-15', 'st.no. 33, qrs. no. 14/D, Area-5, Chittaranjan, Paschim Bardaman, West Bengal, 713331', '1718984269_ff9576df3c4374a6a080.pdf', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '99aebc8bcb4bef8ccbbe0d480efe1948', '[\"Fathers Name\",\"Age\"]', '[\"Shio kumar Sah\",\"13\"]', '2024-06-21 21:07:49', '2024-06-21 21:07:49'),
(642, 'SUDBC72E59420240621', 'USRF15CA39C20240621', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'SANKALP', 'sanjaykeishu@gmail.com', '9771747567', '2013-01-09', 'St. No. 69 Qtr.No. 2/B, S.P NORTH CHITTARANJAN', '1718986117_bae76d01ecb8a3bf484a.jpeg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '113d019658fe29abb6589421693c6500', '[\"Fathers Name\",\"Age\"]', '[\"SANJAY KUMAR\",\"12\"]', '2024-06-21 21:11:33', '2024-06-21 21:11:33'),
(643, 'SUDF92B00C820240621', 'USRD8707FCF20240621', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ashish Kumar Mandal ', 'kartic627@gmail.com', '8101629504', '2009-11-13', 'Mondal Sweets, Rupnagar, West Bengal ', '1718984677_e03ddb92770ffa21e2cd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ef43a947dd9e616bf8f276431679bfb9', '[\"Fathers Name\",\"Age\"]', '[\"Kartick Mondal \",\"15\"]', '2024-06-21 21:14:38', '2024-06-21 21:14:38'),
(644, 'SUD0D8B71E220240621', 'USR397D6E7120240621', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'MD AZMAT HUSSAIN', 'asifhussainje@gmail.com', '9932390785', '2012-07-15', 'P/Avenue Qtr no 3/6 A CLW CHITTARANJAN- 713331', '1718986034_f77ed793748f702590b4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '2b147ddf45d07aa73470a5a28dd458db', '[\"Fathers Name\",\"Age\"]', '[\"MD ASIF HUSSAIN \",\"47yrs\"]', '2024-06-21 21:37:15', '2024-06-21 21:37:15'),
(645, 'SUDCAE95E6C20240621', 'USRFCC5816720240621', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ashutosh Kumar ', 'shravanku1212@gmail.com', '9835801864', '2010-07-26', 'St no. 72 A qtr no. 6D simjuri chitrawan  chittaranjan ', '1719149216_151ab748e7abe3f031f1.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '53c6de78244e9f528eb3e1cda69699bb', '[\"Fathers Name\",\"Age\"]', '[\"Shravan kumar jha \",\"13 years\"]', '2024-06-21 21:45:26', '2024-06-21 21:45:26'),
(646, 'SUD3A443E2E20240621', 'USRDD7005D520240621', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Saksham Kumar Anand', 'subhashcbose80@gmail.com', '8880419061', '2012-08-05', 'STRRET no. 72 A, Qtr No. 4B', '1718991059_dfde6453be3b60b25844.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0a020bf4b9c209ac7ff1f9a273057141', '[\"Fathers Name\",\"Age\"]', '[\"Subhash Chandra Bose\",\"43\"]', '2024-06-21 23:00:56', '2024-06-21 23:00:56'),
(647, 'SUDB7127A5120240621', 'USR1F3167D920240621', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Debopriya Maji ', 'debopya07@gmail.com', '8617643262', '2010-06-05', 'Rupnarayanpur ', '1718992677_d9e71d2431fe6d7fa65c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '63dfad870feeea86fd79f2b9c0c3e62d', '[\"Fathers Name\",\"Age\"]', '[\"Nayan Maji \",\"14\"]', '2024-06-21 23:27:57', '2024-06-21 23:27:57'),
(648, 'SUDC1B2309720240622', 'USRDA2DD4C620240622', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Ankit singh', 'singhrena74@gmail.com', '9508840865', '2009-09-15', 'P.B road,Mihijam', '1719014537_60cc9b3711b124802c92.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Ajit kumar singh\",\"15\"]', '2024-06-22 05:32:17', '2024-06-22 05:32:17'),
(649, 'SUD5BB0DB3B20240622', 'USR2C2B497820240622', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Debopriya Maji', 'debopriya07@gmail.com', '8617643262', '2010-06-05', 'Rupnarayanpur', '1719014758_9add5a100945112962d6.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Nayan Maji\",\"14\"]', '2024-06-22 05:35:59', '2024-06-22 05:35:59'),
(650, 'SUD255AF9BE20240622', 'USR10B04E1C20240622', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Kunaram kisku', 'muniramkisku97@gmail.com', '9434678158', '2010-06-14', 'St no-61,Qtr no-D-10,Sp North, Chittaranjan', '1719015040_8ddafc0daeb471afde8a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Muniram kisku\",\"14\"]', '2024-06-22 05:40:40', '2024-06-22 05:40:40'),
(651, 'SUDB1DE63B920240622', 'USR8F1DC30F20240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'ANURAG BISWAS', 'tanmoymalda77@gmail.com', '8935873288', '2012-08-24', 'Aurobindo Nagar, lane no -8, P.O.-HCL. Pin -713335', '1719015294_f34f57a4ee26c993de2c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Tanmoy Biswas\",\"11\"]', '2024-06-22 05:44:54', '2024-06-22 05:44:54'),
(652, 'SUD556F3E4720240622', 'USR775DA01C20240622', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Ashna Kumari ', 'aasana13082012@gmail.com', '9002494133', '2012-08-13', 'B.K. Prasad  Street no-27, quarter no-9B', '1719020469_4a1e7a8e4f0447386433.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5f9407166a0a218226fbd6a1cca5e7cd', '[\"Fathers Name\",\"Age\"]', '[\"B.K. Prasad \",\"41\"]', '2024-06-22 07:11:10', '2024-06-22 07:11:10'),
(653, 'SUDDFE763AF20240622', 'USRCDAF516220240622', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Angel Kachhap', 'upkachhap@gmail.com', '9333502183', '2011-05-16', 'Chittaranjan area 4 st:-24 qrsno 2b', '1719024605_c15b5b5760c960c54fb2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Uttam Prakash kachhap\",\"13\"]', '2024-06-22 08:20:05', '2024-06-22 08:20:05'),
(654, 'SUDF793763220240622', 'USR0016E15220240622', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Sudeshna Mukherjee', 'asitmukherjee@gmail.com', '8637092801', '2012-05-13', 'Amdanga,P.O-achra, Dist-Paschim Bardhaman, W.B,Pin-713335', '1719025404_09d7eb1a382ab17a5a12.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Asit Mukherjee\",\"12\"]', '2024-06-22 08:33:25', '2024-06-22 08:33:25'),
(655, 'SUD01D332FB20240622', 'USR5FA8C0F520240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'H.Shreyanshi Panda ', 'swapna@1234.gmail.com', '8116349742', '2013-01-12', 'Street no 69 qrs no 5 B chittaranjan Paschim Burdwan pin 713331', '1720102312_b0128b124ced4f0222dd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '286dc984791d90175a7098486378f7f6', '[\"Fathers Name\",\"Age\"]', '[\"H.srinivash Panda\",\"11\"]', '2024-06-22 09:44:46', '2024-06-22 09:44:46'),
(656, 'SUDCE3ABC5720240622', 'USRD9A1E40620240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sumit Sharma ', 'akhileshsharma040@gmail.com', '8002800773', '2012-10-18', 'Ambagan, mihijam ', '1719030861_2886bab29c5bac2f9d7d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'cdd09ebd38766513544a8775208586d4', '[\"Fathers Name\",\"Age\"]', '[\"Akhilesh kumar sharma \",\"43\"]', '2024-06-22 09:57:12', '2024-06-22 09:57:12'),
(657, 'SUDA46BA2D920240622', 'USRBF5E5B0420240622', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Divya kumari ', 'hazareepaswan013@gmail.com', '6295934485', '2013-03-12', 'St.no 66A Qrs no 5A simjuri chittaranjan ', '1719040661_3d988109d539fbb1c9ab.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e6537cb7464c0717822d2aef7c6add76', '[\"Fathers Name\",\"Age\"]', '[\"Hazaree Paswan\",\"11 years\"]', '2024-06-22 12:46:31', '2024-06-22 12:46:31'),
(658, 'SUD695003C320240622', 'USR428CFA8C20240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'KUMARI ADITI', 'sanjay2009guriya@gmail.com', '7908058673', '2010-10-16', 'Chittaranjan ', '1719042701_32cb3a571cc16100770b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e07b5d5489d6f5a70dff36ba54d8dbf0', '[\"Fathers Name\",\"Age\"]', '[\"Late Sanjay Kumar Ram\",\"13\"]', '2024-06-22 13:21:24', '2024-06-22 13:21:24'),
(659, 'SUD228D8A1120240622', 'USRBA26278220240622', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'SHUVAM OJHA', 'sojha2730@gmail.com', '7908106542', '2010-03-18', 'Rupnarayanpur jharkhand road ', '1719043486_a225e1ebfdfb2675af04.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '238d4f40f6a9bc2ba89a9131cb347961', '[\"Fathers Name\",\"Age\"]', '[\"Ranjan ojha\",\"30\"]', '2024-06-22 13:34:47', '2024-06-22 13:34:47'),
(660, 'SUD8BB8126220240622', 'USRCF00505020240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Rajshree Gupta ', 'sandipcon.skg@gmail.com', '8420043262', '2012-02-22', 'Street -1E,Qtr-2A CHITTARANJAN ', '1719049559_185a2d49e3637278daa7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Sandip Kumar Gupta \",\"12 years\"]', '2024-06-22 15:15:55', '2024-06-22 15:15:55'),
(665, 'SUD46BE012F20240622', 'USRDCB5B38720240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Subhankar Sharma', 's@gmail.com', '9679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1719051990_b00f020b7f1846848037.jpeg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'adcaec3805aa912c0d0b14a81bedb6ff', '[\"Fathers Name\",\"Age\"]', '[\"Subhankar Sharma\",\"22\"]', '2024-06-22 15:56:32', '2024-06-22 15:56:32'),
(666, 'SUDAF43C38F20240622', 'USR7178CB9A20240622', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Subhankar Sharma', 'ss@gmail.com', '9679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1719052160_5ed0d511dea027f249a9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '467b617fec4d9fcb63505734ee224851', '[\"Fathers Name\",\"Age\"]', '[\"SUKUMAR Sharma\",\"22\"]', '2024-06-22 15:59:22', '2024-06-22 15:59:22'),
(674, 'SUDC25A750120240622', 'USR95D3540120240622', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Archisman Dey ', 'udaybhanudey@gmail.com', '7477684256', '2012-08-06', 'St.no.55 Qrs.no.3B Chittaranjan ', '1719054052_d370835757b053447353.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b3f8019d6e7403ba7a5298f6479cc19b', '[\"Fathers Name\",\"Age\"]', '[\"Udaybhanu Dey \",\"11+\"]', '2024-06-22 16:30:53', '2024-06-22 16:30:53'),
(678, 'SUDB8FB82D520240622', 'USR63491C9C20240622', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Souvik Nayak ', 'madhabcn@gmail.com', '9083352791', '2012-03-21', 'Sri Ram Pally, Harisadi, po- Achra , pin - 713335 , Paschim Bardhaman, West Bengal.', '1719056632_023055cad63ae44a1cc4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Madhab Chandra Nayak \",\"12\"]', '2024-06-22 17:13:53', '2024-06-22 17:13:53'),
(679, 'SUDF4B7640520240622', 'USR26867F3820240622', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ayan Sen', 'aninditasen8491@gmail.com', '7586839763', '2009-08-31', 'Rupnarayanpur , Dist- Paschim Bardhaman, Pin- 713386', '1719056941_f2d0c82dfc66673407ef.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Manas Sen\",\"14\"]', '2024-06-22 17:19:02', '2024-06-22 17:19:02'),
(680, 'SUDE0A95AB120240622', 'USR5CD112EE20240622', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ayan Dhibar', 'dhibarrina421@gmail.com', '9932845573', '2009-12-02', 'Village- Achra, Sarada Pally Post - Achra, Rupnarayanpur', '1719058540_b957d38cd0a75b2468d7.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1e3332b2cd20d2d3db407a20f6913d0d', '[\"Fathers Name\",\"Age\"]', '[\"Sunil Kumar Dhibar\",\"14\"]', '2024-06-22 17:45:41', '2024-06-22 17:45:41'),
(681, 'SUD0E81857F20240622', 'USRB6605B9E20240622', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Arijit Mondal', 'arijitmondal0024@gmail.com', '9123325003', '2024-06-22', 'Vill+Post-ula', '1719064768_3c7276d099c6eb7bf2ff.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '827ccb0eea8a706c4c34a16891f84e7b', '[\"Fathers Name\",\"Age\"]', '[\"Aa\",\"28\"]', '2024-06-22 19:29:29', '2024-06-22 19:29:29'),
(682, 'SUD9705B77820240623', 'USRAC84068A20240623', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aryan Raj', 'bchoudhary7611@gmail.com', '9939753565', '2013-01-20', 'St.no.-85,Qtr.no.-2A,Area-7,Simjuri', '1719143488_f181f8940ebb576f7735.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'd6155c6ec9d14c2391543863de3bd15c', '[\"Fathers Name\",\"Age\"]', '[\"Balram Choudhary \",\"11\"]', '2024-06-23 05:45:52', '2024-06-23 05:45:52'),
(683, 'SUD33F9473620240623', 'USRDBCE768E20240623', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ujaan Bandyopadhyay', 'banerjeeurbi2240@gmail.com', '7602490166', '2010-05-16', 'Mahabir Colony Rupnarayanpur', '1719120172_7e537d5ab1ec212930b1.pdf', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '1e0fe9658a723dbbcce05c640ee8bc31', '[\"Fathers Name\",\"Age\"]', '[\"Binoy Prasad Bandyopadhyay\",\"14\"]', '2024-06-23 10:52:52', '2024-06-23 10:52:52'),
(684, 'SUD6E8DE02920240623', 'USRDAE9DD8420240623', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Rajshree Ranjan', '26ranjanrakesh@gmail.com', '9163340281', '2012-11-14', 'ST.NO-62,Qtr.no-11/3A  Chittaranjan (W.B)', '1719164554_8d9092d6fbf30b288c7c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rakesh Ranjan\",\"11\"]', '2024-06-23 23:12:34', '2024-06-23 23:12:34'),
(685, 'SUDA09BC00C20240624', 'USR8F283BD120240624', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Himanshu Kumar ', 'jhunnakumarcrj@gmail.com', '7091369912', '2012-06-14', 'St no.84, Qrs.no.32A', '1719213447_97e70987a3fe4e15325f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '40587bff0e72b6fdbba30c40c95e148a', '[\"Fathers Name\",\"Age\"]', '[\"Jhunna Kumar \",\"39\"]', '2024-06-24 12:47:27', '2024-06-24 12:47:27'),
(686, 'SUD4F23032420240624', 'USRDB2C7C8320240624', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Piyali Tudu', 'manojtudu479@gmail.com', '7908350399', '2011-05-15', 'Street number -40, Qrs- 4/20D  Chittaranjan', '1719245745_d4e315494fd10d9e6cef.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b4a20f443eb18543708b1a83df44cf9d', '[\"Fathers Name\",\"Age\"]', '[\"Manoj Kumar Tudu \",\"13\"]', '2024-06-24 21:32:50', '2024-06-24 21:32:50'),
(687, 'SUD4997E90A20240624', 'USR9F5B412120240624', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Priyotosh Mondal', 'Spmondal95768@gmail.com', '9609445868', '2011-07-07', 'ST NO-39, QTR NO-28B CRJ', '1719245700_7f7cb1446063405cf215.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b178ffb0459a9a2e4059656ed19de2b5', '[\"Fathers Name\",\"Age\"]', '[\"Sasti Pada Mondal \",\"12+\"]', '2024-06-24 21:42:45', '2024-06-24 21:42:45'),
(688, 'SUD9222200A20240624', 'USRCB045E3A20240624', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Samriddh Banerjee ', 'seemabanerjee661@gmail.com', '8373816776', '2012-10-03', 'Radhe complex B block 2nd floor flat no 201 station road rupnarayanpur', '1719251679_5056f81052ef62376669.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b0f8b3e58f093359fe1af416b5ea8ed6', '[\"Fathers Name\",\"Age\"]', '[\"TANOJ BANERJEE \",\"11\"]', '2024-06-24 23:24:39', '2024-06-24 23:24:39'),
(689, 'SUDD81033C820240625', 'USR2B68E63320240625', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Divyanka Kushwaha ', 'archnakushwaha1912@gmail.com', '9800605564', '2012-01-10', 'St. No. 2 , Qrs . No. 10A , Chittaranjan, West Bengal ', '1719302267_11edd853c18113b376fd.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '81dc9bdb52d04dc20036dbd8313ed055', '[\"Fathers Name\",\"Age\"]', '[\"Ajay Kumar Kushwaha \",\"12\"]', '2024-06-25 13:27:47', '2024-06-25 13:27:47'),
(690, 'SUD73E294CF20240625', 'USR2ADD07F120240625', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Kartik Ranjan', 'rakesh.clw123@gmail.com', '8002391937', '2011-10-26', 'West Bengal, Chitaranjan ', '1719308655_041c0969adc1f804cbe8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a6b7ab8c1444c005d90818c6f75f4d92', '[\"Fathers Name\",\"Age\"]', '[\"Rakesh Ranjan \",\"13\"]', '2024-06-25 15:14:15', '2024-06-25 15:14:15'),
(691, 'SUDFABBE64C20240628', 'USRB9F7382920240628', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Debanjan Basu', 'merybasu9@gmail.com', '8972846355', '2008-11-26', 'st no.68 qrs no.36/B S.P North Chittaranjan West Bengal.', '1719538453_5ecefcf0dfbd2e381f38.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Subhrajit Kumar Basu\",\"15\"]', '2024-06-28 07:04:14', '2024-06-28 07:04:14'),
(692, 'SUD7BA8A5FE20240628', 'USRF102110020240628', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'RAJDEEP MONDAL', 'srikantacrj@gmail.com', '9547865552', '2013-05-24', 'ST NO-54, QR NO 11A,CHITTARANJAN, PASCHIM BARDHAMAN , WB.', '1719585596_ac613ced978fd54d6318.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5f25fbe144e4a81a1b0080b6c1032778', '[\"Fathers Name\",\"Age\"]', '[\"SRIKANTA MONDAL\",\"11 Yrs\"]', '2024-06-28 20:09:57', '2024-06-28 20:09:57'),
(693, 'SUD5A85B3F020240628', 'USRFF92E96020240628', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ishani Chatterjee ', 'purabichatterjee99@gmail.com', '8617071742', '2012-02-19', 'Aurobindo nagar st. no9', '1719597210_4f82efd96ec866b97e35.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e187a4b2db3f9b07430e563fd6749a7a', '[\"Fathers Name\",\"Age\"]', '[\"Subhajit Chatterjee \",\"12\"]', '2024-06-28 23:17:21', '2024-06-28 23:17:21'),
(694, 'SUDDDDC407C20240703', 'USR124AE68220240703', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'SUBIR SINGHA ', 'singhasantanu295@gmail.com', '9476481484', '2012-03-23', 'FLAT NO- 408, YAMUNA TWINS, DESHBANDHU PARK, P.O- HINDUSTHAN CABLES', '1720018708_6ab3c42f5662a09e4854.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'b6b7a0316c8e88e040cc00b6463d2933', '[\"Fathers Name\",\"Age\"]', '[\"SANTANU SINGHA\",\"12 Years\"]', '2024-07-03 20:23:30', '2024-07-03 20:23:30'),
(695, 'SUD2C0F833D20240703', 'USR315B24A520240703', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Aarno mitra', 'mitrasuman9184@gmail.com', '9002873061', '2011-12-14', 'St. No. 60A Qrs. No. 9A Chittaranjan', '1720020354_f9aff4fccd21c90c8b2d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a811225b71db713c376af1ff2e36a068', '[\"Fathers Name\",\"Age\"]', '[\"suman kumar mitra\",\"12\"]', '2024-07-03 20:55:54', '2024-07-03 20:55:54'),
(696, 'SUDF2BD996620240704', 'USR2F540EFE20240704', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ananya Mandal', 'aruparupmandal@gmail.com', '9732278169', '2011-06-07', 'Rupnarayanpur ', '1720059566_3900670ef5b66a63e5b0.heic', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'bf80aa35b5e007a17cb4470ce45c5353', '[\"Fathers Name\",\"Age\"]', '[\"Arup Ratan Mandal \",\"13\"]', '2024-07-04 07:49:26', '2024-07-04 07:49:26'),
(697, 'SUD4CD6B3D720240704', 'USR600EAB4120240704', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ayan', 'abc@gmail.com', '9163465605', '2013-07-04', 'Ghjj', '1720068641_74b169a10ea274361c49.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Adf\",\"12\"]', '2024-07-04 10:20:42', '2024-07-04 10:20:42'),
(698, 'SUD400A59DB20240704', 'USR3E51E97720240704', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Aarav Aggarwal ', 'aggarwalaaravbrs@gmail.com', '7762890214', '2009-11-16', 'Sunset 5,Chittaranjan ', '1720086797_8c263ef56ed46bb56371.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'e10adc3949ba59abbe56e057f20f883e', '[\"Fathers Name\",\"Age\"]', '[\"Amit Aggarwal \",\"14\"]', '2024-07-04 13:57:33', '2024-07-04 13:57:33'),
(699, 'SUD1E3304E020240704', 'USRA870269B20240704', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Dipanshu Jha', 'deepakjhair@gmail.com', '9475334679', '2012-08-10', 'St no 66, QRS no 40/A , Chittaranjan, District - Bardhaman ', '1720082685_f957c7d1e96de6f6dc0f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '324c6acbe2ec9dfdafd1da44b9fb90cc', '[\"Fathers Name\",\"Age\"]', '[\"Deepak Kumar Jha \",\"12\"]', '2024-07-04 14:14:45', '2024-07-04 14:14:45'),
(700, 'SUDF4FBE3E720240704', 'USREA9E7C2F20240704', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Mou Pandit', 'PANDITUTTAM476@GMAIL.COM', '8252864103', '2009-11-21', 'VILLAGE-KUSHBEDIA', '1720096193_dd4965ea1de2e340a185.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'a779092558528d23710b0585aa90f05b', '[\"Fathers Name\",\"Age\"]', '[\"Uttam pandit\",\"14\"]', '2024-07-04 17:57:10', '2024-07-04 17:57:10'),
(701, 'SUDAB9C5AB120240704', 'USR420F983720240704', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Muskan Kumari ', 'ramkumarajesh@gmail.com', '9635024902', '2013-01-29', 'CLW CHITTARANJAN', '1720099112_deb644ba321bbd4e3376.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '06d2ed74aa1b0c3cff93745f2007f360', '[\"Fathers Name\",\"Age\"]', '[\"Ajesh kumar ram \",\"11\"]', '2024-07-04 18:43:39', '2024-07-04 18:43:39'),
(702, 'SUDB050D42920240704', 'USR60E2252820240704', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Prachi Kar', 'rinkukar26@gmail.com', '7258907369', '2008-12-07', 'Chittaranjan, Street no : 21B, Quater no : 10B', '1720100477_adf31fc44ad95fe4f72d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '11bd08a86712e6e7a511e2bc600b76bb', '[\"Fathers Name\",\"Age\"]', '[\"Gouranga Kar\",\"15\"]', '2024-07-04 19:11:17', '2024-07-04 19:11:17'),
(703, 'SUD4642023820240704', 'USR991C684520240704', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'H.Shreyanshi Panda ', '1981swapna.panda@gmail.com', '8116349742', '2013-01-12', 'Street no 69 qrs no 5 B chittaranjan Paschim Burdwan West Bengal pin code-713331', '1720103605_e59aeccd4ebdcd808c41.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '71171c3503b80a8253e78bd149a5e450', '[\"Fathers Name\",\"Age\"]', '[\"H.Srinivash Panda \",\"11\"]', '2024-07-04 19:54:59', '2024-07-04 19:54:59'),
(704, 'SUD7D729A1E20240704', 'USR9654857020240704', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Ansh Raj', 'parshuramkumar9563@gmail.com', '9570208717', '2012-01-10', 'STREET  NO.-31,QUARTER NO.-9 B area 5 Chittaranjan ', '1720103570_33a7e5861b6f80154aa9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '394c8554c5a133133ec28c0a089329d1', '[\"Fathers Name\",\"Age\"]', '[\"Parshu Ram Kumar\",\"13\"]', '2024-07-04 20:02:50', '2024-07-04 20:02:50'),
(705, 'SUD90DF6EED20240704', 'USR8FE7175320240704', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Varsha Kumari ', 'mk1401649@gmail.com', '8116064662', '2008-06-07', 'St no -47, Qrt -2/D', '1720104978_fb693b0be350758e9545.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '82819567b9ad4e8c5212f49f67743616', '[\"Fathers Name\",\"Age\"]', '[\"Rajeev Kumar Ranjan \",\"16\"]', '2024-07-04 20:04:00', '2024-07-04 20:04:00'),
(706, 'SUD70835F4720240704', 'USR1A69B7FF20240704', 'CLS204CDD6620240614', 'BRNCH6890290220240614', 'Ishan Maji', 'majimousumi1986@gmail.com', '9932902487', '2009-09-16', 'Vill+post- Achra ,pin-713335', '1720107062_9fe207af9d47ed1301ce.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '93279e3308bdbbeed946fc965017f67a', '[\"Fathers Name\",\"Age\"]', '[\"Ujjwal kumar Maji\",\"41\"]', '2024-07-04 21:01:02', '2024-07-04 21:01:02'),
(707, 'SUDD9D7118520240704', 'USRB0C1CC7420240704', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Aditya Aryan ', 'ravishmjm@gmail.com', '9631756027', '2012-01-29', 'Chittranjan , Street no.-70A ,Q/no. -1D', '1720187891_8ae1f6632b3407be93de.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '008fb4558e0b6cc48ccb88911e51f34d', '[\"Fathers Name\",\"Age\"]', '[\"Ravish Kumar Mishra \",\"12\"]', '2024-07-04 21:37:35', '2024-07-04 21:37:35'),
(708, 'SUD8032D6DA20240704', 'USR254AE78320240704', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Jeeya Tudu', 'nnt86jeeya@gmail.com', '8812906371', '2013-04-06', 'St no..30 qtr no..45B', '1720111002_51ca9a133a1292ca516c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Narendra Nath\",\"11\"]', '2024-07-04 22:03:42', '2024-07-04 22:03:42'),
(709, 'SUD7DA15ABA20240704', 'USRE718AAE120240704', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Pushkar Kumar Singh ', 'singhanita9153@gmail.com', '9635583672', '2009-05-03', 'Chittaranjan Fatehpur Street no - 54 Qtr no 16 /A', '1720111633_ad3d96a596d609a64f37.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '71602be187c74d04520dfd89392ce433', '[\"Fathers Name\",\"Age\"]', '[\"Santosh Singh \",\"15\"]', '2024-07-04 22:17:13', '2024-07-04 22:17:13'),
(710, 'SUD2E35C19E20240705', 'USREEC1E14520240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Varsha Kumari ', 'kumarimunni20488@gmail.com', '8116064662', '2008-06-07', 'St no -47, Qrt no -2/', '1720159907_5bc2a2a26278ce64f3c8.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '82819567b9ad4e8c5212f49f67743616', '[\"Fathers Name\",\"Age\"]', '[\"Rajeev Kumar Ranjan \",\"16\"]', '2024-07-05 11:41:48', '2024-07-05 11:41:48'),
(711, 'SUD6A678FE820240705', 'USR4B20452820240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Aditya Gupta ', 'adityaking2351@gmail.com', '8051181388', '2009-09-23', 'Kurmipara Mihijam Jamtara Jharkhand ', '1720165395_96375b7ae956514889c4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'f63c7ae9c6e33f4ed3a84576f40c3e05', '[\"Fathers Name\",\"Age\"]', '[\"Piyush Kumar \",\"14\"]', '2024-07-05 12:57:44', '2024-07-05 12:57:44'),
(712, 'SUDA43419D620240705', 'USR56705B9920240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Sweta Digal', 'sweta.digal2009@gmail.com', '9547276131', '2009-05-26', 'street no. 53, Qtr no. 3/B', '1720172240_1b2ee0ec947d9f304110.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Sisira Kumar Digal\",\"15\"]', '2024-07-05 13:05:16', '2024-07-05 13:05:16'),
(713, 'SUD5FF87CED20240705', 'USRC2AC306620240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Neelesh Mahato', 'neeleshmahato@gmail.com', '9163340466', '2008-11-27', 'St 47, qtr 8/a, fatehpur, chittaranjan', '1720166321_d00fce94e99509a85db6.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'ddeb625fb20682af9ffbd855a8c853bc', '[\"Fathers Name\",\"Age\"]', '[\"S.C. Mahato\",\"15\"]', '2024-07-05 13:28:42', '2024-07-05 13:28:42'),
(714, 'SUD151956D120240705', 'USR468E377D20240705', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Aranya Mitul', 'gtrajiv@gmail.com', '9835015572', '2013-01-14', 'ST NO 35B, Qrs 26B Chitt araman 713331', '1720173733_f078d5896cc8c657fe0b.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '5cc0d842e8d8cc7902f0fc6281ea0644', '[\"Fathers Name\",\"Age\"]', '[\"Rajiv Ranjan Kumar\",\"11\"]', '2024-07-05 15:32:14', '2024-07-05 15:32:14'),
(715, 'SUD25A81B8F20240705', 'USR80AEE5BE20240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'Ashutosh Sinha', 'amitsinha7371@gmail.com', '9434390316', '2009-04-28', 'Street No-33, Qrs no 15A, Chittaranjan,713331,WB.', '1720178641_7e53ed5983ec57b457a4.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Amit kr Sinha\",\"15\"]', '2024-07-05 16:54:02', '2024-07-05 16:54:02'),
(716, 'SUD4227082520240705', 'USR4E24546420240705', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Priyanshi', 'rp310808@gmail.com', '7363960541', '2013-02-12', 'Street no 31, Q. No 27A, CLW /CRJ', '1720180382_01250a2d6bb31a65975d.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Ravi Prakash\",\"11\"]', '2024-07-05 17:19:39', '2024-07-05 17:19:39');
INSERT INTO `submit_admit_data` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `name`, `email`, `phone`, `dob`, `address`, `img`, `exam_centre`, `exam_date`, `exam_time`, `password`, `questions`, `answers`, `created_at`, `updated_at`) VALUES
(717, 'SUD4004AA6620240705', 'USRE8F5368C20240705', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Aditya kumar', 'rahuladit1987@gmail.com', '9800848584', '2012-01-08', 'Crj (not mentioned)', '1720185785_cfc94c83da3f46704f8e.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Rahul Kumar\",\"12\"]', '2024-07-05 18:53:06', '2024-07-05 18:53:06'),
(718, 'SUDF8FE02C520240705', 'USRCD0E448120240705', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Vijay Krishna ', 'kumarghanshyam1739@gmail.com', '6299839415', '2012-03-11', 'Street no.10, qur no. 35/b ,crj', '1720186033_3eb094f05ff0f6afab9a.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'af5c9ff1c936a1bc2f62205e5ca23655', '[\"Fathers Name\",\"Age\"]', '[\"Ghanshyam Kumar \",\"12\"]', '2024-07-05 18:54:32', '2024-07-05 18:54:32'),
(719, 'SUD1341931520240705', 'USR6E1E191E20240705', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'saksham Kumar Anand', 'sumankumari16215@gmail.com', '6204365521', '2012-08-05', 'street no-72a QRs no-4b,simjuri, chittaranjan', '1720185977_bec8b99bd0df14cc705c.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"subhash Chandra Bose\",\"12\"]', '2024-07-05 18:56:17', '2024-07-05 18:56:17'),
(720, 'SUD7E70275220240705', 'USR3A5E79F320240705', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Samarth Gupta ', 'santoshclw26@gmail.com', '9334459703', '2012-07-01', 'Street no 21 B, quarter no. 9 B, chittaranjan ', '1720187379_95efcf08bdff85e6a20f.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'bafd7322c6e97d25b6299b5d6fe8920b', '[\"Fathers Name\",\"Age\"]', '[\"Santosh Kumar sah \",\"12 years\"]', '2024-07-05 19:10:38', '2024-07-05 19:10:38'),
(721, 'SUDC01935F520240705', 'USRC114A2B620240705', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'RAMAN KUMAR', 'raman.crnts@gmail.com', '9474404397', '2009-04-03', 'Street No. 60A, Qrs no. 12A, Chittaranjan', '1720188774_715d4d4af67ec7e439c9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', 'de3408676831915c205294191d6e8712', '[\"Fathers Name\",\"Age\"]', '[\"HARENDRA KUMAR\",\"15 years\"]', '2024-07-05 19:42:55', '2024-07-05 19:42:55'),
(722, 'SUDA9AD711320240705', 'USR8893309620240705', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Shivam Besra', 'sbesra99@gmail.com', '9934127989', '2013-01-20', 'Str no. 38 Qtr no 29B Area-5 Near BOI,Chittaranjan', '1720204182_bc0b24604705d9e48ee9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Shyam Sundar Besra \",\"11\"]', '2024-07-05 20:56:37', '2024-07-05 20:56:37'),
(723, 'SUDA1533DF520240705', 'USR05844E9C20240705', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Samarth Kumar', 'samarth.5942@kvsroranchi.in', '7979924430', '2010-10-31', 'Mihijam Palbagan road-02', '1720197266_b1f7030d98439d9461a6.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Prashant Kumar\",\"14\"]', '2024-07-05 22:04:26', '2024-07-05 22:04:26'),
(724, 'SUD03681FCB20240705', 'USRF1570AA820240705', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'SAMPRETY DANGAR', 'sudipdangarclw@gmail.com', '9614378757', '2011-12-01', 'ST.NO 31, QRS.NO 5B , CHITTARANJAN', '1720197479_7b497435d97c309703fa.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"SUDIP DANGAR \",\"12\"]', '2024-07-05 22:08:00', '2024-07-05 22:08:00'),
(725, 'SUD50E77A9F20240705', 'USR30ABF0C620240705', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Anik Dutta', 'rakhid1208@gmail.com', '7908885134', '2011-09-16', 'East Rangamati, Samdi Road, Rupnarayanpur-713331', '1720197950_832f968eb0ec77c485f9.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '25f9e794323b453885f5181f1b624d0b', '[\"Fathers Name\",\"Age\"]', '[\"Anup Dutta\",\"13\"]', '2024-07-05 22:15:51', '2024-07-05 22:15:51'),
(726, 'SUDB6E053E220240706', 'USREBEBFF7720240706', 'CLSA5297EC520240614', 'BRNCHE5858C9E20240614', 'Rishika Gupta ', 'rg219107@gmail.com', '7056618675', '2010-08-18', 'Aurobindo nagar Hindustan cables near shani mandir st no-10 sec-3 ', '1720231563_f226a319c723619d94d0.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '0199fc1d9364ac8bafda1b0a1b0fbf57', '[\"Fathers Name\",\"Age\"]', '[\"Rahul Gupta \",\"13\"]', '2024-07-06 07:20:47', '2024-07-06 07:20:47'),
(727, 'SUDE541094E20240706', 'USR2A02060D20240706', 'CLSB98DDBCF20240614', 'BRNCH3F0DE39420240614', 'Suprogati Roy', '76roy.s@gmail.com', '7319494116', '2012-10-18', 'St No 87 Qrs No 22/A, Chittaranjan', '1720242658_b37fe8144035ac479caa.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '123f10ad3657a8145f1d85fdc1f8b425', '[\"Fathers Name\",\"Age\"]', '[\"Subrata Roy\",\"12\"]', '2024-07-06 10:40:59', '2024-07-06 10:40:59'),
(728, 'SUD47CA604320240706', 'USR6137926D20240706', 'CLSB224924120240614', 'BRNCH6D15950720240614', 'Sk Rubel', 'skrohan0420@gmail.com', '6290353314', '2024-07-04', 'Shopiya beauty Parlour', '1720270623_4092a8f1e17eee677ec2.jpg', 'BRS School, Chittaranjan', '2024-07-06', '10:00 AM - 11:00 AM', '7a9121b510facc18d1195840a934e44b', '[\"Fathers Name\",\"Age\"]', '[\"Sk Rubel\",\"Sk Rubel\"]', '2024-07-06 18:27:04', '2024-07-06 18:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `test_url` varchar(255) NOT NULL,
  `response_url` varchar(255) NOT NULL,
  `timer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `uid`, `user_id`, `class_id`, `branch_id`, `test_url`, `response_url`, `timer`, `status`, `created_at`, `updated_at`) VALUES
(18, 'TSTDE12711620240602', 'USR028953HJ0240410', 'CLS9F69DD9020240507', 'BRNCHD0B6623F20240508', '', '', '30', 'active', '2024-06-02 15:02:52', '2024-06-02 15:02:52'),
(17, 'TST425270ED20240601', 'USR028953HJ0240410', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', '', '', '30', 'active', '2024-06-01 16:04:22', '2024-06-01 16:04:22'),
(16, 'TSTEB12B06920240601', 'USR028953HJ0240410', 'CLS9F69DD9020240507', 'BRNCH2E5EDBA520240508', '', '', '30', 'active', '2024-06-01 15:57:44', '2024-06-01 15:57:44'),
(15, 'TST508F508020240601', 'USR028953HJ0240410', 'CLS9F69DD9020240507', 'BRNCH2E5EDBA520240508', '', '', '30', 'deleted', '2024-06-01 15:48:59', '2024-06-01 15:48:59'),
(19, 'TST27CC3A7E20240622', 'USR028953HJ0240410', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', 'undefined', 'undefined', '30', 'deleted', '2024-06-22 22:51:20', '2024-06-22 22:51:20'),
(20, 'TST4168D2D920240622', 'USR028953HJ0240410', 'CLS09E7F50620240614', 'BRNCH8D470F1720240614', 'undefined', 'undefined', '30', 'deleted', '2024-06-22 22:52:31', '2024-06-22 22:52:31'),
(21, 'TSTFF7EB70E20240817', 'USR028953HJ0240410', 'CLS09E7F50620240614', 'BRNCH8D470F1720240614', 'undefined', 'undefined', '45', 'deleted', '2024-08-17 16:04:07', '2024-08-17 16:04:07'),
(22, 'TST0304EA1120240817', 'USR028953HJ0240410', 'CLS3502412120240614', 'BRNCH97BDCEF120240614', '', '', '5', 'deleted', '2024-08-17 18:20:17', '2024-08-17 18:20:17'),
(23, 'TST63FBFE3F20240819', 'USR028953HJ0240410', 'CLS09E7F50620240614', 'BRNCH8D470F1720240614', '', '', '60', 'deleted', '2024-08-19 14:19:50', '2024-08-19 14:19:50'),
(24, 'TST7562C37420240821', 'USR028953HJ0240410', 'CLSC19376AE20240819', 'BRNCH7F67227620240819', '', '', '30', 'active', '2024-08-21 11:32:52', '2024-08-21 11:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `test_submission`
--

CREATE TABLE `test_submission` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `q_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `ans` text DEFAULT NULL,
  `ans_selected` text DEFAULT NULL,
  `right_ans` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_submission`
--

INSERT INTO `test_submission` (`id`, `uid`, `q_id`, `student_id`, `ans`, `ans_selected`, `right_ans`, `created_at`) VALUES
(127, 'TSU3EB7451F20240821', 'QST6E64345220240821', 'USRB019C94E20240810', ' ', 'a', 'a', '2024-08-21 11:33:10'),
(126, 'TSUD28656E220240819', 'QSTD0F73E5120240622', 'USRB019C94E20240810', ' ', 'a', 'a', '2024-08-19 15:23:50'),
(125, 'TSU35EDFDC320240819', 'QST1F022ABC20240622', 'USRB019C94E20240810', ' ', 'a', 'c', '2024-08-19 15:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `test_submission_anonymous`
--

CREATE TABLE `test_submission_anonymous` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `q_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ans` text DEFAULT NULL,
  `ans_selected` text DEFAULT NULL,
  `right_ans` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_submission_anonymous`
--

INSERT INTO `test_submission_anonymous` (`id`, `uid`, `class_id`, `branch_id`, `q_id`, `email`, `name`, `phone`, `dob`, `address`, `photo`, `ans`, `ans_selected`, `right_ans`, `created_at`) VALUES
(267, 'TSU88469CFA20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'a@gmail.com', 'Arijit', '9123325003', '1999-06-08', 'N-0024', '1717504055_df8c1825e032b6549c32.png', ' ', 'b', 'c', '2024-06-04 17:57:34'),
(266, 'TSUCA29D14F20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717503004_c20b1a5a631a33b8205a.jpg', ' ', 'b', 'c', '2024-06-04 17:40:03'),
(265, 'TSU280D92F220240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2200-01-15', 'Tarakeswar, bajitpur, hospital road', '1717502950_26217028eece88982fe2.jpeg', ' ', 'c', 'c', '2024-06-04 17:39:10'),
(264, 'TSU64143E5020240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717502542_75292707443d33deb461.jpeg', ' ', 'c', 'c', '2024-06-04 17:32:22'),
(262, 'TSU2482331E20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717502059_8a4e22a4efca30e2db2f.jpg', ' ', 'b', 'c', '2024-06-04 17:24:18'),
(263, 'TSU9419763520240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717502247_087d239de68ac782e5d9.jpg', ' ', 'b', 'c', '2024-06-04 17:27:26'),
(261, 'TSU24B8BF1F20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717502008_456dbb26e79a1a295879.jpeg', ' ', 'c', 'c', '2024-06-04 17:23:28'),
(255, 'TSU1849D34620240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501318_8f9016425a32e647f24e.jpeg', ' ', 'c', 'c', '2024-06-04 17:11:58'),
(256, 'TSUC55333EC20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501372_967aea7255950923ca32.jpg', ' ', 'b', 'c', '2024-06-04 17:12:52'),
(260, 'TSUC71AA10E20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501916_5666017573afb26e4320.jpg', ' ', 'c', 'c', '2024-06-04 17:21:56'),
(259, 'TSU063C1ABA20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2022-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501816_55a07f558945e0fc4ebe.jpeg', ' ', 'c', 'c', '2024-06-04 17:20:16'),
(258, 'TSU4455311420240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501704_5de2bff22e6deb2145fe.jpg', ' ', 'b', 'c', '2024-06-04 17:18:24'),
(257, 'TSU4D857DA320240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501543_55a9581f74ebe04ab405.jpg', ' ', 'b', 'c', '2024-06-04 17:15:43'),
(253, 'TSUDAE03AEA20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501180_71925a6c5b6f01f2fc2a.jpg', ' ', 'b', 'c', '2024-06-04 17:09:40'),
(254, 'TSUAA18EAF620240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501250_572ddc6cf6534ba8a1b6.jpeg', ' ', 'b', 'c', '2024-06-04 17:10:50'),
(252, 'TSU7B8B3AF120240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501124_731ff658fa36811b27cf.jpg', ' ', 'c', 'c', '2024-06-04 17:08:43'),
(251, 'TSU33DFFE1320240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717501039_7e449b9f8d80400ae9f5.jpg', ' ', 'b', 'c', '2024-06-04 17:07:18'),
(249, 'TSU51D993A320240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500832_a7af0aeef5777373692b.jpg', ' ', 'c', 'c', '2024-06-04 17:03:52'),
(250, 'TSUC562266F20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500966_93c587d09e85c3b472f2.jpg', ' ', 'c', 'c', '2024-06-04 17:06:06'),
(248, 'TSUB2ECB1F120240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500783_8d7b941aee7c4f1e6b0b.jpg', ' ', 'c', 'c', '2024-06-04 17:03:02'),
(245, 'TSU3C98209720240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2002-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500608_9a1ddc2bd1759411909b.jpeg', ' ', 'a', 'c', '2024-06-04 17:00:08'),
(246, 'TSUA42E15E420240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2003-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500716_d98bf1182322c1693e1a.jpg', ' ', 'c', 'c', '2024-06-04 17:01:56'),
(247, 'TSUEF9D27AF20240604', 'CLSB19FFCD820240518', 'BRNCH60FE55B520240518', 'QST87F59C9120240601', 'subhankar@gmail.com', 'Subhankar Sharma', '09679377775', '2003-01-15', 'Tarakeswar, bajitpur, hospital road', '1717500718_e18fa47455e0b7e5743a.jpg', ' ', 'c', 'c', '2024-06-04 17:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `unsigned_user_result`
--

CREATE TABLE `unsigned_user_result` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `admit_data_id` varchar(255) NOT NULL,
  `total_marks` longtext NOT NULL,
  `questions` text NOT NULL,
  `answer` text NOT NULL,
  `right_ans` text NOT NULL,
  `marks` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unsigned_user_result`
--

INSERT INTO `unsigned_user_result` (`id`, `uid`, `admit_data_id`, `total_marks`, `questions`, `answer`, `right_ans`, `marks`, `created_at`, `updated_at`) VALUES
(2, 'UNUSREEF35B29120240612', 'SUD90613E7820240611', '20', '[\"aaaaaaaa\",\"bbbbbbbb\"]', '[\"aaaaaaaa\",\"ccccccccc\"]', '[\"aaaaaaa\",\"bbbbbbbb\"]', '[\"5\",\"0\"]', '2024-06-12 18:09:02', '2024-06-12 18:09:02'),
(3, 'UNUSRE92CD675E20240618', 'SUD07812C9F20240618', '100', '[\n    \"What is your favorite color?\",\n    \"Where did you grow up?\",\n    \"What is your dream job?\",\n    \"What is your favorite book?\",\n    \"Do you have any pets?\",\n    \"What was your favorite subject in School?\",\n    \"What is your favorite hobby?\",\n    \"What is the best movie you\'ve ever seen?\",\n    \"What is your favorite food?\",\n    \"Where is your favorite place to travel?\",\n    \"What is your favorite season?\",\n    \"What is your favorite sports team?\",\n    \"What is your favorite TV show?\",\n    \"What is your favorite type of music?\",\n    \"Who is your role model?\",\n    \"What is your favorite holiday?\",\n    \"Do you prefer cats or dogs?\",\n    \"What is your favorite dessert?\",\n    \"What is your favorite way to relax?\",\n    \"What is your favorite memory?\",\n    \"What is your favorite thing to do on the weekend?\",\n    \"What is your biggest fear?\",\n    \"What is your favorite game?\",\n    \"What is your favorite app?\",\n    \"What is your favorite social media platform?\",\n    \"What is your favorite drink?\",\n    \"What is your favorite restaurant?\",\n    \"What is your favorite car?\",\n    \"What is your dream vacation?\",\n    \"What is your favorite outdoor activity?\",\n    \"What is your favorite indoor activity?\",\n    \"What is your favorite animal?\",\n    \"What is your favorite superhero?\",\n    \"What is your favorite board game?\",\n    \"What is your favorite video game?\",\n    \"What is your favorite song?\",\n    \"What is your favorite band?\",\n    \"What is your favorite phone brand?\",\n    \"What is your favorite computer brand?\",\n    \"What is your favorite clothing brand?\",\n    \"What is your favorite type of shoe?\",\n    \"What is your favorite type of weather?\",\n    \"What is your favorite flower?\",\n    \"What is your favorite tree?\",\n    \"What is your favorite city?\",\n    \"What is your favorite state?\",\n    \"What is your favorite country?\",\n    \"What is your favorite language?\",\n    \"What is your favorite subject to learn about?\",\n    \"What is your favorite podcast?\"\n  ]', '[\n    \"What is your favorite color?\",\n    \"Where did you grow up?\",\n    \"What is your dream job?\",\n    \"What is your favorite book?\",\n    \"Do you have any pets?\",\n    \"What was your favorite subject in School?\",\n    \"What is your favorite hobby?\",\n    \"What is the best movie you\'ve ever seen?\",\n    \"What is your favorite food?\",\n    \"Where is your favorite place to travel?\",\n    \"What is your favorite season?\",\n    \"What is your favorite sports team?\",\n    \"What is your favorite TV show?\",\n    \"What is your favorite type of music?\",\n    \"Who is your role model?\",\n    \"What is your favorite holiday?\",\n    \"Do you prefer cats or dogs?\",\n    \"What is your favorite dessert?\",\n    \"What is your favorite way to relax?\",\n    \"What is your favorite memory?\",\n    \"What is your favorite thing to do on the weekend?\",\n    \"What is your biggest fear?\",\n    \"What is your favorite game?\",\n    \"What is your favorite app?\",\n    \"What is your favorite social media platform?\",\n    \"What is your favorite drink?\",\n    \"What is your favorite restaurant?\",\n    \"What is your favorite car?\",\n    \"What is your dream vacation?\",\n    \"What is your favorite outdoor activity?\",\n    \"What is your favorite indoor activity?\",\n    \"What is your favorite animal?\",\n    \"What is your favorite superhero?\",\n    \"What is your favorite board game?\",\n    \"What is your favorite video game?\",\n    \"What is your favorite song?\",\n    \"What is your favorite band?\",\n    \"What is your favorite phone brand?\",\n    \"What is your favorite computer brand?\",\n    \"What is your favorite clothing brand?\",\n    \"What is your favorite type of shoe?\",\n    \"What is your favorite type of weather?\",\n    \"What is your favorite flower?\",\n    \"What is your favorite tree?\",\n    \"What is your favorite city?\",\n    \"What is your favorite state?\",\n    \"What is your favorite country?\",\n    \"What is your favorite language?\",\n    \"What is your favorite subject to learn about?\",\n    \"What is your favorite podcast?\"\n  ]', '[\n    \"What is your favorite color?\",\n    \"Where did you grow up?\",\n    \"What is your dream job?\",\n    \"What is your favorite book?\",\n    \"Do you have any pets?\",\n    \"What was your favorite subject in School?\",\n    \"What is your favorite hobby?\",\n    \"What is the best movie you\'ve ever seen?\",\n    \"What is your favorite food?\",\n    \"Where is your favorite place to travel?\",\n    \"What is your favorite season?\",\n    \"What is your favorite sports team?\",\n    \"What is your favorite TV show?\",\n    \"What is your favorite type of music?\",\n    \"Who is your role model?\",\n    \"What is your favorite holiday?\",\n    \"Do you prefer cats or dogs?\",\n    \"What is your favorite dessert?\",\n    \"What is your favorite way to relax?\",\n    \"What is your favorite memory?\",\n    \"What is your favorite thing to do on the weekend?\",\n    \"What is your biggest fear?\",\n    \"What is your favorite game?\",\n    \"What is your favorite app?\",\n    \"What is your favorite social media platform?\",\n    \"What is your favorite drink?\",\n    \"What is your favorite restaurant?\",\n    \"What is your favorite car?\",\n    \"What is your dream vacation?\",\n    \"What is your favorite outdoor activity?\",\n    \"What is your favorite indoor activity?\",\n    \"What is your favorite animal?\",\n    \"What is your favorite superhero?\",\n    \"What is your favorite board game?\",\n    \"What is your favorite video game?\",\n    \"What is your favorite song?\",\n    \"What is your favorite band?\",\n    \"What is your favorite phone brand?\",\n    \"What is your favorite computer brand?\",\n    \"What is your favorite clothing brand?\",\n    \"What is your favorite type of shoe?\",\n    \"What is your favorite type of weather?\",\n    \"What is your favorite flower?\",\n    \"What is your favorite tree?\",\n    \"What is your favorite city?\",\n    \"What is your favorite state?\",\n    \"What is your favorite country?\",\n    \"What is your favorite language?\",\n    \"What is your favorite subject to learn about?\",\n    \"What is your favorite podcast?\"\n  ]', '[\n    \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\",\n    \"11\", \"12\", \"13\", \"14\", \"15\", \"16\", \"17\", \"18\", \"19\", \"20\",\n    \"21\", \"22\", \"23\", \"24\", \"25\", \"26\", \"27\", \"28\", \"29\", \"30\",\n    \"31\", \"32\", \"33\", \"34\", \"35\", \"36\", \"37\", \"38\", \"39\", \"40\",\n    \"41\", \"42\", \"43\", \"44\", \"45\", \"46\", \"47\", \"48\", \"49\", \"50\"\n  ]', '2024-06-18 20:18:05', '2024-06-18 20:18:05'),
(4, 'UNUSRE673002D320240620', 'SUD21A96BE020240619', '20', '[\"khbk\",\"kjhk\"]', '[\"kgvkv\",\"jhjhg\"]', '[\"gvhg\",\"kuhk\"]', '[\"5\",\"5\"]', '2024-06-20 18:30:14', '2024-06-20 18:30:14'),
(5, 'UNUSRE0250DBC820240711', 'SUD96AD340820240619', '40', '[\"1.\",\"2.\",\"3.\",\"4.\",\"5.\",\"6.\",\"7.\",\"8.\",\"9.\",\"10.\"]', '[\"(b)\",\"(a)\",\"(c)\",\"(a)\",\"(a)\",\"(a)\",\"(b)\",\"(d)\",\"(b)\",\"(d)\"]', '[\"(d)\",\"(a)\",\"(c)\",\"(b)\",\"(c)\",\"(a)\",\"(d)\",\"(a)\",\"(b)\",\"(d)\"]', '[\"-1\",\"4\",\"4\",\"-1\",\"-1\",\"4\",\"-1\",\"-1\",\"4\",\"4\"]', '2024-07-11 15:05:20', '2024-07-11 15:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `user_name`, `email`, `number`, `password`, `status`, `type`, `created_at`, `updated_at`) VALUES
(37, 'USR028953HJ0240410', 'Admin', 'admin@gmail.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'admin', '2024-04-10 13:33:07', '2024-04-10 13:33:07'),
(83, 'USR3891CB9420240611', 'rohan', 'skrohan0420@gmail.com', '6290353314', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2024-06-11 17:52:06', '2024-06-11 17:52:06'),
(39, 'USR343478YUER34F', 'Seller1', 'skrohan0420@gmail.com', '6290353316', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'seller', '2024-04-21 18:57:51', '2024-04-21 18:57:51'),
(58, 'USRDDB9FCC420240502', 'Subhankar Sharma', 'subhankarsharma02@gmail.com', '9679377775', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'seller', '2024-05-02 12:47:22', '2024-05-02 12:47:22'),
(55, 'USRBC44E49F20240501', 'arijit', 'ari@gmail.com', '9123325003', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'seller', '2024-05-01 13:45:51', '2024-05-01 13:45:51'),
(77, 'USRAC08079F20240611', 'Rohit Das', 'rohit@gmail.com', '4589612456', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2024-06-11 12:00:42', '2024-06-11 12:00:42'),
(81, 'USR2B2D03A020240611', 'Subhankar Sharma', 'sharmatinku14178@gmail.com', '9382861771', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2024-06-11 16:33:26', '2024-06-11 16:33:26'),
(84, 'USR0A59828F20240612', 'a', 'arijitmondal0024@gmail.com', '9123325003', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2024-06-12 15:25:25', '2024-06-12 15:25:25'),
(839, 'USRCF0284F520240822', 'Manish Raut Sir', 'Teacher9@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:06:17', '2024-08-22 23:06:17'),
(838, 'USRD6E5CDBE20240822', 'Anish Sir', 'Teacher8@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:05:53', '2024-08-22 23:05:53'),
(837, 'USR9109805820240822', 'Mohit sir', 'Teacher7@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:05:14', '2024-08-22 23:05:14'),
(836, 'USR38AED3EF20240822', 'Sheth Sir', 'Teacher6@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:04:44', '2024-08-22 23:04:44'),
(835, 'USRDCB4F3A920240822', 'Srabani Madam', 'Teacher5@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:04:16', '2024-08-22 23:04:16'),
(834, 'USR8D1D6CFF20240822', 'Anil Sir', 'Teacher4@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:03:45', '2024-08-22 23:03:45'),
(833, 'USRF94EAA0F20240822', 'Manish Sir', 'Teacher3@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:03:15', '2024-08-22 23:03:15'),
(832, 'USR9130D34620240822', 'Sagar Sir', 'Teacher2@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 23:01:11', '2024-08-22 23:01:11'),
(831, 'USR7863D07020240822', 'Satyapal Sir', 'Teacher@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'staff', '2024-08-22 22:46:47', '2024-08-22 22:46:47'),
(845, 'USR7357BC2820240916', 'Viraj Patil', '240555@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-09-16 15:45:12', '2024-09-16 15:45:12'),
(844, 'USRF0CB94BE20240916', 'Omkar.C', '240501@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'inactive', 'student', '2024-09-16 15:44:20', '2024-09-16 15:44:20'),
(846, 'USR885D900920240916', 'Omkar.C', '240501@flora.com', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-09-16 15:36:50', '2024-09-16 15:36:50'),
(847, 'USR78048AD920240917', 'Vishwajeet K', '240537@flora', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-09-17 15:06:53', '2024-09-17 15:06:53'),
(848, 'USRAA94630820240919', 'SCHOOL', 'school2024', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-09-19 13:27:56', '2024-09-19 13:27:56'),
(849, 'USR974A8DEC20241021', 'Shravani Shinde', '240543@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 12:14:05', '2024-10-21 12:14:05'),
(850, 'USR8A6A349120241021', 'Sakshi.C', '240531@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 12:15:45', '2024-10-21 12:15:45'),
(851, 'USRA2A12C4620241021', 'Sara Nadaf', '240538@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 12:17:51', '2024-10-21 12:17:51'),
(852, 'USR061BCD0020241021', 'Shrutika Umbarkar', '240533@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 12:18:49', '2024-10-21 12:18:49'),
(853, 'USR0F3896B120241021', 'Mrunal Konde', '240536@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 12:19:56', '2024-10-21 12:19:56'),
(854, 'USR50875FD020241021', 'Ashutosh Pol', '240530@FLORA', '7045782996', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-21 14:34:37', '2024-10-21 14:34:37'),
(855, 'USREB2B605F20241030', 'arijit', 'user@gmail.com', '(+91) 9123325003', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'student', '2024-10-30 17:44:58', '2024-10-30 17:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `variation_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `uid`, `user_id`, `product_id`, `variation_id`, `qty`, `created_at`, `updated_at`) VALUES
(275, 'CRTAAA7773620240622', 'USR5BD560AC20240510', 'PROBAE0BED720240622', 'VAR00001', '1', '2024-06-23 00:51:00', '2024-06-23 00:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_img`
--

CREATE TABLE `user_img` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_img`
--

INSERT INTO `user_img` (`id`, `uid`, `user_id`, `img`, `created_at`, `updated_at`) VALUES
(4, 'UIMG5CF41F0620240323', 'USR0AA36B1D20240318', '1711708411_9771ada99d7b80bd0fdb.jpg', '2024-03-29 10:33:34', '2024-03-23 18:12:06'),
(5, 'UIMG9AAAA30E20240326', 'USRD60744C120240326', '1711436670_d2b414200e6e0a1d51b3.jpeg', '2024-03-26 07:04:30', '2024-03-26 04:51:31'),
(6, 'UIMGB71C620920240416', 'USR02AC942420240410', '1714000863_d750261e14b7386197ad.jpeg', '2024-04-24 23:21:03', '2024-04-16 12:41:37'),
(7, 'UIMG59A8BE9720240424', 'USR03CB470120240424', '1714001169_bbb8576a6825d7f69ebe.jpeg', '2024-04-24 23:26:09', '2024-04-24 23:26:09'),
(8, 'UIMGADF66F1920240510', 'USR5BD560AC20240510', '1716305854_594bc43633159670fc70.webp', '2024-05-21 15:37:33', '2024-05-10 14:02:15'),
(9, 'UIMGC11F96DF20240510', 'USRADE0618120240510', '1715350316_e37fc69a6a03b0f24797.webp', '2024-05-10 14:12:03', '2024-05-10 14:12:03'),
(10, 'UIMGEBA1D45C20240512', 'USRCF2BC10720240512', '1715512732_a09e75b06084132e734e.webp', '2024-05-12 11:18:55', '2024-05-12 11:18:55'),
(11, 'UIMG314C796B20240512', 'USRB0F15BAD20240512', '1715513322_1cf5e9af7729e775abcc.webp', '2024-05-12 11:28:45', '2024-05-12 11:28:45'),
(12, 'UIMG57E3FE6420240512', 'USR7D76D8F120240512', '1715521799_1841a031a78b52b3747e.webp', '2024-05-12 13:49:58', '2024-05-12 11:37:02'),
(13, 'UIMGB72543B820240513', 'USR6AAFB06C20240513', '1715580763_55e55f8adc173a9360ed.webp', '2024-05-13 06:12:44', '2024-05-13 06:12:44'),
(14, 'UIMG32B3811320240513', 'USRBC4BB2D720240513', '1718725422_8559b663b2028157efec.png', '2024-06-18 15:43:42', '2024-05-13 06:53:54'),
(15, 'UIMG36D5658E20240515', 'USR8762EAEF20240515', '1715780379_47138b6beeac389f67fd.webp', '2024-05-15 13:39:41', '2024-05-15 13:39:41'),
(16, 'UIMG02F755E420240530', 'USR28F249E120240530', '1717054172_914f8dba39dbc003d53e.webp', '2024-05-30 07:29:33', '2024-05-30 07:29:33'),
(17, 'UIMG411C44FD20240618', 'USRAFD6EF9520240618', '1718717894_eb70475f6c201c5ed4a3.webp', '2024-06-18 13:38:22', '2024-06-18 13:38:22'),
(18, 'UIMG83EE3E6F20240618', 'USRE99EC30D20240618', '1718718227_876de01ceef9b64e13ba.webp', '2024-06-18 13:43:55', '2024-06-18 13:43:55'),
(19, 'UIMG544A67C020240618', 'USR4D3C2D2620240618', '1718718580_82bf0d5bac830ee1e9e7.webp', '2024-06-18 13:49:48', '2024-06-18 13:49:48'),
(20, 'UIMG9F6E57D220240618', 'USRE6FE35A320240618', '1718719058_d858bbd573208c0a1e4a.webp', '2024-06-18 13:57:46', '2024-06-18 13:57:46'),
(21, 'UIMGC051228D20240618', 'USR5079B47F20240618', '1718719366_89b276d87e891e7b1676.webp', '2024-06-18 14:02:54', '2024-06-18 14:02:54'),
(22, 'UIMGD36DA1AF20240618', 'USR7C541DE920240618', '1718719683_5f9b32f9a9ea8ca8eed8.jpg', '2024-06-18 14:08:03', '2024-06-18 14:08:03'),
(23, 'UIMG0BE0753520240622', 'USRF42CBAE720240622', '1719075540_b1dd4e1905fdd2fb8c95.png', '2024-06-22 16:59:01', '2024-06-22 08:17:31'),
(24, 'UIMG368C333F20240622', 'USRD677D50120240622', '1719075574_7cf0df026d5bd8e67b7e.jpg', '2024-06-22 16:59:35', '2024-06-22 16:59:35'),
(25, 'UIMG71603FC820240810', 'USRB019C94E20240810', '1723286652_e7a5f625cc80634e6c4b.png', '2024-08-10 10:44:14', '2024-08-10 10:44:14'),
(26, 'UIMG584BEDAC20240812', 'USR42B7628220240812', '1723450081_c5a4ff35391dcbfde728.jpg', '2024-08-12 08:08:01', '2024-08-12 08:08:01'),
(27, 'UIMG081C220720240816', 'USR2DBC35AF20240816', '1723816482_c585330fe8caff18a1e9.gif', '2024-08-16 13:54:44', '2024-08-16 13:54:44'),
(28, 'UIMGDF0EB49520240819', 'USRACDBB68220240819', '1724065071_67228e866a0bec6da7f8.png', '2024-08-19 10:57:51', '2024-08-19 10:57:51'),
(29, 'UIMGD8890C4D20240820', 'USR7550762920240820', '1724171967_22c00c016139c01d7b38.png', '2024-08-20 16:39:27', '2024-08-20 16:39:27'),
(30, 'UIMGC6E262B520240820', 'USRC8CD5AD920240820', '1724172162_ba9eebec01508197f222.png', '2024-08-20 16:42:42', '2024-08-20 16:42:42'),
(31, 'UIMG946F44CA20240822', 'USR7863D07020240822', '1726317226_5e1772466903be46cd7c.gif', '2024-09-14 12:33:46', '2024-08-22 17:16:47'),
(32, 'UIMG37F867C020240822', 'USR9130D34620240822', '1726317200_c9aa639adde6f51a365e.gif', '2024-09-14 12:33:20', '2024-08-22 17:31:11'),
(33, 'UIMGA852D01220240822', 'USRF94EAA0F20240822', '1726317175_2c3f93887af32461d0a3.gif', '2024-09-14 12:32:55', '2024-08-22 17:33:15'),
(34, 'UIMG111CC34120240822', 'USR8D1D6CFF20240822', '1726316986_d8562b82b292716171eb.gif', '2024-09-14 12:29:46', '2024-08-22 17:33:45'),
(35, 'UIMGE6336D0220240822', 'USRDCB4F3A920240822', '1726317262_8b36d4f63fd3d689076c.gif', '2024-09-14 12:34:22', '2024-08-22 17:34:16'),
(36, 'UIMG672CF43420240822', 'USR38AED3EF20240822', '1726317239_8f7a755757d2f6d7c743.gif', '2024-09-14 12:33:59', '2024-08-22 17:34:44'),
(37, 'UIMG64BB520720240822', 'USR9109805820240822', '1726317187_4f4f57d6b55dc28cc65d.gif', '2024-09-14 12:33:07', '2024-08-22 17:35:14'),
(38, 'UIMG5AB8A13B20240822', 'USRD6E5CDBE20240822', '1726317148_704573845d1fd674e874.gif', '2024-09-14 12:32:28', '2024-08-22 17:35:53'),
(39, 'UIMGE9BE180C20240822', 'USRCF0284F520240822', '1726317162_6e99ffc686a6757b13d6.gif', '2024-09-14 12:32:42', '2024-08-22 17:36:17'),
(40, 'UIMG7654B1AD20240914', 'USR472F55EA20240914', '1726318317_d30cbcbd6f934b7bb504.gif', '2024-09-14 12:51:57', '2024-09-14 12:51:57'),
(41, 'UIMG2C7082B720240916', 'USRF8AC14E620240916', '1726480044_3f32051a25a213741183.gif', '2024-09-16 09:47:24', '2024-09-16 09:47:24'),
(42, 'UIMG4AFAF37520240916', 'USRA790CAA020240916', '1726480471_62cf96824283eeeb47de.png', '2024-09-16 09:54:31', '2024-09-16 09:54:31'),
(43, 'UIMGE74C631D20240916', 'USRC7148EE320240916', '1726481400_d3cdb9bec875b2b668eb.webp', '2024-09-16 10:10:00', '2024-09-16 10:10:00'),
(44, 'UIMGE068229A20240916', 'USRF0CB94BE20240916', '1726481660_64a4abb9a31b659ffaaf.webp', '2024-09-16 10:14:20', '2024-09-16 10:14:20'),
(45, 'UIMGD2ED847620240916', 'USR7357BC2820240916', '1726481712_2b0569dfa642f98b5e64.webp', '2024-09-16 10:15:12', '2024-09-16 10:15:12'),
(46, 'UIMG445F89EC20240916', 'USR885D900920240916', '1726501010_82cb4850b1c4dc46599a.gif', '2024-09-16 15:36:50', '2024-09-16 15:36:50'),
(47, 'UIMG1317C5AC20240917', 'USR78048AD920240917', '1726585613_4a7fbb75aee1c5649993.gif', '2024-09-17 15:06:53', '2024-09-17 15:06:53'),
(48, 'UIMG521390BF20240919', 'USRAA94630820240919', '1726752476_73d72ec136fa57f9851e.gif', '2024-09-19 13:27:56', '2024-09-19 13:27:56'),
(49, 'UIMG3B92EFC420241021', 'USR974A8DEC20241021', '1729512845_c710031809c31ff7558d.gif', '2024-10-21 12:14:05', '2024-10-21 12:14:05'),
(50, 'UIMG8C8DFB2520241021', 'USR8A6A349120241021', '1729512945_799867354c25fa3e070d.gif', '2024-10-21 12:15:45', '2024-10-21 12:15:45'),
(51, 'UIMGA759756B20241021', 'USRA2A12C4620241021', '1729513071_e30ef83e21186e888539.gif', '2024-10-21 12:17:51', '2024-10-21 12:17:51'),
(52, 'UIMGDC464F5A20241021', 'USR061BCD0020241021', '1729513129_fc92e4c7abfc8f5805fc.gif', '2024-10-21 12:18:49', '2024-10-21 12:18:49'),
(53, 'UIMGFC145D3A20241021', 'USR0F3896B120241021', '1729513196_50f584b41b1cbfec23eb.gif', '2024-10-21 12:19:56', '2024-10-21 12:19:56'),
(54, 'UIMGB5F3DC8720241021', 'USR50875FD020241021', '1729521277_d1fffacafc2088b06157.gif', '2024-10-21 14:34:37', '2024-10-21 14:34:37'),
(55, 'UIMGC506A06D20241030', 'USREB2B605F20241030', '1730310298_d3e8cb33754012630d42.jpg', '2024-10-30 17:44:58', '2024-10-30 17:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`id`, `uid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VAR3467GHJ678YU', 'size', '2024-03-19 18:45:40', '2024-03-19 18:45:40'),
(2, 'VAR678TYU678TYU', 'color', '2024-03-19 18:45:40', '2024-03-19 18:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `variation_images`
--

CREATE TABLE `variation_images` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `config_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'path',
  `src` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variation_images`
--

INSERT INTO `variation_images` (`id`, `uid`, `config_id`, `type`, `src`, `created_at`, `updated_at`) VALUES
(24, 'VRI53BE824820240501', 'PCON66169E0C20240501', 'path', '1714545693_c5f87917140b34b24fb9.png', '2024-05-01 12:11:34', '2024-05-01 12:11:34'),
(23, 'VRI1700AF3320240426', 'PCONCEA3792020240426', 'path', '1714134609_695b90132d2ffaefd6db.jpg', '2024-04-26 18:00:09', '2024-04-26 18:00:09'),
(22, 'VRIE588847820240426', 'PCONCEA3792020240426', 'path', '1714134609_609ee5e04467ada4fbc0.jpg', '2024-04-26 18:00:09', '2024-04-26 18:00:09'),
(21, 'VRI23C16E9920240413', 'PCONCA37EEFD20240413', 'path', '1713023752_7c98366fffa7ca820eab.png', '2024-04-13 21:25:52', '2024-04-13 21:25:52'),
(20, 'VRI8927193920240413', 'PCON67DCF92120240413', 'path', '1713023738_f7bc8e081e3226bd225d.png', '2024-04-13 21:25:38', '2024-04-13 21:25:38'),
(19, 'VRI55DCCB1020240405', 'PCON6912636E20240405', 'path', '1712297885_066235db1fb14198d486.png', '2024-04-05 11:48:06', '2024-04-05 11:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

CREATE TABLE `variation_option` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `variation_id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variation_option`
--

INSERT INTO `variation_option` (`id`, `uid`, `variation_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'VRO789TYU678TYU', 'VAR3467GHJ678YU', 'xs', '2024-03-19 18:55:30', '2024-03-19 18:55:30'),
(2, 'VRO7789TYU5667', 'VAR3467GHJ678YU', 's', '2024-03-19 18:55:30', '2024-03-19 18:55:30'),
(3, 'VRO789TYU678TY', 'VAR3467GHJ678YU', 'm', '2024-03-19 18:56:20', '2024-03-19 18:56:20'),
(4, 'VRO90YUJK785634', 'VAR3467GHJ678YU', 'l', '2024-03-19 18:56:20', '2024-03-19 18:56:20'),
(5, 'VRO890567YUIHJK', 'VAR3467GHJ678YU', 'xl', '2024-03-19 18:57:38', '2024-03-19 18:57:38'),
(6, 'VRO9078TYUGHJBN', 'VAR3467GHJ678YU', 'xxl', '2024-03-19 18:57:38', '2024-03-19 18:57:38'),
(7, 'VROF4FB46EF20240320', 'VAR678TYU678TYU', '#83b21f', '2024-03-20 16:49:22', '2024-03-20 16:49:22'),
(8, 'VROF83C478120240320', 'VAR678TYU678TYU', '#83b21f', '2024-03-20 16:56:28', '2024-03-20 16:56:28'),
(9, 'VRO28F84A8720240320', 'VAR678TYU678TYU', '#83b21f', '2024-03-20 17:05:05', '2024-03-20 17:05:05'),
(10, 'VRO20D0694720240320', 'VAR678TYU678TYU', '#364574', '2024-03-20 17:08:33', '2024-03-20 17:08:33'),
(11, 'VRO53FFEEC820240320', 'VAR678TYU678TYU', '#253a79', '2024-03-20 19:02:46', '2024-03-20 19:02:46'),
(12, 'VRO63443ECB20240320', 'VAR678TYU678TYU', '#07216e', '2024-03-20 19:49:04', '2024-03-20 19:49:04'),
(13, 'VRO89F7696B20240320', 'VAR678TYU678TYU', '#000000', '2024-03-20 19:49:48', '2024-03-20 19:49:48'),
(14, 'VRO1B605F5920240321', 'VAR678TYU678TYU', '#ae1919', '2024-03-21 19:00:40', '2024-03-21 19:00:40'),
(15, 'VROD4F4B42F20240323', 'VAR678TYU678TYU', '#06102d', '2024-03-23 18:47:41', '2024-03-23 18:47:41'),
(16, 'VRO62ED329F20240323', 'VAR678TYU678TYU', '#c800ff', '2024-03-23 18:56:03', '2024-03-23 18:56:03'),
(17, 'VRO3E6BD02A20240405', 'VAR678TYU678TYU', '#04d77c', '2024-04-05 11:48:06', '2024-04-05 11:48:06'),
(18, 'VRO2E259E3020240413', 'VAR678TYU678TYU', '#364574', '2024-04-13 21:25:38', '2024-04-13 21:25:38'),
(19, 'VRO5B8D990D20240413', 'VAR678TYU678TYU', '#364574', '2024-04-13 21:25:52', '2024-04-13 21:25:52'),
(20, 'VROAC45AD7820240426', 'VAR678TYU678TYU', '#1a47cb', '2024-04-26 18:00:09', '2024-04-26 18:00:09'),
(21, 'VROD6B44E1420240501', 'VAR678TYU678TYU', '#364574', '2024-05-01 12:11:34', '2024-05-01 12:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `signature_img` varchar(255) DEFAULT NULL,
  `pan_img` varchar(255) DEFAULT NULL,
  `aadhar_img` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `uid`, `user_id`, `user_img`, `signature_img`, `pan_img`, `aadhar_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VEN9056TYUI453228', 'USR028953HJ0240410', '1714649407_05e5ec07b8013e6d209f.webp', '1714649407_b51c501eefa4b1d6407b.webp', '1714649407_f2fefb07f34ffc7ab08c.jpg', '1714649407_ddf051a9d9928178be7b.jpg', 'active', '2024-03-12 22:17:18', '2024-03-12 22:17:18'),
(2, 'VEN8956YUIHJHUJ', 'USR343478YUER34F', '1714648953_b01f2a376d8f1883ba48.jpg', '1714648953_e8d8cabdeb9593703466.webp', '1714648953_94acaa4ee304ff9fc2e7.webp', '1714648953_edf1728b826465ae6ccc.png', 'active', '2024-04-21 19:05:29', '2024-04-21 19:05:29'),
(14, 'VEN0421BEED20240501', 'USRBC44E49F20240501', '1714649372_4a28673ad9d140c45f5f.webp', '1714649372_06eaef457b247e95e99c.webp', '1714649372_a14d2d2ff1b392dbd268.jpg', '1714649372_2927e50308e6c6492524.png', 'active', '2024-05-01 13:45:51', '2024-05-01 13:45:51'),
(17, 'VEN507B578C20240502', 'USRDDB9FCC420240502', '1714653138_b4fd3ed1b86256ba2b76.jpg', '1714634242_644f3c7fd300edd95b5e.png', '1714634242_be69766716aeea6a38c4.webp', '1714634242_e3cc8d58966f572537ce.jpg', 'active', '2024-05-02 12:47:22', '2024-05-02 12:47:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admit_form`
--
ALTER TABLE `admit_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_notes`
--
ALTER TABLE `important_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_class`
--
ALTER TABLE `live_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_cancelled`
--
ALTER TABLE `orders_cancelled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_return`
--
ALTER TABLE `orders_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_paper`
--
ALTER TABLE `popular_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_config`
--
ALTER TABLE `product_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_meta_detalis`
--
ALTER TABLE `product_meta_detalis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_card`
--
ALTER TABLE `promotion_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_access`
--
ALTER TABLE `staff_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class_roll`
--
ALTER TABLE `student_class_roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_doubt`
--
ALTER TABLE `student_doubt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_admit_data`
--
ALTER TABLE `submit_admit_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_submission`
--
ALTER TABLE `test_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_submission_anonymous`
--
ALTER TABLE `test_submission_anonymous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unsigned_user_result`
--
ALTER TABLE `unsigned_user_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_img`
--
ALTER TABLE `user_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_images`
--
ALTER TABLE `variation_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admit_form`
--
ALTER TABLE `admit_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `important_notes`
--
ALTER TABLE `important_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live_class`
--
ALTER TABLE `live_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders_cancelled`
--
ALTER TABLE `orders_cancelled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_return`
--
ALTER TABLE `orders_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `popular_paper`
--
ALTER TABLE `popular_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_config`
--
ALTER TABLE `product_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product_meta_detalis`
--
ALTER TABLE `product_meta_detalis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `promotion_card`
--
ALTER TABLE `promotion_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staff_access`
--
ALTER TABLE `staff_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_class_roll`
--
ALTER TABLE `student_class_roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_doubt`
--
ALTER TABLE `student_doubt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `submit_admit_data`
--
ALTER TABLE `submit_admit_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=729;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `test_submission`
--
ALTER TABLE `test_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `test_submission_anonymous`
--
ALTER TABLE `test_submission_anonymous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `unsigned_user_result`
--
ALTER TABLE `unsigned_user_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=856;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `user_img`
--
ALTER TABLE `user_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variation_images`
--
ALTER TABLE `variation_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `variation_option`
--
ALTER TABLE `variation_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
