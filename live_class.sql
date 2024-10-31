-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 02:45 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `live_class`
--
ALTER TABLE `live_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `live_class`
--
ALTER TABLE `live_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
