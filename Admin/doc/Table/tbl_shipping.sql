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
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(30) NOT NULL,
  `shipping_mobile` int(50) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_mobile`, `shipping_address`, `user_id`) VALUES
(1, 'Hina Ramani', 2147483647, 'A-107,ShreeRam Residencynear Sangam Medical Store,Narol Ahmedabad', 25),
(2, 'Ram', 2147483647, 'near GST bridge  Asray 10.New RanipAhmedabad', 17),
(6, 'Daksh Patel', 2147483647, 'Vrundavan Society,A-2289,ShahpurAhmedabad', 28),
(7, 'Krunal patel', 2147483647, 'serdfjszeygdserdfAhmedabad', 33),
(8, 'Ram', 2147483647, 'New Ranip, near GST bridge ,Asray 10.', 17),
(12, 'Daksh Patel', 2147483647, '10, Vasantbaug society, Gulbai Tekra Rd, opp. IDBI Bank, Navrangpura, Ahmedabad, Gujarat 380006, Ind', 28),
(13, 'Daksh Patel', 2147483647, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad', 28),
(14, 'Daksh Patel', 2147483647, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad', 28),
(15, 'Daksh Patel', 2147483647, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad', 28),
(16, 'Daksh Patel', 2147483647, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad', 28),
(17, 'Hina Ramani', 2147483647, 'A-107,ShreeRam Residency,near Sangam Medical Store,Narol ,Ahmedabad', 25),
(18, 'Hina Ramani', 2147483647, 'A-107,ShreeRam Residency,near Sangam Medical Store,Narol ,Ahmedabad', 25),
(19, 'Daksh Patel', 2147483647, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad', 28),
(20, 'Ram', 2147483647, 'New Ranip, near GST bridge ,Asray 10.', 17),
(21, 'Ram', 2147483647, 'New Ranip, near GST bridge ,Asray 10.', 17),
(22, 'Ram', 2147483647, '121, Sunrise Complex, Mansi Circle, Judges Bunglow Road, Bodakdev, Ahmedabad, Gujarat 380015, India', 17),
(23, 'Ram', 2147483647, '121, Sunrise Complex, Mansi Circle, Judges Bunglow Road, Bodakdev, Ahmedabad, Gujarat 380015, India', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
