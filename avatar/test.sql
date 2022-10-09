-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2022 at 03:11 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodeuct`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `product_title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_des` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `product_img` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `product_title`, `product_des`, `product_price`, `product_img`) VALUES
(1, '3A FEATURETAIL', 'Combo of Parking Assistance 4.3 Inch Tft LCD Monitor + 8LED Reverse Camera for Cars + Reverse Parking Sensor White', '₹2149', './ca1.jpg'),
(2, 'JBL Store', 'JBL Gto609C 540 Watt Woofer, Surround Sound Speaker', '₹8999', './sp1.jpg'),
(3, 'DRIVABLY PRO EXPERIENCE', 'Drivably Pro 9 Inches Universal Car Android 2GB Ram 16GB ROM with IPS Display Gorilla Glass with Android 10.1', '₹5949', './sc2.jpg'),
(4, 'MOMO', 'Black Plastic And Metal MOMO Car Steering Wheel', '₹8681', './st1.jpg'),
(5, '3A FEATURETAIL', 'Reverse Camera for Cars', '₹2149', './ca1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
