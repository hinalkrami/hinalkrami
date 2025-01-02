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
-- Table structure for table `tbl_ordermaster`
--

CREATE TABLE `tbl_ordermaster` (
  `order_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `payment_ammount` decimal(10,2) NOT NULL,
  `payment_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ordermaster`
--

INSERT INTO `tbl_ordermaster` (`order_id`, `user_id`, `order_date`, `order_status`, `payment_ammount`, `payment_mode`) VALUES
(1, 25, '05-04-2024', 'Confirm', 1129.00, 'Online'),
(3, 17, '05-04-2024', 'Confirm', 2696.00, 'Online'),
(6, 28, '08-04-2024', 'Confirm', 1100.00, 'Online'),
(7, 33, '09-04-2024', 'Confirm', 300.00, 'Online'),
(8, 17, '26-04-2024', 'Confirm', 2694.00, 'Online'),
(9, 28, '26-04-2024', 'Confirm', 1189.00, 'COD'),
(17, 25, '28-04-2024', 'Confirm', 1197.00, 'Online'),
(18, 25, '28-04-2024', 'Confirm', 3095.00, 'COD'),
(19, 28, '29-04-2024', 'Confirm', 3858.00, 'Online'),
(20, 17, '29-04-2024', 'Confirm', 800.00, 'COD'),
(21, 17, '29-04-2024', 'Confirm', 730.00, 'Online'),
(22, 17, '29-04-2024', 'Confirm', 650.00, 'COD'),
(23, 17, '29-04-2024', 'Confirm', 900.00, 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ordermaster`
--
ALTER TABLE `tbl_ordermaster`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ordermaster`
--
ALTER TABLE `tbl_ordermaster`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
