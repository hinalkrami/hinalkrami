-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 04:00 PM
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
-- Database: `greenheaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `pro_id` int(6) NOT NULL,
  `pro_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `user_id`, `pro_id`, `pro_price`) VALUES
(1, 4, 35, 430.00),
(14, 4, 36, 300.00),
(16, 0, 35, 430.00),
(17, 4, 37, 399.00),
(18, 0, 36, 300.00),
(19, 0, 43, 30.00),
(20, 13, 35, 430.00),
(21, 13, 36, 300.00),
(22, 13, 37, 399.00),
(23, 13, 39, 300.00),
(24, 17, 35, 430.00),
(26, 17, 37, 399.00),
(27, 17, 39, 300.00),
(28, 17, 55, 299.00),
(31, 25, 35, 430.00),
(32, 25, 36, 300.00),
(35, 27, 40, 329.00),
(36, 27, 49, 250.00),
(37, 27, 41, 999.00),
(38, 27, 39, 300.00),
(43, 33, 35, 430.00),
(45, 28, 36, 300.00),
(47, 25, 37, 399.00),
(48, 28, 38, 400.00),
(49, 28, 35, 430.00),
(50, 28, 47, 200.00),
(51, 28, 40, 329.00),
(52, 17, 41, 999.00),
(53, 17, 36, 300.00),
(54, 17, 40, 329.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
