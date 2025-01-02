-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:59 PM
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
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `category_id` int(5) NOT NULL,
  `subc_id` int(5) NOT NULL,
  `subc_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`category_id`, `subc_id`, `subc_name`) VALUES
(12, 12, 'Fruit seeds'),
(10, 13, 'Indoor Plants'),
(10, 14, 'Low Light Plants'),
(10, 15, 'Hanging Plants'),
(10, 16, 'Air Purifying'),
(10, 17, 'Decorative Plants'),
(11, 18, 'Plastic Pots'),
(11, 19, 'Ceramic Pots'),
(11, 20, 'Metal Pots'),
(11, 21, 'Wooden Pots'),
(11, 22, 'Hanging Pots'),
(12, 23, 'Seeds kit'),
(12, 24, 'Flower seeds'),
(12, 25, 'Vegetable Seeds'),
(12, 26, 'Herb Seeds'),
(12, 27, 'Tree & Grass Seeds'),
(12, 28, 'Herb Seeds'),
(13, 29, 'Pebbles'),
(13, 31, 'Plant Stand'),
(10, 32, 'Fruit Plant'),
(13, 33, 'Plantation Jug'),
(11, 34, 'Fiber Pot'),
(13, 35, 'Plant Basket'),
(13, 36, 'Plant Supporter Meterial');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
