-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 12:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quick_taxes`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter_data`
--

CREATE TABLE `counter_data` (
  `f_id` int(11) NOT NULL,
  `f_year` year(4) DEFAULT NULL,
  `f_month` decimal(2,0) DEFAULT NULL,
  `f_hotWC` decimal(5,2) DEFAULT NULL,
  `f_coldWC` decimal(5,2) DEFAULT NULL,
  `f_hotKitchen` decimal(5,2) DEFAULT NULL,
  `f_coldKitchen` decimal(5,2) DEFAULT NULL,
  `f_electric` decimal(5,0) DEFAULT NULL,
  `f_tax` decimal(7,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter_data`
--

INSERT INTO `counter_data` (`f_id`, `f_year`, `f_month`, `f_hotWC`, `f_coldWC`, `f_hotKitchen`, `f_coldKitchen`, `f_electric`, `f_tax`) VALUES
(1, 2019, '11', '214.08', '84.11', '39.94', '17.87', '13016', '66.920'),
(2, 2019, '12', '216.68', '87.81', '40.88', '18.38', '13124', '77.740'),
(3, 2020, '1', '219.17', '91.58', '42.14', '19.08', '13252', '83.330'),
(4, 2020, '2', '221.39', '95.13', '43.27', '19.61', '13372', '77.610'),
(5, 2020, '3', '224.29', '100.83', '45.47', '20.60', '13557', '71.630'),
(6, 2020, '4', '227.79', '107.02', '47.51', '21.55', '13711', '64.140'),
(7, 2020, '5', '230.77', '113.76', '49.30', '22.47', '13853', '44.560'),
(8, 2020, '6', '235.02', '120.47', '50.38', '23.19', '13975', '40.800'),
(9, 2020, '7', '238.25', '124.89', '51.27', '23.74', '14095', '41.620'),
(10, 2020, '8', '241.78', '130.50', '52.77', '24.56', '14250', '37.100'),
(11, 2020, '9', '243.82', '133.78', '53.79', '25.00', '14333', '39.650'),
(12, 2020, '10', '245.17', '135.37', '54.46', '25.26', '14383', '45.510'),
(13, 2020, '11', '245.18', '135.40', '54.46', '25.26', '14402', '57.480'),
(14, 2020, '12', '245.38', '135.57', '54.50', '25.28', '14422', '60.390'),
(15, 2021, '1', '245.39', '135.59', '54.50', '25.28', '14438', '69.230'),
(16, 2021, '2', '245.40', '135.59', '54.50', '25.28', '14463', '67.600'),
(17, 2020, '3', '245.40', '135.60', '54.50', '25.28', '14480', '59.240'),
(18, 2020, '4', '245.40', '135.60', '54.50', '25.28', '14494', '51.110'),
(19, 2021, '5', '245.40', '135.70', '54.50', '25.34', '14519', '28.360');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_data`
--
ALTER TABLE `counter_data`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_data`
--
ALTER TABLE `counter_data`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
