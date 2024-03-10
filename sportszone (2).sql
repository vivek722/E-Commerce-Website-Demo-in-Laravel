-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2023 at 03:42 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportszone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `id`, `name`) VALUES
('vijay@gmail.com', '1234', 9, 'vijay');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proid` int NOT NULL,
  `userid` int NOT NULL,
  `qty` int NOT NULL,
  `close` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `proid`, `userid`, `qty`, `close`) VALUES
(9, 18, 9, 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `oderdet`
--

DROP TABLE IF EXISTS `oderdet`;
CREATE TABLE IF NOT EXISTS `oderdet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parid` int NOT NULL,
  `proid` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oderdet`
--

INSERT INTO `oderdet` (`id`, `parid`, `proid`, `qty`) VALUES
(1, 2, 10, 4),
(2, 2, 9, 3),
(3, 2, 8, 1),
(4, 2, 7, 4),
(5, 3, 9, 11),
(6, 4, 9, 2),
(7, 5, 10, 1),
(8, 5, 8, 1),
(9, 6, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordermast`
--

DROP TABLE IF EXISTS `ordermast`;
CREATE TABLE IF NOT EXISTS `ordermast` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `serial` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `addr1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `addr2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordermast`
--

INSERT INTO `ordermast` (`id`, `userid`, `serial`, `date`, `amount`, `status`, `addr1`, `addr2`, `city`, `state`) VALUES
(6, 9, '1', '2023-10-09', '60000', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `img` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `status`, `img`) VALUES
(12, 'bracelet', 120, 'Y', 'ed92eff813a02a31a2677be0563a07392431696820702.jpg'),
(13, 'mala', 450, 'Y', '1d665b9b1467944c128a5575119d1cfd8531696820783.jpg'),
(14, 'rudraksh', 300, 'Y', '7bc3ca68769437ce986455407dab2a1f2321696820809.jpg'),
(15, 'rudraksh small mala', 890, 'Y', '13207e3d5722030f6c97d69b4904d39d7531696820879.jpg'),
(16, 'rudraksh with gold', 68000, 'Y', 'c6c27fc98633c82571d75dcb5739bbdf8061696820910.jpg'),
(17, 'Tulsi berkho', 340, 'Y', '46d46a759bf6cbed05d7bcdcb911a4f89841696820984.jpg'),
(18, 'bracelet with gold', 30000, 'Y', 'ad304601e6638bf2bcdd5345c013a6c16921696821023.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(9, 'vijay', 'mokariya', 'vijay@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
