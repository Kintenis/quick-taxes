-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 10:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
(999, 2021, '2', '245.40', '135.59', '54.50', '25.28', '14463', '67.600');

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
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
