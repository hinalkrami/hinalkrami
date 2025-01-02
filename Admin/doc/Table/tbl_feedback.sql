-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:57 PM
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
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(6) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `feedback_date` varchar(50) NOT NULL,
  `feedback_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `order_id`, `user_id`, `user_name`, `user_email`, `feedback_date`, `feedback_details`) VALUES
(1, 1, 24, 'Naiya Modi', 'modinaiya0605@gmail.com', '05-04-24', 'Thank you so much ...Greenheven for your unique and trustable products and site...👍\r\n'),
(2, 2, 26, 'Kahan Patel', 'greenheven2041@gmail.com', '05-04-24', 'The plants are look very nice.  My Wife was delighted. \r\nThank you so much for sending such high quality plants so speedily.👌\r\nWe will definitely be in touch for more native plants.\r\n'),
(3, 6, 32, 'Sheron Modi', 'smo2511@gmail.com', '05-04-24', 'A very creative composition with our horizontal fence planter.\r\nLove the colors! They are made of a sturdy material, not flimsy at all! Can’t wait to plant my herbs in them, and the colors will look g'),
(4, 7, 28, 'Daksh Patel', 'codingtester2@gmail.com', '05-04-24', ' I want to rarely garedening tools that i can want from your site.\r\nAll products were chosen independently very well and also with \r\nhigh quality meterial bag  is very nice work of your team members .'),
(9, 4, 4, 'keya', 'keya@gmail.com', '29-03-24', ' Your Bonsai plant is amazing 👍👍..'),
(21, 1, 17, 'Ram', 'ramgreenheaven01@gmail.com', '04-04-24', ' The plants are in the ground and they look very nice.   Thank you so much for sending such high quality plants so speedily. We will definitely be in touch for more native plants.\r\n'),
(22, 1, 17, 'Ram', 'ramgreenheaven01@gmail.com', '04-04-24', ' Thank you so very much for your vision for our back yard.  We never would have imagined the wonderful natural garden you gave us. \r\n'),
(23, 28, 25, 'Hina Ramani', 'ramihinu93@gmail.com', '05-04-24', ' I work in a garden centre and as it’s part of a chain I find the plants ordinary and run of the mill. If we don’t have what a customer wants then I have no hesitation in recommending The Plant Man as'),
(24, 28, 25, 'Hina Ramani', 'ramihinu93@gmail.com', '05-04-24', ' A fantastic place to visit for a great choice of plants at great prices.😊👍'),
(25, 30, 27, 'Asha Kapadiya', 'modi90575@gmail.com', '05-04-24', ' I live in Suffolk but my daughter took me to yours and its fantastic. So now every time I visit her I try to make a visit to you. Thoroughly recommend quality, price and helpfulness. 😁'),
(26, 3, 17, 'Ram', 'ramgreenheaven01@gmail.com', '26-04-24', ' Got my order within 3 days of ordering from their website. All plants and pots are in good condition.'),
(27, 6, 28, 'Daksh Patel', 'codingtester2@gmail.com', '29-04-24', ' ty'),
(28, 3, 17, 'Ram', 'ramgreenheaven01@gmail.com', '29-04-24', ' 5 stars ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
