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
-- Table structure for table `tbl_producthomepage`
--

CREATE TABLE `tbl_producthomepage` (
  `ph_id` int(11) NOT NULL,
  `ph_name` varchar(50) NOT NULL,
  `ph_photo_path` varchar(100) NOT NULL,
  `ph_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_producthomepage`
--

INSERT INTO `tbl_producthomepage` (`ph_id`, `ph_name`, `ph_photo_path`, `ph_price`) VALUES
(1, 'Peperomia argyreia Plant', 'product-38.png', 270.00),
(2, 'Bird\'s-nest fern Plant', 'product-41.png', 999.00),
(3, 'Strelitzia nicolai Plant', 'product-39.png', 499.00),
(4, 'Hardy banana Plant', 'product-40.png', 1000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_producthomepage`
--
ALTER TABLE `tbl_producthomepage`
  ADD PRIMARY KEY (`ph_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_producthomepage`
--
ALTER TABLE `tbl_producthomepage`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
