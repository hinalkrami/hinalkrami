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
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_contact` bigint(12) NOT NULL,
  `user_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_address`) VALUES
(17, 'Ram', 'ramgreenheaven01@gmail.com', 'Ram@12345', 9998956780, '121, Sunrise Complex, Mansi Circle, Judges Bunglow Road, Bodakdev, Ahmedabad, Gujarat 380015, India'),
(24, 'Naiya Modi', 'modinaiya0605@gmail.com', 'naiyamodi', 9898789829, 'A-202,Shivraj Society,near GorKuva , Maninagar,Ahmedad'),
(25, 'Hina Ramani', 'ramihinu93@gmail.com', 'hina@204', 6567786547, 'A-107,ShreeRam Residency,near Sangam Medical Store,Narol ,Ahmedabad'),
(26, 'Kahan Patel', 'greenheven2041@gmail.com', 'kahan@2041', 7878654567, 'A-90,Ankita Apartment,Rambaug,Ahmedabad'),
(27, 'Asha Kapadiya', 'modi90575@gmail.com', 'asha@90', 6789675467, 'A-22,Shreeji Park,near Baliyadev temple,Lambha,Ahmedabad'),
(28, 'Daksh Patel', 'codingtester2@gmail.com', '79230192', 6578546789, 'A-2289,Vrundavan Society,malivalani Pod,Shahpur,Ahmedabad'),
(29, 'Pranjal Patel', 'ppatel89@gmail.com', 'pranjal@89', 6355896547, 'A-56,RannaPark society,Isanpur,Ahmedabad '),
(30, 'Kartik Raval', 'kartik090106@gmail.com', 'kartik@09', 7865786547, 'C-404,Devraj Residency,Vasantvihar,Naroda-Nikol\r\nRoad,Ahmedabad '),
(31, 'Dharma Shah', 'dharma308@gmail.com', 'dharma@308', 9856432145, 'A-89,Shreeji Park, Vasantvihar,Naroda,Ahmedabad'),
(32, 'Sheron Modi', 'smo2511@gmail.com', 'sheron@25', 7779091001, 'A-99,Namrata Apartment , Shahinaug,Ahmedabad'),
(33, 'Krunal patel', '1krunalptl@gmail.com', 'krunal@09', 8790564312, 'A-2,zgsd,zjshgdfhzsegd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
