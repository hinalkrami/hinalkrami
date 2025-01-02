-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:58 PM
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
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(6) NOT NULL,
  `order_id` int(20) NOT NULL,
  `pro_qty` int(3) NOT NULL,
  `pro_price` decimal(6,2) NOT NULL,
  `pro_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `pro_qty`, `pro_price`, `pro_id`) VALUES
(1, 1, 2, 600.00, 39),
(2, 1, 1, 329.00, 40),
(3, 1, 1, 200.00, 47),
(7, 3, 1, 300.00, 36),
(8, 3, 4, 1200.00, 39),
(9, 3, 4, 1196.00, 55),
(12, 6, 1, 300.00, 39),
(13, 6, 2, 800.00, 38),
(14, 7, 1, 300.00, 36),
(15, 8, 3, 1497.00, 51),
(16, 8, 3, 1197.00, 37),
(17, 9, 2, 860.00, 35),
(18, 9, 1, 329.00, 40),
(19, 17, 3, 1197.00, 37),
(20, 18, 2, 798.00, 37),
(21, 18, 1, 299.00, 55),
(22, 18, 2, 1998.00, 41),
(23, 19, 4, 1600.00, 38),
(24, 19, 1, 430.00, 35),
(25, 19, 1, 300.00, 36),
(26, 19, 1, 200.00, 47),
(27, 19, 1, 999.00, 41),
(28, 19, 1, 329.00, 40),
(29, 20, 2, 800.00, 38),
(30, 21, 1, 430.00, 35),
(31, 21, 1, 300.00, 36),
(32, 22, 1, 300.00, 39),
(33, 22, 1, 350.00, 57),
(34, 23, 1, 300.00, 56),
(35, 23, 2, 600.00, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
